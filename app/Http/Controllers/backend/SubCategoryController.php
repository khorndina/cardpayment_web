<?php

namespace App\Http\Controllers\backend;

use App\DataTables\subCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\subCategory;
use Illuminate\Http\Request;
use Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(subCategoryDataTable $datatable)
    {
        return $datatable->render('admin.sub-category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.sub-category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'category' => 'required',
            'name' => 'required|unique:sub_categories,name',
            'status' => 'required'
        ]);

        $sub_category = new subCategory();
        $sub_category->category_id = $request->category;
        $sub_category->name = $request->name;
        $sub_category->slug = Str::slug($request->slug);
        $sub_category->status = $request->status;
        $sub_category->save();
        toastr('Category was created Successfully', 'success');
        return redirect()->route('admin.sub-category.index');
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
        $subcategory = subCategory::findOrFail($id);
        $categories = Category::all();
        return view('admin.sub-category.edit', compact('subcategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $request->validate([
            'category' => 'required',
            'name' => 'required|unique:sub_categories,name,'.$id,
            'status' => 'required'
        ]);

        $sub_category = subCategory::findOrFail($id);
        $sub_category->category_id = $request->category;
        $sub_category->name = $request->name;
        $sub_category->slug = Str::slug($request->slug);
        $sub_category->status = $request->status;
        $sub_category->save();
        toastr('Updated Successfully', 'success');
        return redirect()->route('admin.sub-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subcategory = subCategory::findOrFail($id);
        $subcategory->delete();
        return response(['status'=>'success', 'message'=>'Deleted Successfully!']);
    }

    public function changestatus(Request $request){
        // dd($request->all());

        $subcategory = subCategory::findOrFail($request->id);
        $subcategory->status = $request->ischecked == "true" ? 1 : 0;
        $subcategory->save();

        return response(['message'=>'status has been updated!']);
    }
}
