<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport"
	content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<title>Hotel Detail</title>
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
									<li class="current-menu-parent"><a href="#" title="">Hotel</a>
										<ul class="sub-menu">
											<li><a href="home-hotel.html" title="">Hotel</a></li>
											<li><a href="hotel-list.html">Hotel List 1</a></li>
											<li><a href="hotel-list-2.html">Hotel List 2</a></li>
											<li><a href="hotel-maps.html">Hotel Map</a></li>
											<li class="current-menu-item"><a href="hotel-detail.html">Hotel
													Detail</a></li>
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
		<div class="main main-dt">
			<div class="container">
			<?php
			$hotel_id = mysqli_real_escape_string ( $conn, $_GET ['id'] );
			// $sql=mysqli_query($conn, "SELECT * FROM `hotel` WHERE `hotel_id` ='$id'");
			/*
			 * $sql = mysqli_query ( $conn, "SELECT h.hotel_name hotel_name,ha.city hotel_city, ha.country hotel_country
			 * FROM hotel h, hotel_address ha WHERE h.hotel_id = ha.hotel_id AND h.hotel_id = '$hotel_id'" );
			 */
			$sql = mysqli_query ( $conn, "SELECT h.hotel_name hotel_name,ha.city hotel_city, ha.country hotel_country,
					ha.addr_line_one address_line_one,ha.addr_line_two address_line_two,ha.latitude latitude, 
					ha.longitude longitude,hs.free_breakfast free_breakfast
 FROM hotel h, hotel_address ha, hotel_services hs WHERE h.hotel_id = ha.hotel_id  and h.hotel_id=hs.hotel_id AND h.hotel_id =  '$hotel_id' " );
			$existCount = mysqli_num_rows ( $sql ); // count the row nums
			
			if ($existCount == 1) {
				while ( $row = mysqli_fetch_array ( $sql ) ) {
					
					$hotel_name = $row ['hotel_name'];
					$hotel_city = $row ['hotel_city'];
					
					$hotel_country = $row ['hotel_country'];
					$address_line_one=$row['address_line_one'];
					$address_line_two=$row['address_line_two'];
					$latitude=$row['latitude'];
					$longitude=$row['longitude'];
					$breakfast = $row ['free_breakfast'];
					// $spa = $row['spa'];
					// $parking=$row['parking'];
				}
			}
					?>
				<div class="main-cn bg-white clearfix">
					<section class="breakcrumb-sc">
						<ul class="breadcrumb arrow">
							<li><a href="index.html"><i class="fa fa-home"></i></a></li>
							<li><a href="hotel.html" title="">Hotels</a></li>
							<li><a href="#" title=""><?php echo ucwords(strtolower($hotel_country)); ?></a></li>
							<li><?php echo ucwords(strtolower($hotel_city)); ?></li>
						</ul>
						<div class="support float-right">
							<small>Got a question?</small> 123-123-1234
						</div>
					</section>
					<section class="head-detail">
						<div class="head-dt-cn">
							<div class="row">
								<div class="col-sm-7">

									<h1><?php echo ucwords(strtolower($hotel_name)); ?></h1>


									<div class="start-address">
										<?php
										
										$query = mysqli_query ( $conn, "SELECT AVG(rating) avg FROM hotel_rating WHERE hotel_id = '$hotel_id'" );
										while ( $row = mysqli_fetch_array( $query ) ) {
											
											$rate_value = round($row ["avg"], 1);
											$rate_bg = (($rate_value) / 5) * 100;
										}
										
										?>
										<span class="star">
										
            
            <?php for($x = 1; $x <= $rate_value; $x ++) { ?> 
<i class="glyphicon glyphicon-star"></i>

<?php }
if (is_float($rate_value)){
//$var = explode('.',$rate_value);
//$digits = $var[1];
//if ($digits > 4){
?>  <i class="glyphicon glyphicon-star half"></i><?php }
//else if($digits < 4){
?>
<?php// }} ?></span>
										<address class="address"><?php echo $address_line_one;?>, <?php echo ucwords(strtolower($address_line_two));?>. 
										<?php echo ucwords(strtolower($hotel_city)); ?></address>
									</div>
								</div>
								<div class="col-sm-5 text-right">
									<p class="price-book">
										From-<span>$345</span>/night <a href="" title=""
											class="awe-btn awe-btn-1 awe-btn-lager">Book Now</a>
									</p>
								</div>
							</div>
						</div>
					</section>
					<section class="detail-slider">
				
						<div class="slide-room-lg">
							<div id="slide-room-lg">
							<?php 
							$query = mysqli_query ( $conn, "SELECT image_name FROM images WHERE hotel_id = '$hotel_id'" );
							while ( $row = mysqli_fetch_array( $query ) ) {
									
								$image_name = $row ["image_name"];
								
							
							?>
								<img src="<?php echo $image_name; ?>" height="480px;" width="1000px;" alt=""> 
								<?php } ?>
							</div>
						</div>
						<div class="slide-room-sm">
							<div class="row">
								<div class="col-md-8 col-md-offset-2">
									<div id="slide-room-sm">
									<?php 
							$query = mysqli_query ( $conn, "SELECT image_name FROM images WHERE hotel_id = '$hotel_id'" );
							while ( $row = mysqli_fetch_array( $query ) ) {
									
								$image_name = $row ["image_name"];
								
							
							?>
										<img src="<?php echo $image_name; ?>" width="90px;" height="60px;" alt=""> 
									<?php } ?>		
									</div>
								</div>
							</div>
						</div>
						
					</section>
					<section class="hotel-content detail-cn" id="hotel-content">
						<div class="row">
							<div class="col-lg-3 detail-sidebar">
								<div class="hight-light">
									<h2>Fantastic</h2>
									<div class="row">
										<div class="col-xs-6 col-sm-6 col-md-3 col-lg-6 vote-text">
											<p>
												<span>95</span>%
											</p>
											<small>Member Recommend</small> <a href="" title="">Read 36
												Reviews</a>
										</div>
										<div class="col-xs-6 col-sm-6 col-md-3 col-lg-6 vote-text">
											<img src="../images/icon-tripadvitsor.png" alt=""> <small>4.5
												Very Good</small> <a href="" title="">145 Reviews</a>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-6 col-lg-12">
											<hr class="hr">
											<blockquote class="quote-sidebar">
												<p>
													Great location tucked behind the Ritz Hotel on Piccadilly.
													Good value for money. The suite I booked was good.<br> <span><b>Daniel
															Brown</b> - Sweden, 28/3/2013</span>
												</p>
											</blockquote>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-9 hl-customer-like">
								<h2>Why customer like this hotel</h2>
								<div class="customer-like">
									<span class="cs-like-label">Nearest transport</span>
									<ul>
										<li>Shepherd's Bush (Central) Tube Station (0.5 Km / 6 min
											walk)</li>
									</ul>
								</div>
								<div class="customer-like">
									<span class="cs-like-label">Distance to airport</span>
									<ul>
										<li>London Heathrow Airport (17.0 Km)</li>
										<li>London City Airport (18.3 Km)</li>
									</ul>
								</div>
								<div class="customer-like">
									<span class="cs-like-label">Nearest transportCustomer comments</span>
									<ul>
										<li>Comfortable and clean, Friendly staff, Value for money</li>
									</ul>
								</div>
								<div class="customer-like">
									<span class="cs-like-label">Top attractions in the area</span>
									<ul>
										<li>Westfield London (0.9 Km / 11 min walk)</li>
										<li>Natural History Museum (2.6 Km)</li>
										<li>Victoria and Albert Museum (2.9 Km)</li>
										<li>Hyde Park (3.0 Km)</li>
									</ul>
								</div>
							</div>
						</div>
					</section>
					<section class="check-rates detail-cn" id="check-rates">
						<div class="row">
							<div class="col-lg-3 detail-sidebar">
								<div class="scroll-heading">
									<h2>Check Rates &amp; Availability</h2>
									<hr class="hr">
									<a href="#hl-features" title="">Features</a> <a
										href="#details-policies" title="">Details &amp; Policies</a> <a
										href="#about-area" title="">About Area</a> <a
										href="#review-detail" title="">Reviews</a>
								</div>
							</div>
							<div class="col-lg-9 check-rates-cn">
								<div class="check-rates-form">
									<h3>Enter dates to see prices and availability</h3>
									<div class="form-search clearfix">
										<div class="form-field field-date">
											<input type="text" class="field-input calendar-input"
												placeholder="Check in">
										</div>
										<div class="form-field field-date">
											<input type="text" class="field-input calendar-input"
												placeholder="Check out">
										</div>
										<div class="form-field field-select">
											<div class="select">
												<span>Guest</span><select><option>1</option>
													<option>2</option>
													<option>3</option></select>
											</div>
										</div>
										<div class="form-submit">
											<button type="submit"
												class="awe-btn awe-btn-4 arrow-right awe-btn-medium">Update</button>
										</div>
									</div>
								</div>
								<div class="service-check-rate">
									<h2>
										Prices 2015 Grand plaza<span>(/person)</span>
									</h2>
									<div class="table-responsive">
										<table class="table tb-service-check-rate">
											<thead>
												<tr>
													<th>Room Types</th>
													<th class="text-center">April - May</th>
													<th class="text-center">June - July</th>
													<th class="text-center">Augus - September</th>
													<th class="text-center">October</th>
												</tr>
											</thead>
											<tr>
												<td>Luxury Suite</td>
												<td class="text-center">$230</td>
												<td class="text-center">$230</td>
												<td class="text-center">$230</td>
												<td class="text-center">$230</td>
											</tr>
											<tr>
												<td>Bella suite</td>
												<td class="text-center">$230</td>
												<td class="text-center">$230</td>
												<td class="text-center">$230</td>
												<td class="text-center">$230</td>
											</tr>
											<tr>
												<td>Double studio</td>
												<td class="text-center">$230</td>
												<td class="text-center">$230</td>
												<td class="text-center">$230</td>
												<td class="text-center">$230</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="hl-availability">
									<div class="table-responsive">
										<table class="table table-availability">
											<tr>
												<th>Room Types</th>
												<th>Rate <span>(/night)</span></th>
												<th>No. Rooms</th>
												<th></th>
											</tr>
											<tr>
												<td class="avai-td-text"><figure>
														<img src="../images/hotel/img-5.jpg" alt="">
													</figure>
													<h3>Luxury Suite</h3>
													<p>Double or twin beds, en-suite bathrooms, a large living</p>
													<a data-toggle="collapse" href="#collapse1" class="a-popup-room">more
														info</a>
														<br/>
														<br/><br/>
													<div id="collapse1" class="panel-collapse collapse">
	<h1>Two bedroom family suite</h1>
	<div class="popup-room-desc">
		<p>
			Morbi sed sollicitudin augue. Ut metus nibh, fringilla vitae mi in, aliquam ullamcorper nisl. Integer id tincidunt libero. Donec pharetra est sed suscipit efficitur. In a gravida quam. Aenean vel dolor augue. In nec lacinia enim, vitae fermentum elit. Aliquam non diam sed lectus commodo hendrerit.
		</p>
		<div class="wp-caption">
            <img src="../images/hotel/img-4.jpg" alt="">
        </div>
        <ul>
        	<li><a href="#">Pillow-top mattresses for optimal comfort</a></li>
        	<li><a href="#">Hypoallergenic gel-fiber duvets</a></li>
        	<li><a href="#">Luxurious linens</a></li>
        	<li><a href="#">Plush bath towels</a></li>
            <li><a href="#">Personal voicemail</a></li>
            <li><a href="#">Wet bar area with stainless steel bar fridge</a></li>
            <li><a href="#">Whisper-quiet air conditioners</a></li>
            <li><a href="#">iron and ironing board</a></li>
        </ul>
	</div>
