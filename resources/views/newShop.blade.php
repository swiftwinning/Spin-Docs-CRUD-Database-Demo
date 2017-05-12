{{-- /resources/views/newShop.blade.php --}}
@extends('master')

@section('title')
    Add a New Shop
@endsection

@section('content')
    <h1>Add a New Shop</h1>

    <form method='POST' action='/shops/new'>
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
        <label for="new">
        <input type="checkbox" name="tags[]" value="New" id="new">New</label>
        <label for="used">
        <input type="checkbox" name="tags[]" value="Used" id="used">Used</label>
        <label for="cds">
        <input type="checkbox" name="tags[]" value="CDs" id="cds">CDs</label>
        <label for="Tapes">
        <input type="checkbox" name="tags[]" value="Records" id="records">Records</label>
        <label for="tapes">
        <input type="checkbox" name="tags[]" value="Tapes" id="tapes">Tapes</label>
        <br/>
        <input type='submit' value='Add shop'>
    </form>
    
    @if(count($errors) > 0)
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	@endif

@endsection