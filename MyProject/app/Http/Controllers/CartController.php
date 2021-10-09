<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Product;
use Session;
use App\Models\CategoryBlog;

class CartController extends Controller
{
  public function AddCart(Request $request){
    $product_id=$request->product_hidden;
    $quantity=$request->qty;

    $product=Product::all()->where('id',$product_id)->first();
    
    $data['id']=$product->id;
    $data['name']=$product->name;
    $data['price']=$product->price;
    $data['qty']=$quantity;
    $data['weight']='21';
    $data['tax']=30000;
    $data['options']['img']=$product->img;
    Cart::add($data);
    
    return redirect('/cart');
    // Cart::destroy();
   
  }
  public function index(){
    return view('livewire.cart-component');
  }
  public function delete_cart($rowId){
    Cart::update($rowId,0);
    return redirect('/cart');
  }
  public function update_cart(Request $request){
    $rowId=$request->rowId_cart;
    $qty=$request->cart_quantity;
    Cart::update($rowId,$qty);
    return redirect('/cart');
  
  }
  public function AddCart_Ajax(Request $request){
    $data = $request->all();
    $session_id = substr(md5(microtime()),rand(0,26),5);
    $cart = Session::get('cart');
    if($cart==true){
        $is_avaiable = 0;
        foreach($cart as $key => $val){
            if($val['product_id']==$data['cart_product_id']){
                $is_avaiable++;
            }
        }
        if($is_avaiable == 0){
            $cart[] = array(
            'session_id' => $session_id,
            'product_name' => $data['cart_product_name'],
            'product_id' => $data['cart_product_id'],
            'product_img' => $data['cart_product_img'],
            'product_qty' => $data['cart_product_qty'],
            'product_quantity' => $data['cart_product_quantity'],
            'product_price' => $data['cart_product_price'],
            );
            Session::put('cart',$cart);
        }
    }else{
        $cart[] = array(
            'session_id' => $session_id,
            'product_name' => $data['cart_product_name'],
            'product_id' => $data['cart_product_id'],
            'product_img' => $data['cart_product_img'],
            'product_qty' => $data['cart_product_qty'],
            'product_quantity' => $data['cart_product_quantity'],
            'product_price' => $data['cart_product_price'],

        );
        Session::put('cart',$cart);
    }
   
    Session::save();
  }

  public function giohang(){
    $category_blog=CategoryBlog::all();
    return view('livewire.cart_ajax',compact('category_blog'));

  }
  public function delete_cart_ajax($session_id){
    $cart=Session::get('cart');
    if($cart==true){
      foreach($cart as $key => $value){
        if($value['session_id']==$session_id){
          unset($cart[$key]);
        }
      }
      Session::put('cart',$cart);
      return redirect()->back()->with('message','Xoá thành công');
    }
    else{
      return redirect()-back()->with('message','Xoá thất bại');
    }
    
  }
  public function update_cart_ajax(Request $request){
    $data=$request->all();
    $cart=Session::get('cart');
    if($cart==true){
      $message="";
      foreach($data['cart_qty'] as $key => $qty){
        $i=0;
        foreach($cart as $session=>$val){
          $i++;
          if($val['session_id']==$key && $qty<$cart[ $session]['product_quantity']){
            $cart[$session]['product_qty']=$qty;
            $message.='<p style="color:green">'.$i.') Cập nhật số lượng :'.$cart[$session]['product_name'] .' thành công </p>';
          }
          elseif($val['session_id']==$key && $qty>$cart[ $session]['product_quantity']){
            $message.='<p style="color:red">'.$i.') Cập nhật số lượng :'.$cart[$session]['product_name'] .' thất bại </p>';
          }
        }
      }
      Session::put('cart',$cart);
      return redirect()->back()->with('message', $message);
    }else{
      return redirect()->back()->with('message','Cật nhật bất bại');
    }
    
  }
  public function delete_all_cart(){
    $cart=Session::get('cart');
    if($cart==true){
      // Session::destroy();
      Session::forget('cart');
      Session::forget('coupon');
      return redirect()->back()->with('message','Xoá tất cả thành công');
    }
  }
  

}
