@extends('admin.main')
@section('content')
	

    <button class="btn btn-success"><a href="{{route('account.create')}}">Thêm sản phẩm</a> </button>
		<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
     Basic table
    </div>
    <div>
      <table class="table" ui-jq="footable" ui-options='{
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
            <th data-breakpoints="xs">ID</th>
            <th>Name</th>
            <th>Email</th>
            <th data-breakpoints="xs">password</th>
           
            <th data-breakpoints="xs sm md" data-title="DOB">Tình Trạng</th>
            <th data-breakpoints="xs">Function</th>
          </tr>
        </thead>
        <tbody>
        @foreach($data as $data)
          <tr data-expanded="true">
                    <td>{{$data->id}}</td>
                     <td>{{$data->name}}</td>
                     <td>{{$data->email}}</td>
                     <td>{{$data->password}}</td>
                    
                     @if($data->level == 1)
                     <td><span class="badge badge-success">Admin </span></td>
                 
                    @else
                    <td><span class="badge badge-warning"> Khách Hàng </span></td>
             
                      @endif
                     
                     <td>
                         <a href="{{route('account.edit',$data->id)}}" class="btn btn-success"><i class='fa fa-edit'></i></a>
                         <a href="{{route('account.destroy',$data->id)}}" class="btn btn-warning btndelete"><i class='fa fa-trash'></i></a>
                     </td>
          </tr>
          @endforeach
         
        </tbody>
      </table>
      
      <form action="" method='POST' id="form-delete">
            @csrf @method('DELETE')
         </form>

    </div>
  </div>
</div>



@stop
@section('js')
    <script type="text/javascript">
        $('.btndelete').click(function(ev){
            ev.preventDefault();
            var _href =$(this).attr('href');
            $('form#form-delete').attr('action',_href);

            if(confirm('Bạn có chắc không ? ')){
                $('form#form-delete').submit();
            }

        })
    </script>
@stop()