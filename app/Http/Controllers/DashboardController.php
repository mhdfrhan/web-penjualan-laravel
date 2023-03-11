<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\DataPenjualan;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
	public function index()
	{
		$this->authorize('admin');

		$total = DB::table('data_penjualans')
			->where('status', 'Selesai')
			->whereRaw('MONTH(tanggal) = ?', [date('m')])
			->get();

		return view('dashboard.index', [
			'title' => 'Dashboard',
			'barang' => DataBarang::get()->count(),
			'konfirmasi' => DataPenjualan::where('status', 'Menunggu Konfirmasi')->get()->count(),
			'user' => User::get()->count(),
			'total' => $total->sum('total')
		]);
	}

	public function profile()
	{
		$user = User::where('id', Auth::user()->id)->first();

		return view('dashboard.profile', [
			'title' => 'Profile',
			'user' => $user
		]);
	}

	public function frontpage()
	{
		$banner = DB::table('banner')->get();
		$testimonials = Feedback::where('posted', '>', 0)->latest()
			->paginate(10)->onEachSide(1);

		return view('dashboard.frontpage', [
			'title' => 'Halaman Depan',
			'banner' => $banner,
			'testimonials' => $testimonials
		]);
	}

	public function tambah_banner(Request $request)
	{
		$validated = $request->validate([
			'image' => 'required|image|file|max:1024'
		]);

		$image = $request->file('image');
		$validated['image'] = Str::random(10) . '.' . $image->getClientOriginalExtension();
		$path = public_path('/img/banner');
		$image->move($path, $validated['image']);

		if (DB::table('banner')->insert($validated)) {
			return back()->with('success', 'Berhasil menambahkan banner!');
		} else {
			return back()->with('error', 'Gagal menambahkan banner!');
		}
	}

	public function hapus_banner($id)
	{
		$ambil = DB::table('banner')->where('id', $id);

		if ($ambil->delete()) {
			return back()->with('success', 'Berhasil menghapus banner!');
		} else {
			return back()->with('error', 'Gagal menghapus banner!');
		};
	}
}
