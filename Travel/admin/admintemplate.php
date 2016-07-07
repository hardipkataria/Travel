
<!DOCTYPE html>
<head>
    <?php 

session_start();
if (!isset($_SESSION["manager"])) {
    header("location: admin_login.php"); 
    exit();
}
// Be sure to check that this manager SESSION value is in fact in the database
$managerID = preg_replace('#[^0-9]#i', '', $_SESSION["id"]); // filter everything but numbers and letters
$manager = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["manager"]); // filter everything but numbers and letters
$password = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["password"]); // filter everything but numbers and letters
// Run mySQL query to be sure that this person is an admin and that their password session var equals the database information
// Connect to the MySQL database  
 include '../includes/connect_to_mysql.php'; 
$sql = mysqli_query($conn,"SELECT * FROM admin WHERE id='$managerID' AND username='$manager' AND password='$password' LIMIT 1"); // query the person
// ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
$existCount = mysqli_num_rows($sql); // count the row nums
if ($existCount == 0) { // evaluate the count
	 echo "Your login session data is not on record in the database.";
     exit();
}
?>
    
	<title></title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="images/ico.ico" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.jcarousel.min.js"></script>
	<!--[if IE 6]>
		<script type="text/javascript" src="js/png-fix.js"></script>
	<![endif]-->
	<script type="text/javascript" src="js/functions.js"></script>
</head>
<body>
	<!-- Header -->
	<div id="header" class="shell">
		<div id="logo"><h1><a href="index.php">Travel Island</a></h1><span><a href="index.php">We Serve Confortability</a></span></div>
		<!-- Navigation -->
		<div id="navigation">
			<ul>
				<li><a href="index.php">Home</a></li>
				
				<li><a href="request.php">Request</a></li>
				
				<li><a href="contact.php">Contact Us</a></li>
			</ul>
		</div>
		<!-- End Navigation -->
		<div class="cl">&nbsp;</div>
		<!-- Login-details -->
		<div id="login-details">
                   <p style="padding-left: 48px;">Welcome, <a href="#" id="user"><?php echo $manager; ?></a>&nbsp;|&nbsp;</p><p>Time:&nbsp;
                            <?php
echo date("d/m/y G.i:s<br>", time());

?>&nbsp;|&nbsp;</p><p>Your IP:&nbsp;<?php echo $_SERVER['REMOTE_ADDR']; ?></p>
                </div>
		<!-- End Login-details -->
	</div>
	<!-- End Header -->
	
	<!-- Main -->
	<div id="main" class="shell">
		<!-- Sidebar -->
		<div id="sidebar">
			<ul class="categories">
				 <?php include_once("adminmenu.php");?>
				
			</ul>
                    <ul>  
                        <h4>Search eBook</h4>
                    <div id="search">
			
				<form action="search.php" method="post" accept-charset="utf-8">
					<div class="container">
						<input type="text" name="string" id="string" value="Keywords..." title="Keywords..." class="blink" />
					</div>
					<input class="search-button" type="submit" value="Submit" />
				</form>
				<div class="cl">&nbsp;</div>
			
		</div>
                    </ul>
                    <br/>
                    
<br/>                   
		</div>
		<!-- End Sidebar -->
		<!-- Content -->
		<div id="content">
                     <div class="products" >
			<div align="center" id="mainWrapper">
 
    <div class="container_16" >
                
        <div class="grid_10"  style="padding: 0px 0px;" >
   <div class="grid_11">
                        <h3>Inventory List</h3>
                    <?php if (isset($_GET['msg'])){
$mess=$_GET["msg"];
 ?>  
<div class="grid_11">
                        <h4><?php echo $mess ?></h4>
                    
                    </div>
     <?php } ?>  
                    </div>
                    
        </div>
        </div>
    <br />
  <br />
  </div>
  </div>

		</div>
		<!-- End Content -->
		<div class="cl">&nbsp;</div>
	</div>
	<!-- End Main -->
	<!-- Footer -->
	
	<!-- End Footer -->
</body>
</html>
