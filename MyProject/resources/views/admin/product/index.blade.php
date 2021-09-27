@extends('admin.main')
@section('content')
<a class="btn btn-success form-control" style="height:40px;" href="{{url('/admin/create_product')}}">Thêm sản phẩm</a> 
		<div class="table-agile-info">
 <div class="panel panel-default">
    <div style="margin:10px 0px;" class="panel-heading">
     Bảng sản phẩm 
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
                    <th>STT </th>   
                     <th>Tên  </th>
                     <th>Hình ảnh  </th>
                     <th>Thư viện ảnh </th>
                     <th>Mã sản phẩm </th>
                     <th>Số lượng</th>
                     <th>Thể loại</th>
                     <th>Giá sản phẩm</th>
                    
                     <th>Địa chỉ</th>
                  
                     <th data-breakpoints="xs">Function</th>
                     
          </tr>
        </thead>
        <tbody>
          <?php
            $i=0;
          ?>
        @foreach($data as $data)
        <?php
          $i++;
        ?>
          <tr data-expanded="true">
            <td>{{$i}}</td>
       
                     <td>{{$data->name}}</td>
                   
                     <td>
                         <img width="80" src="{{url('/uploads/home')}}/{{$data->img}}" alt="Chưa có ảnh ">
                     </td>
                     <td><a href="{{url('/admin/insert_gallery/'.$data->id)}}">Thêm ảnh thư viện</a></td>
                     <td>{{$data->masp}}</td>
                     <td>{{$data->quantity}}</td>
                     <td>{{$data->theloai}}</td>
                     <td>{{$data->price}}</td>
                    
                     <td>{{$data->address}}</td>

                     <td>
                         <a href="{{url('/admin/edit_product/'.$data->id)}}" class="btn btn-success"><i class='fa fa-edit'></i></a>
                         <a href="{{url('/admin/delete_product/'.$data->id)}}" class="btn btn-warning"><i class='fa fa-trash'></i></a>
                     </td>
          </tr>
          @endforeach
          
         
        </tbody>
          
      </table>

        
        <!-- import data -->
      <form action="{{url('admin/import-csv')}}" method="POST" enctype="multipart/form-data">
          @csrf
        <input type="file" name="file" accept=".xlsx"><br>
        <input type="submit" value="Import file Excel" name="import_csv" class="btn btn-warning">
      </form>
      <form action="{{url('admin/export-csv')}}" method="POST">
          @csrf
          <input type="submit" value="Export file Excel" name="export_csv" class="btn btn-success">
      </form>

     


      
@stop()

