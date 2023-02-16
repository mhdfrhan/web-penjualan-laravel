<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\DataPenjualan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
	public function index()
	{
		$this->authorize('admin');

		$total = DB::table('data_penjualans')->get();

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
}
