<?php
include("db_config.php");
$datastring = $_POST['customer'];
$data = json_decode( urldecode( $datastring),true);
$sql = "INSERT INTO central_db.index_value(index_name,symbol,index_value,market_cap,divisor,date) 
VALUES ('".$data['index_name']."','".$data['symbol']."','".$data['index_value']."','".$data['market_cap']."','".$data['divisor']."','".$data['date']."')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully of date:".$date."\n";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



/* 
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");

fwrite($myfile, $datastring);
fclose($myfile); */




?>