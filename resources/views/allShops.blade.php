{{-- /resources/views/allShops.blade.php --}}
@extends('master')

@section('title')
    List of Shops
@endsection

@section('content')
    <h1>All the shops</h1>

    <a href="/shops/new" alt="Add a new shop"><h2>Add a new shop</h2></a>
    <br/>

    @foreach($shops as $shop)
        <a href="/shops/{{ $shop->id }}" alt="{{ $shop->name }} Profile">{{ $shop->name }}</a>
        <br/>
    @endforeach

@endsection