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
                        @php
                            $token=$_GET['token'];
                            $email=$_GET['email'];
                        @endphp
                        <!--login form-->
                        <h2>Điển mật khẩu mới  </h2>
                        <form action="{{url('/change_password')}}" method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{$token}}">
                            <input type="hidden" name="email" value="{{$email}}">  
                            <input type="text" name="pass_account" placeholder="Nhập mật khẩu mới  " />
                            <button type="submit" class="btn btn-default"> Cập nhật  </button>
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