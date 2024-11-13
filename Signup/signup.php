<?php
require 'config.php';
if(isset($_POST["register"])){
    $fullName = $_POST['fullName'];
    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $password = $_POST['password']; // Hash the password for security

    // Insert user data into the 'signup' table
    $sql ="INSERT INTO signup VALUES('', '$fullName','$userName','$email',$phoneNumber,'$password','','')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: ../login/login.php");
    }
     else {
        echo "Error: ". $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign up page</title>
    <link rel="stylesheet" href="signupstyle.css">
</head>
<body>
    <div class="top">
        <div class="nav">
           <img class="logo" src="LOGO.png" alt="LOGO">
        
            <ul class="ul">
                 <li> <a href="../Home/homepage.php">HOME</a>  </li>
                 <li> <a href="../Reservation/Reservation1.php">BOOK A RIDE</a>  </li>
                 <li> <a href="../About Us/AboutUs.php">ABOUT US</a>  </li>
                 <li> <a href="../Contact/contact.php">CONTACT US</a> </li>
                 <li> <a href="../Contact/faq.php">FAQs</a> </li>
                 <li> <a href="../Login/login.php">LOGIN</a> </li>
            </ul>

         </div>
    </div>

    <div class="head">
        <p> REGISTER NOW </p>

    </div>

<div class="main">
<div class="img1">
        <img src="IMG2.png" alt="IMG">
    </div>
<div class="container">

    <div class="content">
        <form method="POST" action="signup.php" onsubmit="return validatepassword()" >
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Full&nbsp;Name</span>
                    <input type="text" name="fullName" placeholder="Enter your name"required>
                </div>
                <div class="input-box">
                    <span class="details">User&nbsp;Name</span>
                    <input type="text" name="userName" placeholder="Enter your username"required>
                </div>
                <div class="input-box">
                    <span class="details">E-mail</span>
                    <input type="email"name="email" placeholder="Enter your email"required>
                </div>
                <div class="input-box">
                    <span class="details">Phone&nbsp;Number</span>
                    <input type="text"name="phoneNumber" placeholder="Enter your phone number"required>
                </div>
                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" id="password" name="password"placeholder="Enter your password"required>
                </div>
                <div class="input-box">
                    <span class="details">Confirm&nbsp;Password</span>
                    <input type="password" id="confirm-password" placeholder="confirm your password"required>
                </div>
            </div>
<div class="button">
    <input type="submit" value="REGISTER" name="register">
</div>
</form>
</div>
</div>
<script>
    function validatepassword(){
        var password =document.getElementById('password').value;
        var confirmpassword =document.getElementById('confirm-password').value;

        if (password !== confirmpassword){
            alert("Incorrect password! try again.");
            return false;
        }
        return true;
    }
</script>

</div>


<div class="b1">
        
    
    <ul> <li><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.798467128214!2d79.97036957448275!3d6.914682818494989!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae256db1a6771c5%3A0x2c63e344ab9a7536!2sSri%20Lanka%20Institute%20of%20Information%20Technology!5e0!3m2!1sen!2slk!4v1727451676831!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">"> </iframe></li>
    <li>  FLASH RENTAL (PVT) LTD </li> 
    <li> <a href="#"> info@flashrental.com</a> </li>
    <li>7817, HAZELAND LN, BOSTON, USA.</li>
    </ul>

    <ul>    
        <li><b>QUICK LINKS</b></li>             
        <li> <a href="../Home/homepage.php">HOME</a>  </li>
                 <li> <a href="../Reservation/Reservation1.php">BOOK A RIDE</a>  </li>
                 <li> <a href="../About Us/AboutUs.php">ABOUT US</a>  </li>
                 <li> <a href="../Contact/contact.php">CONTACT US</a> </li>
                 <li> <a href="../Contact/faq.php">FAQs</a> </li>
                 <li> <a href="../Login/login.php">LOGIN</a> </li>
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