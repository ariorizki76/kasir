<?php

namespace App\Http\Controllers;

use App\Pelanggan;
use App\Pemesanan;
use App\DetailPemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AdminController;

class AdminPelangganController extends Controller{

    public function index(){
        if(!AdminController::getAdmin()){
            return redirect('admin/login');
        }
        $admin = AdminController::getAdmin();
        $pelanggan = Pelanggan::all();
        return view('admin.pelanggan.index', compact('pelanggan', 'admin'));
    }

    public function create(){
        if(!AdminController::getAdmin()){
            return redirect('admin/login');
        }
        $admin = AdminController::getAdmin();
        return view('admin.pelanggan.create', compact('admin'));
    }

    public function store(Request $request){

        $file = $request->file('foto_pelanggan');
        $format = $file->getClientOriginalExtension();
        $name = $request->username.'.'.$format;
        $file->move('images/profil', $name);


        $data = [
            'nama_pelanggan' => $request->name,
            'email_pelanggan' => $request->email,
            'username_pelanggan' => $request->username,
            'password_pelanggan' => md5($request->password),
            'foto_pelanggan' => $name,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        Pelanggan::insert($data);
        return redirect('admin/pelanggan');
    }

    public function show($id){
        
    }

    public function edit($id){
        if(!AdminController::getAdmin()){
            return redirect('admin/login');
        }
        $admin = AdminController::getAdmin();
        $pelanggan = Pelanggan::where('id_pelanggan', $id)->get();
        return view('admin.pelanggan.edit', compact('pelanggan', 'admin'));
    }

    public function update(Request $request, $id){
        $data = [
            'nama_pelanggan' => $request->nama_pelanggan,
            'email_pelanggan' => $request->email_pelanggan,
            'username_pelanggan' => $request->username_pelanggan,
            'password_pelanggan' => md5($request->password_pelanggan),
            'updated_at' => date("Y-m-d H:i:s")
        ];
        Pelanggan::where('id_pelanggan', $id)->update($data);
        return redirect('admin/pelanggan');
    }

    public function destroy($id){

        $sql = Pemesanan::select('id_pemesanan')->where('id_pelanggan', $id)->get();

        foreach ($sql as $sql) {
            $id_pemesanan = $sql->id_pemesanan;
            DetailPemesanan::where('id_pemesanan', $id_pemesanan)->delete();
        }

        Pelanggan::where('id_pelanggan', $id)->delete();
        return redirect('admin/pelanggan');
    }
}
