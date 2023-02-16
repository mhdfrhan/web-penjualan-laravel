@extends('guest.layouts.master')

@section('container')
    <section class="px-4 py-16">
        <div class="max-w-2xl mx-auto p-8 shadow">
					@include('dashboard.partials.message')
            <h1 class="capitalize text-2xl lg:text-3xl font-semibold mb-6">{{ $title }}</h1>
            <form action="{{ route('feedback.tambah') }}" method="POST">
                @csrf
                <div>
									<div class="relative">
											<input type="text" id="name" name="name"
													class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:ring-violet-500 focus:outline-none focus:border-violet-600 peer @error('name') !border-red-600 @enderror"
													autocomplete="off" placeholder=" " required value="{{ old('name') ? old('name') : Auth::user()->name }}"><label for="name"
													class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white  px-2 peer-focus:px-2 peer-focus:text-violet-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1 capitalize @error('name') !text-red-600 @enderror">name</label>
									</div>
									@error('name')
											<span class="text-sm text-red-600">{{ $message }}</span>
									@enderror
							</div>

								<div class="relative mt-6">
									<textarea rows="8" id="feedback" name="feedback"
											class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none focus:ring-violet-500 focus:outline-none focus:border-violet-600 peer @error('feedback') !border-red-600 @enderror"
											autocomplete="off" placeholder=" " required value="{{ old('feedback') }}">{{ old('feedback') }}</textarea>
									<label for="feedback"
											class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white  px-2 peer-focus:px-2 peer-focus:text-violet-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-6 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1 capitalize @error('feedback') !text-red-600 @enderror">feedback</label>
							</div>
							@error('feedback')
									<span class="text-sm text-red-600">{{ $message }}</span>
							@enderror

							<div class="text-end">
								<button type="submit"
                    class="px-4 py-2.5 bg-gradient-to-b from-violet-500 to-violet-600 text-white rounded-lg shadow-lg shadow-violet-600/30 mt-4 hover:scale-105 duration-500">Kirim masukan</button>
							</div>
            </form>
        </div>
    </section>
@endsection
