<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\FlashSale;
use App\Models\FlashSaleItem;
use Illuminate\Http\Request;

class FlashSaleController extends Controller
{
    public function index(){
        $flashSale = FlashSale::first();
        // dd($flashSale);

        // $flashsaleItems = FlashSaleItem::where('status', 1)->get();
        // dd($flashsaleItem);

        /**used Paginate for seperate produtc */
        $flashsaleItems = FlashSaleItem::where('status', 1)->orderBy('id', 'DESC')->Paginate(2);

        return view('frontend.page.flash-sale', compact('flashSale', 'flashsaleItems'));
    }
}
