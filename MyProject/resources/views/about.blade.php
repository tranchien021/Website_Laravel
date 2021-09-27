<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{$meta_desc}}">
	<meta name="keywords" content="{{$meta_keywords}}">
	<link rel="canonical" href="{{$url_canonical}}">
	<meta name="robots" content="INDEX,FOLLOW">
    <meta name="author" content="">
    <title>{{$meta_title}}</title>

	<meta property="og:site_name"     content="minhchien.com" />
	<meta property="og:url"           content="{{$url_canonical}}" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="{{$meta_title}}" />
	<meta property="og:description"   content="{{$meta_desc}}" />
	

    <link href="{{url('home')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{url('home')}}/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{url('home')}}/css/prettyPhoto.css" rel="stylesheet">
    <link href="{{url('home')}}/css/price-range.css" rel="stylesheet">
    <link href="{{url('home')}}/css/animate.css" rel="stylesheet">
	<link href="{{url('home')}}/css/main.css" rel="stylesheet">
	<link href="{{url('home')}}/css/responsive.css" rel="stylesheet">

	<link href="{{url('home')}}/css/lightgallery.min.css" rel="stylesheet">
	<link href="{{url('home')}}/css/lightslider.css" rel="stylesheet">
	<link href="{{url('home')}}/css/prettify.css" rel="stylesheet">
	 


	
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{url('home')}}/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{url('home')}}/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{url('home')}}/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{url('home')}}/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="{{url('home')}}/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<style>
	.search_box input {
  background: #F0F0E9;
  border: medium none;
  color: #B2B2B2;
  font-family: 'roboto';
  font-size: 12px;
  font-weight: 300;
  height: 35px;
  outline: medium none;
  padding-left: 10px;
  width: 155px;
 
  background-repeat: no-repeat;
  background-position: 130px;
}
.control-carousel{
	font-size: 40px
}
</style>
<body>
<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> 84+ 0349-521-656</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> tranchien021@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{url('/')}}"><img src="{{url('home')}}/images/home/logo.png" alt="" /></a>
						</div>
						
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								
								<li><a href="#"><i class="fa fa-star"></i> Yêu thích</a></li>
								
								<?php 
								$customer_id=Session::get('customer_id');
								// $shipping_id=Session::get('shipping_id')
								if($customer_id!=NULL){
								?>
									<li><a href="{{url('/checkout')}}"><i class="fa fa-crosshairs"></i> Thanh Toán </a></li>
								
								<?php
										
									}else{
								?>
									<li><a href="{{url('/login_checkout')}}"><i class="fa fa-crosshairs"></i> Thanh Toán </a></li>
								<?php 
									}
								?>
								
								<li><a href="{{url('/giohang')}}"><i class="fa fa-shopping-cart"></i> Giỏ Hàng</a></li>
								
								<?php 
								$customer_id=Session::get('customer_id');
									if($customer_id!=NULL){
								?>
									<li><a href="{{url('/logout_checkout')}}"><i class="fa fa-lock"></i> Đăng Xuất  </a></li>
								
								<?php
										
									}else{
								?>
									<li><a href="{{url('/login_checkout')}}"><i class="fa fa-lock"></i> Đăng Nhập </a></li>
								<?php 
									}
								?>
									
								
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{url('/')}}" class="active">Trang Chủ</a></li>
								<li class="dropdown"><a href="{{url('/shop')}}">Cửa Hàng<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Products</a></li>
										<li><a href="product-details.html">Product Details</a></li> 
										<li><a href="checkout.html">Checkout</a></li> 
										<li><a href="cart.html">Giỏ Hàng</a></li> 
										<li><a href="login.html">Đăng Nhập</a></li> 
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="{{url('/layout_blog')}}">Bài viết <i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
										@foreach($category_blog as $blog)
                                       		 <li><a href="{{url('/danh_muc_bai_viet/'.$blog->category_blog_slug)}}">{{$blog->category_blog_name}}</a></li>
										
										@endforeach
                                    </ul>
                                </li> 
								<li><a href="{{url('/video_shop')}}">Video</a></li>
								<li><a href="{{url('/lienhe')}}">Liên Hệ</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-4">
						<form action="{{url('/search')}}" autocomplete="off" method="POST">
							@csrf
							<div class="search_box" style="background-image:none">
								<input style="width:100%" type="text" id="keywords" name="keywords_submit" placeholder="Tìm kiếm"/>
								<div id="search_ajax"></div>
								<button class="btn" style="background:#FE980F; color:#fff;" type="submit" name="search_items">Tìm Kiếm </button>
							</div>
						</form>
						
					</div>
				</div>
			</div>
		</div>
