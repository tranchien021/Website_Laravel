<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryBlog;
use Session;

class CategoryBlogController extends Controller
{
    public function list_category_blog(){
        $data=CategoryBlog::orderBy('category_blog_id','ASC')->get();
        return view('admin.category_blog.index',compact('data'));
        
    }
    public function create_category_blog(){
        return view('admin.category_blog.create');
    }
    public function insert_category_blog(Request $request){
        $data=$request->all();
      
        $cate_blog =new CategoryBlog();
        $cate_blog->category_blog_name=$data['category_blog_name'];
        $cate_blog->category_blog_status=$data['category_blog_status'];
        $cate_blog->category_blog_slug=$data['category_blog_slug'];
        $cate_blog->category_blog_desc=$data['category_blog_desc'];
      
        $cate_blog->save();
        Session::put('message','Thêm thành công');
        return redirect('/admin/list_category_blog');
    }
    public function delete_category_blog($category_blog_id){
        $data=CategoryBlog::where('category_blog_id',$category_blog_id)->delete();
        Session::put('message','Xoá thành công');
        return redirect('/admin/list_category_blog');

    }
    public function edit_category_blog($category_blog_id){
        $data=CategoryBlog::where('category_blog_id',$category_blog_id)->get();
        
        return view('admin.category_blog.edit',compact('data'));
    }
    public function update_category_blog(Request $request,$category_blog_id){
        
        $data=$request->all();

        $data=array();
        $data['category_blog_name']=$request->category_blog_name;
        $data['category_blog_status']=$request->category_blog_status;
        $data['category_blog_slug']=$request->category_blog_slug;
        $data['category_blog_desc']=$request->category_blog_desc;
     
        CategoryBlog::where('category_blog_id',$category_blog_id)->update($data);
        Session::put('message','Cập nhật  thành công ');
        return redirect('/admin/list_category_blog');

    }
}
