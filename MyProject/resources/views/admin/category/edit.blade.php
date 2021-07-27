@extends('admin.main')
@section('content')
    <form action="{{route('category.update',$category->id)}}" method="POST">
        @csrf @method('PUT')
        <label for="">Name</label>
        <input type="text" name="Tên" placeholder="Name" value="{{$category->Tên}}">
         <label for="">The loai</label>
        <input type="text" name="theloai" placeholder="The Loai"  value="{{$category->theloai}}"> 

        
    <button type="submit" class="btn btn-primary"> Create here </button>
    </form>
        


      
@stop()
