<?php
  

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Order;
use App\OrderDetail;
use Validator;
use DB;
use Session;
use Cart;
use Auth;

session_start();

class CheckoutController extends Controller
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
    public function view_order($orderId){
        $this->AuthLogin();
        $order = Order::where("order_id",$orderId)->first();
        //$shipping = $order->shipping;
        // $order_by_id = DB::table('tbl_order')
        // ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
        // ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
        // ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
        // ->select('tbl_order.*','tbl_customers.*','tbl_shipping.*','tbl_order_details.*')->first();
        // $manager_order_by_id  = view('admin.view_order')->with('order_by_id',$order_by_id);
        return view('admin.view_order', ['order'=>$order]);
        
    }

        public function delete_order($orderId){
        $this->AuthLogin();
        $order = Order::where("order_id",$orderId)->delete();
        return Redirect::to('/manage-order')
        ->with('message','Đã Xóa đơn hàng thành công');
        
        
    }

        public function edit_order($orderId){
        $this->AuthLogin();
        $order = Order::where("order_id",$orderId)->first();
        return view('admin.edit_order', ['order'=>$order]);   
    }

    public function manage_order(){

        $this->AuthLogin();
        // $all_order = DB::table('tbl_order')
        // ->join('users','tbl_order.customer_id','=','tbl_customers.customer_id')
        // ->select('tbl_order.*','tbl_customers.customer_name')
        // ->orderby('tbl_order.order_id','desc')->get();
        //$order = Order::where("order_id",58)->first();

        $all_order = Order::orderby("order_id","desc")->paginate(10);
        //dd($all_order);
        return view('admin.manage_order')->with('all_order',$all_order);
    }

    //user
    // public function login_checkout(){

    // 	$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
    //     $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

    // 	return view('pages.checkout.login_checkout')->with('category',$cate_product)->with('brand',$brand_product);
    // }
    // public function add_customer(Request $request){

    // 	$data = array();
    // 	$data['customer_name'] = $request->customer_name;
    // 	$data['customer_phone'] = $request->customer_phone;
    // 	$data['customer_email'] = $request->customer_email;
    // 	$data['customer_password'] = md5($request->customer_password);

    // 	$customer_id = DB::table('tbl_customers')->insertGetId($data);

    // 	Session::put('customer_id',$customer_id);
    // 	Session::put('customer_name',$request->customer_name);
    // 	return Redirect::to('/checkout');
    // }

    // public function checkout(Request $request){
    // 	$cate_product = DB::table('tbl_category_product')
    //     ->where('category_status','0')
    //     ->orderby('category_id','desc')
    //     ->get();
    //     // $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); ->with('brand',$brand_product)

    //     $data = array();
    //     $data['shipping_name'] = $request->shipping_name;
    //     $data['shipping_phone'] = $request->shipping_phone;
    //     $data['shipping_email'] = $request->shipping_email;
    //     $data['shipping_notes'] = $request->shipping_notes;
    //     $data['shipping_address'] = $request->shipping_address;
    //     dd($data);
    //     $shipping_id = DB::table('tbl_shipping')->insertGetId($data);

    //     Session::put('shipping_id',$shipping_id);
        
    //     return Redirect::to('/payment');

    // 	return view('pages.checkout.show_checkout')
    //     ->with('category',$cate_product);
    // }

    public function save_checkout_customer(Request $request){
     // validate
        $messages = [
        'shipping_email.required'    => 'Email phải có định dạng email',
        'shipping_phone.required'    => 'Số điện thoại phải có định dạng số',
        'shipping_name.required'=>'Họ và tên bắt buộc nhập.',
        'shipping_address.required'=>'Địa chỉ bắt buộc nhập.',
        'shipping_notes.required'=>'Ghi chú bắt buộc nhập.',
        'thanhpho.required'=>'Thành phố bắt buộc chọn.',
        'quanhuyen.required'=>'Quận huyện bắt buộc chọn.',
        'phuongxa.required'=>'Phường xã bắt buộc chọn.',
        ];
        $rule = [
            'shipping_name'     => 'required|max:255',
            'shipping_email'    => 'required|email',
            'shipping_phone' => 'required|digits_between:10,11|numeric',
            'shipping_address'  => 'required',
            'shipping_notes'  => 'required',
            'thanhpho'  => 'required|integer',
            'quanhuyen'  => 'required|integer',
            'phuongxa'  => 'required|integer'

        ];
        
        $validator = Validator::make(Input::all(), $rule,$messages);
        //dd($validator);
        if ($validator->fails()) {
            //dd('khong hoan thanh');
            return redirect('/gio-hang')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        try {
            // save


    // $input = $request->all();
    // dd($input);
    // dd($request->user_id);
    //     $messages = [
    //     'required' => 'Trường :attribute bắt buộc nhập.',
    //     'email'    => 'Trường :attribute phải có định dạng email'
    //     ];
    //     $validator = Validator::make($request->all(), [
    //         'shipping_name'     => 'required|max:255',
    //         'shipping_email'    => 'required|email',
    //         'shipping_phone' => 'required|regex:/(01)[0-9]{9}/',
    //         'shipping_address'  => 'sometimes|required|url'

    //     ], $messages);

    //     if ($validator->fails()) {
    //         dd('error');
    //         return redirect('cart')
    //                 ->withErrors($validator)
    //                 ->withInput();
    //     } else {
    //       // Lưu thông tin vào database, phần này sẽ giới thiệu ở bài về database
    //          dd('sucessful');
    //       return redirect('checkout')
    //           ->with('message', 'Đặt hàng thành công.');
    //     }
    // }

        //Lấy ra tên xã(phường), huyện(quận), tỉnh(thành phố).
        $px = DB::table('tbl_xaphuongthitran')
        ->select('name','maxa')
        ->where('maxa',$request->phuongxa)->first();
        $qh = DB::table('tbl_quanhuyen')
        ->select('name','maqh')
        ->where('maqh',$request->quanhuyen)->first();
        $tp = DB::table('tbl_thanhpho')
        ->select('name','matp')
        ->where('matp',$request->thanhpho)->first();
        $tenpx=$px->name;
        $tenqh=$qh->name;
        $tentp=$tp->name;
        //ghép địa chỉ với xã(phường), huyện(quận), tỉnh(thành phố).
        $address = $request->shipping_address."  ".$tenpx.", ".$tenqh.", ".$tentp;
     //dd($address);

        //insert to tbl_shipping
        $data_shipping = array();
        $data_shipping['shipping_name'] = $request->shipping_name;
        $data_shipping['shipping_phone'] = $request->shipping_phone;
        $data_shipping['shipping_email'] = $request->shipping_email;
        $data_shipping['shipping_notes'] = $request->shipping_notes;
        $data_shipping['shipping_address'] = $address;
        $data_shipping['created_at'] = now();
        $data_shipping['customer_id'] = Auth::user()->id;
    //dd($data_shipping);
        $shipping_id = DB::table('tbl_shipping')->insertGetId($data_shipping);
        Session::put('shipping_id',$shipping_id);

        //insert payment_method
        $data_payment = array();
        $data_payment['payment_method'] = $request->payment;
        $data_payment['payment_status'] = 'Đang chờ xử lý';
        $payment_id = DB::table('tbl_payment')->insertGetId($data_payment);

        //insert order
        $order_data = array();
        $order_data['customer_id'] = $request->user_id;
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = 'Đang chờ xử lý';
        $order_data['created_at'] = now();
        
        $order_id = DB::table('tbl_order')->insertGetId($order_data);
    // dd($order_data);

        //insert order_details
        $content = Cart::content();
    // dd($content);
        foreach($content as $v_content){
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $v_content->id;
            $order_d_data['product_name'] = $v_content->name;
            $order_d_data['product_price'] = $v_content->price;
            $order_d_data['product_color'] = $v_content->options->mausac;
            $order_d_data['product_size'] = $v_content->options->size;
            $order_d_data['product_sales_quantity'] = $v_content->qty;
            $order_d_data['created_at'] = now();

            DB::table('tbl_order_details')->insert($order_d_data);
        }

    } catch (Exception $e) {
            echo $e->getMessage();
        }

        //Cart::destroy();
        return Redirect(route('checkout',$order_id));
    }
    public function checkout($order_id){
    
        $order = DB::table('tbl_order')
            ->where('order_id',$order_id)
            ->first();
        // dd($order); 
        $customer = DB::table('users')->where("id",$order->customer_id)->first();
        $shipping = DB::table('tbl_shipping')->where("shipping_id",$order->shipping_id)->first();
        $payment=DB::table('tbl_payment')->where("payment_id",$order->payment_id)->first();
            // $cate_product = DB::table('tbl_category_product')
            // ->where('category_status','0')
            // ->orderby('category_id','desc')
            // ->get();
            // $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); ->with('brand',$brand_product)
         return view('pages.checkout.show_checkout',[
            'customer'=>$customer,
            'shipping' => $shipping,
            'order' => $order,
            'payment'=>$payment,
        ]);
    }

    // public function payment(){

    //     $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
    //     // $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
    //     // return view('pages.checkout.payment')->with('category',$cate_product)->with('brand',$brand_product);
    //     return view('pages.checkout.show_checkout')
    //     ->with('category',$cate_product);
    // }

    //     public function order_place(Request $request){
    //     //insert payment_method
     
    //     $data = array();
    //     $data['payment_method'] = $request->payment_option;
    //     $data['payment_status'] = 'Đang chờ xử lý';
    //     $payment_id = DB::table('tbl_payment')->insertGetId($data);

    //     //insert order
    //     $order_data = array();
    //     $order_data['customer_id'] = Session::get('customer_id');
    //     $order_data['shipping_id'] = Session::get('shipping_id');
    //     $order_data['payment_id'] = $payment_id;
    //     $order_data['order_total'] = Cart::total();
    //     $order_data['order_status'] = 'Đang chờ xử lý';
    //     $order_id = DB::table('tbl_order')->insertGetId($order_data);

    //     //insert order_details
    //     $content = Cart::content();
    //     foreach($content as $v_content){
    //         $order_d_data['order_id'] = $order_id;
    //         $order_d_data['product_id'] = $v_content->id;
    //         $order_d_data['product_name'] = $v_content->name;
    //         $order_d_data['product_price'] = $v_content->price;
    //         $order_d_data['product_sales_quantity'] = $v_content->qty;
    //         DB::table('tbl_order_details')->insert($order_d_data);
    //     }
    //     if($data['payment_method']==1){

    //         echo 'Thanh toán thẻ ATM';

    //     }elseif($data['payment_method']==2){
    //         Cart::destroy();

    //         $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
    //         // $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
    //         return view('pages.checkout.handcash')->with('category',$cate_product);//->with('brand',$brand_product);

    //     }else{
    //         echo 'Thẻ ghi nợ';

    //     }
        
    //     //return Redirect::to('/payment');
    // }

    // public function logout_checkout(){
    // 	Session::flush();
    // 	return Redirect::to('/login-checkout');
    // }
    // public function login_customer(Request $request){
    // 	$email = $request->email;
    // 	$password = md5($request->password);
    //     // dd($email , $password);
    // 	$result = DB::table('tbl_customers')->where('customer_email',$email)->where('customer_password',$password)->first();
    	
    // 	if($result){
    // 		Session::put('customer_id',$result->customer_id);
    // 		return Redirect::to('/checkout');
    // 	}else{
    // 		return Redirect::to('/login-checkout');
    // 	}
    // }

    public function update_order(Request $request, $orderId){
       $data = $request->all();
       $order = Order::where('order_id', $orderId)->first();

       $shipping = $order->shipping;

       $shipping->where("shipping_id",$order->shipping->shipping_id)->update([
        'shipping_name' => $data['name'],
        'shipping_email' => $data['email'],
        'shipping_address' => $data['address']
       ]);



       $shipping->shipping_name = $data['name'];
       $shipping->save();


       $total = 0;
       foreach($data['quantity'] as $order_details_id => $quantity){ 

            $orderDetailsId = OrderDetail::where('order_details_id',$order_details_id)->first();
            $total += ($orderDetailsId->product_price * $quantity);
            $orderDetailsId->where("order_details_id", $order_details_id)->update([
                'product_sales_quantity' => $quantity,
            ]);
       }
       if($total < 500000){
            $total = (($total * 0.1) +$total);
       }
       $order->where("order_id",$orderId)->update([
        'order_total' => $total
       ]);
       return redirect()->back();




    }

}
