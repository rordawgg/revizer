<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Doc;
use App\Revision;
use App\Category;
use Auth;

class DocsController extends Controller
{

	public function index()
	{
		$docs = Doc::all();

		return view("docs.index")->withDocs($docs);
	}

	public function show(Doc $doc)
	{
		$revision = $doc->hasAcceptedRevision();

		if ($revision !== null) {
            $doc->body = $revision->body;
        }
        
		$revisions = Revision::where("doc_id", "=", $doc->id)
											->where("accepted", "=", 0)
											->get();

		return view("docs.show")->withDoc($doc)->withRevisions($revisions);
	}

	public function create()
	{
		return view("docs.create");
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			"title" => "required",
			"description" => "required",
			"criteria" => "required",
			"body" => "required"
		]);

		$user = Auth::user();
		$doc = new Doc($request->all());
		$user->docs()->save($doc);

		return redirect("/doc/" . $doc->id);
	}

	public function edit(Doc $doc)
	{
		return view("docs.edit")->withDoc($doc);
	}

	public function update(Request $request, Doc $doc)
	{
		$this->validate($request, [
			"title" => "required",
			"description" => "required",
			"body" => "required",
			"criteria" => "required"
		]);

		$doc->fill($request->all());
		$doc->save();

		return redirect("/doc/" . $doc->id);
	}

	public function search(Request $request) 
	{
		$search = Doc::SearchByKeyword($request->keyword)->get();
		return view("docs.search_results")->withSearch($search);
	}

	public function categories()
	{
		$categories = Category::all();
		return view("docs.categories")
			->withCategories($categories);
	}

	public function show_category(Category $category)
	{
		$category->load('docs');
		return view("docs.show_category")->withCategory($category);
	}
}
