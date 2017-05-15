{{-- /resources/views/newReview.blade.php --}}
@extends('master')

@section('title')
    Add a New Review
@endsection

@section('content')
    <h1>Add a New Review<br/>for {{ $shop->name }}</h1>

    <form method='POST' action='/reviews/edit'>
        {{ csrf_field() }}

        <input type="hidden" name="shop_id" value="{{ $shop->id }}">
        
        <label for="oneStar">
        <input type="radio" name="stars" value="1" id="oneStar"
                {{ (old('stars') == 1) ? "CHECKED" : ""}}>
                &#9733;&#9734;&#9734;&#9734;&#9734;</label><br/>
        <label for="twoStars">
        <input type="radio" name="stars" value="2" id="twoStars"
                {{ (old('stars') == 2) ? "CHECKED" : ""}}>
                &#9733;&#9733;&#9734;&#9734;&#9734;</label><br/>
        <label for="threeStars">
        <input type="radio" name="stars" value="3" id="threeStars"
                {{ (old('stars') == 3) ? "CHECKED" : ""}}>
                &#9733;&#9733;&#9733;&#9734;&#9734;</label><br/>
        <label for="fourStars">
        <input type="radio" name="stars" value="4" id="fourStars"
                {{ (old('stars') == 4) ? "CHECKED" : ""}}>
                &#9733;&#9733;&#9733;&#9733;&#9734;</label><br/>
        <label for="fiveStars">
        <input type="radio" name="stars" value="5" id="fiveStars"
                {{ (old('stars') == 5) ? "CHECKED" : ""}}>
                &#9733;&#9733;&#9733;&#9733;&#9733;</label><br/>
        
        <label for="text">Your review<br/>
        <textarea name="text" id="text" rows="5" cols="60" 
                autofocus>{{ old('text') }}</textarea></label>
        <br/>
        *All fields required
        <br/>
        <input type="submit" class="button" value="Submit review">
    </form>
    
    @if(count($errors) > 0)
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	@endif

@endsection