@extends('layouts.waiter')

@section('title', 'Dashboard')

@section('foto_waiter', $waiter['foto_waiter'])
@section('nama_waiter', $waiter['nama_waiter'])
@section('email_waiter', $waiter['email_waiter'])

@section('content')

<link href=" {{ asset('ela/css/lib/sweetalert/sweetalert.css') }}" rel="stylesheet">
<div class="row">
    <div class="col-md-3">
        <div class="card bg-primary p-20">
            <div class="media widget-ten">
                <div class="media-left meida media-middle">
                    <span><i class="fa fa-user f-s-40"></i></span>
                </div>
                <div class="media-body media-text-right">
                    <a href="{{URL('waiter/pengaturan')}}"><h2 class="color-white">{{$waiter['nama_waiter']}}</h2></a>
                    <p class="m-b-0">Nama Waiter</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-pink p-20">
            <div class="media widget-ten">
                <div class="media-left meida media-middle">
                    <span><i class="ti-comment f-s-40"></i></span>
                </div>
                <div class="media-body media-text-right">
                    <a href="{{URL('pegawai/pemesanan')}}"><h2 class="color-white">{{$dashboard['jumlah_pesanan']}}</h2></a>
                    <p class="m-b-0">Jumlah Pesanan</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-success p-20">
            <div class="media widget-ten">
                <div class="media-left meida media-middle">
                    <span><i class="ti-vector f-s-40"></i></span>
                </div>
                <div class="media-body media-text-right">
                    <a href="{{URL('waiter/hidangan')}}"><h2 class="color-white">{{$dashboard['jumlah_hidangan']}}</h2></a>
                    <p class="m-b-0">Jumlah Hidangan</p>
                </div>
            </div>
        </div>
    </div>

	<div class="col-lg-6">
	    <div class="card">
	        <div class="card-title">
	            <h4>Recent Orders</h4>
	        </div>
	        <div class="card-body">
	            <div class="table-responsive">
	                <table class="table">
	                    <thead>
	                        <tr>
	                            <th>Pelanggan</th>
	                            <th>Tanggal Pesan</th>
	                            <th>Status</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    	@foreach($pesanan as $pesanan)
	                        <tr>
	                            <td>
	                                <div class="round-img">
	                                    <a href=""><img src="{{asset('images/profil')}}/{{$pesanan['foto_pelanggan']}}" title="{{$pesanan['nama_pelanggan']}}"></a>
	                                </div>
	                            </td>
	                            <td><span>{{$pesanan['created_at']}}</span></td>
	                            <td>
                                    @if($pesanan['status_pemesanan']=='Belum Dibayar')
	                            	<span class="badge badge-danger">
                                    @elseif($pesanan['status_pemesanan']=='Lunas')
                                    <span class="badge badge-success">
                                    @else
                                    <span class="badge">
                                    @endif
	                            		{{$pesanan['status_pemesanan']}}
	                            	</span>
	                            </td>
	                        </tr>
	                        @endforeach
	                    </tbody>
	                </table>
	            </div>
                <a href="{{ URL('waiter/pemesanan') }}" class="btn btn-primary">Selengkapnya</a>
	        </div>
	    </div>
	</div>
</div>

<script src="{{ asset('ela/js/lib/sweetalert/sweetalert.min.js') }}"></script>
<!-- scripit init-->
<script type="text/javascript">
    swal("Hey, {{$waiter['nama_waiter']}}", "Selamat datang di dashboard Ini Cafe!", "success")
</script>
@endsection