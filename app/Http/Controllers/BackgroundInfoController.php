<?php

namespace App\Http\Controllers;

use App\Backgroundinfo;
use Illuminate\Http\Request;

class BackgroundInfoController extends Controller
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
        $backgroundinfos = Backgroundinfo::latest()->paginate(10);
        return view('admin.backgroundinfos.index',compact('backgroundinfos'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.backgroundinfos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'bg_name' => 'required'
        ]);

        Backgroundinfo::create($request->all());
        return redirect()->route('backgroundinfos.index')
                        ->with('success','Background infos created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Backgroundinfo  $backgroundinfo
     * @return \Illuminate\Http\Response
     */
    public function show(Backgroundinfo $backgroundinfo)
    {
        return view('admin.backgroundinfos.show',compact('backgroundinfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Backgroundinfo  $backgroundinfo
     * @return \Illuminate\Http\Response
     */
    public function edit(Backgroundinfo $backgroundinfo)
    {
        return view('admin.backgroundinfos.edit',compact('backgroundinfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Backgroundinfo  $backgroundinfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Backgroundinfo $backgroundinfo)
    {
        request()->validate([
            'bg_name' => 'required'
        ]);

        $backgroundinfo->update($request->all());

        return redirect()->route('backgroundinfos.index')
                        ->with('success','Background infos updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Backgroundinfo  $backgroundinfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Backgroundinfo $backgroundinfo)
    {
        $backgroundinfo->delete();
        return redirect()->route('backgroundinfos.index')
        ->with('success','Background infos deleted successfully.');
    }
}
