<?php

  if(isset($_POST['CheckEmailID'])){
  //include('sites/all/themes/evolve/inc/Aptify/JSONarray.inc.php');
  //https://aptifywebtest.australian.physio/AptifyServicesAPI/services/VerifyUserName/
	$postEmail['ID'] = $_POST['CheckEmailID'];
	// create curl resource
  $ch = curl_init();
  $base_url = variable_get('aptify_api_base_url', APTIFY_API_BASE_URL_DEFAULT);
  $urlcurl = $base_url ."/VerifyUserName/".$postEmail['ID'];
	// set url
    curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_URL, $urlcurl);
    curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS,null);
	//return the transfer as a string
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
	curl_setopt($ch, CURLOPT_ENCODING, "");
	curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$JSONreturn = curl_exec($ch);
	if(curl_error($ch))
	{
		echo 'error:' . curl_error($ch);
		return curl_error($ch);
	}
	curl_close($ch);
	$result = json_decode($JSONreturn, true);
	echo $result["response"];

  }
?>
