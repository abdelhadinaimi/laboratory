<?php

namespace App\Http\Middleware;

use Closure;

class theseCond
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
       if( $request->input('encadreur_int') == null && $request->input('encadreur_ext') == null){
         return redirect('/theses/create');
       }
       elseif( $request->input('coencadreur_int') == null && $request->input('coencadreur_ext') == null){
         return redirect('/theses/create');
       }
        return $next($request);
    }
}
