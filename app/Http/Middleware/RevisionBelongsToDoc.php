<?php

namespace App\Http\Middleware;
use Closure;
use App\Doc;
use App\Revision;

class RevisionBelongsToDoc
{
    /**
     * Check of revision is related to the document
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $doc = $request->doc;
        $rev = $request->revision;

        
        if (($rev->doc_id === $doc->id) && ($rev->accepted === 0)) {
            return $next($request);  
        }

        \App\Helpers\Notify::alert("Revision Mismatch", "danger");
        return redirect("/doc/{$doc->id}");     
    }
}
