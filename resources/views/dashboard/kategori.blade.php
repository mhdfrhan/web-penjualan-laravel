@extends('dashboard.layouts.master')

@section('container')
    <div class="flex flex-wrap -mx-4">
        <div class="w-full lg:w-5/12 px-4 mb-10 lg:mb-0">
            <div class="border border-gray-200 rounded-lg p-5">
							@include('dashboard.partials.message')
                <h2 class="text-lg md:text-xl font-medium">Tambah Kategori</h2>
                <p class="text-[13px] mt-1 text-gray-400">Silahkan tambahkan kategori baru untuk produk Anda</p>
                <form action="/dashboard/kategori/produk" method="POST" class="mt-6">
                    @csrf
                    <div class="relative w-full">
                        <input type="text" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-violet-500 focus:border-violet-500 block w-full p-2.5 @error('name')
																!border-red-600
														@enderror"
                            value="{{ old('name') }}" autocomplete="off">
                    </div>
                    @error('name')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                    <div class="mt-4 block text-end">
                        <button type="submit"
                            class="bg-violet-600 text-white rounded-lg px-6 py-2.5 hover:scale-105 duration-500">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="w-full lg:w-7/12 px-4">
            <div class="border border-gray-200 rounded-lg p-5">
                @if (session()->has('editHapusSuccess'))
                    <div id="alert-3" class="flex p-4 mb-4 text-green-800 rounded-lg bg-green-50 " role="alert"><span
                            class="sr-only">Info</span>
                        <div class="text-sm font-medium">{{ session('editHapusSuccess') }}</div><button type="button"
                            class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 "
                            data-dismiss-target="#alert-3" aria-label="Close"><span class="sr-only">Close</span><svg
                                aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg></button>
                    </div>
                @endif
                @if (session()->has('editHapusError'))
                    <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">{{ session('editHapusError') }}</span>
                        </div>
                    </div>
                @endif
                <h2 class="text-lg md:text-xl font-medium">Semua Kategori</h2>
                <p class="text-[13px] mt-1 text-gray-400">Semuah kategori akan tampil disini</p>
                <div class="relative overflow-x-auto mt-6">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $i => $category)
                                <tr>
                                    <th scope="row">{{ $categories->firstItem() + $i }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <div class="flex items-center gap-x-3">
                                            <div>
                                                <button class="editBtn2" data-modal-target="updateModal"
                                                    data-modal-toggle="updateModal" value="{{ $category->id }}" data-url="/dashboard/dataBarang/produk/"><svg
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-[18px] h-[18px]">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                    </svg><span class="text-sm font-medium">Edit</span></button>
                                            </div>
                                            <div>
                                                <form action="/dashboard/kategori/produk/" method="POST" id="formHapus">
                                                    @method('delete') @csrf<button type="submit"
                                                        data-modal-target="hapusModal" data-modal-toggle="hapusModal"
                                                        class="hapusBtn" value="{{ $category->id }}"
                                                        data-name="{{ $category->name }}"><svg
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-[18px] h-[18px]">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                        </svg><span class="text-sm font-medium">Hapus</span></button>
                                                </form>
                                            </div>
                                        </div>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if (!empty($categories->links()))
                        <div class="mt-8 space-x-3">{{ $categories->links('vendor.pagination.tailwind') }}</div>
                    @endif
                </div>
                @if (count($categories))
                @else<div class="p-4 mt-2 text-sm text-red-800 rounded-lg bg-red-50 text-center" role="alert"><span
                            class="font-medium">Tidak ada data kategori!</span></div>
                @endif
            </div>
        </div>
        {{-- update modal --}}
        <div id="updateModal" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full bg-black bg-opacity-50">
            <div class="relative w-full h-full max-w-xl md:h-auto mx-auto">
                <div class="relative bg-white rounded-lg shadow">
                    <div class="flex items-start justify-between p-4 border-b rounded-t ">
                        <h3 class="text-xl font-semibold text-gray-900 ">Update kategori</h3><button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center "
                            data-modal-hide="updateModal"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg></button>
                    </div>
                    <div class="p-6">
                        <form action="/dashboard/kategori/produk/" method="POST" id="formUpdate">@csrf
                            @method('PUT')
                            <div class="relative"><input type="text" id="nama_kategori" name="name"
                                    class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-violet-600 peer @error('nama_kategori') !border-red-600 @enderror"
                                    autocomplete="off" placeholder=" " required
                                    value="{{ old('nama_kategori') }}"><label for="nama_kategori"
                                    class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white  px-2 peer-focus:px-2 peer-focus:text-violet-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1 @error('nama_kategori') !text-red-600 @enderror">Nama
                                    kategori</label></div>
                            @error('nama_kategori')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror

                            <div class="flex items-center justify-end gap-4 mt-4"><button type="button"
                                    data-modal-hide="updateModal"
                                    class="px-6 py-2.5 bg-gradient-to-b from-red-500 to-red-600 text-white rounded-lg shadow-md shadow-red-600/30 mt-4 hover:scale-105 duration-500">Batal</button><button
                                    type="submit"
                                    class="px-4 py-2.5 bg-gradient-to-b from-violet-500 to-violet-600 text-white rounded-lg shadow-lg shadow-violet-600/30 mt-4 hover:scale-105 duration-500">Update
                                    kategori</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- hapus modal --}}
        <div id="hapusModal" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
            <div class="relative w-full h-full max-w-md md:h-auto mx-auto">
                <div class="relative bg-white rounded-lg shadow"><button type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                        data-modal-hide="hapusModal"><svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg><span class="sr-only">Close modal</span></button>
                    <div class="p-6 text-center"><svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500">Yakin ingin
                            menghapus <span class="namaBrg font-semibold"></span>?</h3>
                        <form action="" method="POST" id="formHapusModal">@method('delete')
                            @csrf<button type="submit"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2"
                                id="modalHapusBtn">Ya, Saya yakin</button>
                            <button data-modal-hide="hapusModal" type="button"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Tidak,
                                batal</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
