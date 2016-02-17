<?php
$time_start = microtime(true); 

	//process client request(VIA URL)
	include('function.php');
authanticate();
	//echo $dbname;
	
	if(!empty($_GET)){
		
	 $data=getfuture_ca();

	if($_GET['type1']=="JSON"){
header("Content_Type:application/json");
 if(empty($data)){
	 
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
			 $response['message']=count($data)." Records found.";
			 $response['identity']="All Active Currency";
			 $response['delay']=microtime(true)-$time_start;
			 
			 
			 
			   deliver_response(200,$response,$data);
			 } 
	}
	elseif($_GET['type1']=="XML"){
	 header('Content-type: text/xml');
	 
	 
 $xml_data = new SimpleXMLElement('<?xml version="1.0"?><output></output>');
 //$xml_data->addChild("status");
		if(!empty($data)){
				 $response=array();
			 $response['outcome']='true';
			  $response['authorized']='true';
			 $response['message']=count($data)." Records found.";
			 $response['identity']="All Active Currency";
			 $response['delay']=microtime(true)-$time_start;
// function call to convert array to xml
$output['status']=$response;
$output['data']=$data;

array_to_xml($output,$xml_data);
		}else{
				 $response=array();
			 $response['outcome']='false';
			   $response['authorized']='true';
			 $response['message']="0 Records found.";
			 $response['identity']="All Active Currency";
			 $response['delay']=microtime(true)-$time_start;
			$output['status']=$response;
				$output['data']=NULL;
			array_to_xml($output,$xml_data);
		
		}
		
//saving generated xml file; 
$result = $xml_data->asXML();
		print $result;	 
	}
	unset($data);
	}
	
	


?>