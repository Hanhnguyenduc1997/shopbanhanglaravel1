@extends('admin_layout')
@section('admin_content')
<h3>Chào mừng bạn đến với Admin</h3>
<div class="market-updates">

			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-2">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-eye"> </i>
					</div>
					 <div class="col-md-8 market-update-left">
					 <h4>Danh mục</h4>
					<h3>{{count($all_category)}}</h3>
					<a class="badge badge-danger" href="{{asset('/all-category-product')}}">Xem ngay</a>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" aria-hidden="true" ></i>
					</div>
					<div class="col-md-8 market-update-left">
					<h4>Người dùng</h4>
						<h3>{{count($all_user)}}</h3>
						<a class="badge badge-success" href="{{asset('/danhsach')}}">Xem ngay</a>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-usd" aria-hidden="true"></i>
					</div>
					<div class="col-md-8 market-update-left">
					<h4>Sản phẩm</h4>
						<h3>{{count($all_product)}}</h3>
						<a class="badge badge-primary" href="{{asset('/all-product')}}">Xem ngay</a>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-4">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Đơn hàng</h4>
						<h3>{{count($all_order)}}</h3>
						<a class="badge badge-dark" href="{{asset('/manage-order')}}">Xem ngay</a>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		   <div class="clearfix"> </div>
</div>	
@endsection