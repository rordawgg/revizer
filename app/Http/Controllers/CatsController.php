<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cat;

class CatsController extends Controller
{
    public function index()
    {
    	$cats = Cat::all();
    	return view("docs.categories")->withCats($cats);
    }

    public function show($cat)
    {
    	$cat = Cat::where("name", "=", $cat)->first();
    	return view('docs.index')->withDocs($cat->docs)->withTitle($cat->name);
    }
}
