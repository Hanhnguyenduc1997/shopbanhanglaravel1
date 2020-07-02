@extends('master')
@section('content')
<base href="{{asset('public/frontend')}}/">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/font-awesome.mini.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/util.css">
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form class="login100-form validate-form" action="{{URL::to('/login-customer')}}" method="POST">
					{{csrf_field()}}
					<span class="login100-form-title p-b-33">
						Đăng nhập
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" placeholder="Mật khẩu">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="container-login100-form-btn m-t-20">
						<button class="login100-form-btn">
							Đăng nhập
						</button>
					</div>

<!-- 					<div class="text-center p-t-45 p-b-4">
						<span class="txt1">
							Bạn quên
						</span>

						<a href="quen-mat-khau.html" class="txt2 hov1">
							Email / Mật khẩu?
						</a>
					</div> -->

					<div class="text-center">
						<span class="txt1">
							Bạn chưa có tài khoản?
						</span>

						<a href="{{asset('/register-checkout')}}" class="txt2 hov1">
							Đăng ký
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/main.js"></script>
</body>
@endsection