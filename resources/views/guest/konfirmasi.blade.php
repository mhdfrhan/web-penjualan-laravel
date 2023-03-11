@extends('guest.layouts.master')
@section('container')
    <section class="py-16">
        <div class="container mx-auto px-4 lg:px-20">
            <div class="mb-10 overflow-hidden">
                <h1 class="capitalize text-2xl lg:text-3xl font-semibold mb-6" data-aos="fade-right" data-aos-duration="1000">
                    {{ $title }}</h1>
            </div>

            @empty(Auth::user()->whatsapp || Auth::user()->alamat)
                <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">Silahkan lengkapi data anda terlebih dahulu! <a href="/profile"
                                class="font-semibold hover:underline">lengkapi sekarang</a></span>
                    </div>
                </div>
            @endempty

            <form action="{{ route('order.bayar') }}" method="POST" class="inline">
                @csrf
								@method('POST')
                <div class="flex flex-wrap -mx-4">
                    <div class="w-full lg:w-2/3 p-4">
                        <div class="bg-white rounded-lg border border-gray-200 p-6 overflow-hidden">
                            <h2 class="text-xl mb-8 font-medium" data-aos="fade-right" data-aos-duration="1000">Data
                                penerima</h2>

                            {{-- informasi pengirim --}}
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-5 gap-y-8 overflow-hidden">
                                <div data-aos="fade-up" data-aos-duration="1000">
                                    <p class="block mb-2 text-sm font-medium text-gray-900">Nama
                                        lengkap</p>
                                    <span>{{ Auth::user()->name }}</span>
                                </div>
                                <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                                    <p class="block mb-2 text-sm font-medium text-gray-900">Email</p>
                                    <span>{{ Auth::user()->email }}</span>
                                </div>
                                <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                                    <p class="block mb-2 text-sm font-medium text-gray-900">No WhatsApp</p>
                                    <span>{{ Auth::user()->whatsapp }}</span>
                                </div>

                                <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                                    <p class="block mb-2 text-sm font-medium text-gray-900">Alamat</p>
                                    <span>{{ Auth::user()->alamat }}</span>
                                </div>

                            </div>

                            <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                                <label for="pesan" class="block mb-2 text-sm mt-6 font-medium text-gray-900">Pesan
                                    khusus</label>
                                <textarea id="pesan" name="pesan" rows="4" autocomplete="off"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-violet-500 focus:border-violet-5000 @error('pesan')
																		!border-red-600
																@enderror"
                                    placeholder="Tulis pesan kamu disini...">{{ old('pesan') }}</textarea>
                                @error('pesan')
                                    <span class="text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="bg-white rounded-lg border border-gray-200 p-6 mt-8 overflow-hidden">
                            <h2 class="text-xl mb-8 font-medium" data-aos="fade-right" data-aos-duration="1000">Pengiriman</h2>

                            @php
                                $pengiriman = [
                                    [
                                        'nama' => 'JNE Express',
                                        'gambar' => 'jne.svg',
                                        'waktu' => '2-5',
                                    ],
                                    [
                                        'nama' => 'J&T Express',
                                        'gambar' => 'jnt.svg',
                                        'waktu' => '2-4',
                                    ],
                                    [
                                        'nama' => 'SiCepat',
                                        'gambar' => 'sicepat.svg',
                                        'waktu' => '3-5',
                                    ],
                                    [
                                        'nama' => 'Go-Send',
                                        'gambar' => 'gosend.svg',
                                        'waktu' => '2-7',
                                    ],
                                ];
                                
                            @endphp

                            @error('pengiriman')
                                <span class="text-sm text-red-600 block mb-1">{{ $message }}</span>
                            @enderror
                            <ul class="grid w-full gap-6 md:grid-cols-2">
                                @foreach ($pengiriman as $item)
                                    <li data-aos="fade-up" data-aos-duration="1000" data-aos-delay="{{ $loop->iteration * 100 }}">
                                        <input type="radio" id="{{ $item['nama'] }}" name="pengiriman"
                                            value="{{ $item['nama'] }}" class="hidden peer"
                                            {{ old('pengiriman') == $item['nama'] ? 'checked' : '' }}>
                                        <label for="{{ $item['nama'] }}"
                                            class="inline-flex items-center w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-violet-300 peer-checked:bg-violet-100 peer-checked:text-gray-800 hover:text-gray-600 hover:bg-gray-100">
                                            <div>
                                                <img src="/img/{{ $item['gambar'] }}" class="w-20"
                                                    alt="{{ $item['nama'] }}">
                                            </div>
                                            <div class="block ml-5">
                                                <div class="w-full text-lg font-medium">{{ $item['nama'] }}</div>
                                                <div class="w-full">{{ $item['waktu'] }} hari</div>
                                            </div>
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="bg-white rounded-lg border border-gray-200 p-6 mt-8 overflow-hidden">
                            <h2 class="text-xl mb-8 font-medium" data-aos="fade-right" data-aos-duration="1000">Pembayaran</h2>

                            @php
                                $pembayaran = [
                                    [
                                        'nama' => 'Indomaret',
                                        'gambar' => 'indomaret.svg',
                                    ],
                                    [
                                        'nama' => 'Alfamart',
                                        'gambar' => 'alfamart.png',
                                    ],
                                    [
                                        'nama' => 'Bank BRI',
                                        'gambar' => 'bri.svg',
                                    ],
                                    [
                                        'nama' => 'Bank BCA',
                                        'gambar' => 'bca.svg',
                                    ],
                                    [
                                        'nama' => 'Bank BNI',
                                        'gambar' => 'bni.svg',
                                    ],
                                    [
                                        'nama' => 'Bank Mandiri',
                                        'gambar' => 'mandiri.svg',
                                    ],
                                ];
                            @endphp

                            @error('pembayaran')
                                <span class="text-sm text-red-600 block mb-1">{{ $message }}</span>
                            @enderror
                            <ul class="grid w-full gap-6 md:grid-cols-3">
                                @foreach ($pembayaran as $item)
                                    <li data-aos="fade-up" data-aos-duration="1000" data-aos-delay="{{ $loop->iteration * 100 }}">
                                        <input type="radio" id="{{ $item['nama'] }}" name="pembayaran"
                                            value="{{ $item['nama'] }}" class="hidden peer"
                                            {{ old('pembayaran') == $item['nama'] ? 'checked' : '' }}>
                                        <label for="{{ $item['nama'] }}"
                                            class="inline-flex items-center w-full p-3 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-violet-300 peer-checked:bg-violet-100 peer-checked:text-gray-800 hover:text-gray-600 hover:bg-gray-100">
                                            <img src="/img/{{ $item['gambar'] }}" class="w-10"
                                                alt="{{ $item['nama'] }}">
                                            <div class="block ml-5">
                                                <div class="w-full text-sm font-medium">{{ $item['nama'] }}</div>
                                            </div>
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                    <div class="w-full lg:w-1/3 p-4" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                        <div class="bg-violet-600 rounded-lg shadow-lg shadow-violet-200 p-6 text-white">
                            <h2 class="font-medium text-xl capitalize">Total produk</h2>
                            <div class="mt-6 border-b border-violet-400 mb-6 pb-8">
                                <div class="flex items-center justify-between">
                                    <p class="text-gray-300">Subtotal</p>
                                    <p class="text-white font-medium">Rp. {{ number_format($subtotal) }}</p>
                                </div>
                                <div class="flex items-center justify-between my-4">
                                    <p class="text-gray-300">Pajak 10%</p>
                                    <p class="text-white font-medium">Rp. {{ number_format($pajak) }}</p>
                                </div>
                                <div class="flex items-center justify-between">
                                    <p class="text-gray-300">Ongkos kirim</p>
                                    <p class="text-white font-medium">Rp. 0</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="text-white font-semibold">Total</p>
                                <p class="text-white font-medium">Rp. {{ number_format($total) }}</p>
                            </div>
                            <button type="submit"
                                class="text-violet-600 font-semibold bg-white block rounded-lg w-full py-2.5 mt-6  hover:bg-violet-100 duration-300 text-center">Bayar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
