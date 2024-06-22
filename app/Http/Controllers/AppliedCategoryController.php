<?php

namespace App\Http\Controllers;

use App\AppliedCategory;
use Illuminate\Http\Request;

class AppliedCategoryController extends Controller
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
        $appliedCategories = AppliedCategory::latest()->paginate(10);
                    
        return view('admin.categories.index',compact('appliedCategories'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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
            'cat_name' => 'required'
        ]);
        AppliedCategory::create($request->all());
        return redirect()->route('categories.index')
                        ->with('success','Applied Category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AppliedCategory  $appliedCategory
     * @return \Illuminate\Http\Response
     */
    public function show(AppliedCategory $appliedCategory,$id)
    {
        // dd($id);
        $appliedCategory = AppliedCategory::find($id);
        // dd($appliedCategory);
        return view('admin.categories.show',compact('appliedCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AppliedCategory  $appliedCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(AppliedCategory $appliedCategory,$id)
    {
        $appliedCategory = AppliedCategory::find($id);
        return view('admin.categories.edit',compact('appliedCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AppliedCategory  $appliedCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AppliedCategory $appliedCategory,$id )
    {
        request()->validate([
            'cat_name' => 'required'
        ]);
        $appliedCategory = AppliedCategory::find($id);
        // dd($appliedCategory);
        $category = $appliedCategory->update($request->all());
// dd($a);
        return redirect()->route('categories.index')
                        ->with('success','Applied Category updated successfully.')
                        ->with('category',$category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AppliedCategory  $appliedCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(AppliedCategory $appliedCategory, $id)
    {
        $appliedCategory = AppliedCategory::find($id);
        $appliedCategory->delete();
    
        return redirect()->route('categories.index')
                        ->with('success','Applied Category deleted successfully');
    }
}
