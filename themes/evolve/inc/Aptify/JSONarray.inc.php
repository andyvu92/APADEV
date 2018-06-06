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
	logTransaction($TypeAPI,$arrayToJson,$jsonreturn);
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
    return JSONArrayConverter("toArray", $jsonreturn);
}


/**
 *  Conversion begin!
 *  Private function
 */
function JSONArrayConverter($type, $Input) {
	if($type == "toArray") {
		return $results = json_decode($Input, true);
	} else {
		return $results = json_encode($Input, true);
	}
}
?>