<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class write
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
        if(session()->has('esn') AND session()->has('tcode')){
            return $next($request);
        }
        return back()->with('error', "No exam selected");
    }
}