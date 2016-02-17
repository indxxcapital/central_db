<?php
$time_start = microtime(true); 

	//process client request(VIA URL)
	include('function.php');
	authanticate();
	if(!empty($_GET)){
     $name1=$_GET['name'];
	 $name=explode(",",$name1);	
	 $output=array();
	foreach($name as $isin){
	$output[$isin]=get_lastprice2($isin);
	}
	$conn->close();
	 


	if($_GET['type1']=="JSON"){
header("Content_Type:application/json");
 if(empty($output)){
	 
	 $response=array();
			 $response['outcome']='false';
			 $response['authorized']='true';
			 $response['message']="0 Records found.";
			 $response['identity']="All Active Currency";
			 $response['delay']=microtime(true)-$time_start;
			 
	 
		 deliver_response(200,$response,NULL);
		 }
		 else{
			 
			 $response=array();
			 $response['outcome']='true';
			 $response['authorized']='true';
			 $response['message']=count($output)." Records found.";
			 $response['identity']="All Active Currency";
			 $response['delay']=microtime(true)-$time_start;
			 
			 
			 
			   deliver_response(200,$response,$output);
			 } 
	}
	elseif($_GET['type1']=="XML"){
	 header('Content-type: text/xml');
	 
	 
 $xml_data = new SimpleXMLElement('<?xml version="1.0"?><output></output>');
 //$xml_data->addChild("status");
		if(!empty($output)){
				 $response=array();
			 $response['outcome']='true';
			 $response['authorized']='true';
			 $response['message']=count($output)." Records found.";
			 $response['identity']="All Active Currency";
			 $response['delay']=microtime(true)-$time_start;
// function call to convert array to xml
$output1['status']=$response;
$output1['data']=$output;

array_to_xml($output1,$xml_data);
		}else{
				 $response=array();
			 $response['outcome']='false';
			 $response['authorized']='true';
			 $response['message']="0 Records found.";
			 $response['identity']="All Active Currency";
			 $response['delay']=microtime(true)-$time_start;
			$output1['status']=$response;
				$output1['data']=NULL;
			array_to_xml($output1,$xml_data);
		
		}
		
//saving generated xml file; 
$result = $xml_data->asXML();
		print $result;	 
	}
	
	}
	
	


?>