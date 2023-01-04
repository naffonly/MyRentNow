<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminMiddleware
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

        if (in_array($request->user()->roleId,$levels)) {
            return $next($request);
        }

        if (Auth::user()->roleId == 1) {
            return Redirect::to('home'); 
        }elseif (Auth::user()->roleId == 2) {
            return Redirect::to('dasboard'); 
        }
        abort(401);
    }
}
