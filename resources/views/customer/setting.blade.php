@extends('layouts.customer_layout')
@section('content')
@foreach(session('customer') as $cus)
<form method="post" action="{{ url('Setting/'.$cus->id) }}">
<div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
						<div class="row mrg-0 mrg-top-20">
							<div class="tr-single-box">
								<div class="tr-single-header">
									<div class="row">
										<div class="col-md-6">
											<h3 class="dashboard-title">My Profile</h3>
										</div>
									<div class="col-md-6 " >
										
										<button type="submit" style="float: right;color: green;font-weight: bold;font-size: 20px;background-color: white" class=""> <i class="fa fa-save fa-1x"></i> Save</button>
									</div>
									
									</div>
									
								</div>
								<div class="tr-single-body">
									
										@csrf
										@method('put')
									<div class="row">
										<!-- col-md-4 -->
										<div class="col-md-4">
											<p>
												<label>First Name</label>
												<input type="text"  class="form-control" value="{{ $cus->fname }}" name="fname">
											</p>

											<p>
												<label>Last Name</label>
												<input type="text"  class="form-control" value="{{ $cus->lname }}" name="lname">
											</p>

											<p>
												<label>Email</label>
												<input type="email"  class="form-control" value="{{ $cus->email }}" name="email">
											</p>
											
											<p>
												<label>Phone</label>
												<input type="number" id="userphone" class="form-control" value="{{ $cus->contact_no }}" name="contact_no">
											</p>
											
											   
											
										</div>
										<!-- /col-md-4 -->
										
										<!-- col-md-4 -->
										<div class="col-md-4">
											<p>
												<label>Cardholder's name</label>
												<input type="text"  class="form-control" value="{{ $cus->ch_name }}" name="ch_name">
											</p>
											
											<p>
												<label>Card type</label>
												<select  class=" form-control" name="c_type">
											<option selected="" disabled="">--Select--</option>
											<option value="American Express" @if($cus->c_type == "American Express") selected="" @endif>American Express</option>
											<option value="Visa"@if($cus->c_type == "Visa") selected="" @endif>Visa</option>
											<option value="Master Card" @if($cus->c_type == "Master Card") selected="" @endif>Master Card</option>
											<option value ="Diners Club" @if($cus->c_type == "Diners Club") selected="" @endif>Diners Club</option>
											<option value="JCB" @if($cus->c_type == "JCB") selected="" @endif>JCB</option>

										</select>
											</p>

											
											<p>
												<label>Card number</label>
												<input type="number"  class="form-control" value="{{ $cus->c_number }}" name="c_number">
											</p>
											<input type="hidden" name="password" value="{{ $cus->password }}">
											
											

											 
										</div>
										<!-- /col-md-4 -->
										
										<!-- col-md-4 -->
										<div class="col-md-4">
											<div id="profile-div" class="feature-media-upload">
												
												<img id="profile-img-tag" class="img-responsive" src="{{ asset('agency/assets/img/'.$cus->image) }}" alt="user image">
												<div id="upload-container">                 
													<div id="aaiu-upload-container" style="position: relative;">                 

														<input type="file" id="h_image" name="image" class="btn theme-btn full-width" onchange="preview(this);">
															
														
													</div>
													
												</div>
											</div>
										</div>
										
										
									</div>
								
								</div>
							</div>
						</div>
					</div>
					</form>
					@endforeach


				
@endsection