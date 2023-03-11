@extends('guest.layouts.master')

@section('container')
    <ul>
        @foreach ($categories as $c)
				<li><a href="/categories/{{ $c->slug }}">{{ $c->name }}</a></li>
        @endforeach
    </ul>
@endsection
