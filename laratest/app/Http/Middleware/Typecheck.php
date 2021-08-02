<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Typecheck
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
        if($request->session()->get('username')=='admin')
        {
            return $next($request);
        }
        else 
        {
            return redirect('/home');
        }
    }
}
