<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Product;
use Session;
use App\Models\CategoryBlog;
use App\Models\Icons;

class CartController extends Controller
{
  public function AddCart(Request $request)
  {
    $product_id = $request->product_hidden;
    $quantity = $request->qty;

    $product = Product::all()->where('id', $product_id)->first();

    $data['id'] = $product->id;
    $data['name'] = $product->name;
    $data['price'] = $product->price;
    $data['qty'] = $quantity;
    $data['weight'] = '21';
    $data['tax'] = 30000;
    $data['options']['img'] = $product->img;
    Cart::add($data);

    return redirect('/cart');
    // Cart::destroy();

  }
  public function index()
  {
    return view('livewire.cart-component');
  }
  public function delete_cart($rowId)
  {
    Cart::update($rowId, 0);
    return redirect('/cart');
  }
  public function update_cart(Request $request)
  {
    $rowId = $request->rowId_cart;
    $qty = $request->cart_quantity;
    Cart::update($rowId, $qty);
    return redirect('/cart');
  }
  public function AddCart_Ajax(Request $request)
  {
    $data = $request->all();
    $session_id = substr(md5(microtime()), rand(0, 26), 5);
    $cart = Session::get('cart');
    if ($cart == true) {
      $is_avaiable = 0;
      foreach ($cart as $key => $val) {
        if ($val['product_id'] == $data['cart_product_id']) {
          $is_avaiable++;
        }
      }
      if ($is_avaiable == 0) {
        $cart[] = array(
          'session_id' => $session_id,
          'product_name' => $data['cart_product_name'],
          'product_id' => $data['cart_product_id'],
          'product_img' => $data['cart_product_img'],
          'product_qty' => $data['cart_product_qty'],
          'product_quantity' => $data['cart_product_quantity'],
          'product_price' => $data['cart_product_price'],
        );
        Session::put('cart', $cart);
      }
    } else {
      $cart[] = array(
        'session_id' => $session_id,
        'product_name' => $data['cart_product_name'],
        'product_id' => $data['cart_product_id'],
        'product_img' => $data['cart_product_img'],
        'product_qty' => $data['cart_product_qty'],
        'product_quantity' => $data['cart_product_quantity'],
        'product_price' => $data['cart_product_price'],

      );
      Session::put('cart', $cart);
    }

    Session::save();
  }

