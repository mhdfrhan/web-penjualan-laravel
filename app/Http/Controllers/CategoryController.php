<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('dashboard.kategori', [
			'title' => 'Kategori',
			'categories' => Category::latest()->paginate(5)
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\StoreCategoryRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreCategoryRequest $request)
	{

		$validated = $request->validate(
			[
				'name' => 'required|max:100|unique:categories'
			],
			[
				'name.required' => 'Harus diisi',
				'name.max' => 'Maksimal 100 karakter',
				'name.unique' => 'Kategori sudah tersedia',
			]
		);

		$validated['slug'] = Str::slug($request->name . '-' . Str::random(10), '-');

		if (Category::create($validated)) {
			return redirect('/dashboard/kategori')->with('success', 'Data barang berhasil ditambahkan!');
		} else {
			return redirect('/dashboard/kategori')->with('error', 'Data barang gagal ditambahkan!');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Category  $category
	 * @return \Illuminate\Http\Response
	 */
	public function show(Category $category, Request $request, $id)
	{
		$kategori = Category::find($id);

		if ($request->expectsJson()) {
			return response()->json([
				'status' => 200,
				'kategori' => $kategori
			]);
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Category  $category
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Category $category)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\UpdateCategoryRequest  $request
	 * @param  \App\Models\Category  $category
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateCategoryRequest $request, Category $category, $id)
	{
		$validated = $request->validate(
			[
				'name' => 'required|max:100|unique:categories'
			],
			[
				'name.required' => 'Harus diisi',
				'name.max' => 'Maksimal 100 karakter',
				'name.unique' => 'Kategori sudah tersedia',
			]
		);

		if (Category::where('id', $id)->update($validated)) {
			return redirect('/dashboard/kategori')->with('editHapusSuccess', 'Data barang berhasil diupdate!');
		} else {
			return redirect('/dashboard/kategori')->with('editHapusError', 'Data barang gagal diupdate!');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Category  $category
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Category $category, $id)
	{

		$kategori = $category->find($id);
		if (Category::destroy($id)) {
			return redirect('/dashboard/kategori')->with('editHapusSuccess', 'Kategori ' . $kategori->name . ' berhasil dihapus!');
		} else {
			return redirect('/dashboard/kategori')->with('editHapusError', 'Kategori ' . $kategori->name . ' gagal dihapus!');
		}
	}
}
