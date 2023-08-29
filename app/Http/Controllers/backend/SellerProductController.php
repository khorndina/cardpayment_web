<?php

namespace App\Http\Controllers\backend;

use App\DataTables\SellerPendingProductsDataTable;
use App\DataTables\SellerProductsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SellerProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SellerProductsDataTable $dataTable)
    {
        return $dataTable->render('admin.product.seller-product.index');
    }

     /**
     * Display a listing of the resource.
     */
    public function pendingProduct(SellerPendingProductsDataTable $dataTable)
    {
        return $dataTable->render('admin.product.seller-product.pendingProducts');
    }

    public function isApprove(Request $request)
    {
        $product = Product::findOrFail($request->id);
        // dd($request->value);
        $product->is_approved = $request->value;
        $product->save();

        return response(['message'=>'Pending Product has been Approved!']);
    }
}
