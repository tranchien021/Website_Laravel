<?php
use App\Http\Controllers\MyController;
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

Route::get('/', 'HomeController@index')->name('home.index');
Route::get('login', 'HomeController@login')->name('home.login');

Route::group(['prefix'=>'admin'],function(){
	Route::get('/','AdminController@dashboard')->name('admin.dashboard');
	
	Route::resources([
		'category'=>'CategoryController',
		'product'=>'ProductController',
		'account'=>'AccountController',
		'order'=>'OrderController', 
		'blog'=>'BlogController'
	]);
});






Route::get('login',function(){
	
});

Route::get("getForm",function(){
	return view('about');
});

Route::get('KhoaHoc/{name}',function($name){
	echo "hello: ".$name;
});

Route::get('router1',['keys'=>'game',function(){
	echo "Tran Minh Chien";
}]);
Route::get('router2',function(){
	echo "day la minhchien";
})->name('year');
Route::get('call',function(){
	return redirect()->route('year');
});

Route::group(['prefix'=>'Mygroup'],function(){
	Route::get('User1',function(){
		echo "User1";
	});
	Route::get('User2',function(){
		echo "User2";
	});
	Route::get('User3',function(){
		echo "User3";
	});
});
Route::get('MyRequest',[MyController::class,'getURL']);

Route::get('getdata',function(){
	return view('about');
});	

Route::post('about',['as'=>'about','uses'=>"MyController@index"]);
Route::get('setCookie','MyController@setCookie');
Route::get('getCookie','MyController@getcookie');
Route::get('index','MyController@index');
Route::get('getfile','MyController@getfile');
Route::get('showdata','MyController@show');
Route::get('chekout/{id}','MyController@check');
Route::get('login','MyController@login');

Route::group(['prefix'=>'admin'],function(){
	Route::get('/',function(){
		return view('admin.main');
	});
	Route::get('/dashboard',function(){
		return view('admin.dashboard');
	});
	Route::get('/user',function(){
		return view('admin.user');
	});

});