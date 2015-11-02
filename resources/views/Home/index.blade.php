@extends('layout.main')

@section('content')
	<div class="parallax-container">
		<div class="section no-pad-bot">
			<div class="container">
				<br><br>
				<h1 class="header center blue-grey-text text-lighten-4">Математический факультет ЯрГУ</h1>
				<div class="row center">
					<h5 class="header col s12 light white-text">Slogan</h5>
				</div>
				<br><br>
				<div class="page-footer">
					<div class="row center">
						<a href="#" class="btn-large waves-effect waves-light light-blue lighten-1">Get Started</a>
						<a href="#" class="btn-large waves-effect waves-light light-blue darken-3 white-text">Get Started</a>
					</div>
				</div>
			</div>
		</div>
		<div class="parallax">
			<img src="{{ url("/images/pl1.jpg") }}" alt="7k">
			<div class="parallax-dark-cover"></div>
		</div>
	</div>

	<div class="container">
		<div class="section">

			<!-- Icon Section -->
			<div class="row">
				<div class="col s12 m4">
					<div class="icon-block">
						<h2 class="center brown-text"><i class="material-icons">flash_on</i>
						</h2>
						<h5 class="center">Speeds up development</h5>

						<p class="light">We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components. Additionally, we refined animations and transitions to provide a smoother experience for developers.</p>
					</div>
				</div>

				<div class="col s12 m4">
					<div class="icon-block">
						<h2 class="center brown-text"><i class="material-icons">group</i>
						</h2>
						<h5 class="center">SessionUser Experience Focused</h5>

						<p class="light">By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.</p>
					</div>
				</div>

				<div class="col s12 m4">
					<div class="icon-block">
						<h2 class="center brown-text"><i class="material-icons">settings</i>
						</h2>
						<h5 class="center">Easy to work with</h5>

						<p class="light">We have provided detailed documentation as well as specific code examples to help new users get started. We are also always open to feedback and can answer any questions a user may have about Materialize.</p>
					</div>
				</div>
			</div>

		</div>
	</div>


	<div class="parallax-container facNews">
		<div class="section no-pad-bot valign-wrapper">
			<h1 class="valign center-align blue-grey-text text-lighten-4">Новости</h1></div>
		<div class="parallax">
			<!--<img src="http://math.uniyar.ac.ru/math/system/files/1eAMk_TFS-c.jpg" alt="7k">-->
			<div class="parallax-dark-cover"></div>
		</div>
	</div>


	<div class="container">
		<div class="section">

			<div class="row">
				@foreach($news as $item)

					<div class="col s12 m12 l6">
						<div class="card">
							<div class="card-image">
								<div class="card-image-wrapper"><img src="{{ $item->image }}" alt=""></div>
								<span class="card-title">{{ $item->title }}</span>
							</div>
							<div class="card-content">
								{!! $item->announce !!}
							</div>
							<div class="card-action">
								<a href="#">This is a link</a>
							</div>
						</div>
					</div>

				@endforeach
			</div>

		</div>
	</div>
@endsection