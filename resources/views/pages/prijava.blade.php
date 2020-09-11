@extends('layouts.layout')
@section('title')
<title>Satovi Ciric-Prijava i registracija</title>
@endsection
@section('sredina')

 <div id="sredinak">
               <div class="login">
                <h1 id="prnaslov">Prijava</h1>
                <form action="{{ url('/prijava/provera') }}" method="post">
                @csrf
                <input type="text" placeholder="email" name="email" id="lemejl" class="polje"/>
                <input type="password" placeholder="Lozinka" name="lozinka"id="llozinka" class="polje"/>
                <div id="prijavagreske">
                @if(session('poruka'))
                {{session('poruka')}}
                @endif
                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div id="myModal4" class="modal">
<div class="modal-content">
  <span class="close">&times;</span>
  <i class="fas fa-check-circle"></i>
  <p id="tekstkorpa">Uspešno ste napravili nalog.</p>
</div>
</div>

<div id="myModal5" class="modal">
<div class="modal-content">
  <span class="close">&times;</span>
  <i class="fas fa-times-circle"></i>
  <p id="tekstkorpa">E-mail vec postoji!</p>
</div>
</div>
<div id="myModal6" class="modal">
<div class="modal-content">
  <span class="close">&times;</span>
  <i class="fas fa-times-circle"></i>
  <p id="tekstkorpa">Morate prvo napraviti nalog!</p>
</div>

</div>

                </div>

                <input type="submit" value="Prijava" name="pass"id="ldugme" class="kdugme"/>
                    </form>
               </div>

               <div class="login">
                    <h1 id="prnaslov">Registracija</h1>
                    <form action="#" method="post">
                    @csrf
                    <input type="text" placeholder="Ime" id="rime" class="polje"/>
                    <div class="skrivenn">
                        <i class="fas fa-question-circle">
                  </i> <p id="aa"> Ime mora pocinjati velikim slovom, osoba moze imati vise imena</p></div>

                 <input type="text" placeholder="prezime" id="rprezime" class="polje"/>
                 <div class="skrivenn">
                        <i class="fas fa-question-circle s2">
                  </i> <p id="aa"> Prezime mora pocinjati velikim slovom, osoba moze imati vise prezimena</p></div>
                <input type="email" placeholder="email" id="remejl"class="polje"/>
                <div class="skrivenn">
                        <i class="fas fa-question-circle s3">
                  </i> <p id="aa"> Molimo vas ostavite Vas e-mail</p></div>
                    <input type="password" placeholder="Lozinka" id="rlozinka"class="polje"/>
                    <div class="skrivenn">
                            <i class="fas fa-question-circle s4">
                      </i> <p id="aa"> Lozinika mora da sadrzi minimalno 6 karaktera</p></div>
                    <input type="password" placeholder="Ponovite lozinku" id="rponlozinka"class="polje" />
                    <div class="skrivenn">
                            <i class="fas fa-question-circle s5">
                      </i> <p id="aa">Lozinke moraju da se poklapaju.</p></div>
                    <div id="greske">
                        @if(session('poruka2'))
                        {{ session('poruka2') }}
                        @endif
                    </div>
                    <input type="button" value="Registracija" id="rdugme" class="kdugme"/>
                    </form>
               </div>
               </div>
@endsection
@section('skriptovi')
 <script src="{{asset('js/registracija.js')}}"  type="text/javascript"></script>
@endsection
