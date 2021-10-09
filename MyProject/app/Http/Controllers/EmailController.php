<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Mail;
use App\Models\Customer;
use Carbon\Carbon;
use App\Models\Brand;
use App\Models\CategoryBlog;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Support\Str;

class EmailController extends Controller
{
    public function index()
    {
        $to_name = "Trần Chiến";
        $to_email = "tranchien021@gmail.com";

        $data = array('name' => "Gửi email tới khách hàng", "body" => "Mail gửi về  hàng hoá");
        Mail::send('livewire.send_email', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email)->subject("Gủi email google");
            $message->from($to_email, $to_name);
        });
    }
    public function send_coupon_vip($coupon_condition, $coupon_time, $coupon_number, $coupon_code)
    {
        $customer = Customer::where('customer_vip', 1)->get();
        $coupon = Coupon::where('coupon_code', $coupon_code)->first();

        $start_date = $coupon->coupon_date_start;

        $end_date = $coupon->coupon_date_end;

        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        $title_mail = "Mã khuyến mại " . ' : ' . $now;
        $data = [];
        foreach ($customer as $cus_vip) {
            $data['email'][] = $cus_vip->customer_email;
        }
        $coupon = array(
            'start_date' => $start_date,
            'end_date' => $end_date,
            'coupon_time' => $coupon_time,
            'coupon_number' => $coupon_number,
            'coupon_condition' => $coupon_condition,
            'coupon_code' => $coupon_code
        );

        Mail::send('livewire.send_coupon_vip', ['coupon' => $coupon], function ($message) use ($title_mail, $data) {
            $message->to($data['email'])->subject($title_mail);
            $message->from($data['email'], $title_mail);
        });

        return redirect()->back()->with('message', 'Gửi mã giảm giá khách vip thành công');
    }
    public function send_coupon($coupon_condition, $coupon_time, $coupon_number, $coupon_code)
    {
        $customer = Customer::where('customer_vip', '<>', 1)->get();
        $coupon = Coupon::where('coupon_code', $coupon_code)->first();
        $start_date = $coupon->coupon_date_start;
        $end_date = $coupon->coupon_date_end;
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        $title_mail = "Mã khuyến mại " . ' : ' . $now;
        $data = [];
        foreach ($customer as $cus_normal) {
            $data['email'][] = $cus_normal->customer_email;
        }
        $coupon = array(
            'start_date' => $start_date,
            'end_date' => $end_date,
            'coupon_time' => $coupon_time,
            'coupon_number' => $coupon_number,
            'coupon_condition' => $coupon_condition,
            'coupon_code' => $coupon_code
        );
        Mail::send('livewire.send_coupon', ['coupon' => $coupon], function ($message) use ($title_mail, $data) {
            $message->to($data['email'])->subject($title_mail);
            $message->from($data['email'], $title_mail);
        });
        return redirect()->back()->with('message', 'Gửi mã giảm giá cho khách thường thành công');
    }
    public function layout()
    {
        return view('layouts.mail.mail_order');
    }
    public function forgot_password(Request $request)
    {

        $meta_desc = "Lấy lại mật khẩu, gửi email để lấy lại mật khẩu";
        $meta_keywords = "Quên mật khẩu ";
        $meta_title = "Trang mật khẩu, lấy mật khẩu ";
        $url_canonical = $request->url();

        $category = Category::all();
        $brand = Brand::where('brand_status', 1)->orderBy('brand_parent', 'DESC')->orderBy('brand_order', 'ASC')->get();
        $category_blog = CategoryBlog::all();
        $slider = Slider::orderBy('slider_id', 'DESC')->where('slider_status', '1')->get();

        return view('livewire.forgot_password', compact('category_blog', 'brand', 'slider', 'category', 'meta_desc', 'meta_keywords', 'meta_title', 'url_canonical'));
    }
    public function get_password(Request $request)
    {
        $data = $request->all();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
        $title_mail = "Lấy lại mật khẩu  " . ' : ' . $now;

        $customer = Customer::where('customer_email', $data['email_account'])->get();
        foreach ($customer as $cus) {
            $customer_id = $cus->customer_id;
        }
        if ($customer) {
            $customer_count = $customer->count();
            if ($customer_count == 0) {
                return redirect()->back()->with('error', 'Email chưa được đăng ký để khôi phục');
            } else {
                $token_random = Str::random(10);
                $customer = Customer::find($customer_id);
                $customer->customer_token = $token_random;
                $customer->save();

                $to_email = $data['email_account'];
                $link_reset_password = url('/update_new_password?email=' . $to_email . '&token=' . $token_random);

                $data = array('name' => $title_mail, 'body' => $link_reset_password, 'email' => $data['email_account']);

                Mail::send('livewire.layout_forget_password', ['data' => $data], function ($message) use ($title_mail, $data) {
                    $message->to($data['email'])->subject($title_mail);
                    $message->from($data['email'], $title_mail);
                });
                return redirect()->back()->with('message', 'Gửi email thành công, vui lòng kiểm tra email ');
            }
        }
    }
    public function update_new_password(Request $request){
        $meta_desc = "Lấy lại mật khẩu, gửi email để lấy lại mật khẩu";
        $meta_keywords = "Quên mật khẩu ";
        $meta_title = "Trang mật khẩu, lấy mật khẩu ";
        $url_canonical = $request->url();

        $category = Category::all();
        $brand = Brand::where('brand_status', 1)->orderBy('brand_parent', 'DESC')->orderBy('brand_order', 'ASC')->get();
        $category_blog = CategoryBlog::all();
        $slider = Slider::orderBy('slider_id', 'DESC')->where('slider_status', '1')->get();

        return view('livewire.new_pass', compact('category_blog', 'brand', 'slider', 'category', 'meta_desc', 'meta_keywords', 'meta_title', 'url_canonical'));
       
    }
    public function change_password(Request $request){
        $data=$request->all();
        $token_random=Str::random(10);
        $customer=Customer::where('customer_email',$data['email'])->where('customer_token',$data['token'])->get();
        $customer_count=$customer->count();
        if($customer_count>0){
            foreach($customer as $cus){
                $customer_id=$cus->customer_id;
            }
            $reset=Customer::find($customer_id);
            $reset->customer_token=$token_random;
            $reset->customer_password=md5($data['pass_account']);
            $reset->save();
            return redirect('login_checkout')->with('message','Cập nhật thành công, Đăng nhập lại ');
        }else{
            return redirect('forgot_password')->with('error','Vui lòng nhập lại email ');
        }
    }
}
