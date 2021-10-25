<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>

<head>
	<title>Trang Đăng nhập, Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Đăng nhập vào trang admin " />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- bootstrap-css -->
	<link rel="stylesheet" href="{{url('admin')}}/css/bootstrap.min.css">

	<!-- //bootstrap-css -->
	<!-- Custom CSS -->
	<link href="{{url('admin')}}/css/style.css" rel='stylesheet' type='text/css' />
	<link href="{{url('admin')}}/css/style-responsive.css" rel="stylesheet" />
	<!-- font CSS -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<!-- font-awesome icons -->
	<link rel="stylesheet" href="{{url('admin')}}/css/font.css" type="text/css" />
	<link href="{{url('admin')}}/css/font-awesome.css" rel="stylesheet">
	<!-- //font-awesome icons -->
	<script src="{{url('admin')}}/js/jquery2.0.3.min.js"></script>
</head>

<body>
	<div class="log-w3">
		<div class="w3layouts-main">
			<h2>Đăng Nhập </h2>
			<?php
			$message = Session::get('message');
			if ($message) {
				echo $message;
				Session::put('message', null);
			}
			?>
			<form action="{{route('admin.dashboard_login')}}" method="post">
				{{ csrf_field() }}
				<input type="text" class="ggg" name="email" placeholder="Email" required="">
				<input type="password" class="ggg" name="password" placeholder="Mật Khẩu" required="">
				<span><input type="checkbox" />Ghi nhớ</span>
			
				<div class="clearfix"></div>
				<input type="submit" value="Đăng Nhập" name="login">
			</form>
			
			<p>Không có tài khoản ?<a href="{{url('admin/register')}}"> Đăng Ký </a></p>
			
			<div style="text-align:center; margin-top: 5px;">
				<a class="btn btn-success" href="{{url('/admin/login_auth')}}">
					<i class="fa fa-sign-in"></i> Đăng nhập Auth
				</a>
				<a class="btn btn-danger" href="{{url('/admin/register_auth')}}">
					<i class="fa fa-registered"></i> Đăng ký Auth
				</a>
			</div>



		</div>
	</div>
	<script src="{{url('admin')}}/js/bootstrap.js"></script>
	<script src="{{url('admin')}}/js/jquery.dcjqaccordion.2.7.js"></script>
	<script src="{{url('admin')}}/js/scripts.js"></script>
	<script src="{{url('admin')}}/js/jquery.slimscroll.js"></script>
	<script src="{{url('admin')}}/js/jquery.nicescroll.js"></script>
	<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="{{url('admin')}}/js/flot-chart/excanvas.min.js"></script><![endif]-->
	<script src="{{url('admin')}}/js/jquery.scrollTo.js"></script>
</body>

</html>