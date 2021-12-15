<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CheckLogin
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
        if(Auth::user()->level == "admin"){

            return $next($request);
        }
        else if(Auth::user()->level == "Superadmin") {
            return $next($request);
        }
   
        return redirect('login')->with('error',"You don't have admin access.");
    }
}