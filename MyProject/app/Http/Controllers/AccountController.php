<?php

namespace App\Http\Controllers;

use App\Models\Account;
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
                'level'=>'required',
            ]);
            if(Users::create($request->all())){
                return redirect()->route('account.index')->with('success','Thêm thành công ');
            }else{
                 return redirect()->route('account.index')->with('error','Không thành công ');
            }
        }catch(Throwable $e){
            report($e);

            return false;
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Users $account)
    {
        return view('admin.user.edit',compact('account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users $account)
    {
        if($account->update($request->all())){
            return redirect()->route('account.index');
        }else{
            return redirect()->route('account.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
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
