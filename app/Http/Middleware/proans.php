<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class proans
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
        if(session()->has('tcode')){
            return $next($request);
        }
        return redirect('prospective/dashboard')->with('error', "Exam portal unavailable");
    }
}
