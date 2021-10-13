@extends('about')
<!-- noi dung ben trong  -->
@section('main')

<div class="col-sm-9 padding-right">
	<section id="cart_items">
		<div class="">
			<div class="shopper-informations">


				<div class="col-sm-12 clearfix">
					<div class="bill-to">

						<div class="col-sm-7 padding-left">
							<p>Điền thông tin gửi hàng</p>
							<div style="width:100%;">
								<form method="POST">
									@csrf
									<input style="margin:5px 0px" type="text" name="shipping_email" class="shipping_email form-control" placeholder="Email">
									<input style="margin:5px 0px" type="text" name="shipping_name" class="shipping_name form-control" placeholder="Tên">
									<input style="margin:5px 0px" type="text" name="shipping_address" class="shipping_address form-control" placeholder="Địa chỉ">
									<input style="margin:5px 0px" type="text" name="shipping_phone" class="shipping_phone form-control" placeholder="Điện Thoại">
									<textarea style="margin:5px 0px" name="shipping_notes" class="shipping_notes form-control" placeholder="Những lưu ý khi gửi" rows="5"></textarea>


									@if(Session::get('money'))

									<input type="hidden" name="order_money" class="order_money" value="{{Session::get('money')}}">
									@else
									<input type="hidden" name="order_money" class="order_money" value="30000">
									@endif



									@if(Session::get('coupon'))
									@foreach(Session::get('coupon') as $cou)
									<input type="hidden" name="order_coupon" class="order_coupon" value="{{$cou['coupon_code']}}">
									@endforeach
									@else
									<input type="hidden" name="order_coupon" class="order_coupon" value="no">
									@endif


									<div class="">
										<div class="form-group ">
											<label for="comment" class="control-label col-lg-12">Chọn hình thức thanh toán </label>

											<div class="col-lg-12">
												<select name='select_payment' id="" class="form-control select_payment">

													<option value="0">Chuyển khoản</option>
													<option value="1">Tiền mặt</option>
												

												</select>
											</div>
										</div>
									</div>
									<!-- <button type="submit" name="send_order" class="btn btn-primary btn-sm"> </button> -->
									<input type="button" name="send_order" class="btn btn-primary btn-sm send_order" value="Xác nhận đơn hàng">
								</form>
							</div>
						</div>
						<div class="col-sm-5 padding-right">
							<p>Điền thông tin vận chuyển </p>
							<form class="cmxform form-horizontal " id="commentForm" action="" novalidate="novalidate">
								@csrf

								<div class="form-group ">
									<label for="comment" class="control-label col-lg-5">Chọn thành phố </label>
									<div class="col-lg-12">
										<select name='city' id="city" class="form-control choose city">
											@foreach($city as $city)
											<option class='form-control' value="{{$city->matp}}">{{$city->name_city}}</option>
											@endforeach
										</select>
									</div>
								</div>

								<div class="form-group ">
									<label for="comment" class="control-label col-lg-6">Chọn quận huyện</label>
									<div class="col-lg-12">
										<select name='province' id="province" class="form-control choose province">
											<option value="">----- Chọn quận huyện ------</option>

										</select>
									</div>
								</div>

								<div class="form-group ">
									<label for="comment" class="control-label col-lg-5">Chọn phường xã </label>
									<div class="col-lg-12">
										<select name='wards' id="wards" class="form-control wards">
											<option value="">----- Chọn xã phường ------</option>
										</select>
									</div>
								</div>


								<div class="form-group">
									<div class="col-lg-offset-3 col-lg-6">
										<input type="button" name="calculate_order" class="btn btn-primary  calculate_delivery" value="Tính phí vận chuyển">

									</div>
								</div>
							</form>
						</div>

					</div>
				</div>

				<div class="col-sm-12 clearfix " style="margin-top:10px">

					@if(session()->has('message'))
					<div class="alert alert-success">
						{{session()->get('message')}}
					</div>
					@elseif(session()->has('error'))
					<div class="alert alert-warning">
						{{session()->get('error')}}
					</div>
					@endif
					<div class="table-responsive cart_info">
						<form action="{{url('/update_cart_ajax')}}" method="POST">
							@csrf
							<table class="table table-condensed">
								<thead>
									<tr class="cart_menu">
										<td class="image">Hình Ảnh </td>
										<td class="description">Tên sản phẩm </td>
										<td class="price">Giá sản phẩm</td>
										<td class="quantity">Số lượng </td>
										<td class="total">Thành tiền </td>
										<td></td>
									</tr>
								</thead>
								<tbody>
									@if(Session::get('cart')==true)
									<?php
									$total = 0;
									?>
									@foreach(Session::get('cart') as $cart)
									<?php
									$subtotal = $cart['product_price'] * $cart['product_qty'];
									$total += $subtotal;
									?>
									<tr>
										<td class="cart_product">
											<a href=""><img width="70px" src="{{url('uploads')}}/home/{{$cart['product_img']}}" alt=""></a>
										</td>
										<td class="cart_description">
											<h4><a href="">{{$cart['product_name']}}</a></h4>
											<p>Web ID: {{$cart['product_id']}}</p>
										</td>
										<td class="cart_price">
											<p>{{number_format($cart['product_price'],0,',','.')}}đ</p>
										</td>
										<td class="cart_quantity">
											<div class="cart_quantity_button">


												<input class="cart_quantity" type="number" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}" min=1 autocomplete="off" size="2">



											</div>
										</td>
										<td class="cart_total">
											<p class="cart_total_price">
												{{number_format($subtotal,0,',','.')}} đ
											</p>
										</td>
										<td class="cart_delete">
											<a class="cart_quantity_delete" href="{{url('/delete_cart_ajax/'.$cart['session_id'])}}"><i class="fa fa-times"></i></a>
										</td>
									</tr>
									@endforeach
									<tr>
										<td><button type="submit" name="update_qty" class="btn btn-primary btn-default btn-sm">Cập nhật giỏ hàng </button></td>
										<td><a class="btn btn-default btn-primary check_out" href="{{url('/delete_all_cart')}}"> Xoá tất cả </a></td>
										<td>
											@if(Session::get('coupon'))
											<a class="btn btn-primary btn-default" href="{{url('/delete_coupon')}}">Xoá mã giảm giá </a>
											@endif
										</td>
										<td>
											<li>Tổng giá <span>{{number_format($total,0,',','.')}} đ</span></li>
											@if(Session::get('coupon'))
											<li>

												@foreach(Session::get('coupon') as $key => $cou)
												@if($cou['coupon_condition']==1)
												Mã giảm : {{$cou['coupon_number']}} %
												<p>
													@php
													$total_coupon=($total * $cou['coupon_number'])/100;
													echo "
												<p>
											<li> Tổng giảm : " . number_format($total_coupon,0,',','.') . "đ </li>
											</p> ";

											@endphp
											</p>
											<p>
												<?php
												$total_after_coupon = $total - $total_coupon;
												?>

											</p>
											@elseif($cou['coupon_condition']== 0 )

											Mã giảm : {{number_format($cou['coupon_number'],0,',','.') }} đ
											<p>
												@php
												$total_coupon= $total - $cou['coupon_number'];


												@endphp
											</p>
											<?php
											$total_after_coupon = $total_coupon;
											?>

											@endif
											@endforeach



											</li>
											@endif

											@if(Session::get('money'))
											<li>
												<a class="cart_quantity_delete" href="{{url('delete_moneyship')}}"><i class="fa fa-times"></i></a>
												Phí vận chuyển : <span>{{number_format(Session::get('money'),0,',','.')}} đ </span>
												<?php $total_after_free = $total + Session::get('money') ?>
											</li>
											@endif
											<li>Tổng còn :
												@php
												if(Session::get('money') && !Session::get('coupon')){
												$total_after=$total_after_free;
												echo number_format($total_after,0,',','.') .'đ';
												}elseif(!Session::get('money') && Session::get('coupon')){
												$total_after=$total_after_coupon;
												echo number_format($total_after,0,',','.') .'đ';

												}elseif(Session::get('money') && Session::get('coupon')){
												$total_after=$total_after_coupon;
												$total_after=$total_after+ Session::get('money');
												echo number_format($total_after,0,',','.') .'đ';

												}elseif(!Session::get('money') && !Session::get('coupon')){
												$total_after=$total;
												echo number_format($total_after,0,',','.') .'đ';
												}
												@endphp
											</li>
											<p></p>
											
											<div class="col-sm-12 ">
												@php
													$money_usd = $total_after/22745;
												@endphp
												<div id="paypal-button"></div>
												<input id="money_usd" type="hidden" value="{{round($money_usd,2)}}">
											</div>



										</td>
										<td>
											<!-- <a class="btn btn-default check_out" href="">Thanh Toán </a> -->

										</td>


									</tr>
									@else
									<tr>
										<td colspan="5" style="text-align:center">
											@php
											echo "Không có sản phẩm nào trong giỏ hàng";
											@endphp
										</td>
									</tr>

									@endif
								</tbody>

							</table>
						</form>



						<tr>
							@if(Session::get('cart'))
							<td>

								<form action="{{url('/check_coupon')}}" method="POST">
									@csrf
									<input style="width:300px;" type="text" class="form-control" name="coupon" placeholder="Mã giảm giá">
									<input type="submit" class="btn btn-primary btn-default check_coupon" name="check_coupon" value="Mã giảm giá" placeholder="Mã giảm giá">

								</form>


							</td>
							@endif
						</tr>
					</div>
				</div>


			</div>



		</div>
	</section>
	<!--/#cart_items-->
</div>



@stop()