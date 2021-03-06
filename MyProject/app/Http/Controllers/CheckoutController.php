<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mymodel;
use App\Models\Product;
use App\Models\Category;
use App\Models\CategoryBlog;
use App\Models\Customer;
use App\Models\Shipping;
use App\Models\Payment;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\Moneyship;
use App\Models\Slider;
use App\Models\Brand;
use App\Models\Coupon;
use App\Models\Gallery;
use App\Rules\Captcha;
use Carbon\Carbon;

use Cart;

use Illuminate\Support\Facades\Mail;

use Session;


class CheckoutController extends Controller
{

    public function login_checkout(Request $request)
    {
        $slider = Slider::orderBy('slider_id', 'DESC')->where('slider_status', '1')->get();
        $meta_desc = "Đăng nhập và đăng ký để giao dịch";
        $meta_keywords = "Đăng Nhập, đăng ký";
        $meta_title = "Đăng nhập và Đăng Ký ";
        $url_canonical = $request->url();
        $category = Category::all();
        $brand = Brand::where('brand_status', 1)->orderBy('brand_parent', 'DESC')->orderBy('brand_order', 'ASC')->get();
        $category_blog = CategoryBlog::all();

        return view('layouts.login_checkout', compact('category_blog', 'brand', 'category', 'meta_desc', 'meta_keywords', 'meta_title', 'url_canonical', 'slider'));
    }
    //Đăng ký 
    public function add_customer(Request $request)
    {
        $data = $request->validate([
            'customer_name' => 'required',
            'customer_email' => 'required',
            'customer_password' => 'required',
            'customer_phone' => 'required',
            'g-recaptcha-response' => new Captcha(),
        ]);

        $customer = new Customer();
        $customer->customer_name = $data['customer_name'];
        $customer->customer_email = $data['customer_email'];
        $customer->customer_phone = $data['customer_phone'];
        $customer->customer_password = md5($data['customer_password']);

        $customer->save();


        Session::put('customer_id', $customer->customer_id);
        Session::put('customer_name', $request->customer_name);
        return redirect('/checkout');
    }
    public function checkout(Request $request)
    {
        $meta_desc="Trang web hỗ trợ bán đồ ăn , tiện lợi , nhanh chóng , dành cho mọi thể loại mặt hàng buôn bán";
        $meta_keywords="Trang web bán hàng, web bán hàng";
        $meta_title="Trang đơn hàng , web food";
        $url_canonical=$request->url();
    
        $city = City::orderBy('matp', 'ASC')->get();
        $category=Category::all();
        $brand=Brand::where('brand_status',1)->orderBy('brand_parent','DESC')->orderBy('brand_order','ASC')->get();
        $category_blog=CategoryBlog::all();
        $slider=Slider::orderBy('slider_id','DESC')->where('slider_status','1')->get();
        
       
       
        return view('layouts.checkout',compact('city','category_blog','brand','slider','category','meta_desc','meta_keywords','meta_title','url_canonical'));

      
        

        
    }
    public function save_checkout(Request $request)
    {
        $data = array();
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_notes'] = $request->shipping_notes;

        $shipping_id = Shipping::insertGetId($data);
        Session::put('shipping_id', $shipping_id);

        return redirect('/payment');
    }
    public function logout_checkout()
    {
        Session::flush();

        return redirect('/login_checkout');
    }
    public function login_customer(Request $request)
    {

        $email = $request->email_account;
        $password = md5($request->password_account);
        $result = Customer::all()->where('customer_email', $email)->where('customer_password', $password)->first();
        if (Session::get('coupon') == true) {
            Session::forget('coupon');

            if ($result) {
                Session::put('customer_id', $result->customer_id);
                return redirect('/checkout');
            } else {
                return redirect('/login_checkout');
            }
        } else {
            if ($result) {
                Session::put('customer_id', $result->customer_id);
                return redirect('/checkout');
            } else {
                return redirect('/login_checkout');
            }
        }
    }

