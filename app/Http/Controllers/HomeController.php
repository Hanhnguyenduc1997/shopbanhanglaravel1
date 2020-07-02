<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use DB;
use Session;
use App\Products;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Carbon;
session_start();

class HomeController extends Controller
{
    public function index(){

    	$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
        
         $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->limit(4)->get(); 
         $product_dobo = DB::table('tbl_product')->where('category_id','2')->orderby('product_id','desc')->limit(4)->get();
         $product_aokhoac = DB::table('tbl_product')->where('category_id','3')->orderby('product_id','desc')->limit(4)->get();
         $product_vay = DB::table('tbl_product')->where('category_id','1')->orderby('product_id','desc')->limit(4)->get();

    	return view('pages.trangchu')
        ->with('category',$cate_product)
        ->with('brand',$brand_product)
        ->with('all_product',$all_product)
        ->with('product_vay',$product_vay)
        ->with('product_aokhoac',$product_aokhoac)
        ->with('product_dobo',$product_dobo);
    }

    // public function header(){
    //     $cate_name = DB::table('tbl_category_product')->select('category_name')->orderby('category_id','desc')->get(); 
    //     $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

    //     return view('layouts.header')->with('category_name',$cate_name)->with('brand',$brand_product);
    // }

    public function search(Request $request){
        $keywords = $request->keywords_submit;
        if($keywords==null||$keywords==''){
            Session()->flash('nosearch','Vui lòng nhập từ khoá tìm kiếm.');
        }
        // $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        // $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
        $search_product = Products::where('product_status','0')
                    ->where('product_name','like','%'.$keywords.'%')
                    ->orderby('product_id','desc')->paginate(28);
        return view('pages.sanpham.search')
                    ->with('keywords',$keywords)
                    ->with('search_product',$search_product);   
    }

        public function sgiatangdan($request){
        $keywords = $request;
        //dd($keywords);
        $search_product = Products::where('product_status','0')
            ->where('product_name','like','%'.$keywords.'%')
            ->orderby('product_price','asc')->paginate(28);
        return view('pages.sanpham.search')
            ->with('keywords',$keywords)
            ->with('search_product',$search_product);   
    }

        public function sgiagiamdan($request){
        $keywords = $request;
        //dd($keywords);
        $search_product = Products::where('product_status','0')
            ->where('product_name','like','%'.$keywords.'%')
            ->orderby('product_price','desc')->paginate(28);
        return view('pages.sanpham.search')
            ->with('keywords',$keywords)
            ->with('search_product',$search_product);   
    }

        public function smoinhat($request){
        $keywords = $request;   
        $search_product = Products::where('product_status','0')
            ->where('product_name','like','%'.$keywords.'%')
            ->orderby('updated_at','desc')
            ->paginate(28);
        return view('pages.sanpham.search')
            ->with('keywords',$keywords)
            ->with('search_product',$search_product);   
    }

}
