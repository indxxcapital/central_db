<?php

$date=date("Ymd",strtotime(date("Y-m-d"))-86400);
include("insertdata.php");
include("insertupdate.php");
include("insertcurrency.php");
include("insertupdatecurr.php");
//include("ca.php");
?>