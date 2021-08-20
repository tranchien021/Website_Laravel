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
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<!-- <div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div> -->
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Tổng giá <span>{{Cart::total()}}</span></li>
							<li>Thuế <span>{{Cart::tax()}}</span></li>
							<li>Phí Vận Chuyển <span>Free</span></li>
							<li>Tổng tất cả <span>{{Cart::total()}}</span></li>
						</ul>
							<!-- <a class="btn btn-default update" href="">Update</a> -->
							<?php 
								$customer_id=Session::get('customer_id');
									if($customer_id!=NULL){
								?>
									<a class="btn btn-default check_out" href="{{url('/checkout')}}">Thanh Toán </a>
								
								<?php
										
									}else{
								?>
									<a class="btn btn-default check_out" href="{{url('/login_checkout')}}">Thanh Toán </a>
								<?php 
									}
								?>
									
							
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_a
		
@stop()