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
				<div class="account">
					<a href="quan-ly-tai-khoan.html"><i class="fa fa-address-card"></i> <span>tài khoản</span></a>
				</div>
				<span class="line">|</span>
				<div class="login">
					<a href="{{asset('/login')}}"><i class="fa fa-user"></i> <span>đăng nhập</span></a>
				</div>
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
						  <a class="dropdown-item" href="vay-thoi-trang.html">váy thời trang</a>
						  <a class="dropdown-item" href="do-bo-chau-au.html">đồ bộ châu âu</a>
						  <a class="dropdown-item" href="ao-khoac.html">áo khoác</a>
						</div>
					  </li>
						<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						  phụ kiện
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
						  <a class="dropdown-item" href="mat-kinh.html">mắt kính</a>
						  <a class="dropdown-item" href="tui-xach.html">túi xách</a>
						</div>
					  </li>
					</ul>
					<form class="form-inline my-2 my-lg-0">
					  <input class="form-control mr-sm-2" name="keywords_submit" type="search" placeholder="Tìm kiếm">
					  <button class="btn my-2 my-sm-0" type="submit" a href="{{asset('/tim-kiem')}}"><i class="fa fa-search"></i></button>
					</form>
					<div class="shoppingCart">
					  <a href="gio-hang.html"><i class="fa fa-cart-plus"></i><span>0</span></a>  
					</div>
				  </div>
				</nav>
			</div>
		</div>
	</header>