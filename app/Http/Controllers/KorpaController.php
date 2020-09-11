<?php

namespace App\Http\Controllers;
use App\Models\Proizvodi;
use App\Models\Korpa;
use Illuminate\Http\Request;
use  App\Http\Controllers\MojController;
class KorpaController extends MojController
{
    public function __construct(){
        $this->proizvod=new Proizvodi();
        $this->korpa=new Korpa();

    }
    public function vratiKorpu(){
        return view('pages/korpa');
    }

    public function dohvatiProizvodeZaKorpu(){
        try{
        $pr=$this->proizvod->dohvatiSveProizvode();
        return response()->json($pr);}
        catch(PDOException $e){
            Log::error($e->getMessage());}
    }
    public function ubaciUkorpu(Request $request){
        $idk=session()->get('korisnik')->idkorisnik;
        $idp=$request->input('id');
        $kol=$request->input('kol');
        $isporuka=$request->input('isporuka');
        if(session()->get('korisnik')->iduloga==4){
            return response(null,401);
        }
        else{
        try{
        $pr=$this->korpa->ubaciUkorpu($idk,$idp,$kol,$isporuka);
        return response()->json($pr);}
        catch(PDOException $e){
            Log::error($e->getMessage());}

    }}
}
