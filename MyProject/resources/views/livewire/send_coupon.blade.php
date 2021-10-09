<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gửi mã khuyến mãi cho khách thường  </title>
</head>
<body>
    <h1>Mail gửi cho khách thường <a target="_blank" href="">Minh Chiến </a></h1>
    <h2>
        @if($coupon['coupon_condition']==1)
            Giảm {{$coupon['coupon_number']}} %
        @else
            Giảm {{number_format($coupon['coupon_number'],0,',','.')}} VND 
        @endif
        cho tổng đơn đặt mua 
    </h2>
    <div class="container">
        <p class="code"> Sử dụng code sau : <span class="promo">{{$coupon['coupon_code']}}</span> với chỉ {{$coupon['coupon_time']}} voucher sử dụng nhanh ko hết</p>
        <p class="expire">Bắt đầu từ {{$coupon['start_date']}} đến ngày {{$coupon['end_date']}} </p>
    </div>
   
</body>
</html>