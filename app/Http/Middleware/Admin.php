<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class Admin
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
        if(!Auth::check()){
            return redirect()->route('login');
        }
        if(Auth::user()->userType == 1){
            return $next($request);
        }
        if(Auth::user()->userType == 2){
            return redirect()->route('beekeeper');
        }
        if(Auth::user()->userType == 3){
            return redirect()->route('investor');
        }
        
    }
}
