<?php
include("db_config.php");
/* $servername = "localhost";
$username = "root";
$password = "Reset930$$";
$dbname = "central_db"; */
function get_ticker($find){
global $conn;
$sql = "SELECT alternate_identifier,security,currency,alternate_security_identifiers FROM centraledi.security where alternate_identifier='".$find."'";
$data=$conn->query($sql);
$conn->close();
return $data;
}

function get_lastprice($findprice){
global $conn;	
	 $sql="select security,ISIN,date,last from centraledi.security_price where ISIN='".$findprice."' and security_type='Equity' ORDER BY date DESC limit 1";
	$data=$conn->query($sql);
$conn->close();
return $data;
}
function get_allprice($findallprice){
global $conn;
    /*$temp="SELECT  COUNT(*) as count1
FROM security_price where ISIN='".$findallprice."'
GROUP BY security
HAVING COUNT(*) > 1";
$data=$conn->query($temp);
$row=$data->fetch_assoc();
 	if($row['count1']>1){
		
		$sql="select security,ISIN,date,last from centraledi.security_price where ISIN='".$findallprice."' ORDER BY id DESC limit 1 ";
	}
	else{
		
	$sql="select security,ISIN,date,last from centraledi.security_price where ISIN='".$findallprice."' ORDER BY date DESC ";
	}*/
$sql="select security,ISIN,date,last from centraledi.security_price where ISIN='".$findallprice."' and security_type='Equity'";
	$data=$conn->query($sql);
	
$conn->close();
return $data;
}

function get_dateprice($finddateprice,$date){
global $conn;	
/*$temp="SELECT  COUNT(*) as count1
FROM security_price where ISIN='".$finddateprice."' and date='".$date."'
GROUP BY security
HAVING COUNT(*) > 1";
$data=$conn->query($temp);
$row=$data->fetch_assoc();
 	if($row['count1']>1){
		
		$sql="select security,ISIN,date,last from centraledi.security_price where ISIN='".$finddateprice."' and date='".$date."' ORDER BY id DESC limit 1 ";
	}
	else{
		
	$sql="select security,ISIN,date,last from centraledi.security_price where ISIN='".$finddateprice."' and date='".$date."'";
	}*/
   $sql="select security,ISIN,date,last from centraledi.security_price where ISIN='".$finddateprice."' and date='".$date."' and security_type='Equity'";
	$data=$conn->query($sql);

$conn->close();
return $data;
}


function get_dateallprice($date){
global $conn;	

		
	$sql="select id,security,ISIN,date,last from centraledi.security_price where date='".$date."' and security_type='Equity'";
	
	
	$data=$conn->query($sql);
$conn->close();
return $data;
}

function get_currency($findcurr){
global $conn;	
	$sql="select currency,symbol from centraledi.currency  where currency like '".$findcurr."%'";
	$data=$conn->query($sql);
$conn->close();
return $data;
}		
function get_lastcurr($findlastprice){
global $conn;	
	$sql="select base_currency,quote_currency,symbol,date from centraledi.currency_rate  where base_currency like '".$findlastprice."%' ORDER BY date DESC limit 1";
	$data=$conn->query($sql);
$conn->close();
return $data;
}		
function get_datecurr($finddatecurr,$date){
global $conn;	
	$sql="select base_currency,quote_currency,symbol,date from centraledi.currency_rate  where base_currency like '".$finddatecurr."%' and date='".$date."'";
	
	$data=$conn->query($sql);
$conn->close();
return $data;
}
function get_allcurr($findallcurr){
global $conn;	
	$sql="select base_currency,quote_currency,symbol,date from centraledi.currency_rate  where base_currency like '".$findallcurr."%'";
	$data=$conn->query($sql);
$conn->close();
return $data;
}	
function get_lasttwocurr($findlasttwo){
global $conn;	
	$sql="select base_currency,quote_currency,symbol,date from centraledi.currency_rate  where base_currency like '".$findlasttwo."%' ORDER BY date DESC limit 0,2";
	$data=$conn->query($sql);
$conn->close();
return $data;
}	
		
function get_multisecurity($findmulti){
global $conn;
$ids = join("','",$findmulti); 
$ids="'".$ids."'";
	$sql="select security,ISIN,date,last from centraledi.security_price where ISIN IN (".$ids.") and security_type='Equity'";
	$data=$conn->query($sql);
$conn->close();
return $data;
}

