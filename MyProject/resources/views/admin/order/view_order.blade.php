@extends('admin.main')
@section('content')
	

    <p></p>
		<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
   Thông tin khách hàng
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
            <th data-breakpoints="xs sm md" data-title="DOB">Số điện thoại</th>
            
          </tr>
        </thead>
        <tbody>
      
          <tr data-expanded="true">
                    <td>{{$data->customer_name}}</td>
                    <td>{{$data->customer_phone}}</td>
                    
          </tr>
      </table>
      
      <form action="" method='POST' id="form-delete">
            @csrf @method('DELETE')
         </form>

    </div>
  </div>
</div>

<p></p>
		<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
   Thông tin vận chuyển
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
            <th data-breakpoints="xs">Tên người vận chuyển </th>
            <th data-breakpoints="xs sm md" data-title="DOB">Địa chỉ</th>
            <th data-breakpoints="xs sm md" data-title="DOB">Số điện thoại</th>
            
          </tr>
        </thead>
        <tbody>
      
          <tr data-expanded="true">
                     <td>{{$data->shipping_name}}</td>
                     <td>{{$data->shipping_address}}</td>
                     <td>{{$data->shipping_phone}}</td>
                    
          </tr>
        
         
        </tbody>
      </table>
      
      <form action="" method='POST' id="form-delete">
            @csrf @method('DELETE')
         </form>

    </div>
  </div>
</div>
<p></p>
		<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
    Liệt kê chi tiết đơn hàng
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
            <th data-breakpoints="xs">Tên sản phẩm</th>
            <th>Số lượng</th>
            <th data-breakpoints="xs sm md" data-title="DOB">Giá</th>
            <th data-breakpoints="xs">Tổng tiền</th>
          </tr>
        </thead>
        <tbody>
      
          <tr data-expanded="true">
                     <td>{{$data->product_name}}</td>
                     <td>{{$data->product_sale_quantity}}</td>
                     <td>{{$data->product_price}}</td>
                     <td>{{$data->product_price * $data->product_sale_quantity}}</td>
                    
          </tr>
  
         
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