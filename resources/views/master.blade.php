<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
	<meta name="author" content="">
	<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}">

    <title></title>
	
    <base href="{{asset('./')}}/">

    <link href="Eshopper/css/bootstrap.min.css" rel="stylesheet">
    <link href="Eshopper/css/font-awesome.min.css" rel="stylesheet">
    <link href="Eshopper/css/prettyPhoto.css" rel="stylesheet">
    <link href="Eshopper/css/price-range.css" rel="stylesheet">
    <link href="Eshopper/css/animate.css" rel="stylesheet">
	<link href="Eshopper/css/main.css" rel="stylesheet">
	<link href="Eshopper/css/responsive.css" rel="stylesheet">
	@toastr_css
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="Eshopperimages/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="Eshopper/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="Eshopper/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="Eshopper/images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="Eshopper/images/ico/apple-touch-icon-57-precomposed.png">
	<style>
  .dropdown {
  position: relative;
  display: inline-block;
}
.dropdown-content {
  display: none;
  position: absolute;
  padding-top: 	10px ;
}
.dropdown:hover .dropdown-content {display: block;}
</style>
</head><!--/head-->

<body>

	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> </a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> </a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a><img src="images/home/logo.png" alt="" /></a>
						</div>
						
					</div>
					
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{route('/')}}" class="active">Trang chủ</a></li>
								<li class="dropdown"><a href="{{route('shopping')}}">Shop</a>
                                   
                                </li> 
								
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><div class="search_box pull-right">
							<input id="inputsearch" type="text" placeholder="Search"/></li>
								<li><a href="{{route('khuyenmai')}}"><i class="fa fa-star"></i> Khuyễn mãi</a></li>
								<li><a title="Bạn có {{ Cart::getContent()->count()  }} mặt hàng" href="{{route('cart.index')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
								@if(Auth::check())
								<li class="dropdown"><a  href=""><i class="fa fa-user "></i> {{Auth::user()->user_name}} </a>
								
									<div style="width:100px;" class="dropdown-content">
									<a href="{{route('doipass')}}">Đổi mật khâu</a>
									<a href="{{route('logout')}}">Logout</a>
  									</div>

							
							</li>
							
								@else
								<li><a href="{{route('login')}}"><i class="fa fa-lock"></i> Login</a></li>
								@endif
							</ul>
						</div>
						<div class="col-sm-3">
						
						</div>
					</div>
					</div>
					
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	@if($slide)
		@include('slide')
		@endif
		
	
	<section>
		<div class="container">
			<div class="row">
			@if($left_slide)
			@include('left_slide')
			@endif
				
				<div class="col-sm-9 padding-right">
                @yield('content')
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Online Help</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Order Status</a></li>
								<li><a href="#">Change Location</a></li>
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quock Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">T-Shirt</a></li>
								<li><a href="#">Mens</a></li>
								<li><a href="#">Womens</a></li>
								<li><a href="#">Gift Cards</a></li>
								<li><a href="#">Shoes</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privecy Policy</a></li>
								<li><a href="#">Refund Policy</a></li>
								<li><a href="#">Billing System</a></li>
								<li><a href="#">Ticket System</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About </h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Store Location</a></li>
								<li><a href="#">Affillate Program</a></li>
								<li><a href="#">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
	<script src="Eshopper/js/jquery.js"></script>
    <script src="Eshopper/js/ajax.js"></script>

	<script src="Eshopper/js/bootstrap.min.js"></script>
	<script src="Eshopper/js/jquery.scrollUp.min.js"></script>
	<script src="Eshopper/js/price-range.js"></script>
    <script src="Eshopper/js/jquery.prettyPhoto.js"></script>
	<script src="Eshopper/js/main.js"></script>
</body>

</html>