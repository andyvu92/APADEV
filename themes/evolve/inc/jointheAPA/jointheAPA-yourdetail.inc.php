<?php
//Put two scenarios here;
//1. for new user who join a member
//2. web user who join a member use $_SESSION]['userID'] to get user info
if(isset($_POST['step1'])) {
	$postData = array();
	if(isset($_POST['Prefix'])){ $postData['Prefix'] = $_POST['Prefix']; } else { $postData['Prefix'] = '';}
	if(isset($_POST['Firstname'])){ $postData['Firstname'] = $_POST['Firstname']; }
	if(isset($_POST['Middle-name'])){ $postData['Middle-name'] = $_POST['Middle-name']; }
	if(isset($_POST['Preferred-name'])){ $postData['Preferred-name'] = $_POST['Preferred-name']; }
	if(isset($_POST['Maiden-name'])){ $postData['Maiden-name'] = $_POST['Maiden-name']; }
	if(isset($_POST['Lastname'])){ $postData['Lastname'] = $_POST['Lastname']; }
	if(isset($_POST['Birth'])){ $postData['Birth'] = $_POST['Birth']; }
	if(isset($_POST['Gender'])){ $postData['Gender'] = $_POST['Gender']; }
	if(isset($_POST['country-code'])){ $postData['Home-phone-countrycode'] = $_POST['country-code']; }
	if(isset($_POST['area-code'])){ $postData['Home-phone-areacode'] = $_POST['area-code']; }
	if(isset($_POST['phone-number'])){ $postData['Home-phone-number'] = $_POST['phone-number']; }
	if(isset($_POST['Mobile-countrycode'])){ $postData['Mobile-countrycode'] = $_POST['Mobile-countrycode']; }
	if(isset($_POST['Mobile-areacode'])){ $postData['Mobile-areacode'] = $_POST['Mobile-areacode']; }
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
	if(isset($_POST['Specialty'])){ $postData['Specialty'] = $_POST['Specialty']; }
	$postData['Status']="17";
	
	
	//change from shipping address to billing address
	if(isset($_POST['Shipping-address-join']) && $_POST['Shipping-address-join']=='1'){ 
		$postData['Billing-BuildingName'] = $_POST['BuildingName']; 
		$postData['Billing-Address_Line_1'] = $_POST['Address_Line_1'];
		$postData['Billing-Address_Line_2'] = $_POST['Address_Line_2'];
		$postData['Billing-PObox'] = $_POST['Pobox'];
		$postData['Billing-Suburb'] = $_POST['Suburb'];
		$postData['Billing-Postcode'] = $_POST['Postcode'];
		$postData['Billing-State'] = $_POST['State'];
		$postData['Billing-Country'] = $_POST['Country'];
	}else{
		$postData['Billing-BuildingName'] = $_POST['Billing-BuildingName']; 
		$postData['Billing-Address_Line_1'] = $_POST['Billing-Address_Line_1'];
		$postData['Billing-Address_Line_2'] = $_POST['Billing-Address_Line_2'];
		$postData['Billing-PObox'] = $_POST['Billing-PObox'];
		$postData['Billing-Suburb'] = $_POST['Billing-Suburb'];
		$postData['Billing-Postcode'] = $_POST['Billing-Postcode'];
		$postData['Billing-State'] = $_POST['Billing-State'];
		$postData['Billing-Country'] = $_POST['Billing-Country'];  
	}
	//Add shipping address & mailing address post data
	if(isset($_POST['Shipping-BuildingName'])){ $postData['Shipping-BuildingName'] = $_POST['Shipping-BuildingName']; }
	if(isset($_POST['Shipping-Address_Line_1'])){ $postData['Shipping-Address_Line_1'] = $_POST['Shipping-Address_Line_1']; }
	if(isset($_POST['Shipping-Address_Line_2'])){ $postData['Shipping-Address_Line_2'] = $_POST['Shipping-Address_Line_2']; }
	if(isset($_POST['Shipping-PObox'])){ $postData['Shipping-PObox'] = $_POST['Shipping-PObox']; } 
	if(isset($_POST['Shipping-city-town'])){ $postData['Shipping-city-town'] = $_POST['Shipping-city-town']; } 
	if(isset($_POST['Shipping-postcode'])){ $postData['Shipping-postcode'] = $_POST['Shipping-postcode']; } 
	if(isset($_POST['Shipping-state'])){ $postData['Shipping-state'] = $_POST['Shipping-state']; }
	if(isset($_POST['Shipping-country'])){ $postData['Shipping-country'] = $_POST['Shipping-country']; }
	if(isset($_POST['Mailing-BuildingName'])){ $postData['Mailing-BuildingName'] = $_POST['Mailing-BuildingName']; } 
	if(isset($_POST['Mailing-Address_Line_1'])){ $postData['Mailing-Address_Line_1'] = $_POST['Mailing-Address_Line_1']; } 
	if(isset($_POST['Mailing-Address_Line_2'])){ $postData['Mailing-Address_Line_2'] = $_POST['Mailing-Address_Line_2']; } 
	if(isset($_POST['Mailing-PObox'])){ $postData['Mailing-PObox'] = $_POST['Mailing-PObox']; }
	if(isset($_POST['Mailing-city-town'])){ $postData['Mailing-city-town'] = $_POST['Mailing-city-town']; } 
	if(isset($_POST['Mailing-postcode'])){ $postData['Mailing-postcode'] = $_POST['Mailing-postcode']; }
	if(isset($_POST['Mailing-state'])){ $postData['Mailing-state'] = $_POST['Mailing-state']; } 
	if(isset($_POST['Mailing-country'])){ $postData['Mailing-country'] = $_POST['Mailing-country']; } 
	//---	
	if(isset($_POST['Memberid'])){ $postData['Memberid'] = $_POST['Memberid'];}
	if(isset($_POST['Password'])){ $postData['Password'] = $_POST['Password'];}
	if(isset($_POST['MemberType'])){ $postData['MemberType'] = $_POST['MemberType']; }
	if(isset($_POST['Ahpranumber'])){ $postData['Ahpranumber'] = $_POST['Ahpranumber']; }
	if(isset($_POST['Branch'])){ $postData['Branch'] = $_POST['Branch']; }
	if(isset($_SESSION['Regional-group'])){ $postData['Regional-group'] = $_SESSION['Regional-group']; } else{ $postData['Regional-group'] ="";}
	if(isset($_POST['Nationalgp'])){ $ngData['Nationalgp'] = $_POST['Nationalgp']; }
	if(isset($_POST['SpecialInterest'])){ $postData['SpecialInterest'] = $_POST['SpecialInterest']; }
	if(isset($_POST['Treatmentarea'])){ $postData['Treatmentarea'] = $_POST['Treatmentarea']; }
	if(isset($_POST['MAdditionallanguage'])){ $postData['Additionallanguage'] = $_POST['MAdditionallanguage']; }
	if(isset($_POST['Findpublicbuddy'])){ $postData['Findpublicbuddy'] = $_POST['Findpublicbuddy']; }else{ $postData['Findpublicbuddy'] = 0;}
	//Process workplace data
	if(isset($_POST['wpnumber'])){ 
	$num = $_POST['wpnumber']; 
	$tempWork = array();
		for($i=0; $i<$num; $i++){
			$workplaceArray = array();
			if(isset($_POST['WorkplaceID'.$i]))  { $workplaceArray['WorkplaceID'] = $_POST['WorkplaceID'.$i];}
			if(isset($_POST['Findphysio'.$i])) { $workplaceArray['Findphysio'] = $_POST['Findphysio'.$i];}else{ $workplaceArray['Findphysio'] = "0";}
			if(isset($_POST['Findabuddy'.$i])) { $workplaceArray['Findabuddy'] = $_POST['Findabuddy'.$i];}else{ $workplaceArray['Findabuddy'] = "0";}
			if(isset($_POST['Name-of-workplace'.$i])) { $workplaceArray['Name-of-workplace'] = $_POST['Name-of-workplace'.$i];}
			if(isset($_POST['Workplace-setting'.$i])) { $workplaceArray['Workplace-setting'] = $_POST['Workplace-setting'.$i];}
			if(isset($_POST['WTreatmentarea'.$i])){ $workplaceArray['Treatmentarea'] = $_POST['WTreatmentarea'.$i]; }
			//if(isset($_POST['WBuildingName'.$i])) { $workplaceArray['WBuildingName'] = $_POST['WBuildingName'.$i];}
			if(isset($_POST['WBuildingName'.$i])) { $workplaceArray['BuildingName'] = $_POST['WBuildingName'.$i];}
			if(isset($_POST['WAddress_Line_1'.$i])) { $workplaceArray['Address_Line_1'] = $_POST['WAddress_Line_1'.$i];}
			if(isset($_POST['WAddress_Line_2'.$i])) { $workplaceArray['Address_Line_2'] = $_POST['WAddress_Line_2'.$i];}
			if(isset($_POST['Wcity'.$i])) { $workplaceArray['Wcity'] = $_POST['Wcity'.$i];}
			if(isset($_POST['Wpostcode'.$i])) { $workplaceArray['Wpostcode'] = $_POST['Wpostcode'.$i];}
			if(isset($_POST['Wstate'.$i])) { $workplaceArray['Wstate'] = $_POST['Wstate'.$i];}
			if(isset($_POST['Wcountry'.$i])) { $workplaceArray['Wcountry'] = $_POST['Wcountry'.$i];}
			if(isset($_POST['Wemail'.$i])) { $workplaceArray['Wemail'] = $_POST['Wemail'.$i];}
			if(isset($_POST['Wwebaddress'.$i])) { $workplaceArray['Wwebaddress'] = $_POST['Wwebaddress'.$i];}
			//if(isset($_POST['Wphone'.$i])) { $workplaceArray['Wphone'] = $_POST['Wphone'.$i];}
			//test data
			$workplaceArray['WPhoneAreaCode']="03";
			$workplaceArray['WPhone']="03";
			$workplaceArray['WPhoneExtentions']="03";
			//end test data
			
			if(isset($_POST['Additionallanguage'.$i])) { $workplaceArray['Additionallanguage'] = $_POST['Additionallanguage'.$i];}
			if(isset($_POST['Electronic-claiming'.$i])) { $workplaceArray['Electronic-claiming'] = $_POST['Electronic-claiming'.$i];}
			if(isset($_POST['Hicaps'.$i])) { $workplaceArray['Hicaps'] = $_POST['Hicaps'.$i];}
			if(isset($_POST['Healthpoint'.$i])) { $workplaceArray['Healthpoint'] = $_POST['Healthpoint'.$i];}
			if(isset($_POST['Departmentva'.$i])) { $workplaceArray['Departmentva'] = $_POST['Departmentva'.$i];}
			if(isset($_POST['Workerscompensation'.$i])) { $workplaceArray['Workerscompensation'] = $_POST['Workerscompensation'.$i];}
			if(isset($_POST['Motora'.$i])) { $workplaceArray['Motora'] = $_POST['Motora'.$i];}
			if(isset($_POST['Medicare'.$i])) { $workplaceArray['Medicare'] = $_POST['Medicare'.$i];}
			if(isset($_POST['Homehospital'.$i])) { $workplaceArray['Homehospital'] = $_POST['Homehospital'.$i];}
			if(isset($_POST['MobilePhysio'.$i])) { $workplaceArray['MobilePhysio'] = $_POST['MobilePhysio'.$i];}
			if(isset($_POST['Number-worked-hours'.$i])) { $workplaceArray['Number-worked-hours'] = $_POST['Number-worked-hours'.$i];}
			array_push($tempWork, $workplaceArray);
		}
		$postData['Workplaces'] =  $tempWork ;
	}
	   if(isset($_POST['Udegree'])){ $postData['Udegree'] = $_POST['Udegree']; }
	   if(isset($_POST['Undergraduate-university-name'])){ $postData['Undergraduate-university-name'] = $_POST['Undergraduate-university-name']; }
	   if(isset($_POST['Undergraduate-university-name-other']) && $_POST['Undergraduate-university-name-other']!=""){$postData['Undergraduate-university-name'] = $_POST['Undergraduate-university-name-other'];}
	   if(isset($_POST['Ugraduate-country'])){ $postData['Ugraduate-country'] = $_POST['Ugraduate-country']; }
	   if(isset($_POST['Ugraduate-year-attained'])){ $postData['Ugraduate-year-attained'] = $_POST['Ugraduate-year-attained']; }
	   if(isset($_POST['Pdegree'])){ $postData['Pdegree'] = $_POST['Pdegree']; }
	   if(isset($_POST['Postgraduate-university-name'])){ $postData['Postgraduate-university-name'] = $_POST['Postgraduate-university-name']; }
	   if(isset($_POST['Postgraduate-university-name-other']) && $_POST['Undergraduate-university-name-other']!=""){ $postData['Postgraduate-university-name'] = $_POST['Postgraduate-university-name-other']; }
	   if(isset($_POST['Pgraduate-country'])){ $postData['Pgraduate-country'] = $_POST['Pgraduate-country']; }
	   if(isset($_POST['Pgraduate-year-attained'])){ $postData['Pgraduate-year-attained'] = $_POST['Pgraduate-year-attained']; }
	   if(isset($_POST['addtionalNumber'])){
			$n =  $_POST['addtionalNumber'];
			$temp = array();
			for($j=0; $j<$n; $j++){
				$additionalQualifications = array();
				if(isset($_POST['degree'.$j])) { $additionalQualifications['degree'] = $_POST['degree'.$j];}
				if(isset($_POST['university-name'.$j])) { $additionalQualifications['university-name'] = $_POST['university-name'.$j];}
				if(isset($_POST['additional-country'.$j])) { $additionalQualifications['additional-country'] = $_POST['additional-country'.$j];}
				if(isset($_POST['additional-year-attained'.$j])) { $additionalQualifications['additional-year-attained'] = $_POST['additional-year-attained'.$j];}
				array_push($temp , $additionalQualifications);
			}
			$postData['Additional-qualifications'] =  $temp ;
		}
		//test update data,please remove later 
    /*$postData['Prefix']="Mr.";
	$postData['Firstname']="jh20180518";
	$postData['Preferred-name']="testjh";
	$postData['Middle-name']="testjh";
	$postData['Lastname']="testjh";
	$postData['birth']="10/5/1975";
	$postData['Gender']="Male";
	$postData['Aboriginal']="Abo";
	$postData['Home-country-code']="91";
	$postData['Home-area-code']="023";
	$postData['Home-phone-number']="1235";
	$postData['Mobile-area-code']="90";
	$postData['Mobile-number']="99892798081";
	$postData['BuildingName']="Line 1 Business Add1";
	$postData['Address_Line_1']="Line 2 Business Add1";
	$postData['Pobox']="40012";
	$postData['AddressLine3']="Line 3 Business Add";
	$postData['State']="KY";
	$postData['Suburb']="Chaplin";
	$postData['Postcode']="40012";
	$postData['Country']="Australia";
	$postData['Memberid']="jh20180518@hotmail.com";
	$postData['Password']="!!Aptify@1234";
	$postData['MemberType']="Full Time Private Insured";
	$postData['Ahpranumber']="123";
	$postData['Branch']="MyBranch";
	$postData['Billing-BuildingName']="Line 1 Billing Add";
	$postData['BillingAddress_Line_1']="Line 2 Billing Add";
	$postData['BillingAddress_Line_2']="Line 3 Billing Add";
	$postData['Billing-Suburb']="NEW FARM";
	$postData['Billing-State']="QLD";
	$postData['Billing-Postcode']="4007";
	$postData['Billing-Country']="Australia";
	$postData['D20Tick']="4007";
	$postData['ShippingBuildingName']="Line 1 Home Add";
	$postData['Shipping-Address_line_1']="Line 2 Home Add Line 3 POBox Add";
	$postData['Shipping-Address_line_2']="Line 2 Home Add Line 4 Home Add";
	$postData['Shipping-city-town']="BARDON";
	$postData['Shipping-state']="QLD";
	$postData['Shipping-country']="Australia";
	$postData['Shipping-postcode']="40057";
	$postData['Mailing-BuildingName']="Line 1 Home Add";
	$postData['MailingAddress_line_1']="Line 2 Home Add Line 3 POBox Add";
	$postData['Mailing-Address_line_2']="Line 2 Home Add Line 4 Home Add";
	$postData['Mailing-city-town']="BARDON";
	$postData['Mailing-state']="QLD";
	$postData['Mailing-country']="BARDON";
	$postData['PSpecialInterestAreaID']="38,16";
	$temppostWorkplacesData= array();
	$postWorkplacesData['Name-of-workplace']="Practice Ravi-test";
	$postWorkplacesData['Name']="Practice Ravi-test";
	$postWorkplacesData['Findphysio']="True";
	$postWorkplacesData['Find-a-buddy']="False";
	$postWorkplacesData['Workplace-settingName']="12";
	$postWorkplacesData['WBuildingName']="Practice Line1";
	$postWorkplacesData['Address_Line_1']="Practice Line 2";
	$postWorkplacesData['Address_Line_2']="Practice Line 3";
	$postWorkplacesData['Wcity']="DOUGLAS";
	$postWorkplacesData['Wpostcode']="4354";
	$postWorkplacesData['Wstate']="QLD";
	$postWorkplacesData['Wcountry']="Australia";
	$postWorkplacesData['Wemail']="test.shivdas@aptify.com";
	$postWorkplacesData['Wwebaddress']="www.aptify.com";
	$postWorkplacesData['WPhoneCountryCode']="61";
	$postWorkplacesData['WPhoneAreaCode']="03";
	$postWorkplacesData['WPhone']="487810";
	$postWorkplacesData['WPhoneExtentions']="93";
	$postWorkplacesData['Additionallanguage']="Additionallanguage";
	$postWorkplacesData['Wwebaddress']="www.aptify.com";
	$postWorkplacesData['Electronic-claiming']="True";
	$postWorkplacesData['Hicaps']="True";
	$postWorkplacesData['Healthpoint']="True";
	$postWorkplacesData['Departmentva']="True";
	$postWorkplacesData['Workerscompensation']="True";
	$postWorkplacesData['Motora']="True";
	$postWorkplacesData['Medicare']="True";
	$postWorkplacesData['Homehospital']="Homehospital";
	$postWorkplacesData['MobilePhysio']="True";
	$postWorkplacesData['SpecialInterestAreaID']="2,35";
	$postWorkplacesData['SpecialInterestArea']="Development";
	$postWorkplacesData['AdditionalLanguage']="5,52";
	$postWorkplacesData['Number-workedhours']="05-08";
	array_push($temppostWorkplacesData, $postWorkplacesData);
	$postData['Workplaces']=$temppostWorkplacesData;
	$tempPersonEducationData = array();
	$postPersonEducationData['Udegree']="1";
	$postPersonEducationData['Ugraduate-country']="1";
	$postPersonEducationData['Undergraduateuniversity-name']="My Company Name";
	$postPersonEducationData['Ugraduate-yearattained']="4/28/2019";
	array_push($tempPersonEducationData, $postPersonEducationData);
	$postData['PersonEducation']=$tempPersonEducationData;
	$postData['Status']="17";
	$postData['Specialty']="mySpec";//FACP member will show this field
	*/
	//test data end here
// 2.2.5 - Member detail - Update
// Send - 
// UserID & detail data
// Response -Update Success message & UserID & detail data
if(isset($_SESSION['UserId'])){ $postData['userID']=$_SESSION['UserId'];$testdata = GetAptifyData("5", $postData); print_r($testdata); }
else {
// for new user join a member call user registeration web service	
$resultdata = GetAptifyData("25", $postData); print_r($resultdata);
//when create user successfully call login web service to login in APA website automatically.
//after login successfully get UserID as well to store on APA shopping cart database
if($resultdata['Response']) { 
	$_SESSION["UserName"] = $postData['Memberid'];
	$_SESSION["Password"] = $postData['Password'];
	// call webservice login. Eddy will provide login -process functionality---put code here
	// login sucessful unset session
	loginManager($_SESSION["UserName"], $_SESSION["Password"]);
	unset($_SESSION["UserName"]);
	unset($_SESSION["Password"]);
}
} 
 
unset($_SESSION["Regional-group"]);
/*General function: save data to APA shopping cart database;*/
/*Parameters: $userID, $productID,$type;*/
/*save product data including membership type product, national group product, fellowship & PRF product*/	   
function createShoppingCart($userID, $productID,$type){
		$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config'); 
		try {
			$shoppingcartUpdate= $dbt->prepare('INSERT INTO shopping_cart (userID, productID, type) VALUES (:userID, :productID, :type)');
			$shoppingcartUpdate->bindValue(':userID', $userID);
			$shoppingcartUpdate->bindValue(':productID', $productID);
			$shoppingcartUpdate->bindValue(':type', $type);
			$shoppingcartUpdate->execute();	
			$shoppingcartUpdate = null;
		 
	    }
		catch (PDOException $e) {
				print "Error!: " . $e->getMessage() . "<br/>";
				die();
	    }
}
// check the user product in case of duplicated shopping cart data
function checkShoppingCart($userID, $type){
		$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config'); 
		try {
			$shoppingcartGet = $dbt->prepare('SELECT * FROM shopping_cart WHERE userID=:userID and type=:type');
			$shoppingcartGet->bindValue(':userID', $userID);
			$shoppingcartGet->bindValue(':type', $type);
			$shoppingcartGet->execute();
			if($shoppingcartGet->rowCount()>0) { 
			   $shoppingcartDel = $dbt->prepare('DELETE FROM shopping_cart WHERE userID=:userID and type=:type');
			   $shoppingcartDel->bindValue(':userID', $userID);
			   $shoppingcartDel->bindValue(':type', $type);
			   $shoppingcartDel->execute();	
			   $shoppingcartDel = null;
			}
			$shoppingcartGet = null; 
	    }
		catch (PDOException $e) {
				print "Error!: " . $e->getMessage() . "<br/>";
				die();
	    }
}
        if(isset($_SESSION['UserId'])){$userID = $_SESSION['UserId']; }
	    //$userID = $postData['Memberid'];//get the UserID  from Aptify response for user registeration webservice
		$products = array();
        $productID = $postData['MemberType'];
		checkShoppingCart($userID, $type="membership");
		createShoppingCart($userID, $productID,$type="membership");
		foreach($ngData['Nationalgp'] as $key=>$value){
			array_push($products,$value);
		}
		 /*  there is a question for those two kinds of subscription product, need to know how Aptify organise combination products for "sports and mus"*/
	    if(isset($_POST['ngmusculo']) && $_POST['ngmusculo'] =="1"){ array_push($products,"Intouch"); }
	    if(isset($_POST['ngsports']) && $_POST['ngsports'] =="1" ) { array_push($products,"SPMagzine"); }
	    $type = "NG";
		checkShoppingCart($userID, $type="NG");
		foreach($products as $key=>$value){
			$productID = $value;
			createShoppingCart($userID, $productID,$type);	
		}	
  }
