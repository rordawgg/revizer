<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Profile;
use App\User;

use App\Http\Requests;

class ProfileController extends Controller
{
    public function show($username = null)
    {
        if (isset($username)) {
            $profile = Profile::where("username", "=", $username)->first();
        } else {
            $profile = Auth::user()->profile;
        }

        $docs = User::find($profile->user_id)->docs;
    	return view("profiles.show")->withProfile($profile)->withDocs($docs);
    }

    public function edit()
    {
    	$user = Auth::user()->load("profile");
    	return view("profiles.edit")->withUser($user);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|max:20|min:5|unique:profiles|alpha-dash',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'first_name' => 'max:30|min:0|alpha-dash',
            'last_name' => 'max:30|min:0|alpha-dash'
        ]);

        $inputs = $request->all();
        $user = Auth::user()->load('profile');

        $user->update([
            'email' => $inputs['email'],
            'password' => bcrypt($inputs['password'])
        ]);
        $user->profile->update([
            'username' => $inputs['username'],
            'first_name' => $inputs['first_name'],
            'last_name'=> $inputs['last_name'],
            'avatar' => md5($inputs['email'])
        ]);

        return redirect('/profile/me');
    }
}
