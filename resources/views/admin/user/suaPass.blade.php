@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                         Đổi mật khẩu
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
                               
                           <form  action="{{URL::to('/suaPass/'.$user->id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                
                                

                                <div class="form-group">
                                  <input type="checkbox" id="changePassword" name="changePassword">
                                    <label for="exampleInputEmail1">Mật khẩu mới</label>
                                    <input type="password" name="password" class="form-control password" id="exampleInputEmail1"  placeholder="Nhap mat khau " value="">
                                </div>
                            
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Xác nhận mật khẩu</label>
                                    <input type="password" name="passwordAgain" class="form-control password" id="exampleInputEmail1"  value="{{ old('passwordAgain') }}">
                                </div>
                                  
                            
                               
                                 
                                <button type="submit" name="them_user" class="btn btn-info">Đổi mật khẩu</button>
                                
                            <a href="{{URL::to('/edit',$user->id)}}"><i class="fa fa-arrow-right"></i> <span>Quay lại</span></a>
                                </form>

                            </div>

                        </div>
                    </section>

            </div>
     
@endsection
