<?php

namespace App\Http\Controllers;
session_start();
use App\Waiter;
use App\Pelanggan;
use App\DetailPemesanan;
use App\Pemesanan;
use App\Hidangan;
use App\Meja;
use Illuminate\Http\Request;

class WaiterController extends Controller {

    public function index(){
        if (!isset($_SESSION['id_waiter'])) {
            return redirect('waiter/login');
        } else {
            $row = Waiter::where('id_waiter', $_SESSION['id_waiter'])->first();
            $waiter = [
                'id_waiter' => $row['id_waiter'],
                'nama_waiter' => $row['nama_waiter'],
                'username_waiter' => $row['username_waiter'],
                'email_waiter' => $row['email_waiter'],
                'foto_waiter' => $row['foto_waiter'],
            ];
            

            $dashboard = [
                'jumlah_pelanggan' => Pelanggan::count(),
                'jumlah_pesanan' => Pemesanan::count(),
                'jumlah_hidangan' => Hidangan::count(),
            ];

            $pesanan = Pemesanan::join('pelanggan', 'pelanggan.id_pelanggan', '=', 'pemesanan.id_pelanggan')->join('kasir', 'kasir.id_kasir', '=', 'pemesanan.id_kasir')->orderBy('id_pemesanan','desc')->get();

            return view('waiter.index', compact('waiter', 'dashboard', 'pesanan'));
        }
        
        return view('waiter.index', compact('waiter'));
    }

    public static function getWaiter(){
    	if (!isset($_SESSION['id_waiter'])) {
            return false;
        } else {
            $row = Waiter::where('id_waiter', $_SESSION['id_waiter'])->first();
            $waiter = [
                'id_waiter' => $row['id_waiter'],
                'nama_waiter' => $row['nama_waiter'],
                'username_waiter' => $row['username_waiter'],
                'email_waiter' => $row['email_waiter'],
                'foto_waiter' => $row['foto_waiter'],
            ];
            return $waiter;
        }
    }

    public static function showLoginForm(){
    	if (!isset($_SESSION['id_waiter'])) {
            $alert = false;
    		return view('waiter.auth.login', compact('alert'));
    	} else {
    		return redirect('waiter');
    	}
    }

    public static function login(Request $request){
    	$username_waiter = $request->username;
    	$password_waiter = md5($request->password);

    	$row = Waiter::where('username_waiter', $username_waiter)->where('password_waiter', $password_waiter)->exists();
    	$rows = $row['exists'];

    	if($row){
            $waiter = Waiter::where('username_waiter', $username_waiter)->where('password_waiter', $password_waiter)->get();
            foreach ($waiter as $waiter) {
                $_SESSION = [
                    'id_waiter' => $waiter->id_waiter,
                    'nama_waiter' => $waiter->nama_waiter,
                    'username_waiter' => $waiter->username_waiter,
                    'email_waiter' => $waiter->email_waiter,
                ];
            }
            return redirect('/');
    		
    	} else {
            $alert = true;
            return view('waiter.auth.login', compact('alert'));
    	}
    }

    public function showRegisterForm(){
        return view('waiter.auth.register');
    }

    public function register(Request $request){
        $file = $request->file('foto_waiter');
        $format = $file->getClientOriginalExtension();
        $name = $request->username.'.'.$format;
        $file->move('images/profil', $name);

        $data = [
            'nama_waiter' => $request->name,
            'username_waiter' => $request->username,
            'email_waiter' => $request->email,
            'password_waiter' => md5($request->password),
            'foto_waiter' => $name,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        Waiter::insert($data);

        $waiter = Waiter::where('username_waiter', $data['username_waiter'])->where('password_waiter', $data['password_waiter'])->get();

        foreach ($waiter as $waiter) {
            $_SESSION = [
                'id_waiter' => $waiter->id_waiter,
                'nama_waiter' => $waiter->nama_waiter,
                'username_waiter' => $waiter->username_waiter,
                'email_waiter' => $waiter->email_waiter,
            ];
        }
        return redirect('/');
    }

    public function logout(){
        session_destroy();

        return redirect('');
    }
}