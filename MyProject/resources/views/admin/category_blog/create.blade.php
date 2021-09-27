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
                                <form class="cmxform form-horizontal " id="commentForm" action="{{url('/admin/insert_category_blog')}}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                                 @csrf
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Tên thể loại </label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="slug" onkeyup="ChangeToSlug();" name="category_blog_name" minlength="2" type="text" required="">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-3"> Slug thể loại  </label>
                                        <div class="col-lg-6">
                                            <textarea style="resize:none" class="form-control " id="convert_slug" name="category_blog_slug"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-3"> Miêu tả </label>
                                        <div class="col-lg-6">
                                            <textarea style="resize:none" class="form-control " name="category_blog_desc"></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group ">
                                        <label for="comment" class="control-label col-lg-3">Hiển thị </label>
                                        <div class="col-lg-6">
                                        <select name='category_blog_status'>
                                              <option value="0">Ẩn </option>
                                              <option value="1">Hiển thị  </option>
                                        </select>
                                        </div>
                                    </div>
                                  
                                  
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button name="" class="btn btn-primary" type="submit">Cập nhật </button>
                                            <a href="{{url('/admin/list_category_blog')}}" class="btn btn-default" type="button">Trở về</a>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </section>
                </div>
            </div>



      
@stop()
