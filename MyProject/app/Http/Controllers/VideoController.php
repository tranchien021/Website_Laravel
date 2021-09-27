<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Session;
use DB;
use App\Models\Mymodel;
use App\Models\Product;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Brand;
use App\Models\CategoryBlog;
use App\Models\Gallery;


class VideoController extends Controller
{
    public function video(){
        return view('admin.video.index');
    }
    public function select_video(Request $request){
      
        $video=Video::orderBy('video_id','ASC')->get();
        $video_count=$video->count();
       
        $output=' 
        <form>
        '.csrf_field().'
        <table class="table">
            <thead>
              <tr>
                <th>Số thứ tự</th>
                <th>Tên video</th>
                <th>Slug Video</th>
               
                <th>Hình ảnh </th>
                <th>Xem video </th>
                <th>Mô tả </th>
                <th>Function</th>
              </tr>
            </thead>
            <tbody>
        ';
        if($video_count>0){
            $i=0;
            foreach($video as $vid){
                $i++;
                $output.='
            <tr>
                <td>'.$i.'</td>
                <td contenteditable data-video_id="'.$vid->video_id.'" data-video_type="video_title" class="video_edit " id="video_title_'.$vid->video_id.'">'.$vid->video_title.'</td>
                <td contenteditable data-video_id="'.$vid->video_id.'" data-video_type="video_slug" class="video_edit" id="video_slug_'.$vid->video_id.'">'.$vid->video_slug.'</td>
                
                <td> <img width="80" src="'.url('uploads/video/'.$vid->video_image).'" alt="Chưa có ảnh ">
                    <input type="file" class="file_img_video"  data-video_id="'.$vid->video_id.'" id="file-video-'.$vid->video_id.'" name="file" accept="image/*" /> 
                </td>
                
                <td><iframe width="350" height="200" src="https://www.youtube.com/embed/'.$vid->video_link.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></td>
                <td contenteditable data-video_id="'.$vid->video_id.'" data-video_type="video_desc" class="video_edit" id="video_desc_'.$vid->video_id.'" >'.$vid->video_desc.'</td>
                <td><button type="button" data-video_id="'.$vid->video_id.'" class="btn btn-xs btn-danger btn_delete_video">Xoá video</button></td>
            </tr>
              
            ';
            }
        }else{
            $output.='
                
            <tr>
              
                <td colspan="4">Chưa có video </td>
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
    public function delete_video(Request $request ){
        $data=$request->all();
        $video_id=$data['video_id'];
        $video=Video::find($video_id);
        unlink('uploads/video/',$video->video_image);
        $video->delete();
    }
    public function create_video(Request $request){
        $data=$request->all();
       
        $video=new Video();
        $sub_link=substr($data['video_link'],17);
        $video->video_title=$data['video_title'];
        $video->video_desc=$data['video_desc'];
        $video->video_link=$sub_link;
        $video->video_slug=$data['video_slug'];

        $get_image=$request->file('file');
      
        if($get_image){
            $get_name_image=$get_image->getClientOriginalName();
            $name_image=current(explode('.',$get_name_image));
             
            $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
             
            $get_image->move('uploads/video',$new_image);
            $video->video_image=$new_image;
               
        
        }

        $video->save();

    }
    public function update_video(Request $request){
        $data=$request->all();
        $video_id=$data['video_id'];
        $video_edit=$data['video_edit'];
        $video_check=$data['video_check'];
        $video=Video::find($video_id);
        if($video_check=='video_title'){
         
            $video->video_title=$video_edit;
             
        }elseif($video_check=='video_desc'){
          
            $video->video_desc=$video_edit;
        
         
        }elseif($video_check=='video_link'){
         
            $sub_link=substr($video_link,17);
            $video->video_link=$sub_link;
        
           
        }else{
        
            $video->video_slug=$video_edit;
          
        }
        $video->save();
       
    }
    public function video_shop(Request $request){
        $meta_desc="Trang web hỗ trợ bán đồ ăn , tiện lợi , nhanh chóng , dành cho mọi thể loại mặt hàng buôn bán";
        $meta_keywords="Trang web bán hàng, web bán hàng";
        $meta_title="Trang video, web food";
        $url_canonical=$request->url();
    
        $category=Category::all();
        $brand=Brand::where('brand_status',1)->orderBy('brand_parent','DESC')->orderBy('brand_order','ASC')->get();
        $category_blog=CategoryBlog::all();
        $slider=Slider::orderBy('slider_id','DESC')->where('slider_status','1')->get();
        
        $video=Video::all();
       
        return view('layouts.video.list_video',compact('video','category_blog','brand','slider','category','meta_desc','meta_keywords','meta_title','url_canonical'));
    }
    public function update_video_image(Request $request){
        $get_image=$request->file('file');
        $video_id=$request->video_id;
        if($get_image){
            $video=Video::find($video_id);
           
            unlink('uploads/video/'.$video->video_image);

            $get_name_image=$get_image->getClientOriginalName();
            $name_image=current(explode('.',$get_name_image));
            $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        
            $get_image->move('uploads/video/',$new_image);
            
            $video->video_image=$new_image;
           
           
            $video->save();
 
            
        }
    }
    public function watch_video(Request $request){
        $video_id=$request->video_id;
        $video=Video::find($video_id);
        $output['video_title']=$video->video_title;
        $output['video_desc']=$video->video_desc;
        $output['video_link']='<iframe width="100%" height="400" src="https://www.youtube.com/embed/'.$video->video_link.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        echo json_encode($output);

    }
}
