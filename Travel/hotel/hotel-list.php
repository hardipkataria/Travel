<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport"
	content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<title>Hotel List 2</title>
<?php include '../includes/css.php';
include '../includes/connect_to_mysql.php';
?>
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
									<li class="current-menu-parent"><a href="#" title="">Hotel</a>
									<ul class="sub-menu">
											<li><a href="home-hotel.html" title="">Hotel</a></li>
											<li><a href="hotel-list.html">Hotel List 1</a></li>
											<li class="current-menu-item"><a href="hotel-list-2.html">Hotel
													List 2</a></li>
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
									<li><a href="#" title="">Tours</a>
									<ul class="sub-menu">
											<li><a href="home-tour.html" title="">Tours</a></li>
											<li><a href="tour-list.html">Tour List</a></li>
											<li><a href="tour-detail.html">Tour Detail</a></li>
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
		<div class="main">
			<div class="container">
			<?php
			$location_for_search = mysqli_real_escape_string ( $conn, $_GET ['destination'] );
			// $sql=mysqli_query($conn, "SELECT * FROM `hotel` WHERE `hotel_id` ='$id'");
			$sql = mysqli_query ( $conn, "SELECT h.hotel_name hotel_name,h.hotel_id hotel_id
									FROM hotel h, hotel_address ha WHERE h.hotel_id = ha.hotel_id AND ha.location_for_search =  '$location_for_search'" );
			$existCount = mysqli_num_rows ( $sql ); // count the row nums
			
			if ($existCount == 1) {
				while ( $row = mysqli_fetch_array ( $sql ) ) {
					$hotel_id=$row['hotel_id'];
					$hotel_name = $row ['hotel_name'];
					//$hotel_city = $row ['hotel_city'];
					
					//$hotel_country = $row ['hotel_country'];
					?>
				<div class="main-cn hotel-page bg-white clearfix">
					<div class="row">
						<div class="col-md-9 col-md-push-3">
							<section class="breakcrumb-sc">
								<ul class="breadcrumb arrow">
									<li><a href="../php/index.php"><i class="fa fa-home"></i></a></li>
									<li><a href="hotel.php" title="">Hotels</a></li>
									<li><a href="#" title=""><?php echo ucfirst($location_for_search); ?></a></li>
									
								</ul>
							</section>
							<section class="hotel-list">
								<div class="sort-view clearfix">
									<div class="sort-by float-left">
										<label>Sort by:</label>
										<div class="sort-select select float-left">
											<span data-placeholder="Select">Star rating</span>
											<select	name="start"><option value="1">Star rating</option>
												<option selected="selected" value="1">Star rating 1</option>
												<option value="1">Star rating 2</option>
												<option value="1">Star rating 3</option></select>
										</div>
										<div class="sort-select select float-left">
											<span data-placeholder="Select">Guest rating</span><select
												name="guest"><option value="1">Guest rating</option>
												<option selected="selected" value="1">Guest rating 1</option>
												<option value="1">Guest rating 2</option>
												<option value="1">Guest rating 3</option></select>
										</div>
										<div class="sort-select select float-left">
											<span data-placeholder="Select">Pricing</span><select
												name="pricing"><option value="1">Pricing</option>
												<option selected="selected" value="1">Pricing</option>
												<option value="1">Pricing</option>
												<option value="1">Pricing</option></select>
										</div>
									</div>
									<div class="view-by float-right">
										<ul>
											<li><a href="hotel-list.html" title=""><img
													src="../images/icon-grid.png" alt=""></a></li>
											<li><a href="hotel-list-2.html" title="" class="current"><img
													src="../images/icon-list.png" alt=""></a></li>
											<li><a href="hotel-maps.html" title=""><img
													src="../images/icon-map.png" alt=""></a></li>
										</ul>
									</div>
								</div>
								<div class="hotel-list-cn clearfix">
									<div class="hotel-list-item">
										<figure class="hotel-img float-left">
											<a href="hotel-detail.html" title=""><img
												src="../images/hotel/img-1.jpg" alt=""></a>
										</figure>
										<div class="hotel-text">
											<div class="hotel-name">
												<a href="hotel-detail.php?id=<?php echo $hotel_id; ?>" title=""><?php echo $hotel_name; ?></a>
											</div>
											<div class="hotel-star-address">
												<span class="hotel-star"><i class="glyphicon glyphicon-star"></i>
													<i class="glyphicon glyphicon-star"></i> <i
													class="glyphicon glyphicon-star"></i> <i
													class="glyphicon glyphicon-star"></i> <i
													class="glyphicon glyphicon-star"></i></span> <span
													class="rating">Good<br>
												<ins>7.5</ins></span>
												<address class="hotel-address">42 Princes Square, London W2
													4AD</address>
											</div>
											<p>
												My stay at cumberland hotel was amazing, loved the location,
												was close to all the major attractions allthough there rooms
												seemed... <a href="" title="">view all 125 reviews</a>
											</p>
											<hr class="hr">
											<div class="price-box float-left">
												<span class="price old-price">From-</span> <span
													class="price special-price">$345<small>/night</small></span>
											</div>
											<div class="hotel-service float-right">
												<a href="" title=""><img src="../images/icon-service-1.png"
													alt=""></a> <a href="" title=""><img
													src="../images/icon-service-2.png" alt=""></a> <a href=""
													title=""><img src="../images/icon-service-3.png" alt=""></a> <a
													href="" title=""><img src="../images/icon-service-4.png"
													alt=""></a> <a href="" title=""><img
													src="../images/icon-service-5.png" alt=""></a> <a href=""
													title=""><img src="../images/icon-service-6.png" alt=""></a> <a
													href="" title=""><img src="../images/icon-service-7.png"
													alt=""></a>
											</div>
										</div>
									</div>
									<div class="hotel-list-item">
										<figure class="hotel-img float-left">
											<a href="hotel-detail.html" title=""><img
												src="../images/hotel/img-2.jpg" alt=""></a>
										</figure>
										<div class="hotel-text">
											<div class="hotel-name">
												<a href="hotel-detail.html" title="">The Cosmopolitan</a>
											</div>
											<div class="hotel-star-address">
												<span class="hotel-star"><i class="glyphicon glyphicon-star"></i>
													<i class="glyphicon glyphicon-star"></i> <i
													class="glyphicon glyphicon-star"></i> <i
													class="glyphicon glyphicon-star"></i> <i
													class="glyphicon glyphicon-star"></i></span> <span
													class="rating">Good<br>
												<ins>8.5</ins></span>
												<address class="hotel-address">42 Princes Square, London W2
													4AD</address>
											</div>
											<p>
												My stay at cumberland hotel was amazing, loved the location,
												was close to all the major attractions allthough there rooms
												seemed... <a href="" title="">view all 125 reviews</a>
											</p>
											<hr class="hr">
											<div class="price-box float-left">
												<span class="price old-price">From-</span> <span
													class="price special-price">$345<small>/night</small></span>
											</div>
											<div class="hotel-service float-right">
												<a href="" title=""><img src="../images/icon-service-1.png"
													alt=""></a> <a href="" title=""><img
													src="../images/icon-service-2.png" alt=""></a> <a href=""
													title=""><img src="../images/icon-service-3.png" alt=""></a> <a
													href="" title=""><img src="../images/icon-service-4.png"
													alt=""></a> <a href="" title=""><img
													src="../images/icon-service-5.png" alt=""></a> <a href=""
													title=""><img src="../images/icon-service-6.png" alt=""></a> <a
													href="" title=""><img src="../images/icon-service-7.png"
													alt=""></a>
											</div>
										</div>
									</div>
									<div class="hotel-list-item">
										<figure class="hotel-img float-left">
											<a href="hotel-detail.html" title=""><img
												src="../images/hotel/img-3.jpg" alt=""></a>
										</figure>
										<div class="hotel-text">
											<div class="hotel-name">
												<a href="hotel-detail.html" title="">Melia White House Hotel</a>
											</div>
											<div class="hotel-star-address">
												<span class="hotel-star"><i class="glyphicon glyphicon-star"></i>
													<i class="glyphicon glyphicon-star"></i> <i
													class="glyphicon glyphicon-star"></i> <i
													class="glyphicon glyphicon-star"></i> <i
													class="glyphicon glyphicon-star"></i></span> <span
													class="rating">Goods<br>
												<ins>9.5</ins></span>
												<address class="hotel-address">42 Princes Square, London W2
													4AD</address>
											</div>
											<p>
												My stay at cumberland hotel was amazing, loved the location,
												was close to all the major attractions allthough there rooms
												seemed... <a href="" title="">view all 125 reviews</a>
											</p>
											<hr class="hr">
											<div class="price-box float-left">
												<span class="price old-price">From-</span> <span
													class="price special-price">$345<small>/night</small></span>
											</div>
											<div class="hotel-service float-right">
												<a href="" title=""><img src="../images/icon-service-1.png"
													alt=""></a> <a href="" title=""><img
													src="../images/icon-service-2.png" alt=""></a> <a href=""
													title=""><img src="../images/icon-service-3.png" alt=""></a> <a
													href="" title=""><img src="../images/icon-service-4.png"
													alt=""></a> <a href="" title=""><img
													src="../images/icon-service-5.png" alt=""></a> <a href=""
													title=""><img src="../images/icon-service-6.png" alt=""></a> <a
													href="" title=""><img src="../images/icon-service-7.png"
													alt=""></a>
											</div>
										</div>
									</div>
									<div class="hotel-list-item">
										<figure class="hotel-img float-left">
											<a href="hotel-detail.html" title=""><img
												src="../images/hotel/img-1.jpg" alt=""></a>
										</figure>
										<div class="hotel-text">
											<div class="hotel-name">
												<a href="hotel-detail.html" title="">Kensington Close Hotel</a>
											</div>
											<div class="hotel-star-address">
												<span class="hotel-star"><i class="glyphicon glyphicon-star"></i>
													<i class="glyphicon glyphicon-star"></i> <i
													class="glyphicon glyphicon-star"></i> <i
													class="glyphicon glyphicon-star"></i> <i
													class="glyphicon glyphicon-star"></i></span> <span
													class="rating">Good<br>
												<ins>7.5</ins></span>
												<address class="hotel-address">42 Princes Square, London W2
													4AD</address>
											</div>
											<p>
												My stay at cumberland hotel was amazing, loved the location,
												was close to all the major attractions allthough there rooms
												seemed... <a href="" title="">view all 125 reviews</a>
											</p>
											<hr class="hr">
											<div class="price-box float-left">
												<span class="price old-price">From-</span> <span
													class="price special-price">$345<small>/night</small></span>
											</div>
											<div class="hotel-service float-right">
												<a href="" title=""><img src="../images/icon-service-1.png"
													alt=""></a> <a href="" title=""><img
													src="../images/icon-service-2.png" alt=""></a> <a href=""
													title=""><img src="../images/icon-service-3.png" alt=""></a> <a
													href="" title=""><img src="../images/icon-service-4.png"
													alt=""></a> <a href="" title=""><img
													src="../images/icon-service-5.png" alt=""></a> <a href=""
													title=""><img src="../images/icon-service-6.png" alt=""></a> <a
													href="" title=""><img src="../images/icon-service-7.png"
													alt=""></a>
											</div>
										</div>
									</div>
									
									
								</div>
								<div class="page-navigation-cn">
									<ul class="page-navigation">
										<li class="current"><a href="" title="">1</a></li>
										<li><a href="" title="">2</a></li>
										<li><a href="" title="">3</a></li>
										<li><a href="" title="">4</a></li>
										<li><a href="" title="">5</a></li>
										<li><a href="" title="">...</a></li>
										<li class="last"><a href="" title="">Last</a></li>
									</ul>
								</div>
							</section>
						</div>
						<div class="col-md-3 col-md-pull-9">
							<div class="sidebar-cn">
								<div class="search-result">
									<p>
										We found<br>
										<ins>640</ins>
										<span>properties availability</span>
									</p>
								</div>
								<div class="search-sidebar">
									<div class="row">
										<div class="form-search clearfix">
											<div class="form-field col-md-12">
												<label for="destination"><span>Destination:</span>
													Netherlands</label><input type="text" id="destination"
													value="" class="field-input">
											</div>
											<div class="form-field field-date col-md-6">
												<input type="text" class="field-input calendar-input"
													placeholder="Check in">
											</div>
											<div class="form-field field-date col-md-6">
												<input type="text" class="field-input calendar-input"
													placeholder="Check out">
											</div>
											<div class="form-field field-select col-md-6">
												<div class="select">
													<span>2 guest</span><select><option>1 guest</option>
														<option selected="selected">2 guest</option>
														<option>3 guest</option>
														<option>4 guest</option></select>
												</div>
											</div>
											<div class="form-submit col-md-12">
												<button type="submit"
													class="awe-btn awe-btn-medium awe-search">Search</button>
											</div>
										</div>
									</div>
								</div>
								<div class="narrow-results">
									<h6>Narrow your results</h6>
									<div class="narrow-form">
										<form action="narrow" method="get">
											<input type="text" name="" class="narrow-input"
												placeholder="Property name contains:">
											<button class="submit-narrow"></button>
										</form>
									</div>
								</div>
								<div class="widget-sidebar start-rating-sidebar">
									<h4 class="title-sidebar">Star rating</h4>
									<ul class="widget-rate">
										<li><div class="radio-checkbox">
												<input id="rating-5" type="checkbox" class="checkbox"><label
													for="rating-5"></label>
											</div>
											<div class="group-star">
												<i class="glyphicon glyphicon-star"></i> <i
													class="glyphicon glyphicon-star"></i> <i
													class="glyphicon glyphicon-star"></i> <i
													class="glyphicon glyphicon-star"></i> <i
													class="glyphicon glyphicon-star"></i>
											</div>5 Stars <span>12</span></li>
										<li><div class="radio-checkbox">
												<input id="rating-4" type="checkbox" class="checkbox"><label
													for="rating-4"></label>
											</div>
											<div class="group-star">
												<i class="glyphicon glyphicon-star"></i> <i
													class="glyphicon glyphicon-star"></i> <i
													class="glyphicon glyphicon-star"></i> <i
													class="glyphicon glyphicon-star"></i>
											</div>4 Stars <span>12</span></li>
										<li><div class="radio-checkbox">
												<input id="rating-3" type="checkbox" class="checkbox"><label
													for="rating-3"></label>
											</div>
											<div class="group-star">
												<i class="glyphicon glyphicon-star"></i> <i
													class="glyphicon glyphicon-star"></i> <i
													class="glyphicon glyphicon-star"></i>
											</div>3 Stars <span>12</span></li>
										<li><div class="radio-checkbox">
												<input id="rating-2" type="checkbox" class="checkbox"><label
													for="rating-2"></label>
											</div>
											<div class="group-star">
												<i class="glyphicon glyphicon-star"></i> <i
													class="glyphicon glyphicon-star"></i>
											</div>2 Stars <span>12</span></li>
										<li><div class="radio-checkbox">
												<input id="rating-1" type="checkbox" class="checkbox"><label
													for="rating-1"></label>
											</div>
											<div class="group-star">
												<i class="glyphicon glyphicon-star"></i>
											</div>1 Stars <span>12</span></li>
										<li><div class="radio-checkbox">
												<input id="rating-6" type="checkbox" class="checkbox"><label
													for="rating-6"></label>
											</div>
											<div class="group-star">
												<i class="glyphicon glyphicon-star-empty"></i>
											</div>Not Rated <span>12</span></li>
									</ul>
								</div>
								<div class="widget-sidebar price-slider-sidebar">
									<h4 class="title-sidebar">
										Price <span>(per night)</span>
									</h4>
									<div class="slider-sidebar price-slider">
										<input type="text" name="price" class="range" value="0,1500">
									</div>
								</div>
								<div class="widget-sidebar facilities-sidebar">
									<h4 class="title-sidebar">Hotel facilities</h4>
									<ul class="widget-ul">
										<li><div class="radio-checkbox">
												<input id="facilities-1" type="checkbox" class="checkbox"><label
													for="facilities-1">Swimming Pool</label>
											</div>
											<span>12</span></li>
										<li><div class="radio-checkbox">
												<input id="facilities-2" type="checkbox" class="checkbox"
													checked="checked"><label for="facilities-2">Gym/Fitness</label>
											</div>
											<span>12</span></li>
										<li><div class="radio-checkbox">
												<input id="facilities-3" type="checkbox" class="checkbox"><label
													for="facilities-3">Car Park</label>
											</div>
											<span>12</span></li>
										<li><div class="radio-checkbox">
												<input id="facilities-4" type="checkbox" class="checkbox"><label
													for="facilities-4">Spa/Sauna</label>
											</div>
											<span>12</span></li>
										<li><div class="radio-checkbox">
												<input id="facilities-5" type="checkbox" class="checkbox"><label
													for="facilities-5">Casino</label>
											</div>
											<span>12</span></li>
										<li><div class="radio-checkbox">
												<input id="facilities-6" type="checkbox" class="checkbox"><label
													for="facilities-6">Free Wifi</label>
											</div>
											<span>12</span></li>
										<li><div class="radio-checkbox">
												<input id="facilities-7" type="checkbox" class="checkbox"><label
													for="facilities-7">Pet-friendly</label>
											</div>
											<span>12</span></li>
										<li><div class="radio-checkbox">
												<input id="facilities-8" type="checkbox" class="checkbox"><label
													for="facilities-8">Airport Transfer</label>
											</div>
											<span>12</span></li>
										<li><div class="radio-checkbox">
												<input id="facilities-9" type="checkbox" class="checkbox"><label
													for="facilities-9">Smoking Area</label>
											</div>
											<span>12</span></li>
									</ul>
								</div>
								<div class="widget-sidebar area-sidebar">
									<h4 class="title-sidebar">Area</h4>
									<ul class="widget-ul">
										<li><div class="radio-checkbox">
												<input id="area-1" type="checkbox" class="checkbox"><label
													for="area-1">Earls Court</label>
											</div>
											<span>12</span></li>
										<li><div class="radio-checkbox">
												<input id="area-2" type="checkbox" class="checkbox"
													checked="checked"><label for="area-2">Victoria and
													Westminster</label>
											</div>
											<span>12</span></li>
										<li><div class="radio-checkbox">
												<input id="area-3" type="checkbox" class="checkbox"><label
													for="area-3">Bloomsbury - Fitzrovia</label>
											</div>
											<span>12</span></li>
										<li><div class="radio-checkbox">
												<input id="area-4" type="checkbox" class="checkbox"><label
													for="area-4">West End -Soho</label>
											</div>
											<span>12</span></li>
										<li><div class="radio-checkbox">
												<input id="area-5" type="checkbox" class="checkbox"><label
													for="area-5">Chelsea - Kensington</label>
											</div>
											<span>12</span></li>
										<li><div class="radio-checkbox">
												<input id="area-6" type="checkbox" class="checkbox"><label
													for="area-6">Heathrow &amp; Nearby</label>
											</div>
											<span>12</span></li>
										<li><div class="radio-checkbox">
												<input id="area-7" type="checkbox" class="checkbox"><label
													for="area-7">Gatwick Airport &amp; Nearby</label>
											</div>
											<span>12</span></li>
										<li><div class="radio-checkbox">
												<input id="area-8" type="checkbox" class="checkbox"><label
													for="area-8">Heathrow &amp; Nearby</label>
											</div>
											<span>12</span></li>
										<li><div class="radio-checkbox">
												<input id="area-9" type="checkbox" class="checkbox"><label
													for="area-9">The City</label>
											</div>
											<span>12</span></li>
										<li><div class="radio-checkbox">
												<input id="area-10" type="checkbox" class="checkbox"><label
													for="area-10">Greenwich</label>
											</div>
											<span>12</span></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				<?php }}?>
				</div>
			</div>
		</div>
		<?php include("../includes/footer.php"); ?>
		
	</div>
	<?php include '../includes/jsscripts.php';?>
	
	
</body>
</html>