@extends('admin.main')
@section('content')


    
    
		<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
     Danh sách video
    </div>
   
    <div style="padding:10px 0px;" class="col-sm-12">
    <div class=" form">
                                <form class="cmxform form-horizontal " id="" action="" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                                 @csrf
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Tên video  </label>
                                        <div class="col-lg-7">
                                            <input class=" form-control video_title" id="slug" onkeyup="ChangeToSlug();" name="video_title"  type="text" required="">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-3"> Slug video </label>
                                        <div class="col-lg-7">
                                            <textarea style="resize:none" class="form-control  video_slug" id="convert_slug" name="video_slug"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-3"> Link video  </label>
                                        <div class="col-lg-7">
                                            <textarea id="" style="resize:none" class="form-control video_link" name="video_link"></textarea>
                                        </div>
                                    </div>
                                   
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-3"> Mô tả video  </label>
                                        <div class="col-lg-7">
                                            <textarea  style="resize:none" class="form-control video_desc" name="video_desc"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-3"> Hình ảnh video  </label>
                                        <div class="col-lg-7">
                                            <input type="file" class="form-control" id="file_img_video" name="file" accept="image/*" multiple>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group ">
                                        <label for="comment" class="control-label col-lg-3">Hiển thị </label>
                                        <div class="col-lg-7">
                                        <select class="form-control" name='slider_status'>
                                              <option value="0">Ẩn slider</option>
                                              <option value="1">Hiển thị slider </option>
                                        </select>
                                        </div>
                                    </div>
                                    -->
                                   
                                    
                
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button name="" class="btn btn-success btn_add_video" type="button">Thêm video mới   </button>
                                          
                                        </div>
                                    </div>
                                </form>
                                <div class="notify">

                                </div>
                            </div>      
      
    </div>
    <div id="video_load">

    </div>

      
    

  </div>
 

  
</div>


      
@stop()

