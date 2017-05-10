{{-- /resources/views/editShop.blade.php --}}
@extends('master')

@section('title')
    Edit {{ $shop->name }} Profile
@endsection

@section('content')
    <h1>Edit {{ $shop->name }}'s Profile</h1>

    <form method='POST' action='/shops/edit'>
        {{ csrf_field() }}

        <label for='name'>Name</label>
        <input type='text' name='name' id='name' value='{{ old('name') }}'>
        <br/>
        <label for='address'>Address</label>
        <input type='text' name='address' id='address' value='{{ old('address') }}'>
        <br/>
        <label for='city'>City</label>
        <input type='text' name='city' id='city' value='{{ old('city') }}'>
        <br/>
        <label for='state'>State</label>
        <input type='text' name='state' id='state' value='{{ old('state') }}'>
        <br/>
        <label for='zip'>Zip</label>
        <input type='text' name='zip' id='zip' value='{{ old('zip') }}'>
        <br/>
        <label for='phone'>Phone</label>
        <input type='text' name='phone' id='phone' value='{{ old('phone') }}'>
        <br/>
        <label for='web_link'>Website</label>
        <input type='text' name='web_link' id='web_link' value='{{ old('web_link') }}'>
        <br/>
        <input type='submit' value='Save changes'>
    </form>
    
    @if(count($errors) > 0)
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	@endif

@endsection