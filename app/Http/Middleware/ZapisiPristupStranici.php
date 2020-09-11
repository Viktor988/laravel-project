<?php

namespace App\Http\Middleware;

use Closure;


class ZapisiPristupStranici
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


        $date = date('d-m-Y H:i:s');
        if(session()->has('korisnik')){
        $upisi=($date."\t ,".$request->ip()."\t".'Autorizovan:'.session()->get('korisnik')->email."\t ,".$request->url()."\n");
        $open = fopen(storage_path().'/app/file.txt', "a");
        if($open){
            $date = date('d-m-Y H:s');
            fwrite($open, "$upisi");
            fclose($open);}}
        else{
            $upisi=($date."\t ,".$request->ip()."\t".'Nije autorizovan'."\t ,".$request->url()."\n");
            $open = fopen(storage_path().'/app/file.txt', "a");
            if($open){
                fwrite($open, "$upisi");
                fclose($open);}}
        return $next($request);
    }}

