<?php

namespace App\Http\Controllers\backend;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $datatables)
    {
        return $datatables->render('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'icon' => 'required|not_in:empty',
            'name' => 'required|unique:categories,name',
            'status' => 'required'
        ]);

        $category = new Category();
        $category->icon = $request->icon;
        $category->name = $request->name;
        $category->slug = Str::slug($request->slug);
        $category->status = $request->status;

        $category->save();

        toastr('Category was created Successfully', 'success');
        return redirect()->back();

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
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $request->validate([
            'icon' => 'required|not_in:empty',
            'name' => 'required|unique:categories,name,'.$id,
            'status' => 'required'
        ]);

        $category = Category::findOrFail($id);
        $category->icon = $request->icon;
        $category->name = $request->name;
        $category->slug = Str::slug($request->slug);
        $category->status = $request->status;

        $category->save();

        toastr('Category was Updated Successfully', 'success');
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response(['status'=>'success', 'message'=>'Deleted Successfully!']);
    }

   public function changestatus(Request $request){
        // dd($request->all());

        $category = Category::findOrFail($request->id);
        $category->status = $request->ischecked == "true" ? 1 : 0;
        $category->save();

        return response(['message'=>'status has been updated!']);
    }
}
