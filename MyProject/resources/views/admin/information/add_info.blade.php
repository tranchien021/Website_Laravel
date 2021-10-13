@extends('admin.main')
@section('content')



<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm thông tin website
                <span class="tools pull-right">
                    <a class="fa fa-chevron-down" href="javascript:;"></a>
                    <a class="fa fa-cog" href="javascript:;"></a>
                    <a class="fa fa-times" href="javascript:;"></a>
                </span>
            </header>
            <div class="panel-body">
                <div class=" form">
                    <form id="commentForm" novalidate="novalidate" class="cmxform form-horizontal " action="{{url('/admin/save_infor')}}" method="POST" enctype='multipart/form-data'>
                        @csrf
                        <div class="form-group ">
                            <label for="cname" class="control-label col-lg-3">Thông tin liên hệ </label>
                            <div class="col-lg-6">
                                <textarea id="ckeditor_infor_content" class="form-control" type="text" name="info_contact"></textarea>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="cemail" class="control-label col-lg-3">Bản đồ </label>
                            <div class="col-lg-6">
                            <textarea  rows="8"  class="form-control" type="text" name="info_map"></textarea>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="curl" class="control-label col-lg-3"> Fanpage </label>
                            <div class="col-lg-6">
                            <textarea rows="8"  class="form-control" type="text" name="info_fanpage"  ></textarea>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="curl" class="control-label col-lg-3"> Hình ảnh - logo </label>
                            <div class="col-lg-6">
                                <input class="form-control" type="file" name="info_image">
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-6">
                                <button class="btn btn-primary" type="submit">Thêm thông tin </button>
                                <a href="" class="btn btn-default" type="button">Trở về </a>
                            </div>
                        </div>

                    </form>

                </div>

            </div>
        </section>
        <section class="panel">
            <header class="panel-heading">
                Thêm thông tin network social 
                <span class="tools pull-right">
                    <a class="fa fa-chevron-down" href="javascript:;"></a>
                    <a class="fa fa-cog" href="javascript:;"></a>
                    <a class="fa fa-times" href="javascript:;"></a>
                </span>
            </header>
            <div class="panel-body">
                <div class=" form">
                    <form enctype='multipart/form-data'>
                        @csrf
                        <div class="form-group ">
                            <label  class="control-label col-lg-3">Tên icon  </label>
                            <div class="col-lg-6">
                                <input type="text" name="icon_name " id="icon_name " class="form-control">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="control-label col-lg-3">Hình ảnh icon </label>
                            <div class="col-lg-6">
                                <input type="text" name="icon_image " id="icon_image " class="form-control">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="control-label col-lg-3">Link icon  </label>
                            <div class="col-lg-6">
                                <input type="text" name="icon_link " id="icon_link " class="form-control">
                            </div>
                        </div>
                       

                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-6">
                                <button class="btn btn-primary" type="submit">Thêm thông tin </button>
                                <a href="" class="btn btn-default" type="button">Trở về </a>
                            </div>
                        </div>

                    </form>

                </div>

            </div>
        </section>
    </div>
</div>



@stop()