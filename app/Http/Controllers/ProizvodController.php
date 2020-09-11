<?php

namespace App\Http\Controllers;
use App\Models\Proizvodi;
use App\Models\Komentari;
use App\Models\Ocene;
use Illuminate\Http\Request;
use  App\Http\Controllers\MojController;

use Eastwest\Json\Facades\Json;
class ProizvodController extends MojController
{

    public function __construct(){
        $this->proizvod=new Proizvodi();
        $this->komentari=new Komentari();
        $this->ocene=new Ocene();
    }
    public function dohvatiJedan($id){
       
        $jedan=$this->proizvod->dohvatiJedan($id);
        $komentar=$this->komentari->dohvatiKomentare($id);
        $prosecnaOcena=$this->ocene->prikaziProsekOcena($id);
        $brojGlasova=$this->ocene->prikaziBrojOcena($id);
        $slicni=$this->proizvod->dohvatiSlicneProizvode($id);
        return view("pages/proizvod",["proizvod"=>$jedan,"komentari"=>$komentar,"ocena"=>$prosecnaOcena,"glasovi"=>$brojGlasova,"slicni"=>$slicni]);

    }
    public function dohvatiKomentareSve($id){
        $komentarr=$this->komentari->dohvatiKomentare($id);
        return response()->json($komentarr);
    }
    public function ubaciKomentar(Request $request){
            $greske=0;
        $idP=$request->input('idproiz');
        $idK=$request->input('idkorisnik');
        $polje=$request->input('polje');
        if($polje==""){
            $greske=1;}
            if($greske==0){
                try{
        $ubaci=$this->komentari->ubaciKomentar($idP,$idK,$polje);
        return response(null,204);}
        catch(PDOException $e){
            Log::error($e->getMessage());}}}

    public function obrisiKomentar($idKom){
        $id=$idKom;
        $ubaci=$this->komentari->obrisiKomentar($id);
        return response(null,204);
    }
    public function proveriGlasanje($idp){
        $idpp=$idp;
        $idko=session()->get('korisnik')->idkorisnik;
        try{
        $ubaci=  $this->ocene->proveriGlasanje($idko,$idpp);
        return response()->json($ubaci);}
        catch(PDOException $e){
            Log::error($e->getMessage());}
}
public function oceni(Request $request){
        $idp=$request->input('idproizvod');
        $idko=session()->get('korisnik')->idkorisnik;
        $vrednost=$request->input('vr');
        try{
        $ubaci=  $this->ocene->glasaj($idko,$idp,$vrednost);
        return response(null,204);}
        catch(PDOException $e){
            Log::error($e->getMessage());}}


}
