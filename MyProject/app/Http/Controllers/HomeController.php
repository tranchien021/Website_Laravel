<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mymodel;
use App\Models\Product;
use App\Models\Category;
use Cart;

class HomeController extends Controller
{
    public function index(){
    	$data=Product::all();
        $category=Category::all();
    	return view('layouts.home',compact('data','category'));
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
    public function store($product_img,$product_name,$product_price){
        Cart::add($product_img,$product_name,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in Cart');
        return redirect()->route('home.cart');
    }
    public function shop(){
        $product=Product::all();
        $category=Category::all();
        return view('livewire.shop-component',compact('category','product'));
    }
    public function cart(){
        $category=Category::all();
        return view('livewire.cart-component',compact('category'));
    }
    public function product_detail($id){
        $product_detail=Product::all()->where('id',$id);
        $category=Category::all();
        foreach($product_detail as $key => $value){
            $category_id=$value->masp;
        }
       
    
        $item_recom =Product::all()->where('masp',$category_id)->whereNotIn('masp',$id);
      

        return view('layouts.product_detail',compact('category','product_detail','item_recom'));
    }
    public function search(Request $request){
        $keywords=$request->keywords_submit;
        $category=Category::all();
        //Loi 
        $product_search=Product::all()->where('name','like','%'.$keywords.'%');
        

       
        return view('layouts.search',compact('category','product_search'));
    }
}
