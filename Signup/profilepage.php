<?php

require 'config.php';

if(isset($_GET['id'])) {
    $userId = $_GET['id'];
    //Continue with your dataase query using $userID
    $sql = "SELECT `UserID`,`User_name`, `Full_name`, `Email`, `number`, `address`, `bio` FROM signup WHERE `UserID` = ?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    $contactUsLink = "../contact/contact.php";
    if (isset($userId) && $userId == 3) {
        $contactUsLink = "../contact/customerSupport.php";
    }

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        //Output user data as needed
    }else{
        echo "User not found!";
        exit;
    }
}   else{

}

?>

<?php  
// Update code profile info
if(isset($_POST["update"])){
   
    $id = $_POST['id']; // Use the id provided in the form
    $username = $_POST['username'];
    $fullname = $_POST['firstname']; 
    $email = $_POST['email'];
    $contactnumber = $_POST['contactnumber'];
    $address = $_POST['homeaddress'];
    $bio = $_POST['bio'];

    // Update the record with the provided form ID
    $stmt = $conn->prepare("UPDATE signup SET Full_name = ?, User_name = ?, Email = ?, number = ?, address = ?, bio = ? WHERE `UserID` = ?");
    
    // Bind the parameters
    $stmt->bind_param("sssissi", $fullname, $username, $email, $contactnumber, $address, $bio, $id); // 'i' for the id since it's an integer

    // Execute the query
    if($stmt->execute()){
        echo '<script>
                    alert("Updated Successfully"); 
                    window.location.href = "profilepage.php?id=' . $id . '";
            </script>';
    } else {
        echo '<script>
                    alert("Error: Could not update the record.");
                    window.location.href = "profilepage.php?id=' . $id . '";
            </script>';
    }
}

// Delete code
if (isset($_POST['delete'])) {
    $id = $_POST['id']; // This is the UserID passed from the form

    // Prepare the DELETE query
    $stmt = $conn->prepare("DELETE FROM signup WHERE UserID = ?");
    $stmt->bind_param("i", $id);  // 'i' denotes integer type for UserID

    // Execute the query
    if ($stmt->execute()) {
        echo '<script>
              alert("Profile Deleted successfully");
              window.location.href = "../Home/homepage.php";
            </script>';
    } else {
        echo '<script>
              alert("Error: Could not delete the record.");
              window.location.href = "../Home/homepage.php";
            </script>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - Vehicle Rental</title>
    <link rel="stylesheet" href="profilestyle.css">
</head>
<body>
    <div class="top">
        <div class="nav">
           <img class="logo" src="LOGO.png" alt="LOGO">
        
            <ul class="ul">
                 <li> <a href="../Home/homepage.php">HOME</a>  </li>
                 <li> <a href="../Reservation/Reservation1.php">BOOK A RIDE</a>  </li>
                 <li> <a href="../About Us/AboutUs.php">ABOUT US</a>  </li>
                 <li> <a href="<?php echo $contactUsLink; ?>">CONTACT US</a> </li>
                 <li> <a href="../contact/faq.php">FAQs</a> </li>
                 <li> <a href="../Home/homepage.php">LOGOUT</a> </li>
                
            </ul>

         </div>
    </div>
    <div class="container">
        <!-- Profile Sidebar with Photo -->
        <div class="profile">
            <img id="profilePicPreview" src="OIP.jpeg" alt="Profile Photo">

            <!-- Profile Photo Upload -->
            <form id="photoUploadForm">
                <label for="profile-photo">Upload Photo</label>
                <input type="file" id="profile-photo" name="profile-photo" accept="image/*" onchange="loadFile(event)">
            </form>

            <!-- Password Change Section -->
            <div class="otp">
                <form id="passwordChangeForm" onsubmit="return validatePassword()" method="POST" >
                    <div class="form-group">
                        <label for="current-password">Current Password</label>
                        <input type="password" id="current-password" name="current-password" placeholder="Enter current password">
                    </div>

                    <div class="form-group">
                        <label for="new-password">New Password</label>
                        <input type="password" id="newpassword" name="newpassword" placeholder="Enter new password">
                    </div>

                    <div class="form-group">
                        <label for="confirm-password">Confirm Password</label>
                        <input type="password" id="confirmpassword" name="confirmpassword" placeholder="Confirm new password">
                    </div>

                    <!-- Error message for mismatched passwords -->
                    <div id="passwordError" style="color: red; display: none;">
                        Passwords do not match. Please try again.
                    </div><br>
                    
                    <div class="form-group">
                        <button type="submit" class="submit-btn">Submit</button>
                    </div>
               
            </div>
        </div>

        <!-- Profile Content with Account Information -->
        <div class="profile-content">
                <h2>Account Information</h2>
            <form method="POST" action="profilepage.php"> 
            <div class="form-group">
                <label for="username">ID</label>
                <input type="text" name="id" value="<?php echo $row['UserID']; ?>" placeholder="Enter your username" >
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" value="<?php echo $row['User_name']; ?>" placeholder="Enter your username" >
            </div>

            <div class="form-group">
                <label for="firstname">Full Name</label>
                <input type="text" name="firstname" value="<?php echo $row['Full_name']; ?>" placeholder="Enter your first name" >
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo $row['Email']; ?>" placeholder="Enter your email" >
            </div>

            <div class="form-group">
                <label for="contactnumber">Contact Number</label>
                <input type="tel" id="contactnumber" name="contactnumber" value="<?php echo $row['number']; ?>" placeholder="Enter your contact number" >
            </div>

            <div class="form-group">
                <label for="homeaddress">Home Address</label>
                <input type="text" id="homeaddress" name="homeaddress"  value="<?php echo $row['address']; ?>" placeholder="Enter your home address" >
            </div>

            <div class="form-group">
                <label for="bio">Bio</label>
                <textarea id="bio" name="bio" placeholder="Write something about yourself"><?php echo $row['bio']; ?></textarea>
            </div>

            <!-- Submit Button -->
            <div class="fbtn">
                <button type="submit" class="sbtn" name="update">Save Changes</button>
                <button type="submit" class="dbtn" onclick="return confirmDelete();" name="delete">Delete Profile</button>
            </div>
            </form>
        </div>

       
        
    </div>
    <hr>
    <script>
        function loadFile(event) {
            var output = document.getElementById('profilePicPreview');
            output.src = URL.createObjectURL(event.target.files[0]);
        }

        function validatePassword() {
            var newpassword = document.getElementById('newpassword').value;
            var confirmpassword = document.getElementById('confirmpassword').value;
            var errorMessage = document.getElementById('passwordError');

            // Check if the passwords match
            if (newpassword !== confirmpassword) {
                errorMessage.style.display = 'block'; // Show the error message
                return false; // Prevent form submission
            } else {
                errorMessage.style.display = 'none'; // Hide the error message if passwords match
                return true; // Allow form submission
            }
        }
        function confirmDelete() {
            return confirm("Are you sure you want to delete your profile? This action cannot be undone.");
        }

    </script>
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
            <li> <a href="#">LOGOUT</a> </li>
            
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
