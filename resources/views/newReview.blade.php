{{-- /resources/views/newReview.blade.php --}}
@extends('master')

@section('title')
    Add a New Review
@endsection

@section('content')
    <h1>Add a New Review</h1>

    <form method='POST' action='/reviews/edit'>
        {{ csrf_field() }}

        <input type="hidden" name="shop_id" value="{{ $shop->id }}">
        
        <label for="oneStar">
        <input type="radio" name="stars" value="1" id="oneStar">
                &#9733;&#9734;&#9734;&#9734;&#9734;</label><br/>
        <label for="twoStars">
        <input type="radio" name="stars" value="2" id="twoStars">
                &#9733;&#9733;&#9734;&#9734;&#9734;</label><br/>
        <label for="threeStars">
        <input type="radio" name="stars" value="3" id="threeStars">
                &#9733;&#9733;&#9733;&#9734;&#9734;</label><br/>
        <label for="fourStars">
        <input type="radio" name="stars" value="4" id="fourStars">
                &#9733;&#9733;&#9733;&#9733;&#9734;</label><br/>
        <label for="fiveStars">
        <input type="radio" name="stars" value="5" id="fiveStars">
                &#9733;&#9733;&#9733;&#9733;&#9733;</label><br/>
        
        <label for="text">Your review</label>
        <input type="text" name="text" id="text" value="{{ old('text') }}">
        <input type="submit" value="Submit review">
    </form>
    
    @if(count($errors) > 0)
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	@endif

@endsection