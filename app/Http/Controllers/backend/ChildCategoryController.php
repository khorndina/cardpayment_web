<?php

namespace App\Http\Controllers\backend;

use App\DataTables\childCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\subCategory;
use Illuminate\Http\Request;
use Str;

class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(childCategoryDataTable $datatable)
    {
        return $datatable->render('admin.child-category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $subcategories = subCategory::all();
        return view('admin.child-category.create', compact('categories', 'subcategories'));
    }

    public function getSubCategory(Request $request){
        $subcategories = subCategory::where('category_id', $request->id)->where('status', 1)->get();
        return $subcategories;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'category' => 'required',
            'sub_category' => 'required',
            'name' => 'required|unique:sub_categories,name',
            'status' => 'required'
        ]);

        $child_category = new ChildCategory();
        $child_category->category_id = $request->category;
        $child_category->sub_category_id = $request->sub_category;
        $child_category->name = $request->name;
        $child_category->slug = Str::slug($request->name);
        $child_category->status = $request->status;
        $child_category->save();

        toastr('child-Category was created Successfully', 'success');
        return redirect()->route('admin.child-category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
