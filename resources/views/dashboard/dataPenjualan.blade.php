@extends('dashboard.layouts.master')



@section('container')

    @empty(count($penjualan))

        <div class="p-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50 text-center" role="alert"><span class="font-medium">Tidak

                ada penjualan barang!</span></div>

    @endempty



    @include('dashboard.partials.message')



    <div class="grid sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-6">

        @foreach ($penjualan as $i => $p)

            <div class="relative bg-white w-full px-5 pt-7 pb-4 rounded-lg shadow-lg shadow-gray-200">

                <div class=" flex items-center">

                    <div class="w-10 h-10 rounded-full bg-violet-500 text-white flex items-center justify-center mr-3">

                        <span>{{ $i + 1 }}</span>

                    </div>

                    <div>

                        <div class="text-lg font-medium">{{ $p->merk_brg }}</div>

                        <div class="text-gray-400 text-sm">

                            <span class="">{{ $p->jumlah }} produk</span>

                            <span class="block">{{ $p->tanggal }}</span>

                            <span>{{ $p->pengiriman }}, </span>

                            <span>{{ $p->pembayaran }}</span>

                        </div>

                    </div>

                </div>

                <div>

                    <div class="absolute top-0 right-0 bg-violet-500 text-white px-2 rounded-tr-lg rounded-bl-lg ">

                        <span class="text-xs">{{ $p->status }}</span>

                    </div>

                </div>

                <div class="flex items-center gap-x-2 justify-end mt-4">

                    <form class="flex items-center" action="{{ route('dashboard.edit', $p->slug) }}" method="POST">

                        @csrf

                        <select id="status" name="status"

                            class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-violet-500 focus:border-violet-500 block w-full p-1">



                            @php

                                $status = ['Menunggu Konfirmasi', 'Dikemas', 'Dikirim', 'Selesai'];

                            @endphp



                            @foreach ($status as $s)

                                <option value="{{ $s }}" {{ $s == $p->status ? 'selected' : '' }}>{{ $s }}</option>

                            @endforeach

                        </select>

                        <button

                            class="border border-violet-600 text-violet-600 hover:bg-violet-600 hover:text-white duration-150 w-6 h-6 flex items-center justify-center p-1 rounded-lg ml-2">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"

                                stroke="currentColor" class="w-4 h-4">

                                <path stroke-linecap="round" stroke-linejoin="round"

                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />

                            </svg>

                        </button>

                    </form>

                    <a href="{{ route('dashboard.detail', $p->slug) }}"

                        class="text-sm w-6 h-6 flex items-center justify-center p-1 border border-violet-600 text-violet-600 hover:bg-violet-600 hover:text-white duration-150 rounded-full">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"

                            stroke="currentColor" class="w-5 h-5">

                            <path stroke-linecap="round" stroke-linejoin="round"

                                d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />

                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />

                        </svg>

                    </a>

                </div>

            </div>

        @endforeach

    </div>

@endsection

