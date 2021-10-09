@extends('admin.main')
@section('content')
<div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>
                    @elseif(session()->has('error'))
                        <div class="alert alert-success">
                            {{session()->get('error')}}
                        </div>
                    @endif
                        <header class="panel-heading">
                           Thêm phiếu giảm giá 
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class=" form">
                                <form class="cmxform form-horizontal " id="commentForm" action="{{url('/insert_coupon_code')}}" method="POST" novalidate="novalidate">
                                 @csrf
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Tên mã giảm giá </label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="cname" name="coupon_name" minlength="2" type="text" required="">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Ngày bắt đầu giảm giá </label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="date_start" name="coupon_date_start"  type="text" required="">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Ngày kết thúc giảm giá </label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="date_end" name="coupon_date_end" type="text" required="">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-3">Mã giảm giá </label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="cemail" type="text" name="coupon_code" required="">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-3">Số lượng mã </label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="curl" type="text" name="coupon_time">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="comment" class="control-label col-lg-3">Tính năng mã</label>
                                        <div class="col-lg-6">
                                        <select name='coupon_condition'>
                                              <option value="1">Giảm theo %</option>
                                              <option value="0">Giảm theo tiền </option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-3"> Số % hoặc tiền giảm  </label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="curl" type="text" name="coupon_number">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button name="add_coupon" class="btn btn-primary" type="submit">Thêm mã </button>
                                            <a href="{{url('/admin/list_coupon')}}" class="btn btn-default" type="button">Trở về</a>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </section>
                </div>
            </div>



      
@stop()
