<?php

namespace App\Http\Middleware;

use Closure;

class articleCond
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
        if( $request->input('membre[]') == null){
         return redirect('/articles/create');
       }

        return $next($request);
    }
}
