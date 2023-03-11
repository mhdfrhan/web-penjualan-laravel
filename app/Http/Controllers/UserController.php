<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
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
			'alamat' => 'required',
			'image' => 'image|file|max:1024'
		]);

		$validated['role'] = 'admin';
		$validated['slug'] = Str::slug($validated['username'] . '-' . Str::random(20), '-');
		$validated['password'] = Hash::make($validated['password']);

		if ($request->hasFile('image')) {
			$image = $request->file('image');
			$validated['image'] = Str::random(10) . '.' . $image->getClientOriginalExtension();
			$path = public_path('/img/user');
			$image->move($path, $validated['image']);
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
			'email' => 'required|email|unique:users',
			'whatsapp' => 'required|numeric',
			'password' => 'required|min:5|confirmed',
			'alamat' => 'required',
			'image' => 'image|file|max:1024'
		]);

		$validated['role'] = 'pembeli';
		$validated['slug'] = Str::slug($validated['username'] . '-' . Str::random(20), '-');
		$validated['password'] = Hash::make($validated['password']);

		if ($request->hasFile('image')) {
			$image = $request->file('image');
			$validated['image'] = Str::random(10) . '.' . $image->getClientOriginalExtension();
			$path = public_path('/img/user');
			$image->move($path, $validated['image']);
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

		if ($user->username == 'farhan' && $user->role == 'admin') {
			return back()->with('error', 'Tidak dapat menghapus data ' . $user->name . ' !');
		}

		if ($user->image) {
			$oldPath = public_path('img/user/' . $user->image);
			if (File::exists($oldPath)) {
				File::delete($oldPath);
			}
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
			'image' => 'image|file|max:1024'
		]);

		if ($request->hasFile('image')) {
			// hapus gambar yg lama
			if ($user->image) {
				$oldPath = public_path('img/user/' . $user->image);
				if (File::exists($oldPath)) {
					File::delete($oldPath);
				}
			}
			$validated['image'] =  Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();
			$path = public_path('/img/user');
			$request->file('image')->move($path, $validated['image']);
		}

		if ($user->email !== $validated['email']) {
			// Jika email berubah, kirim email verifikasi baru
			$user->email_verified_at = null;
			$user->sendEmailVerificationNotification();
			$user->save();
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

		if ($user->username == 'farhan' && $user->role == 'admin') {
			return back()->with('error', 'Tidak dapat admin utama!');
		}

		if (Hash::check($request->password, $user->password)) {
			$user->delete();
			return redirect('/')->with('success', 'Akun anda berhasil dihapus!');
		} else {
			return redirect('/login')->with('error', 'Password salah, akun gagal dihapus!');
		}
	}

	public function hapusFoto($slug)
	{
		$user = User::where('slug', $slug)->first();

		if ($user->image) {
			$oldPath = public_path('img/user/' . $user->image);
			if (File::exists($oldPath)) {
				File::delete($oldPath);
			}
			DB::table('users')->where('slug', $slug)->update([
				'image' => null
			]);
			return back()->with('success', 'Berhasil menghapus foto!');
		} else {
			return back()->with('error', 'Gagal menghapus foto!');
		}
	}

	public function updateEmail(Request $request)
	{
		$user = Auth::user();

    $request->validate([
        'email' => 'required|email|unique:users,email,'.$user->id,
    ]);

    // Verifikasi email baru
    $user->email = $request->email;
    $user->email_verified_at = null;
    $user->sendEmailVerificationNotification();

    // Update email
    if ($user->save()) {
        return redirect()->back()->with('success', 'Email berhasil diubah. Verifikasi email baru akan dikirimkan ke alamat email Anda yang baru.');
    } else {
        return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui email.');
    }
	}
}
