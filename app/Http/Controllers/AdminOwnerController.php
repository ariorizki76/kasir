<?php

namespace App\Http\Controllers;

use App\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pelanggan;
use App\Http\Controllers\AdminController;

class AdminOwnerController extends Controller {

    public function index(){
        if(!AdminController::getAdmin()){
            return redirect('admin/login');
        }
        $admin = AdminController::getAdmin();
        $owner = Owner::all();
        return view('admin.owner.index', compact('owner', 'admin'));
    }

    public function create(){
        if(!AdminController::getAdmin()){
            return redirect('admin/login');
        }
        $admin = AdminController::getAdmin();
        return view('admin.owner.create', compact('admin'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama_owner' => 'required',
            'username_owner' => 'required',
            'email_owner' => 'required',
            'password_owner' => 'required',
        ]);

        $data = [
            'nama_owner' => $request->nama_owner,
            'username_owner' => $request->username_owner,
            'email_owner' => $request->email_owner,
            'password_owner' => md5($request->password_owner),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];
        Owner::insert($data);
        return redirect('admin/owner');
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
        $owner = Owner::where('id_owner', $id)->get();
        return view('admin.owner.edit', compact('owner', 'admin'));
    }

    public function update(Request $request, $id){
        $data = [
            'nama_owner' => $request->nama_owner,
            'username_owner' => $request->username_owner,
            'email_owner' => $request->email_owner,
            'password_owner' => md5($request->password_owner),
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        Owner::where('id_owner', $id)->update($data);

        return redirect('admin/owner');
    }

    public function destroy($id){
        Kasir::where('id_owner', '=', $id)->delete();
        return redirect('admin/owner');
    }
}
