<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPengaturanController extends Controller{

    public function index(){
        if(!AdminController::getAdmin()){
            return redirect('admin/login');
        }
        $admin = AdminController::getAdmin();
        return view('admin.pengaturan.index', compact('admin'));
    }

    public function create(){
        
    }

    public function store(Request $request){
        
    }

    public function show($id){
        
    }

    public function edit($id){
        if(!AdminController::getAdmin()){
            return redirect('admin/login');
        }
        $admin = AdminController::getAdmin();
        return view('admin.pengaturan.edit', compact('admin'));
    }

    public function update(Request $request, $id){
        $file = $request->file('foto_admin');
        $format = $file->getClientOriginalExtension();
        $name = $request->username_admin.'.'.$format;
        $file->move('images/profil', $name);

        $data = [
            'nama_admin' => $request->nama_admin,
            'username_admin' => $request->username_admin,
            'email_admin' => $request->email_admin,
            'password_admin' => md5($request->password_admin),
            'foto_admin' => $name,
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        Admin::where('id_admin', $id)->update($data);

        return redirect('admin/pengaturan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
