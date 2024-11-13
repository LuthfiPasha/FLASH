<!--Luthfi-->


<?php
    require 'config.php';

    if(isset($_POST["btnsub"])){
		$fname = $_POST["fname"];
        $lname = $_POST["lname"];
		$email = $_POST["email"];
		$phone = $_POST["phone"];
		$message = $_POST["message"];
		
		$sql ="INSERT INTO contact(f_name,l_name,email,phoneNo,message) VALUES('$fname','$lname','$email',$phone,'$message')";
		
		if($conn ->query($sql)){ //display the message and navigate back to page
			echo '<script>
						  alert("Inserted Successfully");
						  window.location.href = "contact.php"; 
			
				  </script>';
		}
		else { //display the message and navigate back to page
			echo '<script>
						  alert("Error: ".$conn->error);
						  window.location.href = "contact.php";
				</script>';
		}
		
	}
	$conn ->close();





?>