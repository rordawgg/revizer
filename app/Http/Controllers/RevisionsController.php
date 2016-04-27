<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RevisionsController extends Controller
{
    public function create(Doc $doc)
    {
    	return view("revisions.create")->withDoc($doc);
    }
}
