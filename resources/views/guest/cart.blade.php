@extends('guest.layouts.master')

@section('container')
    <section class="py-16">
        <div class="container mx-auto px-4 lg:px-20">
            <div class="mb-10">
                <h1 class="capitalize text-2xl lg:text-3xl font-semibold mb-6">{{ $title }}</h1>
            </div>

            {{-- keranjang --}}
            <div class="flex flex-wrap -mx-4">
                <div class="w-full lg:w-2/3 p-4">
									@include('dashboard.partials.message')
                    <div class="rounded-lg shadow-lg shadow-gray-200 p-6">
                        @empty(count($keranjang))
                            <div class="p-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50 text-center" role="alert"><span
                                    class="font-medium">Tidak produk di keranjang!</span></div>
                        @endempty
                        @foreach ($keranjang as $i => $item)
                            <div
                                class="sm:flex sm:flex-wrap items-center border-b border-b-gray-200 pb-6 mb-6 last:border-none last:mb-0 last:pb-0">
                                <div class="flex items-start w-full  sm:w-2/5 mb-4 sm:mb-0">
                                    @if ($item->image)
                                        <a class="cursor-pointer" data-fancybox
                                            data-src="{{ asset('storage/' . $item->image) }}">
                                            <img src="{{ asset('storage/' . $item->image) }}" class="inline h-24 rounded-lg"
                                                alt="gambar {{ $item->merk_brg }}">
                                        </a>
                                    @else
                                        <a class="cursor-pointer" data-fancybox data-src="/img/no-photo.png">
                                            <img src="/img/no-photo.png" class="h-24 rounded-lg"
                                                alt="gambar {{ $item->merk_brg }}">
                                        </a>
                                    @endif
                                    <div class="ml-6">
                                        <h5 class="text-lg font-medium">{{ $item->merk_brg }}</h5>
                                        <span class="inline text-sm text-violet-600 font-medium">Rp.
                                            {{ number_format($item->harga_brg) }}</span>
                                    </div>

                                </div>
                                <div class=" w-full sm:w-3/5 flex items-center flex-wrap">
                                    <form class="order-2 xl:order-1 flex w-full xl:w-auto mt-1 xl:mt-0"
                                        action="{{ route('order.hapus', $item->id) }}" method="GET">
                                        @csrf
                                        <button
                                            class="ml-2 xl:w-12 h-10 inline-flex justify-center items-center bg-red-200 rounded-lg text-red-600 w-full"><svg
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>

                                        </button>
                                    </form>
                                    <form action="{{ route('order.update') }}"
                                        class="flex flex-wrap items-center ml-2 w-full xl:w-auto order-1 xl:order-2"
                                        method="POST">
                                        @csrf
                                        <input type="hidden" name="barang_id" value="{{ $item->id }}">
                                        <input type="number" name="jumlah"
                                            class="text-center border border-gray-200 rounded-lg focus:ring-violet-600 focus:border-violet-600 focus:outline-none focus:shadow-violet-600 w-full xl:w-auto"
                                            value="{{ $item->jumlah }}">
                                        <button type="submit"
                                            class="xl:ml-2 xl:w-12 mt-3 xl:mt-0 w-full h-10 inline-flex justify-center items-center bg-violet-200 rounded-lg text-violet-600"><svg
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="w-full lg:w-1/3 p-4">
                    <div class="bg-violet-600 rounded-lg shadow-lg shadow-violet-200 p-6 text-white">
                        <div class="capitalize text-xl font-medium">ringkasan pesanan</div>
                        <div class="mt-4 flex items-center justify-between">
                            <span class="md:w-1/2">Total harga :</span>
                            <span class="md:w-1/2 text-end">Rp.
                                {{ number_format($keranjang->sum('subtotal')) }}</span>
                        </div>
                        <form action="{{ route('order.konfirmasi') }}" method="POST">
                            @csrf
                            <button
                                class="text-violet-600 font-semibold bg-white block rounded-lg w-full py-2.5 mt-6  hover:bg-violet-100 duration-300 text-center">Lanjut
                                bayar</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </section>
@endsection
