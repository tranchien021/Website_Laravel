@extends('admin.main')
@section('content')
    <form action="{{route('product.update',$product->id)}}" method="POST"  enctype='multipart/form-data'>

         @csrf @method('PUT')
        <label for="">Name</label>
        <input type="text" name="name" placeholder="Name" value="{{$product->name}}"><br>
        <label for="">Img</label>
        <input type="file" name="file_img" placeholder="The Loai" value="{{$product->img}}" ><br>
        
        <label for="">TheLoai</label>
        <input type="text" name="theloai" placeholder="The Loai" value="{{$product->theloai}}"><br>
        <label for="">Masp</label>
        <select name='masp' class="form-control">
          
          @foreach($cat as $cat)
          <option value="{{$cat->theloai}}">{{$cat->Tên}}</option>
          @endforeach
        </select>
        <label for="">Số lượng</label>
        <input type="text" name="quantity" placeholder="Số lượng" value="{{$product->quantity}}"><br>
        <label for="">Price</label>
        <input type="number" name="price" placeholder="The Loai" value="{{$product->price}}"><br>
        <label for="">Content</label>
        <textarea name="content" >{{$product->content}}</textarea><br>
        <label for="">Address</label>
        <input type="text" name="address" placeholder="The Loai" value="{{$product->address}}"><br>
        <label for="">Date</label>
        <input type="date" name="date" placeholder="The Loai" value="{{$product->date}}"><br>
        <label for="">Tinh Trang </label><br>
        <select name='tinhtrang'>
          <option value="1">Con Hang</option>
          <option value="0">Het Hang</option>
        </select>
       

        
    <button type="submit" class="btn btn-primary"> Create here </button>
    </form>
        


      
@stop()
