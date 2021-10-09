<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Users;
use App\Models\Social;
use App\Models\SocialCustomer;
use App\Models\Customer;
use Illuminate\Support\Facades\Session;




class LoginController extends Controller
{
    public function facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function callback_facebook()
    {
        $provider = Socialite::driver('facebook')->stateless()->user();
        $account = Social::where('provider', 'facebook')->where('provider_user_id', $provider->getId())->first();



        if ($account) {

            $account_name = Users::where('id', $account->user)->first();
            Session::put('Account_Name', $account_name->name);
            Session::put('Account_Id', $account_name->id);

            return redirect('/admin/index');
        } else {

            $account_social = new Social([
                'provider_user_id' => $provider->getId(),
                'provider' => 'facebook'

            ]);

            $login = Users::where('email', $provider->getEmail())->first();

            if (!$login) {

                $login = Users::create([
                    'name' => $provider->getName(),
                    'email' => $provider->getEmail(),
                    'password' => "",
                    'level' => "0"
                ]);
            }
            $account_social->user = $login->id;
            $account_social->save();

            $account_name = Users::where('id', $account_social->user)->first();
            Session::put('Account_Name', $account_name->name);
            Session::put('Account_Id', $account_name->id);
            return redirect('/admin/index');
        }
    }
    public function login_customer_facebook()
    {
        config(['services.facebook.redirect' => env('FACEBOOK_CLIENT_URL')]);
        return Socialite::driver('facebook')->redirect();
    }
    public function callback_customer_facebook()
    {
        config(['services.facebook.redirect' => env('FACEBOOK_CLIENT_URL')]);
        $provider = Socialite::driver('facebook')->stateless()->user();
        $account = SocialCustomer::where('provider', 'facebook')->where('provider_user_id', $provider->getId())->first();



        if ($account!=NULL) {

            $account_name = Customer::where('customer_id', $account->user)->first();
            Session::put('customer_id', $account_name->customer_id);
            Session::put('customer_name', $account_name->customer_name);

            return redirect('/admin/index');
        } elseif($account==NULL){

            $account_social = new SocialCustomer([
                'provider_user_id' => $provider->getId(),
                'provider_user_email'=>$provider->getEmail(),
                'provider' => 'facebook'

            ]);

            $customer = Customer::where('customer_email', $provider->getEmail())->first();

            if (!$customer) {

                $customer = Users::create([
                    'customer_name' => $provider->getName(),
                    'customer_email' => $provider->getEmail(),
                    'customer_picture' => '',
                    'customer_password' => '',
                    'customer_phone'=>''
                ]);
            }
            $account_social->customer()->associate($customer);

            $account_social->save();

            $account_name = Customer::where('customer_id', $account_social->user)->first();
            Session::put('customer_name', $account_name->customer_name);
            Session::put('customer_id', $account_name->customer_id);
            return redirect('/admin/index')->with('message','Đăng nhập bằng tài khoản facebook thành công');
        }
    }





    public function google()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callback_google()
    {
        $user = Socialite::driver('google')->stateless()->user();


        $authUser = $this->findOrCreateUser($user, 'google');
        if ($authUser) {
            $account_name = Users::where('id', $authUser->user)->first();
            Session::put('login_normal', true);
            Session::put('Account_Name', $account_name->name);
            Session::put('Account_Id', $account_name->id);
        } elseif ($account_social) {
            $account_name = Users::where('id', $authUser->user)->first();
            Session::put('login_normal', true);
            Session::put('Account_Name', $account_name->name);
            Session::put('Account_Id', $account_name->id);
        }


        return redirect('/admin/index');
    }
    public function findOrCreateUser($user, $provider)
    {
        $authUser = Social::where('provider_user_id', $user->id)->first();

        if ($authUser) {
            return $authUser;
        } else {
            $account_social = new Social([
                'provider_user_id' => $user->id,
                'provider' => strtoupper($provider)

            ]);

            $login = Users::where('email', $user->email)->first();


            if (!$login) {

                $login = Users::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => "",
                    'level' => "0"
                ]);
            }
            $account_social->user = $login->id;
            $account_social->save();
            return $account_social;
        }
    }


    public function login_customer_google()
    {
        config(['services.google.redirect' => env('GOOGLE_CLIENT_URL')]);
        return Socialite::driver('google')->redirect();
    }
    public function callback_customer_google()
    {
        config(['services.google.redirect' => env('GOOGLE_CLIENT_URL')]);

        $user = Socialite::driver('google')->stateless()->user();




        $authUser = $this->findOrCreateCustomer($user, 'google');

        if ($authUser) {

            $account_name = Customer::where('customer_id', $authUser->user)->first();
            Session::put('customer_id', $account_name->customer_id);
            Session::put('customer_picture', $account_name->customer_picture);
            Session::put('customer_name', $account_name->customer_name);
        } elseif ($customer_new) {

            $account_name = Customer::where('customer_id', $authUser->user)->first();
            Session::put('customer_id', $account_name->customer_id);
            Session::put('customer_picture', $account_name->customer_picture);
            Session::put('customer_name', $account_name->customer_name);
        }
        return redirect('/login_checkout')->with('message', 'Đăng nhập bằng google thành công ');
    }

    public function findOrCreateCustomer($user, $provider)
    {
        $authUser = SocialCustomer::where('provider_user_id', $user->id)->first();


        if ($authUser) {
            return $authUser;
        } else {
            $customer_new = new SocialCustomer([
                'provider_user_id' => $user->id,
                'provider_user_email' => $user->email,
                'provider' => strtoupper($provider)

            ]);

            $customer = Customer::where('customer_email', $user->email)->first();


            if (!$customer) {

                $customer = Customer::create([
                    'customer_name' => $user->name,
                    'customer_email' => $user->email,
                    'customer_picture' => $user->avatar,
                    'customer_password' => "",
                    'customer_phone' => ''
                ]);
            }
            $customer_new->customer()->associate($customer);
            $customer_new->save();
            return $customer_new;
        }
    }
}
