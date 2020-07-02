<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Request as Res;
use Auth;
use Illuminate\Support\Carbon;


use App\Products;
session_start();
class ProductController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            if(Auth::check()){
                return Redirect::to('dashboard');
            }
            return Redirect::to('admin')->send();
        }
    }
    public function add_product(){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get(); 
        //$brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get(); 
        return view('admin.add_product')->with('cate_product', $cate_product);
    }
    public function all_product(){
        $this->AuthLogin();
    	$all_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
      //  ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->orderby('tbl_product.product_id','desc')->paginate(10);
        $all_product1 = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->get();
    	$manager_product  = view('admin.all_product')->with('all_product',$all_product)->with('all_product1',$all_product1);
    	return view('admin_layout')->with('admin.all_product', $manager_product);

    }
    public function save_product(Request $request){
        $this->AuthLogin();
    	$data = array();
    	$data['product_name'] = $request->product_name;
        $data['product_slug'] = $request->product_slug;
    	$data['product_price'] = $request->product_price;
        $data['product_price_discount'] = $request->product_price_discount;
    	$data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['product_status'] = $request->product_status;
        $data['product_image'] = $request->product_status;
        $data['created_at'] = now();
        $data['updated_at'] = now();
        $get_image = $request->file('product_image');
      
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->insert($data);
            Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('add-product');
        }
        $data['product_image'] = '';
    	DB::table('tbl_product')->insert($data);
    	Session::put('message','Thêm sản phẩm thành công');
    	return Redirect::to('all-product');
    }
    public function unactive_product($product_id){
         $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
        Session::put('message','Không kích hoạt sản phẩm thành công');
        return Redirect::to('all-product');

    }
    public function active_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
        Session::put('message','Không kích hoạt sản phẩm thành công');
        return Redirect::to('all-product');
    }
    public function edit_product($product_id){
         $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get(); 
 //       $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get(); 

        $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();

        $manager_product  = view('admin.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product);

        return view('admin_layout')->with('admin.edit_product', $manager_product);
    }
    public function update_product(Request $request,$product_id){
         $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_slug'] = $request->product_slug;
        $data['product_price'] = $request->product_price;
        $data['product_price_discount'] = $request->product_price_discount;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        //$data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
        $data['updated_at'] = now();
        $get_image = $request->file('product_image');
        
        if($get_image){
                    $get_name_image = $get_image->getClientOriginalName();
                    $name_image = current(explode('.',$get_name_image));
                    $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                    $get_image->move('public/uploads/product',$new_image);
                    $data['product_image'] = $new_image;
                    DB::table('tbl_product')->where('product_id',$product_id)->update($data);
                    Session::put('message','Cập nhật sản phẩm thành công');
                    return Redirect::to('all-product');
        }
            
        DB::table('tbl_product')->where('product_id',$product_id)->update($data);
        Session::put('message','Cập nhật sản phẩm thành công');
        return Redirect::to('all-product'); 
    }
    public function delete_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        Session::put('message','Xóa sản phẩm thành công');
        return Redirect::to('all-product');
    }
    //End Admin Page 
    public function details_product($product_id){

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $cate_product_name = DB::table('tbl_category_product')->select('category_name')->orderby('category_id','desc')->get(); 

     //   $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

        $details_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        //->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_product.product_id',$product_id)->first();

        $related_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        //->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_category_product.category_id',$details_product->category_id)->where('tbl_product.product_slug',$details_product->product_slug)->get();

    if($details_product->category_type == '1'){
        return view('pages.sanpham.show_details_phu_kien')
        ->with('category',$cate_product)
        ->with('product_details',$details_product)
        ->with('relate',$related_product)
        ->with('category_name',$cate_product_name); 
    }
    else{
        return view('pages.sanpham.show_details_san_pham')
        ->with('category',$cate_product)
        ->with('product_details',$details_product)
        ->with('relate',$related_product)
        ->with('category_name',$cate_product_name); 
    }

    }

    public function all_products(){
        $slug = Res::segment(1);

        $all_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->where('category_type','0')
        ->orderby('product_id','desc')
        ->paginate(28); 
        return view('pages.sanpham.all_products')
        ->with('all_product',$all_product)
        ->with('slug',$slug);
    }

    public function new_products(){
        $slug = Res::segment(1);
        $now = Carbon::now();
       
        $from = Carbon::now()->subDays(7);

        $all_product = DB::table('tbl_product')
            ->where('product_status','0')
            ->whereBetween('created_at', [$from, $now])
            ->orderby('updated_at','desc')
            ->paginate(28); 
        return view('pages.sanpham.new_products')
        ->with('all_product',$all_product)
        ->with('slug',$slug);
       
    }

    public function gia_tang_dan($slugCate){
        $slug = DB::table("tbl_category_product")
        ->select('category_name','slug_category_product')
        ->where('slug_category_product', $slugCate)
        ->first();
        if($slug){
           
            $idCate = DB::table('tbl_category_product')->where('slug_category_product',$slugCate)->first();
            $productByCate = DB::table('tbl_product')
            ->where('product_status','0')
            ->where('category_id',$idCate->category_id)
            ->orderby('product_price','asc')
            ->paginate(28);

            return view('pages.sanpham.productByCate',['productByCate'=>$productByCate,'slug' => $slug]);
        }
        else{

            $slug = Res::segment(1);
            switch ($slug) {
                case 'san-pham':
                    $all_product = DB::table('tbl_product')
                    ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
                    ->where('category_type','0')
                    ->orderby('product_price','asc')
                    ->paginate(28); 
                    return view('pages.sanpham.all_products')
                    ->with('all_product',$all_product)
                    ->with('slug', $slug);
                    break;
                default:
                    $slug = Res::segment(1);
                    $now = Carbon::now();
                   
                    $from = Carbon::now()->subDays(7);

                    $all_product = DB::table('tbl_product')
                        ->where('product_status','0')
                        ->whereBetween('created_at', [$from, $now])
                        ->orderby('product_price','asc')
                        ->paginate(28); 
                    return view('pages.sanpham.new_products')
                    ->with('all_product',$all_product)
                    ->with('slug',$slug);
                    break;
            }
            
        }
         
    }

    public function gia_giam_dan($slugCate){
        $slug = DB::table("tbl_category_product")
        ->select('category_name','slug_category_product')
        ->where('slug_category_product', $slugCate)
        ->first();
        if($slug){
            $idCate = DB::table('tbl_category_product')->where('slug_category_product',$slugCate)->first();
            $productByCate = DB::table('tbl_product')
            ->where('product_status','0')
            ->where('category_id',$idCate->category_id)
            ->orderby('product_price','desc')
            ->paginate(28);

            return view('pages.sanpham.productByCate',['productByCate'=>$productByCate,'slug' => $slug]);
        }
        else{
            $slug = Res::segment(1);
            switch ($slug) {
                case 'san-pham':
                    $all_product = DB::table('tbl_product')
                    ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
                    ->where('category_type','0')
                    ->orderby('product_price','desc')
                    ->paginate(28);  
                    return view('pages.sanpham.all_products')
                    ->with('all_product',$all_product)
                    ->with('slug', $slug);
                    break;
                
                default:
                    $slug = Res::segment(1);
                    $now = Carbon::now();
                   
                    $from = Carbon::now()->subDays(7);

                    $all_product = DB::table('tbl_product')
                        ->where('product_status','0')
                        ->whereBetween('created_at', [$from, $now])
                        ->orderby('product_price','desc')
                        ->paginate(28); 
                    return view('pages.sanpham.new_products')
                    ->with('all_product',$all_product)
                    ->with('slug',$slug);
                    break;
                    break;
            }
            
        }
    }

    public function newest_product($slugCate){
        $slug = DB::table("tbl_category_product")
        ->select('category_name','slug_category_product')
        ->where('slug_category_product', $slugCate)
        ->first();
        if($slug){
            $idCate = DB::table('tbl_category_product')->where('slug_category_product',$slugCate)->first();
            $productByCate = DB::table('tbl_product')
            ->where('product_status','0')
            ->where('category_id',$idCate->category_id)
            ->orderby('created_at','desc')
            ->paginate(28);

            return view('pages.sanpham.productByCate',['productByCate'=>$productByCate,'slug' => $slug]);
        }
        else{
            $slug = Res::segment(1);
            switch ($slug) {
                case 'san-pham':


                
                // $pro = Products::where('product_status','0')->first();
                // $all_product1 = $pro->category;
                // dd($all_product1);
                // $all_product = Products::where('$all_product1','0')
                //     ->orderby('created_at','desc')
                //     ->paginate(28);
              
                

                    $all_product = DB::table('tbl_product')
                    ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
                    ->where('category_type','0')
                    //->orderby('created_at','desc')
                    ->orderby('product_id','desc')
                    ->paginate(28);  
                    return view('pages.sanpham.all_products')
                    ->with('all_product',$all_product)
                    ->with('slug', $slug);
                    break;
                
                default:
                    $slug = Res::segment(1);
                    $now = Carbon::now();
                   
                    $from = Carbon::now()->subDays(7);

                    $all_product = DB::table('tbl_product')
                        ->where('product_status','0')
                        ->whereBetween('created_at', [$from, $now])
                        ->orderby('created_at','desc')
                        ->paginate(28); 
                    return view('pages.sanpham.new_products')
                    ->with('all_product',$all_product)
                    ->with('slug',$slug);
                    break;
                    break;
            }
            
        }
    }

    public function productByCate($product_slug){
        $slug = DB::table("tbl_category_product")
        ->select('category_name','slug_category_product')
        ->where('slug_category_product', $product_slug)
        ->first();

        $productByCate = DB::table('tbl_product')
        ->where('product_slug', $product_slug)
        ->where('product_status','0')
        ->orderby('product_id','desc')
        ->paginate(28);

        return view('pages.sanpham.productByCate', [
            'productByCate' =>$productByCate,
            'slug' => $slug
        ]);
    }



}


