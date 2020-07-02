<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Cart;
session_start();
class CartController extends Controller
{
    public function save_cart(Request $request){
    	$productId = $request->productid_hidden;
    	$quantity = $request->qty;
        $size=$request->size;
        $color=$request->mausac;
    	$product_info = DB::table('tbl_product')->where('product_id',$productId)->first(); 
        $product_price = ($product_info->product_price_discount) ? $product_info->product_price_discount : $product_info->product_price;
        // dd($product_info);
        // Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        // Cart::destroy();
        $data['id'] = $product_info->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_price;
        $data['options']['price_discount'] = $product_info->product_price_discount;
        $data['weight'] = $product_info->product_price;
        $data['options']['image'] = $product_info->product_image;
        $data['options']['mausac'] = $color;
        $data['options']['size'] = $size;
        Cart::add($data);
        // dd(Cart::content());
        // Cart::destroy();
        return Redirect::to('/gio-hang');
       
    }
    public function show_cart(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $thanhpho = DB::table('tbl_thanhpho')->orderby('matp','asc')->get(); 
        $quanhuyen = DB::table('tbl_quanhuyen')->orderby('maqh','asc')->get(); 
        $xaphuongthitran = DB::table('tbl_xaphuongthitran')->orderby('maxa','asc')->get(); 

        return view('pages.cart.giohang',[
            'category' => $cate_product,
            'thanhpho' => $thanhpho,
            'quanhuyen' => $quanhuyen,
            'phuongxa' => $xaphuongthitran
        ]);              
    }

    public function delete_to_cart($rowId){
        // dd($rowId);
        session()->flash('noif', 'Xoá thành công');
        Cart::remove($rowId);
        // dd(Cart::content());
        return Redirect::to('/gio-hang');
    }
    public function update_cart_quantity(Request $request){
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;
        Cart::update($rowId,$qty);
        return Redirect::to('/gio-hang');
    }

    public function updateQuanTiTyInCart (Request $request){
        Cart::update($request->row_id, $request->quantity);

        $cart = Cart::get($request->row_id);

        $price = $cart->price * $request->quantity;
        
        $total = Cart::subtotal();
        
        $data =[
            'price' => $price,
            'total' => $total
        ];
        return $data;
    }
}
