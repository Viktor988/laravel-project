<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::pattern('id', '[0-9]+');
Route::get('/', "FrontEndController@vratiPocetneProizvode")->middleware('ZapisiPristupStranici');
Route::get('/pocetna', "FrontEndController@vratiPocetneProizvode")->middleware('ZapisiPristupStranici');

//admin
Route::get('/adminPanel', "Admin\PocetnaAdminController@prikaziStatistike")->middleware('ZapisiPristupStranici','DaLiNijeUlogovan','DaLiJeAdmin');
Route::get('/adminPanel/filtriraj', "Admin\PocetnaAdminController@filtriranjePoDatumu")->name('proba');
Route::group(['middleware' => ['ZapisiPristupStranici','DaLiNijeUlogovan','DaLiJeAdmin']], function () {
Route::resource('/adminPanel/korisnici',"Admin\KorisniciAdminController");
Route::resource('/adminPanel/proizvodi',"Admin\ProizvodiAdminController");
Route::resource('/adminPanel/komentari',"Admin\KomentariController");
Route::resource('/adminPanel/marke',"Admin\MarkeController");
});
// prijava i registracija
Route::get('/prijava',"PrijavaiRegistracijaController@vratiFormu")->middleware('ZapisiPristupStranici','DaLiJeUlogovan');
Route::post('/prijava/provera',"PrijavaiRegistracijaController@proveriPrijavu");
Route::get('/odjava',"PrijavaiRegistracijaController@odjavi");
Route::post('/registracija',"PrijavaiRegistracijaController@registruj");
// korpa
Route::get('/korpa',"KorpaController@vratiKorpu")->middleware('ZapisiPristupStranici');
Route::get('/korpa/prikaziProizvode',"KorpaController@dohvatiProizvodeZaKorpu");
Route::post('/korpa',"KorpaController@ubaciUkorpu");

//proizvodi
Route::get('/proizvodi',"ProizvodiController@vratiProizvode")->middleware('ZapisiPristupStranici');
Route::get('/proizvodi/prikazi',"ProizvodiController@filtriraj")->name('ide');
//proizvod
Route::get('/proizvod/{id}',"ProizvodController@dohvatiJedan")->middleware('ZapisiPristupStranici');
Route::post('/proizvod',"ProizvodController@ubaciKomentar");
Route::get('/proizvod/{id}/dohvatiKomentareSve',"ProizvodController@dohvatiKomentareSve");
Route::delete('/proizvod/{id}',"ProizvodController@obrisiKomentar");
Route::get('/proizvod/{id}/proveriGlasanje',"ProizvodController@proveriGlasanje");
Route::post('/proizvod/glasaj',"ProizvodController@oceni");
//izmena profil i porudzbine
Route::get('/izmeniProfil',"IzmeniProfilController@vratiJednog")->middleware('ZapisiPristupStranici','DaLiNijeUlogovan');
Route::patch('/izmeniProfil',"IzmeniProfilController@azurirajInf");
Route::get('/porudzbine',"FrontEndController@vratiOceneIProizvode")->middleware('ZapisiPristupStranici','DaLiNijeUlogovan');;
//kontakt
Route::get('/kontakt',"FrontEndController@vratiKontakt")->middleware('ZapisiPristupStranici');
Route::post('/kontakt',"FrontEndController@posaljiPorukuAdminu");
//autor
Route::get('/autor',"FrontEndController@vratiAutora")->middleware('ZapisiPristupStranici');