function get_multilastprice($findmultlast){
global $conn;
$ids = join("','",$findmultlast); 
$ids="'".$ids."'";
	$sql="select security,ISIN,date,last from centraledi.security_price where ISIN IN (".$ids.") and security_type='Equity'";
	$data=$conn->query($sql);
$conn->close();
return $data;
}
function get_lastprice2($findprice){
global $conn;	
	$sql="select security,ISIN,date,last from security_price where ISIN='".$findprice."' and security_type='Equity' ORDER BY date DESC limit 1";
	$data=$conn->query($sql);
//	$conn->close();
if(mysqli_num_rows($data)) {
return 	mysqli_fetch_assoc($data);
}

return $data;
}

function get_multidatecurr($finddatecurr,$date){
global $conn;
$ids = join("','",$finddatecurr); 
$ids="'".$ids."'";
	$sql="select security,ISIN,date,last from centraledi.security_price where ISIN IN (".$ids.") and date='".$date."'";

	$data=$conn->query($sql);
$conn->close();
return $data;
}


function get_todaysprice($dateValue){
global $conn;	

if($dateValue=='')
$date=getlastdateprice("Equity");
else
$date=$dateValue;
//$date="2015-10-09";
	
		//$sql="select security as ticker,ISIN as isin,date,last as price,symbol as currency from centraledi.security_price where  date='".$date."' and security_type='Equity' order by id desc";
	$sql="select security as ticker,ISIN as isin,date,last as price,symbol as currency from centraledi.security_price where  date='".$date."' and security_type='Equity'";
	$data=$conn->query($sql);
$conn->close();
return $data;
}	

function get_todaycurr($dateValue){
global $conn;	
if($dateValue=='')
$date=getlastdatecurrency();
else
$date=$dateValue;
//$date="2015-10-08";
	
		//$sql="select base_currency as currency_ticker,quote_currency as price,symbol as currency_symbol,date from centraledi.currency_rate  where  date='".$date."' order by id desc";
	$sql="select base_currency as currency_ticker,quote_currency as price,symbol as currency_symbol,date from centraledi.currency_rate  where  date='".$date."'";	
	$data=$conn->query($sql);
$conn->close();
return $data;
}	

function get_ca($findticker){
global $conn;
$posts=array();
	 $sql="select corporate_action,dataprovider,identifier_name,identifier,currency,symbol,country_code,record_date,ex_date,modify_date,ticker,action_id,name from centraledi.corporate_action where  ticker='".$findticker."'";
		
	$data=$conn->query($sql);
if(mysqli_num_rows($data)) {
		$i=0;
 
		while($post = mysqli_fetch_assoc($data)) {
			
			$sql2="select name,value from centraledi.corporate_action_custom where bbg_action_id='".$post['action_id']."' and (value!='N.A.' and value!=' ') ";
			//echo $sql2;
			$dataArray=array();
			$data1=$conn->query($sql2);
			while($row=$data1->fetch_assoc()){
				//print_r($row);
			$dataArray[]=$row;
			}
	
			$post['values']=$dataArray;
			$posts[$i] = array('post'=>$post);
		$i++;	
		}
	}
$conn->close();
return $posts;

}

function getdate_ca($finddate){
global $conn;
$posts=array();
	$sql="select corporate_action,dataprovider,identifier_name,identifier,currency,symbol,country_code,record_date,ex_date,modify_date,ticker,action_id,name from centraledi.corporate_action where  ex_date='".$finddate."'";
	
	$data=$conn->query($sql);
if(mysqli_num_rows($data)) {
		$i=0;
 
		while($post = mysqli_fetch_assoc($data)) {
			
			$sql2="select name,value from centraledi.corporate_action_custom where bbg_action_id='".$post['action_id']."' and (value!='N.A.' and value!=' ') ";
			//echo $sql2;
			$dataArray=array();
			$data1=$conn->query($sql2);
			while($row=$data1->fetch_assoc()){
				//print_r($row);
			$dataArray[]=$row;
			}
	
			$post['values']=$dataArray;
			$posts[$i] = array('post'=>$post);
		$i++;	
		}
	}

return $posts;
$conn->close();
}

