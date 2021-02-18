@extends('layouts.kasir')

@section('title', 'Hidangan')

@section('foto_kasir', $kasir['foto_kasir'])
@section('nama_kasir', $kasir['nama_kasir'])
@section('email_kasir', $kasir['email_kasir'])

@section('content')
<link href=" {{ asset('ela/css/lib/sweetalert/sweetalert.css') }}" rel="stylesheet">

        <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs customtab" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#makanan" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Makanan</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#minuman" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Minuman</span></a> </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="makanan" role="tabpanel">
                                <div class="row">
                                @foreach($makanan as $makanan)
                                <div class="col-md-3">
                                    <div class="card">
                                      <img class="card-img-top" src="{{ asset('images/hidangan/'.$makanan->foto_hidangan) }}">
                                      <div class="card-body">
                                        <h4 class="card-title">{{$makanan->nama_hidangan}}</h4>
                                        <p class="card-text">Rp. {{$makanan->harga_hidangan}}</p>
                                      </div>
                                    </div>
                                </div>
                                @endforeach
                                </div>
                            </div>
                            <div class="tab-pane" id="minuman" role="tabpanel">
                                <div class="row">
                                @foreach($minuman as $minuman)
                                <div class="col-md-3">
                                    <div class="card">
                                      <img class="card-img-top" src="{{ asset('images/hidangan/'.$minuman->foto_hidangan) }}">
                                      <div class="card-body">
                                        <h4 class="card-title">{{$minuman->nama_hidangan}}</h4>
                                        <p class="card-text">Rp. {{$minuman->harga_hidangan}}</p>
                                      </div>
                                    </div>
                                </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <script src="{{ asset('ela/js/lib/sweetalert/sweetalert.min.js') }}"></script>
@endsection
