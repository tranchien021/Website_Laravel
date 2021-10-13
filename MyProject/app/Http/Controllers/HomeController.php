<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mymodel;
use App\Models\Product;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Brand;
use App\Models\CategoryBlog;
use App\Models\Gallery;
use App\Models\Icons;
use App\Models\Rating;

use Cart;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request){
        $meta_desc="Trang web hỗ trợ bán hàng, tiện lợi , nhanh chóng , dành cho mọi thể loại mặt hàng buôn bán";
        $meta_keywords="Trang web bán hàng, web bán hàng";
        $meta_title="Trang chủ, web bán hàng ";
        $url_canonical=$request->url();
        $icon=Icons::orderBy('icon_id','ASC')->where('category','icons')->get();
        $partner=Icons::orderBy('icon_id','ASC')->where('category','partner')->get();
        
        
       

        $category=Category::all();
        $brand=Brand::where('brand_status',1)->orderBy('brand_parent','DESC')->orderBy('brand_order','ASC')->get();
        $cate_pro_tab=Category::orderBy('id','ASC')->get();
       
        $category_blog=CategoryBlog::all();

        $product_nb=Product::orderBy('price','DESC')->take(6)->get();
        
        
        $slider=Slider::orderBy('slider_id','DESC')->where('slider_status','1')->get();
       
    	return view('layouts.home',compact('partner','icon','cate_pro_tab','category_blog','brand','slider','product_nb','category','meta_desc','meta_keywords','meta_title','url_canonical'));
    }
    public function login(){
        
    	return view('login');
    }
    public function about(Request $request){
        $meta_desc="Trang web hỗ trợ bán hàng, tiện lợi , nhanh chóng , dành cho mọi thể loại mặt hàng buôn bán";
        $meta_keywords="Trang web bán hàng, web bán hàng";
        $meta_title="Trang miêu tả, web bán hàng ";
        $url_canonical=$request->url();
        $icon=Icons::orderBy('icon_id','ASC')->get();
       
        $category=Category::all();
        $brand=Brand::where('brand_status',1)->orderBy('brand_parent','DESC')->orderBy('brand_order','ASC')->get();
        $category_blog=CategoryBlog::all();
       
        return view('about',compact('icon','category_blog','brand','category','meta_desc','meta_keywords','meta_title','url_canonical'));
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
      
        $category=Category::all();
        $slider=Slider::orderBy('slider_id','DESC')->where('slider_status','1')->get();
        $brand=Brand::where('brand_status',1)->orderBy('brand_parent','DESC')->orderBy('brand_order','ASC')->get();
        $category_blog=CategoryBlog::all();
        $max_price_product=Product::max('price');
        $min_price_product=Product::min('price');

        if(isset($_GET['sort_by'])){
            $sort_by=$_GET['sort_by'];
            if($sort_by=='giam_dan'){
                $products=Product::orderBy('price','DESC')->paginate(9)->appends(request()->query());
            }elseif($sort_by=='tang_dan'){
                $products=Product::orderBy('price','ASC')->paginate(9)->appends(request()->query());
            }elseif($sort_by=='kytu_za'){
                $products=Product::orderBy('name','DESC')->paginate(9)->appends(request()->query());
            }elseif($sort_by=='kytu_az'){
                $products=Product::orderBy('price','DESC')->paginate(9)->appends(request()->query());
            }
        }elseif(isset($_GET['start_price']) && $_GET['end_price']){
            $min_price=$_GET['start_price'];
            $max_price=$_GET['end_price'];
            $products=Product::whereBetween('price',[$min_price,$max_price])->orderBy('id','ASC')->paginate(9);
        }else{
            $products=Product::orderBy('id','ASC')->paginate(9)->appends(request()->query());
        }
        

        return view('livewire.shop-component',compact('max_price_product','min_price_product','category_blog','brand','slider','category','products','meta_desc','meta_keywords','meta_title','url_canonical'));
    }
   
    public function product_detail(Request $request,$id){
        $slider=Slider::orderBy('slider_id','DESC')->where('slider_status','1')->get();

        $meta_desc="Chi tiết sản phẩm trong cửa hàng";
        $meta_keywords="Chi tiết sản phẩm ";
        $meta_title="Trang chi tiết, web bán hàng ";
        $url_canonical=$request->url();

        $brand=Brand::where('brand_status',1)->orderBy('brand_parent','DESC')->orderBy('brand_order','ASC')->get();

        $category=Category::all();

        $category_blog=CategoryBlog::all();

        $product_detail=Product::all()->where('id',$id);

        foreach($product_detail as $key => $value){
            $category_name=$value->masp;
            $product_id=$value->id;
            $product_cate=$value->masp;
        }
        
        $product=Product::where('id',$product_id)->first();
        $product->product_view=$product->product_view+1;
        $product->save();
        
        $gallery=Gallery::where('id',$product_id)->get();
     
        $item_recom=Product::all()->where('masp',$category_name)->whereNotIn('masp',$id);
        $rating=Rating::where('product_id',$product_id)->avg('rating');
        $rating=round($rating);

        return view('layouts.product_detail',compact('rating','product_cate','gallery','category_blog','brand','slider','category','product_detail','item_recom','meta_desc','meta_keywords','meta_title','url_canonical'));
    }
    public function search(Request $request){
        $slider=Slider::orderBy('slider_id','DESC')->where('slider_status','1')->get();
        $keywords=$request->keywords_submit;
        $category=Category::all();
        $brand=Brand::where('brand_status',1)->orderBy('brand_parent','DESC')->orderBy('brand_order','ASC')->get();

        $meta_desc="Tìm kiếm các sản phẩm trong cửa hàng";
        $meta_keywords="Liệt kê sản phẩm cần tìm";
        $meta_title="Trang tìm kiếm, web bán hàng ";
        $url_canonical=$request->url();
        $category_blog=CategoryBlog::all();
        $product_search=DB::table('sanpham')->where('name','like','%'.$keywords.'%')->get();
        

       
        return view('layouts.search',compact('category_blog','brand','slider','category','product_search','meta_desc','meta_keywords','meta_title','url_canonical'));
    }
    public function show_category($find,Request $request){
        $slider=Slider::orderBy('slider_id','DESC')->where('slider_status','1')->get();
        $keywords=$request->keywords_submit;
        $category=Category::all();
        $brand=Brand::where('brand_status',1)->orderBy('brand_parent','DESC')->orderBy('brand_order','ASC')->get();
        $category_blog=CategoryBlog::all();
        
      
        $products=DB::table('sanpham')
        ->join('theloai','sanpham.masp','=','theloai.theloai')
        ->where('theloai.theloai','=',$find)->get();

        $product=Product::where('masp',$find)->get();
      
        

      
      
        foreach($product as $key => $value){
            $meta_desc=$value->meta_desc;
            $meta_keywords=$value->meta_keywords;
            $meta_title=$value->Tên;
            $url_canonical=$request->url();
        }
        
        return view('layouts.category_detail',compact('product','category_blog','brand','slider','products','category','meta_desc','meta_keywords','meta_title','url_canonical'));
    }
    public function auto_complete_ajax(Request $request){
        $data=$request->all();
        if($data['query']){
            $product=Product::where('name','LIKE','%'.$data['query'].'%')->get();
            $output='<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($product as $value){
                $output.='
                    <li class="li_search_ajax"><a href="#">'.$value->name.'</a></li>
                ';
            }
            $output.='</ul>';
            echo $output;
        }
    }
    
}
