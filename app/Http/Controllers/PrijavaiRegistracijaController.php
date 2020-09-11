<?php

namespace App\Http\Controllers;
use App\Models\Korisnici;
use Illuminate\Http\Request;
use App\Http\Requests\ProveraPrijava;
use App\Http\Requests\ProveraRegistracija;
use Symfony\Component\HttpFoundation\Response;
use  App\Http\Controllers\MojController;
class PrijavaiRegistracijaController extends MojController
{

  public function __construct(){
      $this->korisnik=new Korisnici();
  }
public function vratiFormu(){
    return view('/pages/prijava');
}

    public function proveriPrijavu(Request $request,ProveraPrijava $provera){
            $email=$request->input('email');
            $lozinka=$request->input('lozinka');
            $korisnik=$this->korisnik->login($email,$lozinka);
            try{
            if($korisnik){
            $request->session()->put("korisnik",$korisnik);
            $vreme=$this->vratiVreme();
            $this->korisnik->azurirajAktivnost(session()->get('korisnik')->idkorisnik,1,$vreme);
            return redirect("/");}
            else{
            return redirect("/prijava")->with("poruka","Morate se prvo registrovati!");}}
            catch(PDOException $e){
                \Log::error($e->getMessage());
            }}

    public function odjavi(Request $request){
            if($request->session()->has('korisnik')){
              $vreme=$this->vratiVreme();
                try{
                $this->korisnik->azurirajOdjavljen(session()->get('korisnik')->idkorisnik,0,$vreme);
            $request->session()->forget('korisnik');
            return redirect("/");}
            catch(PDOException $e){
            Log::error($e->getMessage());}
        }}



        public function registruj(Request $request,ProveraRegistracija $r){
            $ime=$request->input('ime');
            $prezime=$request->input('prezime');
            $email=$request->input('email');
            $lozinka=$request->input('lozinka');
            $ponovo=$request->input('ponovo');
            $uloga=5;
            $vreme=$this->vratiVreme();

            $aktivan=0;
            try{
            $this->korisnik->registruj($ime,$prezime,$email,$lozinka,$ponovo,$uloga,$vreme,$aktivan);
            return response(null,204);}
            catch(PDOException $e){
                Log::error($e->getMessage());}

        }
    }
