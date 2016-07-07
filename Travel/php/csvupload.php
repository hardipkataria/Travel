<html>
<form name="import" method="post" enctype="multipart/form-data">
    	<input type="file" name="file" /><br />
        <input type="submit" name="submit" value="Submit" />
</form>

<?php 
include "../includes/connect_to_mysql.php"; // Connect to Database
if(isset($_POST["submit"]))
{
	$file = $_FILES['file']['tmp_name'];
	$handle = fopen($file, "r");
	$c = 0;
	$row = 1;
	$sql=null;
	while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
	{
		if($row == 1)
		{ 
			$row++; continue; 
		}
		$num = count($filesop);
		$name = $filesop[0];
		//$email = $filesop[1];
		$sql1 = mysqli_query($conn,"SELECT * FROM hotel WHERE `hotel_name`='$name' LIMIT 1");
		$productMatch = mysqli_num_rows($sql1); // count the output amount
		if ($productMatch > 0) {
		/*	while ( $row1 = mysqli_fetch_array ( $sql1 ) ) {
				$hotel_name = $row1 ['hotel_name'];
				echo "$hotel_name is present";
			}*/
		//	header("location: csvupload.php?msg=Sorry you tried to place a duplicate Product Name into the system");
		echo "$name already exist in database. \n";
		?>
		<br/>
		<?php 
		
		continue;
		}
		
		$sql=mysqli_query($conn,"INSERT INTO `hotel` (hotel_name) VALUES ('$name')");
		 
		//$sql = mysql_query("INSERT INTO hotel (hotel_name) VALUES ('$name')");
		$c = $c + 1;
		
	}
	
		if($sql){
			echo "You database has imported successfully";
		}
}


/*include "../includes/connect_to_mysql.php"; // Connect to Database

//$deleterecords = "TRUNCATE TABLE tablename"; // empty the table of its current records

//mysql_query ( $deleterecords );

// Upload File

if (isset ( $_POST ['submit'] )) {

	if (is_uploaded_file ( $_FILES ['filename'] ['tmp_name'] )) {

		echo "<h1>" . "File " . $_FILES ['filename'] ['name'] . " uploaded successfully." . "</h1>";

		echo "<h2>Displaying contents:</h2>";

		readfile ( $_FILES ['filename'] ['tmp_name'] );
	}

	// Import uploaded file to Database

	$handle = fopen ( $_FILES ['filename'] ['tmp_name'], "r" );

	while ( ($data = fgetcsv ( $handle, 1000, "," )) !== FALSE ) {

		$import = "INSERT into tablename(item1,item2,item3,item4,item5) values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]')";

		mysql_query ( $import ) or die ( mysql_error () );
	}

	fclose ( $handle );

	print "Import done";

	// view upload form
} else {

	print "Upload new csv by browsing to file and clicking on Upload<br />\n";

	print "<form enctype='multipart/form-data' action='upload.php' method='post'>";

	print "File name to import:<br />\n";

	print "<input size='50' type='file' name='filename'><br />\n";

	print "<input type='submit' name='submit' value='Upload'></form>";
}
*/
?>

</html>
