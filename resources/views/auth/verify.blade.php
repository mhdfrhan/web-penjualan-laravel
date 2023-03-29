<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" href="/img/favicon.png" type="image/x-icon">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css">

    <title>{{ config('app.name', 'Laravel') }} | Verifikasi</title>

</head>



<body>



    <section class="py-20 px-4">

        <div class="max-w-md mx-auto py-14 px-8 shadow rounded-xl">

            @if (session('resent'))
                <div id="alert-3" class="flex p-4 mb-6 text-green-800 rounded-lg bg-green-50" role="alert"><span
                        class="sr-only">Info</span>

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

            @include('dashboard.partials.message')



            <div class="text-center">

                <h1 class="text-xl md:text-2xl font-medium">Verifikasi akun Anda</h1>

                <p class="text-[13px] text-gray-400 mt-2">Kami telah mengirimkan tautan aktivasi akun email <span
                        id="email">{{ Auth::user()->email }}</span></p>

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

                        <button type="submit"
                            class="text-violet-600 text-[13px] font-medium border-b border-transparent hover:border-b hover:border-b-violet-600">Tidak

                            menerima email?

                            Kirim lagi</button>

                    </div>

                </form>

            </div>
            <div class="mt-6 text-center text-[13px] text-gray-400">
                <p>Apabila Anda salah memasukkan email, silakan perbarui email Anda dengan klik <button
                        data-modal-target="updateEmailModal" data-modal-toggle="updateEmailModal"
                        class="text-red-600 font-medium">di sini</button>.</p>
            </div>

            <!-- Main modal -->
            <div id="updateEmailModal" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full bg-black bg-opacity-80">
                <div class="relative w-full h-full max-w-md md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow">
                        <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                            data-modal-hide="updateEmailModal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium">Perbarui Email
                            </h3>
                            <form class="space-y-6" action="{{ route('update.email') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div>
                                    <input type="email" name="email" id="email"
                                        class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-violet-500 focus:border-violet-500 block w-full p-2.5 @error('email') !text-red-600 @enderror"
                                        placeholder="example@gmail.com" value="{{ old('email') }}" required>
                                    @error('email')
                                        <span class="text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <button type="submit"
                                        class="w-full text-white bg-violet-700 hover:bg-violet-800 focus:ring-4 focus:outline-none focus:ring-violet-300 rounded-lg text-sm px-5 py-2.5 text-center">Perbarui
                                        Email</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>





    @section('script')
        <script src="/js/lottie-player.js"></script>
    @endsection



    @include('layouts.footer')
