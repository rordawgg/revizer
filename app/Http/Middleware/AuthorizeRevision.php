<?php

namespace App\Http\Middleware;

use Closure;
use App\Doc;
use App\Helpers\Notify;

class AuthorizeRevision
{
    /**
     * Restrict owner from revising own document.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (request()->user()->id === $request->doc->user_id) {
            Notify::alert('You cannot revise your own document', 'danger');
            return back();
        }

        return $next($request);
    }
}
