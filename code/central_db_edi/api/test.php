<?php
      $url1="http://localhost:443/Restused/book.php";
                $data = "<books>
<book><name>Book3</name><author>Auth3</author><isbn>ISBN0003</
isbn></book></books>";
               
		 $client=curl_init();
                 curl_setopt($client, CURLOPT_URL, $url1);
		 curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
                curl_setopt($client,CURLOPT_POST,true);
              curl_setopt($client, CURLOPT_POSTFIELDS, $data);
		$response=curl_exec($client);
                curl_close($client);
                
                
                
 
               // $result=json_decode($response);
                //echo "Price of book is:".$result->data;
                echo $response;
	

?>