@extends('layouts.kasir')

@section('title', 'Edit Profil')

@section('foto_kasir', $kasir['foto_kasir'])
@section('nama_kasir', $kasir['nama_kasir'])
@section('email_kasir', $kasir['email_kasir'])

@section('content')

<div class="col-lg-8">
                    <div class="card" style="background: #f5f5f5">
                            <div class="basic-form">
                    <form method="POST" action="{{URL('kasir/pengaturan', $kasir['id_kasir'])}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PATCH')}}
                        <div class="form-group row">
                            <label for="foto_kasir" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                                <img src="{{ asset('images/profil') }}/{{$kasir['foto_kasir']}}" style="width:200px; height:200px; border-radius:50%" />
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" id="foto_kasir" name="foto_kasir" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_kasir" class="form-control" id="" value="{{$kasir['nama_kasir']}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" name="username_kasir" class="form-control" id="" value="{{$kasir['username_kasir']}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email_kasir" class="form-control" id="" value="{{$kasir['email_kasir']}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password_kasir" class="form-control" id="" placeholder="Password Anda">
                            </div>
                        </div>
                        <div style="text-align: right;">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
