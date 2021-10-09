@extends('about')
<!-- noi dung ben trong  -->
@section('main')
<div class="col-sm-9 padding-right">
	<section style="margin-top:5px;" id="form">
		<!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-3 col-sm-offset-1">
					@if(session()->has('message'))
					<div class="alert alert-success">
						{!!session()->get('message')!!}
					</div>
					@elseif(session()->has('error'))
					<div class="alert alert-warning">
						{!!session()->get('error')!!}
					</div>
					@endif
					<div class="login-form">
						<!--login form-->
						<h2>Đăng nhập tài khoản </h2>
						<form action="{{url('/login_customer')}}" method="POST">
							@csrf
							<input type="text" name="email_account" placeholder="Email" />
							<input type="text" name="password_account" placeholder="Password" />
							<span>
								<input type="checkbox" class="checkbox">
								Ghi nhớ đăng nhập
							</span><br>
							<span>

								<a href="{{url('/forgot_password')}}">Quên mật khẩu</a>

							</span>
							<button type="submit" class="btn btn-default">Đăng Nhập</button>
						</form>
						<style>
							ul.list-login{
								margin: 10px;
								padding: 0;
							}
							ul.list-login li{
								display: inline;
								margin: 10px;
							}
						</style>
						<ul class="list-login">
							<li><a href="{{url('/login_customer_google')}}"><img width="20%" src="{{asset('uploads/social/google.png')}}" alt="ảnh google"></a></li>
							<li><a href="{{url('/login_customer_facebook')}}"><img width="20%" src="{{asset('uploads/social/facebook.png')}}" alt="ảnh facebook"></a></li>
						</ul>
					</div>
					<!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-6">
					<div class="signup-form">
						<!--sign up form-->
						<h2>Đăng ký tài khoản</h2>
						<form action="{{url('/add_customer')}}" method="POST">
							@csrf
							<input name="customer_name" type="text" placeholder="Tên " />
							<input name="customer_email" type="text" placeholder="Địa chỉ email" />
							<input name="customer_password" type="password" placeholder="Mật Khẩu" />
							<input name="customer_phone" type="text" placeholder="Điện Thoại" />
							<button type="submit" class="btn btn-default">Đăng Ký</button>
							<br>
							<div style="" class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
							<br />
							@if($errors->has('g-recaptcha-response'))
							<span class="invalid-feedback" style="display:block;">
								<strong>{{$errors->first('g-recaptcha-response')}}</strong>
							</span>
							@endif

						</form>
					</div>
					<!--/sign up form-->
				</div>
			</div>
		</div>
	</section>
	<!--/form-->


</div>
@stop()