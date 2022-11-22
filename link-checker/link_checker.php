<?php
include('./hoster/uploadedLC.php');

//echo "WORKING...";
$link = $_GET['link'];
$headers = @get_headers($link);
if(strlen($headers[0]) < 1){
	echo "Something went wrong, can't fetch headers";
}
//print_r($headers);
//$page = file_get_contents($link);
function cut_str($str, $left, $right) {
	$str = substr(stristr($str, $left), strlen($left));
	$leftLen = strlen(stristr($str, $right)); 
	$leftLen = $leftLen ? -($leftLen) : strlen($str);
	$str = substr($str, 0, $leftLen);
	return $str;
}

$linkChecker = new UploadedLC($link);

$linkChecker->fetchLinkData();
echo 'File name: '. $linkChecker->getFileName();
echo '<br/>';
echo 'File size: '.$linkChecker->getFileSize();

/*

//$result = explode("filename", $page);
$name = cut_str($page, 'filename">', '</a>');
//print_r($name[1]);

//echo "<p>File name: ".$name."</p>";
$size = cut_str($page, 'font-size:11px;">', '</small>');

$jsonData = ["name" => $name, "size_mb" => $size];
//print_r($cutted);
//echo "<p>File size: ".$size."</p>";
$jsonDataOut = json_encode($jsonData);
header('Content-Type: application/json');
header('Content-Length: '.strlen($jsonDataOut));
echo $jsonDataOut;
header('Connection: close');
die();
//phpinfo();

*/
