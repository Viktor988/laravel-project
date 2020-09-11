<?php

namespace App\Http\Controllers\Admin;
use  App\Http\Controllers\MojController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proizvodi;
use App\Models\Marke;
use App\Models\Pol;
use Intervention\Image\ImageManager;
use  App\Http\Requests\ubaciProizvodAdmin;
use  App\Http\Requests\azurirajProizvodAdmin;
class ProizvodiAdminController extends MojController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->proizvodi=new Proizvodi();
        $this->marke=new Marke();
        $this->pol=new Pol();

    }
    public function index()
    {

        return view("adminPanel/pages/proizvodi",["proizvodi"=> $this->proizvodi->dohvatiSveProizvodeSaPag(),'marke'=>  $this->marke->dohvatiMarke()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { $poll= $this->pol->dohvatiPolove();
        $marka=$this->marke->dohvatiMarke();

        return view("adminPanel/pages/ubacivanjeProizvoda",['pol'=>$poll,'marke'=>$marka]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,ubaciProizvodAdmin $pr)
    {
        $marka=$request->input('marka');
        $model=$request->input('model');
        $cena=$request->input('cena');
        $karakteristike=$request->input('karakteristike');
        $pol=$request->input('pol');
        $slika=$request->file('slika');
        $novaslika=$this->ubaciSliku($slika);
        try{
        $sve=$this->proizvodi->ubaciProizvod($marka,$model,$cena,$karakteristike,$novaslika[0],$novaslika[1],$pol);
    return redirect("adminPanel/proizvodi");
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
    {   $poll= $this->pol->dohvatiPolove();
        $marka=$this->marke->dohvatiMarke();
        $proizvodi=$this->proizvodi->dohvatiJedan($id);
        try{
        return view("adminPanel/pages/formaZaAzuriranjeProizvoda",["proiz"=> $proizvodi,'pol'=>$poll,'marke'=>$marka]);}
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
    public function update(Request $request,azurirajProizvodAdmin $pr, $id)
    {
        $marka=$request->input('marka');
        $model=$request->input('model');
        $cena=$request->input('cena');
        $karakteristike=$request->input('karakteristike');
        $pol=$request->input('pol');
        $slika=$request->file('slika');

        if($slika!=null){
            $novaslika=$this->ubaciSliku($slika);
        try{
        $sve=$this->proizvodi->azurirajProizvodSaSlikom($id,$marka,$model,$cena,$karakteristike,$novaslika[0],$novaslika[1],$pol);
        return redirect("adminPanel/proizvodi");
            }
        catch(PDOException $e){
            Log::error($e->getMessage());
           }}
        else{
            try{
            $sve=$this->proizvodi->azurirajProizvodBezSlike($id,$marka,$model,$karakteristike,$cena,$pol);
            return redirect("adminPanel/proizvodi");
            }
            catch(PDOException $e){
                Log::error($e->getMessage());
               }
    }}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   try{
        $this->proizvodi->izbrisiProizvod($id);}
        catch(PDOException $e){
            Log::error($e->getMessage());
           }
    }
}