function getfuture_ca(){
global $conn;
$posts=array();
$date=date("Y-m-d",strtotime(date("Y-m-d"))-15*86400);
$date2=date("Y-m-d",strtotime($date)+60*86400);
	$sql="select corporate_action,dataprovider,identifier_name,identifier,currency,symbol,country_code,record_date,ex_date,modify_date,ticker,action_id,name from centraledi.corporate_action where  ex_date>='".$date."' and ex_date <'".$date2."'";

	$data=$conn->query($sql);
if(mysqli_num_rows($data)) {
		$i=0;
 
		while($post = mysqli_fetch_assoc($data)) {
			
			$sql2="select name,value from centraledi.corporate_action_custom where bbg_action_id='".$post['action_id']."' and (value!='N.A.' and value!=' ') ";
			//echo $sql2;
			$dataArray=array();
			$data1=$conn->query($sql2);
			while($row=$data1->fetch_assoc()){
				//print_r($row);
			$dataArray[]=$row;
			}
	mysqli_free_result($data1);
			$post['values']=$dataArray;
			unset($dataArray);
			$posts[$i] = $post;
		$i++;	
		}
	}
	mysqli_free_result($data);
$conn->close();
return $posts;

}

function array_to_xml( $data, &$xml_data ) {
    foreach( $data as $key => $value ) {
        if( is_array($value) ) {
            if( is_numeric($key) ){
                $key = 'item_'.$key; //dealing with <0/>..<n/> issues
            }
            $subnode = $xml_data->addChild($key);
            array_to_xml($value, $subnode);
        } else {
            $xml_data->addChild("$key",htmlspecialchars("$value"));
        }
     }
}

 function deliver_response($status,$status_message,$row){
		 header("HTTP/1.1 $status ");
	
	 $response['status']=$status_message;
	 $response['data']=$row;
	
		$json_response=json_encode($response);
		echo $json_response;
		 }
		 
		 
		 
		 
		 function create_log($content){
			 
			 
	$file = "../../apilogs/".date("dmY").'log.txt'; //log file  
if (file_exists($file))  
   {  
   $handle = fopen($file, 'a');  
   } else { 
   $handle = fopen($file, 'w');  
   } 
   
   
fputs($handle, date("Y-m-d H:i:s").":$content\n"); 
fclose($handle);
		 }
		 
		 
function authanticate()
{global $time_start ;
create_log("Request from IP : ".$_SERVER['REMOTE_ADDR'].":".$_SERVER['REMOTE_PORT'].",File : ".$_SERVER['SCRIPT_FILENAME']." Request URL: ".$_SERVER['REQUEST_URI']);
	
if(isset($_GET['authcode'])){
	global $conn;
	

	 create_log("user Authantication code: ".$_GET['authcode']);
	
	$sql="select * from centraledi.users where  auth_code='".mysqli_real_escape_string($conn,$_GET['authcode'])."'";

	$data=$conn->query($sql);
if(mysqli_num_rows($data)) {
		
 
		while($post = mysqli_fetch_assoc($data)) {
//print_r($post);
	create_log("User name : ".$post['uname']);

	}
}else{
	
	if($_GET['type1']=="JSON"){
		header("Content_Type:application/json");
		 $response=array();
			 $response['outcome']='false';
			 $response['authorized']='false';
			 $response['delay']=microtime(true)-$time_start;
			 
	 
		 deliver_response(200,$response,NULL);
		 exit;
	}elseif($_GET['type1']=="XML"){
		 header('Content-type: text/xml');
	 
	 
 $xml_data = new SimpleXMLElement('<?xml version="1.0"?><output></output>');
		 $response=array();
			 $response['outcome']='false';
			  $response['authorized']='false';
			
			 $response['delay']=microtime(true)-$time_start;
			$output['status']=$response;
				
			array_to_xml($output,$xml_data);
			$result = $xml_data->asXML();
		print $result;	
		exit;
	}
	
}}else{
	if($_GET['type1']=="JSON"){
		header("Content_Type:application/json");
		 $response=array();
			 $response['outcome']='false';
			 $response['authorized']='false';
			 $response['delay']=microtime(true)-$time_start;
			 
	 
		 deliver_response(200,$response,NULL);
		 exit;
	}elseif($_GET['type1']=="XML"){
		 header('Content-type: text/xml');
	 
	 
 $xml_data = new SimpleXMLElement('<?xml version="1.0"?><output></output>');
		 $response=array();
			 $response['outcome']='false';
			  $response['authorized']='false';
			
			 $response['delay']=microtime(true)-$time_start;
			$output['status']=$response;
				
			array_to_xml($output,$xml_data);
			$result = $xml_data->asXML();
		print $result;	
		exit;
	}
	
	
}
}

