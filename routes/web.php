<?php
 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Frontend 
Route::get('/','HomeController@index' );
Route::get('/trang-chu','HomeController@index');
Route::get('/tim-kiem','HomeController@search'); 
Route::get('/tim-kiem/gia-tang-dan/{keywords}','HomeController@sgiatangdan')->name('sgiatangdan');
Route::get('/tim-kiem/gia-giam-dan/{keywords}','HomeController@sgiagiamdan')->name('sgiagiamdan');
Route::get('/tim-kiem/newest-product/{keywords}','HomeController@smoinhat')->name('smoinhat');

//Danh muc san pham trang chu
//Route::get('/danh-muc-san-pham/{slug_category_product}','HomeController@header');
// Route::get('/danh-muc-san-pham/{slug_category_product}','CategoryProduct@show_category_home');
// Route::get('/thuong-hieu-san-pham/{brand_slug}','BrandProduct@show_brand_home');
Route::get('/chi-tiet-san-pham/{product_id}','ProductController@details_product');
Route::get('/san-pham-moi','ProductController@new_products')->name('sanphammoi');; 
Route::get('/san-pham','ProductController@all_products')->name('sanpham'); 
// Route::get('/san-pham/vay','ProductController@products_vay'); 
// Route::get('/san-pham/do-bo','ProductController@products_do_bo'); 
// Route::get('/san-pham/ao-khoac','ProductController@products_ao_khoac');
// Route::get('/san-pham/tui-xach','ProductController@products_tui_xach');
// Route::get('/san-pham/mat-kinh','ProductController@products_mat_kinh');
// Route::get('/san-pham/gia-tang-dan','ProductController@gia_tang_dan');
Route::get('/{cate_slug}/gia-tang-dan','ProductController@gia_tang_dan')->name('giatangdan');
Route::get('/{cate_slug}/gia-giam-dan','ProductController@gia_giam_dan')->name('giagiamdan');
Route::get('/{cate_slug}/newest-product','ProductController@newest_product')->name('sanphammoinhat');

Route::get('/san-pham/{product_slug}','ProductController@productByCate');

//Backend
	//Admin
//dang nhap admin
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');
Route::get('/logout','AdminController@logout');
Route::post('/admin-dashboard','AdminController@dashboard');

//admin quan li user
Route::get('/danhsach','Admin_userController@getDanhSach');
Route::get('/edit/{id}','Admin_userController@getEdit');
Route::post('/edit/{id}','Admin_userController@postEdit');
Route::get('/suaPass/{id}','Admin_userController@getsuaPass');
Route::post('/suaPass/{id}','Admin_userController@postsuaPass');
Route::get('/them','Admin_userController@getThem');
Route::post('/them','Admin_userController@postThem');
Route::get('/xoa/{id}','Admin_userController@getXoa');

	//User
//dang nhap nguoi dung
Route::get('/login','LoginController@getLogin');
Route::post('/postLogin','LoginController@postLogin');
Route::get('/register','RegisterController@create');
Route::post('/postregister','RegisterController@store');
Route::get('/getLogout','LoginController@getLogout');
//Tai khoan nguoi dung
Route::post('/nguoidung','UserController@manageUser');
Route::get('/nguoidung','UserController@getUser');
Route::get('/changePass','UserController@getchangePass');
Route::post('/changePass','UserController@postchangePass');

//user quan ly don
Route::get('/donhang','UserController@getDonhang');
Route::get('/viewDon/{order_id}','UserController@xemDonhang');
Route::get('/deleteDon/{id}','UserController@xoaDonhang');

//Category Product
Route::get('/add-category-product','CategoryProduct@add_category_product')->name('addproduct');
Route::get('/edit-category-product/{category_product_id}','CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{category_product_id}','CategoryProduct@delete_category_product');
Route::get('/all-category-product','CategoryProduct@all_category_product');

