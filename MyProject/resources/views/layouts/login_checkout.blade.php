@extends('about')
<!-- noi dung ben trong  -->
@section('main')
    <div class="col-sm-9 padding-right">
        <section style="margin-top:5px;" id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Đăng nhập tài khoản </h2>
						<form action="{{url('/login_customer')}}" method="POST">
						@csrf
							<input type="text" name="email_account" placeholder="Email" />
							<input type="text" name="password_account" placeholder="Password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Ghi nhớ đăng nhập
							</span>
							<button type="submit" class="btn btn-default">Đăng Nhập</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Đăng ký tài khoản</h2>
						<form action="{{url('/add_customer')}}" method="POST">
							@csrf
							<input name="customer_name" type="text" placeholder="Tên "/>
							<input name="customer_email" type="text" placeholder="Địa chỉ email"/>
							<input name="customer_password" type="password" placeholder="Mật Khẩu"/>
							<input name="customer_phone" type="text" placeholder="Điện Thoại"/>
							<button type="submit" class="btn btn-default">Đăng Ký</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
						
					
		</div>
@stop()