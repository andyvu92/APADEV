<?php
include('sites/all/themes/evolve/inc/Aptify/AptifyAPI.inc.php');
include('sites/all/themes/evolve/inc/Aptify/AptifyAPI2.inc.php');
/**
 *  GetData, whichever form they are.
 *  open to public
 */
function GetAptifyData($TypeAPI, $ArrayIn) {
	// Array to JSON
	$arrayToJson = JSONArrayConverter("toJSON", $ArrayIn);
	// pass array and JSON version together and use them as needed.
	$jsonreturn = AptifyAPI($TypeAPI, $ArrayIn, $arrayToJson);
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