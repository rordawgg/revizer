<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cat;

class CatsController extends Controller
{
    /**
     * Get all Category names, and return them to partial view "categories".
     */
    public function index()     
    {
    	$cats = Cat::all();
    	return view("docs.categories")->withCats($cats);
    }

    /**
    * Get all Documents with specific category.
    */
    public function show($cat)
    {
    	$cat = Cat::where("name", "=", $cat)->first();
        $docs = $cat->docs()->paginate(15);
    	return view("docs.index")->withDocs($docs)->withTitle($cat->name);
    }
}
