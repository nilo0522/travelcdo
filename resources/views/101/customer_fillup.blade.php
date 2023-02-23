@extends('layouts.agencylayout')
@section('content')
@include('101.header')

@foreach($hotel as $h)
<div class="page-title image-title" style="background-image:url({{ asset('images/'.$h->image) }});">
			<div class="container">
				<div class="page-title-wrap">
				<h2>{{ $h->name }}</h2>
				
				</div>
			</div>
		</div>
		<!-- ======================= End Page Title ===================== -->
		
		
		<section class="gray-bg">
			<div class="container">
				
				<!-- row -->
				<div class="row">
					<div class="col-sm-4" >
						<div class="tr-single-box" style="border: solid #cce1ff;border-width: 1px">
							<div class="tr-single-header" style="background-color: #e9f0fa">
								<h4><i class="fa fa-star-o"></i>Your booking details</h4>
							</div>
							<div class="tr-single-body">

								<label style="color: black">Check-in :</label><br>
								<label>@php 
								echo date(" l, j F, Y",strtotime(session('room.start')));    
								 @endphp</label><br>
								 <label style="color: black">Check-out :</label><br>
								 <label>@php 
								echo date(" l, j F, Y",strtotime(session('room.ends')));    
								 @endphp</label><br>
								  <label style="color: black">Total length of stay :</label><br>
								  <label>{{ session('night') }} nights</label>

							</div>
							<hr style="border: solid #e9f0fa;border-width: 1px ">
							<div class="tr-single-body">

								<label style="color: black"><b> You selected :</b></label><br>
								<label>
									@for($i=0 ;$i< count($qty);$i++)
									@if($qty[$i] !=0)
									@foreach($rooms as $r)

									@if($r->id == $setroom[$i])
									<label>{{$qty[$i]  }}x  {{$r->room_type}}</label>
									<br>	
									@endif
									@endforeach
									@endif

									@endfor
								</label><br>
							</div>
						</div>
						<div class="tr-single-box" style="border: solid #cce1ff;border-width: 1px">
							<div class="tr-single-header" style="background-color: #e9f0fa">
								<div class="row">
									<h4 class="col-md-6">Price</h4>
									<h4 class="pull-right">₱ {{ number_format($fprice) }}</h4>
								</div>
								
							</div>
							<div class="tr-single-body">
								<div class="row">
									<label class="col-md-6">VAT</label>
									<label class="pull-right">₱ {{ number_format($fprice * .12)  }}</label>
								</div>
							</div>
						</div>
						<div class="tr-single-box" style="border: solid #cce1ff;border-width: 1px">
							<div class="tr-single-header" style="background-color: #e9f0fa">
								<div class="row">
									<h4 class="col-md-12">How much will it cost to cancel?</h4>
								</div>
							</div>
							<div class="tr-single-body">
									
								<b style="color: black">If you cancel, you'll pay</b><label class="pull-right">₱ {{ number_format($fprice)  }}</label>
							</div>
							
						</div>
					</div><!--end of row-->
					
					<div class="col-md-8">
						<div class="tr-single-box">
							
							<div class="tr-single-body" >
								<div class="row">
									<div class="col-sm-4" style="background-image: url({{ asset('images/'.$h->image)  }});background-size: 100% 100%;height: 200px;">
										
									</div>
									<div class="col-sm-8" style="margin-top: -20px;color: black">
										<h3>{{ $h->name }}</h3>
										<div class="row">
											<span style="margin-left: 10px"></span>
											@foreach($fas as $i => $f)
											@if($i == 0 ||  count(get_object_vars($fas) ) == $i)
											<i style="margin-left: 5px;color: #0ab21b"> {{ $f->facilities }} </i>
											@else
											<span style="border-left: 2px solid #ffe77aff;height: 2px;margin-left: 10px;margin-right: 5px "></span><i style="margin-left: 5px;color: #0ab21b"> {{ $f->facilities }} </i>
											@endif

											@endforeach
										</div>
										<i class="fa fa-map-marker" style="color: #0896ff"></i>
										<label>{{ $h->address }}</label><br>
										<i class="fa fa-check" style="color:#0ab21b "> This property has an excellent location. Guests have rated it 8.7!</i>
									</div>
								</div>
							</div>
						</div>
						@if(session('customer') !=null)
							@foreach(session('customer') as $cus)
						<form action="{{ url('reserve') }}" method="post">
							@csrf
							
					<div class="col-md-12" >
						<div class="tr-single-box">
							<div class="tr-single-header" style="background-color: #cce1ff;">
								<h4><i class="ti-write"></i>Enter your details</h4>
							</div>
							<div class="tr-single-body" style="background: #e9f0fa">
								<div class="row">
									<div class="col-sm-6">
										<label>First name</label>
										<input type="text" class="form-control" name="fname" required="" value="{{ $cus->fname }}">
									</div>
									<div class="col-sm-6">
										<label>Last name</label>
										<input type="text" class="form-control" name="lname" required value="{{ $cus->lname }}">
									</div>
									<div class="col-sm-6">
										<label>Phone</label>
										<input type="text" class="form-control" name="contact_no" required value="{{ $cus->contact_no }}">
									</div>
									<div class="col-sm-6">
										<label>Email address</label>
										<input type="email" class="form-control @error('email') is-invalid @enderror" name="email"  id="email"  required  value="{{ $cus->email }}">
										 @error('email')
                                    <span class="invalid-feedback" role="alert" style="color: red">
                                        <strong>{{ $message }}</strong>
                                        
                                    </span>
                                @enderror
									</div>
								
									
								</div>	
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="tr-single-box">
							<div class="tr-single-header" style="background-color:#cce1ff; ">
								<h4><i class="ti-credit-card"></i>Payment Methode</h4>
							</div>
							<div class="tr-single-body" style="background: #e9f0fa">
								
								<div class="row">
									<div class="col-sm-6">
										<label style="color: black">Cardholder's name *</label>
										<input type="text" name="ch_name" class="form-control" required value="{{ $cus->ch_name }}">
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<label style="color: black">Card type *</label>
										<br>
										<select  class="col-sm-6 form-control" name="c_type">
											<option selected="" disabled="">--Select--</option>
											<option value="American Express" @if($cus->c_type == "American Express") selected="" @endif>American Express</option>
											<option value="Visa"@if($cus->c_type == "Visa") selected="" @endif>Visa</option>
											<option value="Master Card" @if($cus->c_type == "Master Card") selected="" @endif>Master Card</option>
											<option value ="Diners Club" @if($cus->c_type == "Diners Club") selected="" @endif>Diners Club</option>
											<option value="JCB" @if($cus->c_type == "JCB") selected="" @endif>JCB</option>

										</select>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<label>Card number *</label>
										<input type="number" name="c_number" class="form-control" required value="{{ $cus->c_number }}">
									</div>
								</div>
									 @foreach($setroom as $rm => $r)
									 <input type="hidden" name="setroom[]" value="{{ $r }}">
									 @endforeach

									  @foreach($qty as $rm => $q)

									 <input type="hidden" name="qty[]" value="{{ $q }}">
									 @endforeach
									 <input type="hidden" name="h_id" value="{{ $h->id }}">
									@method('post')
								<button type="submit" class="btn btn-block" style="background-color: #07c!important;color: #fff!important;    font-size: 23px!important;font-weight: bold!important;">Submit Booking</button>
									
				 				
							</div>
						</div>
					</div>
					</form>
					@endforeach
					@else
						<form action="{{ url('reserve') }}" method="post">
							@csrf
							
					<div class="col-md-12" >
						<div class="tr-single-box">
							<div class="tr-single-header" style="background-color: #cce1ff;">
								<h4><i class="ti-write"></i>Enter your details</h4>
							</div>
							<div class="tr-single-body" style="background: #e9f0fa">
								<div class="row">
									<div class="col-sm-6">
										<label>First name</label>
										<input type="text" class="form-control" name="fname" required="" >
									</div>
									<div class="col-sm-6">
										<label>Last name</label>
										<input type="text" class="form-control" name="lname" required>
									</div>
									<div class="col-sm-6">
										<label>Phone</label>
										<input type="text" class="form-control" name="contact_no" required >
									</div>
									<div class="col-sm-6">
										<label>Email address</label>
										<input type="email" class="form-control @error('email') is-invalid @enderror" name="email"  id="email"  required >
										 @error('email')
                                    <span class="invalid-feedback" role="alert" style="color: red">
                                        <strong>{{ $message }}</strong>
                                        
                                    </span>
                                @enderror
									</div>
								
									
								</div>	
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="tr-single-box">
							<div class="tr-single-header" style="background-color:#cce1ff; ">
								<h4><i class="ti-credit-card"></i>Payment Methode</h4>
							</div>
							<div class="tr-single-body" style="background: #e9f0fa">
								
								<div class="row">
									<div class="col-sm-6">
										<label style="color: black">Cardholder's name *</label>
										<input type="text" name="ch_name" class="form-control" required value="">
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<label style="color: black">Card type *</label>
										<br>
										<select  class="col-sm-6 form-control" name="c_type">
											<option selected="" disabled="">--Select--</option>
											<option value="American Express">American Express</option>
											<option value="Visa">Visa</option>
											<option value="Master Card" >Master Card</option>
											<option value ="Diners Club">Diners Club</option>
											<option value="JCB">JCB</option>

										</select>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<label>Card number *</label>
										<input type="number" name="c_number" class="form-control" required value="">
									</div>
								</div>

									@if(count($setroom)==0)
									<script type="text/javascript">
										window.location.href="{{ url('/') }}";
										
									</script>
									
							
									 @else
									@for($i=0 ;$i< count($qty);$i++)
									@if($qty[$i] !=0)
									@foreach($rooms as $r)

									@if($r->id == $setroom[$i])
									<input type="hidden" name="setroom[]" value="{{ $r->id }}">
									<input type="hidden" name="qty[]" value="{{ $qty[$i] }}">
									@endif
									@endforeach
									@endif

									@endfor
									 @endif

									 <input type="hidden" name="h_id" value="{{ $h->id }}">
									@method('post')
								<button type="submit" class="btn btn-block" style="background-color: #07c!important;color: #fff!important;    font-size: 23px!important;font-weight: bold!important;">Submit Booking</button>
									
				 				
							</div>
						</div>
					</div>
					</form>
					@endif
					
					</div>
				</div>
				
				<!-- row -->
				
				
			</div>
		</section>
		@endforeach

@endsection