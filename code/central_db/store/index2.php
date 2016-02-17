<?php 
include("../api/function.php");

set_time_limit(60*60*24);
$date = '20150127';
	// End date
	$end_date = '20151013';
while (strtotime($date) <= strtotime($end_date)) {
	insertData($date);
updateSecurity($date);
updateCurrency($date);
 $date = date ("Ymd", strtotime("+1 day", strtotime($date)));
}
$conn->close();

?>