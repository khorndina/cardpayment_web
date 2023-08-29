<?php

namespace App\Http\Controllers\backend;

use App\DataTables\VendorProductVariantDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorProductVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showTable($id, VendorProductVariantDataTable $dataTable)
    {
        // dd($id);
        $product = Product::findOrFail($id); //request()->product
        // dd($dataTable);

        /** Check is this user is Owner of product? */
        if($product->vendor_id != Auth::user()->vendor->id){
            abort(404);
        }

        return $dataTable->with('productId', $id)->render('vendor.product.product-variant.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function createVariant($id)
    {
        // dd($id);
        $product = Product::findOrFail($id);
        return view('vendor.product.product-variant.create', compact('product'));
    }


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
            'productId' => 'integer|required',
            'name' => 'required|max:200',
            'status' => 'required'
        ]);

        $productVariant = new ProductVariant();
        $productVariant->name = $request->name;
        $productVariant->product_id = $request->productId;
        $productVariant->status = $request->status;
        $productVariant->save();

        toastr('Created Successfully', 'success', 'success');
        return redirect()->route('vendor.product-variant.showtable', $request->productId);
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
        $productVariant = ProductVariant::findOrFail($id);
        // dd($productVariant);
        $product = Product::findOrFail($productVariant->product_id);
        // dd($product);

        /** Check is this user is Owner of product? */
        if($product->vendor_id != Auth::user()->vendor->id){
            abort(404);
        }

        return view('vendor.product.product-variant.edit', compact('productVariant', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|max:200',
            'status' => 'required'
        ]);

        $productVariant = ProductVariant::findOrFail($id);

        /** Check is this user is Owner of product? */
        if($productVariant->product->vendor_id != Auth::user()->vendor->id){
            abort(404);
        }

        $productVariant->name = $request->name;
        $productVariant->status = $request->status;
        $productVariant->save();

        toastr('Updated Successfully', 'success', 'success');
        return redirect()->route('vendor.product-variant.showtable', $productVariant->product_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $productVariant = ProductVariant::findOrFail($id);

        /** Check is this user is Owner of product? */
        if($productVariant->product->vendor_id != Auth::user()->vendor->id){
            abort(404);
        }

        $productVariantItem = ProductVariantItem::where('product_variant_id', $productVariant->id)->count();
        // dd($productVariantItem);
        if($productVariantItem>0){
            return response(['status'=>'error', 'message' => 'This item containe Variant-Items, please delete Variant-Items first!!!']);
        }

        $productVariant->delete();

        return response(['status'=>'success', 'message'=>'Deleted Successfully!']);
    }

    public function changestatus(Request $request){
        // dd($request->all());
        $brands = ProductVariant::findOrFail($request->id);
        $brands->status = $request->ischecked == "false" ? 0 : 1;
        $brands->save();

        return response(['message'=>'status has been updated!']);
    }
}
