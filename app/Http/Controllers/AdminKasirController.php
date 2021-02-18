<?php

namespace App\Http\Controllers;

use App\Kasir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pelanggan;
use App\Http\Controllers\AdminController;

class AdminKasirController extends Controller {

    public function index(){
        if(!AdminController::getAdmin()){
            return redirect('admin/login');
        }
        $admin = AdminController::getAdmin();
        $kasir = Kasir::all();
        return view('admin.kasir.index', compact('kasir', 'admin'));
    }

    public function create(){
        if(!AdminController::getAdmin()){
            return redirect('admin/login');
        }
        $admin = AdminController::getAdmin();
        return view('admin.kasir.create', compact('admin'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama_kasir' => 'required',
            'username_kasir' => 'required',
            'email_kasir' => 'required',
            'password_kasir' => 'required',
        ]);

        $data = [
            'nama_kasir' => $request->nama_kasir,
            'username_kasir' => $request->username_kasir,
            'email_kasir' => $request->email_kasir,
            'password_kasir' => md5($request->password_kasir),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];
        Kasir::insert($data);
        return redirect('admin/kasir');
    }

    public function show($id)
    {
        //
    }

    public function edit($id){
        if(!AdminController::getAdmin()){
            return redirect('admin/login');
        }
        $admin = AdminController::getAdmin();
        $kasir = Kasir::where('id_kasir', $id)->get();
        return view('admin.kasir.edit', compact('kasir', 'admin'));
    }

    public function update(Request $request, $id){
        $data = [
            'nama_kasir' => $request->nama_kasir,
            'username_kasir' => $request->username_kasir,
            'email_kasir' => $request->email_kasir,
            'password_kasir' => md5($request->password_kasir),
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        Kasir::where('id_kasir', $id)->update($data);

        return redirect('admin/kasir');
    }

    public function destroy($id){
        Kasir::where('id_kasir', '=', $id)->delete();
        return redirect('admin/kasir');
    }
}
