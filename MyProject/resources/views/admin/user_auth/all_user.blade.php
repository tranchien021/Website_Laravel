@extends('admin.main')
@section('content')

	<div class="table-agile-info">
 <div class="panel panel-default">
   	
<?php 
		$message=Session::get('message');
		if($message){
			echo $message;
			Session::put('message',null);
		}
	?>
    <div class="panel-heading">
     Xác thực tài khoản 
    </div>
   
    <div>
      <table id="myTable" class="table" ui-jq="footable" ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>
        <thead>
          <tr>
            <th data-breakpoints="xs">ID</th>
            <th>Tên account </th>
            <th>Email</th>
            <th data-breakpoints="xs">Mật Khẩu</th>
            <th>Điện thoại</th>
           
           
            <th>Author</th>
            <th>Admin</th>
            <th>Users</th>
            <th data-breakpoints="xs">Function</th>
          </tr>
        </thead>
        <tbody>
        @foreach($admin as $data)
        <form action="{{url('/admin/assign_roles')}}" method="POST">
        @csrf
            <tr data-expanded="true">
                        <td>{{$data->id}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}
                            <input type="hidden" name="email" value="{{$data->email}}">
                            <input type="hidden" name="id" value="{{$data->id}}">
                        </td>
                        <td>{{$data->password}}</td>
                        <td>{{$data->phone}}</td>
                        
                       

                        <td><input type="checkbox" name="author_role" {{$data->hasRole('author') ? 'checked' : ''}}></td>
                        <td><input type="checkbox" name="admin_role" {{$data->hasRole('admin') ? 'checked' : ''}}></td>
                        <td><input type="checkbox" name="user_role" {{$data->hasRole('user') ? 'checked' : ''}}></td>

                        <td>
                            <input type="submit" value="Phân quyền " class="btn btn-success btn-default">
                            <a style="margin:5px 0px;" class="btn btn-danger" href="{{url('/admin/delete_user_auth/'.$data->id)}}">Xoá User</a>
                            <a style="margin:5px 0px;" class="btn btn-success" href="{{url('/admin/change_login/'.$data->id)}}">Đăng nhập</a>
                        </td>
            </tr>
        </form> 
         
          @endforeach
         
        </tbody>
      </table>
      
    

    </div>
  </div>
</div>



@stop
