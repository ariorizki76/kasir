<?php

namespace App\Http\Controllers;
session_start();
use App\Owner;
use App\Pelanggan;
use App\DetailPemesanan;
use App\Pemesanan;
use App\Hidangan;
use App\Meja;
use Illuminate\Http\Request;

class OwnerController extends Controller {

    public function index(){
        if (!isset($_SESSION['id_owner'])) {
            return redirect('owner/login');
        } else {
            $row = Owner::where('id_owner', $_SESSION['id_owner'])->first();
            $owner = [
                'id_owner' => $row['id_owner'],
                'nama_owner' => $row['nama_owner'],
                'username_owner' => $row['username_owner'],
                'email_owner' => $row['email_owner'],
                'foto_owner' => $row['foto_owner'],
            ];
            

            $dashboard = [
                'jumlah_pelanggan' => Pelanggan::count(),
                'jumlah_pesanan' => Pemesanan::count(),
                'jumlah_hidangan' => Hidangan::count(),
            ];

            $pesanan = Pemesanan::join('pelanggan', 'pelanggan.id_pelanggan', '=', 'pemesanan.id_pelanggan')->join('kasir', 'kasir.id_kasir', '=', 'pemesanan.id_kasir')->orderBy('id_pemesanan','desc')->get();

            return view('owner.index', compact('owner', 'dashboard', 'pesanan'));
        }
        
        return view('owner.index', compact('owner'));
    }

    public static function getOwner(){
    	if (!isset($_SESSION['id_owner'])) {
            return false;
        } else {
            $row = Owner::where('id_owner', $_SESSION['id_owner'])->first();
            $owner = [
                'id_owner' => $row['id_owner'],
                'nama_owner' => $row['nama_owner'],
                'username_owner' => $row['username_owner'],
                'email_owner' => $row['email_owner'],
                'foto_owner' => $row['foto_owner'],
            ];
            return $owner;
        }
    }

    public static function showLoginForm(){
    	if (!isset($_SESSION['id_owner'])) {
            $alert = false;
    		return view('owner.auth.login', compact('alert'));
    	} else {
    		return redirect('owner');
    	}
    }

    public static function login(Request $request){
    	$username_owner = $request->username;
    	$password_owner = md5($request->password);

    	$row = Owner::where('username_owner', $username_owner)->where('password_owner', $password_owner)->exists();
    	$rows = $row['exists'];

    	if($row){
            $owner = Owner::where('username_owner', $username_owner)->where('password_owner', $password_owner)->get();
            foreach ($owner as $owner) {
                $_SESSION = [
                    'id_owner' => $owner->id_owner,
                    'nama_owner' => $owner->nama_owner,
                    'username_owner' => $owner->username_owner,
                    'email_owner' => $owner->email_owner,
                ];
            }
            return redirect('/');
    		
    	} else {
            $alert = true;
            return view('owner.auth.login', compact('alert'));
    	}
    }

    public function showRegisterForm(){
        return view('owner.auth.register');
    }

    public function register(Request $request){
        $file = $request->file('foto_owner');
        $format = $file->getClientOriginalExtension();
        $name = $request->username.'.'.$format;
        $file->move('images/profil', $name);

        $data = [
            'nama_owner' => $request->name,
            'username_owner' => $request->username,
            'email_owner' => $request->email,
            'password_owner' => md5($request->password),
            'foto_owner' => $name,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        Owner::insert($data);

        $owner = Owner::where('username_owner', $data['username_owner'])->where('password_owner', $data['password_owner'])->get();

        foreach ($owner as $owner) {
            $_SESSION = [
                'id_owner' => $owner->id_owner,
                'nama_owner' => $owner->nama_owner,
                'username_owner' => $owner->username_owner,
                'email_owner' => $owner->email_owner,
            ];
        }
        return redirect('/');
    }

    public function logout(){
        session_destroy();

        return redirect('');
    }
}