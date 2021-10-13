@extends('about')
<!-- noi dung ben trong  -->
@section('main')
<div class="col-sm-9 padding-right">
	<div class="features_items">
		<!--features_items-->
		<h2 class="title text-center">Tất cả sản phẩm</h2>
		<div class='row' style="margin:20px 0">
			<div class="col-md-4">
				<label for="amount">Sắp xếp theo</label>
				<form action="">
					@csrf
					<select name="sort" id="sort" class="form-control">
						<option value=""> --- Lọc ---- </option>
						<option value="{{Request::url()}}?sort_by=tang_dan">Giá tăng dần</option>
						<option value="{{Request::url()}}?sort_by=giam_dan">Giá giảm dần</option>
						<option value="{{Request::url()}}?sort_by=kytu_az">A đến Z</option>
						<option value="{{Request::url()}}?sort_by=kytu_za">Z đến A</option>

					</select>
				</form>
			</div>
			<div class='col-md-4'>

				<label for="amount">Lọc giá :</label>
				<form action="">
					<input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
					<input type="hidden" name="start_price" id="start_price">
					<input type="hidden" name="end_price" id="end_price">
					<input type="submit" name="filter_price" value="Lọc giá ">
					
					<div id="slider-range"></div>
				</form>


			</div>

		</div>


		@foreach($products as $product)
		
		<div class="col-sm-4">
			<div class="product-image-wrapper">

				<div class="single-products">
					<div class="productinfo text-center">
						<form>
							@csrf
							<input type="hidden" value="{{$product->id}}" class="cart_product_id_{{$product->id}}">
							<input type="hidden" id="wishlist_productname{{$product->id}}" value="{{$product->name}}" class="cart_product_name_{{$product->id}}">
							<input type="hidden" value="{{$product->img}}" class="cart_product_img_{{$product->id}}">
							<input type="hidden" id="wishlist_productprice{{$product->id}}" value="{{$product->price }}" class="cart_product_price_{{$product->id}}">
							<input type="hidden" value="1" class="cart_product_qty_{{$product->id}}">
							<input type="hidden" value="{{$product->quantity}}" class="cart_product_quantity_{{$product->id}}">
							<a id="wishlist_producturl{{$product->id}}" href="{{url('/product_detail/'.$product->id)}}">
								<img id="wishlist_productimage{{$product->id}}" src="{{url('uploads/')}}/home/{{$product->img}}" alt="" />
								<h2>{{number_format($product->price)}} đ</h2>
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
					<style>
						ul.nav.nav-pills.nav-justified li {
							text-align: center;
							font-size: 13px;
						}

						.button_wishlist {
							border: none;
							background: #ffff;
							color: #B3AFAB;
						}

						.button_wishlist span:hover {
							color: red;
						}

						.button_wishlist:focus {
							border: none;
							outline: none;
						}

						.delete_withlist:hover {
							color: purple;
						}

						.thumb {
							color: black;
						}
					</style>
					<ul class="nav nav-pills nav-justified">
						<li>
							<i class="fa fa-heart" style="color:red"></i>

							<button class="button_wishlist" id="{{$product->id}}" onclick="add_wistlist(this.id);"><span>Yêu thích</span></button>

						</li>
						<li><a type="button" style="cursor:pointer" onclick="add_compare({{$product->id}})"><i class="fa fa-plus-square" style="color:#FE980F;"></i>So sánh</a></li>
						<li><i class="fa fa-thumbs-down thumb"></i><button class="delete_withlist button_wishlist" data-id="{{$product->id}}" id="{{$product->id}}">Bỏ thích</button></li>
					</ul>
					<div class="modal fade" id="compare" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="title_compare"></h5>

								</div>
								<div class="modal-body">
									<div id="row_compare">
										<table class="table">
											<thead>
												<tr>
													<th scope="col">Tên sản phẩm </th>
													<th scope="col">Giá</th>
													<th scope="col">Hình ảnh </th>
													<th scope="col">Thông số </th>
													<th scope="col">Chi tiết  </th>
													<th scope="col">Xoá </th>
													
												</tr>
											</thead>
											<tbody>
											
											
											</tbody>
										</table>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>

								</div>
							</div>
						</div>
					</div>
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