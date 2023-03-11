@extends('guest.layouts.master')

@section('container')
    <section class="py-16">
        <div class="container mx-auto px-4 lg:px-20">
            <div class="mb-10 overflow-hidden">
                <h1 class="capitalize text-2xl lg:text-3xl font-semibold mb-6" data-aos="fade-right" data-aos-duration="1000">{{ $title }}</h1>
            </div>

            @empty(count($favorit))
                <div class="p-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50 text-center" role="alert"><span
                        class="font-medium">Tidak ada barang favorit!</span></div>
            @endempty

            <div class="flex flex-wrap -mx-5">
                @foreach ($favorit as $b)
                    <div class="w-full md:w-1/2 lg:w-1/3 p-5" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="{{ $loop->iteration * 100 }}">
                        <div class="px-6 py-8 border border-gray-200 rounded-xl lg:hover:-translate-y-2 lg:duration-500">
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
                                    class="block text-[13px] text-gray-400 hover:text-violet-500">{{ $b->category->slug }}</a>
                                <div class="flex justify-between mt-3 mb-5">
                                    <span class="text-gray-400 text-sm self-end">Tersisa {{ $b->stok_brg }}</span>
                                    <p class="text-[19px] font-medium text-violet-500">Rp.
                                        <span>{{ number_format($b->harga_brg, 0, '.', '.') }}</span>
                                    </p>
                                </div>
                                <div class="flex flex-wrap">
                                    <div class="w-4/5">
                                        <form action="{{ route('tambah.keranjang', $b->slug) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id_produk" value="{{ $b->id }}">
                                            <button type="submit"
                                                class="bg-violet-600 text-white py-2.5 px-4 rounded-lg text-sm w-full font-medium tracking-wide hover:bg-violet-500 flex items-center justify-center"><svg
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                                </svg> Tambah ke keranjang</button>
                                        </form>
                                    </div>
                                    <div class="w-1/5">
                                        <form action="{{ route('hapus.favorit', $b->slug) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id_produk" value="{{ $b->id }}">
                                            <button type="submit"
                                                class="border border-violet-600 text-violet-600 hover:border-violet-700 hover:text-violet-700 rounded-lg text-sm ml-2 w-10 h-10 flex items-center justify-center font-medium tracking-wide"><svg
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>

                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
