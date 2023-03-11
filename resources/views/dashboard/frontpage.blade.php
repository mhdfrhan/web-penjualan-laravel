@extends('dashboard.layouts.master')



@section('container')

    @include('dashboard.partials.message')

    <section class="space-y-6 pb-14">

        <div class="border border-gray-200 p-6 rounded-lg">

            <h2 class="text-xl font-medium mb-6">Banner</h2>

            <form action="{{ route('tambah.banner') }}" enctype="multipart/form-data" method="POST">

                @csrf

                <div>

                    <div class="relative w-full">

                        <img class="rounded-lg h-full w-full object-cover img-preview hidden">

                        <label for="image" class="mb-1 text-gray-400 text-sm">Gambar</label>

                        <input type="file" name="image" id="image"

                            class=" @error('image') !border-red-600 @enderror" value="{{ old('image') }}"

                            autocomplete="off">

                    </div>

                    <span class="text-xs text-gray-400">Tinggi gambar disarankan 450px</span>

                    @error('image')

                        <span class="text-sm text-red-600">{{ $message }}</span>

                    @enderror

                </div>

                <div class="mt-4 block text-end">

                    <button type="submit"

                        class="bg-violet-600 text-white rounded-lg px-6 py-2.5 hover:scale-105 duration-500">Tambah</button>

                </div>

            </form>

            <div class="mt-6">

                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-4">

                    @foreach ($banner as $b)

                        <div class="relative overflow-hidden group">

                            <img src="{{ asset('img/banner/' . $b->image) }}"

                                class="inline rounded-lg h-full w-full object-cover" alt="{{ $b->image }}">

                            <div

                                class="absolute left-0 right-0 bottom-0 h-10 pr-2 lg:p-0 lg:inset-0 lg:h-full bg-black rounded-lg bg-opacity-50 flex justify-end lg:justify-center items-center gap-x-1 lg:translate-y-full group-hover:translate-y-0 duration-500">

                                <form action="/dashboard/tambah/banner/" method="POST" id="formHapus">

                                    @csrf

                                    @method('DELETE')

                                    <button class="text-white bg-red-600 !p-1 !rounded-full hapusBtn"

                                        data-modal-target="hapusBanner" data-modal-toggle="hapusBanner"

                                        value="{{ $b->id }}">

                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"

                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">

                                            <path stroke-linecap="round" stroke-linejoin="round"

                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />

                                        </svg>

                                    </button>

                                </form>

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

        </div>

        <div class="border border-gray-200 p-6 rounded-lg">

            <h2 class="text-xl font-medium">Testimonials</h2>

            <p class="text-sm text-gray-400 mb-6">Tambahkan testimonials ke halaman utama dari <a

                    href="{{ route('dashboard.feedback') }}" class="text-violet-600 font-medium">halaman feedback</a></p>

            <div class="flex flex-col">

                @foreach ($testimonials as $i => $t)

                    <div class="flex flex-row items-center justify-between py-2">

                        <div class="flex items-center">

                            <div>{{ $testimonials->firstItem() + $i }}.</div>

                            <div class="px-6 text-gray-500">{{ $t->feedback }}</div>

                        </div>

                        <div>

                            <form action="{{ route('hapus.post', $t->id) }}" method="POST">

                                @csrf

																@method('delete')

                                <button

                                    class="w-10 h-10 flex justify-center items-center bg-red-600 shadow-lg rounded-lg shadow-red-600/30 text-white"><svg

                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"

                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">

                                        <path stroke-linecap="round" stroke-linejoin="round"

                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />

                                    </svg>

                                </button>

                            </form>

                        </div>

                    </div>

                @endforeach

                @if (!empty($testimonials->links()))

                    <div class="mt-8 space-x-3">{{ $testimonials->links('vendor.pagination.tailwind') }}</div>

                @endif

            </div>



        </div>

    </section>



    {{-- modal hapus banner --}}



    <div id="hapusBanner" tabindex="-1"

        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full bg-black bg-opacity-70">

        <div class="relative w-full h-full max-w-md md:h-auto">

            <div class="relative bg-white rounded-lg shadow">

                <button type="button"

                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"

                    data-modal-hide="hapusBanner">

                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"

                        xmlns="http://www.w3.org/2000/svg">

                        <path fill-rule="evenodd"

                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"

                            clip-rule="evenodd"></path>

                    </svg>

                    <span class="sr-only">Close modal</span>

                </button>

                <div class="p-6 text-center">

                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none"

                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"

                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>

                    </svg>

                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Yakin ingin menghapus banner ini?

                    </h3>

                    <form class="inline" action="" method="POST" id="formHapusModal">

                        @csrf

                        @method('DELETE')

                        <button type="submit"

                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">

                            Ya, Saya yakin

                        </button>

                    </form>

                    <button data-modal-hide="hapusBanner" type="button"

                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Tidak,

                        batal</button>

                </div>

            </div>

        </div>

    </div>



    {{-- end modal hapus banner --}}

@endsection

