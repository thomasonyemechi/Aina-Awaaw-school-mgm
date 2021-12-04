<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class esn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(session()->has('esn')){
            return $next($request);
        }
        return back()->with('error', "Unauthorized Page");
    }
}
