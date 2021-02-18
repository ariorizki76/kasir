<?php

namespace App\Http\Controllers;
session_start();
use App\Admin;
use App\Pelanggan;
use App\Kasir;
use App\Waiter;
use App\Owner;
use App\DetailPemesanan;
use App\Pemesanan;
use App\Hidangan;
use App\Meja;
use Illuminate\Http\Request;

class AdminController extends Controller {

    public function index(){
        if (!isset($_SESSION['id_admin'])) {
            return redirect('admin/login');
        } else {
            $row = Admin::where('id_admin', $_SESSION['id_admin'])->first();
            $admin = [
                'id_admin' => $row['id_admin'],
                'nama_admin' => $row['nama_admin'],
                'username_admin' => $row['username_admin'],
                'email_admin' => $row['email_admin'],
                'foto_admin' => $row['foto_admin'],
            ];
            

            $dashboard = [
                'jumlah_pelanggan' => Pelanggan::count(),
                'jumlah_hidangan' => Hidangan::count(),
                'jumlah_kasir' => Kasir::count(),
                'jumlah_waiter' => Waiter::count(),
                'jumlah_admin' => Admin::count(),
                'jumlah_owner' => Owner::count(),
            ];

            $pesanan = Pemesanan::join('pelanggan', 'pelanggan.id_pelanggan', '=', 'pemesanan.id_pelanggan')->join('kasir', 'kasir.id_kasir', '=', 'pemesanan.id_kasir')->orderBy('id_pemesanan','desc')->get();

            return view('admin.index', compact('admin', 'dashboard', 'pesanan'));
        }
        
        return view('admin.index', compact('admin'));
    }

    public static function getAdmin(){
    	if (!isset($_SESSION['id_admin'])) {
            return false;
        } else {
            $row = Admin::where('id_admin', $_SESSION['id_admin'])->first();
            $admin = [
                'id_admin' => $row['id_admin'],
                'nama_admin' => $row['nama_admin'],
                'username_admin' => $row['username_admin'],
                'email_admin' => $row['email_admin'],
                'foto_admin' => $row['foto_admin'],
            ];
            return $admin;
        }
    }

    public static function showLoginForm(){
    	if (!isset($_SESSION['id_admin'])) {
            $alert = false;
    		return view('admin.auth.login', compact('alert'));
    	} else {
    		return redirect('admin');
    	}
    }

    public static function login(Request $request){
    	$username_admin = $request->username;
    	$password_admin = md5($request->password);

    	$row = Admin::where('username_admin', $username_admin)->where('password_admin', $password_admin)->exists();
    	$rows = $row['exists'];

    	if($row){
            $admin = Admin::where('username_admin', $username_admin)->where('password_admin', $password_admin)->get();
            foreach ($admin as $admin) {
                $_SESSION = [
                    'id_admin' => $admin->id_admin,
                    'nama_admin' => $admin->nama_admin,
                    'username_admin' => $admin->username_admin,
                    'email_admin' => $admin->email_admin,
                ];
            }
            return redirect('/');
    		
    	} else {
            $alert = true;
            return view('admin.auth.login', compact('alert'));
    	}
    }

    public function showRegisterForm(){
        return view('admin.auth.register');
    }

    public function register(Request $request){
        $file = $request->file('foto_admin');
        $format = $file->getClientOriginalExtension();
        $name = $request->username.'.'.$format;
        $file->move('images/profil', $name);

        $data = [
            'nama_admin' => $request->name,
            'username_admin' => $request->username,
            'email_admin' => $request->email,
            'password_admin' => md5($request->password),
            'foto_admin' => $name,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        Admin::insert($data);

        $admin = Admin::where('username_admin', $data['username_admin'])->where('password_admin', $data['password_admin'])->get();

        foreach ($admin as $admin) {
            $_SESSION = [
                'id_admin' => $admin->id_admin,
                'nama_admin' => $admin->nama_admin,
                'username_admin' => $admin->username_admin,
                'email_admin' => $admin->email_admin,
            ];
        }
        return redirect('/');
    }

    public function logout(){
        session_destroy();

        return redirect('');
    }
}