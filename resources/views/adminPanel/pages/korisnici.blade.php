@extends('layouts.admin')

@section('sredina')
<div id="ceo">
<form action="{{route('korisnici.create')}}" method="get">
<button type="submit" class="btn btn-success dodaj">Dodaj korisnika</button>
</form>

<table class="table" id="tabela">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Ime</th>
      <th scope="col">Prezime</th>
      <th scope="col">E-mail</th>
    <th scope="col">Uloga</th>
    <th scope="col">Datum Kreiranja</th>
    <th scope="col">Azuriraj</th>
    <th scope="col">Obrisi</th>
    </tr>
  </thead>
  <tbody>
  @php
  $br=1 @endphp
  @foreach ($korisnici as $kor )


    <tr>
      <th scope="row">{{$br++}}</th>
      <td>{{ $kor->ime }}</td>
       <td>{{ $kor->prezime }}</td>
         <td>{{ $kor->email }}</td>
        <td>{{ $kor->naziv }}</td>
        <td>{{ $kor->datumKreiranja }}</td>

                <form>
            <td><a href="{{ url('/adminPanel/korisnici/'.$kor->idkorisnik)  }}/edit" class="btn btn-primary">Azuriraj</button></td>
                <td><button type="button" data-id={{ $kor->idkorisnik }} class="btn btn-danger obrisiKorisnika">Obrisi</button></td>
                </form>
    </tr>
    @endforeach

  </tbody>
</table>

</div>






@endsection
