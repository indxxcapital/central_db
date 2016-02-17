<pre><?php 
$type="XML";
$url="http://104.130.29.253/central_db/api/getallca.php?name=UCG%20IM%20Equity&type1=XML&authcode=INDXX:931";
$array=array();
if($type=="XML")
{
	$xml = simplexml_load_string(file_get_contents($url));
$json = json_encode($xml);
$array = json_decode($json,TRUE);
}


if($type=="JSON")
{
	$data = file_get_contents($url);

$array = json_decode($data,TRUE);
}


print_r($array);

?>