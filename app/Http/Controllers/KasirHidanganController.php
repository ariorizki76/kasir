<?php

namespace App\Http\Controllers;

use App\Hidangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pelanggan;
use App\Http\Controllers\KasirController;

class KasirHidanganController extends Controller {

    public function index(){
        if(!KasirController::getKasir()){
            return redirect('kasir/login');
        }
        $kasir = KasirController::getKasir();
        
        $makanan = Hidangan::where('jenis_hidangan', 'Makanan')->get();
        $minuman = Hidangan::where('jenis_hidangan', 'Minuman')->get();

        return view('kasir.hidangan.index', compact('makanan', 'minuman', 'kasir'));
    }
}
