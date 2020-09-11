@extends('layouts.admin')

@section('sredina')
<div id="ceo">

<form action="{{route('korisnici.store')}}" method="post" id="forme">
@csrf
  <div class="form-group">
    <label for="formGroupExampleInput">Ime</label>
    <input type="text" class="form-control" name="ime" id="formGroupExampleInput" placeholder="Ime">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Prezime</label>
    <input type="text" class="form-control" name="prezime" id="formGroupExampleInput2" placeholder="Prezime">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">E-mail</label>
    <input type="text" class="form-control" name="email" id="formGroupExampleInput2" placeholder="E-mail">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Lozibka</label>
    <input type="text" class="form-control" name=lozinka id="formGroupExampleInput2" placeholder="Lozinka">
  </div>
  <div class="form-group col-md-4">
      <label for="inputState">Uloga</label>
      <select id="inputState" name="uloga" class="form-control">
        @foreach ($uloge as $u )


        <option value="{{$u->iduloga}}">{{$u->naziv}}</option>
        @endforeach
      </select>

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
