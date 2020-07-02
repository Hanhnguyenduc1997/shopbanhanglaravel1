@extends('master')
@section('content')
<base href="{{asset('public/frontend')}}/">

<body>
	<div class="container order-bill">
		<div class="row">
			<?php
			$content = Cart::content();
			?>
			@if($payment->payment_method==1)
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
					@endif

					@if($payment->payment_method==2)



					<a href="">thanh toán online</a>
					<div class="container">
            <div class="header clearfix">
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
                <h3 class="text-muted">VNPAY</h3>
            </div>
            <h3>Thanh toán đơn hàng</h3>
            <div class="table-responsive">
                <form action="{{URL::to('/pay.php')}}" id="create_form" method="post">       

                    <div class="form-group">
                        <label for="language">Loại hàng hóa </label>
                        <select name="order_type" id="order_type" class="form-control">
                            <option value="topup">Nạp tiền điện thoại</option>
                            <option value="billpayment">Thanh toán hóa đơn</option>
                            <option value="fashion">Thời trang</option>
                            <option value="other">Khác - Xem thêm tại VNPAY</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="order_id">Mã hóa đơn</label>
                        <input class="form-control" id="order_id" name="order_id" type="text" value="{{$order->order_id}}"/>
                    </div>
                    <div class="form-group">
                        <label for="amount">Số tiền</label>
                        <input class="form-control" id="amount"
                               name="amount" type="text" value="<?php echo trim($order->order_total,',')?>"/>
                    </div>
                    <div class="form-group">
                        <label for="order_desc">Nội dung thanh toán</label>
                        <textarea class="form-control" cols="20" id="order_desc" name="order_desc" rows="2">Noi dung thanh toan</textarea>
                    </div>
                    <div class="form-group">
                        <label for="bank_code">Ngân hàng</label>
                        <select name="bank_code" id="bank_code" class="form-control">
                            <option value="">Không chọn</option>
                            <option value="NCB"> Ngan hang NCB</option>
                            <option value="AGRIBANK"> Ngan hang Agribank</option>
                            <option value="SCB"> Ngan hang SCB</option>
                            <option value="SACOMBANK">Ngan hang SacomBank</option>
                            <option value="EXIMBANK"> Ngan hang EximBank</option>
                            <option value="MSBANK"> Ngan hang MSBANK</option>
                            <option value="NAMABANK"> Ngan hang NamABank</option>
                            <option value="VNMART"> Vi dien tu VnMart</option>
                            <option value="VIETINBANK">Ngan hang Vietinbank</option>
                            <option value="VIETCOMBANK"> Ngan hang VCB</option>
                            <option value="HDBANK">Ngan hang HDBank</option>
                            <option value="DONGABANK"> Ngan hang Dong A</option>
                            <option value="TPBANK"> Ngân hàng TPBank</option>
                            <option value="OJB"> Ngân hàng OceanBank</option>
                            <option value="BIDV"> Ngân hàng BIDV</option>
                            <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                            <option value="VPBANK"> Ngan hang VPBank</option>
                            <option value="MBBANK"> Ngan hang MBBank</option>
                            <option value="ACB"> Ngan hang ACB</option>
                            <option value="OCB"> Ngan hang OCB</option>
                            <option value="IVB"> Ngan hang IVB</option>
                            <option value="VISA"> Thanh toan qua VISA/MASTER</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="language">Ngôn ngữ</label>
                        <select name="language" id="language" class="form-control">
                            <option value="vn">Tiếng Việt</option>
                            <option value="en">English</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" id="btnPopup">Thanh toán Popup</button>
                    <button type="submit" class="btn btn-primary">Thanh toán ATM</button>

                </form>
            </div>
            <p>
                &nbsp;
            </p>
            <footer class="footer">
                <p>&copy; VNPAY 2015</p>
            </footer>
        </div>  
        <link href="https://sandbox.vnpayment.vn/paymentv2/lib/vnpay/vnpay.css" rel="stylesheet"/>
        <script src="https://sandbox.vnpayment.vn/paymentv2/lib/vnpay/vnpay.js"></script>
        <script type="text/javascript">
            $("#btnPopup").click(function () {
                var postData = $("#create_form").serialize();
                var submitUrl = $("#create_form").attr("action");
                $.ajax({
                    type: "POST",
                    url: submitUrl,
                    data: postData,
                    dataType: 'JSON',
                    success: function (x) {
                        if (x.code === '00') {
                            if (window.vnpay) {
                                vnpay.open({width: 768, height: 600, url: x.data});
                            } else {
                                location.href = x.data;
                            }
                            return false;
                        } else {
                            alert(x.Message);
                        }
                    }
                });
                return false;
            });
        </script>

					@endif
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