  public function giohang()
  {
    $category_blog = CategoryBlog::all();
    return view('livewire.cart_ajax', compact('category_blog'));
  }
  public function delete_cart_ajax($session_id)
  {
    $cart = Session::get('cart');
    if ($cart == true) {
      foreach ($cart as $key => $value) {
        if ($value['session_id'] == $session_id) {
          unset($cart[$key]);
        }
      }
      Session::put('cart', $cart);
      return redirect()->back()->with('message', 'Xoá thành công');
    } else {
      return redirect() - back()->with('message', 'Xoá thất bại');
    }
  }
  public function update_cart_ajax(Request $request)
  {
    $data = $request->all();
    $cart = Session::get('cart');
    if ($cart == true) {
      $message = "";
      foreach ($data['cart_qty'] as $key => $qty) {
        $i = 0;
        foreach ($cart as $session => $val) {
          $i++;
          if ($val['session_id'] == $key && $qty < $cart[$session]['product_quantity']) {
            $cart[$session]['product_qty'] = $qty;
            $message .= '<p style="color:green">' . $i . ') Cập nhật số lượng :' . $cart[$session]['product_name'] . ' thành công </p>';
          } elseif ($val['session_id'] == $key && $qty > $cart[$session]['product_quantity']) {
            $message .= '<p style="color:red">' . $i . ') Cập nhật số lượng :' . $cart[$session]['product_name'] . ' thất bại </p>';
          }
        }
      }
      Session::put('cart', $cart);
      return redirect()->back()->with('message', $message);
    } else {
      return redirect()->back()->with('message', 'Cật nhật bất bại');
    }
  }
  public function delete_all_cart()
  {
    $cart = Session::get('cart');
    if ($cart == true) {
      // Session::destroy();
      Session::forget('cart');
      Session::forget('coupon');
      return redirect()->back()->with('message', 'Xoá tất cả thành công');
    }
  }
  public function show_cart_quantity(){
    $cart_count=count(Session::get('cart'));
    $output='';
    $output.='<span class="badges count_product">'.$cart_count.'</span>';
    
    echo $output;
  }
  public function hover_cart(){
    $cart_count=count(Session::get('cart'));
    $output='';
    if($cart_count>0){
      $output.='
      <ul class="hover_cart">';
      foreach(Session::get('cart') as $value){
      $output.='
      <li>
        <a href="">
          <img src="'.asset('uploads/home/'.$value['product_img']).'" alt="">
          <p>'.number_format($value['product_price'],0,',','.').' đ</p>
          <p> Số lượng : '.$value['product_qty']. ' </p>
          <a style="background: #ffff99" class="cart_quantity_delete" href="'.url('/delete_cart_ajax/'.$value['session_id']).'">
              <i class="fa fa-times" ></i>
          </a>
        </a>
      </li>';
      }
     


    $output.='</ul>';
  
    }else{
      $output.=' <ul class="hover_cart">
      <li>
        <p> Giỏ hàng rỗng </p>
      </li>
      

    </ul>';
    }
   
    
    echo $output;
  }
  public function remove_cart(Request $request){
    $data=$request->all();
    $cart=Session::get('cart');
    if($cart==true){
      foreach($cart as $key => $value){
        if($value['product_id']==$data['id']){
          unset($cart[$key]);
        }
      }
      Session::put('cart',$cart);
    }
  }
  public function cart_session(){
    $output='';
    if(Session::get('cart')==true){
      foreach(Session::get('cart') as $value){
        $output.='
          <input type="hidden" class="cart_id" value="'.$value['product_id'].'">
        ';
      }
    }
    echo $output;
  }
  public function show_quick_cart(){
    $output='
    <form>
    '.csrf_field().'
    <table class="table table-condensed">
    <thead>
      <tr class="cart_menu">
        <td class="image"> Hình Ảnh </td>
        <td class="description">Tên sản phẩm </td>
        <td class="price">Giá sản phẩm</td>
        <td> Số lượng trong kho </td>
        <td class="quantity">Số lượng </td>
        <td class="total">Thành tiền </td>
        <td class="delete"> Xoá </td>

        <td></td>
      </tr>
    </thead>
    <tbody>
    ';
    
						if(Session::get('cart')==true){
					
							$total=0;
				
					foreach(Session::get('cart') as $cart){
			
						$subtotal=$cart['product_price']*$cart['product_qty'];
						$total+=$subtotal;

            $output.='
						<tr>
							<td class="">
								<a href=""><img style="width:90px !important" src="'.url('uploads/home/'.$cart['product_img']).'" alt=""></a>
							</td>
							<td class="cart_description">
								<h6><a href="">'.$cart['product_name'].'</a></h6>
								<p>Web ID: '.$cart['product_id'].'</p>
							</td>
							<td class="cart_price">
								<p>'.number_format($cart['product_price'],0,',','.') .' đ</p>
							</td>
							<td>
								<p>'.$cart['product_quantity'].'</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">

									<input data-session_id="'.$cart['session_id'].'" class="cart_quantity" type="number"  value="'.$cart['product_qty'].'" min=1 autocomplete="off" size="2">

								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">
                '.number_format($subtotal,0,',','.') .' đ
								</p>
							</td>
							<td class="cart_delete">
								<a style="cursor:pointer" class="cart_quantity_delete" id="'.$cart['session_id'].'" onclick="delete_quick_cart(this.id)" ><i class="fa fa-times"></i></a>
							</td>
						</tr>';
              }
              $output.='
						<tr>
							<td><button type="submit" name="update_qty" class="btn btn-primary btn-default btn-sm">Cập nhật giỏ hàng </button></td>
							<td><a class="btn btn-default btn-primary check_out" href="'.url('/delete_all_cart').'"> Xoá tất cả </a></td>
							
							
							<td>';
             
							  if(Session::get('customer_id')){
                  $output.='<a class="btn btn-primary btn-default" href="'.url('/checkout').'">Đặt hàng  </a>';
                }else{
								  $output.='<a class="btn btn-primary btn-default" href="'.url('/login_checkout').'">Đặt hàng  </a>';
                }
							
                $output.='
							</td>
							
	
							<td col-span="2">
								<li>Tổng giá <span>'.number_format($total,0,',','.') .'đ</span></li>
								
								
							</td>
						
								
						</tr>';

            }else{

            $output.='
						<tr>
							<td colspan="7" style="text-align:center">
							
								 Không có sản phẩm nào trong giỏ hàng
							
							</td>
						</tr>';
							
          }
          $output.='
					</tbody>
					
				</table></form>';
        echo $output;
  }
  public function update_quick_cart(Request $request){
    $data=$request->all();
    $cart=Session::get('cart');

    if($cart==true){
      foreach($cart as $session => $value ){
        if($value['session_id']==$data['session_id']){
          $cart[$session]['product_qty']=$data['quantity'];
        }
      }
      Session::put('cart',$cart);
    }
  }
  
 
}
