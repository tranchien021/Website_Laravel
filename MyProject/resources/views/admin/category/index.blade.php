@extends('admin.main')
@section('content')
    <button class="btn btn-success"><a href="{{route('category.create')}}">Thêm sản phẩm</a> </button>
        <table class="table table-hover">
             <thead>
                 <tr>
                     <th>Id </th>
                     <th>Name </th>
                     <th>Category</th>
                     <th>Tổng sản phẩm</th>
                     
                     <th>Function</th>
                     
                 </tr>
             </thead>
             <tbody>
                @foreach($data as $data)
                 <tr>
                     <td>{{$data->id}}</td>
                     <td>{{$data->Tên}}</td>
                     <td>{{$data->theloai}}</td>
                     <td>{{$data->products ? $data->products->count() : 0 }}</td>
                     
                     <td>
                         <a href="{{route('category.edit',$data->id)}}" class="btn btn-success"><i class='fa fa-edit'></i></a>
                         <a href="{{route('category.destroy',$data->id)}}" class="btn btn-warning btndelete"><i class='fa fa-trash'></i></a>
                     </td>

                     
                 </tr>
                 @endforeach
             </tbody>
         </table> 
         <form action="" method='POST' id="form-delete">
            @csrf @method('DELETE')
         </form>


      
@stop()
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