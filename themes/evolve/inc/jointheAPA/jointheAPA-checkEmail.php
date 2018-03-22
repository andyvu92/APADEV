<?php 
	//call webservice to check email
	if(isset($_POST['CheckEmailID'])){
		include('sites/all/themes/evolve/inc/Aptify/JSONarray.inc.php');
		$postEmail = $_POST['CheckEmailID'];
		//$result = GetAptifyData("16", $postEmail);
		//echo $result["Status"]; 
	    $result="true";
		echo $result;	
	} 
?>
