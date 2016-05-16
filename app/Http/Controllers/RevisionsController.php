<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Diff;
use App\Http\Requests;
use App\Doc;
use App\Revision;

class RevisionsController extends Controller
{
    public function create(Doc $doc)
    {
      $revision = $doc->hasAcceptedRevision();
          if ($revision !== null) {
              $doc->body = $revision->body;
          }
    	return view("revisions.create")->withDoc($doc);
    }

    public function show(Doc $doc, Revision $revision)
    {
      $rev = $doc->hasAcceptedRevision();
      if ($revision !== null) {
          $doc->body = $rev->body;
      }

      $diff = (new Diff($doc->body, $revision->body))->htmlDiff();
    	return view("revisions.show")->withRevision($revision)->withDoc($doc)->withDiff($diff);
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
      $revision->accepted = 1;
      $revision->save();
      $doc->removeUnaccepted();

      return redirect("/doc/$doc->id");
    }

    public function delete(Doc $doc, Revision $revision) 
      {
        $revision->delete();
        return redirect("/doc/$doc->id");
      }
}
