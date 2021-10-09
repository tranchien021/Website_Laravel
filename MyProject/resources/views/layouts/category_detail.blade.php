@extends('about')
<!-- noi dung ben trong  -->
@section('main')
<div class="col-sm-9 padding-right">

	<div class="fb-like" data-href="{{$url_canonical}}" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="false"></div>
	<div class="fb-share-button" data-href="http://localhost:8080/LEARN_PHP/Laravel/MyProject/public/" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{$url_canonical}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
	<div class="features_items">
		<!--features_items-->
		<h2 class="title text-center">Sản phẩm thể loại</h2>
		@foreach($product as $product)
		<div class="col-sm-4">
			<div class="product-image-wrapper">

				<div class="single-products">
					<div class="productinfo text-center">
						<form>
							@csrf
							<input type="hidden" value="{{$product->id}}" class="cart_product_id_{{$product->id}}">
							<input type="hidden" id="wishlist_productname{{$product->id}}" value="{{$product->name}}" class="cart_product_name_{{$product->id}}">
							<input type="hidden" value="{{$product->img}}" class="cart_product_img_{{$product->id}}">
							<input type="hidden" id="wishlist_productprice{{$product->id}}" value="{{number_format($product->price,0,',','.') }}" class="cart_product_price_{{$product->id}}">
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
						<li><a href=""><i class="fa fa-plus-square" style="color:#FE980F;"></i>So sánh</a></li>
						<li><i class="fa fa-thumbs-down thumb"></i><button class="delete_withlist button_wishlist" data-id="{{$product->id}}" id="{{$product->id}}">Bỏ thích</button></li>
					</ul>
				</div>
			</div>
		</div>
		@endforeach


	</div>
	<div class="fb-comments" data-href="{{$url_canonical}}" data-width="" data-numposts="20"></div>

</div>



@stop()