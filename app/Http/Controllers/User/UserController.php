<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;
class UserController extends Controller
{
    public function profile(){
        $user = Auth::user();
        return view('profile')->with('user',$user);
        // return view('profile' ,array('user' => Auth::user()));
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
