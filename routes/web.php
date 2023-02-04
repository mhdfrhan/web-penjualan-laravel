<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardBarangController;

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

Route::get('/', [HomeController::class, 'index'])->middleware(['auth', 'verified']);


Auth::routes(['verify' => true]);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth']);
Route::get('/dashboard/dataBarang', [DashboardBarangController::class, 'index'])->middleware(['auth']);
Route::resource('/dashboard/dataBarang/produk', DashboardBarangController::class)->middleware(['auth']);
Route::get('/dashboard/kategori', [CategoryController::class, 'index'])->middleware(['auth']);
Route::resource('/dashboard/kategori/produk', CategoryController::class)->middleware(['auth', 'verified']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);


