<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
</head>
<body>
<?php

	if(isset($_POST['submit'])){
		$multi=array();
		$mul=array();
		 $format=$_POST['format'];
		 $mult=$_POST['name'];
		 //$multi=implode("",$mult);
		 //$mul=explode(",",$mult);
		 //$t=implode($mul);
	
		
		if($format=="1"){
		$name=$_POST['name'];
		
		$date=$_POST['date'];
		//print_r($_POST);
		//exit;
		
		//$url="http://104.130.29.253/Webservicedemo/?name=$name";
		//$url="http://localhost/central_db/api/getticker.php?name=$name&type1=JSON";
		//$url="http://localhost/central_db/api/getlastprice.php?name=$name&type1=JSON";
		//$url="http://localhost/central_db/api/getallprice.php?name=$name&type1=JSON";
		
		//$url="http://localhost/central_db/api/getdateprice.php?name=$name&type1=JSON&date=$date";
		//$url="http://localhost/central_db/api/getdateallprice.php?type1=JSON&date=$date";
		
		//$url="http://localhost/central_db/api/getcurrency.php?name=$name&type1=JSON";
		//$url="http://localhost/central_db/api/getlastcurrency.php?name=$name&type1=JSON";
	     //$url="http://localhost/central_db/api/getdatecurrency.php?name=$name&type1=JSON&date=$date";
		// $url="http://localhost/central_db/api/getallcurrency.php?name=$name&type1=JSON";
		//$url="http://localhost/central_db/api/getlasttwocurr.php?name=$name&type1=JSON";
		$url="http://localhost/central_db/api/getmultisecurity.php?name=".$mult."&type1=JSON";
		//$url="http://localhost/central_db/api/getmultlastprice.php?name=".$mult."&type1=JSON";
		//$url="http://localhost/central_db/api/getmultidateprice.php?name=".$mult."&type1=JSON&date=$date";
		//$url="http://localhost/central_db/api/gettodayprice.php?type1=JSON";
			
			//$name=str_replace(" ","_",$name);
			//$url="http://localhost/central_db/api/getallca.php?name=$name&type1=JSON";
			//$url="http://localhost/central_db/api/getdateca.php?date=$date&type1=JSON";
			//$url="http://localhost/central_db/api/getfutureca.php?type1=JSON";
			//$url="http://localhost/central_db/api/gettodaycurr.php?type1=JSON";
            // $url1="http://localhost:443/Webservicedemo/book.php";
         //$url="http://localhost/central_db/api/getlastlibor.php?type1=JSON";
		 $client=curl_init($url);
		 curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
		 //curl_getinfo($client, CURLINFO_EFFECTIVE_URL);
		      //  curl_setopt($client,CURLOPT_POST,$data);
               // curl_setopt($client, CURLOPT_POSTFIELDS,$data);
		         $response=curl_exec($client);
				 echo $response;
                $result=json_decode($response);
                //echo $name.":".$$response;
		}
		if($format=="2"){
			$name=$_POST['name'];
			$date=$_POST['date'];
        //$url1="http://localhost/central_db/api/getticker.php?name=$name&type1=XML";
           //$url1="http://localhost/central_db/api/getlastprice.php?name=$name&type1=XML";
           //$url1="http://localhost/central_db/api/getallprice.php?name=$name&type1=XML";    
		   
		   //$url1="http://localhost/central_db/api/getdateprice.php?name=$name&type1=XML&date=$date";  
		   //$url1="http://localhost/central_db/api/getdateallprice.php?type1=XML&date=$date";  
		   
		   		//$url1="http://localhost/central_db/api/getcurrency.php?name=$name&type1=XML";
				//$url1="http://localhost/central_db/api/getlastcurrency.php?name=$name&type1=XML";
				//$url1="http://localhost/central_db/api/getdatecurrency.php?name=$name&type1=XML&date=$date";
				//$url1="http://localhost/central_db/api/getallcurrency.php?name=$name&type1=XML";
				//$url1="http://localhost/central_db/api/getlasttwocurr.php?name=$name&type1=XML";
				//$url1="http://localhost/central_db/api/getmultisecurity.php?name=".$mult."&type1=XML";
				//$url1="http://localhost/central_db/api/getmultlastprice.php?name=".$mult."&type1=XML";
				//$url1="http://localhost/central_db/api/getmultidateprice.php?name=".$mult."&type1=XML&date=$date";
				//$url1="http://localhost/central_db/api/gettodayprice.php?type1=XML";
				//$url1="http://localhost/central_db/api/gettodaycurr.php?type1=XML";
				//$name=str_replace(" ","_",$name);
				//$url1="http://localhost/central_db/api/getallca.php?name=$name&type1=XML";
				//$url1="http://localhost/central_db/api/getdateca.php?date=$date&type1=XML";
		//$url1="http://localhost/central_db/api/getfutureca.php?type1=XML";
				
		 $client=curl_init($url1);
                // curl_setopt($client, CURLOPT_URL, $url1);
		   curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
               // curl_setopt($client,CURLOPT_POST,$data);
           //  curl_setopt($client, CURLOPT_POSTFIELDS, $data);
		     $response=curl_exec($client);
	
                
			 //$response1 = simplexml_load_string($response);
	
			 			  echo $response;
               		  curl_close($client);
                
                
 
               // $result=json_decode($response);
                //echo "Price of book is:".$result->data;
               
	
					

				}
                
     }
                
                
 
?>
</body>
</html>