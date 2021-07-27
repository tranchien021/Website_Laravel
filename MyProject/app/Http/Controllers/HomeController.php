<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mymodel;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(){
    	$data=Product::all();
    	return view('home',compact('data'));
    }
    public function login(){
    	return view('login');
    }
}
