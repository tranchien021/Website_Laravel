<?php

namespace App\Http\Controllers;

use App\Models\Brand;
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
use App\Models\Coupon;
use App\Models\Slider;
use App\Models\Statistical;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{

    public function manage_order()
    {
        $order = Order::orderBy('created_at', 'DESC')->get();

        return view('admin.order.manage_order', compact('order'));
    }

    public function view_order($order_code)
    {

        $order_detail = OrderDetail::with('product')->where('order_code', $order_code)->get();

        $order = Order::where('order_code', $order_code)->get();
        foreach ($order as $ord) {
            $customer_id = $ord->customer_id;
            $shipping_id = $ord->shipping_id;
            $order_status = $ord->order_status;
        }
        $customer = Customer::where('customer_id', $customer_id)->first();
        $shipping = Shipping::where('shipping_id', $shipping_id)->first();
        $order_detail_product = OrderDetail::with('product')->where('order_code', $order_code)->get();

        foreach ($order_detail_product as $key => $order_d) {
            $product_coupon = $order_d->product_coupon;
        }
        if ($product_coupon != 'no') {
            $coupon = Coupon::where('coupon_code', $product_coupon)->first();
            $coupon_condition = $coupon->coupon_condition;
            $coupon_number = $coupon->coupon_number;
        } else {
            $coupon_condition = 2;
            $coupon_number = 0;
        }





        return view('admin.order.view_order', compact('order_status', 'order', 'order_detail', 'customer', 'shipping', 'order_detail_product', 'coupon_condition', 'coupon_number'));
    }
    public function print_order($checkout_code)
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($checkout_code));

        return $pdf->stream();
    }
    public function print_order_convert($checkout_code)
    {

        $order_detail = OrderDetail::where('order_code', $checkout_code)->get();
        $order = Order::where('order_code', $checkout_code)->get();
        foreach ($order as $ord) {
            $customer_id = $ord->customer_id;
            $shipping_id = $ord->shipping_id;
        }
        $customer = Customer::where('customer_id', $customer_id)->first();
        $shipping = Shipping::where('shipping_id', $shipping_id)->first();
        $order_detail_product = OrderDetail::with('product')->where('order_code', $checkout_code)->get();
        foreach ($order_detail_product as $key => $order) {
            $product_coupon = $order->product_coupon;
        }
        if ($product_coupon != 'no') {
            $coupon = Coupon::where('coupon_code', $product_coupon)->first();

            $coupon_condition = $coupon->coupon_condition;
            $coupon_number = $coupon->coupon_number;
            if ($coupon_condition == 1) {
                $coupon_echo = $coupon_number . '%';
            } elseif ($coupon_condition == 2) {
                $coupon_echo = number_format($coupon_number, 0, ',', '.') . 'đ';
            }
        } else {
            $coupon_condition = 2;
            $coupon_number = 0;
            $coupon_echo = 0;
        }



        $output = "";
        $output .= '
       
        <style>
            body{
                font-family:DejaVu Sans;
            }
            .table-styling{
                border:1px solid $000;
            }
            .table-styling tr td{
                margin: 5px;
            }
        </style>
        <h1><center>Công ty phần mềm TNHH MinhChien</center></h1>
        <h2><center>Hoá đơn thanh toán sản phẩm</center></h2>
        <h4>Người đặt hàng</h4>
        <table class="">
                    <thead>
                        <tr>
                            <th scope="2">Tên khách hàng </th>
                            <th scope="2">Số điện thoại </th>
                            <th >Email </th>
                        </tr>
                    </thead>
                    <tbody>';

        $output .= '
                        <tr>
                            <td>' . $customer->customer_name . '</td>
                            <td>' . $customer->customer_phone . '</td>
                            <td>' . $customer->customer_email . '</td>
                        </tr>';
        $output .= '
                    </tbody>
        </table>
        
        <h4>Người nhận hàng</h4>
        <table class="table-styling">
                    <thead>
                        <tr>
                            <th>Tên người nhận</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Ghi chú </th>

                        </tr>
                    </thead>
                    <tbody>';

        $output .= '
                        <tr>
                            <td>' . $shipping->shipping_name . '</td>
                            <td>' . $shipping->shipping_address . '</td>
                            <td>' . $shipping->shipping_phone . '</td>
                            <td>' . $shipping->shipping_email . '</td>
                            <td>' . $shipping->shipping_notes . '</td>
                        </tr>';
        $output .= '
                    </tbody>
        </table>

        <h4>Đơn hàng đặt </h4>
        <table class="table-styling">
                    <thead>
                        <tr>
                            <th>Tên sản phẩm </th>
                            <th>Mã giảm giá </th>
                            <th>Phí vận chuyển</th>
                            <th>Số lượng</th>
                            <th>Giá sản phẩm</th>
                            <th>Thành tiền</th>

                        </tr>
                    </thead>
                    <tbody>';

        $total = 0;

        foreach ($order_detail_product as $product) {

            $subtotal = $product->product_price * $product->product_sale_quantity;
            $total += $subtotal;
            if ($product->product_coupon != 'no') {
                $product_coupon = $product->product_coupon;
            } else {
                $product_coupon = "Không có mã";
            }


            $output .= '
                        <tr>
                            <td>' . $product->product_name . '</td>
                            <td>' . $product_coupon . '</td>
                            <td>' . number_format($product->product_moneyship, 0, ',', '.') . '</td>
                            <td>' . $product->product_sale_quantity . '</td>
                            <td>' . number_format($product->product_price, 0, ',', '.') . '</td>
                            <td>' . number_format($subtotal, 0, ',', '.') . '</td>
                        </tr>';
        }
        if ($coupon_condition == 1) {
            $total_after_coupon = ($total * $coupon_number) / 100;

            $total_coupon = $total - $total_after_coupon;
        } else {

            $total_coupon = $total - $coupon_number;
        }
        $output .= '<tr>
            <td colspan="2">
                <p>Tổng giảm :' . $coupon_echo . '  </p>
                <p>Phí vận chuyển :' . number_format($product->product_moneyship, 0, ',', '.') . ' đ </p>
                <p>Thanh toán  :' . number_format($total_coupon - $product->product_moneyship, 0, ',', '.') . ' đ </p>
            </td>
        </tr>';
        $output .= '
                    </tbody>
        </table>
    
        <div style="display:flex">
                <div style="float:left">
                    <h4>Nhân viên<h4>   
                </div>
                <div style="float:right">
                    <h4>
                        Người nhận
                    </h4>
                    <p style="padding-top:20px">Ghi rõ họ tên </p>
                </div>
        </div>
        
        
        
        
        
        
        
        
        ';


        return $output;
    }
    public function update_order_quantity(Request $request)
    {
        $data = $request->all();

        $order = Order::find($data['order_id']);
        $order->order_status = $data['order_status'];
        $order->save();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        $title_mail = "Đơn hàng đã đặt được xác nhận  " . ' ' . $now;
        $customer = Customer::where('customer_id', $order->customer_id)->first();

        $data['email'][] = $customer->customer_email;


        foreach ($data['order_product_id'] as $key => $product) {
            $product_mail = Product::find($product);
            foreach ($data['quantity'] as $key_sub => $qty) {
                if ($key == $key_sub) {
                    $cart_array[] = array(
                        'product_name' => $product_mail['name'],
                        'product_price' => $product_mail['price'],
                        'product_quantity' => $qty
                    );
                }
            }
        }



        // Get shipping 
        $details = OrderDetail::where('order_code', $order->order_code)->first();
        $money_ship = $details->product_moneyship;
        $coupon_mail = $details->product_coupon;

        $shipping = Shipping::where('shipping_id', $order->shipping_id)->first();

        $shipping_array = array(
            'money_ship' => $money_ship,
            'customer_name' => $customer->customer_name,
            'shipping_name' => $shipping->shipping_name,
            'shipping_email' => $shipping->shipping_email,
            'shipping_phone' => $shipping->shipping_phone,
            'shipping_address' => $shipping->shipping_address,
            'shipping_notes' => $shipping->shipping_notes,
            'shipping_method' => $shipping->shipping_method,

        );
        $ordercode_mail = array(
            'coupon_code' => $coupon_mail,
            'order_code' => $details->order_code

        );



        Mail::send('layouts.mail.confirm_order', ['cart_array' => $cart_array, 'shipping_array' => $shipping_array, 'code' => $ordercode_mail], function ($message) use ($title_mail, $data) {
            $message->to($data['email'])->subject($title_mail);
            $message->from($data['email'], $title_mail);
        });

        // Order date
        $order_date = $order->order_date;
        $statistic = Statistical::where('order_date', $order_date)->get();
        if ($statistic) {
            $statistic_count = $statistic->count();
        } else {
            $statistic_count = 0;
        }

        if ($order->order_status == 2) {
            $total_order = 0;
            $sales = 0;
            $profit = 0;
            $quantity = 0;
            foreach ($data['order_product_id'] as $key => $product_id) {
                $product = Product::find($product_id);
                $product_quantity = $product->quantity;
                $product_sold = $product->product_sold;

                $product_price = $product->price;
                $product_import_price = $product->import_price;
                $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

                foreach ($data['quantity'] as $key2 => $qty) {
                    if ($key == $key2) {
                        $product_remain = $product_quantity - $qty;
                        $product->quantity = $product_remain;
                        $product->product_sold = $product_sold + $qty;
                        $product->save();

                        // Cap nhat doanh thu 
                        $quantity += $qty;
                        $total_order += 1;
                        $sales += $product_price * $qty;
                        $profit = $sales - ($product_import_price * $qty);
                    }
                }
            }
            if ($statistic_count > 0) {
                $statistic_update = Statistical::where('order_date', $order_date)->first();
                $statistic_update->sales = $statistic_update->sales + $sales;
                $statistic_update->profit = $statistic_update->profit + $profit;
                $statistic_update->quantity = $statistic_update->quantity + $quantity;
                $statistic_update->total_order = $statistic_update->total_order + $total_order;
                $statistic_update->save();
            } else {
                $statistic_new = new Statistical();
                $statistic_new->order_date = $order_date;
                $statistic_new->sales = $sales;
                $statistic_new->profit = $profit;
                $statistic_new->quantity = $quantity;
                $statistic_new->total_order = $total_order;
                $statistic_new->save();
            }
        }
    }
    public function update_quantity(Request $request)
    {
        $data = $request->all();
        $order_details = OrderDetail::where('product_id', $data['order_product_id'])->where('order_code', $data['order_code'])->first();
        $order_details->product_sale_quantity = $data['order_qty'];
        $order_details->save();
    }
    public function history_order(Request $request)
    {
        if (!Session::get('customer_id')) {
            return redirect('/login_checkout')->with('error', 'Vui lòng đăng nhập để xem lịch sử');
        } else {
            $meta_desc = "Trang lịch sử đơn hàng  , tiện lợi , nhanh chóng , dành cho mọi thể loại mặt hàng đồ ăn";
            $meta_keywords = "Trang web bán hàng, web bán hàng";
            $meta_title = "Trang lịch sử, web food";
            $url_canonical = $request->url();

            $category = Category::all();
            $brand = Brand::where('brand_status', 1)->orderBy('brand_parent', 'DESC')->orderBy('brand_order', 'ASC')->get();
            $category_blog = CategoryBlog::all();
            $slider = Slider::orderBy('slider_id', 'DESC')->where('slider_status', '1')->get();

            $get_order = Order::where('customer_id', Session::get('customer_id'))->orderBy('order_id', 'ASC')->paginate(5);



            return view('layouts.history.history_order', compact('get_order', 'category_blog', 'brand', 'slider', 'category', 'meta_desc', 'meta_keywords', 'meta_title', 'url_canonical'));
        }
    }
    public function view_detail_history(Request $request, $order_code)
    {
        $meta_desc = "Trang lịch sử đơn hàng  , tiện lợi , nhanh chóng , dành cho mọi thể loại mặt hàng đồ ăn";
        $meta_keywords = "Trang web bán hàng, web bán hàng";
        $meta_title = "Trang chi tiết lịch sử, web food";
        $url_canonical = $request->url();

        $category = Category::all();
        $brand = Brand::where('brand_status', 1)->orderBy('brand_parent', 'DESC')->orderBy('brand_order', 'ASC')->get();
        $category_blog = CategoryBlog::all();
        $slider = Slider::orderBy('slider_id', 'DESC')->where('slider_status', '1')->get();

        $order_detail = OrderDetail::with('product')->where('order_code', $order_code)->get();

        $order = Order::where('order_code', $order_code)->first();

        $customer_id = $order->customer_id;
        $shipping_id = $order->shipping_id;
        $order_status = $order->order_status;

        $customer = Customer::where('customer_id', $customer_id)->first();
        $shipping = Shipping::where('shipping_id', $shipping_id)->first();
        $order_detail_product = OrderDetail::with('product')->where('order_code', $order_code)->get();

        foreach ($order_detail_product as $key => $order_d) {
            $product_coupon = $order_d->product_coupon;
        }
        if ($product_coupon != 'no') {
            $coupon = Coupon::where('coupon_code', $product_coupon)->first();
            $coupon_condition = $coupon->coupon_condition;
            $coupon_number = $coupon->coupon_number;
        } else {
            $coupon_condition = 2;
            $coupon_number = 0;
        }

        
        return view('layouts.history.detail_history_order', compact('order_status', 'order', 'order_detail', 'customer', 'shipping', 'order_detail_product', 'coupon_condition', 'coupon_number','category_blog', 'brand', 'slider', 'category', 'meta_desc', 'meta_keywords', 'meta_title', 'url_canonical'));
    }
    public function destroy_order(Request $request){
        $data=$request->all();
        $order=Order::where('order_code',$data['order_code'])->first();

        $order->order_destroy=$data['reason'];
        $order->order_status=3;
        $order->save();


    }
}
