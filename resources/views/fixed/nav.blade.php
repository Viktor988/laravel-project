  <div id="navigacija">
            <div id="navbar">

<div id="logo">
   <a href="index.html" id="logolink"> <h1 id="logo1">
        Satovi
    </h1>
    <h2 id="logo2">Ćirić</h2></a>
</div>
<div id="meni">
    <div id="X"><i class="fas fa-times izadji"></i>

        <span id="zatvori">Zatvori</span></div>
    <i class="fas fa-bars navdugme"></i>

    <ul class="snip1226">
        <li><a href="{{url('/pocetna')}}">Početna</a></li>
        <li><a href="{{url('/proizvodi')}}">Proizvodi</a></li>
           <li><a href="{{url('/kontakt')}}">Kontakt</a></li>
        @if(!session()->has('korisnik'))
        <li><a href="{{url('/prijava')}}">Prijava</a></li>
        @else
          <li><a href="{{url('/odjava')}}">Odjava</a></li>
        @endif
        @if(session()->has('korisnik'))
        @if(session()->get('korisnik')->iduloga==4)
        <li><a href="{{url('/adminPanel')}}">Admin</a></li>
        @endif
        @endif
        <li><a href="{{url('/korpa')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
            <span class='badge badge-warning' id='lblCartCount'>0</span>
      </ul>

</div>



            </div></div>
