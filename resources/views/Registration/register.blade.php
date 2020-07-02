<!doctype html>
<html>
<head>
<base href="{{asset('public/frontend')}}/">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>KMShop</title>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/font-awesome.css">
<link rel="stylesheet" href="css/style.css">
</head>

<body>
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
		
	<div class="wrapper" style="background-image: url('images/bg-registration-form-1.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="images/register.jpg" alt="">
				</div>
				<form  action="{{URL::to('/postregister')}}" method="post" id="from-register">
					<!-- <input type="hidden" name="_token"  value="{{ csrf_token() }}" /> -->
					  {{ csrf_field() }}
					<h3>Đăng ký</h3>
				<div class="form-group">
						<input type="text" name="name" placeholder="Họ và Tên" class="form-control" value="{{ old('name') }}" >
					</div> 
					<div class="form-wrapper">
						<input type="text"  name="address" placeholder="Địa chỉ" class="form-control" value="{{ old('address') }}">
						<i class="fa fa-home"></i>
					</div>
					<div class="form-wrapper">
						<input type ="text" name="phone" placeholder="Số điện thoại" class="form-control" value="{{ old('phone') }}">
						<i class="fa fa-phone"></i>
					</div>
					<div class="form-wrapper">
						<input type ="text" name="email" placeholder="Email" class="form-control"  value="{{ old('email') }}">
						<i class="fa fa-user"></i>
					</div>
					<div class="form-wrapper">
						<select name="gender"class="form-control">
							<option value="" disabled selected>Giới tính</option>
							<option value="male">Nam</option>
							<option value="female">Nữ</option>
							<option value="other">Khác</option>
						</select>
						<!-- Giới tính
						<input type="radio" name="gioi_tinh" value="female">Nữ
						<input type="radio" name="gioi_tinh" value="male">Nam
						<input type="radio" name="gioi_tinh" value="other">Khác -->
						<i class="fa fa-caret-down" style="font-size: 17px"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" name="password" placeholder="Mật khẩu" class="form-control" >
						<i class="fa fa-lock"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Xác nhận mật khẩu" class="form-control" name="passwordAgain">
						<i class="fa fa-lock"></i>
					</div>
					<button>Đăng ký
						<i class="fa fa-arrow-right"></i>
					</button>
					
					<a href="{{asset('/login')}}"><i class="fa fa-arrow-right"></i> <span>Quay Về Đăng Nhập</span></a>
				</form>
			</div>
		</div>
<script type="text/javascript">
$("#from-register").vaidate({
	rules:(
		email:(
			require:true,
			email:true,
			),
		password:(
			require:true,
			minlength:6
			),
		password_confirm:(
			equalTo:"#password")
		)
})
</script>
</body>
</html>