@extends('layouts.layout')
@section('title')
<title>Satovi Ciric-Proizvodi</title>
@endsection
@section('sredina')

<h1 id="pojnaslov">Proizvodi</h1>
            <hr id="pojlinija">

            <div id="psredina">

                    <button type="button" id="filterdugme"><i class="fas fa-filter"></i> | <i class="fas fa-sort-alpha-down"></i></button>
                <!-- <input type="button" value="Filteri" id="filterdugme"/> -->
                <div id="filteri">
                    <form name="forma" action="#" method="get">
                    <div id="ide">
                        <div class="prvi">
<span class="tekstfilter">Marka:</span><select name="marke" class="liste" id="markal">
        <option value="0">Izaberite...</option>
        @foreach ($marke as $mar )
<option value="{{$mar->idmarka}}">{{$mar->nazivMarka}}</option>
@endforeach
</select></div>
</select>
<div class="prvi">
        <span class="tekstfilter">Pol:</span><select name="pol" class="liste"id="pollista">
    <option value="0">Izaberite...</option>
 @foreach ($pol as $po )
<option value="{{$po->idpol}}">{{$po->naziv}}</option>
@endforeach
</select>
</div>
<input type="text" id="trazi" name="trazi" placeholder="Pretraga..."/>
</div>
<div id="ide2">
        <div class="prvi">
                <span class="tekstfilter">Sortiraj:</span><select name="sortiraj" id="sort"class="liste">
    <option value="0">Izaberite...</option>
<option value="1">Po modelu od A-Z</option>
<option value="2">Po modelu od Z-A</option>
<option value="3">Po ceni opadajuće</option>
<option value="4">Po ceni rastuće</option>

</select>

</div>
<div class="prvi cenakl">
        <span class="tekstfilter">Cena do:</span><input type="range" name="cena" id="cenas" min="10000" max="50000" value="90000"/><i id="tekstc">50000</i>
</div>
<!-- <input type="button" id="dugme" value="Trazi"/> -->
<button type="button" id="dugme"><i class="fa fa-search"></i>Trazi</button>
</form>

<div id="izabrani">
</div>
</div>
             <div id="brojevi">
</div>
                </div>

                <div id="proizvodi">
                        @foreach ($proizvodi as $proiz )
                        <div class="proizvod">
                        <img src="{{ asset('slike/'.$proiz->slikamala) }}" alt="slika"/>
                           <p id="marka">{{ strtoupper( $proiz->nazivMarka  )}}</p>
                           <p id="model">{{$proiz->model}}</p>
                           <p id="cena">{{ $proiz->cena }},00 RSD</p>

                           <a href="/proizvod/{{$proiz->idproizvod}}" class="lopsirno">Opsirnije</a>

                          </div>

                            @endforeach

                </div>


                <div class="pag">
            {{ $proizvodi->links() }}

                  </div>


            </div>
@endsection
