<?php

$output=array();

if(!isset($_POST['query']))
{
	return json_encode($output);
}

$host=$_POST['query'];


function file_get_contents_curl($url)
{
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

	$data = curl_exec($ch);
	curl_close($ch);

	return $data;
}

$html = file_get_contents_curl($host);

//parsing begins here:
$doc = new DOMDocument();
@$doc->loadHTML($html);

$nodes = $doc->getElementsByTagName('title');
//get and display what you need:
if($nodes->item(0)->nodeValue)
{
	$output['Title'] = $nodes->item(0)->nodeValue;	
}


$metas = $doc->getElementsByTagName('meta');
for ($i = 0; $i < $metas->length; $i++)
{
	$meta = $metas->item($i);
	if($meta->getAttribute('name') == 'description')
		$output['Description'] = $meta->getAttribute('content');
	if($meta->getAttribute('name') == 'keywords')
		$output['Keywords'] = $meta->getAttribute('content');
}


$fbUrlCheck = '/^(https?:\/\/)?(www\.)?facebook.com\/[a-zA-Z0-9(\.\?)?]/';
$twUrlCheck = '/^(https?:\/\/)?(www\.)?twitter.com\/[a-zA-Z0-9(\.\?)?]/';
$facebook_profile=null;
$twitter_profile=null;

$xpath = new DOMXpath($doc);

$nodes = $xpath->query('//a');

foreach($nodes as $node) {
	if(preg_match($fbUrlCheck, $node->getAttribute('href')) == 1)
	{
		$output['Facebook']=$node->getAttribute('href');
	}
	if(preg_match($twUrlCheck, $node->getAttribute('href')) == 1)
	{
		$output['Twitter']=$node->getAttribute('href');
	}
}
echo json_encode($output);
?>