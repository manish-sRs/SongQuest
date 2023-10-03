<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class UserRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
   
     public function handle(Request $request, Closure $next)
     {
      
        if(Auth::check() && Auth::user()->role == "admin"){
            return $next($request);
        }
        if(Auth::check() && Auth::user()->role == "recommender"){
            return $next($request);
        }
        if(Auth::check() && Auth::user()->role == "user"){
            return $next($request);
        }
        
        
        
        return redirect('/');
    }
}
