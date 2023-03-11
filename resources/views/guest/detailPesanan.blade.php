@extends('guest.layouts.master')

@section('container')
    <section class="py-16 px-4">
        <div class="max-w-6xl shadow p-6 sm:p-10 mx-auto">
            <h1 class="mb-8 text-2xl font-medium">Pesanan: {{ $pesanan->merk_brg }}</h1>
            <div class="mt-10">
                <div class="sm:flex flex-wrap items-center justify-between border-b border-gray-200 pb-6">
                    <a href="/pesanan" class="flex items-center text-gray-500 group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75" />
                        </svg>
                        <span class="ml-1 group-hover:ml-2 duration-300">Kembali</span>
                    </a>
                    <div class="flex flex-wrap items-center justify-end mt-3 sm:mt-0">
                        <div class="pr-4 border-r text-gray-500">{{ $pesanan->status }}</div>
                        <div class="pl-4 text-violet-600">Rp. {{ number_format($pesanan->total) }}</div>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-8 mt-10 md:divide-x divide-gray-200">
                    <div class="sm:flex items-start gap-x-4">
                        @if ($pesanan->image)
                            <img src="{{ asset('img/' . $pesanan->image) }}" alt="{{ $pesanan->merk_brg }}"
                                class="w-full mb-4 sm:w-28 object-cover rounded-lg">
                        @else
                            <img src="{{ asset('img/no-photo.png') }}" alt="{{ $pesanan->merk_brg }}"
                                class="w-full mb-4 sm:w-28 object-cover rounded-lg">
                        @endif
                        <div class="space-y-2 w-full">
                            <div class="flex items-center justify-between">
                                <h3 class="text-xl font-semibold">{{ $pesanan->merk_brg }}</h3>
                                <p class="text-gray-400 text-sm">{{ $pesanan->tanggal }}</p>
                            </div>
                            <p class="text-gray-400 text-sm">Rp. {{ number_format($pesanan->harga_brg) }}</p>
                            <p class="text-gray-400 text-sm">{{ $pesanan->pengiriman }}</p>
                            <p class="text-gray-400 text-sm">x{{ $pesanan->jumlah }}</p>
                        </div>
                    </div>
                    <div class="md:pl-8 ">
                        <h2 class="mb-2 text-xl font-semibold">Alamat Pengiriman</h2>
                        <div class="text-sm text-gray-400 space-y-1">
                            <p>{{ $pesanan->name }}</p>
                            <p>{{ $pesanan->email }}</p>
                            <p>{{ $pesanan->whatsapp }}</p>
                            <p>{{ $pesanan->alamat }}</p>
                        </div>
                    </div>
                </div>
                <div class="border-t border-gray-200 mt-6 py-6">
                    <h6 class="text-gray-400">Pesan khusus</h6>
                    <p class="mt-1">{{ $pesanan->pesan == null ? '-' : $pesanan->pesan }}</p>
                </div>
                <div class="bg-gray-50 overflow-x-auto relative">
                    <table class="table max-w-lg ml-auto">
                        <tr class="!bg-transparent !border-0 text-end">
                            <td>Subtotal</td>
                            <td class="!min-w-0">:</td>
                            <td>Rp. {{ number_format($pesanan->total) }}</td>
                        </tr>
                        <tr class="!bg-transparent !border-0 text-end">
                            <td>Ongkor kirim</td>
                            <td class="!min-w-0">:</td>
                            <td>Rp. 0</td>
                        </tr>
                        <tr class="!bg-transparent !border-0 text-end">
                            <td>Total pesanan</td>
                            <td class="!min-w-0">:</td>
                            <td class="text-lg text-violet-600">Rp. {{ number_format($pesanan->total) }}</td>
                        </tr>
                        <tr class="!bg-transparent !border-0 text-end">
                            <td>Metode pembayaran</td>
                            <td class="!min-w-0">:</td>
                            <td>{{ $pesanan->pembayaran }}</td>
                        </tr>
                    </table>
                </div>
                <div class="mt-10 text-end">
                    @if ($pesanan->status == 'Menunggu Konfirmasi')
                        <form action="{{ route('pesanan.batal', $pesanan->slug) }}" method="POST">
                            @csrf
                            <input type="hidden" name="id_produk" value="{{ $pesanan->id }}">
                            <button
                                class="text-sm bg-red-600 text-white py-3 w-1/3 rounded-lg hover:bg-red-700 ">Batalkan</button>
                        </form>
                    @else
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
