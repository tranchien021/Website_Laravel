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
                           Thêm phí vận chuyển theo địa điểm
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class=" form">
                                <form class="cmxform form-horizontal " id="commentForm" action="" method="POST" novalidate="novalidate">
                                 @csrf
                                    
                                    <div class="form-group ">
                                        <label for="comment" class="control-label col-lg-3">Chọn thành phố </label>
                                        <div class="col-lg-6">
                                        <select name='city' id="city" class="form-control choose city">
                                            @foreach($city as $city)
                                              <option value="{{$city->matp}}">{{$city->name_city}}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>
                                     
                                    <div class="form-group ">
                                        <label for="comment" class="control-label col-lg-3">Chọn quận huyện</label>
                                        <div class="col-lg-6">
                                        <select  name='province' id="province"  class="form-control choose province">
                                            <option value="">----- Chọn quận huyện ------</option>
                                              
                                        </select>
                                        </div>
                                    </div>
                                     
                                    <div class="form-group ">
                                        <label for="comment" class="control-label col-lg-3">Chọn phường xã </label>
                                        <div class="col-lg-6">
                                        <select  name='wards' id="wards"  class="form-control wards">
                                            <option value="">----- Chọn xã phường ------</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Phí vận chuyển </label>
                                        <div class="col-lg-6">
                                            <input class=" form-control money_ship" id="money_ship" name="money_ship" type="text" required="">
                                        </div>
                                    </div>
                                  
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button name="add_delivery" class="btn btn-primary add_delivery" type="button">Thêm phí vận chuyển </button>
                                            <a href="{{url('/admin/list_coupon')}}" class="btn btn-default" type="button">Trở về</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div id="load_delivery">

                            </div>

                        </div>
                    </section>
                </div>
            </div>
            



      
@stop()
