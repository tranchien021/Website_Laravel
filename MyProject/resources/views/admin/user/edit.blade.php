@extends('admin.main')
@section('content')
    <form action="{{route('account.update',$account->id)}}" method="POST">

         @csrf @method('PUT')
        <label for="">name</label>
        <input type="text" name="name" placeholder="Name" value="{{$account->name}}"><br>
        <label for="">email</label>
        <input type="text" name="email" placeholder="The Loai" value="{{$account->email}}" ><br>
        <label for="">password</label>
        <input type="text" name="password" placeholder="The Loai" value="{{$account->password}}"><br>
        <select name='level'>
          <option value="1">Admin</option>
          <option value="0">Khách Hàng</option>
        </select>
       

        
    <button type="submit" class="btn btn-primary"> Update Account   </button>
    </form>
        


      
@stop()
