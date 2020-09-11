<?php

namespace App\Http\Controllers\Admin;
use  App\Http\Controllers\MojController;
use  App\Http\Requests\ProveraMarka;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marke;
class MarkeController extends MojController
{
    public function __construct(){

        $this->marke=new Marke();


    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {




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
    public function store(Request $request,ProveraMarka $pr)
    {
        $markee=$request->input('marka');

        try{
        $this->marke->ubaciMarku($markee);
            return redirect("adminPanel/proizvodi");
    }
    catch(PDOException $e){
        Log::error($e->getMessage());}

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
    {
        $this->marke->obrisiMarku($id);
        return response(null,204);
    }
}
