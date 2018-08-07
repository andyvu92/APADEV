<?php

function curlRequest($API) {
	// create curl resource 
	$ch = curl_init(); 
	// set url 
	$urlcurl = $API;
	curl_setopt($ch, CURLOPT_URL, $urlcurl); 
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
	
	//return the transfer as a string 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
	curl_setopt($ch, CURLOPT_ENCODING, "");
	curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
	curl_setopt($ch, CURLOPT_TIMEOUT, 300000000);
	curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	
	$JSONreturn = curl_exec($ch);
	if(curl_error($ch))
	{
		//echo 'error:' . curl_error($ch);
		return curl_error($ch);
	}
	////echo $JSONreturn.'this is call from Aptify';
	// close curl resource to free up system resources 
	curl_close($ch);
	return $JSONreturn;
}

function json_clean_decode($json, $assoc = false, $depth = 512, $options = 0) {
	// search and remove line space \r\n and tabs \t
	$json = preg_replace("!\r?\n!", "", $json);
	$json = preg_replace("!\t!", " ", $json);
	$json = preg_replace("/&nbsp;/", " ", $json);
	$json = json_decode($json, $assoc);
	return $json;
}

function getDropdown(){
	$API = 'https://aptifyweb.australian.physio/AptifyServicesAPI/services/GetOptionValues';
	$resultt = curlRequest($API);
	$result = json_clean_decode($resultt, true);
	
	// write Country json file
	foreach($result['Country']  as $lines){
		$ID = $lines['ID'];
		$Country = $lines['Country'];
		$TelephoneCode = $lines['TelephoneCode'];
		$arrayCountry[] = array('ID'=>$ID, 'Country'=>$Country, 'TelephoneCode'=>$TelephoneCode);	
    }
	$response= $arrayCountry;
	$fp = fopen(__DIR__ . '/../json/Country.json', 'w');
    $test = fwrite($fp, json_encode($response));
	fclose($fp);
	// write State json file
	foreach($result['State']  as $lines){
		if($lines['CountryID'] == "14"){
			$ID = $lines['ID'];
			$Abbreviation = $lines['Abbreviation'];
			$FullName = $lines['FullName'];
			$CountryID = $lines['CountryID'];
			$arrayState[] = array('ID'=>$ID, 'Abbreviation'=>$Abbreviation, 'FullName'=>$FullName,'CountryID'=>$CountryID);	
		}
	}
	$response= $arrayState;
	$fp = fopen(__DIR__ . '/../json/State.json', 'w');
    $test = fwrite($fp, json_encode($response));
	fclose($fp);
	// write MemberType json file
	foreach($result['MemberType']  as $lines){
		$ID = $lines['ID'];
		$Name = $lines['Name'];
		$ProductID = $lines['ProductID'];
		$arrayMemberType[] = array('ID'=>$ID, 'Name'=>$Name, 'ProductID'=>$ProductID);	
    }
	$response= $arrayMemberType;
	$fp = fopen(__DIR__ . '/../json/MemberType.json', 'w');
    $test = fwrite($fp, json_encode($response));
	fclose($fp);
	// write MemberStatusType json file
	foreach($result['MemberStatusType']  as $lines){
		$ID = $lines['ID'];
		$Name = $lines['Name'];
		$arrayMemberStatusType[] = array('ID'=>$ID, 'Name'=>$Name);	
    }
	$response= $arrayMemberStatusType;
	$fp = fopen(__DIR__ . '/../json/MemberStatusType.json', 'w');
    $test = fwrite($fp, json_encode($response));
	fclose($fp);
	// write Prefix json file
	foreach($result['Prefix']  as $lines){
		$ID = $lines['ID'];
		$Prefix = $lines['Prefix'];
		$arrayPrefix[] = array('ID'=>$ID, 'Prefix'=>$Prefix);	
    }
	$response= $arrayPrefix;
	$fp = fopen(__DIR__ . '/../json/Prefix.json', 'w');
    $test = fwrite($fp, json_encode($response));
	fclose($fp);
	// write NationalGroup__c json file
	foreach($result['NationalGroup__c']  as $lines){
		$ID = $lines['ID'];
		$Name = $lines['Name'];
		$IsActive = $lines['IsActive'];
		$ProductID = $lines['ProductID'];
		$arrayNationalGroup__c[] = array('ID'=>$ID, 'Name'=>$Name, 'IsActive'=>$IsActive, 'ProductID'=>$ProductID);	
    }
	$response= $arrayNationalGroup__c;
	$fp = fopen(__DIR__ . '/../json/NationalGroup__c.json', 'w');
    $test = fwrite($fp, json_encode($response));
	fclose($fp);
	// write AreaOfInterest__c json file
	foreach($result['AreaOfInterest__c']  as $lines){
		$ID = $lines['ID'];
		$Name = $lines['Name'];
		$IsActive = $lines['IsActive'];
		$Code = $lines['Code'];
		$arrayAreaOfInterest__c[] = array('ID'=>$ID, 'Name'=>$Name, 'IsActive'=>$IsActive,'Code'=>$Code);	
    }
	$response= $arrayAreaOfInterest__c;
	$fp = fopen(__DIR__ . '/../json/AreaOfInterest__c.json', 'w');
    $test = fwrite($fp, json_encode($response));
	fclose($fp);
	// write PaymentType json file
	foreach($result['PaymentType']  as $lines){
		if($lines['ID'] != "9"){
			$ID = $lines['ID'];
			$Name = $lines['Name'];
			$arrayPaymentType[] = array('ID'=>$ID, 'Name'=>$Name);	
		}
    }
	$response= $arrayPaymentType;
	$fp = fopen(__DIR__ . '/../json/PaymentType.json', 'w');
    $test = fwrite($fp, json_encode($response));
	fclose($fp);
	// write Language json file
	foreach($result['Language']  as $lines){
		$ID = $lines['ID'];
		$Name = $lines['Name'];
		$arrayLanguage[] = array('ID'=>$ID, 'Name'=>$Name);	
    }
	$response= $arrayLanguage;
	$fp = fopen(__DIR__ . '/../json/Language.json', 'w');
    $test = fwrite($fp, json_encode($response));
	fclose($fp);
	// write NumberOfHours json file
	foreach($result['NumberOfHours']  as $lines){
		$ID = $lines['ID'];
		$Name = $lines['Name'];
		$arrayNumberOfHours[] = array('ID'=>$ID, 'Name'=>$Name);	
    }
	$response= $arrayNumberOfHours;
	$fp = fopen(__DIR__ . '/../json/NumberOfHours.json', 'w');
    $test = fwrite($fp, json_encode($response));
	fclose($fp);
	// write WorkPlaceSettings json file
	foreach($result['WorkPlaceSettings']  as $lines){
		$ID = $lines['ID'];
		$Name = $lines['Name'];
		$IsActive = $lines['IsActive'];
		$IsPublic = $lines['IsPublic'];
		$arrayWorkPlaceSettings[] = array('ID'=>$ID, 'Name'=>$Name, 'IsActive'=>$IsActive, 'IsPublic'=>$IsPublic);	
    }
	$response= $arrayWorkPlaceSettings;
	$fp = fopen(__DIR__ . '/../json/WorkPlaceSettings.json', 'w');
    $test = fwrite($fp, json_encode($response));
	fclose($fp);
	// write Educationdegree json file
	foreach($result['Educationdegree']  as $lines){
		$ID = $lines['ID'];
		$Name = $lines['Name'];
		$arrayEducationdegree[] = array('ID'=>$ID, 'Name'=>$Name);	
    }
	$response= $arrayEducationdegree;
	$fp = fopen(__DIR__ . '/../json/Educationdegree.json', 'w');
    $test = fwrite($fp, json_encode($response));
	fclose($fp);
	// write Aboriginal json file
	foreach($result['Aboriginal']  as $lines){
		$ID = $lines['ID'];
		$Name = $lines['Name'];
		$arrayAboriginal[] = array('ID'=>$ID, 'Name'=>$Name);	
    }
	$response= $arrayAboriginal;
	$fp = fopen(__DIR__ . '/../json/Aboriginal.json', 'w');
    $test = fwrite($fp, json_encode($response));
	fclose($fp);
	// write Dietary json file
	foreach($result['Dietary']  as $lines){
		$ID = $lines['ID'];
		$Name = $lines['Name'];
		$arrayDietary[] = array('ID'=>$ID, 'Name'=>$Name);	
    }
	$response= $arrayDietary;
	$fp = fopen(__DIR__ . '/../json/Dietary.json', 'w');
    $test = fwrite($fp, json_encode($response));
	fclose($fp);
	// write Gender json file
	foreach($result['Gender']  as $lines){
		$ID = $lines['ID'];
		$Name = $lines['Description'];
		$arrayGender[] = array('ID'=>$ID, 'Description'=>$Name);	
    }
	$response= $arrayGender;
	$fp = fopen(__DIR__ . '/../json/Gender.json', 'w');
    $test = fwrite($fp, json_encode($response));
	fclose($fp);
	// write Branch json file
	foreach($result['Branch']  as $lines){
		$ID = $lines['ID'];
		$Abbreviation = $lines['Abbreviation'];
		$FullName = $lines['FullName'];
		$arrayBranch[] = array('ID'=>$ID, 'Abbreviation'=>$Abbreviation, 'FullName'=>$FullName);	
    }
	$response= $arrayBranch;
	$fp = fopen(__DIR__ . '/../json/Branch.json', 'w');
    $test = fwrite($fp, json_encode($response));
	fclose($fp);
	// write University json file
	foreach($result['University']  as $lines){
		$ID = $lines['ID'];
		$Name = $lines['Name'];
		$arrayUniversity[] = array('ID'=>$ID, 'Name'=>$Name);	
    }
	$response= $arrayUniversity;
	$fp = fopen(__DIR__ . '/../json/University.json', 'w');
    $test = fwrite($fp, json_encode($response));
	fclose($fp);
}
getDropdown();
?>