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
<link rel="stylesheet" href="css/mainStyle.css">
</head>

<body>
	<div class="wrapper" style="background-image: url('images/bg-registration-form-1.jpg');">
			<div class="profile-form">
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
				<form action="{{URL::to('/changePass')}}" method="post">
					{{ csrf_field() }}
					<h3>Đổi mật khẩu</h3>
					<!-- <div class="form-wrapper">
						<input type="password" name="old_password" placeholder="Mật khẩu cũ" class="form-control">
						<i class="fa fa-lock"></i>
					</div> -->
					<div class="form-wrapper">
						<input type="password" name="new_password" placeholder="Mật khẩu mới" class="form-control">
						<i class="fa fa-lock"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" name="renew_password" placeholder="Xác nhận mật khẩu" class="form-control">
						<i class="fa fa-lock"></i>
					</div>
					<div class="form-group">
						 <a href="{{asset('/trang-chu')}}">Hủy</a>
						<button class="btn-save">Lưu</button>
					</div>
				</form>
			</div>
		</div>
	
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.js"></script>
</body>
</html>
