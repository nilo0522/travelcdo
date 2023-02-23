
@extends('layouts.agencylayout')
@section('content')
@include('101.header2')

<section class="gray-bg">
			<div class="container">
				<div class="row">
					
					<!-- Filter Sidebar -->
					<div class="col-md-4 col-sm-12">
						
						<div class="tr-single-box">
							
							<div id="filter" class="collapse in">
								
								<!-- Input Box Search -->
								<div class="tr-single-body" style="background: linear-gradient(to bottom,#febb02 0,#febb02 100%);">
									<div class="row">
										<form action="{{ action('HotelGridController@store') }}" method="post" onsubmit="return calendar();">
										<div class="col-md-12">
											<h4>Search</h4>
										</div>
										<br><br>
										<div class="col-md-12">
											<label>Destination/property name:</label>
											<input type="text" class="form-control br-1" value="Cagayan de Oro City" readonly="">
										</div>
										<div class="col-md-12">
											<label>Checkin & Checkout</label>
											<input type="text" name="book-date" class="form-control br-1"  autocomplete="off" id="book" value="" placeholder="{{ session('room.start') }}-{{ session('room.ends') }}">
											
										</div>
										<div class="col-md-12">
											<label id="nights">{{ session('night') }} - night stay</label>
											<select class="wide form-control br-1" name="person">
												<option disabled="">Person</option>
												<option value="1"  @if(session('room.person')=="1") selected="" @endif>01 person</option>
												<option value="2" @if(session('room.person')=="2") selected="" @endif>02 person</option>
												<option value="3" @if(session('room.person')=="3") selected="" @endif>03 person</option>
												
											</select>
										</div>
										<div class="col-md-12">
											<button type="submit" class="btn theme-btn cl-white seub-btn" >FIND Hotel</button>
										</div>
										<input type="hidden" name="start" id="start" value="" >
										<input type="hidden" name="ends" id="ends" value="">
										@csrf
									</form>
									</div>
								</div>
								
								<!-- Range Slider -->
							
								<!-- Distance -->
								<div class="tr-inner-single-box">
									<div class="tr-single-header">
										<h4 style="color: black">Filter by :</h4>
										
									</div>
									<div class="tr-single-body">
										<label><b style="color: black">Your Budget</b></label>
										<ul class="side-list-check">
											<li>
												<span class="custom-checkbox">
													<input type="checkbox" id="p1" onclick="chck()" >
													<label for=""></label>
												</span>
												<span style="color: black">₱ 0 - ₱ 2,800 per night</span>
												
											</li>
											<li>
												<span class="custom-checkbox">
													<input type="checkbox" id="p2" onclick="chck()" >
													<label for=""></label>
												</span>
												<span style="color: black">₱ 2,801 - ₱ 5,600 per night</span>
												
											</li>
											<li>
												<span class="custom-checkbox">
													<input type="checkbox" id="p3" onclick="chck()" >
													<label for=""></label>
												</span>
												<span style="color: black">₱ 5,601 + per night</span>
												
											</li>
										</ul>
									</div>
									<div class="tr-single-body">
										<div class="tr-single-header"><h4></h4></div>
										<br>
										<label><b style="color: black">Distance from City</b></label>
										<br><br>
										<ul class="side-list-check">
											<li>
												<span class="custom-checkbox">
													<input type="checkbox" id="km1" onclick="chck2()">
													<label for="144"></label>
												</span>
												<span style="color: black">Between 1Km To 10Km</span>
												

											</li>
											<li>
												<span class="custom-checkbox">
													<input type="checkbox" id="km2" onclick="chck2()">
													<label for="133"></label>
												</span>
												<span style="color: black">Between 11Km To 20Km</span>
											</li>
											<li>
												<span class="custom-checkbox">
													<input type="checkbox" id="km3" onclick="chck2()">
													<label for="122"></label>
												</span>
												<span style="color: black">Between 21Km+ </span>
											</li>
											
										</ul>
									</div>
								</div>
								
								<!-- Start Rating -->
							
								
								<!-- Tour Type -->
							
								
								
								<div class="tr-inner-single-box">
									<div class="tr-single-header"><h4></h4></div>
									<br>
										
									<div class="tr-single-body">
										<label><b style="color: black">Include & Allowed</b></label>
										<br><br>
										<ul class="side-list-check">
											<li>
												<span class="custom-checkbox">
													<input type="checkbox" id="i1" onclick="chck3()">
													<label for="i1"></label>
												</span>
												<span style="color: black">Pet Allowed</span>
											</li>
											<li>
												<span class="custom-checkbox">
													<input type="checkbox" id="i2" onclick="chck3()">
													<label for="i2"></label>
												</span>
												<span style="color: black">Breakfast</span>
											</li>
											
										</ul>
									</div>
								</div>
								
							</div>
						</div>
						
					</div>
					
					<!-- All Item -->
					<div class="col-md-8 col-sm-12">
						
						<!-- Row -->
						<div class="row mrg-0">
							<div class="tr-single-box short-box">
								<div class="col-sm-12 align-self-center">
									<h4>Cagayan de Oro: {{ count($hotels) }} properties found</h4>
									<label>3 reasons to visit: <b>food</b>, <b>friendly locals</b> and <b>adventure</b></label>
								</div>
								
								
							</div>
						</div>
						<!-- /Row -->
						
						<!-- Row -->
						<div class="row">
							@foreach($hotels as $hotel)

					<div class="col-md-6 col-sm-6" id="hotels0{{ $hotel->id }}">
						<article class="hotel-box style-1">

							<div class="hotel-box-image">
								
								<figure>
									
									<a  href="{{url('hotel-details/'.$hotel->hotel_id)}}">
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
									<label> {{ $hotel->distance }} km distance from city</label>
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
							@foreach($hotels as $hotel)

					<div class="col-md-6 col-sm-6" id="hotels{{ $hotel->id }}" style="display: none">
						<article class="hotel-box style-1">

							<div class="hotel-box-image">
								
								<figure>
									
									<a  href="{{url('hotel-details/'.$hotel->user_id)}}">
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
									<label> {{ $hotel->distance }} km distance from city</label>
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
						<!-- /Row -->
						
						
						
					</div>
					
				</div>
			</div>
		</section>

		
		<script>
			function chck(){
				if (document.getElementById("p1").checked) {
				@foreach($hotels	 as $h)
				@if($h->price >0 && $h->price <=2800)
				$('#hotels{{ $h->id }}').show();
				$('#hotels0{{ $h->id }}').hide();
				@else
				$('#hotels0{{ $h->id }}').hide();
				
				@endif

				@endforeach
				
			}
			 if(document.getElementById("p1").checked==false){
				@foreach($hotels	 as $h)
				@if($h->price >0 && $h->price <=2800)

				$('#hotels{{ $h->id }}').hide();
				
				
				@endif

				@endforeach

			}
			if (document.getElementById("p2").checked) {
				@foreach($hotels	 as $h)
				@if($h->price >2801 && $h->price <=5600	)
				$('#hotels{{ $h->id }}').show();
				$('#hotels0{{ $h->id }}').hide();
				@else
				$('#hotels0{{ $h->id }}').hide();
				
				@endif

				@endforeach
				
			}
			if(document.getElementById("p2").checked==false){
				@foreach($hotels	 as $h)
				@if($h->price >2801 && $h->price <=5600)

				$('#hotels{{ $h->id }}').hide();
				
				
				@endif

				@endforeach

			}
			if (document.getElementById("p3").checked) {
				@foreach($hotels	 as $h)
				@if($h->price >5601)
				$('#hotels{{ $h->id }}').show();
				$('#hotels0{{ $h->id }}').hide();
				@else
				$('#hotels0{{ $h->id }}').hide();
				
				@endif

				@endforeach
				
			}if(document.getElementById("p3").checked==false){
				@foreach($hotels	 as $h)
				@if($h->price >5601)

				$('#hotels{{ $h->id }}').hide();
				
				
				@endif

				@endforeach

			}if (document.getElementById("p2").checked==false && document.getElementById("p1").checked==false && document.getElementById("p3").checked==false) {
				@foreach($hotels	 as $h)
				
				$('#hotels0{{ $h->id }}').show();
				
				@endforeach

			}
			$('#km1').attr('checked',false);
			$('#km2').attr('checked',false);
			$('#km3').attr('checked',false);
			 }

			
		
		</script>
