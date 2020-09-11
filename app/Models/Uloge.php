<?php
namespace App\Models;
class Uloge{

public function dohvatiUloge(){
    $upit=\DB::table('uloge')->get();
    return $upit;
}


}
