<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Mymodel;
use App\Models\Product;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Brand;
use App\Models\CategoryBlog;
use Session;

class BlogController extends Controller
{
    public function danh_muc_bai_viet(Request $request,$blog_slug){
    
        $category=Category::all();
        
        $brand=Brand::all();
        
        $category_blog=CategoryBlog::all();
        $slider=Slider::orderBy('slider_id','DESC')->where('slider_status','1')->get();

        $show_category_blog=CategoryBlog::where('category_blog_slug',$blog_slug)->get();
      
        foreach($show_category_blog as $cate){
            $meta_desc=$cate->category_blog_desc;
            $meta_keywords=$cate->category_blog_slug;
            $meta_title=$cate->category_blog_name;
            $cate_id=$cate->category_blog_id;
            $url_canonical=$request->url();
        }
       
        $post=Blog::where('blog_status',1)->where('category_blog_id',$cate_id)->paginate(2);
       
       
       
        return view('layouts.blog.blog',compact('post','show_category_blog','category_blog','brand','slider','category','meta_desc','meta_keywords','meta_title','url_canonical'));
       
       
    } 
    public function bai_viet(Request $request,$blog_slug){
        $category=Category::all();
        
        $brand=Brand::where('brand_status',1)->orderBy('brand_parent','DESC')->orderBy('brand_order','ASC')->get();
        
        $category_blog=CategoryBlog::all();
        $slider=Slider::orderBy('slider_id','DESC')->where('slider_status','1')->get();

        
        $post=Blog::where('blog_status',1)->where('blog_slug',$blog_slug)->take(1)->get();
        
        
        
        
        foreach($post as $p){
            $meta_desc=$p->blog_meta_desc;
            $meta_keywords=$p->blog_meta_keywords;
            $meta_title=$p->blog_title;
            $cate_id=$p->category_blog_id;
            $url_canonical=$request->url();
            $post_id=$p->blog_id;

        }
        
        

        $posts=Blog::where('blog_id',$post_id)->first();
       
        
        
        $posts->blog_view=$posts->blog_view+1;
       
        $posts->save();
        

       
        

        $related=Blog::where('blog_status',1)->where('category_blog_id',$cate_id)->whereNotIn('blog_slug',[$blog_slug])->take(5)->get();
      
        return view('layouts.blog.baiviet',compact('related','post','category_blog','brand','slider','category','meta_desc','meta_keywords','meta_title','url_canonical'));
    }

    public function list_blog(){
        $data=Blog::orderBy('category_blog_id','ASC')->get();
       
        return view('admin.blog.index',compact('data'));
        
    }
    public function create_blog(){
        $category_blog=CategoryBlog::all();
        
        return view('admin.blog.create',compact('category_blog'));
    }
    public function insert_blog(Request $request){
        $data=$request->all();
        $get_image=$request->file('blog_image');
        if($get_image){
            $get_name_image=$get_image->getClientOriginalName();
            $name_image=current(explode('.',$get_name_image));
           
            $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
          
            $get_image->move('uploads/blog',$new_image);

                
            $blog =new Blog();
            $blog->blog_title=$data['blog_title'];
            $blog->blog_slug=$data['blog_slug'];
            $blog->blog_desc=$data['blog_desc'];
            $blog->blog_content =$data['blog_content'];
            $blog->blog_meta_keywords =$data['blog_meta_keywords'];
            $blog->blog_meta_desc =$data['blog_meta_desc'];
            $blog->blog_image =$new_image;
            $blog->category_blog_id =$data['category_blog_id'];
            $blog->blog_status =$data['blog_status'];
        
            $blog->save();
            Session::put('message','Thêm thành công');
            return redirect('/admin/list_blog');
        }else{
            Session::put('mesage','Thêm thất bại');
            return redirect('/admin/list_blog');
        }
      
    }
    public function delete_blog($blog_id){
        $data=Blog::where('blog_id',$blog_id)->delete();
        Session::put('message','Xoá thành công');
        return redirect('/admin/list_blog');

    }
    public function edit_blog($blog_id){
        $category_blog=CategoryBlog::all();
        $data=Blog::where('blog_id',$blog_id)->get();
       
        return view('admin.blog.edit',compact('data','category_blog'));
    }
    public function update_blog(Request $request,$blog_id){
        
        $data=$request->all();
        $get_image=$request->file('blog_image');
        if($get_image){
            $get_name_image=$get_image->getClientOriginalName();
            $name_image=current(explode('.',$get_name_image));
           
            $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
          
            $get_image->move('uploads/blog',$new_image);

            $data=array();
            $data['blog_title']=$request->blog_title;
            $data['blog_slug']=$request->blog_slug;
            $data['blog_desc']=$request->blog_desc;
            $data['blog_content']=$request->blog_content;
            $data['blog_meta_keywords']=$request->blog_meta_keywords;
            $data['blog_meta_desc']=$request->blog_meta_desc;
            $data['blog_image']=$new_image;
            $data['category_blog_id']=$request->category_blog_id;
            $data['blog_status']=$request->blog_status;
         
            Blog::where('blog_id',$blog_id)->update($data);
            Session::put('message','Cập nhật  thành công ');
            return redirect('/admin/list_blog');
    

        }else{
            Session::put('message','Cập nhật thất bại');
            return redirect('/admin/list_blog');
        }

      
    }
    public function unactive_blog($blog_id){
        Blog::where('blog_id',$blog_id)->update(['blog_status'=>0]);
        Session::put('message','Ẩn bài viết thành công ');
        return redirect('/admin/list_blog');
    }
    public function active_blog($blog_id){
        Blog::where('blog_id',$blog_id)->update(['blog_status'=>1]);
        Session::put('message','Hiện bà i viết  thành công ');
        return redirect('/admin/list_blog');
    }
}