function get_lastlibprice($dateValue){
global $conn;	
if($dateValue=='')
$date=getlastdateprice("Libor");
else
$date=$dateValue;

	 $sql="select security as ticker,ISIN as isin,date,last  as price from centraledi.security_price where ISIN='LIBR360' and security_type='Libor' and date='".$date."'";
	$data=$conn->query($sql);
$conn->close();
return $data;
}

function get_alllibor(){
global $conn;	
	 $sql="select security,ISIN,date,last from centraledi.security_price where ISIN='LIBR360' and security_type='Libor'";
	$data=$conn->query($sql);
$conn->close();
return $data;
}

function get_datelibor($date){
global $conn;	

		
	$sql="select id,security,ISIN,date,last from centraledi.security_price where date='".$date."' and ISIN='LIBR360' and security_type='Libor'";
	
	
	$data=$conn->query($sql);
$conn->close();
return $data;
}
function getlastdatecurrency()
{
	global $conn;
$date=date("Y-m-d");
	$sql="select date from centraledi.currency_rate order by date desc limit 0,1";
	$data=$conn->query($sql);
	if(mysqli_num_rows($data)) {
		
 
	while($post = mysqli_fetch_assoc($data)) {
		$date=$post['date'];
	}}
	return $date;
}
function getlastdateprice($type)
{
	global $conn;
$date=date("Y-m-d");
	$sql="select date from centraledi.security_price where  security_type='".$type."' order by date desc limit 0,1";
	$data=$conn->query($sql);
	if(mysqli_num_rows($data)) {
		
 
	while($post = mysqli_fetch_assoc($data)) {
		$date=$post['date'];
	}}
	mysqli_free_result($data);
	return $date;
}

function get_lastcashprice($dateValue){
global $conn;	
if($dateValue=='')
$date=getlastdateprice("Index");
else
$date=$dateValue;

	 $sql="select security as ticker,ISIN as isin,date,last as price from centraledi.security_price where  security_type='Index' and last!='N.A.'  and date='".$date."' ";
	$data=$conn->query($sql);
$conn->close();
return $data;
}

function insertData($date)
{global $conn;

/* $query2="delete from security_price where date='$date'";
$conn->query($query2); */
	$sql = "LOAD DATA INFILE 'C:/blp/files/multicurr_16g.csv.".$date."' INTO TABLE security_price FIELDS TERMINATED BY '|' LINES TERMINATED BY '\n' (security,message,identity,last,symbol,@outcome,ISIN,@message) set date='".date("Y-m-d",strtotime($date))."',security_type='Equity'";
//$sql = "INSERT INTO security_custom (date_added, security_id, name,data_type,value,data_provider)
//VALUES ('2008-01-01 00:00:01', '01', 'test1','string','1.023','bloomberg')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully of date:".$date."\n";
} else {
  	
	mail("dbajpai@indxx.com","File not available on central db ", "CA file not available on central db ".'C:/blp/files/multicurr_8gb.csv.'.$date ." of ".date("Y-m-d H:i:s")."Error: " . $sql1 . "<br>" . $conn->error);

}


$sql1 = "LOAD DATA INFILE 'C:/blp/files/libr_16g.csv.".$date."' INTO TABLE security_price FIELDS TERMINATED BY '|' LINES TERMINATED BY '\n' (security,message,identity,last,@open) set date='".date("Y-m-d",strtotime($date))."',security_type='Libor',ISIN='LIBR360'";

if ($conn->query($sql1) === TRUE) {
    echo "New Security Price created successfully of date".$date."\n";
} else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
	mail("dbajpai@indxx.com","File not available on central db ", "CA file not available on central db ".'C:/blp/files/libr_8gb.csv.'.$date ." of ".date("Y-m-d H:i:s")."Error: " . $sql1 . "<br>" . $conn->error);

} 


