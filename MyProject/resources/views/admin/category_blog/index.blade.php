@extends('admin.main')
@section('content')
	

    <button class="btn btn-success" style="margin:10px;"><a style="color:#ffff;" href="{{url('admin/create_category_blog')}}">Thêm thể loại </a> </button>
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
     Danh sách thể loại bài viết 
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
            <th>ID</th>
            <th>Tên thể loại</th>
            <th>Miêu tả</th>
            <th>Hiển thị </th>
            <th>Slug thể loại</th>
            <th>Function</th>
          </tr>
        </thead>
        <tbody>
        @foreach($data as $category_blog)
          <tr>
                    <td>{{$category_blog->category_blog_id}}</td>
                    <td>{{$category_blog->category_blog_name}}</td>
                    <td>{{$category_blog->category_blog_desc}}</td>

                    <td>
                        @if($category_blog->category_blog_status==0)  
                        <a  href=""><i  style="font-size:25px; color:red" class="fa fa-eye-slash fa-10x"></i></a>
                        @else
                          <a href=""><i style="font-size:25px; color:green" class="fa fa-eye"></i></a>
                        @endif

                    </td>
                    

                    <td>{{$category_blog->category_blog_slug}}</td>
                    
                 
                     <td>
                         <a href="{{url('admin/edit_category_blog/'.$category_blog->category_blog_id)}}" class="btn btn-success"><i class='fa fa-edit'></i></a>
                         <a href="{{url('admin/delete_category_blog/'.$category_blog->category_blog_id)}}" class="btn btn-warning"><i class='fa fa-trash'></i></a>
                     </td>
          </tr>
          @endforeach
         
        </tbody>
      </table>
      
    

    </div>
  </div>
</div>



@stop
