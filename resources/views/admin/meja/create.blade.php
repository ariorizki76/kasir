@extends('layouts.admin')

@section('title', 'Tambah Meja')

@section('foto_admin', $admin['foto_admin'])
@section('nama_admin', $admin['nama_admin'])
@section('email_admin', $admin['email_admin'])

@section('content')
                <div class="col-lg-8">
                    <div class="card" style="background: #f5f5f5">
                            <div class="basic-form">
                    <form method="POST" action="{{ URL('admin/meja') }}">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">No. Meja</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" name="no_meja" placeholder="No. Meja" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Cafe</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" name="cafe_meja" value="Ini Cafe" >
                            </div>
                        </div>
                        <div style="text-align: right;">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