</div>	

														
														
														</td>
														
												<td class="avai-td-price"><span class="price">$345<small>/night</small></span></td>
												<td class="avai-td-room"><div class="select">
														<span data-placeholder="select room">1 room</span><select
															name="room"><option value="1">1 room</option>
															<option selected="selected" value="1">2 room</option>
															<option value="1">3 room</option>
															<option value="1">4 room</option></select>
													</div></td>
												<td class="avai-td-book"><a href=""
													class="awe-btn awe-btn-1 awe-btn-small">Book</a></td>
											</tr>
											
											<tr>
												<td class="avai-td-text"><figure>
														<img src="../images/hotel/img-6.jpg" alt="">
													</figure>
													<h3>Luxury Suite</h3>
													<p>Double or twin beds, en-suite bathrooms, a large living</p>
													<a href="popup/popup-room.html" class="a-popup-room">more
														info</a></td>
												<td class="avai-td-price"><span class="price">$345<small>/night</small></span></td>
												<td class="avai-td-room"><div class="select">
														<span data-placeholder="select room">1 room</span><select
															name="room"><option value="1">1 room</option>
															<option selected="selected" value="1">2 room</option>
															<option value="1">3 room</option>
															<option value="1">4 room</option></select>
													</div></td>
												<td class="avai-td-book"><a href=""
													class="awe-btn awe-btn-1 awe-btn-small">Book</a></td>
											</tr>
											<tr>
												<td class="avai-td-text"><figure>
														<img src="../images/hotel/img-7.jpg" alt="">
													</figure>
													<h3>Luxury Suite</h3>
													<p>Double or twin beds, en-suite bathrooms, a large living</p>
													<a href="popup/popup-room.html" class="a-popup-room">more
														info</a></td>
												<td class="avai-td-price"><span class="price">$345<small>/night</small></span></td>
												<td class="avai-td-room"><div class="select">
														<span data-placeholder="select room">1 room</span><select
															name="room"><option value="1">1 room</option>
															<option selected="selected" value="1">2 room</option>
															<option value="1">3 room</option>
															<option value="1">4 room</option></select>
													</div></td>
												<td class="avai-td-book"><a href=""
													class="awe-btn awe-btn-1 awe-btn-small">Book</a></td>
											</tr>
											<tr>
												<td class="avai-td-text"><figure>
														<img src="../images/hotel/img-8.jpg" alt="">
													</figure>
													<h3>Luxury Suite</h3>
													<p>Double or twin beds, en-suite bathrooms, a large living</p>
													<a href="popup/popup-room.html" class="a-popup-room">more
														info</a></td>
												<td class="avai-td-price"><span class="price">$345<small>/night</small></span></td>
												<td class="avai-td-room"><div class="select">
														<span data-placeholder="select room">1 room</span><select
															name="room"><option value="1">1 room</option>
															<option selected="selected" value="1">2 room</option>
															<option value="1">3 room</option>
															<option value="1">4 room</option></select>
													</div></td>
												<td class="avai-td-book"><a href=""
													class="awe-btn awe-btn-1 awe-btn-small">Book</a></td>
											</tr>
										</table>
										
									</div>
								</div>
							</div>
						</div>
					</section>
					<section class="hl-features detail-cn" id="hl-features">
						<div class="row">
							<div class="col-lg-3 detail-sidebar">
								<div class="scroll-heading">
									<h2>Features</h2>
									<hr class="hr">
									<a href="#check-rates" title="">Check Rates &amp; Availability</a>
									<a href="#about-area" title="">About Area</a> <a
										href="#details-policies" title="">Details &amp; Policies</a> <a
										href="#review-detail" title="">Reviews</a>
								</div>
							</div>
							<div class="col-lg-9 hl-features-cn">
								<div class="featured-service">
									<h3>Facilities</h3>
									<ul class="service-list">
									<?php if($breakfast=='N'){?>
										<li class="unselected"><figure>
												<div class="icon-service">
													<img src="../images/icon-service-1.png" alt="">
												</div>
												<figcaption>Free breakfast</figcaption>
											</figure></li>
											<?php
					} else {
						?>
											<li><figure>
												<div class="icon-service">
													<img src="../images/icon-service-1.png" alt="">
												</div>
												<figcaption>Free breakfast</figcaption>
											</figure></li>
											<?php }?>
										<li><figure>
												<div class="icon-service">
													<img src="../images/icon-service-2.png" alt="">
												</div>
												<figcaption>Spa service</figcaption>
											</figure></li>
										<li><figure>
												<div class="icon-service">
													<img src="../images/icon-service-3.png" alt="">
												</div>
												<figcaption>Free parking</figcaption>
											</figure></li>
										<li><figure>
												<div class="icon-service">
													<img src="../images/icon-service-4.png" alt="">
												</div>
												<figcaption>Sauna service</figcaption>
											</figure></li>
										<li><figure>
												<div class="icon-service">
													<img src="../images/icon-service-5.png" alt="">
												</div>
												<figcaption>Restaurant</figcaption>
											</figure></li>
										<li><figure>
												<div class="icon-service">
													<img src="../images/icon-service-6.png" alt="">
												</div>
												<figcaption>Casino</figcaption>
											</figure></li>
										<li><figure>
												<div class="icon-service">
													<img src="../images/icon-service-7.png" alt="">
												</div>
												<figcaption>Swimming pool</figcaption>
											</figure></li>
										<li><figure>
												<div class="icon-service">
													<img src="../images/icon-service-8.png" alt="">
												</div>
												<figcaption>Airport transfer</figcaption>
											</figure></li>
										<li><figure>
												<div class="icon-service">
													<img src="../images/icon-service-9.png" alt="">
												</div>
												<figcaption>Free Wi-Fi in all rooms</figcaption>
											</figure></li>
										<li><figure>
												<div class="icon-service">
													<img src="../images/icon-service-10.png" alt="">
												</div>
												<figcaption>Smoking area</figcaption>
											</figure></li>
										<li><figure>
												<div class="icon-service">
													<img src="../images/icon-service-11.png" alt="">
												</div>
												<figcaption>Laundry service</figcaption>
											</figure></li>
										<li><figure>
												<div class="icon-service">
													<img src="../images/icon-service-12.png" alt="">
												</div>
												<figcaption>Business center</figcaption>
											</figure></li>
										<li><figure>
												<div class="icon-service">
													<img src="../images/icon-service-13.png" alt="">
												</div>
												<figcaption>Hair dryer</figcaption>
											</figure></li>
										<li><figure>
												<div class="icon-service">
													<img src="../images/icon-service-14.png" alt="">
												</div>
												<figcaption>24-hour front desk</figcaption>
											</figure></li>
									</ul>
								</div>
								<div class="featured-service">
									<h3>Language Spoken</h3>
									<ul class="service-spoken">
										<li><img src="../images/icon-check.png" alt="">Arabic</li>
										<li><img src="../images/icon-check.png" alt="">French</li>
										<li><img src="../images/icon-check.png" alt="">Russian</li>
										<li><img src="../images/icon-check.png" alt="">English</li>
										<li><img src="../images/icon-check.png" alt="">Spanish</li>
									</ul>
								</div>
							</div>
						</div>
					</section>
					<section class="details-policies detail-cn" id="details-policies">
						<div class="row">
							<div class="col-lg-3 detail-sidebar">
								<div class="scroll-heading">
									<h2>Details &amp; Policies</h2>
									<hr class="hr">
									<a href="#about-area" title="">About Area</a> <a
										href="#check-rates" title="">Check Rates &amp; Availability</a>
									<a href="#hl-features" title="">Features</a> <a
										href="#review-detail" title="">Reviews</a>
								</div>
							</div>
							<div class="col-lg-9 details-policies-cn">
								<div class="policies-item">
									<h3>Apartment Description</h3>
									<p>
										Morbi sed sollicitudin augue. Ut metus nibh, fringilla vitae
										mi in, aliquam ullamcorper nisl. Integer id tincidunt libero.
										Donec pharetra est sed suscipit efficitur. In a gravida quam.
										Aenean vel dolor augue. In nec lacinia enim, vitae fermentum
										elit. Aliquam non diam sed lectus commodo hendrerit.<br>Vivamus
										pulvinar nulla id massa congue varius. Etiam vitae nunc
										consectetur, porttitor purus ac, sagittis dui. Ut sit amet
										consectetur diam. Suspendisse mollis dapibus porta. In erat
										quam, pulvinar eu efficitur ut, malesuada nec augue.
										Pellentesque odio orci, interdum eu tortor sollicitudin,
										tincidunt placerat erat. Quisque pretium mauris at condimentum
										imperdiet.
									</p>
								</div>
								<div class="policies-item">
									<h3>Apartment Description</h3>
									<p>
										Morbi sed sollicitudin augue. Ut metus nibh, fringilla vitae
										mi in, aliquam ullamcorper nisl. Integer id tincidunt libero.
										Donec pharetra est sed suscipit efficitur. In a gravida quam.
										Aenean vel dolor augue. In nec lacinia enim, vitae fermentum
										elit. Aliquam non diam sed lectus commodo hendrerit.<br>Vivamus
										pulvinar nulla id massa congue varius. Etiam vitae nunc
										consectetur, porttitor purus ac, sagittis dui. Ut sit amet
										consectetur diam. Suspendisse mollis dapibus porta. In erat
										quam, pulvinar eu efficitur ut, malesuada nec augue.
										Pellentesque odio orci, interdum eu tortor sollicitudin,
										tincidunt placerat erat. Quisque pretium mauris at condimentum
										imperdiet.
									</p>
								</div>
								<div class="policies-item">
									<h3>Apartment Description</h3>
									<p>
										Morbi sed sollicitudin augue. Ut metus nibh, fringilla vitae
										mi in, aliquam ullamcorper nisl. Integer id tincidunt libero.
										Donec pharetra est sed suscipit efficitur. In a gravida quam.
										Aenean vel dolor augue. In nec lacinia enim, vitae fermentum
										elit. Aliquam non diam sed lectus commodo hendrerit.<br>Vivamus
										pulvinar nulla id massa congue varius. Etiam vitae nunc
										consectetur, porttitor purus ac, sagittis dui. Ut sit amet
										consectetur diam. Suspendisse mollis dapibus porta. In erat
										quam, pulvinar eu efficitur ut, malesuada nec augue.
										Pellentesque odio orci, interdum eu tortor sollicitudin,
										tincidunt placerat erat. Quisque pretium mauris at condimentum
										imperdiet.
									</p>
								</div>
							</div>
						</div>
					</section>
					<section class="about-area detail-cn" id="about-area">
						<div class="row">
							<div class="col-lg-3 detail-sidebar">
								<div class="scroll-heading">
									<h2>about the area</h2>
									<hr class="hr">
									<a href="#check-rates" title="">Check Rates &amp; Availability</a>
									<a href="#hl-features" title="">Features</a> <a
										href="#review-detail" title="">Reviews</a> <a
										href="#details-policies" title="">Details Policies</a>
								</div>
							</div>
							<div class="col-lg-9">
								<div class="hotel-detail-map">
									<script>
