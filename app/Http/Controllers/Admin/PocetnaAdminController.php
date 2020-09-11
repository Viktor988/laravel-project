<?php

namespace App\Http\Controllers\Admin;
use  App\Http\Controllers\MojController;
use  App\Models\Korisnici;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Korpa;
class PocetnaAdminController extends MojController
{
    public function __construct(){
        $this->korpa=new Korpa();
        $this->korisnik=new Korisnici();
    }


    public function prikaziStatistike(){
        $narudzbe=$this->korpa->izlistajNarudzbine();
        $korisnici=$this->korisnik->prikaziSveKorisnike();
        $brojAktivnih=$this->korisnik->brojAktivnihKorisnika();
        $brojNeAktivnih=$this->korisnik->brojNeAktivnihKorisnika();
        $brojRegistrovanih=$this->korisnik->brojRegistrovanih();
        $brojNikadPrijavljenih=$this->korisnik->nikadPrijavljen();
        $log=$this->ucitajFajl();
        return view('adminPanel/pages/pocetna',['narudzbe'=>$narudzbe,'korisnici'=>$korisnici,"logovi"=>$log,
            'brojAktivnih'=>$brojAktivnih,'brojNeAktivnih'=>$brojNeAktivnih,'brojRegistrovanih'=>$brojRegistrovanih,
            'nikadPrijavljen'=>$brojNikadPrijavljenih
        ]);
    }
    public function filtriranjePoDatumu(Request $request){
        $datum=$request->input('trazi');
        $korisnici=$this->korisnik->filtriranje($datum);
        return response()->json($korisnici);
    }
}
