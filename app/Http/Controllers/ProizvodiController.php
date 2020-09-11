<?php

namespace App\Http\Controllers;
use App\Models\Proizvodi;
use App\Models\Marke;
use App\Models\Pol;
use Illuminate\Http\Request;
use  App\Http\Controllers\MojController;

class ProizvodiController extends MojController
{

    public function __construct(){
        $this->proizvodi=new Proizvodi();
        $this->marke=new Marke();
        $this->pol=new Pol();
    }

   public function vratiProizvode(){
    $dohvati=$this->proizvodi->dohvatiProizvode();
    $marke=$this->marke->dohvatiMarke();
    $pol=$this->pol->dohvatiPolove();
    try{
       return view("pages/proizvodi",["proizvodi"=>$dohvati,"marke"=>$marke,"pol"=>$pol]);}
       catch(PDOException $e){
        Log::error($e->getMessage());}
   }
   public function vratiAjax($page){
       try{
   $dohvati=$this->proizvodi->dohvatiProizvode();
    return response()->json($dohvati);}
    catch(PDOException $e){
        Log::error($e->getMessage());}
   }
   public function filtriraj(Request $requst){
       $marka=$requst->input('marke');
       $pol=$requst->input('pol');
       $sort=$requst->input('sortiraj');
       $cena=$requst->input('cena');
       $trazi=$requst->input('trazi');
       $pag=$requst->input('pag');
       try{
       $dohvati=$this->proizvodi->filtriranje($marka,$pol,$sort,$cena,$trazi);
       return response()->json($dohvati);}
       catch(PDOException $e){
        Log::error($e->getMessage());}
   }
   public function broj(Request $requst){
       try{
    $dohvati=$this->proizvodi->dohvatiProizvode();
    return response()->json($dohvati);}
    catch(PDOException $e){
        Log::error($e->getMessage());}
       }

}



