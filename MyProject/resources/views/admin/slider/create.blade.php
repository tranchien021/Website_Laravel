@extends('admin.main')
@section('content')
<div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>
                    @elseif(session()->has('error'))
                        <div class="alert alert-success">
                            {{session()->get('error')}}
                        </div>
                    @endif
                        <header class="panel-heading">
                           Thêm slider
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class=" form">
                                <form class="cmxform form-horizontal " id="commentForm" action="{{url('/admin/insert_slider')}}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                                 @csrf
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Tên slide </label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="slider_name" name="slider_name" minlength="2" type="text" required="">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-3">Hình ảnh  </label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="slider_image" type="file" name="slider_image" required="">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-3">Mô tả slider </label>
                                        <div class="col-lg-6">
                                            <textarea style="resize:none" class="form-control " id="slider_desc" name="slider_desc" placeholder="Mô tả slider"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="comment" class="control-label col-lg-3">Hiển thị </label>
                                        <div class="col-lg-6">
                                        <select name='slider_status'>
                                              <option value="0">Ẩn slider</option>
                                              <option value="1">Hiển thị slider </option>
                                        </select>
                                        </div>
                                    </div>
                                  
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button name="" class="btn btn-primary" type="submit">Thêm slider </button>
                                            <a href="{{url('/admin/manage_slider')}}" class="btn btn-default" type="button">Trở về</a>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </section>
                </div>
            </div>



      
@stop()
