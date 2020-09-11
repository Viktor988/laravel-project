<?php

namespace App\Http\Middleware;

use Closure;

class DaLiJeAdmin
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

            if(session()->get('korisnik')->iduloga!=4){

                return redirect('pocetna');
            }


        return $next($request);
    }
}
