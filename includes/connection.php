<?php
// General settings
$host = "localhost";
$database = "ala_blog";
$user = "root";
$password = "root";

$db = mysqli_connect($host, $user, $password, $database)
or die("Error: " . mysqli_connect_error());