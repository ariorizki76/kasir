@extends('layouts.admin')

@section('title', 'Dashboard')

@section('foto_admin', $admin['foto_admin'])
@section('nama_admin', $admin['nama_admin'])
@section('email_admin', $admin['email_admin'])

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
                    <a href="{{URL('admin/pengaturan')}}"><h2 class="color-white">{{$admin['nama_admin']}}</h2></a>
                    <p class="m-b-0">Nama Admin</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-pink p-20">
            <div class="media widget-ten">
                <div class="media-left meida media-middle">
                    <span><i class="fa fa-user f-s-40"></i></span>
                </div>
                <div class="media-body media-text-right">
                    <a href="{{URL('admin/pelanggan')}}"><h2 class="color-white">{{$dashboard['jumlah_pelanggan']}}</h2></a>
                    <p class="m-b-0">Jumlah Pelanggan</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-success p-20">
            <div class="media widget-ten">
                <div class="media-left meida media-middle">
                    <span><i class="fa fa-user f-s-40"></i></span>
                </div>
                <div class="media-body media-text-right">
                    <a href="{{URL('admin/kasir')}}"><h2 class="color-white">{{$dashboard['jumlah_kasir']}}</h2></a>
                    <p class="m-b-0">Jumlah Kasir</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-danger p-20">
            <div class="media widget-ten">
                <div class="media-left meida media-middle">
                    <span><i class="fa fa-user f-s-40"></i></span>
                </div>
                <div class="media-body media-text-right">
                    <a href="{{URL('admin/waiter')}}"><h2 class="color-white">{{$dashboard['jumlah_waiter']}}</h2></a>
                    <p class="m-b-0">Jumlah Waiter</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-3">
        <div class="card bg-pink p-20">
            <div class="media widget-ten">
                <div class="media-left meida media-middle">
                    <span><i class="fa fa-user f-s-40"></i></span>
                </div>
                <div class="media-body media-text-right">
                    <a href="{{URL('admin/admin')}}"><h2 class="color-white">{{$dashboard['jumlah_admin']}}</h2></a>
                    <p class="m-b-0">Jumlah Admin</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-success p-20">
            <div class="media widget-ten">
                <div class="media-left meida media-middle">
                    <span><i class="fa fa-user f-s-40"></i></span>
                </div>
                <div class="media-body media-text-right">
                    <a href="{{URL('admin/owner')}}"><h2 class="color-white">{{$dashboard['jumlah_owner']}}</h2></a>
                    <p class="m-b-0">Jumlah Owner</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-danger p-20">
            <div class="media widget-ten">
                <div class="media-left meida media-middle">
                    <span><i class="fa fa-user f-s-40"></i></span>
                </div>
                <div class="media-body media-text-right">
                    <a href="{{URL('admin/hidangan')}}"><h2 class="color-white">{{$dashboard['jumlah_hidangan']}}</h2></a>
                    <p class="m-b-0">Jumlah Hidangan</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('ela/js/lib/sweetalert/sweetalert.min.js') }}"></script>
<!-- scripit init-->
<script type="text/javascript">
    swal("Hey, {{$admin['nama_admin']}}", "Selamat datang di dashboard Ini Cafe!", "success")
</script>
@endsection