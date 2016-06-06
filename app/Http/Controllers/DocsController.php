<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Doc;
use App\Revision;
use App\Cat;
use Auth;
use App\Helpers\Notify;

class DocsController extends Controller
{

	/**
	 * Get all Documents and return them to index page.
	 */
	public function index()
	{
		$docs = Doc::orderBy('updated_at', 'desc')->paginate(15);
		
		return view("docs.index")->withDocs($docs)->withTitle("Documents");
	}

	/**
	 * Get specific document by ID, and return page "docs/show" with actitive revision(if applicable),
	 *	and current revisions.
	 */
	public function show(Doc $doc)
	{
		$revision = $doc->hasAcceptedRevision();
		if ($revision !== null) {
            $doc->body = $revision->body;
        }

		$revisions = $doc->revisions()
								->where("accepted", "=", 0)
								->get();  //refactor...
		
		return view("docs.show")->withDoc($doc)->withRevisions($revisions);
	}
	/**
	 * Return form "docs/create" with category current fields.
	 */
	public function create()
	{
		$cats = Cat::all();
		return view("docs.create")->withCats($cats);
	}

	/**
	 * Saves submitted Document
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			"title" => "required",
			"description" => "required",
			"criteria" => "required",
			"body" => "required",
			"category" => "exists:cats,id"
		]);

		$user = Auth::user();
		$doc = new Doc;
		$doc->title = $request->input("title");
		$doc->description = $request->input("description");
		$doc->cat_id = $request->input("category");
		$doc->criteria = $request->input("criteria");
		$doc->body = $request->input("body");
		$user->docs()->save($doc);
		Notify::alert('Successfully added document', 'success');

		return redirect("/doc/" . $doc->id);
	}

	/**
	 * Returns page "docs/edit"
	 */
	public function edit(Doc $doc)
	{
		return view("docs.edit")->withDoc($doc);
	}

	/**
	 * Update modified changes in the Document from the "doc/edit" page
	 */
	public function update(Request $request, Doc $doc)
	{
		$this->validate($request, [
			"title" => "required",
			"description" => "required",
			"body" => "required",
			"criteria" => "required"
		]);

		if ($request->input("new_version") == "true") {
			$doc->removeUnaccepted();
		}
		$rev = new Revision;
    	$rev->user_id = $request->user()->id;
    	$rev->body = $request->input("body");
    	$rev->accepted = 1;
    	$doc->revisions()->save($rev);

		$doc->fill($request->all());
		$doc->save();
		Notify::alert('Successfully changed document', 'success');
		return redirect("/doc/" . $doc->id);
	}

	/**
	 * Remove selected Document
	 */
	public function delete(Doc $doc)
	{
		$doc->revisions()->delete();
		$doc->delete();
		Notify::alert('Successfully removed document', 'success');
		return redirect("/doc");
	}
}
