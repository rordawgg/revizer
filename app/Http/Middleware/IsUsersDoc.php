<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsUsersDoc
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
        
        if (Auth::user()->id !== $doc->user_id) {
            return redirect("/doc/{$doc->id}");
        }
        return $next($request);
    }
}
