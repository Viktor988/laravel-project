<?php

namespace App\Http\Middleware;

use Closure;

class DaLiNijeUlogovan
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
        if(!session()->has('korisnik')){
            return redirect('/');
        }

        return $next($request);
    }
}
