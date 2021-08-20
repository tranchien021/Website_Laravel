@extends('about1')
<!-- noi dung ben trong  -->
@section('main1')

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{url('/')}}">Trang Chủ</a></li>
				  <li class="active">Thanh Toán Giỏ Hàng</li>
				</ol>
			</div><!--/breadcrums-->

		
		
			
			<div class="review-payment">
				<h2>Xem lại và thanh toán </h2>
			</div>
            <div class="table-responsive cart_info">
				<?php
					$content=Cart::content();
				
				?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình Ảnh </td>
							<td class="description">Mô tả </td>
							<td class="price">Giá</td>
							<td class="quantity">Số Lượng </td>
							<td class="total">Tổng</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($content as $content)
						<tr>
							<td class="cart_product">
								<a href=""><img src="images/cart/one.png" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$content->name}}</a></h4>
								<p>Web ID:{{$content->id}}</p>
							</td>
							<td class="cart_price">
								<p>{{number_format($content->price)}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="{{url('/update_cart')}}" method="POST">
										{{ csrf_field() }}
										<input class="cart_quantity_input" type="text" name="cart_quantity" value="{{$content->qty}}" autocomplete="off" size="2">
										<input type="hidden" value="{{$content->rowId}}" name="rowId_cart" class="form-control">
										
										<button type="submit" name="update_qty" class="btn btn-default btn-sm">Cập Nhật</button>
									</form>	
									
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">
									<?php
										$subtotal=$content->price * $content->qty;
										echo number_format($subtotal);
									?>
								</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{url('/delete_cart/'.$content->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach

						
					</tbody>
				</table>
			</div>

			
			<div class="payment-options">
                <form action="{{url('/order_place')}}" method="POST">
                @csrf
                        <span>
                            <label><input name="payment_option" value='1' type="checkbox">Trả bằng thể ATM </label>
                        </span>
                        <span>
                            <label><input name="payment_option" value='2' type="checkbox">Nhận tiền mặt</label>
                        </span>
                        <span>
                        <label><input name="payment_option" value='3' type="checkbox">Thẻ ghi nợ</label>
                        </span>
                        <span>
                        <label><input name="payment_option" value='4' type="checkbox">Paypal</label>
                        </span>

						<button type="submit" class="btn btn-primary" >Đặt Hàng</button>
                </form>
					
				</div>
		</div>
	</section> <!--/#cart_items-->

			

@stop()