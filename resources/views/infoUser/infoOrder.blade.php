@extends('master')
@section('content')
<base href="{{asset('public/frontend')}}/">

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
	<div class="container">
		<div class="cart-list-product">
			<div class="top">
				<div class="button-2">
					<a href="{{URL::to('/donhang')}}">
						<i class="fa fa-chevron-left"></i> Về quản lý đơn hàng</a>
				</div>
				<div class="support">
					<img src="images/support.PNG" alt="">
				</div>
			</div>
			<div class="table-cart">
				<table class="table table-hover table-responsive-md">
					<thead>
						<tr>
							<th>THÔNG TIN GIỎ HÀNG</th>
							<th>ĐƠN GIÁ</th>
							<th>SỐ LƯỢNG</th>
							<th>THÀNH TIỀN</th>
						</tr>
					</thead>
					<tbody>
						@foreach($order_details as $key => $details)
						<tr>
							<td class="td_product_info">
								<div class="thumb">
									<img src="{{URL::to('public/uploads/product/'.$details->product->product_image)}}" alt="">
								</div>
								<div class="caption">
									<span class="name">
										{{$details->product_name}}
									</span>
									<span class="pr-size">
										Size: <span>{{$details->product_size}}</span>
									</span>
									<span class="pr-color">
										Màu sắc: <span>{{$details->product_color}}</span>
									</span>
								</div>
							</td>
							<td>
								<div class="price .product_price">{{$details->product_price}}</div>
							</td>
							<td>
								<span>{{$details->product_sales_quantity}}</span>
							</td>
							<td class="td_total_price">
								<div class="sum">
									<span class="product_price"> <?php
									$subtotal = $details->product_price * $details->product_sales_quantity;
									echo number_format($subtotal).' '.'vnđ';
									?></span>
								</div>
							</td>
						</tr>
						
						@endforeach
					
					</tbody>
				</table>
			</div>

			<div class="total-info">
				<hr>
				<p class="total">
					<span><strong>Tổng cộng</strong></span>
					<span>
						<b class="cart_total_price-all">
						<strong>{{$order->order_total}} vnđ</strong>
						</b>
					</span>
				</p>
			</div>
		</div>
	</div>
	
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.js"></script>
</body>
@endsection