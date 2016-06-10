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
                $query->in(new Doc)->fields(["title", "description"])->searchKeep("docs");
                break;

            case 'revisions':
                $query->in(new Revision)->fields(["description"])
                                                        ->cond("accepted", "=", 0)
                                                        ->searchKeep("revisions");
                break;

            case 'profiles':
                $query->in(new Profile)->fields(["username"])->searchKeep("profiles");
                break;
    
            default:
                $query->in(new Doc)->fields(["title", "description"])->searchKeep("docs");
                $query->in(new Revision)->fields(["description"])
                                                    ->cond("accepted", "=", 0)
                                                    ->searchKeep("revisions");
                $query->in(new Profile)->fields(["username"])->searchKeep("profiles");
                break;
        }

        return view("search.results")->withResults($query->results);
    }
}
