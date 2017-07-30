<?php

namespace App\Http\Middleware;

use Closure;

class LuluMiddleware
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
        if(!is_object($request->user()) || $request->user()->name != 'monarinomimi')
        {
            return redirect('/');
        }
        return $next($request);
    }
}
