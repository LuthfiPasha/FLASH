<?php
require 'dbh.inc.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']); 
    $password = trim($_POST['password']); 
    $role = trim($_POST['role']); // Get the selected role from the form

   
    $sql = "SELECT `UserID`, `User_name`, `Email`, `password` FROM signup WHERE `User_name` = ? OR `Email` = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ss", $username, $username); 
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a user exists
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Check if the entered password matches the stored password
        if ($password === $user['password']) { // Compare directly
            // Start the session and store user information
            session_start();
            $_SESSION['user_id'] = $user['UserID']; // Storing UserID in session
            
            
            if ($role === 'admin') {
                header("Location: ../adminpanel.php"); // Redirect to admin dashboard
            } elseif ($role === 'Customer Support Agent') {
                header("Location: ../contact/customersupport.php"); // Redirect to customer support page
            } else {
                header("Location: ../Signup/profilepage.php?id=" . urlencode($user['UserID'])); // Redirect to user homepage
            }
            exit(); 
        } else {
            // Password does not match
            echo '<script>
                    alert("Invalid password."); 
                    window.location.href = "../Login/login.php";
            </script>';
        }
    } else {
        // No user found with that username or email
        echo '<script>
                alert("No user found with that username/email."); 
                window.location.href = "../Login/login.php";
        </script>';
    }

    $stmt->close();
}

$con->close();
?>
