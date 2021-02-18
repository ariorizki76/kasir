@extends('layouts.admin')

@section('title', 'Edit Owner')

@section('foto_admin', $admin['foto_admin'])
@section('nama_admin', $admin['nama_admin'])
@section('email_admin', $admin['email_admin'])

@section('content')
                    @foreach($owner as $owner)
                    <div class="col-lg-8">
                        <div class="card" style="background: #f5f5f5">
                            <div class="basic-form">

                                <form method="POST" action="{{URL('admin/owner', $owner->id_owner)}}">
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH')}}
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input id="name" class="form-control" type="text" name="nama_owner" value="{{$owner->nama_owner}}" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input id="username" class="form-control" type="text" name="username_owner" value="{{$owner->username_owner}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input id="email" class="form-control" type="email" name="email_owner" value="{{$owner->email_owner}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input id="password" class="form-control" type="password" name="password_owner" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Foto</label>
                                        <input id="foto" class="form-control" type="file" name="foto_owner" required>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>

                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
@endsection
