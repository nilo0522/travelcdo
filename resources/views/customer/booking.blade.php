@extends('layouts.customer_layout')
@section('content')
@foreach(session('customer') as $cus)
<div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3" style="height: 530px" >
						<div class="row mrg-0 mrg-top-20">
							<div class="tr-single-box">
								<div class="tr-single-header">
									<h3 class="dashboard-title">My Booking</h3>
								</div>
								<div class="tr-single-body">
								
									<!-- row -->
									<div class="row">
										<div class="col-lg-12">
											<table class="table">
												<thead>
													<tr>
													<th>Hotel</th>
													<th>Accommodation</th>
													<th>Qty</th>
													<th>Night</th>
													<th>Check-in</th>
													<th>Check-out</th>
													
													<th>Total</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
												</thead>
												<tbody>
													@foreach($res as $res)
													@if($res->cus_id==$cus->id)
													@foreach($hotel as $h)
													@if($h->id==$res->hotel_id)
													@foreach($rooms as $r)
													@if($r->id==$res->room_id)
													<tr>
														<td>{{ $h->name }}</td>
														<td>{{ $r->room_type }}</td>
														<td>{{ $res->qty }}</td>
														<td>{{ $res->night }}</td>
														<td>{{ date(' D j M Y',strtotime($res->check_in)) }}</td>
														<td>{{ date(' D j M Y',strtotime($res->check_out)) }}</td>
														<td>₱ {{number_format($res->total)  }}</td>
														<td>{{ $res->book_status }}</td>
														<td></td>
													</tr>
													@endif
													@endforeach
													@endif
													@endforeach
													@endif
													@endforeach
												</tbody>
											</table>
										</div>
									</div>
									<!-- /row -->
									
								
									<!-- /row -->
									
								</div>
							</div>
						</div>
					</div>
					@endforeach

@endsection