<?php 
    $servername = "localhost";  // XAMPP default server
    $username = "root";         // XAMPP default username
    $password = "";             // XAMPP default password (blank)
    $dbname = "flash";  // The name of your database

    // Create connection
    $conn = new mysqli($servername,$username,$password,$dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    ?>
