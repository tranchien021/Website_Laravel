<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Trang chủ | Cửa hàng đồ ăn</title>
    <link href="{{url('home')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{url('home')}}/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{url('home')}}/css/prettyPhoto.css" rel="stylesheet">
    <link href="{{url('home')}}/css/price-range.css" rel="stylesheet">
    <link href="{{url('home')}}/css/animate.css" rel="stylesheet">
	<link href="{{url('home')}}/css/main.css" rel="stylesheet">
	<link href="{{url('home')}}/css/responsive.css" rel="stylesheet">
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
									<li><a href="#"><i class="fa fa-instagram"></i></a></li>
									<li><a href="#"><i class="fa fa-envelope"></i></a></li>
									<li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
								</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle">
			<!--header-middle-->
			<div class="container">
				<div class="row">
				<div class="col-sm-4">
						<form action="{{url('/search')}}" autocomplete="off" method="POST" style="padding-top:45px;">
							@csrf
							<div class="search_box" style="background-image:none">
								
								<input style="width:70%" type="text" id="keywords" name="keywords_submit" placeholder="Tìm kiếm" />
								<button class="btn" style="background:#FE980F; color:#fff;" type="submit" name="search_items">Tìm Kiếm </button>
								<div id="search_ajax"></div>

							</div>
						</form>

					</div>
				
					<div class="col-sm-4">
						<div class="logo pull-left" style="padding-left:50px;">
							<a  href="{{url('/')}}"><img width="45%" src="{{url('/uploads/home/logo.png')}}" alt=""></a>
							<span style="font-size:40px;color:#FE980F;">𝕎𝕚𝕥𝕙 𝕌𝕤</span>
						</div>
						

					</div>
					<div class="col-sm-4">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">

							

								<?php
								$customer_id = Session::get('customer_id');
								// $shipping_id=Session::get('shipping_id')
								if ($customer_id != NULL) {
								?>
									<li><a href="{{url('/checkout')}}"><i class="fa fa-crosshairs"></i> Thanh Toán </a></li>

								<?php

								} else {
								?>
									<li><a href="{{url('/login_checkout')}}"><i class="fa fa-crosshairs"></i> Thanh Toán </a></li>
								<?php
								}
								?>

								<li><a href="{{url('/giohang')}}"><i class="fa fa-shopping-cart"></i> Giỏ Hàng</a></li>

								<?php
								$customer_id = Session::get('customer_id');
								if ($customer_id != NULL) {
								?>
									<li><a href="{{url('/logout_checkout')}}"><i class="fa fa-lock"></i> Đăng Xuất </a></li>

								<?php

								} else {
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
		</div>
	
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
								<li class="dropdown"><a href="{{url('/layout_blog')}}">Bài viết <i class="fa fa-angle-down"></i></a>
									<ul role="menu" class="sub-menu">
										@foreach($category_blog as $blog)
										<li><a href="{{url('/danh_muc_bai_viet/'.$blog->category_blog_slug)}}">{{$blog->category_blog_name}}</a></li>

										@endforeach
									</ul>
								</li>
								<li class="dropdown"><a href="{{url('/shop')}}">Cửa Hàng</a>
									
								</li>
								
								<li><a href="{{url('/video_shop')}}">Video</a></li>
								<li><a href="{{url('/lienhe')}}">Liên Hệ</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
</header><!--/header-->
	
	
	
							
						
						
							
	@yield('main1')
		
	<footer id="footer">
		<!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<a  href="{{url('/')}}"><img width="100%" src="{{url('/uploads/home/logo.png')}}" alt=""></a>
							<p style="font-size:13px;color:black">With you when you hungry</p>
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
							<p> University of Information Technology VNU-HCM, khu phố 6, Linh Trung, Thủ Đức, Thành phố Hồ Chí Minh</p>
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
							<h2>Dịch vụ</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Hỗ trợ online </a></li>
								<li><a href="#">Liê hệ</a></li>
								<li><a href="#">Đặt Hàng</a></li>
								<li><a href="#">Vị trí</a></li>
								<li><a href="#">Câu hỏi</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Cửa hàng đồ ăn</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Bánh mì</a></li>
								<li><a href="#">Đồ ăn nhanh</a></li>
								<li><a href="#">Bún</a></li>
								<li><a href="#">Cơm </a></li>
								<li><a href="#">Đồ Uống</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Chính sách</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Điều khoản</a></li>
								<li><a href="#">Bảo mật</a></li>
								<li><a href="#">Hoàn tiền</a></li>
								<li><a href="#">Thanh Toán</a></li>
								<li><a href="#">Mã giảm giá</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Về cửa hàng</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Thông tin </a></li>
								<li><a href="#">Nhân viên</a></li>
								<li><a href="#">Vị trí</a></li>
								<li><a href="#">Liên kết</a></li>
								<li><a href="#">Bản quyền</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>Liên hệ với nhân viên</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Email của bạn" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Chúng tôi sẽ cố gắng liên hệ với bạn <br />sớm nhất có thể</p>
							</form>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Bản quyền © 2021 15ShopFood . Đã đăng ký bản quyền </p>
					<p class="pull-right">Thiết kế bởi <span><a target="_blank" href="">Nhóm 15 UIT</a></span></p>
				</div>
			</div>
		</div>

	</footer>
	

  
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
	<script>
			$(document).ready(function(){
			$('.send_order').click(function(){
				
				swal({
					title: "Xác nhận đơn hàng ?",
					text: "Đơn hàng sẽ không hoàn trả khi đặt, xác nhận đơn hàng ? ",
					icon: "warning",
					buttons: true,
					dangerMode: true,
					})
					.then((willDelete) => {
					if (willDelete) {
						

						var shipping_email=$('.shipping_email').val()
						var shipping_name=$('.shipping_name').val();
						var shipping_address=$('.shipping_address').val();
						var shipping_phone=$('.shipping_phone').val();
						var shipping_notes=$('.shipping_notes').val();
						var shipping_method=$('.select_payment').val();
						var order_money=$('.order_money').val();
						var order_coupon=$('.order_coupon').val();
						var _token=$('input[name="_token"]').val();
					
						
						$.ajax({
							url: "{{url('/confirm_order')}}",
							method: 'POST',
							data:{shipping_email:shipping_email,shipping_name:shipping_name,shipping_address:shipping_address,shipping_method:shipping_method,
								shipping_phone:shipping_phone,shipping_notes:shipping_notes,order_money:order_money,order_coupon:order_coupon,_token:_token},

							success:function(data){
								swal({
									title: "Thành Công !",
									text: "Đơn hàng đã được gửi !",
									icon: "success",
									button: "Thoát ",
								});
							}

						});
					window.setTimeout(function(){
						location.reload();
					}, 3000);

					} else {
						swal("Tiếp tục mua hàng !");
					}
				});

			
			});
		});

	</script>
	
	<script>
		$(document).ready(function(){
			$('.calculate_delivery').click(function(){
				var matp=$('.city').val();
				var maqh=$('.province').val();
				var xaid=$('.wards').val();
				var _token=$('input[name="_token"]').val();
				
				if(maqh =='' || xaid ==''){
					alert('Làm ơn chọn để tính phí vận chuyển ');
				}
				else{
					
					$.ajax({
						url:'{{url('/calculate_money')}}',
						method:'POST',
						data:{matp:matp,maqh:maqh,xaid:xaid,_token:_token},
						success:function(){
							location.reload();
						}
			  		});
				}
				
			});
		});
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
				var _token=$('input[name="_token"]').val();
				
				$.ajax({
					url: "{{url('/add-cart-ajax')}}",
                    method: 'POST',
                    data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_img:cart_product_img,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token},

					success:function(data){
						swal({
							title: "Thành Công!",
							text: "Click vào button để tiếp tục!",
							icon: "success",
							button: "Tiếp tục!",

						});
						
					}

				});
			});
		});
	</script>
	<script>
		$(document).ready(function(){
			$('.choose').on('change',function(){
              
			  var action=$(this).attr('id');
			  var ma_id=$(this).val();
			  var _token=$('input[name="_token"]').val();
			  var result="";
			 
			  
			  if(action=='city'){
				  result='province';
				  
			  }else{
				  result='wards';
			  }
			  $.ajax({
				  url:'{{url('/delivery_home')}}',
				  method:'POST',
				  data:{action:action,ma_id:ma_id,_token:_token},
				  success:function(data){
					  $('#'+result).html(data);
				  }
			  });
		  });
		});
	</script>
	
</body>
</html>