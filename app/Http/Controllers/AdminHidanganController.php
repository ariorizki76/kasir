<?php

namespace App\Http\Controllers;

use App\Hidangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pelanggan;
use App\Http\Controllers\AdminController;

class AdminHidanganController extends Controller {

    public function index(){
        if(!AdminController::getAdmin()){
            return redirect('admin/login');
        }
        $admin = AdminController::getAdmin();
        
        $makanan = Hidangan::where('jenis_hidangan', 'Makanan')->get();
        $minuman = Hidangan::where('jenis_hidangan', 'Minuman')->get();

        return view('admin.hidangan.index', compact('makanan', 'minuman', 'admin'));
    }

    public function create(){
        if(!AdminController::getAdmin()){
            return redirect('admin/login');
        }
        $admin = AdminController::getAdmin();
        return view('admin.hidangan.create', compact('admin'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama_hidangan' => 'required',
            'jenis_hidangan' => 'required',
            'harga_hidangan' => 'required',
        ]);

        $file = $request->file('foto_hidangan');
        $format = $file->getClientOriginalExtension();
        $name = $request->nama_hidangan.'.'.$format;
        $file->move('images/hidangan', $name);

        $data = [
            'nama_hidangan' => $request->nama_hidangan,
            'jenis_hidangan' => $request->jenis_hidangan,
            'harga_hidangan' => $request->harga_hidangan,
            'foto_hidangan' => $name,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];
        Hidangan::insert($data);
        return redirect('admin/hidangan');
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
        $hidangan = Hidangan::where('id_hidangan', $id)->get();
        return view('admin.hidangan.edit', compact('hidangan', 'admin'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'nama_hidangan' => 'required',
            'jenis_hidangan' => 'required',
            'harga_hidangan' => 'required',
        ]);

        $file = $request->file('foto_hidangan');
        $format = $file->getClientOriginalExtension();
        $name = $request->nama_hidangan.'.'.$format;
        $file->move('images/hidangan', $name);

        $data = [
            'nama_hidangan' => $request->nama_hidangan,
            'jenis_hidangan' => $request->jenis_hidangan,
            'harga_hidangan' => $request->harga_hidangan,
            'foto_hidangan' => $name,
            'updated_at' => date("Y-m-d H:i:s")
        ];
        Hidangan::where('id_hidangan', $id)->update($data);

        return redirect('admin/hidangan');
    }

    public function destroy($id){
        Hidangan::where('id_hidangan', '=', $id)->delete();
        return redirect('admin/hidangan');
    }
}
