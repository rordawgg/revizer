<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;

use App\Http\Requests;

class ProfileController extends Controller
{
    public function show($username)
    {
    	//$user = Profile::where("username", "=", $username)->first();
    }
}