?> 
<?php  if(isset($_SESSION['UserId'])): ?>
<?php 
//get productID list from local database;
	function getProduct($userID,$type){
		$arrayReturn = array();
		$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config');
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
	}
$userMemberProduct = getProduct($_SESSION['UserId'],"membership");
if(sizeof($userMemberProduct)!=0){ foreach($userMemberProduct as $singProduct) {$session['MembershipProductID'] = $singProduct;}}
$userNGProduct = getProduct($_SESSION['UserId'],"NG");
if(sizeof($userNGProduct)!=0){$session['NationalProductID'] = $userNGProduct; }


	
// 2.2.4 - Dashboard - Get member detail
// Send - 
// UserID 
// Response - UserID & detail data
$data = "UserID=".$_SESSION["UserId"];
$details = GetAptifyData("4", $data,""); // #_SESSION["UserID"];
print_r($details);
if (!empty($details['Regional-group'])) { $_SESSION['Regional-group'] = $details['Regional-group'];}											
 ?>
<form id="your-detail-form" action="jointheapa" method="POST">
    <input type="hidden" name="step1" value="1"/>
	<input type="hidden" name="insuranceTag" id="insuranceTag"/>
        <div class="down1" <?php if(isset($_POST['step1']) || isset($_POST['step2'])|| isset($_POST['step2-1'])|| isset($_POST['goI']) || isset($_POST['goP']))echo 'style="display:none;"'; else { echo 'style="display:block;"';}?>>
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 none-padding">
                <div class="row">
                    <div class="col-lg-3">
				            <label for="prefix">Prefix<span class="tipstyle">*</span></label>
							<select class="form-control" id="Prefix" name="Prefix">
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
                        <input type="text" class="form-control"  name="Firstname" <?php if (empty($details['Firstname'])) {echo "placeholder='First name'";}   else{ echo 'value="'.$details['Firstname'].'"'; }?>>
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
                        <input type="text" class="form-control" name="Maiden-name" <?php if (empty($details['Maiden-name'])) {echo "placeholder='Maiden name'";}   else{ echo 'value="'.$details['Maiden-name'].'"'; }?>>
                    </div>
					<div class="col-lg-6">
					   <label for="">Last name<span class="tipstyle">*</span></label>
					   <input type="text" class="form-control" name="Lastname" <?php if (empty($details['Lastname'])) {echo "placeholder='Last name'";}   else{ echo 'value="'.$details['Lastname'].'"'; }?>>
					</div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
					   <label for="">Birth Date<span class="tipstyle">*</span></label>
					   <input type="date" class="form-control" name="Birth" <?php if (empty($details['Birth'])) {echo "placeholder='DOB'";}   else{ echo 'value="'.str_replace("/","-",$details['Birth']).'"';} ?>>
                    </div>
					<div class="col-lg-3 col-lg-offset-1">
					   <label for="">Gender<span class="tipstyle">*</span></label>
					   <select class="form-control" id="Gender" name="Gender" required>
							<option value="" <?php if (empty($details['Gender'])) echo "selected='selected'";?> disabled> Gender </option>
							<option value="Male" <?php if ($details['Gender'] == "Male") echo "selected='selected'";?>>Male</option>
							<option value="Female" <?php if ($details['Gender'] == "Female") echo "selected='selected'";?>>Female</option>
							<option value="other" <?php if ($details['Gender'] == "Other") echo "selected='selected'";?>>I’d prefer not to say</option>
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
								echo '<option value="'.$country[$key]['ID'].'"';
								if ($details['Home-phone-countrycode'] == $country[$key]['ID']){ echo "selected='selected'"; } 
								echo '> '.$country[$key]['Country'].' </option>';
							}
						?>
						</select>
					</div>
					<div class="col-lg-2">
						<label for="">Area code</label>
						<input type="text" class="form-control" name="area-code" <?php if (empty($details['Home-phone-areacode'])) {echo "placeholder='Area code'";}   else{ echo 'value="'.$details['Home-phone-areacode'].'"'; }?>  >
					</div>
					<div class="col-lg-4">
						<label for="">Phone number</label>
						<input type="text" class="form-control" name="phone-number" <?php if (empty($details['Home-phone-number'])) {echo "placeholder='Phone number'";}   else{ echo 'value="'.$details['Home-phone-number'].'"'; }?>  >
					</div>
					
				</div>
				<div class="row">
					
					<div class="col-lg-2">
						<label for="">Country code</label>
						<select class="form-control" id="Mobile-countrycode" name="Mobile-countrycode">
						<?php
							$countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
							$country=json_decode($countrycode, true);						
							foreach($country  as $key => $value){
								echo '<option value="'.$country[$key]['ID'].'"';
								if ($details['Mobile-countrycode'] == $country[$key]['ID']){ echo "selected='selected'"; } 
								echo '> '.$country[$key]['Country'].' </option>';
							}
						?>
						</select>
					</div>
					<div class="col-lg-2">
						<label for="">Area code</label>
						<input type="text" class="form-control" name="Mobile-areacode" <?php if (empty($details['Mobile-areacode'])) {echo "placeholder='Mobile Area code'";}   else{ echo 'value="'.$details['Mobile-areacode'].'"'; }?>  >
					</div>
					<div class="col-lg-4">
						<label for="">Mobile number</label>
						<input type="text" class="form-control" name="phone-number" <?php if (empty($details['Mobile-number'])) {echo "placeholder='Mobile number'";}   else{ echo 'value="'.$details['Mobile-number'].'"'; }?>  >
					</div>
					
				</div>
                <div class="row">
                    <div class="col-lg-9"> Aboriginal and Torres Strait Islander origin<span class="tipstyle">*</span></div>
                    <div class="col-lg-3">
                        <select class="form-control" id="Aboriginal" name="Aboriginal">
                            <option value="No" <?php if ($details['Aboriginal'] == "No") echo "selected='selected'";?>>No</option>
                            <option value="AB" <?php if ($details['Aboriginal'] == "AB") echo "selected='selected'";?>>Yes, Aboriginal </option>
                            <option value="TSI" <?php if ($details['Aboriginal'] == "TSI") echo "selected='selected'";?>>Yes, Torres Strait Islander </option>
                            <option value="BOTH" <?php if ($details['Aboriginal'] == "BOTH") echo "selected='selected'";?>>Yes, both Aboriginal and Torres Strait Islander</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">Residential address:</div>
                </div>
			    <div class="row">
					<div class="col-lg-4">
                        <label for="">Building name</label>
                        <input type="text" class="form-control"  name="BuildingName" <?php if (empty($details['BuildingName'])) {echo "placeholder='Building Name'";}   else{ echo 'value="'.$details['BuildingName'].'"'; }?>>
                    </div>
			    </div>
                <div class="row">
                    <div class="col-lg-4">
					    <label for="">Address 1<span class="tipstyle">*</span></label>
					    <input type="text" class="form-control"  name="Address_Line_1" id="Address_Line_1" <?php if (empty($details['Address_Line_1'])) {echo "placeholder='Address 1'";}   else{ echo 'value="'.$details['Address_Line_1'].'"'; }?>>
                    </div>
                    <div class="col-lg-6 col-lg-offset-2">
                        <label for="">PO box</label>
                        <input type="text" class="form-control" name="Pobox" <?php if (empty($details['Pobox'])) {echo "placeholder='PO box'";}   else{ echo 'value="'.$details['Pobox'].'"'; }?>>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
					    <label for="">Address 2<span class="tipstyle">*</span></label>
					    <input type="text" class="form-control" name="Address_Line_2" id="Address_Line_2" <?php if (empty($details['Address_Line_2'])) {echo "placeholder='Address 2'";}   else{ echo 'value="'.$details['Address_Line_2'].'"'; }?>>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <label for="">City or town<span class="tipstyle">*</span></label>
                        <input type="text" class="form-control" name="Suburb" id="Suburb" <?php if (empty($details['Suburb'])) {echo "placeholder='City or town'";}   else{ echo 'value="'.$details['Suburb'].'"'; }?>>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <label for="">Postcode<span class="tipstyle">*</span></label>
                        <input type="text" class="form-control" name="Postcode" id="Postcode" <?php if (empty($details['Postcode'])) {echo "placeholder='Postcode'";}   else{ echo 'value="'.$details['Postcode'].'"'; }?>>
                    </div>
                    <div class="col-lg-3">
                        <label for="">State<span class="tipstyle">*</span></label>
						<select class="form-control" id="State" name="State">
						<?php
                        $statecode  = file_get_contents("sites/all/themes/evolve/json/State.json");
						$State=json_decode($statecode, true);						
						foreach($State  as $key => $value){
						    echo '<option value="'.$State[$key]['ID'].'"';
							if ($details['State'] == $State[$key]['ID']){ echo "selected='selected'"; } 
							echo '> '.$State[$key]['Abbreviation'].' </option>';
							
						}
						?>
						</select>
                       
                    </div>
                    <div class="col-lg-6">
                        <label for="">Country<span class="tipstyle">*</span></label>
						<select class="form-control" id="Country" name="Country">
						<?php
                        $countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
						$country=json_decode($countrycode, true);						
						foreach($country  as $key => $value){
						    
							echo '<option value="'.$country[$key]['ID'].'"';
							if ($details['Country'] == $country[$key]['ID']){ echo "selected='selected'"; } 
							echo '> '.$country[$key]['Country'].' </option>';
							
						}
						?>
						</select>
                        
                    </div>
                </div>
                   
                <div class="row">
				    <div class="col-lg-12"><label for="Shipping-address-join"><strong>Billing address:(Sames as Above address)</strong></label><input type="checkbox" id="Shipping-address-join" name="Shipping-address-join" value="1" checked></div>
                </div>
                <div class="row shipping" id="shippingAddress">
				    <div class="row">
					    <div class="col-lg-4">
                           <label for="">Building name</label>
                           <input type="text" class="form-control"  name="Billing-BuildingName" <?php if (empty($details['Billing-BuildingName'])) {echo "placeholder='Billing Building Name'";}   else{ echo 'value="'.$details['Billing-BuildingName'].'"'; }?>>
                        </div>
						<div class="col-lg-6 col-lg-offset-2">
                           <label for="">PO box</label>
                           <input type="text" class="form-control" name="Pobox"  <?php if (empty($details['Billing-PObox'])) {echo "placeholder='PO box'";}   else{ echo 'value="'.$details['Billing-PObox'].'"'; }?>>
                        </div>
					</div>
					    <div class="col-lg-4">
                           <label for="">Address 1<span class="tipstyle">*</span></label>
                           <input type="text" class="form-control"  name="Billing-Address_Line_1" id="Billing-Address_Line_1" <?php if (empty($details['Billing-Address_Line_1'])) {echo "placeholder='Billing Address 1'";}   else{ echo 'value="'.$details['Billing-Address_Line_1'].'"'; }?>>
                        </div>
                       
					    <div class="col-lg-12">
                           <label for="">Address 2<span class="tipstyle">*</span></label>
                           <input type="text" class="form-control" name="Billing-Address_Line_2" id="Billing-Address_Line_2" <?php if (empty($details['Billing-Address_Line_2'])) {echo "placeholder='Billing Address 2'";}   else{ echo 'value="'.$details['Billing-Address_Line_2'].'"'; }?>>
                        </div>
						<div class="col-lg-12">
                           <label for="">City or town<span class="tipstyle">*</span></label>
                           <input type="text" class="form-control" name="Billing-Suburb" id="Billing-Suburb" <?php if (empty($details['Billing-Suburb'])) {echo "placeholder='Billing City/Town'";}   else{ echo 'value="'.$details['Billing-Suburb'].'"'; }?>>
                        </div>
                        <div class="col-lg-3">
                           <label for="">Postcode<span class="tipstyle">*</span></label>
                           <input type="text" class="form-control" name="Billing-Postcode" id="Billing-Postcode" <?php if (empty($details['Billing-Postcode'])) {echo "placeholder='Billing Postcode'";}   else{ echo 'value="'.$details['Billing-Postcode'].'"'; }?>>
                        </div>
                        <div class="col-lg-3">
                           <label for="">State<span class="tipstyle">*</span></label>
						    <select class="form-control" name="Billing-State" id="Billing-State">
                              <option value=""  <?php if (empty($details['Billing-State'])) echo "selected='selected'";?> disabled> State </option>
							  <?php 
								$statecode  = file_get_contents("sites/all/themes/evolve/json/State.json");
								$State=json_decode($statecode, true);
								foreach($State  as $key => $value){
								echo '<option value="'.$State[$key]['ID'].'"';
								if ($details['Billing-State'] == $State[$key]['ID']){ echo "selected='selected'"; } 
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
								
								echo '<option value="'.$country[$key]['ID'].'"';
								if ($details['Billing-Country'] == $country[$key]['ID']){ echo "selected='selected'"; } 
								echo '> '.$country[$key]['Country'].' </option>';
							}
							?>
							</select>
                           
                        </div>
                </div>
					 <!---Hidden mailing address and shipping address Start from here-->
					   <input type="hidden" name="Shipping-BuildingName" value="<?php echo $details['Shipping-BuildingName'];?>">
					   <input type="hidden" name="Shipping-Address_Line_1" value="<?php echo $details['Shipping-Address_Line_1'];?>">
					   <input type="hidden" name="Shipping-Address_Line_2" value="<?php echo $details['Shipping-Address_Line_2'];?>">
					   <input type="hidden" name="Shipping-PObox" value="<?php echo $details['Shipping-PObox'];?>">
					   <input type="hidden" name="Shipping-city-town" value="<?php echo $details['Shipping-city-town'];?>">
					   <input type="hidden" name="Shipping-postcode" value="<?php echo $details['Shipping-postcode'];?>">
					   <input type="hidden" name="Shipping-state" value="<?php echo $details['Shipping-state'];?>">
					   <input type="hidden" name="Shipping-country" value="<?php echo $details['Shipping-country'];?>">
					   <input type="hidden" name="Mailing-BuildingName" value="<?php echo $details['Mailing-BuildingName'];?>">
					   <input type="hidden" name="Mailing-Address_Line_1" value="<?php echo $details['Mailing-Address_Line_1'];?>">
					   <input type="hidden" name="Mailing-Address_Line_2" value="<?php echo $details['Mailing-Address_Line_2'];?>">
					   <input type="hidden" name="Mailing-PObox" value="<?php echo $details['Mailing-PObox'];?>">
					   <input type="hidden" name="Mailing-city-town" value="<?php echo $details['Mailing-city-town'];?>">
					   <input type="hidden" name="Mailing-postcode" value="<?php echo $details['Mailing-postcode'];?>">
					   <input type="hidden" name="Mailing-state" value="<?php echo $details['Mailing-state'];?>">
					   <input type="hidden" name="Mailing-country" value="<?php echo $details['Mailing-country'];?>">
			        <!---Hidden mailing address and shipping address End here-->
			
            </div>
				  <!--
                  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 form-right">
                     <div class="row form-image">
                        <div class="col-lg-12">
                           Upload/change image
                        </div>
                     </div>
                                               
                  </div>
				  -->
		    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">   <a class="join-details-button1"><span class="dashboard-button-name">Next</span></a></div>
        </div>
		<div class="down2" style="display:none;" >
            <div class="row">
			
                <div class="col-lg-6">
                    <label for="">Member ID(Your email address)<span class="tipstyle">*</span></label>
                    <input type="text" class="form-control" name="Memberid" <?php if (empty($details['Memberid'])) {echo "placeholder='Member no.'";}   else{ echo 'value="'.$details['Memberid'].'"'; }?> readonly>
                </div>
				
            </div>
		    <div class="row">
                <div class="col-lg-6">
                    <label for="">Member Type<span class="tipstyle">*</span></label>
					<select class="form-control" id="MemberType" name="MemberType">
						<option value="" <?php if (isset($_SESSION["MembershipProductID"])) echo "selected='selected'";?> disabled>memberType</option>	
					<?php 
                        $MemberTypecode  = file_get_contents("sites/all/themes/evolve/json/MemberType.json");
						$MemberType=json_decode($MemberTypecode, true);
						foreach($MemberType  as $key => $value){
							echo '<option value="'.$MemberType[$key]['ID'].'"';
							if(isset($_SESSION["MembershipProductID"])){if ($_SESSION["MembershipProductID"] == $MemberType[$key]['ID']){ echo "selected='selected'"; } }
							echo '> '.$MemberType[$key]['Name'].' </option>';
						}
					?>
					</select>
                </div>
            </div>
			<div class="row" id="ahpblock">
                <div class="col-lg-2">
                    <label for="">AHPRA number</label>
                    <input type="text" class="form-control" name="Ahpranumber"  <?php if (empty($details['Ahpranumber'])) {echo "placeholder='AHPRA number'";}   else{ echo 'value="'.$details['Ahpranumber'].'"'; }?>>
                </div>
            </div>
			<div class="row">
                <div class="col-lg-2">
                    <label for="">Specialty</label>
                    <input type="text" class="form-control" name="Specialty"  <?php if (empty($details['Specialty'])) {echo "placeholder='Specialty'";}   else{ echo 'value="'.$details['Specialty'].'"'; }?>>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
					<label for="">Your National group</label>
					<select class="chosen-select" id="Nationalgp" name="Nationalgp[]" multiple>
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
						if(isset($_SESSION["NationalProductID"])){ if (in_array( $nationalGroups[$key]["ID"],$details['Nationalgp'])){ echo "selected='selected'"; } }
						   echo '> '.$nationalGroups[$key]["Name"].' </option>';
						}
						
					?>
					  </select>
                </div>
			    <div class="col-lg-3 display-none" id="ngsports"><label for="ngsportsbox">Would you like to subscribe to the APA SportsPhysio magazine?</label><input type="checkbox" id="ngsportsbox" name="ngsports" value="0"></div>
			    <div class="col-lg-3 display-none" id="ngmusculo"><label for="ngmusculobox">Would you like to subscribe to the APA InTouch magazine?</label><input type="checkbox" id="ngmusculobox" name="ngmusculo" value="0"></div>
            </div>
		    <div class="row">
			    <div class="col-lg-6">
					<label for="">What branch would you like to join?<span class="tipstyle">*</span></label>
					<select class="form-control" id="Branch" name="Branch">
					<?php
						//$statecode  = file_get_contents("sites/all/themes/evolve/json/State.json");
						//$State=json_decode($statecode, true);					
						//foreach($State  as $key => $value){
						//echo '<option value="'.$State[$key]['ID'].'"';
						//if ($details['Branch'] == $State[$key]['ID']){ echo "selected='selected'"; } 
						//echo '> '.$State[$key]['Abbreviation'].' </option>';
						//}
					?>
						<option value="73" <?php if ($details['Branch'] == "73") echo "selected='selected'";?>> ACT </option>
						<option value="74" <?php if ($details['Branch'] == "74") echo "selected='selected'";?>> NSW </option>
						<option value="77" <?php if ($details['Branch'] == "77") echo "selected='selected'";?>> SA </option>
						<option value="78" <?php if ($details['Branch'] == "78") echo "selected='selected'";?>> TAS </option>
						<option value="79" <?php if ($details['Branch'] == "79") echo "selected='selected'";?>> VIC </option>
						<option value="76" <?php if ($details['Branch'] == "76") echo "selected='selected'";?>> QLD </option>
						<option value="75" <?php if ($details['Branch'] == "75") echo "selected='selected'";?>> NT </option>
						<option value="80" <?php if ($details['Branch'] == "80") echo "selected='selected'";?>> WA </option>
					</select>
				</div>
		    </div>
			<div class="row"> 
                <div class="col-lg-3"> Your special interest area:</div>
                <div class="col-lg-6">
					<select class="chosen-select" id="SpecialInterest" name="SpecialInterest[]" multiple  tabindex="-1" data-placeholder="Choose interest area...">
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
								echo '<option value="'.$interestAreas[$key]["Code"].'"';
								if (in_array( $interestAreas[$key]["Code"],$details['SpecialInterest'])){ echo "selected='selected'"; } 
								echo '> '.$interestAreas[$key]["Name"].' </option>'; 
								 
							 }
												   
						   ?>
                    </select>
                </div>
            </div>
			<div class="row"> 
				<div class="col-lg-3">
				Your treatment area:
				</div>
			</div>
			<div class="row"> 
				<div class="col-lg-6">
					<select class="chosen-select" id="treatment-area" name="Treatmentarea[]" multiple  tabindex="-1" data-placeholder="Choose treatment area...">
					<?php 
					
					$interestAreascode  = file_get_contents("sites/all/themes/evolve/json/AreaOfInterest__c.json");
				    $interestAreas=json_decode($interestAreascode, true);	
				
					?>
					<?php 
					foreach($interestAreas  as $key => $value){
						echo '<option value="'.$interestAreas[$key]["Code"].'"';
						if (in_array( $interestAreas[$key]["Code"],$details['Treatmentarea'])){ echo "selected='selected'"; } 
						echo '> '.$interestAreas[$key]["Name"].' </option>'; 
					}
					?>
					</select>
				</div>
			</div>
		    <div class="row">
				<div class="col-lg-3">What is your favourite languages?<br/></div>
				<div class="col-lg-3">
					<select class="chosen-select" id="MAdditionallanguage" name="MAdditionallanguage" multiple  tabindex="-1" data-placeholder="Choose your favourite language...">
					   <option value="NONE" <?php if (empty($details['Additionallanguage'])) echo "selected='selected'";?> disabled>no</option>
					   <?php 
                        $Languagecode  = file_get_contents("sites/all/themes/evolve/json/Language.json");
						$Language=json_decode($Languagecode, true);
						foreach($Language  as $key => $value){
						    echo '<option value="'.$Language[$key]['ID'].'"';
							if (in_array( $Language[$key]["ID"],$details['Additionallanguage'])){ echo "selected='selected'"; } 
							echo '> '.$Language[$key]['Name'].' </option>';
							
						}
						?>
					  
					</select>
				</div>
			</div>
		    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">   <a class="your-details-prevbutton2"><span class="dashboard-button-name">Last</span></a><a class="join-details-button2"><span class="dashboard-button-name">Next</span></a></div>
        </div>
        <div id="wpnumber"><?php  $wpnumber =  sizeof($details['Workplaces'])-1; echo  $wpnumber; ?></div>
        <input type="hidden" name="wpnumber" value="<?php  if(sizeof($details['Workplaces'])!=0) {$wpnumber =  sizeof($details['Workplaces'])-1; echo  $wpnumber;} else {$wpnumber =1; echo $wpnumber;} ?>"/>
