<div id="ceo">

   @if(session()->has('korisnik'))
<div id="goreskroz">

<div id="zajedno">
<div id="skorisnika"><span id="zakori">Zdravo: {{session()->get('korisnik')->ime}}</span></div>
<div id="okorisnika">

<span id="linkk"><a href='{{url('/porudzbine')}}'>Porudzbine| </a><a href='{{url('/izmeniProfil')}}'> |Izmeni profil</a></li></span>
</div>
</div>
</div>
    @endif
