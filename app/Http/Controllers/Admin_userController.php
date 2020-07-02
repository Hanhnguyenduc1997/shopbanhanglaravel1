<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Collection;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Hash;
use App\User;
use App\Admin;
use Validator;
session_start();
class Admin_userController extends Controller
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
    //
    public function getDanhSach()
    { 
	$this->AuthLogin();
		$user = User::paginate(5);
		return view('admin.user.danhsach',['user'=>$user]);
    }
    public function getThem()
    {
    	$this->AuthLogin();
			return view('admin.user.them');
    }
    public function postThem(Request $request)
    {
    	$this->AuthLogin();
$this->validate($request,
 			[
			'name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:users',
			'password' => 'required|string|min:6',
			'passwordAgain' => 'required|same:password',
			'phone' => 'required|numeric|min:10',
			'address' => 'required|string|max:255',

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
			'password.required' => 'Mật khẩu là trường bắt buộc',
			'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
			'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
			'passwordAgain.same' => 'Xác nhận mật khẩu không đúng',
		]
 );
if($request->level == 1){
	$admin=new Admin;
	$admin->admin_name= $request->name;
	$admin->admin_email= $request->email;
	$admin->admin_password= md5($request->password);
	$admin->admin_phone= $request->phone;
	$admin->save();
}
else{
	$user = new User;
	$user->name= $request->name;
	$user->email= $request->email;
	$user->password= bcrypt($request->password);
	$user->phone= $request->phone;
	$user->gender= $request->gender;
	$user->address= $request->address;
	$user->level= $request->level;
	$user->save();
}

return Redirect::to('/them')->with('message','Đã tạo tài khoản thành công');

    }
     public function getEdit($id)
    {
	$this->AuthLogin();
	$user = User::find($id);
	
	return view('admin.user.sua',['user'=>$user]);

    }
    public function postEdit(Request $request, $id)
    {
    	$this->AuthLogin();
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
	 $user = User::find($id);	
	$user->name= $request->name;
	$user->phone= $request->phone;
	$user->address= $request->address;
	//$user->level= $request->level;
	$user->gender= $request->gender;
	$user->save();
	return Redirect::to('/edit/'.$id)->with('message','Đã cập nhật  tài khoản thành công');
    }
     function getsuaPass($id)
	{
		$this->AuthLogin();
		$user = User::find($id);
		return view('admin.user.suaPass',['user'=>$user]);
	}
	 function postsuaPass(Request $request,$id)
	{
		$this->validate($request,
 			[
			'password' => 'required|string|min:6',
			'passwordAgain' => 'required|same:password',
			

		],
		[

			'password.required' => 'Mật khẩu là trường bắt buộc',
			'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
			'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
			'passwordAgain.same' => 'Xác nhận mật khẩu không đúng',
		]
 );
		$user = User::find($id);
		$user->password= bcrypt($request->password);
		$user->save();
		return Redirect::to('/edit/'.$id)->with('message','Đã đổi mật khẩu thành công');

	}

public function getXoa($id)
    {
    	$this->AuthLogin();
    	$user = User::find($id);
    	// echo"$user";
    	$user->delete();
    	return Redirect::to('/danhsach')->with('message','Đã Xóa Người Dùng thành công');
    	
    }    
}

