@extends('about')
<!-- noi dung ben trong  -->
@section('main')
		<div class="col-sm-9 padding-right">
			<div class="features_items"><!--features_items-->
				<h2 class="title text-center">Tìm Kiếm Sản Phẩm</h2>
            </div>
            @foreach($product_search as $product)
						<div class="col-sm-4">
							<div class="product-image-wrapper">

								<div class="single-products">
									<div class="productinfo text-center">
										<form>
										@csrf
										<input type="hidden"  value="{{$product->id}}" class="cart_product_id_{{$product->id}}">
										<input type="hidden"  value="{{$product->name}}" class="cart_product_name_{{$product->id}}">
										<input type="hidden"  value="{{$product->img}}" class="cart_product_img_{{$product->id}}">
										<input type="hidden"  value="{{$product->price}}" class="cart_product_price_{{$product->id}}">
										<input type="hidden"  value="1" class="cart_product_qty_{{$product->id}}">
										<input type="hidden"  value="{{$product->quantity}}" class="cart_product_quantity_{{$product->id}}">
										<a href="{{url('/product_detail/'.$product->id)}}">
											<img src="{{url('uploads')}}/home/{{$product->img}}" alt="" />
											<h2>{{number_format($product->price)}}</h2>
											<p>{{$product->name}}</p>
										</a>
										<button type="button" data-id_product="{{$product->id}}"  class="btn btn-default add-to-cart">Thêm vào giỏ hàng</button>
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
						
					
		</div>
@stop()