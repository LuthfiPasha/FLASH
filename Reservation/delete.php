<?php
    require 'config.php';

    if (isset($_GET['reservation_id'])) {
        $id = $_GET['reservation_id'];

        $deleteSql = "DELETE FROM reservationdetails WHERE `Reservation ID` = '$id'";

        if ($con->query($deleteSql) === TRUE) {
            header("Location: Edit_or_delete.php");
        } else {
            echo "Error deleting reservation: " . $con->error;
        }
    } else {
        echo "No Reservation ID received";
    }
?>