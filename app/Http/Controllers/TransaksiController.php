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
			->where('status', 'selesai')
			->join('data_barangs', 'data_barangs.id', '=', 'data_penjualans.barang_id')
			->paginate(15);

		return view('dashboard.transaksi', [
			'title' => 'Transaksi',
			'transaksi' => $transaksi
		]);
	}
}
