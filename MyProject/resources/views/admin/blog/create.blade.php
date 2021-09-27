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
                           Thêm bài viết 
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class=" form">
                                <form class="cmxform form-horizontal " id="commentForm" action="{{url('/admin/insert_blog')}}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                                 @csrf
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Tên bài viết  </label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="slug" onkeyup="ChangeToSlug();" name="blog_title" minlength="2" type="text" required="">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-3"> Slug  </label>
                                        <div class="col-lg-6">
                                            <textarea style="resize:none" class="form-control " id="convert_slug" name="blog_slug"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-3"> Tóm tắt bài viết  </label>
                                        <div class="col-lg-6">
                                            <textarea style="resize:none" class="form-control " name="blog_desc"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-3"> Nội dung bài viết  </label>
                                        <div class="col-lg-6">
                                            <textarea id="ckeditor_blog_content" style="resize:none" class="form-control " name="blog_content"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-3"> Meta từ khoá  </label>
                                        <div class="col-lg-6">
                                            <textarea style="resize:none" class="form-control " name="blog_meta_keywords"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-3"> Meta nội dung  </label>
                                        <div class="col-lg-6">
                                            <textarea style="resize:none" class="form-control " name="blog_meta_desc"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-3"> Hình ảnh bài viết  </label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="blog_image" type="file" name="blog_image" required="">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-3"> Danh mục bài viết  </label>
                                        <div class="col-lg-6">
                                        <select name='category_blog_id' class="form-control">
                                            @foreach($category_blog as $cate_blog)
                                              <option value="{{$cate_blog->category_blog_id}}">{{$cate_blog->category_blog_name}} </option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>
                                   
                                    
                                    <div class="form-group ">
                                        <label for="comment" class="control-label col-lg-3">Hiển thị </label>
                                        <div class="col-lg-6">
                                        <select name='blog_status' class="form-control">
                                            <option value="1">Hiển thị  </option>  
                                            <option value="0">Ẩn </option>
                                             
                                        </select>
                                        </div>
                                    </div>
                                  
                                  
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button name="" class="btn btn-primary" type="submit">Tạo bài viết  </button>
                                            <a href="{{url('/admin/list_blog')}}" class="btn btn-default" type="button">Trở về</a>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </section>
                </div>
            </div>



      
@stop()
