<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Car-Care</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="{{asset('./assets/img/favicon.png')}}">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<!-- fontawesome -->
	<link rel="stylesheet" href="{{asset('assets/css/all.min.css') }}">
	<!-- bootstrap -->
	<link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css') }}">
	<!-- owl carousel -->
	<link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css') }}">
	<!-- magnific popup -->
	<link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css') }}">
	<!-- animate css -->
	<link rel="stylesheet" href="{{asset('assets/css/animate.css') }}">
	<!-- mean menu css -->
	<link rel="stylesheet" href="{{asset('assets/css/meanmenu.min.css') }}">
	<!-- main style -->
	<link rel="stylesheet" href="{{asset('assets/css/main.css') }}">
	<!-- responsive -->
	<link rel="stylesheet" href="{{asset('assets/css/responsive.css') }}">

    <!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{asset('form/images/icons/favicon.ico')}}"/>
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('form/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('form/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('form/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('form/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('form/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('form/vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('form/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('form/vendor/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('form/css/util.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('form/css/main.css')}}">
    <!--===============================================================================================-->

    <style>

        .logoo{
            height: 50px;
            width: 100px;
        }
    </style>

</head>
<body>

	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="index.html">
								<img class="logoo" src="{{ asset('assets/img/logo.png')}}" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								{{-- <li class="nav-link {{Request::is('/') ? 'active' : ''}}"><a href="/" >Home</a> --}}
                                    <li class="nav-item"><a href="/"
                                        class="nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a></li>
									{{-- <ul class="sub-menu">
										<li><a href="index.html">Static Home</a></li>
										<li><a href="index_2.html">Slider Home</a></li>
									</ul> --}}
								</li>

								<li class="nav-item"><a class="nav-link {{ Request::is('/about') ? 'active' : '' }}" href="/about" >About</a></li>
								{{-- <li><a href="#">Pages</a>
									<ul class="sub-menu">
										<li><a href="404.html">404 page</a></li>
										<li><a href="about.html">About</a></li>
										<li><a href="cart.html">Cart</a></li>
										<li><a href="checkout.html">Check Out</a></li>
										<li><a href="contact.html">Contact</a></li>
										<li><a href="news.html">News</a></li>
										<li><a href="shop.html">Shop</a></li>
									</ul>
								</li> --}}
								{{-- <li><a href="news.html">News</a>
									<ul class="sub-menu">
										<li><a href="news.html">News</a></li>
										<li><a href="single-news.html">Single News</a></li>
									</ul>
								</li> --}}
								<li class="nav-item"><a href="/contact" class="nav-link {{ Request::is('/contact') ? 'active' : '' }}">Contact</a></li>

								<li class="nav-item"><a href="/show_products">Shop</a>

								</li>
                                <li>
                                    @if (Session::has('loginId'))
                                    <li class="nav-item"><a class="nav-link {{ Request::is('/logout') ? 'active' : '' }} " href="logout">logout</a></li>
                                    @else
                                    <li class="nav-item"><a class="nav-link {{ Request::is('/login') ? 'active' : '' }} " href="login">login</a></li>
                                    @endif

                                </li>
								<li>
                                    @if (Session::has('loginId'))

									<div class="header-icons">
										<a class="shopping-cart" href="/show_carts"><i class="fas fa-shopping-cart"></i></a>

										<a href="/profile"><i class="fa-solid fa-user"></i></a>
                                        {{-- <ul class="sub-menu"> --}}
                                            {{-- <li><a href="/profile" class="nav-link {{ Request::is('/profile') ? 'active' : '' }}">Profile</a></li> --}}
                                            {{-- <li><a href="logout">Logout</a></li> --}}
                                        {{-- </ul> --}}
									</div>
                                    @endif
								</li>
							</ul>
						</nav>

						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->
