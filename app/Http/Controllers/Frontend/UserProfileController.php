<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;

class UserProfileController extends Controller
{
    public function index(){
        return view('frontend.dashboard.profile');
    }

    public function ProfileUpdate(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|unique:users,email,'.Auth::user()->id,
            'image' => 'image|max:2048'
        ]);

        $users = Auth::user();

        if($request->hasFile('image')){

            if(File::exists(public_path($users->image))){
                File::delete(public_path($users->image));
            }

            $image = $request->image;
            $imageName = rand().'-'.$image->getClientOriginalName();
            $image->move(public_path('uploards'), $imageName);
            $path = "/uploards/".$imageName;
            $users->image = $path;
        }

        $users->name = $request->name;
        $users->email = $request->email;

        $users->Save();

        toastr()->success('Profile Updated Successfully');
        return redirect()->back();
    }
}
