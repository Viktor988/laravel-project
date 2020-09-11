@extends('layouts.admin')

@section('sredina')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard v3</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v3</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<div id="informacijek"><ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <span>Broj: Aktivni({{ $brojAktivnih }}), Neaktivni({{$brojNeAktivnih}}),Nikad prijavljeni({{$nikadPrijavljen}}) ,Registrovani({{$brojRegistrovanih }})  Korisnici</span>
        </li></ul></div>
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
             <div class="card ub">
              <div class="card-header border-0">
                <h3 class="card-title">Informacije o korisnicima</h3>
                <div class="card-tools">

     <input class="form-control form-control-navbar" name="trazi" id="trazi"type="search" placeholder="Search" aria-label="Search">


                </div>
              </div>
              <div class="card-body table-responsive p-0" id="ide">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                       <th>Ime</th>
                    <th>Prezime</th>
                    <th>E-mail</th>
                      <th>Uloga</th>
                      <th>Status aktivnosti</th>
                        <th>Vreme prijave</th>
                           <th>Vreme odjave</th>
                              <th>Datum Azuriranja </th>
                         <th>Datum kreiranja</th>
                            <th>ID korisnik</th>
                  </tr>
                  </thead>
                  <tbody>
                     @foreach ($korisnici as $nar )
                  <tr>

                    <td>
                    {{ $nar->ime }}

                    </td>
                    <td>{{ $nar->prezime }}</td>
                    <td>
                      {{ $nar->email }}
                    </td>
                    <td>
                      {{ $nar->naziv }}
                    </td>
                     <td>
                     @if($nar->aktivan==0)
                    Nije aktivan

                      @else
                        Aktivan
                    @endif
                    </td>

                    <td>
                    @if($nar->poslednjaAktivnost==null)
                        Nije se nikada prijavio
                        @else
                        {{ $nar->poslednjaAktivnost }}
                        @endif
                    </td>

                     <td>
                   @if($nar->poslednjeOdjavljivanje==null)
                        /
                        @else
                        {{ $nar->poslednjeOdjavljivanje }}
                        @endif
                    </td>
                      <td>
                    {{ $nar->datumAzuriranja }}

                    </td>
                     <td>
                     {{ $nar->datumKreiranja }}
                    </td>
                      <td>
                    {{ $nar->idkorisnik }}

                    </td>

                  </tr>
                    @endforeach

                  </tbody>
                </table>
              </div></div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Korpa-kupljeni proizvodi</h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-sm">

                  </a>

                  {{$narudzbe->links()}}

                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                   <th>Marka</th>
                       <th>Model</th>
                    <th>Ukupna cena</th>
                       <th>Kolicina</th>
                    <th>Ime i prezime</th>
                    <th>Adresa</th>
                        <th>Datum porudzbe</th>
                         <th>ID korisnika</th>
                  </tr>
                  </thead>
                  <tbody>
                     @foreach ($narudzbe as $nar )
                  <tr>
                     <td>
                    {{ $nar->nazivMarka }}

                    </td>
                    <td>
                    {{ $nar->model }}

                    </td>
                    <td>{{ $nar->kolicina*$nar->cena }}</td>
                    <td>{{ $nar->kolicina }}</td>
                    <td>
                      {{ $nar->ime }} {{ $nar->prezime }}
                    </td>
                    <td>
                     {{ $nar->adresaIsporuke }}
                    </td>
                     <td>
                     {{ $nar->datumKupovine }}
                    </td>
                     <td>
                     {{ $nar->idkorisnik }}
                    </td>
                  </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6 aktivnost">
                <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Pristup stranicama </h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-sm">

                  </a>



                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                   <th>Datum,IP adresa,Autorizovan,Stranica</th>


                  </tr>
                  </thead>
                  <tbody>

                     @foreach($logovi as $key=>$value)
               @php

                        @endphp

                  <tr>
                     <td>

                     {{ $value }}

                    </td>


                  </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->


            </div>
            <!-- /.card -->


          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>


@endsection
