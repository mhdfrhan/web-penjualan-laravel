@include('layouts.head')

<section class="py-20 px-4">
    <div class="max-w-md mx-auto py-14 px-8 shadow rounded-xl">
        @if (session('resent'))
            <div id="alert-3"
                class="flex p-4 mb-6 text-green-800 rounded-lg bg-green-50"
                role="alert"><span class="sr-only">Info</span>
                <div class="text-[13px] font-medium">Tautan baru telah kami kirimkan ke email Anda.</div><button
                    type="button"
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
        <div class="text-center">
            <h1 class="text-xl md:text-2xl font-medium">Verifikasi akun Anda</h1>
            <p class="text-[13px] text-gray-400 mt-2">Kami telah mengirimkan tautan aktivasi akun ke alamat email yang
                Anda berikan</p>
        </div>
        <div class="flex justify-center my-6">
            <div
                class="relative before:absolute before:z-0 before:bg-gray-100/70 before:top-1/2 before:-translate-y-1/2 before:left-1/2 before:-translate-x-1/2 before:rounded-xl before:w-20 before:h-20 inline-block">
                <lottie-player class="mx-auto" src="/icon/mail.json" background="transparent" speed="1"
                    style="width: 100px; height: 100px;" loop autoplay></lottie-player>
            </div>
        </div>
        <div>
            <form action="{{ route('verification.resend') }}" method="POST" class="inline">
							@csrf
                <div class="flex justify-center">
                    <button type="submit" class="text-violet-600 text-[13px] font-medium hover:border-b hover:border-b-violet-600">Tidak menerima email?
                        Kirim lagi</button>
                </div>
            </form>
        </div>
    </div>
</section>


@section('script')
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
@endsection

@include('layouts.footer')
