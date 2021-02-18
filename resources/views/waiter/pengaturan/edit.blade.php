@extends('layouts.waiter')

@section('title', 'Edit Profil')

@section('foto_waiter', $waiter['foto_waiter'])
@section('nama_waiter', $waiter['nama_waiter'])
@section('email_waiter', $waiter['email_waiter'])

@section('content')

<div class="col-lg-8">
                    <div class="card" style="background: #f5f5f5">
                            <div class="basic-form">
                    <form method="POST" action="{{URL('waiter/pengaturan', $waiter['id_waiter'])}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PATCH')}}
                        <div class="form-group row">
                            <label for="foto_waiter" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                                <img src="{{ asset('images/profil') }}/{{$waiter['foto_waiter']}}" style="width:200px; height:200px; border-radius:50%" />
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" id="foto_waiter" name="foto_waiter" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_waiter" class="form-control" id="" value="{{$waiter['nama_waiter']}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email_waiter" class="form-control" id="" value="{{$waiter['email_waiter']}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" name="username_waiter" class="form-control" id="" value="{{$waiter['username_waiter']}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password_waiter" class="form-control" id="" placeholder="Password Anda">
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
