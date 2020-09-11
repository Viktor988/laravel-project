@extends('layouts.admin')

@section('sredina')
<div id="ceo">

<form action="{{ url('/adminPanel/korisnici/'.$kor->idkorisnik)  }}" method="post" id="forme">
@csrf
@method('PATCH')
  <div class="form-group">
    <label for="formGroupExampleInput">Ime</label>
    <input type="text" class="form-control" value={{ $kor->ime }} name="ime" id="formGroupExampleInput" placeholder="Ime">
     <input type="hidden" class="form-control" value={{ $kor->idkorisnik }} name="skriveno" id="formGroupExampleInput" placeholder="Ime">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Prezime</label>
    <input type="text" class="form-control"  value={{ $kor->prezime }} name="prezime" id="formGroupExampleInput2" placeholder="Prezime">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">E-mail</label>
    <input type="text" class="form-control"  value={{ $kor->email }} name="email" id="formGroupExampleInput2" placeholder="E-mail">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Lozinka</label>
    <input type="password" class="form-control"  value={{ $kor->lozinka }} name=lozinka id="formGroupExampleInput2" placeholder="Lozinka">
  </div>
  <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" name="uloga"  class="form-control">
        @foreach ($uloge as $u )
        @if($u->iduloga== $kor->iduloga)
        <option value="{{$u->iduloga}}" selected>{{$u->naziv}}</option>
        @else
          <option value="{{$u->iduloga}}">{{$u->naziv}}</option>
             @endif
        @endforeach
      </select>

<button type="submit" id="ubacidugme"class="btn btn-primary">Azuriraj</button>
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
