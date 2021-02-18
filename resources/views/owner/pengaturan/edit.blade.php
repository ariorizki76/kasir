@extends('layouts.owner')

@section('title', 'Edit Profil')

@section('foto_owner', $owner['foto_owner'])
@section('nama_owner', $owner['nama_owner'])
@section('email_owner', $owner['email_owner'])

@section('content')

<div class="col-lg-8">
                    <div class="card" style="background: #f5f5f5">
                            <div class="basic-form">
                    <form method="POST" action="{{URL('owner/pengaturan', $owner['id_owner'])}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PATCH')}}
                        <div class="form-group row">
                            <label for="foto_owner" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                                <img src="{{ asset('images/profil') }}/{{$owner['foto_owner']}}" style="width:200px; height:200px; border-radius:50%" />
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" id="foto_owner" name="foto_owner" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_owner" class="form-control" id="" value="{{$owner['nama_owner']}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" name="username_owner" class="form-control" id="" value="{{$owner['username_owner']}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email_owner" class="form-control" id="" value="{{$owner['email_owner']}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password_owner" class="form-control" id="" placeholder="Password Anda">
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