$sql2 = "LOAD DATA INFILE 'C:/blp/files/cashindex_16g.csv.".$date."' INTO TABLE security_price FIELDS TERMINATED BY '|' LINES TERMINATED BY '\n' (@securit,message,identity,last,@open) set date='".date("Y-m-d",strtotime($date))."',security=@securit,security_type='Index',ISIN=@securit";

if ($conn->query($sql2) === TRUE) {
    echo "New Cash Index created successfully of date".$date."\n";
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
	mail("dbajpai@indxx.com","File not available on central db ", "CA file not available on central db ".'C:/blp/files/cashindex_8gb.csv.'.$date ." of ".date("Y-m-d H:i:s")."Error: " . $sql1 . "<br>" . $conn->error);

} 

/* $query3="delete from currency_rate where date='$date'";
$conn->query($query3); */

$sql = "LOAD DATA INFILE 'C:/blp/files/curr1_16g.csv.".$date."' INTO TABLE currency_rate FIELDS TERMINATED BY '|' LINES TERMINATED BY '\n' (base_currency,outcome,message,quote_currency,symbol,@a) set date='".date("Y-m-d",strtotime($date))."'";
//$sql = "INSERT INTO security_custom (date_added, security_id, name,data_type,value,data_provider)
//VALUES ('2008-01-01 00:00:01', '01', 'test1','string','1.023','bloomberg')";

if ($conn->query($sql) === TRUE) {
    echo "New Currency created successfully of date".$date."\n";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	mail("dbajpai@indxx.com","File not available on central db ", "CA file not available on central db ".'C:/blp/files/curr1_8gb.csv.'.$date ." of ".date("Y-m-d H:i:s")."Error: " . $sql1 . "<br>" . $conn->error);

}







}


function insertsyntaxData($date)
{global $conn;

/* $query2="delete from security_price where date='$date'";
$conn->query($query2); */
	$sql = "LOAD DATA INFILE 'C:/blp/files/multicurr_syntax.csv.".$date."' INTO TABLE security_price FIELDS TERMINATED BY '|' LINES TERMINATED BY '\n' (security,message,identity,last,symbol,@outcome,ISIN,@message) set date='".date("Y-m-d",strtotime($date))."',security_type='Equity'";
//$sql = "INSERT INTO security_custom (date_added, security_id, name,data_type,value,data_provider)
//VALUES ('2008-01-01 00:00:01', '01', 'test1','string','1.023','bloomberg')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully of date:".$date."\n";
} else {
  	
	mail("dbajpai@indxx.com","File not available on central db ", "CA file not available on central db ".'C:/blp/files/multicurr_syntax.csv.'.$date ." of ".date("Y-m-d H:i:s")."Error: " . $sql1 . "<br>" . $conn->error);

}


$sql1 = "LOAD DATA INFILE 'C:/blp/files/libr_syntax.csv.".$date."' INTO TABLE security_price FIELDS TERMINATED BY '|' LINES TERMINATED BY '\n' (security,message,identity,last,@open) set date='".date("Y-m-d",strtotime($date))."',security_type='Libor',ISIN='LIBR360'";

if ($conn->query($sql1) === TRUE) {
    echo "New Security Price created successfully of date".$date."\n";
} else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
	mail("dbajpai@indxx.com","File not available on central db ", "CA file not available on central db ".'C:/blp/files/libr_syntax.csv.'.$date ." of ".date("Y-m-d H:i:s")."Error: " . $sql1 . "<br>" . $conn->error);

} 


$sql2 = "LOAD DATA INFILE 'C:/blp/files/cashindex_syntax.csv.".$date."' INTO TABLE security_price FIELDS TERMINATED BY '|' LINES TERMINATED BY '\n' (@securit,message,identity,last,@open) set date='".date("Y-m-d",strtotime($date))."',security=@securit,security_type='Index',ISIN=@securit";

if ($conn->query($sql2) === TRUE) {
    echo "New Cash Index created successfully of date".$date."\n";
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
	mail("dbajpai@indxx.com","File not available on central db ", "CA file not available on central db ".'C:/blp/files/cashindex_syntax.csv.'.$date ." of ".date("Y-m-d H:i:s")."Error: " . $sql1 . "<br>" . $conn->error);

} 

