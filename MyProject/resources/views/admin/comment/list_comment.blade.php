@extends('admin.main')
@section('content')
 
    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>
                    @elseif(session()->has('error'))
                        <div class="alert alert-success">
                            {{session()->get('error')}}
                        </div>
                    @endif
    <p></p>
		<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
     Danh sách bình luận 
    </div>
    <div id="notify_comment"></div>
    <div>
      <table  id="myTable" class="table"  ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>
        <thead>
          <tr>
            <th>Duyệt</th>
            <th>Tên người gửi</th>
            <th>Bình luận </th>
            <th>Ngày gửi</th>
            <th>Sản phẩm </th>
            <th>Quản lý</th>
          </tr>
        </thead>
        <tbody>
        @foreach($comment as $comm)
          <tr>
                    <td>
                        @if($comm->comment_status==1)
                            <input type="button" data-comment_status="0" data-comment_id="{{$comm->comment_id}}" id="{{$comm->comment_product_id}}" class="btn btn-success comment_access_btn" value="Duyệt">
                        @else
                            <input type="button" data-comment_status="1" data-comment_id="{{$comm->comment_id}}" id="{{$comm->comment_product_id}}" class="btn btn-danger comment_access_btn" value="Bỏ duyệt">
                        @endif
                    </td>
                    <td>{{$comm->comment_name }}</td>
                    <td>{{$comm->comment}}
                      <style>
                        ul.list_rep li {
                          list-style-type: decimal;
                          color:blue;
                          margin: 5px 40px;
                        }
                      </style>
                      <ul class="list_rep">
                      Trả lời :
                       @foreach($comment_rep as $comm_reply)
                          @if($comm_reply->comment_parent==$comm->comment_id)
                            <li>{{$comm_reply->comment}}</li>
                          @endif
                       @endforeach
                      </ul>
                      @if($comm->comment_status==0)
                        <br><textarea class="form-control reply_comment_{{$comm->comment_id}}" rows="5"></textarea>
                        <br><button class="btn btn-default btn-xs btn-reply-comment" data-comment_id="{{$comm->comment_id}}" data-product_id="{{$comm->comment_product_id}}">Trả lời bình luận </button>
                      @else
                      @endif
                     
                    </td>
                    <td>{{$comm->comment_date}}</td>
                    <td><a href="{{url('/product_detail/'.$comm->products->id)}}">{{$comm->products->name}}</a></td>
                     <td>
                         <a href="" class="btn btn-success"><i class='fa fa-edit'></i></a>
                         <a href="" class="btn btn-warning"><i class='fa fa-trash'></i></a>
                     </td>
          </tr>
          @endforeach
         
        </tbody>
      </table>
      
    

    </div>
  </div>
</div>


  
@stop
