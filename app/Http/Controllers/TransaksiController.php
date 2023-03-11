<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
	public function index()
	{
		$this->authorize('admin');
		$transaksi = DB::table('data_penjualans')
    ->select('data_penjualans.*', 'data_barangs.image as barang_image', 'users.image as user_image', 'users.*', 'data_barangs.*')
    ->where('status', 'selesai')
    ->join('data_barangs', 'data_barangs.id', '=', 'data_penjualans.barang_id')
    ->join('users', 'users.id', '=', 'data_penjualans.user_id')
    ->paginate(15);


		return view('dashboard.transaksi', [
			'title' => 'Transaksi',
			'transaksi' => $transaksi
		]);
	}
}
