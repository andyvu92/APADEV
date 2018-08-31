<?php
include('sites/all/themes/evolve/inc/Aptify/AptifyAPI.inc.php');

/**
 *  GetData, whichever form they are.
 *  open to public
 */
function GetAptifyData($TypeAPI, $ArrayIn) {
	// Array to JSON
	$arrayToJson = JSONArrayConverter("toJSON", $ArrayIn);
	// pass array and JSON version together and use them as needed.
	$jsonreturn = AptifyAPI($TypeAPI, $ArrayIn, $arrayToJson);
	if($TypeAPI == "10") {
		//echo $jsonreturn;
	/*	
	echo "<br><br><br><br>";
	$image = new \imagick($jsonreturn);
	header("Content-Type: image/jpg");
	echo $image->getImageBlob();
	echo "<br><br><br><br>";
	$fp = fopen(__DIR__ . '/../json/image.png', 'X');
    $test = fwrite($fp, $jsonreturn);
	var_dump($test);
	fclose($fp);
	*/
	}
	//echo "<br>".$TypeAPI."<br>";
	if($TypeAPI == "2" || $TypeAPI == "3" || $TypeAPI == "18" || $TypeAPI == "38") {
		return $jsonreturn[0];
	} else {
		logTransaction($jsonreturn[1],$arrayToJson,$jsonreturn[0]);
	}
    return JSONArrayConverter("toArray", $jsonreturn[0]);
	
	
}

/**
 *  Conversion begin!
 *  Private function
 */
function JSONArrayConverter($type, $Input) {
	if($type == "toArray") {
		return $results = json_clean_decode($Input, true);
	} else {
		return $results = json_encode($Input, true);
	}
}
function json_clean_decode($json, $assoc = false, $depth = 512, $options = 0) {
	// search and remove line space \r\n and tabs \t
	$json = preg_replace("!\r?\n!", "", $json);
	$json = preg_replace("!\t!", " ", $json);
	$json = preg_replace("/&nbsp;/", " ", $json);
	$json = json_decode($json, $assoc);
	return $json;
}

?>