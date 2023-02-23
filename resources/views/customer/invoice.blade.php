@extends('layouts.customer_layout')
@section('content')
<div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3" style="height: 530px">
						<div class="row mrg-0 mrg-top-20">
							<div class="tr-single-box">
								<div class="tr-single-header">
									<h3 class="dashboard-title">Invoice</h3>
								</div>
								<div class="tr-single-body">
									<div class="row">
										<table class="table">
											<thead>
												<tr>
													<th>Invoice#</th>
													<th>Hotel</th>
													<th>Control#</th>
													<th>Issued</th>
													<th>Night</th>
													<th>Qty</th>
													<th>Total</th>
													<th>Payment</th>
													<th>Print</th>
												</tr>
												<tbody>
													@foreach($invoice as $inv)
													@foreach($hotel as $h)
													@if($h->id == $inv->hotel_id)
													<tr>
														<td>{{ $inv->id }}</td>
														<td>{{ $h->name }}</td>
														<td>{{ $inv->cntrl_no }}</td>
														<td>{{ $inv->created_at }}</td>
														<td>{{ $inv->night }}</td>
														<td>{{ $inv->qty }}</td>
														<td>₱ {{number_format($inv->total)  }}</td>
														<td>{{ $inv->payment }}</td>
														<td><a href="{{ url('Invoice/'.$inv->id) }}" class=" "><i class="fa fa-print fa-2x text-primary"></i></a></td>
														
													</tr>
													@endif
													@endforeach
													@endforeach
												</tbody>
											</thead>
										</table>
									</div>
									
								</div>
							</div>
						</div>
					</div>
@endsection					