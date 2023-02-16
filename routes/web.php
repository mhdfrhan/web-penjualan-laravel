<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardBarangController;
use App\Http\Controllers\GuestCategoryController;

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


Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index');
Route::get('/products', 'HomeController@showProducts');
Route::get('/categories', 'GuestCategoryController@index');
Route::get('/categories/{category:slug}', 'GuestCategoryController@show')->name('kategori.show');

Route::middleware(['auth',])->group(function () {

	// dashboard
	Route::get('/dashboard', 'DashboardController@index');
	Route::get('/dashboard/profile', 'DashboardController@profile');
	Route::get('/dashboard/dataBarang/barang', 'DashboardBarangController@index');
	Route::resource('/dashboard/dataBarang/produk', 'DashboardBarangController');
	Route::get('/dashboard/dataBarang/kategori', 'CategoryController@index');
	Route::resource('/dashboard/kategori/produk', 'CategoryController');
	Route::get('/dashboard/dataPenjualan', 'DataPenjualanController@index');
	Route::get('/dataPenjualan/detail/{detail:slug}', 'DataPenjualanController@detail')->name('dashboard.detail');
	Route::post('/dataPenjualan/edit/{edit:id}', 'DataPenjualanController@edit')->name('dashboard.edit');
	Route::get('/dashboard/users/admin', 'UserController@admin');
	Route::get('/dashboard/users/pembeli', 'UserController@pembeli');
	Route::get('/dashboard/transaksi', 'TransaksiController@index')->name('dashboard.transaksi');
	Route::post('/dashboard/users/update', 'UserController@update')->name('user.update');
	Route::get('/dashboard/feedback', 'FeedbackController@dashboard')->name('dashboard.feedback');
	Route::post('/dashboard/feedback/hapus/{id}', 'FeedbackController@hapus')->name('feedback.hapus');

	// produk order
	Route::get('/pesanan', 'PesananController@index');
	Route::get('/cart', 'DetailBarangController@index');
	Route::post('/produk/keranjang/{keranjang:slug}', 'HomeController@tambahKeranjang')->name('tambah.keranjang');
	Route::get('/favorit', 'DetailBarangController@favorit');
	Route::post('/produk/favorit/{favorit:slug}', 'HomeController@tambahFavorit')->name('tambah.favorit');
	Route::post('/produk/hapus/favorit/{favorit:slug}', 'HomeController@hapusFavorit')->name('hapus.favorit');
	Route::post('/order-konfirmasi', 'DetailBarangController@order_konfirmasi')->name('order.konfirmasi');
	Route::post('/order-bayar', 'DetailBarangController@order_bayar')->name('order.bayar');
	Route::get('/pesanan/detail/{detail:slug}', 'PesananController@detail')->name('pesanan.detail');
	Route::post('/pesanan/batal/{batal:slug}', 'PesananController@batal')->name('pesanan.batal');
	Route::get('/order-hapus/{id}', 'DetailBarangController@order_hapus')->name('order.hapus');
	Route::post('/order-update', 'DetailBarangController@order_update')->name('order.update');

	// guest
	Route::get('/profile', 'HomeController@profile')->name('user.profile');
	Route::post('/dashboard/users/tambah', 'UserController@tambahAdmin')->name('admin.tambah');
	Route::post('/dashboard/pembeli/tambah', 'UserController@tambahPembeli')->name('pembeli.tambah');
	Route::post('/dashboard/user/hapus/{slug}', 'UserController@hapusUser')->name('user.hapus');
	Route::get('/dashboard/users/edit/{edit:slug}', 'UserController@edit')->name('user.edit');
	Route::post('/profile/hapus/{slug}', 'UserController@hapusAkun')->name('hapus.akun');
	Route::get('/feedback', 'FeedbackController@index')->name('feedback');
	Route::post('/feedback/tambah', 'FeedbackController@tambah')->name('feedback.tambah');
});

Route::get('/login', 'Auth\LoginController@index')->name('login')->middleware('guest');
Route::post('/login', 'Auth\LoginController@authenticate');

Route::post('/logout', 'Auth\LoginController@logout')->name('page.logout');

Route::get('/register', 'Auth\RegisterController@index')->middleware('guest');
Route::post('/register', 'Auth\RegisterController@store');
