<?php

namespace App\Http\Controllers\Admin;
use  App\Models\Korisnici;
use  App\Models\Uloge;
use  App\Http\Controllers\MojController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ubaciKorisnikaAdmin;
class KorisniciAdminController extends MojController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

  public function __construct(){
      $this->korisnik=new Korisnici();
      $this->uloge=new Uloge();
  }
    public function index()
    {
        $this->korisnik=new Korisnici();
        $kor=$this->korisnik->prikaziSveKorisnike();
        try{
        return view("adminPanel/pages/korisnici",["korisnici"=>$kor]);}
        catch(PDOException $e){
            Log::error($e->getMessage());
           }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $ul=$this->uloge->dohvatiUloge();
        try{
        return view('adminPanel/pages/ubaciKorisnika',["uloge"=>$ul]);}
        catch(PDOException $e){
            Log::error($e->getMessage());
           }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,ubaciKorisnikaAdmin $admin)
    {
       $ime=$request->input('ime');
       $prezime=$request->input('prezime');
       $email=$request->input('email');
       $lozinka=$request->input('lozinka');
       $uloga=$request->input('uloga');
       $t=time();
       $aktivan=0;
       $vreme=date("Y-m-d H:i:s",$t);
       try{
       $kor=$this->korisnik->ubaciKorisnika($ime,$prezime,$email,$lozinka,$uloga,$vreme,$aktivan);
        return redirect('/adminPanel/korisnici')->with('poruka',"Korisnik je dodat.");
    }
       catch(PDOException $e){
        Log::error($e->getMessage());
       }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $kor=$this->korisnik->prikaziJednog($id);
        $ul=$this->uloge->dohvatiUloge();
        try{
      return view("adminPanel/pages/formaZaAzuriranjeKorisnika",['kor'=>$kor,'uloge'=>$ul]);}
      catch(PDOException $e){
        Log::error($e->getMessage());
       }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,ubaciKorisnikaAdmin $admin, $id)
    {
        $ime=$request->input('ime');
        $prezime=$request->input('prezime');
        $email=$request->input('email');
        $lozinka=$request->input('lozinka');
        $uloga=$request->input('uloga');
        $t=time();
        $aktivan=0;
        $vreme=date("Y-m-d H:i:s",$t);
        try{
        $kor=$this->korisnik->azururajKorisnika($id,$ime,$prezime,$email,$lozinka,$uloga,$vreme,$aktivan);
        return redirect('/adminPanel/korisnici');}
        catch(PDOException $e){
            Log::error($e->getMessage());
           }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
        $kor=$this->korisnik->izbrisiKorisnika($id);
            return response(null,204);
    }
    catch(PDOException $e){
        Log::error($e->getMessage());
       }
    }
}
