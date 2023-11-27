<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "login_db";

$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if (!$con) {
    die("Error connecting to MySQL: " . mysqli_connect_error());
}

?>