<script type="text/javascript">
    jQuery(document).ready(function($) {
	    $(".chosen-select").chosen({width: "100%"});
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
		    $("#workplace"+ i ).load("sites/all/themes/evolve/commonFile/workplace.php", {"count":i,"sessionWorkplaceSetting":sessionvariable, "sessioninterestAreas":sessionInterest});
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
        <div class="down3" style="display:none;">
			<div class="row">
				<div class="col-lg-12"> <label for="Findpublicbuddy"><strong>NOTE:</strong>Please list my details in the public (visbile to other health professionals)</label>
					<input type="checkbox" name="Findpublicbuddy" id="Findpublicbuddy" value="<?php  echo $details['Findpublicbuddy'];?>" <?php if($details['Findpublicbuddy']==1){echo "checked";} ?>>
				</div>
			</div>
			
            <ul class="nav nav-tabs" id="tabmenu">
			<?php foreach( $details['Workplaces'] as $key => $value ):  ?>
                <li <?php if($key=='Workplace0') echo 'class ="active" ';?>><a data-toggle="tab" href="#workplace<?php echo $key;?>"><?php echo "Workplace".$key;?></a></li>
            <?php endforeach ?> 
			</ul>
            <div id="workplaceblocks">
			<?php foreach( $details['Workplaces'] as $key => $value ):  ?>
                <div id="workplace<?php echo $key;?>" class='tab-pane fade <?php if($key=='Workplace0') echo "in active ";?>'> 
                    <div class="row">
					    <div class="col-lg-6"></div>
						<div class="col-lg-6">
						    <label for="Findphysio<?php echo $key;?>"><strong>NOTE:</strong>This workplace is included in Find a Pyhsio.</label>
                            <input type="checkbox" name="Findphysio<?php echo $key;?>" id="Findphysio<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Findphysio'];?>" >
					    </div>
					</div>
					<div class="row">
						<div class="col-lg-12"> <label for="Findabuddy<?php echo $key;?>"><strong>NOTE:</strong>Please list my details in the physio</label>
							<input type="checkbox" name="Findabuddy<?php echo $key;?>" id="Findabuddy<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Findabuddy'];?>" <?php if($details['Workplaces'][$key]['Findabuddy']==1){echo "checked";} ?>>
						</div>
					</div>
                    <div class="row">
				        <div class="col-lg-12">
					        <label for="Name-of-workplace">Name of workplace<span class="tipstyle">*</span></label>
					        <input type="text" class="form-control" name="Name-of-workplace<?php echo $key;?>" id="Name-of-workplace<?php echo $key;?>" <?php if (empty($details['Workplaces'][$key]['Name-of-workplace'])) {echo "placeholder='Name of workplace'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Name-of-workplace'].'"'; }?>>
						</div>
					</div>
				    <div class="row">
                        <div class="col-lg-3">Workplace setting<span class="tipstyle">*</span></div>
						<div class="col-lg-9">
					        <select class="form-control" id="Workplace-setting<?php echo $key;?>" name="Workplace-setting<?php echo $key;?>">
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
							if ($details['Workplaces'][$key]['Workplace-setting'] == $workplaceSettings[$pair]["ID"]){ echo "selected='selected'"; } 
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
							<select class="chosen-select" id="WTreatmentarea<?php echo $key;?>" name="WTreatmentarea<?php echo $key;?>[]" multiple  tabindex="-1" data-placeholder="Choose treatment area...">
							<?php 
							// get interest area from Aptify via webserice return Json data;
							$interestAreascode  = file_get_contents("sites/all/themes/evolve/json/AreaOfInterest__c.json");
				            $interestAreas=json_decode($interestAreascode, true);	
							?>
							<?php 
							foreach($interestAreas  as $pair => $value){
								echo '<option value="'.$interestAreas[$pair]["Code"].'"';
								if ($details['Workplaces'][$key]['Treatmentarea'] == $interestAreas[$pair]["Code"]){ echo "selected='selected'"; } 
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
							<label for="WAddress_Line_1">Address line 1<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="WAddress_Line_1<?php echo $key;?>" id="WAddress_Line_1<?php echo $key;?>" <?php if (empty($details['Workplaces'][$key]['Address_Line_1'])) {echo "placeholder='Address line 1'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Address_Line_1'].'"'; }?>>
						</div>
						<div class="col-lg-4">
							<label for="WAddress_Line_2">Address line 2</label>
							<input type="text" class="form-control" name="WAddress_Line_2<?php echo $key;?>" id="Wstreet<?php echo $key;?>" <?php if (empty($details['Workplaces'][$key]['Address_Line_2'])) {echo "placeholder='Address line 2'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Address_Line_2'].'"'; }?>>
						</div>
					</div>
                 	<div class="row">
						<div class="col-lg-3">
							<label for="Wcity">City/Town<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Wcity<?php echo $key;?>" id="Wcity<?php echo $key;?>"  <?php if (empty($details['Workplaces'][$key]['Wcity'])) {echo "placeholder='City or town'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Wcity'].'"'; }?>>
						</div>
						<div class="col-lg-3">
							<label for="Wpostcode">Postcode<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Wpostcode<?php echo $key;?>" id="Wpostcode<?php echo $key;?>"  <?php if (empty($details['Workplaces'][$key]['Wpostcode'])) {echo "placeholder='Postcode'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Wpostcode'].'"'; }?>>
						</div>
						<div class="col-lg-3">
							<label for="Wstate">State<span class="tipstyle">*</span></label>
							<select class="form-control" id="Wstate<?php echo $key;?>" name="Wstate<?php echo $key;?>">
								<option value="" <?php if (empty($details['Workplaces'][$key]['Wstate'])) echo "selected='selected'";?> disabled>State</option>
								<?php
								$statecode  = file_get_contents("sites/all/themes/evolve/json/State.json");
								$State=json_decode($statecode, true);						
								foreach($State  as $pair => $value){
									echo '<option value="'.$State[$pair]['ID'].'"';
									if ($details['Workplaces'][$key]['Wstate'] == $State[$pair]['ID']){ echo "selected='selected'"; } 
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
									echo '<option value="'.$country[$pair]['ID'].'"';
									if ($details['Workplaces'][$key]['Wcountry'] == $country[$pair]['ID']){ echo "selected='selected'"; } 
									echo '> '.$country[$pair]['Country'].' </option>';
									
								}
								?>
							</select>
						</div>
					</div>
                    <div class="row">
						<div class="col-lg-6">
							<label for="Wemail">Workplace email<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Wemail<?php echo $key;?>" id="Wemail<?php echo $key;?>"  <?php if (empty($details['Workplaces'][$key]['Wemail'])) {echo "placeholder='Workplace email'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Wemail'].'"'; }?>>
						</div>
						<div class="col-lg-3">
							<label for="Wwebaddress">Website<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Wwebaddress<?php echo $key;?>" id="Wwebaddress<?php echo $key;?>" <?php if (empty($details['Workplaces'][$key]['Wwebaddress'])) {echo "placeholder='Website'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Wwebaddress'].'"'; }?>>
						</div>
						<div class="col-lg-3">
							<label for="Wphone">Phone number<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Wphone<?php echo $key;?>" id="Wphone<?php echo $key;?>" <?php if (empty($details['Workplaces'][$key]['Wphone'])) {echo "placeholder='Phone number'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Wphone'].'"'; }?>>
						</div>
					</div>
                    <div class="row">
						<div class="col-lg-3">
						Does this workplace offer additional languages?<br/>
						</div>
						<div class="col-lg-3">
							<select class="chosen-select" id="Additionallanguage<?php echo $key;?>" name="Additionallanguage<?php echo $key;?>[]" multiple  tabindex="-1" data-placeholder="Choose an additional language...">
								<option value="NONE" <?php if (empty($details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?> disabled>no</option>
								<?php 
									$Languagecode  = file_get_contents("sites/all/themes/evolve/json/Language.json");
									$Language=json_decode($Languagecode, true);
									foreach($Language  as $pair => $value){
										echo '<option value="'.$Language[$pair]['ID'].'"';
										if (in_array($Language[$pair]['ID'],$details['Workplaces'][$key]['Additionallanguage'])){ echo "selected='selected'"; } 
										echo '> '.$Language[$pair]['Name'].' </option>';
									}
								?>
								
							</select>
						</div>
						<div class="col-lg-3">
						Quality In Practice number(QIP):
						</div>
						<div class="col-lg-3">
							<input type="text" class="form-control" name="QIP<?php echo $key;?>" id="QIP<?php echo $key;?>" <?php if (empty($details['Workplaces'][$key]['QIP'])) {echo "placeholder='QIP Number'";}   else{ echo 'value="'.$details['Workplaces'][$key]['QIP'].'"'; }?>>
						</div>
					</div>
                    <div class="row"> 
                        <div class="col-lg-3">Does this workplace provide: </div>
                    </div>
                    <div class="row">
						<div class="col-lg-6">
							<input type="checkbox" name="Electronic-claiming<?php echo $key;?>" id="Electronic-claiming<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Electronic-claiming'];?>" <?php if($details['Workplaces'][$key]['Electronic-claiming']==1){echo "checked";} ?>> <label for="Electronic-claiming<?php echo $key;?>">Electronic claiming</label>
						</div>
						<div class="col-lg-6">
							<input type="checkbox" name="Hicaps<?php echo $key;?>" id="Hicaps<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Hicaps'];?>" <?php if($details['Workplaces'][$key]['Hicaps']==1){echo "checked";} ?>> <label for="Hicaps<?php echo $key;?>">HICAPS</label>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<input type="checkbox" name="Healthpoint<?php echo $key;?>" id="Healthpoint<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Healthpoint'];?>" <?php if($details['Workplaces'][$key]['Healthpoint']==1){echo "checked";} ?>> <label for="Healthpoint<?php echo $key;?>">Healthpoint</label>
						</div>
						<div class="col-lg-6">
							<input type="checkbox" name="Departmentva<?php echo $key;?>" id="Departmentva<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Departmentva'];?>" <?php if($details['Workplaces'][$key]['Departmentva']==1){echo "checked";} ?>> <label for="Departmentva<?php echo $key;?>">Department of Vetarans' Affairs</label>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<input type="checkbox" name="Workerscompensation<?php echo $key;?>" id="Workerscompensation<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Workerscompensation'];?>" <?php if($details['Workplaces'][$key]['Workerscompensation']==1){echo "checked";} ?>> <label for="Workerscompensation<?php echo $key;?>">Workers compensation</label>
						</div>
						<div class="col-lg-6">
							<input type="checkbox" name="Motora<?php echo $key;?>" id="Motora<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Motora'];?>" <?php if($details['Workplaces'][$key]['Motora']==1){echo "checked";} ?>> <label for="Motora<?php echo $key;?>">Motor accident compensation</label>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<input type="checkbox" name="Medicare<?php echo $key;?>" id="Medicare<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Medicare'];?>" <?php if($details['Workplaces'][$key]['Medicare']==1){echo "checked";} ?>> <label for="Medicare<?php echo $key;?>">Medicare Chronic Disease Management</label>
						</div>
						<div class="col-lg-6">
							<input type="checkbox" name="Homehospital<?php echo $key;?>" id="Homehospital<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Homehospital'];?>" <?php if($details['Workplaces'][$key]['Homehospital']==1){echo "checked";} ?> > <label for="Homehospital<?php echo $key;?>">Home and hospital visits</label>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<input type="checkbox" name="Mobilephysiotherapist<?php echo $key;?>" id="Mobilephysiotherapist<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['MobilePhysio'];?>" <?php if($details['Workplaces'][$key]['MobilePhysio']==1){echo "checked";} ?>> <label for="Mobilephysiotherapist<?php echo $key;?>">Mobile physiotherapist</label>
						</div>
					</div>
                    <div class="row">
						<div class="col-lg-3">
						Numbers of hours worked<span class="tipstyle">*</span>
						</div>
						<div class="col-lg-6">
							<select class="form-control" id="Number-worked-hours<?php echo $key;?>" name="Number-worked-hours<?php echo $key;?>">
							<?php 
								$NumberOfHourscode  = file_get_contents("sites/all/themes/evolve/json/NumberOfHours.json");
								$NumberOfHours=json_decode($NumberOfHourscode, true);
								foreach($NumberOfHours  as $pair => $value){
									echo '<option value="'.$NumberOfHours[$pair]['ID'].'"';
									if ($details['Workplaces'][$key]['Number-worked-hours'] == $NumberOfHours[$pair]['ID']){ echo "selected='selected'"; } 
									echo '> '.$NumberOfHours[$pair]['Name'].' </option>';
								}
							?>
								
							</select>
						</div>
					</div>
                           
                </div>
			<?php endforeach; ?>	
			</div>
			<?php if(sizeof($details['Workplaces'])==0):?>
				<ul class="nav nav-tabs" id="tabmenu">
			<li class ="active"><a data-toggle="tab" href="#workplace0"><?php echo "Workplace0";?></a></li>
			</ul>
			<div id="workplaceblocks">
				<div id="workplace0" class='tab-pane fade in active'> 
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
						$interestAreas= GetAptifyData("37","request");
						$_SESSION["interestAreas"] = $interestAreas;
						?>
						<?php 
						foreach($interestAreas['InterestAreas']  as $lines){
							echo '<option value="'.$lines["ListCode"].'"';
							echo '> '.$lines["ListName"].' </option>'; 
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
								echo '<option value="'.$State[$key]['ID'].'"';
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
								echo '<option value="'.$country[$key]['ID'].'"';
								echo '> '.$country[$key]['Country'].' </option>';
								
							}
							?>
					    </select>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<label for="Wemail">Workplace email<span class="tipstyle">*</span></label>
						<input type="text" class="form-control" name="Wemail0" id="Wemail0">
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
			</div>
				
				<?php endif; ?>
		    <div class="row"><div class="col-xs-9 col-sm-9 col-md-9 col-lg-9"><a class="add-workplace-join"><span class="dashboard-button-name">Add workplace</span></a></div></div>
			
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">   
				<a class="join-details-button3"><span class="dashboard-button-name">Next</span></a><a class="your-details-prevbutton3"><span class="dashboard-button-name">Last</span></a>
		    </div>
        </div>
        <div class="down4" style="display:none;" >
            <div class="row">
                <div class="col-lg-6">
					<label for="Udegree">Undergraduate degree<span class="tipstyle">*</span></label>
					<select name="Udegree" id="Udegree">
						<option value="" <?php if (empty($details['Udegree'])) echo "selected='selected'";?> disabled>(None)</option>
						<option value="1" <?php if ($details['Udegree'] == "1") echo "selected='selected'";?>>Bachelor of Physiotherapy</option>
						<option value="2" <?php if ($details['Udegree'] == "2") echo "selected='selected'";?>>Bachelor of Physiotherapy (Hons)</option>
						<option value="3" <?php if ($details['Udegree'] == "3") echo "selected='selected'";?>>Bachelor of Physiotherapy (Honours)</option>
						<option value="4" <?php if ($details['Udegree'] == "4") echo "selected='selected'";?>>Bachelor of Science (Physiotherapy)</option>
						<option value="5" <?php if ($details['Udegree'] == "5") echo "selected='selected'";?>>Bachelor of Science (Physiotherapy) (Honours)</option>
						<option value="6" <?php if ($details['Udegree'] == "6") echo "selected='selected'";?>>Bachelor of Applied Science and Master of Physiotherapy Practice</option>
						<option value="7" <?php if ($details['Udegree'] == "7") echo "selected='selected'";?>>Bachelor of Applied Science (Physiotherapy)</option>
						<option value="8" <?php if ($details['Udegree'] == "8") echo "selected='selected'";?>>Bachelor of Applied Science (Physiotherapy) (Honours)</option>
						<option value="Other">Other</option>
					</select>
			    </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <label for="undergraduate-university-name">Undergraduate university name<span class="tipstyle">*</span></label>
                    <select name="Undergraduate-university-name" id="Undergraduate-university-name">
						<option value="" <?php if (empty($details['Undergraduate-university-name'])) echo "selected='selected'";?>>(None)</option>
						<option value="ACU" <?php if ($details['Undergraduate-university-name'] == "ACU") echo "selected='selected'";?>>Australian Catholic University - NSW</option>
						<option value="ACUQ" <?php if ($details['Undergraduate-university-name'] == "ACUQ") echo "selected='selected'";?>>Australian Catholic University - QLD</option>
						<option value="ACUB" <?php if ($details['Undergraduate-university-name'] == "ACUB") echo "selected='selected'";?>>Australlian Catholic University - Ballarat</option>
						<option value="BON" <?php if ($details['Undergraduate-university-name'] == "BON") echo "selected='selected'";?>>Bond University - QLD</option>
						<option value="CU" <?php if ($details['Undergraduate-university-name'] == "CU") echo "selected='selected'";?>>Canberra University</option>
						<option value="CQU" <?php if ($details['Undergraduate-university-name'] == "CQU") echo "selected='selected'";?>>Central Qld University</option>
						<option value="CSU" <?php if ($details['Undergraduate-university-name'] == "CSU") echo "selected='selected'";?>>Charles Sturt University - Albury NSW</option>
						<option value="CSUO" <?php if ($details['Undergraduate-university-name'] == "CSUO") echo "selected='selected'";?>>Charles Sturt University - Orange NSW</option>
						<option value="CSUP" <?php if ($details['Undergraduate-university-name'] == "CSUP") echo "selected='selected'";?>>Charles Sturt University Port Macquarie</option>
						<option value="CUMB" <?php if ($details['Undergraduate-university-name'] == "CUMB") echo "selected='selected'";?>>Cumberland University - NSW</option>
						<option value="CUR" <?php if ($details['Undergraduate-university-name'] == "CUR") echo "selected='selected'";?>>Curtin University - WA</option>
						<option value="ECU" <?php if ($details['Undergraduate-university-name'] == "ECU") echo "selected='selected'";?>>Edith Cowan University - WA</option>
						<option value="FLIN" <?php if ($details['Undergraduate-university-name'] == "FLIN") echo "selected='selected'";?>>Flinders University SA</option>
						<option value="GRIF" <?php if ($details['Undergraduate-university-name'] == "GRIF") echo "selected='selected'";?>>Griffith University - Gold coast QLD</option>
						<option value="JCU" <?php if ($details['Undergraduate-university-name'] == "JCU") echo "selected='selected'";?>>James Cook University - QLD</option>
						<option value="LAT" <?php if ($details['Undergraduate-university-name'] == "LAT") echo "selected='selected'";?>>Latrobe University - Bundoora VIC</option>
						<option value="LATB" <?php if ($details['Undergraduate-university-name'] == "LATB") echo "selected='selected'";?>>Latrobe Universtiy - Bendigo VIC</option>
						<option value="LIN" <?php if ($details['Undergraduate-university-name'] == "LIN") echo "selected='selected'";?>>Lincoln Institute - VIC</option>
						<option value="MACQ" <?php if ($details['Undergraduate-university-name'] == "MACQ") echo "selected='selected'";?>>Macquarie University - NSW</option>
						<option value="MON" <?php if ($details['Undergraduate-university-name'] == "MON") echo "selected='selected'";?>>Monash University - Vic</option>
						<option value="UA" <?php if ($details['Undergraduate-university-name'] == "UA") echo "selected='selected'";?>>University of Adelaide</option>
						<option value="UM" <?php if ($details['Undergraduate-university-name'] == "UM") echo "selected='selected'";?>>University of Melbourne - Vic</option>
						<option value="UNC" <?php if ($details['Undergraduate-university-name'] == "UNC") echo "selected='selected'";?>>University of Newcastle - NSW</option>
						<option value="UND" <?php if ($details['Undergraduate-university-name'] == "UND") echo "selected='selected'";?>>University of Notre Dam - WA</option>
						<option value="UQ" <?php if ($details['Undergraduate-university-name'] == "UQ") echo "selected='selected'";?>>University of Qld</option>
						<option value="USA" <?php if ($details['Undergraduate-university-name'] == "USA") echo "selected='selected'";?>>University of South Australia</option>
						<option value="US" <?php if ($details['Undergraduate-university-name'] == "UTS") echo "selected='selected'";?>>University of Sydney - NSW</option>
						<option value="UTS" <?php if ($details['Undergraduate-university-name'] == "UTS") echo "selected='selected'";?>>University of Technology Sydney</option>
						<option value="UWA" <?php if ($details['Undergraduate-university-name'] == "UWA") echo "selected='selected'";?>>University of Western Australia</option>
						<option value="UWS" <?php if ($details['Undergraduate-university-name'] == "UWS") echo "selected='selected'";?>>University of Western Sydney- NSW</option>
						<option value="WAIT" <?php if ($details['Undergraduate-university-name'] == "WAIT") echo "selected='selected'";?>>Western Australian Institute of Technology</option>
						<option value="Other">Other</option>
					</select>
					<input type="text" class="form-control display-none" name="Undergraduate-university-name-other" id="Undergraduate-university-name-other">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
					<label for="ugraduate-country">Country<span class="tipstyle">*</span></label>
					<select class="form-control" id="Ugraduate-country" name="Ugraduate-country">
							<?php 
							$countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
							$country=json_decode($countrycode, true);
							foreach($country  as $key => $value){
								echo '<option value="'.$country[$key]['ID'].'"';
								if ($details['Ugraduate-country'] == $country[$key]['ID']){ echo "selected='selected'"; } 
								echo '> '.$country[$key]['Country'].' </option>';
								
							}
							?>
					</select>
					
				</div>
                <div class="col-lg-2">
					<label for="ugraduate-year-attained">Year attained<span class="tipstyle">*</span></label>
					<select class="form-control" name="Ugraduate-year-attained" id="Ugraduate-year-attained">
					<?php 
					    $y = date("Y") + 15; 
					    for ($i=1940; $i<= $y; $i++){
							echo '<option value="'.$i.'"';
						if ($details['Ugraduate-year-attained'] == $i){
								echo 'selected="selected"';
						}
						echo '>'.$i.'</option>';
						}
								 
					?>
					</select>
				</div>
            </div>
            <div class="row">
				<div class="col-lg-6">
					<label for="pdegree">Postgraduate degree</label>
					<select name="Pdegree" id="Pdegree">
						<option <?php if (empty($details['Pdegree'])) echo "selected='selected'";?> value="">(None)</option>
						<option value="1" <?php if ($details['Pdegree'] == "1") echo "selected='selected'";?>>Doctor of Physiotherapy</option>
						<option value="2" <?php if ($details['Pdegree'] == "2") echo "selected='selected'";?>>Master of Physiotherapy</option>
						<option value="3" <?php if ($details['Pdegree'] == "3") echo "selected='selected'";?>>Master of Physiotherapy Practice</option>
						<option value="4" <?php if ($details['Pdegree'] == "4") echo "selected='selected'";?>>Master of Physiotherapy (Graduate Entry)</option>
						<option value="5" <?php if ($details['Pdegree'] == "5") echo "selected='selected'";?>>Master of Physiotherapy Studies</option>
					</select>
				</div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <label for="postgraduate-university-name">Postgraduate university name</label>
				    <select name="Postgraduate-university-name" id="Postgraduate-university-name">
						<option value="" <?php if (empty($details['Undergraduate-university-name'])) echo "selected='selected'";?>>(None)</option>
						<option value="ACU" <?php if ($details['Undergraduate-university-name'] == "ACU") echo "selected='selected'";?>>Australian Catholic University - NSW</option>
						<option value="ACUQ" <?php if ($details['Undergraduate-university-name'] == "ACUQ") echo "selected='selected'";?>>Australian Catholic University - QLD</option>
						<option value="ACUB" <?php if ($details['Undergraduate-university-name'] == "ACUB") echo "selected='selected'";?>>Australlian Catholic University - Ballarat</option>
						<option value="BON" <?php if ($details['Undergraduate-university-name'] == "BON") echo "selected='selected'";?>>Bond University - QLD</option>
						<option value="CU" <?php if ($details['Undergraduate-university-name'] == "CU") echo "selected='selected'";?>>Canberra University</option>
						<option value="CQU" <?php if ($details['Undergraduate-university-name'] == "CQU") echo "selected='selected'";?>>Central Qld University</option>
						<option value="CSU" <?php if ($details['Undergraduate-university-name'] == "CSU") echo "selected='selected'";?>>Charles Sturt University - Albury NSW</option>
						<option value="CSUO" <?php if ($details['Undergraduate-university-name'] == "CSUO") echo "selected='selected'";?>>Charles Sturt University - Orange NSW</option>
						<option value="CSUP" <?php if ($details['Undergraduate-university-name'] == "CSUP") echo "selected='selected'";?>>Charles Sturt University Port Macquarie</option>
						<option value="CUMB" <?php if ($details['Undergraduate-university-name'] == "CUMB") echo "selected='selected'";?>>Cumberland University - NSW</option>
						<option value="CUR" <?php if ($details['Undergraduate-university-name'] == "CUR") echo "selected='selected'";?>>Curtin University - WA</option>
						<option value="ECU" <?php if ($details['Undergraduate-university-name'] == "ECU") echo "selected='selected'";?>>Edith Cowan University - WA</option>
						<option value="FLIN" <?php if ($details['Undergraduate-university-name'] == "FLIN") echo "selected='selected'";?>>Flinders University SA</option>
						<option value="GRIF" <?php if ($details['Undergraduate-university-name'] == "GRIF") echo "selected='selected'";?>>Griffith University - Gold coast QLD</option>
						<option value="JCU" <?php if ($details['Undergraduate-university-name'] == "JCU") echo "selected='selected'";?>>James Cook University - QLD</option>
						<option value="LAT" <?php if ($details['Undergraduate-university-name'] == "LAT") echo "selected='selected'";?>>Latrobe University - Bundoora VIC</option>
						<option value="LATB" <?php if ($details['Undergraduate-university-name'] == "LATB") echo "selected='selected'";?>>Latrobe Universtiy - Bendigo VIC</option>
						<option value="LIN" <?php if ($details['Undergraduate-university-name'] == "LIN") echo "selected='selected'";?>>Lincoln Institute - VIC</option>
						<option value="MACQ" <?php if ($details['Undergraduate-university-name'] == "MACQ") echo "selected='selected'";?>>Macquarie University - NSW</option>
						<option value="MON" <?php if ($details['Undergraduate-university-name'] == "MON") echo "selected='selected'";?>>Monash University - Vic</option>
						<option value="UA" <?php if ($details['Undergraduate-university-name'] == "UA") echo "selected='selected'";?>>University of Adelaide</option>
						<option value="UM" <?php if ($details['Undergraduate-university-name'] == "UM") echo "selected='selected'";?>>University of Melbourne - Vic</option>
						<option value="UNC" <?php if ($details['Undergraduate-university-name'] == "UNC") echo "selected='selected'";?>>University of Newcastle - NSW</option>
						<option value="UND" <?php if ($details['Undergraduate-university-name'] == "UND") echo "selected='selected'";?>>University of Notre Dam - WA</option>
						<option value="UQ" <?php if ($details['Undergraduate-university-name'] == "UQ") echo "selected='selected'";?>>University of Qld</option>
						<option value="USA" <?php if ($details['Undergraduate-university-name'] == "USA") echo "selected='selected'";?>>University of South Australia</option>
						<option value="US" <?php if ($details['Undergraduate-university-name'] == "UTS") echo "selected='selected'";?>>University of Sydney - NSW</option>
						<option value="UTS" <?php if ($details['Undergraduate-university-name'] == "UTS") echo "selected='selected'";?>>University of Technology Sydney</option>
						<option value="UWA" <?php if ($details['Undergraduate-university-name'] == "UWA") echo "selected='selected'";?>>University of Western Australia</option>
						<option value="UWS" <?php if ($details['Undergraduate-university-name'] == "UWS") echo "selected='selected'";?>>University of Western Sydney- NSW</option>
						<option value="WAIT" <?php if ($details['Undergraduate-university-name'] == "WAIT") echo "selected='selected'";?>>Western Australian Institute of Technology</option>
						<option value="Other">Other</option>
					</select>
					<input type="text" class="form-control display-none" name="Postgraduate-university-name-other" id="Postgraduate-university-name-other">
                </div>
            </div>
            <div class="row">
				<div class="col-lg-4">
					<label for="pgraduate-country">Country</label>
					<select class="form-control" id="Pgraduate-country" name="Pgraduate-country">
							<?php 
							$countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
							$country=json_decode($countrycode, true);
							foreach($country  as $key => $value){
								echo '<option value="'.$country[$key]['ID'].'"';
								if ($details['Pgraduate-country'] == $country[$key]['ID']){ echo "selected='selected'"; } 
								echo '> '.$country[$key]['Country'].' </option>';
								
							}
							?>
					</select>
				</div>
                <div class="col-lg-2">
					<label for="pgraduate-year-attained">Year attained</label>
					<select class="form-control" name="Pgraduate-year-attained" id="Pgraduate-year-attained">
					    <?php 
							  $y = date("Y") + 15; 
							  for ($i=1940; $i<= $y; $i++){
								echo '<option value="'.$i.'"';
								if ($details['Pgraduate-year-attained'] == $i){
										echo 'selected="selected"';
								}
								echo '>'.$i.'</option>';
							  }
								 
						?>
					</select>
				</div>
            </div>
		    <div class="row">
			    <div class="col-lg-6">
					<label for="Additional-qualifications">Additional qualifications<a class="add-additional-qualification"><span class="dashboard-button-name">Add qualification</span></a></label>
					<input type="hidden" id="addtionalNumber" name="addtionalNumber" value="<?php  $addtionalNumber =  sizeof($details['Additional-qualifications']); echo  $addtionalNumber; ?>"/>			
				</div>
			</div>
			<div id="additional-qualifications-block">
				<?php foreach($details['Additional-qualifications'] as $key => $value) :?>
					<div id="additional<?php echo $key;?>">
						<div class="row">
							<div class="col-lg-6">
								<label for="degree<?php echo $key;?>">Degree<span class="tipstyle">*</span></label>
								<select name="degree<?php echo $key;?>" id="degree<?php echo $key;?>">
									<option <?php if (empty($details['Additional-qualifications'][$key]['degree'])) echo "selected='selected'";?> selected disabled>(None)</option>
									<option value="1" <?php if ($details['Additional-qualifications'][$key]['degree'] == "1") echo "selected='selected'";?>>Bachelor of Physiotherapy</option>
									<option value="2" <?php if ($details['Additional-qualifications'][$key]['degree'] == "2") echo "selected='selected'";?>>Bachelor of Physiotherapy (Hons)</option>
									<option value="3" <?php if ($details['Additional-qualifications'][$key]['degree'] == "3") echo "selected='selected'";?>>Bachelor of Physiotherapy (Honours)</option>
									<option value="4" <?php if ($details['Additional-qualifications'][$key]['degree'] == "4") echo "selected='selected'";?>>Bachelor of Science (Physiotherapy)</option>
									<option value="5" <?php if ($details['Additional-qualifications'][$key]['degree'] == "5") echo "selected='selected'";?>>Bachelor of Science (Physiotherapy) (Honours)</option>
									<option value="6" <?php if ($details['Additional-qualifications'][$key]['degree'] == "6") echo "selected='selected'";?>>Bachelor of Applied Science and Master of Physiotherapy Practice</option>
									<option value="7" <?php if ($details['Additional-qualifications'][$key]['degree'] == "7") echo "selected='selected'";?>>Bachelor of Applied Science (Physiotherapy)</option>
									<option value="8" <?php if ($details['Additional-qualifications'][$key]['degree'] == "8") echo "selected='selected'";?>>Bachelor of Applied Science (Physiotherapy) (Honours)</option>
									<option value="Other" <?php if ($details['Additional-qualifications'][$key]['degree'] == "Other") echo "selected='selected'";?>>Other</option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<label for="university-name<?php echo $key;?>">University name<span class="tipstyle">*</span></label>
								<select name="university-name<?php echo $key;?>" id="university-name<?php echo $key;?>">
									<option <?php if (empty($details['Additional-qualifications'][$key]['university-name'])) echo "selected='selected'";?> selected disabled>(None)</option>
									<option value="ACU" <?php if ($details['Additional-qualifications'][$key]['university-name'] == "ACU") echo "selected='selected'";?>>Australian Catholic University - NSW</option>
									<option value="ACUQ" <?php if ($details['Additional-qualifications'][$key]['university-name'] == "ACUQ") echo "selected='selected'";?>>Australian Catholic University - QLD</option>
									<option value="ACUB" <?php if ($details['Additional-qualifications'][$key]['university-name'] == "ACUB") echo "selected='selected'";?>>Australlian Catholic University - Ballarat</option>
									<option value="BON" <?php if ($details['Additional-qualifications'][$key]['university-name'] == "BON") echo "selected='selected'";?>>Bond University - QLD</option>
									<option value="CU" <?php if ($details['Additional-qualifications'][$key]['university-name'] == "CU") echo "selected='selected'";?>>Canberra University</option>
									<option value="CQU" <?php if ($details['Additional-qualifications'][$key]['university-name'] == "CQU") echo "selected='selected'";?>>Central Qld University</option>
									<option value="CSU" <?php if ($details['Additional-qualifications'][$key]['university-name'] == "CSU") echo "selected='selected'";?>>Charles Sturt University - Albury NSW</option>
									<option value="CSUO" <?php if ($details['Additional-qualifications'][$key]['university-name'] == "CSUO") echo "selected='selected'";?>>Charles Sturt University - Orange NSW</option>
									<option value="CSUP" <?php if ($details['Additional-qualifications'][$key]['university-name'] == "CSUP") echo "selected='selected'";?>>Charles Sturt University Port Macquarie</option>
									<option value="CUMB" <?php if ($details['Additional-qualifications'][$key]['university-name'] == "CUMB") echo "selected='selected'";?>>Cumberland University - NSW</option>
									<option value="CUR" <?php if ($details['Additional-qualifications'][$key]['university-name'] == "CUR") echo "selected='selected'";?>>Curtin University - WA</option>
									<option value="ECU" <?php if ($details['Additional-qualifications'][$key]['university-name'] == "ECU") echo "selected='selected'";?>>Edith Cowan University - WA</option>
									<option value="FLIN" <?php if ($details['Additional-qualifications'][$key]['university-name'] == "FLIN") echo "selected='selected'";?>>Flinders University SA</option>
									<option value="GRIF" <?php if ($details['Additional-qualifications'][$key]['university-name'] == "GRIF") echo "selected='selected'";?>>Griffith University - Gold coast QLD</option>
									<option value="JCU" <?php if ($details['Additional-qualifications'][$key]['university-name'] == "JCU") echo "selected='selected'";?>>James Cook University - QLD</option>
									<option value="LAT" <?php if ($details['Additional-qualifications'][$key]['university-name'] == "ACUQ") echo "selected='selected'";?>>Latrobe University - Bundoora VIC</option>
									<option value="LATB" <?php if ($details['Additional-qualifications'][$key]['university-name'] == "LATB") echo "selected='selected'";?>>Latrobe Universtiy - Bendigo VIC</option>
									<option value="LIN" <?php if ($details['Additional-qualifications'][$key]['university-name'] == "LIN") echo "selected='selected'";?>>Lincoln Institute - VIC</option>
									<option value="MACQ" <?php if ($details['Additional-qualifications'][$key]['university-name'] == "MACQ") echo "selected='selected'";?>>Macquarie University - NSW</option>
									<option value="MON" <?php if ($details['Additional-qualifications'][$key]['university-name'] == "MON") echo "selected='selected'";?>>Monash University - Vic</option>
									<option value="UA" <?php if ($details['Additional-qualifications'][$key]['university-name'] == "UA") echo "selected='selected'";?>>University of Adelaide</option>
									<option value="UM" <?php if ($details['Additional-qualifications'][$key]['university-name'] == "UM") echo "selected='selected'";?>>University of Melbourne - Vic</option>
									<option value="UNC" <?php if ($details['Additional-qualifications'][$key]['university-name'] == "UNC") echo "selected='selected'";?>>University of Newcastle - NSW</option>
									<option value="UND" <?php if ($details['Additional-qualifications'][$key]['university-name'] == "UND") echo "selected='selected'";?>>University of Notre Dam - WA</option>
									<option value="UQ" <?php if ($details['Additional-qualifications'][$key]['university-name'] == "UQ") echo "selected='selected'";?>>University of Qld</option>
									<option value="USA" <?php if ($details['Additional-qualifications'][$key]['university-name'] == "USA") echo "selected='selected'";?>>University of South Australia</option>
									<option value="US" <?php if ($details['Additional-qualifications'][$key]['university-name'] == "US") echo "selected='selected'";?>>University of Sydney - NSW</option>
									<option value="UTS" <?php if ($details['Additional-qualifications'][$key]['university-name'] == "UTS") echo "selected='selected'";?>>University of Technology Sydney</option>
									<option value="UWA" <?php if ($details['Additional-qualifications'][$key]['university-name'] == "UWA") echo "selected='selected'";?>>University of Western Australia</option>
									<option value="UWS" <?php if ($details['Additional-qualifications'][$key]['university-name'] == "UWS") echo "selected='selected'";?>>University of Western Sydney- NSW</option>
									<option value="WAIT" <?php if ($details['Additional-qualifications'][$key]['university-name'] == "WAIT") echo "selected='selected'";?>>Western Australian Institute of Technology</option>
									<option value="Other" <?php if ($details['Additional-qualifications'][$key]['university-name'] == "Other") echo "selected='selected'";?>>Other</option>
								</select>
								<input type="text" class="form-control display-none" name="Undergraduate-university-name-other<?php echo $key;?>" id="Undergraduate-university-name-other<?php echo $key;?>">
							</div>
						</div>
						<div class="row">
							<div class="col-lg-4">
								<label for="additional-country<?php echo $key;?>">Country<span class="tipstyle">*</span></label>
								<select class="form-control" id="additional-country<?php echo $key;?>" name="additional-country<?php echo $key;?>">
								<?php 
								$countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
								$country=json_decode($countrycode, true);
								foreach($country  as $pair => $value){
									echo '<option value="'.$country[$pair]['ID'].'"';
									if ($details['Additional-qualifications'][$key]['additional-country'] == $country[$pair]['ID']){ echo "selected='selected'"; } 
									echo '> '.$country[$pair]['Country'].' </option>';
									
								}
								?>
								</select>
							</div>
							<div class="col-lg-2">
								<label for="additional-year-attained<?php echo $key;?>">Year attained<span class="tipstyle">*</span></label>
								<select class="form-control" name="additional-year-attained<?php echo $key;?>" id="additional-year-attained<?php echo $key;?>">
								<?php 
								$y = date("Y") + 15; 
								for ($i=1940; $i<= $y; $i++){
								echo '<option value="'.$i.'"';
								if ($details['Additional-qualifications'][$key]['additional-year-attained'] == $i){
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
			
		    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">  <a href="javascript:document.getElementById('your-detail-form').submit();" class="join-details-button4"><span class="dashboard-button-name">Next</span></a><a class="your-details-prevbutton4"><span class="dashboard-button-name">Last</span></a></div>
        </div>
               
</form>   
<?php endif; ?>
<?php  if(!isset($_SESSION['UserId'])):  ?>
    <form id="your-detail-form" action="jointheapa" method="POST">
		<input type="hidden" name="step1" value="1"/>
		<input type="hidden" name="insuranceTag" id="insuranceTag"/>
            <div class="down1" <?php if(isset($_POST['step1']) || isset($_POST['step2'])|| isset($_POST['step2-1'])|| isset($_POST['goI']) || isset($_POST['goP']))echo 'style="display:none;"'; else { echo 'style="display:block;"';}?>>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 none-padding">
                    <div class="row">
                        <div class="col-lg-3">
				            <label for="prefix">Prefix<span class="tipstyle">*</span></label>
							<?php 
							$Prefixcode  = file_get_contents("sites/all/themes/evolve/json/Prefix.json");
							$Prefix=json_decode($Prefixcode, true);
							?>
                            <select class="form-control" id="Prefix" name="Prefix">
							<?php 
							foreach($Prefix  as $key => $value){
								echo '<option value="'.$Prefix[$key]['ID'].'"';
								echo '> '.$Prefix[$key]['Prefix'].' </option>';
							}
							?>
							</select>
                        </div>
						
                        <div class="col-lg-3">
                           <label for="">First name<span class="tipstyle">*</span></label>
                           <input type="text" class="form-control"  name="Firstname">
                        </div>
						<div class="col-lg-3">
                           <label for="">preferred name</label>
                           <input type="text" class="form-control"  name="Preferred-name">
                        </div>
                        <div class="col-lg-3">
                           <label for="">Middle name</label>
                           <input type="text" class="form-control" name="Middle-name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                           <label for="">Maiden name</label>
                           <input type="text" class="form-control" name="Maiden-name">
                        </div>
                        <div class="col-lg-6">
                           <label for="">Last name<span class="tipstyle">*</span></label>
                           <input type="text" class="form-control" name="Lastname">
                        </div>
                     </div>
                    <div class="row">
                        <div class="col-lg-4">
                           <label for="">Birth Date<span class="tipstyle">*</span></label>
                           <input type="date" class="form-control" name="Birth">
                        </div>
                        <div class="col-lg-3 col-lg-offset-1">
                           <label for="">Gender<span class="tipstyle">*</span></label>
                           <select class="form-control" id="Gender" name="Gender">
                              <option value="" disabled> Gender </option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                              <option value="other">I’d prefer not to say</option>
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
										echo '<option value="'.$country[$key]['ID'].'"';
										echo '> '.$country[$key]['Country'].' </option>';
									}
								?>
								</select>
							</div>
							<div class="col-lg-2">
								<label for="">Area code</label>
								<input type="text" class="form-control" name="area-code" pattern="[0-9]{10}">
							</div>
							<div class="col-lg-4">
								<label for="">Phone number</label>
								<input type="text" class="form-control" name="phone-number" pattern="[0-9]{10}">
							</div>
							
						</div>
						<div class="row">
							
							<div class="col-lg-2">
								<label for="">Country code</label>
								<select class="form-control" id="Mobile-countrycode" name="Mobile-countrycode">
								<?php
									$countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
									$country=json_decode($countrycode, true);						
									foreach($country  as $key => $value){
										echo '<option value="'.$country[$key]['ID'].'"';
										echo '> '.$country[$key]['Country'].' </option>';
									}
								?>
								</select>
							</div>
							<div class="col-lg-2">
								<label for="">Area code</label>
								<input type="text" class="form-control" name="Mobile-areacode"  pattern="[0-9]{10}">
							</div>
							<div class="col-lg-4">
								<label for="">Mobile number</label>
								<input type="text" class="form-control" name="phone-number"  pattern="[0-9]{10}">
							</div>
							
					</div>
					<div class="row">
						<div class="col-lg-9">
						Aboriginal and Torres Strait Islander origin<span class="tipstyle">*</span>
						</div>
						<div class="col-lg-3">
							<select class="form-control" id="Aboriginal" name="Aboriginal">
								<option value="">No</option>
								<option value="AB">Yes, Aboriginal </option>
								<option value="TSI">Yes, Torres Strait Islander </option>
								<option value="BOTH">Yes, both Aboriginal and Torres Strait Islander</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">Residential address:</div>
					</div>
					<div class="row">
						<div class="col-lg-4">
							<label for="">Building name</label>
							<input type="text" class="form-control"  name="BuildingName">
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4">
						<label for="">Address line 1<span class="tipstyle">*</span></label>
						<input type="text" class="form-control"  name="Address_Line_1" id="Address_Line_1">
						</div>
						<div class="col-lg-6 col-lg-offset-2">
						<label for="">PO box</label>
						<input type="text" class="form-control" name="Pobox">
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<label for="">Address Line 2<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Address_Line_2" id="Address_Line_2">
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<label for="">City or town<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Suburb" id="Suburb">
						</div>
					</div>
					<div class="row">
						<div class="col-lg-3">
							<label for="">Postcode<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Postcode" id="Postcode">
						</div>
						<div class="col-lg-3">
							<label for="">State<span class="tipstyle">*</span></label>
							<select class="form-control" id="State" name="State">
								<option value="" selected disabled> State </option>
								<?php 
								$statecode  = file_get_contents("sites/all/themes/evolve/json/State.json");
								$State=json_decode($statecode, true);
								foreach($State  as $key => $value){
								echo '<option value="'.$State[$key]['ID'].'"';
							    echo '> '.$State[$key]['Abbreviation'].' </option>';
							
								}
								?>
							</select>
						</div>
						<div class="col-lg-6">
							<label for="">Country<span class="tipstyle">*</span></label>
							<select class="form-control" id="Country" name="Country">
							<?php 
							$countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
							$country=json_decode($countrycode, true);
							foreach($country  as $key => $value){
								echo '<option value="'.$country[$key]['ID'].'"';
								echo '> '.$country[$key]['Country'].' </option>';
								
							}
							?>
					        </select>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12"><label for="Shipping-address-join"><strong>Billing address:(Sames as Above address)</strong></label><input type="checkbox" id="Shipping-address-join" name="Shipping-address-join" value="1" checked></div>
					</div>
                <div class="row shipping" id="shippingAddress">
					<div class="row">
						<div class="col-lg-4">
							<label for="">Building name</label>
							<input type="text" class="form-control"  name="Billing-BuildingName">
						</div>
						<div class="col-lg-6 col-lg-offset-2">
							<label for="">PO box</label>
							<input type="text" class="form-control" name="Billing-PObox" id="Billing-PObox">
						</div>
					</div>
					    <div class="col-lg-4">
                           <label for="">Address Line 1<span class="tipstyle">*</span></label>
                           <input type="text" class="form-control"  name="Billing-Address_Line_1" id="Billing-Address_Line_1">
                        </div>
                        <div class="col-lg-12">
                           <label for="">Address Line 2</label>
                           <input type="text" class="form-control" name="Billing-Address_Line_2" id="Billing-Address_Line_2">
                        </div>
						<div class="col-lg-12">
                           <label for="">City or town</label>
                           <input type="text" class="form-control" name="Billing-Suburb" id="Billing-Suburb">
                        </div>
                        <div class="col-lg-3">
                           <label for="">Postcode</label>
                           <input type="text" class="form-control" name="Billing-Postcode" id="Billing-Postcode">
                        </div>
                        <div class="col-lg-3">
                           <label for="">State</label>
                           <select class="form-control" name="Billing-State" id="Billing-State">
								<option value=""  disabled> State </option>
								<?php 
								$statecode  = file_get_contents("sites/all/themes/evolve/json/State.json");
								$State=json_decode($statecode, true);
								foreach($State  as $key => $value){
								echo '<option value="'.$State[$key]['ID'].'"';
							    echo '> '.$State[$key]['Abbreviation'].' </option>';
							
								}
								?>
                           </select>
                        </div>
                        <div class="col-lg-6">
                           <label for="">Country</label>
                           	<select class="form-control" id="Billing-Country" name="Billing-Country">
							<?php 
							$countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
							$country=json_decode($countrycode, true);
							foreach($country  as $key => $value){
								echo '<option value="'.$country[$key]['ID'].'"';
								echo '> '.$country[$key]['Country'].' </option>';
								
							}
							?>
					        </select>
                        </div>
                    </div>
					 <!---Hidden mailing address and shipping address Start from here-->
					   <input type="hidden" name="Shipping-BuildingName" value="">
					   <input type="hidden" name="Shipping-Address_Line_1" value="">
					   <input type="hidden" name="Shipping-Address_Line_2" value="">
					   <input type="hidden" name="Shipping-PObox" value="">
					   <input type="hidden" name="Shipping-city-town" value="">
					   <input type="hidden" name="Shipping-postcode" value="">
					   <input type="hidden" name="Shipping-state" value="">
					   <input type="hidden" name="Shipping-country" value="">
					   <input type="hidden" name="Mailing-BuildingName" value="">
					   <input type="hidden" name="Mailing-Address_Line_1" value="">
					   <input type="hidden" name="Mailing-Address_Line_2" value="">
					   <input type="hidden" name="Mailing-PObox" value="">
					   <input type="hidden" name="Mailing-city-town" value="">
					   <input type="hidden" name="Mailing-postcode" value="">
					   <input type="hidden" name="Mailing-state" value="">
					   <input type="hidden" name="Mailing-country" value="">
			        <!---Hidden mailing address and shipping address End here-->
				</div>
                 <!-- <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 form-right">
                     <div class="row form-image">
                        <div class="col-lg-12">
						Upload/change image
                           <form id ="upload-Image-Form" action="jointheapa" method="post" enctype="multipart/form-data">
                           Upload/change image
                           <input type="file" name="fileToUpload" id="fileToUpload">
						   <input type="hidden" name="uploadeIamge">
                         
						   <a href="javascript:document.getElementById('upload-Image-Form').submit();" class="uploadImageButton">Upload Image</a>
                           </form>
						   
						   
                        </div>
                     </div>
                                               
                  </div>-->
				  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">   <a class="join-details-button1"><span class="dashboard-button-name">Next</span></a></div>
            </div>
			<div class="down2" style="display:none;" >
				<div class="row">
					<div class="col-lg-6">
						<label for="">Member ID(Your email address)<span class="tipstyle">*</span></label>
						<input type="text" class="form-control" name="Memberid" id="Memberid" value="" onchange="checkEmailFunction(this.value)">
					<div id="checkMessage"></div>
					<script>
					function checkEmailFunction(email) {
					$.ajax({
					url:"sites/all/themes/evolve/inc/jointheAPA/jointheAPA-checkEmail.php", 
					type: "POST", 
					data: {CheckEmailID: email},
					success:function(response) { 
					var result = response;
					if(result=="T"){
						$('#checkMessage').html("this email address has already registered, please use another one");
						$( "#Memberid" ).focus();
						$("#Memberid").css("border", "1px solid red");
						$(".join-details-button2").addClass("display-none");
						
					}
                    else{
						$('#checkMessage').html("");
						$( "#Memberid" ).blur();
						$("#Memberid").css("border", "");
						$(".join-details-button2").removeClass("display-none");
					}					
					}
					});
					}
					</script>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<label for="">Your password<span class="tipstyle">*</span></label>
						<input type="password" class="form-control" id="newPassword" name="newPassword">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<label for="">Confirm password<span class="tipstyle">*</span></label>
						<input type="password" class="form-control" id="Password" name="Password" value="" onchange="checkPasswordFunction(this.value)">
					</div>
				</div>
				<div id="checkPasswordMessage"></div>
				<script>
					function checkPasswordFunction(Password) {
						if($('#newPassword').val()!= Password){
							$('#checkPasswordMessage').html("Please confirm your password is same");
							$( "#Password" ).focus();
							$("#Password").css("border", "1px solid red");
							$(".join-details-button2").addClass("display-none");
							
						}
						else{
							$('#checkPasswordMessage').html("");
							$( "#Password" ).blur();
							$("#Password").css("border", "");
							$(".join-details-button2").removeClass("display-none");
						}					
					}
					</script>
				<div class="row">
					<div class="col-lg-6">
						<label for="">Member Type<span class="tipstyle">*</span></label>
						<select class="form-control" id="MemberType" name="MemberType">
							<option value="none" selected disabled>memberType</option>
							<?php 
							$MemberTypecode  = file_get_contents("sites/all/themes/evolve/json/MemberType.json");
							$MemberType=json_decode($MemberTypecode, true);
							foreach($MemberType  as $key => $value){
								echo '<option value="'.$MemberType[$key]['ID'].'"';
								echo '> '.$MemberType[$key]['Name'].' </option>';
							}
							?>
						</select>
					</div>
				</div>
				<div class="row" id="ahpblock">
					<div class="col-lg-2">
						<label for="">AHPRA number</label>
						<input type="text" class="form-control" name="Ahpranumber"  <?php if (empty($details['Ahpranumber'])) {echo "placeholder='AHPRA number'";}   else{ echo 'value="'.$details['Ahpranumber'].'"'; }?>>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-2">
						<label for="">Specialty</label>
						<input type="text" class="form-control" name="Specialty">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<label for="">Your National group</label>
						<select class="chosen-select" id="Nationalgp" name="Nationalgp[]" multiple>
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
						   echo '> '.$nationalGroups[$key]["Name"].' </option>';
						}
					    ?>
						</select>
					</div>
					<div class="col-lg-3 display-none" id="ngsports"><label for="ngsportsbox">Would you like to subscribe to the APA SportsPhysio magazine?</label><input type="checkbox" id="ngsportsbox" name="ngsports" value="0"></div>
					<div class="col-lg-3 display-none" id="ngmusculo"><label for="ngmusculobox">Would you like to subscribe to the APA InTouch magazine?</label><input type="checkbox" id="ngmusculobox" name="ngmusculo" value="0"></div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<label for="">What branch would you like to join?<span class="tipstyle">*</span></label>
						<select class="form-control" id="Branch" name="Branch">
							<option value="" selected disabled>What branch would you like to join?</option>
							<?php 
								//$statecode  = file_get_contents("sites/all/themes/evolve/json/State.json");
								//$State=json_decode($statecode, true);
								//foreach($State  as $key => $value){
								//echo '<option value="'.$State[$key]['ID'].'"';
							   // echo '> '.$State[$key]['Abbreviation'].' </option>';
							
								//}
							?>
							<option value="73"> ACT </option>
							<option value="74"> NSW </option>
							<option value="77"> SA </option>
							<option value="78"> TAS </option>
							<option value="79"> VIC </option>
							<option value="76"> QLD </option>
							<option value="75"> NT </option>
							<option value="80"> WA </option>
						</select>
					</div>
				</div>
				<div class="row"> 
					<div class="col-lg-3">
					Your special interest area:
					</div>
					<div class="col-lg-6">
						<select class="chosen-select" id="SpecialInterest" name="SpecialInterest[]" multiple  tabindex="-1" data-placeholder="Choose interest area...">
						<?php 
							// get interest area from Aptify via webserice return Json data;
							$interestAreascode  = file_get_contents("sites/all/themes/evolve/json/AreaOfInterest__c.json");
				            $interestAreas=json_decode($interestAreascode, true);
                            $_SESSION["interestAreas"] = $interestAreas;							
							?>
							<?php 
							foreach($interestAreas  as $key => $value){
								echo '<option value="'.$interestAreas[$key]["Code"].'"';
								echo '> '.$interestAreas[$key]["Name"].' </option>'; 
							}
						?>
						</select>
					</div>
				</div>
				<div class="row"> 
					<div class="col-lg-3">
					Your treatment area:
					</div>
				</div>
				<div class="row"> 
					<div class="col-lg-6">
						<select class="chosen-select" id="treatment-area" name="Treatmentarea[]" multiple  tabindex="-1" data-placeholder="Choose treatment area...">
						<?php 
							// get interest area from Aptify via webserice return Json data;
							$interestAreascode  = file_get_contents("sites/all/themes/evolve/json/AreaOfInterest__c.json");
				            $interestAreas=json_decode($interestAreascode, true);	
							?>
							<?php 
							foreach($interestAreas  as $key => $value){
								echo '<option value="'.$interestAreas[$key]["Code"].'"';
								echo '> '.$interestAreas[$key]["Name"].' </option>'; 
							}
						?>
						</select>
					</div>
				</div>
				    <div class="row">
				<div class="col-lg-3">What is your favourite languages?<br/></div>
				<div class="col-lg-3">
					<select class="chosen-select" id="MAdditionallanguage" name="MAdditionallanguage" multiple  tabindex="-1" data-placeholder="Choose your favourite language...">
					   <option value="NONE" disabled>no</option>
					   <?php 
						$Languagecode  = file_get_contents("sites/all/themes/evolve/json/Language.json");
						$Language=json_decode($Languagecode, true);
						$_SESSION["Language"] = $Language;
						foreach($Language  as $key => $value){
							echo '<option value="'.$Language[$key]['ID'].'"';
							echo '> '.$Language[$key]['Name'].' </option>';
						}
						?>
					</select>
				</div>
			</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">   <a class="join-details-button2"><span class="dashboard-button-name">Next</span></a><a class="your-details-prevbutton2"><span class="dashboard-button-name">Last</span></a></div>
			</div>
			<?php 
				// 2.2.36 - get workplace settings list
				// Send - 
				// Response - get workplace settings from Aptify via webserice return Json data;
				// stroe workplace settings into the session
				$workplaceSettingscode  = file_get_contents("sites/all/themes/evolve/json/workplaceSettings.json");
				$workplaceSettings=json_decode($workplaceSettingscode, true);	
				$_SESSION["workplaceSettings"] = $workplaceSettings;
			?>
			<div id="wpnumber"><?php  $wpnumber =  0; echo  $wpnumber; ?></div>
			<input type="hidden"  name="wpnumber" value="<?php  $wpnumber =  1; echo  $wpnumber; ?>"/>
			<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".chosen-select").chosen({width: "100%"});
				$('#workplace').click(function(){
				$('#dashboard-right-content').addClass("autoscroll");
				});
				$('.add-workplace-join').click(function(){
					var number = Number($('#wpSquence').text());
					var i = Number(number +1);
					var j = Number(number +2);
					$('div[class="down3"] #tabmenu').append( '<li id="workplaceli'+ i + '"><a data-toggle="tab" href="#workplace'+ i + '">Workplace'+ i+'</a><span class="deletewp'+ i + '" style=" float: right; color: red; margin-right: 55%;">x</span></li>' );
					$('div[id="workplaceblocks"]').append('<div id="workplace'+ i +'" class="tab-pane fade"></div>');
					$('#wpnumber').text(i);
					$('input[name=wpnumber]').val(j);
					var sessionvariable = '<?php echo json_encode($_SESSION["workplaceSettings"]);?>';
					var sessionInterest = '<?php echo json_encode($_SESSION["interestAreas"]);?>';
					var sessionLanguage = '<?php echo json_encode($_SESSION["Language"]);?>';
					$("#workplace"+ i ).load("sites/all/themes/evolve/commonFile/workplace.php", {"count":i,"sessionWorkplaceSetting":sessionvariable, "sessioninterestAreas":sessionInterest, "sessionLanguage":sessionLanguage});
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
			<div class="down3" style="display:none;">
				<div class="row">
					<div class="col-lg-12"> <label for="Findpublicbuddy"><strong>NOTE:</strong>Please list my details in the public (visbile to other health professionals)</label>
						<input type="checkbox" name="Findpublicbuddy" id="Findpublicbuddy" value="">
					</div>
				</div>
			<ul class="nav nav-tabs" id="tabmenu">
			<li class ="active"><a data-toggle="tab" href="#workplace0"><?php echo "Workplace0";?></a></li>
			</ul>
			<div id="workplaceblocks">
				<div id="workplace0" class='tab-pane fade in active'> 
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
						$interestAreas= GetAptifyData("37","request");
						$_SESSION["interestAreas"] = $interestAreas;
						?>
						<?php 
						foreach($interestAreas['InterestAreas']  as $lines){
							echo '<option value="'.$lines["ListCode"].'"';
							echo '> '.$lines["ListName"].' </option>'; 
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
								echo '<option value="'.$State[$key]['ID'].'"';
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
								echo '<option value="'.$country[$key]['ID'].'"';
								echo '> '.$country[$key]['Country'].' </option>';
								
							}
							?>
					    </select>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<label for="Wemail">Workplace email<span class="tipstyle">*</span></label>
						<input type="text" class="form-control" name="Wemail0" id="Wemail0">
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
			</div>
				<div class="row"><div class="col-xs-9 col-sm-9 col-md-9 col-lg-9"><a class="add-workplace-join"><span class="dashboard-button-name">Add workplace</span></a></div></div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">   
				<a class="join-details-button3"><span class="dashboard-button-name">Next</span></a><a class="your-details-prevbutton3"><span class="dashboard-button-name">Last</span></a>
				</div>
			</div>
			<div class="down4" style="display:none;" >
				<div class="row">
					<div class="col-lg-6">
						<label for="Udegree">Undergraduate degree<span class="tipstyle">*</span></label>
						<select  class="form-control" name="Udegree" id="Udegree">
							<option selected="selected" value="">(None)</option>
							<option value="1">Bachelor of Physiotherapy</option>
							<option value="2">Bachelor of Physiotherapy (Hons)</option>
							<option value="3">Bachelor of Physiotherapy (Honours)</option>
							<option value="4">Bachelor of Science (Physiotherapy)</option>
							<option value="5">Bachelor of Science (Physiotherapy) (Honours)</option>
							<option value="6">Bachelor of Applied Science and Master of Physiotherapy Practice</option>
							<option value="7">Bachelor of Applied Science (Physiotherapy)</option>
							<option value="8">Bachelor of Applied Science (Physiotherapy) (Honours)</option>
							<option value="Other">Other</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<label for="undergraduate-university-name">Undergraduate university name<span class="tipstyle">*</span></label>
						<select class="form-control" name="Undergraduate-university-name" id="Undergraduate-university-name">
							<option selected="selected" value="">(None)</option>
							<option value="ACU">Australian Catholic University - NSW</option>
							<option value="ACUQ">Australian Catholic University - QLD</option>
							<option value="ACUB">Australlian Catholic University - Ballarat</option>
							<option value="BON">Bond University - QLD</option>
							<option value="CU">Canberra University</option>
							<option value="CQU">Central Qld University</option>
							<option value="CSU">Charles Sturt University - Albury NSW</option>
							<option value="CSUO">Charles Sturt University - Orange NSW</option>
							<option value="CSUP">Charles Sturt University Port Macquarie</option>
							<option value="CUMB">Cumberland University - NSW</option>
							<option value="CUR">Curtin University - WA</option>
							<option value="ECU">Edith Cowan University - WA</option>
							<option value="FLIN">Flinders University SA</option>
							<option value="GRIF">Griffith University - Gold coast QLD</option>
							<option value="JCU">James Cook University - QLD</option>
							<option value="LAT">Latrobe University - Bundoora VIC</option>
							<option value="LATB">Latrobe Universtiy - Bendigo VIC</option>
							<option value="LIN">Lincoln Institute - VIC</option>
							<option value="MACQ">Macquarie University - NSW</option>
							<option value="MON">Monash University - Vic</option>
							<option value="UA">University of Adelaide</option>
							<option value="UM">University of Melbourne - Vic</option>
							<option value="UNC">University of Newcastle - NSW</option>
							<option value="UND">University of Notre Dam - WA</option>
							<option value="UQ">University of Qld</option>
							<option value="USA">University of South Australia</option>
							<option value="US">University of Sydney - NSW</option>
							<option value="UTS">University of Technology Sydney</option>
							<option value="UWA">University of Western Australia</option>
							<option value="UWS">University of Western Sydney- NSW</option>
							<option value="WAIT">Western Australian Institute of Technology</option>
							<option value="Other">Other</option>
						</select>
						<input type="text" class="form-control display-none" name="Undergraduate-university-name-other" id="Undergraduate-university-name-other">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4">
						<label for="ugraduate-country">Country<span class="tipstyle">*</span></label>
						<select class="form-control" id="Ugraduate-country" name="Ugraduate-country">
							<?php 
							$countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
							$country=json_decode($countrycode, true);
							foreach($country  as $key => $value){
								echo '<option value="'.$country[$key]['ID'].'"';
								echo '> '.$country[$key]['Country'].' </option>';
								
							}
							?>
					    </select>
					</div>
					<div class="col-lg-2">
						<label for="ugraduate-year-attained">Year attained<span class="tipstyle">*</span></label>
						<select class="form-control" name="Ugraduate-year-attained" id="Ugraduate-year-attained">
						<?php 
						$y = date("Y") + 15; 
						for ($i=1940; $i<= $y; $i++){
						echo '<option value="'.$i.'">'.$i.'</option>';  
						}
						?>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<label for="pdegree">Postgraduate degree</label>
						<select class="form-control" name="Pdegree" id="Pdegree">
							<option selected="selected" value="">(None)</option>
							<option value="1">Doctor of Physiotherapy</option>
							<option value="2">Master of Physiotherapy</option>
							<option value="3">Master of Physiotherapy Practice</option>
							<option value="4">Master of Physiotherapy (Graduate Entry)</option>
							<option value="5">Master of Physiotherapy Studies</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<label for="postgraduate-university-name">Postgraduate university name</label>
						<select class="form-control" name="Postgraduate-university-name" id="Postgraduate-university-name">
							<option selected="selected" value="">(None)</option>
							<option value="ACU">Australian Catholic University - NSW</option>
							<option value="ACUQ">Australian Catholic University - QLD</option>
							<option value="ACUB">Australlian Catholic University - Ballarat</option>
							<option value="BON">Bond University - QLD</option>
							<option value="CU">Canberra University</option>
							<option value="CQU">Central Qld University</option>
							<option value="CSU">Charles Sturt University - Albury NSW</option>
							<option value="CSUO">Charles Sturt University - Orange NSW</option>
							<option value="CSUP">Charles Sturt University Port Macquarie</option>
							<option value="CUMB">Cumberland University - NSW</option>
							<option value="CUR">Curtin University - WA</option>
							<option value="ECU">Edith Cowan University - WA</option>
							<option value="FLIN">Flinders University SA</option>
							<option value="GRIF">Griffith University - Gold coast QLD</option>
							<option value="JCU">James Cook University - QLD</option>
							<option value="LAT">Latrobe University - Bundoora VIC</option>
							<option value="LATB">Latrobe Universtiy - Bendigo VIC</option>
							<option value="LIN">Lincoln Institute - VIC</option>
							<option value="MACQ">Macquarie University - NSW</option>
							<option value="MON">Monash University - Vic</option>
							<option value="UA">University of Adelaide</option>
							<option value="UM">University of Melbourne - Vic</option>
							<option value="UNC">University of Newcastle - NSW</option>
							<option value="UND">University of Notre Dam - WA</option>
							<option value="UQ">University of Qld</option>
							<option value="USA">University of South Australia</option>
							<option value="US">University of Sydney - NSW</option>
							<option value="UTS">University of Technology Sydney</option>
							<option value="UWA">University of Western Australia</option>
							<option value="UWS">University of Western Sydney- NSW</option>
							<option value="WAIT">Western Australian Institute of Technology</option>
							<option value="Other">Other</option>
						</select>
					<input type="text" class="form-control display-none" name="Postgraduate-university-name-other" id="Postgraduate-university-name-other">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4">
					<label for="pgraduate-country">Country</label>
					<select class="form-control" id="Pgraduate-country" name="Pgraduate-country">
							<?php 
							$countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
							$country=json_decode($countrycode, true);
							foreach($country  as $key => $value){
								echo '<option value="'.$country[$key]['ID'].'"';
								echo '> '.$country[$key]['Country'].' </option>';
								
							}
							?>
					</select>
				
					</div>
					<div class="col-lg-2">
						<label for="pgraduate-year-attained">Year attained</label>
						<select class="form-control" name="Pgraduate-year-attained" id="Pgraduate-year-attained">
							<?php 
							$y = date("Y"); 
							for ($i=1940; $i<= $y; $i++){
							echo '<option value="'.$i.'">'.$i.'</option>';  
							}
							?>
						</select>
					</div>
				</div>
			   <div class="row">
					<div class="col-lg-6">
						<label for="Additional-qualifications">Additional qualifications<a class="add-additional-qualification"><span class="dashboard-button-name">Add qualification</span></a></label>
						<input type="hidden" id="addtionalNumber" name="addtionalNumber" value="<?php  $addtionalNumber =  1; echo  $addtionalNumber; ?>"/>
					</div>
				</div>
				<div id="additional-qualifications-block0">
					<div class="row">
						<div class="col-lg-6">
							<label for="degree0">Degree<span class="tipstyle">*</span></label>
							<select name="degree0" id="degree0">
								<option selected="selected" value="">(None)</option>
								<option value="1">Bachelor of Physiotherapy</option>
								<option value="2">Bachelor of Physiotherapy (Hons)</option>
								<option value="3">Bachelor of Physiotherapy (Honours)</option>
								<option value="4">Bachelor of Science (Physiotherapy)</option>
								<option value="5">Bachelor of Science (Physiotherapy) (Honours)</option>
								<option value="6">Bachelor of Applied Science and Master of Physiotherapy Practice</option>
								<option value="7">Bachelor of Applied Science (Physiotherapy)</option>
								<option value="8">Bachelor of Applied Science (Physiotherapy) (Honours)</option>
								<option value="Other">Other</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<label for="university-name0">University name<span class="tipstyle">*</span></label>
							<select name="university-name0" id="university-name0">
								<option selected="selected" value="">(None)</option>
								<option value="ACU">Australian Catholic University - NSW</option>
								<option value="ACUQ">Australian Catholic University - QLD</option>
								<option value="ACUB">Australlian Catholic University - Ballarat</option>
								<option value="BON">Bond University - QLD</option>
								<option value="CU">Canberra University</option>
								<option value="CQU">Central Qld University</option>
								<option value="CSU">Charles Sturt University - Albury NSW</option>
								<option value="CSUO">Charles Sturt University - Orange NSW</option>
								<option value="CSUP">Charles Sturt University Port Macquarie</option>
								<option value="CUMB">Cumberland University - NSW</option>
								<option value="CUR">Curtin University - WA</option>
								<option value="ECU">Edith Cowan University - WA</option>
								<option value="FLIN">Flinders University SA</option>
								<option value="GRIF">Griffith University - Gold coast QLD</option>
								<option value="JCU">James Cook University - QLD</option>
								<option value="LAT">Latrobe University - Bundoora VIC</option>
								<option value="LATB">Latrobe Universtiy - Bendigo VIC</option>
								<option value="LIN">Lincoln Institute - VIC</option>
								<option value="MACQ">Macquarie University - NSW</option>
								<option value="MON">Monash University - Vic</option>
								<option value="UA">University of Adelaide</option>
								<option value="UM">University of Melbourne - Vic</option>
								<option value="UNC">University of Newcastle - NSW</option>
								<option value="UND">University of Notre Dam - WA</option>
								<option value="UQ">University of Qld</option>
								<option value="USA">University of South Australia</option>
								<option value="US">University of Sydney - NSW</option>
								<option value="UTS">University of Technology Sydney</option>
								<option value="UWA">University of Western Australia</option>
								<option value="UWS">University of Western Sydney- NSW</option>
								<option value="WAIT">Western Australian Institute of Technology</option>
								<option value="Other">Other</option>
							</select>
							<input type="text" class="form-control display-none" name="Undergraduate-university-name-other" id="Undergraduate-university-name-other">
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4">
							<label for="additional-country0">Country<span class="tipstyle">*</span></label>
							<select class="form-control" id="additional-country0" name="additional-country0">
							<?php 
							$countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
							$country=json_decode($countrycode, true);
							foreach($country  as $key => $value){
								echo '<option value="'.$country[$key]['ID'].'"';
								echo '> '.$country[$key]['Country'].' </option>';
								
							}
							?>
							</select>
						</div>
						<div class="col-lg-2">
							<label for="additional-year-attained0">Year attained<span class="tipstyle">*</span></label>
							<select class="form-control" name="additional-year-attained0" id="additional-year-attained0">
							<?php 
							$y = date("Y"); 
							for ($i=1940; $i<= $y; $i++){
							echo '<option value="'.$i.'">'.$i.'</option>';  
							}
							?>
							</select>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">  <a href="javascript:document.getElementById('your-detail-form').submit();" class="join-details-button4"><span class="dashboard-button-name">Next</span></a><a class="your-details-prevbutton4"><span class="dashboard-button-name">Last</span></a></div>
			</div>
    </form>
<?php endif; ?>			