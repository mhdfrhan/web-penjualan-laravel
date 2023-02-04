@extends('guest.layouts.master')

@section('container')
    <form action="{{ route('page.logout') }}" method="POST">
			@csrf
        <button type="submit" class="bg-violet-600 text-white py-3 px-8 rounded-lg">logout</button>
    </form>

    <ul>
        @foreach ($barang as $b)
            <li>
                @if ($b->image)
                    <img src="{{ asset('storage/' . $b->image) }}" class="w-40" alt="">
                @else
                    <img src="/img/no-photo.png" class="w-40" alt="">
                @endif
            </li>
            <li>{{ $b->jenis_brg }}</li>
            <li>{{ $b->merk_brg }}</li>
            <li>{{ $b->stok_brg }}</li>
            <li>{{ $b->harga_brg }}</li>
        @endforeach
    </ul>
@endsection
