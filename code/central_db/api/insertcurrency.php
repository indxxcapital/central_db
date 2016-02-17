<?php
$servername = "localhost";
$username = "root";
$password = "Reset930$$";
$dbname = "central_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "LOAD DATA INFILE 'C:/blp/files/curr1_16g.csv.".$date."' INTO TABLE currency_rate FIELDS TERMINATED BY '|' LINES TERMINATED BY '\n' (base_currency,outcome,message,quote_currency,symbol,@a) set date='".date("Y-m-d",strtotime($date))."'";
//$sql = "INSERT INTO security_custom (date_added, security_id, name,data_type,value,data_provider)
//VALUES ('2008-01-01 00:00:01', '01', 'test1','string','1.023','bloomberg')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>