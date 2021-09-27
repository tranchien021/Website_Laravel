@extends('about')
<!-- noi dung ben trong  -->
@section('main')
<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
					
						<h2 class="title text-center">Video trang web </h2>
						@foreach($video as $video)
						<div class="col-sm-3">
							<div class="">

								<div class="single-products">
									<div class="productinfo text-center">
										
										<a href="">
											<img src="{{url('uploads/video/'.$video->video_image)}}" alt="Không có ảnh" />
											<h2>{{$video->video_title}}</h2>
											<p>{{$video->video_desc}}</p>
										</a>
										<button id="{{$video->video_id}}" type="button" class="btn btn-primary watch_video" data-toggle="modal" data-target="#exampleModal">
												Xem video
										</button>
									
									
										
										
									</div>
									
								</div>
								
							</div>
						</div>
						@endforeach
						
					</div><!--features_items-->
					
				
				</div>
				

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="video_title">Xem video</h5>
        
      </div>
      <div class="modal-body">
		  <div id="video_desc">

		  </div>
        <div id="video_link">
			
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng video </button>
       
      </div>
    </div>
  </div>
</div>
@stop()