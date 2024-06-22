<?php
    
namespace App\Http\Controllers;
    
use App\Certificate;
use Illuminate\Http\Request;
    
class CertificateController extends Controller
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
        $certificates = Certificate::latest()->paginate(10);
        return view('admin.certificate.index',compact('certificates'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.certificate.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        request()->validate([
            'name' => 'required',
        ]);
    
        Certificate::create($request->all());
    
        return redirect()->route('certificates.index')
                        ->with('success','Certificate created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Certificate $certificate)
    {
        // dd($certificate->id);
        return view('admin.certificate.show',compact('certificate'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $certificate = Certificate::find($id);
        $checked = $certificate->status == 1 ? 'checked': 0;
        // dd($checked);
        return view('admin.certificate.edit',compact('certificate','checked'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certificate $certificate)
    {
        // dd($request->all());
    
        $certificate->update(['name'=>$request->name ?? $request->name,
        'status' => $request->status ? 1 : 0]);
        // dd($certificate);
    
        return redirect()->route('certificates.index')
                        ->with('success','Certificate updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificate $certificate)
    {
        $certificate->delete();
    
        return redirect()->route('certificates.index')
                        ->with('success','Certificate deleted successfully');
    }
}