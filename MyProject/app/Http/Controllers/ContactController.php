<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

use App\Models\Category;
use App\Models\CategoryBlog;
use App\Models\Brand;
use App\Models\Slider;
use Seesion;
use App\Imports\ExcelImports;
use App\Exports\ExcelExports;
use Excel;
use File;
use DB;


class ContactController extends Controller
{
    public function contact(Request $request){
        $meta_desc="Trang web hỗ trợ bán hàng, tiện lợi , nhanh chóng , dành cho mọi thể loại mặt hàng buôn bán";
        $meta_keywords="Trang web bán hàng, web bán hàng, hỗ trợ khách hàng";
        $meta_title="Trang liên hệ, web food ";
        $url_canonical=$request->url();
        
        $category=Category::all();
        $brand=Brand::all();
        $category_blog=CategoryBlog::all();
        $contact=Contact::all();
        
        
        $slider=Slider::orderBy('slider_id','DESC')->where('slider_status','1')->get();
       
    	return view('layouts.contact.contact',compact('contact','category_blog','brand','slider','category','meta_desc','meta_keywords','meta_title','url_canonical'));
    
    }
    public function information(){
      
        return view('admin.information.add_info');
    }
    public function save_infor(Request $request){
        $data=$request->all();
      
        $contact=new Contact();
        $contact->info_contact=$data['info_contact'];
        $contact->info_map=$data['info_map'];
        $contact->info_fanpage=$data['info_fanpage'];

      

        $get_image=$request->file('info_image');
        $path='uploads/contact/';
        
        if($get_image){
            $get_name_image=$get_image->getClientOriginalName();
          
            $name_image=current(explode('.',$get_name_image));
         
         
           
            $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            
            $get_image->move($path,$new_image);
            $contact->info_logo=$new_image;
        }
        $contact->save();
        return redirect()->back();
    
    }
    public function edit_contact(){
        $contacts=Contact::where('info_id',1)->get();
      
        return view('admin.information.edit_info',compact('contacts'));
    }
    public function update_contact($info_id,Request $request){
        $data=$request->all();
      
        $contact=Contact::find($info_id);
      
        $contact->info_contact=$data['info_contact'];
        $contact->info_map=$data['info_map'];
        $contact->info_fanpage=$data['info_fanpage'];

      

        $get_image=$request->file('info_image');
        $path='uploads/contact/';
        
        if($get_image){
            unlink($path.$contact->info_logo);
            $get_name_image=$get_image->getClientOriginalName();
          
            $name_image=current(explode('.',$get_name_image));
         
         
           
            $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            
            $get_image->move($path,$new_image);
            $contact->info_logo=$new_image;
        }
      
        $contact->save();
        return redirect()->back();
    }
}
