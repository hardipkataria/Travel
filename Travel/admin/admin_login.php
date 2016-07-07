
<!DOCTYPE html>
<?php 

session_start();
if (isset($_SESSION["manager"])) {
    header("location: index.php"); 
    exit();
}
?>
<?php 
// Parse the log in form if the user has filled it out and pressed "Log In"
if (isset($_POST["username"]) && isset($_POST["password"])) {

	$manager = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]); // filter everything but numbers and letters
    $password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]); // filter everything but numbers and letters
    // Connect to the MySQL database  
    include '../includes/connect_to_mysql.php'; 
    $sql = mysqli_query($conn,"SELECT id FROM admin WHERE username='$manager' AND password='$password' LIMIT 1"); // query the person
    // ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
    $existCount = mysqli_num_rows($sql); // count the row nums
    if ($existCount == 1) { // evaluate the count
	     while($row = mysqli_fetch_array($sql)){ 
             $id = $row["id"];
		 }
		 $_SESSION["id"] = $id;
		 $_SESSION["manager"] = $manager;
		 $_SESSION["password"] = $password;
		 header("location: admin.php");
         exit();
    } else {
		echo 'That information is incorrect, try again <a href="admin_login.php">Click Here</a>';
		exit();
	}
}
?>
<head>
	
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="images/ico.ico" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.jcarousel.min.js"></script>
	<!--[if IE 6]>
		<script type="text/javascript" src="js/png-fix.js"></script>
	<![endif]-->
        <!--[if IE]>
<style>
    #head{
        margin-top:100px;
        }
</style>
<![endif]-->
	<script type="text/javascript" src="js/functions.js"></script>
        <link rel="stylesheet" type="text/css" href="css/lightbox.css"  />
        <link rel="stylesheet" type="text/css" href="css/style.css"  />
        <link rel="stylesheet" type="text/css" href="css/960_16.css"/>
        <link rel="stylesheet" type="text/css" href="css/product.css"  />
        <link rel="stylesheet" type="text/css" href="css/text.css" />

        <script src="js/jquery-1.7.2.min.js"></script>
        <script src="js/lightbox.js"></script>
</head>
<body>
	<!-- Header -->
	<div id="header" class="shell">
	<div id="logo"><h1><a href="index.php">Travel Island</a></h1><span><a href="index.php">We Serve Confortability</a></span></div>
		
		<!-- Navigation -->
		
		<!-- End Navigation -->
		<div class="cl">&nbsp;</div>
		<!-- Login-details -->
                <div id="login-details" style="margin-top: -10px;">
                    <p style="padding-left: 48px;">Welcome, <a href="#" id="user">Guest</a>&nbsp;|&nbsp;</p><p>Time:&nbsp;
                            <?php
echo date("d/m/y G.i:s<br>", time());

?>&nbsp;|&nbsp;</p><p>Your IP:&nbsp;<?php echo $_SERVER['REMOTE_ADDR']; ?></p>
		
                </div>
		<!-- End Login-details -->
	</div>
	<!-- End Header -->
	
	<!-- Main -->
	<div id="main" class="container_16">
		
		<!-- Content -->
		

       <div class="container_16">
           <div class="products" >
            <div class="grid_13 push_2" style="padding:10px 0px 10px 0px;">
               
                <h3 class="push_4" style="padding: 10px;" >Administrator Login</h3>    
                <hr/> 
                <?php if (isset($_GET['msg'])){
$mess=$_GET["msg"];
 ?>  
<div class="grid_11">
                        <h4><?php echo $mess ?></h4><br/>
                    
                    </div>
     <?php } ?>  <br/><div class="grid_9 push_2" style="padding:10px;">
                        <form method="post" action="admin_login.php">
                            <div class="grid_2">
                                Username
                            </div>
                            <div class="grid_5">
                                <input class="place" type="text" name="username" placeholder="xyz" />
                            </div>
                            <div class="clear"></div><br/>
                            
                            <div class="grid_2">
                                Password 
                            </div>
                            <div class="grid_5">
                                <input class="place" type="password" name="password" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;" /><br/><br/> 
                                
                            </div>
                            <input type="submit"   name="submit" id="buy1" value="Login" />
                            <div class="clear"></div><br/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
       
        </div>
	<!-- End Main -->
	<!-- Footer -->
	
	<!-- End Footer -->
</body>
</html>
