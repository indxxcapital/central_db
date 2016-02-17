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


$sql = "select security,symbol,ISIN,security_type from central_db.security_price";

$data1=$conn->query($sql);
//$data=$data1->fetch_row();


if ($data1->num_rows > 0) {
    // output data of each row
    while($row = $data1->fetch_row()) {
        $sql1="INSERT INTO security (security,currency,alternate_security_identifiers,alternate_identifier,security_type) VALUES ('$row[0]','$row[1]','ISIN','$row[2]','$row[3]')
ON DUPLICATE KEY UPDATE security ='$row[0]', currency = '$row[1]',alternate_identifier='$row[2]' ";
$conn->query($sql1);
	}
}
if ($conn->query($sql1) === TRUE) {
    echo "New record created successfully\n";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//$sql = "INSERT INTO security_custom (date_added, security_id, name,data_type,value,data_provider)
//VALUES ('2008-01-01 00:00:01', '01', 'test1','string','1.023','bloomberg')";



$conn->close();
?>