@extends('about')
<!-- noi dung ben trong  -->
@section('main')
<div class="col-sm-9">
					<div class="blog-post-area">

					<h2 class="title text-center">Chi tiết bài viết</h2>
                    @foreach($post as $posts)
						
						<div class="single-blog-post">
							<h2>{{$posts->blog_title}}</h2>
							<h3>{{$posts->blog_desc}}</h3>
							
							<a href="{{url('/bai_viet/'.$posts->blog_slug)}}">
								<img src="{{url('uploads')}}/blog/{{$posts->blog_image}}" alt="">
							</a>
							<p>{!!$posts->blog_content!!}</p>
							
						</div>
                        @endforeach
						
						<h2 style="margin: 20px 0px;" class="title text-center">Bài viết liên quan </h2>
						<style>
							ul.post_relate li {
								list-style-type: disc;
								font-size:16px;
								padding:6px;
							}
							ul.post_relate li a{
								color:#000;

							}
							ul.post_relate li a:hover{
								color:#FE980F;
							}
						</style>
						<ul class="post_relate">
							@foreach($related as $post_related)
								<li><a href="{{url('/bai_viet/'.$post_related->blog_slug)}}">{{$post_related->blog_title}}</a></li>
							@endforeach
						</ul>
						
					</div>
</div>

				
@stop()