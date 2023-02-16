<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
	public function index()
	{
		return view('auth.login', [
			"title" => "Login"
		]);
	}

	public function authenticate(Request $request)
	{
		$credentials = $request->validate(
			[
				'username' => 'required',
				'password' => 'required'
			],
			[
				'username.required' => 'Harus diisi',
				'password.required' => 'Harus diisi'
			]
		);

		$remember = $request->has('remember');

		if (Auth::attempt($credentials, $remember)) {
			$request->session()->regenerate();

			if (Auth::user()->role === 'pembeli') {

				return redirect('/');
			} else if (Auth::user()->role === 'admin') {

				return redirect('/dashboard');
			}
		} else {

			return back()->with('loginError', 'Username/password salah!');
		}
	}

	public function logout(Request $request)
	{
		Auth::logout();

		$request->session()->invalidate();

		$request->session()->regenerateToken();

		return redirect('/');
	}
}
