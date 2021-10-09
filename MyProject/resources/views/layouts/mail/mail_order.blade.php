<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <title> Xác nhận đơn hàng  </title>
</head>
<style>
    .card {
    margin-bottom: 1.5rem
}

.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid #c8ced3;
    border-radius: .25rem
}

.card-header:first-child {
    border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0
}

.card-header {
    padding: .75rem 1.25rem;
    margin-bottom: 0;
    background-color: #f0f3f5;
    border-bottom: 1px solid #c8ced3
}
</style>

<body>

<div class="container-fluid">
    <div id="ui-view" data-select2-id="ui-view">
        <div>
            <div class="card">
                <div class="card-header">Xác nhận đơn hàng từ
                    <strong>{{$shipping_array['shipping_name']}}</strong>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-4">
                            <h2 class="mb-3">Từ :</h2>
                            <div>
                                <strong>15ShopFood</strong>
                            </div>
                            <div>Ngã ba đồn 8, Quốc lộ 14, Đắk Song, Đăk Nông, Việt Nam</div>
                            <div>University of Information Technology VNU-HCM, khu phố 6, Linh Trung, Thủ Đức, Thành phố Hồ Chí Minh</div>
                            <div>Email: tranchien021@gmail.com</div>
                            <div>Phone: +84 0349-521-656</div>
                        </div>
                        <div class="col-sm-4">
                            <h2 class="mb-3">Đến :</h2>
                            <div>
                                <strong>
                                    @if($shipping_array['shipping_name']=='')
                                        Không có
                                    @else
                                        {{$shipping_array['shipping_name']}}
                                    @endif
                                </strong>
                            </div>
                           
                            <div>
                                    @if($shipping_array['shipping_address']=='')
                                        Không có
                                    @else
                                        {{$shipping_array['shipping_address']}}
                                    @endif  
                            </div>
                            <div>
                                    @if($shipping_array['shipping_email']=='')
                                        Không có
                                    @else
                                        {{$shipping_array['shipping_email']}}
                                    @endif
                            </div>
                            <div>Điện thoại : 
                                    @if($shipping_array['shipping_phone']=='')
                                        Không có
                                    @else
                                        {{$shipping_array['shipping_phone']}}
                                    @endif
                            </div>
                           
                        </div>
                        <div class="col-sm-4">
                            <h2 class="mb-3">Chi tiết :</h2>
                            <div>Đơn hàng 
                                <strong> đồ ăn </strong>
                            </div>
                            <div>Mã khuyến mãi : {{$code['coupon_code']}}</div>
                            <div>
                                <strong>Mã đơn hàng: {{$code['order_code']}} </strong>
                            </div>
                            <div>Hình thức thanh toán  : 
                                    @if($shipping_array['shipping_method']==0)
                                        Chuyển khoản ATM
                                    @elseif($shipping_array['shipping_method']==1)
                                        Tiền mặt
                                    @else
                                        Palpay
                                    @endif
                            </div>
                        </div>
                    </div>
                    <h1>Đơn hàng </h1>
                    <div class="table-responsive-sm">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Số thứ tự</th>
                                    <th> Tên sản phẩm </th>
                                    <th class="center">Số lượng</th>
                                    <th class="right">Giá sản phẩm</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $stt=0;
                                    $subtotal=0;
                                    $total=0;
                                @endphp
                                @foreach($cart_array as $cart)
                                    @php
                                        $stt++;
                                        $subtotal=$cart['product_quantity'] * $cart['product_price'];
                                        $total+=$subtotal;
                                    @endphp
                                    <tr>
                                        <td>{{$stt}}</td>
                                        <td>{{$cart['product_name']}}</td>
                                        <td>{{number_format($cart['product_price'],0,',','.')}} VNĐ</td>
                                        <td>{{$cart['product_quantity']}}</td>
                                       
                                    </tr>
                                @endforeach
                               
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        
                        <div class="col-lg-4 col-sm-5 ml-auto">
                            <table class="table table-clear">
                                <tbody>
                                    <tr>
                                        <td class="left">
                                            <strong>Tổng tiền món ăn </strong>
                                        </td>
                                        <td class="right">{{number_format($total,0,',','.')}}</td>
                                    </tr>
                                    <tr>
                                        <td class="left">
                                            <strong>Phí vận chuyển </strong>
                                        </td>
                                        <td class="right">{{$shipping_array['money']}}</td>
                                    </tr>
                                   
                                    <tr>
                                        <td class="left">
                                            <strong>Thành tiền</strong>
                                        </td>
                                        <td class="right">
                                            <strong>{{number_format($total+$shipping_array['money'],0,',','.')}}</strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                          
                        </div>
                        <div class="col-lg-4 col-sm-5">Đây là email xác nhận tự động, vui lòng không trả lời email này </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>