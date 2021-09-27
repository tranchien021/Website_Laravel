@extends('admin.main')
@section('content')
	

    <button class="btn btn-success" style="margin:10px;"><a style="color:#ffff;" href="{{url('admin/create_blog')}}">Thêm thể loại </a> </button>
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
     Danh sách bài viết 
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
            <th>Tên bài viết </th>
            <th>Hình ảnh bài viết </th>
            <th>Slug</th>
            <th>Tóm tắt bài viết  </th>
            <th>Nội dung bài viết </th>
            <th>Meta từ khoá</th>
            <th>Meta nội dung</th>
            
            <th>Danh mục bài viết </th>
            <th>Hiển thị </th>
            <th>Function</th>
          </tr>
        </thead>
        <tbody>
        @foreach($data as $blog)
          <tr>
                    <td>{{$blog->blog_id }}</td>
                    <td>{{$blog->blog_title }}</td>
                    <td><img height="150" width="150" src=" {{url('/uploads/blog')}}/{{$blog->blog_image}}" alt=""></td>
                    <td>{{$blog->blog_slug}}</td>
                    <td>{{$blog->blog_desc}}</td>
                    <td>{!!$blog->blog_content!!}</td>
                    <td>{{$blog->blog_meta_keywords}}</td>
                    <td>{{$blog->blog_meta_desc}}</td>
                   
                    <td>{{$blog->category_blog_id}}</td>

                    <td>
                        @if($blog->blog_status==0)  
                        <a  href="{{url('/admin/active_blog/'.$blog->blog_id)}}"><i  style="font-size:25px; color:red" class="fa fa-eye-slash fa-10x"></i></a>
                        @else
                          <a href="{{url('/admin/unactive_blog/'.$blog->blog_id)}}"><i style="font-size:25px; color:green" class="fa fa-eye"></i></a>
                        @endif

                    </td>
                    

             
                
                     <td>
                         <a href="{{url('admin/edit_blog/'.$blog->blog_id)}}" class="btn btn-success"><i class='fa fa-edit'></i></a>
                         <a href="{{url('admin/delete_blog/'.$blog->blog_id)}}" class="btn btn-warning"><i class='fa fa-trash'></i></a>
                     </td>
          </tr>
          @endforeach
         
        </tbody>
      </table>
      
    

    </div>
  </div>
</div>



@stop
