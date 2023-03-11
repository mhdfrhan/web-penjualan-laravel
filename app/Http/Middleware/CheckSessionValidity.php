<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckSessionValidity
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
	 * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
	 */
	public function handle($request, Closure $next)
	{
		if (Auth::check()) {
			return $next($request);
		} else {
			$error = 'Sesi Anda telah kadaluarsa. Harap <a href="' . route('login') . '">login kembali</a>.';
			return redirect('/')->with('error', $error);
		}
	}
}
