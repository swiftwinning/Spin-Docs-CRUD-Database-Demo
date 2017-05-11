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
        <h1>SpinDocs</h1>
        
        <!-- Placeholder to use for template for SpinDocs logo
        
        <img
        src='http://making-the-internet.s3.amazonaws.com/laravel-foobooks-logo@2x.png'
        style='width:300px'
        alt='Foobooks Logo'>
        -->
    </header>

    <section>
        @yield('content')
    </section>

    <footer>
        &copy; {{ date('Y') }}
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    @stack('body')

</body>
</html>