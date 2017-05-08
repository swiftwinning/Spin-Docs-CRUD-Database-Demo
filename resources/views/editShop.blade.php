{{-- /resources/views/editShop.blade.php --}}
@extends('master')

@section('title')
    Edit Shop Data
@endsection

@section('content')
    <h1>Edit Shop Data</h1>

    <form method='POST' action='/books/new'>
        {{ csrf_field() }}

        <label for='title'>Title</label>
        <input type='text' name='title' id='title' value='{{ old('title') }}'>
        <label for='publishedYear'>Published Year</label>
        <input type='text' name='publishedYear' id='publishedYear' value='{{ old('publishedYear') }}'>
        <input type='submit' value='Add book'>
    </form>
    
    @if(count($errors) > 0)
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	@endif

@endsection