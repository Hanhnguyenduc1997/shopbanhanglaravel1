@extends('master')
@section('content')
<main>
		<div class="container ads">
			<div class="row">
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
					<div class="a-item">
						<p><span><i class="fa fa-plane"></i> miễn phí giao hàng toàn quốc</span> với hóa đơn trên 500,000 vnđ</p>
					</div>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
					<div class="a-item">
						<p><span><i class="fa fa-refresh"></i> chấp nhận đổi trả </span>trong vòng 3 ngày tính từ ngày mua hàng</p>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="container product-group">
			<div class="title">
				<h2>sản phẩm mới</h2>
			</div>
			<div class="row product">
				@foreach($all_product as $key => $product)
				<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
					<div class="item">
						<div class="thumb">
							<a href="{{asset('/chi-tiet-san-pham/'.$product->product_id)}}">
								<img src="{{ URL::to('/public/uploads/product/'.$product->product_image)}}" alt="" class="product_img">
							</a>
							<div class="product_background"></div>
						</div>
						<div class="caption">
							<div class="caption-left">							
								<h3 class="product-title">{{$product->product_name}}</h3>					
								<p class="product-id">Mã sản phẩm: {{$product->product_id}}</p>
							</div>
							<div class="caption-right">
								<p class="product-price">{{number_format($product->product_price).' '.'VNĐ'}}</p>
							</div>
						</div>
					</div>
				</div>	
				@endforeach
			</div>
			<div class="button"><a href="{{asset('/san-pham-moi')}}">xem thêm <i class="fa fa-chevron-right"></i></a></div>
		</div>


		<div class="clearfix"></div>
		<div class="container bg_banner2"></div>
		<div class="container product-group">
			<div class="title">
				<h2>váy thời trang</h2>
			</div>
			<div class="row product">
				@foreach($product_vay as $key => $product)
				<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
					<div class="item">
						<div class="thumb">
							<a href="{{asset('/chi-tiet-san-pham/'.$product->product_id)}}">
								<img src="{{ URL::to('/public/uploads/product/'.$product->product_image)}}" alt="" class="product_img">
							</a> 
							<div class="product_background"></div>
						</div>
						<div class="caption">
							<div class="caption-left">							
								<h3 class="product-title">{{$product->product_name}}</h3>					
								<p class="product-id">Mã sản phẩm: {{$product->product_id}}</p>
							</div>
							<div class="caption-right">
								<p class="product-price">{{number_format($product->product_price).' '.'VNĐ'}}</p>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			<div class="button"><a href="{{asset('/san-pham/'.$product->product_slug)}}">xem thêm <i class="fa fa-chevron-right"></i></a></div>
		</div>


		<div class="clearfix"></div>
		<div class="container bg_banner2"></div>
		<div class="container product-group">
			<div class="title">
				<h2>đồ bộ châu âu</h2>
			</div>
			<div class="row product">
				@foreach($product_dobo as $key => $product)
				<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
					<div class="item">
						<div class="thumb">
							<a href="{{asset('/chi-tiet-san-pham/'.$product->product_id)}}">
								<img src="{{ URL::to('/public/uploads/product/'.$product->product_image)}}" alt="" class="product_img">
							</a>
							<div class="product_background"></div>
						</div>
						<div class="caption">
							<div class="caption-left">							
								<h3 class="product-title">{{$product->product_name}}</h3>					
								<p class="product-id">Mã sản phẩm: {{$product->product_id}}</p>
							</div>
							<div class="caption-right">
								<p class="product-price">{{number_format($product->product_price).' '.'VNĐ'}}</p>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			<div class="button"><a href="{{asset('/san-pham/'.$product->product_slug)}}">xem thêm <i class="fa fa-chevron-right"></i></a></div>
		</div>


		<div class="clearfix"></div>
		<div class="container bg_banner2"></div>
		<div class="container product-group">
			<div class="title">
				<h2>áo khoác</h2>
			</div>
			<div class="row product">
				@foreach($product_aokhoac as $key => $product)
				<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
					<div class="item">
						<div class="thumb">
							<a href="{{asset('/chi-tiet-san-pham/'.$product->product_id)}}">
								<img src="{{ URL::to('/public/uploads/product/'.$product->product_image)}}" alt="" class="product_img">
							</a>
							<div class="product_background"></div>
						</div>
						<div class="caption">
							<div class="caption-left">							
								<h3 class="product-title">{{$product->product_name}}</h3>					
								<p class="product-id">Mã sản phẩm: {{$product->product_id}}</p>
							</div>
							<div class="caption-right">
								<p class="product-price">{{number_format($product->product_price).' '.'VNĐ'}}</p>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			<div class="button"><a href="{{asset('/san-pham/'.$product->product_slug)}}">xem thêm <i class="fa fa-chevron-right"></i></a></div>
		</div>
		<div class="clearfix"></div>
		<div class="container bg_banner2"></div>
		<div class="container testi">
		    <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
			    <ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
				</ol>
			    <div class="carousel-inner" role="listbox">
					<div class="carousel-item active"> 
					  	<img  src="{{asset('public/frontend/images/test1.png')}}" alt="First slide">
						<h5>Trúc Ly, <span>đã chia sẽ trên trang cá nhân của mình</span></h5>
						<p>Mình đã mua hàng ở shop rất nhiều lần, sản phẩm ở đây khá là đẹp, giá cả phải chăng, đặc biệt là hệ thống chăm sóc khách hàng rất là tận tình. Giao hàng rất nhanh, thường chỉ mất 8 tiếng là mình có thể nhận được hàng, đây là một nơi rất đáng để chị em phụ nữ mua sắm và làm đẹp cho bản thân, giới thiệu cho bạn bè và gia đình.</p>
				  	</div>
					<div class="carousel-item"> 
						<img src="{{asset('public/frontend/images/test2.png')}}" alt="Second slide">
						<h5>Khánh Linh, <span>một khách hàng rất hài lòng với dịch vụ</span></h5>
						<p>Mình là khách hàng mới, nhưng rất hài lòng với dịch vụ ở đây, hàng hóa ở đây thật đa dạng và phong phú về mẩu mã, có rất nhiều mẫu quần áo đẹp, đặc biệt là mình còn có thể hoàn trả lại sản phẩm nếu không vừa ý. Nhân viên giao hàng rất thân thiện, sản phẩm đúng với hình ảnh, mình sẽ mua sắm ở shop nhiều lần nữa.</p>
					</div>
				  	<div class="carousel-item"> 
						<img src="{{asset('public/frontend/images/test3.png')}}" alt="Third slide">
						<h5>Mỹ Dung, <span>một khách hàng lâu năm của shop</span></h5>
						<p>Mình là một người mẫu thời trang nên rất đau đầu về chuyện ăn mặc, nhưng từ khi biết đến shop, thì mình đã không còn đâu đầu về việc phải suy nghỉ hôm nay sẽ mặc gì. Shop có rất nhiều sản phẩm đa dạng chon mình, và nhân viên phục vụ rất tận tình, tư vấn cho mình những thứ mới mẽ, từ cách phối đồ đến chọn màu, thực sự mình rât thích</p>
					 </div>
				</div>
				  <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
			</div>
</main>
@endsection

