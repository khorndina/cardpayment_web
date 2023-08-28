<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorShopProfileController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = Vendor::where('user_id', Auth::user()->id)->first();
        // dd($profile);
        return view('vendor.shop-profile.index', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'banner'=>'nullable|image|max:3000',
            'shop_name'=>'required|max:200',
            'phone'=>'required|max:100',
            'email'=>'required|email|max:100',
            'address'=>'required|max:100',
            'description'=>'required|max:500',
            'fb_link'=>'nullable|url',
            'tw_link'=>'nullable|url',
            'insta_link'=>'nullable|url',
        ]);

        $shopProfile = Vendor::where('user_id', Auth::user()->id)->first();

        $bannerPath = $this->updateImage($request, 'banner', 'uploards', $request->banner);

        $shopProfile->banner = empty(!$bannerPath) ? $bannerPath : $shopProfile->banner;
        $shopProfile->shop_name = $request->shop_name;
        $shopProfile->phone = $request->phone;
        $shopProfile->email = $request->email;
        $shopProfile->address = $request->address;
        $shopProfile->description = $request->description;
        $shopProfile->fb_link = $request->fb_link;
        $shopProfile->tw_link = $request->tw_link;
        $shopProfile->insta_link = $request->insta_link;

        $shopProfile->save();

        toastr('Updated Successfully!', 'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
