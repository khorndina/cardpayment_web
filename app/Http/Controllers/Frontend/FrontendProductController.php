<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendProductController extends Controller
{
    public function showProduct(string $slug){

        /**used Paginate for seperate produtc */
        $product = Product::where('slug', $slug)->first();

        return view('frontend.page.product-detail', compact('product'));
    }
}
