<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FlashSale;
use App\Models\FlashSaleItem;
use App\Models\Slider;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $sliders = Slider::where('status', 1)->orderBy('serail','asc')->get();
        // dd($slider);
        $flashSale = FlashSale::first();
        // dd($flashSale);
        $flashsaleItems = FlashSaleItem::where('show_at_home', 1)->where('status', 1)->get();
        // dd($flashsaleItem);

        return view('frontend.Home.home', compact('sliders', 'flashSale', 'flashsaleItems'));
    }
}
