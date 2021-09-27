@extends('about')
<!-- noi dung ben trong  -->
@section('main')
<div class="col-sm-9 padding-right">
	<div class="features_items">
		<!--features_items-->
		<h2 class="title text-center">Tất cả sản phẩm</h2>
		@foreach($products as $product)
		<div class="col-sm-4">
			<div class="product-image-wrapper">

				<div class="single-products">
					<div class="productinfo text-center">
						<form>
							@csrf
							<input type="hidden" value="{{$product->id}}" class="cart_product_id_{{$product->id}}">
							<input type="hidden" value="{{$product->name}}" class="cart_product_name_{{$product->id}}">
							<input type="hidden" value="{{$product->img}}" class="cart_product_img_{{$product->id}}">
							<input type="hidden" value="{{$product->price}}" class="cart_product_price_{{$product->id}}">
							<input type="hidden" value="1" class="cart_product_qty_{{$product->id}}">
							<input type="hidden" value="{{$product->quantity}}" class="cart_product_quantity_{{$product->id}}">
							<a href="{{url('/product_detail/'.$product->id)}}">
								<img src="{{url('uploads/')}}/home/{{$product->img}}" alt="" />
								<h2>{{number_format($product->price)}}</h2>
								<p>{{$product->name}}</p>
							</a>
							<style>
								.xemnhanh {
									background: #F5F5ED;
									border: 0 none;
									border-radius: 0;
									color: 696763;
									font-family: 'Roboto', sans-serif;
									font-size: 15px;
									margin-bottom: 25px;
								}
							</style>
							<input value="Thêm giỏ hàng" type="button" data-id_product="{{$product->id}}" class="btn btn-default add-to-cart">
							<input type="button" class="btn btn-default xemnhanh" data-toggle="modal" data-target="#xemnhanh" value="Xem nhanh" data-id_product="{{$product->id}}">



						</form>


					</div>

				</div>
				<div class="modal fade" id="xemnhanh" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">
									<span id="product_quickview_title"></span>
								</h5>

							</div>
							<div class="modal-body">
								<div class='row'>
									<div class="col-md-5">
										<span id="product_quickview_image"></span>
										<span id="product_quickview_gallery"></span>
									</div>
									<form>
										@csrf
										<div id="product_quickview_value"></div>
										<div class="col-md-7">
											<style>
												h5.modal-title.product_quickview_title {
													text-align: center;
													font-size: 25px;
													color: brown;
												}

												p.quickview {
													font-size: 14px;
													color: brown;
												}

												span#product_quickview_content img {
													width: 100%;
												}

												@media screen and(min-width:768px) {
													.modal-dialog {
														width: 700px;
													}

													.modal-sm {
														width: 350px;
													}
												}

												@media screen and (min-width:992px) {
													.modal-lg {
														width: 950px;
													}
												}
											</style>
											<h2 class="quickview"><span id="product_quickview_title"></span></h2>
											<p>Mã ID : <span id="product_quickview_id"></span></p>
											<p>Giá sản phẩm : <span id="product_quickview_price"></span> </p>
											<label for="">Số lượng </label>
											<input type="number" name="qty" min=1 class="cart_product_qty_" value="1" />
											<p><span id="product_quickview_content"></span></p>
											<div id="product_quickview_button"></div>
											<div id="beforesend_quickview"></div>

										</div>
									</form>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
								<button type="button" class="btn btn-default redirect_cart">Đi tới sản phẩm</button>

							</div>
						</div>
					</div>
				</div>
				<div class="choose">
					<ul class="nav nav-pills nav-justified">
						<li><a href=""><i class="fa fa-plus-square"></i>Yêu thích</a></li>
						<li><a href=""><i class="fa fa-plus-square"></i>So sánh</a></li>
					</ul>
				</div>
			</div>
		</div>
		@endforeach


	</div>
	<!--features_items-->
	<ul class="pagination">
		{{ $products->links() }}
	</ul>
</div>

@stop()