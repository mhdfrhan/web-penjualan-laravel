@extends('dashboard.layouts.master')

@section('container')
    <section class="max-w-2xl rounded-lg p-6"> @include('dashboard.partials.message') <form action="{{ route('user.update') }}"
            method="POST" enctype="multipart/form-data"> @csrf <input type="hidden" name="slug" value="{{ $user->slug }}">
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <div class="relative"> <input type="text" id="name" name="name"
                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:ring-violet-500 focus:outline-none focus:border-violet-600 peer @error('name') !border-red-600 @enderror"
                            autocomplete="off" placeholder=" " required value="{{ $user->name }}"><label for="name"
                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-violet-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1 capitalize @error('name') !text-red-600 @enderror">name</label>
                    </div>
                    @error('name')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <div class="relative"> <input type="text" id="username" name="username"
                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:ring-violet-500 focus:outline-none focus:border-violet-600 peer @error('username') !border-red-600 @enderror"
                            autocomplete="off" placeholder=" " required value="{{ $user->username }}"><label for="username"
                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-violet-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1 capitalize @error('username') !text-red-600 @enderror">username</label>
                    </div>
                    @error('username')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <div class="relative"> <input type="text" id="email" name="email"
                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:ring-violet-500 focus:outline-none focus:border-violet-600 peer @error('email') !border-red-600 @enderror"
                            autocomplete="off" placeholder=" " required value="{{ $user->email }}"><label for="email"
                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-violet-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1 capitalize @error('email') !text-red-600 @enderror">email</label>
                    </div>
                    @error('email')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <div class="relative"> <input type="text" id="whatsapp" name="whatsapp"
                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:ring-violet-500 focus:outline-none focus:border-violet-600 peer @error('whatsapp') !border-red-600 @enderror"
                            autocomplete="off" placeholder=" " required value="{{ $user->whatsapp }}"><label for="whatsapp"
                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-violet-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1 capitalize @error('whatsapp') !text-red-600 @enderror">whatsapp</label>
                    </div>
                    @error('whatsapp')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="mt-6">
                @if ($user->image)
                    <img src="{{ asset('img/user/' . $user->image) }}" class="w-40 mb-2 img-preview" alt="">
                @else
                    <img class="w-40 img-preview" alt="">
                @endif <input class="" id="image" name="image" type="file"
                    accept="image/png, image/jpg, image/jpeg">
                <p class="mt-1.5 text-xs text-gray-400"> PNG, JPG or JEPG (MAX. 1024kb/1mb).</p>
                @error('image')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-6">
                <div class="relative">
                    <textarea rows="4" id="alamat" name="alamat"
                        class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:ring-violet-500 focus:outline-none focus:border-violet-600 peer @error('alamat') !border-red-600 @enderror"
                        autocomplete="off" placeholder=" " required value="{{ old('alamat') }}">{{ old('alamat') ? old('alamat') : $user->alamat }}</textarea> <label for="alamat"
                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-violet-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-6 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1 capitalize @error('alamat') !text-red-600 @enderror">Alamat</label>
                </div>
                @error('alamat')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex items-center justify-end gap-4 mt-4"> 
							<a href="{{ url()->previous() }}" type="button"
                    class="px-6 py-2.5 bg-gradient-to-b from-red-500 to-red-600 text-white rounded-lg shadow-md shadow-red-600/30 mt-4 hover:scale-105 duration-500">Kembali</a>
                <button type="submit"
                    class="px-4 py-2.5 bg-gradient-to-b from-violet-500 to-violet-600 text-white rounded-lg shadow-lg shadow-violet-600/30 mt-4 hover:scale-105 duration-500">Update</button>
            </div>
        </form>
    </section>
@endsection
