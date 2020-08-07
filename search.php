<?php
include('main.php');
$q = $_GET['q'];

$qu = urlencode($q);

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET,POST');
header('Access-Control-Allow-Headers: X-Requested-With');

$file = file_get_contents('https://gsearch.gaana.com/gaanasearch-api/mobilesuggest/autosuggest-lite-vltr-ro?geoLocation=IN&query='.$qu.'&content_filter=2&include=track&isRegSrch=0%20&webVersion=mix&rType=web&usrLang=All&isChrome=');

$de = json_decode($file, true);
$tracks = $de['gr'][0]['gd'][0];

$arr = array();


$title = $tracks['ti'];
$thumb = $tracks['aw'];
$id = $tracks['seo'];

$data = array("Title"=>"$title", "Pic_URL"=>"$thumb", "Main_URL"=>main($title,$id));

$re[] = $data;


header('Content-Type: application/json');

echo json_encode($re,JSON_PRETTY_PRINT);

?>
