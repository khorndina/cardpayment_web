<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        $generalSetting = GeneralSetting::first();
        return view('admin.setting.index', compact('generalSetting'));
    }

    public function updateGeneralSetting(Request $request){
        // dd($request->all());
        $request->validate([
            'site_name' => 'required|max:200',
            'layout' => 'required|max:100',
            'contact_email' => 'required|email|max:200',
            'currency_name' => 'required|max:100',
            'currency_icon' => 'required|max:10',
            'timezone' => 'required|max:100',
        ]);

        GeneralSetting::updateOrCreate(
            ['id' => 1],
            [
                'site_name' => $request->site_name,
                'layout' => $request->layout,
                'contact_email' => $request->contact_email,
                'currency_name' => $request->currency_name,
                'currency_icon' => $request->currency_icon,
                'timezone' => $request->timezone
            ]
        );

        toastr('Flash Sale Updated Successfully!','success');
        return redirect()->back();
    }
}
