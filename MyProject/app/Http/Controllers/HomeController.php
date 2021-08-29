<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mymodel;
use App\Models\Product;
use App\Models\Category;
use Cart;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request){
        $meta_desc="Trang web hỗ trợ bán hàng, tiện lợi , nhanh chóng , dành cho mọi thể loại mặt hàng buôn bán";
        $meta_keywords="Trang web bán hàng, web bán hàng";
        $meta_title="Trang chủ, web bán hàng ";
        $url_canonical=$request->url();

    	$product_nb=Product::all()->where('theloai','NB');
        $category=Category::all();
    	return view('layouts.home',compact('product_nb','category','meta_desc','meta_keywords','meta_title','url_canonical'));
    }
    public function login(){
        
    	return view('login');
    }
    public function about(Request $request){
        $meta_desc="Trang web hỗ trợ bán hàng, tiện lợi , nhanh chóng , dành cho mọi thể loại mặt hàng buôn bán";
        $meta_keywords="Trang web bán hàng, web bán hàng";
        $meta_title="Trang miêu tả, web bán hàng ";
        $url_canonical=$request->url();
        $category=Category::all();
        return view('about',compact('category','meta_desc','meta_keywords','meta_title','url_canonical'));
    }
    public function admin(){
        return view('admin.dashboard');
    }
    public function store($product_img,$product_name,$product_price){
        Cart::add($product_img,$product_name,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in Cart');
        return redirect()->route('home.cart');
    }
    public function shop(Request $request){
        $meta_desc="Cửa hàng, nơi chứa thông tin toàn bộ sản phẩm";
        $meta_keywords="Cửa hàng lựa chọn mua bán các mặt hàng";
        $meta_title="Trang cửa hàng, web bán hàng ";
        $url_canonical=$request->url();
        $product=Product::all();
        $category=Category::all();
        return view('livewire.shop-component',compact('category','product','meta_desc','meta_keywords','meta_title','url_canonical'));
    }
    public function cart(){
        $category=Category::all();
        return view('livewire.cart-component',compact('category'));
    }
    public function product_detail(Request $request,$id){
        $meta_desc="Chi tiết sản phẩm trong cửa hàng";
        $meta_keywords="Chi tiết sản phẩm ";
        $meta_title="Trang chi tiết, web bán hàng ";
        $url_canonical=$request->url();
        $product_detail=Product::all()->where('id',$id);
        $category=Category::all();
        foreach($product_detail as $key => $value){
            $category_id=$value->masp;
        }
       
    
        $item_recom =Product::all()->where('masp',$category_id)->whereNotIn('masp',$id);
      

        return view('layouts.product_detail',compact('category','product_detail','item_recom','meta_desc','meta_keywords','meta_title','url_canonical'));
    }
    public function search(Request $request){
        $keywords=$request->keywords_submit;
        $category=Category::all();
        //Loi 
        $product_search=Product::all()->where('name','like','%'.$keywords.'%');
        

       
        return view('layouts.search',compact('category','product_search'));
    }
    public function show_category($find,Request $request){
       
        $category=Category::all();
        $product=DB::table('sanpham')
        ->join('theloai','sanpham.masp','=','theloai.theloai')
        ->where('theloai.theloai','=',$find)->get();
      
      
        foreach($product as $key => $value){
            $meta_desc=$value->meta_desc;
            $meta_keywords=$value->meta_keywords;
            $meta_title=$value->Tên;
            $url_canonical=$request->url();
        }
        
        return view('layouts.category_detail',compact('product','category','meta_desc','meta_keywords','meta_title','url_canonical'));
    }
    
}
