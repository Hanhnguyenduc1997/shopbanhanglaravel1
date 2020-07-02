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
					<a href="{{URL::to('/trang-chu')}}"><i class="fa fa-chevron-left"></i> tiếp tục mua hàng</a>
				</div>
				<div class="support">
					<img src="images/support.PNG" alt="">
				</div>
			</div>
			<div class="title">
					<h2>thông tin đơn hàng</h2>
				</div>

			<div class="table-cart">
				<table class="table table-hover table-responsive-md">
					<thead>
						<tr>
							<th>SỐ THỨ TỰ </th>
							<th>NGÀY ĐẶT</th>
							<th>GIÁ TRỊ</th>
							<th>PHÍ GIAO</th>
							<th>TỔNG CỘNG</th>
							<th>TÌNH TRẠNG</th>
							<th>HÀNH ĐỘNG</th>
						</tr>
					</thead>
					<tbody>						
					@foreach($order as $key => $or)
					@if($or->order_status=="Đang chờ xử lý")
			          	<tr>
				            <td>{{ $key+1}}</td>
				            <td>{{$or->created_at}}</td>
				            <td>{{$or->order_total}}đ</td>
				            <td>
				            	@php
				            	$ship = 0;
				            	$real_integer = filter_var($or->order_total, FILTER_SANITIZE_NUMBER_INT);

				            	if($real_integer < 500000){
									$ship = $real_integer * 0.1;
					            }

				            	@endphp
				            {{number_format($ship)}}</td>
				      
				            <td>
				        	{{$or->order_total}}đ
				            </td>
				            <td>
				            	@if($or->order_status=="Đang chờ xử lý")
									Mới đặt
								@endif
				            </td>
				           
				            <td>
				              <a href="{{URL::to('/viewDon',$or->order_id)}}" class="active styling-edit" ui-toggle-class="">
				                <i class="fa fa-eye text-success text-active">xem</i></a>

				              <a onclick="deleteDon(this)" class="active styling-delete" data-toggle="modal" data-id={{$or->order_id}} data-target="#delete-order"><i class="fa fa-times text-danger text">Hủy</i></a>
				            </td>
			          </tr>
			          @endif
          			@endforeach
          		<!-- modal delete -->
				<div class="modal fade" id="delete-order" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
							Bạn có chắc chắn muốn xoá đơn hàng này?
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
			
		</div>
	</div>
	<script>
		     //xoá sản phẩm khỏi giỏ hàng
        var cartId = null;
        var url = null;
        function deleteDon(elem){
        	cartId = $(elem).attr('data-id');
        	console.log(cartId);
        	url = "{{asset('/deleteDon')}}"+"/"+cartId;
        	console.log(url);
        	$('.frm-delete-cart').attr('action',url);
        };
	</script>
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.js"></script>
</body>
@endsection
