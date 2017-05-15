{{-- /resources/views/editShop.blade.php --}}
@extends('master')

@section('title')
    Edit {{ $shop->name }} Profile
@endsection

@section('content')
    <h1>Edit {{ $shop->name }}'s Profile</h1>

    <form method='POST' action='/shops/edit'>
        {{ csrf_field() }}
        
        <input type='hidden' name='id' value='{{$shop->id}}'>
        <label for="new">
        <input type="checkbox" name="tags[]" value="1" id="new"
                @if(in_array(1, $tagIndexes)){{"CHECKED"}}@endif>New</label>
        <label for="used">
        <input type="checkbox" name="tags[]" value="2" id="used"
                @if(in_array(2, $tagIndexes)){{"CHECKED"}}@endif>Used</label>
        <label for="cds">
        <input type="checkbox" name="tags[]" value="3" id="cds"
                @if(in_array(3, $tagIndexes)){{"CHECKED"}}@endif>CDs</label>
        <label for="records">
        <input type="checkbox" name="tags[]" value="4" id="records"
                @if(in_array(4, $tagIndexes)){{"CHECKED"}}@endif>Records</label>
        <label for="tapes">
        <input type="checkbox" name="tags[]" value="5" id="tapes"
                @if(in_array(5, $tagIndexes)){{"CHECKED"}}@endif>Tapes</label>
        <br/>

        <label for='name'>Name</label>
        <input type='text' name='name' id='name' value='{{ old('name', $shop->name) }}'>
        <br/>
        <label for='address'>Address</label>
        <input type='text' name='address' id='address' value='{{ old('address', $shop->address) }}'>
        <br/>
        <label for='city'>City</label>
        <input type='text' name='city' id='city' value='{{ old('city', $shop->city) }}'>
        <br/>
        
        <label for='state'>State</label>
        <select name="state">
            @foreach($states as $state)
                <option value="{{$state}}" {{ ($shop->state == $state) ? "SELECTED" : ""}}>{{$state}}</option>
            @endforeach
        </select>
        <br/>
        
        <label for='zip'>Zip</label>
        <input type='text' name='zip' id='zip' value='{{ old('zip', $shop->zip) }}'>
        <br/>
        <label for='phone'>Phone</label>
        <input type='text' name='phone' id='phone' value='{{ old('phone', $shop->phone) }}'>
        <br/>
        <label for='web_link'>Website</label>
        <input type='text' name='web_link' id='web_link' value='{{ old('web_link', $shop->web_link) }}'>
        <br/>
        *All fields are required
        <br/>
        <input type='submit' value='Save changes'>
    </form>
    <br/>
	    <a class="delete" href="/delete/{{$shop->id}}" alt="">Delete this profile</a>
    
    @if(count($errors) > 0)
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	@endif

@endsection