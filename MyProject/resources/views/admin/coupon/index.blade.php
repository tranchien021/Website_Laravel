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
      Danh sách mã giảm giá
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
            <th data-breakpoints="xs">Tên mã giảm giá</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày kết thúc</th>
            <th>Mã giảm giá </th>
            <th>Số lượng </th>
            <th>Điều kiện </th>
            <th data-breakpoints="xs">Số lượng giảm </th>
            <th>Tình trạng</th>
            <th>Ngày hết hạn</th>
            <th>Gửi mã </th>
            <th data-breakpoints="xs">Function</th>
          </tr>
        </thead>
        <tbody>
          @foreach($coupon as $coupon)
          <tr data-expanded="true">
            <td>{{$coupon->coupon_name}}</td>
            <td>{{$coupon->coupon_date_start}}</td>
            <td>{{$coupon->coupon_date_end}}</td>
            <td>{{$coupon->coupon_code}}</td>
            <td>{{$coupon->coupon_time}}</td>

            <td>
              @if($coupon->coupon_condition == 1)
              <span class="badge badge-success">Giảm theo % </span>

              @else
              <span class="badge badge-primary">Giảm theo tiền </span>

              @endif
            </td>
            <td>
              @if($coupon->coupon_condition == 1)
              <span class="badge badge-success"> Giảm {{$coupon->coupon_number}} % </span>

              @else
              <span class="badge badge-primary">Giảm {{$coupon->coupon_number}} đ </span>

              @endif
            </td>
            <td>
              @if($coupon->coupon_status == 1)
              <span class="badge badge-primary"> Đang kích hoạt </span>

              @else
              <span class="badge badge-warning"> Đã khoá </span>

              @endif
            </td>
            <td>
              @if($coupon->coupon_date_end >= $now)
              <span class="badge badge-primary"> Còn hạn </span>
              @else
              <span class="badge badge-danger"> Hết hạn </span>
              @endif
            </td>
            <td>
              <button class="btn btn-danger"><a style="color:#ffff" href="{{url('/send_coupon_vip',[
               
                'coupon_condition'=> $coupon->coupon_condition,
                'coupon_time'=> $coupon->coupon_time,
                'coupon_number'=> $coupon->coupon_number,
                'coupon_code'=> $coupon->coupon_code

                ])}}">Khách vip</a> </button>
              <button class="btn btn-primary"><a style="color:#ffff" href="{{url('/send_coupon',[
                
                'coupon_condition'=> $coupon->coupon_condition,
                'coupon_time'=> $coupon->coupon_time,
                'coupon_number'=> $coupon->coupon_number,
                'coupon_code'=> $coupon->coupon_code
                
                ])}}"> Khách thường</a> </button>
            </td>



            <td>
              <a href="" class="btn btn-success"><i class='fa fa-edit'></i></a>
              <a href="{{url('/delete_coupon/'.$coupon->coupon_id)}}" class="btn btn-warning"><i class='fa fa-trash'></i></a>
            </td>
          </tr>
          @endforeach

        </tbody>
      </table>



    </div>
  </div>
</div>



@stop