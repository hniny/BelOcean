<?php

namespace App\Http\Controllers;

use App\Vessel;
use Illuminate\Http\Request;

class VesselController extends Controller
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
        $vessels = Vessel::latest()->paginate(10);
        // dd($vessels);
        return view('admin.vessels.index',compact('vessels'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vessels.create');
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
            'vsl_name' => 'required'
        ]);

        Vessel::create($request->all());
        return redirect()->route('vessels.index')
        ->with('success','Vessel created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vessel  $vessel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vessel = Vessel::find($id);
        return view('admin.vessels.show',compact('vessel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vessel  $vessel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vessel = Vessel::find($id);
        // dd($vessel);
        return view('admin.vessels.edit',compact('vessel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vessel  $vessel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vessel $vessel)
    {
        request()->validate([
            'vsl_name' => 'required',
        ]);
    
        $vessel->update($request->all());
    
        return redirect()->route('vessels.index')
                        ->with('success','Vessel updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vessel  $vessel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vessel $vessel)
    {
        $vessel->delete();
        return redirect()->route('vessels.index')
                        ->with('success','Vessel deleted successfully');
    }
}
