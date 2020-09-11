@extends('layouts.layout')
@section('title')
<title>Satovi Ciric-Pocetna</title>
@endsection
@section('sredina')




            <h1 id="pojnaslov">Početna</h1>
            <hr id="pojlinija">
            <div id="sredina">

                <div class="slika prva">
<img src="slike/na.jpg"/>
                </div>
                <div class="slika">
<p id="tekstpocetna">Kompanija Satovi Ćirić nastavlja sa novinama u svom poslovanju. U želji da svoj asortiman proizvoda još više približi potrošačima, u Beogradu je 25. aprila 2013. godine otvorila svoj novi maloprodajni objekat u TC Stadion. Novu radnju sa velikim izborom satova i nakita možete posetiti na Voždovcu, u ulici Zaplanjska br. 32. Satovi Ćirić baš na ovoj lokaciji, svakome pored ljubavi ka satovima pridodaje još po jednu. Kod dama se ljubav ka satovima spaja sa ljubavlju ka kupovini, a kod gospode sa fudbalom. Time se može reći da je odabir pomenute lokacije odlično mesto za ljubitelje satova, shopinga i fudbala.</p>
                </div>


            </div>

            <div id="sr2">
<h2>Najprodavaniji proizvodi</h2>
<hr id="pojlinija">
        <div class="slider">

            <ul id="listapr">
                @foreach ($proizvod as $proiz )


            <li><div class="proizvod pocetna">
             <img src="{{ asset('slike/'.$proiz->slikamala) }}" alt="slika"/>
                           <p id="marka">{{ strtoupper( $proiz->nazivMarka  )}}</p>
                           <p id="model">{{$proiz->model}}</p>
                           <p id="cena">{{ $proiz->cena }},00 RSD</p>

                           <a href="/proizvod/{{$proiz->idproizvod}}" class="lopsirno">Opsirnije</a>
            </div>
             @endforeach
            </li>
            </ul>
            <a href="#" class="slider-arrow sa-left"><i class="fas fa-angle-left"></i></a>

            <a href="#" class="slider-arrow sa-right"><i class="fas fa-angle-right"></i></a>
            </div>


</div>
@endsection

