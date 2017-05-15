{{-- /resources/views/delete.blade.php --}}
@extends('master')

@section('title')
    Delete Shop Profile
@endsection

@section('content')
    <h1>Delete {{ $shop->name }} Profile</h1>

    <p>Are you sure you want to delete {{ $shop->name }} permanently?</p>
    
    <form method='POST' action='/delete'>
        {{ csrf_field() }}
        <input type='hidden' name='id' value='{{$shop->id}}'>
        <input type='submit' value='Delete {{ $shop->name }}'>
    </form>
    <a href="/shops/{{$shop->id}}">Back</a>

@endsection