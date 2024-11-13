<?php 

require 'Adminconfig.php'; 

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $delete = "DELETE FROM user WHERE `UserID` = '$id'";

    if ($con->query($delete) === true) {
        header("Location: adminpanel.php");
    } else {
        echo "Error: " . $con->error;
    }
}

?>
