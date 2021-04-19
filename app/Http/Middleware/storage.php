<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class storage
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user() && Auth::user()->role == 'storage'){
            return $next($request);
        }

        if (Auth::user()){
            Auth::logout();
        }
        return redirect('/')->with('error','You have not admin access');
    }
}
