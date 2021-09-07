<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mymodel;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Shipping;
use App\Models\Payment;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\Moneyship;
use App\Models\Coupon;
use App\Models\Slider;
use Session;

class SliderController extends Controller
{
    public function manage_slider(){
        $slider=Slider::orderBy('slider_id','DESC')->get();
        return view('admin.slider.index',compact('slider'));
    }
    public function add_slider(){
       
        return view('admin.slider.create');
    }
    public function insert_slider(Request $request){
        $data=$request->all();
        $get_image=$request->file('slider_image');
        if($get_image){
            $get_name_image=$get_image->getClientOriginalName();
            $name_image=current(explode('.',$get_name_image));
           
            $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
          
            $get_image->move('uploads/slider',$new_image);

            $slider=new Slider();
            $slider->slider_name=$data['slider_name'];
            $slider->slider_image=$new_image;
            $slider->slider_status=$data['slider_status'];
            $slider->slider_desc=$data['slider_desc'];
            $slider->save();
            Session::put('message','Thêm slider thành công');
            return redirect('admin/manage_slider');
          


        }else{
            Session::put('message','Làm ơn thêm hình ảnh ');
            return redirect('/admin/add_slider');
        }
    }

    
    public function unactive_banner($slider_id){
        Slider::where('slider_id',$slider_id)->update(['slider_status'=>0]);
        Session::put('message','Ẩn slider thành công ');
        return redirect('/admin/manage_slider');
    }
    public function active_banner($slider_id){
        Slider::where('slider_id',$slider_id)->update(['slider_status'=>1]);
        Session::put('message','Hiện slider thành công ');
        return redirect('/admin/manage_slider');
    }
    public function delete_banner($slider_id){
        $data=Slider::where('slider_id',$slider_id);
        $data->delete();
        Session::put('message','Xoá thành công ');
        return redirect('/admin/manage_slider');
    }
    public function edit_banner($slider_id){
        $slider=Slider::where('slider_id',$slider_id)->get();
        
        return view('admin.slider.edit',compact('slider'));
    }
    public function update_banner(Request $request,$slider_id){
        $minhchien=$request->all();
       
        $data=array();
        $data['slider_name']=$request->slider_name;
        $data['slider_image']=$request->slider_image;
        $data['slider_desc']=$request->slider_desc;
        $data['slider_status']=$request->slider_status;

        $slider=Slider::where('slider_id',$slider_id)->update($data);
        Session::put('message','Sửa thông tin thành công');
        return redirect('/admin/manage_slider');
    }
    



    
}
