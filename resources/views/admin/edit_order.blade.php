@extends('admin_layout')
@section('admin_content')
<div id="edit_order">
   
    <div class="row">

        <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cập nhập Order
                        </header>
                         <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">

                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-order/'.$order->order_id)}}" method="post">
                                    {{ csrf_field() }}
                                <h3>Thông tin người nhận</h3>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control"  placeholder="Nhập email" value="{{$order->shipping->shipping_email}}">
                                </div>
                                <div class="form-group">
                                    <label >Tên</label>
                                    <input type="text" name="name" class="form-control"  placeholder="Nhập tên" value="{{$order->shipping->shipping_name}}">
                                </div>
                                <div class="form-group">
                                    <label >Địa chỉ</label>
                                    <textarea style="resize: none" rows="3" class="form-control" name="address" placeholder="Mô tả danh mục">{{$order->shipping->shipping_address}}</textarea>
                                </div>


                                <table class="table table-striped b-t b-light">
                                    <thead>
                                      <tr>
                                       
                                        <th>Tên sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Giá</th>
                                        <th style="width:30px;"></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($order->orderDetail as $key => $orderDetail)
                                      <tr>
                                        <td>{{$orderDetail->product_name}}</td>
                                        <td><input type="number" class="form-control" value="{{$orderDetail->product_sales_quantity }}"name="quantity[{{$orderDetail->order_details_id}}]"></td>
                                        <td>{{number_format($orderDetail->product_price * $orderDetail->product_sales_quantity).' '.'vnđ'}}</td>

                                      </tr>
                                      
                                      @endforeach
                                      <tr>
                                          <td></td>
                                          <td></td>
                                          <td>Tổng tiền : {{$order->order_total}} vnđ</td>
                                      </tr>
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-info">Save</button>
              <a href="{{asset('/manage-order')}}"><i class="fa fa-arrow-right"></i> <span>Quay Về trang quản lý đơn hàng</span></a>
                                </form>
                            </div>
                        </div>
                    </section>

            </div>
       
    </div>
</div>

@endsection