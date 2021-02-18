<?php

namespace App\Http\Controllers;

use App\Pelanggan;
use App\Pemesanan;
use App\DetailPemesanan;
use App\Meja;
use App\Hidangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PelangganController;

class PelangganPemesananController extends Controller {
    public function index(){
        if(!PelangganController::getPelanggan()){
            return redirect('pelanggan/login');
        }
        $pelanggan = PelangganController::getPelanggan();
        $pemesanan = Pemesanan::join('meja', 'meja.id_meja', '=', 'pemesanan.id_meja')->join('kasir', 'kasir.id_kasir', '=', 'pemesanan.id_kasir')->select('pemesanan.*', 'no_meja', 'nama_kasir')->where('id_pelanggan', $pelanggan['id_pelanggan'])->get();
        return view('pelanggan.pemesanan.index', compact('pemesanan', 'pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        if(!PelangganController::getPelanggan()){
            return redirect('pelanggan/login');
        }
        $meja = Meja::all();
        $makanan = Hidangan::where('jenis_hidangan', 'Makanan')->get();
        $minuman = Hidangan::where('jenis_hidangan', 'Minuman')->get();
        $pelanggan = PelangganController::getPelanggan();
        return view('pelanggan.pemesanan.create', compact('meja', 'makanan', 'minuman', 'pelanggan'));
    }

    public function store(Request $request){
        /*---------------------------------------------+
        |             ALUR KERJA PEMESANAN             |
        |-----------------------------------------------
        | 1. Pertama insert ke tb_pemesanan dulu       |
        | 2. Diambil id_pemesanan terakhir             |
        | 3. Diambil id_hidangan dari checkbox yang di |
        |    check                                     |
        | 4. Looping untuk inset ke tb_detil_pemesanan |
        |    sebanyak hidangan yang dipesan            |
        | 5. Update tb_pemesanan ubah nilai total      |
        |    pemesanannya                              |
        +---------------------------------------------*/

        // 1.
        $pelanggan = PelangganController::getPelanggan();
        $data = [
            'id_pelanggan' => $pelanggan['id_pelanggan'],
            'id_meja' => $request->id_meja,
            'id_kasir' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];
        Pemesanan::insert($data);

        // 2.
        $sql = Pemesanan::select('id_pemesanan')->where('id_pelanggan', '=', $pelanggan['id_pelanggan'])->orderBy('id_pemesanan', 'desc')->first();
        $id_pemesanan = $sql['id_pemesanan'];

        // 3.
        $id_hidangan = $request->hidangan;

        // 4.
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

        // 5.
        $data3 = [
            'total_pemesanan' => $total_pemesanan,
        ];
        Pemesanan::where('id_pemesanan', $id_pemesanan)->update($data3);

        return redirect('pelanggan/pemesanan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        if(!PelangganController::getPelanggan()){
            return redirect('pelanggan/login');
        }
        $pelanggan = PelangganController::getPelanggan();
        $detail_pemesanan = DetailPemesanan::join('pemesanan', 'pemesanan.id_pemesanan', '=', 'detail_pemesanan.id_pemesanan')
        ->join('hidangan', 'hidangan.id_hidangan', '=', 'detail_pemesanan.id_hidangan')
        ->join('meja', 'meja.id_meja', '=', 'pemesanan.id_meja')
        ->join('kasir', 'kasir.id_kasir', '=', 'pemesanan.id_kasir')
        ->where('pemesanan.id_pemesanan', $id)
        ->where('pemesanan.id_pelanggan', $pelanggan['id_pelanggan'])
        ->get();
        return view('pelanggan.pemesanan.show', compact('detail_pemesanan', 'pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
