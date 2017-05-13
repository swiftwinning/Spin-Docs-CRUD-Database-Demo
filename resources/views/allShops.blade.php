{{-- /resources/views/allShops.blade.php --}}
@extends('master')

@section('title')
    List of Shops
@endsection

@section('content')
    @foreach($shops as $shop)
        <a href="/shops/{{ $shop->id }}" alt="{{ $shop->name }} Profile">{{ $shop->name }}</a>
        <br/>
    @endforeach

@endsection