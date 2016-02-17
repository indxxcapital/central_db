<?php

	//process client request(VIA URL)
	include('function.php');
 
if($_GET['type1']=="JSON"){
//header("Content_Type:application/json");

 if(!empty($_GET['name'])){
	 $name=$_GET['name'];
	
	 $data=get_ticker($name);
	 $row = $data->fetch_row();
	
	 if(empty($row)){
		 deliver_response(200,"file not found",NULL);
		 }
		 else{
			   deliver_response(200,"file  found",$row);
			 } 
}}

	 function deliver_response($status,$status_message,$row){
		 header("HTTP/1.1 $status $status_message");
		 $response['status']=$status;
		 $response['status_msg']=$status_message;
		 $response['data']=$row;
		$json_response=json_encode($response);
		echo $json_response;
		 }


if($_GET['type1']=="XML"){
if(!empty($_GET['name'])){
	$name=$_GET['name'];
	 $data=get_ticker($name);
	 
	

 
	 $posts = array();
	if(mysqli_num_rows($data)) {
		
 
		while($post = mysqli_fetch_assoc($data)) {
			$posts[] = array('post'=>$post);
			
		}
	}


	 header('Content-type: text/xml');
	
/* echo '<ISINS>';
		foreach($posts as $index => $post) {
			if(is_array($post)) {
				foreach($post as $key => $value) {
					echo '<',$key,'>';
					if(is_array($value)) {
						foreach($value as $tag => $val) {
							echo '<',$tag,'>',htmlentities($val),'</',$tag,'>';
						}
					}
					echo '</',$key,'>';
				}
			}
		}
		echo '</ISINS>'; */
		 $xml_data = new SimpleXMLElement('<?xml version="1.0"?><data></data>');

// function call to convert array to xml
array_to_xml($posts,$xml_data);

//saving generated xml file; 
$result = $xml_data->asXML();
		print $result;
}
}

?>