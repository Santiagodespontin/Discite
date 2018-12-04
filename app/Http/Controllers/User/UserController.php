<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;
class UserController extends Controller
{
    public function show()
    {
        return view('profile');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'birthdate' => 'required',
            'profilePic' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $request->user()->name = $request->input('name');
        $request->user()->lastname = $request->input('lastName');
        $request->user()->birthdate = $request->input('birthdate');

        if (isset($request['zona'])) {
            $request->user()->zona = $request->input('zona');
        }
        if (isset($request['about'])) {
            $request->user()->about = $request->input('about');
        }

        if ($request->hasFile('profilePic')) {
            $image = $request->file('profilePic');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/users');
            $image->move($destinationPath, $name);
            $request->user()->profilePic = $name;
        }

        $request->user()->save();

        return back()->with('success', 'Editado correctamente.');
    }
}
