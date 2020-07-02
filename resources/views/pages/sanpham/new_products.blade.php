@extends('master')
@section('content')
<base href="{{asset('public/frontend')}}/">

	<main>
		<div class="container headeing">
		  <nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="{{asset('/')}}">trang chủ</a></li>
			    <li class="breadcrumb-item active" aria-current="page"><span>sản phẩm mới</span></li>
		      </ol>
		  </nav>
		  <div class="sort-product">
			  <div class="dropdown">
			   <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Sắp Xếp
			   </a>
			   <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
					<a class="dropdown-item" href="{{route('sanphammoinhat',$slug)}}">Bán Chạy</a>
					<a class="dropdown-item" href="{{route('giatangdan',$slug)}}">Giá tăng dần</a>
				   <a class="dropdown-item" href="{{route('giagiamdan',$slug)}}">Giá giảm dần</a>
			   </div>
			  </div>
		  </div>
		  <h2 class="title text-center">Có {{ $all_product->total() }} sản phẩm mới trong tuần</h2>
        </div>
		<div class="clearfix"></div>  
	  <div class="container product-group">
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
		</div>
		<div class="clearfix"></div>
		<div class="container">
		  <nav aria-label="Page navigation">
			  <ul class="pagination justify-content-center">
				{{ $all_product->render() }}
		    </ul>
		  </nav>
        </div>
	</main>
@endsection