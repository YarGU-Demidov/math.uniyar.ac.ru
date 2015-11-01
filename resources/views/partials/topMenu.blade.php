<div class="top-line blue-grey darken-2">
</div>
<nav class="blue-grey darken-1" role="navigation">
	<div class="nav-wrapper container">
		<a id="logo-container" href="{{ url('main') }}" class="brand-logo">Матфак</a>
		<ul class="right hide-on-med-and-down">
			@foreach ($menu as $data)
				<li><a href="#">{!! $data  !!} </a></li>
			@endforeach
		</ul>

		<ul id="nav-mobile" class="side-nav">
			<li><a href="#">HEY</a></li>
		</ul>
		<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
	</div>
</nav>