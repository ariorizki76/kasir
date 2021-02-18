@extends('layouts.waiter')

@section('title', 'Profil')

@section('foto_waiter', $waiter['foto_waiter'])
@section('nama_waiter', $waiter['nama_waiter'])
@section('email_waiter', $waiter['email_waiter'])

@section('content')
                    <a href="{{URL('waiter/pengaturan/'.$waiter['id_waiter'].'/edit')}}" class="btn-primary btn">Edit Profil</a>

                    <div class="row">
                        <!-- Column -->
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-two">
                                        <header>
                                            <div class="avatar">
                                                <img src="{{ asset('images/profil') }}/{{$waiter['foto_waiter']}}" />
                                            </div>
                                        </header>

                                        <h3>{{$waiter['nama_waiter']}}</h3>
                                        <div class="desc">
                                            {{$waiter['email_waiter']}} - {{$waiter['username_waiter']}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection
