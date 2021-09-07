@extends('admin.main')
@section('content')
<div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Sửa thể loại
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class=" form">
                           
                         
                              
                                <form  id="commentForm" class="cmxform form-horizontal " action="{{route('category.update',$category->id)}}" method="POST">
                                    @csrf @method('PUT')
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-3">Tên thể loại </label>
                                        <div class="col-lg-6">
                                              <input value="{{$category->Tên}}"  class="form-control"  type="text" name="Tên" placeholder="Tên thể loại">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-3"> Ký hiệu</label>
                                        <div class="col-lg-6">
                                         <input  value="{{$category->theloai}}" class="form-control"  type="text" name="theloai" placeholder="Ký Hiệu">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-3">Miêu tả thể loại</label>
                                        <div class="col-lg-6">
                                        
                                         <textarea  name="meta_desc" placeholder="Miêu tả" class="form-control" >{{$category->meta_desc}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-3">Từ khoá thể loại</label>
                                        <div class="col-lg-6">
                                             <textarea  name="meta_keywords" placeholder="Từ khoá" class="form-control">{{$category->meta_keywords}}</textarea>
                                        </div>
                                        
                                    </div>
                                 
                                 
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button type="submit" class="btn btn-primary">Tạo Mới </button>
                                            <a href="{{url('/admin/category')}}" class="btn btn-default" type="button">Trở về </a>
                                        </div>
                                    </div>
                          
                                </form>
        

                    
                              
                            </div>

                        </div>
                    </section>
                </div>
            </div>




    

      
@stop()
