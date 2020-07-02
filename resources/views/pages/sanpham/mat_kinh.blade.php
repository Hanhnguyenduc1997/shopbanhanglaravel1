@extends('master')
@section('content')
<base href="{{asset('public/frontend')}}/">
<main>
		<div class="container headeing">
		  <nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="{{asset('/')}}">trang chủ</a></li>
				<li class="breadcrumb-item"><a href="{{asset('/san-pham')}}">sản phẩm</a></li>
			    <li class="breadcrumb-item active" aria-current="page"><span>mắt kính</span></li>
		      </ol>
		  </nav>
		  <div class="sort-product">
			  <div class="dropdown">
			   <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Sắp Xếp
			   </a>

			   <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
					<a class="dropdown-item" href="{{route('sanphammoinhat',$slug)}}">Mới Nhất</a>
					<a class="dropdown-item" href="{{route('sanphammoinhat',$slug)}}">Bán Chạy</a>
					<a class="dropdown-item" href="{{route('giatangdan',$slug)}}">Giá tăng dần</a>
				   <a class="dropdown-item" href="{{route('giagiamdan',$slug)}}">Giá giảm dần</a>
			   </div>
			  </div>
		  </div>
		  <h2 class="title text-center">Có {{$product_mat_kinh->total()}} sản phẩm</h2>
        </div>
		<div class="clearfix"></div>
		<div class="container product-group">
			<div class="row product">
				@foreach($product_mat_kinh as $key => $kinh)
				<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
					<div class="item">
						<div class="thumb">
							<a href="{{('/chi-tiet-san-pham/'.$kinh->product_id)}}">
								<img src="{{ URL::to('/public/uploads/product/'.$kinh->product_image)}}" alt="" class="product_img">
							</a>
							<div class="product_background"></div>
						</div>
						<div class="caption">
							<div class="caption-left">
								<h3 class="product-title">{{$kinh->product_name}}</h3>
								<p class="product-id">Mã sản phẩm: {{$kinh->product_id}}</p>
							</div>
							<div class="caption-right">
								<p class="product-price">{{number_format($kinh->product_price).' '.'VNĐ'}}</p>
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
				{{$product_mat_kinh->render()}}
		    </ul>
		  </nav>
        </div>
	</main>
@endsection