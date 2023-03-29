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
use Illuminate\Support\Facades\Artisan;

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/products', 'HomeController@showProducts')->name('products');
Route::get('/categories', 'GuestCategoryController@index');
Route::get('/categories/{category:slug}', 'GuestCategoryController@show')->name('kategori.show');
Route::put('/update/email', 'UserController@updateEmail')->name('update.email')->middleware('auth');

Route::get('/clear-cache', function () {
	$exitCode = Artisan::call('cache:clear');
	return redirect()->back();
});


Route::middleware(['auth', 'verified', 'session.validity'])->group(function () {

	Route::middleware(['admin'])->group(function () {
		// dashboard
		Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
		Route::get('/dashboard/frontpage', 'DashboardController@frontpage')->name('frontpage');
		Route::post('/dashboard/tambah/banner', 'DashboardController@tambah_banner')->name('tambah.banner');
		Route::delete('/dashboard/tambah/banner/{id}', 'DashboardController@hapus_banner')->name('hapus.banner');
		Route::get('/dashboard/profile', 'DashboardController@profile')->name('dashboard.profile');
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
		Route::delete('/dashboard/transaksi', 'TransaksiController@hapus')->name('hapus.transaksi');
		Route::get('/dashboard/feedback', 'FeedbackController@dashboard')->name('dashboard.feedback');
		Route::post('/dashboard/feedback/hapus/{id}', 'FeedbackController@hapus')->name('feedback.hapus');
		Route::post('/dashboard/feedback/post/{id}', 'FeedbackController@post')->name('post.feedback');
		Route::delete('/dashboard/feedback/{id}', 'FeedbackController@hapus_post')->name('hapus.post');
	});

	// produk order
	Route::get('/pesanan', 'PesananController@index')->name('pesanan');
	Route::get('/cart', 'DetailBarangController@index')->name('keranjang');
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
	Route::post('/users/update', 'UserController@update')->name('user.update');
	Route::get('/users/foto/hapus/{slug}', 'UserController@hapusFoto')->name('foto.hapus');
});

Route::get('/login', 'Auth\LoginController@index')->name('login')->middleware('guest');
Route::post('/login', 'Auth\LoginController@authenticate');

Route::post('/logout', 'Auth\LoginController@logout')->name('page.logout');

Route::get('/register', 'Auth\RegisterController@index')->middleware('guest');
Route::post('/register', 'Auth\RegisterController@store');
