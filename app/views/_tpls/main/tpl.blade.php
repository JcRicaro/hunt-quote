<!DOCTYPE html>
<html>
<head>
	<title>HuntQuote - @yield('title')</title>
	<meta charset="utf-8">
	@yield('meta')

	<link href="http://fonts.googleapis.com/css?family=Ruda" rel="stylesheet">
	{{ HTML::style('vendor/bootstrap/dist/css/bootstrap.min.css') }}
	{{ HTML::style('assets/css/stylesheet.css') }}
	@yield('styles')
</head>
<body>
	@include('_tpls.main._.nav')
	@include('_tpls.main._.breadcrumbs')

	<div class="wrap">
		<div class="container">
			@yield('content')
		</div>
	</div>

	@include('_tpls.main._.footer')

	{{ HTML::script('vendor/jquery/dist/jquery.min.js') }}
	{{ HTML::script('vendor/bootstrap/dist/js/bootstrap.min.js') }}
	{{ HTML::script('assets/js/script.js') }}
	@yield('scripts')
</body>
</html>