<?php
/* Survey Functions - Functional layer */

include('Surveydatabase.inc.php');

function GetGroupList() {
	$arrayIn = forGetGroupList();//returnGetList();
	return $arrayIn;
}

?>