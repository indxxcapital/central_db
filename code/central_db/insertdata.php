<?php
include("db_config.php");
// Create connection

$filedate=date("Ymd",strtotime($date));
$sql = "LOAD DATA INFILE 'C:/blp/files/multicurr_16g.csv.".$filedate."' INTO TABLE security_price FIELDS TERMINATED BY '|' LINES TERMINATED BY '\n' (security,message,identity,last,symbol,@outcome,ISIN,@message) set date='".$date."'";
//$sql = "INSERT INTO security_custom (date_added, security_id, name,data_type,value,data_provider)
//VALUES ('2008-01-01 00:00:01', '01', 'test1','string','1.023','bloomberg')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully\n";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>