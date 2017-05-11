{{-- /resources/views/main.blade.php --}}
@extends('master')

@section('title')
    SpinDocs | Welcome
@endsection

@section('content')
    <a href="/shops/new" alt="Add a new shop"><h2>Add a new shop</h2></a>
    <br/>
    <a href="/shops/" alt="Browse Record Shops"><h2>Browse Record Shops</h2></a>
    <a></a>
    <p>Hey all!  Check out this great database of record stores.  Don't see your favorite?
    Then you can be the first to add your review.</p>
@endsection