@extends('admin.main')
@section('content')
	

    <button class="btn btn-success" style="margin:10px;"><a style="color:#ffff;" href="{{url('admin/create_gallery')}}">Thêm bộ sưu tập</a> </button>
    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>
                    @elseif(session()->has('error'))
                        <div class="alert alert-success">
                            {{session()->get('error')}}
                        </div>
                    @endif
    <p></p>
		<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
     Danh sách bộ sư tập 
    </div>
    <div>
      <table class="table" ui-jq="footable" ui-options='{
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
            <th>Tên gallery </th>
            <th>Hình ảnh gallery </th>
            <th>Thuộc sản phẩm  </th>
            <th>Function</th>
          </tr>
        </thead>
        <tbody>
        @foreach($data as $gallery)
          <tr data-expanded="true">
                    <td>{{$gallery->gallery_id }}</td>
                    <td>{{$gallery->gallery_name }}</td>
                    <td><img height="150" width="150" src=" " alt=""></td>
                    <td>{{$gallery->id}}</td>
                  
                     <td>
                         <a href="{{url('admin/edit_gallery/'.$gallery->gallery_id)}}" class="btn btn-success"><i class='fa fa-edit'></i></a>
                         <a href="{{url('admin/delete_gallery/'.$gallery->gallery_id)}}" class="btn btn-warning"><i class='fa fa-trash'></i></a>
                     </td>
          </tr>
          @endforeach
         
        </tbody>
      </table>
      
    

    </div>
  </div>
</div>



@stop
