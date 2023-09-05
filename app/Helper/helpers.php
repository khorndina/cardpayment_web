<?php
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
