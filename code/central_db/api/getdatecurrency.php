<?php
$time_start = microtime(true); 

	//process client request(VIA URL)
	include('function.php');
	authanticate();
	if(!empty($_GET)){
      $name=$_GET['name'];
     $date=$_GET['date'];  	
	 $data=get_datecurr($name,$date);
	 $publishdata=array();
	if(mysqli_num_rows($data)) {
		
 
		while($post = mysqli_fetch_assoc($data)) {
	///print_r($post);
	$publishdata[str_replace(" ","_",$post['base_currency'])]=$post;	
			
			//
		}
		//$posts[] = array('post'=>$publishdata);
			
	}
		//$posts[] = array('post'=>$publishdata);
			
		 
mysqli_free_result($data);

	if($_GET['type1']=="JSON"){
header("Content_Type:application/json");
 if(empty($publishdata)){
	 
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
			 $response['message']=count($publishdata)." Records found.";
			 $response['identity']="All Active Currency";
			 $response['delay']=microtime(true)-$time_start;
			 
			 
			 
			   deliver_response(200,$response,$publishdata);
			 } 
	}
	elseif($_GET['type1']=="XML"){
	 header('Content-type: text/xml');
	 
	 
 $xml_data = new SimpleXMLElement('<?xml version="1.0"?><output></output>');
 //$xml_data->addChild("status");
		if(!empty($publishdata)){
				 $response=array();
			 $response['outcome']='true';
			   $response['authorized']='true';
			 $response['message']=count($publishdata)." Records found.";
			 $response['identity']="All Active Currency";
			 $response['delay']=microtime(true)-$time_start;
// function call to convert array to xml
$output['status']=$response;
$output['data']=$publishdata;

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
	
	}
	
	


?>