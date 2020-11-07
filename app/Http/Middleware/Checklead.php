<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class Checklead
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
        if (Auth::check()) {
            if (Auth::user()->role_id == 55) {
                return $next($request);    
            } else {
                return redirect()->route('index');
            }
            
                     
        }
        else{
            return redirect()->route('login');
        }
    }
}
