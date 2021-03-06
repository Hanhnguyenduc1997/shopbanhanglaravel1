@extends('master')
@section('content')
<base href="{{asset('public/frontend')}}/">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/font-awesome.mini.css">
<link rel="stylesheet" href="css/hover.css">
<link rel="stylesheet" href="css/mainStyle.css">
<body>
	<div class="container order-bill">
		<div class="row">
			<div class="col-xl-8">
				<div class="order-result">
					<div class="title">
						<h2>đặt hàng thành công</h2>
					</div>
					<p class="title-m">cảm ơn đơn đặt hàng của bạn!</p>
					<p>KMShop sẽ liên hệ quý khách trong vòng 24h làm việc</p>
					<p><b>Luôn giữ điện thoại bên cạnh nhé!</b></p>
					<div class="info">
						<div class="idcode">
							Số đơn hàng <br>
							<strong>#123</strong>
						</div>
						<div class="desc">
							<strong>Người nhận: </strong>
							Dương Hà Kiều Trinh <br>
							<strong>Địa chỉ: </strong>
							123 PhườngX QuậnY TP.Hồ Chí Minh <br>
							<strong>Điện thoại:</strong>
							02910291021 <br>
							<strong>Ngày đặt hàng:</strong>
							dd/mm/yyyy
						</div>
					</div>
				</div>
				<hr>
				<div class="button">
					<a href="quan-ly-don-hang.html">quản lý đơn hàng</a>
				</div>
			</div>
			<div class="col-xl-4">
				<div class="shopbag">
					<div class="title">
						<h2>tóm tắt đơn hàng</h2>
					</div>
					<hr>
					<div class="item">
						<div class="thumb">
							<img src="images/20200324100327_92801.jpg" alt="">
						</div>
						<div class="caption">
							<p class="name"><b>Tên sản phẩm</b></p>
							<p>Đơn giá: 165.000đ</p>
							<p>Màu sắc: Đen</p>
							<p>Số lượng: 1</p>
							<p>Size: M</p>
						</div>
					</div>
					<hr>
					<div class="item">
						<div class="thumb">
							<img src="images/20200309100313_76996.jpg" alt="">
						</div>
						<div class="caption">
							<p class="name"><b>Tên sản phẩm</b></p>
							<p>Đơn giá: 165.000đ</p>
							<p>Màu sắc: Đen</p>
							<p>Số lượng: 1</p>
							<p>Size: M</p>
						</div>
					</div>
					<hr>
					<div class="item">
						<div class="thumb">
							<img src="images/20181009091059_60201.jpg" alt="">
						</div>
						<div class="caption">
							<p class="name"><b>Tên sản phẩm</b></p>
							<p>Đơn giá: 165.000đ</p>
							<p>Màu sắc: Đen</p>
							<p>Số lượng: 1</p>
						</div>
					</div>
					<hr>
					<div class="total-info">
						<p>
							<span>Đơn hàng</span>
							<span>
								<b class="cart_total_price">495.000</b>đ
							</span>
						</p>
						<p>
							<span>Phí giao</span>
							<span>
								<b class="cart_fee_price">20.000</b>đ
							</span>
						</p>
						<hr>
						<p class="total">
							<span>Tổng cộng</span>
							<span>
								<b class="cart_total_price-all">515.000</b>đ
							</span>
						</p>
						<hr>
					</div>
					<div class="form-footer">
						<div class="button-2">
							<a href="trangchu.html">tiếp tục mua hàng <i class="fa fa-chevron-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.js"></script>
</body>
@endsection