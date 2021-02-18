<?php

namespace App\Http\Controllers;

use App\Pelanggan;
use App\Waiter;
use App\Pemesanan;
use App\Meja;
use App\Hidangan;
use App\DetailPemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\WaiterController;

class WaiterPemesananController extends Controller {

    public function index(){
        if(!WaiterController::getWaiter()){
            return redirect('waiter/login');
        }
        $waiter = WaiterController::getWaiter();
        $pemesanan = Pemesanan::join('meja', 'meja.id_meja', '=', 'pemesanan.id_meja')->join('kasir', 'kasir.id_kasir', '=', 'pemesanan.id_kasir')->join('pelanggan', 'pelanggan.id_pelanggan', '=', 'pemesanan.id_pelanggan')->select('pemesanan.*', 'no_meja', 'nama_kasir', 'nama_pelanggan')->get();
        return view('waiter.pemesanan.index', compact('pemesanan', 'waiter'));
    }

    public function create(){
        if(!WaiterController::getWaiter()){
            return redirect('waiter/login');
        }
        $waiter = WaiterController::getWaiter();
        $meja = Meja::all();
        $pelanggan = Pelanggan::all();
        $waiters = Waiter::all();
        $makanan = Hidangan::where('jenis_hidangan', 'Makanan')->get();
        $minuman = Hidangan::where('jenis_hidangan', 'Minuman')->get();
        return view('waiter.pemesanan.create', compact('waiters', 'meja', 'pelanggan', 'makanan','minuman', 'waiter'));
    }

    public function store(Request $request){
        $waiter = WaiterController::getWaiter();

        $data = [
            'id_meja' => $request->id_meja,
            'id_waiter' => $request->id_waiter,
            'id_pelanggan' => $request->id_pelanggan,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];
        Pemesanan::insert($data);

        $sql = Pemesanan::select('id_pemesanan')->where('id_pelanggan', $request->id_pelanggan)->orderBy('id_pemesanan', 'desc')->first();
        $id_pemesanan = $sql['id_pemesanan'];

        $id_hidangan = $request->hidangan;

        $total_pemesanan = 0;

        foreach ($id_hidangan as $id_hidangan) {
            $jml = 'jumlah_hidangan'.$id_hidangan;
            $hrg = 'harga_hidangan'.$id_hidangan;

            $jumlah_hidangan = $_POST[$jml];
            $harga_hidangan = $_POST[$hrg];
            $total_harga_hidangan = ((int)$jumlah_hidangan * (int)$harga_hidangan);
            $data2 = [
                'id_pemesanan' => $id_pemesanan,
                'id_hidangan' => $id_hidangan,
                'jumlah_hidangan' => $jumlah_hidangan,
                'total_harga_hidangan' => $total_harga_hidangan,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ];
            DetailPemesanan::insert($data2);

            $total_pemesanan = $total_pemesanan + $total_harga_hidangan;
        }

        $data3 = [
            'total_pemesanan' => $total_pemesanan,
        ];
        Pemesanan::where('id_pemesanan', $id_pemesanan)->update($data3);

        return redirect('waiter/pemesanan');
    }

    public function show($id){
        if(!WaiterController::getWaiter()){
            return redirect('waiter/login');
        }
        $waiter = WaiterController::getWaiter();
        $detail_pemesanan = DetailPemesanan::join('pemesanan', 'pemesanan.id_pemesanan', '=', 'detail_pemesanan.id_pemesanan')
        ->join('hidangan', 'hidangan.id_hidangan', '=', 'detail_pemesanan.id_hidangan')
        ->join('meja', 'meja.id_meja', '=', 'pemesanan.id_meja')
        ->join('kasir', 'kasir.id_kasir', '=', 'pemesanan.id_kasir')
        ->where('pemesanan.id_pemesanan', $id)
        ->get();

        return view('waiter.pemesanan.show', compact('detail_pemesanan', 'waiter'));
    }

    public function edit($id){
        if(!WaiterController::getWaiter()){
            return redirect('waiter/login');
        }
        $waiter = WaiterController::getWaiter();
        $pemesanan = Pemesanan::where('id_pemesanan', $id)->get();
        $meja = Meja::all();
        $pelanggan = Pelanggan::all();
        $waiters = Waiter::all();
        return view('waiter.pemesanan.edit', compact('pemesanan','meja','pelanggan','waiters', 'waiter'));
    }

    public function update(Request $request, $id){
        $data = [
            'id_meja' => $request->id_meja,
            'id_pelanggan' => $request->id_pelanggan,
            'id_kasir' => $request->id_kasir,
            'total_pemesanan' => $request->total_pemesanan,
            'status_pemesanan' => $request->status_pemesanan,
            'updated_at' => date("Y-m-d H:i:s")
        ];
        Pemesanan::where('id_pemesanan', $id)->update($data);
        return redirect('waiter/pemesanan');
    }

    public function destroy($id){
        DetailPemesanan::where('id_pemesanan', $id)->delete();
        Pemesanan::where('id_pemesanan', $id)->delete();
        return redirect('waiter/pemesanan');
    }
}
