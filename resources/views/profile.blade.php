{{-- /resources/views/profile.blade.php --}}
@extends('master')

@section('title')
    {{ $shop->name }} Profile
@endsection

@section('content')
    <span class="profile-header">{{ $shop->name }}</span>
    
    <a href="/shops/edit/{{$shop->id}}" class="edit-link">Edit {{ $shop->name }} profile</a>
    <br/>
    @foreach($shop->tags as $tag)
        {{ $tag->name }}
    @endforeach
    <div class="profile-info">
    {{ $shop->address }}<br/>
    {{ $shop->city }}, {{ $shop->state }} {{ $shop->zip }}<br/>
    {{ $shop->phone }}<br/>
    <a href="{{$shop->web_link}}" target="blank">{{$shop->web_link}}</a>
    </div>
	
	@foreach($reviews as $review)
	    <div class="review">
	        @for($i = 0; $i < $review->stars; $i++)
	            &#9733;
	        @endfor
	        @for($i = 0; $i < (5 - $review->stars); $i++)
	            &#9734;
	        @endfor
	        <br/>
	        {{ $review->text }}
	    </div>
	@endforeach
	<a href="/reviews/edit/{{$shop->id}}" class="reviewButton">Add a review</a>

@endsection