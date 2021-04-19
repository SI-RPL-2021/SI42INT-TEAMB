<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class cash
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
        if (Auth::user() && Auth::user()->role == 'cashier'){
            return $next($request);
        }

        if (Auth::user()){
            Auth::logout();
        }
        return redirect('/')->with('error','You have not admin access');
    }
}
