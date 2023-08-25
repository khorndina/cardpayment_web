<?php

namespace App\Http\Controllers\backend;

use App\DataTables\ProductVariantItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantItem;
use Illuminate\Http\Request;

class ProductVariantItemController extends Controller
{
    public function index(ProductVariantItemDataTable $dataTable, $productid, $variantid)
    {
        $product = Product::findOrFail($productid);
        // dd($product);
        $productVariant = ProductVariant::findOrFail($variantid);
        // dd($productVariant);
        return $dataTable->with('variantId', $variantid)->render('admin.product.product-variant-item.index', compact('product', 'productVariant'));
    }

    public function create($productid, $variantid){
        $productVariant = ProductVariant::findOrFail($variantid);
        $product = Product::findOrFail($productid);
        // dd($product);
        return view('admin.product.product-variant-item.create', compact('productVariant', 'product'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'variantId' => 'integer|required',
            'name' => 'required|max:200',
            'price' => 'required|integer',
            'is_default' => 'required',
            'status' => 'required'
        ]);

        $productVariantItem = new ProductVariantItem();
        $productVariantItem->product_variant_id = $request->variantId;
        $productVariantItem->name = $request->name;
        $productVariantItem->price = $request->price;
        $productVariantItem->is_default = $request->is_default;
        $productVariantItem->status = $request->status;
        $productVariantItem->save();

        toastr('Created Successfully', 'success', 'success');
        return redirect()->route('admin.product-variant-item.index',  ['productid'=>$request->productId, 'variantId'=>$request->variantId]);
    }

    // show edit page
    public function edit(string $variantItemId)
    {
        // dd($id);
        $productVariantItem = ProductVariantItem::findOrFail($variantItemId);
        // dd($productVariantItem);
        $productVariant = ProductVariant::findOrFail($productVariantItem->product_variant_id);
        // dd($productVariant);
        $product = Product::findOrFail($productVariant->product_id);
        // dd($product);
        return view('admin.product.product-variant-item.edit', compact('productVariant', 'product', 'productVariantItem'));

    }

    /**Update Product Variant Item */
    public function update(Request $request, string $variantItemId)
    {
        // dd($request->all());
        $request->validate([
            'variantId' => 'integer|required',
            'name' => 'required|max:200',
            'price' => 'required|integer',
            'is_default' => 'required',
            'status' => 'required'
        ]);

        $productVariantItem = ProductVariantItem::findOrFail($variantItemId);
        $productVariantItem->product_variant_id = $request->variantId;
        $productVariantItem->name = $request->name;
        $productVariantItem->price = $request->price;
        $productVariantItem->is_default = $request->is_default;
        $productVariantItem->status = $request->status;
        $productVariantItem->save();

        toastr('Updated Successfully', 'success', 'success');
        return redirect()->route('admin.product-variant-item.index',  ['productid'=>$request->productId, 'variantId'=>$request->variantId]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $variantItemId)
    {
        $productVariantItem = ProductVariantItem::findOrFail($variantItemId);
        $productVariantItem->delete();

        return response(['status'=>'success', 'message'=>'Deleted Successfully!']);
    }


    public function changestatus(Request $request){
        // we can debuge result of $request on inspect in tab Network

        $productVariantItem = ProductVariantItem::findOrFail($request->id);
        $productVariantItem->status = $request->ischecked == "true" ? 1 : 0;
        $productVariantItem->save();

        return response(['message'=>'status has been updated!']);
    }
}
