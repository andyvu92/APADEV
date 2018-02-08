<?php
include('sites/all/themes/evolve/inc/Aptify/AptifyAPI.inc.php');
/**
 *  GetData, whichever form they are.
 *  open to public
 */
function GetAptifyData($TypeAPI, $ArrayIn) {
	// Array to JSON
	$json = JSONArrayConverter("toArray",$ArrayIn);
	$json2 = AptifyAPI($TypeAPI, $json);
	return JSONArrayConverter("toJSON", $json2);
}

/**
 *  Conversion begin!
 *  Private function
 */
function JSONArrayConverter($type, $Input) {
	if($type == "toArray") {
		return $results = json_encode($Input, true);
	} else {
		return $results = json_decode($Input, true);
	}
}
?>