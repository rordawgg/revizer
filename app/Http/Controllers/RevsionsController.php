<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RevsionsController extends Controller
{
    public function create(Doc $doc)
    {
    	return view("revisions.create")->with("docId", $doc->id);
    }

    public function show(Rev $rev)
    {
    	
    }
}
