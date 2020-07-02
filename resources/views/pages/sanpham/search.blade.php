@extends('master') 
@section('content')
<body>
    <div class="container headeing">
    <div class="features_items"><!--features_items-->     
        <div class="container product-group">
            <h2 class="title text-center">Kết quả tìm kiếm</h2>
        @if(session('nosearch')) 
            <div class="alert alert-warning" role="alert">
                {{session('nosearch')}}
            </div>
        @else
            <p class="title text-center">Tìm thấy {{$search_product->total()}} sản phẩm</p>
            <div class="sort-product">
                  <div class="dropdown">
                   <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Sắp Xếp
                   </a>
                   <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{route('smoinhat',$keywords)}}">Mới Nhất</a>
                        <a class="dropdown-item" href="{{route('smoinhat',$keywords)}}">Bán Chạy</a>
                        <a class="dropdown-item" href="{{route('sgiatangdan',$keywords)}}">Giá tăng dần</a>
                       <a class="dropdown-item" href="{{route('sgiagiamdan',$keywords)}}">Giá giảm dần</a>
                   </div>
                  </div>
            </div>  

            <div class="row product">
                @foreach($search_product as $key => $product)
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

    </div><!--features_items--> 
    
    <div class="container">
          <nav aria-label="Page navigation">
              <ul class="pagination justify-content-center">
                {{ $search_product->appends($_GET)->links() }}
            </ul>
          </nav>
        </div>
</div>
        <!--/recommended_items-->
        @endif
</body>
@endsection