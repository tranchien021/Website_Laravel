@extends('admin.main')
@section('content')
  
    <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cập nhật tài khoản khách hàng 
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class=" form">
              
                                <form  id="commentForm" class="cmxform form-horizontal " action="{{url('/admin/update_customer/'.$customer->customer_id)}}" method="POST">
                                   @csrf
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-3">Tên tài khoản </label>
                                        <div class="col-lg-6">
                                              <input value="{{$customer->customer_name}}"  class="form-control"  type="text" name="customer_name">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-3">Email</label>
                                        <div class="col-lg-6">
                                         <input  value="{{$customer->customer_email}}" class="form-control"  type="text" name="customer_email">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-3">Mật khẩu </label>
                                        <div class="col-lg-6">
                                         <input  value="{{$customer->customer_password}}" class="form-control"  type="text" name="customer_password" >
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-3">Số điện thoại</label>
                                        <div class="col-lg-6">
                                         <input  value="{{$customer->customer_phone}}" class="form-control"  type="text" name="customer_phone" >
                                        </div>
                                    </div>
                                 
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button type="submit" class="btn btn-primary">Cập nhật tài khoản </button>
                                            <a href="{{url('/admin/list_customer')}}" class="btn btn-default" type="button">Trở về </a>
                                        </div>
                                    </div>
                          
                                </form>
        

                    
                              
                            </div>

                        </div>
                    </section>
                </div>
            </div>


      
@stop()
