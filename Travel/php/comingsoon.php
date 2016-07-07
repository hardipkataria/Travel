<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie ie7"><![endif]-->
<!--[if IE 8 ]><html class="ie ie8"><![endif]-->
<!--[if IE 9 ]><html class="ie ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="" lang="en">
<!--<![endif]-->
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport"
	content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<title>Comingsoon</title>
<link
	href="http://fonts.googleapis.com/css?family=Lato:300,400%7COpen+Sans:300,400,600,700"
	rel="stylesheet" type="text/css">
<link rel="stylesheet" href="../css/library/font-awesome.min.css">
<link rel="stylesheet" href="../css/library/bootstrap.min.css">
<link rel="stylesheet" href="../css/library/jquery-ui.min.css">
<link rel="stylesheet" href="../css/library/owl.carousel.css">
<link rel="stylesheet" href="../css/library/jquery.mb.YTPlayer.min.css">
<link rel="stylesheet" href="../css/style.css">

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
		<?php include '../includes/headertype2.php';?>
		<section class="page-comingsoon banner">
			<div class="bg-parallax bg-1"></div>
			<div class="container">
				<div class="logo-page text-center">
					<a href="../php/index.php" title=""><img src="../images/logo-banner.png" alt="Logo" height="127px" width="322px"></a>
				</div>
				<div class="page-body text-center">
					<div class="item-content" style="margin-top: -60px;">
						<div class="image-wrap">
							<img src="../images/comingsoon.png" alt="coming soon" height="155px" width="535px">
						</div>
						<div class="page-slide">
							<div class="item">
								<h4>We're working hard on awesome new site</h4>
								<p>The site will be open in</p>
							</div>
							<div class="item">
								<h4>We're working hard on awesome new site</h4>
								<p>The site will be open in</p>
							</div>
						</div>
					</div>
					<div class="countdown-wrapper">
						<div class="count-line"></div>
						<div class="count-line"></div>
						<div id="countdown"></div>
					</div>
				</div>
			</div>
		</section>
		 <?php include("../includes/footer.php"); ?>
	</div>
	<?php include '../includes/jsscripts.php';?>
	<script type="text/javascript">var nextYear = new Date(new Date().getFullYear() + 1, 1 - 1, 26);
      $('#countdown').countdown(nextYear, function(event) {
        var $this = $(this).html(event.strftime(''
          + '<div class="item"><span class="count">%D</span><span>Days</span></div>'
          + '<div class="item"><span class="count">%H</span><span>Hours</span></div>'
          + '<div class="item"><span class="count">%M</span><span>Minutes</span></div>'
          + '<div class="item"><span class="count">%S</span><span>Seconds</span></div>'));
      });</script>
</body>
</html>