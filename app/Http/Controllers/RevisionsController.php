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
    	return view("revisions.create")->withDoc($doc);
    }

    public function show(Doc $doc, Revision $revision)
    {
    	return view("revisions.show")->withRevision($revision)->withDoc($doc);
    }

    public function store(Request $request, Doc $doc)
    {
    	$this->validate($request, [
    		"body" => "required|min:1"
    	]);

    	$rev = new Revision;
    	$rev->user_id = $request->user()->id;
    	$rev->description = $request->input("description");
    	$rev->body = $request->input("body");
    	$doc->revisions()->save($rev);

    	return redirect("/doc/{$doc->id}");
    }

    public function revise(Doc $doc, Revision $revision) 
       {
       $accepted = Revision::find($revision->id);
       $accepted->accepted = 1;
       $accepted->save();
       $test = Revision::where("doc_id", "=", $revision->doc_id)->where("id", "!=", $revision->id)->delete();


       return redirect("/doc/$doc->id");
       }
}
