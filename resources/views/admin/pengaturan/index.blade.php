@extends('layouts.admin')

@section('title', 'Profil')

@section('foto_admin', $admin['foto_admin'])
@section('nama_admin', $admin['nama_admin'])
@section('email_admin', $admin['email_admin'])

@section('content')
                    <a href="{{URL('admin/pengaturan/'.$admin['id_admin'].'/edit')}}" class="btn-primary btn">Edit Profil</a>

                    <div class="row">
                        <!-- Column -->
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-two">
                                        <header>
                                            <div class="avatar">
                                                <img src="{{ asset('images/profil') }}/{{$admin['foto_admin']}}" />
                                            </div>
                                        </header>

                                        <h3>{{$admin['nama_admin']}}</h3>
                                        <div class="desc">
                                            {{$admin['email_admin']}} - {{$admin['username_admin']}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection
