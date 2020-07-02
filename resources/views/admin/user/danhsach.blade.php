@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh Sách Người Dùng
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
          <h3 class="text-muted inline m-t-sm m-b-sm">Có {{$user->total()}} Người dùng</h3>           
      </div>
      <div class="col-sm-4">
      </div>
<!--       <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div> -->
    </div>
    <div class="table-responsive">
                      
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
<!--             <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label> 
            </th> -->

             <th>Id </th>
            <th>Họ và Tên </th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Giới Tính</th>
            <th>Địa chỉ</th>
            <th>Thao tác</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        	 @foreach($user as $user1)
          <tr>
           <!--  <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td> -->
            <td>{{ $user1->id}}</td>
            <td>{{ $user1->name}}</td>
            <td>{{ $user1->phone}}</td>
            <td>{{ $user1->email }}</td>
            
            <td>{{ $user1->gender }}</td>
            <td>{{ $user1->address}}</td>
           
            <td>
              <a href="{{URL::to('/edit/'.$user1->id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active">Sửa</i></a>
              <a  href="{{URL::to('/xoa/'.$user1->id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text">Xóa</i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row"> 
        <div class="col-sm-7 text-right text-center-xs">                
             {!! $user->render() !!}
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection