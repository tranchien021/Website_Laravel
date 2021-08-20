@extends('admin.main')
@section('content')
	

    <button class="btn btn-success" style="margin:10px;"><a style="color:#ffff;" href="{{route('account.create')}}">Thêm sản phẩm</a> </button>
    <p></p>
		<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
    Quản lí đơn hàng
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
            <th data-breakpoints="xs">Tên người đặt</th>
            <th>Tổng giá tiền</th>
            <th data-breakpoints="xs sm md" data-title="DOB">Tình Trạng</th>
            <th data-breakpoints="xs">Function</th>
          </tr>
        </thead>
        <tbody>
        @foreach($data as $data)
          <tr data-expanded="true">
                     <td>{{$data->customer_name}}</td>
                     <td>{{$data->order_total}}</td>
                     <td>{{$data->order_status}}</td>
                     <td>
                         <a href="" class="btn btn-success"><i class='fa fa-edit'></i></a>
                         <a href="" class="btn btn-warning btndelete"><i class='fa fa-trash'></i></a>
                     </td>
          </tr>
          @endforeach
         
        </tbody>
      </table>
      
      <form action="" method='POST' id="form-delete">
            @csrf @method('DELETE')
         </form>

    </div>
  </div>
</div>



@stop
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