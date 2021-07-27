@extends('admin.main')
@section('content')
    <form action="{{route('product.store')}}" method="POST" enctype='multipart/form-data'>
        @csrf
        <label for="">Name</label>
        <input type="text" name="name" placeholder="Name"><br>
        <label for="">Img</label>
        <input type="file" name="file_img" placeholder="The Loai"><br>
        <label for="">TheLoai</label>
        <input type="text" name="theloai" placeholder="The Loai"><br>
        <label for="">Masp</label>
        <select name='masp' class="form-control">
          
          @foreach($cat as $cat)
          <option value="{{$cat->theloai}}">{{$cat->Tên}}</option>
          @endforeach
        </select>
        <label for="">Price</label>
        <input type="number" name="price" placeholder="Price "><br>
        <label for="">Content</label>
        <textarea type="text" name="content" placeholder="Content" id="summernote"></textarea><br>
        <label for="">Address</label>
        <input type="text" name="address" placeholder="Địa chỉ"><br>
        <label for="">Date</label>
        <input type="date" name="date" placeholder="The Loai"><br>
        <label for="">Tinh Trang </label><br>
        <select name='tinhtrang'>
          <option value="1">Con Hang</option>
          <option value="0">Het Hang</option>
        </select>
       

     
    <button type="submit" class="btn btn-primary"> Create here </button>
    </form>
        


      
@stop()
