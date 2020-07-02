@extends('master')
@section('content')
<base href="{{asset('public/frontend')}}/">

<body>
	<div class="container order-bill">
		<div class="row">
			<?php
			$content = Cart::content();
			?>
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
							Mã đơn hàng <br>
							<strong>{{$order->order_id}}</strong>
						</div>
						<div class="desc">
							<strong>Người nhận: </strong>
							{{$shipping->shipping_name}} <br>
							<strong>Địa chỉ: </strong>
							{{$shipping->shipping_address}}<br>
							<strong>Điện thoại:</strong>
							{{$shipping->shipping_phone}} <br>
							<strong>Ngày đặt hàng:</strong>
							{{$shipping->created_at}}
						</div>
					</div>
				</div>
				<hr>
				<div class="button">
					<a href="{{asset('/donhang')}}">quản lý đơn hàng</a>
				</div>
			</div>
			<div class="col-xl-4">
				<div class="shopbag">
					<div class="title">
						<h2>tóm tắt đơn hàng</h2>
					</div>
					@foreach($content as $v_content)
					<hr>
					<div class="item">
						<div class="thumb">
							<img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" alt="">
						</div>
						<div class="caption">
							<p class="name"><b>Tên sản phẩm: {{$v_content->name}}</b></p>
							<p>Đơn giá: {{number_format($v_content->price).' '.'vnđ'}}</p>
							<p>Màu sắc: {{$v_content->options->mausac}}</p>
							<p>Số lượng: {{$v_content->qty}}</p>
							<p>Size: {{$v_content->options->size}}</p>
						</div>
					</div>
					@endforeach
					<hr>
					<div class="total-info">
						<p>
							<span>Đơn hàng</span>
							<span>
								<b class="cart_total_price">
									<?php
									$tongtien=Cart::subtotalFloat();				
									echo number_format($tongtien).' '.'vnđ';
									?>
								</b>
							</span>
						</p>
						<p>
							<span>Phí giao</span>
							<span>
								<b class="cart_fee_price">
									<?php
									if($tongtien > "500000"){
										cart::setGlobaltax('0');
										$tax=cart::taxFloat();
										echo number_format($tax).' '.'vnđ';
									}else{
										cart::setGlobaltax('10');
										$tax=cart::taxFloat();
										echo number_format($tax).' '.'vnđ';
									}
									?>
								</b>
							</span>
						</p>
						<hr>
						<p class="total">
							<span>Tổng cộng</span>
							<span>
								<b class="cart_total_price-all">
									<?php
									$total=cart::totalFloat();
									echo number_format($total).' '.'vnđ';
									?>
								</b>
							</span>
						</p>
						<hr>
					</div>
					<div class="form-footer">
						<div class="button-2">
							<?php Cart::destroy(); ?>
							<a href="{{asset('/')}}">tiếp tục mua hàng <i class="fa fa-chevron-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

@endsection