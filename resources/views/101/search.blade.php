


<div class="hero-section-wrap fl-wrap multi-option-booking">
				<div class="container">
					<div class="intro-item fl-wrap">
						
						<div class="padd-15">
							<h1>Make Your Trip</h1>
							<div class="tab" role="tabpanel">
								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
									<li role="presentation" class="active" id="tour"><a href="#Tour" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-globe"></i>Tour</a></li>
									<li role="presentation" id="hotel"><a href="#Hotel" aria-controls="profile" role="tab" data-toggle="tab"  class=""><i class="fa fa-hotel"></i>Hotel</a></li>
									
								</ul>
								<!-- Tab panes -->
							</div>
						</div>
						<div class="tab-content tabs">
	
							<!-- Tour Book Form -->
							<div role="tabpanel" class="tab-pane fade in active" id="Tour">
								<form>
									<fieldset class="home-form-1">
									
										<div class="col-md-3 col-sm-3 padd-0">
											<input type="text" class="form-control br-1" value="Cagayan de Oro City" readonly="">
										</div>
										
										<div class="col-md-3 col-sm-3 padd-0">
											<input type="text" name="book-date" id="book-date" class="form-control br-1" value="When...">
										</div>
											
										<div class="col-md-2 col-sm-2 padd-0">
											<div class="sl-box">
												<select class="wide form-control br-1">
													<option data-display="Adults">Adults</option>
													<option value="1">01</option>
													<option value="2">02</option>
													<option value="3">03</option>
													<option value="4">04</option>
												</select>
											</div>
										</div>
											
										<div class="col-md-2 col-sm-2 padd-0">
											<div class="sl-box">
												<select class="wide form-control br-1">
													<option data-display="Children">Children</option>
													<option value="1">01</option>
													<option value="2">02</option>
													<option value="3">03</option>
													<option value="4">04</option>
												</select>
											</div>
										</div>
										
											
										<div class="col-md-2 col-sm-2 padd-0">
											<button type="submit" class="btn theme-btn cl-white seub-btn">FIND TOUR</button>
										</div>
											
									</fieldset>
								</form>
							</div>
							
							<!-- Hotel Book Form -->
							<div role="tabpanel" class="tab-pane fade in" id="Hotel">
								<form action="{{ action('HotelGridController@store') }}" method="post" onsubmit="return calendar();">
     
									<fieldset class="home-form-1">
									
										<div class="col-md-3 col-sm-3 padd-0">
											<input type="text" class="form-control br-1" value="Cagayan de Oro City" readonly="">
										</div>
										
										<div class="col-md-2 col-sm-2 padd-0">
											<select class="wide form-control br-1" name="person" required="person">
												<option data-display="Person" disabled="">Person</option>
												<option value="1" selected="">01 person</option>
												<option value="2">02 person</option>
												<option value="3">03 person</option>
												
											</select>
										</div>
										
									
											
										<div class="col-md-3 col-sm-3 padd-0">
											<input type="text" name="book-date" class="form-control br-1" placeholder="Checkin & Checkout" autocomplete="off" id="book">
										</div>
											
										<div class="col-md-2 col-sm-2 padd-0">
											<button type="submit" class="btn theme-btn cl-white seub-btn" >FIND Hotel</button>
										</div>
										<input type="hidden" name="start" id="start" value="" >
										<input type="hidden" name="ends" id="ends" value="">
										@csrf
											
									</fieldset>
									
									</form>
							</div>
							
							<!-- Flight Book Form -->
						
							<!-- Restaurant Book Form -->
							
						</div>
						
					</div>
				</div>
			</div>