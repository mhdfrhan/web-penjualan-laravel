@extends('guest.layouts.master')

@section('container')
    <form action="/logout" method="POST">
        @csrf
        <button type="submit"
            class="block w-full py-2 px-4 text-sm text-gray-800 hover:bg-gray-100 text-left">Logout</button>
    </form>
@endsection
