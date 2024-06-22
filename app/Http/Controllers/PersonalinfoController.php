<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personalinfo;
use App\AppliedCategory;
use App\Certificate;
use App\SeamanDoc;
use App\SeaService;
use App\Vessel;
use App\Backgroundinfo;
use App\Declaration;
use DB;
use File;
use PDF;
use Mail;
use App\Mail\EmailSend;
use Carbon\Carbon;
class PersonalinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:personal-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
         $this->middleware('permission:personal-create', ['only' => ['create','store']]);
         $this->middleware('permission:personal-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:personal-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        // dd(request()->input('page',1));
        $personalinfos = Personalinfo::whereNull('deleted_at')->latest()->paginate(10);
        return view('admin.personalinfo.index',compact('personalinfos'))
                    ->with('i',(request()->input('page',1)-1)*10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $appliedcategories = AppliedCategory::whereNull('deleted_at')->get();
        $certificates = Certificate::all();
        $vessels = Vessel::all();
        $backgroundinfos = Backgroundinfo::all();
        // dd($backgroundinfos);
        return view('admin.personalinfo.create',compact('appliedcategories','certificates','vessels','backgroundinfos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //    dd($request->all());
        $email = 'dev8.hmm@gmail.com';
        $position = AppliedCategory::find($request->applied_cat_id);
        // dd($position->cat_name);
        $mailData = [
            'title' => $request->name,
            'position' => $position->cat_name,
            'url'   => 'http://onlineapplication.hostmyanmar.org/login'
        ];
        $request->validate([
            'person_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'attach_file' => 'mimes:doc,docx,pdf,txt,jpeg,png,jpg,gif,svg|max:4000'
        ]);
        DB::beginTransaction();
        try {
        if($files = $request->file('person_img'))
        {
            //define upload path
            $destinationPath = public_path('profile/');//upload path
            //Upload original image
            $personImg = date('ymdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath,$personImg);
            //save to database
            
        }
       
        // dd($seamanName);
        $personalinfos = new Personalinfo();
        $personalinfos->name = $request->name;
        $personalinfos->age = $request->age;
        $personalinfos->date_birth = $request->date_birth == null ? $request->date_birth : date('Y-m-d', strtotime($request->date_birth));
        $personalinfos->place_birth = $request->place_birth;
        $personalinfos->religion = $request->religion;
        $personalinfos->marital_status = $request->marital_status;
        $personalinfos->height = $request->height;
        $personalinfos->weight = $request->weight;
        $personalinfos->education = $request->education;
        $personalinfos->mark = $request->mark;
        $personalinfos->father_name = $request->father_name;
        $personalinfos->mother_name = $request->mother_name;
        $personalinfos->shoe_size = $request->shoe_size;
        $personalinfos->overall_size = $request->overall_size;
        $personalinfos->next_kin = $request->next_kin;
        $personalinfos->relation = $request->relation;
        $personalinfos->address = $request->address;
        $personalinfos->phone_no = $request->phone_no;
        $personalinfos->email = $request->email;
        $personalinfos->applied_cat_id = $request->applied_cat_id;
        $personalinfos->readiness = $request->readiness; 
        $personalinfos->applied_date = $request->applied_date == null ? $request->applied_date : date('Y-m-d', strtotime($request->applied_date));
        $personalinfos->person_img = $personImg;
        $personalinfos->save();
        //seaman's document
        $certificates = Certificate::all();
        foreach ($certificates as $item) {
            if ($files = $request->file('attach_file'.$item->id)) {
                $destinationPath = public_path('attach/'); // upload path
                $attachImg = date('YmdHis') . "." . $files->getClientOriginalName();
                $files->move($destinationPath, $attachImg);
             }

            $doc = new SeamanDoc;
            $doc->certificate_id = $item->id;
            if ($request['date_issue'.$item->id] != null) {
                $doc->issued_date = date('Y-m-d', strtotime($request['date_issue'.$item->id]));
            }else{
                $doc->issued_date = null;
            }
                
            $doc->certificate_no = $request['number'.$item->id];
            if ($request['expire_date'.$item->id] != null) {
                $doc->expire_date = date('Y-m-d', strtotime($request['expire_date'.$item->id]));
            }else{
                $doc->expire_date = null;
            }
            
            if ($request['attach_file'.$item->id] != null) {
                $doc->attach_file = $attachImg;
            }

            $doc->personalinfo_id = $personalinfos->id;
            // dd($doc);
            $doc->save();
        }
        if ($request->sea_services) {
            // dd($request->sea_services);
            foreach ($request->sea_services as $key => $service) {
              $services = new SeaService;
              $services->name_of_vessel = $service['name_of_vessel'];
              $services->rank = $service['rank'];
              $services->vessel_id = $service['vessel_id'];
              $services->grt = $service['grt'];
              $services->bph = $service['bph'];
              $services->main_engine = $service['main_engine'];
              //   $services->sign_on_date = $service['sign_on_date'];
                $services->sign_on_date =  $service['sign_on_date'] == null ? $service['sign_on_date'] : date('Y-m-d', strtotime($service['sign_on_date']));
              //   $services->sign_off_date = $service['sign_off_date'];
                $services->sign_off_date = $service['sign_off_date'] == null ? $service['sign_off_date'] : date('Y-m-d', strtotime($service['sign_off_date']));
                $services->service_onboard = $service['service_onboard'];
                $services->ship_owner = $service['ship_owner'];
                $services->personalinfo_id = $personalinfos->id;
                $services->save();
            }
          }
         $backgroundinfos = Backgroundinfo::all();
         foreach ($backgroundinfos as $item) {
                $declarations = new Declaration;
                $declarations->backgroundinfo_id = $item->id;
                if ($request['status'.$item->id] != null) {
                    $declarations->status =$request['status'.$item->id];
                }
                        
                $declarations->description = $request['description'.$item->id];
                $declarations->personalinfo_id = $personalinfos->id;
                // dd($declarations);
                $declarations->save();
            }
            Mail::to($email)->send(new EmailSend($mailData,$position));
        DB::commit();
    } catch (\Exception $e) {
        dd($e);
      DB::rollBack();
      return back()->withErrors([$e->getMessage()]);
    }
    return redirect()->route('personalinfos.index');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $personalinfo = Personalinfo::find($id);
        // dd($personalinfo);
        $seadocs = SeamanDoc::where('personalinfo_id',$id)->get();
        // dd($seadocs);
        $seaservices = SeaService::where('personalinfo_id',$id)->get();
        // dd($seaservices);
        $declarations = Declaration::where('personalinfo_id',$id)->get();
        // $checked = $declarations->status > 0 ? 'checked':'';
        // dd($declarations);
        return view('admin.personalinfo.show',compact('personalinfo','seadocs', 'seaservices', 'declarations','checked'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $personalinfo = Personalinfo::find($id);

        $appliedcategories = AppliedCategory::all();

        $seadocs = SeamanDoc::all();

        $vessels = Vessel::all();
        // dd($vessels);

        $seaservices = SeaService::where('personalinfo_id',$id)->get();
        // dd($seaservices);
        $declarations = Declaration::where('personalinfo_id',$id)->get();
// dd($declarations);
        $backgroundinfos = Backgroundinfo::all();

        $seadocs = SeamanDoc::where('personalinfo_id',$id)->get();
        // dd($seadocs);
        
        return view('admin.personalinfo.edit',compact('personalinfo','appliedcategories','certificates','seadocs','seaservices','declarations','vessels', 'backgroundinfos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        DB::beginTransaction();
            try {
                if ($files = $request->file('person_img')) {
                    $destinationPath = 'public/profile/'; // upload path
                    $personImg = date('YmdHis') . "." . $files->getClientOriginalName();
                    $files->move($destinationPath, $personImg);
                }
            $personalinfos = Personalinfo::find($id);
            $personalinfos->name = $request->name;
            $personalinfos->age = $request->age;
            $personalinfos->date_birth = $request->date_birth == null ? $request->date_birth : date('Y-m-d', strtotime($request->date_birth));
            $personalinfos->place_birth = $request->place_birth;
            $personalinfos->religion = $request->religion;
            $personalinfos->marital_status = $request->marital_status;
            $personalinfos->height = $request->height;
            $personalinfos->weight = $request->weight;
            $personalinfos->education = $request->education;
            $personalinfos->mark = $request->mark;
            $personalinfos->father_name = $request->father_name;
            $personalinfos->mother_name = $request->mother_name;
            $personalinfos->shoe_size = $request->shoe_size;
            $personalinfos->overall_size = $request->overall_size;
            $personalinfos->next_kin = $request->next_kin;
            $personalinfos->relation = $request->relation;
            $personalinfos->address = $request->address;
            $personalinfos->phone_no = $request->phone_no;
            $personalinfos->email = $request->email;
            $personalinfos->applied_cat_id = $request->applied_cat_id;
            $personalinfos->readiness = $request->readiness; 
            $personalinfos->applied_date = $request->applied_date == null ? $request->applied_date : date('Y-m-d', strtotime($request->applied_date));
            if ($request->hasFile('person_img')) {
                $personalinfos->person_img = $personImg;
            }else{
                $personalinfos->person_img = $personalinfos->person_img;
            }
           
            $personalinfos->update();
            //    dd($request->doc);
            foreach ($request->doc as $key => $item) {
                // dd($item);
                // dd(date('d-m-Y', strtotime($item['issue_date'.$key])));
                $seadocs = SeamanDoc::where('id',$item['id'])->first();
                // dd($seadocs);
                if (($item['attach_file'.$key])!=null) {
                    // dd(file_exists($item['attach_file'.$key]));
                     if(file_exists($item['attach_file'.$key])){
                        $files = $item['attach_file'.$key];                      
                        $destinationPath = public_path('attach/'); // upload path
                        $attachImg = date('YmdHis') . "." . $files->getClientOriginalName();
                       
                        $files->move($destinationPath, $attachImg);                       
                        $seadocs->attach_file = $attachImg;                         
                     }                
                }              
                
                $seadocs->certificate_id = $item['certificate_id'];
                $seadocs->certificate_no =$item['certificate_no'];
                
                if (isset($item['issue_date'.$key] )) {
                    $seadocs->issued_date = date('Y-m-d', strtotime($item['issue_date'.$key]));
                   
                }else{
                    $seadocs->issued_date =  null;
                }
                if (isset($item['expire_date'.$key])) {
                    $seadocs->expire_date = date('Y-m-d', strtotime($item['expire_date'.$key]));
                    
                }else{
                    $seadocs->expire_date =  null;
                }
                // $seadocs->issued_date = date('d-m-Y', strtotime($item['issue_date'.$key]))? date('Y-m-d', strtotime($item['issue_date'.$key])) : null;
                // $seadocs->expire_date = date('Y-m-d', strtotime($item['expire_date'.$key])) ? date('Y-m-d', strtotime($item['expire_date'.$key])) : null ;
                $seadocs->personalinfo_id = $personalinfos->id;
                $seadocs->update();
                // dd(SeamanDoc::where('id',$item['id'])->first());
        
                }
              

            if(isset($request->sea_services)){
                // dd($request->sea_services);
                SeaService::where('personalinfo_id',$id)->forceDelete();

                foreach ($request->sea_services as $key => $service) {
                    $services = new SeaService;
                    $services->name_of_vessel = $service['name_of_vessel'];
                    $services->rank = $service['rank'];
                    $services->vessel_id = $service['vessel_id'];
                    $services->grt = $service['grt'];
                    $services->bph = $service['bph'];
                    $services->main_engine = $service['main_engine'];
                    //   $services->sign_on_date = $service['sign_on_date'];
                      $services->sign_on_date =  $service['sign_on_date'] == null ? $service['sign_on_date'] : date('Y-m-d', strtotime($service['sign_on_date']));
                    //   $services->sign_off_date = $service['sign_off_date'];
                      $services->sign_off_date = $service['sign_off_date'] == null ? $service['sign_off_date'] : date('Y-m-d', strtotime($service['sign_off_date']));
                      $services->service_onboard = $service['service_onboard'];
                      $services->ship_owner = $service['ship_owner'];
                      $services->personalinfo_id = $personalinfos->id;
                      $services->save();
                  }
                }
        
             foreach ($request->status as $key => $item) {
                // dd($item['bg-info'.$key]);
                $declarations = Declaration::where('id',$item['id'])->first();
                // dd($declarations);
                $declarations->backgroundinfo_id = $item['bg_id'];
                $declarations->status =$item['bg-info'.$key];
                    
                $declarations->description = $item['descri'];
                $declarations->personalinfo_id = $personalinfos->id;
                // dd($declarations);
                $declarations->update();
                }
            DB::commit();
        } catch (\Exception $e) {
            dd($e);
          DB::rollBack();
          return back()->withErrors([$e->getMessage()]);
        }
        return redirect()->route('personalinfos.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $personalinfo = Personalinfo::find($id);
        $personalinfo->delete();
       $personalinfo->declaration()->delete();
        $personalinfo->sea_service()->delete();
        $personalinfo->sea_doc()->delete();
    
        return redirect()->route('personalinfos.index')
                        ->with('success','Personal Derails deleted successfully');
    }
    public function delete_pdf($id,$field,$pdf)
    {
        // dd($image);
        $seadocs=SeamanDoc::find($id);
        // dd($seadocs);
        // dd(SeamanDoc::where('attach_file',$image)->get());
        $image_path="public/attach/".$pdf;            
        if(File::exists($image_path)){
            File::delete($image_path);
        }   
        $seadocs->attach_file = NULL;
        $seadocs->update();
        return response()->json(["status"=>true,"id" => $id, "field" => $field]);
    }
    public function delete_image($id,$field,$image)
    {
        // dd($image);
        $profile = Personalinfo::find($id);
        // dd($seadocs);
        // dd(SeamanDoc::where('attach_file',$image)->get());
        $image_path = "public/profile/".$image;            
        if(File::exists($image_path)){
            File::delete($image_path);
        }   
        $profile->person_img = NULL;
        $profile->update();
        return response()->json(["status"=>true,"id" => $id, "field" => $field]);
    }
    public function downloadPDF($id) {
        $personalinfo = Personalinfo::find($id);
        // dd($personalinfo);
        $seadocs = SeamanDoc::where('personalinfo_id',$id)->get();
        // dd($seadocs);
        $seaservices = SeaService::where('personalinfo_id',$id)->get();
        // dd($seaservices);
        $declarations = Declaration::where('personalinfo_id',$id)->get();

        $pdf = PDF::loadView('pdf', compact('personalinfo', 'seadocs', 'seaservices', 'declarations'));
    
        return $pdf->download($personalinfo->name.'Seafarer CV.pdf');
    }

    public function yearly(Request $request) 
    {
        // dd($request->all());
        // $customer_name = $request->customer_name;
        return Excel::download(new PersonalinfoExport, ' YearlyReport.xlsx');
    }
}
