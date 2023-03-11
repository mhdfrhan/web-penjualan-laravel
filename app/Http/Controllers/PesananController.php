<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
	public function index()
	{
		$menunggu_konfirmasi = DB::table('data_penjualans')->select('data_barangs.*', 'data_penjualans.*')
			->where('user_id', Auth::user()->id)
			->where('status', 'Menunggu Konfirmasi')
			->join('data_barangs', 'data_barangs.id', '=', 'data_penjualans.barang_id')
			->join('users', 'users.id', '=', 'data_penjualans.user_id')
			->get();

		$dikemas = DB::table('data_penjualans')->select('data_barangs.*', 'data_penjualans.*')
			->where('user_id', Auth::user()->id)
			->where('status', 'Dikemas')
			->join('data_barangs', 'data_barangs.id', '=', 'data_penjualans.barang_id')
			->join('users', 'users.id', '=', 'data_penjualans.user_id')
			->get();

		$dikirim = DB::table('data_penjualans')->select('data_barangs.*', 'data_penjualans.*')
			->where('user_id', Auth::user()->id)
			->where('status', 'Dikirim')
			->join('data_barangs', 'data_barangs.id', '=', 'data_penjualans.barang_id')
			->join('users', 'users.id', '=', 'data_penjualans.user_id')
			->get();

		$selesai = DB::table('data_penjualans')->select('data_barangs.*', 'data_penjualans.*')
			->where('user_id', Auth::user()->id)
			->where('status', 'Selesai')
			->join('data_barangs', 'data_barangs.id', '=', 'data_penjualans.barang_id')
			->join('users', 'users.id', '=', 'data_penjualans.user_id')
			->get();

			$semua = DB::table('data_penjualans')->select('data_barangs.*', 'data_penjualans.*')
			->where('user_id', Auth::user()->id)
			->join('data_barangs', 'data_barangs.id', '=', 'data_penjualans.barang_id')
			->join('users', 'users.id', '=', 'data_penjualans.user_id')
			->get();


		return view('guest.pesanan', [
			'title' => 'Pesanan Anda',
			'menunggu_konfirmasi' => $menunggu_konfirmasi,
			'dikemas' => $dikemas,
			'dikirim' => $dikirim,
			'selesai' => $selesai,
			'semua' => $semua
		]);
	}

	public function detail($slug)
	{
		$ambil = DB::table('data_penjualans')
		->select('users.*', 'data_barangs.*', 'data_penjualans.*')
    ->where('user_id', Auth::user()->id)
    ->where('data_barangs.slug', $slug)
    ->join('data_barangs', 'data_barangs.id', '=', 'data_penjualans.barang_id')
    ->join('users', 'users.id', '=', 'data_penjualans.user_id')
    ->first();

		return view('guest.detailPesanan', [
			'title' => 'Detail Pesanan',
			'pesanan' => $ambil
		]);
	}

	public function batal(Request $request)
	{
		$penjualan = DB::table('data_penjualans')->where('user_id', Auth::user()->id)->where('id', $request->id_produk)->first();
		if ($penjualan) {
			$barang = DB::table('data_barangs')->where('id', $penjualan->barang_id)->first();
			$stok_baru = $barang->stok_brg + $penjualan->jumlah;
			DB::table('data_barangs')->where('id', $penjualan->barang_id)->update([
				'stok_brg' => $stok_baru
			]);
			DB::table('data_penjualans')->where('id', $penjualan->id)->delete();
			return redirect()->back()->with('success', 'Berhasil membatalkan pesanan');
		} else {
			return redirect()->back()->with('error', 'Gagal membatalkan pesanan');
		}
	}
}
