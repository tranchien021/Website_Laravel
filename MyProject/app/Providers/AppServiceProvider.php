<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Blog;
use App\Models\Icons;
use App\Models\Order;
use App\Models\Video;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',function($view){

            $product_admin=Product::all()->count();
            $blog_admin=Blog::all()->count();
            $order_admin=Order::all()->count();
            $video_admin=Video::all()->count();
            $customer_admin=Customer::all()->count();
            $icon=Icons::orderBy('icon_id','ASC')->where('category','icons')->get();
            $partner=Icons::orderBy('icon_id','ASC')->where('category','partner')->get();
            $view->with('product_admin',$product_admin)->with('partner',$partner)->with('blog_admin',$blog_admin)->with('order_admin',$order_admin)->with('video_admin',$video_admin)->with('customer_admin',$customer_admin)->with('icon',$icon);
        });
      
       Paginator::useBootstrap();
    }
}
