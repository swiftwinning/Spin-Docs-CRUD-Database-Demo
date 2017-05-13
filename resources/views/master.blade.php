<!DOCTYPE html>
<html>
<head>
    <title>
        @yield('title', 'SpinDocs')
    </title>

    <meta charset='utf-8'>
    <link href="/css/spindocs.css" type='text/css' rel='stylesheet'>

    @stack('head')

</head>
<body>

    @if(Session::get('message') != null)
		<div class='message'>{{ Session::get('message') }}</div>
	@endif
	
    <header>
        <!-- http://www.flaticon.com/free-icon/record-player_31487#term=record player&page=1&position=38 -->
        <img src='/images/record-player.svg' style='height:150px' alt='Record Player Icon'>
        <img src='/images/spindocsLogo.svg' style='height:150px' alt='SpinDocs Logo'>
        <div class="links">
            <a href="/" alt="SpinDocs home" 
                    class="{{(Request::path() == '/') ? 'active' : '' }}">Home</a>
			<a href="/shops/" alt="Browse record shops" 
			        class="{{(Request::path() == 'shops') ? 'active' : '' }}">Browse record shops</a>
            <a href="/shops/new" alt="Add a new shop" 
			        class="{{(Request::path() == 'shops/new') ? 'active' : '' }}">Add a new shop</a>
        </div>
        
       
    </header>

    <section class="content">
        @yield('content')
    </section>

    <footer>
        &copy; {{ date('Y') }}
    </footer>
    
    <div>Record player icon made by <a href="http://www.freepik.com" title="Freepik">Freepik</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    @stack('body')

</body>
</html>