@extends('layouts.owner')

@section('title', 'Profil')

@section('foto_owner', $owner['foto_owner'])
@section('nama_owner', $owner['nama_owner'])
@section('email_owner', $owner['email_owner'])

@section('content')
                    <a href="{{URL('owner/pengaturan/'.$owner['id_owner'].'/edit')}}" class="btn-primary btn">Edit Profil</a>

                    <div class="row">
                        <!-- Column -->
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-two">
                                        <header>
                                            <div class="avatar">
                                                <img src="{{ asset('images/profil') }}/{{$owner['foto_owner']}}" />
                                            </div>
                                        </header>

                                        <h3>{{$owner['nama_owner']}}</h3>
                                        <div class="desc">
                                            {{$owner['email_owner']}} - {{$owner['username_owner']}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection
