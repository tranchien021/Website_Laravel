<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;
use App\Models\Users;
use Auth;
use Session;

class UserController extends Controller
{
    public function index(){
        $admin=Users::with('roles')->orderBy('id','ASC')->get();
        

        return view('admin.user_auth.all_user',compact('admin'));
    }
    public function assign_roles(Request $request){
        if(Auth::id()==$request->id){
            return redirect()->back()->with('message','Không được phân quyền cho chính mình');
        }
        $data=$request->all();
        $user=Users::where('email',$data['email'])->first();
        $user->roles()->detach();
        if($request['author_role']){
            $user->roles()->attach(Roles::where('name','author')->first());

        }
        if($request['user_role']){
            $user->roles()->attach(Roles::where('name','user')->first());
            
        }
        if($request['admin_role']){
            $user->roles()->attach(Roles::where('name','admin')->first());
            
        }
        return redirect()->back()->with('message','Cấp quyền thành công');
    }
    public function create_user(){
        return view('admin.user_auth.create_user');
    }
    public function store_users(Request $request){
        $data=$request->all();
      
        $admin=new Users();
        $admin->name=$data['name'];
        $admin->phone=$data['phone'];
        $admin->email=$data['email'];
        $admin->password=md5($data['password']);
        $admin->save();
        $admin->roles()->attach(Roles::where('name','user')->first());
        Session::put('message','Thêm user auth thành công');
        return redirect('/admin/user_auth');
    }
    public function delete_user_auth($id){
        if(Auth::id()==$id){
            return redirect()->back()->with('message','Không được phép xoá chính mình');
        }
        $user=Users::find($id);
        if($user){
            $user->roles()->detach();
            $user->delete();
        }
        $user->delete();
        return redirect()->back()->with('message','Xoá thành công');
        
    }
    public function change_login($id){
        $user=Users::where('id',$id)->first();
        if($user){
            Session()->put('impersonate',$user->id);
        }
        return redirect('/admin/user_auth');
    }
    public function change_login_destroy(){
        Session()->forget('impersonate');
        return redirect('/admin/user_auth');
    }
}
