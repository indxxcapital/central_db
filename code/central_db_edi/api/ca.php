<pre><?php
include("db_config.php");
 $date="2015-10-05";
$filedate=date("Ymd",strtotime($date));
$lines = file('C:/blp/files/ca_16g.csv.'.$filedate);
//print_r($lines);

if(!empty($lines))
{foreach($lines as $line)
	{
		$data=array();
		$data=explode("|",$line);
		//
		

		if(count($data)>5)
		{
			
			
			$temp="select id,action_id,modify_date from corporate_action where action_id='".$data[4]."'";
			$tmp=$conn->query($temp);
	  		if ($tmp->num_rows > 0) {
           // output data of each row
           while($row = $tmp->fetch_assoc()){
			   
			  //print_r($row);
			if(strtotime($row['modify_date'])!=strtotime($data[15])){
				 
//delete for $data[4] on corporate_action_custom
				$sqldelet="DELETE FROM corporate_action_custom WHERE bbg_action_id ='".$data[4]."'";
				$conn->query($sqldelet);
				 $sqlupdate="UPDATE corporate_action SET ticker='".$data[0]."', action_id='".$data[4]."',dataprovider='bloomberg',name='".$data[7]."',corporate_action='".$data[5]."',record_date='".date("Y-m-d",strtotime($data[13]))."',ex_date='".date("Y-m-d",strtotime($data[14]))."',modify_date='".date("Y-m-d",strtotime($data[15]))."',identifier_name='".$data[8]."',identifier='".$data[9]."',symbol='".$data[18]."',country_code='".$data[19]."',currency='".$data[10]."'";
				  if ($conn->query($sqlupdate) === TRUE) {
					 //echo "updated!"; 
				  
				  $id=$row['id'];
for($i=21;$i<=20+($data[20]*2);$i=$i+2)
{

	$name=$data[$i];
	$value=$data[$i+1];
	
	$sql1 = "INSERT INTO corporate_action_custom(bbg_action_id,corporate_action_id,name,value)
       VALUES ('".$data[4]."','".$id."','".$name."','".$value."')";
	$conn->query($sql1);
	
}
				  
				  
				  }
			}else{
				echo "skip me";
			}
			
			
			
			}
			}else{
			
			
			 $sql = "INSERT INTO corporate_action(ticker,action_id,dataprovider,name,corporate_action,record_date,ex_date,modify_date,identifier_name,identifier,symbol,country_code,currency)
       VALUES ('".$data[0]."','".$data[4]."','bloomberg','".$data[7]."','".$data[5]."','".date("Y-m-d",strtotime($data[13]))."','".date("Y-m-d",strtotime($data[14]))."','".date("Y-m-d",strtotime($data[15]))."','".$data[8]."','".$data[9]."','".$data[18]."','".$data[19]."','".$data[10]."')";
if ($conn->query($sql) === TRUE) {
 $id=$conn->insert_id;
for($i=21;$i<=20+($data[20]*2);$i=$i+2)
{

	$name=$data[$i];
	$value=$data[$i+1];
	
	$sql1 = "INSERT INTO corporate_action_custom(bbg_action_id,corporate_action_id,name,value)
       VALUES ('".$data[4]."','".$id."','".$name."','".$value."')";
	$conn->query($sql1);
	
}


 
//echo "finish\n";
  echo "New record created successfully"."\n";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
} 
			}
//*/



		
		}
	}
}
$conn->close();
?>