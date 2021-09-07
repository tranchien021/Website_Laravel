<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use App\Imports\CategoryImport;
use App\Exports\CategoryExport;
use Excel;

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
    public function export_csv (){
        return Excel::download(new CategoryExport , 'category.xlsx');
    }
    public function import_csv (Request $request){
        $path = $request->file('file')->getRealPath();
        Excel::import(new CategoryImport, $path);
        return back();

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
            'meta_keywords'=>'required',
            'meta_desc'=>'required',
            'Tên'=>'required',
            'theloai'=>'required',
           
        ]);
        if(Category::create($request->all())){
            return redirect()->route('category.index');
        }else{
             return redirect()->route('category.create');
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
           return redirect()->route('category.index');
       }else{
           return redirect()->route('category.edit');
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
            return redirect()->route('category.index');

        }else{
            $category->delete();
            return redirect()->route('category.index');
        }
    }
}
