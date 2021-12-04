<?php

namespace App\Http\Middleware\student;

use Closure;
use Illuminate\Http\Request;

class student
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     return $next($request);
    // }


    public function handle(Request $request, Closure $next)
    {
        if(session()->has('student_idx')){
            return $next($request);
        }
        return redirect('student/login')->with('error', "Your current session is destroyed");
    }


}
