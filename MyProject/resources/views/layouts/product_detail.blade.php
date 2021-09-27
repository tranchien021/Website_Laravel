@extends('about')
<!-- noi dung ben trong  -->
@section('main')



<div class="col-sm-9 padding-right">
	@foreach($product_detail as $product_detail)
	<div class="product-details">
		<!--product-details-->
		<style>
			.lSSlideOuter .lSPager.lSGallery img {
				display: block;
				height: auto;
				max-width: 100%;
			}

			li.active {
				border-bottom: 3px solid #FE980F;
			}
		</style>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb" style="background:none;border:none">
				<li class="breadcrumb-item"><a href="{{url('/')}}">Trang Chủ </a></li>
				<li class="breadcrumb-item"><a href="{{url('/show_category/'.$product_cate)}}">{{$product_cate}}</a></li>
				<li class="breadcrumb-item active" aria-current="page">{{$product_detail->name}}</li>
			</ol>
		</nav>
		<div class="col-sm-5">
			<ul id="imageGallery">
				@foreach($gallery as $gallery)
				<li data-thumb="{{url('uploads/gallery/'.$gallery->gallery_image)}}" data-src="{{url('uploads/gallery/'.$gallery->gallery_image)}}">
					<img width="100%" alt="{{$gallery->gallery_name}}" src="{{url('uploads/gallery/'.$gallery->gallery_image)}}" />
				</li>
				@endforeach

			</ul>
		</div>
		<div class="col-sm-7">
			<div class="product-information">
				<!--/product-information-->

				<h2>{{$product_detail->name}}</h2>
				<p>Địa chỉ : {{$product_detail->address}}</p>
				<form>
					@csrf
					<span>
						<span>Giá: {{number_format( $product_detail->price)}} đ</span><br>



						<input type="hidden" value="{{$product_detail->id}}" class="cart_product_id_{{$product_detail->id}}">
						<input type="hidden" value="{{$product_detail->name}}" class="cart_product_name_{{$product_detail->id}}">
						<input type="hidden" value="{{$product_detail->img}}" class="cart_product_img_{{$product_detail->id}}">
						<input type="hidden" value="{{$product_detail->price}}" class="cart_product_price_{{$product_detail->id}}">
						<input type="hidden" value="{{$product_detail->quantity}}" class="cart_product_quantity_{{$product_detail->id}}">

						<div>
							<label>Số lượng :</label>

							<input type="text" value="3" class="cart_product_qty_{{$product_detail->id}}" />
						</div>
						<p></p>
						<button type="button" class="btn btn-fefault add-to-cart" data-id_product="{{$product_detail->id}}">
							<i class="fa fa-shopping-cart"></i>
							Thêm giỏ hàng
						</button>
					</span>
				</form>

				<p><b>Trong kho :</b>
					@if($product_detail->tinhtrang == 1)
					Còn Hàng

					@else
					Hết Hàng

					@endif


				</p>
				<p><b>Chất lượng :</b> Mới </p>
				<p><b>Hãng:</b> : Cook Cook </p>

				<fieldset>
					<legend>Tags</legend>
					<p><i class="fa fa-tag"></i>
						@php
						$tags=$product_detail->product_tag;
						$tags=explode(",",$tags);
						@endphp
						@foreach($tags as $tag)
						<button class="btn btn-infor"><a href="{{url('/tag/'.$tag)}}">{{$tag}}</a></button>
						@endforeach

					</p>
				</fieldset>

			</div>
			<!--/product-information-->
		</div>
	</div>
	<!--/product-details-->
	@endforeach
	<div class="category-tab shop-details-tab">
		<!--category-tab-->
		<div class="col-sm-12">
			<ul class="nav nav-tabs">
				<li><a href="#details" data-toggle="tab">Mô tả </a></li>
				<li><a href="#companyprofile" data-toggle="tab">Chi tiết</a></li>

				<li class="active"><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
			</ul>
		</div>
		<div class="tab-content">
			<div class="tab-pane fade" id="details">
				{!!$product_detail->content!!}
			</div>

			<div class="tab-pane fade" id="companyprofile">
				{!!$product_detail->content!!}
			</div>



			<div class="tab-pane fade active in" id="reviews">
				<div class="col-sm-12">
					<ul>
						<li><a href=""><i class="fa fa-user"></i>ADMIN</a></li>
						<li><a href=""><i class="fa fa-clock-o"></i>21:05 PM</a></li>
						<li><a href=""><i class="fa fa-calendar-o"></i>21/05/2000</a></li>
					</ul>
					<style>
						.style_comment {
							border: 1px solid #ddd;

							background: #F0F0E9;
						}
					</style>
					<form action="">
						@csrf
						<input type="hidden" name="comment_product_id" class="comment_product_id" value="{{$product_detail->id}}">
						<div id="comment_show"></div>



					</form>
					<p><b>Viết đánh giá của bạn</b></p>



					<ul class="list-inline rading" title="Average Rating">
						@for($count=1;$count<=5;$count++) @php if($count<=$rating){ $color='color:#ffcc00' ; } else{ $color='color:#ccc' ; } @endphp <li title="star_rating" id="{{$product_detail->id}}-{{$count}}" data-index="{{$count}}" data-product_id="{{$product_detail->id}}" data-rating="{{$rating}}" class="rating" style="cursor:pointer;{{$color}};font-size:30px;">
							&#9733;
							</li>
							@endfor


					</ul>

					<form action="#">
						<span>
							<input style="width:100%;margin-left:0px;" type="text" class="comment_name" placeholder="Tên bình luận" />

						</span>
						<textarea name="comment" class="comment_content" placeholder="Nội dung bình luận"></textarea>
						<div id="notify_comment"></div>
						<b>Đánh giá sao : </b> <img src="images/product-details/rating.png" alt="" />
						<button type="button" class="btn btn-default pull-right send_comment">
							Gửi bình luận
						</button>

					</form>
				</div>
			</div>

		</div>
	</div>
	<!--/category-tab-->

	<div class="recommended_items">
		<!--recommended_items-->
		<h2 class="title text-center">Sản phẩm liên quan </h2>

		<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="item active">
					@foreach($item_recom as $item)
					<a href="{{url('/product_detail/'.$item->id)}}">
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="{{url('uploads/home/'.$item->img)}}" alt="" />
										<h2>{{number_format($item->price)}}</h2>
										<p>{{$item->name}}</p>
										<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</button>
									</div>
								</div>
							</div>
						</div>
					</a>

					@endforeach




				</div>


			</div>
			<!--/recommended_items-->

		</div>

		<div class="features_items">
			<!--features_items-->
			<h2 class="title text-center">Features Items</h2>

			<div class="col-sm-4">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<img src="{{url('home')}}/images/home/product1.jpg" alt="" />
							<h2>$56</h2>
							<p>Easy Polo Black Edition</p>
							<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
						</div>
						<div class="product-overlay">
							<div class="overlay-content">
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng </a>
							</div>
						</div>
					</div>
					<div class="choose">
						<ul class="nav nav-pills nav-justified">
							<li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
							<li><a href="#"><i class="fa fa-plus-square"></i>Sở thích</a></li>
						</ul>
					</div>
				</div>
			</div>


		</div>
		<!--features_items-->

		<div class="category-tab">
			<!--category-tab-->
			<div class="col-sm-12">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>
					<li><a href="#blazers" data-toggle="tab">Blazers</a></li>
					<li><a href="#sunglass" data-toggle="tab">Sunglass</a></li>
					<li><a href="#kids" data-toggle="tab">Kids</a></li>
					<li><a href="#poloshirt" data-toggle="tab">Polo shirt</a></li>
				</ul>
			</div>
			<div class="tab-content">
				<div class="tab-pane fade active in" id="tshirt">
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{url('home')}}/images/home/gallery1.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>



				</div>

				<div class="tab-pane fade" id="blazers">
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{url('home')}}/images/home/gallery4.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{url('home')}}/images/home/gallery3.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{url('home')}}/images/home/gallery2.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{url('home')}}/images/home/gallery1.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>
				</div>

				<div class="tab-pane fade" id="sunglass">
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{url('home')}}/images/home/gallery3.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{url('home')}}/images/home/gallery4.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{url('home')}}/images/home/gallery1.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{url('home')}}/images/home/gallery2.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>
				</div>

				<div class="tab-pane fade" id="kids">
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{url('home')}}/images/home/gallery1.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{url('home')}}/images/home/gallery2.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{url('home')}}/images/home/gallery3.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{url('home')}}/images/home/gallery4.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>
				</div>

				<div class="tab-pane fade" id="poloshirt">
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{url('home')}}/images/home/gallery2.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{url('home')}}/images/home/gallery4.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{url('home')}}/images/home/gallery3.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{url('home')}}/images/home/gallery1.jpg" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
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