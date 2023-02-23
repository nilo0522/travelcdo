@extends('layouts.customer_layout')
@section('content')

<div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3" style="height: 530px" >
						<div class="row mrg-0 mrg-top-20">
							<div class="tr-single-box">
								<div class="tr-single-header">
									<h3 class="dashboard-title">Dashboard</h3>
								</div>
								<div class="tr-single-body">
								
									<!-- row -->
									<div class="row">
										<div class="col-md-3 col-sm-6">
											<div class="widget simple-widget">
												<div class="rwidget-caption info">
													<div class="row">
														<div class="col-xs-4 padd-r-0">
															<i class="cl-info icon fa fa-suitcase"></i>
														</div>
														<div class="col-xs-8">
															<div class="widget-detail">
																<h3>{{ count($booking) }}</h3>
																<span>Total Booking</span>
															</div>
														</div>
														<div class="col-xs-12">
															<div class="widget-line">
																<span style="width:{{ (count($booking)/100) *100 }}%;" class="bg-info widget-horigental-line"></span>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-md-3 col-sm-6">
											<div class="widget simple-widget">
												<div class="rwidget-caption info">
													<div class="row">
														<div class="col-xs-4 padd-r-0">
															<i class="cl-info icon fa fa-copy"></i>
														</div>
														<div class="col-xs-8">
															<div class="widget-detail">
																<h3>{{ count($inv) }}</h3>
																<span>Invoice</span>
															</div>
														</div>
														<div class="col-xs-12">
															<div class="widget-line">
																<span style="width:{{ (count($inv)/100) *100 }}%;" class="bg-info widget-horigental-line"></span>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										
									</div>
									<!-- /row -->
									
								
									<!-- /row -->
									
								</div>
							</div>
						</div>
					</div>

@endsection