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
				<form action="{{URL::to('/nguoidung')}}" method="post">
					{{ csrf_field() }}
					<h3>Quản lý tài khoản</h3>
					<div class="form-group">
						<input type="text" name="name" placeholder="Họ và Tên" class="form-control" value="{{$nguoidung->name}}">
						
					</div>
					<div class="form-wrapper">
						<input type="text" name="address" placeholder="Địa chỉ" class="form-control" value="{{$nguoidung->address}}">
						<i class="fa fa-home"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" name="phone" placeholder="Số điện thoại" class="form-control" value="{{$nguoidung->phone}}">
						<i class="fa fa-phone"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" name="email" placeholder="Email" class="form-control" value="{{$nguoidung->email}}" readonly>
						<i class="fa fa-user"></i>
					</div>
					<label for="exampleInputEmail1">Giới tính</label>


                                <input type="radio" name="gender" value="male"
                                    @if($nguoidung->gender=="male")
                                    {{"checked"}}

                                      @endif  

                                >Nam
                                <input type="radio" name="gender" value="female"
                                @if($nguoidung->gender=="female")
                                    {{"checked"}}

                                @endif  >Nữ
                                <input type="radio" name="gender" value="other"
                                 @if($nguoidung->gender=="other")
                                    {{"checked"}}

                                @endif  >khác
				<!-- 	<div class="form-wrapper">
						<select name="" id="" class="form-control">
							<option value="" disabled selected>Giới tính</option>
							<option value="male" selected>Nam</option>
							<option value="femal">Nữ</option>
							<option value="other">Khác</option>
						</select>
						<i class="fa fa-caret-down" style="font-size: 17px"></i>
					</div> -->
					<div class="form-wrapper">
						<input type="password" placeholder="Mật khẩu" class="form-control" value="" disabled="">
						<i class="fa fa-lock"></i>
					</div>
					<a href="{{asset('/changePass')}}">Bạn muốn đổi mật khẩu</a>
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
