@extends('layouts.admin')

@section('sredina')
<div id="ceo">

<form action="{{ url('/adminPanel/proizvodi/'.$proiz->idproizvod)   }}" method="post" id="forme" enctype="multipart/form-data">
@csrf
@method('PATCH')
  <div class="form-group">
    <label for="formGroupExampleInput">Model</label>
    <input type="text" class="form-control" name="model" value={{ $proiz->model }} id="formGroupExampleInput" placeholder="Model">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Cena</label>
    <input type="text" class="form-control" name="cena"  value={{ $proiz->cena }} id="formGroupExampleInput2" placeholder="Cena">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Karakteristike</label>
    <textarea class="form-control" name="karakteristike"  id="exampleFormControlTextarea1" rows="3">
    {{ $proiz->karakteristike }}
    </textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1"></label>
    <img src="{{asset('slike/'.$proiz->slikamala)}}" class="adminslika"/>
    <input type="file" class="form-control-file" name="slika" id="exampleFormControlFile1">
  </div>
  <div class="form-group col-md-4">
      <label for="inputState">Marka</label>
      <select id="inputState" name="marka" class="form-control">
        @foreach ($marke as $m )
        @if($m->idmarka==$proiz->idmarka)
        <option value="{{$m->idmarka}}" selected>{{$m->nazivMarka}}</option>
        @else
         <option value="{{$m->idmarka}}">{{$m->nazivMarka}}</option>
         @endif
        @endforeach
      </select>
</div>
<div class="form-group col-md-4">
      <label for="inputState">Pol</label>
      <select id="inputState" name="pol" class="form-control">
        @foreach ($pol as $p )
         @if($p->idpol==$proiz->idpol)
        <option value="{{$p->idpol}}" selected>{{$p->naziv}}</option>
        @else
       <option value="{{$p->idpol}}">{{$p->naziv}}</option>
         @endif


        @endforeach
      </select>
</div>

<button type="submit" id="ubacidugme"class="btn btn-primary">Ubaci</button>
 @if ($errors->any())
    <div class="alert alert-danger pr">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    </div>
</form>
</div>







@endsection
