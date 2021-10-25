<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Users;
use App\Models\Roles;
use Session;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register_auth(){
        return view('admin.customer_auth.register');
        
    }
    public function create_account_auth(Request $request){
        $this->validation($request);
        $data=$request->all();
        $account=new Users();
        $account->name=$data['name'];
        $account->phone=$data['phone'];
        $account->email=$data['email'];
       
        $account->password=md5($data['password']);
        $account->save();
        return redirect('/admin/login_auth')->with('message','Đăng ký Auth thành công');
    }
    public function validation($request){
        return $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'phone'=>'required',
         
          
        ]);
    }
    public function login_auth(){
        return view('admin.customer_auth.login');
    }
    public function login_account_auth(Request $request){
       

        $this->validate($request,[
            'email'=>'required',
            'password'=>'required'
        ]);
        
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect('/admin/index');
        }else{
            return redirect('/admin/login')->with('message','Lỗi đăng nhập Auth !!');
        }

    }
    public function logout_auth(){
        Auth::logout();
        Session::put('Account_Name', null);
        Session::put('Account_Id', null);
        Session::put('login_normal',null);
        return redirect('/admin/login_auth')->with('message','Đăng xuất Auth thành công');
    }
}
