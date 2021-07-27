@extends('admin.main')
@section('content')
    <form action="{{route('category.store')}}" method="POST">
        @csrf
        <label for="">Name</label>
        <input type="text" name="Tên" placeholder="Name">
         <label for="">The loai</label>
        <input type="text" name="theloai" placeholder="The Loai">
        
    <button type="submit" class="btn btn-primary"> Create here </button>
    </form>
        


@stop()
