<?php
if(!function_exists('drupal_session_started'))
{
  die("Unauthorized Access");
}
?>
<?php
  	//define Magazine and Fellowship tag
	$IntouchTag = false;
	$SportTag = false;
	$FellowTag = false;
	$fpProduct = "0";
	if(sizeof(getProduct($_SESSION['UserId'],"MG1"))!=0) { $IntouchTag = true; }
    if(sizeof(getProduct($_SESSION['UserId'],"MG2"))!=0) { $SportTag = true;}
	if(sizeof(getProduct($_SESSION['UserId'],"FP"))!=0) {
		$FellowTag= true;
		$fpResults = getProduct($_SESSION['UserId'],"FP");
		foreach ($fpResults as $fpResult) {
			$fpProduct = $fpResult;
		}
	}
	//Put filter condition to display member type
$filterMemberProduct = array("10007","10008","10009","9997");
// 2.2.21 - Get Fellowship product
	// Send -
	// ProductID
	// Response - UserID & detail data
	$tt["ProductID"] = "";
	$fellowshipProducts = aptify_get_GetAptifyData("21", $tt);
    //$fellow = array_shift($fellowshipProducts);
	foreach ($fellowshipProducts as $fellowshipProduct){
		if($fellowshipProduct['FPid'] !="0"){
			$fellowshipProductID = $fellowshipProduct['ProductID'];
		}
		if($fellowshipProduct['ProductID']=="9977") { $SportPrice =$fellowshipProduct['FPprice']; }
		if($fellowshipProduct['ProductID']=="9978") { $IntouchPrice =$fellowshipProduct['FPprice']; }
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
	//if(isset($_POST['Birth'])){ $postData['birth'] = str_replace("-","/",$_POST['Birth']); }
	if(isset($_POST['birthdate']) && isset($_POST['birthmonth']) && isset($_POST['birthyear'])) {
	  $postData['birth'] = $_POST['birthyear']."/".$_POST['birthmonth']."/".$_POST['birthdate'];
    }
	if(isset($_POST['Gender'])){ $postData['Gender'] = $_POST['Gender']; }
	if(isset($_POST['country-code'])){ $postData['Home-country-code'] = $_POST['country-code']; }
	if(isset($_POST['area-code'])){ $postData['Home-area-code'] = $_POST['area-code']; }
	if(isset($_POST['phone-number'])){ $postData['Home-phone-number'] = str_replace("-","",$_POST['phone-number']); }
	if(isset($_POST['Mobile-country-code'])){ $postData['Mobile-country-code'] = $_POST['Mobile-country-code']; }
	if(isset($_POST['Mobile-area-code'])){ $postData['Mobile-area-code'] = $_POST['Mobile-area-code']; } else {$postData['Mobile-area-code'] = "";}
	if(isset($_POST['Mobile-number'])){ $postData['Mobile-number'] = str_replace("-","",$_POST['Mobile-number']); }
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
	if(isset($_POST['Suburb'])){ $postData['Suburb'] = $_POST['Suburb']; }
	if(isset($_POST['Postcode'])){ $postData['Postcode'] = $_POST['Postcode']; }
	if(isset($_POST['State'])){ $postData['State'] = $_POST['State']; }  else {$postData['State'] = "";}
	if(isset($_POST['Country'])){ $postData['Country'] = $_POST['Country']; }
	if(isset($_POST['Status'])){ $postData['Status'] = $_POST['Status']; }
	if(isset($_POST['Specialty'])){ $postData['Specialty'] = $_POST['Specialty']; }
	//update mailing address is mandatory on 16/10/2019

    if (isset($_POST['Shipping-address-join']) && $_POST['Shipping-address-join'] == '1') {
        if(isset($_POST['BuildingName'])) {$postData['Mailing-BuildingName']  = $_POST['BuildingName']; } else{ $postData['Mailing-BuildingName'] = "";}
        if(isset($_POST['Address_Line_1'])) {$postData['Mailing-Address_line_1'] = $_POST['Address_Line_1'];} else{$postData['Mailing-Address_line_1'] = "";}
        if(isset($_POST['Address_Line_2'])) {$postData['Mailing-Address_line_2'] = $_POST['Address_Line_2']; } else {$postData['Mailing-Address_line_2'] ="";}
        $postData['Mailing-PObox']         = $_POST['Pobox'];
        $postData['Mailing-city-town']        = $_POST['Suburb'];
        $postData['Mailing-postcode']      = $_POST['Postcode'];
        if(isset($_POST['State'])) {$postData['Mailing-state']  = $_POST['State'];} else{$postData['Mailing-state']  = "";}
        $postData['Mailing-country']       = $_POST['Country'];
    } else {
        if($_POST['Mailing-PObox']!="") {
			$postData['Mailing-BuildingName'] =$_POST['Mailing-PObox'];
			$postData['Mailing-Address_line_1'] ="";
			$postData['Mailing-Address_line_2'] ="";
		}else {
			$postData['Mailing-BuildingName'] = $_POST['Mailing-BuildingName'];
            $postData['Mailing-Address_line_1'] = $_POST['Mailing-Address_Line_1'];
            $postData['Mailing-Address_line_2'] = $_POST['Mailing-Address_Line_2'];

		}
        if (isset($_POST['Mailing-city-town'])) {
            $postData['Mailing-city-town'] = $_POST['Mailing-city-town'];
        }

        if (isset($_POST['Mailing-postcode'])) {
            $postData['Mailing-postcode'] = $_POST['Mailing-postcode'];
        }

        if (isset($_POST['Mailing-State'])) {
            $postData['Mailing-state'] = $_POST['Mailing-State'];
        }

        if (isset($_POST['Mailing-country'])) {
            $postData['Mailing-country'] = $_POST['Mailing-country'];
        }
    }



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
	if(isset($_SESSION['Dietary'])) {$postData['Dietary'] = $_SESSION['Dietary'];}
	if(isset($_POST['wpnumber']) && $_POST['wpnumber']!="0" ){
	$num = $_POST['maxumnumber'];
	$tempWork = array();
	for($i=0; $i<=$num; $i++){
		$workplaceArray = array();
		if(isset($_POST['WorkplaceID'.$i]) && !empty($_POST['Name-of-workplace' . $i])){
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
				elseif(isset($_POST['Udegree'.$j])){
					$additionalQualifications['DegreeID'] = $_POST['Udegree'.$j];
					$additionalQualifications['Degree'] = "";
				}
				if(isset($_POST['Undergraduate-university-name-other'.$j]) && $_POST['Undergraduate-university-name-other'.$j]!=""){
					$additionalQualifications['Institute'] = $_POST['Undergraduate-university-name-other'.$j];
					$additionalQualifications['InstituteID'] = "";
				}
				elseif(isset($_POST['Undergraduate-university-name'.$j])){
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
  $postData['userID']=$_SESSION['UserId'];$testdata = aptify_get_GetAptifyData("5", $postData);
  //implement MBA member data update
  if($testdata['Result']=="Success"){
    $data = "UserID=".$_SESSION["UserId"];
    $details = aptify_get_GetAptifyData("4", $data,"");
    $updateAccountInfo['email'] = $details["Memberid"];
    $updateAccountInfo['first_name'] = $details["Firstname"];
    $updateAccountInfo['last_name'] = $details["Lastname"];
    if(empty($details["Mobile-number"])){
      $updateAccountInfo['phone'] = $details["Home-phone-number"];
    }
    else{
      $updateAccountInfo['phone'] = $details["Mobile-number"];
    }

    $updateAccountInfo['membership_number'] =  $details["Memberno"];
    $timeStr = strtotime(str_replace('/', '-', $details["PaythroughtDate"]));
    $updateAccountInfo['membership_expiry'] = date("Y", $timeStr)."-".date("m", $timeStr)."-".date("d", $timeStr);
    //check line1 characters
    $addressSSOLine1 = $details["Unit"];
    $str = strlen($addressSSOLine1);
    if($str<8) { $addressSSOLine1 .="        "; }
    if($str>40){ $addressSSOLine1 =  substr($addressSSOLine1,0, 39);}
    $perAddArray = array();
    $updateAccountInfo['address'] = array('line1'=>$addressSSOLine1, 'city'=>$details["Suburb"], 'post_code'=>$details["Postcode"], 'state'=>$details["State"], 'country'=>$details["Country"]);
    $updateAccountInfo['extra_fields'] = array();
    mba_sso_update_account($updateAccountInfo);

  }
  //end implement MBA member data update
	unset($_SESSION["Regional-group"]);

	 if(isset($_SESSION['UserId'])){$userID = $_SESSION['UserId']; }

	$products = array();
	checkShoppingCart($userID, $type="membership", $productID="");
	checkShoppingCart($userID, $type = "NG", $productID = "");
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
		createShoppingCart($userID, $_SESSION['fpQuatation'],$type="FP",$coupon="");
	}else{ checkShoppingCart($userID, $type="FP",$productID="");}
	//save magazine products on APA side
	 //check the Sports MG , Intouch MG
	 $sportTag = false;
	 $inTouchTag = false;
	 $sportTag = checkSP($products);
	 $inTouchTag = checkITouch($products);
	 /*  there is a question for those two kinds of subscription product, need to know how Aptify organise combination products for "sports and mus"*/
	if(isset($_POST['ngmusculo']) && $_POST['ngmusculo'] =="1"){
		checkShoppingCart($userID, $type="MG1",$productID="");
		createShoppingCart($userID, "9978",$type="MG1",$coupon="");
	}
	if(isset($_POST['ngsports']) && $_POST['ngsports'] =="1") {
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
unset($_SESSION["NationalProductID"]);
if(sizeof($userNGProduct)!=0){$_SESSION['NationalProductID'] = $userNGProduct; }
$userFPProduct = getProduct($_SESSION['UserId'],"FP");
unset($_SESSION["FPProductID"]);
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
$details = aptify_get_GetAptifyData("4", $data,"");// #_SESSION["UserID"];
//Get Member Dietary data when member renew a member
if(sizeof($details['Dietary'])!=0){
	$Dietary = array();
	$testDietaryArray = array();
	foreach($details['Dietary'] as $MemberDietary) {
		$testD['ID'] = $MemberDietary['ID'];
		array_push($testDietaryArray, $testD);
	}
	$_SESSION['Dietary'] = $testDietaryArray;
}
if (!empty($details['Regionalgp'])) { $_SESSION['Regional-group'] = $details['Regionalgp'];}

?>

<form id="your-detail-form" action="renewmymembership" method="POST">
	<input type="hidden" name="step1" value="1"/>
	<input type="hidden" name="insuranceTag" id="insuranceTag"/>
		<div class="down1" <?php if(isset($_POST['step1']) || isset($_POST['step2']) || isset($_POST['stepAdd']) || isset($_POST['step2-1'])|| isset($_POST['goI'])|| isset($_POST['goP'])||isset($_POST['step2-2'])||isset($_POST['step2-3'])||isset($_POST['QOrder']) || isset($_POST["MType"]) || isset($_POST['step2-4']) || isset($_POST['Couponcode']))echo 'style="display:none;"'; else { echo 'style="display:block;"';}?>>
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

					<?php $birthdata = explode("/",$details['birth']);?>
					    <label for="">Date of birth<span class="tipstyle"> *</span></label>
					    <!--<input type="date" class="form-control" name="Birth" <?php if (empty($details['birth'])) //{//echo "placeholder='DOB'";}   else{ echo 'value="'.str_replace("/","-",$details['birth']).'"';}?> max="<?php //$nowDate = date('Y-m-d', strtotime('-1 year'));echo $nowDate;?>">-->
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
						<span class="section_title">Phone numbers:</span>
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
					<div class="col-xs-6 col-md-3">
						<label for="">Area code</label>
						<input type="text" class="form-control" maxlength="5" id="area-code" onchange="areaCodeFunction(this.value)" name="area-code" <?php if (empty($details['Home-phone-areacode'])) {echo "placeholder='Area code'";}   else{ echo 'value="'.$details['Home-phone-areacode'].'"'; }?>>
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
						<input type="text" class="form-control" name="phone-number" <?php if (empty($details['Home-phone-number'])) {echo "placeholder='Phone number'";}   else{ echo 'value="'.$details['Home-phone-number'].'"'; }?>>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12">
						<span class="text-underline smaller-lead-heading" style="color: #000">Mobile</span>
					</div>

					<div class="col-xs-6 col-md-3">
						<label for="">Country code</label>
						<div class="chevron-select-box">
						<select class="form-control" id="Mobile-countrycode" name="Mobile-country-code" autocomplete="mobilecountry">
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
					<!--<div class="col-xs-6 col-md-3">
						<label for="">Area code</label>
						<input type="text" class="form-control" name="Mobile-areacode" <?php /*if (empty($details['Mobile-area-code'])) {echo "placeholder='Mobile Area code'";}   else{ echo 'value="'.$details['Mobile-area-code'].'"'; }*/?>  maxlength="5">
					</div>-->
					<div class="col-xs-6 col-md-3">
						<label for="">Mobile number<span class="tipstyle"> *</span></label>
						<input type="text" class="form-control" name="Mobile-number" <?php if (empty($details['Mobile-number'])) {echo "placeholder='Mobile number'";}   else{ echo 'value="'.$details['Mobile-number'].'"'; }?>>
					</div>
				</div>

					<div class="col-xs-12"><span class="section_title">Residential address:</span></div>
				<div class="row">
					<div class="col-xs-12">
					   <label for="">Building name</label>
					   <input type="text" class="form-control"  name="BuildingName" <?php if (empty($details['Unit'])) {echo "placeholder='Building name'";}   else{ echo 'value="'.$details['BuildingName'].'"'; }?> autocomplete="Building-Name">
					</div>
					</div>

					<div class="col-xs-12 col-sm-6 col-md-6">

					   <label for="">PO Box</label>
					   <input type="text" class="form-control" name="Pobox" <?php if (!empty($details['Unit'])) {echo "placeholder='PO box'";}   else{ echo 'value="'.$details['Pobox'].'"'; }?> autocomplete="Pobox">

					</div>

					<div class="col-xs-12 col-sm-6 col-md-9">
						<label for="">Address line 1<span class="tipstyle pobox-stat"> *</span></label>
						<input type="text" class="form-control"  name="Address_Line_1" id="Address_Line_1" <?php if (empty($details['Unit'])) {echo "placeholder='Address line 1'";}   else{ echo 'value="'.$details['Unit'].'"'; }?> autocomplete="address-line1">
					</div>

					<div class="col-xs-12">
						<label for="">Address line 2</label>
						<input type="text" class="form-control" name="Address_Line_2" id="Address_Line_2" <?php if (empty($details['Street'])) {echo "placeholder='Address line 2'";}   else{ echo 'value="'.$details['Street'].'"'; }?> autocomplete="address-line2">
					</div>


				<div class="row">
					<div class="col-xs-6 col-md-3">
					   <label for="">City or town<span class="tipstyle"> *</span></label>
					   <input type="text" class="form-control" name="Suburb" id="Suburb" <?php if (empty($details['Suburb'])) {echo "placeholder='City or town'";}   else{ echo 'value="'.$details['Suburb'].'"'; }?> autocomplete="address-level2">
					</div>

					<div class="col-xs-6 col-md-3">
					   <label for="">Postcode<span class="tipstyle"> *</span></label>
					   <input type="text" class="form-control" name="Postcode" id="Postcode" <?php if (empty($details['Postcode'])) {echo "placeholder='Postcode'";}   else{ echo 'value="'.$details['Postcode'].'"'; }?> autocomplete="postal-code">
					</div>

					<div class="col-xs-6 col-md-3">
					   <label for="">State</label>
					 <div class="chevron-select-box">
					   <select class="form-control" id="State1" name="State" autocomplete="address-level1">
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
					   <select class="form-control" id="Country1" name="Country" autocomplete="country">
						<?php
                        //$countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
						//$country=json_decode($countrycode, true);
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

				<div class="row payment-line flex-column form_one_column">
					<div class="col-xs-12 col-sm-6">
						<span class="section_title">Mailing address:</span>
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
					   <input type="text" class="form-control"  name="Mailing-BuildingName" <?php if (empty($details['Mailing-unitno'])) {echo "placeholder='Billing Building Name'";}   else{ echo 'value="'.$details['Mailing-BuildingName'].'"'; }?> autocomplete="Building-Name">
					</div>

					<div class="col-xs-12 col-sm-6 col-md-6">
					   <label for="">PO Box</label>
					   <input type="text" class="form-control" name="Mailing-PObox"  <?php if (!empty($details['Mailing-unitno'])) {echo "placeholder='PO Box'";}   else{ echo 'value="'.$details['Mailing-BuildingName'].'"'; }?> autocomplete="Pobox">
					</div>

					<div class="col-xs-12 col-sm-6 col-md-9">
					   <label for="">Address line 1<span class="tipstyle billing-pobox-stat"> *</span></label>
					   <input type="text" class="form-control"  name="Mailing-Address_Line_1" id="Mailing-Address_Line_1" <?php if (empty($details['Mailing-unitno']) || $details['Mailing-unitno']=="") {echo "placeholder='Mailing address line 1'";}   else{ echo 'value="'.$details['Mailing-unitno'].'"'; }?> autocomplete="address-line1">
					</div>

					<div class="col-xs-12">
					   <label for="">Address line 2</label>
					   <input type="text" class="form-control" name="Mailing-Address_Line_2" id="Mailing-Address_Line_2" <?php if (empty($details['Mailing-streetname'])) {echo "placeholder='Mailing address line 2'";}   else{ echo 'value="'.$details['Mailing-streetname'].'"'; }?> autocomplete="address-line2">
					</div>
				</div>

				<div class="row">
					<div class="col-xs-6 col-md-3">
					   <label for="">City or town<span class="tipstyle"> *</span></label>
					   <input type="text" class="form-control" name="Mailing-city-town" id="Mailing-city-town" <?php if (empty($details['Mailing-city-town'])) {echo "placeholder='Mailing City/Town'";}   else{ echo 'value="'.$details['Mailing-city-town'].'"'; }?> autocomplete="address-level2">
					</div>

					<div class="col-xs-6 col-md-3">
					   <label for="">Postcode<span class="tipstyle"> *</span></label>
					   <input type="text" class="form-control" name="Mailing-postcode" id="Mailing-postcode" <?php if (empty($details['Mailing-postcode'])) {echo "placeholder='Mailing Postcode'";}   else{ echo 'value="'.$details['Mailing-postcode'].'"'; }?> autocomplete="postal-code">
					</div>

					<div class="col-xs-6 col-md-3">
					   <label for="">State</label>
					 <div class="chevron-select-box">
					   <select class="form-control" name="Mailing-State" id="State2" autocomplete="address-level1">
							<option value=""  <?php if (empty($details['Mailing-state'])) echo "selected='selected'";?> disabled> State </option>
							<?php
								$statecode  = file_get_contents("sites/all/themes/evolve/json/State.json");
								$State=json_decode($statecode, true);
								foreach($State  as $key => $value){
								//echo '<option class="StateOption'.$State[$key]['CountryID'].'" value="'.$State[$key]['Abbreviation'].'"';
								echo '<option value="'.$State[$key]['Abbreviation'].'"';
								if ($details['Mailing-state'] == $State[$key]['Abbreviation']){ echo "selected='selected'"; }
								echo '> '.$State[$key]['Abbreviation'].' </option>';

								}
							?>
					   </select>
					   </div>
					</div>

					<div class="col-xs-6 col-md-3">
					   <label for="">Country<span class="tipstyle"> *</span></label>
					 <div class="chevron-select-box">
					   <select class="form-control" id="Country2" name="Mailing-Country" autocomplete="country">
							<?php
							//$countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
							//$country=json_decode($countrycode, true);
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
			</div>

		  <!--<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 form-right">
			 <div class="row form-image">
				<div class="col-lg-12">
				   Upload/change image
				</div>
			 </div>

		  </div>-->
		    <div class="col-xs-12 btn_wrapper">
				<a class="join-details-button1" variant="next">
					<span class="dashboard-button-name">Next</span>
				</a>
			</div>
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
            $MemberTypes = aptify_get_GetAptifyData("31", $memberProdcutID);
   					$temp_array = array();
						$MemberType = array();
						foreach($MemberTypes as $tempM){
							$temp_array['ProductID'] = $tempM['ProductID'];
							$temp_array['Title'] = $tempM['Title'];//substr($tempM['Title'], strpos($tempM['Title'],":")+1);
							$temp_array['Price'] = $tempM['Price']['ProductCostWithoutCoupon'];
							$temp_array['UnitPrice'] = $tempM['UnitPrice'];
							$temp_array['Quantity'] = $tempM['Quantity'];
							array_push($MemberType, $temp_array);
						}
						$Title = array();
						foreach ($MemberType  as $ukey => $row) {
							$Title[$ukey] = $row['Title'];
						}
						array_multisort($Title, SORT_ASC, $MemberType);
						//// Manually sort top three (M10, M11, M12) to the end of the array ///
						$sortCountNum = 0;
						$tempArrt = Array();
						foreach($MemberType as $replace) {
							if($sortCountNum < 3) {
								array_push($tempArrt, $replace);
								unset($MemberType[$sortCountNum]);
							} else {
								break;
							}
							$sortCountNum++;
						}
						foreach($tempArrt as $placeLast) {
							array_push($MemberType, $placeLast);
						}
						//// Manual sort done ///
					    //$MemberTypecode  = file_get_contents("sites/all/themes/evolve/json/MemberType.json");
						//$MemberType=json_decode($MemberTypecode, true);
						foreach($MemberType  as $key => $value){
							if(!in_array($MemberType[$key]['ProductID'],$filterMemberProduct)){
								echo '<option value="'.$MemberType[$key]['ProductID'].'"';
								if(isset($_SESSION["MembershipProductID"])){if ($_SESSION["MembershipProductID"] == $MemberType[$key]['ProductID']){ echo "selected='selected'"; }}
								//elseif ($details['MemberTypeID'] == $MemberType[$key]['ID']){ echo "selected='selected'"; }
								echo '> ' .$MemberType[$key]['Title'] . ' ($'.number_format($MemberType[$key]['Price'],2).') </option>';
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
				<div class="col-xs-12 col-md-6">
					<label for="">AHPRA number</label>
					<input type="text" class="form-control" name="Ahpranumber"  <?php if (empty($details['Ahpranumber'])) {echo "placeholder='AHPRA number'";}   else{ echo 'value="'.$details['Ahpranumber'].'"'; }?>>
				</div>
			</div>

			<div class="row">
				<input type="hidden"  name="Specialty"  <?php   echo 'value="'.$details['Specialty'].'"'; ?>>
				<div class="row">
				<div class="col-xs-12 col-md-6">
					<label for=""><?php if(!empty($details['State'])) {echo "You are in the&nbsp;".$details['State']."&nbsp;Branch ,&nbsp;would you like to add an additional Branch?";} else { echo "Would you like to add an additional Branch?";}?></label>
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
						$nationalGroups = aptify_get_GetAptifyData("19", $sendData);
						$arrColumn = array_column($nationalGroups, 'NGtitle');
						array_multisort($arrColumn, SORT_ASC, $nationalGroups);
				    ?>
					<select id="Nationalgp" name="Nationalgp[]" multiple data-placeholder="Choose from our 21 National Groups">
					<?php
						foreach($nationalGroups as $key=>$value) {
						   echo '<option value="'.$nationalGroups[$key]["ProductID"].'"';
						   if(isset($_SESSION["NationalProductID"])){ if (in_array( $nationalGroups[$key]["ProductID"],$_SESSION["NationalProductID"])){ echo "selected='selected'"; } }
						   //elseif (in_array( $nationalGroups[$key]["ID"],$details['Nationalgp'])){ echo "selected='selected'"; }
						   echo '> '.$nationalGroups[$key]["NGtitle"]. ' ($'.number_format($nationalGroups[$key]['NGprice'],2).')  </option>';
						}

					?>
					</select>
					</div>
				</div>

				</div>
				<div class="col-xs-12 display-none" id="ngsports"><input class="styled-checkbox" type="checkbox" id="ngsportsbox" name="ngsports" value='<?php if($SportTag) {echo "1";} else { echo "0";}?>' <?php if($SportTag) { echo 'checked="checked"';}?>> <label class="light-font-weight" for="ngsportsbox">Would you like to subscribe to the APA SportsPhysio magazine?($<?php echo $SportPrice;?>)</label></div>
				<div class="col-xs-12 display-none" id="ngmusculo"><input class="styled-checkbox" type="checkbox" id="ngmusculobox" name="ngmusculo" value='<?php if($IntouchTag) {echo "1";} else { echo "0";}?>' <?php if($IntouchTag) { echo 'checked="checked"';}?>> <label class="light-font-weight" for="ngmusculobox">Would you like to subscribe to the APA InTouch magazine?($<?php echo $IntouchPrice;?>)</label></div>
			</div>

			<div class="row">
				<?php
					if(!empty($details['PSpecialInterestAreaID'])) {$PSpecialInterestAreaID = explode(",",$details['PSpecialInterestAreaID']); } else {$PSpecialInterestAreaID =array();}
				?>
				<div class="col-xs-12">
					<label>Choose one or more interest areas below:</label>
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
						if($fpProduct != "18247"){
						echo '<input class="styled-checkbox" type="checkbox" id="fap" name="fap"';
						if($FellowTag) {echo 'checked="checked"  value="1">'; } else { echo '>';}
						echo '<label class="light-font-weight" style="margin-top: 15px; font-weight: 700;" for="fap">I am part of the Australian College of Physiotherapists</label>';
						echo '<p style="margin-bottom: 0"><span class="note-text">Please note:</span> Ticking this box adds an extra $220 to the price of your membership.
	If you have passed Specialisation, Fellowship by Original Contribution or are
	a Fellow of the Australian College of Physiotherapists, you must tick this box.</p>';
}

						}
					?>
					<div id="addfap">
					<?php
					    if(isset($_SESSION["fpQuatation"]) && $_SESSION["fpQuatation"]=="18247"){ echo '<input type="hidden" id="fpQuatation">';}
						if($FellowTag && $fpProduct == "18247"){
							echo '<div id="fpnew"><input class="styled-checkbox" type="checkbox" id="fap" name="fap" checked="checked" value="1">';
							echo '<label class="light-font-weight" style="margin-top: 15px; font-weight: 700;" for="fap">I would like to be part of the Australian College of Physiotherapists</label>';
							echo '<p style="margin-bottom: 0"><span class="note-text">Please note:</span> Ticking this box adds an extra $110 to the price of your membership. If you have passed your APA Titling pathway, you are eligible to purchase ACP membership and entitled to use the MACP title.</p></div>';
						}
					?>
					</div>
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

			<div class="col-xs-12 btn_wrapper">
				<a class="join-details-button2" variant="next">
					<span class="dashboard-button-name">Next</span>
				</a>
				<a class="your-details-prevbutton2" variant="prev">
					<span class="icon arrow_left"></span>
					Back to previous
				</a>
			</div>
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
				<li <?php if($key=='Workplace0') echo 'class ="active" ';?> id="workplaceli<?php echo $key;?>">
					<a data-toggle="tab" href="#workplace<?php echo $key;?>">
						<?php $newkey =$key+1; echo "Workplace ".$newkey;?>
						<span class="calldeletewp<?php echo $key;?>"></span>
					</a>
				</li>
			<?php endforeach ?>
			</ul>
		</div>

		<div id="workplaceblocks">
			<?php // stopper
				$temMax = 12; $workCounter = 1;
				foreach( $details['Workplaces'] as $key => $value ):
					if($workCounter > $temMax) {break;}
					$workCounter++;
			?>
				<div id="workplace<?php echo $key;?>" class='tab-pane fade <?php if($key=='Workplace0') echo "in active ";?>'>
				<input type="hidden" name="WorkplaceID<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['WorkplaceID'];?>">

				<div class="col-xs-12 FapTagC">
					<input class="styled-checkbox" type="checkbox" name="Findphysio<?php echo $key;?>" id="Findphysio<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Findphysio'];?>" <?php if($details['Workplaces'][$key]['Findphysio']=="True"){echo "checked";} ?>>
					<label class="light-font-weight highlight_checkbox" for="Findphysio<?php echo $key;?>">I want to be listed at this workplace within Find a Physio on the consumer <span class="note-text">choose.physio</span> site</label>
				</div>

				<div class="col-xs-12 FapTagA">
					<input class="styled-checkbox" type="checkbox" name="Findabuddy<?php echo $key;?>" id="Findabuddy<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Find-a-buddy'];?>" <?php if($details['Workplaces'][$key]['Find-a-buddy']=="True"){echo "checked";} ?>>
					<label class="light-font-weight highlight_checkbox" for="Findabuddy<?php echo $key;?>">I want to be listed at this workplace within Find a Physio on the corporate <span class="note-text">australian.physio</span> site</label>
				</div>

					<div class="col-xs-12">
						<label for="Name-of-workplace">Practice name<span class="tipstyle"> *</span></label>
						<input type="text" class="form-control" name="Name-of-workplace<?php echo $key;?>" id="Name-of-workplace<?php echo $key;?>" <?php if (empty($details['Workplaces'][$key]['Name-of-workplace'])) {echo "placeholder='Name of workplace'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Name-of-workplace'].'"'; }?>>
					</div>

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
					<div class="col-xs-6 col-md-6">
						<label for="Wcity">City/Town<span class="tipstyle"> *</span></label>
						<input type="text" class="form-control" name="Wcity<?php echo $key;?>" id="Wcity<?php echo $key;?>"  <?php if (empty($details['Workplaces'][$key]['Wcity'])) {echo "placeholder='City or town'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Wcity'].'"'; }?>>
					</div>

					<div class="col-xs-6 col-md-6">
						<label for="Wpostcode">Postcode<span class="tipstyle"> *</span></label>
						<input type="text" class="form-control" name="Wpostcode<?php echo $key;?>" id="Wpostcode<?php echo $key;?>"  <?php if (empty($details['Workplaces'][$key]['Wpostcode'])) {echo "placeholder='Postcode'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Wpostcode'].'"'; }?>>
					</div>

					<div class="col-xs-6 col-md-6">
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
						<label for="Wemail">Workplace email</label>
						<input type="text" class="form-control" name="Wemail<?php echo $key;?>" id="Wemail<?php echo $key;?>"  <?php if (empty($details['Workplaces'][$key]['Wemail'])) {echo "placeholder='Workplace email'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Wemail'].'"'; }?>>
						<div id="EmailMessage<?php echo $key;?>"></div>
					</div>

					<div class="col-xs-12 col-sm-6 col-md-6">
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
								$countryList = countryCodeLoop($details['Workplaces'][$key]['Wcountry'], $key, $AusStringCountryCode);
								echo $countryList;
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
						<input type="number" class="form-control" name="Wphone<?php echo $key;?>" <?php if (empty($details['Workplaces'][$key]['WPhone'])) {echo "placeholder='Phone number'";}   else{ echo 'value="'.$details['Workplaces'][$key]['WPhone'].'"'; }?>>
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
          <div class="col-xs-6 col-md-4">
            <input class="styled-checkbox" type="checkbox" name="NDIS<?php echo $key;?>" id="NDIS<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['NDIS'];?>" <?php if($details['Workplaces'][$key]['NDIS']=="True"){echo "checked";} ?>>
            <label class="light-font-weight" for="NDIS<?php echo $key;?>">NDIS</label>
          </div>
          <div class="col-xs-6 col-md-4">
                <input class="styled-checkbox" type="checkbox" name="Telehealth<?php echo $key;?>" id="Telehealth<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Telehealth'];?>" <?php if($details['Workplaces'][$key]['Telehealth']=="True"){echo "checked";} ?>>
                <label class="light-font-weight" for="Telehealth<?php echo $key;?>">Telehealth</label>
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

			<div class="col-xs-12 btn_wrapper">
				<a class="join-details-button3" variant="next">
					<span class="dashboard-button-name">Next</span>
				</a>
				<a class="your-details-prevbutton3" variant="prev">
					<span class="icon arrow_left"></span>
					Back to previous
				</a>
			</div>

		</div>
		<div class="down4" style="display:none;" >
		<div class="col-xs-12 col-sm-12 col-md-12"><p>Please note: all education undertaken with the APA or APC will already be recorded on your profile.</p></div>
		<input type="hidden" id="addtionalNumber" name="addtionalNumber" value="<?php  if(sizeof($details['PersonEducation'])!=0) {$addtionalNumber =  sizeof($details['PersonEducation']);} else{ $addtionalNumber =0;} echo  $addtionalNumber;  ?>"/>
		<input type="hidden" id="educationMaxNumber" name="educationMaxNumber" value="<?php  if(sizeof($details['PersonEducation'])!=0) {$educationMaxNumber =  sizeof($details['PersonEducation']);} else{ $educationMaxNumber =0;} echo  $educationMaxNumber;  ?>"/>
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
								//$countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
								//$country=json_decode($countrycode, true);
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
					</div>
					<!--<?php //if($key!="0"):?>-->
					<div class="col-xs-12"><a class="callDeleteEdu" id="deleteEducation<?php echo $key;?>"><span class="icon delete_icon"></span> Delete</a></div>
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
                                        $degreecode         = file_get_contents("sites/all/themes/evolve/json/Educationdegree.json");
                                        $degree             = json_decode($degreecode, true);
                                        $_SESSION["degree"] = $degree;
                                        /*foreach ($degree as $pair => $value) {
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
				<a class="add-additional-qualification"><span class="icon plus_circle"></span>Add qualification</a>
		</div>
		<div class="col-xs-12 btn_wrapper">
			<a href="javascript:document.getElementById('your-detail-form').submit();" variant="next" class="join-details-button4">
				<span class="dashboard-button-name">Next</span>
			</a>
			<a class="your-details-prevbutton4" variant="prev">
				<span class="icon arrow_left"></span>
				Back to previous
			</a>
		</div>

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
		<!-- Workplace limit POPUP -->
		<div id="limitworkplace">
			<span class="close-popup"></span>
			<div class="flex-cell">
				<h3 class="light-lead-heading cairo">Limit reached</h3>
				<span>Please note, the number of practices you can list is limited to 12.</span>
			</div>
		</div>
		<!-- END Workplace limit POPUP -->
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
				'"><a data-toggle="tab" href="#workplace' + i + '">Workplace ' + j +
				'<span class="calldeletewp' + i + '"></span></a></li>');
			$('div[id="workplaceblocks"]').append('<div id="workplace' + i +
				'" class="tab-pane fade active in"></div>');

			$('div[class="down3"] #tabmenu li:not(#workplaceli'+i+')').removeClass("active");
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
	$("[class^=deletewp]").live( "click", function(){
		  var x = $(this).attr("class").replace('deletewp', '');
		  $("#workplaceli"+ x).remove();
		  $("#workplace"+ x).remove();

		  var n = Number($('#wpnumber').val());
		  var t = Number(n -1);

		$('input[name=wpnumber]').val(t);
		for (m = 1; m<=t;m++){
			var deleteVal = $('div[class="down3"] #tabmenu li:nth-child('+m+')')
				.attr('id').replace('workplaceli', '');
			$('div[class="down3"] #tabmenu li:nth-child(' + m + ') a')
				.html("Workplace "+m+'<span class="calldeletewp' + deleteVal + '"></span>');
		}
	});

});
$('.add-additional-qualification').click(function(){
		$('#dashboard-right-content').addClass("autoscroll");
		var number = Number($('#educationMaxNumber').val());
		var educationNumber = Number($('#addtionalNumber').val());
		var sessionCountry = <?php echo json_encode($_SESSION['country']);?>;
		var sessionDegree = <?php echo json_encode($_SESSION['degree']);?>;
		var sessionUniversity = <?php echo json_encode($_SESSION['University']);?>;
		$('div[id="additional-qualifications-block"]').append('<div id="additional'+ number +'"></div>');
		$("#additional"+ number ).load("load/education", {"count":number,"sessionCountry":sessionCountry,"sessionDegree":sessionDegree,"sessionUniversity":sessionUniversity});
		var i = Number(educationNumber +1);
		var j = Number(number +1);
		$('input[name=addtionalNumber]').val(i);
		$('input[name=educationMaxNumber]').val(j);
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
<script>
 //handle MACP product related to the NG

 var prevSetup = Selectize.prototype.setup;

  Selectize.prototype.setup = function () {
      prevSetup.call(this);

      // This property is set in native setup
      // Unless the source code changes, it should
      // work with any version
      this.$control_input.prop('readonly', true);
  };

 var $nationalSelectize = $('#Nationalgp').selectize({
    plugins: ['remove_button'],
  });

  var ngQuatation ='<?php if(isset($_SESSION['ngQuatation']))  echo json_encode($_SESSION['ngQuatation']);?>';
   var macpTag = false;
   $(document).on('change', $nationalSelectize, function(){
		if($('select[id=Nationalgp]').val()!= null){
		var ngArray = $('select[id=Nationalgp]').val().toString().split(",");
		for(var i=0; i < ngArray.length; i++){
			if(ngQuatation.includes(ngArray[i])){
				macpTag = true;
				break;
			}
			else{
				macpTag = false;
			}
		}
		if(macpTag){
			if($('#fpnew').length!=0 ) {$( "#fpnew" ).removeClass('display-none');}
			if($('#fpQuatation').length!=0 && $('#fpnew').length==0){
				$('#addfap').append('<div id="fpnew"><input class="styled-checkbox" type="checkbox" id="fap" checked="checked" name="fap" value="1"><label class="light-font-weight" style="margin-top: 15px; font-weight: 700;" for="fap">I would like to be part of the Australian College of Physiotherapists</label><p style="margin-bottom: 0"><span class="note-text">Please note:</span> Ticking this box adds an extra $110 to the price of your membership. If you have passed your APA Titling pathway, you are eligible to purchase ACP membership and entitled to use the MACP title.</p></div>');
			}
		}
		else{
			$( "#fpnew" ).addClass('display-none');
			$( "#fpnew #fap" ).val('0');
			$("#fpnew #fap").attr('checked', false);
		}
	}
	else{
		$( "#fpnew" ).addClass('display-none');
		$( "#fpnew #fap" ).val('0');
		$("#fpnew #fap").attr('checked', false);

	}

});
</script>
