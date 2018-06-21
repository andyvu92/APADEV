<?php
include('sites/all/themes/evolve/commonFile/updateBackgroundImage.php');
if(isset($_POST['step1'])) {
	$postData = array();
	if(isset($_SESSION['UserId'])) {$postData['userID'] = $_SESSION['UserId'];}
	if(isset($_POST['Prefix'])){ $postData['Prefix'] = $_POST['Prefix']; }
	if(isset($_POST['Firstname'])){ $postData['Firstname'] = $_POST['Firstname']; }
	if(isset($_POST['Middle-name'])){ $postData['Middle-name'] = $_POST['Middle-name']; }
	if(isset($_POST['Preferred-name'])){ $postData['Preferred-name'] = $_POST['Preferred-name']; }
	if(isset($_POST['Maiden-name'])){ $postData['Maiden-name'] = $_POST['Maiden-name']; }
	if(isset($_POST['Lastname'])){ $postData['Lastname'] = $_POST['Lastname']; }
	if(isset($_POST['Birth'])){ $postData['birth'] = str_replace("-","/",$_POST['Birth']); }
	if(isset($_POST['Gender'])){ $postData['Gender'] = $_POST['Gender']; }
	if(isset($_POST['country-code'])){ $postData['Home-country-code'] = $_POST['country-code']; }
	if(isset($_POST['area-code'])){ $postData['Home-area-code'] = $_POST['area-code']; }
	if(isset($_POST['phone-number'])){ $postData['Home-phone-number'] = $_POST['phone-number']; }
	if(isset($_POST['Mobile-country-code'])){ $postData['Mobile-country-code'] = $_POST['Mobile-country-code']; }
	if(isset($_POST['Mobile-area-code'])){ $postData['Mobile-area-code'] = $_POST['Mobile-area-code']; }
	if(isset($_POST['Mobile-number'])){ $postData['Mobile-number'] = $_POST['Mobile-number']; }
    if(isset($_POST['Aboriginal'])){ $postData['Aboriginal'] = $_POST['Aboriginal']; }
	if(isset($_POST['BuildingName'])){ $postData['BuildingName'] = $_POST['BuildingName']; }
	if(isset($_POST['Address_Line_1'])){ $postData['Address_Line_1'] = $_POST['Address_Line_1']; }
	if(isset($_POST['Pobox'])){ $postData['Pobox'] = $_POST['Pobox']; }
	if(isset($_POST['Address_Line_2'])){ $postData['Address_Line_2'] = $_POST['Address_Line_2']; }
	if(isset($_POST['Suburb'])){ $postData['Suburb'] = $_POST['Suburb']; }
	if(isset($_POST['Postcode'])){ $postData['Postcode'] = $_POST['Postcode']; }
	if(isset($_POST['State'])){ $postData['State'] = $_POST['State']; }
	if(isset($_POST['Country'])){ $postData['Country'] = $_POST['Country']; }
	if(isset($_POST['Status'])){ $postData['Status'] = $_POST['Status']; }
	if(isset($_POST['Specialty'])){ $postData['Specialty'] = $_POST['Specialty']; }

	//change from shipping address to billing address
	if(isset($_POST['Shipping-address-join']) && $_POST['Shipping-address-join']=='1'){ 
	$postData['Billing-BuildingName'] = $_POST['BuildingName']; 
	$postData['BillingAddress_Line_1'] = $_POST['Address_Line_1'];
	$postData['BillingAddress_Line_2'] = $_POST['Address_Line_2'];
	$postData['Billing-Pobox'] = $_POST['Pobox'];
	$postData['Billing-Suburb'] = $_POST['Suburb'];
	$postData['Billing-Postcode'] = $_POST['Postcode'];
	$postData['Billing-State'] = $_POST['State'];
	$postData['Billing-Country'] = $_POST['Country'];
	}else{
	$postData['Billing-BuildingName'] = $_POST['Billing-BuildingName']; 
	$postData['BillingAddress_Line_1'] = $_POST['Billing-Address_Line_1'];
	$postData['BillingAddress_Line_2'] = $_POST['Billing-Address_Line_2'];
	$postData['Billing-Pobox'] = $_POST['Billing-Pobox'];
	$postData['Billing-Suburb'] = $_POST['Billing-Suburb'];
	$postData['Billing-Postcode'] = $_POST['Billing-Postcode'];
	$postData['Billing-State'] = $_POST['Billing-State'];
	$postData['Billing-Country'] = $_POST['Billing-Country'];  
	}
	//Add shipping address & mailing address post data
	if(isset($_POST['Shipping-BuildingName'])){ $postData['Shipping-BuildingName'] = $_POST['Shipping-BuildingName']; }
	if(isset($_POST['Shipping-Address_Line_1'])){ $postData['Shipping-Address_line_1'] = $_POST['Shipping-Address_Line_1']; }
	if(isset($_POST['Shipping-Address_Line_2'])){ $postData['Shipping-Address_line_2'] = $_POST['Shipping-Address_Line_2']; }
	if(isset($_POST['Shipping-PObox'])){ $postData['Shipping-PObox'] = $_POST['Shipping-PObox']; } 
	if(isset($_POST['Shipping-city-town'])){ $postData['Shipping-city-town'] = $_POST['Shipping-city-town']; } 
	if(isset($_POST['Shipping-postcode'])){ $postData['Shipping-postcode'] = $_POST['Shipping-postcode']; } 
	if(isset($_POST['Shipping-State'])){ $postData['Shipping-state'] = $_POST['Shipping-State']; }
	if(isset($_POST['Shipping-country'])){ $postData['Shipping-country'] = $_POST['Shipping-country']; }
	if(isset($_POST['Mailing-BuildingName'])){ $postData['Mailing-BuildingName'] = $_POST['Mailing-BuildingName']; } 
	if(isset($_POST['Mailing-Address_Line_1'])){ $postData['Mailing-Address_line_1'] = $_POST['Mailing-Address_Line_1']; } 
	if(isset($_POST['Mailing-Address_Line_2'])){ $postData['Mailing-Address_line_2'] = $_POST['Mailing-Address_Line_2']; } 
	if(isset($_POST['Mailing-PObox'])){ $postData['Mailing-PObox'] = $_POST['Mailing-PObox']; }
	if(isset($_POST['Mailing-city-town'])){ $postData['Mailing-city-town'] = $_POST['Mailing-city-town']; } 
	if(isset($_POST['Mailing-postcode'])){ $postData['Mailing-postcode'] = $_POST['Mailing-postcode']; }
	if(isset($_POST['Mailing-State'])){ $postData['Mailing-state'] = $_POST['Mailing-State']; } 
	if(isset($_POST['Mailing-country'])){ $postData['Mailing-country'] = $_POST['Mailing-country']; } 
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
	if(isset($_POST['wpnumber'])){ 
	$num = $_POST['wpnumber']; 
	$tempWork = array();
	for($i=0; $i<$num; $i++){
		$workplaceArray = array();
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
		if(isset($_POST['WTreatmentarea'.$i])){ $workplaceArray['SpecialInterestAreaID'] = implode(",",$_POST['WTreatmentarea'.$i]); }
		if(isset($_POST['Additionallanguage'.$i])){ $workplaceArray['AdditionalLanguage'] = implode(",",$_POST['Additionallanguage'.$i]); }
		array_push($tempWork, $workplaceArray);
	}
        $postData['Workplaces'] =  $tempWork ;
	}
    if(isset($_POST['wpnumber']) == "1" && empty($_POST['Name-of-workplace0'])){ $postData['Workplaces'] =array();}
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
	GetAptifyData("5", $postData);
	unset($_SESSION["Regional-group"]);
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
	$details = GetAptifyData("4", $data,""); // #_SESSION["UserID"];
	//2.2.43 -get user installment data test part
	$installmentData['id'] = $_SESSION["UserId"];
	$installmentOrder = GetAptifyData("43", $installmentData);
}





if (!empty($details['Regional-group'])) { $_SESSION['Regional-group'] = $details['Regional-group'];}
//print_r($details);
// 2.2.10 - GET Picture
// Send - 
// UserID
// Response -
// Profile image
$picture = GetAptifyData("10","",""); 
			
// 2.2.11 - UPDATE Picture
// Send - 
// UserID, Image
// Response -
// N/A.
if(isset($_POST["PictureUpdate"])) {
$target_dir =__DIR__ . '/../uploads/';
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$name = $_FILES["fileToUpload"]["name"];
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
//if (file_exists($target_file)) {
    //echo "Sorry, file already exists.";
    //$uploadOk = 0;
//}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
	
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
$imageBlob = base64_encode(file_get_contents("sites/all/themes/evolve/uploads/".$name));
$postImageData['ID'] = $_SESSION['LinkId'];
$postImageData['EntityName'] = "Persons";
$postImageData['Photo'] = $imageBlob;
$outImage = GetAptifyData("11",$postImageData); 
unlink("sites/all/themes/evolve/uploads/".$name);
    
}

if(isset($_GET["action"])&& ($_GET["action"]=="addcard")) {
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
} 
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
	$deleteCards = GetAptifyData("13", $deleteCardSubmit); 
	print_r($deleteCards);
	
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
	$updateCards = GetAptifyData("13", $updateCardSubmit); 
	print_r($updateCards);
	echo "End here";
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
	echo "End here";
	$updateCards = GetAptifyData("13", $updateCardSubmit); 
	print_r($updateCards);
	
}
if(isset($_Get["action"]) && $_Get["action"] = "rollover") {
	$updateCardSubmit["UserID"] = "UserID";
	$updateCardSubmit["Rollover"] = $_POST["Rollover"];
	// 2.2.13 - update payment method-1-set user rollover
	// Send - 
	// UserID, Rollover
	// Response -
	// N/A.
	GetAptifyData("13", $updateCardSubmit); 
}

