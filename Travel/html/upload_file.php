<?php
//session_start();

//echo "product name not found";
include '../includes/connect_to_mysql.php';
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 2000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    echo "\n Please Click to insert image again";
      $pname = mysqli_real_escape_string($conn,$_POST['prodname']);
      echo "<a href=insertimage.php?pname=$pname  > Click Here </a>";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      echo "\n Please Click to insert image again";
      $pname = mysqli_real_escape_string($conn,$_POST['prodname']);
      echo "<a href=test.php?pname=$pname  > Click Here </a>";
     //header("location: insertimage.php?pname=$pname"); 
    //exit();
      }
    else
      {
      $image_name = "image_".time()."_".$_FILES["file"]["name"];
      $path="../images/hotel/" .$image_name;
      //$pname="Prototype 2";
      $pname = mysqli_real_escape_string($conn,$_POST['prodname']);
      //$pname = $_SESSION["name"];
     // $id="123";
      
      mysqli_query($conn,"INSERT INTO images (`image_name` ,`hotel_id`) VALUES ('$path',  '$pname')") or die (mysql_error());
      move_uploaded_file($_FILES["file"]["tmp_name"], $path);
      echo "Stored in: " . $path;
      echo "\nClick the link to redirect";
       echo "<a href='addProduct.php?msg=Ebook Successfully Added  '> Add Product Page </a>";
        echo "<a href='admin.php?msg=image added'  > Admin Home </a>";
      //header("location: addProduct.php?msg=Ebook Successfully Added"); 
    //exit();
      //echo "saved";
      }
    }
  }
else
  {
  echo "Invalid file";
  $pname = mysqli_real_escape_string($conn,$_POST['prodname']);
  echo "\n Please Click to insert image again";
      $pname = mysqli_real_escape_string($conn,$_POST['prodname']);
      echo "<a href=insertimage.php?pname=$pname  > Click Here </a>";
  }
?>