/* $query3="delete from currency_rate where date='$date'";
$conn->query($query3); */

$sql = "LOAD DATA INFILE 'C:/blp/files/curr1_syntax.csv.".$date."' INTO TABLE currency_rate FIELDS TERMINATED BY '|' LINES TERMINATED BY '\n' (base_currency,outcome,message,quote_currency,symbol,@a) set date='".date("Y-m-d",strtotime($date))."'";
//$sql = "INSERT INTO security_custom (date_added, security_id, name,data_type,value,data_provider)
//VALUES ('2008-01-01 00:00:01', '01', 'test1','string','1.023','bloomberg')";

if ($conn->query($sql) === TRUE) {
    echo "New Currency created successfully of date".$date."\n";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	mail("dbajpai@indxx.com","File not available on central db ", "CA file not available on central db ".'C:/blp/files/curr1_syntax.csv.'.$date ." of ".date("Y-m-d H:i:s")."Error: " . $sql1 . "<br>" . $conn->error);

}







}






function updateSecurity($date){
	global $conn;
$sql = "select security,symbol,ISIN,security_type from centraledi.security_price where date='".date("Y-m-d",strtotime($date))."'";

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
/* if ($conn->query($sql1) === TRUE) {
    echo "New Security created successfully of date".$date."\n";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
} */
}

function updateCurrency($date){
	 global $conn;
$sql = "select base_currency,symbol from centraledi.currency_rate where date='".date("Y-m-d",strtotime($date))."'";

$data1=$conn->query($sql);
//$data=$data1->fetch_row();


if ($data1->num_rows > 0) {
    // output data of each row
    while($row = $data1->fetch_row()) {
        $sql1="INSERT INTO currency (currency,symbol) VALUES ('$row[0]','$row[1]')
ON DUPLICATE KEY UPDATE symbol ='$row[1]'";
$conn->query($sql1);
	}
}
/* if ($conn->query($sql1) === TRUE) {
    echo "New Currency created successfully of date".$date."\n";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
} */




}

function copy_files($date){
	
	
	 $path='C:/blp/files/';       



 $date=date("Ymd",strtotime($date));
//$date="20151022";
$files=array("multicurr.csv.".$date,"libr.csv.".$date,"curr1.csv.".$date,"cashindex.csv.".$date);
foreach ($files as $k=> $file){
	if(file_exists($path.$file))
{	
$fileContents = file_get_contents($path.$file);
$str= get_string_between($fileContents,"START-OF-DATA","END-OF-DATA");
$array=explode("\n",$str);
unset($array[0]);
//print_r($array);
//exit;
$str=implode("\n",$array);
$filename="";
if($k==0)
$filename="multicurr_8gb.csv.".$date;
if($k==1)
$filename="libr_8gb.csv.".$date;
if($k==2)
$filename="curr1_8gb.csv.".$date;
if($k==3)
$filename="cashindex_8gb.csv.".$date;

$myfile = fopen($path.$filename, "w") or die("Unable to open file!");

fwrite($myfile, $str);
fclose($myfile);


  
	}
}





	
}
function copy_files_sytax($date){
	
	
	 $path='C:/blp/files/';       



 $date=date("Ymd",strtotime($date));
//$date="2015122";
$files=array("multicurr_sl.csv.".$date,"libr_sl.csv.".$date,"curr1_sl.csv.".$date,"cashindex_sl.csv.".$date);
foreach ($files as $k=> $file){
	if(file_exists($path.$file))
{	
$fileContents = file_get_contents($path.$file);
$str= get_string_between($fileContents,"START-OF-DATA","END-OF-DATA");
$array=explode("\n",$str);
unset($array[0]);
//print_r($array);
//exit;
$str=implode("\n",$array);
$filename="";
if($k==0)
$filename="multicurr_syntax.csv.".$date;
if($k==1)
$filename="libr_syntax.csv.".$date;
if($k==2)
$filename="curr1_syntax.csv.".$date;
if($k==3)
$filename="cashindex_syntax.csv.".$date;

$myfile = fopen($path.$filename, "w") or die("Unable to open file!");

fwrite($myfile, $str);
fclose($myfile);


  
	}
}





	
}




function get_string_between($string, $start, $end){
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}
?>