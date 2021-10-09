@extends('about')
<!-- noi dung ben trong  -->
@section('main')
<div class="col-sm-9 padding-right">
    <section style="margin-top:5px;" id="form">
        <!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-sm-offset-1">
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
                        <h2>Quên mật khẩu </h2>
                        <form action="{{url('/get_password')}}" method="POST">
                            @csrf
                            <input type="text" name="email_account" placeholder="Nhập email " />
                            <button type="submit" class="btn btn-default">Gửi email xác thực  </button>
                        </form>
                    </div>
                    <!--/login form-->
                </div>


            </div>
        </div>
    </section>
    <!--/form-->


</div>
@stop()