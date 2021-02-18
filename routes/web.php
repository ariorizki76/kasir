<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'IndexController@index');

Auth::routes();

Route::group(['prefix'=>'pelanggan'], function(){
	Route::get('', 'PelangganController@index');

	Route::get('login', 'PelangganController@showLoginForm');
	Route::post('login', 'PelangganController@login');
	Route::get('logout', 'PelangganController@logout');
	Route::get('register', 'PelangganController@showRegisterForm');
	Route::post('register', 'PelangganController@register');

	Route::resource('pemesanan', 'PelangganPemesananController');
	Route::resource('hidangan', 'PelangganHidanganController');
	Route::resource('pengaturan', 'PelangganPengaturanController');
});


Route::group(['prefix'=>'kasir'], function(){
	Route::get('', 'KasirController@index');

	Route::get('login', 'KasirController@showLoginForm');
	Route::post('login', 'KasirController@login');
	Route::get('logout', 'KasirController@logout');
	Route::get('register', 'KasirController@showRegisterForm');
	Route::post('register', 'KasirController@register');

	Route::resource('pemesanan', 'KasirPemesananController');
	Route::resource('hidangan', 'KasirHidanganController');
	Route::resource('pengaturan', 'KasirPengaturanController');
});


Route::group(['prefix'=>'admin'], function(){
	Route::get('', 'AdminController@index');

	Route::get('login', 'AdminController@showLoginForm');
	Route::post('login', 'AdminController@login');
	Route::get('logout', 'AdminController@logout');
	Route::get('register', 'AdminController@showRegisterForm');
	Route::post('register', 'AdminController@register');

	Route::resource('admin', 'AdminAdminController');
	Route::resource('pelanggan', 'AdminPelangganController');
	Route::resource('kasir', 'AdminKasirController');
	Route::resource('waiter', 'AdminWaiterController');
	Route::resource('owner', 'AdminOwnerController');
	Route::resource('meja', 'AdminMejaController');
	Route::resource('hidangan', 'AdminHidanganController');
    Route::resource('pengaturan', 'AdminPengaturanController');
});


Route::group(['prefix'=>'waiter'], function(){
	Route::get('', 'WaiterController@index');

	Route::get('login', 'WaiterController@showLoginForm');
	Route::post('login', 'WaiterController@login');
	Route::get('logout', 'WaiterController@logout');
	Route::get('register', 'WaiterController@showRegisterForm');
	Route::post('register', 'WaiterController@register');

	Route::resource('pemesanan', 'WaiterPemesananController');
	Route::resource('hidangan', 'WaiterHidanganController');
    Route::resource('pengaturan', 'WaiterPengaturanController');
});


Route::group(['prefix'=>'owner'], function(){
	Route::get('', 'OwnerController@index');

	Route::get('login', 'OwnerController@showLoginForm');
	Route::post('login', 'OwnerController@login');
	Route::get('logout', 'OwnerController@logout');
	Route::get('register', 'OwnerController@showRegisterForm');
	Route::post('register', 'OwnerController@register');

	Route::resource('hidangan', 'OwnerHidanganController');
    Route::resource('pengaturan', 'OwnerPengaturanController');
});
