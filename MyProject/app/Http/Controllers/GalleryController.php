<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Gallery;
use Session;
use Auth;
use DB;

class GalleryController extends Controller
{
    // public function list_gallery(){
    //     $data=Gallery::orderBy('gallery_id','ASC')->get();
       
    //     return view('admin.gallery.index',compact('data'));
    // }
    public function insert_gallery($product_id){
        $pro_id=$product_id;
        return view('admin.gallery.create',compact('pro_id'));
    

    
    }
    public function select_gallery(Request $request){
        $product_id= $request->pro_id;
        $gallery=Gallery::where('id',$product_id)->get();
       
        $gallery_count=$gallery->count();
        $output=' 
        <form>
        '.csrf_field().'
        <table id="table" class="table table-hover">
        <thead>
            <tr>
            <th scope="col">Số thứ tự </th>
            <th scope="col">Tên hình ảnh </th>
            <th scope="col">Hình ảnh </th>
            <th scope="col">Quản lí </th>
           
            </tr>
        </thead>
        <tbody>';
        if($gallery_count>0){
            $i=0;
            foreach($gallery as $gal){
                $i++;
                $output.='
               
                <tr>
                    <td>'.$i.'</td>
                    <td contenteditable class="edit_gallery_name" data-gal_id="'.$gal->gallery_id.'" >'.$gal->gallery_name.'</td>
                    <td> <img width="80" src="'.url('uploads/gallery/'.$gal->gallery_image).'" alt="Chưa có ảnh ">
                        <input type="file" class="file_image" style="width:40%" data-gal_id="'.$gal->gallery_id.'" id="file-'.$gal->gallery_id.'" name="file" accept="image/*" />
                    </td>
                    <td>
                        <button type="button" data-gal_id="'.$gal->gallery_id.'" class="btn btn-xs btn-danger delete_gallery" > Xoá </button>
                    </td>
                </tr>
              
            ';
            }
        }else{
            $output.='
                
            <tr>
              
                <td colspan="4">Sản phẩm này chưa có bộ sưu tập</td>
            </tr>
    
            ';
        }
        $output.='
        </tbody>
        </table>
       </form>
        ';
        echo $output;
    }

    public function create_gallery(Request $request, $pro_id){
       $get_image=$request->file('file');
       if($get_image){
           foreach($get_image as $image){
                $get_name_image=$image->getClientOriginalName();
                $name_image=current(explode('.',$get_name_image));
            
                $new_image=$name_image.rand(0,99).'.'.$image->getClientOriginalExtension();
            
                $image->move('uploads/gallery',$new_image);
                $gallery=new Gallery();
                $gallery->gallery_name=$new_image;
                $gallery->gallery_image=$new_image;
                $gallery->id=$pro_id;
                $gallery->save();

           }
       }
       Session::put('message','Thêm ảnh thành công ');
       return redirect()->back();
     
        
    }
    public function update_gallery(Request $request){
        $gal_id=$request->gal_id;
        $gal_text=$request->gal_text;
        $gallery=Gallery::find($gal_id);
        $gallery->gallery_name=$gal_text;
        $gallery->save();
    }
    public function delete_gallery(Request $request){
        $gal_id=$request->gal_id;
        $gallery=Gallery::find($gal_id);
        unlink('uploads/gallery/'.$gallery->gallery_image);
        $gallery->delete();
    }
    public function update_gallery_image(Request $request){
        $get_image=$request->file('file');
        $gal_id=$request->gal_id;
        if($get_image){
            $get_name_image=$get_image->getClientOriginalName();
            $name_image=current(explode('.',$get_name_image));
            $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        
            $get_image->move('uploads/gallery',$new_image);
            
           
            $gallery=Gallery::find($gal_id);
           
            unlink('uploads/gallery/'.$gallery->gallery_image);
            $gallery->gallery_image=$new_image;
           
            $gallery->save();
 
            
        }
    }
   
   
}
