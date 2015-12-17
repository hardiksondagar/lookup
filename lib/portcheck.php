<?php
$output=array();
if(!isset($_POST['query']))
{
	
	return json_encode($output);
}
$host=$_POST['query'];
$ports = array(25, 80, 81, 110, 443, 3306);
foreach ($ports as $port)
{
	$connection = fsockopen($host, $port, $errno, $errstr, 0.2);
	if (is_resource($connection))
	{
		$output[$port]=array('is_open'=>true,'name'=> getservbyport($port, 'tcp'));
	}
	else
	{
		$output[$port]=array('is_open'=>false,'name'=> getservbyport($port, 'tcp'));
	}
	fclose($connection);
}
echo json_encode($output);
?>