    public function handcash()
    {
        return view('layouts.handcash');
    }
    public function manage_order()
    {
        return view('admin.manage_order');
    }
    public function delivery_home(Request $request)
    {
        $data = $request->all();

        if ($data['action']) {
            $output = "";
            if ($data['action'] == "city") {
                $select_province = Province::where('matp', $data['ma_id'])->orderBy('maqh', 'ASC')->get();
                $output .= "<option>----- Chọn quận huyện mới--------</option>";
                foreach ($select_province as $key => $province) {
                    $output .= '<option value=" ' . $province->maqh . '">' . $province->name_quanhuyen . '</option>';
                }
            } else {
                $select_wards = Wards::where('maqh', $data['ma_id'])->orderBy('xaid', 'ASC')->get();
                $output .= "<option>----- Chọn xã phường mới --------</option>";
                foreach ($select_wards as $key => $ward) {
                    $output .= '<option value=" ' . $ward->xaid . '">' . $ward->name_xaphuong . '</option>';
                }
            }
        }
        echo $output;
    }
    public function calculate_money(Request $request)
    {
        $data = $request->all();

        if ($data['matp']) {
            $moneyship = Moneyship::where('mship_matp', $data['matp'])->where('mship_maqh', $data['maqh'])->where('mship_xaid', $data['xaid'])->get();
            if ($moneyship) {
                $count_moneyship = $moneyship->count();
                if ($count_moneyship > 0) {
                    foreach ($moneyship as $money) {
                        Session::put('money', $money->mship_money);
                        Session::save();
                    }
                } else {
                    Session::put('money', 30000);
                    Session::save();
                }
            }
        }
    }
    public function delete_moneyship()
    {
        Session::forget('money');
        return redirect()->back();
    }
    public function confirm_order(Request $request)
    {
        $data = $request->all();
        if ($data['order_coupon'] != 'no') {
            $coupon = Coupon::where('coupon_code', $data['order_coupon'])->first();
            $coupon->coupon_time = $coupon->coupon_time - 1;
            $coupon->coupon_used = $coupon->coupon_used . ',' . Session::get('customer_id');
            $coupon_mail = $coupon->coupon_code;
            $coupon->save();
        } else {
            $coupon_mail = " Không có ";
        }




        $shipping = new Shipping();
        $shipping->shipping_email = $data['shipping_email'];
        $shipping->shipping_name = $data['shipping_name'];
        $shipping->shipping_address = $data['shipping_address'];
        $shipping->shipping_phone = $data['shipping_phone'];
        $shipping->shipping_notes = $data['shipping_notes'];
        $shipping->shipping_method = $data['shipping_method'];
        $shipping->save();
        $shipping_id = $shipping->shipping_id;

        $checkout_code = substr(md5(microtime()), rand(0, 26), 5);



        $order = new Order;
        $order->customer_id = Session::get('customer_id');
        $order->shipping_id = $shipping_id;
        $order->order_status = 1;
        $order->order_code = $checkout_code;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $order->order_date = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $order->created_at = now();
        $order->save();


        if (Session::get('cart') == true) {
            foreach (Session::get('cart') as $cart) {
                $order_details = new OrderDetail;
                $order_details->order_code = $checkout_code;
                $order_details->product_id = $cart['product_id'];
                $order_details->id = $cart['product_id'];
                $order_details->product_name = $cart['product_name'];
                $order_details->product_price = $cart['product_price'];
                $order_details->product_sale_quantity = $cart['product_qty'];
                $order_details->product_coupon = $data['order_coupon'];
                $order_details->product_moneyship = $data['order_money'];
                $order_details->save();
            }
        }

        // Send mail confirm
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        $title_mail = "Đơn hàng xác nhận ngày " . ' ' . $now;
        $customer = Customer::find(Session::get('customer_id'));

        $data['email'][] = $customer->customer_email;

        if (Session::get('cart') == true) {
            foreach (Session::get('cart') as $cart_mail) {
                $cart_array[] = array(
                    'product_name' => $cart_mail['product_name'],
                    'product_price' => $cart_mail['product_price'],
                    'product_quantity' => $cart_mail['product_qty']
                );
            }
        }
        if(Session::get('money')==true){
            $money=Session::get('money');
        }else{
            $money='30000';
        }
        
        // Get shipping 
        $shipping_array = array(
            'money'=>$money,
            'customer_name' => $customer->customer_name,
            'shipping_name' => $data['shipping_name'],
            'shipping_email' => $data['shipping_email'],
            'shipping_phone' => $data['shipping_phone'],
            'shipping_address' => $data['shipping_address'],
            'shipping_notes' => $data['shipping_notes'],
            'shipping_method' => $data['shipping_method']

        );
        $ordercode_mail = array(
            'coupon_code' => $coupon_mail,
            'order_code' => $checkout_code

        );



        Mail::send('layouts.mail.mail_order', ['cart_array' => $cart_array, 'shipping_array' => $shipping_array, 'code' => $ordercode_mail], function ($message) use ($title_mail, $data) {
            $message->to($data['email'])->subject($title_mail);
            $message->from($data['email'], $title_mail);
        });





        Session::forget('coupon');
        Session::forget('money');
        Session::forget('cart');
    }


    // public function payment(){
    //     return view('layouts.payment_checkout');

    // }
    // public function order_place(Request $request){

    //     $data=array();
    //     $data['payment_method']=$request->payment_option;
    //     $data['payment_status']="Đang chờ xử lý ";
    //     $payment_id=Payment::insertGetId($data);

    //     $order_data=array();
    //     $order_data['customer_id']=Session::get('customer_id');
    //     $order_data['shipping_id']=Session::get('shipping_id');
    //     $order_data['payment_id']=$payment_id;
    //     $order_data['order_total']=Cart::total();
    //     $order_data['order_status']="Đang chờ xử lý";
    //     $order_id=Order::insertGetId($order_data);

    //    $content=Cart::content();
    //    foreach($content as $content){
    //        $order_detail_data['order_id']=$order_id;
    //        $order_detail_data['product_id']=$content->id;
    //        $order_detail_data['product_name']=$content->name;
    //        $order_detail_data['product_price']=$content->price;
    //        $order_detail_data['product_sale_quantity']=$content->qty;
    //        OrderDetail::insert($order_detail_data);

    //     }
    //     if($data['payment_method']==1){
    //         echo "Thanh toán thẻ ATM";
    //     }elseif($data['payment_method']==2){
    //        return view('layouts.handcash');
    //     }
    //     else{
    //         echo "Thẻ ghi nợ";
    //     }
    //     return redirect('/payment');

    // }


}
