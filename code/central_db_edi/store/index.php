<?php 
date_default_timezone_set("America/New_York");
//echo date("Y-m-d H:i:s");
//exit;
$base_path='C:/inetpub/wwwroot/central_db_edi/';
include($base_path."api/function.php");
$date=date("Ymd",strtotime(date("Y-m-d")));
//$date="20151208";

 //copy_files($date);
insertData($date);
//copy_files_sytax($date);
// insertsyntaxData($date);


updateSecurity($date);
updateCurrency($date);
mail("dbajpai@indxx.com","central_db_edi ", "Central DB insert for date ".$date); 

 

?>