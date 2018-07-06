<?php
$stateArray = array();
if(isset($_POST['Country'])){
	//$statecode = file_get_contents("sites/all/themes/evolve/json/State.json");
    //$State     = json_decode($statecode, true);
	$State = $_SESSION['State'];
	$country = $_SESSION['country'];
	//$State = json_decode($_POST['sessionState']);
	//$country = json_decode($_POST['sessionCountry']);
	$postCountry = $_POST['Country'];
	//$countrycode = file_get_contents("sites/all/themes/evolve/json/Country.json");
    //$country     = json_decode($countrycode, true);
	$country = $_SESSION['country'];
	foreach ($country as $key => $value) {
		if($country[$key]['Country']==$postCountry){ 
			$countryID = $country[$key]['ID'] 
		}
	}
	foreach ($State as $key => $value) {
		if($State[$key]['CountryID']==$countryID){ 
		    $ID = $State[$key]['ID'];
			$Abbreviation = $State[$key]['Abbreviation'];
			$FullName = $State[$key]['FullName'];
			$CountryID = $State[$key]['CountryID'];
			$tempArray[] = array('ID'=>$ID, 'Abbreviation'=>$Abbreviation, 'FullName'=>$FullName,'CountryID'=>$CountryID);	
		}
		array_push($stateArray, $tempArray); 
	}
	
	echo $stateArray;	
	
  }
?>
