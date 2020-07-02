<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Hash;
use App\User;
use App\OrderDetail;
use App\Order;
 use App\Customer;
use Validator;

session_start();
class UserController extends Controller
{
    function getUser()
	{
		$user = Auth::user();

		return view('infoUser.infoUser',['nguoidung'=>$user]);
	}
	  function manageUser(Request $request)
	{
		 	$this->validate($request,
 			[
			'name' => 'required|string|max:255',
			
			'phone' => 'numeric|min:3',
		],
		[
			'name.required' => 'Bạn chưa nhập Tên',
			'name.max' => 'Họ và tên không quá 255 ký tự',
			'phone.numeric' => 'Điện thoại là dãy sô ',
			'phone.min' => 'Không đúng định dạng số điện thoại',
			
		]
 );
	 $user = Auth::user();	
$user->name= $request->name;
$user->phone= $request->phone;
$user->address= $request->address;
$user->gender= $request->gender;
$user->save();

		return Redirect::to('/nguoidung')->with('message','Đã cập nhật  tài khoản thành công');
}
	 function getchangePass()
	{
		return view('infoUser.passUser');
	}
	 function postchangePass(Request $request)
	{
		$this->validate($request,
 			[
			'new_password' => 'required|string|min:6',
			'renew_password' => 'required|same:new_password',
			

		],
		[

			'new_password.required' => 'Mật khẩu là trường bắt buộc',
			'new_password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
			'renew_password.required' => 'Bạn chưa nhập lại mật khẩu',
			'renew_password.same' => 'Xác nhận mật khẩu không đúng',
		]
 );
		$user = Auth::user();
		$user->password= bcrypt($request->new_password);
		$user->save();
		return Redirect::to('/nguoidung')->with('message','Đã cập nhật  mật khẩu thành công');

	}

	//code quan ly dong hang cho user
	 function xemDonhang($order_id){
		$order_details = OrderDetail::where('order_id',$order_id)->get();// cai nay phai khai bao use App\OrderDetail;
		$order = Order::where("order_id",$order_id)->first();
		$product1 = OrderDetail::where('order_id',$order_id)->select('product_id')->get();
//dd($product1);
		// foreach ($order_details as $key => $pro) {
		// 	$product2 = $pro->product_id->product->product_name;
		// dd($product2);
		// }

		// foreach ($product1 as $key => $pro) {
		// 	$product = DB::table('tbl_product')->where('product_id',$pro->product_id)->get();
		// }
 		
 		//OrderDetail::where("product_id",$order_details->product_id)->first();
 //dd($order_details->product_id);
 		//dd($product2->product_image);
		//CHỖ NÀY DỂ LẤY LINK ảnh từ bảng product
			///nhưng vẫn lỗi khi lấy link(no chỉ lấy ảnh đầu tiên)

			
		return view('infoUser.infoOrder',[
			'order_details'=>$order_details,
			'product'=>$product1,
			'order'=>$order
		]);
		//->with(compact('order','order_details','product'));

	 }

	 function xoaDonhang($order_id){
	 	//$this->AuthLogin();//ham kiem trang dang nhap
	 	$order = Order::where('order_id',$order_id)->update(['order_status'=>0]);
	 	return Redirect::to('/donhang')
	 	->with('message','Đã Xóa đơn hàng  thành công');
	 }

	
	function  getDonhang(){
		if(Auth::check()){
			$id=(Auth::user()->id);
			
	  		// echo"$order_id1";
	  		// $order_details = DB::table('tbl_order_details')->where('order_id',$order_id1)->get();
	  		// echo"$order_details";//giong nhau
			
			$order = Order::where('customer_id',$id)->orderby('created_at','desc')->get();

		return view('infoUser.infoManager')->with(compact('order'));
		}else{
			return Redirect::to('/login')->with('message','ban chua dang nhap');	
		}

	}
}
