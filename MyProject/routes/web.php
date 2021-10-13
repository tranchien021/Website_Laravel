<?php

use App\Http\Controllers\LoginController;
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
Route::post('/auto_complete_ajax','HomeController@auto_complete_ajax');
Route::get('/','HomeController@index')->name('home.index');
Route::get('/product_detail/{id}','HomeController@product_detail');
Route::get('/about','HomeController@about');
Route::get('/show_category/{find}','HomeController@show_category');
Route::get('/shop',"HomeController@shop");



//ContactController 
Route::get('/lienhe','ContactController@contact');





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


// BlogController 
Route::get('/danh_muc_bai_viet/{blog_slug}','BlogController@danh_muc_bai_viet');
Route::get('/bai_viet/{blog_slug}','BlogController@bai_viet');

// VideoController 
Route::get('/video_shop','VideoController@video_shop');
Route::post('/watch_video','VideoController@watch_video');

// Product Tag
Route::get('/tag/{product_tag}','ProductController@tag');

// Product QuickView
Route::post('/quickview','ProductController@quickview');

// Product Comment
Route::post('/load_comment','ProductController@load_comment');
Route::post('/send_comment','ProductController@send_comment');
Route::post('/insert_rating','ProductController@insert_rating');

// Arrange Brand 
Route::post('/arrange_brand','BrandController@arrange_brand');
// Tabs Brand
Route::post('/product_tabs','BrandController@product_tabs');


// Send Mail 
Route::get('/send_email','EmailController@index');
Route::get('/send_coupon_vip/{coupon_condition}/{coupon_time}/{coupon_number}/{coupon_code}','EmailController@send_coupon_vip');
Route::get('/send_coupon/{coupon_condition}/{coupon_time}/{coupon_number}/{coupon_code}','EmailController@send_coupon');
Route::get('/layout','EmailController@layout');
Route::get('/forgot_password','EmailController@forgot_password');
Route::get('/update_new_password','EmailController@update_new_password');
Route::post('/get_password','EmailController@get_password');
Route::post('/change_password','EmailController@change_password');

// Login Customer Google 
Route::get('/login_customer_google','LoginController@login_customer_google');
Route::get('/login_checkout/callback','LoginController@callback_customer_google');


// Login Customer Facebook
Route::get('/login_customer_facebook','LoginController@login_customer_facebook');
Route::get('/customer_facebook/callback','LoginController@callback_customer_facebook');

// History Order Controller 
Route::get('/history_order','OrderController@history_order');
Route::get('/view_detail_history/{order_code}','OrderController@view_detail_history');











