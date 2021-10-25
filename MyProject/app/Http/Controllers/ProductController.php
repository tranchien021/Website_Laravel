<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Gallery;
use App\Models\Category;
use App\Models\CategoryBlog;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\Comment;
use App\Models\Rating;


use Illuminate\Http\Request;

use App\Imports\ExcelImports;
use App\Exports\ExcelExports;
use Excel;
use File;
use DB;
use Toastr;


class ProductController extends Controller
{
    public function list_product()
    {
        $data = Product::all();
        return view('admin.product.index', compact('data'));
    }
    public function export_csv()
    {
        return Excel::download(new ExcelExports, 'product.xlsx');
    }
    public function import_csv(Request $request)
    {
        $path = $request->file('file')->getRealPath();
        Excel::import(new ExcelImports, $path);
        return back();
    }

    public function create_product()
    {
        $cat = Category::all();

        return view('admin.product.create', compact('cat'));
    }
    public function insert_product(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|unique:sanpham|max:255',
            'file_image'=>'
                require|image|mimes:jpg,svg|max:2048,  
            ',
            'theloai'=>'required',
            'masp'=>'required',
            'product_tag'=>'required',
            'quantity'=>'required|numberic',
            'price'=>'required|numberic',
            'import_price'=>'required|numberic',
            'content'=>'required',
            'address'=>'required',
            'date'=>'required',
            'tinhtrang'=>'required',
            

        ],
        [
            'name.required'=>'Nhập tên sản phẩm ',
            'file_image.required'=>'Chưa chọn hình ảnh ',
            'theloai.required'=>'Chưa nhập thể loại',
            'masp.required'=>'Chưa chọn thể loại',
            'product_tag.required'=>'Chưa có tag sản phẩm ',
            'quantity.required'=>'Số lượng không hợp lệ ',
            'price.required'=>'Giá không hợp lệ ',
            'import_price.required'=>'Giá không hợp lệ ',
            'content.required'=>'Nhập nội dung sản phẩm  ',
            'address.required'=>'Nhập địa chỉ xuất sứ',
            'date.required'=>'Nhập ngày làm',
            'tinhtrang.required'=>'Xem lại tình trạng',
           
            

        ]
        
    
    );

        $price_format = filter_var($request->price, FILTER_SANITIZE_NUMBER_INT);
        $import_price_format = filter_var($request->import_price, FILTER_SANITIZE_NUMBER_INT);

        $data['name'] = $request->name;
        $data['product_tag'] = $request->product_tag;
        $data['theloai'] = $request->theloai;
        $data['masp'] = $request->masp;
        $data['quantity'] = $request->quantity;
        $data['price'] = $price_format;
        $data['import_price'] = $import_price_format;
        $data['content'] = $request->content;
        $data['address'] = $request->address;
        $data['date'] = $request->date;
        $data['tinhtrang'] = $request->tinhtrang;
        $data['img'] = $request->tinhtrang;

        $get_image = $request->file('file_image');
        $get_document = $request->file('document');




        $path = "uploads/home/";
        $path_gallery = "uploads/gallery/";
        $path_document = "uploads/document/";

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();

            $name_image = current(explode('.', $get_name_image));

            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();

            $get_image->move($path, $new_image);

            File::copy($path . $new_image, $path_gallery . $new_image);
            $data['img'] = $new_image;
        }
        if ($get_document) {

            $get_name_document = $get_document->getClientOriginalName();

            $name_document = current(explode('.', $get_name_document));
            $new_document = $name_document . rand(0, 99) . '.' . $get_document->getClientOriginalExtension();

            $get_document->move($path_document, $new_document);


            $data['file'] = $new_document;
        }

        $pro_id = DB::table('sanpham')->insertGetId($data);

        $gallery = new Gallery();
        $gallery->gallery_image = $new_image;

        $gallery->gallery_name = $new_image;

        $gallery->id = $pro_id;

        $gallery->save();

        return redirect('/admin/list_product');
    }

    public function edit_product($id)
    {
        $product = Product::find($id);
        $cat = Category::all();
        return view('admin.product.edit', compact('product', 'cat'));
    }


    public function update_product(Request $request, $id)
    {

        $data = $request->all();
        $price_format = filter_var($request->price, FILTER_SANITIZE_NUMBER_INT);
        $import_price_format = filter_var($request->import_price, FILTER_SANITIZE_NUMBER_INT);

       
       

        $data = array();
        $data['name'] = $request->name;
        $data['product_tag'] = $request->product_tag;
        $data['theloai'] = $request->theloai;
        $data['masp'] = $request->masp;
        $data['quantity'] = $request->quantity;
        $data['price'] = $price_format;
        $data['import_price'] = $import_price_format;
        $data['content'] = $request->content;
        $data['address'] = $request->address;
        $data['date'] = $request->date;
        $data['tinhtrang'] = $request->tinhtrang;
        $data['img'] = $request->tinhtrang;


        $get_image = $request->file('file_img');
        $get_document = $request->file('document');
        
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));

            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();

            $get_image->move('uploads/home', $new_image);

            $data['img'] = $new_image;
            Product::where('id', $id)->update($data);
           
        }
        if($get_document) {

            $path="uploads/document/";
            $get_name_document = $get_document->getClientOriginalName();

            $name_document = current(explode('.', $get_name_document));
            $new_document = $name_document.rand(0, 99).'.'.$get_document->getClientOriginalExtension();
            $get_document->move('uploads/document/', $new_document);
            $data['file'] = $new_document;
           

            $product=Product::find($id);
            if($product->file){
                unlink('uploads/document/'.$product->file);
            }
       

        }


        Product::where('id',$id)->update($data);
        
        Toastr::success('Cập nhật thành công ','Success');

        return redirect('/admin/list_product');
    }

    public function delete_product($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/admin/list_product');
    }
    public function tag($product_tag, Request $request)
    {
        $meta_desc = "Tag : " . $product_tag;
        $meta_keywords = "Trang tag tìm kiếm , web bán hàng";
        $meta_title = "Trang tag " . $product_tag;
        $url_canonical = $request->url();

        $category = Category::all();
        $brand = Brand::all();
        $category_blog = CategoryBlog::all();
        $slider = Slider::orderBy('slider_id', 'DESC')->where('slider_status', '1')->get();

        $tag = str_replace("-", " ", $product_tag);
        $pro_tag = Product::where('name', 'LIKE', '%' . $tag . '%')->orwhere('masp', 'LIKE', '%' . $tag . '%')->get();

        return view('layouts.tag.tag', compact('pro_tag', 'product_tag', 'category_blog', 'brand', 'slider', 'category', 'meta_desc', 'meta_keywords', 'meta_title', 'url_canonical'));
    }
    public function quickview(Request $request)
    {
        $product_id = $request->product_id;
        $product = Product::find($product_id);
        $gallery = Gallery::where('id', $product_id)->get();
        $output['product_gallery'] = '';
        foreach ($gallery as $value) {
            $output['product_gallery'] .= '<p><img width="100%" src="uploads/gallery/' . $value->gallery_image . '"></p>';
        }

        $output['product_name'] = $product->name;
        $output['product_id'] = $product->id;
        $output['product_content'] = $product->content;
        $output['product_price'] = number_format($product->price, 0, ',', '.') . ' VNĐ ';
        $output['product_image'] = '<p><img width="100%" src="uploads/home/' . $product->img . '"></p>';
        $output['product_button'] = '<input id="buy_quickview" type="button" value="Mua ngay " class="btn btn-success add-to-cart-quickview"  data-id_product="' . $product->id . '" name="add-to-cart">';

        $output['product_quickview_value'] = '
        <input type="hidden" value="' . $product->id . '" class="cart_product_id_' . $product->id . '">
		<input type="hidden" value="' . $product->name . '" class="cart_product_name_' . $product->id . '">
        <input type="hidden" value="' . $product->img . '" class="cart_product_img_' . $product->id . '">
        <input type="hidden" value="' . $product->price . '" class="cart_product_price_' . $product->id . '">
		<input type="hidden" value="' . $product->quantity . '" class="cart_product_quantity_' . $product->id . '">
        <input type="hidden" value="1" class="cart_product_qty_' . $product->id . '">';

        echo json_encode($output);
    }
    public function load_comment(Request $request)
    {
        $product_id = $request->product_id;
        $comment = Comment::where('comment_product_id', $product_id)->where('comment_parent', 0)->where('comment_status', 0)->get();
        $commnet_rep = Comment::with('products')->where('comment_parent', '>', 0)->get();

        $output = '';
        foreach ($comment as $comm) {
            $output .= '
            <div class="row style_comment"> 
						<div class="col-md-2">
							
							<img  width="100%" src="' . url('uploads/home/minhchien2.jpg') . '" alt="" class="img img-responsive img-thumbnail">
						</div>
						<div class="col-md-10">
							<p style="color:green">@' . $comm->comment_name . '</p>
                            <p style="color:#000">@' . $comm->comment_date . '</p>
							<p>' . $comm->comment . '</p>
						</div>
					</div>	<p></p>
                    ';
            foreach ($commnet_rep as $rep_comment) {
                if ($rep_comment->comment_parent == $comm->comment_id) {
                    $output .= ' <div class="row style_comment" style="margin:5px;60px;background:aqua;"> 
                    <div class="col-md-2">
                        
                        <img  width="60%" src="' . url('uploads/home/minhchien2.jpg') . '" alt="" class="img img-responsive img-thumbnail">
                    </div>
                    <div class="col-md-10">
                        <p style="color:blue">@' . $rep_comment->comment_name . '</p>
                        <p style="color:#000">@' . $rep_comment->comment_date . '</p>
                        <p>' . $rep_comment->comment . '</p>
                    </div>
                </div>	<p></p>';
                }
            }
        }
        echo $output;
    }
    public function send_comment(Request $request)
    {
        $product_id = $request->product_id;
        $comment_name = $request->comment_name;
        $comment_content = $request->comment_content;
        $comment = new Comment();
        $comment->comment = $comment_content;
        $comment->comment_name = $comment_name;
        $comment->comment_product_id = $product_id;
        $comment->comment_status = 1;
        $comment->comment_parent = 0;


        $comment->save();
    }
    public function list_comment()
    {
        $comment = Comment::with('products')->where('comment_parent', 0)->orderBy('comment_status', 'DESC')->get();
        $comment_rep = Comment::with('products')->where('comment_parent', '>', 0)->orderBy('comment_id', 'DESC')->get();
        return view('admin.comment.list_comment', compact('comment', 'comment_rep'));
    }
    public function allow_comment(Request $request)
    {
        $data = $request->all();
        $comment = Comment::find($data['comment_id']);
        $comment->comment_status = $data['comment_status'];
        $comment->save();
    }
    public function reply_comment(Request $request)
    {
        $data = $request->all();
        $comment = new Comment();
        $comment->comment = $data['comment'];
        $comment->comment_product_id = $data['comment_product_id'];
        $comment->comment_parent = $data['comment_id'];
        $comment->comment_status = 0;
        $comment->comment_name = "minhchien";
        $comment->save();
    }
    public function insert_rating(Request $request)
    {
        $data = $request->all();
        $rating = new Rating();
        $rating->product_id = $data['product_id'];
        $rating->rating = $data['index'];
        $rating->save();
        echo "done";
    }
    public function delete_document(Request $request){

        $product=Product::find($request->product_id);
        unlink('uploads/document/'.$product->file);
        $product->file='';
        $product->save();
        echo "Xoá file thành công";

    }
}
