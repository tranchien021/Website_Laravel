<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mymodel;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Shipping;
use App\Models\Payment;
use App\Models\Order;
use App\Models\OrderDetail;

use Cart;
use Session;

class CheckoutController extends Controller
{
    public function login_checkout(){
        $category=Category::all();
        return view('layouts.login_checkout',compact('category'));
    }
    public function add_customer(Request $request){
        $data=array();
        $data['customer_name']=$request->customer_name;
        $data['customer_email']=$request->customer_email;
        $data['customer_password']=md5($request->customer_password);
        $data['customer_phone']=$request->customer_phone;
        
        $customer_id=Customer::insertGetId($data);
        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);
        return redirect('/checkout');
    }
    public function checkout(){
        $category=Category::all();
        return view('layouts.checkout',compact('category'));
    }
    public function save_checkout(Request $request){
        $data=array();
        $data['shipping_email']=$request->shipping_email;
        $data['shipping_name']=$request->shipping_name;
        $data['shipping_address']=$request->shipping_address;
        $data['shipping_phone']=$request->shipping_phone;
        $data['shipping_notes']=$request->shipping_notes;
        
        $shipping_id=Shipping::insertGetId($data);
        Session::put('shipping_id',$shipping_id);

        return redirect('/payment');
    }
    public function logout_checkout(){
        Session::flush();
        return redirect('/login_checkout');
    }
    public function login_customer(Request $request){
        
        $email=$request->email_account;
        $password=md5($request->password_account);
        $result=Customer::all()->where('customer_email',$email)->where('customer_password',$password)->first();
        
        
        if($result){
            Session::put('customer_id',$result->customer_id);
            return redirect('/checkout');

        }
        else{
            return redirect('/login_checkout');
        }
    }
    public function payment(){
        return view('layouts.payment_checkout');

    }
    public function order_place(Request $request){
       
        $data=array();
        $data['payment_method']=$request->payment_option;
        $data['payment_status']="Đang chờ xử lý ";
        $payment_id=Payment::insertGetId($data);
        
        $order_data=array();
        $order_data['customer_id']=Session::get('customer_id');
        $order_data['shipping_id']=Session::get('shipping_id');
        $order_data['payment_id']=$payment_id;
        $order_data['order_total']=Cart::total();
        $order_data['order_status']="Đang chờ xử lý";
        $order_id=Order::insertGetId($order_data);

       $content=Cart::content();
       foreach($content as $content){
           $order_detail_data['order_id']=$order_id;
           $order_detail_data['product_id']=$content->id;
           $order_detail_data['product_name']=$content->name;
           $order_detail_data['product_price']=$content->price;
           $order_detail_data['product_sale_quantity']=$content->qty;
           OrderDetail::insert($order_detail_data);
          
        }
        if($data['payment_method']==1){
            echo "Thanh toán thẻ ATM";
        }elseif($data['payment_method']==2){
           return view('layouts.handcash');
        }
        else{
            echo "Thẻ ghi nợ";
        }
        return redirect('/payment');
      
    }
    public function handcash(){
        return view('layouts.handcash');
    }
    public function manage_order(){
        return view('admin.manage_order');
     }
}
