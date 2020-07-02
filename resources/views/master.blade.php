<!DOCTYPE html>
<html lang="en"> 
<head>
	<base href="{{asset('public/frontend')}}/">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- InstanceBeginEditable name="doctitle" -->
	<title>KMShop</title>
	<!-- InstanceEndEditable -->
	<link rel="shortcut icon" href="images/logo-shop.png" type="x-icon">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/styleTemplete.css">
	<link rel="stylesheet" href="css/mainStyle.css"> 
	<!-- InstanceBeginEditable name="head" -->
	<!-- InstanceEndEditable -->
</head>
<body>
	<header>
		<div class="container-fluid bg_banner1"></div>
		<div class="container topbar">
			<div class="topbar-left">
				<div class="phone">
					<i class="fa fa-phone"></i>
					<span>(+84)0969363678</span>
				</div>
				<div class="mail">
					<i class="fa fa-envelope"></i>
					<span>KMShop@gmail.com</span>
				</div>
			</div>
			<div class="topbar-right">
				@if(Auth::check() && Auth::user()->level==0)
				<div class="login">
					<a href="{{asset('/nguoidung')}}"><i class="fa fa-user"></i> <span> Hi, {{Auth::user()->name}}</span></a>
					<li><a href="{{URL::to('/donhang')}}"><i class="fa fa-suitcase"></i>Quản Lý đơn Hàng</a></li>
				</div>
				
				<span class="line">|</span>
				
				<div class="account">
					<a href="{{URL::to('/getLogout')}}"><i class="fa fa-key"></i> <span>Đăng Xuất</span></a>
				</div>	
				@else
				<div class="login">
					<a href="{{asset('/login')}}"><i class="fa fa-user"></i> <span>đăng nhập</span></a>
				</div>
				<div class="account">
					<a href="{{asset('/register')}}"><i class="fa fa-address-card"></i> <span>Đăng ký</span></a>
				</div>
				@endif
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="container-fluid bottombar">
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				  <a class="navbar-brand" href="{{asset('/')}}"><span>km</span>shop</a>
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				  </button>

				  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
					<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
					  <li class="nav-item active">
						<a class="nav-link" href="{{asset('/')}}">trang chủ</a>
					  </li>
					  <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						  sản phẩm
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						  @foreach($categoryProducts as $cate)
						  @if($cate->category_type == 0)
						  <a class="dropdown-item" href="{{asset('/san-pham/'.$cate->slug_category_product)}}">{{$cate->category_name}}</a>
						  @endif
						  @endforeach

						</div>
					  </li>
						<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						  phụ kiện
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
						  @foreach($categoryProducts as $cate)
						  @if($cate->category_type == 1)
						  <a class="dropdown-item" href="{{asset('/san-pham/'.$cate->slug_category_product)}}">{{$cate->category_name}}</a>
						  @endif
						  @endforeach
						</div>
					  </li>
					</ul>
					<form class="form-inline my-2 my-lg-0" action="{{asset('/tim-kiem')}}">
					  <input class="form-control mr-sm-2" name="keywords_submit" type="search" placeholder="Tìm kiếm" required=""
					  oninvalid="this.setCustomValidity('Vui lòng nhập từ khoá cần tìm')" 
					  onchange="this.setCustomValidity('')">
					  <button class="btn my-2 my-sm-0" type="submit">
					  	<i class="fa fa-search"></i></button>
					</form>
					<div class="shoppingCart">
					  <a href="{{asset('/gio-hang')}}"><i class="fa fa-cart-plus"></i><span>
					  	@if(Session::has('cart')){{Cart::count()}} @else 0 @endif</span></a>  
					</div>
				  </div>
				</nav>
			</div>
		</div>
	</header>
	@yield('content')
<footer class="container-fluid footer">
		<div class="container">
			<div class="row">
				<div class="col-xl-2 col-lg-2 ol-md-4 col-sm-12 footer-info">
					<h3>thông tin</h3>
					<p>sản phẩm mới <br>
					   sản phẩm nổi bật <br>
					   phụ kiện <br>
					   khuyến mãi <br>
					</p>
				</div>
				<div class="col-xl-2 col-lg-2 ol-md-4 col-sm-12 footer-services">
					<h3>dịch vụ</h3>
					<p>giới thiệu về KM <br>
					   mua hàng <br>
					   màu sắc <br>
					   liên hệ <br>
					</p>
				</div>
				<div class="col-xl-2 col-lg-2 ol-md-4 col-sm-12 footer-account">
					<h3>hỗ trợ</h3>
					<p>liên hệ <br>
					   đặc hàng <br>
					   F.A.Q <br>
					   bảo mật <br>
					</p>
				</div>
				<div class="col-xl-3 col-lg-3 ol-md-6 col-sm-12 footer-about-us">
					<h3>kmshop</h3>
					<p>KMshop là hệ thống bán hàng vô cùng uy tín, với nhiều sản phẩm đa dạng và kinh nghiệm hơn 10 năm trong thế giới thời trang</p>
				</div>
				<div class="col-xl-3 col-lg-3 ol-md-6 col-sm-12 footer-contact">
					<h3>liên hệ</h3>
					<p><span>địa chỉ:</span> 131/10 quận 12, tp.hồ chí minh <br>
					<span>điện thoại:</span> (+84)0969363678 <br>
					<span>email:</span> KMShop@gmail.com</p>
					<ul>
						<li><i class="fa fa-twitter"></i></li>
						<li><i class="fa fa-facebook"></i></li>
						<li><i class="fa fa-google-plus"></i></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/validate.min.js"></script>
	<script src="js/jquery.input-counter.min.js"></script>
	<script src="js/script.js"></script>
	<script src="js/zoomsl.js"></script> 
	
	<!-- InstanceBeginEditable name="js" -->js<!-- InstanceEndEditable --> 
	<script>
		$(window).resize(function(e){
			var chieucao = $(".product_img").height();
			$(".product_background").height(chieucao);
		})

		// function loadCSS(file) {
		//   var link = document.createElement("link");
		//   link.href = chrome.extension.getURL(file + '.css');
		//   link.id = file;
		//   link.type = "text/css";
		//   link.rel = "stylesheet";
		//   document.getElementsByTagName("head")[0].appendChild(link);
		// }
		// loadCSS('mainStyle');
	</script>

	@yield('js')
</body>
</html>