<?php

date_default_timezone_set("America/New_York");
$base_path='C:/inetpub/wwwroot/central_db/';
include($base_path."api/db_config.php");

$date=date("Y-m-d",strtotime(date("Y-m-d")));
	// End date
//$date="2016-01-06";
$filedate=date("Ymd",strtotime($date));
copy_file($date);

$file16g='C:/blp/files/ca_syntax.csv.'.$filedate;
//$filesyntax='C:/blp/files/ca_sl.csv.'.$filedate;

read_ca($file16g);

//read_ca($filesyntax);
function read_ca($file)
{
	$lines=array();
	global $date;
	global $filedate;
	global $conn;
$lines = file($file);
//print_r($lines);

if(!empty($lines))
{foreach($lines as $line)
	{
		//echo $date."\n";
		$data=array();
		$data=explode("|",$line);
		//
		
//print_r($data);
		if(count($data)>5)
		{
			
			
			  $temp="select id,action_id,modify_date from corporate_action where action_id='".$data[4]."'";
			$tmp=$conn->query($temp);
	  		if ($tmp->num_rows > 0) {
           // output data of each row
           while($row = $tmp->fetch_assoc()){
			   
			  //print_r($row);
			if(strtotime($row['modify_date'])!=strtotime($data[15])){
			
			if($data[14]!="N.A.")
			{

//echo "update Required";
			  
//delete for $data[4] on corporate_action_custom
				$sqldelet="DELETE FROM corporate_action_custom WHERE bbg_action_id ='".$data[4]."'";
				$conn->query($sqldelet);
				 $sqlupdate="UPDATE corporate_action SET ticker='".mysqli_real_escape_string($conn,$data[0])."', 
				 action_id='".mysqli_real_escape_string($conn,$data[4])."',
				 dataprovider='bloomberg',name='".mysqli_real_escape_string($conn,$data[7])."',
				 corporate_action='".mysqli_real_escape_string($conn,$data[5])."',
				 record_date='".date("Y-m-d",strtotime($data[13]))."',
				 ex_date='".date("Y-m-d",strtotime($data[14]))."',
				 modify_date='".date("Y-m-d",strtotime($data[15]))."'
				 ,identifier_name='".mysqli_real_escape_string($conn,$data[8])."',
				 identifier='".mysqli_real_escape_string($conn,$data[9])."',
				 symbol='".mysqli_real_escape_string($conn,$data[18])."',
				 country_code='".mysqli_real_escape_string($conn,$data[19])."',
				 currency='".mysqli_real_escape_string($conn,$data[10])."' where action_id='".$data['4']."' ";
				  if ($conn->query($sqlupdate) === TRUE) {
					 echo "updated-".$date."-".$row['id']."\n"; 
				  
$dataArray=array();				
				$id=$row['id'];
for($i=21;$i<=20+($data[20]*2);$i=$i+2)
{


	$name=mysqli_real_escape_string($conn,$data[$i]);
	$value=mysqli_real_escape_string($conn,$data[$i+1]);
$dataArray[]="('".$data[4]."','".$id."','".$name."','".$value."')";	
}
if(!empty($dataArray))
{$sql1 = "INSERT INTO corporate_action_custom(bbg_action_id,corporate_action_id,name,value)
       VALUES ".implode(",",$dataArray).";";
	$conn->query($sql1);
}	
				  
				  
				  }
			}
			 }else{
				echo "skip me-".$date."-".$row['id']."\n";
			}
			
			
			
			}
			}else{
	
			if($data[14]!="N.A.")
				{
			
			 $sql = "INSERT INTO corporate_action(ticker,action_id,dataprovider,name,corporate_action,record_date,ex_date,modify_date,identifier_name,identifier,symbol,country_code,currency)
       VALUES ('".mysqli_real_escape_string($conn,$data[0])."',
	   '".mysqli_real_escape_string($conn,$data[4])."','bloomberg',
	   '".mysqli_real_escape_string($conn,$data[7])."',
	   '".mysqli_real_escape_string($conn,$data[5])."',
	   '".date("Y-m-d",strtotime($data[13]))."',
	   '".date("Y-m-d",strtotime($data[14]))."',
	   '".date("Y-m-d",strtotime($data[15]))."',
	   '".mysqli_real_escape_string($conn,$data[8])."',
	   '".mysqli_real_escape_string($conn,$data[9])."',
	   '".mysqli_real_escape_string($conn,$data[18])."',
	   '".mysqli_real_escape_string($conn,$data[19])."',
	   '".mysqli_real_escape_string($conn,$data[10])."')";
if ($conn->query($sql) == TRUE) {
 $id=$conn->insert_id;
 $dataArray=array();
for($i=21;$i<=20+($data[20]*2);$i=$i+2)
{

	
	$name=mysqli_real_escape_string($conn,$data[$i]);
	$value=mysqli_real_escape_string($conn,$data[$i+1]);
$dataArray[]="('".$data[4]."','".$id."','".$name."','".$value."')";	
}
if(!empty($dataArray))
{$sql1 = "INSERT INTO corporate_action_custom(bbg_action_id,corporate_action_id,name,value)
       VALUES ".implode(",",$dataArray).";";
	$conn->query($sql1);
}	



 
//echo "finish\n";
  echo "New record created successfully-".$date."->".$id."\n";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
				} }
			}




		
		}
	}
}else{
	
	
	mail("dbajpai@indxx.com","File not available on central db ", "CA file not available on central db ".'C:/blp/files/ca_16g.csv.'.$filedate ." of ".date("Y-m-d H:i:s"));
	
}
$conn->close();
}
//exit;
 

 
 
 function copy_file($date)
 {
          
      $path='C:/blp/files/';       



$date=date("Ymd",strtotime($date));
//$date="20160106";
$files="ca_sl.csv.".$date;


	if(file_exists($path.$files))
{	

$fileContents = file_get_contents($path.$files);

$str= get_string_between($fileContents,"START-OF-DATA","END-OF-DATA");

$array=explode("\n",$str);
//print_r($array);
//exit;
unset($array[0]);

$str=implode("\n",$array);
$filename="ca_syntax.csv.".$date;


$myfile = fopen($path.$filename, "w") or die("Unable to open file!");

fwrite($myfile, $str);
fclose($myfile);


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

