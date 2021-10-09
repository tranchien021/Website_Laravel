@extends('about')
<!-- noi dung ben trong  -->
@section('main')
<div class="col-sm-9 padding-right">
	<div class="features_items">
		<!--features_items-->
		<div class="fb-like" data-href="{{$url_canonical}}" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="false"></div>
		<div class="fb-share-button" data-href="http://localhost:8080/LEARN_PHP/Laravel/MyProject/public/" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{$url_canonical}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
		<h2 class="title text-center">Sản phẩm nổi bật</h2>
		@foreach($product_nb as $product)
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
						ul.nav.nav-pills.nav-justified li{
							text-align: center;
							font-size:13px;
						}
						.button_wishlist{
							border:none;
							background: #ffff;
							color:#B3AFAB;
						}
						
						.button_wishlist span:hover{
							color: red;
						}
						.button_wishlist:focus{
							border:none;
							outline: none;
						}
						.delete_withlist:hover{
							color: purple;
						}
						.thumb{
							color:black;
						}
					</style>
					<ul class="nav nav-pills nav-justified">
						<li>
							<i class="fa fa-heart" style="color:red"></i>
							
							<button class="button_wishlist" id="{{$product->id}}" onclick="add_wistlist(this.id);"><span>Yêu thích</span></button>
							
						</li>
						<li><a href=""><i class="fa fa-plus-square" style="color:#FE980F;"></i>So sánh</a></li>
						<li><i class="fa fa-thumbs-down thumb"></i><button class="delete_withlist button_wishlist" data-id="{{$product->id}}" id="{{$product->id}}">Bỏ thích</button></li>
					</ul>
				</div>
			</div>
		</div>
		@endforeach

	</div>
	<!--features_items-->

	<div class="category-tab">
		<!--category-tab-->
		<div class="col-sm-12">
			<ul class="nav nav-tabs">
				@php 
					$i=0;
				@endphp
				@foreach($cate_pro_tab as $cate_tag)
					@php
						$i++;
					@endphp 
				<li data-masp="{{$cate_tag->theloai}}" class="tabs_pro {{$i==1 ? 'active':''}}"><a href="#tshirt" data-toggle="tab">{{$cate_tag->Tên}}</a></li>
				@endforeach

			</ul>
		</div>
		<div id="tabs_product"></div>
		
	</div>
	<!--/category-tab-->

	<div class="recommended_items">
		<!--recommended_items-->
		<h2 class="title text-center">recommended items</h2>

		<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="item active">
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{url('home')}}/images/home/recommend1.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{url('home')}}/images/home/recommend2.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{url('home')}}/images/home/recommend3.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{url('home')}}/images/home/recommend1.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{url('home')}}/images/home/recommend2.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{url('home')}}/images/home/recommend3.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
			<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
				<i class="fa fa-angle-left"></i>
			</a>
			<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
				<i class="fa fa-angle-right"></i>
			</a>
		</div>
	</div>
	<!--/recommended_items-->

</div>
@stop()