<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\ProductVariantItem;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function cartDetail(){

        $cartItems = Cart::content();
        // dd($cartItems);

        if(count($cartItems) === 0){
            Session::forget('coupon');
            toastr('Please add some products in your cart for view the cart page', 'warning', 'Cart is empty!');
            return redirect()->route('home');
        }

        // $cartpage_banner_section = Adverisement::where('key', 'cartpage_banner_section')->first();
        // $cartpage_banner_section = json_decode($cartpage_banner_section?->value);

        return view('frontend.page.cart-detail', compact('cartItems'));
    }

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
        }elseif($product->qyt < $request->quantity){
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


    /** Update product quantity */
    public function updateProductQty(Request $request)
    {
        // dd($request->all());
        // dd($request->rowId, $request->quantity);

        $productId = Cart::get($request->rowId)->id;
        // dd($productId);
        $product = Product::findOrFail($productId);
        // dd($product);

        /** check product quantity */
        if($product->qyt === 0){
            return response(['status' => 'error', 'message' => 'Product stock out']);
        }elseif($product->qyt < $request->quantity){
            return response(['status' => 'error', 'message' => 'Quantity not available in our stock']);
        }

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
        // return response(['status' => 'success', 'message' => 'Cart cleared successfully']);
        return response()->json(['status' => 'success', 'message' => 'Cart cleared successfully']);
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

    /** Get all cart products */
    public function getCartProducts()
    {
        return Cart::content();
    }

    /** Romve product form sidebar cart */
    public function removeSidebarProduct(Request $request)
    {
        Cart::remove($request->rowId);

        return response(['status' => 'success', 'message' => 'Product removed successfully!']);
    }

    /** get cart total amount */
    public function cartTotal()
    {
        $total = 0;
        foreach(Cart::content() as $product){
            $total += $this->getProductTotal($product->rowId);
        }

        return $total;
    }

    /** Apply coupon */
    public function applyCoupon(Request $request)
    {
        // dd($request->all());

        if($request->coupon_code === null){
            return response(['status' => 'error', 'message' => 'Coupon filed is required']);
        }

        $coupon = Coupon::where(['code' => $request->coupon_code, 'status' => 1])->first();

        if($coupon === null){
            return response(['status' => 'error', 'message' => 'Coupon not exist!']);
        }elseif($coupon->start_date > date('Y-m-d')){
            return response(['status' => 'error', 'message' => 'Coupon not exist!']);
        }elseif($coupon->end_date < date('Y-m-d')){
            return response(['status' => 'error', 'message' => 'Coupon is expired']);
        }elseif($coupon->total_use >= $coupon->quantity){
            return response(['status' => 'error', 'message' => 'you can not apply this coupon']);
        }

        if($coupon->discount_type === 'amount'){
            Session::put('coupon', [
                'coupon_name' => $coupon->name,
                'coupon_code' => $coupon->code,
                'discount_type' => 'amount',
                'discount' => $coupon->discount_value
            ]);
        }elseif($coupon->discount_type === 'percent'){
            Session::put('coupon', [
                'coupon_name' => $coupon->name,
                'coupon_code' => $coupon->code,
                'discount_type' => 'percent',
                'discount' => $coupon->discount_value
            ]);
        }

        return response(['status' => 'success', 'message' => 'Coupon applied successfully!']);
    }


    /** Calculate coupon discount */
    // public function couponCalculation()
    // {
    //     if(Session::has('coupon')){
    //         $coupon = Session::get('coupon');
    //         // dd($coupon);
    //         $subTotal = getCartTotal();
    //         // dd($subTotal);
    //         if($coupon['discount_type'] === 'amount'){
    //             $total = $subTotal - ($coupon['discount']);
    //             return response(['status' => 'success', 'cart_total' => $total, 'discount' => $coupon['discount']]);
    //         }elseif($coupon['discount_type'] === 'percent'){
    //             $discount = $subTotal - ($subTotal * $coupon['discount'] / 100);
    //             $total = $subTotal - $discount;
    //             return response(['status' => 'success', 'cart_total' => $total, 'discount' => $discount]);
    //         }
    //     }else {
    //         $total = getCartTotal();
    //         return response(['status' => 'success', 'cart_total' => $total, 'discount' => 0]);
    //     }
    // }

    public function couponCalculation()
    {
        if (Session::has('coupon')) {
            $coupon = Session::get('coupon');
            $cartItems = Cart::content();
            $totalDiscount = 0;
            $subTotal = getCartTotal();

            foreach ($cartItems as $item) {
                $qty = $item->qty;
                $discount = $coupon['discount'];

                if ($coupon['discount_type'] === 'percent') {
                    $discountAmount = $item->price * ($discount / 100);
                } else {
                    $discountAmount = $discount;
                }

                $itemDiscount = $discountAmount * $qty;
                $totalDiscount += $itemDiscount;
                $total = $subTotal - $totalDiscount;
            }

            return response(['status' => 'success', 'cart_total' => $total, 'discount' => $totalDiscount]);
        } else {
            $total = getCartTotal();
            return response(['status' => 'success', 'cart_total' => $total, 'total_discount' => 0]);
        }
    }
}
