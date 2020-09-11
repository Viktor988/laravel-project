<?php

namespace App\Http\Controllers;
use App\Models\Ocene;
use App\Models\Korpa;
use App\Models\Proizvodi;
use Illuminate\Http\Request;
use  App\Http\Controllers\MojController;
use App\Models\Proizvod;
use Illuminate\Support\Facades\Mail;
use App\Mail\Kontaktmail;
use App\Http\Requests\KontaktProvera;
class FrontEndController extends MojController
{
    private $proba;
    public function __construct(){
        $this->proizvodi=new Proizvodi();
        $this->proizvod=new Ocene();
        $this->korpa=new Korpa();

    }
    public function vratiPocetneProizvode(Request $request){
        $proizvod=$this->proizvodi->prikaziNajprodavanijeProizvode();
        return view('pages/pocetna',['proizvod'=>$proizvod]);
     }
     public function vratiAutora(){
        return view('pages/autor');
     }
     public function vratiOceneIProizvode(){
        $id=session()->get('korisnik')->idkorisnik;
        $upit1=$this->proizvod->prikaziOcenjene($id);
        $upit2=$this->korpa->izlistajKupljene($id);
        return view('pages/porudzbine',["upit1"=>$upit1,"upit2"=>$upit2]);

       }
       public function vratiKontakt(){

        return view("pages/kontakt");
    }
       public function posaljiPorukuAdminu(Request $request,KontaktProvera $kon){
            $email=$request->input('email');
            $data=array(
                'email' => $request->email,
                'naslov' => $request->naslov,
                'text' =>$request->text
            );
            Mail::to("SajtSatovi@gmail.com")->send(new Kontaktmail($data));
            return back()->with("poruka","Poruka je poslata administratoru.");


       }









        }
