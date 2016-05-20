<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Query;
use App\Revision;
use App\Doc;
use App\Profile;

class QueryController extends Controller
{
    /**
     * Given keyword, queries Models(Doc, Revision, Profile) and returns matching results.
     */
    public function search(Request $request)
    {
    	$query = new Query($request->input("keyword"));
    	$docs = $query->searchByKeyword((new Doc), ["title", "description"]);
    	$revisions = $query->searchByKeyword((new Revision), ["description"]);
    	$profiles = $query->searchByKeyword((new Profile), ["username"]);

    	return view("search.results")
    					->withDocs($docs)
    					->withRevisions($revisions)
    					->withProfiles($profiles);
    }
}
