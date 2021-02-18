<?php

namespace App\Http\Controllers;

use App\Hidangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pelanggan;
use App\Http\Controllers\WaiterController;

class WaiterHidanganController extends Controller {

    public function index(){
        if(!WaiterController::getWaiter()){
            return redirect('waiter/login');
        }
        $waiter = WaiterController::getWaiter();
        
        $makanan = Hidangan::where('jenis_hidangan', 'Makanan')->get();
        $minuman = Hidangan::where('jenis_hidangan', 'Minuman')->get();

        return view('waiter.hidangan.index', compact('makanan', 'minuman', 'waiter'));
    }
}
