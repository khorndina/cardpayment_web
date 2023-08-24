<?php

namespace App\Http\Controllers\backend;

use App\DataTables\ProductVariantItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProductVariantItemController extends Controller
{
    public function index(ProductVariantItemDataTable $dataTable, $productid, $variantid)
    {
        $product = Product::findOrFail($productid);
        // dd($product);
        $productVariant = ProductVariant::findOrFail($variantid);
        // dd($productVariant);
        return $dataTable->render('admin.product.product-variant-item.index', compact('product', 'productVariant'));
    }
}
