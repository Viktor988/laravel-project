@extends('layouts.layout')
@section('title')
<title>Satovi Ciric-Korpa</title>
@endsection
@section('sredina')
<div id="korpasredina">
                <!-- modal za uspesno narucivanje-->

                <div id="myModal" class="modal">


                        <div class="modal-content">
                          <span class="close">&times;</span>
                          <i class="fas fa-check-circle"></i>
                          <p id="tekstkorpa">Uspesno ste porucili proizvod.</p>
                        </div>

                      </div>
                <!-- Modal content -->
                 <!-- modal za pokusaj kupovine-->

                 <div id="myModal2" class="modal">


                    <div class="modal-content">
                      <span class="close">&times;</span>
                      <i class="fas fa-times-circle"></i>
                      <p id="tekstkorpa">Morate biti prijavljeni da biste potvrdili kupovinu.</p>
                    </div>

                  </div>
                    <div id="myModal10" class="modal">


                    <div class="modal-content">
                      <span class="close">&times;</span>
                      <i class="fas fa-times-circle"></i>
                      <p id="tekstkorpa">Admin ne moze da poruci proizvod.</p>
                    </div>

                  </div>
            <!-- Modal content -->
                <h1 id="pojnaslov">Korpa</h1>
                <hr id="pojlinija">

                <div id="korpa">


                </div>
                <div id="naruci"> <input type="text" placeholder="Upisi adresu i grad isporuke" id="adresa"/></div>
                    </div>
                    </div>
@endsection
@section('skriptovi')

@endsection
