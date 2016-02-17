<?php 
date_default_timezone_set("America/New_York");
//echo date("Y-m-d H:i:s");
//exit;
$base_path='C:/inetpub/wwwroot/central_db/';
include($base_path."api/function.php");
$date=date("Ymd",strtotime(date("Y-m-d")));
//$date="20151229";
insertData($date);
//insertData1($date);
//insertData2($date);
updateSecurity($date);
updateCurrency($date);
mail("dbajpai@indxx.com","central db ", "Central DB insert for date ".$date);
?>