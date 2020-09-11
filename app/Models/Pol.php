<?php
namespace App\Models;
class Pol{

public function dohvatiPolove(){
    $upit=\DB::table('pol')->get();
    return $upit;
}


}
