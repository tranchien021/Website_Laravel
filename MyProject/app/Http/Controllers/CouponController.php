<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Coupon;
use Carbon\Carbon;
use Session;

class CouponController extends Controller
{
    public function check_coupon(Request $request)
    {
        $data = $request->all();
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y');
        if (Session::get('customer_id')) {
            $coupon = Coupon::where('coupon_code', $data['coupon'])->where('coupon_status', 1)->where('coupon_date_end', '>=', $today)->where('coupon_used', 'LIKE', '%' . Session::get('customer_id') . '%')->first();
            if ($coupon) {
                return redirect()->back()->with('error', 'Đã sử dụng mã giảm giá, nhập mã khác');
            } else {
                $coupon_login = Coupon::where('coupon_code', $data['coupon'])->where('coupon_status', 1)->where('coupon_date_end', '>=', $today)->first();
                if ($coupon_login) {
                    $count_coupon = $coupon_login->count();
                    if ($count_coupon > 0) {
                        $coupon_session = Session::get('coupon');
                        if ($coupon_session == true) {
                            $is_avaiable = 0;
                            if ($is_avaiable == 0) {
                                $cou[] = array(
                                    'coupon_code' => $coupon_login->coupon_code,
                                    'coupon_condition' => $coupon_login->coupon_condition,
                                    'coupon_number' => $coupon_login->coupon_number,
                                );
                                Session::put('coupon', $cou);
                            }
                        } else {
                            $cou[] = array(
                                'coupon_code' => $coupon_login->coupon_code,
                                'coupon_condition' => $coupon_login->coupon_condition,
                                'coupon_number' => $coupon_login->coupon_number,
                            );
                            Session::put('coupon', $cou);
                        }
                        Session::save();

                        return redirect()->back()->with('message', 'Thêm mã giảm giá thành công');
                    }
                } else {
                    return redirect()->back()->with('error', 'Mã giảm giá không tồn tại hoặc đã hết hạn');
                }
            }
        } else {
            $coupon = Coupon::where('coupon_code', $data['coupon'])->where('coupon_status', 1)->where('coupon_date_end', '>=', $today)->first();
            if ($coupon) {
                $count_coupon = $coupon->count();
                if ($count_coupon > 0) {
                    $coupon_session = Session::get('coupon');
                    if ($coupon_session == true) {
                        $is_avaiable = 0;
                        if ($is_avaiable == 0) {
                            $cou[] = array(
                                'coupon_code' => $coupon->coupon_code,
                                'coupon_condition' => $coupon->coupon_condition,
                                'coupon_number' => $coupon->coupon_number,
                            );
                            Session::put('coupon', $cou);
                        }
                    } else {
                        $cou[] = array(
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_condition' => $coupon->coupon_condition,
                            'coupon_number' => $coupon->coupon_number,
                        );
                        Session::put('coupon', $cou);
                    }
                    Session::save();

                    return redirect()->back()->with('message', 'Thêm mã giảm giá thành công');
                }
            } else {
                return redirect()->back()->with('error', 'Mã giảm giá không tồn tại hoặc đã hết hạn');
            }
        }
    }
    public function insert_coupon()
    {
        return view('admin.coupon.create');
    }
    public function insert_coupon_code(Request $request)
    {
        $data = $request->all();
        $coupon = new Coupon;
        $coupon->coupon_name = $data['coupon_name'];
        $coupon->coupon_code = $data['coupon_code'];
        $coupon->coupon_time = $data['coupon_time'];
        $coupon->coupon_date_start = $data['coupon_date_start'];
        $coupon->coupon_date_end = $data['coupon_date_end'];
        $coupon->coupon_number = $data['coupon_number'];
        $coupon->coupon_condition = $data['coupon_condition'];
        $coupon->save();

        Session::put('message', 'Thêm mã giảm giá thành công');
        return redirect('/admin/list_coupon');
    }
    public function list_coupon()
    {

        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y');
        $coupon = Coupon::orderBy('coupon_id', 'DESC')->get();
        return view('admin.coupon.index', compact('coupon', 'now'));
    }
    public function delete_coupon($coupon_id)
    {
        $coupon = Coupon::find($coupon_id);
        $coupon->delete();

        Session::put('message', 'Xoá mã giảm giá thành công');
        return redirect('/admin/list_coupon');
    }
    public function delete_coupon_all()
    {
        $coupon = Session::get('coupon');
        if ($coupon == true) {
            // Session::destroy();

            Session::forget('coupon');
            return redirect('/giohang')->with('message', 'Xoá mã thành công');
        }
    }
}
