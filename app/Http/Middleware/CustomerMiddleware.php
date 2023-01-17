<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CustomerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,...$levels)
    {
        // if ($request->user()->roleId == User::ROLE_ADMIN) {
        //     # code...
        //     return $next($request);
        // }else if ($request->user()->roleId == User::ROLE_USER){
        //     # code...
        // }

   

       if (!Auth::user()->roleId == 2) {
            return Redirect::to('home'); 
        }
    
       return $next($request);
    }
}
