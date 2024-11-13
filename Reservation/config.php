<?php

    $con = new mysqli("localhost","root","","flash");

    if ($con->connect_error)
    {
        die("Connection failed: " . $con->connect_error);
    }

?>