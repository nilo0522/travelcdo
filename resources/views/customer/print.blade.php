<!DOCTYPE html>
<html lang="en">
	
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    

    <!-- Plugins CSS -->
	<link rel="stylesheet" href="{{asset('agency/assets/plugins/css/plugins.css')}}">	
    
    <!-- Custom style -->
    <link href="{{ asset('agency/assets/css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('agency/assets/css/responsiveness.css') }}" rel="stylesheet">
	<link id="jssDefault" rel="stylesheet" href="{{ asset('agency/assets/css/skins/default.css') }}">
    
    <script src="{{ asset('agency/assets/plugins/js/jquery.min.js') }}"></script>
		<script src="{{ asset('agency/assets/plugins/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('agency/assets/plugins/js/viewportchecker.js') }}"></script>
		<script src="{{ asset('agency/assets/plugins/js/bootsnav.js') }}"></script>
		<script src="{{ asset('agency/assets/plugins/js/slick.min.js') }}"></script>
		<script src="{{ asset('agency/assets/plugins/js/jquery.nice-select.min.js') }}"></script>
		<script src="{{ asset('agency/assets/plugins/js/jquery.fancybox.min.js') }}"></script>
		<script src="{{ asset('agency/assets/plugins/js/jquery.downCount.js') }}"></script>
		<script src="{{ asset('agency/assets/plugins/js/freshslider.1.0.0.js') }}"></script>
		<script src="{{ asset('agency/assets/plugins/js/moment.min.js') }}"></script>
		<script src="{{ asset('agency/assets/plugins/js/daterangepicker.js') }}"></script>
		<script src="{{ asset('agency/assets/plugins/js/wysihtml5-0.3.0.js') }}"></script>
		<script src="{{ asset('agency/assets/plugins/js/bootstrap-wysihtml5.js') }}"></script>
		
		<!-- Dashboard Js -->
		<script src="{{ asset('agency/assets/plugins/js/jquery.slimscroll.min.js') }}"></script>
		<script src="{{ asset('agency/assets/plugins/js/jquery.metisMenu.js') }}"></script>
		<script src="{{ asset('agency/assets/plugins/js/jquery.easing.min.js') }}"></script>
		<script src="{{ asset('agency/assets/plugins/js/raphael.min.js') }}"></script>
		<script src="{{ asset('agency/assets/plugins/js/morris.min.js') }}"></script>
		
		<!-- Custom Js -->
		<script src="{{ asset('agency/assets/js/custom.js') }}"></script>
		
		<script src="{{asset('agency/assets/js/jQuery.style.switcher.js')}}"></script>
	</head>
	
	<body onload="window.print();">
		@foreach($invoice as $inv)
		@foreach($hotel as $h)
		@if($h->id == $inv->hotel_id)
		@foreach(session('customer') as $cus)
		@if($cus->id==$inv->cus_id)

	<div class="content">
						<div class="row mrg-0 mrg-top-20">
							<div class="tr-single-box">
								
								<div class="tr-single-body">
									<div class="row mrg-0">
											<div class="col-md-6">
												<div id="logo"><img src="{{ asset('agency/assets/img/logo.png') }}" class="img-responsive" alt=""></div>
											</div>

											<div class="col-md-6">	
												<p id="invoice-info">
													<strong>Cntrl#:</strong> {{ $inv->cntrl_no }} <br>
													<strong>Issued:</strong> {{ $inv->created_at }} <br>
													
												</p>
											</div>
											
										</div>
										
									
										
											<div class="col-md-12">
												<h2>INVOICE</h2>
											</div>
											<div class="col-md-12"></div>
											<div class="row">
												<div class="col-md-4">
												
													<h4>From </h4>
													<h5>{{ $h->name }}</h5>
													<p>
														{{ $h->email }}<br />
														
														
														
														{{ $h->address }}
														<br /> Philippines
													</p>
													
												  </div>
												  <div class="col-md-2 " >
													<h4>To</h4>
													<h5>{{ $cus->fname }} {{ $cus->lname }}</h5>
													<p>
														{{ $cus->email }}<br />
														
														{{ $cus->contact_no }}<br />
														
														
													</p>
												  </div>
												</div>
											
											<hr />
											
											<div class="col-12 col-md-12">
												<strong>ITEM DESCRIPTION & DETAILS :</strong>
											</div>
											<hr>
											
											<div class="col-lg-12 ">
												<div class="invoice-table">
													<div class="table-hover">
														<table class="table table-striped table-bordered">
															<thead>
																<tr>
																	<th>Accommodation</th>
																	<th><span style="margin-left: 20px">Price   </span></th>
																	<th>Arrival</th>
																	<th>Departure</th>
																	<th>Night</th>
																	<th>Payment</th>
																	<th><span style="margin-left: 30px"></span> Subtotal</th>
																</tr>
															</thead>
															<tbody>
																@php
																$total=0;
																@endphp
																@foreach($res as $res)
																@if($res->cus_id==$cus->id)
																@foreach($rooms as $r)
																@if($r->id==$res->room_id && $inv->book_date==$res->created_at && $res->book_status !="Cancelled" )
																<tr>
																	<td>{{ $res->qty }}x {{ $r->room_type }}</td>
																	<td>₱ {{ number_format($r->room_price)	 }}</td>
																	<td>{{ $res->check_in }}</td>
																	<td>{{ $res->check_out }}</td>
																	<td>{{ $res->night }}</td>
																	<td>{{ $cus->c_type }}</td>
																	<td>₱ {{ number_format($res->total) }}</td>
																	@php
																	$total+=$res->total;
																	@endphp
																</tr>
																@endif
																@endforeach
																@endif
																@endforeach
															</tbody>
														</table>
													</div>
													<hr>
													<div>
														<h5>Total : ₱ {{number_format($total)  }} </h5>
													</div>
													<hr>
													<div>
														<h5>Taxes : ₱ {{ number_format($total * .12) }} </h5>
													</div>
													<hr>
													
												</div>
											</div>
									
									
									
								</div>
							</div>
						</div>
					</div>
					@endif
					@endforeach			
					@endif
					@endforeach
					@endforeach
	</body>

</html>
