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
                    @foreach($contacts as $contact)
                    <form id="commentForm" novalidate="novalidate" class="cmxform form-horizontal " action="{{url('/admin/update_contact/'.$contact->info_id)}}" method="POST" enctype='multipart/form-data'>
                        @csrf
                        <div class="form-group ">
                            <label for="cname" class="control-label col-lg-3">Thông tin liên hệ </label>
                            <div class="col-lg-6">
                                <textarea id="ckeditor_infor_content" class="form-control" type="text" name="info_contact">{{$contact->info_contact}}</textarea>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="cemail" class="control-label col-lg-3">Bản đồ </label>
                            <div class="col-lg-6">
                            <textarea  rows="8"  class="form-control" type="text" name="info_map">{{$contact->info_map}}</textarea>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="curl" class="control-label col-lg-3"> Fanpage </label>
                            <div class="col-lg-6">
                            <textarea rows="8"  class="form-control" type="text" name="info_fanpage"  >{{$contact->info_fanpage}}</textarea>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="curl" class="control-label col-lg-3"> Hình ảnh - logo </label>
                            <div class="col-lg-6">
                                <input class="form-control" type="file" name="info_image">
                                <img height="100" width="100" src="{{url('uploads/contact/'.$contact->info_logo)}}" alt="">
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-6">
                                <button class="btn btn-primary" type="submit">Cập nhật thông tin </button>
                                <a href="" class="btn btn-default" type="button">Trở về </a>
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