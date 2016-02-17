<?php
$servername = "localhost";
$username = "root";
$password = "Reset930$$";
$dbname = "central_db";
$date=date("Y-m-d");
//$date="20151003";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);
} 
?>