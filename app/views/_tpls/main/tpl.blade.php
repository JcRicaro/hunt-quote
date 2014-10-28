<!DOCTYPE html>
<html>
<head>
	<title> @yield('title') - HuntQuote </title>
	<meta charset="utf-8">
	<meta property="og:type" content="website" />
	<meta property="og:url" content="{{ Request::url() }}" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	@yield('meta')
	<!--
	<link href="http://fonts.googleapis.com/css?family=Ruda" rel="stylesheet">
	-->
	{{ HTML::style('vendor/bootstrap/dist/css/bootstrap.min.css') }}
	{{ HTML::style('assets/css/stylesheet.css') }}
	<link href="http://cf.shareasimage.com/static/app/css/publisher.css" type="text/css" rel="stylesheet" />
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
	<script type="text/javascript">

	</script>
	<div class="fb-root"></div>
	@yield('scripts')
</body>
</html>