@include('layouts.head')

<section class="pb-16 lg:pb-0">
    <div class="flex flex-wrap items-center">
        <div class="w-full lg:w-1/2 order-2 lg:order-1 mt-10 lg:mt-0 container mx-auto px-4">
            <div class="lg:max-w-sm mx-auto">
                <h1 class="text-2xl font-semibold text-gray-800 mb-2 textce">Buat akun baru</h1>
                <p class="text-sm text-gray-400 textce">Silahkan daftarkan akun Anda terlebih dahulu</p>
                <div class="mt-8">
                    <form action="/register" method="POST">
                        @csrf
                        <div class="input-wrapper">
                            <input type="text" id="name" name="name"
                                class="form-input peer @error('name')
                                    !border-red-600
                                @enderror"
                                placeholder=" "  value="{{ old('name') }}" autocomplete="off" />
                            <label for="name"
                                class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-90 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-violet-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-95 peer-focus:-translate-y-6">Nama
                                lengkap</label>
                            @error('name')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-wrapper">
                            <input type="text" id="username" name="username"
                                class="form-input peer @error('username')
                            !border-red-600
                        @enderror"
                                placeholder=" " required value="{{ old('username') }}" autocomplete="off" />
                            <label for="username"
                                class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-90 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-violet-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-95 peer-focus:-translate-y-6">Username</label>
                            @error('username')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-wrapper">
                            <input type="email" id="email" name="email"
                                class="form-input peer @error('email')
                            !border-red-600
                        @enderror"
                                placeholder=" " required value="{{ old('email') }}" autocomplete="off" />
                            <label for="email"
                                class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-90 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-violet-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-95 peer-focus:-translate-y-6">Email</label>
                            @error('email')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-wrapper">
                            <input type="password" id="password" name="password"
                                class="form-input peer @error('password')
                            !border-red-600
                        @enderror"
                                placeholder=" " required />
                            <label for="password"
                                class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-90 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-violet-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-95 peer-focus:-translate-y-6">Password</label>
                                <span class="block text-[13px] mt-1 text-gray-400">Password harus terdiri minimal 5 karakter</span>
                            @error('password')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-wrapper">
                            <input type="password" id="confirmPass" name="confirmPass" class="form-input peer"
                                placeholder=" " required />
                            <label for="confirmPass"
                                class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-90 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-violet-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-95 peer-focus:-translate-y-6">Konfirmasi
                                password</label>
                            <span class="text-sm text-red-600 mt-1 block" id="confimPassMsg"></span>
                        </div>
                        <button
                            class="w-full bg-gradient-to-b from-violet-500 to-violet-600 p-3 text-white rounded-lg hover:from-violet-600 hover:to-violet-700 duration-200"
                            type="submit">
                            Daftar
                        </button>
                    </form>
                    <p class="mt-3 text-sm text-gray-400 text-center">Sudah memiliki akun? <a href="/login"
                            class="text-violet-600 font-medium hover:underline">login</a> sekarang</p>
                </div>
            </div>
        </div>
        <div class="w-full lg:w-1/2 order-1 lg:order-2">
            <img src="/img/register.jpg" class="object-cover lg:h-screen w-full" alt="">
        </div>
    </div>
</section>

@include('layouts.footer')
