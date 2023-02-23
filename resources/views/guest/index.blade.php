@extends('layouts.guestlayout')

@section('content')
	<div class="intro" style="margin-top: 20px">
<div class="container">
			<div class="row">
				<div class="col text-center">
					<h2 class="section_title">the best hotels in cagayan de oro city</h2>
				</div>
			</div>
			<div class="row offers_items">


				<div class="col-lg-6 offers_col">
					<div class="offers_item">
						<div class="row">
							<div class="col-lg-6">
								<div class="offers_image_container">

									<a href="{{'grooms'}}" onclick="" id="a"><div class="offers_image_background" style="background-image:url(images/offer_11.jpg)"></div>
									<div class="offer_name"><a href="" onclick="res()" id="b">New Dawn</a></div></a>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="offers_content">
									<div class="offers_price">₱ 13 626<span>price for 7 nights</span></div>
									<div class="rating_r rating_r_4 offers_rating">
										<i></i>
										<i></i>
										<i></i>
										<i></i>
										<i></i>
									</div>
									<p class="offers_text">Don Apolinar Velez corner with Macahambus street
</p>
									<div class="offers_icons">
										<ul class="offers_icons_list">
											<li class="offers_icons_item"><i class="fa fa-wifi fa-lg"></i></li>
											<li class="offers_icons_item"><i class="fa fa-shower fa-lg"> </i></li>
											<li class="offers_icons_item"><i class="fa fa-tv fa-lg"></i></li>
											<li class="offers_icons_item"><i class="fa fa-snow fa-lg"></i></li>


										</ul>
									</div>
							<div class="col-lg-10"><div class="row">
								<span style="margin-left: 5px"></span> <b><?php

									/* $sql="select count(status) as total from room_status where status='Available';"; 

					                $result = mysqli_query($con, $sql) or die(mysqli_error($con));
					                $values = mysqli_fetch_assoc($result); 
					                $count = $values['total']; 
					                echo $count;*/

								 ?><span></span></b></div>

							</div>
									<div class="offers_link"><a href="" id="c" onclick="">Read More</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>


				<div class="col-lg-6 offers_col">
					<div class="offers_item">
						<div class="row">
							<div class="col-lg-6">
								<div class="offers_image_container">

									<div class="offers_image_background" style="background-image:url(images/offer_2_1.jpg)"></div>
									<div class="offer_name"><a href="#">1A Express Hotel</a></div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="offers_content">
									<div class="offers_price">₱ 22 576<span>price for 7 nights</span></div>
									<div class="rating_r rating_r_4 offers_rating">
										<i></i>
										<i></i>
										<i></i>
										<i></i>
										<i></i>
									</div>
									<p class="offers_text">One Avenue Building Claro M. Recto Avenue</p>
									<div class="offers_icons">
										<ul class="offers_icons_list">

											<li class="offers_icons_item"><img src="images/compass.png" alt=""></li>
											<li class="offers_icons_item"><img src="images/bicycle.png" alt=""></li>

										</ul>
									</div>
									<div class="offers_link"><a href="" id="c">read more</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-6 offers_col">
					<div class="offers_item">
						<div class="row">
							<div class="col-lg-6">
								<div class="offers_image_container">

									<div class="offers_image_background" style="background-image:url(images/offer_3_1.jpg)"></div>
									<div class="offer_name" style="height: auto;"><a href="#">The Pacifico Boutique Hotel</a></div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="offers_content">
									<div class="offers_price">₱ 18 883<span>price for 7 nights</span></div>
									<div class="rating_r rating_r_4 offers_rating">
										<i></i>
										<i></i>
										<i></i>
										<i></i>
										<i></i>
									</div>
									<p class="offers_text">Don Apolinar Velez St., cor Fernandez Street</p>
									<div class="offers_icons">
										<ul class="offers_icons_list">
											<li class="offers_icons_item"><img src="images/post.png" alt=""></li>
											<li class="offers_icons_item"><img src="images/compass.png" alt=""></li>
											<li class="offers_icons_item"><img src="images/bicycle.png" alt=""></li>
											<li class="offers_icons_item"><img src="images/sailboat.png" alt=""></li>
										</ul>
									</div>
									<div class="offers_link"><a href="" id="c">read more</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>


				<div class="col-lg-6 offers_col">
					<div class="offers_item">
						<div class="row">
							<div class="col-lg-6">
								<div class="offers_image_container">

									<div class="offers_image_background" style="background-image:url(images/offer_4_1.jpg)"></div>
									<div class="offer_name"><a href="#">Maxandrea Hotel</a></div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="offers_content">
									<div class="offers_price">₱ 14 150<span>price for 7 nights</span></div>
									<div class="rating_r rating_r_4 offers_rating">
										<i class="fa fa-star"></i>
										<i></i>
										<i></i>
										<i></i>
										<i></i>
									</div>
									<p class="offers_text">J.R Borja cor Aguinaldo Street</p>
									<div class="offers_icons">
										<ul class="offers_icons_list">
											<li class="offers_icons_item"><img src="images/post.png" alt=""></li>
											<li class="offers_icons_item"><img src="images/compass.png" alt=""></li>
											<li class="offers_icons_item"><img src="images/bicycle.png" alt=""></li>
											<li class="offers_icons_item"><img src="images/sailboat.png" alt=""></li>
										</ul>
									</div>
									<div class="offers_link"><a href="hotelabout.php">read more</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
@endsection
