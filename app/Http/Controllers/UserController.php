<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
	public function admin()
	{
		$this->authorize('admin');
		return view('dashboard.users.admin', [
			'title' => 'Data Admin',
			'admin' => User::where('role', 'admin')->latest()->filter(request(['search']))->paginate(15)->onEachSide(1)->withQueryString()
		]);
	}

	public function pembeli()
	{
		return view('dashboard.users.pembeli', [
			'title' => 'Data Pembeli',
			'pembeli' => User::where('role', 'pembeli')->latest()->filter(request(['search']))->paginate(15)->onEachSide(1)->withQueryString()
		]);
	}

	public function tambahAdmin(Request $request)
	{
		$validated = $request->validate([
			'name' => 'required|max:100',
			'username' => 'required|alpha_dash|max:100',
			'email' => 'required|email:dns|unique:users',
			'whatsapp' => 'required|numeric',
			'password' => 'required|min:5|confirmed',
			'alamat' => 'required'
		]);

		$validated['role'] = 'admin';
		$validated['slug'] = Str::slug($validated['username'] . '-' . Str::random(20), '-');
		$validated['password'] = Hash::make($validated['password']);

		if ($request->file('image')) {

			$validated['image'] = $request->file('image')->store('gambar-user');
		}

		if (User::create($validated)) {
			return back()->with('success', 'Berhasil menambahkan admin!');
		} else {
			return back()->with('error', 'Gagal menambahkan admin!');
		}
	}

	public function tambahPembeli(Request $request)
	{
		$validated = $request->validate([
			'name' => 'required|max:100',
			'username' => 'required|alpha_dash|max:100',
			'email' => 'required|email:dns|unique:users',
			'whatsapp' => 'required|numeric',
			'password' => 'required|min:5|confirmed',
			'alamat' => 'required'
		]);

		$validated['role'] = 'pembeli';
		$validated['slug'] = Str::slug($validated['username'] . '-' . Str::random(20), '-');
		$validated['password'] = Hash::make($validated['password']);

		if ($request->file('image')) {

			$validated['image'] = $request->file('image')->store('gambar-user');
		}

		if (User::create($validated)) {
			return back()->with('success', 'Berhasil menambahkan "' . $validated['name'] . '"!');
		} else {
			return back()->with('error', 'Gagal menambahkan "' . $validated['name'] . '"!');
		}
	}

	public function hapusUser(User $user, $slug)
	{
		$user = User::where('slug', $slug)->first();

		if ($user->image) {
			Storage::delete($user->image);
		}

		if ($user->delete()) {
			return back()->with('success', 'Berhasil menghapus "' . $user->name . '"!');
		} else {
			return back()->with('error', 'Gagal menghapus ' . $user->name . '!');
		}
	}

	public function edit($slug)
	{
		$user = User::where('slug', $slug)->first();

		return view('dashboard.users.update', [
			'title' => 'Update ' . $user->name,
			'user' => $user
		]);
	}

	public function update(Request $request)
	{
		$user = User::where('slug', $request->slug)->first();

		$validated = $request->validate([
			'name' => 'required|max:100',
			'username' => 'required|alpha_dash|max:100',
			'email' => 'required|email:dns|unique:users,email,' . $user->id,
			'whatsapp' => 'required|numeric',
			'alamat' => 'required',
		]);

		if ($request->hasFile('image')) {
			if($user->image) {
				Storage::delete($user->image);
			}
			$validated['image'] = $request->file('image')->store('gambar-user');
		}

		if (User::where('slug', $request->slug)->update($validated)) {
			return redirect()->back()->with('success', 'Data "' . $user->name . '" berhasil diupdate!');
		} else {
			return redirect()->back()->with('error', 'Data "' . $user->name . '" gagal diupdate!');
		}
	}

	public function hapusAkun(Request $request, $slug)
	{
		$user = User::where('slug', $slug)->first();
		
		if(Hash::check($request->password, $user->password)) {
			$user->delete();
			return redirect('/')->with('success', 'Akun anda berhasil dihapus!');
		} else {
			return redirect('/login')->with('error', 'Password salah, akun gagal dihapus!');
		}
	}
}
