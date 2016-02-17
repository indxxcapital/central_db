<?php 
set_time_limit(60*60*24);
$date = '20150127';
	// End date
	$end_date = '20151013';
while (strtotime($date) <= strtotime($end_date)) {
	
include("insertdata.php");
//include("insertupdate.php");
include("insertcurrency.php");
//include("insertupdatecurr.php");

 $date = date ("Ymd", strtotime("+1 day", strtotime($date)));
}


?>