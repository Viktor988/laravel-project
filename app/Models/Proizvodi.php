<?php
namespace App\Models;
class Proizvodi{

public function dohvatiProizvode(){
$upit=\DB::table('proizvodi AS p')->join('marke AS m','p.idmarka','=',"m.idmarka")->join('pol AS pp','p.idpol',"=","pp.idpol")->orderBy('p.datumPostavljanja','desc')->paginate(6);
return $upit;
}
public function dohvatiJedan($id){
    $upit=\DB::table('proizvodi AS p')->join('marke AS m','p.idmarka','=',"m.idmarka")->join('pol AS pp','p.idpol',"=","pp.idpol")->where("idproizvod",$id)->first();
    return $upit;}

public function dohvatiSveProizvode(){
    $upit=\DB::table('proizvodi AS p')->join('marke AS m','p.idmarka','=',"m.idmarka")->join('pol AS pp','p.idpol',"=","pp.idpol")->get();
    return $upit;
        }
public function filtriranje($marka,$pol,$sort,$cena,$trazi){
    $upit=\DB::table('proizvodi AS p')->join('marke AS m','p.idmarka','=',"m.idmarka")->join('pol AS pp','p.idpol',"=","pp.idpol")->where('cena','<=',$cena);
    if($marka!=0){
        $upit->where("p.idmarka",$marka);}
    if($pol!=0){
        $upit->where("p.idpol",$pol);}
    if($trazi!=''){
        $upit->where('p.model','like',"%".$trazi."%")
        ;}
    if($sort=="0"){
        $upit->orderBy('p.datumpostavljanja','desc');}
    if($sort=="1"){
        $upit->orderBy('p.model','asc');}
    if($sort=="2"){
        $upit->orderBy('p.model','desc');}
    if($sort=="3"){
        $upit->orderBy('p.cena','desc');}
    if($sort=="4"){
        $upit->orderBy('p.cena','asc');}
        $sve= $upit->paginate(6);
        return $sve;}

public function prikaziNajprodavanijeProizvode(){
    $upit=\DB::table('korpa AS ko')->join("proizvodi AS pr","pr.idproizvod","=","ko.idproizvod")->join("marke AS m","m.idmarka","=","pr.idmarka")->orderBy('ko.kolicina','desc')->limit(4)->get();
    return $upit;}

    public function dohvatiSlicneProizvode($id){
        $upit=\DB::select("SELECT * FROM proizvodi p inner join marke m on p.idmarka=m.idmarka inner join pol pp on pp.idpol=p.idpol where p.idpol in(SELECT po.idpol from proizvodi ppp inner join pol po on ppp.idpol=po.idpol WHERE ppp.idproizvod=$id) limit 2");

    return $upit;

    }

    //admin
public function ubaciProizvod($marka,$model,$cena,$karakteristike,$mslika,$vslika,$pol){
    $upit=\DB::table('proizvodi')->insert(['model'=>$model,'cena'=>$cena,'karakteristike'=>$karakteristike,'idmarka'=>$marka,'idpol'=>$pol,'slikamala'=>$mslika,'slikavelika'=>$vslika]);
return $upit;
}
public function izbrisiProizvod($id){
    $upit=\DB::table('proizvodi')->where('idproizvod',$id)->delete();
    return $upit;
}
public function azurirajProizvodBezSlike($id,$marka,$model,$karakteristike,$cena,$pol){
    $upit=\DB::table('proizvodi')->where('idproizvod',$id)->update(['model'=>$model,'cena'=>$cena,'karakteristike'=>$karakteristike,'idmarka'=>$marka,'idpol'=>$pol]);
return $upit;
}
public function azurirajProizvodSaSlikom($id,$marka,$model,$cena,$karakteristike,$mslika,$vslika,$pol){
    $upit=\DB::table('proizvodi')->where('idproizvod',$id)->update(['model'=>$model,'cena'=>$cena,'karakteristike'=>$karakteristike,'idmarka'=>$marka,'idpol'=>$pol,'slikamala'=>$mslika,'slikavelika'=>$vslika]);
return $upit;
}
public function dohvatiSveProizvodeSaPag(){
    $upit=\DB::table('proizvodi AS p')->join('marke AS m','p.idmarka','=',"m.idmarka")->join('pol AS pp','p.idpol',"=","pp.idpol")->orderBy('p.datumPostavljanja','desc')->simplePaginate(6);
    return $upit;
        }
}
// }





