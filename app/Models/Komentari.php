<?php
namespace App\Models;
class Komentari{
    public function dohvatiKomentare($id){
        $upit=\DB::table('komentari AS kom')->join("proizvodi AS pr","kom.idproizvod","=","pr.idproizvod")->join("korisnici AS k","kom.idkorisnik","=","k.idkorisnik")->where("kom.idproizvod",$id)->orderBy("vreme","DESC")->get();
        return $upit;
    }
    public function ubaciKomentar($idproizvod,$idKorisnik,$polje){
        $upit=\DB::table('komentari')->insert(['komentar'=>$polje,'idkorisnik'=>$idKorisnik,'idproizvod'=>$idproizvod]);
        return $upit;
    }
    public function obrisiKomentar($id){
        $upit=\DB::table('komentari')->where("idkomentar",$id)->delete();
        return $upit;
    }
}
