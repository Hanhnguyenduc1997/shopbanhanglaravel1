@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm sản phẩm
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
                                <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục" required="" value="{{ old('product_name') }}"
                                    oninvalid="this.setCustomValidity('Nhập tên sản phẩm.')" 
                                    onchange="this.setCustomValidity('')">
                                </div>

                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Slug</label>
                                      <select name="product_slug" class="form-control input-sm m-bot15" value="{{ old('product_slug') }}" id="slug">
                                        @foreach($cate_product as $key => $cate)
                                            <option value="{{$cate->slug_category_product}}">{{$cate->slug_category_product}}</option>
                                        @endforeach 
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                      <select name="product_cate" class="form-control input-sm m-bot15" required="" value="{{ old('product_cate') }}" id="category_name">
                                        
                            <!--                 <option value="{{$cate->category_id}}">{{$cate->category_name}}</option> -->
                                
                                            
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select name="product_status" class="form-control input-sm m-bot15" required="" value="{{ old('product_status') }}">
                                            <option value="0">Ẩn</option>
                                            <option value="1">Hiển thị</option>
                                            
                                    </select>
                                </div>
                               
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                                    <input type="number" name="product_price" class="form-control" id="exampleInputEmail1" placeholder="Giá sản phẩm" required="" value="{{ old('product_price') }}" min="1000"
                                    oninvalid="this.setCustomValidity('Nhập giá sản phẩm lớn hơn 1000 VNĐ.')" 
                                    onchange="this.setCustomValidity('')">
                                </div>
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm giảm</label>
                                    <input type="number" name="product_price_discount" class="form-control" id="exampleInputEmail1" placeholder="Giá sản phẩm giảm" value="{{ old('product_price_discount') }}" min="1000"
                                    oninvalid="this.setCustomValidity('Nhập giá sản phẩm lớn hơn 1000 VNĐ.')" 
                                    onchange="this.setCustomValidity('')">
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1" required="" value="{{ old('product_image') }}"
                                    oninvalid="this.setCustomValidity('Chọn hình ảnh cho sản phẩm.')" 
                                    onchange="this.setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="product_desc" id="exampleInputPassword1" placeholder="Mô tả sản phẩm" required="" value="{{ old('product_desc') }}"
                                    oninvalid="this.setCustomValidity('Nhập mô tả cho sản phẩm.')" 
                                    onchange="this.setCustomValidity('')"></textarea>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="product_content" id="exampleInputPassword1" placeholder="Nội dung sản phẩm" required="" value="{{ old('product_content') }}"
                                    oninvalid="this.setCustomValidity('Nhập mô tả chi tiết cho sản phẩm.')" 
                                    onchange="this.setCustomValidity('')"></textarea>
                                </div>
                                 
                                <button type="submit" name="add_product" class="btn btn-info">Thêm sản phẩm</button>

                                <a href="{{asset('/all-product')}}"><i class="fa fa-arrow-right"></i> <span>Quay Về trang quản lý sản phẩm</span></a>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
<script>

    $(document).ready(function(){
    $("#slug").change(function(){
        var slug=$(this).val();
        $.get("{{asset('/add_product/ajax/category_name')}}"+"/"+slug,function(data){
            $("#category_name").html(data);
        });
    });

});

</script>
@endsection