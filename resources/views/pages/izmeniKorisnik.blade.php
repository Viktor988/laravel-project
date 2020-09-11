@extends('layouts.layout')
@section('title')
<title>Satovi Ciric-Izmena naloga</title>
@endsection
@section('sredina')

<div id="sredinak">
               <div class="promena">
                <h1 id="izmenan">Izmena naloga</h1>
                <form action="{{ url('/izmeniProfil') }}" method="post">

                    @csrf
                    @method('PATCH')
                <fieldset class="izmenakor">
                <legend id="opiskor">Ime</legend>
                <input type="text" value="{{session()->get('korisnik')->ime}}" id="izime" name="ime" class="polje"/>
                <input type="hidden" value="{{session()->get('korisnik')->idkorisnik}}" id="izid" name="id" class="polje"/>
               </fieldset>
               <fieldset class="izmenakor">
                <legend id="opiskor">Prezime</legend>
                <input type="text" value="{{session()->get('korisnik')->prezime}}" id="izprezime" name="prezime" class="polje"/>
               </fieldset>
               <fieldset class="izmenakor">
                <legend id="opiskor">E-mail</legend>
                <input type="email" value="{{session()->get('korisnik')->email}}" id="imail" name="email" class="polje"/>
               </fieldset>
               <fieldset class="izmenakor">
                <legend id="opiskor">Lozinka</legend>
                <input type="password" value="{{session()->get('korisnik')->lozinka}}" id="izlozinka" name="lozinka" class="polje"/>
               </fieldset>
               @if(session()->has('poruka'))
            <p> {{ session('poruka') }} </p>
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
               <input type="submit" value="Izmeni"id="dugmeiz"/>

</div></div>



















@endsection
