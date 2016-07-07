<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport"
	content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<title>Location - Overview</title>
<link rel="stylesheet" href="../css/library/magnific-popup.css">
<?php
include '../includes/css.php';
include '../includes/connect_to_mysql.php';

?>

<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script
	src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>

</head>
<body>
	<div id="preloader">
		<div class="tb-cell">
			<div id="page-loading">
				<div></div>
				<p>Loading</p>
			</div>
		</div>
	</div>
	<div id="wrap">
		<header id="header" class="header">
			<div class="container">
				<div class="logo float-left">
					<a href="index.html" title=""><img src="../images/logo-header.png"
						alt=""></a>
				</div>
				<div class="bars" id="bars"></div>
				<nav class="navigation nav-c" id="navigation" data-menu-type="1200">
					<div class="nav-inner">
						<a href="#" class="bars-close" id="bars-close">Close</a>
						<div class="tb">
							<div class="tb-cell">
								<ul class="menu-list text-uppercase">
									<li><a href="index.html" title="">Home</a>
									<ul class="sub-menu">
											<li><a href="index.html" title="">Home menu 1</a></li>
											<li><a href="index2.html" title="">Home menu 2</a></li>
											<li><a href="index3.html" title="">Home menu 3</a></li>
											<li><a href="index4.html" title="">Home menu 4</a></li>
											<li><a href="index5.html" title="">Home background slide</a></li>
											<li><a href="index6.html" title="">Home background video</a></li>
										</ul></li>
									<li><a href="#">Pages</a>
									<ul class="sub-menu">
											<li><a href="#" title="">Blog</a>
											<ul class="sub-menu">
													<li><a href="blog.html" title="">Blog</a></li>
													<li><a href="blog-detail.html">Blog Detail</a></li>
												</ul></li>
											<li><a href="about.html" title="">About</a></li>
											<li><a href="#" title="">User</a>
											<ul class="sub-menu">
													<li><a href="user-booking.html" title="">User Booking</a></li>
													<li><a href="user-profile.html" title="">User Profile</a></li>
													<li><a href="user-setting.html" title="">User Setting</a></li>
													<li><a href="user-review.html" title="">User Review</a></li>
													<li><a href="user-signup.html" title="">User Signup</a></li>
												</ul></li>
											<li><a href="contact.html" title="">Contact</a></li>
											<li><a href="payment.html" title="">Payment</a></li>
											<li><a href="element.html" title="">Element</a></li>
											<li><a href="404.html" title="">404</a></li>
											<li><a href="comingsoon.html" title="">Comingsoon</a></li>
										</ul></li>
									<li><a href="#" title="">Hotel</a>
									<ul class="sub-menu">
											<li><a href="home-hotel.html" title="">Hotel</a></li>
											<li><a href="hotel-list.html">Hotel List 1</a></li>
											<li><a href="hotel-list-2.html">Hotel List 2</a></li>
											<li><a href="hotel-maps.html">Hotel Map</a></li>
											<li><a href="hotel-detail.html">Hotel Detail</a></li>
										</ul></li>
									<li><a href="#" title="">Flights</a>
									<ul class="sub-menu">
											<li><a href="home-flight.html" title="">Flights</a></li>
											<li><a href="flight-list.html">Flight List</a></li>
										</ul></li>
									<li><a href="#" title="">Car</a>
									<ul class="sub-menu">
											<li><a href="home-car.html" title="">Car</a></li>
											<li><a href="car-list.html">Cart List</a></li>
										</ul></li>
									<li><a href="#" title="">Package</a>
									<ul class="sub-menu">
											<li><a href="home-package.html" title="">Package Deals</a></li>
											<li><a href="package-list.html">Package Deals List</a></li>
										</ul></li>
									<li><a href="#" title="">Cruises</a>
									<ul class="sub-menu">
											<li><a href="home-cruise.html" title="">Cruises</a></li>
											<li><a href="cruise-list.html">Cruise List</a></li>
											<li><a href="cruise-detail.html">Cruise Detail</a></li>
										</ul></li>
									<li class="current-menu-parent"><a href="#" title="">Tours</a>
									<ul class="sub-menu">
											<li><a href="home-tour.html" title="">Tours</a></li>
											<li><a href="tour-list.html">Tour List</a></li>
											<li class="current-menu-item"><a href="tour-detail.html">Tour
													Detail</a></li>
										</ul></li>
								</ul>
							</div>
						</div>
					</div>
				</nav>
			</div>
		</header>
		<section class="sub-banner">
			<div class="bg-parallax bg-1"></div>
			<div class="logo-banner text-center">
				<a href="" title=""><img src="../images/logo-banner.png" alt=""></a>
			</div>
		</section>
		<div class="main main-dt">
			<div class="container">
			
			<?php
			$destination = mysqli_real_escape_string ( $conn, $_GET ['destination'] );
			// $sql=mysqli_query($conn, "SELECT * FROM `hotel` WHERE `hotel_id` ='$id'");
			/*
			 * $sql = mysqli_query ( $conn, "SELECT h.hotel_name hotel_name,ha.city hotel_city, ha.country hotel_country
			 * FROM hotel h, hotel_address ha WHERE h.hotel_id = ha.hotel_id AND h.hotel_id = '$hotel_id'" );
			 */
			$sql = mysqli_query ( $conn, "select destination_overview,destination_country,tag_line from destination where destination_name =  '$destination' " );
			$existCount = mysqli_num_rows ( $sql ); // count the row nums
			
			if ($existCount == 1) {
				while ( $row = mysqli_fetch_array ( $sql ) ) {
					
					$overview = $row ['destination_overview'];
					$country=$row['destination_country'];
					$tag = $row['tag_line'];
					
				}
			}
					?>
			
				<div class="main-cn detail-page bg-white clearfix">
					<section class="breakcrumb-sc">
						<ul class="breadcrumb arrow">
							<li><a href="index.html"><i class="fa fa-home"></i></a></li>
							<li><a href="hotel.html" title="">Destination</a></li>
							<li><a href="#" title=""><?php echo ucwords(strtolower($country));?></a></li>
							<li><?php echo ucwords(strtolower($destination));?></li>
						</ul>
						
					</section>
					<section class="head-detail">
						<div class="head-dt-cn">
							<div class="row">
								<div class="col-sm-7" style="margin-top: -30px;">
									<h1><?php echo ucwords(strtolower($tag));?></h1>
								</div>
								
							</div>
						</div>
					</section>
					<section class="detail-slider">
						<div class="slide-room-lg">
							<div id="slide-room-lg">
								<img src="images/tour/slide/img-1.jpg" alt=""> <img
									src="images/tour/slide/img-1.jpg" alt=""> <img
									src="images/tour/slide/img-1.jpg" alt=""> <img
									src="images/tour/slide/img-1.jpg" alt=""> <img
									src="images/tour/slide/img-1.jpg" alt=""> <img
									src="images/tour/slide/img-1.jpg" alt=""> <img
									src="images/tour/slide/img-1.jpg" alt=""> <img
									src="images/tour/slide/img-1.jpg" alt=""> <img
									src="images/tour/slide/img-1.jpg" alt=""> <img
									src="images/tour/slide/img-1.jpg" alt="">
							</div>
						</div>
						<div class="slide-room-sm">
							<div class="row">
								<div class="col-md-8 col-md-offset-2">
									<div id="slide-room-sm">
										<img src="images/cruise/slide/img-2.jpg" alt=""> <img
											src="images/cruise/slide/img-3.jpg" alt=""> <img
											src="images/cruise/slide/img-4.jpg" alt=""> <img
											src="images/cruise/slide/img-5.jpg" alt=""> <img
											src="images/cruise/slide/img-6.jpg" alt=""> <img
											src="images/hotel/thumnail/img-3.png" alt=""> <img
											src="images/cruise/slide/img-7.jpg" alt=""> <img
											src="images/cruise/slide/img-8.jpg" alt=""> <img
											src="images/cruise/slide/img-2.jpg" alt=""> <img
											src="images/cruise/slide/img-5.jpg" alt="">
									</div>
								</div>
							</div>
						</div>
					</section>
					<section class="tour-overview detail-cn" id="tour-overview">
						<div class="row">
							<div class="col-lg-3 detail-sidebar">
								<div class="scroll-heading">
									<h2>overview</h2>
									<hr class="hr">
									<a href="#optional-acitivites" title="">Places to visit</a>
									<a href="#accomodation" title="">Hotels</a> <a
										href="#tour-meals" title="">Meals</a> <a
										href="#tour-necessary">No Tip Necessary</a>
								</div>
							</div>
							<div class="col-lg-9 tour-overview-cn">
								<div class="tour-description">
									<h2 class="title-detail">Description</h2>
									<div class="tour-detail-text">
										<p>
											<?php echo $overview; ?>
										</p>
									</div>
								</div>
															</div>
						</div>
					</section>
					
					
					<section class="cabin-type detail-cn" id="cabin-type">
						<div class="row">
							<div class="col-lg-3 detail-sidebar">
								<div class="scroll-heading">
									<h2>Cabin type</h2>
									<hr class="hr">
									<a href="#date-availability" title="">Date availability</a> <a
										href="#cabin-number" title="">Cabin number</a> <a
										href="#cruise-overview" title="">Cruise overview</a>
								</div>
							</div>
							<div class="col-lg-9 cabin-type-cn">
								<h2 class="title-detail">Places to visit</h2>
								<div class="responsive-table">
									<table class="table cabin-type-tabel">
										
										<tbody>
											<tr>
												
												<td class="td-room">
												<h2>Inside</h2>
												<figure>
														<img src="../images/hotel/img-5.jpg" alt="">
													</figure>
													
													<p>The smallest cabins onboard and have no view. Price
														differences between the cabin types usually relate to the
														specific deck and location of the cabin</p></td>
												<td class="td-room"><figure>
														<img src="../images/hotel/img-5.jpg" alt="">
													</figure>
													<h2>Inside</h2>
													<p>The smallest cabins onboard and have no view. Price
														differences between the cabin types usually relate to the
														specific deck and location of the cabin</p></td>
														<td class="td-room"><figure>
														<img src="../images/hotel/img-5.jpg" alt="">
													</figure>
													<h2>Inside</h2>
													<p>The smallest cabins onboard and have no view. Price
														differences between the cabin types usually relate to the
														specific deck and location of the cabin</p></td>
														
														<td class="td-room"><figure>
														<img src="../images/hotel/img-5.jpg" alt="">
													</figure>
													<h2>Inside</h2>
													<p>The smallest cabins onboard and have no view. Price
														differences between the cabin types usually relate to the
														specific deck and location of the cabin</p></td>
											</tr>
											
											
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</section>
					
					
					
					<section class="optional-acitivites detail-cn"
						id="optional-acitivites">
						<div class="row">
							<div class="col-lg-3 detail-sidebar">
								<div class="scroll-heading">
									<h2>Optional Activities</h2>
									<hr class="hr">
									<a href="#tour-overview" title="">Overview</a> <a
										href="#accomodation" title="">accomodation</a> <a
										href="#tour-meals" title="">Meals</a> <a
										href="#tour-necessary">No Tip Necessary</a>
								</div>
							</div>
							<div class="col-lg-9 optional-acitivites-cn">
								<div class="tour-detail-text">
									<p>
										On all trips we have arranged extra activities that we think
										will enhance your travel experience, but you have a choice as
										to whether or not you will participate. These are not included
										in the cost of your trip. They are usually organised on a
										group participation basis and should be taken into
										consideration when budgeting your spending money.<br>None of
										the Optional Activities on your trip are operated by Topdeck,
										nor do they form part of your contract with Topdeck for your
										trip. Topdeck arranges the activity as an agent of the local
										supplier. Should you participate in any Optional Activities
										your contract will be with the local supplier and their
										conditions will apply.
									</p>
								</div>
								<div class="optional-list">
									<h4>United States - Grand Canyon, Arizona</h4>
									<p>
										<span>Helicopter ride:</span> $220-$265 depending on duration
									</p>
									<p>
										<span>Bike ride:</span> $10-$35 depending on duration
									</p>
									<h4>United States - Las Vegas, Nevada</h4>
									<p>
										<span>Go Karting:</span> $60
									</p>
									<p>
										<span>Gun range:</span> $14-$34
									</p>
									<p>
										<span>Rollercoasters:</span> $14-$34
									</p>
									<h4>United States - Yosemite National Park, California</h4>
									<p>
										<span>Bike hire (seasonal):</span> $11 per hour
									</p>
									<p>
										<span>Ice skating:</span> $31.50 per day
									</p>
									<p>
										<span>Rollercoasters:</span> $10
									</p>
									<h4>United States - Las Vegas, Nevada</h4>
									<p>
										<span>Go Karting:</span> $60
									</p>
									<p>
										<span>Gun range:</span> $14-$34
									</p>
									<p>
										<span>Rollercoasters:</span> $14-$34
									</p>
									<h4>United States - Yosemite National Park, California</h4>
									<p>
										<span>Bike hire (seasonal):</span> $11 per hour
									</p>
									<p>
										<span>Ice skating:</span> $31.50 per day
									</p>
									<p>
										<span>Rollercoasters:</span> $10
									</p>
								</div>
							</div>
						</div>
					</section>
					<section class="accomodation detail-cn" id="accomodation">
						<div class="row">
							<div class="col-lg-3 detail-sidebar">
								<div class="scroll-heading">
									<h2>accomodation</h2>
									<hr class="hr">
									<a href="#tour-overview" title="">Overview</a> <a
										href="#optional-acitivites" title="">Optional activities</a> <a
										href="#tour-meals" title="">Meals</a> <a
										href="#tour-necessary">No Tip Necessary</a>
								</div>
							</div>
							<div class="col-lg-9 accomodation-cn">
								<div class="tour-detail-text">
									<p>Nunc a eleifend metus. Praesent sit amet libero non leo
										dapibus pharetra vel ultrices nulla. Nullam egestas finibus
										purus, iaculis ornare sem ornare non. Nam pellentesque justo
										et arcu scelerisque, non pretium purus feugiat. Fusce rutrum
										ipsum a lacinia tempor. Duis porta arcu in velit tincidunt
										dapibus. Integer nisi diam, fermentum in elementum at,
										volutpat et nulla. Praesent quis tincidunt urna. Phasellus
										elit est, aliquam et massa a, porta dictum eros. Nulla dapibus
										arcu at mi bibendum vestibulum. Suspendisse in arcu vitae
										ipsum facilisis cursus id quis leo. Cras non lacinia tortor.
										Etiam nec turpis non tortor mollis volutpat. In euismod
										viverra leo, eu tristique ligula bibendum eu. Aenean eget
										auctor odio, nec porttitor sem.</p>
									<p>Vivamus ultricies eget eros ac pellentesque. Morbi egestas
										euismod sem, vel dapibus ante volutpat id. Integer mollis
										pulvinar risus in bibendum. Vivamus dolor est, viverra vel
										aliquam sit amet, finibus ut mi. Nunc viverra enim et nulla
										suscipit, nec laoreet sapien convallis. Pellentesque congue in
										dui vehicula viverra. Curabitur eu quam dui. Aliquam sodales
										ante non gravida varius.</p>
									<br>
									<h5>
										<strong>Important Note:</strong>
									</h5>
									<p>Vestibulum feugiat pulvinar nisi et consequat. Vestibulum
										eleifend quis ex sit amet consequat. Quisque interdum risus id
										justo posuere tempor. Donec faucibus est quis neque
										pellentesque porta. In mattis massa at porttitor aliquam.
										Suspendisse potenti. Aliquam pretium molestie enim, non
										viverra ante tempus sed. Nullam efficitur, justo vel auctor
										porttitor, ex dui tristique libero, quis facilisis lorem nisi
										vel orci.</p>
									<br>
									<p>Pellentesque habitant morbi tristique senectus et netus et
										malesuada fames ac turpis egestas. Aenean mattis eget nisl eu
										viverra. Maecenas finibus ipsum non vestibulum viverra. Ut
										vehicula at quam sit amet bibendum. Vestibulum ac tristique
										risus. Integer odio lacus, mattis eget diam eu, tempus semper
										lectus. Pellentesque finibus velit orci, nec efficitur elit
										maximus in. Fusce eleifend id mi id finibus.</p>
								</div>
							</div>
						</div>
					</section>
					<section class="tour-meals detail-cn" id="tour-meals">
						<div class="row">
							<div class="col-lg-3 detail-sidebar">
								<div class="scroll-heading">
									<h2>Meals</h2>
									<hr class="hr">
									<a href="#tour-overview" title="">Overview</a> <a
										href="#optional-acitivites" title="">Optional activities</a> <a
										href="#accomodation" title="">Accomodation</a> <a
										href="#tour-necessary">No Tip Necessary</a>
								</div>
							</div>
							<div class="col-lg-9 tour-meals-cn">
								<div class="tour-detail-text">
									<ul class="tour-meals-gallery">
										<li><img src="images/tour/img-1.jpg" alt=""></li>
										<li><img src="images/tour/img-2.jpg" alt=""></li>
										<li><img src="images/tour/img-3.jpg" alt=""></li>
										<li><img src="images/tour/img-4.jpg" alt=""></li>
										<li><img src="images/tour/img-5.jpg" alt=""></li>
									</ul>
									<p>
										Your included meals are detailed in the ‘Also Included’
										section of this document.<br>On most days breakfast is
										included. Lunch and dinner when included are in local
										restaurants or you place of accommodation and are either two
										or three courses. In most cases table water is provided with
										the meals, and if you wish to purchase additional drinks you
										can do so at your own expense.
									</p>
									<p>If you have any dietary requirements we will make every
										effort to cater to your specific needs as long as you advise
										your travel agent or Topdeck Trip Consultant when you book.
										But please be aware that although we will do everything in our
										power to arrange it, we cannot guarantee that every restaurant
										we use will be able to cater to all dietary needs. We also
										cannot cater for tastes or dislikes, as most of our included
										evening meals feature a set menu.</p>
								</div>
							</div>
						</div>
					</section>
					<section class="tour-necessary detail-cn" id="tour-necessary">
						<div class="row">
							<div class="col-lg-3 detail-sidebar">
								<div class="scroll-heading">
									<h2>No Tip Necessary</h2>
									<hr class="hr">
									<a href="#tour-overview" title="">Overview</a> <a
										href="#optional-acitivites" title="">Optional activities</a> <a
										href="#accomodation" title="">Accomodation</a> <a
										href="#tour-meals">Meals</a>
								</div>
							</div>
							<div class="col-lg-9 tour-necessary-cn">
								<div class="tour-detail-text">
									<p>Nunc a eleifend metus. Praesent sit amet libero non leo
										dapibus pharetra vel ultrices nulla. Nullam egestas finibus
										purus, iaculis ornare sem ornare non. Nam pellentesque justo
										et arcu scelerisque, non pretium purus feugiat. Fusce rutrum
										ipsum a lacinia tempor. Duis porta arcu in velit tincidunt
										dapibus. Integer nisi diam, fermentum in elementum at,
										volutpat et nulla. Praesent quis tincidunt urna. Phasellus
										elit est, aliquam et massa a, porta dictum eros. Nulla dapibus
										arcu at mi bibendum vestibulum. Suspendisse in arcu vitae
										ipsum facilisis cursus id quis leo. Cras non lacinia tortor.</p>
									<p>Your Topdeck crew never expect tips themselves and will not
										ask for any; that’s not what friends do! We also know how much
										tipping can cost you. So go ahead, spoil yourself with the
										money you will save by travelling with Topdeck!</p>
									<br>
									<p>Vestibulum feugiat pulvinar nisi et consequat. Vestibulum
										eleifend quis ex sit amet consequat. Quisque interdum risus id
										justo posuere tempor. Donec faucibus est quis neque
										pellentesque porta. In mattis massa at porttitor aliquam.
										Suspendisse potenti. Aliquam pretium molestie enim, non
										viverra ante tempus sed. Nullam efficitur, justo vel auctor
										porttitor, ex dui tristique libero, quis facilisis lorem nisi
										vel orci.</p>
									<br>
									<p>Pellentesque habitant morbi tristique senectus et netus et
										malesuada fames ac turpis egestas. Aenean mattis eget nisl eu
										viverra. Maecenas finibus ipsum non vestibulum viverra. Ut
										vehicula at quam sit amet bibendum. Vestibulum ac tristique
										risus. Integer odio lacus, mattis eget diam eu, tempus semper
										lectus. Pellentesque finibus velit orci, nec efficitur elit
										maximus in. Fusce eleifend id mi id finibus.</p>
								</div>
							</div>
						</div>
					</section>
					<section class="detail-footer tour-detail-footer detail-cn">
						<div class="row">
							<div class="col-lg-3"></div>
							<div class="col-lg-9 detail-footer-cn text-right">
								<p class="price-book">
									From-<span>$345</span>/night <a href="" title=""
										class="awe-btn awe-btn-1 awe-btn-lager">Book Now</a>
								</p>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
		
		<?php include("../includes/footer.php"); ?>
		
	</div>
	<?php include '../includes/jsscripts.php';?>
</html>