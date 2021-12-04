<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class prospective
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
        if(session()->has('prospective')){
            return $next($request);
        }
        return redirect('prospective/tracker')->with('error', 'Session Expired');
    }
}
