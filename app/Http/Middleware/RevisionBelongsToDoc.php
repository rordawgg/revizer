<?php

namespace App\Http\Middleware;
use Closure;
use App\Doc;
use App\Revision;

class RevisionBelongsToDoc
{
    /**
     * Handle an incoming request.
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
            request()->session()->flash("flash_message", "Revision Mismatch!");
            return redirect("/doc/{$doc->id}");     
    }
}
