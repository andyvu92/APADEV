<?php
if(!function_exists('drupal_session_started'))
{
  die("Unauthorized Access");
}
?>
<?php

//Put filter condition to display member type
$filterMemberProduct = array("10007","10008","10009","9997","10006");
// 2.2.21 - Get Fellowship product
	// Send - 
	// ProductID 
	// Response - UserID & detail data
	$tt["ProductID"] = "";
    $fellowshipProducts = GetAptifyData("21", $tt);
	//$fellow = array_shift($fellowshipProducts);
	foreach ($fellowshipProducts as $fellowshipProduct){
		if($fellowshipProduct['FPid'] !="0"){
			$fellowshipProductID = $fellowshipProduct['ProductID'];
		}
	}
	// 2.2.36 - get workplace settings list
	// Send - 
	// Response - get workplace settings from Aptify via webserice return Json data;
	// stroe workplace settings into the session
	$workplaceSettingscode  = file_get_contents("sites/all/themes/evolve/json/WorkPlaceSettings.json");
	$workplaceSettings=json_decode($workplaceSettingscode, true);	
	$_SESSION["workplaceSettings"] = $workplaceSettings;
    
if(isset($_POST['step1'])) {
	$postData = array();
	if(isset($_SESSION['UserId'])) {$postData['userID'] = $_SESSION['UserId'];}
	if(isset($_POST['Prefix'])){ $postData['Prefix'] = $_POST['Prefix']; }
	if(isset($_POST['Firstname'])){ $postData['Firstname'] = $_POST['Firstname']; }
	if(isset($_POST['Middle-name'])){ $postData['Middle-name'] = $_POST['Middle-name']; }
	if(isset($_POST['Preferred-name'])){ $postData['Preferred-name'] = $_POST['Preferred-name']; }
	if(isset($_POST['Maiden-name'])){ $postData['Maiden-name'] = $_POST['Maiden-name']; } else{ $postData['Maiden-name'] ="";}
	if(isset($_POST['Lastname'])){ $postData['Lastname'] = $_POST['Lastname']; }
	if(isset($_POST['Birth'])){ $postData['birth'] = str_replace("-","/",$_POST['Birth']); }
	if(isset($_POST['Gender'])){ $postData['Gender'] = $_POST['Gender']; }
	if(isset($_POST['country-code'])){ $postData['Home-country-code'] = $_POST['country-code']; }
	if(isset($_POST['area-code'])){ $postData['Home-area-code'] = $_POST['area-code']; }
	if(isset($_POST['phone-number'])){ $postData['Home-phone-number'] = $_POST['phone-number']; }
	if(isset($_POST['Mobile-country-code'])){ $postData['Mobile-country-code'] = $_POST['Mobile-country-code']; }
	if(isset($_POST['Mobile-area-code'])){ $postData['Mobile-area-code'] = $_POST['Mobile-area-code']; } else {$postData['Mobile-area-code'] = "";}
	if(isset($_POST['Mobile-number'])){ $postData['Mobile-number'] = $_POST['Mobile-number']; }
    if(isset($_POST['Aboriginal'])){ $postData['Aboriginal'] = $_POST['Aboriginal']; }
	/***put the logic when post Pobox******/
	/***Updated on 02082018**/
	if($_POST['Pobox']!="") {
			$postData['BuildingName'] =$_POST['Pobox'];
			$postData['Address_Line_1'] ="";
			$postData['Address_Line_2'] ="";
			
	}else {
		$postData['BuildingName'] = $_POST['BuildingName']; 
		$postData['Address_Line_1'] = $_POST['Address_Line_1'];
		$postData['Address_Line_2'] = $_POST['Address_Line_2'];
		
	}
	/*if(isset($_POST['BuildingName'])){ $postData['BuildingName'] = $_POST['BuildingName']; }
	if(isset($_POST['Address_Line_1'])){ $postData['Address_Line_1'] = $_POST['Address_Line_1']; }
	if(isset($_POST['Pobox'])){ $postData['Pobox'] = $_POST['Pobox']; }
	if(isset($_POST['Address_Line_2'])){ $postData['Address_Line_2'] = $_POST['Address_Line_2']; }*/
	if(isset($_POST['Suburb'])){ $postData['Suburb'] = $_POST['Suburb']; }
	if(isset($_POST['Postcode'])){ $postData['Postcode'] = $_POST['Postcode']; }
	if(isset($_POST['State'])){ $postData['State'] = $_POST['State']; }  else {$postData['State'] = "";}
	if(isset($_POST['Country'])){ $postData['Country'] = $_POST['Country']; }
	if(isset($_POST['Status'])){ $postData['Status'] = $_POST['Status']; }
	if(isset($_POST['Specialty'])){ $postData['Specialty'] = $_POST['Specialty']; }

	//change from shipping address to billing address
	if(isset($_POST['Shipping-address-join']) && $_POST['Shipping-address-join']=='1'){ 
	if(isset($_POST['BuildingName'])) {$postData['Billing-BuildingName']  = $_POST['BuildingName']; }
	if(isset($_POST['Address_Line_1'])) {$postData['BillingAddress_Line_1'] = $_POST['Address_Line_1'];} else{$postData['BillingAddress_Line_1'] = "";}
    if(isset($_POST['Address_Line_2'])) {$postData['BillingAddress_Line_2'] = $_POST['Address_Line_2']; } else {$postData['BillingAddress_Line_2'] ="";}
	$postData['Billing-Pobox'] = $_POST['Pobox'];
	$postData['Billing-Suburb'] = $_POST['Suburb'];
	$postData['Billing-Postcode'] = $_POST['Postcode'];
	if(isset($_POST['State'])) {$postData['Billing-State']  = $_POST['State'];} else{$postData['Billing-State']  = "";}
	$postData['Billing-Country'] = $_POST['Country'];
	}else{
		if($_POST['Billing-Pobox']!="") {
			//$postData['Billing-Pobox'] = $_POST['Billing-Pobox'];
			$postData['Billing-BuildingName'] =$_POST['Billing-Pobox'];
			$postData['BillingAddress_Line_1'] ="";
			$postData['BillingAddress_Line_2'] ="";
		}else {
			$postData['Billing-BuildingName'] = $_POST['Billing-BuildingName']; 
			$postData['BillingAddress_Line_1'] = $_POST['Billing-Address_Line_1'];
			$postData['BillingAddress_Line_2'] = $_POST['Billing-Address_Line_2'];
			//$postData['Billing-Pobox'] = "";
		}
	
	$postData['Billing-Suburb'] = $_POST['Billing-Suburb'];
	$postData['Billing-Postcode'] = $_POST['Billing-Postcode'];
	if(isset($_POST['Billing-State'])) {$postData['Billing-State'] = $_POST['Billing-State']; } else{$postData['Billing-State'] ="";}
	$postData['Billing-Country'] = $_POST['Billing-Country'];  
	}
	//Add shipping address & mailing address post data
	/***put the logic when post Shipping-PObox******/
	/***Updated on 02082018**/
	if($_POST['Shipping-PObox']!="") {
			//$postData['Shipping-PObox'] = $_POST['Shipping-PObox'];
			$postData['Shipping-BuildingName'] =$_POST['Shipping-PObox'];
			$postData['Shipping-Address_line_1'] ="";
			$postData['Shipping-Address_line_2'] ="";
			
	}else {
		$postData['Shipping-BuildingName'] = $_POST['Shipping-BuildingName']; 
		$postData['Shipping-Address_line_1'] = $_POST['Shipping-Address_Line_1'];
		$postData['Shipping-Address_line_2'] = $_POST['Shipping-Address_Line_2'];
		//$postData['Shipping-PObox'] = "";
	}
	//if(isset($_POST['Shipping-BuildingName'])){ $postData['Shipping-BuildingName'] = $_POST['Shipping-BuildingName']; }
	//if(isset($_POST['Shipping-Address_Line_1'])){ $postData['Shipping-Address_line_1'] = $_POST['Shipping-Address_Line_1']; }
	//if(isset($_POST['Shipping-Address_Line_2'])){ $postData['Shipping-Address_line_2'] = $_POST['Shipping-Address_Line_2']; }
	//if(isset($_POST['Shipping-PObox'])){ $postData['Shipping-PObox'] = $_POST['Shipping-PObox']; } 
	if(isset($_POST['Shipping-city-town'])){ $postData['Shipping-city-town'] = $_POST['Shipping-city-town']; } 
	if(isset($_POST['Shipping-postcode'])){ $postData['Shipping-postcode'] = $_POST['Shipping-postcode']; } 
	if(isset($_POST['Shipping-State'])){ $postData['Shipping-state'] = $_POST['Shipping-State']; }
	if(isset($_POST['Shipping-country'])){ $postData['Shipping-country'] = $_POST['Shipping-country']; }
	/***put the logic when post Mailing-PObox******/
	/***Updated on 02082018**/
	if($_POST['Mailing-PObox']!="") {
			//$postData['Mailing-PObox'] = $_POST['Mailing-PObox'];
			$postData['Mailing-BuildingName'] =$_POST['Mailing-PObox'];
			$postData['Mailing-Address_line_1'] ="";
			$postData['Mailing-Address_line_2'] ="";
			
	}else {
		$postData['Mailing-BuildingName'] = $_POST['Mailing-BuildingName']; 
		$postData['Mailing-Address_line_1'] = $_POST['Mailing-Address_Line_1'];
		$postData['Mailing-Address_line_2'] = $_POST['Mailing-Address_Line_2'];
		//$postData['Mailing-PObox'] = "";
	}
	//if(isset($_POST['Mailing-BuildingName'])){ $postData['Mailing-BuildingName'] = $_POST['Mailing-BuildingName']; } 
	//if(isset($_POST['Mailing-Address_Line_1'])){ $postData['Mailing-Address_line_1'] = $_POST['Mailing-Address_Line_1']; } 
	//if(isset($_POST['Mailing-Address_Line_2'])){ $postData['Mailing-Address_line_2'] = $_POST['Mailing-Address_Line_2']; } 
	//if(isset($_POST['Mailing-PObox'])){ $postData['Mailing-PObox'] = $_POST['Mailing-PObox']; }
	if(isset($_POST['Mailing-city-town'])){ $postData['Mailing-city-town'] = $_POST['Mailing-city-town']; } 
	if(isset($_POST['Mailing-postcode'])){ $postData['Mailing-postcode'] = $_POST['Mailing-postcode']; }
	if(isset($_POST['Mailing-State'])){ $postData['Mailing-state'] = $_POST['Mailing-State']; } 
	if(isset($_POST['Mailing-country'])){ $postData['Mailing-country'] = $_POST['Mailing-country']; } 
	if(isset($_POST['Memberid'])){ $postData['Memberid'] = $_POST['Memberid']; }
	//if(isset($_POST['Password'])){ $postData['Password'] = $_POST['Password']; }
	if(isset($_POST['MemberType'])){ $postLocalData['MemberType'] = $_POST['MemberType']; }
	if(isset($_POST['Ahpranumber'])){ $postData['Ahpranumber'] = $_POST['Ahpranumber']; }
	if(isset($_POST['Branch'])){ $postData['PreferBranch'] = $_POST['Branch']; }
	
	if(isset($_SESSION['Regional-group'])){ $postData['Regional-group'] = $_SESSION['Regional-group']; } else{ $postData['Regional-group'] ="";}
	if(isset($_POST['Nationalgp'])){ $ngData['Nationalgp'] = $_POST['Nationalgp']; } else{$ngData = array();}
	if(isset($_POST['SpecialInterest'])){ $postData['PSpecialInterestAreaID'] = implode(",",$_POST['SpecialInterest']); }
	
	//if(isset($_POST['Treatmentarea'])){ $postData['Treatmentarea'] = $_POST['Treatmentarea']; }
	if(isset($_POST['MAdditionallanguage'])){ $postData['PAdditionalLanguageID'] = implode(",",$_POST['MAdditionallanguage']); }
	
	if(isset($_POST['Findpublicbuddy'])){ $postData['Findpublicbuddy'] = $_POST['Findpublicbuddy']; } else{ $postData['Findpublicbuddy'] = "False";}
	/*if(isset($_POST['Dietary'])){ 
		$testD['ID']=$_POST['Dietary'];
		$testDietaryArray = array();
		array_push($testDietaryArray, $testD);
		$postData['Dietary'] = $testDietaryArray;
	}*/
	if(isset($Dietary)) {$postData['Dietary'] = $Dietary;} 
	if(isset($_POST['wpnumber']) && $_POST['wpnumber']!="0" ){ 
	$num = $_POST['maxumnumber']; 
	$tempWork = array();
	for($i=0; $i<=$num; $i++){
		$workplaceArray = array();
		if(isset($_POST['WorkplaceID'.$i])){
			$workplaceArray['WorkplaceID'] = $_POST['WorkplaceID'.$i];
			if(isset($_POST['Findabuddy'.$i])) { $workplaceArray['Find-a-buddy'] = $_POST['Findabuddy'.$i];}else{ $workplaceArray['Findabuddy'] = "False";}
			if(isset($_POST['Findphysio'.$i])) { $workplaceArray['Findphysio'] = $_POST['Findphysio'.$i];}else{ $workplaceArray['Findphysio'] = "False";}
			if(isset($_POST['Name-of-workplace'.$i])) { $workplaceArray['Name-of-workplace'] = $_POST['Name-of-workplace'.$i];}
			if(isset($_POST['Workplace-setting'.$i])) { $workplaceArray['Workplace-settingID'] = $_POST['Workplace-setting'.$i];}
			if(isset($_POST['WBuildingName'.$i])) { $workplaceArray['WBuildingName'] = $_POST['WBuildingName'.$i];}
			if(isset($_POST['WAddress_Line_1'.$i])) { $workplaceArray['Address_Line_1'] = $_POST['WAddress_Line_1'.$i];}
			if(isset($_POST['WAddress_Line_2'.$i])) { $workplaceArray['Address_Line_2'] = $_POST['WAddress_Line_2'.$i];}
			if(isset($_POST['Wcity'.$i])) { $workplaceArray['Wcity'] = $_POST['Wcity'.$i];}
			if(isset($_POST['Wpostcode'.$i])) { $workplaceArray['Wpostcode'] = $_POST['Wpostcode'.$i];}
			if(isset($_POST['Wstate'.$i])) { $workplaceArray['Wstate'] = $_POST['Wstate'.$i];}
			if(isset($_POST['Wcountry'.$i])) { $workplaceArray['Wcountry'] = $_POST['Wcountry'.$i];}
			if(isset($_POST['Wemail'.$i])) { $workplaceArray['Wemail'] = $_POST['Wemail'.$i];}
			if(isset($_POST['Wwebaddress'.$i])) { $workplaceArray['Wwebaddress'] = $_POST['Wwebaddress'.$i];}
			if(isset($_POST['WPhoneCountryCode'.$i])) { $workplaceArray['WPhoneCountryCode'] = $_POST['WPhoneCountryCode'.$i];}
			if(isset($_POST['WPhoneAreaCode'.$i])) { $workplaceArray['WPhoneAreaCode'] = $_POST['WPhoneAreaCode'.$i];}
			if(isset($_POST['Wphone'.$i])) { $workplaceArray['WPhone'] = $_POST['Wphone'.$i];}
			if(isset($_POST['WPhoneExtentions'.$i])) { $workplaceArray['WPhoneExtentions'] = $_POST['WPhoneExtentions'.$i];}
			if(isset($_POST['Electronic-claiming'.$i])) { $workplaceArray['Electronic-claiming'] = $_POST['Electronic-claiming'.$i];}else {$workplaceArray['Electronic-claiming']="False";}
			if(isset($_POST['Hicaps'.$i])) { $workplaceArray['Hicaps'] = $_POST['Hicaps'.$i];}else {$workplaceArray['Hicaps']="False";}
			if(isset($_POST['Healthpoint'.$i])) { $workplaceArray['Healthpoint'] = $_POST['Healthpoint'.$i];}else {$workplaceArray['Healthpoint']="False";}
			if(isset($_POST['Departmentva'.$i])) { $workplaceArray['Departmentva'] = $_POST['Departmentva'.$i];}else {$workplaceArray['Departmentva']="False";}
			if(isset($_POST['Workerscompensation'.$i])) { $workplaceArray['Workerscompensation'] = $_POST['Workerscompensation'.$i];}else {$workplaceArray['Workerscompensation']="False";}
			if(isset($_POST['Motora'.$i])) { $workplaceArray['Motora'] = $_POST['Motora'.$i];}else {$workplaceArray['Motora']="False";}
			if(isset($_POST['Medicare'.$i])) { $workplaceArray['Medicare'] = $_POST['Medicare'.$i];}else {$workplaceArray['Medicare']="False";}
			if(isset($_POST['Homehospital'.$i])) { $workplaceArray['Homehospital'] = $_POST['Homehospital'.$i];} else {$workplaceArray['Homehospital']="False";}
			if(isset($_POST['MobilePhysio'.$i])) { $workplaceArray['MobilePhysio'] = $_POST['MobilePhysio'.$i];}else {$workplaceArray['MobilePhysio']="False";}
			if(isset($_POST['Number-worked-hours'.$i])) { $workplaceArray['Number-workedhours'] = $_POST['Number-worked-hours'.$i];}
			if(isset($_POST['WTreatmentarea'.$i])){ $workplaceArray['SpecialInterestAreaID'] = implode(",",$_POST['WTreatmentarea'.$i]); } else { $workplaceArray['SpecialInterestAreaID'] = ""; }
			if(isset($_POST['Additionallanguage'.$i])){ $workplaceArray['AdditionalLanguage'] = implode(",",$_POST['Additionallanguage'.$i]); } else{ $workplaceArray['AdditionalLanguage'] = "";}
			array_push($tempWork, $workplaceArray);
		}
	}
        $postData['Workplaces'] =  $tempWork ;
	}
if(isset($_POST['wpnumber']) == "0"){ $postData['Workplaces'] =array();}
	if(isset($_POST['addtionalNumber'])){
			$n =  $_POST['addtionalNumber'];
			$temp = array();
			for($j=0; $j<$n; $j++){
				$additionalQualifications = array();
				if(isset($_POST['ID'.$j])) { $additionalQualifications['ID'] = $_POST['ID'.$j];}
				if(isset($_POST['University-degree'.$j]) && $_POST['University-degree'.$j]!=""){
					$additionalQualifications['Degree'] = $_POST['University-degree'.$j]; 
					$additionalQualifications['DegreeID'] = "";
				}
				else{
					$additionalQualifications['DegreeID'] = $_POST['Udegree'.$j];
					$additionalQualifications['Degree'] = "";
				}
				if(isset($_POST['Undergraduate-university-name-other'.$j]) && $_POST['Undergraduate-university-name-other'.$j]!=""){
					$additionalQualifications['Institute'] = $_POST['Undergraduate-university-name-other'.$j]; 
					$additionalQualifications['InstituteID'] = "";
				}
				else{
					$additionalQualifications['InstituteID'] = $_POST['Undergraduate-university-name'.$j];
					$additionalQualifications['Institute'] = "";
				}
				if(isset($_POST['Ugraduate-country'.$j])) { $additionalQualifications['Country'] = $_POST['Ugraduate-country'.$j];}
				if(isset($_POST['Ugraduate-yearattained'.$j])) { $additionalQualifications['Yearattained'] = $_POST['Ugraduate-yearattained'.$j];}
				array_push($temp , $additionalQualifications);
			}
			$postData['PersonEducation'] =  $temp ;
	}
    // 2.2.5 - Dashboard - update member detail
	// Send - 
	// UserID 
	// Response - UserID & detail data
	$postData['userID']=$_SESSION['UserId'];$testdata = GetAptifyData("5", $postData);
	unset($_SESSION["Regional-group"]);
	
	 if(isset($_SESSION['UserId'])){$userID = $_SESSION['UserId']; }

	$products = array();
	checkShoppingCart($userID, $type="membership", $productID="");
	checkShoppingCart($userID, $type="MG1", $productID="");
	checkShoppingCart($userID, $type="MG2", $productID="");
	createShoppingCart($userID, $productID =$postLocalData['MemberType'],$type="membership",$coupon="");
	if(sizeof($ngData)!="0"){
	foreach($ngData['Nationalgp'] as $key=>$value){
		array_push($products,$value);
	}
	$type = "NG";
	checkShoppingCart($userID, $type="NG",$productID="");
	
	foreach($products as $key=>$value){
		$productID = $value;
		createShoppingCart($userID, $productID,$type,$coupon="");
	}
	}
	//save fellowship product on APA side
	if(isset($_POST['fap']) && $_POST['fap'] =="1" ) { 
		checkShoppingCart($userID, $type="FP",$productID="");
		createShoppingCart($userID, $fellowshipProductID,$type="FP",$coupon="");
	}
	//save magazine products on APA side
	 /*  there is a question for those two kinds of subscription product, need to know how Aptify organise combination products for "sports and mus"*/
	if(isset($_POST['ngmusculo']) && $_POST['ngmusculo'] =="1"){ 
		checkShoppingCart($userID, $type="MG1",$productID="");
		createShoppingCart($userID, "9978",$type="MG1",$coupon=""); 
	}
	if(isset($_POST['ngsports']) && $_POST['ngsports'] =="1" ) {
		checkShoppingCart($userID, $type="MG2",$productID="");
		createShoppingCart($userID, "9977",$type="MG2",$coupon=""); 
		
	}
	
	nameUpdate($postData['Firstname'], $postData['Preferred-name']);
}   
?> 

