@extends('layouts.admin')

@section('title', 'Admin')

@section('foto_admin', $admin['foto_admin'])
@section('nama_admin', $admin['nama_admin'])
@section('email_admin', $admin['email_admin'])

@section('content')
<link href=" {{ asset('ela/css/lib/sweetalert/sweetalert.css') }}" rel="stylesheet">
<div class="col-lg-12">
    <div class="card" style="background: #f5f5f5">
        <div class="basic-form">
                    <a href="{{URL('admin/admin/create')}}" class="btn btn-success">Tambah Admin</a>

                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Tanggal Daftar</th>
                                <th>Tanggal Pembaruan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($admins as $admins)
                            <tr>
                                <td>{{$admins->id_admin}}</td>
                                <td>{{$admins->nama_admin}}</td>
                                <td>{{$admins->username_admin}}</td>
                                <td>{{$admins->email_admin}}</td>
                                <td>{{$admins->created_at}}</td>
                                <td>{{$admins->updated_at}}</td>
                                <td>
                                    <a href="{{URL('admin/admin/'.$admins->id_admin.'/edit')}}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                    <form action="{{URL('admin/admin/'.$admins->id_admin)}}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE')}}
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                    
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
        <!-- scripit init-->
        <script type="text/javascript">
            $('form').submit(function(e){
                var form = this;
                e.preventDefault();
                swal({
                        title: "Yakin ingin menghapus data admin?",
                        text: "Data admin yang dihapus tidak bisa dikembalikan",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Delete",
                        closeOnConfirm: false
                    },
                    function(){
                        form.submit();
                    }
                );
            });

        </script>
@endsection
