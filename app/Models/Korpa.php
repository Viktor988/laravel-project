<?php
namespace App\Models;
class Korpa{
public function ubaciUkorpu($idk,$idp,$kolicina,$adresa){
$upit=\DB::table('korpa')->insert(["idkorisnik"=>$idk,"idproizvod"=>$idp,"kolicina"=>$kolicina,"adresaIsporuke"=>$adresa]);
return $upit;}
public function izlistajKupljene($idk){
$upit=\DB::table('korpa AS ko')->join('korisnici AS k',"k.idkorisnik","=","ko.idkorisnik")->join("proizvodi AS pr","pr.idproizvod","=","ko.idproizvod")->join("marke AS m","m.idmarka","=","pr.idmarka")
->where('k.idkorisnik',$idk)->get();
return $upit;}
public function izlistajNarudzbine(){
    $upit=\DB::table('korpa AS ko')->join('korisnici AS k',"k.idkorisnik","=","ko.idkorisnik")->join("proizvodi AS pr","pr.idproizvod","=","ko.idproizvod")->join("marke AS m","m.idmarka","=","pr.idmarka")
    ->select('k.idkorisnik','m.nazivMarka','pr.model','pr.cena','ko.kolicina','k.ime','k.prezime','ko.adresaIsporuke','ko.datumKupovine')
    ->orderBy('datumKupovine','desc')->simplePaginate(4);
    return $upit;}


}
