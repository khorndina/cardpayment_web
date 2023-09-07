<?php

use Illuminate\Support\Facades\Session;

/**Set sidebar active */

function setActive(array $route){
    if(is_array($route)){
        foreach($route as $r){
            if(request()->routeIs($r)){
                return 'active';
            }
        }
    }
}


/**check product has discount or not? */

function checkDiscount($product){
    $currentDate = date('Y-m-d');

    if($product->offer_price > 0 && $currentDate >= $product->offer_start_date && $currentDate<= $product->offer_end_date){
        return true;
    }else{
        return false;
    }
}


/**Calculate Dicount Percent */

function calculateDiscountPercent($originalPrice, $discountPrice){
    $discountAmount =$originalPrice - $discountPrice;
    $discountPercent = ($discountAmount / $originalPrice) * 100;

    return $discountPercent;
}

function productType(string $type){
    switch ($type) {
        case 'new_arrival':
            return 'New';
            // break;
        case 'featured_product':
                return 'Featured';
                // break;
        case 'top_product':
                return 'Top>';
                // break;
        case 'best_product':
            return 'Best';
            // break;

        default:
            return '';
            // break;
    }
}

/** get total cart amount */
function getCartTotal(){
    $total = 0;
    foreach(\Cart::content() as $product){
        $total += ($product->price + $product->options->variants_total) * $product->qty;
    }
    return $total;
}


// get payment total amount
// function getMainCartTotal(){
//     if(Session::has('coupon')){
//         $coupon = Session::get('coupon');
//         // dd($coupon);
//         $subTotal = getCartTotal();
//         if($coupon['discount_type'] === 'amount'){
//             $total = $subTotal - $coupon['discount'];
//             return $total;
//         }elseif($coupon['discount_type'] === 'percent'){
//             $discount = $subTotal - ($subTotal * $coupon['discount'] / 100);
//             $total = $subTotal - $discount;
//             return $total;
//         }
//     }else {
//         $total = getCartTotal();
//         return $total;
//     }
// }

// get payment total amount
function getMainCartTotal(){
    if(Session::has('coupon')){
        $coupon = Session::get('coupon');
        $cartItems = \Cart::content();
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
            $totla = $subTotal - $totalDiscount;
        }

        return $totla;
    }else {
        $total = getCartTotal();
        return $total;
    }
}

// get Cart Discount
// function getCartDiscount(){
//     if(Session::has('coupon')){
//         $coupon = Session::get('coupon');
//         // dd($coupon);
//         $subTotal = getCartTotal();
//         if($coupon['discount_type'] === 'amount'){
//             return $coupon['discount'];
//         }elseif($coupon['discount_type'] === 'percent'){
//             $discount = $subTotal - ($subTotal * $coupon['discount'] / 100);
//             return $discount;
//         }
//     }else {
//         return 0;
//     }
// }

// get Cart Discount
function getCartDiscount(){
    if (Session::has('coupon')) {
        $coupon = Session::get('coupon');
        $cartItems = \Cart::content();
        $totalDiscount = 0;

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
        }

        return $totalDiscount;
    } else {
        return 0;
    }
}

// get selected shipping Fee from session
function getShippingFee(){
    if(Session::has('shipping_method')){
        return Session::get('shipping_method')['cost'];
    }else{
        return 0;
    }
}


// get final Payment
function getFinalPayment(){
    return getMainCartTotal() + getShippingFee();
}
