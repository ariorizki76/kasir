<?php

namespace App\Http\Controllers;
session_start();
use App\Pelanggan;
use App\Kasir;
use App\Waiter;
use App\Admin;
use App\Owner;
use App\Hidangan;

use Illuminate\Http\Request;

class IndexController extends Controller {

    public function index(){
        $hidangan = Hidangan::limit(6)->get();
        $makanan = Hidangan::where('jenis_hidangan', 'Makanan')->get();
        $minuman = Hidangan::where('jenis_hidangan', 'Minuman')->get();

        if(isset($_SESSION['id_pelanggan'])){
            $row = Pelanggan::where('id_pelanggan', $_SESSION['id_pelanggan'])->first();
            $pelanggan = [
                'id_pelanggan' => $row['id_pelanggan'],
                'nama_pelanggan' => $row['nama_pelanggan'],
                'username_pelanggan' => $row['username_pelanggan'],
                'email_pelanggan' => $row['email_pelanggan'],
                'foto_pelanggan' => $row['foto_pelanggan'],
            ];
            $islogin = ['login' => 'pelanggan'];
            return view('index', compact('pelanggan', 'islogin', 'hidangan', 'makanan', 'minuman'));
        } 
        else if(isset($_SESSION['id_kasir'])){
            $row = Kasir::where('id_kasir', $_SESSION['id_kasir'])->first();
            $kasir = [
                'id_kasir' => $row['id_kasir'],
                'nama_kasir' => $row['nama_kasir'],
                'username_kasir' => $row['username_kasir'],
                'email_kasir' => $row['email_kasir'],
                'foto_kasir' => $row['foto_kasir'],
            ];
            $islogin = ['login' => 'kasir'];
            return view('index', compact('kasir', 'islogin', 'hidangan', 'makanan', 'minuman'));
        } 
        else if(isset($_SESSION['id_waiter'])){
            $row = Waiter::where('id_waiter', $_SESSION['id_waiter'])->first();
            $waiter = [
                'id_waiter' => $row['id_waiter'],
                'nama_waiter' => $row['nama_waiter'],
                'username_waiter' => $row['username_waiter'],
                'email_waiter' => $row['email_waiter'],
                'foto_waiter' => $row['foto_waiter'],
            ];
            $islogin = ['login' => 'waiter'];
            return view('index', compact('waiter', 'islogin', 'hidangan', 'makanan', 'minuman'));
        } 
        else if(isset($_SESSION['id_admin'])){
            $row = Admin::where('id_admin', $_SESSION['id_admin'])->first();
            $admin = [
                'id_admin' => $row['id_admin'],
                'nama_admin' => $row['nama_admin'],
                'username_admin' => $row['username_admin'],
                'email_admin' => $row['email_admin'],
                'foto_admin' => $row['foto_admin'],
            ];
            $islogin = ['login' => 'admin'];
            return view('index', compact('admin', 'islogin', 'hidangan', 'makanan', 'minuman'));
        } 
        else if(isset($_SESSION['id_owner'])){
            $row = Owner::where('id_owner', $_SESSION['id_owner'])->first();
            $kasir = [
                'id_owner' => $row['id_owner'],
                'nama_owner' => $row['nama_owner'],
                'username_owner' => $row['username_owner'],
                'email_owner' => $row['email_owner'],
                'foto_owner' => $row['foto_owner'],
            ];
            $islogin = ['login' => 'owner'];
            return view('index', compact('owner', 'islogin', 'hidangan', 'makanan', 'minuman'));
        } 
        else {
            $islogin = ['login' => 'false'];
            return view('index', compact('islogin', 'makanan', 'hidangan', 'minuman'));
        }
    }
    public function getHidangan($jenis_hidangan){
        Hidangan::where('jenis_hidangan', $jenis_hidangan)->get();
    }
}