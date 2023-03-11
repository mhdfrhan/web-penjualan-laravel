@extends('guest.layouts.master')

@section('container')
    <section class="py-16">
        <div class="container mx-auto px-4 lg:px-20">
            @include('dashboard.partials.message')

            <div class="mb-4 border-b border-gray-200">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                    data-tabs-toggle="#myTabContent" role="tablist">
                    <li class="mr-2" role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300"
                            id="semua-tab" data-tabs-target="#semua" type="button" role="tab" aria-controls="semua"
                            aria-selected="true">Semua</button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300"
                            id="menunggukonfirmasi-tab" data-tabs-target="#menunggukonfirmasi" type="button" role="tab"
                            aria-controls="menunggukonfirmasi" aria-selected="false">Menunggu konfirmasi</button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300"
                            id="dikemas-tab" data-tabs-target="#dikemas" type="button" role="tab"
                            aria-controls="dikemas" aria-selected="false">Dikemas</button>
                    </li>
                    <li role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300"
                            id="dikirim-tab" data-tabs-target="#dikirim" type="button" role="tab"
                            aria-controls="dikirim" aria-selected="false">Dikirim</button>
                    </li>
                    <li role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300"
                            id="selesai-tab" data-tabs-target="#selesai" type="button" role="tab"
                            aria-controls="selesai" aria-selected="false">Selesai</button>
                    </li>
                </ul>

            </div>
            <div id="myTabContent" class="p-4">
                <div class="hidden" id="semua" role="tabpanel" aria-labelledby="semua-tab">
                    @empty(count($semua))
                        <div class="-mt-14">
                            <script src="/js/no-products.js"></script>
                            <lottie-player class="mx-auto" src="/js/product-search.json" background="transparent" speed="1"
                                style="width: 300px; height: 300px;" loop autoplay>
                            </lottie-player>
                            <div class="text-center -mt-14 text-lg text-gray-400">
                                Belum ada pesanan!
                            </div>
                        </div>
                    @endempty

                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($semua as $i => $item)
                            <div
                                class="relative bg-white w-full px-5 pt-7 pb-4 rounded-lg shadow hover:shadow-lg duration-500 shadow-gray-200">
                                <div class=" flex items-center">
                                    <div
                                        class="w-10 h-10 rounded-full bg-violet-500 text-white flex items-center justify-center mr-3 shrink-0">
                                        <span>{{ $i + 1 }}</span>
                                    </div>
                                    <div class="w-full">
                                        <div class="text-lg font-medium">{{ $item->merk_brg }}</div>
                                        <div class="text-gray-400 text-sm mt-1">
                                            <div class="flex items-center justify-between">
                                                <span>{{ $item->jumlah }} produk</span>
                                                <span>Rp. {{ number_format($item->harga_brg) }}</span>
                                            </div>
                                            <span class="block">{{ $item->tanggal }}</span>
                                            <span>{{ $item->pengiriman }}, </span>
                                            <span>{{ $item->pembayaran }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <div
                                            class="absolute top-0 right-0 px-2 rounded-tr-lg rounded-bl-lg 
																							@if ($item->status === 'Menunggu Konfirmasi') bg-red-600
																							@elseif ($item->status === 'Dikemas')
																									bg-green-600
																							@elseif ($item->status === 'Dikirim')
																									bg-blue-600
																							@elseif ($item->status === 'Selesai')
																									bg-violet-600 @endif
																							text-white">
                                            <span class="text-xs">{{ $item->status }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-end mt-2">
                                    @if ($item->status !== 'Dikemas' && $item->status !== 'Dikirim' && $item->status !== 'Selesai')
                                        <form action="{{ route('pesanan.batal', $item->slug) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id_produk" value="{{ $item->id }}">
                                            <button class="text-sm text-red-600 mr-3 hover:underline">Batalkan</button>
                                        </form>
                                    @endif
                                    <div>
                                        <a href="{{ route('pesanan.detail', $item->slug) }}"
                                            class="text-sm text-violet-600 hover:underline">Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="hidden" id="menunggukonfirmasi" role="tabpanel" aria-labelledby="menunggukonfirmasi-tab">
                    @empty(count($menunggu_konfirmasi))
                        <div class="-mt-14">
                            <script src="/js/no-products.js"></script>
                            <lottie-player class="mx-auto" src="/js/product-search.json" background="transparent" speed="1"
                                style="width: 300px; height: 300px;" loop autoplay>
                            </lottie-player>
                            <div class="text-center -mt-14 text-lg text-gray-400">
                                Belum ada pesanan!
                            </div>
                        </div>
                    @endempty

                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($menunggu_konfirmasi as $i => $item)
                            <div
                                class="relative bg-white w-full px-5 pt-7 pb-4 rounded-lg shadow hover:shadow-lg duration-500 shadow-gray-200">
                                <div class=" flex items-center">
                                    <div
                                        class="w-10 h-10 rounded-full bg-violet-500 text-white flex items-center justify-center mr-3 shrink-0">
                                        <span>{{ $i + 1 }}</span>
                                    </div>
                                    <div class="w-full">
                                        <div class="text-lg font-medium">{{ $item->merk_brg }}</div>
                                        <div class="text-gray-400 text-sm mt-1">
                                            <div class="flex items-center justify-between">
                                                <span>{{ $item->jumlah }} produk</span>
                                                <span>Rp. {{ number_format($item->harga_brg) }}</span>
                                            </div>
                                            <span class="block">{{ $item->tanggal }}</span>
                                            <span>{{ $item->pengiriman }}, </span>
                                            <span>{{ $item->pembayaran }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div
                                        class="absolute top-0 right-0 bg-red-500 text-white px-2 rounded-tr-lg rounded-bl-lg ">
                                        <span class="text-xs">{{ $item->status }}</span>
                                    </div>
                                </div>
                                <div class="flex items-center justify-end mt-2">
                                    <form action="{{ route('pesanan.batal', $item->slug) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_produk" value="{{ $item->id }}">
                                        <button class="text-sm text-red-600 mr-3 hover:underline">Batalkan</button>
                                    </form>
                                    <div>
                                        <a href="{{ route('pesanan.detail', $item->slug) }}"
                                            class="text-sm text-violet-600 hover:underline">Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="hidden" id="dikemas" role="tabpanel" aria-labelledby="dikemas-tab">
                    @empty(count($dikemas))
                        <div class="-mt-14">
                            <script src="/js/no-products.js"></script>
                            <lottie-player class="mx-auto" src="/js/product-search.json" background="transparent"
                                speed="1" style="width: 300px; height: 300px;" loop autoplay>
                            </lottie-player>
                            <div class="text-center -mt-14 text-lg text-gray-400">
                                Belum ada pesanan!
                            </div>
                        </div>
                    @endempty

                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($dikemas as $i => $item)
                            <div class="relative bg-white w-full px-5 pt-7 pb-4 rounded-lg shadow duration-500 hover:shadow-lg shadow-gray-200">
                                <div class=" flex items-center">
                                    <div
                                        class="w-10 h-10 rounded-full bg-violet-500 text-white flex items-center justify-center mr-3">
                                        <span>{{ $i + 1 }}</span>
                                    </div>
                                    <div>
                                        <div class="text-lg font-medium">{{ $item->merk_brg }}</div>
                                        <div class="text-gray-400 text-sm">
                                            <span class="">{{ $item->jumlah }} produk</span>
                                            <span class="block">{{ $item->tanggal }}</span>
                                            <span>{{ $item->pengiriman }}, </span>
                                            <span>{{ $item->pembayaran }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div
                                        class="absolute top-0 right-0 bg-green-600 text-white px-2 rounded-tr-lg rounded-bl-lg ">
                                        <span class="text-xs">{{ $item->status }}</span>
                                    </div>
                                </div>
                                <div class="block text-end mt-2">
                                    <a href="{{ route('pesanan.detail', $item->slug) }}"
                                        class="text-sm text-violet-600 hover:underline">Selengkapnya</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="hidden" id="dikirim" role="tabpanel" aria-labelledby="dikirim-tab">
                    @empty(count($dikirim))
                        <div class="-mt-14">
                            <script src="/js/no-products.js"></script>
                            <lottie-player class="mx-auto" src="/js/product-search.json" background="transparent"
                                speed="1" style="width: 300px; height: 300px;" loop autoplay>
                            </lottie-player>
                            <div class="text-center -mt-14 text-lg text-gray-400">
                                Belum ada pesanan!
                            </div>
                        </div>
                    @endempty

                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($dikirim as $i => $item)
                            <div class="relative bg-white w-full px-5 pt-7 pb-4 rounded-lg shadow duration-500 hover:shadow-lg shadow-gray-200">
                                <div class=" flex items-center">
                                    <div
                                        class="w-10 h-10 rounded-full bg-violet-500 text-white flex items-center justify-center mr-3">
                                        <span>{{ $i + 1 }}</span>
                                    </div>
                                    <div>
                                        <div class="text-lg font-medium">{{ $item->merk_brg }}</div>
                                        <div class="text-gray-400 text-sm">
                                            <span class="">{{ $item->jumlah }} produk</span>
                                            <span class="block">{{ $item->tanggal }}</span>
                                            <span>{{ $item->pengiriman }}, </span>
                                            <span>{{ $item->pembayaran }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div
                                        class="absolute top-0 right-0 bg-blue-600 text-white px-2 rounded-tr-lg rounded-bl-lg ">
                                        <span class="text-xs">{{ $item->status }}</span>
                                    </div>
                                </div>
                                <div class="block text-end mt-2">
                                    <a href="{{ route('pesanan.detail', $item->slug) }}"
                                        class="text-sm text-violet-600 hover:underline">Selengkapnya</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="hidden" id="selesai" role="tabpanel" aria-labelledby="selesai-tab">
                    @empty(count($selesai))
                        <div class="-mt-14">
                            <script src="/js/no-products.js"></script>
                            <lottie-player class="mx-auto" src="/js/product-search.json" background="transparent"
                                speed="1" style="width: 300px; height: 300px;" loop autoplay>
                            </lottie-player>
                            <div class="text-center -mt-14 text-lg text-gray-400">
                                Belum ada pesanan!
                            </div>
                        </div>
                    @endempty

                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($selesai as $i => $item)
                            <div class="relative bg-white w-full px-5 pt-7 pb-4 rounded-lg shadow duration-500 hover:shadow-lg shadow-gray-200">
                                <div class=" flex items-center">
                                    <div
                                        class="w-10 h-10 rounded-full bg-violet-500 text-white flex items-center justify-center mr-3">
                                        <span>{{ $i + 1 }}</span>
                                    </div>
                                    <div>
                                        <div class="text-lg font-medium">{{ $item->merk_brg }}</div>
                                        <div class="text-gray-400 text-sm">
                                            <span class="">{{ $item->jumlah }} produk</span>
                                            <span class="block">{{ $item->tanggal }}</span>
                                            <span>{{ $item->pengiriman }}, </span>
                                            <span>{{ $item->pembayaran }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div
                                        class="absolute top-0 right-0 bg-violet-500 text-white px-2 rounded-tr-lg rounded-bl-lg ">
                                        <span class="text-xs">{{ $item->status }}</span>
                                    </div>
                                </div>
                                <div class="block text-end mt-2">
                                    <a href="{{ route('pesanan.detail', $item->slug) }}"
                                        class="text-sm text-violet-600 hover:underline">Selengkapnya</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
