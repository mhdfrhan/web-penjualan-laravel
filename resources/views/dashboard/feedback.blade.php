@extends('dashboard.layouts.master')



@section('container')

<p class="text-sm text-gray-400 mb-4">Klik tombol ceklis untuk mengupload feedback ke halaman utama dan <span class="text-red-600 font-medium">tombol hapus untuk menghapus feedback</span>, <span class="text-red-600 font-medium">bukan menghapus feedback di halaman utama</span>, jika ingin menghapus feedback di halaman utama ada <a href="{{ route('frontpage') }}" class="font-medium text-violet-600">disini</a></p>

    @include('dashboard.partials.message')

    <div class="grid lg:grid-cols-2 2xl:grid-cols-3 gap-4">

        @foreach ($feedback as $f)

            <div class="bg-white rounded-lg p-5 shadow-lg shadow-gray-200">

                <div class="flex items-center justify-between text-sm text-gray-500">

                    <span class="block text-violet-600">

                        {{ $f->name }}

                    </span>

                    <p>{{ $f->created_at }}</p>

                </div>

                <span class="mt-3 block  text-sm">

                    {{ $f->feedback }}

                </span>

                <div class="mt-4 text-end flex items-center justify-end gap-x-3">

                    <form action="{{ route('feedback.hapus', $f->id) }}" method="POST">

                        @csrf

                        <button

                            class="w-10 h-10 flex justify-center items-center bg-red-600 shadow-lg rounded-lg shadow-red-600/30 text-white"><svg

                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"

                                stroke="currentColor" class="w-5 h-5">

                                <path stroke-linecap="round" stroke-linejoin="round"

                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />

                            </svg>

                        </button>

                    </form>

                    @if ($f->posted == 0)

                        <form action="{{ route('post.feedback', $f->id) }}" method="POST">

                            @csrf

                            <button

                                class="w-10 h-10 flex justify-center items-center bg-violet-600 shadow-lg rounded-lg shadow-violet-600/30 text-white">

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"

                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">

                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />

                                </svg>

                            </button>

                        </form>

                    @endif

                </div>

            </div>

        @endforeach



    </div>

    @if (count($feedback))

    @else<div class="p-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50 text-center" role="alert"><span

                class="font-medium">Tidak ada feedback!</span></div>

    @endif

@endsection

