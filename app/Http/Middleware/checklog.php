<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class checklog
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
            if (Auth::user()->role_id == 99) {
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