var myCenter=new google.maps.LatLng(<?php echo $latitude; ?>,<?php echo $longitude; ?>);
function initialize() {
  var mapProp = {
    center:myCenter,
    zoom:16,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("hotel-detail-map"),mapProp);

  var marker=new google.maps.Marker({
	  position:myCenter,
	  
	  });

	marker.setMap(map);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
									<div id="hotel-detail-map"></div>
									<p class="about-area-location">
										<i class="fa fa-map-marker"></i>42 Princes Square, London W2
										4AD
									</p>
								</div>
								<div class="about-area-text">
									<h2>What to do</h2>
									<p>
										<b>Shop.</b> At the quirky Thai Home Industries, troll for
										stainless steel flatware inspired by upcountry farm tools that
										are part of the MoMA design collection (35 Oriental Avenue;
										662-234-1736).
									</p>
									<p>
										<b>Thai Done Right.</b> Eat like a spice-loving local at
										Gallery Caf� � we love the crispy prawn cakes, <a href="#">Thai
											tuna salad</a> tossed with slivers of powerful chilies, and
										succulent chicken wrapped in pandanus leaves (86-100 Soi
										Captain Bush; 662-639-5580).
									</p>
									<p>
										<b>Stop and Smell.</b> The fragrant <a href="#">Pak Klong
											Talaad</a>, is the country�s most important wholesale flower
										market. The buying and selling frenzy starts around 2 a.m.,
										when boats begin to dock near Memorial Bridge with a
										cornucopia of fresh flowers including orchids, marigolds,
										zinnias, jasmine and, of course, roses.
									</p>
								</div>
							</div>
						</div>
					</section>
					<section class="review-detail detail-cn" id="review-detail">
						<div class="row">
							<div class="col-lg-3 detail-sidebar">
								<div class="scroll-heading">
									<h2>Reviews</h2>
									<hr class="hr">
									<a href="#check-rates" title="">Check Rates &amp; Availability</a>
									<a href="#hl-features" title="">Features</a> <a
										href="#details-policies" title="">Details &amp; Policies</a> <a
										href="#about-area" title="">About Area</a>
								</div>
							</div>
							<div class="col-lg-9 review-detail-cn">
								<div class="review-tabs">
									<ul class="tabs-head nav-tabs-one">
										<li class="active"><a data-toggle="tab" href="#section1">Member
												reviews</a></li>
										<li><a data-toggle="tab" href="#section2">TripAdvisor reviews</a></li>
									</ul>
									<div class="tab-content">
										<div id="section1" class="tab-pane fade in active">
											<div class="review-tabs-cn">
												<div class="row">
													<div
														class="col-sm-4 col-md-3 col-lg-4 col-lg-push-8 col-md-push-9 col-sm-push-8">
														<div class="review-vote text-center">
															<h3>Fantastic</h3>
															<span class="vote-score">8.5</span> <span
																class="vote-number">from <strong>145</strong> reviews
															</span>
															<p>
																<span><strong>95</strong>%</span> Recommend
															</p>
														</div>
													</div>
													<div
														class="col-sm-8 col-md-9 col-lg-8 col-lg-pull-4 col-md-pull-3 col-sm-pull-4">
														<div class="review-st">
															<div class="row row-rule">
																<div class="col-md-5 lable-st">&nbsp;</div>
																<div class="col-md-7">
																	<div class="rule-point">
																		<span>0</span> <span>2</span> <span>4</span> <span>6</span>
																		<span>8</span> <span>10</span>
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-5 lable-st">Value for Money</div>
																<div class="col-md-7">
																	<div class="progress-rv" data-value="7.5"></div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-5 lable-st">Location</div>
																<div class="col-md-7">
																	<div class="progress-rv" data-value="6.0"></div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-5 lable-st">Staff Performance</div>
																<div class="col-md-7">
																	<div class="progress-rv" data-value="8.0"></div>
																</div>
															</div>
															<div class="row">
																<div class="lable-st col-md-5">Hotel
																	Condition/Cleanliness</div>
																<div class="col-md-7">
																	<div class="progress-rv" data-value="6.0"></div>
																</div>
															</div>
															<div class="row">
																<div class="lable-st col-md-5">Room Comfort/Standard</div>
																<div class="col-md-7">
																	<div class="progress-rv" data-value="8.0"></div>
																</div>
															</div>
															<div class="row">
																<div class="lable-st col-md-5">Food/Dining</div>
																<div class="col-md-7">
																	<div class="progress-rv" data-value="4.5"></div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div id="section2" class="tab-pane fade"></div>
									</div>
								</div>
								<div class="review-all">
									<h4 class="review-h">All reviews (365)</h4>
									<div class="row review-item">
										<div class="col-xs-3 review-number">
											<ins>5.6</ins>
											<span>Isbawandi Zin</span> <small>from London, UK, 3/2/ 2014</small>
										</div>
										<div class="col-xs-9 review-text">
											<ul>
												<li><span class="icon fa fa-plus"></span>Location, warmth,
													cleanliness</li>
												<li><span class="icon icon-minus fa fa-minus"></span>Noisy,
													expensive</li>
											</ul>
											<p>Our stay was pleasant and joyful. We stayed in an
												apartment meant for 3 adults. First and foremost, close
												proximity to tube station was the reason of choosing this
												hotel. The cleaning services were fantastic. The support
												services were prompt...</p>
										</div>
									</div>
									<div class="row review-item">
										<div class="col-xs-3 review-number">
											<ins>9.0</ins>
											<span>Isbawandi Zin</span> <small>from London, UK, 3/2/ 2014</small>
										</div>
										<div class="col-xs-9 review-text">
											<ul>
												<li><span class="icon fa fa-plus"></span>Location, warmth,
													cleanliness</li>
											</ul>
											<p>Our stay was pleasant and welcoming. We stayed in an
												apartment meant for 3 adults with kitchen facilities. The
												cleaning services were superp. We liked the laundry and
												kitchen cleaning services on top of the regular cleaning
												services. The support services were prompt...much needed
												extra bowls were delivered in a jiffy. Front desk were very
												cotdial and helpful though working under at times. Needed
												travel arrangements and info were delivered with smiles.
												Delivering luggeges to the room was done witbout request..
												Computer and printing service in the lobby was really
												helpful...tbe charge reasonable</p>
										</div>
									</div>
									<div class="row review-item">
										<div class="col-xs-3 review-number">
											<ins>5.6</ins>
											<span>Isbawandi Zin</span> <small>from London, UK, 3/2/ 2014</small>
										</div>
										<div class="col-xs-9 review-text">
											<ul>
												<li><span class="icon fa fa-plus"></span>Location, warmth,
													cleanliness</li>
												<li><span class="icon icon-minus fa fa-minus"></span>Noisy,
													expensive</li>
											</ul>
											<p>Our stay was pleasant and joyful. We stayed in an
												apartment meant for 3 adults. First and foremost, close
												proximity to tube station was the reason of choosing this
												hotel. The cleaning services were fantastic. The support
												services were prompt...</p>
										</div>
									</div>
									<div class="row review-item">
										<div class="col-xs-3 review-number">
											<ins>9.0</ins>
											<span>Isbawandi Zin</span> <small>from London, UK, 3/2/ 2014</small>
										</div>
										<div class="col-xs-9 review-text">
											<ul>
												<li><span class="icon fa fa-plus"></span>Location, warmth,
													cleanliness</li>
											</ul>
											<p>Our stay was pleasant and welcoming. We stayed in an
												apartment meant for 3 adults with kitchen facilities. The
												cleaning services were superp. We liked the laundry and
												kitchen cleaning services on top of the regular cleaning
												services. The support services were prompt...much needed
												extra bowls were delivered in a jiffy. Front desk were very
												cotdial and helpful though working under at times. Needed
												travel arrangements and info were delivered with smiles.
												Delivering luggeges to the room was done witbout request..
												Computer and printing service in the lobby was really
												helpful...tbe charge reasonable</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
					<section class="detail-footer detail-cn">
						<div class="row">
							<div class="col-lg-3"></div>
							<div class="col-lg-9 detail-footer-cn">
								<div class="row">
									<div class="col-xs-5">
										<div class="review-more">
											<a href="" title=""><i class="icon"></i> Show more reviews</a>
										</div>
									</div>
									<div class="col-xs-7 text-right">
										<p class="price-book">
											From-<span>$345</span>/night <a href="" title=""
												class="awe-btn awe-btn-1 awe-btn-lager">Book Now</a>
										</p>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
				
			</div>
		</div>
		<?php include("../includes/footer.php"); ?>
		
	</div>
	<?php include '../includes/jsscripts.php';?>
</body>
</html>