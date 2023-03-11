<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DataPenjualanController extends Controller
{
	public function index()
	{
		$this->authorize('admin');

		$penjualan = DB::table('data_penjualans')->select('data_barangs.*', 'data_penjualans.*')
			->join('data_barangs', 'data_barangs.id', '=', 'data_penjualans.barang_id')
			->get();

		return view('dashboard.dataPenjualan', [
			'title' => 'Data Penjualan',
			'penjualan' => $penjualan
		]);
	}

	public function detail($slug)
	{
		$ambil = DB::table('data_penjualans')->where('user_id', Auth::user()->id)->where('slug', $slug)
			->join('data_barangs', 'data_barangs.id', '=', 'data_penjualans.barang_id')
			->first();
		dd($ambil);
	}

	public function edit(Request $request, $slug)
	{
		$ambil = DB::table('data_penjualans')->select('data_barangs.*', 'data_penjualans.*')
			->where('slug', $slug)
			->join('data_barangs', 'data_barangs.id', '=', 'data_penjualans.barang_id');

		$ambil->update([
			'status' => $request->status,
		]);

		return redirect()->back()->with('success', 'Berhasil mengubah status produk');
	}
}
