<?php
include('sites/all/themes/evolve/inc/Aptify/AptifyAPI.inc.php');
/**
 *  GetData, whichever form they are.
 *  open to public
 */
function GetAptifyData($TypeAPI, $ArrayIn) {
	// Array to JSON
	// use this code under for later.
	// we need to pass array for now :)
	/*
	$json = JSONArrayConverter("toArraytoJSON",$ArrayIn);
	$json2 = AptifyAPI($TypeAPI, $json);
	return JSONArrayConverter("toArray", $json2);
	*/
	$tt = AptifyAPI($TypeAPI, $ArrayIn);
	return JSONArrayConverter("toArray", $tt);
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