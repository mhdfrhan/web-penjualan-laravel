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
@endsection
