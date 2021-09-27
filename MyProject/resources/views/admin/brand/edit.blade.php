@extends('admin.main')
@section('content')
@if(session()->has('message'))
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>
                    @elseif(session()->has('error'))
                        <div class="alert alert-success">
                            {{session()->get('error')}}
                        </div>
                    @endif
<div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                    
                        <header class="panel-heading">
                        Cập nhật danh mục
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class=" form">
                                @foreach($data as $brand)
                                <form class="cmxform form-horizontal " id="commentForm" action="{{url('/admin/update_brand/'.$brand->brand_id)}}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                                 @csrf
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Tên danh mục</label>
                                        <div class="col-lg-6">
                                            <input value="{{$brand->brand_name}}" class=" form-control"  name="brand_name" minlength="2" type="text" id="slug" onkeyup="ChangeToSlug();">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-3">Danh mục slug  </label>
                                        <div class="col-lg-6">
                                            <input value="{{$brand->slug_brand}}" class="form-control "  type="text" name="slug_brand" id="convert_slug">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-3">Mô tả </label>
                                        <div class="col-lg-6">
                                            <textarea name="brand_desc" style="resize:none" class="form-control " id="slider_desc" name="brand_desc" placeholder="Mô tả ">{{$brand->brand_desc}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-3">Từ khoá  </label>
                                        <div class="col-lg-6">
                                            <textarea style="resize:none" class="form-control " id="slider_desc" name="meta_keywords" >{{$brand->meta_keywords}}</textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-3">Thuộc danh mục </label>
                                        <div class="col-lg-6">
                                        <select name="brand_parent" id="" class="form-control ">
                                            <option value="0">Danh mục cha </option>
                                            @foreach($all_brand as $brands)
                                                @if($brands->brand_parent==0)
                                                    <option {{$brands->brand_id == $brand->brand_id ? 'selected' : '' }} value="{{$brands->brand_id}}">{{$brands->brand_name}}</option>
                                                @endif
                                                @foreach($all_brand as $brand_sub)
                                                    @if($brand_sub->brand_parent == $brands ->brand_id)
                                                        <option {{$brand_sub->brand_id==$brand->brand_id ? 'selected' : ''}} value="{{$brand_sub->brand_id}}">----- ( {{$brand_sub->brand_name}} )-------</option>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </select>
                                           
                                            
                                        </div>
                                       
                                    </div>

                                       
                                    <div class="form-group ">
                                        <label for="comment" class="control-label col-lg-3">Tình trạng </label>
                                        <div class="col-lg-6">
                                        <select name='brand_status' class="form-control">
                                                <option value="1">Hiển thị  </option>
                                              <option value="0">Ẩn </option>
                                             
                                        </select>
                                        </div>
                                    </div>
                                  
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button  class="btn btn-primary" type="submit">Cập nhật danh mục </button>
                                            <a href="{{url('/admin/list_brand')}}" class="btn btn-default" type="button">Trở về</a>
                                        </div>
                                    </div>
                                </form>
                                @endforeach
                            </div>

                        </div>
                    </section>
                </div>
            </div>



      
@stop()
