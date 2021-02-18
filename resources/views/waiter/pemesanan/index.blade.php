@extends('layouts.waiter')

@section('title', 'Pemesanan')

@section('foto_waiter', $waiter['foto_waiter'])
@section('nama_waiter', $waiter['nama_waiter'])
@section('email_waiter', $waiter['email_waiter'])

@section('content')

<link href=" {{ asset('ela/css/lib/sweetalert/sweetalert.css') }}" rel="stylesheet">
<a href="{{URL('waiter/pemesanan/create')}}" class="btn btn-success">Tambah Pemesanan</a>

<div class="card">
    <div class="card-body">
        <div class="table-responsive m-t-40">
            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID Pemesanan</th>
                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">Meja</th>
                        <th scope="col">Tanggal Pemesanan</th>
                        <th scope="col">Total Pemesanan</th>
                        <th scope="col">Status</th>
                        <th scope="col">Tanggal Diperbarui</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pemesanan as $pemesanan)
                    <tr>
                        <td>{{$pemesanan->id_pemesanan}}</td>
                        <td>{{$pemesanan->nama_pelanggan}}</td>
                        <td>{{$pemesanan->no_meja}}</td>
                        <td>{{$pemesanan->created_at}}</td>
                        <td>{{$pemesanan->total_pemesanan}}</td>
                        <td>{{$pemesanan->status_pemesanan}}</td>
                        <td>{{$pemesanan->updated_at}}</td>
                        <td>
        
                            <a href="{{URL('waiter/pemesanan/'.$pemesanan->id_pemesanan)}}" class="btn btn-success">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="{{asset('ela/js/lib/datatables/datatables.min.js')}}"></script>
<script src="{{asset('ela/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('ela/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('ela/js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js')}}"></script>
<script src="{{asset('ela/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js')}}"></script>
<script src="{{asset('ela/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js')}}"></script>
<script src="{{asset('ela/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('ela/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js')}}"></script>
<script src="{{asset('ela/js/lib/datatables/datatables-init.js')}}"></script>


<script src="{{ asset('ela/js/lib/sweetalert/sweetalert.min.js') }}"></script>

@endsection