<script >
	function chck2(){
				if (document.getElementById("km1").checked) {
				@foreach($hotels as $h)
				@if(round($h->distance) >0 && round($h->distance) <=10)
				
					
				$('#hotels{{ $h->id }}').show();
				$('#hotels0{{ $h->id }}').hide();
				@else
				$('#hotels0{{ $h->id }}').hide();
				
				
				@endif

				@endforeach
				
			}if (document.getElementById("km1").checked==false) {
				@foreach($hotels as $h)
				@if(round($h->distance) >0 && round($h->distance) <=10)
				
					

				$('#hotels{{ $h->id }}').hide();
				
				
				
				@endif

				@endforeach
				
			}if (document.getElementById("km2").checked) {
				@foreach($hotels as $h)
				@if(round($h->distance) >10 && round($h->distance) <=20)
				
					
				$('#hotels{{ $h->id }}').show();
				$('#hotels0{{ $h->id }}').hide();
				@else
				$('#hotels0{{ $h->id }}').hide();
				
				
				@endif

				@endforeach
				
			}if (document.getElementById("km2").checked==false) {
				@foreach($hotels as $h)
				@if(round($h->distance) >10 && round($h->distance) <=20)
				
					

				$('#hotels{{ $h->id }}').hide();
				
				
				
				@endif

				@endforeach
				
			}
			if (document.getElementById("km3").checked) {
				@foreach($hotels as $h)
				@if(round($h->distance) >20)
				
					
				$('#hotels{{ $h->id }}').show();
				$('#hotels0{{ $h->id }}').hide();
				@else
				$('#hotels0{{ $h->id }}').hide();
				
				
				@endif

				@endforeach
				
			}if (document.getElementById("km3").checked==false) {
				@foreach($hotels as $h)
				@if(round($h->distance) >20)
				
					

				$('#hotels{{ $h->id }}').hide();
				
				
				
				@endif

				@endforeach
				
			}if (document.getElementById("km1").checked==false && document.getElementById("km2").checked==false && document.getElementById("km3").checked==false) {
				@foreach($hotels	 as $h)
				
				$('#hotels0{{ $h->id }}').show();
				
				@endforeach

			}
			$('#p1').attr('checked',false);
			$('#p2').attr('checked',false);
			$('#p3').attr('checked',false);
			
		}
</script>

		@endsection