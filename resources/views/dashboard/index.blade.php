@extends('dashboard.layouts.master')

@section('container')
    <div class="p-5 bg-gradient-to-b from-violet-500 to-violet-600 rounded-xl text-white shadow-lg shadow-violet-600/30 flex flex-wrap justify-between items-center">
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

        <div>
            <h1 class="text-2xl font-semibold">{{ $greeting }}, {{ auth()->user()->name }} 👋</h1>
            <p class="text-gray-300 mt-2">Ini adalah total data dari toko GadgetCom</p>
        </div>

        <div class="text-white font-semibold flex items-center w-full justify-end md:w-auto self-baseline">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                    clip-rule="evenodd" />
            </svg>
            <div id="clock"></div>
        </div>

    </div>

    <div class="grid lg:grid-cols-3 2xl:grid-cols-4 gap-4 mt-10">
        <div class="bg-white shadow-lg shadow-gray-200 rounded-2xl p-4">
            <div class="flex items-center">
                <div class="p-3 bg-violet-500 dark:via-violet-600 rounded-full shadow-md shadow-gray-200 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                    </svg>
                </div>
                <div class="flex-shrink-0 ml-3">
                    <span class="text-2xl font-bold text-gray-800 capitalize">Rp. {{ number_format($total) }} </span>
                    <h3 class="text-sm font-normal text-gray-400 capitalize">pendapatan/bulan</h3>
                </div>
            </div>
        </div>
        <div class="bg-white shadow-lg shadow-gray-200 rounded-2xl p-4">
            <div class="flex items-center">
                <div class="p-3 bg-violet-500 dark:via-violet-600 rounded-full shadow-md shadow-gray-200 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
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
        <div class="bg-white shadow-lg shadow-gray-200 rounded-2xl p-4">
            <div class="flex items-center">
                <div class="p-3 bg-violet-500 dark:via-violet-600 rounded-full shadow-md shadow-gray-200 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                </div>
                <div class="flex-shrink-0 ml-3">
                    <span class="text-2xl font-bold text-gray-800 capitalize">{{ $konfirmasi }} produk</span>
                    <h3 class="text-sm font-normal text-gray-400 capitalize">menunggu konfirmasi</h3>
                </div>
            </div>
        </div>
        <div class="bg-white shadow-lg shadow-gray-200 rounded-2xl p-4">
            <div class="flex items-center">
                <div class="p-3 bg-violet-500 dark:via-violet-600 rounded-full shadow-md shadow-gray-200 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                    </svg>
                </div>
                <div class="flex-shrink-0 ml-3">
                    <span class="text-2xl font-bold text-gray-800 capitalize">{{ $user }} user</span>
                    <h3 class="text-sm font-normal text-gray-400 capitalize">total user</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
