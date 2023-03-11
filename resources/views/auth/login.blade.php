@include('layouts.head')

<section class="bg-white pb-16 lg:pb-0">
    <div class="flex flex-wrap items-center px-5 lg:px-0">
        <div class="w-full lg:w-1/2 order-2 lg:order-1 mt-10 lg:mt-0">
            <div class="max-w-sm mx-auto bg-white">
                <h1 class="text-2xl font-semibold text-gray-800 mb-2 textce">Hi, Selamat Datang kembali 👋</h1>
                <p class="text-sm text-gray-400">Silahkan masukkan username dan password terlebih dahulu</p>
                <div class="mt-8">
                    @include('dashboard.partials.message')
                    @if (session()->has('loginError'))
                        <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium">{{ session('loginError') }}</span>
                            </div>
                        </div>
                    @endif
                    <form action="/login" method="POST">
                        @csrf
                        <div class="input-wrapper">
                            <input type="text" id="username" name="username"
                                class="form-input peer @error('username') !border-red-600
                                
                            @enderror"
                                placeholder=" " value="{{ old('username') }}" autocomplete="off" />
                            <label for="username"
                                class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-90 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-violet-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-95 peer-focus:-translate-y-6">Username</label>
                            @error('username')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-wrapper">
                            <input type="password" id="password" name="password" class="form-input peer"
                                placeholder=" " />
                            <label for="password"
                                class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-90 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-violet-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-95 peer-focus:-translate-y-6">Password</label>
                        </div>
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center">
                                <input id="remember" name="remember" type="checkbox" value=""
                                    class="w-4 h-4 text-violet-600 bg-gray-100 border-gray-300 rounded focus:ring-violet-500 focus:ring-2">
                                <label for="remember"
                                    class="ml-2 text-sm text-gray-500 hover:text-gray-800 cursor-pointer select-none">Ingat
                                    saya</label>
                            </div>
                            <div>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}"
                                        class="text-sm text-red-600 font-medium hover:underline">Lupa
                                        password?
                                    </a>
                                @endif
                            </div>
                        </div>
                        <button
                            class="w-full bg-gradient-to-b from-violet-500 to-violet-600 p-3 text-white rounded-lg hover:from-violet-600 hover:to-violet-700 duration-200"
                            type="submit">
                            Masuk
                        </button>
                    </form>
                    <p class="mt-3 text-sm text-gray-400 text-center">Belum memiliki akun? <a href="/register"
                            class="text-violet-600 font-medium hover:underline">daftar</a> sekarang</p>
                </div>
            </div>
        </div>
        <div class="w-full lg:w-1/2 order-1 lg:order-2">
            <img src="/img/login.jpg" class="object-cover" alt="">
        </div>
    </div>
</section>

@include('layouts.footer')
