{{-- /resources/views/profile.blade.php --}}
@extends('master')

@section('title')
    {{ $shop->name }} Profile
@endsection

@section('content')
    <h1>{{ $shop->name }}</h1>

    <a href="/shops/edit/{{$shop->id}}">Edit {{ $shop->name }} profile</a>
    
    @if(count($errors) > 0)
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	@endif

@endsection