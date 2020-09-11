<?php

namespace App\Http\Controllers;
use App\Models\Korisnici;
use  App\Http\Controllers\MojController;
use Illuminate\Http\Request;
use App\Http\Requests\IzmeniProfil;
class IzmeniProfilController extends MojController
{

    public function __construct(){
        $this->korisnik=new Korisnici();
    }
    public function vratiJednog(){
        $id=session()->get('korisnik')->idkorisnik;
        $sve=$this->korisnik->prikaziJednog($id);
        return view("pages/izmeniKorisnik",["inf"=>$sve]);
    }
    public function azurirajInf(Request $request,IzmeniProfil $iz){
       $id=$request->input('id');
       $ime=$request->input('ime');
       $prezime=$request->input('prezime');
       $email=$request->input('email');
       $lozinka=$request->input('lozinka');
       $t=time();
       $vreme=date("Y-m-d H:i:s",$t);
       try{
       $sve=$this->korisnik->azurirajKorisnik($id,$ime,$prezime,$email,$lozinka,$vreme);
       return redirect('/izmeniProfil')->with('poruka',"Vasi podaci su izmenjeni.Ulogujte se ponovo da bi videli.");}
       catch(PDOException $e){
           \Log::error($e->getMessage());

       }


    }

}
