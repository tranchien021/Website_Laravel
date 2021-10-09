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
                Cập nhật thể loại
                <span class="tools pull-right">
                    <a class="fa fa-chevron-down" href="javascript:;"></a>
                    <a class="fa fa-cog" href="javascript:;"></a>
                    <a class="fa fa-times" href="javascript:;"></a>
                </span>
            </header>
            <div class="panel-body">
                <div class=" form">

                    <form class="cmxform form-horizontal " id="commentForm" action="{{url('/admin/update_product/'.$product->id)}}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group ">
                            <label for="cname" class="control-label col-lg-3">Tên sản phẩm </label>
                            <div class="col-lg-6">
                                <input value="{{$product->name}}" class=" form-control" name="name" minlength="2" type="text" required="">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="curl" class="control-label col-lg-3"> Hình ảnh </label>
                            <div class="col-lg-6">
                                <input class="form-control " id="file_img" type="file" name="file_img" required="">
                            </div>

                        </div>
                        <div class="form-group ">
                            <label for="curl" class="control-label col-lg-3"> Hình ảnh </label>
                            <div class="col-lg-6">
                                <img src="{{url('uploads/home/'.$product->img)}}" width="15%" alt="">
                            </div>

                        </div>
                        <div class="form-group ">
                            <label for="curl" class="control-label col-lg-3"> Hình ảnh </label>
                            <input type="file" name="document" id="file_document">
                            @if($product->file)
                            <p class="exist_file"><a target="_blank" href="{{asset('/uploads/document/'.$product->file)}}"> {{$product->file}} </a> 
                            <button type="button" data-document_id="{{$product->id}}" class="btn btn-warning btn_delete_document"><i class="fa fa-times"> Xoá file </i></button>
                            </p>
                            @else
                            <p>Không có file </p>
                            @endif

                        </div>


                        <div class="form-group ">
                            <label for="curl" class="control-label col-lg-3"> Hiện thị </label>
                            <div class="col-lg-6">
                                <input value="{{$product->theloai}}" class=" form-control" name="theloai" type="text" required="">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="curl" class="control-label col-lg-3"> Thuộc thể loại </label>
                            <div class="col-lg-6">
                                <select name='masp' class="form-control">
                                    @foreach($cat as $cat)
                                    <option value="{{$cat->theloai}}">{{$cat->Tên}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="curl" class="control-label col-lg-3"> Tag sản phẩm </label>
                            <div class="col-lg-6">
                                <input data-role="tagsinput" value="{{$product->product_tag}}" class="form-control" type="text" name="product_tag">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="curl" class="control-label col-lg-3"> Số lượng </label>
                            <div class="col-lg-6">
                                <input value="{{$product->quantity}}" class=" form-control" name="quantity" type="text">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="curl" class="control-label col-lg-3"> Giá sản phẩm </label>
                            <div class="col-lg-6">
                                <input value="{{$product->price}}" class=" form-control " name="price" type="number" min="1">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="curl" class="control-label col-lg-3"> Giá nhập nguyên liệu </label>
                            <div class="col-lg-6">
                                <input value="{{$product->import_price}}" class=" form-control " name="import_price" type="number" min="1">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="curl" class="control-label col-lg-3"> Nội dung chi tiết </label>
                            <div class="col-lg-6">
                                <textarea id="ckeditor_edit_product_content" style="resize:none" class="form-control " name="content">{{$product->content}}</textarea>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="curl" class="control-label col-lg-3"> Địa chỉ </label>
                            <div class="col-lg-6">
                                <input value="{{$product->address}}" class=" form-control" name="address" type="text">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="curl" class="control-label col-lg-3">Ngày sản xuất </label>
                            <div class="col-lg-6">
                                <input value="{{$product->date}}" class=" form-control" name="date" type="date">
                            </div>
                        </div>


                        <div class="form-group ">
                            <label for="comment" class="control-label col-lg-3">Tình trạng </label>
                            <div class="col-lg-6">
                                <select name='tinhtrang' class="form-control">
                                    <option value="1">Còn hàng </option>
                                    <option value="0">Hết hàng </option>

                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-6">
                                <button name="" class="btn btn-primary" type="submit">Cập nhật sản phẩm </button>
                                <a href="{{url('/admin/list_product')}}" class="btn btn-default" type="button">Trở về</a>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </section>
    </div>
</div>




@stop()