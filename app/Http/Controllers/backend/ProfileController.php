<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        return view('admin.profile.index');
    }

    public function updateProfile(Request $request){
        // dd($request->all());
        $request->validate([
            'username' => 'required|max:100',
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

        $users->name = $request->username;
        $users->email = $request->email;

        $users->Save();

        toastr()->success('Profile Updated Successfully');
        return redirect()->back();
    }

    public function updatePassword(Request $request){
        // dd($request->all());
        $request->validate([
            'Current_password' => 'required|Current_password',
            'password' => 'required|confirmed|min:8'
        ]);

        $request->user()->update([
            'password' => bcrypt($request -> password)
        ]);

        toastr()->success('Password Updated Successfully');
        return redirect()->back();
    }
}
