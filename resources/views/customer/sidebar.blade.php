							<div class="col-lg-2 col-md-2 col-sm-3 dashboard-bg">
							<nav class="navbar navbar-side">
							<!-- Start Logo Header Navigation -->
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#dashboard-menu">
									<i class="fa fa-bars"></i>
								</button>

							</div>
							<div class="collapse sidebar-collapse" id="dashboard-menu">
								<div class="profile-wrapper">
									<div class="profile-wrapper-thumb">
										<img src="{{ asset('agency/assets/img/'.$cus->image) }}" class="img-responsive img-circle" alt="" />
										<span class="dashboard-user-status bg-success"></span>
									</div>
									<h4>{{ $cus->fname }} {{ $cus->lname }}</h4>
								</div>
								<ul class="nav" id="main-menu">
									
									<li class="active">
										<a href="{{ url('Dashboard') }}"><i class="fa fa-dashboard" aria-hidden="true"></i>Dashboard</a>
									</li>
									<li>
										<a href="{{ url('Booking') }}"><i class="ti-calendar" aria-hidden="true"></i>My Booking </a>
										
									
									</li>
									<li>
										<a href="{{ url('Invoice') }}"><i class="fa fa-print" aria-hidden="true"></i>Invoice</a>
									</li>
									<li>
										<a href="{{ url('Setting') }}"><i class="fa fa-cog" aria-hidden="true"></i>Settings </span></a>
										
									</li>
									<li>
										<a href="{{ url('/') }}"><i class="fa fa-suitcase" aria-hidden="true"></i>Book now </span></a>
										
									</li>
								
								</ul>
							</div>
						</nav>
					</div>


