<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>{{ config('app.name', 'Laravel') }}</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
</head>
<body>

<header>
	<div class="col-lg-8 col-md-10 mx-auto">
		<div class="site-heading">
			<h1>{{ config('app.name', 'Laravel') }}</h1>
		</div>
	</div>
</header>

<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
	<div class="container">
		<div class="collapse navbar-collapse" id="menu-list">
			<menu-list></menu-list>
			<ul class="navbar-nav" >
				@if (Route::has('login'))
					@auth
						<li class="nav-item">
							@if(Auth::user()->hasRole('Admin'))
								<a clas='nav-link' href='/admin/login'>Admin</a>
							@else
								<a class="nav-link" href="/profile">User Profile</a>
							@endif
						</li>
						<li class="nav-item">
							<form method="POST" action="{{ route('logout') }}">
								@csrf
								<button class="btn btn-danger w-10" type="submit">Logout</button>
							</form>
						</li>
					@else
						<li class="nav-item">
							<a class="nav-link" href="{{ route('login') }}">Login</a>
						</li>

						<li class="nav-item">
							@if (Route::has('register'))
								<a class="nav-link" href="{{ route('register') }}">Register</a>
							@endif
						</li>
						@endauth
						@endif
						</li>
			</ul>
		</div>
	</div>
</nav>

<div class="container">
	<div class="row">
		<div id="content" class="col-lg-8 col-md-10 mx-auto">
			<router-view class="view"></router-view>
			@yield('content')
		</div>
	</div>
</div>
<hr>
<footer>
	<div class="container text-center newsletters">
		<form method="post" action="{{ route('newsletters.new') }}" novalidate>
			{{ csrf_field() }}

			@if(session()->has('success_message'))
				<div class="alert alert-success">
					{{ session()->get('success_message') }}
				</div>
			@elseif(session()->has('error_message') && session()->get('error_message') != '')
				<div class="alert alert-danger">
					{{ session()->get('error_message') }}
				</div>
			@endif

			<div class="input-group">
				<input type="email" class="form-control" placeholder="Enter your email" name="email" required data-validation-required-message="Please enter your email.">
				<input type="submit" class="btn btn-primary" value="Subscribe">
				<p class="help-block text-danger">{{ $errors->first('email') }}</p>
			</div>
		</form>
	</div>
</footer>
<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
