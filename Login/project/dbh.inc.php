<?php
$serverName = "localhost";
$dbUsername = "#";
$dbPassword = "123456";
$dbName = "#";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if(!$conn){
    die("Connection failed : ".mysqli_connect_error());
}