// AdminController 
Route::group(['prefix'=>'admin'],function(){
	Route::get('/','AdminController@index');
	Route::get('/index','AdminController@dashboard')->name('admin.dashboard');
	Route::post('/admin_dashboard','AdminController@admin_dashboard')->name('admin.dashboard_login');
	Route::get('/file','AdminController@file');
	Route::get('/login','AdminController@login')->name('admin.login');
	Route::get('/logout','AdminController@logout');
	Route::get('/register','AdminController@register');
	Route::post('/register_account','AdminController@register_account');
	// Morris Admin 
	Route::post('/filter_by_date','AdminController@filter_by_date');
	Route::post('/dashboard_filter','AdminController@dashboard_filter');
	Route::post('/days_order','AdminController@days_order');
	//Login Admin Facebook
	Route::get('/login_facebook','LoginController@facebook');
	Route::get('/callback','LoginController@callback_facebook');
	
	//Login Admin Google
	Route::get('/login_google','LoginController@google');
	Route::get('/callback_google','LoginController@callback_google');

	//Register Authentication 
	Route::get('/register_auth','AuthController@register_auth');
	Route::post('/create_account_auth','AuthController@create_account_auth');
	Route::get('/login_auth','AuthController@login_auth');
	Route::post('/login_account_auth','AuthController@login_account_auth');
	Route::get('/logout_auth','AuthController@logout_auth');


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
	

	//User Authentication
	Route::get('/user_auth','UserController@index')->middleware('auth.roles');
	Route::post('/assign_roles','UserController@assign_roles');
	Route::get('/delete_user_auth/{id}','UserController@delete_user_auth');
	Route::get('/create_user_auth','UserController@create_user');
	Route::post('/store_users','UserController@store_users');
	Route::get('/change_login/{id}','UserController@change_login');
	Route::get('/change_login_destroy','UserController@change_login_destroy');
	
	




	// Product Admin
	Route::get('/list_product','ProductController@list_product');
	Route::get('/delete_product/{id}','ProductController@delete_product');
	Route::get('/create_product','ProductController@create_product');
	Route::post('/insert_product','ProductController@insert_product');
	Route::get('/edit_product/{id}','ProductController@edit_product');
	Route::post('/update_product/{id}','ProductController@update_product');
	Route::get('/comment','ProductController@list_comment');
	Route::post('/allow_comment','ProductController@allow_comment');
	Route::post('/reply_comment','ProductController@reply_comment');
	Route::post('/delete_document','ProductController@delete_document');
	

	

	


	// Customer Admin
	Route::get('/list_customer','CustomerController@list_customer');
	Route::get('/delete_customer/{customer_id}','CustomerController@delete_customer');
	Route::get('/edit_customer/{customer_id}','CustomerController@edit_customer');
	Route::post('/update_customer/{customer_id}','CustomerController@update_customer');


	
	// Category Admin
	Route::get('/list_category','CategoryController@index');

	// Brand Admin 
	Route::get('/list_brand','BrandController@list_brand');
	Route::get('/delete_brand/{brand_id}','BrandController@delete_brand');
	Route::get('/create_brand','BrandController@create_brand');
	Route::post('/insert_brand','BrandController@insert_brand');
	Route::get('/edit_brand/{brand_id}','BrandController@edit_brand');
	Route::post('/update_brand/{brand_id}','BrandController@update_brand');

	

	// Category Blog Admin 
	Route::get('/list_category_blog','CategoryBlogController@list_category_blog');
	Route::get('/delete_category_blog/{category_blog_id}','CategoryBlogController@delete_category_blog');
	Route::get('/create_category_blog','CategoryBlogController@create_category_blog');
	Route::post('/insert_category_blog','CategoryBlogController@insert_category_blog');
	Route::get('/edit_category_blog/{category_blog_id}','CategoryBlogController@edit_category_blog');
	Route::post('/update_category_blog/{category_blog_id}','CategoryBlogController@update_category_blog');


	//Blog Admin 
	Route::get('/list_blog','BlogController@list_blog');
	Route::get('/delete_blog/{blog_id}','BlogController@delete_blog');
	Route::get('/create_blog','BlogController@create_blog');
	Route::post('/insert_blog','BlogController@insert_blog');
	Route::get('/edit_blog/{blog_id}','BlogController@edit_blog');
	Route::post('/update_blog/{blog_id}','BlogController@update_blog');
	Route::get('/unactive_blog/{blog_id}','BlogController@unactive_blog');
	Route::get('/active_blog/{blog_id}','BlogController@active_blog');

	
	
	// Gallery Product Amin 

	Route::get('/insert_gallery/{product_id}','GalleryController@insert_gallery');
	Route::post('/select_gallery',"GalleryController@select_gallery");
	Route::post('/create_gallery/{pro_id}','GalleryController@create_gallery');
	Route::post('/update_gallery','GalleryController@update_gallery');
	Route::post('/delete_gallery','GalleryController@delete_gallery');
	Route::post('/update_gallery_image','GalleryController@update_gallery_image');

	// Video Admin
	Route::get('/video','VideoController@video');
	Route::post('/select_video',"VideoController@select_video");
	Route::post('/delete_video',"VideoController@delete_video");
	Route::post('/create_video',"VideoController@create_video");
	Route::post('/update_video',"VideoController@update_video");
	Route::post('/update_video_image',"VideoController@update_video_image");

	// Contact Admin
	Route::get('/information','ContactController@information');
	Route::post('/save_infor','ContactController@save_infor');
	Route::get('/edit_contact','ContactController@edit_contact');
	Route::post('/update_contact/{info_id}','ContactController@update_contact');

	Route::get('/list_icon','ContactController@list_icon');
	Route::get('/delete_icon','ContactController@delete_icon');
	Route::post('/add_icon','ContactController@add_icon');

	Route::post('/add_partner','ContactController@add_partner');
	Route::get('/list_partner','ContactController@list_partner');

	
	

	Route::resources([
		'category'=>'CategoryController',
	
		'account'=>'AccountController',
		
	]);
	Route::post('/update_product/{id}','ProductController@update_product');

	Route::post('/export_csv_category','CategoryController@export_csv');
	Route::post('/import_csv_category','CategoryController@import_csv');

	Route::post('/export-csv','ProductController@export_csv');
	Route::post('/import-csv','ProductController@import_csv');

	

	
});














// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');



