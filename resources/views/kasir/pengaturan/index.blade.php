@extends('layouts.kasir')

@section('title', 'Profil')

@section('foto_kasir', $kasir['foto_kasir'])
@section('nama_kasir', $kasir['nama_kasir'])
@section('email_kasir', $kasir['email_kasir'])

@section('content')
                    <a href="{{URL('kasir/pengaturan/'.$kasir['id_kasir'].'/edit')}}" class="btn-primary btn">Edit Profil</a>

                    <div class="row">
                        <!-- Column -->
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-two">
                                        <header>
                                            <div class="avatar">
                                                <img src="{{ asset('images/profil') }}/{{$kasir['foto_kasir']}}" />
                                            </div>
                                        </header>

                                        <h3>{{$kasir['nama_kasir']}}</h3>
                                        <div class="desc">
                                            {{$kasir['email_kasir']}} - {{$kasir['username_kasir']}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection
