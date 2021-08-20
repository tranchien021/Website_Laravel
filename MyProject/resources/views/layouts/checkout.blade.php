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

		
			<div class="register-req">
				<p>Đăng Nhập hoặc Đăng Ký để mua hàng và kiểm tra các hoá đơn </p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Điền thông tin gửi hàng</p>
							<div class="form-one">
								<form action="{{url('/save_checkout_customer')}}" method="POST">
									@csrf
									<input type="text" name="shipping_email" placeholder="Email">
									<input type="text" name="shipping_name" placeholder="Tên">
									<input type="text" name="shipping_address" placeholder="Địa chỉ">
									<input type="text" name="shipping_phone" placeholder="Điện Thoại">
									<textarea name="shipping_notes"  placeholder="Những lưu ý khi gửi" rows="16"></textarea>
									<button type="submit" name="send_order" class="btn btn-primary"> Thanh Toán </button>
								</form>
							</div>
							
						</div>
					</div>
							
				</div>
			</div>
			<div class="review-payment">
				<h2>Xem lại và thanh toán </h2>
			</div>

			
			<div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div>
		</div>
	</section> <!--/#cart_items-->

			

@stop()