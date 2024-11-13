<?php

    $con = new mysqli("localhost","root","","Flash");

    if ($con->connect_error)
    {
        die("Connection failed: " . $con->connect_error);
    }

?>