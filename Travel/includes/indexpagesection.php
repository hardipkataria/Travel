<section class="banner">
			<div class="bg-parallax bg-1"></div>
			<div class="container" style="padding-left: 100px; padding-right: 100px;">
				<div class="logo-banner text-center">
					<a href="" title=""><img src="../images/logo-banner.png" alt=""></a>
				</div>
				<div class="banner-cn">
					<ul class="tabs-cat text-center row" style="padding-left: 120px;">
						
						<li class="cate-item active col-xs-2"><a data-toggle="tab"
							href="#form-tour" title=""><span>Destination</span><img
								src="../images/icon-vacation.png" alt=""></a></li>
						
						<li class="cate-item col-xs-2"><a data-toggle="tab"
							href="#form-hotel" title=""><span>Hotel</span><img
								src="../images/icon-hotel.png" alt=""></a></li>
						
					</ul>
					
					<div class="tab-content" >
						<div class="form-cn form-hotel tab-pane " id="form-hotel">
							<h2>Where would you like to go?</h2>
							<div class="form-search clearfix">
							<form action="hotel-list.php" method="get">
								<div class="form-field field-destination">
									<label for="destination"><span>Destination:</span> Country,
										City, Airport, Area, Landmark</label><input type="text"
										name="destination" id="destination" class="field-input">
								</div>
								<div class="form-field field-date">
									<input type="text" class="field-input calendar-input"
										placeholder="Check in">
								</div>
								<div class="form-field field-date">
									<input type="text" class="field-input calendar-input"
										placeholder="Check out">
								</div>
								
								<div class="form-submit">
									<button type="submit" class="awe-btn awe-btn-lager awe-search">Search</button>
								</div>
								</form>
							</div>
						</div>
						
						
						
						
						<div class="form-cn form-tour tab-pane active in" id="form-tour">
							<h2>Where would you like to go?</h2>
							<div class="form-search clearfix">
							<form method="get" action="../location/overview.php">
								<div class="form-field field-select field-region">
								
									<div class="select">
										<span>Destination: <small>Kolkata, Mumbai..</small></span><select name="destination" required><option></option>
											<option>New Delhi</option>
											<option>Chennai</option>
											<option>Kolkata</option></select>
									</div>
								</div>
								
								
								<div class="form-submit">
									<button type="submit" class="awe-btn awe-btn-lager awe-search">Search</button>
								</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>