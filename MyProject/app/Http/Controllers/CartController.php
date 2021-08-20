<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Product;
use Session;

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
    $data['options']['img']=$product->img;
    Cart::add($data);
    return redirect('/cart');
   
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
}
