<?php

namespace App\Http\Controllers;

use App\Hidangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pelanggan;
use App\Http\Controllers\OwnerController;

class OwnerHidanganController extends Controller {

    public function index(){
        if(!OwnerController::getOwner()){
            return redirect('owner/login');
        }
        $owner = OwnerController::getOwner();
        
        $makanan = Hidangan::where('jenis_hidangan', 'Makanan')->get();
        $minuman = Hidangan::where('jenis_hidangan', 'Minuman')->get();

        return view('owner.hidangan.index', compact('makanan', 'minuman', 'owner'));
    }
}
