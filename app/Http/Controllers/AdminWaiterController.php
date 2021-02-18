<?php

namespace App\Http\Controllers;

use App\Waiter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pelanggan;
use App\Http\Controllers\AdminController;

class AdminWaiterController extends Controller {

    public function index(){
        if(!AdminController::getAdmin()){
            return redirect('admin/login');
        }
        $admin = AdminController::getAdmin();
        $waiter = Waiter::all();
        return view('admin.waiter.index', compact('waiter', 'admin'));
    }

    public function create(){
        if(!AdminController::getAdmin()){
            return redirect('admin/login');
        }
        $admin = AdminController::getAdmin();
        return view('admin.waiter.create', compact('admin'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama_waiter' => 'required',
            'username_waiter' => 'required',
            'email_waiter' => 'required',
            'password_waiter' => 'required',
        ]);

        $data = [
            'nama_waiter' => $request->nama_waiter,
            'username_waiter' => $request->username_waiter,
            'email_waiter' => $request->email_waiter,
            'password_waiter' => md5($request->password_waiter),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];
        Waiter::insert($data);
        return redirect('admin/waiter');
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
        $waiter = Waiter::where('id_waiter', $id)->get();
        return view('admin.waiter.edit', compact('waiter', 'admin'));
    }

    public function update(Request $request, $id){
        $data = [
            'nama_waiter' => $request->nama_waiter,
            'username_waiter' => $request->username_waiter,
            'email_waiter' => $request->email_waiter,
            'password_waiter' => md5($request->password_waiter),
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        Waiter::where('id_waiter', $id)->update($data);

        return redirect('admin/waiter');
    }

    public function destroy($id){
        Waiter::where('id_waiter', '=', $id)->delete();
        return redirect('admin/waiter');
    }
}
