<?php

namespace App\Http\Controllers\backend;

use App\DataTables\BrandDataTable;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Str;

class BrandController extends Controller
{
    use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(BrandDataTable $datatable)
    {
        return $datatable->render('admin.brand.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'logo' => 'required|image|max:2500',
            'name' => 'string|max:100',
            'is_featured' => 'required',
            'status' => 'required',
        ]);

        $brand = new Brand();

        /**Upload Banner */
        $imagepath = $this->uploadImage($request, 'logo', 'uploards');

        $brand->logo = $imagepath;
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->slug);
        $brand->is_featured = $request->is_featured;
        $brand->status = $request->status;

        $brand->save();

        toastr('Brand was created Successfully', 'success');
        return redirect()->route('admin.brand.index');
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
        $brands = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $request->validate([
            'logo' => 'image|max:2500',
            'name' => 'string|max:100',
            'is_featured' => 'required',
            'status' => 'required',
        ]);

        $brands = Brand::findOrFail($id);

        /**Update Banner */
        $imagepath = $this->updateImage($request, 'logo', 'uploards', $brands->logo);

        $brands->logo = empty(!$imagepath) ? $imagepath : $brands->logo;
        $brands->name = $request->name;
        $brands->slug = Str::slug($request->slug);
        $brands->is_featured = $request->is_featured;
        $brands->status = $request->status;

        $brands->save();

        toastr('Brand was updated Successfully', 'success');
        return redirect()->route('admin.brand.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);
        // delete slider from database
        $this->deleteImage($brand->logo);
        $brand->delete();
        return response(['status'=>'success', 'message'=>'Deleted Successfully!']);
    }


    public function changestatus(Request $request){
        // dd($request->all());

        $brands = Brand::findOrFail($request->id);
        $brands->status = $request->ischecked == "true" ? 1 : 0;
        $brands->save();

        return response(['message'=>'status has been updated!']);
    }
}
