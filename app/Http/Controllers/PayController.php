<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Order;
use App\OrderDetail;
use DB;
use Session;
use Cart;
use Auth;
session_start();




class PayController extends Controller
{
 public function return(Request $request)
{
    
    if($request->vnp_ResponseCode == "00") {
        
        return Redirect::to('/donhang')->with('message' ,'Đã thanh toán phí dịch vụ');
    }
    else{
    
        return Redirect::to('/gio-hang')->with('message' ,'Quý khách chưa thanh toán phí dịch vụ');
    }

}
}
