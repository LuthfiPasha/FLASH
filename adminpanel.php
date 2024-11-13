<?php 

require 'Adminconfig.php'; 
$display = "SELECT UserID,Username,Password,Name,email,Contact,Address  FROM user";
$result = $con->query($display);
 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    $DLNo = $_POST['DLNo'];
    $email = $_POST['email'];

    $sql = "INSERT INTO user (`Username`, `Password`, `Name`, `email`, `Contact`, `Address`) 
            VALUES ('$username', '$password', '$name', '$email', '$contact', '$address')";

    if ($con->query($sql) === TRUE) {
        header("Location: adminpanel.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Adminpanel.css">
    <title>ADMIN PANEL</title>
</head>
<body>
<div class="top">
        <div class="nav"> <!--Navigation Panel-->
           <img class="logo" src="LOGO.png" alt="LOGO">
        
            <ul class="ul">
                 <li> <a href="Home/homepage.php">HOME</a>  </li>
                 <li> <a href="About Us/AboutUs.php">ABOUT US</a>  </li>
                 <li> <a href="contact/contact.php">CONTACT US</a> </li>
                 <li> <a href="contact/faq.php">FAQs</a> </li>
                 <li> <a href="Login/login.php">LOGIN</a> </li>
                 <li> <a href="Signup/signup.php">SIGN UP</a> </li>
            </ul>

         </div>
    </div>
    
    <div class="head">
        WELCOME TO THE ADMIN PANEL
    </div>


    <a Class="an" href="Adduser.php"> ADD NEW USER </a>


    <div class="display">

    <table>
        <thead>
            <th> UserID</th>
            <th> Username</th>
            <th> Password</th>
            <th> Name</th>
            <th> email</th>
            <th> Contact </th>
            <th> Address</th>

        </thead>

    

 <?php  

    while ($row = $result->fetch_assoc()) {
 
?> <tr>
            <td> <?php echo $row['UserID']; ?> </td>
            <td> <?php echo $row['Username']; ?> </td>
            <td> <?php echo $row['Password']; ?> </td>
            <td> <?php echo $row['Name']; ?> </td>
            <td> <?php echo $row['email']; ?> </td>
            <td> <?php echo $row['Contact']; ?> </td>
            <td> <?php echo $row['Address']; ?> </td>
            <td> <a href="edituser.php?id=<?php echo $row['UserID']; ?>" class="editbtn"> EDIT </a> <a href="deleteuser.php?id=<?php echo $row['UserID']; ?>" class="deletebtn" onclick="return confirm ('Are you sure you want remove this user');"> REMOVE </a> </td>
            </tr>
    <?php

    }
    ?>

</table>

    </div>
    <div class="bottom"><!-- Footer -->
    <hr>

    <div class="b1">
        

        <ul> <li><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.798467128214!2d79.97036957448275!3d6.914682818494989!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae256db1a6771c5%3A0x2c63e344ab9a7536!2sSri%20Lanka%20Institute%20of%20Information%20Technology!5e0!3m2!1sen!2slk!4v1727451676831!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">"> </iframe></li>
        <li>  FLASH RENTAL (PVT) LTD </li> 
        <li> <a href="#"> info@flashrental.com</a> </li>
        <li>7817, HAZELAND LN, BOSTON, USA.</li>
        </ul>

        <ul>    
            <li><b>QUICK LINKS</b></li>             
            <li> <a href="#">HOME</a>  </li>
            <li> <a href="#">BOOK&nbsp;A&nbsp;RIDE</a>  </li>
            <li> <a href="#">ABOUT&nbsp;US</a>  </li>
            <li> <a href="#">CONTACT&nbsp;US</a> </li>
            <li> <a href="#">FAQs</a> </li>
            <li> <a href="#">LOGIN</a> </li>
            <li> <a href="#">SIGNUP</a> </li>
       </ul>
        
        <ul>
            <li> <img src = "sm.png"></li>
            <li> SERVICE&nbsp;HOURS&nbsp;:&nbsp;MON&nbsp;-&nbsp;SUN&nbsp;24&nbsp;HRS </li> 
            <li>CONTACT&nbsp;US&nbsp;:&nbsp;+1-234-567-8919</li>  </li>

        </ul>             

    </div>

    <div class="b2">

         <img src = "LOGO.png">
        <ul>
            <li> <a href="#">TERMS&nbsp;AND&nbsp;CONDITIONS</a>  </li> </ul>
            <ul>
            <li> <a href="#">PRIVACY&nbsp;POLICY</a>  </li>
        </ul>  
    </div>
</div>

</body>
</html>