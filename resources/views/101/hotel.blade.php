<section class="gray-bg">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="heading">
							<span class="theme-cl">Select Hotel</span>
							<h1>Top Hotel</h1>
						</div>
					</div>
				</div>
				<div class="row">
					
					@foreach($hotels as $hotel)
					<div class="col-md-4 col-sm-6">
						<article class="hotel-box style-1">

							<div class="hotel-box-image">
								
								<figure>
									
									<a  href="{{url('hotel-details/'.$hotel->user_id)}}" onclick="return calendar()">
										@method('put')
										 
										<img src="{{asset('images/'.$hotel->image)}}" class="img-responsive listing-box-img" alt="" />
										<div class="list-overlay"></div>
										<div class="read_more"><span>Book now</span></div>
									</a>
									
									<div class="discount-flick">-12%</div>
									<h4 class="hotel-place">
										<a href="#">{{$hotel->name}}</a>
									</h4>
									
								</figure>
								
							</div>
							
							<div class="entry-meta">
								<div class="meta-item meta-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-half"></i>
								</div>
								<div class="meta-item meta-comment fl-right">
									<span class="real-price padd-l-10">From ₱ {{number_format($hotel->price)}} / Night</span>
								</div>
							</div>
							
							<div class="hotel-detail-box">
								<div class="hotel-ellipsis">
									<h4 class="hotel-name">
										<a >{{$hotel->address}}</a>
									</h4>
									<a id="v{{$hotel->id}}"  onclick="$('#{{$hotel->id}}').show();$('#v{{$hotel->id}}').hide();$('#h{{$hotel->id}}').show();$('#h1{{$hotel->id}}').show();">See details <i class=" fa  fa-chevron-left fa-xs"></i></a>

									<a id="h{{$hotel->id}}" style="display: none" onclick="$('#{{$hotel->id}}').hide();$('#v{{$hotel->id}}').show();$('#h{{$hotel->id}}').hide();$('#h1{{$hotel->id}}').hide();">Hide details <i class=" fa  fa-chevron-down fa-xs"></i></a>

									<p id="{{$hotel->id}}" style="display: none;text-align:justify; ">{{$hotel->description}}</p>
									<a id="h1{{$hotel->id}}" style="display: none" onclick="$('#{{$hotel->id}}').hide();$('#v{{$hotel->id}}').show();$('#h{{$hotel->id}}').hide();$('#h1{{$hotel->id}}').hide();">Hide details <i class=" fa  fa-chevron-up fa-xs"></i></a>
								</div>
							</div>

							<div class="hotel-inner inner-box">
								<div class="box-inner-ellipsis">
									<div class="hotel-review entry-location">
										<span class="review-status bg-success"><i class="ti-check"></i></span>
										<h6><span class="cl-success font-bold">Good</span>1362 Review</h6>
									</div>
									<div class="view-box">
										<div class="fl-right">
											<span><i class="ti-eye padd-r-5"></i>782</span>
										</div>
									</div>
								</div>
							</div>
							
						</article>
					</div>
					
				@endforeach
					
				</div>
				
					
				
			</div>
			
		</section>