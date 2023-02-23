<!DOCTYPE html>
<html lang="en">
	
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>

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
	
	<body>
		
		<!-- ======================= Start Navigation ===================== -->
		@include('101.header')
		<!-- ======================= End Navigation ===================== -->

		
		<!-- ======================= Start Dashboard ===================== -->
		@foreach(session('customer') as $cus)

		<section class="dashboard gray-bg padd-0 mrg-top-50">
			<div class="container-fluid">
				<div class="row">
					
					
						<!-- /. NAV TOP  -->
							@include('customer.sidebar')
						<!-- /. NAV SIDE  -->
					
					
						@yield('content')
					
				</div>
			</div>
		</section>
		<!-- ======================= End Dashboard ===================== -->
			
		<!-- ============== Before Footer ====================== -->
		<footer class="dark-bg">
			<div class="container">
				
				<!-- Row Start -->
				
				
				<!-- Row Start -->
				<div class="row">
					<div class="col-md-12">
						<div class="copyright text-center">
							<p><a target="_blank" href="">Travel CDO</a></p>
						</div>
					</div>
				</div>
				
			</div>
		</footer>
		@endforeach
		<!-- =================== Before Footer ====================== -->
			
		<!-- ================= footer start ========================= -->
		
		<!-- Switcher -->
	

		 
		<!-- =================== START JAVASCRIPT ================== -->
		
		<script>
			function openRightMenu() {
				document.getElementById("rightMenu").style.display = "block";
			}
			function closeRightMenu() {
				document.getElementById("rightMenu").style.display = "none";
			}
		</script>

		<script type="text/javascript">
			$(document).ready(function() {
				$('#styleOptions').styleSwitcher();
			});
		</script>
		 <script type="text/javascript">
      function readURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();
              
              reader.onload = function (e) {
                  $('#profile-img-tag').attr('src', e.target.result);
              }
              reader.readAsDataURL(input.files[0]);
          }
      }
      $("#h_image").change(function(){
          readURL(this);
      });
  </script>

		
    </body>

</html>
