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
 $sql = "LOAD DATA INFILE 'C:/blp/files/multicurr_16g.csv.".$date."' INTO TABLE security_price FIELDS TERMINATED BY '|' LINES TERMINATED BY '\n' (security,message,identity,last,symbol,@outcome,ISIN,@message) set date='".date("Y-m-d",strtotime($date))."',security_type='Equity'";
//$sql = "INSERT INTO security_custom (date_added, security_id, name,data_type,value,data_provider)
//VALUES ('2008-01-01 00:00:01', '01', 'test1','string','1.023','bloomberg')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql1 = "LOAD DATA INFILE 'C:/blp/files/libr_16g.csv.".$date."' INTO TABLE security_price FIELDS TERMINATED BY '|' LINES TERMINATED BY '\n' (security,message,identity,last,@open) set date='".date("Y-m-d",strtotime($date))."',security_type='Libor',ISIN='LIBR360'";

if ($conn->query($sql1) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
} 


$sql2 = "LOAD DATA INFILE 'C:/blp/files/cashindex_16g.csv.".$date."' INTO TABLE security_price FIELDS TERMINATED BY '|' LINES TERMINATED BY '\n' (@securit,message,identity,last,@open) set date='".date("Y-m-d",strtotime($date))."',security=@securit,security_type='Index',ISIN=@securit";

if ($conn->query($sql2) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
} 


$conn->close();

?>