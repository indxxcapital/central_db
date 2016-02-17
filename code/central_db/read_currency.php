<pre><?php 
error_reporting(E_ALL);
include("db_config.php");
$lines = file('C:/blp/files/curr1_16g.csv.20150928');
$insertQuery=array();
//echo $date;
if(!empty($lines))
{
	$array=array();
	foreach($lines as $line )
	{
	$data=explode("|",$line);
	//print_r($data);
	$array[]=("('".$data[0]."',"."'".$data[3]."',"."'".$data[4]."',"."'".$date."')");
	}
if(!empty($array))
{
	$query="insert into  central_db.currency_rate  (symbol,quote_currency,base_currency,date)  values ".implode(",",$array)."";

	
	
	if ($conn->query($query) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}

$conn->close();
	
	}
	}
	
	
//print_r($array);

?>