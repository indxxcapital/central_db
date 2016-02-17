<pre>
<?php
include("function.php");
$start_date=date("Y-m-d");
//$start_date="2015-12-14";
//$enddate ="2015-12-01";
/*while(strtotime($start_date)<strtotime($enddate)){

*/



read_ca_from_edi($start_date);

/*$start_date=date("Y-m-d",strtotime($start_date)+86400);
}
*/

read_factor($start_date);
Alert();

mail("dbajpai@indxx.com","EDI ca  ",date("Y-m-d H:i:s"));
$conn->close();
?>