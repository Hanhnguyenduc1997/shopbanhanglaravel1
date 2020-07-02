@extends('master')
@section('content')
<base href="{{asset('public/frontend')}}/">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/font-awesome-mini.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/util.css">
<body>
	<div class="wrapper" style="background-image: url('images/bg-registration-form-1.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="images/register.jpg" alt="">
				</div>
				<form action="{{URL::to('/add-customer')}}" method="POST">
					{{ csrf_field() }}
					<h3>Đăng ký</h3>
					<div class="form-group" name="customer_name">
						<input type="text" placeholder="Tên" class="form-control">
						<input type="text" placeholder="Họ" class="form-control">
					</div>
					<div class="form-wrapper">
						<input type="text" placeholder="Địa chỉ" class="form-control" name="customer_address">
						<i class="fa fa-home"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" placeholder="Số điện thoại" class="form-control" name="customer_phone">
						<i class="fa fa-phone"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" placeholder="Email" class="form-control" name="customer_email">
						<i class="fa fa-user"></i>
					</div>
					<div class="form-wrapper">
						<select name="customer gender" id="" class="form-control">
							<option value="" disabled selected>Giới tính</option>
							<option value="male">Nam</option>
							<option value="femal">Nữ</option>
							<option value="other">Khác</option>
						</select>
						<i class="fa fa-caret-down" style="font-size: 17px"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Mật khẩu" class="form-control" name="customer_password">
						<i class="fa fa-lock"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Xác nhận mật khẩu" class="form-control">
						<i class="fa fa-lock"></i>
					</div>
					<button>Đăng ký
						<i class="fa fa-arrow-right"></i>
					</button>
				</form>
			</div>
		</div>
</body>
@endsection