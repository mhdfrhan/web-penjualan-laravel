<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('guest.index', [
            'title' => 'Home',
						'barang' => DataBarang::all()
        ]);
    }
}