</header>
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<?php
								$i=0;
							?>
							@foreach($slider as $slider)
							<?php
								$i++;
							?>
							<div class="item {{$i==1 ? 'active':''}}">
								
								<div class="col-sm-12">
									<img  width="100%" src="{{url('uploads')}}/slider/{{$slider->slider_image}}" class="girl img-responsive" alt="{{$slider->slider_desc}}" />
									
								</div>
							</div>
							@endforeach
							
							
						
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Danh mục sản phẩm </h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							@foreach($brand as $brands)		
							<div class="panel panel-default">
								@if($brands->brand_parent==0)
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#{{$brands->slug_brand}}">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											{{$brands->brand_name}}
										</a>
									</h4>
								</div>

								<div id="{{$brands->slug_brand}}" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											@foreach($brand as $brand_sub)
												@if($brand_sub->brand_parent == $brands->brand_id)
													<li><a href="#">{{$brand_sub->brand_name}} </a></li>
												@endif
											@endforeach
											
										</ul>
									</div>
								</div>
								@endif
							</div>
							@endforeach
							
						</div><!--/category-products-->
						
                      
						
						
							
							
							
							
							
					
					
						<div class="brands_products"><!--brands_products-->
							<h2>Thể Loại</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									@foreach($category as $category)
									<li><a href="{{url('/show_category/'.$category->theloai)}}"> <span class="pull-right">({{$category->products->count()}})</span>{{$category->Tên}}</a></li>
									
									@endforeach
								</ul>
							</div>
						</div><!--/brands_products-->
							
						<div style="background:none; padding:0px 0px;" class="shipping text-center"><!--shipping-->
							<img src="{{url('home')}}/images/home/a.jpg" alt="" />
						</div><!--/shipping-->
						
						
					
					</div>
				</div>
				
			@yield('main')
			</div>
		</div>
	</section>
	
