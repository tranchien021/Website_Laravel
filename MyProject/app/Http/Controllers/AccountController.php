<?php

namespace App\Http\Controllers;

use App\Models\Users;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Users::all();
        
        return view('admin.user.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'name'=>'required',
                'email'=>'required',
                'password'=>'required',
                'phone'=>'required',
                'level'=>'required',
            ]);
            $account =new Users();
            $account->name=$request['name'];
            $account->email=$request['email'];
            $account->password=md5($request['password']);
            $account->phone=$request['phone'];
            $account->level=$request['level'];
            $account->save();
            return redirect('/admin/account')->with('Tạo tài khoản thành công ');
        }catch(Throwable $e){
            report($e);

            return false;
        }
        
    }

 
    public function show(Users $account)
    {
        //
    }

    public function edit($id)
    {
        $account=Users::where('id',$id)->get();
       
        return view('admin.user.edit',compact('account'));
    }


    public function update(Request $request)
    {

        if($account->update($request->all())){
            return redirect('/admin/list_user');
        }else{
            return redirect('/admin/list_user');
        }
    }

    public function destroy(Users $account)
    {
        if($account->level == 1){
            return redirect()->route('account.index');

        }else{
            $account->delete();
            return redirect()->route('account.index');
        }

    }
   
    
}
