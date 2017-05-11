{{-- /resources/views/allShops.blade.php --}}
@extends('master')

@section('title')
    List of Shops
@endsection

@section('content')
    <h1>All the shops</h1>

    @foreach($shops as $shop)
        <a href="/shops/{{ $shop->id }}" alt="{{ $shop->name }} Profile">{{ $shop->name }}</a>
        <br/>
    @endforeach

@endsection