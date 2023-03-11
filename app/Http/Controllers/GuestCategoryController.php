<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class GuestCategoryController extends Controller
{
    public function index()
		{
			if (Auth::check()) {
			$user = Auth::user();
			if (!$user->hasVerifiedEmail()) {
				return view('auth.verify');
			}
		}
		
			return view('guest.categories', [
				'title' => 'Kategori',
				'categories' => Category::all(),
			]);
		}

		public function show(Category $category)
		{
			if (Auth::check()) {
			$user = Auth::user();
			if (!$user->hasVerifiedEmail()) {
				return view('auth.verify');
			}
		}
		
			return view('guest.category', [
				'title' => $category->name,
				'barang' => $category->databarang,
				'slug' => $category->slug,
				'category' => $category->name
			]);
		}
}
