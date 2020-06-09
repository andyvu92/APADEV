<?php
if(!function_exists('drupal_session_started'))
{
  die("Unauthorized Access");
}
?>
<?php if(isset($_SESSION["UserId"])) : ?>
<?php
//include('sites/all/themes/evolve/commonFile/updateBackgroundImage.php');
apa_function_updateBackgroundImage_form();
/* get background image****/
if(isset($_SESSION['UserId'])) { $userID = $_SESSION['UserId'];} else { $userID =0; }
$background = getBackgroundImage($userID);
/* get background image****/
/*****get current url*****/
$link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
$url= $link.$_SERVER['REQUEST_URI'];
/*****get current url*****/
if(isset($_POST['step1'])) {
	$postData = array();
	if(isset($_SESSION['UserId'])) {$postData['userID'] = $_SESSION['UserId'];}
	if(isset($_POST['Prefix'])){ $postData['Prefix'] = $_POST['Prefix']; }
	if(isset($_POST['Firstname'])){ $postData['Firstname'] = $_POST['Firstname']; }
	if(isset($_POST['Middle-name'])){ $postData['Middle-name'] = $_POST['Middle-name']; }
	if(isset($_POST['Preferred-name'])){ $postData['Preferred-name'] = $_POST['Preferred-name']; }
	if(isset($_POST['Maiden-name'])){ $postData['Maiden-name'] = $_POST['Maiden-name']; }else{ $postData['Maiden-name'] ="";}
	if(isset($_POST['Lastname'])){ $postData['Lastname'] = $_POST['Lastname']; }
	//if(isset($_POST['Birth'])){ $postData['birth'] = str_replace("-","/",$_POST['Birth']); }
	if(isset($_POST['birthdate']) && isset($_POST['birthmonth']) && isset($_POST['birthyear'])) {
		$postData['birth'] = $_POST['birthyear']."/".$_POST['birthmonth']."/".$_POST['birthdate'];
    }
	if(isset($_POST['Gender'])){ $postData['Gender'] = $_POST['Gender']; }
	if(isset($_POST['country-code'])){ $postData['Home-country-code'] = $_POST['country-code']; }
	if(isset($_POST['area-code'])){ $postData['Home-area-code'] = $_POST['area-code']; }
	if(isset($_POST['phone-number'])){ $postData['Home-phone-number'] = $_POST['phone-number']; }
	if(isset($_POST['Mobile-country-code'])){ $postData['Mobile-country-code'] = $_POST['Mobile-country-code']; }
	if(isset($_POST['Mobile-area-code'])){ $postData['Mobile-area-code'] = $_POST['Mobile-area-code']; }else {$postData['Mobile-area-code'] = "";}
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

	//if(isset($_POST['BuildingName'])){ $postData['BuildingName'] = $_POST['BuildingName']; }
	//if(isset($_POST['Address_Line_1'])){ $postData['Address_Line_1'] = $_POST['Address_Line_1']; }
	//if(isset($_POST['Pobox'])){ $postData['Pobox'] = $_POST['Pobox']; }
	//if(isset($_POST['Address_Line_2'])){ $postData['Address_Line_2'] = $_POST['Address_Line_2']; }
	if(isset($_POST['Suburb'])){ $postData['Suburb'] = $_POST['Suburb']; }
	if(isset($_POST['Postcode'])){ $postData['Postcode'] = $_POST['Postcode']; }
	if(isset($_POST['State'])){ $postData['State'] = $_POST['State']; } else {$postData['State'] = "";}
	if(isset($_POST['Country'])){ $postData['Country'] = $_POST['Country']; }
	if(isset($_POST['Status'])){ $postData['Status'] = $_POST['Status']; }
	if(isset($_POST['Specialty'])){ $postData['Specialty'] = $_POST['Specialty']; }


	/***put the logic when post Mailing-PObox******/
	/***Updated on 02082018**/
	if(isset($_POST['Mailing-address']) && $_POST['Mailing-address']=='1'){
        if(isset($_POST['BuildingName'])) {$postData['Mailing-BuildingName'] = $_POST['BuildingName'];} else{ $postData['Mailing-BuildingName'] = "";}
        if(isset($_POST['Address_Line_1'])) {$postData['Mailing-Address_line_1'] = $_POST['Address_Line_1'];} else{$postData['Mailing-Address_line_1'] = "";}
        if(isset($_POST['Address_Line_2'])) {$postData['Mailing-Address_line_2'] = $_POST['Address_Line_2']; } else {$postData['Mailing-Address_line_2'] ="";}
        if($_POST['Pobox']!="") {$postData['Mailing-BuildingName'] = $_POST['Pobox'];}
        $postData['Mailing-city-town'] = $_POST['Suburb'];
        $postData['Mailing-postcode'] = $_POST['Postcode'];
        if(isset($_POST['State'])) {$postData['Mailing-state']  = $_POST['State'];} else{$postData['Mailing-state']  = "";}
        $postData['Mailing-country'] = $_POST['Country'];
	}else{
		if($_POST['Mailing-PObox']!="") {
				//$postData['Mailing-PObox'] = $_POST['Mailing-PObox'];
				$postData['Mailing-BuildingName'] =$_POST['Mailing-PObox'];
				$postData['Mailing-Address_line_1'] ="";
				$postData['Mailing-Address_line_2'] ="";

		}else {
			$postData['Mailing-BuildingName'] = $_POST['Mailing-BuildingName'];
			$postData['Mailing-Address_line_1'] = $_POST['Mailing-Address_Line_1'];
			$postData['Mailing-Address_line_2'] = $_POST['Mailing-Address_Line_2'];
			$postData['Mailing-PObox'] = "";
		}
		if(isset($_POST['Mailing-city-town'])){ $postData['Mailing-city-town'] = $_POST['Mailing-city-town']; }
		if(isset($_POST['Mailing-postcode'])){ $postData['Mailing-postcode'] = $_POST['Mailing-postcode']; }
		if(isset($_POST['Mailing-State'])){ $postData['Mailing-state'] = $_POST['Mailing-State']; } else{$postData['Mailing-state']  = "";}
		if(isset($_POST['Mailing-country'])){ $postData['Mailing-country'] = $_POST['Mailing-country']; }
	}

	if(isset($_POST['Memberid'])){ $postData['Memberid'] = $_POST['Memberid']; }
	//if(isset($_POST['Password'])){ $postData['Password'] = $_POST['Password']; }
	if(isset($_POST['Ahpranumber'])){ $postData['Ahpranumber'] = $_POST['Ahpranumber']; }
	if(isset($_POST['Branch'])){ $postData['Branch'] = $_POST['Branch']; }

	if(isset($_SESSION['Regional-group'])){ $postData['Regional-group'] = $_SESSION['Regional-group']; } else{ $postData['Regional-group'] ="";}
	if(isset($_POST['SpecialInterest'])){ $postData['PSpecialInterestAreaID'] = implode(",",$_POST['SpecialInterest']); }

	//if(isset($_POST['Treatmentarea'])){ $postData['Treatmentarea'] = $_POST['Treatmentarea']; }
	if(isset($_POST['MAdditionallanguage'])){ $postData['PAdditionalLanguageID'] = implode(",",$_POST['MAdditionallanguage']); }

	if(isset($_POST['Findpublicbuddy'])){ $postData['Findpublicbuddy'] = $_POST['Findpublicbuddy']; } else{ $postData['Findpublicbuddy'] = "False";}
	if(isset($_POST['Dietary'])){
	   $testDietaryArray = array();
		foreach($_POST['Dietary'] as $dietaryData){
		$testD['ID']=$dietaryData;
		array_push($testDietaryArray, $testD);
		}
		$postData['Dietary'] = $testDietaryArray;
	}
	if(isset($_POST['wpnumber'])&& $_POST['wpnumber']!="0"){
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
			if(isset($_POST['Wstate'.$i])) { $workplaceArray['Wstate'] = $_POST['Wstate'.$i];} else{$workplaceArray['Wstate'] ="";}
			if(isset($_POST['Wcountry'.$i])) { $workplaceArray['Wcountry'] = $_POST['Wcountry'.$i];}
			if(isset($_POST['Wemail'.$i])) { $workplaceArray['Wemail'] = $_POST['Wemail'.$i];}
			if(isset($_POST['Wwebaddress'.$i])) { $workplaceArray['Wwebaddress'] = $_POST['Wwebaddress'.$i];}
			if(isset($_POST['WPhoneCountryCode'.$i])) { $workplaceArray['WPhoneCountryCode'] = $_POST['WPhoneCountryCode'.$i];}
			if(isset($_POST['WPhoneAreaCode'.$i])) { $workplaceArray['WPhoneAreaCode'] = $_POST['WPhoneAreaCode'.$i];}
			if(isset($_POST['Wphone'.$i])) { $workplaceArray['WPhone'] = $_POST['Wphone'.$i];}
			/*if(isset($_POST['WPhoneExtentions'.$i])) { $workplaceArray['WPhoneExtentions'] = $_POST['WPhoneExtentions'.$i];}*/
			if(isset($_POST['Electronic-claiming'.$i])) { $workplaceArray['Electronic-claiming'] = $_POST['Electronic-claiming'.$i];}else {$workplaceArray['Electronic-claiming']="False";}
			/*if(isset($_POST['Hicaps'.$i])) { $workplaceArray['Hicaps'] = $_POST['Hicaps'.$i];}else {$workplaceArray['Hicaps']="False";}
			if(isset($_POST['Healthpoint'.$i])) { $workplaceArray['Healthpoint'] = $_POST['Healthpoint'.$i];}else {$workplaceArray['Healthpoint']="False";}*/
			if(isset($_POST['Departmentva'.$i])) { $workplaceArray['Departmentva'] = $_POST['Departmentva'.$i];}else {$workplaceArray['Departmentva']="False";}
			if(isset($_POST['Workerscompensation'.$i])) { $workplaceArray['Workerscompensation'] = $_POST['Workerscompensation'.$i];}else {$workplaceArray['Workerscompensation']="False";}
			if(isset($_POST['Motora'.$i])) { $workplaceArray['Motora'] = $_POST['Motora'.$i];}else {$workplaceArray['Motora']="False";}
			if(isset($_POST['Medicare'.$i])) { $workplaceArray['Medicare'] = $_POST['Medicare'.$i];}else {$workplaceArray['Medicare']="False";}
			if(isset($_POST['Homehospital'.$i])) { $workplaceArray['Homehospital'] = $_POST['Homehospital'.$i];} else {$workplaceArray['Homehospital']="False";}
			if(isset($_POST['MobilePhysio'.$i])) { $workplaceArray['MobilePhysio'] = $_POST['MobilePhysio'.$i];}else {$workplaceArray['MobilePhysio']="False";}
      if(isset($_POST['NDIS'.$i])) { $workplaceArray['NDIS'] = $_POST['NDIS'.$i];}else {$workplaceArray['NDIS']="False";}
      if(isset($_POST['Telehealth'.$i])) { $workplaceArray['Telehealth'] = $_POST['Telehealth'.$i];}else {$workplaceArray['Telehealth']="False";}
      if(isset($_POST['Number-worked-hours'.$i])) { $workplaceArray['Number-workedhours'] = $_POST['Number-worked-hours'.$i];}
			if(isset($_POST['WTreatmentarea'.$i])){ $workplaceArray['SpecialInterestAreaID'] = implode(",",$_POST['WTreatmentarea'.$i]); }else { $workplaceArray['SpecialInterestAreaID'] = ""; }
			if(isset($_POST['Additionallanguage'.$i])){ $workplaceArray['AdditionalLanguage'] = implode(",",$_POST['Additionallanguage'.$i]); }else{ $workplaceArray['AdditionalLanguage'] = "";}
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
	$test = aptify_get_GetAptifyData("5", $postData);
	unset($_SESSION["Regional-group"]);
	if(isset($_GET['Goback']) && ($_GET['Goback']=="PD")){
		header("Location:".$link."/pd/pd-shopping-cart");
	}
	nameUpdate($postData['Firstname'], $postData['Preferred-name']);
	/*General function: save data to APA shopping cart database;*/
	/*Parameters: $userID, $productID,$type;*/
	/*save product data including membership type product, national group product, fellowship & PRF product*/
}
// 2.2.4 - GET bember detail
// Send -
// UserID
// Response -
// Prefix, First name, Preferred name, Middle name, Maiden name
// Last name, DOB, Gender, Home phone, Mobile number, Aboriginal
// Dietary, Pref-Building nmae, Pref-Unit num, Pref-PObox,
// Pref- Street, Pref- Suburb, Pref- Postcode, Pref- State,
// Pref-Country, Member number, Member ID, Member type, AHPRA number
// National Group, Branch, Regional group, Specialty, Status,
// Billing- building name, Billing- unit, Billing- streetname
// Billing-suburb, Billing-postcode, Billing-State, Billing-Country
// Tickbox, Shipping-building, Shipping-unit, Shipping-streetname
// Shipping-city, Shipping-postcode, Shipping-state, Shipping-country
// Mailing-Unit, Mailing-street, Mailing-city, Mailing-postcode
// Mailing-state, Mailing-country, Workplace: {WorkplaceID, FAP,
// Name of workplace, Workplace setting, Building name, Unit,
// street, city, postcode, state, country, email, Web address,
// phone, additional language, Electronic claiming, HICAPS,
// Healthpoint, Department VA, Work Comp, MOTOR, MEDICARE,
// Homehospital, Mobile physio, Special interest area, Number of hours,
// QIP}, Undergraduate degree, Undergraduate Uni name, Undergraduate Country,
// Year attained, Post graduate degree, post graduate name,
// Post graduate country, Year attained, Additional qualifications
if(isset($_SESSION["UserId"])) {
	$data = "UserID=".$_SESSION["UserId"];
	$details = aptify_get_GetAptifyData("4", $data,""); // #_SESSION["UserID"];
	//$details = GetAptifyData("4", $data,"");
	//2.2.43 -get user installment data test part
	//$installmentData['id'] = $_SESSION["UserId"];
	//$installmentOrder = GetAptifyData("43", $installmentData);
}





if (!empty($details['Regionalgp'])) { $_SESSION['Regional-group'] = $details['Regionalgp'];}
////print_r($details);
// 2.2.10 - GET Picture
// Send -
// UserID
// Response -
// Profile image
//$picture = GetAptifyData("10","","");



/*if(isset($_POST["addCard"])) {
	// 2.2.15 - Add payment method
	// Send -
	// UserID, Cardtype,Cardname,Cardnumber,Expirydate,CCV
	// Response -
	// N/A.
   	if(isset($_SESSION['UserId'])){ $postPaymentData['userID'] = $_SESSION['UserId']; }
	if(isset($_POST['Cardtype'])){ $postPaymentData['Payment-method'] = $_POST['Cardtype']; }
	if(isset($_POST['Cardnumber'])){ $postPaymentData['Cardno'] = $_POST['Cardnumber']; }
	if(isset($_POST['Expirydate'])){ $postPaymentData['Expiry-date'] = $_POST['Expirydate'];}
	if(isset($_POST['CCV'])){ $postPaymentData['CCV'] = $_POST['CCV'];}
	$out = GetAptifyData("15",$postPaymentData);

} */
if(isset($_POST["deleteID"]) && $_POST["deleteID"] != "") {
	$deleteCardSubmit["UserID"] = $_SESSION['UserId'];
	$deleteCardSubmit["SpmID"] = $_POST["deleteID"];
	$deleteCardSubmit["ExpireMonthYear"] = "";
	$deleteCardSubmit["CCSNumber"] = "";
    $deleteCardSubmit["IsDefault"] = "";
	$deleteCardSubmit["IsActive"] = "0";
	// 2.2.13 - update payment method-2-delete card
	// Send -
	// Response -
	// N/A.
	$deleteCards = aptify_get_GetAptifyData("13", $deleteCardSubmit);
	//print_r($deleteCards);

}
if(isset($_Get["action"]) && $_Get["action"] = "updatecard") {
	$updateCardSubmit["UserID"] = $_SESSION['UserId'];
	$updateCardSubmit["SpmID"] = $_POST["selectedCard"];
	$updateCardSubmit["ExpireMonthYear"] = "";
	$updateCardSubmit["CCSNumber"] = "";
    $updateCardSubmit["IsDefault"] = "1";
	$updateCardSubmit["IsActive"] = "";
	//$updateCardSubmit["Expiry-date"] = $_POST["Expiry-date"];
	//$updateCardSubmit["CVV"] = $_POST["CVV"];
	// 2.2.13 - update payment method-2-update card
	// Send -
	// UserID, Creditcard-ID,Expiry-date,CVV
	// Response -
	// N/A.
	$updateCards = aptify_get_GetAptifyData("13", $updateCardSubmit);
	//print_r($updateCards);

}
if(isset($_POST["setCardID"]) && $_POST["setCardID"] != ""){
	$updateCardSubmit["UserID"] = $_SESSION['UserId'];
	$updateCardSubmit["SpmID"] = $_POST["setCardID"];
	$updateCardSubmit["ExpireMonthYear"] = "";
	$updateCardSubmit["CCSNumber"] = "";
    $updateCardSubmit["IsDefault"] = "1";
	$updateCardSubmit["IsActive"] = "";
	// 2.2.13 - update payment method-3-set main card
	// Send -
	// UserID, Creditcard-ID
	// Response -
	// N/A.
	$updateCards = aptify_get_GetAptifyData("13", $updateCardSubmit);
	//print_r($updateCards);

}
if(isset($_Get["action"]) && $_Get["action"] = "rollover") {
	$updateCardSubmit["UserID"] = "UserID";
	$updateCardSubmit["Rollover"] = $_POST["Rollover"];
	// 2.2.13 - update payment method-1-set user rollover
	// Send -
	// UserID, Rollover
	// Response -
	// N/A.
	aptify_get_GetAptifyData("13", $updateCardSubmit);
}

?>


<div id="pre_background" style="display:none">background_<?php //echo $background; ?></div>
<div class="extra_information">
<?php
// please use those data!!!!
/*
echo "Nationalgp: ".$details['Nationalgp']."<br />";
echo "Branch: ".$details['Branch']."<br />";
echo "Specialty: ".$details['Specialty']."<br />";
echo "Billing-BuildingName: ".$details['Billing-BuildingName']."<br />";
echo "Shipping-BuildingName: ".$details['Shipping-BuildingName']."<br />";
echo "Mailing-unitno: ".$details['Mailing-unitno']."<br />";
echo "Mailing-streetname: ".$details['Mailing-streetname']."<br />";
echo "Mailing-city-town: ".$details['Mailing-city-town']."<br />";
echo "Mailing-postcode: ".$details['Mailing-postcode']."<br />";
echo "Mailing-state: ".$details['Mailing-state']."<br />";
echo "Mailing-country: ".$details['Mailing-country']."<br />";
echo "Additional-qualifications1: ".$details['Additional-qualifications'][0]."<br />";
echo "Additional-qualifications2: ".$details['Additional-qualifications'][1]."<br />";
echo "Workplace_ID0: ".$details["Workplaces"][0]['Workplace_ID']."<br />";
echo "BuildingName0: ".$details["Workplaces"][0]['BuildingName']."<br />";
echo "Homehospital0: ".$details["Workplaces"][0]['Homehospital']."<br />";
echo "MobilePhysio0: ".$details["Workplaces"][0]['MobilePhysio']."<br />";
echo "Workplace_ID1: ".$details["Workplaces"][1]['Workplace_ID']."<br />";
echo "BuildingName1: ".$details["Workplaces"][1]['BuildingName']."<br />";
echo "Homehospital1: ".$details["Workplaces"][1]['Homehospital']."<br />";
echo "MobilePhysio1: ".$details["Workplaces"][1]['MobilePhysio']."<br />";
echo "Workplace_ID2: ".$details["Workplaces"][2]['Workplace_ID']."<br />";
echo "BuildingName2: ".$details["Workplaces"][2]['BuildingName']."<br />";
echo "Homehospital2: ".$details["Workplaces"][2]['Homehospital']."<br />";
echo "MobilePhysio2: ".$details["Workplaces"][2]['MobilePhysio']."<br />";
*/
?>
</div>

<?php //include('sites/all/themes/evolve/commonFile/dashboardLeftNavigation.php');
apa_function_dashboardLeftNavigation_form();
?>
<div class="account_dashboard dashboard_content col-xs-12 col-sm-12 col-md-10 col-lg-10 background_<?php //echo $background; ?> autoscroll" id="dashboard-right-content">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dashboard_detail">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="col-xs-12"><span class="dashboard-name cairo" style="font-weight: 300;">Your account</span></div>
			<div class="col-xs-12 col-sm-6" style="display: none"><button class="dashboard-backgroud" data-target="#myModal" data-toggle="modal"><span class="customise_background">Customise your background</span><span class="customise_icon">[icon class="fa fa-cogs fa-x"][/icon]</span></button></div>
		</div>
    <?php
		//include('sites/all/themes/evolve/commonFile/customizeBackgroundImage.php');
		apa_function_customizeBackgroundImage_form();
		$workplaceSettingscode         = file_get_contents("sites/all/themes/evolve/json/WorkPlaceSettings.json");
		$workplaceSettings             = json_decode($workplaceSettingscode, true);
		$_SESSION["workplaceSettings"] = $workplaceSettings;
	?>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="col-xs-12 none-padding" >
				<div class="account-nav nav-chevron">
					<ul class="nav nav-tabs">
							<li id="yourdetail1">
								<a class="event1" style="cursor: pointer;">
									<span class="<?php if(!isset($_SESSION["paymentTabTag"]) && !isset($_POST["deleteID"]) && !isset($_POST["setCardID"]))echo 'text-underline';?> eventtitle1" id="yourdetails-tab">
										<strong>Your details</strong>
									</span>
								</a>
							</li>
							<?php if($details['MemberTypeID']!="1"): ?>
							<li id="yourdetail2">
								<a class="event2" style="cursor: pointer;">
									<span class="eventtitle2" id="membership">
										<strong>Membership</strong>
									</span>
								</a>
							</li>
							<?php endif;?>
							<li id="yourdetail3">
								<a class="event13" style="cursor: pointer;">
									<span class="eventtitle13 <?php if(isset($_SESSION["paymentTabTag"]) || isset($_POST["deleteID"]) || isset($_POST["setCardID"]))echo 'text-underline';?>" id="payment">
										<strong>Payment information</strong>
									</span>
								</a>
							</li>
							<?php if($details['MemberTypeID']!="31" && $details['MemberTypeID']!="32" && $details['MemberTypeID']!="1"): ?>
							<li id="yourdetail4">
								<a class="event3" style="cursor: pointer;">
									<span class="eventtitle3" id="workplace">
										<strong>Workplace</strong>
									</span>
								</a>
							</li>
							<?php endif; ?>
							<?php if($details['MemberTypeID']!="1"): ?>
							<li id="yourdetail5">
								<a class="event4" style="cursor: pointer;">
									<span class="eventtitle4" id="education">
										<strong>Education</strong>
									</span>
								</a>
							</li>
							<?php endif;?>
					</ul>
				</div>
			<form id="profile-details-form" action="<?php echo $url;?>" name="your-details" method="POST" novalidate>
			    <input type="hidden" name="step1" value="1"/>
				<input type="hidden" name="Specialty" value="<?php echo$details['Specialty'];?>">
				<div class="down1 account_container" id="account-details" <?php if(isset($_SESSION["paymentTabTag"]) || isset($_POST["deleteID"]) || isset($_POST["setCardID"]))echo 'style="display:none;"';?>>
					<div class="col-xs-12 none-padding none-margin">
						<div class="col-xs-12 none-margin">
							<h3 class="tab_title">Your details</h3>
						</div>
						<div class="col-xs-12 none-margin">
							<label class="note-text"><span class="tipstyle"> *</span>Required fields</label>
						</div>

							<div class="col-xs-6 col-md-2">
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

							<div class="col-xs-6 col-md-4">
								<label for="">Given name<span class="tipstyle"> *</span></label>
								<input type="text" class="form-control"  name="Firstname" <?php if (empty($details['Firstname'])) {echo "placeholder='Given name'";}   else{ echo 'value="'.$details['Firstname'].'"'; }?> required>
							</div>

							<div class="col-xs-12 col-sm-6 col-md-6">
								<label for="">Preferred name</label>
								<input type="text" class="form-control"  name="Preferred-name" <?php if (empty($details['Preferred-name'])) {echo "placeholder='Preferred name'";}   else{ echo 'value="'.$details['Preferred-name'].'"'; }?>>
							</div>

							<div class="col-xs-12 col-sm-6 col-md-6">
								<label for="">Middle name</label>
								<input type="text" class="form-control" name="Middle-name" <?php if (empty($details['Middle-name'])) {echo "placeholder='Middle name'";}   else{ echo 'value="'.$details['Middle-name'].'"'; }?>>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6">
								<label for="">Family name<span class="tipstyle"> *</span></label>
								<input type="text" class="form-control" name="Lastname" <?php if (empty($details['Lastname'])) {echo "placeholder='Family name'";}   else{ echo 'value="'.$details['Lastname'].'"'; }?> required>
							</div>

							<div class="col-xs-6 col-sm-6 col-md-3">
							<?php $birthdata = explode("/",$details['birth']);?>
                           <label for="">Date of birth<span class="tipstyle"> *</span></label>
                            <div class="dateselect">
                                <div class="chevron-select-box date">
                                    <select class="form-control" id="birthdate" name="birthdate">
                                        <option value="" selected disabled>Date</option>
                                       <?php
                                            $start_date = 1;
                                            $end_date   = 31;
                                            for( $j=$start_date; $j<=$end_date; $j++ ) {

                                                echo '<option value='.$j;
											    if($j ==$birthdata[2]) {echo " selected='selected'";}
												echo '>'.$j.'</option>';

                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="chevron-select-box month">
                                    <select class="form-control" id="birthmonth" name="birthmonth">
                                        <option value="" selected disabled>Month</option>
                                        <option value="01" <?php  if($birthdata[1] == "01") {echo "selected='selected'";}?>>Jan</option>
                                        <option value="02" <?php  if($birthdata[1] == "02") {echo "selected='selected'";}?>>Feb</option>
                                        <option value="03" <?php  if($birthdata[1] == "03") {echo "selected='selected'";}?>>Mar</option>
                                        <option value="04" <?php  if($birthdata[1] == "04") {echo "selected='selected'";}?>>Apr</option>
                                        <option value="05" <?php  if($birthdata[1] == "05") {echo "selected='selected'";}?>>May</option>
                                        <option value="06" <?php  if($birthdata[1] == "06") {echo "selected='selected'";}?>>Jun</option>
                                        <option value="07" <?php  if($birthdata[1] == "07") {echo "selected='selected'";}?>>Jul</option>
                                        <option value="08" <?php  if($birthdata[1] == "08") {echo "selected='selected'";}?>>Aug</option>
                                        <option value="09" <?php  if($birthdata[1] == "09") {echo "selected='selected'";}?>>Sep</option>
                                        <option value="10" <?php  if($birthdata[1] == "10") {echo "selected='selected'";}?>>Oct</option>
                                        <option value="11" <?php  if($birthdata[1] == "11") {echo "selected='selected'";}?>>Nov</option>
                                        <option value="12" <?php  if($birthdata[1] == "12") {echo "selected='selected'";}?>>Dec</option>
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

                                                echo '<option value='.$i;
												 if($i == $birthdata[0]) {echo " selected='selected'";}
												echo '>'.$i.'</option>';

                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

							<div class="col-xs-6 col-sm-6 col-md-3">
								<label for="">Gender</label>
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

						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6">
								<label>Aboriginal and Torres Strait Islander<span class="tipstyle"> *</span></label>
								<div class="chevron-select-box">
								<select class="form-control" id="Aboriginal" name="Aboriginal" required>
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

							<div class="col-xs-12">
								<label>Your dietary requirements</label>
								<div class="plus-select-box">
								<select id="Dietary" name="Dietary[]" data-placeholder="Your dietary requirements..." multiple>
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
							</div>
							 <?php
						if(!empty($details['PAdditionalLanguageID'])) {$PAdditionalLanguageID = explode(",",$details['PAdditionalLanguageID']); } else {$PAdditionalLanguageID =array();}

						?>
						<div class="col-xs-12">
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

						<div class="row">
							<div class="col-xs-12">
								<span class="light-lead-heading cairo" style="font-weight: 200; margin-bottom: 18px;">Phone numbers:</span>
								<label for="">Please enter at least one phone number</label>
								<span class="text-underline smaller-lead-heading" style="color: #000">Home</span>
							</div>
							<div class="col-xs-12 col-sm-3 col-md-6">
								<label for="">Country</label>
								<div class="chevron-select-box">
								<select class="form-control" id="country-code" name="country-code">
								<?php
									$countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
									$country=json_decode($countrycode, true);
								    usort($country, "cmp");

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
							<div class="col-xs-4 col-sm-3 col-md-2">
								<label for="">Area code</label>
								<input type="text" class="form-control" id="area-code" maxlength="5" onchange="areaCodeFunction(this.value)" name="area-code" <?php if (empty($details['Home-phone-areacode'])) {echo "placeholder='Area code'";}   else{ echo 'value="'.$details['Home-phone-areacode'].'"'; }?>>
							    <div id="areaMessage"></div>
							</div>
							<script>
								function areaCodeFunction(ps){
									if($('#area-code').val().length >= 6){
										$('#areaMessage').html("no more than 5 characters");
										$( "#area-code" ).focus();
										$("#area-code").css("border", "1px solid red");
										$("#your-details-submit-button").addClass("stop");

									}
									else{
										$('#areaMessage').html("");
										$( "#area-code" ).blur();
										$("#area-code").css("border", "");
										$("#your-details-submit-button").removeClass("stop");
									}
								}
							</script>
							<div class="col-xs-8 col-sm-6 col-md-4">
								<label for="">Phone number<span class="tipstyle"> *</span></label>
								<input type="text" class="form-control" name="phone-number" pattern="[0-9]{10}" <?php if (empty($details['Home-phone-number'])) {echo "placeholder='Phone number'";}   else{ echo 'value="'.$details['Home-phone-number'].'"'; }?> >
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12">
								<span class="text-underline smaller-lead-heading" style="color: #000">Mobile</span>
							</div>
							<div class="col-xs-12 col-sm-3 col-md-6">
								<label for="">Country</label>
								<div class="chevron-select-box">


								<select class="form-control" id="Mobile-country-code" name="Mobile-country-code" autocomplete="mobilecountry">
								<?php
									$countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
									$country=json_decode($countrycode, true);
									usort($country, "cmp");
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
							<div class="col-xs-8 col-sm-6 col-md-4">
								<label for="">Mobile number<span class="tipstyle"> *</span></label>
								<input type="text" class="form-control" name="Mobile-number" <?php if (empty($details['Mobile-number'])) {echo "placeholder='Mobile number'";}   else{ echo 'value="'.$details['Mobile-number'].'"'; }?>>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12">
								<span class="light-lead-heading cairo" style="font-weight: 200">Residential address:</span>
							</div>

							<div class="col-xs-12">
								<label for="">Building name</label>
								<input type="text" class="form-control"  name="BuildingName" <?php if (empty($details['Unit'])) {echo "placeholder='Building name'";}   else{ echo 'value="'.$details['BuildingName'].'"'; }?> autocomplete="Building-Name">
							</div>

							<div class="col-xs-12 col-sm-6 col-md-6">
								<label for="">PO Box</label>
								<input type="text" class="form-control" name="Pobox"  <?php if (!empty($details['Unit'])) {echo "placeholder='PO Box'";}   else{ echo 'value="'.$details['BuildingName'].'"'; }?> autocomplete="Pobox">
							</div>

							<div class="col-xs-12 col-sm-6 col-md-9">
								<label for="">Address line 1<span class="tipstyle pobox-stat"> *</span></label>
								<input type="text" class="form-control" name="Address_Line_1"  <?php if (empty($details['Unit'])) {echo "placeholder='Address 1'";}   else{ echo 'value="'.$details['Unit'].'"'; }?> required autocomplete="address-line1">
							</div>

							<div class="col-xs-12">
								<label for="">Address line 2</label>
								<input type="text" class="form-control" name="Address_Line_2"  <?php if (empty($details['Street'])) {echo "placeholder='Address 2'";}   else{ echo 'value="'.$details['Street'].'"'; }?> required autocomplete="address-line2">
							</div>

							<div class="col-xs-6 col-md-6">
								<label for="">City or town</label>
								<input type="text" class="form-control" name="Suburb" <?php if (empty($details['Suburb'])) {echo "placeholder='City or town'";}   else{ echo 'value="'.$details['Suburb'].'"'; }?> autocomplete="address-level2">
							</div>

							<div class="col-xs-6 col-md-6">
								<label for="">Postcode<span class="tipstyle"> *</span></label>
								<input type="text" class="form-control" name="Postcode"  <?php if (empty($details['Postcode'])) {echo "placeholder='Postcode'";}   else{ echo 'value="'.$details['Postcode'].'"'; }?> required autocomplete="postal-code">
							</div>

							<div class="col-xs-6 col-md-6">
								<label for="">State</label>
								<div class="chevron-select-box">
								<select class="form-control" id="State1" name="State" required autocomplete="address-level1">
									<option value="" <?php if (empty($details['State'])) echo "selected='selected'";?> disabled> State </option>
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

							<div class="col-xs-6 col-md-6">
								<label for="">Country<span class="tipstyle"> *</span></label>
								<div class="chevron-select-box">
								<select class="form-control" id="Country1" name="Country" required autocomplete="country">
								<?php
								$countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
								$country=json_decode($countrycode, true);
                                usort($country, "cmp");
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
						<!--put code here-->


						<div class="row payment-line flex-column">
                            <div class="col-xs-12">
                                <span class="light-lead-heading cairo" style="font-weight: 200">Mailing address:</span>
                            </div>

                            <div class="col-xs-12 col-md-12 align-item-end">
                                <input class="styled-checkbox" type="checkbox" id="Mailing-address"
                                    name="Mailing-address">
                                <label style="font-weight: 300;" for="Mailing-address">Use my residential
                                    address</strong></label>
                            </div>
                        </div>

                        <div class="row" id="mailing-address-block">
                            <div class="col-xs-12">
                                <label for="">Building name</label>
                                <input type="text" class="form-control" name="Mailing-BuildingName"
                                    id="Mailing-BuildingName"
                                    <?php if (empty($details['Mailing-unitno'])) {echo "placeholder='Building Name'";}   else{ echo 'value="'.$details['Mailing-BuildingName'].'"'; }?>
                                    autocomplete="Building-Name">
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <label for="">PO Box</label>
                                <input type="text" class="form-control" name="Mailing-PObox" id="Mailing-PObox"
                                    <?php if (!empty($details['Mailing-unitno'])) {echo "placeholder='PObox'";}   else{ echo 'value="'.$details['Mailing-BuildingName'].'"'; }?>
                                    autocomplete="Pobox">
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-9">
                                <label for="">Address line 1</label>
                                <input type="text" class="form-control" name="Mailing-Address_Line_1"
                                    id="Mailing-Address_Line_1"
                                    <?php if (empty($details['Mailing-unitno'])) {echo "placeholder='Address line 1'";}   else{ echo 'value="'.$details['Mailing-unitno'].'"'; }?>
                                    required autocomplete="address-line1">
                            </div>

                            <div class="col-xs-12">
                                <label for="">Address line 2</label>
                                <input type="text" class="form-control" name="Mailing-Address_Line_2"
                                    id="Mailing-Address_Line_2"
                                    <?php if (empty($details['Mailing-streetname'])) {echo "placeholder='Address line 2'";}   else{ echo 'value="'.$details['Mailing-streetname'].'"'; }?>
                                    autocomplete="address-line2">
                            </div>

                            <div class="col-xs-6 col-md-6">
                                <label for="">City or town</label>
                                <input type="text" class="form-control" name="Mailing-city-town" id="Mailing-city-town"
                                    <?php if (empty($details['Mailing-city-town'])) {echo "placeholder='City or town'";}   else{ echo 'value="'.$details['Mailing-city-town'].'"'; }?>
                                    required autocomplete="address-level2">
                            </div>

                            <div class="col-xs-6 col-md-6">
                                <label for="">Postcode</label>
                                <input type="text" class="form-control" name="Mailing-postcode" id="Mailing-postcode"
                                    <?php if (empty($details['Mailing-postcode'])) {echo "placeholder='Postcode'";}   else{ echo 'value="'.$details['Mailing-postcode'].'"'; }?>
                                    required autocomplete="postal-code">
                            </div>

                            <div class="col-xs-6 col-md-6">
                                <label for="">State</label>
                                <div class="chevron-select-box">
                                    <select class="form-control" name="Mailing-State" id="State2" required
                                        autocomplete="address-level1">
                                        <option value=""
                                            <?php if (empty($details['Mailing-state'])) echo "selected='selected'";?>
                                            disabled> State </option>
                                        <?php
								$statecode  = file_get_contents("sites/all/themes/evolve/json/State.json");
								$State=json_decode($statecode, true);
								foreach($State  as $key => $value){
								echo '<option value="'.$State[$key]['Abbreviation'].'"';
								if ($details['Mailing-state'] == $State[$key]['Abbreviation']){ echo "selected='selected'"; }
								echo '> '.$State[$key]['Abbreviation'].' </option>';

								}
								?>

                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-6 col-md-6">
                                <label for="">Country</label>
                                <div class="chevron-select-box">
                                    <select class="form-control" id="Country2" name="Mailing-Country" required
                                        autocomplete="country">
                                        <?php
							$countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
							$country=json_decode($countrycode, true);
							 usort($country, "cmp");
							foreach($country  as $key => $value){

								echo '<option class="CountryOption'.$country[$key]['ID'].'" value="'.$country[$key]['Country'].'"';
								if ($details['Mailing-country'] == $country[$key]['Country']){ echo "selected='selected'"; }
								elseif(empty($details['Mailing-country']) && $country[$key]['ID']=="14"){
											echo "selected='selected'";
									}
								echo '> '.$country[$key]['Country'].' </option>';
							}
							?>
                                    </select>
                                </div>
                            </div>
                        </div>
						<!--put code here-->

					</div>

					<!--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">   <a class="join-details-button1"><span class="dashboard-button-name">Next</span></a></div>-->
				</div>
				<div class="down2 account_container" id="account-membership" style="display:none;" >
						<input type="hidden"  name="Status" value="<?php echo $details['Status'];?>">
						<div class="col-xs-12 none-margin">
							<h3 class="tab_title">Membership</h3>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6">
							<label for="">Member ID (Your email address)<span class="tipstyle"> *</span></label>
							<input type="text" class="form-control" name="Memberid"  <?php if (empty($details['Memberid'])) {echo "placeholder='Member ID(Your email address)'";}   else{ echo 'value="'.$details['Memberid'].'"'; }?> readonly>
						</div>
						<div class="col-xs-12 desktop-hidden">
							<span class="note-text">Note: </span>to update your email address, please contact the APA member hub via email at <a href="mailto:info@australian.physio" target="_self">info@australian.physio</a> or phone on <a href="tel:1300 306 622" target="_self">1300 306 622</a>.
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6">
							<label for="">Member category<span class="tipstyle"> *</span></label>
							<div class="chevron-select-box">
							<select class="form-control" id="MemberType" name="MemberType" disabled>
								<option value="" <?php if (empty($details['MemberTypeID']) || $details['MemberTypeID']=="1") echo "selected='selected'";?> disabled>Member Category</option>
								<?php

								$MemberTypecode  = file_get_contents("sites/all/themes/evolve/json/MemberType.json");
								$MemberType=json_decode($MemberTypecode, true);
								foreach($MemberType  as $key => $value){
									echo '<option value="'.$MemberType[$key]['ID'].'"';
									if ($details['MemberTypeID'] == $MemberType[$key]['ID']){ echo "selected='selected'"; }

									echo '> '.$MemberType[$key]['Name'].' </option>';
								}
								?>
							</select>
							</div>
						</div>

						<div class="col-xs-12 mobile-hidden">
							<span class="note-text">Note: </span>to update your email address, please contact the APA member hub via email at <a href="mailto:info@australian.physio" target="_self">info@australian.physio</a> or phone on <a href="tel:1300 306 622" target="_self">1300 306 622</a>.
						</div>

						<div class="col-xs-12 col-sm-6 col-md-6">
							<label for="">AHPRA number</label>
							<input type="text" class="form-control" name="Ahpranumber"  <?php if (empty($details['Ahpranumber'])) {echo "placeholder='AHPRA number'";}   else{ echo 'value="'.$details['Ahpranumber'].'"'; }?>>
						</div>

						<div class="col-xs-12">
							<label for="">Your National Group</label>
							<div class="plus-select-box">
							<select id="Nationalgp" name="Nationalgp[]" multiple disabled data-placeholder="Choose from our 21 National Groups">
							<?php
							// get national group from Aptify via webserice return Json data;
							// 2.2.19 - get national group
							// Send -
							// Response - national group
							$nationalGroupsCode= file_get_contents("sites/all/themes/evolve/json/NationalGroup__c.json");
							$nationalGroups=json_decode($nationalGroupsCode, true);
							?>
							<?php
								$sendData["UserID"] = $_SESSION["UserId"];
								$NGdetail = aptify_get_GetAptifyData("20", $sendData);
								$NGresults = $NGdetail["results"];
								foreach($nationalGroups as $key=>$value) {
								   echo '<option value="'.$nationalGroups[$key]["ID"].'"';
								   foreach($NGresults as $detailNG){
								   if (in_array( $nationalGroups[$key]["ID"],$detailNG)){ echo "selected='selected'"; } }
								   echo '> '.$nationalGroups[$key]["Name"].' </option>';
								}
							?>
							</select>
							</div>
						</div>

						<div class="col-xs-12 col-md-6">
							<label for=""><?php if(!empty($details['State'])) {echo "You are in the &nbsp;".$details['State']."&nbsp;Branch. <br/>Would you like to add an additional Branch?";} else { echo "Would you like to add an additional Branch?";}?></label>
							<div class="chevron-select-box">
							<select class="form-control" name="Branch" id="Branch">
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
					    <?php
						if(!empty($details['PSpecialInterestAreaID'])) {$PSpecialInterestAreaID = explode(",",$details['PSpecialInterestAreaID']); } else {$PSpecialInterestAreaID =array();}

						?>
						<div class="col-xs-12">
							<label>Choose one or more interest areas below:</label>
							<div class="plus-select-box">
							<select id="interest-area" name="SpecialInterest[]" multiple  tabindex="-1" data-placeholder="Choose interest area..."data-placeholder="Choose interest area...">
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
							    if (in_array($interestAreas[$key]["ID"],$PSpecialInterestAreaID)){ echo "selected='selected'"; }
								echo '> '.$interestAreas[$key]["Name"].' </option>';

							 }

							?>
							</select>
							</div>
						</div>
				</div>
				<div class="down13 account_container" id="account-payment" <?php if(!isset($_SESSION["paymentTabTag"]) && !isset($_POST["deleteID"]) && !isset($_POST["setCardID"])) {echo 'style="display:none;"';}?> >
				<?php
					// 2.2.12 - GET payment listing
					// Send -
					// UserID
					// Response -
					// Credit cards details [Credit card ID, Payment-method,
					// Name on card, Digits, Exp date, Roll over],  Main card
					$test['id'] = $_SESSION["UserId"];
					$cardsnum = aptify_get_GetAptifyData("12", $test);
					unset($_SESSION["paymentTabTag"]);
				?>
					<div class="row" >
						<div class="col-xs-12 none-margin">
							<h3 class="tab_title">Payment information</h3>
						</div>

						<div class="col-xs-12 none-margin">
							<label class="black-underline-link" style="text-decoration: none;">Credit card</label>
							<input type="hidden" id="defaultCard" value="">
							<div class="paymentsidecredit">
								<div class="row">
								<fieldset class="col-xs-12 col-sm-6 none-padding" id="cardinfo">
									<div class="chevron-select-box">
									<select class="form-control" id="Paymentcard" name="Paymentcard" style="width:100%;">
									<?php
									if (sizeof($cardsnum)!=0) {
										foreach( $cardsnum["results"] as $cardnum) {
											echo '<option value="'.$cardnum["Creditcards-ID"].'"';
											if($cardnum["IsDefault"]=="1") {
											echo "selected ";
										}
										echo 'data-class="'.$cardnum["Payment-Method"].'" class="'.'c'.str_replace("/","",$cardnum["Expiry-date"]).'">____ ____ ____ ';
										echo $cardnum["Digitsnumber-Cardtype-Default"].'</option>';
										}
									}
									?>
									</select>
									</div>
								</fieldset>
								</div>
								<a class="deletecardbutton black-underline-link">Delete selected</a>
								<a id="addPaymentCard" class="black-underline-link">Add another card</a>
								<a class="black-underline-link" id="setCardButton">Save this as your preferred payment method</a>
							</div>
						</div>
					</div>

						<script type="text/javascript">
						jQuery(document).ready(function($) {
							$("#defaultCard").val($('#Paymentcard').val());
							$(".deletecardbutton").click(function() {
								var CardID = $("#Paymentcard").val();
								$("#deleteID").val(CardID);
								if($("#defaultCard").val()==CardID){
									$('#deletecardMessage').html("Sorry, you cannot delete this card.");
									$('#deleteCardWindow #checkMessage').removeClass('display-none');
									$('#deleteCardForm button').addClass("stop").hide();
									$('#deleteCardWindow a.no').html('Okay');
								}
								else{
									$('#deletecardMessage').html("Are you sure you want to delete this card?");
									$('#deleteCardWindow #checkMessage').addClass('display-none');
									$('#deleteCardForm button').removeClass("stop").show();
									$('#deleteCardWindow a.no').html('No');
								}
							});
							$(".updatecard").click(function() {
								var CardID = $("#Paymentcard").val();
								$("#selectedCard").val(CardID);
							});
							$("#setCardButton").click(function() {
								var CardID = $("#Paymentcard").val();
								$("#setCardID").val(CardID);
							});
						});
						</script>

						<!--<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<a  style="cursor: pointer; color:white;" id="rolloverButton">Change your roll over status</a>

						</div>-->



				</div>


				<input id="wpnumber" type="hidden" name="wpnumber" value="<?php  if(sizeof($details['Workplaces'])!=0) {$wpnumber =  sizeof($details['Workplaces']); echo  $wpnumber;} else {$wpnumber =0; echo $wpnumber;} ?>"/>
				<input id="maxumnumber" type="hidden" name="maxumnumber" value="<?php  if(sizeof($details['Workplaces'])!=0) {$wpnumber =  sizeof($details['Workplaces']); echo  $wpnumber;} else {$wpnumber =0; echo $wpnumber;} ?>">

				<div class="down3 account_container" id="account-workplace" style="display:none;">
						<!--<div class="col-xs-12">
							<input class="styled-checkbox" type="checkbox" name="Findpublicbuddy" id="Findpublicbuddy" value="<?php  echo $details['Findpublicbuddy'];?>" <?php //if($details['Findpublicbuddy']=="True"){echo "checked";} ?>>
							<label  style="font-weight: 300" for="Findpublicbuddy"><span class="note-text">NOTE: </span>Please list my details in the public (visbile to other health professionals)</label>
						</div>-->
					<div class="col-xs-12 none-margin">
						<h3 class="tab_title">Workplace</h3>
					</div>
					<?php
						// variables
						$countrycode = file_get_contents("sites/all/themes/evolve/json/Country.json");
						$country = json_decode($countrycode, true);
						usort($country, "cmp");

						$AusStringCountry = "";
						foreach($country as $pair => $value){
							$AusStringCountry .= '<option class="CountryOption0" value="'.$country[$pair]['Country'].'"';
							if ($country[$pair]['Country'] == "Australia"){ $AusStringCountry .= "selected='selected'"; }
							$AusStringCountry .= '> '.$country[$pair]['Country'].' </option>';
						}

						$AusStringCountryCode = "";
						$countser = 0;
						foreach($country  as $wcpair => $value){
							$AusStringCountryCode .= '<option value="'.$country[$wcpair]['TelephoneCode'].'"';
							if ($country[$wcpair]['ID']=="14"){	$AusStringCountryCode .= "selected='selected'"; }
							$AusStringCountryCode .= '> '.$country[$wcpair]['Country'].' </option>';
						}

						function countryLoop($countryInput, $keys, $AusString) {
							$returnString = "";
							if($countryInput == "Australia") {
								$returnString = $AusString;
							} else {
								foreach($country  as $pair => $value){
									$returnString .= '<option class="CountryOption'.$country[$keys]['ID'].'" value="'.$country[$pair]['Country'].'"';
									if ($countryInput == $country[$pair]['Country']){ $returnString  .= "selected='selected'"; }
									elseif(empty($countryInput) && $country[$pair]['ID']=="14"){
										$returnString  .= "selected='selected'";
									}
									$returnString  .= '> '.$country[$pair]['Country'].' </option>';
								}
							}
							return $returnString;
						}

						function countryCodeLoop($countryInput, $keys, $AusString) {
							$returnString = "";
							if($countryInput == "Australia") {
								$returnString = $AusString;
							} else {
								$countser = 0;
								foreach($country  as $wcpair => $value){
									echo '<option value="'.$country[$wcpair]['TelephoneCode'].'"';
									if ($countryInput == preg_replace('/\s+/', '', $country[$wcpair]['TelephoneCode']) && $countser == 0) { echo "selected='selected'"; $countser++;}
									elseif(empty($countryInput) && $country[$wcpair]['ID']=="14"){
										echo "selected='selected'";
									}
									echo '> '.$country[$wcpair]['Country'].' </option>';
								}
							}
							return $returnString;
						}
					?>

					<div class="col-xs-12 workplace_nav">
						<a class="add-workplace-join" href="#"><span class="icon plus_circle"></span><span>Add</span></a>
						<ul class="nav nav-tabs" id="tabmenu">
						<?php foreach( $details['Workplaces'] as $key => $value ):  ?>
							<li <?php if($key=='Workplace0') echo 'class ="active prewp'.$key.'"';?> id="workplaceli<?php echo $key;?>">
								<a data-toggle="tab" href="#workplace<?php echo $key;?>">
									<?php $newkey =$key+1; echo "Workplace ".$newkey;?>
									<span class="calldeletewp<?php echo $key;?>"></span>
								</a>
							</li>
						<?php endforeach; ?>
						</ul>
					</div>

			 <div id="workplaceblocks">

				<?php // stopper
				$temMax = 12; $workCounter = 1;
				foreach( $details['Workplaces'] as $key => $value ):
					if($workCounter > $temMax) {break;}
					$workCounter++;
				 ?>
					<div id="workplace<?php echo $key;?>" class='tab-pane fade prewp<?php echo $key;?>  <?php if($key=='0') echo "in active ";?> '>
					    <input type="hidden" name="WorkplaceID<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['WorkplaceID'];?>">
					<?php if($details['MemberTypeID']!="17" && $details['MemberTypeID']!="18" && $details['MemberTypeID']!="21" && $details['MemberTypeID']!="22" && $details['MemberTypeID']!="31" && $details['MemberTypeID']!="32" && $details['MemberTypeID']!="34" && $details['MemberTypeID']!="35" && $details['MemberTypeID']!="36" && $details['MemberTypeID']!="37") :?>
					<div class="row FapTagC">
						<div class="col-xs-12">
							<input class="styled-checkbox" type="checkbox" name="Findabuddy<?php echo $key;?>" id="Findabuddy<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Find-a-buddy'];?>" <?php if($details['Workplaces'][$key]['Find-a-buddy']=="True"){echo "checked";} ?>>
							<label class="highlight_checkbox" style="font-weight: 300" for="Findabuddy<?php echo $key;?>">I want to be listed at this workplace within Find a Physio on the corporate <span class="note-text">australian.physio</span> site</label>
						</div>

						<div class="col-xs-12">
							<input class="styled-checkbox" type="checkbox" name="Findphysio<?php echo $key;?>" id="Findphysio<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Findphysio'];?>" <?php if($details['Workplaces'][$key]['Findphysio']=="True"){echo "checked";} ?>>
							<label class="highlight_checkbox" style="font-weight: 300" for="Findphysio<?php echo $key;?>">I want to be listed at this workplace within Find a Physio on the consumer <span class="note-text">choose.physio</span> site</label>
						</div>
					</div>
					<?php endif;?>
							<div class="col-xs-12">
								<label for="Name-of-workplace">Practice name<span class="tipstyle"> *</span></label>
								<input type="text" class="form-control" name="Name-of-workplace<?php echo $key;?>" id="Name-of-workplace<?php echo $key;?>" <?php if (empty($details['Workplaces'][$key]['Name-of-workplace'])) {echo "placeholder='Name of workplace'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Name-of-workplace'].'"'; }?>>
							</div>

							<div class="col-xs-12">
	 							<label for="BuildingName">Building name</label>
                                <input type="text" class="form-control" name="WBuildingName<?php echo $key;?>" id="WBuildingName<?php echo $key;?>" <?php if (empty($details['Workplaces'][$key]['WBuildingName'])) {echo "placeholder='Building Name'";}   else{ echo 'value="'.$details['Workplaces'][$key]['WBuildingName'].'"'; }?>>
                            </div>

							<div class="col-xs-12 col-md-6">
								<label for="WAddress_Line_1<?php echo $key;?>">Address line 1<span class="tipstyle"> *</span></label>
								<input type="text" class="form-control" name="WAddress_Line_1<?php echo $key;?>" id="WAddress_Line_1<?php echo $key;?>"  <?php if (empty($details['Workplaces'][$key]['Address_Line_1'])) {echo "placeholder='Address line 1'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Address_Line_1'].'"'; }?> required>
							</div>

							<div class="col-xs-12 col-md-6">
								<label for="WAddress_Line_2<?php echo $key;?>">Address line 2</label>
								<input type="text" class="form-control" name="WAddress_Line_2<?php echo $key;?>" id="WAddress_Line_2<?php echo $key;?>"  <?php if (empty($details['Workplaces'][$key]['Address_Line_2'])) {echo "placeholder='Address line 2'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Address_Line_2'].'"'; }?>>
							</div>

						<div class="row">
							<div class="col-xs-6 col-md-6">
								<label for="Wcity<?php echo $key;?>">City or town<span class="tipstyle"> *</span></label>
								<input type="text" class="form-control" name="Wcity<?php echo $key;?>" id="Wcity<?php echo $key;?>"  <?php if (empty($details['Workplaces'][$key]['Wcity'])) {echo "placeholder='City or town'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Wcity'].'"'; }?> required>
							</div>

							<div class="col-xs-6 col-md-6">
								<label for="Wpostcode<?php echo $key;?>">Postcode<span class="tipstyle"> *</span></label>
								<input type="text" class="form-control" name="Wpostcode<?php echo $key;?>" id="Wpostcode<?php echo $key;?>"  <?php if (empty($details['Workplaces'][$key]['Wpostcode'])) {echo "placeholder='Postcode'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Wpostcode'].'"'; }?> required>
							</div>

							<div class="col-xs-6 col-md-6">
								<label for="Wstate<?php echo $key;?>">State</label>
								<div class="chevron-select-box">
								<select class="form-control" id="Wstate<?php echo $key;?>" name="Wstate<?php echo $key;?>" required>
									<option value="" <?php if (empty($details['Workplaces'][$key]['Wstate'])) echo "selected='selected'";?> disabled>State</option>
									<?php
									$statecode  = file_get_contents("sites/all/themes/evolve/json/State.json");
									$State=json_decode($statecode, true);
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

							<div class="col-xs-6 col-md-6">
								<label for="Wcountry<?php echo $key;?>">Country<span class="tipstyle"> *</span></label>
								<div class="chevron-select-box">
								<select class="form-control" id="Wcountry<?php echo $key;?>" name="Wcountry<?php echo $key;?>" required>
								<?php
									$countryList = countryLoop($details['Workplaces'][$key]['Wcountry'], $key, $AusStringCountry);
									echo $countryList;
								?>
								</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6">
								<label for="Wemail<?php echo $key;?>">Workplace email</label>
								<input type="email" class="form-control" name="Wemail<?php echo $key;?>" id="Wemail<?php echo $key;?>"  <?php if (empty($details['Workplaces'][$key]['Wemail'])) {echo "placeholder='Workplace email'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Wemail'].'"'; }?> required>
								<div id="EmailMessage<?php echo $key;?>"></div>
							</div>

							<div class="col-xs-12 col-sm-6 col-md-6">
								<label for="Wwebaddress<?php echo $key;?>">Website</label>
								<input type="text" class="form-control" name="Wwebaddress<?php echo $key;?>" id="Wwebaddress<?php echo $key;?>"  <?php if (empty($details['Workplaces'][$key]['Wwebaddress'])) {echo "placeholder='Website'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Wwebaddress'].'"'; }?> required>
							</div>

						</div>

						<div class="row">

							<div class="col-xs-6 col-md-3">
								<label for="">Country code</label>
								<div class="chevron-select-box">
								<select class="form-control" id="WPhoneCountryCode<?php echo $key;?>" name="WPhoneCountryCode<?php echo $key;?>">
									<?php
										$countryList = countryCodeLoop($details['Workplaces'][$key]['Wcountry'], $key, $AusStringCountryCode);
										echo $countryList;
									?>
								</select>
							</div>
							</div>

							<div class="col-xs-6 col-md-3">
								<label for="">Area code</label>
								<input type="text" class="form-control" name="WPhoneAreaCode<?php echo $key;?>" <?php if (empty($details['Workplaces'][$key]['WPhoneAreaCode'])) {echo "placeholder='Phone area code'";}   else{ echo 'value="'.$details['Workplaces'][$key]['WPhoneAreaCode'].'"'; }?>  maxlength="5">
							</div>
							<div class="col-xs-6 col-md-3">
								<label for="">Phone number<span class="tipstyle">*</span></label>
								<input type="number" class="form-control" name="Wphone<?php echo $key;?>" <?php if (empty($details['Workplaces'][$key]['WPhone'])) {echo "placeholder='Phone number'";}   else{ echo 'value="'.$details['Workplaces'][$key]['WPhone'].'"'; }?>>
							</div>
						</div>


						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6">
								<label>Quality In practice number&nbsp;(QIP)</label>
								<input type="text" class="form-control" name="QIP<?php echo $key;?>" id="QIP<?php echo $key;?>"  <?php if (empty($details['Workplaces'][$key]['QIP'])) {echo "placeholder='QIP Number'";}   else{ echo 'value="'.$details['Workplaces'][$key]['QIP'].'"'; }?>>
							</div>
						</div>

						<div class="row label-list">
							<div class="col-xs-12" style="margin-top: 18px">
								<label>What services does this workplace provide?</label>
							</div>

							<div class="col-xs-12 col-sm-6 col-md-6">
								<input class="styled-checkbox" type="checkbox" name="Electronic-claiming<?php echo $key;?>" id="Electronic-claiming<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Electronic-claiming'];?>" <?php if($details['Workplaces'][$key]['Electronic-claiming']=="True"){echo "checked";} ?>>
								<label class="light-font-weight" for="Electronic-claiming<?php echo $key;?>">Electronic claiming</label>
							</div>

							<div class="col-xs-12 col-sm-6 col-md-6">
								<input class="styled-checkbox" type="checkbox" name="Departmentva<?php echo $key;?>" id="Departmentva<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Departmentva'];?>" <?php if($details['Workplaces'][$key]['Departmentva']=="True"){echo "checked";} ?>>
								<label class="light-font-weight" for="Departmentva<?php echo $key;?>">Department of Vetarans' Affairs</label>
							</div>

							<div class="col-xs-12 col-sm-6 col-md-6">
								<input class="styled-checkbox" type="checkbox" name="Workerscompensation<?php echo $key;?>" id="Workerscompensation<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Workerscompensation'];?>" <?php if($details['Workplaces'][$key]['Workerscompensation']=="True"){echo "checked";} ?>>
								<label class="light-font-weight" for="Workerscompensation<?php echo $key;?>">Workers compensation</label>
							</div>

							<div class="col-xs-12 col-sm-6 col-md-6">
								<input class="styled-checkbox" type="checkbox" name="Motora<?php echo $key;?>" id="Motora<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Motora'];?>" <?php if($details['Workplaces'][$key]['Motora']=="True"){echo "checked";} ?>>
								<label class="light-font-weight" for="Motora<?php echo $key;?>">Motor accident compensation</label>
							</div>

							<div class="col-xs-12 col-sm-6 col-md-6">
								<input class="styled-checkbox" type="checkbox" name="Medicare<?php echo $key;?>" id="Medicare<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Medicare'];?>" <?php if($details['Workplaces'][$key]['Medicare']=="True"){echo "checked";} ?>>
								<label class="light-font-weight" for="Medicare<?php echo $key;?>">Medicare Chronic Disease Management</label>
							</div>

							<div class="col-xs-12 col-sm-6 col-md-6">
								<input class="styled-checkbox" type="checkbox" name="Homehospital<?php echo $key;?>" id="Homehospital<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Homehospital'];?>" <?php if($details['Workplaces'][$key]['Homehospital']=="True"){echo "checked";} ?>>
								<label class="light-font-weight" for="Homehospital<?php echo $key;?>">Home and hospital visits</label>
						    </div>

							<div class="col-xs-12 col-sm-6 col-md-6">
								<input class="styled-checkbox" type="checkbox" name="MobilePhysio<?php echo $key;?>" id="MobilePhysio<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['MobilePhysio'];?>" <?php if($details['Workplaces'][$key]['MobilePhysio']=="True"){echo "checked";} ?>>
								<label class="light-font-weight" for="MobilePhysio<?php echo $key;?>">Mobile physiotherapist</label>
							</div>
              <div class="col-xs-12 col-sm-6 col-md-6">
                <input class="styled-checkbox" type="checkbox" name="NDIS<?php echo $key;?>" id="NDIS<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['NDIS'];?>" <?php if($details['Workplaces'][$key]['NDIS']=="True"){echo "checked";} ?>>
                <label class="light-font-weight" for="NDIS<?php echo $key;?>">NDIS</label>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-6">
                <input class="styled-checkbox" type="checkbox" name="Telehealth<?php echo $key;?>" id="Telehealth<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Telehealth'];?>" <?php if($details['Workplaces'][$key]['Telehealth']=="True"){echo "checked";} ?>>
                <label class="light-font-weight" for="Telehealth<?php echo $key;?>">Telehealth</label>
              </div>
						</div>

						<div class="row">

							<div class="col-xs-12 col-md-6">
								<label>Workplace setting<span class="tipstyle">*</span></label>
								<div class="chevron-select-box">
								<select class="form-control" id="Workplace-setting<?php echo $key;?>" name="Workplace-setting<?php echo $key;?>" required>
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

							<div class="col-xs-12 col-sm-6 col-md-6">
								<label>Numbers of hours worked<span class="tipstyle"> *</span></label>
								<div class="chevron-select-box">
								<select class="form-control" id="Number-worked-hours<?php echo $key;?>" name="Number-worked-hours<?php echo $key;?>" required>

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
		</div>

			<div class="down4 account_container" id="account-education" style="display:none;" >
			<div class="col-xs-12 none-margin">
				<h3 class="tab_title">Education</h3>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12"><p>Please note: all education undertaken with the APA or APC will already be recorded on your profile.</p></div>
			<input type="hidden" id="addtionalNumber" name="addtionalNumber" value="<?php  if(sizeof($details['PersonEducation'])!=0) { $addtionalNumber =  sizeof($details['PersonEducation']);} else{ $addtionalNumber =0;} echo  $addtionalNumber;  ?>"/>
			<input type="hidden" id="educationMaxNumber" name="educationMaxNumber" value="<?php  if(sizeof($details['PersonEducation'])!=0) {$educationMaxNumber =  sizeof($details['PersonEducation']);} else{ $educationMaxNumber =0;} echo  $educationMaxNumber;  ?>"/>
				<div id="additional-qualifications-block">
				<?php foreach($details['PersonEducation'] as $key => $value) :?>

					<div id="additional<?php echo $key;?>">
					    <input type="hidden" name="ID<?php echo $key;?>" value="<?php  echo $details['PersonEducation'][$key]['ID'];?>">

						<div class="col-xs-12 space-line"><div class="col-xs-12 separater"></div></div>

							<div class="col-xs-12 col-sm-6 col-md-6">
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

							<div class="col-xs-12">
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

						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<label for="Ugraduate-yearattained<?php echo $key;?>">Year attained or expected graduation date<span class="tipstyle"> *</span></label>
								<div class="chevron-select-box">
								<select class="form-control" name="Ugraduate-yearattained<?php echo $key;?>" id="Ugraduate-yearattained<?php echo $key;?>">
								<?php
								$y = date("Y") + 10;
								for ($i=$y; $i>= 1940; $i--){
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

							<div class="col-xs-6 col-sm-6 col-md-6">
								<label for="Ugraduate-country<?php echo $key;?>">Country</label>
								<div class="chevron-select-box">
								<select class="form-control" id="Ugraduate-country<?php echo $key;?>" name="Ugraduate-country<?php echo $key;?>">
								<?php
								$countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
								$country=json_decode($countrycode, true);
								 usort($country, "cmp");
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
						</div>
						<div class="col-xs-12"><a class="callDeleteEdu" id="deleteEducation<?php echo $key;?>"><span class="icon delete_icon"></span> Delete</a></div>
					</div>

				<?php endforeach;?>
				<?php if(sizeof($details['PersonEducation'])==0):?>
					<div class="col-xs-12 col-sm-12 col-md-12" id="educationNotice"><p>Please add your qualifications or click submit to continue</p></div>
				<?php endif; ?>
				</div>

				<div class="col-xs-12">
						<a class="add-additional-qualification"><span class="icon plus_circle"></span>Add qualification</a>
				</div>
			</div>
		<div class="col-xs-12" id="your-details-button">   <button type="submit" id="your-details-submit-button" ><span class="dashboard-button-name">Submit</span></button></div>
	</form>

	<!-- UPDATE PASSWORD -->
		<form id="changePasswordForm">
			<div class="down7" style="display:none;" >
				<div class="row">
					<div class="col-xs-12 col-md-6">
						<input type="password" class="form-control" placeholder="Current password" value="" name="Password">
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-md-6">
						<input type="password" class="form-control" placeholder="New password" id="New_password" name="New_password">
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-md-6">
						<input type="password" class="form-control" placeholder="Confirm password" id="Confirm_password" name="Confirm_password">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding:0;">   <button  class="dashboard-button dashboard-bottom-button change-password-button"><span class="dashboard-button-name">Save</span></button></div>
			</div>
		</form>
	<!-- END UPDATE PASSWORD -->

		<!-- ADD PAYMENT CARD FORM -->
	<div id="addPaymentCardForm-container" style="display:none;">
		<span class="close-popup"></span>
		<div id="addPaymentCardForm">
			<?php //apa_payment_card_form();
			// print drupal_render(drupal_get_form('apa_payment_card_form')));
			$the_form = drupal_get_form('apa_create_payment_card_form');
             print drupal_render($the_form);
			?>
		</div>
	</div>
	<!-- END ADD PAYMENT CARD FORM -->

		<!-- ROLL OVER POPUP -->
		<div id="rollOverWindow" style="display:none;">
			<form action="your-details?action=rollover" method="POST" id="rollOverForm">
				<h3>Are you sure you do want to change roll over status next year?</h3>
				<input type="hidden" name="selectedCard">
				<label for="rollover">Roll over</label><input type="checkbox" id="rollover" checked>
				<input type="submit" value="Yes">
				<a target="_self" class="cancelDeleteButton">No</a>
			</form>
		</div>
		<!-- END ROLL OVER POPUP -->

		<!-- DELETE PAYMENT CARD POPUP -->
		<div id="deleteCardWindow" style="display:none;">
			<form action="your-details" method="POST" id="deleteCardForm">
				<h3 id="deletecardMessage" class="light-lead-heading cairo">Are you sure you want to delete this card?</h3>
				<div id="checkMessage" class="display-none">
					<span>We are not able to delete these payment details.</span><br>
					<span>Please select another card as your default payment method before deleting this one.</span>
				</div>
				<input type="hidden" name="deleteID" id="deleteID" value="">
				<div class="flex-cell buttons-container">
					<button class="yes accent-btn" type="submit" value="yes">Yes</button>
					<a class="no accent-btn cancelDeleteButton" value="no" target="_self">No</a>
				</div>
			</form>
		</div>
		<!-- END DELETE PAYMENT CARD POPUP -->

		<!-- SET PAYMENT CARD POPUP -->
		<div id="setCardWindow" style="display:none;">
			<form action="your-details" method="POST" id="setCardForm">
				<h3 class="light-lead-heading cairo">Are you sure you do want to save this card for future purposes?</h3>
				<input type="hidden" name="setCardID" id="setCardID" value="">
				<div class="flex-cell buttons-container">
					<button class="yes accent-btn" type="submit" value="yes">Yes</button>
					<a class="no accent-btn cancelDeleteButton" value="no" target="_self">No</a>
				</div>
			</form>
		</div>
		<!-- END SET PAYMENT CARD POPUP -->

		<!-- UPDATE PAYMENT CARD POPUP -->
		<div id="updateCardForm" style="display:none;">
			<form action="/your-details?action=updatecard" method="POST" id="updatecard">
				<div class="row"><div class="col-xs-12">Update your card:</div></div>
				<input type="hidden" name="selectedCard">
				<div class="row">
					<div class="col-xs-12 col-md-6">
						<input type="text" class="form-control"  name="Expirydate" placeholder="Expire date">
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-md-6">
						<input type="text" class="form-control"  name="CVV" placeholder="CVV">
					</div>
					<div class="col-xs-12 col-md-6">
						<div class="col-xs-12 none-padding tooltip-container top" style="margin-top: 10px;">
							<span class="tooltip-activate">What is CVV?</span>
							<div class="tooltip-content">
								<h4>What is a Card Verification Number?</h4>
								<span class="tooltip-img"><img src="sites/default/files/general-icon/cvn-image.png"></span>
								<span>For Visa and Mastercard enter the last three digits on the signature strip. For American Express, enter the four digits in small print on the front of the card.</span>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<a class="addCartlink"><button type="submit" class="dashboard-button dashboard-bottom-button your-details-submit addCartButton">Save</button></a>
				</div>
			</form>
		</div>
		<!-- END UPDATE PAYMENT CARD POPUP -->

		<!-- DELETE WORKPLACE POPUP -->
		<div id="deleteWorkplaceWindow" style="display:none;">
			<form action="your-details" method="POST" id="deleteWorlplaceForm">
				<div class="flex-cell">
					<h3 class="light-lead-heading cairo">Are you sure you want to delete this workplace</h3>
				</div>
				<input type="hidden" name="WorkplaceID" value="">
				<div class="flex-cell buttons-container">
					<a class="" value="yes" target="_self">Yes</a>
					<a class="no accent-btn cancelDeleteButton" value="no" target="_self">No</a>
				</div>
			</form>
		</div>
		<!-- END DELETE WORKPLACE POPUP -->

		<!-- Workplace limit POPUP -->
		<div id="limitworkplace">
			<span class="close-popup"></span>
			<div class="flex-cell">
				<h3 class="light-lead-heading cairo">Limit reached</h3>
				<span>Please note, the number of practices you can list is limited to 12.</span>
			</div>
		</div>
		<!-- END Workplace limit POPUP -->

		<!-- DELETE QUALIFICATION POPUP -->
		<div id="confirmDelete" style="display:none;">
				<div class="flex-cell">
					<h3 class="light-lead-heading cairo">Are you sure you want to delete this qualification record?</h3>
				</div>
				<div class="flex-cell buttons-container">
					<a id="deleteQButton" class="" value="yes" target="_self">Yes</a>
					<a class="cancelDeleteButton" value="no" target="_self">No</a>
				</div>
		</div>
		<!-- END DELETE WORKPLACE POPUP -->

	</div>
	</div>
	</div>
</div>
<div class="overlay">
	<section class="loaders">
		<span class="loader loader-quart">
		</span>
	</section>
</div>
<?php logRecorder(); ?>
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
			var totalCurrentWorkplaces = $('#tabmenu').find('li').length;
			if(totalCurrentWorkplaces > 11) {
				$('#limitworkplace').fadeIn();
				$('.overlay').fadeIn();
			} else {
				$('.down3').find('#tabmenu').append('<li class="active" id="workplaceli' + i +
					'"><a data-toggle="tab" href="#workplace' + i + '"><span>Workplace ' + j +
					'</span><span class="calldeletewp' + i + '"></span></a></li>');
				$('div[id="workplaceblocks"]').append('<div id="workplace' + i +
					'" class="tab-pane fade active in"></div>');

				$('.down3').find('#tabmenu li:not(#workplaceli' + i + ')').removeClass("active");
				$('div[id^=workplace]:not(#workplace' + i + ')').removeClass("active in");
				$('input[name=wpnumber]').val(j);
				$('input[name=maxumnumber]').val(i);
				var memberType = $('select[name=MemberType]').val();
				var sessionvariable = '<?php echo json_encode($_SESSION["workplaceSettings"]);?>';
				var sessionInterest = '<?php echo json_encode($_SESSION["interestAreas"]);?>';
				var sessionLanguage = '<?php echo json_encode($_SESSION["Language"]);?>';
				var sessionCountry = <?php echo json_encode($_SESSION['country']);?>;

				$("#workplace" + i).load("load/workplace", {
					"count": i,
					"sessionWorkplaceSetting": sessionvariable,
					"sessioninterestAreas": sessionInterest,
					"sessionLanguage": sessionLanguage,
					"sessionCountry": sessionCountry,
					"memberType": memberType
				});
			}
		});
		$("a[href^=#workplace]").live( "click", function(){ });
		$("[class^=deletewp]").live( "click", function(){
			var x = $(this).attr("class").replace('deletewp', '');
			$("#workplaceli"+ x).remove();
			$("#workplace"+ x).remove();

			var n = Number($('#wpnumber').val());
			var t = Number(n -1);
			$('input[name=wpnumber]').val(t);
			for (m = 1; m<=t;m++){
				var deleteVal = $('#tabmenu li:nth-child('+m+')').attr('id').replace('workplaceli', '');
				$('#tabmenu li:nth-child(' + m + ') a').html("Workplace "+m+'<span class="calldeletewp' + deleteVal + '"></span>');
			}
		});
	});
</script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
jQuery(document).ready(function($){
$.widget( "custom.iconselectmenu", $.ui.selectmenu, {
_renderItem: function( ul, item ) {
var li = $( "<li>" ),
wrapper = $( "<div>", { text: item.label } );
if ( item.disabled ) {
li.addClass( "ui-state-disabled" );
}

$( "<span>", {
style: item.element.attr( "data-style" ),
"class": "ui-icon " + item.element.attr( "data-class" )
})
.appendTo( wrapper );
return li.append( wrapper ).appendTo( ul );
}
});
$( "#Paymentcard" )
.iconselectmenu()
.iconselectmenu( "menuWidget" )
.addClass( "ui-menu-icons customicons" );

} );

$('.add-additional-qualification').click(function(){
	$('#dashboard-right-content').addClass("autoscroll");
	var number = Number($('#educationMaxNumber').val());
	var educationNumber = Number($('#addtionalNumber').val());
	var sessionCountry = <?php echo json_encode($_SESSION['country']);?>;
	var sessionDegree = <?php echo json_encode($_SESSION['degree']);?>;
	var sessionUniversity = <?php echo json_encode($_SESSION['University']);?>;
	$('div[id="additional-qualifications-block"]').append('<div id="additional'+ number +'"></div>');
	$("#additional"+ number ).hide();
	$("#additional"+ number ).load("load/education", {"count":number,"sessionCountry":sessionCountry,"sessionDegree":sessionDegree,"sessionUniversity":sessionUniversity}, function(){
		$(this).slideDown();
	});
	//window.setTimeout(function () {
	//	$("#additional"+ number ).slideDown();
	//}, 500);
	var i = Number(educationNumber +1);
	var j = Number(number +1);
	$('input[name=addtionalNumber]').val(i);
	$('input[name=educationMaxNumber]').val(j);
	if(i==0){ $('#educationNotice').removeClass("display-none");} else{$('#educationNotice').addClass("display-none");}
});
$("#deleteQButton").on( "click", function(){
	var x = $(this).attr("class").replace('deleteEducation', '');
	$("#additional"+ x).slideUp(function(){
		$(this).remove();
	});
	$("#deleteQButton").removeAttr('class');
	var en = Number($('#addtionalNumber').val());

	var et = Number(en -1);
	$('input[name=addtionalNumber]').val(et);
	//$('#confirmDelete').dialog('close');
	$('div[aria-describedby=confirmDelete] button').click();
	if(et==0){ $('#educationNotice').removeClass("display-none");} else{$('#educationNotice').addClass("display-none");}
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

<style>
fieldset {
border: 0;
}
/* select with custom icons */
.ui-selectmenu-menu .ui-menu.customicons .ui-menu-item-wrapper {
padding: 0.5em 0 0.5em 3em;
}
.ui-selectmenu-menu .ui-menu.customicons .ui-menu-item .ui-icon {
height: 24px;
width: 24px;
top: 0.1em;
}
.ui-icon.Master{
background: url("/sites/default/files/logo_apa_0.png") 0 0 no-repeat;
}
.ui-icon.Visa{
background: url("/sites/default/files/logo_apa_0.png") 0 0 no-repeat;
}
.ui-icon.AE{
background: url("/sites/default/files/logo_apa_0.png") 0 0 no-repeat;
}
</style>
<?php else :
	// todo
	// add log-in button with message - you must be logged in
	?>
	<!-- NON-LOGIN USERS -->
	<div class="flex-container" id="non-member">
		<div class="flex-cell">
			<h3 class="light-lead-heading">Please login to see this page.</h3>
		</div>
		<div class="flex-cell cta">
			<a data-target="#loginAT" data-toggle="modal" href="#" class="login">Login</a>
			<a href="/membership-question" class="join">Join now</a>
		</div>
		<?php
			$block = block_load('block', '309');
			$get = _block_get_renderable_array(_block_render_blocks(array($block)));
			$output = drupal_render($get);
			print $output;
		?>
	</div>
<?php endif; ?>
<?php 
	// ads
	$block = block_load('block', '389');
	$get = _block_get_renderable_array(_block_render_blocks(array($block)));
	$output = drupal_render($get);        
	print $output;
?>