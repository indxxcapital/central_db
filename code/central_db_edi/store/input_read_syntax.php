<?php

 //$date=date("Ymd",strtotime(date("Y-m-d"))-86400);
	$date = '2015-12-03';
	// End date
	         
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






function get_string_between($string, $start, $end){
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}


?>