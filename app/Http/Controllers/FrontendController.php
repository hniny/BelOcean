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
use Mail;
use App\Mail\EmailSend;
class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appliedcategories = AppliedCategory::whereNull('deleted_at')->get();
        $certificates = Certificate::whereIn('status',[0,1])->get();
        $vessels = Vessel::all();
        $backgroundinfos = Backgroundinfo::all();
        // dd($backgroundinfos);
        return view('web.index',compact('appliedcategories','certificates','vessels','backgroundinfos'));
    }
    /**
     * Show the form for creating a new resource.
     *
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
                'attach_file.*' => 'mimes:doc,docx,pdf,txt,jpeg,png,jpg,gif,svg|max:2000'
            ]);
            DB::beginTransaction();
            try {
            if($files = $request->file('person_img'))
            {
                //define upload path
                $destinationPath = 'profiles/';//upload path
                //Upload original image
                $personImg = date('ymdHis') . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath,$personImg);
                //save to database
            
            }
        
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
                }
                
                $doc->certificate_no = $request['number'.$item->id];
                if ($request['expire_date'.$item->id] != null) {
                    $doc->expire_date = date('Y-m-d', strtotime($request['expire_date'.$item->id]));
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
                Mail::to($email)->send(new EmailSend($mailData));
            DB::commit();
        } catch (\Exception $e) {
            dd($e);
          DB::rollBack();
          return back()->withErrors([$e->getMessage()]);
        }
        return redirect()->route('personal.index');
    }
  
}
