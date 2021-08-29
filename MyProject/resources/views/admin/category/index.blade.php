@extends('admin.main')
@section('content')

<button style="margin:5px;" class="btn btn-success"><a style="color:#fff;" href="{{route('category.create')}}">Thêm sản phẩm</a> </button>
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
                     <th>Name </th>
                     <th>Category</th>
                     <th>Miêu tả</th>
                     <th>Từ Khoá</th>
                     <th>Tổng sản phẩm</th>
                     
                     <th>Function</th>
                     
          </tr>
        </thead>
        <tbody>
        @foreach($data as $data)
          <tr data-expanded="true">
                    <td>{{$data->id}}</td>
          
                     <td>{{$data->Tên}}</td>
                     <td>{{$data->theloai}}</td>
                     <td>{{$data->meta_desc}}</td>
                     <td>{{$data->meta_keywords}}</td>
                     <td>{{$data->products ? $data->products->count() : 0 }}</td>
                     
                     <td>
                         <a href="{{route('category.edit',$data->id)}}" class="btn btn-success"><i class='fa fa-edit'></i></a>
                         <a href="{{route('category.destroy',$data->id)}}" class="btn btn-warning btndelete"><i class='fa fa-trash'></i></a>
                     </td>
          </tr>
          @endforeach
         
        </tbody>
      </table>

         <form action="" method='POST' id="form-delete">
            @csrf @method('DELETE')
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