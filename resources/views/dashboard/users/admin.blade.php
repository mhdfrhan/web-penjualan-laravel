@extends('dashboard.layouts.master')

@section('container')
    <section>
        <div class="flex flex-wrap items-center justify-between mb-8">
            <div class="w-full lg:w-1/3 mb-4 lg:mb-0">
                <form action="/dashboard/users/admin" method="GET" class="flex items-center w-full"><label for="search"
                        class="sr-only">Search</label>
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
            <div class="w-full lg:w-1/3 text-end duration-500"><button type="button" data-modal-target="tambahModal"
                    data-modal-toggle="tambahModal" id="tambahBarangBtn"
                    class="focus:outline-none text-white bg-violet-600 hover:bg-violet-700 focus:ring-4 focus:ring-violet-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 inline-flex items-center gap-x-2 shadow-lg shadow-violet-600/30 hover:scale-105 duration-500"><svg
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                    </svg>Tambah admin</button></div>
            <div id="tambahModal" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full bg-black bg-opacity-50">
                <div class="relative w-full h-full max-w-xl md:h-auto mx-auto">
                    <div class="relative bg-white rounded-lg shadow">
                        <div class="flex items-start justify-between p-4 border-b rounded-t ">
                            <h3 class="text-xl font-semibold text-gray-900">Tambah admin</h3><button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center "
                                data-modal-hide="tambahModal"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg></button>
                        </div>
                        <div class="p-6 space-y-6">
                            <form action="{{ route('admin.tambah') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="grid md:grid-cols-2 gap-6 mb-6">
                                    <div>
                                        <div class="relative">
                                            <input type="text" id="name" name="name"
                                                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:ring-violet-500 focus:outline-none focus:border-violet-600 peer @error('name') !border-red-600 @enderror"
                                                autocomplete="off" placeholder=" " required
                                                value="{{ old('name') }}"><label for="name"
                                                class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white  px-2 peer-focus:px-2 peer-focus:text-violet-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1 capitalize @error('name') !text-red-600 @enderror">Nama</label>
                                        </div>
                                        @error('name')
                                            <span class="text-sm text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <div class="relative">
                                            <input type="text" id="username" name="username"
                                                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:ring-violet-500 focus:outline-none focus:border-violet-600 peer @error('username') !border-red-600 @enderror"
                                                autocomplete="off" placeholder=" " required
                                                value="{{ old('username') }}"><label for="username"
                                                class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white  px-2 peer-focus:px-2 peer-focus:text-violet-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1 capitalize @error('username') !text-red-600 @enderror">Username</label>
                                        </div>
                                        @error('username')
                                            <span class="text-sm text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <div class="relative">
                                            <input type="email" id="email" name="email"
                                                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:ring-violet-500 focus:outline-none focus:border-violet-600 peer @error('email') !border-red-600 @enderror"
                                                autocomplete="off" placeholder=" " required
                                                value="{{ old('email') }}"><label for="email"
                                                class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white  px-2 peer-focus:px-2 peer-focus:text-violet-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1 capitalize @error('email') !text-red-600 @enderror">email</label>
                                        </div>
                                        @error('email')
                                            <span class="text-sm text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <div class="relative">
                                            <input type="text" id="whatsapp" name="whatsapp"
                                                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:ring-violet-500 focus:outline-none focus:border-violet-600 peer @error('whatsapp') !border-red-600 @enderror"
                                                autocomplete="off" placeholder=" " required
                                                value="{{ old('whatsapp') }}"><label for="whatsapp"
                                                class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white  px-2 peer-focus:px-2 peer-focus:text-violet-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1 capitalize @error('whatsapp') !text-red-600 @enderror">whatsapp</label>
                                        </div>
                                        @error('whatsapp')
                                            <span class="text-sm text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <div class="relative">
                                            <input type="password" id="password" name="password"
                                                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:ring-violet-500 focus:outline-none focus:border-violet-600 peer @error('password') !border-red-600 @enderror"
                                                autocomplete="off" placeholder=" " required value=""><label
                                                for="password"
                                                class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white  px-2 peer-focus:px-2 peer-focus:text-violet-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1 capitalize @error('password') !text-red-600 @enderror">password</label>
                                        </div>
                                        @error('password')
                                            <span class="text-sm text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <div class="relative">
                                            <input type="password" id="password_confirmation"
                                                name="password_confirmation"
                                                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:ring-violet-500 focus:outline-none focus:border-violet-600 peer @error('password_confirmation') !border-red-600 @enderror"
                                                autocomplete="off" placeholder=" " required value=""><label
                                                for="password_confirmation"
                                                class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white  px-2 peer-focus:px-2 peer-focus:text-violet-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1 capitalize @error('password_confirmation') !text-red-600 @enderror">Konfirmasi
                                                Password</label>
                                        </div>
                                        @error('password_confirmation')
                                            <span class="text-sm text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div>
                                    <div class="relative">
                                        <textarea rows="4" id="alamat" name="alamat"
                                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:ring-violet-500 focus:outline-none focus:border-violet-600 peer @error('alamat') !border-red-600 @enderror"
                                            autocomplete="off" placeholder=" " required value="{{ old('alamat') }}">{{ old('alamat') }}</textarea>
                                        <label for="alamat"
                                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white  px-2 peer-focus:px-2 peer-focus:text-violet-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-6 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1 capitalize @error('alamat') !text-red-600 @enderror">Alamat</label>
                                    </div>
                                    @error('alamat')
                                        <span class="text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mt-6">
                                    <img class="img-preview w-40" alt="">
                                    <input class="" id="image" name="image" type="file"
                                        accept="image/png, image/jpg, image/jpeg">
                                    <p class="mt-1.5 text-xs text-gray-400">
                                        PNG, JPG or JEPG (MAX. 1024kb/1mb).</p>
                                    @error('image')
                                        <span class="text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex items-center justify-end gap-4 mt-4"><button type="button"
                                        data-modal-hide="tambahModal"
                                        class="px-6 py-2.5 bg-gradient-to-b from-red-500 to-red-600 text-white rounded-lg shadow-md shadow-red-600/30 mt-4 hover:scale-105 duration-500">Batal</button><button
                                        type="submit"
                                        class="px-4 py-2.5 bg-gradient-to-b from-violet-500 to-violet-600 text-white rounded-lg shadow-lg shadow-violet-600/30 mt-4 hover:scale-105 duration-500">Tambah
                                        admin</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('dashboard.partials.message')
        <div class="relative overflow-x-auto">
            <table class="table">
                <thead class="">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">WhatsApp</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admin as $i => $a)
                        <tr>
                            <th scope="row">{{ $admin->firstItem() + $i }}</th>
                            <td scope="row">
                                @if ($a->image)
                                    <a class="cursor-pointer" data-fancybox
                                        data-src="{{ asset('storage/' . $a->image) }}">
                                        <img src="{{ asset('storage/' . $a->image) }}"
                                            class="inline w-24 rounded-lg h-auto" alt="gambar {{ $a->name }}">
                                    </a>
                                @else
                                    <a class="cursor-pointer" data-fancybox data-src="/img/no-photo.png">
                                        <img src="/img/no-photo.png" class="w-24 rounded-lg h-auto"
                                            alt="gambar {{ $a->name }}">
                                    </a>
                                @endif
                            </td>
                            <td scope="row">{{ $a->name }}</td>
                            <td>{{ $a->email }}</td>
                            <td>{{ $a->whatsapp }}</td>
                            <td>
                                <div class="flex items-center gap-x-2">
                                    <div>
                                        <button class="viewBtn">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div>
                                        <form action="{{ route('user.edit', $a->slug) }}" method="GET">
                                            @csrf
                                            <button class="editBtn">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg>
                                        </form>
                                        </button>
                                    </div>
                                    <div>
                                        <form action="/dashboard/user/hapus/" method="POST" id="formHapus">
                                            @csrf
                                            <button type="submit" data-modal-target="hapusModal"
                                                data-modal-toggle="hapusModal" class="hapusBtn"
                                                value="{{ $a->slug }}" data-name="{{ $a->name }}"><svg
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if (!empty($admin->links()))
            <div class="mt-8 space-x-3">{{ $admin->links('vendor.pagination.tailwind') }}</div>
        @endif
        @if (count($admin))
        @else<div class="p-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50 text-center" role="alert"><span
                    class="font-medium">Tidak ada data admin!</span></div>
        @endif


        {{-- hapus modal --}}
        <div id="hapusModal" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full ">
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
                        <form action="" method="POST" id="formHapusModal">
                            @csrf
                            <button type="submit"
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
    </section>
@endsection
