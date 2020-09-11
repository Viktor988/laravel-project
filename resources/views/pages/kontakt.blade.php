@extends('layouts.layout')
@section('title')
<title>Satovi Ciric-Kontakt</title>
@endsection
@section('sredina')
<div id="korpasredina">
<h1 id="pojnaslov">Kontakt</h1>
            <hr id="pojlinija">
            <p id="podnaslovk">Ako imate neka pitanja ili nedoumice obratite se putem E-maila.</p>
            <div id="kontsredina">

                <div id="informacije">
                    <h2 id="inf">INFORMACIJE:</h2>
                    <p class="inf">Adresa:</p><p class="opisinf">Zaplanjska broj 32. </p>
                    <p class="inf">Email:</p><p class="opisinf">viktorciric31@gmail.com</p>
                    <p class="inf">Telefon:</p><p class="opisinf">064-1212-121</p>

                </div>
                    <div id="kontaktforma">
                    <form action="{{url('/kontakt')}}" method='post'>
                    @csrf
                    @if(session()->has('korisnik'))
<input type="email" name="email"class="kmejl" id="mejl" value="{{session()->get('korisnik')->email}}" placeholder="E-mail"/>
@else
<input type="email" name="email"class="kmejl" id="mejl" placeholder="E-mail"/>
@endif
<input type="text" class="kmejl" name="naslov" id="naslov" placeholder="Naslov poruke"/>
<textarea rows="7" cols="50" name="text" id="tekstk" placeholder="Tekst poruke"></textarea>
@if(session('poruka'))
<div class="greskeizmena dobro">
        <ul><li>
{{ session('poruka') }}</li>
  </ul>
    </div>

@endif
@if ($errors->any())
    <div class="greskeizmena">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<input type="submit" value="Posaljite" id="kondugme"/>
</form>

                    </div>
            </div>








@endsection
