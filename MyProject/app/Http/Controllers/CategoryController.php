<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Category::all();
        return view('admin.category.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Tên'=>'required',
            'theloai'=>'required',
        ]);
        if(Category::create($request->all())){
            return redirect()->route('category.index')->with('success','Thêm thành công ');
        }else{
             return redirect()->route('category.index')->with('error','Không thành công ');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        if($category->update($request->all())){
           return redirect()->route('category.index')->with('success','Cập nhật thành công');
       }else{
           return redirect()->route('category.index')->with('error','Cập nhật thất bại');
       }
       

   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->products->count() == 2){
            return redirect()->route('category.index')->with('error','Không thể xoá danh mục này ');

        }else{
            $category->delete();
            return redirect()->route('category.index')->with('success', 'Xoá thành công ');
        }
    }
}