Route::get('/unactive-category-product/{category_product_id}','CategoryProduct@unactive_category_product');
Route::get('/active-category-product/{category_product_id}','CategoryProduct@active_category_product');


Route::post('/save-category-product','CategoryProduct@save_category_product');
Route::post('/update-category-product/{category_product_id}','CategoryProduct@update_category_product');

//Brand Product
// Route::get('/add-brand-product','BrandProduct@add_brand_product');
// Route::get('/edit-brand-product/{brand_product_id}','BrandProduct@edit_brand_product');
// Route::get('/delete-brand-product/{brand_product_id}','BrandProduct@delete_brand_product');
// Route::get('/all-brand-product','BrandProduct@all_brand_product');

// Route::get('/unactive-brand-product/{brand_product_id}','BrandProduct@unactive_brand_product');
// Route::get('/active-brand-product/{brand_product_id}','BrandProduct@active_brand_product');

// Route::post('/save-brand-product','BrandProduct@save_brand_product');
// Route::post('/update-brand-product/{brand_product_id}','BrandProduct@update_brand_product');

//Product
Route::get('/add-product','ProductController@add_product');
Route::get('/edit-product/{product_id}','ProductController@edit_product');
Route::get('/delete-product/{product_id}','ProductController@delete_product');
Route::get('/all-product','ProductController@all_product');

Route::get('/unactive-product/{product_id}','ProductController@unactive_product');
Route::get('/active-product/{product_id}','ProductController@active_product');

Route::post('/save-product','ProductController@save_product');
Route::post('/update-product/{product_id}','ProductController@update_product');

//User
Route::get('/add-user','UserController@add_user');
Route::get('/edit-user/{user_id}','UserController@edit_user');
Route::get('/delete-user/{user_id}','UserController@delete_puser');
Route::get('/all-user','UserController@all_user');

Route::get('/unactive-user/{user_id}','UserController@unactive_user');
Route::get('/active-user/{product_id}','UserController@active_user');

Route::post('/save-user','UserController@save_product');
Route::post('/update-user/{user_id}','UserController@update_user');


//Cart
Route::post('/update-cart-quantity','CartController@update_cart_quantity');
Route::post('/save-cart','CartController@save_cart');
Route::get('/gio-hang','CartController@show_cart')->name('cart');
Route::get('/delete-to-cart/{rowid}','CartController@delete_to_cart');
Route::get('/cart/updatequantity', 'CartController@updateQuanTiTyInCart')->name('updateQuanTiTyInCart');

//Checkout

//Route::get('/login-checkout','CheckoutController@login_checkout');
//Route::get('/register-checkout','CheckoutController@add_customer');
//Route::post('/add-customer','CheckoutController@add_customer');
//Route::get('/logout-checkout','CheckoutController@logout_checkout');
//Route::post('/order-place','CheckoutController@order_place');
// Route::post('/login-customer','CheckoutController@login_customer');
// Route::get('/payment','CheckoutController@payment');

Route::get('/checkout/{order_id}','CheckoutController@checkout')->name('checkout');
Route::post('/save-checkout-customer','CheckoutController@save_checkout_customer');

//Order
Route::get('/manage-order','CheckoutController@manage_order');
Route::get('/edit-order/{orderId}','CheckoutController@edit_order');
Route::post('/update-order/{orderId}','CheckoutController@update_order');
Route::get('/delete-order/{orderId}','CheckoutController@delete_order');
Route::get('/view-order/{orderId}','CheckoutController@view_order');

//Ajax
//load quận huyện
Route::get('/gio-hang/ajax/quanhuyen/{idThanhPho}','AjaxController@getquanhuyen');
Route::get('/gio-hang/ajax/phuongxa/{idQuanHuyen}','AjaxController@getphuongxa');
//load tên category theo slug
Route::get('/add_product/ajax/category_name/{slug}','AjaxController@getnamecate');

//thanh toán online
Route::get('/return1','PayController@return');
