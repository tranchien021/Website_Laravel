@extends('about')
<!-- noi dung ben trong  -->
@section('main')
<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Tất cả sản phẩm</h2>
					@foreach($product as $product)
					
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="{{url('home')}}/images/shop/{{$product->img}}" alt="" />
										<h2>{{number_format($product->price)}}</h2>
										<p>{{$product->name}}</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
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
											<button type="submit"  class="btn btn-default add-to-cart">Thêm vào giỏ</button>
										
										</div>
									</form>
										
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
						
						<ul class="pagination">
							<li class="active"><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">&raquo;</a></li>
						</ul>
					</div><!--features_items-->
				</div>
				
@stop()