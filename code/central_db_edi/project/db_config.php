<?php
$servername = "localhost";
$username = "root";
$password = "Reset930$$";
$dbname = "centraledi";

$date=date("Y-m-d");
$path="ftp://indxx:4Q4J35tY@ftp.exchange-data.net/feed/";




//$date="20151003";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);
} 
?>