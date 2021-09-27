<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use Session;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('hasrole',function($expression){
            if(Auth::user()){
                if(Auth::user()->hasAnyRole($expression)){
                    return true;
                }
            }
            return false;
        });
        Blade::if('impersonate',function(){
            if(Session::get('impersonate')){
                return true;
            }
            return false;
        });
    }
}
