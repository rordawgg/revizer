<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Profile;
use App\User;

use App\Http\Requests;
use App\Helpers\Notify;
class ProfileController extends Controller
{
    /**
     * Get a selected users profile
     * @return profile view with user docs
     */
    public function show($username = null)
    {
        if (isset($username)) {
            $profile = Profile::where("username", "=", $username)
                                ->firstOrFail();

        } else {
            $profile = Auth::user()->profile;
        }

        $docs = User::find($profile->user_id)
                    ->docs()
                    ->paginate(15);
    	return view("profiles.show")->withProfile($profile)->withDocs($docs);
    }
    /**
     * Modify the current user profile information
     */
    public function edit()
    {
    	$user = Auth::user()
                    ->load("profile");
    	return view("profiles.edit")->withUser($user);
    }

    /**
     * Validate user form input and update.
     * Update the current user profile
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            "password" => "min:6|confirmed",
            "first_name" => "max:30|min:0|alpha-dash",
            "last_name" => "max:30|min:0|alpha-dash"
        ]);

        $inputs = $request->all();
        $user = Auth::user()
                    ->load("profile");
        $user->update([
            "password" => bcrypt($inputs["password"])
        ]);
        $user->profile->update([
            "first_name" => $inputs["first_name"],
            "last_name"=> $inputs["last_name"],
        ]);

        Notify::alert('Successfully updated profile', 'success');
        return redirect("/user/me");
    }
}
