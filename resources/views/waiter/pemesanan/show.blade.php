@extends('layouts.waiter')

@section('title', 'Rincian Pemesanan')

@section('foto_waiter', $waiter['foto_waiter'])
@section('nama_waiter', $waiter['nama_waiter'])
@section('email_waiter', $waiter['email_waiter'])

@section('content')
<div class="col-lg-12">
    <div class="card" style="background: #f5f5f5">
        <div class="basic-form">

                    <a href="{{URL('waiter/pemesanan/create')}}" class="btn btn-success">Tambah Pemesanan</a>

                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th scope="col">Nama Hidangan</th>
                                <th scope="col">Jenis</th>
                                <th scope="col">Harga Satuan</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Total Harga Hidangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($detail_pemesanan as $detail_pemesanan)
                            <tr>
                                <td>{{$detail_pemesanan->nama_hidangan}}</td>
                                <td>{{$detail_pemesanan->jenis_hidangan}}</td>
                                <td>{{$detail_pemesanan->harga_hidangan}}</td>
                                <td>{{$detail_pemesanan->jumlah_hidangan}}</td>
                                <td>{{$detail_pemesanan->total_harga_hidangan}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
