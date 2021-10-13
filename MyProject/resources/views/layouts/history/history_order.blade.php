@extends('about')
<!-- noi dung ben trong  -->
@section('main')
<div class="col-sm-9 padding-right">


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
                Lịch sử đơn hàng
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
                            <th>Tình trạng đơn hàng </th>

                            <th data-breakpoints="xs">Chi tiết </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stt = 0;
                        ?>
                        @foreach($get_order as $order)
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
                                <a href="{{url('/view_detail_history/'.$order->order_code)}}" class="btn btn-success"><i class='fa fa-eye'></i></a>
                                
                            </td>
                        </tr>
                        @endforeach


                    </tbody>

                </table>




            </div>

        </div>
        <footer class="panel-footer">
            <div class="col-sm-5 text-center">

            </div>
            <div class="col-sm-7 text-right text-center-xs">
                <ul class="pagination pagination-sm m-t-none m-b-none ">
                    {!! $get_order->links() !!}
                </ul>
            </div>
        </footer>
    </div>





</div>
@stop()