@extends('admin.main')
@section('content')
	

    <button class="btn btn-success" style="margin:10px;"><a style="color:#ffff;" href="{{url('admin/add_slider')}}">Thêm slider </a> </button>
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
     Danh sách slide
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
            <th data-breakpoints="xs">Tên Slide</th>
            <th>Hình ảnh  </th>
            <th>Mô tả </th>
            <th>Tình trạng</th>
            <th data-breakpoints="xs">Function</th>
          </tr>
        </thead>
        <tbody>
        @foreach($slider as $slider)
          <tr data-expanded="true">
                    <td>{{$slider->slider_name}}</td>
                    <td><img height="130" width="500" src=" {{url('/uploads/slider')}}/{{$slider->slider_image}}" alt=""></td>
                    <td>{{$slider->slider_desc}}</td>
                    <td>
                        @if($slider->slider_status==0)  
                        <a  href="{{url('admin/active_banner/'.$slider->slider_id)}}"><i  style="font-size:25px; color:red" class="fa fa-eye-slash fa-10x"></i></a>
                        @else
                          <a href="{{url('admin/unactive_banner/'.$slider->slider_id)}}"><i style="font-size:25px; color:green" class="fa fa-eye"></i></a>
                        @endif

                    </td>
                    
                     <td>
                         <a href="{{url('admin/edit_banner/'.$slider->slider_id)}}" class="btn btn-success"><i class='fa fa-edit'></i></a>
                         <a href="{{url('admin/delete_banner/'.$slider->slider_id)}}" class="btn btn-warning"><i class='fa fa-trash'></i></a>
                     </td>
          </tr>
          @endforeach
         
        </tbody>
      </table>
      
    

    </div>
  </div>
</div>



@stop
