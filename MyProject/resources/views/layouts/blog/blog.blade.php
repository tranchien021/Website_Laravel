@extends('about')
<!-- noi dung ben trong  -->
@section('main')
<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Danh sách bài viết mới nhất </h2>
						@foreach($post as $posts)
						<div class="single-blog-post">
							<h3>{{$posts->blog_title}}</h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i> Admin </li>
									<li><i class="fa fa-clock-o"></i> {{$posts->time}}</li>
									<li><i class="fa fa-calendar"></i>{{$posts->created_at}}</li>
								</ul>
								<span>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
								</span>
							</div>
							<a href="{{url('/bai_viet/'.$posts->blog_slug)}}">
								<img src="{{url('uploads')}}/blog/{{$posts->blog_image}}" alt="">
							</a>
							<p>{{$posts->blog_desc}}</p>
							<a  class="btn btn-primary" href="{{url('/bai_viet/'.$posts->blog_slug)}}">Xem thêm</a>
						</div>
                        @endforeach
						
						<div class="pagination-area">
							<span>{!! $post->render()!!}</span>
						</div>
					</div>
				</div>

				
@stop()