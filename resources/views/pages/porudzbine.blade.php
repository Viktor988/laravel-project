@extends('layouts.layout')
@section('title')
<title>Satovi Ciric-Porudzbine</title>
@endsection
@section('sredina')
<div id="sredinapor">

<div class="oceneproiz">
<h1 class="pornaslov">Ocenjeni proizvodi</h1>
 @if(count($upit1)==0)
    <h2 class="porudzbinaois">Niste ocenili proizvod!</h2>

@else

<table class="ocene">
<tr id="red">
      <th>Redni broj</th>
      <th>Slika</th>
      <th>Marka</th>
      <th>Model</th>
        <th>Ocena</th>

  </tr>


 @php $rb=1 @endphp
  @foreach($upit1 as $upit)
<tr><td>{{$rb}}</td><td><img src="{{asset('slike/'.$upit->slikamala)}}" class="ocslika"/></td><td>{{$upit->nazivMarka}}</td><td>{{$upit->model}}</td><td>{{$upit->ocena}}</td>


 @php $rb++ @endphp
@endforeach
</table>
@endif
</div>


<div class="oceneproiz">
<h1 class="pornaslov">Naručeni proizvodi</h1>
 @if(count($upit2)==0)
    <h2 class="porudzbinaois">Niste izvršili porudzbinu!</h2>
@else

<table class="ocene oc"cellspacing="0" cellpadding="0">
<tr id="red">
      <th>Redni broj</th>
      <th>Slika</th>
      <th>Marka</th>
      <th>Model</th>
      <th>Cena</th>
      <th>Kolicina</th>
      <th>Datum porudzbine</th>

  </tr>
 @php $rb=1 @endphp

  @foreach($upit2 as $upit3)
<tr><td>{{$rb}}</td><td><img src="{{asset('slike/'.$upit3->slikamala)}}" class="ocslika"/></td><td>{{$upit3->nazivMarka}}</td><td>{{$upit3->model}}</td><td>{{$upit3->cena*$upit3->kolicina}}</td><td>{{$upit3->kolicina}}</td><td>{{$upit3->datumKupovine}}</td></tr>


 @php $rb++ @endphp
@endforeach
</table>


@endif
</div>
</div>

@endsection
