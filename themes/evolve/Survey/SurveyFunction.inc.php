<?php
/* Survey Functions - Functional layer */

include('Surveydatabase.inc.php');

function GetGroupList() {
	$arrayIn = forGetGroupList();//returnGetList();
	return $arrayIn;
}
function GetOptionList() {
	$arrayIn = forGetOptionList();//returnGetList();
	return $arrayIn;
}
function UpdateGroupList($action){
	forUpdateGroupList($action);
	
}
function SingleGroup($GID){
	$arraySingle = forSingleGroup($GID);
	return $arraySingle;
	
}
function UpdateQustion($action){
	forUpdateQustion($action);
	
}
?>