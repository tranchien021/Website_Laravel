<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data=Product::all();
        return view('admin.product.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat=Category::all();
        return view('admin.product.create',compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('file_img')){
            $file=$request->file_img;
            $ext=$request->file_img->extension();
            $file_name=time()."-product".".".$ext;
           
            $file->move(public_path('uploads'),$file_name);
           
           

        }
        $request->merge(['img'=>$file_name]);
    
       $request->validate([
            'name'=>'required',
            'img'=>'required',
            'masp'=>'required',
            'theloai'=>'required',
            'price'=>'required',
            'content'=>'required',
            'address'=>'required',
            'date'=>'required',
            'tinhtrang'=>'required'
        ]);
        if(Product::create($request->all())){
            return redirect()->route('product.index')->with('success','Thêm thành công ');
        }else{
             return redirect()->route('product.index')->with('error','Không thành công ');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $cat=Category::all();
        return view('admin.product.edit',compact('product','cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Product $product)
    {
        if($request->has('file_img')){
            $file=$request->file_img;
            $ext=$request->file_img->extension();
            $file_name=time()."-Product".".".$ext;
           
            $file->move(public_path('uploads'),$file_name);
           
           

        }
        $request->merge(['img'=>$file_name]);
        
    
        if($product->update($request->all())){
           return redirect()->route('product.index')->with('success','Cập nhật thành công');
       }else{
           return redirect()->route('product.index')->with('error','Cập nhật thất bại');
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
         $product->delete();
            return redirect()->route('product.index')->with('success', 'Xoá thành công ');
    }
}
