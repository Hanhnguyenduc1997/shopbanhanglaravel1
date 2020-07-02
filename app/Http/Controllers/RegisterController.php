<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Hash;
use App\User;
use Validator;
session_start();

class RegisterController extends Controller
{
 public function create(){
 	return view('Registration.register');
 }

  public function store(Request $request){
 	$this->validate($request,
 			[
			'name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:users',
			'password' => 'required|string|min:6',
			'passwordAgain' => 'required|same:password',
			'phone' => 'required|numeric|min:10',
			'address' => 'required|string|max:255',
			'gender' => 'required|string|max:10',

		],
		[
			'name.required' => 'Bạn chưa nhập Tên',
			'name.max' => 'Họ và tên không quá 255 ký tự',
			'email.required' => 'Bạn chưa nhập email',
			'email.email' => 'Email không đúng định dạng',
			'email.max' => 'Email không quá 255 ký tự',
			'email.unique' => 'Email đã tồn tại',
			'phone.required' => 'Vui lòng nhập số điện thoại',
			'phone.numeric' => 'Điện thoại là dãy sô ',
			'phone.min' => 'Không đúng định dạng số điện thoại',
			'address.required' => 'Vui lòng nhập địa chỉ',
			'gender.required' => 'Vui lòng nhập  giới tính',
			'password.required' => 'Mật khẩu là trường bắt buộc',
			'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
			'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
			'passwordAgain.same' => 'Xác nhận mật khẩu không đúng',
		]
 );

$user =new User;
$user->name= $request->name;
$user->email= $request->email;
$user->password= bcrypt($request->password);
$user->phone= $request->phone;
$user->address= $request->address;
$user->gender= $request->gender;
$user->level= "0";
$user->save();
return Redirect::to('/register')->with('message','Đã tạo tài khoản thành công');


}

}
