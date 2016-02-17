 <?php

	//process client request(VIA URL)
	include('function.php');
  
//header('Content-type: text/xml');

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