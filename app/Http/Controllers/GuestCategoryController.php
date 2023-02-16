<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class GuestCategoryController extends Controller
{
    public function index()
		{
			return view('guest.categories', [
				'title' => 'Kategori',
				'categories' => Category::all(),
			]);
		}

		public function show(Category $category)
		{
			return view('guest.category', [
				'title' => $category->name,
				'barang' => $category->databarang,
				'slug' => $category->slug,
				'category' => $category->name
			]);
		}
}
