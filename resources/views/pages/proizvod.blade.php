@extends('layouts.layout')
@section('title')
<title>Satovi Ciric-Proizvod</title>
@endsection
@section('sredina')
{{-- Modali  --}}
<div id="myModal3" class="modal">
    <div class="modal-content">
<span class="close">&times;</span>
<i class="fas fa-times-circle"></i>
<p id="tekstkorpa">Morate biti prijavljeni da ocenili proizvod.</p>
 </div>

    </div>
    <div id="myModal8" class="modal">
<div class="modal-content">
  <span class="close">&times;</span>
  <i class="fas fa-times-circle"></i>
  <p id="tekstkorpa">Morate biti prijavljeni da biste glasali!</p>
</div>
</div>
<div id="myModal9" class="modal">
<div class="modal-content">
  <span class="close">&times;</span>
  <i class="fas fa-times-circle"></i>
  <p id="tekstkorpa">Za ovaj proizvod ste vec glasali ranije!</p>
</div>
</div>

{{-- kraj modala --}}
            <div id="pojsredina">

                <h1 id="pojnaslov">{{ strtoupper($proizvod->nazivMarka) }} - {{$proizvod->model}}</h1>
                <hr id="pojlinija">
                <div class="prsredina">
                    <div class="pojslika"><img src="{{ asset('slike/'.$proizvod->) }}" alt="slika"/></div>
                    <div id="pojopis">
                        <table id='proiztabla'>
                        @php
                            $karakteristike=$proizvod->karakteristike;
                            $kar=explode(",",$karakteristike);


                        @endphp
                            <tr><td>Boja brojčanika</td><th>{{$kar[0]}}</th></tr>
                            <tr><td>Boja narukvice:</td><th>{{$kar[1]}}</th></tr>
                            <tr><td>Debljina kućišta:</td><th>{{$kar[2]}}</th></tr>
                            <tr><td>Materijal kućišta:</td><th>{{$kar[3]}}</th></tr>
                             <tr><td>Garancija na mehanizam:</td><th>{{$kar[4]}}</td></tr>
                                <tr><td>Prečnik kucista</td><th>{{$kar[5]}}</th></tr>
                                <tr><td>Vodootpornost</td><th>{{$kar[6]}}</th></tr>
                            <tr><td>Tip mehanizma</td><th>{{$kar[7]}}</th></tr>
                            <tr><td>Tip narukvice</td><th>{{$kar[8]}}</th></tr>

                            </table>

                            <span id="cenaop">Cena:</span> <span id="cenaopp">{{ $proizvod->cena }} RSD</span><br/><br/>

                            <a href="#" data-id={{ $proizvod->idproizvod }} class="lkorpa gg">Dodaj u korpu</a>
                            <section class='rating-widget'>

                                <!-- Rating Stars Box -->
                                <div class='rating-stars text-center'>
                                   <ul id='stars'>
                                   @for($i=1;$i<6;$i++)
    <li class='star' title={{ $i}} data-pro={{ $proizvod->idproizvod   }} data-value='<?=$i;?>'><i class='fa fa-star fa-fw'></i></li>
    @endfor
                                  </ul>


                                </div>
								<div id="ocenaproizvoda">
								<p id="pocena">(Prosecna ocena:{{ round($ocena,2) }},broj glasova:{{ $glasovi }})</p>
								</div>

                    </div>

                </div>
      <div id="loader"></div>
<div class="prsredina druga">
  <div id="komentari">
<h2 class="podpoj">Komentari</h2>
<hr id="pojlinija">
<div class="content">


 <form action="#" method="post" id="formkom">
  <textarea placeholder="Komentarisi..." rows="20" name="comment[text]" id="komentartext" cols="40" class="ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true"></textarea><br/>
  @if(session()->has('korisnik'))
  <input type="button" data-idProizvod={{$proizvod->idproizvod}} data-idkorisnik={{ session()->get('korisnik')->idkorisnik}} id="dugmekom" class="kkdugme" value="Posalji"/>
@else
 <input type="button" id="dugmekom2" class="kkdugme2" value="Posalji"/><br/>
<span class="prikazi">Morate biti prijavljeni da biste komentarisali.</span>
@endif
</form>


  <div id="boxovi">

  @if(count($komentari)!=0)
  @foreach ($komentari as $k )


   <div id="reader">
    <ol>
      <li>
        <div class="comment_box">
          <div class="inside_comment">
            <div class="comment-meta">
              <div class="commentsuser">{{ $k->ime }}</div>
              @php
              $datum=strtotime($k->vreme);
              $datum2=date("F d, Y g:H:i",$datum);


              @endphp
              <div class="comment_date">{{ $datum2 }}</div>
            </div>
          </div>
          <div class="comment-body">
            <p>{{$k->komentar}}</p>
          </div>


        </div>
        @if(session()->has('korisnik'))
        @if(session()->get('korisnik')->iduloga=="1")
        <span id="upisi">
        <span class="obrisiKom" data-id={{$k->idproizvod }} data-idkom={{ $k->idkomentar}}>X</span></span>
        @endif
        @endif

        </li>
        </ol>
        </div>
@endforeach

@else
<span id="nema">
<h3 class="podpoj">Ovaj proizvod nema komentara.</h3></span>
@endif
              </div>

</div>

</div>


<div id="slicni">
<h2 class="podpoj">Povezani proizvodi</h2>
<hr id="pojlinija">
<div id="povezani">
@foreach ($slicni as $proiz )
<div class="proizvod poseban">



  <img src="{{ asset('slike/'.$proiz->slikamala) }}" alt="slika"/>
                        <p id="marka">{{ strtoupper( $proiz->nazivMarka  )}}</p>
                        <p id="model">{{$proiz->model}}</p>
                        <p id="cena">{{ $proiz->cena }},00 RSD</p>
                    <a href="/proizvod/{{$proiz->idproizvod}}" class="lopsirno">Opsirnije</a>
    </div>
@endforeach

          </div>
</div>
</div>
</div>

            </div>
@endsection
