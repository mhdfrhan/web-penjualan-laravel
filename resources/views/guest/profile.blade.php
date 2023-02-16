@extends('guest.layouts.master')

@section('container')
    <section class="py-16 px-4">
        <div class="max-w-2xl mx-auto shadow p-10 rounded-lg mb-10">
            <h1 class="mb-8 text-2xl font-medium">Profile {{ Auth::user()->name }}</h1>
            @include('dashboard.partials.message')
            <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="slug" value="{{ $user->slug }}">
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <div class="relative">
                            <input type="text" id="name" name="name"
                                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:ring-violet-500 focus:outline-none focus:border-violet-600 peer @error('name') !border-red-600 @enderror"
                                autocomplete="off" placeholder=" " required value="{{ $user->name }}"><label
                                for="name"
                                class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white  px-2 peer-focus:px-2 peer-focus:text-violet-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1 capitalize @error('name') !text-red-600 @enderror">name</label>
                        </div>
                        @error('name')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <div class="relative">
                            <input type="text" id="username" name="username"
                                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:ring-violet-500 focus:outline-none focus:border-violet-600 peer @error('username') !border-red-600 @enderror"
                                autocomplete="off" placeholder=" " required value="{{ $user->username }}"><label
                                for="username"
                                class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white  px-2 peer-focus:px-2 peer-focus:text-violet-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1 capitalize @error('username') !text-red-600 @enderror">username</label>
                        </div>
                        @error('username')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <div class="relative">
                            <input type="text" id="email" name="email"
                                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:ring-violet-500 focus:outline-none focus:border-violet-600 peer @error('email') !border-red-600 @enderror"
                                autocomplete="off" placeholder=" " required value="{{ $user->email }}"><label
                                for="email"
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
                                autocomplete="off" placeholder=" " required value="{{ $user->whatsapp }}"><label
                                for="whatsapp"
                                class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white  px-2 peer-focus:px-2 peer-focus:text-violet-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1 capitalize @error('whatsapp') !text-red-600 @enderror">whatsapp</label>
                        </div>
                        @error('whatsapp')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="mt-6">
                    @if ($user->image)
                        <img src="{{ asset('storage/' . $user->image) }}" class="w-40 mb-2 img-preview" alt="">
                    @else
                        <img class="w-40 img-preview" alt="">
                    @endif
                    <input class="" id="image" name="image" type="file"
                        accept="image/png, image/jpg, image/jpeg">
                    <p class="mt-1.5 text-xs text-gray-400">
                        PNG, JPG or JEPG (MAX. 1024kb/1mb).</p>
                    @error('image')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-6">
                    <div class="relative">
                        <textarea rows="4" id="alamat" name="alamat"
                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:ring-violet-500 focus:outline-none focus:border-violet-600 peer @error('alamat') !border-red-600 @enderror"
                            autocomplete="off" placeholder=" " required value="{{ old('alamat') }}">{{ old('alamat') ? old('alamat') : $user->alamat }}</textarea>
                        <label for="alamat"
                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white  px-2 peer-focus:px-2 peer-focus:text-violet-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-6 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1 capitalize @error('alamat') !text-red-600 @enderror">Alamat</label>
                    </div>
                    @error('alamat')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center justify-end gap-4 mt-4">
                    <button type="submit"
                        class="px-4 py-2.5 bg-gradient-to-b from-violet-500 to-violet-600 text-white rounded-lg shadow-lg shadow-violet-600/30 mt-4 hover:scale-105 duration-500">Update
                        profile</button>
                </div>
            </form>
        </div>

        <div class="max-w-2xl mx-auto shadow p-10 rounded-lg">
            <div class="mb-8 ">
                <h1 class="text-2xl font-medium">Hapus akun</h1>
                <p class="mt-2 text-sm text-gray-400">Menghapus akun akan membuat semua data Anda akan dihapus permanen</p>
            </div>
            <button class="bg-red-600 py-2.5 text-white px-10 rounded-lg btnHapusAKun" data-modal-target="hapus-modal"
                data-modal-toggle="hapus-modal">Hapus</button>
        </div>
    </section>

    <div id="hapus-modal" tabindex="-1"
        class="fixed top-0 left-0 right-0 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full bg-black bg-opacity-60 z-[999]">
        <div class="relative w-full h-full max-w-md md:h-auto">
            <div class="relative bg-white rounded-lg shadow">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center =="
                    data-modal-hide="hapus-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <form action="{{ route('hapus.akun', $user->slug) }}" method="POST">
									@csrf
                    <div class="p-6">
                        <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="mb-2 text-sm text-gray-500 mt-5">Silahkan masukkan password </h3>
                        <div class="relative"><input type="password" id="password" name="password"
                                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:ring-violet-500 focus:outline-none focus:border-violet-600 peer @error('password') !border-red-600 @enderror"
                                autocomplete="off" placeholder=" " required value="{{ old('password') }}"><label
                                for="password"
                                class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white  px-2 peer-focus:px-2 peer-focus:text-violet-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1 @error('password') !text-red-600 @enderror">Password</label>
                        </div>
                        @error('password')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="text-end p-6 pt-0">
                        <button type="submit"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-30 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            Hapus akun
                        </button>
                        <button data-modal-hide="hapus-modal" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
