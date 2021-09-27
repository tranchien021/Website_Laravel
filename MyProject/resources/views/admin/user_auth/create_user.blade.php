@extends('admin.main')
@section('content')
<div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm tài khoản Auth
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class=" form">
                                <form class="cmxform form-horizontal " id="commentForm" action="{{url('/admin/store_users')}}" method="POST" novalidate="novalidate">
                                 @csrf
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Name </label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="cname" name="name" minlength="2" type="text" required="">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-3">E-Mail </label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="cemail" type="email" name="email" required="">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-3">Pasword </label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="curl" type="url" name="password">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-3">Phone  </label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="curl" type="url" name="phone">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit">Tạo tài khoản</button>
                                            <a href="{{url('/admin/user_auth')}}" class="btn btn-default" type="button">Quay lại</a>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </section>
                </div>
            </div>



      
@stop()
