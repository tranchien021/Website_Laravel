<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Users;
use Session;
session_start();
use Auth;


class AdminController extends Controller
{
   
   public function index(){
      return view('admin.dashboard');
   }
   public function dashboard(){
      
      $admin_id=Auth::id();
      if($admin_id){
         return view('admin.dashboard');
      }
      else{
         return redirect()->route('admin.login');
      }
 
   
   }
   public function file(){
      return view('admin.file');
   }
   public function login(){
      return view('admin.login');
   }
   public function register(){
      return view('admin.register');
   }
   public function register_account(Request $request){
      try{
         $request->validate([
             'name'=>'required',
             'email'=>'required',
             'password'=>'required',
             'level'=>'required',
         ]);
       
       
         if(Users::create($request->all())){
             return redirect()->route('admin.login')->with('success','Thêm thành công ');
         }else{
            return redirect()->route('admin.register')->with('error','Không thành công ');
         }
      }catch(Throwable $e){
         report($e);

         return false;
      }
      
   }
   public function admin_dashboard(Request $request){
      
      $admin_email=$request->email;
      $admin_password=$request->password;
      $result=Users::all()->where('email',$admin_email)->where('password',$admin_password)->first();

      if($result){
         Session::put('Account_Name',$result->name);
         Session::put('Account_Id',$result->id);
         return redirect()->route('admin.dashboard');
      }
      else{
         Session::put('message',"Mật khẩu hoặc tài khoản không đúng ");
         return redirect('/admin/login');
      }
     
      
     
   }
   public function logout(){
      Session::put('Account_Name',null);
      Session::put('Account_Id',null);
      return redirect('/admin/login');
   }
   
}
