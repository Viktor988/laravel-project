<?php
namespace App\Models;
class Marke{

public function dohvatiMarke(){
    $upit=\DB::table('marke')->get();
    return $upit;
}
public function obrisiMarku($id){
    $upit=\DB::table('marke')->where('idmarka',$id)->delete();
    return $upit;
}
public function ubaciMarku($naziv){
    $upit=\DB::table('marke')->insert(['nazivMarka'=>$naziv]);
    return $upit;
}


}
