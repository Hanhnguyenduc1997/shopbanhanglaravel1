@extends('master')
@section('content')
<base href="{{asset('public/frontend')}}/">
<main> 
		<div class="container headeing">
		  <nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="{{asset('/')}}">trang chủ</a></li>
				<li class="breadcrumb-item"><a href="{{asset('/san-pham')}}">sản phẩm</a></li>
			    <li class="breadcrumb-item active" aria-current="page"><span>{{$product_details->category_name}}
			    </span></li>
		      </ol>
		  </nav>
        </div>
        <div class="container">
        	<div class="product-detail">
				<div class="row top-detail">
					<div class="col-xl-4 col-lg-4 col-md-12">
					<div class="photo">
						<img src="{{ URL::to('/public/uploads/product/'.$product_details->product_image)}}" alt="Image To Zoom" class="block__pic">
					</div>
					</div>
					<div class="col-xl-8 col-lg-8 col-md-12">
					<form method="post" action="{{asset('/save-cart')}}">
						{{ csrf_field() }}
						<div class="caption">
							<h1>{{$product_details->product_name}}</h1>
							<p class="code">Mã SP: {{$product_details->product_id}}</p>
							<div class="desc">
							<p>{{$product_details->product_content}}</p>
							</div>
							<hr>
							<div class="price">
								@if($product_details->product_price_discount==0)
								<p class="best-price">
									<strong>
										<span>{{number_format($product_details->product_price).'VNĐ'}}</span>
									</strong>
								</p>
								<hr>
								@else
								<p class="primary-price">
								Giá gốc: <span>{{number_format($product_details->product_price).'VNĐ'}}</span>
								</p>
								<p class="best-price">
									<strong>
										<span>{{number_format($product_details->product_price_discount).'VNĐ'}}</span>
									</strong>
								</p>
								<hr>
								@endif
							</div>
							<div class="option">
								<div class="size row">
									<div class="col-2">
										<label class="name">Size:</label>
									</div>
									<div class="col-xl-2 col-3">
										<select name="size"class="custom-select">
										  <option value="S">S</option>
										  <option value="M">M</option>
										  <option value="L">L</option>
										</select>
									</div>
								</div>
								<div class="size row">
									<div class="col-2">
										<label class="name">Màu sắc:</label>
									</div>
									<div class="col-xl-2 col-3">
										<select name="mausac"class="custom-select">
										  <option value="Đen">Đen</option>
										  <option value="Đỏ">Đỏ</option>
										  <option value="Vàng">Vàng</option>
										  <option value="Trắng">Trắng</option>
										</select>
									</div>
								</div>
								<div class="number row">
									<div class="col-xl-2 col-lg-2 col-md-2 col-3">
										<label class="name">Số lượng:</label>
									</div>
									<div class="col-4">
										<div class="input-counter input-group number-spinner">
											<div class="input-group-append">
												<button type="button" class="btn-subtract btn">
													<i class="fa fa-minus"></i>
												</button>
											</div>
											<input name="qty" type="text" class="form-control counter text-align" data-default="1" data-min="1" data-max="10">
											 <div class="input-group-prepend">
												<button type="button" class="btn-add btn">
													<i class="fa fa-plus"></i>
												</button>
											</div>
										</div>
									</div>
								</div>
								<hr>
							</div>
						</div>
						<input name="productid_hidden" type="hidden" value="{{$product_details->product_id}}" />
						<button type="submit" class="button"><a>Mua Ngay <i class="fa fa-chevron-right"></i></a></button>
					</form>
					</div>
				</div>
				<div class="bg_banner2"></div>
				<div class="services">
					<img src="images/ser.PNG" alt="">
				</div>
				<div class="bg_banner2"></div>
				<div class="img-choose-size">
					<img src="images/size.PNG" alt="">
				</div>
</div>
        </div>

	@endsection
	@section('js')
	<!-- InstanceBeginEditable name="js" -->
		<script src="js/jquery.input-counter.min.js"></script>
		<script src="js/script.js"></script>
		<script src="js/zoomsl.js"></script> 
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
	    </script>
		<!-- InstanceEndEditable --> 
		<script>
			$(window).resize(function(e){
				var chieucao = $(".product_img").height();
				$(".product_background").height(chieucao);
			})
		</script>
	@endsection
	
</main>
