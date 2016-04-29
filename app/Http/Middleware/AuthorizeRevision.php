<?php

namespace App\Http\Middleware;

use Closure;
use App\Doc;

class AuthorizeRevision
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
        if (request()->user()->id === $request->doc->user_id) {
            request()->session()->flash("flash_message", "You cannot revise your own document.");
            return back();
        }

        return $next($request);
    }
}