?>
<div id="pre_background" style="display:none">background_<?php echo $user['background']; ?></div>
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
<?php include('sites/all/themes/evolve/commonFile/dashboardLeftNavigation.php'); ?>  
<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 background_<?php echo $user['background']; ?> autoscroll" id="dashboard-right-content">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dashboard_detail">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><span class="dashboard-name"><strong>Account</strong></span></div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><button class="dashboard-backgroud" data-target="#myModal" data-toggle="modal"><span class="customise_background">Customise your background</span><span class="customise_icon">[icon class="fa fa-cogs fa-x"][/icon]</span></button></div>
		</div>
    <?php
		include('sites/all/themes/evolve/commonFile/customizeBackgroundImage.php');
	?>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
			<ul class="nav nav-tabs">
			<li><a class="event1" style="cursor: pointer;"><span class="text-underline eventtitle1" id="yourdetails-tab"><strong>Your details</strong></span> </a></li>

			<li><a class="event2" style="cursor: pointer;"><span class="eventtitle2" id="membership"><strong>Membership</strong></span></a></li>
			<li><a class="event13" style="cursor: pointer;"><span class="eventtitle13" id="payment"><strong>Payment information</strong></span></a></li>
			<li><a class="event3" style="cursor: pointer;"><span class="eventtitle3" id="workplace"><strong>Workplace</strong></span></a></li>
			<li><a class="event4" style="cursor: pointer;"><span class="eventtitle4" id="education"><strong>Education</strong></span></a></li>
			</ul>
			<form action="your-details" name="your-details" method="POST" novalidate>
			    <input type="hidden" name="step1" value="1"/>
				<input type="hidden" name="Specialty" value="<?php echo$details['Specialty'];?>">
				<div class="down1">
					<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 none-padding">
						<div class="row">
							<div class="col-lg-3">
								<label for="prefix">Prefix<span class="tipstyle">*</span></label>
								<select class="form-control" id="Prefix" name="Prefix" required>
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
							<div class="col-lg-3">
								<label for="">First name<span class="tipstyle">*</span></label>
								<input type="text" class="form-control"  name="Firstname" <?php if (empty($details['Firstname'])) {echo "placeholder='First name'";}   else{ echo 'value="'.$details['Firstname'].'"'; }?> required>
							</div>
							<div class="col-lg-3">
								<label for="">preferred name</label>
								<input type="text" class="form-control"  name="Preferred-name" <?php if (empty($details['Preferred-name'])) {echo "placeholder='Preferred name'";}   else{ echo 'value="'.$details['Preferred-name'].'"'; }?>>
							</div>
							<div class="col-lg-3">
								<label for="">Middle name</label>
								<input type="text" class="form-control" name="Middle-name" <?php if (empty($details['Middle-name'])) {echo "placeholder='Middle name'";}   else{ echo 'value="'.$details['Middle-name'].'"'; }?>>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<label for="">Maiden name</label>
								<input type="text" class="form-control" name="Maiden-name"  <?php if (empty($details['Maiden-name'])) {echo "placeholder='Maiden name'";}   else{ echo 'value="'.$details['Maiden-name'].'"'; }?>>
							</div>
							<div class="col-lg-6">
								<label for="">Last name<span class="tipstyle">*</span></label>
								<input type="text" class="form-control" name="Lastname" <?php if (empty($details['Lastname'])) {echo "placeholder='Last name'";}   else{ echo 'value="'.$details['Lastname'].'"'; }?> required>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-4">
								<label for="">Birth Date<span class="tipstyle">*</span></label>
								<input type="date" class="form-control" name="Birth" <?php if (empty($details['birth'])) {echo "placeholder='DOB'";}   else{ echo 'value="'.str_replace("/","-",$details['birth']).'"';}?> required>
							</div>
							<div class="col-lg-3 col-lg-offset-1">
								<label for="">Gender<span class="tipstyle">*</span></label>
								<select class="form-control" id="Gender" name="Gender" required>
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
							
							<div class="col-lg-2">
								<label for="">Country code</label>
								<select class="form-control" id="country-code" name="country-code">
								<?php
									$countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
									$country=json_decode($countrycode, true);
										foreach($country  as $key => $value){
										echo '<option value="'.$country[$key]['TelephoneCode'].'"';
										if ($details['Home-phone-countrycode'] == $country[$key]['TelephoneCode']){ echo "selected='selected'"; } 
										echo '> '.$country[$key]['Country'].' </option>';
									}
								?>
								</select>
							</div>
							<?php  $_SESSION['country'] =$country;?>
							<div class="col-lg-2">
								<label for="">Area code</label>
								<input type="text" class="form-control" name="area-code" <?php if (empty($details['Home-phone-areacode'])) {echo "placeholder='Area code'";}   else{ echo 'value="'.$details['Home-phone-areacode'].'"'; }?> maxlength="5">
							</div>
							<div class="col-lg-4">
								<label for="">Phone number</label>
								<input type="text" class="form-control" name="phone-number" <?php if (empty($details['Home-phone-number'])) {echo "placeholder='Phone number'";}   else{ echo 'value="'.$details['Home-phone-number'].'"'; }?>  >
							</div>
							
						</div>
						<div class="row">
							
							<div class="col-lg-2">
								<label for="">Country code</label>
								<select class="form-control" id="Mobile-country-code" name="Mobile-country-code">
								<?php
									$countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
									$country=json_decode($countrycode, true);						
									foreach($country  as $key => $value){
										echo '<option value="'.$country[$key]['TelephoneCode'].'"';
										if ($details['Mobile-country-code'] == $country[$key]['TelephoneCode']){ echo "selected='selected'"; } 
										echo '> '.$country[$key]['Country'].' </option>';
									}
								?>
								</select>
							</div>
							<div class="col-lg-2">
								<label for="">Area code</label>
								<input type="text" class="form-control" name="Mobile-area-code" <?php if (empty($details['Mobile-area-code'])) {echo "placeholder='Mobile Area code'";}   else{ echo 'value="'.$details['Mobile-area-code'].'"'; }?> maxlength="5">
							</div>
							<div class="col-lg-4">
								<label for="">Mobile number</label>
								<input type="text" class="form-control" name="Mobile-number" <?php if (empty($details['Mobile-number'])) {echo "placeholder='Mobile number'";}   else{ echo 'value="'.$details['Mobile-number'].'"'; }?>  >
							</div>
							
						</div>
						<div class="row">
							<div class="col-lg-9">
							Aboriginal and Torres Strait Islander origin<span class="tipstyle">*</span>
							</div>
							<div class="col-lg-3">
								<select class="form-control" id="Aboriginal" name="Aboriginal" required>
								<?php
									$Aboriginalcode  = file_get_contents("sites/all/themes/evolve/json/Aboriginal.json");
									$Aboriginal=json_decode($Aboriginalcode, true);						
									foreach($Aboriginal  as $key => $value){
										echo '<option value="'.$Aboriginal[$key]['ID'].'"';
										if ($details['Aboriginal'] == $Aboriginal[$key]['ID']){ echo "selected='selected'"; } 
										echo '> '.$Aboriginal[$key]['Name'].' </option>';
									}
								?>
									
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">Residential address:</div>
						</div>
						<div class="row">
							<div class="col-lg-4">
								<label for="">Building name</label>
								<input type="text" class="form-control"  name="BuildingName" <?php if (empty($details['BuildingName'])) {echo "placeholder='Building name'";}   else{ echo 'value="'.$details['BuildingName'].'"'; }?>>
							</div>
							
						</div>
						<div class="row">
							<div class="col-lg-3">
								<label for="">PO box</label>
								<input type="text" class="form-control" name="Pobox"  <?php if (!empty($details['Unit'])) {echo "placeholder='PO box'";}   else{ echo 'value="'.$details['BuildingName'].'"'; }?>>
							</div>
							<div class="col-lg-9">
								<label for="">Address 1<span class="tipstyle">*</span></label>
								<input type="text" class="form-control" name="Address_Line_1"  <?php if (empty($details['Unit'])) {echo "placeholder='Address 1'";}   else{ echo 'value="'.$details['Unit'].'"'; }?> required>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<label for="">Address 2<span class="tipstyle">*</span></label>
								<input type="text" class="form-control" name="Address_Line_2"  <?php if (empty($details['Street'])) {echo "placeholder='Address 2'";}   else{ echo 'value="'.$details['Street'].'"'; }?> required>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<label for="">City or town</label>
								<input type="text" class="form-control" name="Suburb" <?php if (empty($details['Suburb'])) {echo "placeholder='City or town'";}   else{ echo 'value="'.$details['Suburb'].'"'; }?>>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3">
								<label for="">Postcode<span class="tipstyle">*</span></label>
								<input type="text" class="form-control" name="Postcode"  <?php if (empty($details['Postcode'])) {echo "placeholder='Postcode'";}   else{ echo 'value="'.$details['Postcode'].'"'; }?> required>
							</div>
							<div class="col-lg-3">
								<label for="">State<span class="tipstyle">*</span></label>
								<select class="form-control" id="State" name="State" required>
									<option value="" <?php if (empty($details['State'])) echo "selected='selected'";?> disabled> State </option>
									<?php
										$statecode  = file_get_contents("sites/all/themes/evolve/json/State.json");
										$State=json_decode($statecode, true);						
										foreach($State  as $key => $value){
											echo '<option value="'.$State[$key]['Abbreviation'].'"';
											if ($details['State'] == $State[$key]['Abbreviation']){ echo "selected='selected'"; } 
											echo '> '.$State[$key]['Abbreviation'].' </option>';
										}
									?>
								</select>
							</div>
							<div class="col-lg-6">
								<label for="">Country<span class="tipstyle">*</span></label>
								<select class="form-control" id="Country" name="Country" required>
								<?php
								$countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
								$country=json_decode($countrycode, true);						
								foreach($country  as $key => $value){
									
									echo '<option value="'.$country[$key]['Country'].'"';
									if ($details['Country'] == $country[$key]['Country']){ echo "selected='selected'"; } 
									echo '> '.$country[$key]['Country'].' </option>';
									
								}
								?>
								</select>
							</div>
						</div>
						<!--put code here-->
						<div class="row payment-line">
						<div class="col-lg-12"><label for="Mailing-address"><strong>Mailing address: Check box to duplicate residential address details</strong></label><input type="checkbox" id="Mailing-address"></div>
					</div>
					<div class="row">
						
						<div class="col-lg-6">
							<label for="">Building Name</label>
							<input type="text" class="form-control" name="Mailing-BuildingName" id="Mailing-BuildingName"  <?php if (empty($details['Mailing-BuildingName'])) {echo "placeholder='Building Name'";}   else{ echo 'value="'.$details['Mailing-BuildingName'].'"'; }?>>
						</div>
					</div>
					<div class="row">
					    <div class="col-lg-3">
							<label for="">POBox</label>
							<input type="text" class="form-control" name="Mailing-PObox" id="Mailing-PObox"  <?php if (!empty($details['Mailing-unitno'])) {echo "placeholder='PObox'";}   else{ echo 'value="'.$details['Mailing-BuildingName'].'"'; }?>>
						</div>
						<div class="col-lg-9">
							<label for="">Address 1<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Mailing-Address_Line_1" id="Mailing-Address_Line_1"  <?php if (empty($details['Mailing-unitno'])) {echo "placeholder='Address 1'";}   else{ echo 'value="'.$details['Mailing-unitno'].'"'; }?> required>
						</div> 
						
					</div>
					<div class="row">
						<div class="col-lg-12">
							<label for="">Address 2<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Mailing-Address_Line_2" id="Mailing-Address_Line_2"  <?php if (empty($details['Mailing-streetname'])) {echo "placeholder='Address 1'";}   else{ echo 'value="'.$details['Mailing-streetname'].'"'; }?> required>
						</div> 
					</div>
					<div class="row">
						<div class="col-lg-4">
							<label for="">City or town<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Mailing-city-town" id="Mailing-city-town" <?php if (empty($details['Mailing-city-town'])) {echo "placeholder='City or town'";}   else{ echo 'value="'.$details['Mailing-city-town'].'"'; }?> required>
						</div>
						<div class="col-lg-2">
							<label for="">Postcode<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Mailing-postcode" id="Mailing-postcode"  <?php if (empty($details['Mailing-postcode'])) {echo "placeholder='Postcode'";}   else{ echo 'value="'.$details['Mailing-postcode'].'"'; }?> required>
						</div>
						<div class="col-lg-2">
							<label for="">State<span class="tipstyle">*</span></label>
							<select class="form-control" name="Mailing-State" id="Mailing-State" required>
								<option value=""  <?php if (empty($details['Mailing-state'])) echo "selected='selected'";?> disabled> State </option>
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
						<div class="col-lg-4">
							<label for="">Country<span class="tipstyle">*</span></label>
							<select class="form-control" id="Mailing-Country" name="Mailing-Country" required>
							<?php 
							$countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
							$country=json_decode($countrycode, true);
							foreach($country  as $key => $value){
								
								echo '<option value="'.$country[$key]['Country'].'"';
								if ($details['Mailing-country'] == $country[$key]['Country']){ echo "selected='selected'"; } 
								echo '> '.$country[$key]['Country'].' </option>';
							}
							?>
							</select>
						</div>
					</div>
						<!--put code here-->
						
						<div class="row">
							<div class="col-lg-6">
							Your dietary requirements
							</div>
							<div class="col-lg-6">
								<select class="chosen-select" id="Dietary" name="Dietary[]" multiple>
								<option value=""  <?php if (empty($details['Dietary'])) echo "selected='selected'";?> disabled> None </option>
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
					</div>
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 form-right">
						<div class="row form-image">
						   	<img src="https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/ImageField/Persons/<?php echo $_SESSION['LinkId'];?>/Photo"/>
							<div class="col-lg-12">
							<a  style="cursor: pointer; color:white;" id="uploadImageButton">Upload/change image</a>
							
							
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
							<label for="">Member no.<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" <?php if (empty($details['Memberno'])) {echo "placeholder='Member no.'";}   else{ echo 'value="'.$details['Memberno'].'"'; }?> readonly>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<a href="changepassword" target="_self" style="color:white;">Change your password</a>
							</div>
						</div>
					</div>
					<!--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">   <a class="join-details-button1"><span class="dashboard-button-name">Next</span></a></div>-->
				</div>
				<div class="down2" style="display:none;" >
					<div class="row">
					<input type="hidden"  name="Status" value="<?php echo $details['Status'];?>">
						<div class="col-lg-4">
							<label for="">Member ID(Your email address)<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Memberid"  <?php if (empty($details['Memberid'])) {echo "placeholder='Member ID(Your email address)'";}   else{ echo 'value="'.$details['Memberid'].'"'; }?> readonly>
						</div>
					
						<div class="col-lg-8">
							<label for="">Member Type<span class="tipstyle">*</span></label>
							<select class="form-control" id="MemberType" name="MemberType" disabled>
								<option value="" <?php if (empty($details['MemberType'])) echo "selected='selected'";?> disabled>memberType</option>
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
					<div class="row">
						<div class="col-lg-6">
							<label for="">AHPRA number</label>
							<input type="text" class="form-control" name="Ahpranumber"  <?php if (empty($details['Ahpranumber'])) {echo "placeholder='AHPRA number'";}   else{ echo 'value="'.$details['Ahpranumber'].'"'; }?>>
						</div>
					
						<div class="col-lg-6">
							<label for="">Paid through</label>
							<input type="text" class="form-control" name="PaythroughDate"  <?php if (!empty($details['PaythroughtDate'])) {echo 'value="'.$details['PaythroughtDate'].'"'; }?> readonly>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<label for="">Your National group</label>
							<select class="chosen-select" id="Nationalgp" name="Nationalgp[]" multiple disabled>
							<?php 
							// get national group from Aptify via webserice return Json data;
							// 2.2.19 - get national group
							// Send - 
							// Response - national group
							
							$nationalGroupsCode= file_get_contents("sites/all/themes/evolve/json/NationalGroup__c.json");
							$nationalGroups=json_decode($nationalGroupsCode, true);
							?>
							<?php 
								foreach($nationalGroups as $key=>$value) {
								   echo '<option value="'.$nationalGroups[$key]["ID"].'"';
								   foreach($details['Nationalgp'] as $detailNG){
								   if (in_array( $nationalGroups[$key]["ID"],$detailNG)){ echo "selected='selected'"; } }
								   echo '> '.$nationalGroups[$key]["Name"].' </option>';
								}
								
							?>
							</select>
						</div>
					
						<div class="col-lg-6">
							<label for="">Your Regional group</label>
							<input type="text" class="form-control" name="Regional-group-display"  <?php if (empty($details['Regional-group'])) {echo "placeholder='Your Regional group'";}   else{ echo 'value="'; foreach( $details['Regional-group'] as $key => $value ) {echo $value.", ";} echo '"'; }?> readonly>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<label for="">Your Branch<span class="tipstyle">*</span></label>
							<select class="form-control" name="Branch" id="Branch" disabled>
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
					<div class="row"> 
						<div class="col-lg-3">
						Your special interest area:
						</div>
					    <?php  
						if(!empty($details['PSpecialInterestAreaID'])) {$PSpecialInterestAreaID = explode(",",$details['PSpecialInterestAreaID']); } else {$PSpecialInterestAreaID =array();}
						
						?>
						<div class="col-lg-9">
							<select class="chosen-select" id="interest-area" name="SpecialInterest[]" multiple  tabindex="-1" data-placeholder="Choose interest area...">
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
					<!--<div class="row"> 
						<div class="col-lg-3">
						Your treatment area:
						</div>
					
						<div class="col-lg-9">
							<select class="chosen-select" id="treatment-area" name="Treatmentarea[]" multiple  tabindex="-1" data-placeholder="Choose treatment area...">
							<?php 
							//$interestAreascode  = file_get_contents("sites/all/themes/evolve/json/AreaOfInterest__c.json");
							//$interestAreas=json_decode($interestAreascode, true);	
							?>
							<?php 
							//foreach($interestAreas  as $key => $value){
								//echo '<option value="'.$interestAreas[$key]["Code"].'"';
								//if (in_array( $interestAreas[$key]["Code"],$details['Treatmentarea'])){ echo "selected='selected'"; } 
								//echo '> '.$interestAreas[$key]["Name"].' </option>'; 
							//}
							?>
							</select>
						</div>
					</div>-->
					<div class="row">
						<div class="col-lg-3">
							What is your favourite languages?<br/>
						</div>
						 <?php  
						if(!empty($details['PAdditionalLanguageID'])) {$PAdditionalLanguageID = explode(",",$details['PAdditionalLanguageID']); } else {$PAdditionalLanguageID =array();}
						
						?>
						<div class="col-lg-9">
							<select class="chosen-select" id="MAdditionallanguage" name="MAdditionallanguage[]" multiple  tabindex="-1" data-placeholder="Choose your favourite language...">
								
								<?php 
								$Languagecode  = file_get_contents("sites/all/themes/evolve/json/Language.json");
								$Language=json_decode($Languagecode, true);
								$_SESSION["Language"] = $Language;
								foreach($Language  as $key => $value){
									echo '<option value="'.$Language[$key]['ID'].'"';
									
									if (in_array( $Language[$key]["ID"],$PAdditionalLanguageID)){ echo "selected='selected'"; } 
									echo '> '.$Language[$key]['Name'].' </option>';
								}
								?>
							</select>
						</div>
					</div>
						
				<!--
				<div class="row">
				<div class="col-lg-6">
				<label for="">Status</label>
				<input type="text" class="form-control" name="Status"  <?php //if (empty($details['Status'])) {echo "placeholder='Status'";}   else{ echo 'value="'.$details['Status'].'"'; }?> readonly>
				</div>
				</div>-->
					<!--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">   <a class="join-details-button12"><span class="dashboard-button-name">Next</span></a><a class="your-details-prevbutton2"><span class="dashboard-button-name">Last</span></a></div>-->
				</div>
				<div class="down13"  style="display:none;" >
				<?php
				// 2.2.12 - GET payment listing
				// Send - 
				// UserID
				// Response -
				// Credit cards details [Credit card ID, Payment-method,
				// Name on card, Digits, Exp date, Roll over],  Main card
				$test['id'] = $_SESSION["UserId"];
				$cardsnum = GetAptifyData("12", $test);
				print_r($cardsnum);
				//$cardsnum = $cardsnums["paymentcards"];
				//$_SESSION["cardsnum"]= $cardsnum;
				?>
					<div class="row" >
						<div class="row" >
							<div class="col-lg-12"><strong>Your payment details:</strong></div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<div class="paymentsidecredit"> 
								<fieldset>
									<select  id="Paymentcard" name="Paymentcard" style="width:100%;">
									<?php
									if (sizeof($cardsnum)!=0) {
										foreach( $cardsnum["results"] as $cardnum) {
											echo '<option value="'.$cardnum["Creditcards-ID"].'"';
											if($cardnum["IsDefault"]=="1") {
											echo "selected ";
										}
										echo 'data-class="'.$cardnum["Payment-Method"].'">Credit card ending with ';
										echo $cardnum["Digitsnumber-Cardtype-Default"].'</option>';
										}
									}
									?>
									<?php /*if (sizeof($cardsnum)!=0): ?>   
									<?php foreach( $cardsnum as $cardnum):  ?>
									<option value="<?php echo  $cardnum["Digitsnumber"];?>" data-class="<?php echo  $cardnum["Cardtype"];?>"><?php echo  $cardnum["Name"];?>&nbsp;<br>Credit card ending with <?php echo  $cardnum["Digitsnumber"];?></option>
									<?php endforeach; ?>
									<?php endif; */?>  
									</select>
								</fieldset>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"> <a class="deletecardbutton">delete selected card</a>
						
						</div>
						<script type="text/javascript">
						jQuery(document).ready(function($) {
							$(".deletecardbutton").click(function() {
								var CardID = $("#Paymentcard").val();
								$("#deleteID").val(CardID);
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
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">  
							<div class="paymentsideuse><input type="checkbox" id="anothercard"><label for="anothercard"><a  style="cursor: pointer; color:white;" id="addPaymentCard">Add a new card</a></label>
								
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 <?php //need to get installment data from payment ?>">
							</div>
							<!--<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">  
								<div class="paymentsideuse><input type="checkbox" name="updatecard"><label for="updatecard"><a  style="cursor: pointer; color:white;" id="updatecard">update your card</a></label>
									
								</div>
							</div>-->
						</div>
						<!--<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"> 
							<a  style="cursor: pointer; color:white;" id="rolloverButton">Change your roll over status</a>
							
						</div>-->
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"> 
							<a  style="cursor: pointer; color:white;" id="setCardButton">Set your main credit card</a>
							
						</div>
					</div>
					<div class="row payment-line">
						<div class="col-lg-12"><label for="Shipping-address-dup"><strong>Shipping address:Check box to use your saved residential address</strong></label><input type="checkbox" id="Shipping-address-dup"></div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<label for="">POBox</label>
							<input type="text" class="form-control" name="Shipping-PObox" id="Shipping-PObox"  <?php if (!empty($details['Shipping-unitno'])) {echo "placeholder='PObox'";}   else{ echo 'value="'.$details['Shipping-BuildingName'].'"'; }?>>
						</div>
						<div class="col-lg-6">
							<label for="">Building Name</label>
							<input type="text" class="form-control" name="Shipping-BuildingName" id="Shipping-BuildingName"  <?php if (empty($details['Shipping-BuildingName'])) {echo "placeholder='Building Name'";}   else{ echo 'value="'.$details['Shipping-BuildingName'].'"'; }?>>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<label for="">Address 1<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Shipping-Address_Line_1" id="Shipping-Address_Line_1"  <?php if (empty($details['Shipping-unitno'])) {echo "placeholder='Address 1'";}   else{ echo 'value="'.$details['Shipping-unitno'].'"'; }?> required>
						</div> 
						<div class="col-lg-6">
							<label for="">Address 2<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Shipping-Address_Line_2" id="Shipping-Address_Line_2"  <?php if (empty($details['Shipping-streetname'])) {echo "placeholder='Address 1'";}   else{ echo 'value="'.$details['Shipping-streetname'].'"'; }?> required>
						</div> 
					</div>
					<div class="row">
						<div class="col-lg-4">
							<label for="">City or town<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Shipping-city-town" id="Shipping-city-town" <?php if (empty($details['Shipping-city-town'])) {echo "placeholder='City or town'";}   else{ echo 'value="'.$details['Shipping-city-town'].'"'; }?> required>
						</div>
						<div class="col-lg-2">
							<label for="">Postcode<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Shipping-postcode" id="Shipping-postcode"  <?php if (empty($details['Shipping-postcode'])) {echo "placeholder='Postcode'";}   else{ echo 'value="'.$details['Shipping-postcode'].'"'; }?> required>
						</div>
						<div class="col-lg-2">
							<label for="">State<span class="tipstyle">*</span></label>
							<select class="form-control" name="Shipping-State" id="Shipping-State" required>
								<option value=""  <?php if (empty($details['Shipping-state'])) echo "selected='selected'";?> disabled> State </option>
								<?php 
								$statecode  = file_get_contents("sites/all/themes/evolve/json/State.json");
								$State=json_decode($statecode, true);
								foreach($State  as $key => $value){
								echo '<option value="'.$State[$key]['Abbreviation'].'"';
								if ($details['Shipping-state'] == $State[$key]['Abbreviation']){ echo "selected='selected'"; } 
								echo '> '.$State[$key]['Abbreviation'].' </option>';
							
								}
								?>
								
							</select>
						</div>
						<div class="col-lg-4">
							<label for="">Country<span class="tipstyle">*</span></label>
							<select class="form-control" id="Shipping-Country" name="Shipping-Country" required>
							<?php 
							$countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
							$country=json_decode($countrycode, true);
							foreach($country  as $key => $value){
								
								echo '<option value="'.$country[$key]['Country'].'"';
								if ($details['Shipping-country'] == $country[$key]['Country']){ echo "selected='selected'"; } 
								echo '> '.$country[$key]['Country'].' </option>';
							}
							?>
							</select>
							
						</div>
					</div>
					<!--put code here-->
					<div class="row">
							<div class="col-lg-12"><label for="Shipping-address-join"><strong>Billing address:(Use my residential address)</strong></label><input type="checkbox" id="Shipping-address-join" name="Shipping-address-join" value="0"></div>
						</div>
					<div class="row" id="shippingAddress">
						<div class="row">
							<div class="col-lg-4">
								<label for="">Building name</label>
								<input type="text" class="form-control"  name="Billing-BuildingName" <?php if (empty($details['BuildingName1'])) {echo "placeholder='Billing Building Name'";}   else{ echo 'value="'.$details['BuildingName1'].'"'; }?>>
							</div>
							<div class="col-lg-6 col-lg-offset-2">
								<label for="">PO box</label>
								<input type="text" class="form-control" name="Billing-Pobox"  <?php if (!empty($details['Billing-Unit'])) {echo "placeholder='PO box'";}   else{ echo 'value="'.$details['BuildingName1'].'"'; }?>>
							</div>
						</div>
						<div class="row"></div>
						<div class="col-lg-4">
							<label for="">Address 1<span class="tipstyle">*</span></label>
							<input type="text" class="form-control"  name="Billing-Address_Line_1" id="Billing-Address_Line_1" <?php if (empty($details['Billing-Unit'])) {echo "placeholder='Billing Address 1'";}   else{ echo 'value="'.$details['Billing-Unit'].'"'; }?> required>
						</div>
						<div class="col-lg-12">
							<label for="">Address 2<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Billing-Address_Line_2" id="Billing-Address_Line_2" <?php if (empty($details['Billing-Street'])) {echo "placeholder='Billing Address 2'";}   else{ echo 'value="'.$details['Billing-Street'].'"'; }?> required>
						</div>
						<div class="col-lg-12">
							<label for="">City or town<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Billing-Suburb" id="Billing-Suburb" <?php if (empty($details['Billing-Suburb'])) {echo "placeholder='Billing City/Town'";}   else{ echo 'value="'.$details['Billing-Suburb'].'"'; }?> required>
						</div>
						<div class="col-lg-3">
							<label for="">Postcode<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Billing-Postcode" id="Billing-Postcode" <?php if (empty($details['Billing-Postcode'])) {echo "placeholder='Billing Postcode'";}   else{ echo 'value="'.$details['Billing-Postcode'].'"'; }?> required>
						</div>
						<div class="col-lg-3">
							<label for="">State<span class="tipstyle">*</span></label>
							<select class="form-control" name="Billing-State" id="Billing-State" required>
								<option value=""  <?php if (empty($details['Billing-State'])) echo "selected='selected'";?> disabled> State </option>
								<?php 
								$statecode  = file_get_contents("sites/all/themes/evolve/json/State.json");
								$State=json_decode($statecode, true);
								foreach($State  as $key => $value){
								echo '<option value="'.$State[$key]['Abbreviation'].'"';
								if ($details['Billing-State'] == $State[$key]['Abbreviation']){ echo "selected='selected'"; } 
								echo '> '.$State[$key]['Abbreviation'].' </option>';
							
								}
							    ?>
							</select>
						</div>
						<div class="col-lg-6">
							<label for="">Country<span class="tipstyle">*</span></label>
							<select class="form-control" id="Billing-Country" name="Billing-Country" required>
							<?php 
							$countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
							$country=json_decode($countrycode, true);
							foreach($country  as $key => $value){
								
								echo '<option value="'.$country[$key]['Country'].'"';
								if ($details['Billing-Country'] == $country[$key]['Country']){ echo "selected='selected'"; } 
								echo '> '.$country[$key]['Country'].' </option>';
							}
							?>
							</select>
							
						</div>
					</div>
					<!--put code here-->
					<!--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">   <a class="join-details-button2"><span class="dashboard-button-name">Next</span></a><a class="your-details-prevbutton3"><span class="dashboard-button-name">Last</span></a></div>-->
				</div>
				<div id="wpnumber"><?php  if(sizeof($details['Workplaces'])==0){$wpnumber = 0;} else{$wpnumber =  sizeof($details['Workplaces'])-1;} echo  $wpnumber; ?></div>
				<input type="hidden" name="wpnumber" value="<?php  if(sizeof($details['Workplaces'])!=0) {$wpnumber =  sizeof($details['Workplaces']); echo  $wpnumber;} else {$wpnumber =1; echo $wpnumber;} ?>"/>
				
				
				<div class="down3" style="display:none;">
					<div class="row">
						<div class="col-lg-12"> <label for="Findpublicbuddy"><strong>NOTE:</strong>Please list my details in the public (visbile to other health professionals)</label>
						<input type="checkbox" name="Findpublicbuddy" id="Findpublicbuddy" value="<?php  echo $details['Findpublicbuddy'];?>" <?php if($details['Findpublicbuddy']=="True"){echo "checked";} ?>>
						</div>
					</div> 
				
					<ul class="nav nav-tabs" id="tabmenu">
					<?php foreach( $details['Workplaces'] as $key => $value ):  ?>
					<li <?php if($key=='Workplace0') echo 'class ="active" ';?>><a data-toggle="tab" href="#workplace<?php echo $key;?>"><?php echo "Workplace".$key;?></a></li>
					<?php endforeach; ?> 
					<?php if(sizeof($details['Workplaces'])==0):?>
				
			<li class ="active"><a data-toggle="tab" href="#workplace0"><?php echo "Workplace0";?></a></li>
			
			<?php endif; ?>
					</ul>
			 <div id="workplaceblocks">
				<?php foreach( $details['Workplaces'] as $key => $value ):  ?>
					<div id="workplace<?php echo $key;?>" class='tab-pane fade  <?php if($key=='Workplace0') echo "in active ";?> '>
					    <input type="hidden" name="WorkplaceID<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['WorkplaceID'];?>">
						<div class="row"><div class="col-lg-6"> <label for="Findphysio<?php echo $key;?>"><strong>NOTE:</strong>This workplace is included in Find a Pyhsio.</label>
							<input type="checkbox" name="Findphysio<?php echo $key;?>" id="Findphysio<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Findphysio'];?>" <?php if($details['Workplaces'][$key]['Findphysio']=="True"){echo "checked";} ?>></div>
						
						
							<div class="col-lg-6"> <label for="Findabuddy<?php echo $key;?>"><strong>NOTE:</strong>Please list my details in the physio</label>
							<input type="checkbox" name="Findabuddy<?php echo $key;?>" id="Findabuddy<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Find-a-buddy'];?>" <?php if($details['Workplaces'][$key]['Find-a-buddy']=="True"){echo "checked";} ?>>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<label for="Name-of-workplace">Name of workplace<span class="tipstyle">*</span></label>
								<input type="text" class="form-control" name="Name-of-workplace<?php echo $key;?>" id="Name-of-workplace<?php echo $key;?>" <?php if (empty($details['Workplaces'][$key]['Name-of-workplace'])) {echo "placeholder='Name of workplace'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Name-of-workplace'].'"'; }?>>
							</div>
						</div>
						
						<div class="row">
							<div class="col-lg-3">
							Workplace setting<span class="tipstyle">*</span>
							</div>
							<div class="col-lg-9">
								<select class="form-control" id="Workplace-setting<?php echo $key;?>" name="Workplace-setting0" required>
								<?php
							// 2.2.36 - get workplace settings list
							// Send - 
							// Response - get workplace settings from Aptify via webserice return Json data;
							// stroe workplace settings into the session
							$workplaceSettingscode  = file_get_contents("sites/all/themes/evolve/json/workplaceSettings.json");
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
						
						<div class="row"> 
							<div class="col-lg-3">
							Workplace treatment area:
							</div>
							<?php  
								if(!empty($details['Workplaces'][$key]['SpecialInterestAreaID'])) {$SpecialInterestAreaID = explode(",",$details['Workplaces'][$key]['SpecialInterestAreaID']); } else {$SpecialInterestAreaID = array();}
							?>
							<div class="col-lg-6">
								<select class="chosen-select" id="WTreatmentarea<?php echo $key;?>" name="WTreatmentarea<?php echo $key;?>[]" multiple  tabindex="-1" data-placeholder="Choose treatment area...">
								<?php 
								// get interest area from Aptify via webserice return Json data;
								$interestAreascode  = file_get_contents("sites/all/themes/evolve/json/AreaOfInterest__c.json");
								$interestAreas=json_decode($interestAreascode, true);	
								?>
								<?php 
									foreach($interestAreas  as $pair => $value){
										echo '<option value="'.$interestAreas[$pair]["ID"].'"';
										if (in_array( $interestAreas[$pair]["ID"],$SpecialInterestAreaID)){ echo "selected='selected'"; } 
										
										echo '> '.$interestAreas[$pair]["Name"].' </option>'; 
									}
								?>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<label for="BuildingName">Building Name</label>
								<input type="text" class="form-control" name="WBuildingName<?php echo $key;?>" id="WBuildingName<?php echo $key;?>" <?php if (empty($details['Workplaces'][$key]['WBuildingName'])) {echo "placeholder='Building Name'";}   else{ echo 'value="'.$details['Workplaces'][$key]['WBuildingName'].'"'; }?>>
							</div>
							<div class="col-lg-2">
								<label for="WAddress_Line_1<?php echo $key;?>">Address line 1<span class="tipstyle">*</span></label>
								<input type="text" class="form-control" name="WAddress_Line_1<?php echo $key;?>" id="WAddress_Line_1<?php echo $key;?>"  <?php if (empty($details['Workplaces'][$key]['Address_Line_1'])) {echo "placeholder='Address line 1'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Address_Line_1'].'"'; }?> required>
							</div>
							<div class="col-lg-4">
								<label for="WAddress_Line_2<?php echo $key;?>">Address line 2</label>
								<input type="text" class="form-control" name="WAddress_Line_2<?php echo $key;?>" id="WAddress_Line_2<?php echo $key;?>"  <?php if (empty($details['Workplaces'][$key]['Address_Line_2'])) {echo "placeholder='Address line 2'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Address_Line_2'].'"'; }?>>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3">
								<label for="Wcity<?php echo $key;?>">City/Town<span class="tipstyle">*</span></label>
								<input type="text" class="form-control" name="Wcity<?php echo $key;?>" id="Wcity<?php echo $key;?>"  <?php if (empty($details['Workplaces'][$key]['Wcity'])) {echo "placeholder='City or town'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Wcity'].'"'; }?> required>
							</div>
							<div class="col-lg-3">
								<label for="Wpostcode<?php echo $key;?>">Postcode<span class="tipstyle">*</span></label>
								<input type="text" class="form-control" name="Wpostcode<?php echo $key;?>" id="Wpostcode<?php echo $key;?>"  <?php if (empty($details['Workplaces'][$key]['Wpostcode'])) {echo "placeholder='Postcode'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Wpostcode'].'"'; }?> required>
							</div>
							<div class="col-lg-3">
								<label for="Wstate<?php echo $key;?>">State<span class="tipstyle">*</span></label>
								<select class="form-control" id="Wstate<?php echo $key;?>" name="Wstate<?php echo $key;?>" required>
									<option value="" <?php if (empty($details['Workplaces'][$key]['Wstate'])) echo "selected='selected'";?> disabled>State</option>
									<?php
									$statecode  = file_get_contents("sites/all/themes/evolve/json/State.json");
									$State=json_decode($statecode, true);						
									foreach($State  as $pair => $value){
										echo '<option value="'.$State[$pair]['Abbreviation'].'"';
										if ($details['Workplaces'][$key]['Wstate'] == $State[$pair]['Abbreviation']){ echo "selected='selected'"; } 
										echo '> '.$State[$pair]['Abbreviation'].' </option>';
									}
									?>
								</select>
							</div>
							<div class="col-lg-3">
								<label for="Wcountry<?php echo $key;?>">Country<span class="tipstyle">*</span></label>
								<select class="form-control" id="Wcountry<?php echo $key;?>" name="Wcountry<?php echo $key;?>" required>
								<?php 
								$countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
								$country=json_decode($countrycode, true);
								foreach($country  as $pair => $value){
									echo '<option value="'.$country[$pair]['Country'].'"';
									if ($details['Workplaces'][$key]['Wcountry'] == $country[$pair]['Country']){ echo "selected='selected'"; } 
									echo '> '.$country[$pair]['Country'].' </option>';
									
								}
								?>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<label for="Wemail<?php echo $key;?>">Workplace email<span class="tipstyle">*</span></label>
								<input type="email" class="form-control" name="Wemail<?php echo $key;?>" id="Wemail<?php echo $key;?>"  <?php if (empty($details['Workplaces'][$key]['Wemail'])) {echo "placeholder='Workplace email'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Wemail'].'"'; }?> required>
							</div>
							<div class="col-lg-3">
								<label for="Wwebaddress<?php echo $key;?>">Website<span class="tipstyle">*</span></label>
								<input type="text" class="form-control" name="Wwebaddress<?php echo $key;?>" id="Wwebaddress<?php echo $key;?>"  <?php if (empty($details['Workplaces'][$key]['Wwebaddress'])) {echo "placeholder='Website'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Wwebaddress'].'"'; }?> required>
							</div>
							
						</div>
						<div class="row">
							
							<div class="col-lg-2">
								<label for="">Country code</label>
								<select class="form-control" id="WPhoneCountryCode<?php echo $key;?>" name="WPhoneCountryCode<?php echo $key;?>">
								<?php
									$countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
									$country=json_decode($countrycode, true);						
									foreach($country  as $pair => $value){
										echo '<option value="'.$country[$pair]['TelephoneCode'].'"';
										if ($details['Workplaces'][$key]['WPhoneCountryCode'] == $country[$pair]['TelephoneCode']){ echo "selected='selected'"; } 
										echo '> '.$country[$pair]['Country'].' </option>';
									}
								?>
								</select>
							</div>
							<div class="col-lg-2">
								<label for="">Area code</label>
								<input type="text" class="form-control" name="WPhoneAreaCode<?php echo $key;?>" <?php if (empty($details['Workplaces'][$key]['WPhoneAreaCode'])) {echo "placeholder='Phone Area code'";}   else{ echo 'value="'.$details['Workplaces'][$key]['WPhoneAreaCode'].'"'; }?>  maxlength="5">
							</div>
							<div class="col-lg-4">
								<label for="">Phone number</label>
								<input type="text" class="form-control" name="Wphone<?php echo $key;?>" <?php if (empty($details['Workplaces'][$key]['Wphone'])) {echo "placeholder='Phone number'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Wphone'].'"'; }?>  >
							</div>
							<div class="col-lg-2">
								<label for="">Extention Number</label>
								<input type="text" class="form-control" name="WPhoneExtentions<?php echo $key;?>" <?php if (empty($details['Workplaces'][$key]['WPhoneExtentions'])) {echo "placeholder='Extentions Number'";}   else{ echo 'value="'.$details['Workplaces'][$key]['WPhoneExtentions'].'"'; }?>  >
							</div>
							
						</div>
						<div class="row">
							<div class="col-lg-3">
							Does this workplace offer additional languages?<br/>
							</div>
							 <?php  
						if(!empty($details['Workplaces'][$key]['AdditionalLanguage'])) {$WAdditionalLanguage = explode(",",$details['Workplaces'][$key]['AdditionalLanguage']); } else {$WAdditionalLanguage = array();}
						
						?>
							<div class="col-lg-3">
								<select class="chosen-select" id="Additionallanguage<?php echo $key;?>" name="Additionallanguage<?php echo $key;?>[]" multiple  tabindex="-1" data-placeholder="Choose an additional language...">
									
									<?php 
									$Languagecode  = file_get_contents("sites/all/themes/evolve/json/Language.json");
									$Language=json_decode($Languagecode, true);
									foreach($Language  as $pair => $value){
										echo '<option value="'.$Language[$pair]['ID'].'"';
										if (in_array($Language[$pair]['ID'],$WAdditionalLanguage)){ echo "selected='selected'"; } 
										echo '> '.$Language[$pair]['Name'].' </option>';
									}
									?>
								</select>
							</div>
							<div class="col-lg-3">
							Quality In Practice number(QIP):
							</div>
							<div class="col-lg-3">
								<input type="text" class="form-control" name="QIP<?php echo $key;?>" id="QIP<?php echo $key;?>"  <?php if (empty($details['Workplaces'][$key]['QIP'])) {echo "placeholder='QIP Number'";}   else{ echo 'value="'.$details['Workplaces'][$key]['QIP'].'"'; }?>>
							</div>
						</div>
						<div class="row"> 
							<div class="col-lg-3">
							Does this workplace provide:
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<input type="checkbox" name="Electronic-claiming<?php echo $key;?>" id="Electronic-claiming<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Electronic-claiming'];?>" <?php if($details['Workplaces'][$key]['Electronic-claiming']=="True"){echo "checked";} ?>> <label for="Electronic-claiming<?php echo $key;?>">Electronic claiming</label>
							</div>
							<div class="col-lg-6">
								<input type="checkbox" name="Hicaps<?php echo $key;?>" id="Hicaps<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Hicaps'];?>" <?php if($details['Workplaces'][$key]['Hicaps']=="True"){echo "checked";} ?>> <label for="Hicaps<?php echo $key;?>">HICAPS</label>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<input type="checkbox" name="Healthpoint<?php echo $key;?>" id="Healthpoint<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Healthpoint'];?>" <?php if($details['Workplaces'][$key]['Healthpoint']=="True"){echo "checked";} ?>> <label for="Healthpoint<?php echo $key;?>">Healthpoint</label>
							</div>
							<div class="col-lg-6">
								<input type="checkbox" name="Departmentva<?php echo $key;?>" id="Departmentva<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Departmentva'];?>" <?php if($details['Workplaces'][$key]['Departmentva']=="True"){echo "checked";} ?>> <label for="Departmentva<?php echo $key;?>">Department of Vetarans' Affairs</label>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<input type="checkbox" name="Workerscompensation<?php echo $key;?>" id="Workerscompensation<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Workerscompensation'];?>" <?php if($details['Workplaces'][$key]['Workerscompensation']=="True"){echo "checked";} ?>> <label for="Workerscompensation<?php echo $key;?>">Workers compensation</label>
							</div>
							<div class="col-lg-6">
								<input type="checkbox" name="Motora<?php echo $key;?>" id="Motora<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Motora'];?>" <?php if($details['Workplaces'][$key]['Motora']=="True"){echo "checked";} ?>> <label for="Motora<?php echo $key;?>">Motor accident compensation</label>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<input type="checkbox" name="Medicare<?php echo $key;?>" id="Medicare<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Medicare'];?>" <?php if($details['Workplaces'][$key]['Medicare']=="True"){echo "checked";} ?>> <label for="Medicare<?php echo $key;?>">Medicare Chronic Disease Management</label>
							</div>
							<div class="col-lg-6">
								<input type="checkbox" name="Homehospital<?php echo $key;?>" id="Homehospital<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Homehospital'];?>" <?php if($details['Workplaces'][$key]['Homehospital']=="True"){echo "checked";} ?> > <label for="Homehospital<?php echo $key;?>">Home and hospital visits</label>
						    </div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<input type="checkbox" name="Mobilephysiotherapist<?php echo $key;?>" id="Mobilephysiotherapist<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['MobilePhysio'];?>" <?php if($details['Workplaces'][$key]['MobilePhysio']=="True"){echo "checked";} ?>> <label for="Mobilephysiotherapist<?php echo $key;?>">Mobile physiotherapist</label>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3">
							Numbers of hours worked<span class="tipstyle">*</span>
							</div>
							<div class="col-lg-6">
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
					<?php /*
					<p>[animate type="fadeInUp"]</p>
					<p>[accordions class="question"]</p>
					<p>[accordion title="Your interest area"]</p>

					<div class="row"> 
					<div class="col-lg-3">
					Your special interest area:
					</div>
					</div>

					<div class="row">
					<div class="col-lg-4">
					<input type="checkbox" name="Acupuncture-dry-needing<?php echo $key;?>" id="Acupuncture-dry-needing<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Acupuncture-dry-needing'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Acupuncture-dry-needing']==1){echo "checked";} ?>> <label for="Acupuncture-dry-needing<?php echo $key;?>">Acupuncture and dry needling</label>

					</div>
					<div class="col-lg-4">
					<input type="checkbox" name="Adolescents<?php echo $key;?>" id="Adolescents<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Adolescents'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Adolescents']==1){echo "checked";} ?>> <label for="Adolescents<?php echo $key;?>">Adolescents</label>
					</div>
					<div class="col-lg-4">
					<input type="checkbox" name="Ageing-well<?php echo $key;?>" id="Ageing-well<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Ageing-well'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Ageing-well']==1){echo "checked";} ?>> <label for="Ageing-well<?php echo $key;?>">Ageing well</label>
					</div>

					</div>
					<div class="row">
					<div class="col-lg-4">
					<input type="checkbox" name="Amputees<?php echo $key;?>" id="Amputees<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Amputees'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Amputees']==1){echo "checked";} ?>> <label for="Amputees<?php echo $key;?>">Amputees</label>
					</div>
					<div class="col-lg-4">
					<input type="checkbox" name="Arthritis<?php echo $key;?>" id="Arthritis<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Arthritis'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Arthritis']==1){echo "checked";} ?>> <label for="Arthritis<?php echo $key;?>">Arthritis</label>
					</div>
					<div class="col-lg-4">
					<input type="checkbox" name="Babies-children<?php echo $key;?>" id="Babies-children<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Babies-children'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Babies-children']==1){echo "checked";} ?>> <label for="Babies-children<?php echo $key;?>">Babies and children</label>
					</div>
					</div>
					<div class="row">
					<div class="col-lg-4">
					<input type="checkbox" name="Back-neck<?php echo $key;?>" id="Back-neck<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Back-neck'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Back-neck']==1){echo "checked";} ?>> <label for="Back-neck<?php echo $key;?>">Back and neck</label>
					</div>
					<div class="col-lg-4">
					<input type="checkbox" name="Bowel<?php echo $key;?>" id="Bowel<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Bowel'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Bowel']==1){echo "checked";} ?>> <label for="Bowel<?php echo $key;?>">Bowel and bladder health</label>
					</div>
					<div class="col-lg-4">
					<input type="checkbox" name="Brain<?php echo $key;?>" id="Brain<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Brain'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Brain']==1){echo "checked";} ?>> <label for="Brain<?php echo $key;?>">Brain and spinal cord</label>
					</div>
					</div>
					<div class="row">
					<div class="col-lg-4">
					<input type="checkbox" name="Cancer<?php echo $key;?>" id="Cancer<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Cancer'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Cancer']==1){echo "checked";} ?>> <label for="Cancer<?php echo $key;?>">Cancer and lympheodema</label>
					</div>
					<div class="col-lg-4">
					<input type="checkbox" name="Chronic-pain<?php echo $key;?>" id="Chronic-pain<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Chronic-pain'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Chronic-pain']==1){echo "checked";} ?>> <label for="Chronic-pain<?php echo $key;?>">Chronic pain</label>
					</div>
					<div class="col-lg-4">
					<input type="checkbox" name="Wdisability<?php echo $key;?>" id="Wdisability<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Wdisability'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Wdisability']==1){echo "checked";} ?>> <label for="Wdisability<?php echo $key;?>">Disability</label>
					</div>
					</div>
					<div class="row">
					<div class="col-lg-4">
					<input type="checkbox" name="Wdiabetes<?php echo $key;?>" id="Wdiabetes<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Wdiabetes'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Wdiabetes']==1){echo "checked";} ?>> <label for="Wdiabetes<?php echo $key;?>">Diabetes</label>
					</div>
					<div class="col-lg-4">
					<input type="checkbox" name="Feldenkrais<?php echo $key;?>" id="Feldenkrais<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Feldenkrais'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Feldenkrais']==1){echo "checked";} ?>> <label for="Feldenkrais<?php echo $key;?>">Feldenkrais</label>
					</div>
					<div class="col-lg-4">
					<input type="checkbox" name="Hand-therapy<?php echo $key;?>" id="Hand-therapy<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Hand-therapy'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Hand-therapy']==1){echo "checked";} ?>> <label for="Hand-therapy<?php echo $key;?>">Hand therapy</label>
					</div>
					</div>
					<div class="row">
					<div class="col-lg-4">
					<input type="checkbox" name="Head-face<?php echo $key;?>" id="Head-face<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Head-face'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Head-face']==1){echo "checked";} ?>> <label for="Head-face<?php echo $key;?>">Head and face</label>
					</div>
					<div class="col-lg-4">
					<input type="checkbox" name="Healthwork<?php echo $key;?>" id="Healthwork<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Healthwork'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Healthwork']==1){echo "checked";} ?>> <label for="Healthwork<?php echo $key;?>">Health at work</label>
					</div>
					<div class="col-lg-4">
					<input type="checkbox" name="Heart-lung<?php echo $key;?>" id="Heart-lung<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Heart-lung'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Heart-lung']==1){echo "checked";} ?>> <label for="Heart-lung<?php echo $key;?>">Heart and lung health</label>
					</div>
					</div>
					<div class="row">
					<div class="col-lg-4">
					<input type="checkbox" name="Hydrotherapy<?php echo $key;?>" id="Hydrotherapy<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Hydrotherapy'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Hydrotherapy']==1){echo "checked";} ?>> <label for="Hydrotherapy<?php echo $key;?>">Hydrotherapy</label>
					</div>
					<div class="col-lg-4">
					<input type="checkbox" name="Lower-limbs<?php echo $key;?>" id="Lower-limbs<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Lower-limbs'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Lower-limbs']==1){echo "checked";} ?>> <label for="Lower-limbs<?php echo $key;?>">Lower limbs</label>
					</div>
					<div class="col-lg-4">
					<input type="checkbox" name="Wmen-health<?php echo $key;?>" id="Wmen-health<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Wmen-health'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Wmen-health']==1){echo "checked";} ?>> <label for="Wmen-health<?php echo $key;?>">Men’s health</label>
					</div>
					</div>
					<div class="row">
					<div class="col-lg-4">
					<input type="checkbox" name="Neurological-conditions<?php echo $key;?>" id="Neurological-conditions<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Neurological-conditions'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Neurological-conditions']==1){echo "checked";} ?>> <label for="neurological-conditions<?php echo $key;?>">Neurological conditions</label>
					</div>
					<div class="col-lg-4">
					<input type="checkbox" name="Worthopaedics<?php echo $key;?>" id="Worthopaedics<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Worthopaedics'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Worthopaedics']==1){echo "checked";} ?>> <label for="Worthopaedics<?php echo $key;?>">Orthopaedics</label>
					</div>
					<div class="col-lg-4">
					<input type="checkbox" name="Palliative-care<?php echo $key;?>" id="Palliative-care<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Palliative-care'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Palliative-care']==1){echo "checked";} ?>> <label for="Palliative-care<?php echo $key;?>">Palliative care</label>
					</div>
					</div>
					<div class="row">
					<div class="col-lg-4">
					<input type="checkbox" name="Pilates<?php echo $key;?>" id="Pilates<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Pilates'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Pilates']==1){echo "checked";} ?>> <label for="Pilates<?php echo $key;?>">Pilates</label>
					</div>
					<div class="col-lg-4">
					<input type="checkbox" name="Pre-post<?php echo $key;?>" id="Pre-post<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Pre-post'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Pre-post']==1){echo "checked";} ?>> <label for="Pre-post<?php echo $key;?>">Pre and post-natal</label>
					</div>
					<div class="col-lg-4">
					<input type="checkbox" name="Pre-surgey<?php echo $key;?>" id="Pre-surgey<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Pre-surgey'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Pre-surgey']==1){echo "checked";} ?>> <label for="Pre-surgey<?php echo $key;?>">Pre and post-surgery</label>
					</div>
					</div>
					<div class="row">
					<div class="col-lg-4">
					<input type="checkbox" name="Stroke-recovery<?php echo $key;?>" id="Stroke-recovery<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Stroke-recovery'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Stroke-recovery']==1){echo "checked";} ?>> <label for="Stroke-recovery<?php echo $key;?>">Stroke recovery</label>
					</div>
					<div class="col-lg-4">
					<input type="checkbox" name="Sexual-health<?php echo $key;?>" id="Sexual-health<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Sexual-health'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Sexual-health']==1){echo "checked";} ?>> <label for="Sexual-health<?php echo $key;?>">Sexual health</label>
					</div>
					<div class="col-lg-4">
					<input type="checkbox" name="Sport-injuries<?php echo $key;?>" id="Sport-injuries<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Sport-injuries'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Sport-injuries']==1){echo "checked";} ?>> <label for="Sport-injuries<?php echo $key;?>">Sport injuries</label>
					</div>
					</div>
					<div class="row">
					<div class="col-lg-4">
					<input type="checkbox" name="Upper-limbs<?php echo $key;?>" id="Upper-limbs<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Upper-limbs'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Upper-limbs']==1){echo "checked";} ?>> <label for="Upper-limbs<?php echo $key;?>">Upper limbs</label>
					</div>
					<div class="col-lg-4">
					<input type="checkbox" name="Women-health<?php echo $key;?>" id="Women-health<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Women-health'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Women-health']==1){echo "checked";} ?>> <label for="Women-health<?php echo $key;?>">Women’s health</label>
					</div>
					<div class="col-lg-4">
					<input type="checkbox" name="Yoga<?php echo $key;?>" id="Yoga<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Yoga'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Yoga']==1){echo "checked";} ?>> <label for="Yoga<?php echo $key;?>">Yoga</label>
					</div>
					</div>
					<p>[/accordion]</p>
					<p>[/accordions]</p>
					<p>[/animate]</p>*/ ?>
						
					</div>
				<?php endforeach; ?>
				<?php if(sizeof($details['Workplaces'])==0):?>
				
			
				<div id="workplace0" class='tab-pane fade in active'> 
				    <input type="hidden" name="WorkplaceID0" value="-1">
					<div class="row"><div class="col-lg-6"></div><div class="col-lg-6"> <label for="Findphysio"><strong>NOTE:</strong>This workplace is included in Find a Pyhsio.</label>
					<input type="checkbox" name="Findphysio0" id="Findphysio" value="" ></div></div>
					<div class="row">
						<div class="col-lg-12"> <label for="Findabuddy0"><strong>NOTE:</strong>Please list my details in the physio</label>
							<input type="checkbox" name="Findabuddy0" id="Findabuddy0" value="">
						</div>
				    </div>
				<div class="row">
					<div class="col-lg-12">
						<label for="Name-of-workplace">Name of workplace<span class="tipstyle">*</span></label>
						<input type="text" class="form-control" name="Name-of-workplace0" id="Name-of-workplace0">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3">
					Workplace setting<span class="tipstyle">*</span>
					</div>
					<div class="col-lg-9">
						<select class="form-control" id="Workplace-setting0" name="Workplace-setting0">
						<?php
							// 2.2.36 - get workplace settings list
							// Send - 
							// Response - get workplace settings from Aptify via webserice return Json data;
							// stroe workplace settings into the session
							$workplaceSettingscode  = file_get_contents("sites/all/themes/evolve/json/workplaceSettings.json");
							$workplaceSettings=json_decode($workplaceSettingscode, true);	
							$_SESSION["workplaceSettings"] = $workplaceSettings;
							foreach($workplaceSettings  as $pair => $value){
							echo '<option value="'.$workplaceSettings[$pair]["ID"].'"';
							echo '> '.$workplaceSettings[$pair]["Name"].' </option>'; 
							}							
						?>
						</select>
					</div>
				</div>
				<div class="row"> 
					<div class="col-lg-3">
					Workplace treatment area:
					</div>
				</div>
				<div class="row"> 
					<div class="col-lg-6">
						<select class="chosen-select" id="WTreatmentarea0" name="WTreatmentarea0" multiple  tabindex="-1" data-placeholder="Choose treatment area...">
						<?php 
							// get interest area from Aptify via webserice return Json data;
							$interestAreascode  = file_get_contents("sites/all/themes/evolve/json/AreaOfInterest__c.json");
							$interestAreas=json_decode($interestAreascode, true);
                            $_SESSION["interestAreas"] = $interestAreas;							
						?>
						<?php 
							foreach($interestAreas  as $pair => $value){
								echo '<option value="'.$interestAreas[$pair]["ID"].'"';
								echo '> '.$interestAreas[$pair]["Name"].' </option>'; 
							}
						?>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<label for="BuildingName">Building Name</label>
						<input type="text" class="form-control" name="WBuildingName0" id="WBuildingName0">
					</div>
					<div class="col-lg-2">
					<label for="WAddress_Line_10">Address line 1<span class="tipstyle">*</span></label>
					<input type="text" class="form-control" name="WAddress_Line_10" id="WAddress_Line_10">
					</div>
					<div class="col-lg-4">
					<label for="WAddress_Line_20">Address line 2</label>
					<input type="text" class="form-control" name="WAddress_Line_20" id="WAddress_Line_20">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3">
						<label for="Wcity">City/Town<span class="tipstyle">*</span></label>
						<input type="text" class="form-control" name="Wcity0" id="Wcity0">
					</div>
					<div class="col-lg-3">
						<label for="Wpostcode">Postcode<span class="tipstyle">*</span></label>
						<input type="text" class="form-control" name="Wpostcode0" id="Wpostcode0">
					</div>
					<div class="col-lg-3">
						<label for="Wstate">State<span class="tipstyle">*</span></label>
						<select class="form-control" id="Wstate0" name="Wstate0">
							<option value="" selected disabled> State </option>
							<?php 
								$statecode  = file_get_contents("sites/all/themes/evolve/json/State.json");
								$State=json_decode($statecode, true);
								foreach($State  as $key => $value){
								echo '<option value="'.$State[$key]['Abbreviation'].'"';
							    echo '> '.$State[$key]['Abbreviation'].' </option>';
								}
							?>
						</select>
					</div>
					<div class="col-lg-3">
						<label for="Wcountry">Country<span class="tipstyle">*</span></label>
					    <select class="form-control" id="Wcountry0" name="Wcountry0">
							<?php 
							$countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
							$country=json_decode($countrycode, true);
							foreach($country  as $key => $value){
								echo '<option value="'.$country[$key]['Country'].'"';
								echo '> '.$country[$key]['Country'].' </option>';
								
							}
							?>
					    </select>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<label for="Wemail">Workplace email<span class="tipstyle">*</span></label>
						<input type="email" class="form-control" name="Wemail0" id="Wemail0">
					</div>
					<div class="col-lg-3">
						<label for="Wwebaddress">Website<span class="tipstyle">*</span></label>
						<input type="text" class="form-control" name="Wwebaddress0" id="Wwebaddress0">
					</div>
					<div class="col-lg-3">
						<label for="Wphone">Phone number<span class="tipstyle">*</span></label>
						<input type="text" class="form-control" name="Wphone0" id="Wphone0">
					</div>
					
				</div>
				<div class="row">
							
							<div class="col-lg-2">
								<label for="">Country code</label>
								<select class="form-control" id="WPhoneCountryCode0" name="WPhoneCountryCode0">
								<?php
									$countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
									$country=json_decode($countrycode, true);						
									foreach($country  as $key => $value){
										echo '<option value="'.$country[$key]['TelephoneCode'].'"';
										
										echo '> '.$country[$key]['Country'].' </option>';
									}
								?>
								</select>
							</div>
							<div class="col-lg-2">
								<label for="">Area code</label>
								<input type="text" class="form-control" name="WPhoneAreaCode0" maxlength="5">
							</div>
							<div class="col-lg-4">
								<label for="">Phone number</label>
								<input type="text" class="form-control" name="Wphone0">
							</div>
							<div class="col-lg-2">
								<label for="">Extention Number</label>
								<input type="text" class="form-control" name="WPhoneExtentions0">
							</div>
							
				</div>
				<div class="row">
					<div class="col-lg-3">
					Does this workplace offer additional languages?<br/>
					</div>
					<div class="col-lg-3">
						<select class="chosen-select" id="Additionallanguage0" name="Additionallanguage0[]" multiple  tabindex="-1" data-placeholder="Choose an additional language...">
							<?php 
								$Languagecode  = file_get_contents("sites/all/themes/evolve/json/Language.json");
								$Language=json_decode($Languagecode, true);
								foreach($Language  as $key => $value){
									echo '<option value="'.$Language[$key]['ID'].'"';
									echo '> '.$Language[$key]['Name'].' </option>';
								}
								?>
						</select>
					</div>
					<div class="col-lg-3">
					Quality In Practice number(QIP):
						</div>
					<div class="col-lg-3">
					<input type="text" class="form-control" name="QIP0" id="QIP0">
					</div>
				</div>
				<div class="row"> 
					<div class="col-lg-3">
					Does this workplace provide:
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
					<input type="checkbox" name="Electronic-claiming0" id="Electronic-claiming0" value=""> <label for="Electronic-claiming0">Electronic claiming</label>
					</div>
					<div class="col-lg-6">
					<input type="checkbox" name="Hicaps0" id="Hicaps0" value=""> <label for="Hicaps0">HICAPS</label>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<input type="checkbox" name="Healthpoint0" id="Healthpoint0" value="" > <label for="Healthpoint0">Healthpoint</label>
					</div>
					<div class="col-lg-6">
						<input type="checkbox" name="Departmentva0" id="Departmentva0" value=""> <label for="Departmentva0">Department of Vetarans' Affairs</label>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<input type="checkbox" name="Workerscompensation0" id="Workerscompensation0" value=""> <label for="Workerscompensation0">Workers compensation</label>
					</div>
					<div class="col-lg-6">
					<input type="checkbox" name="Motora0" id="Motora0" value=""> <label for="Motora0">Motor accident compensation</label>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<input type="checkbox" name="Medicare0" id="Medicare0" value=""> <label for="Medicare0">Medicare Chronic Disease Management</label>
					</div>
					<div class="col-lg-6">
						<input type="checkbox" name="Homehospital0" id="Homehospital0" value=""> <label for="Homehospital0">Home and hospital visits</label>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<input type="checkbox" name="Mobilephysiotherapist0" id="Mobilephysiotherapist0" value=""> <label for="Mobilephysiotherapist0">Mobile physiotherapist</label>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3">
					Numbers of hours worked<span class="tipstyle">*</span>
					</div>
					<div class="col-lg-6">
						<select class="form-control" id="Number-worked-hours0" name="Number-worked-hours0">
							<option value="0" disabled>no</option>
							<?php 
							$NumberOfHourscode  = file_get_contents("sites/all/themes/evolve/json/NumberOfHours.json");
							$NumberOfHours=json_decode($NumberOfHourscode, true);
							foreach($NumberOfHours  as $key => $value){
								echo '<option value="'.$NumberOfHours[$key]['ID'].'"';
								echo '> '.$NumberOfHours[$key]['Name'].' </option>';
							}
							?>
						</select>
					</div>
				</div>
				</div>
			
				
				<?php endif; ?>			
				<!--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">   <a class="join-details-button3"><span class="dashboard-button-name">Next</span></a><a class="your-details-prevbutton14"><span class="dashboard-button-name">Last</span></a></div>-->
			</div>	
			<div class="row"><div class="col-xs-9 col-sm-9 col-md-9 col-lg-9"><a class="add-workplace-join"><span class="dashboard-button-name">Add workplace</span></a></div></div>	
			</div>
			<div class="down4" style="display:none;" >
				
				<div class="row">
					<div class="col-lg-6">
						<a class="add-additional-qualification"><span class="dashboard-button-name">Add qualification</span></a>
						<input type="hidden" id="addtionalNumber" name="addtionalNumber" value="<?php  $addtionalNumber =  sizeof($details['PersonEducation']); echo  $addtionalNumber; ?>"/>			
					</div>
				</div>
				<div id="additional-qualifications-block">
				<?php foreach($details['PersonEducation'] as $key => $value) :?>
				    
					<div id="additional<?php echo $key;?>">
					    <input type="hidden" name="ID<?php echo $key;?>" value="<?php  echo $details['PersonEducation'][$key]['ID'];?>">
						<div class="row">
							<div class="col-lg-6">
								<label for="Udegree<?php echo $key;?>">Degree<span class="tipstyle">*</span></label>
								<?php 
									$degreecode  = file_get_contents("sites/all/themes/evolve/json/Educationdegree.json");
									$degree=json_decode($degreecode, true);
									$_SESSION["degree"] = $degree;	
								?>
								<?php if (!empty($details['PersonEducation'][$key]['DegreeID'])):?>
								<select name="Udegree<?php echo $key;?>" id="Udegree<?php echo $key;?>">
								    <?php 
										foreach($degree  as $pair => $value){
											echo '<option value="'.$degree[$pair]['ID'].'"';
											if ($details['PersonEducation'][$key]['DegreeID'] == $degree[$pair]['ID']){ echo "selected='selected'"; } 
											echo '> '.$degree[$pair]['Name'].' </option>';
											
										}
									?>
									<!--<option value="0" >Other</option>-->
								</select>
								<?php endif;?>
								<?php if (empty($details['PersonEducation'][$key]['DegreeID'])):?>
								<input type="text" class="form-control" name="University-degree<?php echo $key;?>" id="University-degree<?php echo $key;?>" value="<?php echo $details['PersonEducation'][$key]['Degree'];?>">
								<?php endif;?>
								
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<label for="Undergraduate-university-name<?php echo $key;?>">University name<span class="tipstyle">*</span></label>
								<?php 
									$universityCode  = file_get_contents("sites/all/themes/evolve/json/University.json");
									$University=json_decode($universityCode, true);
									$_SESSION["University"] = $University;	
								?>
								<?php if (!empty($details['PersonEducation'][$key]['InstituteID'])):?>
								<select name="Undergraduate-university-name<?php echo $key;?>" id="Undergraduate-university-name<?php echo $key;?>">
									<?php 
										foreach($University  as $pair => $value){
											echo '<option value="'.$University[$pair]['ID'].'"';
											if ($details['PersonEducation'][$key]['InstituteID'] == $University[$pair]['ID']){ echo "selected='selected'"; } 
											echo '> '.$University[$pair]['Name'].' </option>';
											
										}
									?>
									<!--<option value="0">Other</option>-->
								</select>
								<?php endif;?>
								<?php if (empty($details['PersonEducation'][$key]['InstituteID'])):?>
								<input type="text" class="form-control" name="Undergraduate-university-name-other<?php echo $key;?>" id="Undergraduate-university-name-other<?php echo $key;?>" value="<?php echo $details['PersonEducation'][$key]['Institute'];?>">
							    <?php endif;?>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-4">
								<label for="Ugraduate-country<?php echo $key;?>">Country<span class="tipstyle">*</span></label>
								<select class="form-control" id="Ugraduate-country<?php echo $key;?>" name="Ugraduate-country<?php echo $key;?>">
								<?php 
								$countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
								$country=json_decode($countrycode, true);
								foreach($country  as $pair => $value){
									echo '<option value="'.$country[$pair]['ID'].'"';
									if ($details['PersonEducation'][$key]['Country'] == $country[$pair]['ID']){ echo "selected='selected'"; } 
									echo '> '.$country[$pair]['Country'].' </option>';
									
								}
								?>
								</select>
							</div>
							<div class="col-lg-2">
								<label for="Ugraduate-yearattained<?php echo $key;?>">Year attained<span class="tipstyle">*</span></label>
								<select class="form-control" name="Ugraduate-yearattained<?php echo $key;?>" id="Ugraduate-yearattained<?php echo $key;?>">
								<?php 
								$y = date("Y") + 15; 
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
				<?php endforeach;?>
				</div>
				<!--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">   <a class="join-details-button4"><span class="dashboard-button-name">Next</span></a><a class="your-details-prevbutton4"><span class="dashboard-button-name">Last</span></a></div>-->
			</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding" id="your-details-button">   <button type="submit" id="your-details-submit-button" class="dashboard-button dashboard-bottom-button your-details-submit"><span class="dashboard-button-name">Submit</span></button></div>
	</form>
		<form id="changePasswordForm">
			<div class="down7" style="display:none;" >
				<div class="row">
					<div class="col-lg-6">
						<input type="password" class="form-control" placeholder="Current password" value="" name="Password">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<input type="password" class="form-control" placeholder="New password" id="New_password" name="New_password">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<input type="password" class="form-control" placeholder="Confirm password" id="Confirm_password" name="Confirm_password">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding:0;">   <button  class="dashboard-button dashboard-bottom-button change-password-button"><span class="dashboard-button-name">Save</span></button></div>
			</div>
		</form>
		<div id="addPaymentCardForm" style="display:none;">
			<form action="/your-details?action=addcard" method="POST" id="formaddcard">
				<div class="row"><div class="col-lg-12">Add a new card:</div></div>
				<div class="row">
					<input type="hidden" name="addCard">
					<div class="col-lg-12">
						<select class="form-control" id="Cardtype" name="Cardtype" placeholder="Card type">
						<?php 
							$PaymentTypecode  = file_get_contents("sites/all/themes/evolve/json/PaymentType.json");
							$PaymentType=json_decode($PaymentTypecode, true);
							foreach($PaymentType  as $pair => $value){
								echo '<option value="'.$PaymentType[$pair]['ID'].'"';
								echo '> '.$PaymentType[$pair]['Name'].' </option>';
								
							}
						?>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
					<input type="text" class="form-control" id="Cardname" name="Cardname" placeholder="Name on card">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<input type="text" class="form-control" id="Cardnumber" name="Cardnumber" placeholder="Card number"  required maxlength="16">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<input type="text" class="form-control" id="Expirydate" name="Expirydate" placeholder="Expire date" required maxlength="4">
					</div>
				</div>
				<div class="row"> 
					<div class="col-lg-6">
						<input type="text" class="form-control" id="CCV" name="CCV" placeholder="CVV">
					</div>
					<div class="col-lg-6">
						<div class="tooltip">What is this?
						<span class="tooltiptext"><img src="http://localhost/sites/default/files/MEDIA/CVV number.png" ></span>
						</div>
					</div>
				</div>				 
				<div class="row">
					<a target="_blank" class="addCartlink"><button type="submit" class="dashboard-button dashboard-bottom-button your-details-submit addCartButton">Save</button></a>
				</div>
			</form>
		</div>
		<div id="rollOverWindow" style="display:none;">
			<form action="your-details?action=rollover" method="POST" id="rollOverForm">
				<h3>Are you sure you do want to change roll over status next year?</h3>
				<input type="hidden" name="selectedCard">
				<label for="rollover">Roll over</label><input type="checkbox" id="rollover" checked> 
				<input type="submit" value="Yes">
				<a target="_self" class="cancelDeleteButton">No</a>
			</form>
		</div>
		<div id="deleteCardWindow" style="display:none;">
			<form action="your-details?action=delete" method="POST" id="deleteCardForm">
				<h3>Are you sure you want to delete this card?</h3>
				<input type="hidden" name="deleteID" id="deleteID" value="">
				<input type="submit" value="Yes">
				<a target="_self" class="cancelDeleteButton">No</a>
			</form>
		</div>
		<div id="setCardWindow" style="display:none;">
			<form action="your-details" method="POST" id="setCardForm">
				<h3>Are you sure you do want to set selected car as main creadit card</h3>
				<input type="hidden" name="setCardID" id="setCardID" value="">
			    <input type="submit" value="Yes">
				<a target="_self" class="cancelDeleteButton">No</a>
			</form>
		</div>
		<div id="updateCardForm" style="display:none;">
			<form action="/your-details?action=updatecard" method="POST" id="updatecard">
				<div class="row"><div class="col-lg-12">Update your card:</div></div>
				<input type="hidden" name="selectedCard">
				<div class="row">
					<div class="col-lg-6">
						<input type="text" class="form-control"  name="Expirydate" placeholder="Expire date">
					</div>
				</div>
				<div class="row"> 
					<div class="col-lg-6">
						<input type="text" class="form-control"  name="CVV" placeholder="CVV">
					</div>
					<div class="col-lg-6">
						<div class="tooltip">What is this?
						<span class="tooltiptext"><img src="http://localhost/sites/default/files/MEDIA/CVV number.png" ></span>
						</div>
					</div>
				</div>				 
				<div class="row">
					<a target="_blank" class="addCartlink"><button type="submit" class="dashboard-button dashboard-bottom-button your-details-submit addCartButton">Save</button></a>
				</div>
			</form>
	    </div>
		<div id="uploadImage" style="display:none;">
			<form action="your-details" method="POST" enctype="multipart/form-data">
				Select image to upload:
				<input type="file" name="fileToUpload" id="fileToUpload">
				<input type="submit" value="Upload Image" name="PictureUpdate">
			</form>
		</div>
	</div>
	</div>
	</div>
</div>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('#workplace').click(function(){
		$('#dashboard-right-content').addClass("autoscroll");
		});
		$('.add-workplace-join').click(function(){
			var number = Number($('#wpnumber').text());
			var i = Number(number +1);
			var j = Number(number +2);
			$('div[class="down3"] #tabmenu').append( '<li id="workplaceli'+ i + '"><a data-toggle="tab" href="#workplace'+ i + '">Workplace'+ i+'</a><span class="deletewp'+ i + '" style=" float: right; color: red; margin-right: 55%;">x</span></li>' );
			$('div[id="workplaceblocks"]').append('<div id="workplace'+ i +'" class="tab-pane fade"></div>');
			$('#wpnumber').text(i);
			$('input[name=wpnumber]').val(j);
			var sessionvariable = '<?php echo json_encode($_SESSION["workplaceSettings"]);?>';
			var sessionInterest = '<?php echo json_encode($_SESSION["interestAreas"]);?>';
			var sessionLanguage = '<?php echo json_encode($_SESSION["Language"]);?>';
			var sessionCountry = <?php echo json_encode($_SESSION['country']);?>;
			$("#workplace"+ i ).load("sites/all/themes/evolve/commonFile/workplace.php", {"count":i,"sessionWorkplaceSetting":sessionvariable, "sessioninterestAreas":sessionInterest, "sessionLanguage":sessionLanguage, "sessionCountry":sessionCountry});
			$(".chosen-select").chosen({width: "100%"});
		});
		$("a[href^=#workplace]").live( "click", function(){ $(".chosen-select").chosen({width: "100%"});});
		$("[class^=deletewp]").live( "click", function(){
			var x = $(this).attr("class").replace('deletewp', '');
			$("#workplaceli"+ x).remove();
			$("#workplace"+ x).remove();
			$(".deletewp"+ x).remove();
		});
	});
</script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="http://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
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
        var number = Number($('#addtionalNumber').val());
		var sessionCountry = <?php echo json_encode($_SESSION['country']);?>;
		var sessionDegree = <?php echo json_encode($_SESSION['degree']);?>;
		var sessionUniversity = <?php echo json_encode($_SESSION['University']);?>;
		$('div[id="additional-qualifications-block"]').append('<div id="additional'+ number +'"></div>');
		$("#additional"+ number ).load("sites/all/themes/evolve/commonFile/education.php", {"count":number,"sessionCountry":sessionCountry,"sessionDegree":sessionDegree,"sessionUniversity":sessionUniversity});
        var i = Number(number +1);
		$('input[name=addtionalNumber]').val(i);
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
background: url("http://localhost/sites/default/files/logo_apa_0.png") 0 0 no-repeat;
}
.ui-icon.Visa{
background: url("http://localhost/sites/default/files/logo_apa_0.png") 0 0 no-repeat;
}
.ui-icon.AE{
background: url("http://localhost/sites/default/files/logo_apa_0.png") 0 0 no-repeat;
}
</style>
