@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  
  <div class="panel panel-default">
    <div class="panel-heading">
     Thông tin khách hàng
    </div>
    
    
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
           
            <th>Tên khách hàng</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        
          <tr>
                      
            <td>{{$order->user->name}}</td> 
            <td>{{$order->user->phone}}</td>
            <td>{{$order->user->email}}</td>
          
          </tr>
     
        </tbody>
      </table>

    </div>
   
  </div>
</div>
<br>
<div class="table-agile-info">
  
  <div class="panel panel-default">
    <div class="panel-heading">
     Thông tin vận chuyển
    </div>
    
    
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
           
            <th>Tên người nhận hàng</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        
          <tr>

            <td>{{$order->shipping->shipping_name}}</td>
            <td>{{$order->shipping->shipping_address}}</td>
            <td>{{$order->shipping->shipping_phone}}</td>
            <td>{{$order->shipping->shipping_email}}</td>
                     
          </tr>
     
        </tbody>
      </table>

    </div>
   
  </div>
</div>
<br>
<div class="table-agile-info">
  
  <div class="panel panel-default">
    <div class="panel-heading">
      Chi tiết đơn hàng
    </div>

    
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
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
            <td>{{$orderDetail->product_sales_quantity}}</td>
            <td>{{number_format($orderDetail->product_price).' '.'vnđ'}}
            </td>
           
          </tr>
          @endforeach
              <tr>
                <td></td>
                <td></td>
                <td>Tổng tiền : {{$order->order_total}} vnđ</td>
            </tr>
        </tbody>
      </table>

    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <!-- <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small> -->
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
<!--             <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li> -->
              <a href="{{asset('/manage-order')}}"><i class="fa fa-arrow-right"></i> <span>Quay Về trang quản lý đơn hàng</span></a>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection