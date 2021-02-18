@extends('layouts.admin')

@section('title', 'Edit Waiter')

@section('foto_admin', $admin['foto_admin'])
@section('nama_admin', $admin['nama_admin'])
@section('email_admin', $admin['email_admin'])

@section('content')
                    @foreach($waiter as $waiter)
                    <div class="col-lg-8">
                        <div class="card" style="background: #f5f5f5">
                            <div class="basic-form">

                                <form method="POST" action="{{URL('admin/waiter', $waiter->id_waiter)}}">
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH')}}
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input id="name" class="form-control" type="text" name="nama_waiter" value="{{$waiter->nama_waiter}}" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input id="username" class="form-control" type="text" name="username_waiter" value="{{$waiter->username_waiter}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input id="email" class="form-control" type="email" name="email_waiter" value="{{$waiter->email_waiter}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input id="password" class="form-control" type="password" name="password_waiter" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Foto</label>
                                        <input id="foto" class="form-control" type="file" name="foto_waiter" required>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>

                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
@endsection
