<?php

namespace App\Http\Controllers;
session_start();
use App\Kasir;
use App\Pelanggan;
use App\DetailPemesanan;
use App\Pemesanan;
use App\Hidangan;
use App\Meja;
use Illuminate\Http\Request;

class KasirController extends Controller {

    public function index(){
        if (!isset($_SESSION['id_kasir'])) {
            return redirect('kasir/login');
        } else {
            $row = Kasir::where('id_kasir', $_SESSION['id_kasir'])->first();
            $kasir = [
                'id_kasir' => $row['id_kasir'],
                'nama_kasir' => $row['nama_kasir'],
                'username_kasir' => $row['username_kasir'],
                'email_kasir' => $row['email_kasir'],
                'foto_kasir' => $row['foto_kasir'],
            ];
            

            $dashboard = [
                'jumlah_pelanggan' => Pelanggan::count(),
                'jumlah_pesanan' => Pemesanan::count(),
                'jumlah_hidangan' => Hidangan::count(),
            ];

            $pesanan = Pemesanan::join('pelanggan', 'pelanggan.id_pelanggan', '=', 'pemesanan.id_pelanggan')->join('kasir', 'kasir.id_kasir', '=', 'pemesanan.id_kasir')->orderBy('id_pemesanan','desc')->get();

            return view('kasir.index', compact('kasir', 'dashboard', 'pesanan'));
        }
        
        return view('kasir.index', compact('kasir'));
    }

    public static function getKasir(){
    	if (!isset($_SESSION['id_kasir'])) {
            return false;
        } else {
            $row = Kasir::where('id_kasir', $_SESSION['id_kasir'])->first();
            $kasir = [
                'id_kasir' => $row['id_kasir'],
                'nama_kasir' => $row['nama_kasir'],
                'username_kasir' => $row['username_kasir'],
                'email_kasir' => $row['email_kasir'],
                'foto_kasir' => $row['foto_kasir'],
            ];
            return $kasir;
        }
    }

    public static function showLoginForm(){
    	if (!isset($_SESSION['id_kasir'])) {
            $alert = false;
    		return view('kasir.auth.login', compact('alert'));
    	} else {
    		return redirect('kasir');
    	}
    }

    public static function login(Request $request){
    	$username_kasir = $request->username;
    	$password_kasir = md5($request->password);

    	$row = Kasir::where('username_kasir', $username_kasir)->where('password_kasir', $password_kasir)->exists();
    	$rows = $row['exists'];

    	if($row){
            $kasir = Kasir::where('username_kasir', $username_kasir)->where('password_kasir', $password_kasir)->get();
            foreach ($kasir as $kasir) {
                $_SESSION = [
                    'id_kasir' => $kasir->id_kasir,
                    'nama_kasir' => $kasir->nama_kasir,
                    'username_kasir' => $kasir->username_kasir,
                    'email_kasir' => $kasir->email_kasir,
                ];
            }
            return redirect('/');
    		
    	} else {
            $alert = true;
            return view('kasir.auth.login', compact('alert'));
    	}
    }

    public function showRegisterForm(){
        return view('kasir.auth.register');
    }

    public function register(Request $request){
        $file = $request->file('foto_kasir');
        $format = $file->getClientOriginalExtension();
        $name = $request->username.'.'.$format;
        $file->move('images/profil', $name);

        $data = [
            'nama_kasir' => $request->name,
            'username_kasir' => $request->username,
            'email_kasir' => $request->email,
            'password_kasir' => md5($request->password),
            'foto_kasir' => $name,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        Kasir::insert($data);

        $kasir = Kasir::where('username_kasir', $data['username_kasir'])->where('password_kasir', $data['password_kasir'])->get();

        foreach ($kasir as $kasir) {
            $_SESSION = [
                'id_kasir' => $kasir->id_kasir,
                'nama_kasir' => $kasir->nama_kasir,
                'username_kasir' => $kasir->username_kasir,
                'email_kasir' => $kasir->email_kasir,
            ];
        }
        return redirect('/');
    }

    public function logout(){
        session_destroy();

        return redirect('');
    }
}