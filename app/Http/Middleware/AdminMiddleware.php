<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AdminMiddleware
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

        if(auth()->user()->admin == 1)
        {
            return $next($request);
        }
        else
        {   
        return view('auth.login')->withErrors('You are not logged in');
        }

    }
}