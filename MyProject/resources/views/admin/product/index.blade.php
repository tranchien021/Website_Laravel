@extends('admin.main')
@section('content')
<a class="btn btn-primary" href="{{route('product.create')}}">Thêm sản phẩm</a> 
		<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
     Basic table
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
                    <th>Id </th>   
                     <th>Tên  </th>
                     <th>Hình ảnh  </th>
                     <th>Mã sản phẩm </th>
                     <th>Số lượng</th>
                     <th>Thể loại</th>
                     <th>Giá sản phẩm</th>
                     <th>Nội dung </th>
                     <th>Địa chỉ</th>
                     <th>Tình Trạng</th>
                     <th>Function</th>
                     
          </tr>
        </thead>
        <tbody>
        @foreach($data as $data)
          <tr data-expanded="true">
          <td>{{$data->id}}</td>
                     <td>{{$data->name}}</td>
                     <td>
                         <img width="80" src="{{url('/uploads/home')}}/{{$data->img}}" alt="Chưa có ảnh ">
                     </td>
                     <td>{{$data->masp}}</td>
                     <td>{{$data->quantity}}</td>
                     <td>{{$data->theloai}}</td>
                     <td>{{$data->price}}</td>
                     <td>{!!$data->content!!}</td>
                     <td>{{$data->address}}</td>

                     @if($data->tinhtrang == 1)
                     <td><span class="badge badge-success"> Còn Hàng </span></td>
                 
                    @else
                    <td><span class="badge badge-warning"> Hết Hàng  </span></td>
             
                      @endif
                     
                     <td>
                         <a href="{{route('product.edit',$data->id)}}" class="btn btn-success"><i class='fa fa-edit'></i></a>
                         <a href="{{route('product.destroy',$data->id)}}" class="btn btn-warning btndelete"><i class='fa fa-trash'></i></a>
                     </td>
          </tr>
          @endforeach
         
        </tbody>
      </table>

         <form action="" method='POST' id="form-delete">
            @csrf @method('DELETE')
         </form>

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

@section('js')
    <script type="text/javascript">
        $('.btndelete').click(function(ev){
            ev.preventDefault();
            var _href =$(this).attr('href');
            $('form#form-delete').attr('action',_href);

            if(confirm('Bạn có chắc không ? ')){
                $('form#form-delete').submit();
            }

        })
    </script>
@stop()