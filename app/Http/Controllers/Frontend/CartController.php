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
        // dd($product);

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
        $cartData['options']['image'] = $product->thum_image;
        $cartData['options']['slug'] = $product->slug;

        // dd($cartData);

        Cart::add($cartData);

        return response(['status' => 'success', 'message' => 'Added to cart successfully!']);
    }

    public function cartDetail(){

        $cartItems = Cart::content();
        // dd($cartItems);

        // if(count($cartItems) === 0){
        //     Session::forget('coupon');
        //     toastr('Please add some products in your cart for view the cart page', 'warning', 'Cart is empty!');
        //     return redirect()->route('home');
        // }

        // $cartpage_banner_section = Adverisement::where('key', 'cartpage_banner_section')->first();
        // $cartpage_banner_section = json_decode($cartpage_banner_section?->value);
        return view('frontend.page.cart-detail', compact('cartItems'));
    }

    /** Update product quantity */
    public function updateProductQty(Request $request)
    {
        // dd($request->all());
        // dd($request->rowId, $request->quantity);

        Cart::update($request->rowId, $request->quantity);

        // Store the updated quantity in the session
        session()->put('cart.quantity', $request->quantity);
        // dd(session('cart.quantity'));

        $productTotal = $this->getProductTotal($request->rowId);

        return response(['status' => 'success', 'message' => 'Product Quantity Updated!', 'product_total' => $productTotal]);
    }

    /** get product total */
    public function getProductTotal($rowId)
    {
       $product = Cart::get($rowId);
       $total = ($product->price + $product->options->variants_total) * $product->qty;
       return $total;
    }

    /** clear all cart products */
    public function clearCart()
    {
        Cart::destroy();

        return response(['status' => 'success', 'message' => 'Cart cleared successfully']);
    }

    /** Remove product form cart */
    public function removeProduct($rowId)
    {
        Cart::remove($rowId);
        toastr('Product removed succesfully!', 'success', 'Success');
        return redirect()->back();
    }

    /** Get cart count */
    public function getCartCount()
    {
        return Cart::content()->count();
    }
}
