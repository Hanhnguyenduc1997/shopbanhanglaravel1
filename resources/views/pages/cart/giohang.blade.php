`@extends('master')
@section('content')
<base href="{{asset('public/frontend')}}/">

<body>
	<div class="container">
	  <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>	
		<div class="cart-list-product">
			<h2 text align="center"><b>Giỏ hàng của bạn</b></h2>
			<div class="top">
				<div class="button-2">
					<a href="{{asset('/')}}"><i class="fa fa-chevron-left"></i> tiếp tục mua hàng</a>
				</div>
				<div class="support">
					<img src="images/support.PNG" alt="">
				</div>
			</div>
			@if(session('noif'))
			<div class="alert alert-success" role="alert">
  				Sản phẩm đã được xoá khỏi giỏ hàng của bạn
			</div>
			@endif
			@if(Cart::count() == 0)
			<div class="table-cart">
				<table class="table table-hover table-responsive-md">
					<h3 text align="center"><strong>Không có sản phẩm trong giỏ</strong></h3>
				</table>
			</div>
			@else

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
					<?php
				

					$content = Cart::content();
					?>

					@foreach($content as $v_content)
					
						<tr>
							<td class="td_product_info">
								<div class="thumb">
									<img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" alt="">
								</div>
								<div class="caption">
									<span class="name">
										<span><a href="{{URL::to('/chi-tiet-san-pham/'.$v_content->id)}}" class="text-danger">
										Tên sản phẩm: {{$v_content->name}}</a></span>
									</span>
								
								<strong class="button"><a class="delete" data-toggle="modal" data-id={{$v_content->rowId}} data-target="#delete-to-cart" href="">Xóa</a></strong>

								<a id="yes-del" type="hidden" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"></a>

									<span class="pr-size">
										Size: <span>{{$v_content->options->size}}</span>
									</span>
									<span class="pr-color">
										Màu sắc: <span>{{$v_content->options->mausac}}</span>
									</span>
								</div>
							</td>
							<td>
								<div class="price.product_price">{{number_format($v_content->price).' '.'vnđ'}}</div>
								
							</td>

							<td>
								<form action="{{URL::to('/update-cart-quantity')}}" method="POST" >
								{{ csrf_field() }}

								<input class="form-control counter input_quantity input_quantity_{{$v_content->rowId}} text-align" type="number" name="cart_quantity" value="{{$v_content->qty}}"  data-default="1" min="1" required="" data-id={{$v_content->rowId}} oninvalid="this.setCustomValidity('Hãy nhập số lượng lớn hơn 1')" 
								onchange="this.setCustomValidity('')">

								<input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart">

								</form>
							</td>

							<td class="td_total_price">
								<div class="sum">
									<span class="product_price">
                                    <?php
									$subtotal = $v_content->price * $v_content->qty;
									echo number_format($subtotal).' '.'vnđ';
									?>
									</span>
								</div>
							</td>
						</tr>
					@endforeach
								<!-- modal delete -->
				<div class="modal fade" id="delete-to-cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLongTitle">Thông báo</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
					<form class="fr1 frm-delete-cart" action="">
				      <div class="modal-body">
							Bạn có chắc chắn muốn xoá sản phẩm này khỏi giỏ hàng?
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Đóng</button>
				        <button type="submit" class="btn btn-outline-danger">Có</button>

				      </div>
					</form>
				    </div>
				  </div>
				</div>
				<!-- end modal delete -->
					</tbody>
				</table>
			</div>
				@if (count($errors) > 0)
			      <div class="alert alert-danger">
			          Thông tin đặt hàng không đầy đủ, bạn cần chỉnh sửa như sau:
			          <ul>
			              @foreach ($errors->all() as $error)
			                  <li>{{ $error }}</li>
			              @endforeach
			          </ul>
			      </div>
			    @endif
			    @if (isset($message))
			      <div class="alert alert-success">
			      {{ $message }}
			      </div>
			    @endif
			<form action="{{URL::to('/save-checkout-customer')}}" method="POST"><!-- class="was-validated" -->
				{{csrf_field()}}
				<div class="buyer-info row">
					@if(Auth::check())
					<div class="col-xl-7 block-left">
						<div class="title">
							<h2>thông tin giao hàng</h2>
						</div>
						<div class="form">
							<div class="form-group">
								<div class="input-container">
									<input type="text" class="form-control" placeholder="Họ và tên" name="shipping_name" value="{{ old('shipping_name') }}" required=""
									oninvalid="this.setCustomValidity('Nhập họ và tên của bạn.')" 
									onchange="this.setCustomValidity('')">
								</div>
								
							</div>
							<div class="form-group">
								<div class="input-container">
									<input id="mobile" type="tel" class="form-control" placeholder="Số điện thoại" name="shipping_phone" value="{{ old('shipping_phone') }}" required="" oninvalid="this.setCustomValidity('Nhập số điện thoại của bạn.')" 
									onchange="this.setCustomValidity('')">

								</div>
							</div>
							<div class="form-group">
								<div class="input-container">
									<input type="email" class="form-control" placeholder="Email" name="shipping_email" value="{{ old('shipping_email') }}" required="" oninvalid="this.setCustomValidity('Nhập email của bạn.')" 
									onchange="this.setCustomValidity('')">
									<div class="invalid-feedback">Nhập email của bạn.</div>
								</div>
							</div>
							<div class="form-group">
								<div class="input-container">
									<input type="text" class="form-control" placeholder="Địa chỉ" name="shipping_address" value="{{ old('shipping_address') }}" required="" oninvalid="this.setCustomValidity('Nhập địa chỉ giao hàng của bạn.')" 
									onchange="this.setCustomValidity('')">
									<div class="invalid-feedback">Nhập địa chỉ giao hàng.</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col">
									<select name="thanhpho" id="tp" class="form-control" required="">
										<option value="0" disabled="true" selected="true">Thành phố/tỉnh</option>
										@foreach($thanhpho as $tp)
										<option value="{{$tp->matp}}">{{$tp->name}}</option>
										@endforeach
									</select>
								</div>
								<div class="col">
									<select name="quanhuyen" id="qh" class="form-control" required="">
										<option value="0" disabled="true" selected="true">Quận/Huyện</option>
										@foreach($quanhuyen as $qh)
										<option value="{{$qh->maqh}}">{{$qh->name}}</option>
										@endforeach
									</select>
								</div>
								<div class="col">
									<select name="phuongxa" id="px" class="form-control" required="">
										<option value="0" disabled="true" selected="true">Phường/Xã/Thị trấn</option>
										@foreach($phuongxa as $px)
										<option value="{{$px->maxa}}">{{$px->name}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="title">
									<h2>phương thức thanh toán</h2>
								</div>
								<div class="row">
								  <div class="col-sm-10" >
									<div class="form-check">
									  <input class="form-check-input" type="radio" name="payment" id="gridRadios2" value="1" checked>
									  <label class="form-check-label" for="gridRadios2">
										Thanh toán tiền mặt khi nhận hàng - COD
									  </label>
									</div>
									<div class="form-check">
									  <input class="form-check-input" type="radio" name="payment" id="gridRadios1" value="2">
									  <label class="form-check-label" for="gridRadios1">
										Thanh toán qua thẻ tín dụng
									  </label>
									</div>
								  </div>
								</div>
							</div>
							<div class="form-group">
								<div class="input-container" >
									<textarea  name="shipping_notes" id="" cols="1" rows="3" placeholder="Ghi chú"  value="{{ old('shipping_notes') }}" class="form-control" required="" oninvalid="this.setCustomValidity('Nhập Ghi chú khi giao hàng.')" 
									onchange="this.setCustomValidity('')"></textarea>
									<div class="invalid-feedback">Nhập Ghi chú khi giao hàng.</div>
								</div>
							</div>
						</div>
					</div>
					@endif
					<div class="col-xl-5 block-right">
						<div class="title">
							<h2>xác nhận đơn hàng</h2>
						</div>
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
									?></b>	
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

<!-- 						 <?php
                               $customer_id = Session::get('customer_id');

                               if($customer_id!=NULL){ 
                         ?>

							<button class="button" type="submit"><a >mua ngay </a></div></button>

                        <?php
                        }else{
                        ?>
                             <div class="button"><a href="{{URL::to('/login')}}">mua ngay </a></div>
                        <?php 
                         }
                        ?> -->
						@if(Auth::check())
							<input type="hidden" value="{{Auth::user()->id}}" name="user_id">
							<button class="button muangay" type="submit"><a >mua ngay </a></div></button>
						@else
                             <div class="button"><a href="{{URL::to('/login')}}">mua ngay </a></div>
						@endif

						</div>
					</div>
				</div>
			</form>
			@endif
		</div>
	</div>
	
	@section('js')
	<script>
        var options = {
            selectors: {
                addButtonSelector: '.btn-add',
                subtractButtonSelector: '.btn-subtract',
                inputSelector: '.counter',
            },
            settings: {
                checkValue: true,
                isReadOnly: true,
            },
        };
        $(".input-counter").inputCounter(options);
       //xoá sản phẩm khỏi giỏ hàng
        var cartId = null;
        var url = null;
        $(".delete").click(function(){
        	cartId = $(this).attr('data-id');
        	url = "{{asset('/delete-to-cart')}}"+"/"+cartId;
        	console.log(url);
        	$('.frm-delete-cart').attr('action',url);
        });

	//load tự động tên quận huyện, phường/xã theo thành phố
        $(document).ready(function(){
        	$("#tp").change(function(){
        		var idThanhpho=$(this).val();
        		if(idThanhpho<8){
        			idThanhpho='0'+idThanhpho
        		}
        		$.get("{{asset('/gio-hang/ajax/quanhuyen')}}"+"/"+idThanhpho,function(data){
        			$("#qh").html(data);
        		});
        	});

    	    $("#qh").change(function(){
    		var idQuanHuyen=$(this).val();
    		$.get("{{asset('/gio-hang/ajax/phuongxa')}}"+"/"+idQuanHuyen,function(data){
    			$("#px").html(data);
    		});
    	});
    	    $(".input_quantity").on('keyup change',function(){
				var quantity = $(this).val();
				var row_id = $(this).attr('data-id');
				if(quantity == null || quantity == ''){
					return;
				}
				var data = {
					'quantity': quantity,
					'row_id' : row_id
				}
				var url = "{{route('updateQuanTiTyInCart')}}";

				ajaxUpdateQuanTiTyInCart(url, data);
			})

			function ajaxUpdateQuanTiTyInCart(url, data){
				$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});

				$.ajax({
					url : url,
					data : data,
					type : "GET",
					success:function(result){
						$(".input_quantity_"+data.row_id).parent().parent().next().find('.product_price').html(number_format(result.price) + " vnđ");
						$(".cart_total_price").html(result.total + " vnđ");
						$(".cart_total_price-all").html(result.total + " vnđ");
					},
					error:function(err){
						console.log(err);
					}
				});
			}

			function number_format (number, decimals, dec_point, thousands_sep) {
			    // Strip all characters but numerical ones.
			    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
			    var n = !isFinite(+number) ? 0 : +number,
			        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
			        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
			        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
			        s = '',
			        toFixedFix = function (n, prec) {
			            var k = Math.pow(10, prec);
			            return '' + Math.round(n * k) / k;
			        };
			    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
			    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
			    if (s[0].length > 3) {
			        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
			    }
			    if ((s[1] || '').length < prec) {
			        s[1] = s[1] || '';
			        s[1] += new Array(prec - s[1].length + 1).join('0');
			    }
			    return s.join(dec);
			}


        });
    </script>
    @endsection

</body>
@endsection
