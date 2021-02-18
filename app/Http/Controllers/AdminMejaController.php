<?php

namespace App\Http\Controllers;

use App\Meja;
use App\Pemesanan;
use App\DetailPemesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;

class AdminMejaController extends Controller {

    public function index(){
        if(!AdminController::getAdmin()){
            return redirect('admin/login');
        }
        $admin = AdminController::getAdmin();
        $meja = Meja::all();
        return view('admin.meja.index', compact('meja', 'admin'));
    }

    public function create(){
        if(!AdminController::getAdmin()){
            return redirect('admin/login');
        }
        $admin = AdminController::getAdmin();
        return view('admin.meja.create', compact('admin'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'no_meja' => 'required',
            'cafe_meja' => 'required',
        ]);

        $data = [
            'no_meja' => $request->no_meja,
            'cafe_meja' => $request->cafe_meja,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];
        Meja::insert($data);
        return redirect('admin/meja');
    }

    public function show($id){
        
    }

    public function edit($id){
        if(!AdminController::getAdmin()){
            return redirect('admin/login');
        }
        $admin = AdminController::getAdmin();
        $meja = Meja::where('id_meja', $id)->get();
        return view('admin.meja.edit', compact('meja', 'admin'));
    }

    public function update(Request $request, $id){
        $data = [
            'no_meja' => $request->no_meja,
            'cafe_meja' => $request->cafe_meja,
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        Meja::where('id_meja', $id)->update($data);
        return redirect('admin/meja');
    }

    public function destroy($id){

        $sql = Pemesanan::select('id_pemesanan')->where('id_meja', $id)->get();

        foreach ($sql as $sql) {
            $id_pemesanan = $sql->id_pemesanan;
            DetailPemesanan::where('id_pemesanan', $id_pemesanan)->delete();
        }
        Pemesanan::where('id_meja', $id)->delete();
        Meja::where('id_meja', $id)->delete();
        return redirect('admin/meja');
    }
}
