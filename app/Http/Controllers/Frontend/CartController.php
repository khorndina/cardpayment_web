<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariantItem;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
        /** Add item to cart */
    public function addToCart(Request $request)
    {
        // dd($request->all());
        // dd($request->variants);

        $product = Product::findOrFail($request->product_id);

        /** check product quantity */
        if($product->qyt === 0){
            return response(['status' => 'error', 'message' => 'Product stock out']);
        }elseif($product->qyt < $request->qty){
            return response(['status' => 'error', 'message' => 'Quantity not available in our stock']);
        }

        $variants = [];
        $variantTotalAmount = 0;

        if($request->has('variants')){
            foreach($request->variants as $item_id){
                $variantItem = ProductVariantItem::find($item_id);
                $variants[$variantItem->productVariant->name]['name'] = $variantItem->name;
                $variants[$variantItem->productVariant->name]['price'] = $variantItem->price;
                $variantTotalAmount += $variantItem->price;
            }
        }
        // dd($variants);

        /** check discount */
        $productPrice = 0;

        if(checkDiscount($product)){
            $productPrice = $product->offer_price;
        }else {
            $productPrice = $product->price;
        }

        /** How to use shopping cart add to cart
         *
         * https://packagist.org/packages/anayarojo/shoppingcart
         * Cart::add(['id' => '293ad', 'name' => 'Product 1', 'qty' => 1, 'price' => 9.99, 'weight' => 550, 'options' => ['size' => 'large']]);
         *
        */

        $cartData = [];
        $cartData['id'] = $product->id;
        $cartData['name'] = $product->name;
        $cartData['qty'] = $request->qty;
        $cartData['price'] = $productPrice;
        $cartData['weight'] = 10;
        $cartData['options']['variants'] = $variants;
        $cartData['options']['variants_total'] = $variantTotalAmount;
        $cartData['options']['image'] = $product->thumb_image;
        $cartData['options']['slug'] = $product->slug;

        // dd($cartData);

        Cart::add($cartData);

        return response(['status' => 'success', 'message' => 'Added to cart successfully!']);
    }
}
