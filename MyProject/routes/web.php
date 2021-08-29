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
Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/product_detail/{id}','HomeController@product_detail');
Route::post('/search','HomeController@search');
Route::get('/about','HomeController@about');
Route::get('/show_category/{find}','HomeController@show_category');
Route::get('/shop',"HomeController@shop");
Route::get('/cart',"HomeController@cart")->name("home.cart");

// CartController
Route::post('/save-cart','CartController@AddCart');
Route::get('/cart','CartController@index');
Route::get('/delete_cart/{rowId}','CartController@delete_cart');
Route::post('/update_cart','CartController@update_cart');
Route::get('/addcart/{id}','CartController@AddCart');


//CheckoutController
Route::get('/login_checkout','CheckoutController@login_checkout');
Route::get('/logout_checkout','CheckoutController@logout_checkout');
Route::post('/add_customer','CheckoutController@add_customer');
Route::get('/checkout','CheckoutController@checkout');
Route::post('/save_checkout_customer','CheckoutController@save_checkout');
Route::post('/login_customer','CheckoutController@login_customer');
Route::post('/order_place','CheckoutController@order_place');
Route::get('/payment','CheckoutController@payment');
Route::get('/handcash','CheckoutController@handcash');


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

	
	
	Route::resources([
		'category'=>'CategoryController',
		'product'=>'ProductController',
		'account'=>'AccountController',
		'order'=>'OrderController', 
		'blog'=>'BlogController'
	]);
	Route::get('/view_order/{id}','OrderController@view_order');
	
});

// Send Mail 
Route::get('/send_email','EmailController@index');

// Login Facebook


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');



