<?php 

require 'Adminconfig.php'; 

if(isset($_GET['id'])) {

    $uID = $_GET['id'];

    $sql = "SELECT `UserID`, `Username`, `Password`, `Name`, `email`, `Contact`, `Address` FROM user WHERE `UserID` = '$uID'";

    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "User Not Found";
        exit;
    }

}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $Username = $_POST['username'];
    $name = $_POST['name'];
    $Password = $_POST['password'];
    $Address = $_POST['address'];
    $Contact = $_POST['contact'];
    $email = $_POST['email'];

    $update = "UPDATE user SET 
                `Username` = '$Username', 
                `Name` = '$name', 
                `Password` = '$Password', 
                `Address` = '$Address', 
                `Contact` = '$Contact', 
                `email` = '$email', 
                WHERE `UserID` = '$uID'";

    if($con->query($update) === TRUE) {
        header("Location: adminpanel.php");
        exit;
    } else {
        echo "Error updating user: " . $con->error;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="edituser.css">
    <title>EDIT USER</title>
</head>
<body>
<form method="POST"> 

<div class="c1">

<div class="form">

<div class="f1">

    Full Name : <br> 
    <input type="text" name="name" class="txt" value="<?php echo isset($row['Name']) ? $row['Name'] : ''; ?>"> 
    <br><br><br>
    
    Password : <br> 
    <input type="text" name="password" class="txt" value="<?php echo isset($row['Password']) ? $row['Password'] : ''; ?>">
    <br><br><br>
    
    Contact Number :  <br> 
    <input type="tel" name="contact" class="txt" value="<?php echo isset($row['Contact']) ? $row['Contact'] : ''; ?>">
    <br><br><br>
    
    Address :  <br> 
    <input type="text" name="address" class="txt" value="<?php echo isset($row['Address']) ? $row['Address'] : ''; ?>">

</div>

<div class="f2">
    Username :  <br> 
    <input type="text" name="username" class="txt" value="<?php echo isset($row['Username']) ? $row['Username'] : ''; ?>">
    <br><br><br>
    
    e-mail :  <br> 
    <input type="email" name="email" class="txt" value="<?php echo isset($row['email']) ? $row['email'] : ''; ?>"> 
    <br><br><br>
</div>

</div>
<br>

<div class="btn">
    <input class="sb" type="submit" value="Update">
    <input class="db" type="reset" value="Reset">
</div>

</div>

</form>
</body>
</html>
