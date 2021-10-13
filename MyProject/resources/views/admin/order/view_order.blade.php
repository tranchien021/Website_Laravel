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
            <th data-breakpoints="xs">Email </th>
          </tr>
        </thead>
        <tbody>
      
          <tr data-expanded="true">
                    <td>{{$customer->customer_name}}</td>
                    <td>{{$customer->customer_phone}}</td>
                    <td>{{$customer->customer_email}}</td>
                    
          </tr>
      </table>
      

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
            <th data-breakpoints="xs">Email  </th>
            <th data-breakpoints="xs">Ghi chứ </th>
            <th data-breakpoints="xs">Hình thức thanh toán  </th>
          </tr>
        </thead>
        <tbody>
      
          <tr data-expanded="true">
                     <td>{{$shipping->shipping_name}}</td>
                     <td>{{$shipping->shipping_address}}</td>
                     <td>{{$shipping->shipping_phone}}</td>
                     <td>{{$shipping->shipping_email}}</td>
                     <td>{{$shipping->shipping_notes}}</td>
                     <td>
                        @if($shipping->shipping_method==0)
                          Chuyển khoản 
                        @elseif($shipping->shipping_method==1)
                          Tiền mặt
                        @else
                          PayPal
                        @endif


                      </td>
                    
                    
          </tr>
        
         
        </tbody>
      </table>
      
     
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
        <thead class="">
          <tr>
            <th data-breakpoints="xs">Tên sản phẩm</th>
            <th data-breakpoints="xs">Số lượng trong kho </th>
            <th data-breakpoints="xs">Mã giảm giá </th>
            <th data-breakpoints="xs">Phí vận chuyển </th>
            <th data-breakpoints="xs">Số lượng  </th>
            <th data-breakpoints="xs sm md" data-title="DOB">Giá sản phẩm </th>
            <th data-breakpoints="xs">Tổng tiền</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $stt=0;
          $total=0;
        ?>
        @foreach($order_detail_product as $details)
        <?php
          $stt++;
          $subtotal=$details->product_price * $details->product_sale_quantity;
          $total+=$subtotal;
        ?>
          <tr data-expanded="true" class="color_qty_{{$details->product_id}}">
                     <td>{{$details->product_name}}</td>
                      <td>{{$details->product->quantity}}</td>
                     <td>@if($details->product_coupon!="no")
                       {{$details->product_coupon}}
                       @else
                        Không có mã 
                       @endif

                     </td>
                     <td>{{number_format($details->product_moneyship,0,',','.')}}</td>
                     
                     <td>
                       <input {{$order_status==2 ? 'disabled' : ''}} class="order_qty_{{$details->product_id}}" name="product_sale_quantity" type="number" value="{{$details->product_sale_quantity}}" min="1" > 
                       <input type="hidden" name="order_qty_storage"  class="order_qty_storage_{{$details->product_id}}" value="{{$details->product->quantity}}">
                       <input type="hidden" name="order_code"  class="order_code" value="{{$details->order_code}}">
                       <input type="hidden" name="order_product_id"  class="order_product_id" value="{{$details->product_id}}">
                       @if($order_status!=2)
                       <button data-product_id="{{$details->product_id}}" class="btn btn-default update_quantity_order "name="update_quantity_order"> Cập nhật </button>
                      @endif
                      </td>
                     <td>{{number_format($details->product_price,0,',','.')}} đ </td>
                     <td>{{number_format($subtotal,0,',','.')}} đ </td>
                   
                    
          </tr>
        @endforeach
        <tr>
          <td colspan="5">
          <?php
            $total_coupon=0;
          ?>
          @if($coupon_condition==1)
              <?php
                $total_after_coupon=($total*$coupon_number)/100;
                echo "Tổng giảm :  ". number_format($total_after_coupon,0,',','.') . " đ </br>";
                $total_coupon=$total- $total_after_coupon+$details->product_moneyship;
              ?>
          @else
             <?php
                echo "Tổng giảm :  ". number_format($coupon_number,0,',','.') . " đ </br>";
                $total_coupon=$total - $coupon_number+$details->product_moneyship;
              ?>
          @endif
          Phí vận chuyển :  {{number_format($details->product_moneyship,0,',','.')}} đ <br>
          Tổng tiền :  {{number_format($total_coupon,0,',','.')}} đ</td>
        </tr>
        <tr >
          <td colspan="6">
            @foreach($order as $order)
            @if($order->order_status==1)
            <form>
              @csrf
            <select class="form-control order_details">
             <option value="">------- Chọn hình thức đơn hàng -----</option>
              <option id="{{$order->order_id}}" selected value="1">Chưa xử lý đơn hàng</option>
              <option id="{{$order->order_id}}" value="2">Đã xử lý đơn hàng</option>
              
            </select>
            </form>
            @elseif($order->order_status==2)
            <form>
            @csrf
            <select  class="form-control order_details">
              <option value="">------- Chọn hình thức đơn hàng -----</option>
              <option id="{{$order->order_id}}" value="1">Chưa xử lý đơn hàng</option>
              <option id="{{$order->order_id}}" selected value="2">Đã xử lý đơn hàng</option>
             
            </select>
            </form>
            @else
            <form>
            @csrf
            <select  class="form-control order_details">
              <option value="">------- Chọn hình thức đơn hàng -----</option>
              <option id="{{$order->order_id}}" value="1">Chưa xử lý đơn hàng</option>
              <option id="{{$order->order_id}}" selected value="2">Đã xử lý đơn hàng</option>
             
            </select>
            </form>


            @endif
            @endforeach
          </td>
        </tr>
  
         
        </tbody>
      </table>
      <a class="btn btn-primary" href="{{url('/admin/print_order/'.$details->order_code)}}">In hoá đơn </a>
     
    </div>
  </div>
</div>



@stop
