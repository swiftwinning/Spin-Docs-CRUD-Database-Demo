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
        <img src='/images/record-player.svg' style='width:300px' alt='Record Player Logo'>
        <h1>SpinDocs</h1>
        <div class="links">
            <a href="/" alt="SpinDocs home">Home</a>
			<a href="/shops/" alt="Browse record shops">Browse record shops</a>
            <a href="/shops/new" alt="Add a new shop">Add a new shop</a>
        </div>
        
       
    </header>

    <section>
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