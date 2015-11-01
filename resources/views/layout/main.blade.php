<!DOCTYPE html>
<html>
	<head>
		<!--Import Google Icon Font-->
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="{{ url('/css/materialize.min.css') }}" media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="{{ url('/css/main.css') }}"/>

		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui, minimum-scale=1.0, maximum-scale=1.0, user-scalable=yes">


		<title>
			@if (!isset($title))
				{{ "Главная страница | Математический Факультет" }}
			@else
				{{ $title . " | Математический Факультет" }}
			@endif
		</title>
		<!--RenderSection("head", required: false)-->
	</head>

	<body>

		@include('partials.topMenu')

		<main>
			@yield("content")
		</main>

		@include('partials.footer')

		<script type="text/javascript" src="{{ url("js/jquery-2.1.4.min.js") }}"></script>
		<script type="text/javascript" src="{{ url("js/ie_fix.js") }}"></script>

		<script type="text/javascript" src="{{ url("js/materialize.min.js") }}"></script>
		<script type="text/javascript" src="{{ url("js/Cookie.js") }}"></script>
		<script type="text/javascript" src="{{ url("js/Init.js") }}"></script>
	</body>
</html>

