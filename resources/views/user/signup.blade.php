<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600%7CUbuntu:300,400,500,700" rel="stylesheet"> 

	<!-- CSS -->
	<link rel="stylesheet" href="{{ asset('user/css/bootstrap-reboot.min.css')}}">
	<link rel="stylesheet" href="{{ asset('user/css/bootstrap-grid.min.css')}}">
	<link rel="stylesheet" href="{{ asset('user/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{ asset('user/css/jquery.mCustomScrollbar.min.css')}}">
	<link rel="stylesheet" href="{{ asset('user/css/nouislider.min.css')}}">
	<link rel="stylesheet" href="{{ asset('user/css/ionicons.min.css')}}">
	<link rel="stylesheet" href="{{ asset('user/css/plyr.css')}}">
	<link rel="stylesheet" href="{{ asset('user/css/photoswipe.css')}}">
	<link rel="stylesheet" href="{{ asset('user/css/default-skin.css')}}">
	<link rel="stylesheet" href="{{ asset('user/css/main.css')}}">

	<!-- Favicons -->
	<link rel="icon" type="{{ asset('user/image/png')}}" href="{{ asset('user/icon/favicon-32x32.png')}}" sizes="32x32">
	<link rel="apple-touch-icon" href="{{ asset('user/icon/favicon-32x32.png')}}">
	<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('user/icon/apple-touch-icon-72x72.png')}}">
	<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('user/icon/apple-touch-icon-114x114.png')}}">
	<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('user/icon/apple-touch-icon-144x144.png')}}">


	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Dmitry Volkov">
	<title>FlixGo – Online Movies, TV Shows & Cinema HTML Template</title>

</head>
<body class="body">

	<div class="sign section--bg" data-bg="img/section/section.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="sign__content">
						<!-- registration form -->
						<form action="/signup" class="sign__form" method="post">
							@csrf

							<a href="index.html" class="sign__logo">
								<img src="{{ asset('img/logo.svg')}}" alt="">
							</a>

							<div class="sign__group">
								<input type="text" class="sign__input" placeholder="Name" name="name">
							</div>

							<div class="sign__group">
								<input type="text" class="sign__input" placeholder="Email" name="email">
							</div>

							<div class="sign__group">
								<input type="password" class="sign__input" placeholder="Password" name="password">
							</div>

							<div class="sign__group sign__group--checkbox">
								<input id="remember" name="remember" type="checkbox" checked="checked">
								<label for="remember">I agree to the <a href="#">Privacy Policy</a></label>
							</div>
							
							<button class="sign__btn" type="submit">Sign up</button>

							<span class="sign__text">Already have an account? <a href="signin.html">Sign in!</a></span>
						</form>
						<!-- registration form -->
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- JS -->
	<script src="{{ asset('user/js/jquery-3.3.1.min.js')}}"></script>
	<script src="{{ asset('user/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{ asset('user/js/owl.carousel.min.js')}}"></script>
	<script src="{{ asset('user/js/jquery.mousewheel.min.js')}}"></script>
	<script src="{{ asset('user/js/jquery.mCustomScrollbar.min.js')}}"></script>
	<script src="{{ asset('user/js/wNumb.js')}}"></script>
	<script src="{{ asset('user/js/nouislider.min.js')}}"></script>
	<script src="{{ asset('user/js/plyr.min.js')}}"></script>
	<script src="{{ asset('user/js/jquery.morelines.min.js')}}"></script>
	<script src="{{ asset('user/js/photoswipe.min.js')}}"></script>
	<script src="{{ asset('user/js/photoswipe-ui-default.min.js')}}"></script>
	<script src="{{ asset('user/js/main.js')}}"></script>
</body>

</html>