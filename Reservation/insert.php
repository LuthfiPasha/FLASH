<?php

    require 'config.php';

    $Sub=$_POST["hiddenSubtotal"];
    $discount=$_POST["hiddenDiscount"];
    $tot=$_POST["hiddenTotalPayable"];

    $sql1="INSERT INTO invoice VALUES ('','$Sub','$discount','$tot')";
    
    $cno=$_POST["cardno"];
    $cname=$_POST["cardname"];
    $cvv=$_POST["cvv"];
    $exp=$_POST["exp"];

    $sql2="INSERT INTO PaymentDetails VALUES ('$cno','$cname','$cvv','$exp')";

    if ($con->query($sql1)) {
        if ($con->query($sql2)) {
            header("Location: ../Home/homepage.php"); 
            exit();
        } else {
            echo "Error inserting payment details: " . $con->error;
        }
    } else {
        echo "Error inserting invoice: " . $con->error;
    }

?>