<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Doc;

class DocsController extends Controller
{
    
	public function index()
	{
		$docs = Doc::all();

		return view("docs.index")->withDocs($docs);
	}

	public function show(Doc $doc)
	{
		return view("docs.show")->withDoc($doc);
	}

	public function edit(Doc $doc)
	{
		return view("docs.edit")->withDoc($doc);
	}
}
