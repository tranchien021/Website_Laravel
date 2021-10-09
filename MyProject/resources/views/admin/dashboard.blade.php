@extends('admin.main')
@section('content')
<div class="container-fluid">
	<style>

	</style>
	<div class='row'>
		<p class="title_thongke">Thống kê đơn hàng doanh số </p>
		<form autocomplete="off">
			@csrf
			<div class="col-md-2">
				<p>Từ ngày <input type="text" id="datepicker" class="form-control"></p>
				<input style="margin: 20px 0px;" type="button " id="btn-dashboard-filter" class="btn btn-success btn-sm" value="Lọc kết quả">

			</div>
			<div class="col-md-2">
				<p>Đến ngày <input type="text" name="" id="datepicker2" class="form-control"></p>
			</div>
			<div class="col-md-2">
				<p>
					Lọc theo:
					<select name="" id="" class="dashboard-filter form-control">
						<option>--- Lọc ngày --- </option>
						<option value="7ngay">7 ngày qua</option>
						<option value="thangtruoc">Tháng trước</option>
						<option value="thangnay">Tháng này</option>
						<option value="365ngayqua">365 ngày qua </option>
					</select>
				</p>
			</div>
		</form>
		<div class="col-md-12">
			<div id="chart" style="width:100%;height: 250px;"></div>
		</div>
		<div class="col-md-12" style="padding: 20px;">
			<h2>Thông kê lượng truy cập</h2>
			<table class="table">
				<thead>
					<tr>
						<th scope="col">Đang online </th>
						<th scope="col">Tháng này </th>
						<th scope="col">Tháng trước</th>
						<th scope="col">Cả năm</th>
						<th scope="col">Tổng </th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{{$visitors_count}}</td>
						<td>{{$visitors_thisMonth_count}}</td>
						<td>{{$visitors_lastMonth_count}}</td>
						<td>{{$visitors_year_count}}</td>
						<td>{{$visitors_total}}</td>
					</tr>
				
				</tbody>
			</table>
		</div>
		<div class="col-md-4 col-xs-12"> 
			<h3 class="title_thongke" style="padding-bottom:10px;">Thống kê bài viết, tài khoản</h3>
			<div id="donut"></div>
		</div>
		<div class="col-md-4 col-xs-12">
			<h3  style="padding-bottom:10px;">Thống kê sản phẩm xem nhiều </h3>
			<p></p>
			<ol class="list_views">
				@foreach($product_view as $product)
				<li><a type="_blank" href="{{url('/product_detail/'.$product->id)}}"> {{$product->name}} | <span style="color:red"> {{$product->product_view}} </span></a></li>
				@endforeach

			</ol>
		</div>
		<div class="col-md-4 col-xs-12 ">
			<h3  style="padding-bottom:10px;">Thống kê lượt xem bài viết </h3>
			<p></p>
			<ol class="list_views">
				@foreach($blog_view as $blog)
				<li><a type="_blank" href="{{url('/bai_viet/'.$blog->blog_slug)}}"> {{$blog->blog_title}} | <span style="color:red"> {{$blog->blog_view}} </span></a></li>
				@endforeach

			</ol>
		</div>
		

	</div>


</div>




@stop