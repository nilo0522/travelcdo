
@extends('layouts.agencylayout')
@section('content')
@foreach($hotel_details as $hd)

@include('101.header2')
		
<section class="profile-header-nav padd-0 bb-1" style="background-color: #003580;padding-top: 100px" >
			<div class="container">
				
				<div class="row">
					<div class="col-md-8 col-sm-8">
						<div class="tab" role="tabpanel">
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="#Overview" aria-controls="home" role="tab" data-toggle="tab"><i class="ti-user"></i>Overview</a></li>
								<li role="presentation"><a href="#Features" aria-controls="profile" role="tab" data-toggle="tab"><i class="ti-settings"></i>Features</a></li>
								<li role="presentation"><a href="#Review" aria-controls="messages" role="tab" data-toggle="tab"><i class="ti-thumb-up"></i>Review</a></li>
								<li role="presentation"><a href="#Photos" aria-controls="messages" role="tab" data-toggle="tab"><i class="ti-gallery"></i>Photos</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-4 col-sm-4">
						<div class="fl-right">
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="tr-single-detail gray-bg">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-sm-12">
						<div class="tab-content tabs">
							
							<div role="tabpanel" class="tab-pane fade in active" id="Overview">
								
								<!-- Overview -->
								<div class="row">
									<div class="tr-single-box">
										<div class="tr-single-header">
											<h4><i class="fa fa-star-o"></i>Overview</h4>
										</div>
										<div class="tr-single-body">
											<div class="row">
											
												<div class="col-md-6 col-sm-6">
													<div class="list-thumb-box">
														<img src='{{asset("images/$hd->image")}}' class="img-responsive" alt="" />
														<a href="#" class="list-like left"><i class="ti-heart"></i></a>
														<h5>4.8/<sub class="theme-cl">5</sub></h5>
													</div>
												</div>
												
												<div class="col-md-6 col-sm-6">
													<div class="list-overview-detail">
														<h5>{{$hd->name}}</h5>
														<ul class="extra-service">
															<li>
																<div class="icon-box-icon-block">
																	<a href="#">
																		<div class="icon-box-round">
																			<i class=" ti-location-pin"></i>
																		</div>
																		<div class="icon-box-text">
																			{{$hd->address}}
																		</div>
																	</a>
																</div>
															</li>
															
															<li>
																<div class="icon-box-icon-block">
																	<a href="#">
																		<div class="icon-box-round">
																			<i class="ti-email"></i>
																		</div>
																		<div class="icon-box-text">
																			{{$hd->email}}
																		</div>
																	</a>
																</div>
															</li>
														</ul>
													</div>
												</div>
												
											</div>
										</div>
									</div>
								</div>
								
								<!-- Advance features -->
								<div class="row">
									<div class="tr-single-box">
										<div class="tr-single-header">
											<h4><i class="ti-thumb-up"></i>Advance Features</h4>
										</div>
										<div class="tr-single-body">
											<div class="row">
												@foreach($hotel_facilities as $hf)
												<div class="col-md-4 col-sm-6">
													<div class="listing-features">
														<div class="listing-features-box">
															<div class="listing-features-thumb">
																<img src="assets/img/muscle.png" class="img-responsive" alt="" />
															</div>
															<div class="listing-features-detail">
																<h4>{{$hf->facilities}}</h4>
															</div>
														</div>
													</div>
												</div>
												
												@endforeach
												
											</div>
										</div>
									</div>
								</div>
								
								<!-- Ratting -->
								<div class="row">
									<div class="tr-single-box">
										<div class="tr-single-header">
											<h4><i class="fa fa-star-o"></i>Ratting</h4>
										</div>
										<div class="tr-single-body">
											<div class="row">
												<div class="col-sm-4">
													<div id="review_summary">
														<strong>8.5</strong>
														<em class="cl-success">Superb</em>
														<small>Based on 4 reviews</small>
													</div>
												</div>
												<div class="col-sm-8">
													<div class="row">
														<div class="col-lg-10 col-9">
															<div class="progress">
																<div class="progress-bar progress-bar-success" role="progressbar" style="width: 98%" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100"></div>
															</div>
														</div>
														<div class="col-lg-2 col-3"><small><strong>5 stars</strong></small></div>
													</div>
													<!-- /row -->
													<div class="row">
														<div class="col-lg-10 col-9">
															<div class="progress">
																<div class="progress-bar progress-bar-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
															</div>
														</div>
														<div class="col-lg-2 col-3"><small><strong>4 stars</strong></small></div>
													</div>
													<!-- /row -->
													<div class="row">
														<div class="col-lg-10 col-9">
															<div class="progress">
																<div class="progress-bar progress-bar-primary" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
															</div>
														</div>
														<div class="col-lg-2 col-3"><small><strong>3 stars</strong></small></div>
													</div>
													<!-- /row -->
													<div class="row">
														<div class="col-lg-10 col-9">
															<div class="progress">
																<div class="progress-bar progress-bar-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
															</div>
														</div>
														<div class="col-lg-2 col-3"><small><strong>2 stars</strong></small></div>
													</div>
													<!-- /row -->
													<div class="row">
														<div class="col-lg-10 col-9">
															<div class="progress">
																<div class="progress-bar" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
															</div>
														</div>
														<div class="col-lg-2 col-3"><small><strong>1 stars</strong></small></div>
													</div>
													<!-- /row -->   
												</div>                  
											</div>
										</div>
									</div>
								</div>
								
								<!-- Description -->
								<div class="row">
									<div class="tr-single-box">
										<div class="tr-single-header">
											<h4><i class="ti-files"></i>Description</h4>
										</div>
										<div class="tr-single-body">
											<p>{{$hd->description}}</p>
										</div>
									</div>
								</div>
								
								<!-- Amenities -->
								<div class="row">
									<div class="tr-single-box">
										<div class="tr-single-header">
											<h4><i class="ti-crown"></i>Amenities</h4>
										</div>
										<div class="tr-single-body">
											<ul class="amenities third">

												@foreach($am as $a)
												@foreach($hotel_details as $h)
													@if($h->user_id == $a->user_id)
													<li>{{ $a->amenities }}</li>
													@endif
													@endforeach
													@endforeach     
											</ul>
										</div>
									</div>
								</div>
								
								<!-- Location -->
							
								
							</div>
							
							<!-- ============ Features =================== -->
							<div role="tabpanel" class="tab-pane fade in" id="Features">
								
								<!-- About Features -->
								<div class="row">
									<div class="tr-single-box">
										<div class="tr-single-header">
											<h4><i class="ti-files"></i>About Features</h4>
										</div>
										<div class="tr-single-body">
											<p>soon</p>
										</div>
									</div>
								</div>
								
								<!-- Extra features -->
								<div class="row">
									<div class="tr-single-box">
										<div class="tr-single-header">
											<h4><i class="ti-thumb-up"></i>Extra Features</h4>
										</div>
										<div class="tr-single-body">
											
											<ul class="simple-features-list">
												soon
											</ul>
											
										</div>
									</div>
								</div>
								
							</div>
							
							<!-- ============ Review =================== -->
							<div role="tabpanel" class="tab-pane fade in" id="Review">
								
								<!-- Review -->
								<div class="row">
									<div class="tr-single-box">
										<div class="tr-single-header">
											<h4><i class="ti-write"></i>All Review</h4>
										</div>
										<div class="tr-single-body">
											
											<!-- Single Review -->
											<div class="review-box">
												
												<div class="review-box-content">soon
												</div>
												
											</div>
											
										
											
										</div>
									</div>
								
								</div>
								
							</div>
							
							<!-- ============ Photos =================== -->
							<div role="tabpanel" class="tab-pane fade in" id="Photos">
								<div class="row">
									<div class="tr-single-box">
										<div class="tr-single-header">
											<h4><i class="ti-gallery"></i>All Gallery</h4>
										</div>
										<div class="tr-single-body">
											<ul class="gallery-list">
												@foreach($hotel_gallery as $hg)
												<li>
													<a data-fancybox="gallery" href="{{asset("images/$hg->image")}}">
														<img src='{{asset("images/$hg->image")}}' class="img-responsive" alt="" style="height: 100px;width: 150px">
													</a>
												</li>
												@endforeach
												
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="tr-single-header">
								<h3><i class="fa fa-check"></i>Availability</h3>
								<br><br>
								<div class="tr-single-body " style="border: solid black;border-width: 1px">
									<div class="row">
										<div class="col-md-4">
											<label style="color: black;font-weight: bold">Check-in date</label><br>
											<a onclick="window.location.hash = '#search';$('#book').focus();$('#book').val(null);"><label style="font-weight: bold;font-size: 16px;color: #0a75c2"><u>{{ date(" D j M Y",strtotime(session('room.start'))) }}
											</u>
											</label></a>
										</div>
										<div class="col-md-4">
											<label style="color: black;font-weight: bold">Check-out date</label><br>
											<a  onclick="window.location.hash = '#search';$('#book').focus();$('#book').val(null);"><label style="font-weight: bold;font-size: 16px;color: #0a75c2"><u>{{ date(" D j M Y",strtotime(session('room.ends'))) }}
											</u>
											</label></a>
										</div>
										<div class="col-md-2">
											<label style="color: black;font-weight: bold">Guest</label><br>
											<a  onclick="window.location.hash = '#search';$('#book').focus();$('#book').val(null);"><label style="font-weight: bold;font-size: 16px;color: #0a75c2" ><u>
												@if( session('room.person')==1) {{ session('room.person'). ' adult' }}
												@else {{ session('room.person'). '  adults' }}
												@endif
											</u>
											</label></a>
										</div>
										
									</div>
									<br><br>
									<div class="row">
										<div class="col-md-12" style="text-align: left">
											<button class="btn btn-sm" style="background-color:#0a75c2;color: white;font-weight: bold;border: solid white;line-height: 1.5;box-shadow: 0 0 3px #aaa; " onclick="window.location.hash = '#search';$('#book').focus();$('#book').val(null);">Change search</button>
											
										</div>
									</div>
									
								</div>
							</div>
							<div class="tr-single-body ">
								<div class="row">
									<div class="col-md-12 table-responsive " >
										<table class="table  table-bordered table-head-fixed" style="height: 200px">
											<thead class=""  style="background-color: #003580;color: white" id="vovo">
												<tr>
													<th width="20px">Room type</th>
													<th >Sleeps</th>
													<th width="50px">Today's price</th>
													<th width="50px">Select rooms</th>
													<th width="100px"></th>
												</tr>
											</thead>
											<tbody>
												<form method="post" action="{{ url('booking') }}">
													<input type="hidden" name="id" value="{{ $hd->id }}">
													@php
													session(['id'=>$hd->id]);
													@endphp
													@method('get')
												@php $cou=0; @endphp
												@foreach($rooms as $r )
												@if($r->room_qty_left >0)
												<tr>
													<td>
														<div class="col-sm-12">
															<a style="cursor: pointer;" href="#" data-toggle="modal" data-target="#gallery{{ $r->id }}"><label  style="cursor: pointer;"class="col-sm-12"><u>{{ $r->room_type }}</u></label> </a>
															<a style="cursor: pointer;" href="#" data-toggle="modal" data-target="#gallery{{ $r->id }}" style="float: right;"><i class="fa fa-image "></i>
															</a>
															<div class="modal fade" id="gallery{{ $r->id }}" tabindex="-1" role="dialog" aria-labelledby="lab1" aria-hidden="true">
																<div class="modal-dialog">
																	<div class="modal-content" id="lab1">
																		<h4 class="col-sm-6"> {{ $r->room_type }}</h4>
																		<button type="button" class=" btn btn-sm close" data-dismiss="modal" ><i class="fa fa-times"></i>
																		
																		</button>
																		<div class="">
																			<div class="col-sm-12">
																				<div class="row">
																					<div class="col-sm-6">
																						<div class="col-sm-12" style='background-image: url({{asset("images/$r->room_image")}});background-size: 100% 100%;height: 250px'>
																						</div>
																						<div class="col-sm-12">
																							<br>
																							@foreach($r_gs as $r_g)
																							@if($r -> id == $r_g -> room_id)
																							<a style="cursor: pointer;" data-fancybox="{{ $r->id }}" href="{{asset("images/$r_g->image")}}">
																								<img src='{{asset("images/$r_g->image")}}' height="50px">
																							</a>
																							@endif
																							@endforeach
																						</div>
																						<div class="col-sm-12">
																							<label>
																								@for($i=0;$i< $r->room_person ;$i++)
																								<i class="fa fa-user" style="color: #0ab21b"></i>
																								@endfor
																								{{ $r->room_type }}
																							</label>
																							
																						</div>
																						<div class="col-sm-12">
																							<label><b>Included:</b>@foreach($meals as $m) {{ $m->meals }} ,@endforeach</label>
																						</div>
																					</div>
																					<div class="col-md-6">
																						<div class="row">
																							<div class="col-sm-12">
																								<div class="row">
																									<div class="col-sm-6" style="color: #0ab21b"><i class="fa fa-snowflake "> Air Conditioning</i></div>
																								<div class="col-sm-6" style="color: #0ab21b"><i class="fa fa-shower">  Ensuite bathroom </i>    </div>
																								<div class="col-sm-6" style="color: #0ab21b"><i class="fa fa-tv">  Flat-screen TV </i>    </div>
																								</div>
																								
																							</div>
																							<br><hr><br>
																							<div class="col-md-12">
																								<p>
																								Air-conditioned room features a flat-screen cable TV, iPod dock and safe. A seating area and private bathroom with shower, haidryer and free toiletries are included.<br>
																								Guests have access to the Executive Club Lounge.
																							</p>
																								<hr>
																							</div>
																							<div class="col-sm-12">
																								<label><b>Room facilities:</b></label>
																								<ul class="nav " style="color:#0ab21b;">
																									@foreach($r_am as $r_ams)
																									@if($r-> id == $r_ams -> room_id)
																									@foreach($am as $a)
																									@if($a->id==$r_ams->amenities)
																									<li style="display: inline"> <i class="fa fa-check"> {{ $a->amenities }} </i>
																									</li>
																									@endif
																									@endforeach
																									@endif
																									@endforeach
																								</ul>
																								<br><hr><br>
																							</div>
																							
																							<div class="col-sm-12">
																								<label><b>Smooking : </b>No Smooking</label>
																							</div>
																							<div class="col-md-12">
																								<label><b>Parking :</b> <i class="fas fa-parking fa-1x" style="color: rgb(10, 178, 27);"></i> Free private parking is possible on site (reservation is not possible).</label>
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="modal-footer justify-content-between">
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-sm-12">
															2 single bed <i class="fa fa-bed"></i> <i class="fa fa-bed"></i> 
															</div>
															<div class="col-sm-12 " style="padding-top: 20px">
																<div class="row" style="color: #0ab21b;">
																	<i class="fa fa-fw fa-snowflake"> </i>Air Conditioning 
																	<i class="fa fa-shower"> </i>     Ensuite bathroom 
																	<i class="fa fa-tv"></i> Flat-screen TV
																</div>
																<hr>
																<ul class="nav " style="color:#0ab21b;">
																	@foreach($r_am as $ams)
																	@if($r-> id == $ams-> room_id)
																		@foreach($am as $a)
																		@if($a->id==$ams->amenities)
																		<li style="display: inline"> <i class="fa fa-check"> {{ $a->amenities }} </i></li>
																		@endif
																		@endforeach
																		@endif
																	@endforeach
																</ul>
																<br>
																<div>Prices are per room for {{ session('night') }} nights</div>
																<div>
																	<label><b>Included:</b>@foreach($meals as $m) {{ $m->meals }} ,@endforeach</label>
																</div>
															</div>
														</td>
														<td width="10px" style="vertical-align: top;text-align: left;">
														@for($i=0;$i< $r->room_person ;$i++)
														<i class="fa fa-user" ></i>
														@endfor
													</td>
													<td width="40px"  style="vertical-align: top;text-align: left;"><label> <b>₱ {{ number_format($r->room_price * session('night')) }}</b></label>
														<input type="hidden" id="p{{$r->id }}" value="{{ $r->room_price * session('night') }}">
														<input type="hidden" name="room_id[]" id="id{{ $r->id }}">
														<input type="hidden" name="qty[]" id="qty{{ $r->id }}">
													</td>
													
													<td style="vertical-align: top;text-align: left;"><select class="col-md-12 " style="text-indent: 20px" onchange="sel(this)" >
														<option selected value="0" >0</option>
														@for( $i=1;$i<= $r->room_qty_left;$i++)
														<option value="{{ $i }}" >{{ $i }} <span style="padding-left: 100px">(₱  {{ number_format($i*($r->room_price * session('night'))) }})</span> 
															</option>
														@endfor

													</select></td>
													@if($cou ==0)
													<td rowspan="20" style="vertical-align: top;text-align: left" id="fake">
														<div class="col-sm-12" >
															<br><br>
															<b>
																<ul>
															<li>Confirmation is immediate</li>
															<li>No registration required</li>
														</ul>
															</b>
														
													</div>

													</td>
													<td rowspan="20" style="vertical-align: top;text-align: left;display: none" id="total">
														<div id="scr" style="" >
															<label><b><span id="sqty" style="margin-right: 5px"></span></b> rooms for {{ session('night') }} nights</label>
														<b><h4 id="hprice"></h4></b><br><br>
														<input type="hidden" name="hotel_id" value="{{ $hd->id }}">
														<input type="hidden" name="fprice" id="fprice" >
														<button  type="submit" class="btn btn-md btn-block   " style="color: #07c"> I'll reserve</button>
														<div class="col-sm-12" id="div">
															<br><br>
															<b>
																<ul>
															<li>Confirmation is immediate</li>
															<li>No registration required</li>
														</ul>
															</b>
														
													</div>
														</div>
														

													</td>
													@endif
													@php $cou++; @endphp
													
													@endif
													@endforeach
													@csrf
												</form>
												</tbody>
											</table>
											</div>
											<div class="col-sm-4" >
												
											</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4 col-sm-12">
						
						<!-- Tourist Overview -->
						<div class="tr-single-box">
							<div class="tr-single-header">
								<h4> {{$hd->name}}<sup class="cl-success">{{$hd->address}}</sup></h4>
							</div>
							
							<div class="tr-single-body">
								<ul class="extra-service half">
									<li>
										<div class="icon-box-icon-block">
											<a href="#">
												<div class="icon-box-round">
													<i class="ti-user"></i>
												</div>
												<div class="icon-box-text">
													₱ {{number_format($hd->price)}} / night
												</div>
											</a>
										</div>
									</li>
									
									<li>
										<div class="icon-box-icon-block">
											<a href="#">
												<div class="icon-box-round">
													<i class="ti-timer"></i>
												</div>
												<div class="icon-box-text">
													May - July
												</div>
											</a>
										</div>
									</li>
									
									<li>
										<div class="icon-box-icon-block">
											<a href="#">
												<div class="icon-box-round">
													<i class="ti-eye"></i>
												</div>
												<div class="icon-box-text">
													785 View
												</div>
											</a>
										</div>
									</li>
									
									<li>
										<div class="icon-box-icon-block">
											<a href="#">
												<div class="icon-box-round">
													<i class="ti-share"></i>
												</div>
												<div class="icon-box-text">
													110 Share
												</div>
											</a>
										</div>
									</li>
									
									<li>
										<div class="icon-box-icon-block">
											<a href="#">
												<div class="icon-box-round">
													<i class="ti-comment-alt"></i>
												</div>
												<div class="icon-box-text">
													22 comments
												</div>
											</a>
										</div>
									</li>
									
									<li>
										<div class="icon-box-icon-block">
											<a href="#">
												<div class="icon-box-round">
													<i class="ti-heart"></i>
												</div>
												<div class="icon-box-text">
													20 Likes
												</div>
											</a>
										</div>
									</li>
									
								</ul>
							</div>
							
						</div>
						
						<!-- overview & booking Form -->
						<div class="tr-single-box">
							<div class="tr-single-header">
								<div class="entry-meta">
									<div class="meta-item meta-comment fl-right">
										<div class="view-box">
											<div class="fl-right">
												<h4 class="font-20"><span class="theme-cl font-20"> ₱ </span> {{number_format($hd->price)}} <sub>/Per Night</sub></h4>
											</div>
										</div>
									</div>
									<div class="meta-item meta-author">
										<div class="hotel-review entry-location">
											<span class="review-status bg-success"><i class="ti-check"></i></span>
											<h6><span class="cl-success font-bold">Good</span>1362 Review</h6>
										</div>
									</div>
								</div>
							</div>
									<div class="tr-single-body" style="background: linear-gradient(to bottom,#febb02 0,#febb02 100%);" id="search">
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
											<input type="text" name="book-date" class="form-control br-1"  autocomplete="off" id="book"  value="{{ session('room.start') }}-{{ session('room.ends') }}">
											
										</div>
										<div class="col-md-12">
											<label id="nights">{{ session('night') }} - night stay</label>
											<select class="wide form-control br-1" name="person" id="person">
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
						</div>
						
						<!-- Share this -->
						<div class="tr-single-box">
							<div class="tr-single-header">
								<h4>Share this</h4>
							</div>
							
							<div class="tr-single-body">
								<ul class="extra-service half">
									<li>
										<div class="icon-box-icon-block">
											<a href="#">
												<div class="icon-box-round">
													<i class="fa fa-facebook"></i>
												</div>
												<div class="icon-box-text">
													Facebook
												</div>
											</a>
										</div>
									</li>
									
									<li>
										<div class="icon-box-icon-block">
											<a href="#">
												<div class="icon-box-round">
													<i class="fa fa-google-plus"></i>
												</div>
												<div class="icon-box-text">
													Google plus
												</div>
											</a>
										</div>
									</li>
									
									<li>
										<div class="icon-box-icon-block">
											<a href="#">
												<div class="icon-box-round">
													<i class="fa fa-twitter"></i>
												</div>
												<div class="icon-box-text">
													Twitter
												</div>
											</a>
										</div>
									</li>
									
									<li>
										<div class="icon-box-icon-block">
											<a href="#">
												<div class="icon-box-round">
													<i class="fa fa-linkedin"></i>
												</div>
												<div class="icon-box-text">
													LinkedIn
												</div>
											</a>
										</div>
									</li>
									
									<li>
										<div class="icon-box-icon-block">
											<a href="#">
												<div class="icon-box-round">
													<i class="fa fa-instagram"></i>
												</div>
												<div class="icon-box-text">
													Instagram
												</div>
											</a>
										</div>
									</li>
									
									<li>
										<div class="icon-box-icon-block">
											<a href="#">
												<div class="icon-box-round">
													<i class="fa fa-pinterest"></i>
												</div>
												<div class="icon-box-text">
													Pinterest
												</div>
											</a>
										</div>
									</li>
									
								</ul>
							</div>
							
						</div>
						
						<!-- Share this -->
						<div class="tr-single-box">
							<div class="tr-single-header">
								<h4>Similar Item</h4>
							</div>
							
							<div class="tr-single-body">
								<div class="single-side-slide">
									<!-- Single Hotel -->
									@foreach($hotels as $hotel)

					<div class="col-md-6 col-sm-6" >
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
									
									<!-- Single Hotel -->
									
									<!-- Single Hotel -->
									
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</section>
	

		<section class="before-footer bt-1 bb-1">
			<div class="container-fluid padd-0 full-width">
			
				<div class=" col-md-2 col-sm-2 br-1 mbb-1">
					<div class="data-flex">
						<h4>Contact Us!</h4>
					</div>
				</div>
				
				<div class="col-md-3 col-sm-3 br-1 mbb-1">
					<div class="data-flex text-center">
					53 Boulevard Victor Hugo 44200 Nantes, France
					</div>
				</div>
				
				<div class="col-md-3 col-sm-3 br-1 mbb-1">
					<div class="data-flex text-center">
						<span class="d-block mrg-bot-0">06 52 52 20 30</span>
						<a href="#" class="theme-cl"><strong>hello@gmail.com</strong></a>
					</div>
				</div>
				
				<div class="col-md-4 col-sm-4 padd-0">
					<div class="data-flex padd-0">
						<ul class="social-share">
							<li><a href="#"><i class="fa fa-facebook theme-cl"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus theme-cl"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter theme-cl"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin theme-cl"></i></a></li>
						</ul>
					</div>
				</div>


				
			</div>
		</section>
		@endforeach


		
	<script>
		
function sel(ss) {
	

var sel=document.getElementsByName('sel');
var selects = document.getElementsByTagName('select');
var value = 0 ;
var price = 0;
var i=0;

@foreach($rooms as $r)
@if($r->room_qty_left >0 ||  !$r->room_qty_left < 0)
	var p=$('#p{{ $r->id }}').val();
	var q=selects[i].value;
	value+=parseInt(q); 
	price+=parseInt(p*q);
	

		$('#qty{{ $r->id }}').val(q);
		$('#id{{ $r->id }}').val({{ $r->id }});

	
	
	i++
	@endif
		@endforeach
$('#sqty').text(value);
	
	$('#hprice').text('₱ '+formatNumber(price));
	$('#fprice').val(price);
for (var i = 0; i <selects.length; i++) {
	if ( ss.value==0 && selects[i].value ==0) {
		
		$('#fake').show();
		$('#total').hide();
	}else{
		
		$('#fake').hide();
		$('#total').show();
		break;
	}
	
	}
}
</script> 

	@endsection