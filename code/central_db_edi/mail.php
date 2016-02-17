<?php 
error_reporting(2);
if(mail("jsharma@indxx.com","index","test mail"))
	echo "Mail Sent";
else
	echo "Mail not sent";
?>