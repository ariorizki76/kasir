<?php

namespace App\Http\Controllers;

use App\Kasir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KasirPengaturanController extends Controller{

    public function index(){
        if(!KasirController::getKasir()){
            return redirect('kasir/login');
        }
        $kasir = KasirController::getKasir();
        return view('kasir.pengaturan.index', compact('kasir'));
    }

    public function create(){
        
    }

    public function store(Request $request){
        
    }

    public function show($id){
        
    }

    public function edit($id){
        if(!KasirController::getKasir()){
            return redirect('kasir/login');
        }
        $kasir = KasirController::getKasir();
        return view('kasir.pengaturan.edit', compact('kasir'));
    }

    public function update(Request $request, $id){
        $file = $request->file('foto_kasir');
        $format = $file->getClientOriginalExtension();
        $name = $request->username_kasir.'.'.$format;
        $file->move('images/profil', $name);

        $data = [
            'nama_kasir' => $request->nama_kasir,
            'username_kasir' => $request->username_kasir,
            'email_kasir' => $request->email_kasir,
            'password_kasir' => md5($request->password_kasir),
            'foto_kasir' => $name,
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        Kasir::where('id_kasir', $id)->update($data);

        return redirect('kasir/pengaturan');
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
