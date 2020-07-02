@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                         Cập nhật thông tin Người dùng
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
                      
            
                        <div class="panel-body">

                            <div class="position-center">
                               
                           <form  action="{{URL::to('/edit',$user->id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Họ và Tên</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{ $user->name}}">
                                </div>
                                   
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại</label>
                                    <input type="text" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Số điện thoại" value="{{ $user->phone }}">
                                </div> 

                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" name="email" class="form-control" id="exampleInputEmail1" value="{{ $user->email }}" readonly>
                                </div>
                                

                               <!--  <div class="form-group">
                                
                                  <input type="checkbox" id="changePassword" name="changePassword">
                                    <label for="exampleInputEmail1">Mật khẩu</label>
                                    <input type="password" name="password" class="form-control password" id="exampleInputEmail1" disabled="" placeholder="Nhap mat khau " value="">
                                </div> -->
                                 <a href="{{URL::to('/suaPass/'.$user->id)}}">Bạn muốn đổi mật khẩu?</a>
                            
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Mật khẩu</label>
                                    <input type="password" name="password" class="form-control password" id="exampleInputEmail1" disabled="" value="{{ old('passwordAgain') }}">
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Giới tính</label>
                                      <input type="radio" name="gender" value="male"
                                    @if($user->gender=="male")
                                    {{"checked"}}

                                      @endif  

                                >Nam
                                <input type="radio" name="gender" value="female"
                                @if($user->gender=="female")
                                    {{"checked"}}

                                @endif  >Nữ
                                <input type="radio" name="gender" value="other"
                                 @if($user->gender=="other")
                                    {{"checked"}}

                                @endif  >khác
                                </div>

                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Địa chỉ</label>
                                    <input type="text" name="address" class="form-control" id="exampleInputEmail1" value="{{ $user->address }}">
                                </div>

                                <button type="submit" name="them_user" class="btn btn-info">Cập nhật Người Dùng</button>
                                
                            <a href="{{asset('/danhsach')}}"><i class="fa fa-arrow-right"></i> <span>Về trang quản lý người dùng</span></a>
                                </form>

                            </div>

                        </div>
                    </section>

            </div>
     
@endsection
@section('script')
<script>
  $(document).ready(function(){
    $("#changePassword").change(function(){
        if($(this).is(":checked"))
        {
          $(".password").removeAttr('disabled');
        }
        else
        {
          $(".password").attr('disabled','');
        }
      });

  });
</script>
@endsection