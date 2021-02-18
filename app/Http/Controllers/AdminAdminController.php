<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pelanggan;
use App\Http\Controllers\AdminController;

class AdminAdminController extends Controller {

    public function index(){
        if(!AdminController::getAdmin()){
            return redirect('admin/login');
        }
        $admin = AdminController::getAdmin();
        $admins = Admin::all();
        return view('admin.admin.index', compact('admins', 'admin'));
    }

    public function create(){
        if(!AdminController::getAdmin()){
            return redirect('admin/login');
        }
        $admin = AdminController::getAdmin();
        return view('admin.admin.create', compact('admin'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama_admin' => 'required',
            'username_admin' => 'required',
            'email_admin' => 'required',
            'password_admin' => 'required',
        ]);

        $data = [
            'nama_admin' => $request->nama_admin,
            'username_admin' => $request->username_admin,
            'email_admin' => $request->email_admin,
            'password_admin' => md5($request->password_admin),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];
        Admin::insert($data);
        return redirect('admin/admin');
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
        $admins = Admin::where('id_admin', $id)->get();
        return view('admin.admin.edit', compact('admins', 'admin'));
    }

    public function update(Request $request, $id){
        $data = [
            'nama_admin' => $request->nama_admin,
            'username_admin' => $request->username_admin,
            'email_admin' => $request->email_admin,
            'password_admin' => md5($request->password_admin),
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        Admin::where('id_admin', $id)->update($data);

        return redirect('admin/admin');
    }

    public function destroy($id){
        Kasir::where('id_admin', '=', $id)->delete();
        return redirect('admin/admin');
    }
}
