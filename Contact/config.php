<!--Luthfi-->

<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "flash";
	//create the connection
	$conn = new mysqli($servername,$username,$password,$dbname);


	//check the connection
	if($conn ->connect_error){
		die("Connection failed: ".$conn->connect_error);
	}
	//echo "Connected Successfully";
	 
?>