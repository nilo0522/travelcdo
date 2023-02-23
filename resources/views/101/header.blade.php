
			<nav id="head" class="navbar navbar-default navbar-mobile navbar-fixed white no-background bootsnav">
			<div class="container">
			
				<!-- Start Logo Header Navigation -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
						<i class="fa fa-bars"></i>
					</button>
					<a class="navbar-brand" href="{{ url('/') }}">
						<img src="{{asset('agency/assets/img/logo-light.png')}}" class="logo logo-display" alt="">
						<img src="{{asset('agency/assets/img/logo.png')}}" class="logo logo-scrolled" alt="">
					</a>

				</div>
				<!-- End Logo Header Navigation -->

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="navbar-menu">
					
					@if(session('customer') !=null)
					@foreach(session('customer') as $cus)
						
					<ul class="nav navbar-nav navbar-right">
						
						<li class="dropdown dash-link"><a href="#" class="dropdown-toggle" style="color: #ff4e00"><img src='{{ asset("agency/assets/img/".$cus->image) }}' class="img-responsive avatar" alt="" />Hi, {{ $cus->fname }}</a> 
							<ul class="dropdown-menu left-nav">
								<li><a href="{{ url('Dashboard') }}"><i class="fa fa-tachometer"></i> Dashboard</a></li>
								
								<li><a href="{{ url('customer-logout') }}"><i class="fa fa-sign-out"></i> Log Out</a></li>
							</ul>
						</li>
						
					</ul>
					@endforeach
					@else
					<ul class="nav navbar-nav navbar-right">
						<li class="br-right"><a href="{{ url('customer-login') }}"><i class="login-icon ti-user"></i>Login</a></li>
						<li class="border-right" style="border-left: 2px solid green;height: 12px;margin-top: 28px"><span ></span></li>
						<li class="br-right"><a href="{{ url('customer-register') }}"> Register</a></li>
					</ul>
					@endif	
				</div>
				<!-- /.navbar-collapse -->
			</div>   
		</nav>
		