<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>e</span>-shopper</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{url('home')}}/images/home/iframe1.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{url('home')}}/images/home/iframe2.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{url('home')}}/images/home/iframe3.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{url('home')}}/images/home/iframe4.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="{{url('home')}}/images/home/map.png" alt="" />
							<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Online Help</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Order Status</a></li>
								<li><a href="#">Change Location</a></li>
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quock Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">T-Shirt</a></li>
								<li><a href="#">Mens</a></li>
								<li><a href="#">Womens</a></li>
								<li><a href="#">Gift Cards</a></li>
								<li><a href="#">Shoes</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privecy Policy</a></li>
								<li><a href="#">Refund Policy</a></li>
								<li><a href="#">Billing System</a></li>
								<li><a href="#">Ticket System</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Store Location</a></li>
								<li><a href="#">Affillate Program</a></li>
								<li><a href="#">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

	


    <script src="{{url('home')}}/js/jquery.js"></script>
	<script src="{{url('home')}}/js/bootstrap.min.js"></script>
	<script src="{{url('home')}}/js/jquery.scrollUp.min.js"></script>
	<script src="{{url('home')}}/js/price-range.js"></script>
    <script src="{{url('home')}}/js/jquery.prettyPhoto.js"></script>
    <script src="{{url('home')}}/js/main.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0" nonce="b2fbiCpE"></script>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<script src="js/lightGallery.js"></script>
	<script src="{{url('home')}}/js/lightgallery-all.min.js"></script>
	<script src="{{url('home')}}/js/lightslider.js"></script>
	<script src="{{url('home')}}/js/prettify.js"></script>
	<script>
		function remove_background(product_id){
			for(var count=1;count<=5;count++){
				$('#'+product_id+'-'+count).css('color','#ccc');
			}
		}
		$(document).on('mouseenter','.rating',function(){
			var index=$(this).data('index');
			var product_id=$(this).data('product_id');
			remove_background(product_id);
			for(var count=1;count<=index;count++){
				$('#'+product_id+'-'+count).css('color','#ffcc00');
			}

		});
		$(document).on('mouseleave','.rating',function(){
			var index=$(this).data('index');
			var product_id=$(this).data('product_id');
			var rating=$(this).data('rating');
			remove_background(product_id);
			for(var count=1;count<=rating;count++){
				$('#'+product_id+'-'+count).css('color','#ffcc00');
			}
		});
		$(document).on('click','.rating',function(){
			var index=$(this).data('index');
			var product_id=$(this).data('product_id');
			var _token=$('input[name="_token"]').val(); 
			$.ajax({
				url:'{{url('/insert_rating')}}',
				method:'POST',
				data:{index:index,product_id:product_id,_token:_token},
				success:function(data){
					if(data =='done'){
						swal("Thành công !", 'Bạn đã đánh giá '+ index+' trên 5 *', "success");
					}else{
						swal("Bất bại !", 'Lỗi đánh giá ', "error");
					}
				}
			});
		});
	</script>
	<script>
		$(document).ready(function(){
			load_comment();
			function load_comment(){
				var product_id=$('.comment_product_id').val();
				var _token=$('input[name="_token"]').val(); 
		
				$.ajax({
					url:'{{url('/load_comment')}}',
					method:'POST',
					data:{product_id:product_id,_token:_token},
					success:function(data){
						$('#comment_show').html(data);
					}
				});
			}
			$('.send_comment').click(function(){
				var product_id=$('.comment_product_id').val();
				var comment_name=$('.comment_name').val();
				var comment_content=$('.comment_content').val();
				var _token=$('input[name="_token"]').val(); 
		
				$.ajax({
					url:'{{url('/send_comment')}}',
					method:'POST',
					data:{product_id:product_id,_token:_token,comment_name:comment_name,comment_content:comment_content},
					success:function(data){
						
						$('#notify_comment').html('<p style="font-size:30px;" class="text text-success">Thêm bình luận thành công , đang duyệt ! </p>')
						load_comment();
						$('#notify_comment').fadeOut(5000);
						$('.comment_name').val('');
						$('.comment_content').val('');
					}
				});
			});
		});
	</script>
	<script>
		$('.xemnhanh').click(function(){
			var product_id=$(this).data('id_product');
			var _token=$('input[name="_token"]').val(); 
			$.ajax({
				url:'{{url('/quickview')}}',
				method:'POST',
				dataType:'JSON',
				data:{product_id:product_id,_token:_token},
				success:function(data){
					$('#product_quickview_title').html(data.product_name);
					$('#product_quickview_id').html(data.product_id);
					$('#product_quickview_price').html(data.product_price);
					$('#product_quickview_image').html(data.product_image);
					$('#product_quickview_gallery').html(data.product_gallery);
					$('#product_quickview_content').html(data.product_content);
					$('#product_quickview_value').html(data.product_quickview_value);
					$('#product_quickview_button').html(data.product_button);
					

				}
			});
		});
	</script>
	<script>
		$('#keywords').keyup(function(){
			var query=$(this).val();
			if(query!=''){
				var _token=$('input[name="_token"]').val();
				$.ajax({
					url:'{{url('/auto_complete_ajax')}}',
					method:'POST',
					data:{query:query,_token:_token},
					success:function(data){
						$('#search_ajax').fadeIn();
						$('#search_ajax').html(data);
					}
				});

			}else{
				$('#search_ajax').fadeOut();
			}
		});
		$(document).on('click','.li_search_ajax',function(){
			$('#keywords').val($(this).text());
			$('#search_ajax').fadeOut();
		});
		
	</script>
	
	<script>
		$(document).ready(function() {
			$('#imageGallery').lightSlider({
				gallery:true,
				item:1,
				loop:true,
				thumbItem:3,
				slideMargin:0,
				enableDrag: false,
				currentPagerPosition:'left',
				onSliderLoad: function(el) {
					el.lightGallery({
						selector: '#imageGallery .lslide'
					});
				}   
			});  
  		});

	</script>
	
	<!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "102502015511970");
      chatbox.setAttribute("attribution", "biz_inbox");

      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v11.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
	

	<script>
		$(document).ready(function(){
			$('.add-to-cart').click(function(){
				var id=$(this).data('id_product');
				var cart_product_id=$('.cart_product_id_'+id).val()
				var cart_product_name=$('.cart_product_name_'+id).val();
				var cart_product_img=$('.cart_product_img_'+id).val();
				var cart_product_price=$('.cart_product_price_'+id).val();
				var cart_product_qty=$('.cart_product_qty_'+id).val();
				var cart_product_quantity=$('.cart_product_quantity_'+id).val();
				var _token=$('input[name="_token"]').val();
				
			
				if(parseInt(cart_product_qty)>parseInt(cart_product_quantity)){
					alert("Làm ơn đặt nhỏ hơn "+ cart_product_quantity);
				}else{
					$.ajax({
						url: "{{url('/add-cart-ajax')}}",
						method: 'POST',
						data:{cart_product_quantity:cart_product_quantity,cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_img:cart_product_img,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token},

						success:function(data){
							swal({
								title: "Thành Công!",
								text: "Click vào button để tiếp tục!",
								icon: "success",
								button: "Tiếp tục!",

							});
							
						}

					});
				}
			});
		});
	</script>
	<script>
			$(document).on('click','.add-to-cart-quickview',function(){
				var id=$(this).data('id_product');
				var cart_product_id=$('.cart_product_id_'+id).val()
				var cart_product_name=$('.cart_product_name_'+id).val();
				var cart_product_img=$('.cart_product_img_'+id).val();
				var cart_product_price=$('.cart_product_price_'+id).val();
				var cart_product_qty=$('.cart_product_qty_'+id).val();
				var cart_product_quantity=$('.cart_product_quantity_'+id).val();
				var _token=$('input[name="_token"]').val();
				
				
			
				if(parseInt(cart_product_qty)>parseInt(cart_product_quantity)){
					alert("Làm ơn đặt nhỏ hơn "+ cart_product_quantity);
				}else{
					$.ajax({
						url: "{{url('/add-cart-ajax')}}",
						method: 'POST',
						data:{cart_product_quantity:cart_product_quantity,cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_img:cart_product_img,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token},
						beforeSend:function(){
							$('#beforesend_quickview').html('<p class="text text-primary">Đang thêm sản phẩm vào giỏ hàng</p> ');
						},
						success:function(data){
							$('#beforesend_quickview').html('<p class="text text-success">Đã thêm sản phẩm vào giỏ hàng</p> ');
							$('#buy_quickview').attr('disabled',true);
						}

					});
				}
			});
	
	</script>
	
	<script>
    $(document).on('click','.watch_video',function(){
        var video_id=$(this).attr('id');
        var _token=$('input[name="_token"]').val();
     

        $.ajax({
            url:'{{url('/watch_video')}}',
            method:'POST',
            dataType:'JSON',
            data:{video_id:video_id,_token:_token},
            success:function(data){
                $('#video_title').html(data.video_title);
                $('#video_link').html(data.video_link);
				$('#video_desc').html(data.video_desc);

            }

            
        });
    });
	$(document).on('click','.redirect_cart',function(){
		window.location.href="{{url('/giohang')}}";
	});
</script>
	
	
	
</body>
</html>