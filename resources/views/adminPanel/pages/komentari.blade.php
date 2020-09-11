@extends('layouts.admin')

@section('sredina')
<div id="ceo">
<form action="#" method="get">
@csrf
@method('DELETE')
<table class="table kom">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Id osobe</th>
      <th scope="col">Komentar</th>
      <th scope="col">Obrisi</th>
    </tr>
  </thead>
  <tbody>
  @php $br=1;@endphp
  @if(count($komentari)==0)
   <tr>
 <th scope="row"></th>
      <td></td>
      <td>Ovaj proizvod nema komentara!</td>
   <td></td>
      </tr>
      @endif
  @foreach ($komentari as $kom )
    <tr>

      <th scope="row">{{$br++}}</th>
      <td>{{ $kom->idkorisnik }}</td>
      <td>{{ $kom->komentar }}</td>
   <td><button type="button" data-pr={{$kom->idproizvod}} data-id={{ $kom->idkomentar }} class="btn btn-danger obrisiKomentar">Obrisi</button></td>
    </tr>

      @endforeach

  </tbody>
</table>
</div>






@endsection
