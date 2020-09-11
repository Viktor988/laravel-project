<?php
namespace App\Models;
class Korisnici{

    public function login($email,$password){
        $upit=\DB::table('korisnici')->where([['email','=',$email],["lozinka","=",$password]])->first();
        return $upit;}

    public function registruj($ime,$prezime,$email,$lozinka,$lozinkaponovo,$uloga,$datum,$aktivan){
        $upit=\DB::table('korisnici')->insert(['ime'=>$ime,'prezime'=>$prezime,'email'=>$email,'lozinka'=>$lozinka,'lozinkaponovo'=>$lozinka,"aktivan"=>$aktivan,'iduloga'=>$uloga,"datumKreiranja"=>$datum]);
        return $upit;
    }

    public function prikaziJednog($id){

        $upit=\DB::table('korisnici')->where('idkorisnik',$id)->first();
        return $upit;
    }

    public function azurirajKorisnik($id,$ime,$prezime,$email,$pass,$datum){
        $upit=\DB::table('korisnici')->where("idkorisnik",$id)->update(["ime"=>$ime,"prezime"=>$prezime,"email"=>$email,"lozinka"=>$pass,"datumAzuriranja"=>$datum]);
        return $upit;
    }
    public function azurirajAktivnost($id,$aktivnost,$vreme){

        $upit=\DB::table('korisnici')->where("idkorisnik",$id)->update(["aktivan"=>$aktivnost,"poslednjaAktivnost"=>$vreme]);
        return $upit;
    }
    public function azurirajOdjavljen($id,$aktivnost,$vreme){

        $upit=\DB::table('korisnici')->where("idkorisnik",$id)->update(["aktivan"=>$aktivnost,"poslednjeOdjavljivanje"=>$vreme]);
        return $upit;
    }
/// admin deo
    public function prikaziSveKorisnike(){

        $upit=\DB::table('korisnici AS k')->join('uloge AS u','k.iduloga','=','u.iduloga')->get();
        return $upit;
    }
    public function ubaciKorisnika($ime,$prezime,$email,$lozinka,$uloga,$vreme,$aktivan){
        $upit=\DB::table('korisnici')->insert(['ime'=>$ime,'prezime'=>$prezime,'email'=>$email,'lozinka'=>$lozinka,'lozinkaponovo'=>$lozinka,'iduloga'=>$uloga,'datumKreiranja'=>$vreme,'aktivan'=>$aktivan]);
        return $upit;
    }
    public function izbrisiKorisnika($id){
        $upit=\DB::table('korisnici')->where('idkorisnik',$id)->delete();
        return $upit;
    }
    public function azururajKorisnika($id,$ime,$prezime,$email,$lozinka,$uloga,$vreme,$aktivan){
        $upit=\DB::table('korisnici')->where('idkorisnik',$id)->update(['ime'=>$ime,'prezime'=>$prezime,'email'=>$email,'lozinka'=>$lozinka,'lozinkaponovo'=>$lozinka,'iduloga'=>$uloga,'datumAzuriranja'=>$vreme,'aktivan'=>$aktivan]);
        return $upit;
    }
    public function brojAktivnihKorisnika(){
        $upit=\DB::table('korisnici')->where('aktivan',1)->count();
        return $upit;
    }
    public function brojNeAktivnihKorisnika(){
        $upit=\DB::table('korisnici')->where('aktivan',0)->count();
        return $upit;
    }
    public function brojRegistrovanih(){
        $upit=\DB::table('korisnici')->count();
        return $upit;
    }
    public function nikadPrijavljen(){
        $upit=\DB::table('korisnici')->where('poslednjaAktivnost',null)->count();
        return $upit;
    }
    public function filtriranje($trazi){
        $upit=\DB::table('korisnici AS k')->join('uloge AS u','u.iduloga','=','k.iduloga')->where('k.datumKreiranja','like','%'.$trazi.'%')
        ->orWhere('k.poslednjaAktivnost','like','%'.$trazi.'%')->orWhere('k.poslednjeOdjavljivanje','like','%'.$trazi.'%')->get();
        return $upit;

    }


}
