<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\DataBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DashboardBarangController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('dashboard.dataBarang', [
			'title' => 'Data Barang',
			'barang' => DataBarang::filter(request(['search']))->paginate(15)->onEachSide(1)->withQueryString(),
			'kategories' => Category::latest()->get()
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
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$validated = $request->validate(
			[
				'kategori' => 'required',
				'merk_brg' => 'required|max:255',
				'stok_brg' => 'required|integer',
				'image' => 'image|file|max:1024',
				'harga_brg' => 'required'
			],
			[
				'kategori.required' => 'Harus diisi',
				'merk_brg.required' => 'Harus diisi',
				'stok_brg.required' => 'Harus diisi',
				'harga_brg.required' => 'Harus diisi',
				'merk_brg.max' => 'Tidak boleh lebih 255 karakter',
				'stok_brg.integer' => 'Karakter harus angka',
				'image.image' => 'File harus gambar',
				'image.max' => 'File max: 1024kb',
			]
		);

		$validated['slug'] = Str::slug($request->merk_brg . '-' . Str::random(20), '-');

		// cek jika ada gambar yg diupload
		if ($request->file('image')) {
			$validated['image'] = $request->file('image')->store('gambar-barang');
		}


		if (DataBarang::create($validated)) {
			return redirect('/dashboard/dataBarang')->with('success', 'Data barang berhasil ditambahkan!');
		} else {
			return redirect('/dashboard/dataBarang')->with('error', 'Data barang gagal ditambahkan!');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\DataBarang  $dataBarang
	 * @return \Illuminate\Http\Response
	 */
	public function show(DataBarang $dataBarang, $id, Request $request)
	{
		$barang = DataBarang::find($id);

		if ($request->expectsJson()) {
			return response()->json([
				'status' => 200,
				'barang' => $barang
			]);
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\DataBarang  $dataBarang
	 * @return \Illuminate\Http\Response
	 */
	public function edit(DataBarang $dataBarang)
	{
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\DataBarang  $dataBarang
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, DataBarang $dataBarang, $id)
	{
		$validated = $request->validate(
			[
				'kategori' => 'required',
				'merk_brg' => 'required|max:255',
				'stok_brg' => 'required|integer',
				'image' => 'image|file|max:1024',
				'harga_brg' => 'required|integer'
			],
			[
				'kategori.required' => 'Harus diisi',
				'merk_brg.required' => 'Harus diisi',
				'stok_brg.required' => 'Harus diisi',
				'harga_brg.required' => 'Harus diisi',
				'merk_brg.max' => 'Tidak boleh lebih 255 karakter',
				'stok_brg.integer' => 'Karakter harus angka',
				'stok_brg.integer' => 'Karakter harus angka',
				'image.image' => 'File harus gambar',
				'image.max' => 'File max: 1024kb',
			]
		);

		// cek jika ada gambar yg diupload
		if ($request->hasFile('image')) {
			// hapus gambar yg lama
			if ($request->oldImage) {
				Storage::delete($request->oldImage);
			}
			$validated['image'] = $request->file('image')->store('gambar-barang');
		}

		if (DataBarang::where('id', $id)->update($validated)) {
			return redirect('/dashboard/dataBarang')->with('success', 'Data barang berhasil diupdate!');
		} else {
			return redirect('/dashboard/dataBarang')->with('error', 'Data barang gagal diupdate!');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\DataBarang  $dataBarang
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(DataBarang $dataBarang, $id)
	{
		$barang = $dataBarang->find($id);

		// hapus gambar yg lama
		if ($dataBarang->image) {
			Storage::delete($dataBarang->image);
		}

		if (DataBarang::destroy($id)) {
			return redirect('/dashboard/dataBarang')->with('success', 'Data ' . $barang->merk_brg . ' berhasil dihapus!');
		} else {
			return redirect('/dashboard/dataBarang')->with('error', 'Data ' . $barang->merk_brg . ' gagal dihapus!');
		}
	}
}
