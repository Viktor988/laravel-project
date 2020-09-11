<?php

namespace App\Http\Controllers;
use App\Models\Proizvodi;
use App\Models\Marke;
use App\Models\Pol;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
class MojController extends Controller
{
    protected $proizvodi;
    protected $marke;
    protected $pol;
    protected $proizvod;
    protected $komentari;
    protected $ocene;
    protected $korisnik;
    protected $uloge;
    protected $korpa;

    public function __construct(){
        $this->proizvodi=new Proizvodi();
        $this->marke=new Marke();
        $this->pol=new Pol();

    }
   public function ucitajFajl(){

  $fn = fopen(storage_path().'/app/file.txt',"r");
  $pr=[];
  while(! feof($fn))  {
	$result = fgets($fn);
	 $pr[]=$result;
  }
return $pr;
  fclose($fn);
}
    public function vratiVreme(){
    $t=time();
    $vreme=date("Y-m-d H:i:s",$t);
    return $vreme;
     }
    public function ubaciSliku($slika){
        $direkiva=public_path()."/slike/";
        $slikaime1=time()."mala".$slika->getClientOriginalName();
        $slika->move($direkiva,$slikaime1);
        $img=\Image::make($direkiva.$slikaime1);
        $img->backup();
        $img->resize(400, null, function ($constraint) {
            $constraint->aspectRatio();});
        $img->save($direkiva.$slikaime1);
        $img->reset();
        $img=\Image::make($direkiva.$slikaime1);
        $img->resize(750, null, function ($constraint) {
            $constraint->aspectRatio();});
        $vel="velika".$slikaime1;
        $img->save($direkiva.$vel);
        return [$slikaime1,$vel];

    }

}
