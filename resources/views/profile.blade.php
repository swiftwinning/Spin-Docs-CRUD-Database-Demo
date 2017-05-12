{{-- /resources/views/profile.blade.php --}}
@extends('master')

@section('title')
    {{ $shop->name }} Profile
@endsection

@section('content')
    <h1>{{ $shop->name }}</h1>

    <a href="/shops/edit/{{$shop->id}}">Edit {{ $shop->name }} profile</a>
    <div>
    {{ $shop->address }}<br/>
    {{ $shop->city }}, {{ $shop->state }} {{ $shop->zip }}<br/>
    {{ $shop->phone }}<br/>
    <a href="{{$shop->web_link}}" alt="{{$shop->name}} Website" target="blank">{{$shop->web_link}}</a>
    </div>
    
    @if(count($errors) > 0)
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	@endif
	
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
	<a href="/reviews/edit/{{$shop->id}}" alt="Add a review for {{$shop->name}}">Add a review</a>

@endsection