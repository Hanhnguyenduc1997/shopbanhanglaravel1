@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm người dùng
                        </header>
                           <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>                             
                            @if(count($errors)>0)
                <div class="alert alert-danger " >
                    @foreach($errors->all() as $err)
                    {{$err}}<br>
                    @endforeach
                </div>
                @endif
                      

                
              <!--   @if(session('message'))
                <div class="alert alert-danger " >
                    {{session('message')}}
                </div>
                @endif -->
            
                        <div class="panel-body">

                            <div class="position-center">
                                
                           <form role="form" action="{{URL::to('/them')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Họ và Tên</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{ old('name') }}">
                                </div>
                                   
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại</label>
                                    <input type="text" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Số điện thoại" value="{{ old('phone') }}">
                                </div> 
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" name="email" class="form-control" id="exampleInputEmail1" value="{{ old('email') }}">
                                </div>
                                <label for="exampleInputEmail1">Quyền</label>


                                <input type="radio" name="level" value="1">Admin
                                <input type="radio" name="level"checked="" value="0">Thường

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mật Khẩu</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputEmail1" value="{{ old('password') }}">
                                </div>
                            
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Xác nhận mật khẩu</label>
                                    <input type="password" name="passwordAgain" class="form-control" id="exampleInputEmail1" value="{{ old('passwordAgain') }}">
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Giới tính</label>
                                      <select name="gender" class="form-control input-sm m-bot15">
                                             <option value="male">Nam</option>
                                            <option value="femal">Nữ</option>
                                            <option value="other">Khác</option>
                                    </select>
                                </div>

                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Địa chỉ</label>
                                    <input type="text" name="address" class="form-control" id="exampleInputEmail1" placeholder="{{ old('address') }}">
                                </div>
                            
                            
                               
                                 
                                <button type="submit" name="them_user" class="btn btn-info">Thêm Người Dùng</button>
                                
                            <a href="{{asset('/login')}}"><i class="fa fa-arrow-right"></i> <span>Quay Về trang quản lý</span></a>
                                </form>

                            </div>

                        </div>
                    </section>

            </div>
@endsection