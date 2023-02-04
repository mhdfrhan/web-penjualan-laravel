@extends('dashboard.layouts.master')

@section('container')
    <div class="p-5 bg-gradient-to-b from-violet-500 to-violet-600 rounded-xl text-white shadow-lg shadow-violet-600/30 ">
        @php
            date_default_timezone_set('Asia/Jakarta');
            $hour = date('G');
            
            if ($hour < 12) {
                $greeting = 'Selamat Pagi';
            } elseif ($hour >= 12 && $hour < 16) {
                $greeting = 'Selamat Siang';
            } elseif ($hour >= 16 && $hour < 18) {
                $greeting = 'Selamat Sore';
            } elseif ($hour >= 18) {
                $greeting = 'Selamat Malam';
            }
        @endphp

        <h1 class="text-2xl font-semibold">{{ $greeting }}, {{ auth()->user()->name }} 👋</h1>

    </div>

    <div class="grid lg:grid-cols-3 gap-4 mt-10">
        <div class="bg-white shadow-lg shadow-gray-200 rounded-2xl p-4">
            <div class="flex items-center">
                <div class="p-3 bg-violet-500 dark:via-violet-600 rounded-full shadow-md shadow-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z" />
                        <path
                            d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z" />
                    </svg>
                </div>
                <div class="flex-shrink-0 ml-3">
                    <span class="text-2xl font-bold text-gray-800 capitalize">{{ $barang }} produk</span>
                    <h3 class="text-sm font-normal text-gray-400 capitalize">total produk</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
