<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register', [
            "title" => "Register"
        ]);
    }

    public function store(Request $request) 
    {
        $validateData = $request->validate([
            'name' => 'required|max:100',
            'username' => 'required|min:3|max:100|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:100',
            'confirmPass' => 'min:5'
        ],[
            'name.required' => 'Harus diisi',
            'name.max' => 'Jangan lebih dari 100 huruf',
            'username.required' => 'Harus diisi',
            'username.min' => 'Minimal 3 karakter',
            'username.max' => 'Maksimal 100 karakter',
            'username.unique' => 'Username sudah digunakan',
            'email.required' => 'Harus diisi',
            'email.email' => 'Format email salah',
            'email.unique' => 'Email sudah digunakan',
            'password.required' => 'Harus diisi',
            'password.min' => 'Minimal 5 karakter',
            'password.max' => 'Maksimal 100 karakter',
        ]);

        // enkripsi password
        $validateData['password'] = Hash::make($validateData['password']);

        $user = User::create($validateData);
				event(new Registered($user));

        return redirect('/login')->with('success', 'Registrasi berhasil! Silahkan login');
    }
}
