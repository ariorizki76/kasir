@extends('layouts.owner')

@section('title', 'Dashboard')

@section('foto_owner', $owner['foto_owner'])
@section('nama_owner', $owner['nama_owner'])
@section('email_owner', $owner['email_owner'])

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
                    <a href="{{URL('owner/pengaturan')}}"><h2 class="color-white">{{$owner['nama_owner']}}</h2></a>
                    <p class="m-b-0">Nama Owner</p>
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
                    <a href="{{URL('owner/hidangan')}}"><h2 class="color-white">{{$dashboard['jumlah_hidangan']}}</h2></a>
                    <p class="m-b-0">Jumlah Hidangan</p>
                </div>
            </div>
        </div>
    </div>

<script src="{{ asset('ela/js/lib/sweetalert/sweetalert.min.js') }}"></script>
<!-- scripit init-->
<script type="text/javascript">
    swal("Hey, {{$owner['nama_owner']}}", "Selamat datang di dashboard Ini Cafe!", "success")
</script>
@endsection