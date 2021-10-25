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
                                <span class="text text-success">Đơn hàng mới </span>
                                @elseif($order->order_status==2)
                                <span class="text text-warning">Đã xử lý </span>
                                @else
                                <span class="text text-danger">Đơn hàng đã bị huỷ </span>
                                @endif
                            </td>

                            <td>

                                <a href="{{url('/view_detail_history/'.$order->order_code)}}" class="btn btn-success"><i class='fa fa-eye'></i></a>

                                @if($order->order_status!=3)
                                <a data-toggle="modal" data-target="#delete_order" class="btn btn-danger"><i class='fa fa-times'></i></a>
                                @endif
                                <div class="modal fade" id="delete_order" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="">
                                            @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Lý do huỷ đơn hàng này </h5>

                                                </div>
                                                <div class="modal-body">
                                                    <p><textarea class="reason" required placeholder="Lý do huỷ đơn đơn hàng (Bắt buộc)" rows="10"></textarea></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng </button>
                                                    <button id="{{$order->order_code}}" onclick="Destroy_order(this.id)" type="button" class="btn btn-danger">Huỷ đơn hàng </button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>


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