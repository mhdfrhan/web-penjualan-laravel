@extends('guest.layouts.master')

@section('container')

    <section class="py-12">
        <div class="container mx-auto px-5 lg:px-20 overflow-hidden">
        @include('dashboard.partials.message')
            <div class="swiper banner">
                <div class="swiper-wrapper">
                    @foreach ($banner as $b)
                        <div class="swiper-slide">
                            <img src="{{ asset('img/banner/' . $b->image) }}" class="rounded-lg object-cover w-full"
                                alt="">
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-violet-200">
        <div class="container mx-auto px-5 lg:px-20 overflow-hidden">
            <div class="flex flex-wrap justify-center items-start -mx-4">
                <div class="w-1/2 md:w-1/3 lg:w-1/4 p-4" data-aos="zoom-in" data-aos-duration="800">
                    <div class="bg-white w-14 h-14 flex justify-center mx-auto items-center rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8 text-gray-700">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                        </svg>
                    </div>
                    <div class="mt-4 text-center">
                        <h6 class="sm:text-xl font-semibold text-gray-700 tracking-wide capitalize">Gratis Ongkir
                        </h6>
                        <p class="text-[13px] sm:text-sm text-gray-600 mt-1 capitalize">Seluruh Indonesia</p>
                    </div>
                </div>
                <div class="w-1/2 md:w-1/3 lg:w-1/4 p-4" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="100">
                    <div class="bg-white w-14 h-14 flex justify-center mx-auto items-center rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8 text-gray-700">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                        </svg>
                    </div>
                    <div class="mt-4 text-center">
                        <h6 class="sm:text-xl font-semibold text-gray-700 tracking-wide capitalize">belanja aman
                        </h6>
                        <p class="text-[13px] sm:text-sm text-gray-600 mt-1 capitalize">jaminan 100%</p>
                    </div>
                </div>
                <div class="w-1/2 md:w-1/3 lg:w-1/4 p-4" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="200">
                    <div class="bg-white w-14 h-14 flex justify-center mx-auto items-center rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8 text-gray-700">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.182 15.182a4.5 4.5 0 01-6.364 0M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z" />
                        </svg>
                    </div>
                    <div class="mt-4 text-center">
                        <h6 class="sm:text-xl font-semibold text-gray-700 tracking-wide capitalize">kepuasan
                            pelanggan</h6>
                        <p class="text-[13px] sm:text-sm text-gray-600 mt-1 capitalize">100% ulasan positif</p>
                    </div>
                </div>
                <div class="w-1/2 md:w-1/3 lg:w-1/4 p-4" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="300">
                    <div class="bg-white w-14 h-14 flex justify-center mx-auto items-center rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-7 h-7 text-gray-700">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.25 9.75v-4.5m0 4.5h4.5m-4.5 0l6-6m-3 18c-8.284 0-15-6.716-15-15V4.5A2.25 2.25 0 014.5 2.25h1.372c.516 0 .966.351 1.091.852l1.106 4.423c.11.44-.054.902-.417 1.173l-1.293.97a1.062 1.062 0 00-.38 1.21 12.035 12.035 0 007.143 7.143c.441.162.928-.004 1.21-.38l.97-1.293a1.125 1.125 0 011.173-.417l4.423 1.106c.5.125.852.575.852 1.091V19.5a2.25 2.25 0 01-2.25 2.25h-2.25z" />
                        </svg>
                    </div>
                    <div class="mt-4 text-center">
                        <h6 class="sm:text-xl font-semibold text-gray-700 tracking-wide capitalize">support</h6>
                        <p class="text-[13px] sm:text-sm text-gray-600 mt-1 capitalize">Layanan online 24/7</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-14 pb-8">
        <div class="container mx-auto px-5 lg:px-20 overflow-hidden">
            <div class="flex flex-wrap -mx-6">
                <div class="w-full lg:w-1/3 p-6 text-center lg:text-left" data-aos="fade-right" data-aos-duration="1000">
                    <h1 class="heading before:block lg:before:hidden">Kategori</h1>
                    <p class="text-gray-400 text-sm sm:text-base">Pelajari lebih lanjut tentang produk-produk yang tersedia
                        di kategori kami dan
                        temukan yang terbaik untuk Anda.</p>
                </div>
                <div class="w-full lg:w-2/3 p-6">
                    {{-- kategori --}}
                    <div class="swiper kategori">
                        <div class="swiper-wrapper grid grid-rows-2">
                            @foreach ($categories as $category)
                                <a href="/categories/{{ $category->slug }}"
                                    class="inline bg-white border border-gray-200 text-center font-medium py-8 hover:bg-gray-100 duration-500 swiper-slide" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                                    {{ $category->name }}
                                </a>
                            @endforeach
                        </div>
												<div class="swiper-pagination"></div>
                    </div>
                    {{-- end kategori --}}
                </div>
            </div>
        </div>
    </section>

    <section class="py-14">
        <div class="container mx-auto px-5 lg:px-20 overflow-hidden">
            <div class="text-center mb-8 max-w-xl mx-auto overflow-hidden" data-aos="fade-up" data-aos-duration="1000">
                <h1 class="heading">Produk baru</h1>
                <p class="text-gray-400 text-sm sm:text-base">Temukan produk terbaru kami yang inovatif dan berguna untuk
                    memenuhi kebutuhan
                    Anda.</p>
            </div>
            <div class="flex flex-wrap -mx-4 mb-8">
                @foreach ($newProducts as $b)
                    <div class="w-full sm:w-1/2 lg:w-1/3 2xl:w-1/4 p-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="{{ $loop->iteration * 100 }}">
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
                                        class="bg-violet-600 text-white py-2.5 px-4 rounded-lg text-sm w-full font-medium tracking-wide hover:bg-violet-500 inline-flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2 shrink-0">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                        </svg>
                                        <span>Masukkan ke keranjang</span>
                                    </button>
                                </form>
                                <div
                                    class="absolute top-3 right-3 lg:translate-x-14 group-hover:translate-x-0 duration-500">
                                    <form action="{{ route('tambah.favorit', $b->slug) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_produk" value="{{ $b->id }}">
                                        <button type="submit"
                                            class="bg-violet-600 shadow-lg shadow-violet-500/50 hover:bg-violet-700 text-violet-100 rounded-xl text-sm ml-2 w-10 h-10 flex items-center justify-center font-medium tracking-wide">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
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
            @if (count($newProducts) > 0)
                <div class="text-center">
                    <a href="/products"
                        class="inline-block border border-violet-600 text-violet-600 py-3 px-10 rounded-lg hover:bg-violet-600 hover:text-white duration-300">Semua
                        produk</a>
                </div>
            @endif
        </div>
    </section>

    <section class="py-14">
        <div class="container mx-auto px-5 lg:px-20 overflow-hidden">
            <div class="text-center mb-8 max-w-xl mx-auto" data-aos="fade-up" data-aos-duration="1000">
                <h1 class="heading">Testimonials</h1>
                <p class="text-gray-400 text-sm sm:text-base">Lihat apa yang dikatakan pelanggan kami tentang pengalaman
                    mereka dengan produk
                    dan
                    layanan kami.</p>
            </div>
            <div>
                <div class="swiper testimonials">
                    <div class="swiper-wrapper py-3">
                        @foreach ($testimonials as $t)
                            <div class="swiper-slide rounded-lg shadow-lg shadow-gray-200 p-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="{{ $loop->iteration * 100 }}">
                                <div>
                                    <svg class="mb-4 w-8 h-8 fill-violet-600" viewBox="0 0 32 32" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.787 15.5068H4.53366C4.64033 9.28012 5.86699 8.25346 9.69366 5.98679C10.1337 5.72012 10.2803 5.16012 10.0137 4.70679C9.76033 4.26679 9.18699 4.12012 8.74699 4.38679C4.24033 7.05346 2.66699 8.68012 2.66699 16.4268V23.6135C2.66699 25.8935 4.52033 27.7335 6.78699 27.7335H10.787C13.1337 27.7335 14.907 25.9601 14.907 23.6135V19.6135C14.907 17.2801 13.1337 15.5068 10.787 15.5068Z">
                                        </path>
                                        <path
                                            d="M25.2134 15.5065H18.9601C19.0667 9.27988 20.2934 8.25321 24.1201 5.98655C24.5601 5.71988 24.7067 5.15988 24.4401 4.70655C24.1734 4.26655 23.6134 4.11988 23.1601 4.38655C18.6534 7.05321 17.0801 8.67988 17.0801 16.4399V23.6265C17.0801 25.9065 18.9334 27.7465 21.2001 27.7465H25.2001C27.5467 27.7465 29.3201 25.9732 29.3201 23.6265V19.6265C29.3334 17.2799 27.5601 15.5065 25.2134 15.5065Z">
                                        </path>
                                    </svg>
                                </div>
                                <p class="font-medium"> " {{ $t->feedback }}</p>
                                <div class="mt-6 flex items-center gap-x-3">
                                    @if ($t->image)
                                        <img src="{{ asset('img/user/' . $t->image) }}" class="w-10 h-10 object-cover object-top rounded-full"
                                            alt="{{ $t->name }}" />
                                    @else
                                        <img src="{{ asset('img/no-photo.png') }}" class="w-10 h-10 object-cover object-top rounded-full"
                                            alt="{{ $t->name }}" />
                                    @endif
                                    <div>
                                        <h6 class="font-semibold leading-tight">{{ $t->name }}</h6>
                                        <p class="text-[13px] text-gray-400">{{ $t->email }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-14">
        <div class="container mx-auto px-5 lg:px-20 overflow-hidden">
            <div class="text-center mb-8 max-w-xl mx-auto overflow-hidden" data-aos="fade-up" data-aos-duration="1000">
                <h1 class="heading">FAQs</h1>
                <p class="text-gray-400 text-sm sm:text-base">Tidak menemukan pertanyaan yang ingin Anda cari? <span
                        class="text-violet-600 font-medium">Hubungi kami</span></p>
            </div>
            <div class="grid lg:grid-cols-2 gap-20 justify-start">
                <lottie-player class="w-full" data-aos="fade-right" data-aos-duration="1000"
                    src="https://lottie.host/32912b26-ea7b-4875-bc8c-b060ba2d3dd7/UTHjSsKxic.json"
                    background="transparent" speed="1" loop autoplay>
                </lottie-player>

                @php
                    $faq = [
                        [
                            'judul' => 'Bagaimana cara order?',
                            'jawaban' => ['Cari produk yang ingin dibeli dan tambahkan ke dalam keranjang belanja.', 'Periksa kembali produk yang telah ditambahkan ke keranjang belanja dan pastikan jumlah, harga, dan spesifikasi produk sudah benar.', 'Lanjutkan proses pembayaran dengan mengisi data pribadi dan metode pembayaran yang diinginkan.', 'Periksa kembali informasi pesanan dan pastikan semua data yang diisi sudah benar sebelum menyelesaikan proses pembayaran.', 'Setelah pembayaran berhasil, Anda akan menerima konfirmasi pesanan dan nomor resi pengiriman jika produk sudah dikirimkan.'],
                        ],
                        [
                            'judul' => 'Apa saja metode pembayaran yang digunakan?',
                            'jawaban' => 'Kami menggunakan beberapa pembayaran seperti Indomaret, Alfamart, Bank BRI, Bank BCA, Bank BNI dan Bank Mandiri',
                        ],
                        [
                            'judul' => 'Apa saja metode pengiriman yang digunakan?',
                            'jawaban' => 'Kami menggunakan jasa pengiriman seperti JNE Express, J&T Express, SiCepat, Go-Send',
                        ],
                        [
                            'judul' => 'Apakah produk original?',
                            'jawaban' => 'Ya, gadgetcom menyediakan jaminan keaslian produk dan memberikan informasi yang lengkap tentang spesifikasi, kualitas, dan sertifikasi produk yang dijual.',
                        ],
                        [
                            'judul' => 'Apa jaminan jika produk yang diberikan tidak sesuai?',
                            'jawaban' => 'Kami bersedia bertanggung jawab dengan cara meretur produk sesuai dengan yang diinginkan pelanggan atau uang kembali 100%',
                        ],
                    ];
                @endphp

                <div id="faq" data-accordion="collapse"
                    data-active-classes="bg-violet-400 text-white hover:bg-violet-500 rounded-b-none"
                    data-inactive-classes="text-gray-500" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                    @foreach ($faq as $index => $data)
                        <h2 id="faq-heading-{{ $index + 1 }}" class="mt-4">
                            <button type="button"
                                class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-gray-200 rounded-lg focus:ring-0 hover:bg-gray-100"
                                data-accordion-target="#faq-body-{{ $index + 1 }}" aria-expanded="false"
                                aria-controls="faq-body-{{ $index + 1 }}">
                                <span>{{ $data['judul'] }}</span>
                                <svg data-accordion-icon class="w-6 h-6 shrink-0 ml-2" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </h2>
                        <div id="faq-body-{{ $index + 1 }}" class="hidden"
                            aria-labelledby="faq-heading-{{ $index + 1 }}">
                            <div class="p-5 border rounded-b-lg border-gray-200">
                                @if (is_array($data['jawaban']))
                                    <ol class="list-decimal pl-5">
                                        @foreach ($data['jawaban'] as $step)
                                            <li class="text-gray-500 mb-1.5">{{ $step }}</li>
                                        @endforeach
                                    </ol>
                                @else
                                    <p class="mb-2 text-gray-500">{{ $data['jawaban'] }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>
@endsection
