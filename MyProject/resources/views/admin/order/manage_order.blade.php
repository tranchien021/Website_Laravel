@extends('admin.main')
@section('content')
	
<button class="btn btn-success" style="margin:10px;"><a style="color:#ffff;" href="{{url('admin/insert_coupon')}}">Thêm mã </a> </button>
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
    Liệt kê đơn hàng 
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
            <td>Thứ tự</td>
            <th data-breakpoints="xs">Mã đơn hàng </th>
            <th>Ngày tháng đặt hàng </th>
            <th>Tình trạng đơn hàng  </th>
          
            <th data-breakpoints="xs">Function</th>
          </tr>
        </thead>
        <tbody>
        <?php
            $stt=0;
          ?>
        @foreach($order as $order)
        <?php 
          $stt++;
        ?>
          <tr data-expanded="true">
                    <td>{{$stt}}</td>
                    <td>{{$order->order_code}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>@if($order->order_status==1)
                      Đơn hàng mới 
                      @else
                       Đã xử lý 
                      @endif
                    </td>
             
                     <td>
                         <a href="{{url('/admin/view_order/'.$order->order_code)}}" class="btn btn-success"><i class='fa fa-eye'></i></a>
                         <a href="" class="btn btn-warning"><i class='fa fa-trash'></i></a>
                     </td>
          </tr>
          @endforeach
         
        </tbody>
      </table>
      
    

    </div>
  </div>
</div>

   



@stop
