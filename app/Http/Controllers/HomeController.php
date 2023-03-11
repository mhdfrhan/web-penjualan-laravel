<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Favorit;
use App\Models\Category;
use App\Models\DataBarang;
use App\Models\DetailBarang;
use Illuminate\Http\Request;
use App\Models\DataPenjualan;
use App\Models\Feedback;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
	public function index()
	{

		if (Auth::check()) {
			$cartCount = DetailBarang::where('user_id', Auth::user()->id)->count();
			Session::put('cart', $cartCount);
			$favoritCount = Favorit::where('user_id', Auth::user()->id)->count();
			Session::put('favorit', $favoritCount);
		} else {
			$cartCount = 0;
			$favoritCount = 0;
		}

		$newProducts = DataBarang::latest()->limit(6)->get();
		$category = Category::latest()->get();
		$feedback = Feedback::select('feedback.*', 'users.name', 'users.email', 'users.image')
			->join('users', 'users.id', '=', 'feedback.user_id')
			->where('feedback.posted', true) // filter posted yang bernilai true
			->orderBy('feedback.posted', 'desc')
			->get();

		if (Auth::check()) {
			$user = Auth::user();
			if (!$user->hasVerifiedEmail()) {
				return view('auth.verify');
			}
		}

		return view('guest.index', [
			'title' => 'Home',
			'categories' => $category,
			'cartCount' => $cartCount,
			'newProducts' => $newProducts,
			'banner' => DB::table('banner')->get(),
			'testimonials' => $feedback
		]);
	}

	public function profile()
	{
		$user = User::where('id', Auth::user()->id)->first();

		if (Auth::check()) {
			$user = Auth::user();
			if (!$user->hasVerifiedEmail()) {
				return view('auth.verify');
			}
		}

		return view('guest.profile', [
			'title' => 'Profile',
			'user' => $user
		]);
	}

	public function showProducts()
	{

		if (Auth::check()) {
			$user = Auth::user();
			if (!$user->hasVerifiedEmail()) {
				return view('auth.verify');
			}
		}

		return view('guest.products', [
			'title' => 'All Products',
			'barang' => DataBarang::where('stok_brg', '>', 0)->filter(request(['search']))->paginate(10)->onEachSide(1)->withQueryString()
		]);
	}

	public function tambahKeranjang(DataPenjualan $dataPenjualan, Request $request, $id)
	{
		$ambil = DB::table('data_barangs')->where('id', $request->id_produk)->first();
		$harga = $ambil->harga_brg * 1;

		DB::table('detail_barangs')->insert([
			'barang_id' => $request->id_produk,
			'user_id' => Auth::user()->id,
			'jumlah' => '1',
			'order_detail_id' => 0,
			'subtotal' => $harga,
			'status' => 'dalam_keranjang'
		]);

		$cartCount = DetailBarang::where('user_id', Auth::user()->id)->count();
		Session::put('cart', $cartCount);

		return redirect()->back()->with('success', $ambil->merk_brg . ' berhasil ditambahkan ke keranjang!');
	}

	public function tambahFavorit(Request $request)
	{
		$produk = DB::table('data_barangs')->where('id', $request->id_produk)->first();

		$existingFavorit = Favorit::where('barang_id', $request->id_produk)
			->where('user_id', Auth::user()->id)
			->exists();

		if ($existingFavorit) {
			return redirect()->back()->with('error', $produk->merk_brg . ' sudah ada di favorit!');
		}

		DB::table('favorits')->insert([
			'barang_id' => $request->id_produk,
			'user_id' => Auth::user()->id,
			'category_id' => $produk->category_id
		]);

		$favoritCount = Favorit::where('user_id', Auth::user()->id)->count();
		Session::put('favorit', $favoritCount);

		return redirect()->back()->with('success', $produk->merk_brg . ' berhasil ditambahkan ke favorit!');
	}


	public function hapusFavorit(Request $request)
	{
		if (DB::table('favorits')->where('id', $request->id_produk)->delete()) {
			$favoritCount = Favorit::where('user_id', Auth::user()->id)->count();
			Session::put('favorit', $favoritCount);
			return redirect()->back()->with('success', 'Berhasil hapus dari favorit!');
		} else {
			return redirect()->back()->with('error', 'Gagal hapus dari favorit!');
		};
	}
}
