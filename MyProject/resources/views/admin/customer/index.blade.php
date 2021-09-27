@extends('admin.main')
@section('content')
	

@if(session()->has('message'))
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>
                    @elseif(session()->has('error'))
                        <div class="alert alert-success">
                            {{session()->get('error')}}
                        </div>
                    @endif
		<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
   Bẳng tài khoản khách hàng 
    </div>
    <div>
      <table  id="myTable" class="table" ui-jq="footable" ui-options='{
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
            <th data-breakpoints="xs">Function</th>
          </tr>
        </thead>
        <tbody>
        @foreach($data as $data)
          <tr data-expanded="true">
                    <td>{{$data->customer_id}}</td>
                     <td>{{$data->customer_name}}</td>
                     <td>{{$data->customer_email}}</td>
                     <td>{{$data->customer_password}}</td>
                     <td>{{$data->customer_phone}}</td>
                    
                    
                     <td>
                         <a href="{{url('/admin/edit_customer/'.$data->customer_id)}}" class="btn btn-success"><i class='fa fa-edit'></i></a>
                         <a href="{{url('/admin/delete_customer/'.$data->customer_id)}}" class="btn btn-warning"><i class='fa fa-trash'></i></a>
                     </td>
          </tr>
          @endforeach
         
        </tbody>
      </table>
      
      
    </div>
  </div>
</div>



@stop