<?php 
//get productID list from local database;
/*	function getProduct($userID,$type){
		$arrayReturn = array();
		$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Rkd#!8cd,&ag6e95g9&5192(gb[5g');
		$shoppingcartGet = $dbt->prepare('SELECT * FROM shopping_cart WHERE userID=:userID AND type=:type');
		$shoppingcartGet->bindValue(':userID', $userID);
		$shoppingcartGet->bindValue(':type', $type);
		$shoppingcartGet->execute();
		if($shoppingcartGet->rowCount()>0) { 
			foreach ($shoppingcartGet as $row) {
				array_push($arrayReturn, $row['productID']);
			}
		}	
		$shoppingcartGet = null;
		return $arrayReturn;
	}*/
$userMemberProduct = getProduct($_SESSION['UserId'],"membership");
if(sizeof($userMemberProduct)!=0){ foreach($userMemberProduct as $singProduct) { $_SESSION["MembershipProductID"] = $singProduct;}}
$userNGProduct = getProduct($_SESSION['UserId'],"NG");
if(sizeof($userNGProduct)!=0){$_SESSION['NationalProductID'] = $userNGProduct; }
$userFPProduct = getProduct($_SESSION['UserId'],"FP");
if(sizeof($userFPProduct)!=0){ foreach($userFPProduct as $singFP) { $_SESSION["FPProductID"] = $singFP;}}
$userMGProduct = array();
$userMG1Product = getProduct($_SESSION['UserId'],"MG1");

