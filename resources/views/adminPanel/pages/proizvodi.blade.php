@extends('layouts.admin')

@section('sredina')
<div id="ceo">
<div class="modal" id="modalmarke" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Marke</h5>
        <button type="button" class="close marked" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <table class="table">
  <thead>
      <tr><td>Marka</td><td>Obrisi</td></tr><thead>
      @foreach($marke as $m)
      <tbody>
      <tr><td data-id={{ $m->idmarka }}>{{ $m->nazivMarka }}</td> <td><button type="button" data-id={{ $m->idmarka }} class="btn btn-danger obrisiMarku">Obrisi</button></td></tr></tbody>
      @endforeach
      </table>
      <div id="formamarka">
      <form action="{{ route('marke.store') }}" method="post">
      @csrf
      <input type="text" placeholder="marka" name="marka"/>
      <button type="submit" class="btn btn-primary">Ubaci marku</button>
      </form>
      </div>
      </div>
      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
      <div class="modal-footer">

        <button type="button" class="btn btn-primary dodajm">Dodaj marku</button>
        <button type="button" class="btn btn-secondary marked" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<form action="{{route('proizvodi.create')}}" method="get">

<button type="submit" class="btn btn-success dodaj">Dodaj proizvod</button>
<button type="button" class="btn btn-success marke">Marke</button>
</form>

<table class="table proizvodt" id="tabela">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Marka</th>
      <th scope="col">Model</th>
      <th scope="col">Cena</th>
    <th scope="col">Slika</th>
    <th scope="col">Karakteristike</th>
    <th scope="col">Pol</th>
    <th scope="col">Darum Postavljanja</th>
      <th scope="col">Azuriraj</th>
    <th scope="col">Obrisi</th>
       <th scope="col">Komentari</th>

    </tr>
  </thead>
  <tbody>
  @php
  $br=1 @endphp
  @foreach ($proizvodi as $kor )


    <tr>
      <th scope="row">{{$br++}}</th>
      <td>{{ $kor->nazivMarka }}</td>
       <td>{{ $kor->model }}</td>
         <td>{{ $kor->cena }}</td>
        <td><img src="{{ asset('slike/'.$kor->slikamala)  }}" class="slikaadmin"/></td>
        <td id="kartext">{{ $kor->karakteristike }}</td>
          <td>{{ $kor->naziv }}</td>
           <td>{{ $kor->datumpostavljanja }}</td>

                <form>
            <td><a href="{{ url('/adminPanel/proizvodi/'.$kor->idproizvod)  }}/edit" class="btn btn-primary">Azuriraj</a></td>
                <td><button type="button" data-id={{ $kor->idproizvod }} class="btn btn-danger obrisiProizvod">Obrisi</button></td>
                 <td><a href="{{ url('/adminPanel/komentari/'.$kor->idproizvod)  }}" data-id={{ $kor->idproizvod }} class="btn btn-warning">Komentari</a></td>
                </form>
    </tr>
    @endforeach

  </tbody>

</table>
  {{ $proizvodi->links() }}
</div>






@endsection
