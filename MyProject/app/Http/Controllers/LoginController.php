<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;

use App\Models\Users;
use App\Models\Social;
use Session;




class LoginController extends Controller
{
    public function facebook(){
        return Socialite::driver('facebook')->redirect();
    }
    public function callback_facebook(){
        $provider=Socialite::driver('facebook')->stateless()->user();
        $account=Social::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
    
       
        
        if($account){
           
            $account_name=Users::where('id',$account->user)->first();
            Session::put('Account_Name',$account_name->name);
            Session::put('Account_Id',$account_name->id);

            return redirect('/admin/index');
        }else{
          
            $account_social=new Social([
                'provider_user_id'=>$provider->getId(),
                'provider'=>'facebook'
                   
            ]);
           
            $login=Users::where('email',$provider->getEmail())->first();
          
            if(!$login){
                
                $login=Users::create([
                    'name'=>$provider->getName(),
                    'email'=>$provider->getEmail(),
                    'password'=>"",
                    'level'=>"0"
                ]);
            }
            $account_social->user=$login->id;
            $account_social->save();
            
            $account_name=Users::where('id',$account_social->user)->first();
            Session::put('Account_Name',$account_name->name);
            Session::put('Account_Id',$account_name->id);
            return redirect('/admin/index');
        }
    }
    public function google(){
        return Socialite::driver('google')->redirect();
    }
    public function callback_google(){
        $user=Socialite::driver('google')->stateless()->user();
        

        $authUser = $this->findOrCreateUser($user,'google');
        if($authUser){
            $account_name=Users::where('id',$authUser->user)->first();
            Session::put('Account_Name',$account_name->name);
            Session::put('Account_Id',$account_name->id);
        }elseif($account_social){
            $account_name=Users::where('id',$authUser->user)->first();
            Session::put('Account_Name',$account_name->name);
            Session::put('Account_Id',$account_name->id);
        }
       
       
        return redirect('/admin/index');

    }
    public function findOrCreateUser($user,$provider){
        $authUser=Social::where('provider_user_id',$user->id)->first();
        
        if($authUser){
            return $authUser;
        }
        else{
            $account_social=new Social([
                'provider_user_id'=>$user->id,
                'provider'=>strtoupper($provider)
                   
            ]);
    
            $login=Users::where('email',$user->email)->first();
              
            if(!$login){
                
                $login=Users::create([
                    'name'=>$user->name,
                    'email'=>$user->email,
                    'password'=>"",
                    'level'=>"0"
                ]);
            }
            $account_social->user=$login->id;
            $account_social->save();
            return $account_social;
        }
    }




}
