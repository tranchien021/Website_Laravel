@extends('admin.main')
@section('content')
    <form action="{{route('account.store')}}" method="POST">
        @csrf
        <label for="">Name</label>
        <input type="text" name="name" placeholder="Name"><br>
        <label for="">Email</label>
        <input type="text" name="email" placeholder="The Loai"><br>
        <label for="">Password</label>
        <input type="text" name="password" placeholder="The Loai"><br>
        <label for="">Level</label>
        <select name='level'>
          <option value="1">Admin</option>
          <option value="0">Khách Hàng</option>
        </select>
       

        
    <button type="submit" class="btn btn-primary"> Create User </button>
    </form>
        


      
@stop()
