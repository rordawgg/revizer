<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Doc;
use App\Revision;

class RevisionsController extends Controller
{
    public function create(Doc $doc)
    {
    	return view("revisions.create")->with("docId", $doc->id);
    }

    public function show(Doc $doc, Revision $revision)
    {
    	return view("revisions.show")->withRevision($revision)->withDoc($doc);
    }
}
