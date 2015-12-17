<?php
// ini_set('display_errors', 1);
// Load composer framework
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
	require(__DIR__ . '/vendor/autoload.php');
}
// use phpWhois\Whois;
// ini_set('display_errors', 1);

$whois = new Whois();
$query = $_POST['query'];
$result = $whois->lookup($query,false);
echo json_encode($result);
?>