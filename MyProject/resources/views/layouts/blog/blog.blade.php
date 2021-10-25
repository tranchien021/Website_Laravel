@extends('about')
<!-- noi dung ben trong  -->
@section('main')
<div class="col-sm-9">
	<div class="blog-post-area">
		<h2 class="title text-center">Danh sách bài viết mới nhất </h2>
		@foreach($post as $posts)

		<div class="single-blog-post" sytle="margin:10px 0px ;padding:2px">
			<div class="text-center">
				<img style="float:left;width:30%; padding:5px; height:150px" src="{{url('uploads')}}/blog/{{$posts->blog_image}}" alt="">
				<h4 style="color:#000;padding:5px">{{$posts->blog_title}}</h4>
				<p>{{$posts->blog_desc}}</p>
			</div>
			<div class="text-right">
				<a class="btn btn-default btn-sm" href="{{url('/bai_viet/'.$posts->blog_slug)}}">Xem bài viết</a>
			</div>
			<div class="clearfix"></div>
		</div>
		@endforeach

		<div class="pagination-area">
			<span>{!! $post->links()!!}</span>
		</div>
	</div>
</div>


@stop()