if(sizeof($userMG1Product)!=0){ 
    array_push($userMGProduct, $userMG1Product); 
	
}
$userMG2Product = getProduct($_SESSION['UserId'],"MG2");

if(sizeof($userMG2Product)!=0){ 
    array_push($userMGProduct, $userMG2Product); 
}
if(sizeof($userMGProduct)==0) {unset($_SESSION["MGProductID"]);}
if(sizeof($userMGProduct)!=0){  $_SESSION["MGProductID"] = $userMGProduct; }


// 2.2.4 - Dashboard - Get member detail
// Send - 
// UserID 
// Response - UserID & detail data

$data = "UserID=".$_SESSION["UserId"];
$details = GetAptifyData("4", $data,"");// #_SESSION["UserID"];
//Get Member Dietary data when member renew a member
if(sizeof($details['Dietary'])!=0){
	$Dietary = array();
	$testDietaryArray = array();
	foreach($details['Dietary'] as $MemberDietary) {
		$testD['ID'] = $MemberDietary['ID'];
		array_push($testDietaryArray, $testD);
	}
	$Dietary = $testDietaryArray;
}
if (!empty($details['Regionalgp'])) { $_SESSION['Regional-group'] = $details['Regionalgp'];}

?>

<form id="your-detail-form" action="renewmymembership" method="POST">
	<input type="hidden" name="step1" value="1"/>
	<input type="hidden" name="insuranceTag" id="insuranceTag"/>
		<div class="down1" <?php if(isset($_POST['step1']) || isset($_POST['step2']) || isset($_POST['stepAdd']) || isset($_POST['step2-1'])|| isset($_POST['goI'])|| isset($_POST['goP'])||isset($_POST['step2-2'])||isset($_POST['step2-3'])||isset($_POST['QOrder']) || isset($_POST["MType"]) || isset($_POST['step2-4']))echo 'style="display:none;"'; else { echo 'style="display:block;"';}?>>
				<div class="row">
					<div class="col-xs-6 col-md-3">
						<label for="prefix">Prefix</label>
						<div class="chevron-select-box">
						<select class="form-control" id="Prefix" name="Prefix">
							<option value="" <?php if (empty($details['Prefix'])) echo "selected='selected'";?> disabled>Please select</option>
						    <?php
							$Prefixcode  = file_get_contents("sites/all/themes/evolve/json/Prefix.json");
							$Prefix=json_decode($Prefixcode, true);							
							foreach($Prefix  as $key => $value){
								echo '<option value="'.$Prefix[$key]['ID'].'"';
								if ($details['Prefix'] == $Prefix[$key]['ID']){ echo "selected='selected'"; } 
								echo '> '.$Prefix[$key]['Prefix'].' </option>';
							}
							?>
						</select>
						</div>
					</div>
					<div class="col-xs-6 col-md-3">
					   <label for="">Given name<span class="tipstyle"> *</span></label>
					   <input type="text" class="form-control"  name="Firstname" <?php if (empty($details['Firstname'])) {echo "placeholder='Given name'";}   else{ echo 'value="'.$details['Firstname'].'"'; }?>>
					</div>
					<div class="col-xs-6 col-md-3">
					   <label for="">Preferred name</label>
					   <input type="text" class="form-control"  name="Preferred-name" <?php if (empty($details['Preferred-name'])) {echo "placeholder='Preferred name'";}   else{ echo 'value="'.$details['Preferred-name'].'"'; }?>>
					</div>
					<div class="col-xs-6 col-md-3">
					   <label for="">Middle name</label>
					   <input type="text" class="form-control" name="Middle-name" <?php if (empty($details['Middle-name'])) {echo "placeholder='Middle name'";}   else{ echo 'value="'.$details['Middle-name'].'"'; }?>>
					</div>
				</div>
				
				<div class="row">
					<!--<div class="col-xs-6 col-md-3">
						<label for="">Maiden name</label>
					   <input type="text" class="form-control" name="Maiden-name" <?php /*if (empty($details['Maiden-name'])) {echo "placeholder='Maiden name'";}   else{ echo 'value="'.$details['Maiden-name'].'"'; }*/?>>
					</div>-->
					<div class="col-xs-6 col-md-3">
					   <label for="">Family name<span class="tipstyle"> *</span></label>
					   <input type="text" class="form-control" name="Lastname" <?php if (empty($details['Lastname'])) {echo "placeholder='Family name'";}   else{ echo 'value="'.$details['Lastname'].'"'; }?>>
					</div>

					<div class="col-xs-6 col-md-3">
                           <label for="">Date of birth<span class="tipstyle"> *</span></label>
                            <div class="dateselect">
                                <div class="chevron-select-box date">
                                    <select class="form-control" id="birthdate" name="birthdate">
                                        <option value="" selected disabled>Date</option>
                                        <?php 
                                            $start_date = 1;
                                            $end_date   = 31;
                                            for( $j=$start_date; $j<=$end_date; $j++ ) {
                                                echo '<option value='.$j.'>'.$j.'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="chevron-select-box month">
                                    <select class="form-control" id="birthmonth" name="birthmonth">
                                        <option value="" selected disabled>Month</option>
                                        <option value="01" >Jan</option>
                                        <option value="02" >Feb</option>
                                        <option value="03" >Mar</option>
                                        <option value="04" >Apr</option>
                                        <option value="05" >May</option>
                                        <option value="06" >Jun</option>
                                        <option value="07" >Jul</option>
                                        <option value="08" >Aug</option>
                                        <option value="09" >Sep</option>
                                        <option value="10" >Oct</option>
                                        <option value="11" >Nov</option>
                                        <option value="12" >Dev</option>
                                    </select>
                                </div>
                                <div class="chevron-select-box year">
                                    <select class="form-control" id="birthyear" name="birthyear">
                                        <option value="" selected disabled>Year</option>
                                        <?php 
                                            $year = date('Y');
                                            $min = $year - 118;
                                            $max = $year;
                                            for( $i=$max; $i>=$min; $i-- ) {
                                                echo '<option value='.$i.'>'.$i.'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
					<div class="col-xs-6 col-md-3">
					    <label for="">Gender<span class="tipstyle"> *</span></label>
						<div class="chevron-select-box">
						<select class="form-control" id="Gender" name="Gender">
						 <option value="" <?php if (empty($details['Gender'])) echo "selected='selected'";?> disabled>Please select</option>
							<?php
								$Gendercode  = file_get_contents("sites/all/themes/evolve/json/Gender.json");
								$Gender=json_decode($Gendercode, true);						
								foreach($Gender  as $key => $value){
									echo '<option value="'.$Gender[$key]['ID'].'"';
									if ($details['Gender'] == $Gender[$key]['ID']){ echo "selected='selected'"; }
								    echo '> '.$Gender[$key]['Description'].' </option>';
								}
							?>
					   </select>
					   </div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-xs-6 col-md-6">
					<label>Aboriginal and Torres Strait Islander origin<span class="tipstyle"> *</span></label>
					<div class="chevron-select-box">   
					<select class="form-control" id="Aboriginal" name="Aboriginal">
							<option value="" <?php if (empty($details['Aboriginal'])) echo "selected='selected'";?> disabled>Please select</option>
						 <?php
									$Aboriginalcode  = file_get_contents("sites/all/themes/evolve/json/Aboriginal.json");
									$Aboriginal=json_decode($Aboriginalcode, true);
									//sort($Aboriginal);									
									foreach($Aboriginal  as $key => $value){
										echo '<option value="'.$Aboriginal[$key]['ID'].'"';
										if ($details['Aboriginal'] == $Aboriginal[$key]['ID']){ echo "selected='selected'"; } 
										echo '> '.$Aboriginal[$key]['Name'].' </option>';
									}
								?>
					   </select>
					   </div>
					</div>
					<div class="col-xs-6">
				<?php  
					if(!empty($details['PAdditionalLanguageID'])) {$PAdditionalLanguageID = explode(",",$details['PAdditionalLanguageID']); } else {$PAdditionalLanguageID =array();}
						
				?>
					<label>Choose the languages you speak</label>
					<div class="plus-select-box">
					<select id="MAdditionallanguage" name="MAdditionallanguage[]" multiple  tabindex="-1" data-placeholder="Choose the languages you speak">
						<?php 
                        $Languagecode  = file_get_contents("sites/all/themes/evolve/json/Language.json");
						$Language=json_decode($Languagecode, true);
						$_SESSION["Language"] = $Language;
						foreach($Language  as $key => $value){
						    echo '<option value="'.$Language[$key]['ID'].'"';
							//if(sizeof($PAdditionalLanguageID)==0 && $Language[$key]["ID"]=="11"){ echo "selected='selected'"; }
							if (in_array( $Language[$key]["ID"],$PAdditionalLanguageID)){ echo "selected='selected'"; } 
							echo '> '.$Language[$key]['Name'].' </option>';
						}
						?>
					</select>
					</div>
				</div>
				</div>
				
				
					<div class="col-xs-6 col-md-6 display-none">
					<select id="Dietary"  name="Dietary[]" data-placeholder="Your dietary requirements..." multiple >
					<?php 
						$Dietarycode  = file_get_contents("sites/all/themes/evolve/json/Dietary.json");
						$Dietary=json_decode($Dietarycode, true);
						foreach($Dietary  as $key => $value){
						echo '<option value="'.$Dietary[$key]['ID'].'"';
						foreach($details['Dietary'] as $MemberDietary) {if ($MemberDietary['ID'] == $Dietary[$key]['ID']){ echo "selected='selected'"; } }
						echo '> '.$Dietary[$key]['Name'].' </option>';
					
						}
					?>
					</select>
					</div>
				
				<div class="row">
					<div class="col-xs-12">
						<span class="light-lead-heading cairo" style="font-weight: 200; margin-bottom: 18px;">Phone numbers:</span>
						<label for="">Please enter at least one phone number</label>
						<span class="text-underline smaller-lead-heading" style="color: #000">Home</span>
					</div>

					<div class="col-xs-6 col-md-3">
						<label for="">Country code</label>
						<div class="chevron-select-box">
						<select class="form-control" id="country-code" name="country-code">
						<?php
							$countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
							$country=json_decode($countrycode, true);
							$countser = 0;							
							foreach($country  as $key => $value){
								echo '<option value="'.$country[$key]['TelephoneCode'].'"';
								if ($details['Home-phone-countrycode'] == preg_replace('/\s+/', '', $country[$key]['TelephoneCode']) && $countser == 0){ 
									echo "selected='selected'"; 
									$countser++;
								}
								elseif(empty($details['Home-phone-countrycode']) && $country[$key]['ID']=="14"){
											echo "selected='selected'";
								}
								echo '> '.$country[$key]['Country'].' </option>';
							}
						?>
						</select>
						</div>
					</div>
					<?php  $_SESSION['country'] =$country;?>
					<div class="col-xs-6 col-md-3">
						<label for="">Area code</label>
						<input type="number" class="form-control" id="area-code" onchange="areaCodeFunction(this.value)" name="area-code" <?php if (empty($details['Home-phone-areacode'])) {echo "placeholder='Area code'";}   else{ echo 'value="'.$details['Home-phone-areacode'].'"'; }?>>
						<div id="areaMessage"></div>
					</div>
					<script>
						function areaCodeFunction(ps){
							if($('#area-code').val().length >= 6){
								$('#areaMessage').html("no more than 5 characters");
								$( "#area-code" ).focus();
								$("#area-code").css("border", "1px solid red");
								$(".join-details-button1").addClass("stop");
								
							}
							else{
								$('#areaMessage').html("");
								$( "#area-code" ).blur();
								$("#area-code").css("border", "");
								$(".join-details-button1").removeClass("stop");
							}					
						}
					</script>
					<div class="col-xs-12 col-md-6">
						<label for="">Phone number<span class="tipstyle"> *</span></label>
						<input type="number" class="form-control" name="phone-number" <?php if (empty($details['Home-phone-number'])) {echo "placeholder='Phone number'";}   else{ echo 'value="'.$details['Home-phone-number'].'"'; }?>>
					</div>
				</div>
				
				<div class="row">
					<div class="col-xs-12">
						<span class="text-underline smaller-lead-heading" style="color: #000">Mobile</span>
					</div>

					<div class="col-xs-6 col-md-3">
						<label for="">Country code</label>
						<div class="chevron-select-box">
						<select class="form-control" id="Mobile-countrycode" name="Mobile-country-code">
						<?php
							$countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
							$country=json_decode($countrycode, true);
							$countser = 0;							
							foreach($country  as $key => $value){
								echo '<option value="'.$country[$key]['TelephoneCode'].'"';
								if ($details['Mobile-country-code'] ==  preg_replace('/\s+/', '', $country[$key]['TelephoneCode'])&& $countser == 0)
									{ 
										echo "selected='selected'"; 
										$countser++;
									} 
								elseif(empty($details['Mobile-country-code']) && $country[$key]['ID']=="14"){
											echo "selected='selected'";
										}
								echo '> '.$country[$key]['Country'].' </option>';
							}
						?>
						</select>
						</div>
					</div>
					<!--<div class="col-xs-6 col-md-3">
						<label for="">Area code</label>
						<input type="text" class="form-control" name="Mobile-areacode" <?php /*if (empty($details['Mobile-area-code'])) {echo "placeholder='Mobile Area code'";}   else{ echo 'value="'.$details['Mobile-area-code'].'"'; }*/?>  maxlength="5">
					</div>-->
					<div class="col-xs-12 col-md-6">
						<label for="">Mobile number<span class="tipstyle"> *</span></label>
						<input type="number" class="form-control" name="Mobile-number" <?php if (empty($details['Mobile-number'])) {echo "placeholder='Mobile number'";}   else{ echo 'value="'.$details['Mobile-number'].'"'; }?>>
					</div>
				</div>

					<div class="col-xs-12"><span class="light-lead-heading cairo">Residential address:</span></div>
				<div class="row">
					<div class="col-xs-12">
					   <label for="">Building name</label>
					   <input type="text" class="form-control"  name="BuildingName" <?php if (empty($details['Unit'])) {echo "placeholder='Building name'";}   else{ echo 'value="'.$details['BuildingName'].'"'; }?>>
					</div>
					</div>
					
					<div class="col-xs-12 col-sm-6 col-md-6">

					   <label for="">PO Box</label>
					   <input type="text" class="form-control" name="Pobox" <?php if (!empty($details['Unit'])) {echo "placeholder='PO box'";}   else{ echo 'value="'.$details['Pobox'].'"'; }?>>

					</div>
					
					<div class="col-xs-12 col-sm-6 col-md-9">
						<label for="">Address line 1<span class="tipstyle pobox-stat"> *</span></label>
						<input type="text" class="form-control"  name="Address_Line_1" id="Address_Line_1" <?php if (empty($details['Unit'])) {echo "placeholder='Address line 1'";}   else{ echo 'value="'.$details['Unit'].'"'; }?>>
					</div>

					<div class="col-xs-12">
						<label for="">Address line 2</label>
						<input type="text" class="form-control" name="Address_Line_2" id="Address_Line_2" <?php if (empty($details['Street'])) {echo "placeholder='Address line 2'";}   else{ echo 'value="'.$details['Street'].'"'; }?>>
					</div>
				
				
				<div class="row">
					<div class="col-xs-6 col-md-3">
					   <label for="">City or town<span class="tipstyle"> *</span></label>
					   <input type="text" class="form-control" name="Suburb" id="Suburb" <?php if (empty($details['Suburb'])) {echo "placeholder='City or town'";}   else{ echo 'value="'.$details['Suburb'].'"'; }?>>
					</div>

					<div class="col-xs-6 col-md-3">
					   <label for="">Postcode<span class="tipstyle"> *</span></label>
					   <input type="number" class="form-control" name="Postcode" id="Postcode" <?php if (empty($details['Postcode'])) {echo "placeholder='Postcode'";}   else{ echo 'value="'.$details['Postcode'].'"'; }?>>
					</div>
					
					<div class="col-xs-6 col-md-3">
					   <label for="">State</label>
					 <div class="chevron-select-box">  
					   <select class="form-control" id="State1" name="State">
					   <option value=""  <?php if (empty($details['State'])) echo "selected='selected'";?> disabled> State </option>
							<?php
							$statecode  = file_get_contents("sites/all/themes/evolve/json/State.json");
							$State=json_decode($statecode, true);						
							foreach($State  as $key => $value){
								//echo '<option class="StateOption'.$State[$key]['CountryID'].'" value="'.$State[$key]['Abbreviation'].'"';
								echo '<option value="'.$State[$key]['Abbreviation'].'"';
								if ($details['State'] == $State[$key]['Abbreviation']){ echo "selected='selected'"; } 
								echo '> '.$State[$key]['Abbreviation'].' </option>';
						    }
						    ?>
					   </select>
					   </div>
					</div>
					
					<div class="col-xs-6 col-md-3">
					   <label for="">Country<span class="tipstyle"> *</span></label>
					 <div class="chevron-select-box">  
					   <select class="form-control" id="Country1" name="Country">
						<?php
                        $countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
						$country=json_decode($countrycode, true);						
						foreach($country  as $key => $value){
						    
							echo '<option class="CountryOption'.$country[$key]['ID'].'" value="'.$country[$key]['Country'].'"';
							if ($details['Country'] == $country[$key]['Country']){ echo "selected='selected'"; } 
							elseif(empty($details['Country']) && $country[$key]['ID']=="14"){
											echo "selected='selected'";
							}
							echo '> '.$country[$key]['Country'].' </option>';
							
						}
						?>
						</select>
						</div>
					</div>
				</div>
				
				<div class="row payment-line flex-column">
					<div class="col-xs-12 col-sm-6">
						<span class="light-lead-heading cairo">Billing address:</span>
					</div>

					<div class="col-xs-12 col-sm-6 align-item-end">
						<input class="styled-checkbox" style="margin-left: 20px" type="checkbox" id="Shipping-address-join" name="Shipping-address-join" value="0" >
						<label class="light-font-weight" for="Shipping-address-join">Use my residential address</label>
					</div>
				</div>

			<div class="row" id="shippingAddress">
				<div class="row">
					<div class="col-xs-12">
					   <label for="">Building name</label>
					   <input type="text" class="form-control"  name="Billing-BuildingName" <?php if (empty($details['Billing-Unit'])) {echo "placeholder='Billing Building Name'";}   else{ echo 'value="'.$details['BuildingName1'].'"'; }?>>
					</div>
				
					<div class="col-xs-12 col-sm-6 col-md-6">
					   <label for="">PO Box</label>
					   <input type="text" class="form-control" name="Billing-Pobox"  <?php if (!empty($details['Billing-Unit'])) {echo "placeholder='PO Box'";}   else{ echo 'value="'.$details['BuildingName1'].'"'; }?>>
					</div>
					
					<div class="col-xs-12 col-sm-6 col-md-9">
					   <label for="">Address line 1<span class="tipstyle billing-pobox-stat"> *</span></label>
					   <input type="text" class="form-control"  name="Billing-Address_Line_1" id="Billing-Address_Line_1" <?php if (empty($details['Billing-Unit']) || $details['Billing-Unit']=="") {echo "placeholder='Billing address line 1'";}   else{ echo 'value="'.$details['Billing-Unit'].'"'; }?>>
					</div>
					
					<div class="col-xs-12">
					   <label for="">Address line 2</label>
					   <input type="text" class="form-control" name="Billing-Address_Line_2" id="Billing-Address_Line_2" <?php if (empty($details['Billing-Street'])) {echo "placeholder='Billing address line 2'";}   else{ echo 'value="'.$details['Billing-Street'].'"'; }?>>
					</div>
				</div>
				
				<div class="row">
					<div class="col-xs-6 col-md-3">
					   <label for="">City or town<span class="tipstyle"> *</span></label>
					   <input type="text" class="form-control" name="Billing-Suburb" id="Billing-Suburb" <?php if (empty($details['Billing-Suburb'])) {echo "placeholder='Billing City/Town'";}   else{ echo 'value="'.$details['Billing-Suburb'].'"'; }?>>
					</div>
					
					<div class="col-xs-6 col-md-3">
					   <label for="">Postcode<span class="tipstyle"> *</span></label>
					   <input type="number" class="form-control" name="Billing-Postcode" id="Billing-Postcode" <?php if (empty($details['Billing-Postcode'])) {echo "placeholder='Billing Postcode'";}   else{ echo 'value="'.$details['Billing-Postcode'].'"'; }?>>
					</div>
					
					<div class="col-xs-6 col-md-3">
					   <label for="">State</label>
					 <div class="chevron-select-box">  
					   <select class="form-control" name="Billing-State" id="State2">
							<option value=""  <?php if (empty($details['Billing-State'])) echo "selected='selected'";?> disabled> State </option>
							<?php 
								$statecode  = file_get_contents("sites/all/themes/evolve/json/State.json");
								$State=json_decode($statecode, true);
								foreach($State  as $key => $value){
								//echo '<option class="StateOption'.$State[$key]['CountryID'].'" value="'.$State[$key]['Abbreviation'].'"';
								echo '<option value="'.$State[$key]['Abbreviation'].'"';
								if ($details['Billing-State'] == $State[$key]['Abbreviation']){ echo "selected='selected'"; } 
								echo '> '.$State[$key]['Abbreviation'].' </option>';
							
								}
							?>
					   </select>
					   </div>
					</div>
					
					<div class="col-xs-6 col-md-3">
					   <label for="">Country<span class="tipstyle"> *</span></label>
					 <div class="chevron-select-box">  
					   <select class="form-control" id="Country2" name="Billing-Country">
							<?php 
							$countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
							$country=json_decode($countrycode, true);
							foreach($country  as $key => $value){
								
								echo '<option class="CountryOption'.$country[$key]['ID'].'" value="'.$country[$key]['Country'].'"';
								if ($details['Billing-Country'] == $country[$key]['Country']){ echo "selected='selected'"; } 
								elseif(empty($details['Billing-Country']) && $country[$key]['ID']=="14"){
											echo "selected='selected'";
								}
								echo '> '.$country[$key]['Country'].' </option>';
							}
							?>
							</select>
							</div>
					</div>
				</div>
			</div>
			<!---Hidden mailing address and shipping address Start from here-->
				<input type="hidden" name="Shipping-BuildingName" value="<?php if (!empty($details['Shipping-unitno'])) {echo $details['Shipping-BuildingName'];}?>">
				<input type="hidden" name="Shipping-Address_Line_1" value="<?php echo $details['Shipping-unitno'];?>">
				<input type="hidden" name="Shipping-Address_Line_2" value="<?php echo $details['Shipping-streetname'];?>">
				<input type="hidden" name="Shipping-PObox" value="<?php if(empty($details['Shipping-unitno'])){echo $details['Shipping-BuildingName'];}?>">
				<input type="hidden" name="Shipping-city-town" value="<?php echo $details['Shipping-city-town'];?>">
				<input type="hidden" name="Shipping-postcode" value="<?php echo $details['Shipping-postcode'];?>">
				<input type="hidden" name="Shipping-State" value="<?php echo $details['Shipping-state'];?>">
				<input type="hidden" name="Shipping-country" value="<?php echo $details['Shipping-country'];?>">
				<input type="hidden" name="Mailing-BuildingName" value="<?php if(!empty($details['Mailing-unitno'])) {echo $details['Mailing-BuildingName'];}?>">
				<input type="hidden" name="Mailing-Address_Line_1" value="<?php echo $details['Mailing-unitno'];?>">
				<input type="hidden" name="Mailing-Address_Line_2" value="<?php echo $details['Mailing-streetname'];?>">
				<input type="hidden" name="Mailing-PObox" value="<?php if(empty($details['Mailing-unitno'])){echo $details['Mailing-BuildingName'];}?>">
				<input type="hidden" name="Mailing-city-town" value="<?php echo $details['Mailing-city-town'];?>">
				<input type="hidden" name="Mailing-postcode" value="<?php echo $details['Mailing-postcode'];?>">
				<input type="hidden" name="Mailing-State" value="<?php echo $details['Mailing-state'];?>">
				<input type="hidden" name="Mailing-country" value="<?php echo $details['Mailing-country'];?>">
			<!---Hidden mailing address and shipping address End here-->
		  <!--<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 form-right">
			 <div class="row form-image">
				<div class="col-lg-12">
				   Upload/change image
				</div>
			 </div>
									   
		  </div>-->
		    <div class="col-xs-12">   <a class="join-details-button1"><span class="dashboard-button-name">Next</span></a></div>
		</div>
		<div class="down2" <?php if(isset($_POST["MType"]))echo 'style="display:block;"'; else { echo 'style="display:none;"';}?>>
			<div class="row">
			<input type="hidden"  name="Status" <?php if (empty($details['Status'])) {echo "value='1'";}   else{ echo 'value="'.$details['Status'].'"'; }?>>
				<div class="col-xs-12 col-md-6">
					<label for="">Member ID (Your email address)<span class="tipstyle"> *</span></label>
					<input type="text" class="form-control" name="Memberid" readonly <?php if (empty($details['Memberid'])) {echo "placeholder='Member no.'";}   else{ echo 'value="'.$details['Memberid'].'"';}?> >
				</div>
				
				<div class="mobile-note">
					<div class="col-xs-12">
						<span class="note-text">Note: </span>to update your email address, please contact the APA member hub via email at <a href="mailto:info@australian.physio" target="_self">info@australian.physio</a> or phone on <a href="tel:1300 306 622" target="_self">1300 306 622</a>.
					</div>
				</div>

				<div class="col-xs-12 col-md-6">
					<label for="">Member Category<span class="tipstyle"> *</span></label>
					<div class="chevron-select-box">
					<select class="form-control" id="MemberType" name="MemberType">
						
						<?php
						// 2.2.31 Get Membership prodcut price
						// Send - 
						// userID & product list
						// Response -Membership prodcut price
						$prodcutArray = array();
						$memberProductsArray['ProductID']=$prodcutArray;
						$memberProdcutID = $memberProductsArray;
						$MemberTypes = GetAptifyData("31", $memberProdcutID);
						$MemberType = unique_multidim_array($MemberTypes,'ProductID'); 					
                        //$MemberTypecode  = file_get_contents("sites/all/themes/evolve/json/MemberType.json");
						//$MemberType=json_decode($MemberTypecode, true);
						foreach($MemberType  as $key => $value){
							if(!in_array($MemberType[$key]['ProductID'],$filterMemberProduct)){
								echo '<option value="'.$MemberType[$key]['ProductID'].'"';
								if(isset($_SESSION["MembershipProductID"])){if ($_SESSION["MembershipProductID"] == $MemberType[$key]['ProductID']){ echo "selected='selected'"; }} 
								//elseif ($details['MemberTypeID'] == $MemberType[$key]['ID']){ echo "selected='selected'"; } 
								echo '> ' .substr($MemberType[$key]['Title'], strpos($MemberType[$key]['Title'],":")+1) . ' ($'.$MemberType[$key]['Price'].') </option>';
							}
						}
					    ?>
					</select>
					</div>
				</div>

				<div class="desktop-note">
					<div class="col-xs-12">
						<span class="note-text">Note: </span>to update your email address, please contact the APA member hub via email at <a href="mailto:info@australian.physio" target="_self">info@australian.physio</a> or phone on <a href="tel:1300 306 622" target="_self">1300 306 622</a>.
					</div>
				</div>
			</div>

			<div class="row" id="ahpblock">
				<div class="col-xs-6 col-md-3">
					<label for="">AHPRA number</label>
					<input type="text" class="form-control" name="Ahpranumber"  <?php if (empty($details['Ahpranumber'])) {echo "placeholder='AHPRA number'";}   else{ echo 'value="'.$details['Ahpranumber'].'"'; }?>>
				</div>
			</div>

			<div class="row">	
				<input type="hidden"  name="Specialty"  <?php   echo 'value="'.$details['Specialty'].'"'; ?>>
				<div class="row">
				<div class="col-xs-12 col-md-6">
					<label for=""><?php if(!empty($details['State'])) {echo "You are in the &nbsp;".$details['State']."&nbsp;Branch ,&nbsp;would you like to add an additional Branch?";} else { echo "Would you like to add an additional Branch?";}?></label>
					<div class="chevron-select-box">
					<select class="form-control" id="Branch" name="Branch">
					<option value="" <?php if(empty($details['PreferBranch'])){ echo "selected";}?> disabled>What additional Branch would you like to join?</option>
						<?php 
							$Branchcode  = file_get_contents("sites/all/themes/evolve/json/Branch.json");
							$Branch=json_decode($Branchcode, true);
							foreach($Branch  as $key => $value){
							echo '<option value="'.$Branch[$key]['Abbreviation'].'"';
							if ($details['PreferBranch'] == $Branch[$key]['Abbreviation']){ echo "selected='selected'"; } 
							echo '> '.$Branch[$key]['FullName'].' </option>';
						
							}
						?>
					</select>
					</div>
				</div>
			
				<div class="col-xs-12">
					<label for="">Choose which National Groups you would like to join:<?php if(isset($_SESSION["NationalProductID"])) { echo "(Add another National Group to your membership)";} ?></label>
					<div class="plus-select-box">
					<select id="Nationalgp" name="Nationalgp[]" multiple data-placeholder="Choose from our 21 National Groups">
					<?php 
						// get national group from Aptify via webserice return Json data;
						// 2.2.19 - get national group
						// Send - 
						// Response - national group
						//$nationalGroupsCode= file_get_contents("sites/all/themes/evolve/json/NationalGroup__c.json");
						//$nationalGroups=json_decode($nationalGroupsCode, true);
						// 2.2.19 - GET list National Group
						// Send - 
						// userID
						// Response -National Group product
						$sendData["UserID"] = $_SESSION['UserId'];
						$nationalGroups = GetAptifyData("19", $sendData);
						sort($nationalGroups);
						
				    ?>
					<?php 
						foreach($nationalGroups as $key=>$value) {
						   echo '<option value="'.$nationalGroups[$key]["ProductID"].'"';
						   if(isset($_SESSION["NationalProductID"])){ if (in_array( $nationalGroups[$key]["ProductID"],$_SESSION["NationalProductID"])){ echo "selected='selected'"; } }
						   //elseif (in_array( $nationalGroups[$key]["ID"],$details['Nationalgp'])){ echo "selected='selected'"; } 
						   echo '> '.$nationalGroups[$key]["NGtitle"]. ' ($'.$nationalGroups[$key]['NGprice'].')  </option>';
						}
						
					?>
					</select>
					</div>
				</div>

				</div>
				<div class="col-xs-12 display-none" id="ngsports"><input class="styled-checkbox" type="checkbox" id="ngsportsbox" name="ngsports" value="0"> <label class="light-font-weight" for="ngsportsbox">Would you like to subscribe to the APA SportsPhysio magazine?</label></div>
				<div class="col-xs-12 display-none" id="ngmusculo"><input class="styled-checkbox" type="checkbox" id="ngmusculobox" name="ngmusculo" value="0"> <label class="light-font-weight" for="ngmusculobox">Would you like to subscribe to the APA InTouch magazine?</label></div>
			</div>

			<div class="row"> 
				<?php  
					if(!empty($details['PSpecialInterestAreaID'])) {$PSpecialInterestAreaID = explode(",",$details['PSpecialInterestAreaID']); } else {$PSpecialInterestAreaID =array();}
				?>
				<div class="col-xs-12">
					<label>Choose as many interest areas as you like from the list below:</label>
					<div class="plus-select-box">
					<select id="interest-area" name="SpecialInterest[]" multiple  tabindex="-1" data-placeholder="Choose interest area...">
					  <?php 
						  // 2.2.37 - get interest area list
                          // Send - 
                          // Response - interest area list
						    $interestAreascode  = file_get_contents("sites/all/themes/evolve/json/AreaOfInterest__c.json");
						    $interestAreas=json_decode($interestAreascode, true);	
							$_SESSION["interestAreas"] = $interestAreas;
						  ?>
						                    
						   <?php 
						     foreach($interestAreas as $key => $value){
								echo '<option value="'.$interestAreas[$key]["ID"].'"';
								if (in_array( $interestAreas[$key]["ID"],$PSpecialInterestAreaID)){ echo "selected='selected'"; } 
								echo '> '.$interestAreas[$key]["Name"].' </option>'; 
								 
							 }
												   
						?>
					</select>
					</div>
					<input type="hidden" name="fapnum" value="<?php //echo sizeof($details['Specialty']);?>">
					<?php if(sizeof($details['PersonSpecialisation'])!=0){
						echo '<input class="styled-checkbox" type="checkbox" id="fap" name="fap">';
						echo '<label class="light-font-weight" style="margin-top: 15px; font-weight: 700;" for="fap">I am part of the Australian College of Physiotherapists</label>';
						echo '<p style="margin-bottom: 0"><span class="note-text">Please note:</span> Ticking this box adds an extra $200 to the price of your membership.
	If you have passed Specialisation, Fellowship by Original Contribution or are
	a Fellow of the Australian College of Physiotherapists, you must tick this box.</p>';
						
						}
					?>	
				</div>

				
			</div>
			<!--
			<div class="row"> 
				<div class="col-lg-3">
				Your treatment area:
				</div>
			</div>
			<div class="row"> 
				<div class="col-lg-6">
				<div class="plus-select-box">	
				<select id="treatment-area" name="Treatmentarea[]" multiple  tabindex="-1" data-placeholder="Choose treatment area...">
					<?php 
					//$interestAreascode  = file_get_contents("sites/all/themes/evolve/json/AreaOfInterest__c.json");
				    //$interestAreas=json_decode($interestAreascode, true);	
					?>
					<?php 
					//foreach($interestAreas  as $key => $value){
						//echo '<option value="'.$interestAreas[$key]["ID"].'"';
						//if (in_array( $interestAreas[$key]["ID"],$details['Treatmentarea'])){ echo "selected='selected'"; } 
						//echo '> '.$interestAreas[$key]["Name"].' </option>'; 
					//}
					?>
					</select>
					</div>
				</div>
			</div>-->

			<div class="col-xs-12">   <a class="join-details-button2"><span class="dashboard-button-name">Next</span></a><a class="your-details-prevbutton2"><span class="dashboard-button-name">Back</span></a></div>
		</div>
       
        <input type="hidden" id="wpnumber" name="wpnumber" value="<?php  if(sizeof($details['Workplaces'])!=0) {$wpnumber =  sizeof($details['Workplaces']); echo  $wpnumber;} else {$wpnumber =0; echo $wpnumber;} ?>"/>
		<input id="maxumnumber" type="hidden" name="maxumnumber" value="<?php  if(sizeof($details['Workplaces'])!=0) {$wpnumber =  sizeof($details['Workplaces']); echo  $wpnumber;} else {$wpnumber =0; echo $wpnumber;} ?>">
		<div class="down3" style="display:none;">
			<!--<div class="row">
				<div class="col-lg-12"> 
					<input class="styled-checkbox" type="checkbox" name="Findpublicbuddy" id="Findpublicbuddy" value="<?php  //echo $details['Findpublicbuddy'];?>" <?php //if($details['Findpublicbuddy']==1){echo "checked";} ?>>
					<label class="light-font-weight" class="light-font-weight" for="Findpublicbuddy"><span class="note-text">NOTE: </span>Please list my details in the public (visbile to other health professionals)</label>
				</div>
			</div>-->
		<ul class="nav nav-tabs" id="tabmenu">
		<?php foreach( $details['Workplaces'] as $key => $value ):  ?>
		<li <?php if($key=='Workplace0') echo 'class ="active" ';?> id="workplaceli<?php echo $key;?>"><a data-toggle="tab" href="#workplace<?php echo $key;?>"><?php $newkey =$key+1; echo "Workplace ".$newkey;?></a><span class="calldeletewp<?php echo $key;?>"></span></li>
		<?php endforeach ?> 
		<?php //if(sizeof($details['Workplaces'])==0):?>
		<!--<li class ="active"><a data-toggle="tab" href="#workplace0"><?php //echo "Workplace1";?></a></li>-->
		<?php //endif; ?>
		</ul>
		<div id="workplaceblocks">
			<?php foreach( $details['Workplaces'] as $key => $value ):  ?>
				<div id="workplace<?php echo $key;?>" class='tab-pane fade <?php if($key=='Workplace0') echo "in active ";?>'> 
				<input type="hidden" name="WorkplaceID<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['WorkplaceID'];?>">

				<div class="col-xs-12 FapTagC">
					<input class="styled-checkbox" type="checkbox" name="Findphysio<?php echo $key;?>" id="Findphysio<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Findphysio'];?>" <?php if($details['Workplaces'][$key]['Findphysio']=="True"){echo "checked";} ?>>
					<label class="light-font-weight" for="Findphysio<?php echo $key;?>"><span class="note-text">NOTE:&nbsp;</span>I want to be listed at this workplace within Find a Physio on the &nbsp;<b>consumer choose.physio site</b></label>
				</div>

				<div class="col-xs-12 FapTagA"> 
					<input class="styled-checkbox" type="checkbox" name="Findabuddy<?php echo $key;?>" id="Findabuddy<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Find-a-buddy'];?>" <?php if($details['Workplaces'][$key]['Find-a-buddy']=="True"){echo "checked";} ?>>
					<label class="light-font-weight" for="Findabuddy<?php echo $key;?>"><span class="note-text">NOTE:&nbsp;</span>I want to be listed at this workplace within Find a Physio on the &nbsp;<b>corporate australian.physio site</b></label>	
				</div>

					<div class="col-xs-12">
						<label for="Name-of-workplace">Practice name<span class="tipstyle"> *</span></label>
						<input type="text" class="form-control" name="Name-of-workplace<?php echo $key;?>" id="Name-of-workplace<?php echo $key;?>" <?php if (empty($details['Workplaces'][$key]['Name-of-workplace'])) {echo "placeholder='Name of workplace'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Name-of-workplace'].'"'; }?>>
					</div>

				<!--<div class="row"> 
						<div class="col-xs-12 col-md-6">
						<label>Workplace treatment area:</label>
						<?php  
					if(!empty($details['Workplaces'][$key]['SpecialInterestAreaID'])) {$SpecialInterestAreaID = explode(",",$details['Workplaces'][$key]['SpecialInterestAreaID']); } else {$SpecialInterestAreaID = array();}
					?>
						<div class="plus-select-box">
						<select id="WTreatmentarea<?php //echo $key;?>" name="WTreatmentarea<?php //echo $key;?>[]" multiple  tabindex="-1" data-placeholder="Choose treatment area...">
						<?php 
							// get interest area from Aptify via webserice return Json data;
							$interestAreascode  = file_get_contents("sites/all/themes/evolve/json/AreaOfInterest__c.json");
				            $interestAreas=json_decode($interestAreascode, true);	
						?>
						<?php 
							//foreach($interestAreas  as $pair => $value){
								//echo '<option value="'.$interestAreas[$pair]["ID"].'"';
								//if (in_array( $interestAreas[$pair]["ID"],$SpecialInterestAreaID)){ echo "selected='selected'"; } 
								//echo '> '.$interestAreas[$pair]["Name"].' </option>'; 
							//}
					    ?>
						</select>
						</div>
					</div>
					
				</div>-->

				<div class="row">
					<div class="col-xs-12">
						<label for="BuildingName">Building name</label>
						<input type="text" class="form-control" name="WBuildingName<?php echo $key;?>" id="WBuildingName<?php echo $key;?>" <?php if (empty($details['Workplaces'][$key]['WBuildingName'])) {echo "placeholder='Building Name'";}   else{ echo 'value="'.$details['Workplaces'][$key]['WBuildingName'].'"'; }?>>
					</div>

					<div class="col-xs-12 col-md-6">
						<label for="WAddress_Line_1">Address line 1<span class="tipstyle"> *</span></label>
						<input type="text" class="form-control" name="WAddress_Line_1<?php echo $key;?>" id="WAddress_Line_1<?php echo $key;?>" <?php if (empty($details['Workplaces'][$key]['Address_Line_1'])) {echo "placeholder='Address line 1'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Address_Line_1'].'"'; }?>>
					</div>

					<div class="col-xs-12 col-md-6">
						<label for="WAddress_Line_2">Address line 2</label>
						<input type="text" class="form-control" name="WAddress_Line_2<?php echo $key;?>" id="Wstreet<?php echo $key;?>" <?php if (empty($details['Workplaces'][$key]['Address_Line_2'])) {echo "placeholder='Address line 2'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Address_Line_2'].'"'; }?>>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-6 col-md-3">
						<label for="Wcity">City/Town<span class="tipstyle"> *</span></label>
						<input type="text" class="form-control" name="Wcity<?php echo $key;?>" id="Wcity<?php echo $key;?>"  <?php if (empty($details['Workplaces'][$key]['Wcity'])) {echo "placeholder='City or town'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Wcity'].'"'; }?>>
					</div>

					<div class="col-xs-6 col-md-3">
						<label for="Wpostcode">Postcode<span class="tipstyle"> *</span></label>
						<input type="text" class="form-control" name="Wpostcode<?php echo $key;?>" id="Wpostcode<?php echo $key;?>"  <?php if (empty($details['Workplaces'][$key]['Wpostcode'])) {echo "placeholder='Postcode'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Wpostcode'].'"'; }?>>
					</div>

					<div class="col-xs-6 col-md-3">
						<label for="Wstate">State</label>
						<div class="chevron-select-box">
						<select class="form-control" id="Wstate<?php echo $key;?>" name="Wstate<?php echo $key;?>">
						   	<option value="" <?php if (empty($details['Workplaces'][$key]['Wstate'])) echo "selected='selected'";?> disabled>State</option>
							<?php
							//$statecode  = file_get_contents("sites/all/themes/evolve/json/State.json");
							//$State=json_decode($statecode, true);						
							foreach($State  as $pair => $value){
								//echo '<option class="StateOption'.$State[$pair]['CountryID'].'" value="'.$State[$pair]['Abbreviation'].'"';
								echo '<option value="'.$State[$pair]['Abbreviation'].'"';
								if ($details['Workplaces'][$key]['Wstate'] == $State[$pair]['Abbreviation']){ echo "selected='selected'"; } 
								echo '> '.$State[$pair]['Abbreviation'].' </option>';
							}
							?>
						</select>
						</div>
					</div>

					<div class="col-xs-6 col-md-3">
						<label for="Wcountry<?php echo $key;?>">Country<span class="tipstyle"> *</span></label>
						<div class="chevron-select-box">
						<select class="form-control" id="Wcountry<?php echo $key;?>" name="Wcountry<?php echo $key;?>" required>
							<?php 
							$countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
							$country=json_decode($countrycode, true);
							foreach($country  as $pair => $value){
								echo '<option class="CountryOption'.$country[$pair]['ID'].'" value="'.$country[$pair]['Country'].'"';
								if ($details['Workplaces'][$key]['Wcountry'] == $country[$pair]['Country']){ echo "selected='selected'"; } 
								elseif(empty($details['Workplaces'][$key]['Wcountry']) && $country[$pair]['ID']=="14"){
									echo "selected='selected'";
								}
								echo '> '.$country[$pair]['Country'].' </option>';
								
							}
							?>
						</select>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-6 col-md-3">
						<label for="Wemail">Workplace email</label>
						<input type="text" class="form-control" name="Wemail<?php echo $key;?>" id="Wemail<?php echo $key;?>"  <?php if (empty($details['Workplaces'][$key]['Wemail'])) {echo "placeholder='Workplace email'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Wemail'].'"'; }?>>
						<div id="EmailMessage<?php echo $key;?>"></div>
					</div>

					<div class="col-xs-6 col-md-3">
						<label for="Wwebaddress">Website</label>
						<input type="text" class="form-control" name="Wwebaddress<?php echo $key;?>" id="Wwebaddress<?php echo $key;?>" <?php if (empty($details['Workplaces'][$key]['Wwebaddress'])) {echo "placeholder='Website'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Wwebaddress'].'"'; }?>>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-6 col-md-3">
						<label for="">Country code</label>
						<div class="chevron-select-box">
						<select class="form-control" id="WPhoneCountryCode<?php echo $key;?>" name="WPhoneCountryCode<?php echo $key;?>">
						<?php
						
							$countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
							$country = json_decode($countrycode, true);	
							$countser = 0;								
							foreach($country  as $pair => $value){
								echo '<option value="'.$country[$pair]['TelephoneCode'].'"';
								if ($details['Workplaces'][$key]['WPhoneCountryCode'] == preg_replace('/\s+/', '', $country[$pair]['TelephoneCode']) && $countser == 0) { echo "selected='selected'"; $countser++;} 
								elseif(empty($details['Workplaces'][$key]['WPhoneCountryCode']) && $country[$pair]['ID']=="14"){
									echo "selected='selected'";
								}
								echo '> '.$country[$pair]['Country'].' </option>';
							}
						?>
						</select>
						</div>
					</div>

					<div class="col-xs-6 col-md-3">
						<label for="">Area code</label>
						<input type="text" class="form-control" name="WPhoneAreaCode<?php echo $key;?>" <?php if (empty($details['Workplaces'][$key]['WPhoneAreaCode'])) {echo "placeholder='Phone Area code'";}   else{ echo 'value="'.$details['Workplaces'][$key]['WPhoneAreaCode'].'"'; }?>  maxlength="5">
					</div>

					<div class="col-xs-6 col-md-3">
						<label for="">Phone number<span class="tipstyle"> *</span></label>
						<input type="number" class="form-control" name="Wphone<?php echo $key;?>" <?php if (empty($details['Workplaces'][$key]['Wphone'])) {echo "placeholder='Phone number'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Wphone'].'"'; }?>>
					</div>

					<!--<div class="col-xs-6 col-md-3">
						<label for="">Extention Number</label>
						<input type="text" class="form-control" name="WPhoneExtentions<?php //echo $key;?>" <?php //if (empty($details['Workplaces'][$key]['WPhoneExtentions'])) {echo "placeholder='Extentions Number'";}   else{ echo 'value="'.$details['Workplaces'][$key]['WPhoneExtentions'].'"'; }?>  >
					</div>-->		
				</div>

				<div class="row">

					 <?php  
						//if(!empty($details['Workplaces'][$key]['AdditionalLanguage'])) {$WAdditionalLanguage = explode(",",$details['Workplaces'][$key]['AdditionalLanguage']); } else {$WAdditionalLanguage = array();}
						
						?>
					<!--<div class="col-xs-12">
						<label>Choose the languages you speak in your practice?</label>
						<div class="plus-select-box">
						<select id="Additionallanguage<?php echo $key;?>" name="Additionallanguage<?php echo $key;?>[]" multiple  tabindex="-1" data-placeholder="Choose an additional language...">
							<?php 
							/*
								$Languagecode  = file_get_contents("sites/all/themes/evolve/json/Language.json");
								$Language=json_decode($Languagecode, true);
								foreach($Language  as $pair => $value){
									echo '<option value="'.$Language[$pair]['ID'].'"';
									if (in_array($Language[$pair]['ID'],$WAdditionalLanguage)){ echo "selected='selected'"; } 
									echo '> '.$Language[$pair]['Name'].' </option>';
								}*/
						    ?>	
						</select>
						</div>
					</div>-->

					<div class="col-xs-6 col-md-6">
						<label>Quality In Practice number&nbsp;(QIP)</label>
						<input type="text" class="form-control" name="QIP<?php echo $key;?>" id="QIP<?php echo $key;?>" <?php if (empty($details['Workplaces'][$key]['QIP'])) {echo "placeholder='QIP Number'";}   else{ echo 'value="'.$details['Workplaces'][$key]['QIP'].'"'; }?>>
					</div>
				</div>

					<div class="col-xs-12">
					<label>What services does this workplace provide?</label>
					</div>

				<div class="row">
					<div class="col-xs-6 col-md-4">
						<input class="styled-checkbox" type="checkbox" name="Electronic-claiming<?php echo $key;?>" id="Electronic-claiming<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Electronic-claiming'];?>" <?php if($details['Workplaces'][$key]['Electronic-claiming']=="True"){echo "checked";} ?>>
						<label class="light-font-weight" for="Electronic-claiming<?php echo $key;?>">Electronic claiming</label>
					</div>
					<!--<div class="col-xs-6 col-md-4">
						<input class="styled-checkbox" type="checkbox" name="Hicaps<?php //echo $key;?>" id="Hicaps<?php //echo $key;?>" value="<?php  //echo $details['Workplaces'][$key]['Hicaps'];?>" <?php //if($details['Workplaces'][$key]['Hicaps']=="True"){echo "checked";} ?>>
						<label class="light-font-weight" for="Hicaps<?php //echo $key;?>">HICAPS</label>
					</div>-->

					<!--<div class="col-xs-6 col-md-4">
						<input class="styled-checkbox" type="checkbox" name="Healthpoint<?php //echo $key;?>" id="Healthpoint<?php //echo $key;?>" value="<?php  //echo $details['Workplaces'][$key]['Healthpoint'];?>" <?php //if($details['Workplaces'][$key]['Healthpoint']=="True"){echo "checked";} ?>>
						<label class="light-font-weight" for="Healthpoint<?php //echo $key;?>">Healthpoint</label>
					</div>-->
					<div class="col-xs-6 col-md-4">
						<input class="styled-checkbox" type="checkbox" name="Departmentva<?php echo $key;?>" id="Departmentva<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Departmentva'];?>" <?php if($details['Workplaces'][$key]['Departmentva']=="True"){echo "checked";} ?>>
						<label class="light-font-weight" for="Departmentva<?php echo $key;?>">Department of Vetarans' Affairs</label>
					</div>

					<div class="col-xs-6 col-md-4">
						<input class="styled-checkbox" type="checkbox" name="Workerscompensation<?php echo $key;?>" id="Workerscompensation<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Workerscompensation'];?>" <?php if($details['Workplaces'][$key]['Workerscompensation']=="True"){echo "checked";} ?>>
						<label class="light-font-weight" for="Workerscompensation<?php echo $key;?>">Workers compensation</label>
					</div>
					<div class="col-xs-6 col-md-4">
						<input class="styled-checkbox" type="checkbox" name="Motora<?php echo $key;?>" id="Motora<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Motora'];?>" <?php if($details['Workplaces'][$key]['Motora']=="True"){echo "checked";} ?>>
						<label class="light-font-weight" for="Motora<?php echo $key;?>">Motor accident compensation</label>
					</div>

					<div class="col-xs-6 col-md-4">
						<input class="styled-checkbox" type="checkbox" name="Medicare<?php echo $key;?>" id="Medicare<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Medicare'];?>" <?php if($details['Workplaces'][$key]['Medicare']=="True"){echo "checked";} ?>>
						<label class="light-font-weight" for="Medicare<?php echo $key;?>">Medicare Chronic Disease Management</label>
					</div>
					<div class="col-xs-6 col-md-4">
						<input class="styled-checkbox" type="checkbox" name="Homehospital<?php echo $key;?>" id="Homehospital<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Homehospital'];?>" <?php if($details['Workplaces'][$key]['Homehospital']=="True"){echo "checked";} ?> >
						<label class="light-font-weight" for="Homehospital<?php echo $key;?>">Home and hospital visits</label>
					</div>

					<div class="col-xs-6 col-md-4">
						<input class="styled-checkbox" type="checkbox" name="Mobilephysiotherapist<?php echo $key;?>" id="Mobilephysiotherapist<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['MobilePhysio'];?>" <?php if($details['Workplaces'][$key]['MobilePhysio']=="True"){echo "checked";} ?>>
						<label class="light-font-weight" for="Mobilephysiotherapist<?php echo $key;?>">Mobile physiotherapist</label>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12 col-md-6">
						<label>Workplace setting<span class="tipstyle"> *</span></label>
						<div class="chevron-select-box">	
						<select class="form-control" id="Workplace-setting<?php echo $key;?>" name="Workplace-setting<?php echo $key;?>">
						<?php
							// 2.2.36 - get workplace settings list
							// Send - 
							// Response - get workplace settings from Aptify via webserice return Json data;
							// stroe workplace settings into the session
							$workplaceSettingscode  = file_get_contents("sites/all/themes/evolve/json/WorkPlaceSettings.json");
							$workplaceSettings=json_decode($workplaceSettingscode, true);	
							$_SESSION["workplaceSettings"] = $workplaceSettings;
							foreach($workplaceSettings  as $pair => $value){
							echo '<option value="'.$workplaceSettings[$pair]["ID"].'"';
							if ($details['Workplaces'][$key]['Workplace-settingID'] == $workplaceSettings[$pair]["ID"]){ echo "selected='selected'"; } 
							echo '> '.$workplaceSettings[$pair]["Name"].' </option>'; 
							}							
							?>
						</select>
						</div>
					</div>

					<div class="col-xs-12 col-md-6">
						<label>Numbers of hours worked<span class="tipstyle"> *</span></label>
						<div class="chevron-select-box">
						<select class="form-control" id="Number-worked-hours<?php echo $key;?>" name="Number-worked-hours<?php echo $key;?>">
						<?php 
							$NumberOfHourscode  = file_get_contents("sites/all/themes/evolve/json/NumberOfHours.json");
							$NumberOfHours=json_decode($NumberOfHourscode, true);
							foreach($NumberOfHours  as $pair => $value){
								echo '<option value="'.$NumberOfHours[$pair]['ID'].'"';
								if ($details['Workplaces'][$key]['Number-workedhours'] == $NumberOfHours[$pair]['ID']){ echo "selected='selected'"; } 
								echo '> '.$NumberOfHours[$pair]['Name'].' </option>';
							}
						?>
						</select>
						</div>
					</div>
				</div>

			</div>
			<?php endforeach; ?>
			
			</div>
			
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
				<a class="add-workplace-join"><span class="dashboard-button-name">Add workplace</span></a>
			</div>

			<div class="col-xs-12">   
				<a class="join-details-button3"><span class="dashboard-button-name">Next</span></a><a class="your-details-prevbutton3"><span class="dashboard-button-name">Back</span></a>
			</div>
		
		</div>
		<div class="down4" style="display:none;" >
		<input type="hidden" id="addtionalNumber" name="addtionalNumber" value="<?php  if(sizeof($details['PersonEducation'])!=0) {$addtionalNumber =  sizeof($details['PersonEducation']);} else{ $addtionalNumber =0;} echo  $addtionalNumber;  ?>"/>

			<div id="additional-qualifications-block">
				<?php foreach($details['PersonEducation'] as $key => $value) :?>
				
					<div id="additional<?php echo $key;?>">
					<input type="hidden" name="ID<?php echo $key;?>" value="<?php  echo $details['PersonEducation'][$key]['ID'];?>">
					<div class="col-xs-12 space-line"><div class="col-xs-12 separater"></div></div>
						<div class="row">
							<div class="row">
								<div class="col-xs-12 col-sm-6">
									<label for="Udegree<?php echo $key;?>">Degree level<span class="tipstyle"> *</span></label>
									<?php 
										$degreecode  = file_get_contents("sites/all/themes/evolve/json/Educationdegree.json");
										$degree=json_decode($degreecode, true);
										$_SESSION["degree"] = $degree;	
									?>
									<?php if (!empty($details['PersonEducation'][$key]['DegreeID'])):?>
									<div class="chevron-select-box">
									<select class="form-control" name="Udegree<?php echo $key;?>" id="Udegree<?php echo $key;?>">
										
										<?php 
											foreach($degree  as $pair => $value){
												echo '<option value="'.$degree[$pair]['ID'].'"';
												if ($details['PersonEducation'][$key]['DegreeID'] == $degree[$pair]['ID']){ echo "selected='selected'"; } 
												echo '> '.$degree[$pair]['Name'].' </option>';
												
											}
										?>
										<option value="0" >Other</option>
									</select>
									</div>
									<input type="text" class="form-control display-none" name="University-degree<?php echo $key;?>" id="University-degree<?php echo $key;?>">
									<?php endif;?>
									<?php if (empty($details['PersonEducation'][$key]['DegreeID'])):?>
									<input type="text" class="form-control" name="University-degree<?php echo $key;?>" id="University-degree<?php echo $key;?>" value="<?php echo $details['PersonEducation'][$key]['Degree'];?>">
									<?php endif;?>
								</div>
							</div>

							<div class="row">
								<div class="col-xs-12 col-sm-6">
									<label for="Undergraduate-university-name<?php echo $key;?>">University name<span class="tipstyle"> *</span></label>
									<?php 
										$universityCode  = file_get_contents("sites/all/themes/evolve/json/University.json");
										$University=json_decode($universityCode, true);
										$name = array();
										foreach ($University as $ukey => $row)
										{
											$name[$ukey] = $row['Name'];
										}
										array_multisort($name, SORT_ASC, $University);
										
										
										$_SESSION["University"] = $University;	
									?>
									<?php if (!empty($details['PersonEducation'][$key]['InstituteID'])):?>
									<div class="chevron-select-box">
									<select class="form-control" name="Undergraduate-university-name<?php echo $key;?>" id="Undergraduate-university-name<?php echo $key;?>">
										
										<?php 
											foreach($University  as $pair => $value){
												echo '<option value="'.$University[$pair]['ID'].'"';
												if ($details['PersonEducation'][$key]['InstituteID'] == $University[$pair]['ID']){ echo "selected='selected'"; } 
												echo '> '.$University[$pair]['Name'].' </option>';
											}
										?>
										<option value="0">Other</option>
									</select>
									</div>
									<input type="text" class="form-control display-none" name="Undergraduate-university-name-other<?php echo $key;?>" id="Undergraduate-university-name-other<?php echo $key;?>">
									<?php endif;?>
									<?php if (empty($details['PersonEducation'][$key]['InstituteID'])):?>
									<input type="text" class="form-control" name="Undergraduate-university-name-other<?php echo $key;?>" id="Undergraduate-university-name-other<?php echo $key;?>" value="<?php echo $details['PersonEducation'][$key]['Institute'];?>">
									<?php endif;?>
								</div>
							</div>

							<div class="col-xs-6 col-sm-6 col-md-6">
								<label for="Ugraduate-country<?php echo $key;?>">Country<span class="tipstyle"> *</span></label>
								<div class="chevron-select-box">
								<select class="form-control" id="Ugraduate-country<?php echo $key;?>" name="Ugraduate-country<?php echo $key;?>">
								<?php 
								$countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
								$country=json_decode($countrycode, true);
								foreach($country  as $pair => $value){
									echo '<option value="'.$country[$pair]['ID'].'"';
									if ($details['PersonEducation'][$key]['Country'] == $country[$pair]['ID']){ echo "selected='selected'"; } 
									elseif(empty($details['PersonEducation'][$key]['Country']) && $country[$pair]['ID']=="14"){
											echo "selected='selected'";
									}

									echo '> '.$country[$pair]['Country'].' </option>';
									
								}
								?>
								</select>
								</div>
							</div>

							<div class="col-xs-6 col-sm-6 col-md-6">
								<label for="Ugraduate-yearattained<?php echo $key;?>">Year attained or expected graduation date<span class="tipstyle"> *</span></label>
								<div class="chevron-select-box">
								<select class="form-control" name="Ugraduate-yearattained<?php echo $key;?>" id="Ugraduate-yearattained<?php echo $key;?>">
								
								<?php 
								$y = date("Y") + 10;
								for ($i=1940; $i<= $y; $i++){
								echo '<option value="'.$i.'"';
								if ($details['PersonEducation'][$key]['Yearattained'] == $i){
								echo 'selected="selected"';
								}
								echo '>'.$i.'</option>';
								}
								?>
								</select>
								</div>
							</div>
					</div>
					<!--<?php //if($key!="0"):?>-->
					<a class="callDeleteEdu" id="deleteEducation<?php echo $key;?>"><span class="dashboard-button-name">Delete</span></a>	
					<?php //endif;?>
					</div>
				<?php endforeach;?>
				<?php if(sizeof($details['PersonEducation'])==0):?>
				<div class="col-xs-12 col-sm-12 col-md-12 note"><p>Please add your qualification(s) or click Next to continue</p></div>
					<!--<div id="additional0">
						<input type="hidden" name="ID0" value="-1">
					   <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <label for="Udegree">Degree<span class="tipstyle"> *</span></label>
                                <div class="chevron-select-box">
                                <select class="form-control" name="Udegree0" id="Udegree0">
                                   <option value="" selected disabled>Please select</option>
								   <?php
                                        /*$degreecode         = file_get_contents("sites/all/themes/evolve/json/Educationdegree.json");
                                        $degree             = json_decode($degreecode, true);
                                        $_SESSION["degree"] = $degree;
                                        foreach ($degree as $pair => $value) {
                                            echo '<option value="' . $degree[$pair]['ID'] . '"';
                                            echo '> ' . $degree[$pair]['Name'] . ' </option>';
                                        }*/
                                    ?>
                                <option value="0">Other</option>
                                </select>
                                </div>
                                <input type="text" class="form-control display-none" name="University-degree0" id="University-degree0">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <label for="Undergraduateuniversity-name0">University name<span class="tipstyle"> *</span></label>
                                <?php
                                    $universityCode         = file_get_contents("sites/all/themes/evolve/json/University.json");
                                    $University             = json_decode($universityCode, true);
									
									$name = array();
										foreach ($University as $ukey => $row)
										{
											$name[$ukey] = $row['Name'];
										}
									array_multisort($name, SORT_ASC, $University);
									
                                    $_SESSION["University"] = $University;
                                ?>
                            <div class="chevron-select-box">
                            <select class="form-control" name="Undergraduate-university-name0" id="Undergraduate-university-name0">
                                <option value="" selected disabled>Please select</option>
								<?php
                                   /* foreach ($University as $pair => $value) {
                                        echo '<option value="' . $University[$pair]['ID'] . '"';
                                        echo '> ' . $University[$pair]['Name'] . ' </option>';
                                    }*/
                                ?>    
                                    <option value="0">Other</option>
                                </select>
                                </div>
                                <input type="text" class="form-control display-none" name="Undergraduate-university-name-other0" id="Undergraduate-university-name-other0">
                            </div>
                        </div>

						<div class="row">
                            <div class="col-xs-6 col-sm-6">
                                <label for="Ugraduate-yearattained0">Year attained or expected graduation date<span class="tipstyle"> *</span></label>
                                <div class="chevron-select-box">
                                <select class="form-control" name="Ugraduate-yearattained0" id="Ugraduate-yearattained0">
                                <option value="" selected disabled>Please select</option>
								<?php
                                   /* $y = date("Y") + 5;
                                    for ($i = 1940; $i <= $y; $i++) {
                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                    }*/
                                ?>
                                </select>
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6">
                                <label for="Ugraduate-country0">Country<span class="tipstyle"> *</span></label>
                                <div class="chevron-select-box">
                                <select class="form-control" id="Ugraduate-country0" name="Ugraduate-country0">
                                <?php
                                    /*$countrycode = file_get_contents("sites/all/themes/evolve/json/Country.json");
                                    $country     = json_decode($countrycode, true);
                                    foreach ($country as $key => $value) {
                                        echo '<option value="' . $country[$key]['ID'] . '"';
                                        if($country[$key]['ID']=="14"){echo "selected='selected'";}
                                        echo '> ' . $country[$key]['Country'] . ' </option>';
                                    }*/
                                ?>
                                </select>
                                </div>
                            </div>
                        </div>
						<a class="callDeleteEdu" id="deleteEducation0"><span class="dashboard-button-name">Delete</span></a>
					</div>-->
				<?php endif; ?>

		</div>
		<div class="col-xs-12">
				<a class="add-additional-qualification"><span class="dashboard-button-name">Add qualification</span></a>		
		</div>
		<div class="col-xs-12">  <a href="javascript:document.getElementById('your-detail-form').submit();" class="join-details-button4"><span class="dashboard-button-name">Next</span></a><a class="your-details-prevbutton4"><span class="dashboard-button-name">Back</span></a></div>

	</div>

</form> 
		<div id="confirmDelete" style="display:none;">
				<div class="flex-cell">
					<h3 class="light-lead-heading cairo">Are you sure you want to delete this qualification record?</h3>
				</div>
				<div class="flex-cell buttons-container">
					<a id="deleteQButton" class="" value="yes" target="_self">Yes</a>
					<a class="cancelDeleteButton" value="no" target="_self">No</a>
				</div>
		</div>
<script type="text/javascript">
jQuery(document).ready(function($) {
	$('#workplace').click(function(){
		$('#dashboard-right-content').addClass("autoscroll");
	});
	
	$('.add-workplace-join').click(function(){
		var number = Number($('#wpnumber').val());
		var maxNumber = Number($('#maxumnumber').val());
		var j = Number(number +1);
		var i = Number(maxNumber +1);
	
		$('div[class="down3"] #tabmenu').append( '<li class="active" id="workplaceli'+ i + '"><a data-toggle="tab" href="#workplace'+ i + '">Workplace '+ j+'</a><span class="calldeletewp'+ i + '"></span></li>' );
		$('div[id="workplaceblocks"]').append('<div id="workplace'+ i +'" class="tab-pane fade active in"></div>');
		
		$('div[class="down3"] #tabmenu li:not(#workplaceli'+i+')').removeClass("active");
		$('div[id^=workplace]:not(#workplace'+i+')').removeClass("active in");
		$('input[name=wpnumber]').val(j);
		$('input[name=maxumnumber]').val(i);
		var memberType = $('select[name=MemberType]').val();
		var sessionvariable = '<?php echo json_encode($_SESSION["workplaceSettings"]);?>';
		var sessionInterest = '<?php echo json_encode($_SESSION["interestAreas"]);?>';
		var sessionLanguage = '<?php echo json_encode($_SESSION["Language"]);?>';
		var sessionCountry = <?php echo json_encode($_SESSION['country']);?>;
		  $("#workplace"+ i ).load("load/workplace", {"count":i,"sessionWorkplaceSetting":sessionvariable, "sessioninterestAreas":sessionInterest, "sessionLanguage":sessionLanguage, "sessionCountry":sessionCountry, "memberType":memberType});

	});
	$("[class^=deletewp]").live( "click", function(){
		  var x = $(this).attr("class").replace('deletewp', '');
		  $("#workplaceli"+ x).remove();
		  $("#workplace"+ x).remove();
		  
		  var n = Number($('#wpnumber').val());
		  var t = Number(n -1);
		  
		$('input[name=wpnumber]').val(t);
		for (m = 1; m<=t;m++){
				$('div[class="down3"] #tabmenu li:nth-child(' + m + ') a').html("Workplace "+m);
		}
	});
	
});
$('.add-additional-qualification').click(function(){
		$('#dashboard-right-content').addClass("autoscroll");
        var number = Number($('#addtionalNumber').val());
		var sessionCountry = <?php echo json_encode($_SESSION['country']);?>;
		var sessionDegree = <?php echo json_encode($_SESSION['degree']);?>;
		var sessionUniversity = <?php echo json_encode($_SESSION['University']);?>;
		$('div[id="additional-qualifications-block"]').append('<div id="additional'+ number +'"></div>');
		$("#additional"+ number ).load("load/education", {"count":number,"sessionCountry":sessionCountry,"sessionDegree":sessionDegree,"sessionUniversity":sessionUniversity});
        var i = Number(number +1);
		$('input[name=addtionalNumber]').val(i);
 });
 $("#deleteQButton").on( "click", function(){
		var x = $(this).attr("class").replace('deleteEducation', '');
		$("#additional"+ x).remove();
		$("#deleteQButton").removeAttr('class');
		var en = Number($('#addtionalNumber').val());
		
		var et = Number(en -1);
		$('input[name=addtionalNumber]').val(et);
		//$('#confirmDelete').dialog('close');
		$('div[aria-describedby=confirmDelete] button').click();
});

jQuery(document).ready(function() {
  $("#confirmDelete .cancelDeleteButton").on("click",function(){
    $('div[aria-describedby=confirmDelete]').fadeOut();
  });
  $(".callDeleteEdu").on("click",function(){
    $('div[aria-describedby=confirmDelete]').fadeIn();
  });
});
</script>