<?php

namespace App\Http\Controllers\backend;

use App\DataTables\VendorProductImageGalleryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImageGallery;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorProductImageGalleryController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */

    // public function index()
    // {
    //     //
    // }

    public function showTable($id, VendorProductImageGalleryDataTable $dataTable)
    {
        $product = Product::find($id);
        // var_dump($product->id);

        /** Check is this user is Owner of product? */
        if($product->vendor_id != Auth::user()->vendor->id){
            abort(404);
        }

        return $dataTable->with('productId', $id)->render('vendor.product.image-gallery.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            // for multiple image upload
            'image.*' => 'required|image|max:2048',
        ]);

        /**Handle upload multiple images */
        $imagepaths = $this->uploadMultiImage($request, 'image', 'uploards');
        // dd($imagepaths);

        foreach ($imagepaths as $path) {
            $productImageGallery = new ProductImageGallery();
            $productImageGallery->image = $path;
            $productImageGallery->product_id = $request->product;
            $productImageGallery->save();
        }

        toastr('Uploaded Successfully!','success');
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
        $productImageGallery = ProductImageGallery::findOrFail($id);
        // dd($productImageGallery);

        /** Check is this user is Owner of product? */
        if($productImageGallery->product->vendor_id != Auth::user()->vendor->id){
            abort(404);
        }

        // delete slider from database
        $this->deleteImage($productImageGallery->image);

        $productImageGallery->delete();

        return response(['status'=>'success', 'message'=>'Deleted Successfully!']);
    }
}
