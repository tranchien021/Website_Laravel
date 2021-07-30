<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mymodel;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index(){
    	$data=Product::all();
        $category=Category::all();
    	return view('home',compact('data','category'));
    }
    public function login(){
    	return view('login');
    }
    public function about(){
        return view('about');
    }
    public function admin(){
        return view('admin.dashboard');
    }
}
