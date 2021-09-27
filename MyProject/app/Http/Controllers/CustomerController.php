<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Session;

class CustomerController extends Controller
{
    public function list_customer(){
        $data=Customer::orderBy('customer_id','ASC')->get();
       
        return view('admin.customer.index',compact('data'));
    }
    public function delete_customer($customer_id){
        $customer=Customer::where('customer_id',$customer_id);
        $customer->delete();
        
        Session::put('message','Xoá tài khoản khách hàng thành công');
        return redirect('/admin/list_customer');
    }
    public function edit_customer($customer_id){
        $customer=Customer::find($customer_id);
      
        return view('admin.customer.edit',compact('customer'));
    }
    public function update_customer(Request $request,$customer_id){
        $customer=$request->all();
       
       

        $data=array();
        $data['customer_name']=$request->customer_name;
        $data['customer_email']=$request->customer_email;
        $data['customer_phone']=$request->customer_phone;
        $data['customer_password']=$request->customer_password;
       
        $add_customer=Customer::where('customer_id',$customer_id)->update($data);
        Session::put('message','Cập nhật thành công');
        return redirect('/admin/list_customer');
       
    }
}
