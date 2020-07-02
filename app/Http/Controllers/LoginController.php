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
use Validator;

session_start();


class LoginController extends Controller
{
	
	function getLogin()
	{
		return view('/pages.login.login');
	}
function postLogin(Request $request)
	{
		$this->validate($request,
 			[
			'email' => 'required|string|email',
			'password' => 'required|string|min:6',

		],
		[
			'email.required' => 'Bạn chưa nhập email',
			'email.email' => 'Email không đúng định dạng',
			'password.required' => 'Mật khẩu là trường bắt buộc',
			'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
		]
 );
		$result=[
			'email'=>$request->email,
			'password'=>$request->password
		];
      if (Auth::attempt($result))
      {
      	if(Auth::user()->level == 1){
      		return redirect::to('/dashboard');
      	}
		return Redirect::to('/trang-chu');
      }
      else
      {
      	return Redirect::to('/login')->with('message','Đăng nhập thất bại');
      }

	}
	// function dang_ky()
	// {
	// 	return view('/pages.login.register');
	// }

function getLogout()
	{
		Auth::logout();
		return Redirect::to('/trang-chu');

	}


}


 ?>