<?php
namespace App\Models;
class Ocene{

    public function proveriGlasanje($idk,$idp){
        $upit=\DB::table('ocenjivanje')->where([['idproizvod',"=",$idp],['idkorisnik',"=",$idk]])->count();
        return $upit;}
    public function glasaj($idk,$idp,$ocena){
        try{
        $upit=\DB::table('ocenjivanje')->insert(['idkorisnik'=>$idk,"idproizvod"=>$idp,"ocena"=>$ocena]);
        return $upit;}
        catch(PDOException $e){
            echo $e->getMessage();
          return response(null,401);
        }
    }
    public function prikaziBrojOcena($id){
        $upit=\DB::table('ocenjivanje')->where("idproizvod",$id)->count();
        return $upit;
    }
    public function prikaziProsekOcena($id){
        $upit=\DB::table('ocenjivanje')->where("idproizvod",$id)->avg('ocena');
        return $upit;
    }
    public function prikaziOcenjene($id){
        $upit=\DB::table('ocenjivanje AS o')->join('proizvodi AS pr','pr.idproizvod','=','o.idproizvod')->join('korisnici AS ko','ko.idkorisnik','=','o.idkorisnik')->join('marke AS m','m.idmarka','=','pr.idmarka')->where('ko.idkorisnik',$id)->get();
        return $upit;
    }



}

