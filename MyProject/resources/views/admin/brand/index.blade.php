@extends('admin.main')
@section('content')

<button style="margin:5px;" class="btn btn-success"><a style="color:#fff;" href="{{url('/admin/create_brand')}}">Thêm danh mục</a> </button>
<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
     Bảng danh mục sản phẩm 
    </div>
    <div>
      <table   class="table" ui-jq="footable" ui-options='{
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
                    <th>Id </th>
                     <th>Tên danh mục  </th>
                     <th>slug_danh muc </th>
                     <th>Miêu tả</th>
                     <th>Từ Khoá</th>
                     <th> Thuộc danh mục </th>
                    <th>Tình trạng</th>
                     
                     <th data-breakpoints="xs">Function</th>
                     
          </tr>
        </thead>
        <style>
          #brand_order .ui-state-highlight{
            padding:24px;
            background-color:#ffffcc;
            border:1px dotted #ccc;
            cursor: move;
            margin-top:12px;
          }
        </style>
        <tbody id="brand_order">
        @foreach($data as $brand)
          <tr id="{{$brand->brand_id}}">
                    <td>{{$brand->brand_id }}</td>
          
                     <td>{{$brand->brand_name}}</td>
                     <td>{{$brand->slug_brand}}</td>
                     <td>{{$brand->brand_desc}}</td>
                     <td>{{$brand->meta_keywords}}</td>
                     <td>@if($brand->brand_parent == 0)
                        <span style="color:red">Danh mục cha</span>
                        @else
                        @foreach($data as $data_sub)
                          @if($data_sub->brand_id == $brand->brand_parent)
                          <span style="color:green">{{$data_sub->brand_name}}</span>  
                          @endif
                        @endforeach
                      @endif


                     </td>
                     <td>
                       @if($brand->brand_status==0)  
                        <a  href=""><i  style="font-size:25px; color:red" class="fa fa-eye-slash fa-10x"></i></a>
                        @else
                          <a href=""><i style="font-size:25px; color:green" class="fa fa-eye"></i></a>
                        @endif
                    </td>  
                     
                     <td>
                         <a href="{{url('/admin/edit_brand/'.$brand->brand_id)}}" class="btn btn-success"><i class='fa fa-edit'></i></a>
                         <a href="{{url('/admin/delete_brand/'.$brand->brand_id)}}" class="btn btn-warning "><i class='fa fa-trash'></i></a>
                     </td>
          </tr>
          @endforeach
         
        </tbody>
      </table>

  
   


      
@stop()
