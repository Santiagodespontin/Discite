<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;
class UserController extends Controller
{
    public function profile(){
        return view('profile');
    }

    public function update_profilePic(Request $request){
        if ($request->hasFile('profilePic')){
            $profilePic = $request->file('profilePic');
            $filename = time().".".$profilePic->getClientOriginalExtension();
            Image::make($profilePic)->resize(300,300)->save( public_path('/img/user' . $filename));

            $user = Auth::user();
            $user->profilePic = $filename;
            $user -> save();
        }
        return view('profile');
    }
}
