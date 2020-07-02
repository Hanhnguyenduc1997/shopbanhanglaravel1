@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm danh mục sản phẩm
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
                                <form role="form" action="{{URL::to('/save-category-product')}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="tendanhmuc">Tên danh mục</label>
                                    <input type="text" name="category_product_name" class="form-control" id="tendanhmuc" placeholder="Tên danh mục" required="" value="{{ old('category_product_name') }}"
                                    oninvalid="this.setCustomValidity('Nhập tên danh mục sản phẩm.')" 
                                    onchange="this.setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" name="slug_category_product" class="form-control" id="slug" placeholder="Tên danh mục" required="" 
                                    value="{{ old('slug_category_product') }}"
                                    oninvalid="this.setCustomValidity('Nhập slug sản phẩm.')" 
                                    onchange="this.setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="category_product_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục" required="" value="{{ old('category_product_desc') }}"
                                    oninvalid="this.setCustomValidity('Nhập mô tả danh mục sản phẩm.')" 
                                    onchange="this.setCustomValidity('')"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Type</label>
                                      <select name="category_product_type" class="form-control input-sm m-bot15">
                                            <option value="0">Sản Phẩm</option>
                                            <option value="1">Phụ Kiện</option>
                                            
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select name="category_product_status" class="form-control input-sm m-bot15">
                                            <option value="0">Ẩn</option>
                                            <option value="1">Hiển thị</option>
                                            
                                    </select>
                                </div>
                               
                                <button type="submit" name="add_category_product" class="btn btn-info">Thêm danh mục</button>

                                <a href="{{asset('/all-category-product')}}"><i class="fa fa-arrow-right"></i> <span>Quay Về trang quản lý danh mục</span></a>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
<script>
    $(document).ready(function(){
    $("#tendanhmuc").change(function (){
                // console.log('thanh cong vao script');
                var tendanhmuc, slug;
 
                //Lấy text từ thẻ input tendanhmuc 
                tendanhmuc = document.getElementById("tendanhmuc").value;
                console.log(tendanhmuc);
                //Đổi chữ hoa thành chữ thường
                slug = tendanhmuc.toLowerCase();
                // console.log(slug);
                //Đổi ký tự có dấu thành không dấu
                slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                slug = slug.replace(/đ/gi, 'd');
                //Xóa các ký tự đặt biệt
                slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                //Đổi khoảng trắng thành ký tự gạch ngang
                slug = slug.replace(/ /gi, "-");
                //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                slug = slug.replace(/\-\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-/gi, '-');
                slug = slug.replace(/\-\-/gi, '-');
                //Xóa các ký tự gạch ngang ở đầu và cuối
                slug = '@' + slug + '@';
                slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                //In slug ra textbox có id “slug”
                $("#slug").val(slug);
                console.log(slug);
                // document.getElementById('slug').value = slug;
            });
    });
</script>
@endsection