<?php
use App\Http\Controllers\MyController;

use App\Http\Livewire\ShopComponent;

use Illuminate\Support\Facades\View;

use Illuminate\Support\Facades\Route;

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


//HomController 
Route::post('/search','HomeController@search');
Route::get('/','HomeController@index')->name('home.index');
Route::get('/product_detail/{id}','HomeController@product_detail');
Route::get('/about','HomeController@about');
Route::get('/show_category/{find}','HomeController@show_category');
Route::get('/shop',"HomeController@shop");


// CartController
Route::post('/save-cart','CartController@AddCart');
Route::post('/update_cart','CartController@update_cart');
Route::get('/cart','CartController@index');
Route::get('/addcart/{id}','CartController@AddCart');
Route::get('/delete_cart/{rowId}','CartController@delete_cart');


Route::post('/update_cart_ajax','CartController@update_cart_ajax');
Route::post('/add-cart-ajax','CartController@AddCart_Ajax');
Route::get('/giohang','CartController@giohang');
Route::get('/delete_cart_ajax/{session_id}','CartController@delete_cart_ajax');
Route::get('/delete_all_cart','CartController@delete_all_cart');


// Coupon 
Route::post('/check_coupon','CouponController@check_coupon');
Route::post('/insert_coupon_code','CouponController@insert_coupon_code');
Route::get('/delete_coupon/{coupon_id}','CouponController@delete_coupon');
Route::get('/delete_coupon','CouponController@delete_coupon_all');



//CheckoutController

Route::post('/confirm_order','CheckoutController@confirm_order');
Route::post('/calculate_money','CheckoutController@calculate_money');
Route::post('/delivery_home','CheckoutController@delivery_home');
Route::get('/login_checkout','CheckoutController@login_checkout');
Route::get('/logout_checkout','CheckoutController@logout_checkout');
Route::post('/add_customer','CheckoutController@add_customer');
Route::get('/checkout','CheckoutController@checkout');
Route::post('/save_checkout_customer','CheckoutController@save_checkout');
Route::post('/login_customer','CheckoutController@login_customer');
Route::post('/order_place','CheckoutController@order_place');
Route::get('/payment','CheckoutController@payment');
Route::get('/handcash','CheckoutController@handcash');
Route::get('/delete_moneyship','CheckoutController@delete_moneyship');




// AdminController 
Route::group(['prefix'=>'admin'],function(){
	Route::get('/index','AdminController@dashboard')->name('admin.dashboard');
	Route::post('/admin_dashboard','AdminController@admin_dashboard')->name('admin.dashboard_login');
	Route::get('/file','AdminController@file');
	Route::get('/login','AdminController@login')->name('admin.login');
	Route::get('/logout','AdminController@logout');
	Route::get('/register','AdminController@register');
	Route::post('/register_account','AdminController@register_account');
	//Login Admin Facebook
	Route::get('/login_facebook','LoginController@facebook');
	Route::get('/callback','LoginController@callback_facebook');
	
	//Login Admin Google
	Route::get('/login_google','LoginController@google');
	Route::get('/callback_google','LoginController@callback_google');

	//Coupon Admin
	Route::get('/insert_coupon','CouponController@insert_coupon');
	Route::get('/list_coupon','CouponController@list_coupon');
	Route::get('/delete_coupon','CouponController@delete_coupon');

	// Delivery Amdmin 
	Route::get('/delivery','DeliveryController@delivery');
	Route::post('/select_delivery','DeliveryController@select_delivery');
	Route::post('/insert_delivery','DeliveryController@insert_delivery');
	Route::post('/money_delivery','DeliveryController@money_delivery');
	Route::post('/update_delivery','DeliveryController@update_delivery');
	
	// Order Admin 
	Route::get('/manage_order','OrderController@manage_order');
	Route::get('/view_order/{order_code}','OrderController@view_order');
	Route::get('/print_order/{checkout_code}','OrderController@print_order');
	Route::post('/update_order_quantity','OrderController@update_order_quantity');
	Route::post('/update_quantity','OrderController@update_quantity');
	



	// Slider Admin 
	Route::get('/manage_slider','SliderController@manage_slider');
	Route::get('/add_slider','SliderController@add_slider');
	Route::post('/insert_slider','SliderController@insert_slider');
	Route::get('/unactive_banner/{slider_id}','SliderController@unactive_banner');
	Route::get('/active_banner/{slider_id}','SliderController@active_banner');
	Route::get('/delete_banner/{slider_id}','SliderController@delete_banner');
	Route::get('/edit_banner/{slider_id}','SliderController@edit_banner');
	Route::post('/update_banner/{slider_id}','SliderController@update_banner');
	
	


	
	
	Route::resources([
		'category'=>'CategoryController',
		'product'=>'ProductController',
		'account'=>'AccountController',
		'blog'=>'BlogController'
	]);
	Route::post('/export_csv_category','CategoryController@export_csv');
	Route::post('/import_csv_category','CategoryController@import_csv');

	Route::post('/export-csv','ProductController@export_csv');
	Route::post('/import-csv','ProductController@import_csv');

	

	
});

// Send Mail 
Route::get('/send_email','EmailController@index');








// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');



