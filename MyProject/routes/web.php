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
// Route::get('login', 'HomeController@login')->name('home.login');

Route::group(['prefix'=>'admin'],function(){
	Route::get('/index','AdminController@dashboard')->name('admin.dashboard');
	Route::get('/file','AdminController@file');
	
	Route::resources([
		'category'=>'CategoryController',
		'product'=>'ProductController',
		'account'=>'AccountController',
		'order'=>'OrderController', 
		'blog'=>'BlogController'
	]);
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/about','HomeController@about');
Route::get('/quanli','HomeController@admin');
