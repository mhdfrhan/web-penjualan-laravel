@include('layouts.head')

<section class="py-20 px-4">
    <div class="max-w-md mx-auto py-8 px-8 shadow rounded-xl">
        <div class="flex justify-center">
            <div class="bg-violet-300 p-3 rounded-full">
                <img src="/icon/key.svg" class="w-8 h-auto mx-auto" alt="">
            </div>
        </div>
        <div class="text-center mt-4">
            <h1 class="text-xl md:text-2xl font-medium">Atur password baru</h1>
            <p class="text-[13px] text-gray-400 mt-2">Password Anda harus berbeda dengan password sebelumnya.
            </p>
        </div>
        <div class="mt-8">
            @if (session('status'))
                <div id="alert-3"
                    class="flex p-4 mb-4 text-green-800 rounded-lg bg-green-50"
                    role="alert"><span class="sr-only">Info</span>
                    <div class="text-sm font-medium">{{ session('status') }}</div><button type="button"
                        class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8"
                        data-dismiss-target="#alert-3" aria-label="Close"><span class="sr-only">Close</span><svg
                            aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg></button>
                </div>
            @endif
            <form action="{{ route('password.update') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="relative">
                    <input type="email" id="email" name="email"
                        class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-violet-600 peer @error('email') !border-red-600 @enderror"
                        autocomplete="off" placeholder=" " required value="{{ $email ?? old('email') }}"><label for="email"
                        class="absolute text-[13px] text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-violet-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1 @error('email') !text-red-600 @enderror">Email Anda</label>
                </div>
                @error('email')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
                <div class="relative mt-4">
                    <input type="password" id="password" name="password"
                        class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-violet-600 peer @error('password') !border-red-600 @enderror"
                        autocomplete="off" placeholder=" " required value="{{ old('password') }}"><label for="password"
                        class="absolute text-[13px] text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-violet-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1 @error('password') !text-red-600 @enderror">Password
                        baru</label>
                </div>
                <span class="block text-[13px] mt-1 text-gray-400">Password harus terdiri minimal 5 karakter</span>
                @error('password')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
                <div class="relative mt-4">
                    <input type="password" id="password-confirm" name="password_confirmation"
                        class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-violet-600 peer @error('password') !border-red-600 @enderror"
                        autocomplete="off" placeholder=" " required value="{{ old('password') }}">
                    <label for="password-confirm"
                        class="absolute text-[13px] text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-violet-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1 @error('password') !text-red-600 @enderror">Ulangi
                        Password</label>
                </div>
                @error('password')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
                <div class="mt-5">
                    <button type="submit" class="w-full bg-violet-600 text-white py-2.5 rounded-lg">Reset
                        password</button>
                </div>
            </form>
        </div>
    </div>

    <div class="flex items-center justify-center mt-8">
        <a href="/login" class="flex items-center gap-x-2 text-gray-500 font-medium">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75" />
            </svg>
            <span class="text-[15px]">Back to log in</span>
        </a>
    </div>

</section>

@include('layouts.footer')
