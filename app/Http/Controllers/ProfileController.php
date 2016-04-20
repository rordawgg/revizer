<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use App\Doc;

use App\Http\Requests;

class ProfileController extends Controller
{
    public function show($username)
    {
    	$profile = Profile::where("username", "=", $username)->first();
    	$docs = Doc::where("user_id", "=", $profile->user_id)->get();
    
    	return view("profiles.show")->withProfile($profile)->withDocs($docs);
    }
}
