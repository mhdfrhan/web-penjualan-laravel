@extends('guest.layouts.master')



@section('container')
    {{-- <form action="{{ route('page.logout') }}" method="POST">

        @csrf

        <button type="submit" class="bg-violet-600 text-white py-3 px-8 rounded-lg">logout</button>

    </form> --}}



    <section class="py-16">

        <div class="container mx-auto px-4 lg:px-20">



            <div class="flex flex-wrap items-center justify-between mb-10">

                <div class="w-full lg:w-1/2 mb-6 lg:mb-0 overflow-hidden">

                    <h1 class="capitalize text-2xl lg:text-3xl font-semibold" data-aos="fade-right" data-aos-duration="1000">
                        Semua produk</h1>

                </div>

                <div class="w-full lg:w-1/3 overflow-hidden">

                    <form action="/products" method="GET" class="flex items-center w-full" data-aos="fade-left"
                        data-aos-duration="1000" data-aos-delay="150"><label for="search" class="sr-only">Search</label>

                        <div class="relative w-full">

                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"><svg
                                    aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">

                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>

                                </svg></div><input type="text" name="search" id="search"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-violet-500 focus:border-violet-500 block w-full pl-10 p-2.5"
                                placeholder="Search" value="{{ request('search') }}" autocomplete="off">

                        </div><button type="submit"
                            class="p-2.5 ml-2 text-sm font-medium text-white bg-violet-600 rounded-lg border border-violet-700 hover:bg-violet-700 focus:ring-4 focus:outline-none focus:ring-violet-300 shadow-lg shadow-violet-600/30 hover:scale-105 duration-500"><svg
                                class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>

                            </svg><span class="sr-only">Search</span></button>

                    </form>

                </div>

            </div>



            @include('dashboard.partials.message')



            <div class="flex flex-wrap -mx-4">

                @foreach ($barang as $b)
                    <div class="relative w-full md:w-1/2 lg:w-1/3 2xl:w-1/4 p-4" data-aos="fade-up" data-aos-duration="1000"
                        data-aos-delay="{{ $loop->iteration * 100 }}" id="cartProduct">
                        <div
                            class="px-6 py-8 border border-gray-200 rounded-lg lg:hover:scale-105 shadow-gray-200 lg:duration-500 relative overflow-hidden group">
                            @if ($b->image)
                                <img src="{{ asset('img/' . $b->image) }}" class="mx-auto rounded-lg h-44 object-cover"
                                    alt="gambar {{ $b->merk_brg }}">
                            @else
                                <img src="/img/no-photo.png" class="mx-auto rounded-lg h-44 object-cover"
                                    alt="gambar {{ $b->merk_brg }}">
                            @endif
                            <div class="mt-6">
                                <h2 class="text-xl font-semibold">{{ $b->merk_brg }}</h2>
                                <a href="/categories/{{ $b->category->slug }}"
                                    class="block text-[13px] text-gray-400 hover:text-violet-500">{{ $b->category->name }}</a>
                                <div class="flex justify-between mt-3 mb-5">
                                    <span class="text-gray-400 text-sm self-end">Tersisa {{ $b->stok_brg }}</span>
                                    <p class="text-[19px] font-medium text-violet-500">Rp.
                                        <span>{{ number_format($b->harga_brg, 0, '.', '.') }}</span>
                                    </p>
                                </div>
                                <form action="{{ route('tambah.keranjang', $b->slug) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id_produk" value="{{ $b->id }}">
                                    <button type="submit"
                                        class="bg-violet-600 text-white py-2.5 px-4 rounded-lg text-sm w-full font-medium tracking-wide hover:bg-violet-500 inline-flex items-center justify-center"><svg
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2 shrink-0">

                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                        </svg>
                                        <span>Masukkan ke keranjang</span></button>
                                </form>
                                <div
                                    class="absolute top-3 right-3 lg:translate-x-14 group-hover:translate-x-0 duration-500">
                                    <form action="{{ route('tambah.favorit', $b->slug) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_produk" value="{{ $b->id }}">
                                        <button type="submit"
                                            class="bg-violet-600 shadow-lg shadow-violet-500/50 hover:bg-violet-700 text-violet-100 rounded-xl text-sm ml-2 w-10 h-10 flex items-center justify-center font-medium tracking-wide"><svg
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            @if (!empty($barang->links()))
                <div class="mt-8 space-x-3">{{ $barang->links('vendor.pagination.tailwind') }}</div>
            @endif

            @if (count($barang))
            @else<div class="p-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50 text-center" role="alert"><span
                        class="font-medium">Tidak ada data barang!</span></div>
            @endif

        </div>

    </section>
@endsection
