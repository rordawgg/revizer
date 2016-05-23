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

        switch ($request->input('type')) {
            case 'docs':
                $results["docs"] = $query->searchByKeyword((new Doc), ["title", "description"]); // this needs some work... maybe
                break;

            case 'revisions':
                $revisions = $query->searchByKeyword((new Revision), ["description"]);
                $results['revisions'] = $revisions;
                break;

            case 'profiles':
                $profiles = $query->searchByKeyword((new Profile), ["username"]);
                $results['profiles'] = $profiles;
                break;
            
            default:
                $docs = $query->searchByKeyword((new Doc), ["title", "description"]);
                $revisions = $query->searchByKeyword((new Revision), ["description"]);
                $profiles = $query->searchByKeyword((new Profile), ["username"]);
                $results['docs'] = $docs;
                $results['profiles'] = $profiles;
                $results['revisions'] = $revisions;
                break;
        }

    	return view("search.results")->withResults($results);
    }
}
