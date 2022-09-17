<?php

namespace App\Http\Middleware;
//impot Auth package
use Illuminate\Support\Facades\Auth;
use Closure;

class Admin
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
        // checking the logged in user
        if(Auth::check()){

             if(Auth::user()->isAdmin()){

                return $next($request);
            }
            
        }
      // if not logged in 
      return redirect('404');
       
    }
}
