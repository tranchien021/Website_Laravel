@extends('about1')
<!-- noi dung ben trong  -->
@section('main1')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{url('/')}}">Trang Chủ</a></li>
				  <li class="active">Giỏ hàng</li>
				</ol>
			</div>
			@if(session()->has('message'))
				<div class="alert alert-success">
					{!!session()->get('message')!!}
				</div>
			@elseif(session()->has('error'))
				<div class="alert alert-warning">
					{!!session()->get('error')!!}
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
							<td>Số lượng trong kho </td>
							<td class="quantity">Số lượng </td>
							<td class="total">Thành tiền </td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@if(Session::get('cart')==true)
						<?php
							$total=0;
						?>
					@foreach(Session::get('cart') as $cart)
					<?php
						$subtotal=$cart['product_price']*$cart['product_qty'];
						$total+=$subtotal;
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
								<p>{{number_format($cart['product_price'],0,',','.')}} đ</p>
							</td>
							<td>
								<p>{{$cart['product_quantity']}}</p>
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
							    @if(Session::get('customer_id'))
								<a class="btn btn-primary btn-default" href="{{url('/checkout')}}">Đặt hàng  </a>
								@else
								<a class="btn btn-primary btn-default" href="{{url('/login_checkout')}}">Đặt hàng  </a>
								
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
														echo "<p><li> Tổng giảm : " . number_format($total_coupon,0,',','.') . "đ </li></p> ";
														
													@endphp 
												</p>
												<p><li>Tổng sau khi giảm : {{number_format($total-$total_coupon,0,',','.')}} đ </li></p>
											@elseif($cou['coupon_condition']== 0 )
								
												Mã giảm : {{number_format($cou['coupon_number'],0,',','.') }} đ
												<p>
													@php
														$total_coupon= $total - $cou['coupon_number'];
														
															
													@endphp 
												</p>
												<p><li>{{number_format($total_coupon,0,',','.')}} đ </li></p>
											@endif
										@endforeach
									
									
								
								</li>
								@endif
								<!-- <li>Thuế <span></span></li>
								<li>Phí Vận Chuyển <span>Miễn phí</span></li> -->
								
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
							<input style="width:500px;" type="text" class="form-control" name="coupon" placeholder="Mã giảm giá">
							<input type="submit"  class="btn btn-primary btn-default check_coupon" name="check_coupon" value="Mã giảm giá" placeholder="Mã giảm giá">
							
						</form>
					
					</td>
				@endif	
				</tr>
			</div>
		</div>
	</section> <!--/#cart_items-->

	
		
@stop()