@extends('about')
<!-- noi dung ben trong  -->
@section('main')
<div class="col-sm-9 padding-right">
					
					<div class="fb-like" data-href="{{$url_canonical}}" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="false"></div>
					<div class="fb-share-button" data-href="http://localhost:8080/LEARN_PHP/Laravel/MyProject/public/" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{$url_canonical}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Sản phẩm thể loại</h2>
					@foreach($product as $product)
					
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="{{url('home')}}/images//shop/product12.jpg" alt="" />
										<h2>{{number_format($product->price)}}</h2>
										<p>{{$product->name}}</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									<div class="product-overlay">
									<form action="/save-cart" method="POST">
									@csrf
										<div class="overlay-content">
											<input name="qty" type="hidden" value="1" />
											<input name="product_hidden" type="hidden" value="{{$product->id}}" />
											<h2>{{number_format($product->price)}}</h2>
											<a class="btn btn-default" href="{{url('/product_detail/'.$product->id)}}">Chi tiết sản phẩm</a>
											<p>{{$product->name}}</p>
											<button type="submit"  class="btn btn-default add-to-cart">Add to cart</button>
										
										</div>
									</form>
										
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
					@endforeach				
						
						
					</div>
					<div class="fb-comments" data-href="{{$url_canonical}}" data-width="" data-numposts="20"></div>
					
</div>


				
@stop()