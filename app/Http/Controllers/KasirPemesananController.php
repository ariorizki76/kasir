<?php

namespace App\Http\Controllers;

use App\Pelanggan;
use App\Kasir;
use App\Pemesanan;
use App\Meja;
use App\Hidangan;
use App\DetailPemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\KasirController;

class KasirPemesananController extends Controller {

    public function index(){
        if(!KasirController::getKasir()){
            return redirect('kasir/login');
        }
        $kasir = KasirController::getKasir();
        $pemesanan = Pemesanan::join('meja', 'meja.id_meja', '=', 'pemesanan.id_meja')->join('kasir', 'kasir.id_kasir', '=', 'pemesanan.id_kasir')->join('pelanggan', 'pelanggan.id_pelanggan', '=', 'pemesanan.id_pelanggan')->select('pemesanan.*', 'no_meja', 'nama_kasir', 'nama_pelanggan')->get();
        return view('kasir.pemesanan.index', compact('pemesanan', 'kasir'));
    }

    public function store(Request $request){
        $kasir = KasirController::getKasir();

        $data = [
            'id_meja' => $request->id_meja,
            'id_kasir' => $request->id_kasir,
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

        return redirect('kasir/pemesanan');
    }

    public function show($id){
        if(!KasirController::getKasir()){
            return redirect('kasir/login');
        }
        $kasir = KasirController::getKasir();
        $detail_pemesanan = DetailPemesanan::join('pemesanan', 'pemesanan.id_pemesanan', '=', 'detail_pemesanan.id_pemesanan')
        ->join('hidangan', 'hidangan.id_hidangan', '=', 'detail_pemesanan.id_hidangan')
        ->join('meja', 'meja.id_meja', '=', 'pemesanan.id_meja')
        ->join('kasir', 'kasir.id_kasir', '=', 'pemesanan.id_kasir')
        ->where('pemesanan.id_pemesanan', $id)
        ->get();

        return view('kasir.pemesanan.show', compact('detail_pemesanan', 'kasir'));
    }

    public function edit($id){
        if(!KasirController::getKasir()){
            return redirect('kasir/login');
        }
        $kasir = KasirController::getKasir();
        $pemesanan = Pemesanan::where('id_pemesanan', $id)->get();
        $meja = Meja::all();
        $pelanggan = Pelanggan::all();
        $Kasirs = Kasir::all();
        return view('kasir.pemesanan.edit', compact('pemesanan','meja','pelanggan','kasirs', 'kasir'));
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
        return redirect('kasir/pemesanan');
    }

    public function destroy($id){
        DetailPemesanan::where('id_pemesanan', $id)->delete();
        Pemesanan::where('id_pemesanan', $id)->delete();
        return redirect('kasir/pemesanan');
    }
}
