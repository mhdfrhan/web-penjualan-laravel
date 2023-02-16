<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\DetailBarang;
use App\Models\Favorit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class DetailBarangController extends Controller
{
	public function index(Request $request)
	{

		if (Auth::check()) {
			$cartCount = DetailBarang::where('user_id', Auth::user()->id)->count();
			Session::put('cart', $cartCount);
		} else {
			$cartCount = 0;
		}

		$detail = DB::table('detail_barangs')->select('data_barangs.*', 'detail_barangs.*')->where('user_id', Auth::user()->id)
			->join('data_barangs', 'data_barangs.id', '=', 'detail_barangs.barang_id')->get();

		return view('guest.cart', [
			'title' => 'Keranjang',
			'keranjang' => $detail
		]);
	}

	public function favorit()
	{

		$favorit = Favorit::select('data_barangs.*', 'favorits.*')->where('user_id', Auth::user()->id)
			->join('data_barangs', 'data_barangs.id', '=', 'favorits.barang_id')->get();

		return view('guest.favorit', [
			'title' => 'Favorit',
			'favorit' => $favorit,
			'barang' => DataBarang::all()
		]);
	}

	public function order_hapus($id)
	{
		$delete = DB::table('detail_barangs')->where('id', $id)->delete();
		if ($delete) {
			return redirect('/cart')->with('success', 'Produk cart berhasil dihapus!');
		} else {
			return redirect('/cart')->with('error', 'Produk cart gagal dihapus!');
		}
	}

	public function order_update(Request $request)
	{
		$detail = DB::table('detail_barangs')->where('id', $request->barang_id)->first();
		$barang = DB::table('data_barangs')->where('id', $detail->barang_id)->first();
		$hasil = $barang->harga_brg * $request->jumlah;

		if ($request->jumlah == 0) {
			DB::table('detail_barangs')->where('id', $request->barang_id)->delete();
			return redirect()->back()->with('success', 'Berhasil hapus pesanan!');
		}

		if($request->jumlah > $barang->stok_brg) {
			return redirect()->back()->with('error', 'Jumlah stok tidak cukup!');
		}

		DB::table('detail_barangs')->where('id', $request->barang_id)->update([
			'jumlah' => $request->jumlah,
			'subtotal' => $hasil
		]);

		return redirect()->back()->with('success', 'Berhasil update pesanan!');
	}

	public function order_konfirmasi(Request $request)
	{
		$detail = DB::table('detail_barangs')->select('data_barangs.*', 'detail_barangs.*')->where('user_id', Auth::user()->id)
			->join('data_barangs', 'data_barangs.id', '=', 'detail_barangs.barang_id')
			->get();

			if(!Auth::user()->whatsapp && !Auth::user()->alamat) {
				return redirect('/profile')->with('error', 'Silahkan lengkapi profile Anda dahulu!');
			}

		if ($detail->isEmpty()) {
			return redirect()->back()->with('error', 'Kamu belum memiliki barang apapun!');
		}

		$subtotal = $detail->sum('subtotal');
		$pajak = (10 / 100) * $subtotal;
		$total = $subtotal + $pajak;

		return view('guest.konfirmasi', [
			'title' => 'Konfirmasi Checkout',
			'subtotal' => $subtotal,
			'pajak' => $pajak,
			'total' => $total,
		]);
	}

	public function order_bayar(Request $request)
	{

		$ambil = DB::table('detail_barangs')->where('user_id', Auth::user()->id)->get();

		$detail = \DB::table('detail_barangs')->where('id', \DB::raw("(select max(`id`) from detail_barangs)"))->first();

		$now = date('Y-m-d');

		$validated = $request->validate([
			'pengiriman' => 'required',
			'pembayaran' => 'required'
		]);

		$subtotal = $ambil->sum('subtotal');
		$pajak = (10 / 100) * $subtotal;
		$total = $subtotal + $pajak;

		foreach ($ambil as $a) {

			DB::table('data_penjualans')->where('barang_id', $a->barang_id)
				->where('user_id', $a->user_id)
				->insert([
					'user_id' => Auth::user()->id,
					'barang_id' => $a->barang_id,
					'tanggal' => $now,
					'jumlah' => $a->jumlah,
					'pesan' => $request->pesan,
					'pengiriman' => $validated['pengiriman'],
					'pembayaran' => $validated['pembayaran'],
					'status' => 'Menunggu Konfirmasi',
					'total' => $total
				]);

			$stok = DB::table('data_barangs')->where('id', $detail->barang_id)->get();
			foreach ($stok as $s) {
				DB::table('data_barangs')->where('id', $detail->barang_id)->update([
					'stok_brg' => $s->stok_brg - $detail->jumlah
				]);
			}
		}


		DB::table('detail_barangs')->where('user_id', Auth::user()->id)
			->where('status', 'dalam_keranjang')
			->delete();

		$cartCount = DetailBarang::where('user_id', Auth::user()->id)->count();
		Session::put('cart', $cartCount);

		return redirect('/pesanan')->with('success', 'Berhasil membeli barang!');
	}
}
