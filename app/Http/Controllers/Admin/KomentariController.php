<?php

namespace App\Http\Controllers\Admin;
use App\Models\Komentari;
use  App\Http\Controllers\MojController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ProizvodController;
class KomentariController extends MojController
{
    public function __construct(){
        $this->komentari=new Komentari();

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $komentarr=$this->komentari->dohvatiKomentare($id);

        return view("adminPanel/pages/komentari",['komentari'=>$komentarr]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   try{
        $komentarr=$this->komentari->obrisiKomentar($id);
        return response()->json($komentarr);}
        catch(PDOException $e){
            Log::error($e->getMessage());}
    }
}
