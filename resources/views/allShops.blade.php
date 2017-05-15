{{-- /resources/views/allShops.blade.php --}}
@extends('master')

@section('title')
    List of Shops
@endsection

@section('content')
    <h1>Browse Shops</h1>
    @foreach($shops as $shop)
        <a href="/shops/{{ $shop->id }}">{{ $shop->name }}</a>
        <br/>
    @endforeach

@endsection