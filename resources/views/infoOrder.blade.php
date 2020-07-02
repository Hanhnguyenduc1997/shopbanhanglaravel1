@extends('master')
@section('content')
<base href="{{asset('public/frontend')}}/">

<body>
	<div class="container">
		<div class="cart-list-product">
			<div class="top">
				<div class="button-2">
					<a href="trangchu.html"><i class="fa fa-chevron-left"></i> tiếp tục mua hàng</a>
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
									<img src="images/20200324100327_92801.jpg" alt="">
								</div>
								<div class="caption">
									<span class="name">
										{{$details->product_name}}
									</span>
									<span class="pr-size">
										Size: <span>chưa có</span>
									</span>
									<span class="pr-color">
										Màu sắc: <span>chưa có</span>
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
									<span class="product_price">???</span>
								</div>
							</td>
						</tr>
						@endforeach
					
					</tbody>
				</table>
			</div>
			<div class="info-order">
				<div class="title">
					<h2>thông tin đơn hàng</h2>
				</div>
				<div class="total-info">
					<p>
						<span>Ngày đặt hàng</span>
						<span>
							<b class="date_order">dd/mm/yyyy</b>
						</span>
					</p>
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
					<p class="total">
						<span>Tổng cộng</span>
						<span>
							<b class="cart_total_price-all">515.000</b>đ
						</span>
					</p>
					<div class="order-status">
						<p>
							<span>Tình trạng đơn hàng</span>
							<span>
								<b>Mới đặt</b>
							</span>
						</p>
						<a href="#" class="delete">Hủy đơn hàng</a>
					</div>
					<hr>
				</div>
			</div>
		</div>
		
	
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.js"></script>
</body>

@endsection
