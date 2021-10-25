<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Users;
use App\Models\Visitors;
use App\Models\Statistical;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Blog;
use App\Models\Order;
use App\Models\Video;


use Session;

session_start();

use Auth;

use Illuminate\Support\Carbon;




class AdminController extends Controller
{

   public function index()
   {

      return view('admin.dashboard');
   }
   public function AuthLogin()
   {
      if (Session::get('login_normal')) {
         $admin_id = Session::get('Account_Id');
      } else {
         $admin_id = Auth::id();
      }
      
      if ($admin_id) {
         return redirect('/admin/index');
      } else {
         return redirect('/admin/login')->send();
      }
   }
   public function dashboard(Request $request)
   {
      $this->AuthLogin();
      $user_id_address = $request->ip();

      $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();

      $dau_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();

      $cuoi_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

      $sub365ngay = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();

      $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

      $visitor_of_lastMonth = Visitors::whereBetween('date_visitors', [$dau_thangtruoc, $cuoi_thangtruoc])->get();
      $visitors_lastMonth_count = $visitor_of_lastMonth->count();

      $visitor_of_thisMonth = Visitors::whereBetween('date_visitors', [$dauthangnay, $now])->get();
      $visitors_thisMonth_count = $visitor_of_thisMonth->count();

      $visitor_of_year = Visitors::whereBetween('date_visitors', [$sub365ngay, $now])->get();
      $visitors_year_count = $visitor_of_year->count();


      $visitors_current = Visitors::where('ip_address', $user_id_address)->get();
      $visitors_count = $visitors_current->count();

      $visitors = Visitors::all();
      $visitors_total = $visitors->count();

      if ($visitors_count < 1) {
         $visitor = new Visitors();
         $visitor->ip_address = $user_id_address;
         $visitor->date_visitors = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
         $visitor->save();
      }
      $product_admin = Product::all()->count();
      $blog_admin = Blog::all()->count();
      $order_admin = Order::all()->count();
      $video_admin = Video::all()->count();
      $customer_admin = Customer::all()->count();

      $product_view = Product::orderBy('product_view', 'DESC')->take(20)->get();
      $blog_view = Blog::orderBy('blog_view', 'DESC')->take(20)->get();



      return view('admin.dashboard', compact('product_view', 'blog_view', 'product_admin', 'blog_admin', 'order_admin', 'customer_admin', 'video_admin', 'visitors_count', 'visitors_lastMonth_count', 'visitors_thisMonth_count', 'visitors_year_count', 'visitors_total'));
   }
   public function file()
   {
      return view('admin.file');
   }
   public function login()
   {
      return view('admin.login');
   }
   public function register()
   {
      return view('admin.register');
   }
   public function register_account(Request $request)
   {
      try {
         $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'level' => 'required',
         ]);


         if (Users::create($request->all())) {
            return redirect()->route('admin.login')->with('success', 'Thêm thành công ');
         } else {
            return redirect()->route('admin.register')->with('error', 'Không thành công ');
         }
      } catch (Throwable $e) {
         report($e);

         return false;
      }
   }
   public function admin_dashboard(Request $request)
   {

      $admin_email = $request->email;
      $admin_password = $request->password;
      $result = Users::all()->where('email', $admin_email)->where('password', $admin_password)->first();

      if ($result) {
         Session::put('Account_Name', $result->name);
         Session::put('Account_Id', $result->id);
         Session::put('login_normal',$result->id);
         return redirect()->route('admin.dashboard');
      } else {
         Session::put('message', "Mật khẩu hoặc tài khoản không đúng ");
         return redirect('/admin/login');
      }
   }
   public function logout()
   {
      Session::put('Account_Name', null);
      Session::put('Account_Id', null);
      Session::put('login_normal',null);
      return redirect('/admin/login');
   }
   public function filter_by_date(Request $request)
   {
      $data = $request->all();
      $from_date = $data['from_date'];
      $to_date = $data['to_date'];
      $get = Statistical::whereBetween('order_date', [$from_date, $to_date])->orderBy('order_date', 'ASC')->get();
      foreach ($get as $value) {
         $chart_data[] = array(
            'period' => $value->order_date,
            'order' => $value->total_order,
            'sales' => $value->sales,
            'profit' => $value->profit,
            'quantity' => $value->quatity,

         );
      }
      echo $data = json_encode($chart_data);
   }
   public function dashboard_filter(Request $request)
   {
      $data = $request->all();
      $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();

      $dau_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();

      $cuoi_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

      $sub7ngay = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
      $sub365ngay = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();

      $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
      if ($data['dashboard_value'] == '7ngay') {
         $get = Statistical::whereBetween('order_date', [$sub7ngay, $now])->orderBy('order_date', 'ASC')->get();
      } elseif ($data['dashboard_value'] == 'thangtruoc') {
         $get = Statistical::whereBetween('order_date', [$dau_thangtruoc, $cuoi_thangtruoc])->orderBy('order_date', 'ASC')->get();
      } elseif ($data['dashboard_value'] == 'thangnay') {
         $get = Statistical::whereBetween('order_date', [$dauthangnay, $now])->orderBy('order_date', 'ASC')->get();
      } else {
         $get = Statistical::whereBetween('order_date', [$sub365ngay, $now])->orderBy('order_date', 'ASC')->get();
      }
      foreach ($get as $value) {
         $chart_data[] = array(
            'period' => $value->order_date,
            'order' => $value->total_order,
            'sales' => $value->sales,
            'profit' => $value->profit,
            'quantity' => $value->quatity,

         );
      }
      echo $data = json_encode($chart_data);
   }
   public function days_order()
   {

      $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
      $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

      $get = Statistical::whereBetween('order_date', [$dauthangnay, $now])->orderBy('order_date', 'ASC')->get();

      foreach ($get as $value) {
         $chart_data[] = array(
            'period' => $value->order_date,
            'order' => $value->total_order,
            'sales' => $value->sales,
            'profit' => $value->profit,
            'quantity' => $value->quatity,

         );
      }
      echo $data = json_encode($chart_data);
   }
}
