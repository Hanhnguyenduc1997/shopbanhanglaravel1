<!DOCTYPE html>
<html>
<head>
<base href="{{asset('public/frontend')}}/">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>KMShop</title>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/font-awesome.mini.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/util.css">
</head>

<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				@if(count($errors)>0)
				<div class="alert alert-danger " >
					@foreach($errors->all() as $err)
					{{$err}}<br>
					@endforeach
				</div>
				@endif
				@if(session('message'))
				<div class="alert alert-danger " >
					{{session('message')}}
				</div>
				@endif
				<form action="{{URL::to('/postLogin')}}" method="post" class="login100-form validate-form">
					{{ csrf_field() }}
					<span class="login100-form-title p-b-33">
						Đăng nhập
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Email hợp lệ bắt buộc là: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Bạn cần nhập mật khẩu">
						<input class="input100" type="password" name="password" placeholder="Mật khẩu">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="container-login100-form-btn m-t-20">
						<button class="login100-form-btn">
							Đăng nhập
						</button>
					</div>

				<!-- 	<div class="text-center p-t-45 p-b-4">
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

						<a href="{{asset('/register')}}" class="txt2 hov1">
							Đăng ký
						</a>
						<span class="txt1">
							Quay về
						</span>
						<a href="{{asset('/trang-chu')}}"  class="txt2 hov1 "> <span>Trang Chủ</span></a>
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
</html>
