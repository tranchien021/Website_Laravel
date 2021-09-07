@extends('admin.main')
@section('content')
<div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Sửa Slider
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class=" form">
                           
                         
                                @foreach($slider as $slider)
                                <form  id="commentForm" class="cmxform form-horizontal " action="{{url('/admin/update_banner/'.$slider->slider_id)}}" method="POST">
                                    @csrf 
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-3">Tên slider </label>
                                        <div class="col-lg-6">
                                              <input value="{{$slider->slider_name}}"  class="form-control"  type="text" name="slider_name" placeholder="Tên thể loại">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-3"> Hình ảnh </label>
                                        <div class="col-lg-6">
                                         <input  value="{{$slider->slider_image}}" class="form-control"  type="text" name="slider_image" placeholder="Ký Hiệu">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-3">Miêu tả slider </label>
                                        <div class="col-lg-6">
                                        
                                         <textarea  name="slider_desc" placeholder="Miêu tả" class="form-control" >{{$slider->slider_desc}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-3">Tình trạng  slider </label>
                                        <div class="col-lg-6">
                                        <select name="slider_status" class="form-control" id="">
                                            <option value="0">Ẩn slider</option>
                                            <option value="1">Hiện slider</option>
                                        </select>
                                        
                                        </div>
                                    </div>
                                   
                                 
                                 
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button type="submit" class="btn btn-primary">Thay đổi </button>
                                            <a href="{{url('/admin/manage_slider')}}" class="btn btn-default" type="button">Trở về </a>
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
