<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Session;
use DB;
class BrandController extends Controller
{
   
    public function list_brand(){
        $data=Brand::where('brand_status',1)->orderBy('brand_parent','ASC')->orderBy('brand_order','ASC')->get();
       
        return view('admin.brand.index',compact('data'));
    }
    public function delete_brand($brand_id){
       $data=Brand::where('brand_id',$brand_id)->delete();

       Session::put('message','Xoá thành công danh mục');
       return redirect('/admin/list_brand');
    }

    public function create_brand(){
        $data=Brand::orderBy('brand_id','ASC')->get();
        return view('admin.brand.create',compact('data'));
    }
    public function insert_brand(Request $request){
        $data=$request->all();
        $brand =new Brand();
        $brand->brand_name=$data['brand_name'];
        $brand->slug_brand=$data['slug_brand'];
        $brand->brand_desc=$data['brand_desc'];
        $brand->meta_keywords=$data['meta_keywords'];
        $brand->brand_parent=$data['brand_parent'];
        $brand->brand_status=$data['brand_status'];
        $brand->save();
        Session::put('message','Thêm danh mục thành công');
        return redirect('/admin/list_brand');

    }
    public function edit_brand($brand_id){
        $all_brand=Brand::orderBy('brand_id','ASC')->get();
      
        $data=Brand::where('brand_id',$brand_id)->get();
       
        return view('admin.brand.edit',compact('data','all_brand'));
    }
    public function update_brand(Request $request ,$brand_id){

        $data=$request->all();
        $data=array();
        $data['brand_name']=$request->brand_name;
        $data['slug_brand']=$request->slug_brand;
        $data['brand_desc']=$request->brand_desc;
        $data['meta_keywords']=$request->meta_keywords;
        $data['brand_parent']=$request->brand_parent;
        $data['brand_status']=$request->brand_status;
        Brand::where('brand_id',$brand_id)->update($data);
        Session::put('message','Cập nhật danh mục thành công ');
        return redirect('/admin/list_brand');

    }
    public function arrange_brand(Request $request){
        $data=$request->all();
        $brand_id=$data['page_id_array'];
        foreach($brand_id as $key=>$value){
            $brand=Brand::find($value);
            $brand->brand_order=$key;
            $brand->save();
        }
        echo "Updated";
    }
  

  
}
