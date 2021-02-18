@extends('layouts.kasir')

@section('title', 'Edit Pemesanan')

@section('foto_kasir', $kasir['foto_kasir'])
@section('nama_kasir', $kasir['nama_kasir'])
@section('email_kasir', $kasir['email_kasir'])

@section('content')

<div class="col-lg-8">
    <div class="card" style="background: #f5f5f5">
        <div class="basic-form">


                    @foreach($pemesanan as $pemesanan)
                    <form method="POST" action="{{URL('kasir/pemesanan', $pemesanan->id_pemesanan)}}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH')}}
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Meja</label>
                            <div class="col-sm-10">
                                <select name="id_meja" class="form-control">
                                    @foreach($meja as $meja)
                                    <option value="{{$meja->id_meja}}" @if($meja->id_meja == $pemesanan->id_meja) selected @endif>{{$meja->no_meja.' - '.$meja->cafe_meja}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                            <div class="col-sm-10">
                                <select name="id_pelanggan" class="form-control">
                                    @foreach($pelanggan as $pelanggan)
                                    <option value="{{$pelanggan->id_pelanggan}}" @if($pelanggan->id_pelanggan == $pemesanan->id_pelanggan) selected @endif>{{$pelanggan->nama_pelanggan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Total Pemesanan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" name="total_pemesanan" value="{{$pemesanan->total_pemesanan}}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select name="status_pemesanan" class="form-control">
                                    <option value="Belum Dibayar"
                                    @if($pemesanan->status_pemesanan=='Belum Dibayar')
                                    selected
                                    @endif
                                    >Belum Dibayar</option>
                                    <option value="Lunas"
                                    @if($pemesanan->status_pemesanan=='Lunas')
                                    selected
                                    @endif
                                    >Lunas</option>
                                </select>
                            </div>
                        </div>
                        <div style="text-align: right;">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                    @endforeach
        </div>
    </div>
</div>
@endsection
