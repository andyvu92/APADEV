<?php
/**
* @file
* Default theme implementation to display a node.
*
* Available variables:
* - $title: the (sanitized) title of the node.
* - $content: An array of node items. Use render($content) to print them all,
* or print a subset such as render($content['field_example']). Use
* hide($content['field_example']) to temporarily suppress the printing of a
* given element.
* - $user_picture: The node author's picture from user-picture.tpl.php.
* - $date: Formatted creation date. Preprocess functions can reformat it by
* calling format_date() with the desired parameters on the $created variable.
* - $name: Themed username of node author output from theme_username().
* - $node_url: Direct URL of the current node.
* - $display_submitted: Whether submission information should be displayed.
* - $submitted: Submission information created from $name and $date during
* template_preprocess_node().
* - $classes: String of classes that can be used to style contextually through
* CSS. It can be manipulated through the variable $classes_array from
* preprocess functions. The default values can be one or more of the
* following:  
* - node: The current template type; for example, "theming hook".
* - node-[type]: The current node type. For example, if the node is a
* "Blog entry" it would result in "node-blog". Note that the machine
* name will often be in a short form of the human readable label.
* - node-teaser: Nodes in teaser form.
* - node-preview: Nodes in preview mode.
* The following are controlled through the node publishing options.
* - node-promoted: Nodes promoted to the front page.
* - node-sticky: Nodes ordered above other non-sticky nodes in teaser
* listings.
* - node-unpublished: Unpublished nodes visible only to administrators.
* - $title_prefix (array): An array containing additional output populated by
* modules, intended to be displayed in front of the main title tag that
* appears in the template.
* - $title_suffix (array): An array containing additional output populated by
* modules, intended to be displayed after the main title tag that appears in
* the template.
*
* Other variables:
* - $node: Full node object. Contains data that may not be safe.
* - $type: Node type; for example, story, page, blog, etc.
* - $comment_count: Number of comments attached to the node.
* - $uid: User ID of the node author.
* - $created: Time the node was published formatted in Unix timestamp.
* - $classes_array: Array of html class attribute values. It is flattened
* into a string within the variable $classes.
* - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
* teaser listings.
* - $id: Position of the node. Increments each time it's output.
*
* Node status variables:
* - $view_mode: View mode; for example, "full", "teaser".
* - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
* - $page: Flag for the full page state.
* - $promote: Flag for front page promotion state.
* - $sticky: Flags for sticky post setting.
* - $status: Flag for published status.
* - $comment: State of comment settings for the node.
* - $readmore: Flags true if the teaser content of the node cannot hold the
* main body content.
* - $is_front: Flags true when presented in the front page.
* - $logged_in: Flags true when the current user is a logged-in member.
* - $is_admin: Flags true when the current user is an administrator.
*
* Field variables: for each field instance attached to the node a corresponding
* variable is defined; for example, $node->body becomes $body. When needing to
* access a field's raw values, developers/themers are strongly encouraged to
* use these variables. Otherwise they will have to explicitly specify the
* desired field language; for example, $node->body['en'], thus overriding any
* language negotiation rule that was previously applied.
*
* @see template_preprocess()
* @see template_preprocess_node()
* @see template_process()
*
* @ingroup themeable
*/
//1. for create web user

if(isset($_POST['step1'])) {
	$postData = array();
	if(isset($_POST['Firstname'])){ $postData['Firstname'] = $_POST['Firstname']; }
	if(isset($_POST['Lastname'])){ $postData['Lastname'] = $_POST['Lastname']; }
	if(isset($_POST['Prefix'])){ $postData['Prefix'] = $_POST['Prefix']; }
	if(isset($_POST['Birth'])){ $postData['birth'] = str_replace("-","/",$_POST['Birth']); }
	if(isset($_POST['Gender'])){ $postData['Gender'] = $_POST['Gender']; }
	if(isset($_POST['Address_Line_1'])){ $postData['Unit'] = $_POST['Address_Line_1']; }
	if(isset($_POST['Address_Line_2'])){ $postData['Street'] = $_POST['Address_Line_2']; }
	if(isset($_POST['Suburb'])){ $postData['Suburb'] = $_POST['Suburb']; }
	if(isset($_POST['Postcode'])){ $postData['Postcode'] = $_POST['Postcode']; }
	if(isset($_POST['State'])){ $postData['State'] = $_POST['State']; }
	if(isset($_POST['Country'])){ $postData['Country'] = $_POST['Country']; }
	if(isset($_POST['Memberid'])){ $postData['Memberid'] = $_POST['Memberid'];}
	if(isset($_POST['Password'])){ $postData['Password'] = $_POST['Password'];}
	

// for new user join a member call user registeration web service	
$resultdata = GetAptifyData("42", $postData); print_r($resultdata);
//when create user successfully call login web service to login in APA website automatically.
//after login successfully get UserID as well to store on APA shopping cart database
if($resultdata['result']) { 
	$_SESSION["UserName"] = $postData['Memberid'];
	$_SESSION["Password"] = $postData['Password'];
	// call webservice login. Eddy will provide login -process functionality---put code here
	// login sucessful unset session
	loginManager($_SESSION["UserName"], $_SESSION["Password"]);
	unset($_SESSION["UserName"]);
	unset($_SESSION["Password"]);
}
}
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix post large" <?php print $attributes; ?>>
	<section class="post-content">
    
	<?php 
	    $userId = 0;
		if(isset($_POST["Emailaddress"]) && isset($_POST["Password"])) {
			// 2.2.7 - Log-in
			// Send - 
			// User ID, Password
			// Response -
			// N/A.
			$User["ID"] = $_POST["Emailaddress"];
			$User["Password"] = $_POST["Password"];
			$LogIn = GetAptifyData("7", $User);
			// todo
			// once they successfully login, create userID Session
			// and get User's detail data.
			$userId = $LogIn["UserId"];
			$_SESSION["userID"] = $LogIn["UserId"];
			echo $LogIn["TokenId"];
		}
      
	   $user_membertype ="";
	   $Job = "";
       $Professionalbody = "";
       $Professionalinsurance = "";
       $HearaboutAPA = "";
	   $Registrationboard = "";
 	   $Dietary = array();
	  
       /*Get user payment card info webservice from Aptify and then return user payment card information*/
	   $paymentCardList = array("4444","6666");
	   /*Get user data from Aptify and then return user information*/
	   /*
	   "Job":"Osteopath",		  
           "Professionalbody":"1",
		   "Professionalinsurance":"1",
           "HearaboutAPA":"socialmedia",
		   "Registrationboard":"1",
		   */
	   if(isset($_SESSION["userID"])&&($_SESSION["userID"]!=0)){ 
			// ToDo
			// Find "Web user" and place it here!!!
			if(isset($_SESSION["MemberType"])&&$_SESSION["MemberType"] != "") { // if they are member
				// ToDo
				// This is to get "insurance question for member"
				if(isset($_SESSION["MemberType"])&&$_SESSION["MemberType"] != "") {
					// if they have insurance, proceed
				} else {
					// when they don't have insurence, ask them
				}
			} else {
				// ToDo
				// get other PD related questions
				// if the questions hasn't been asked,
				// ask againot
				// if not,
				// skip to shopping cart/next step
			}
	       //$userId=$_SESSION["userID"];
		   
			/* We may use this as "Session" data and won't need to load. */
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
			$userInfo = GetAptifyData("4", "userID"); // #_SESSION["UserID"];
		   
	       $user_membertype = $userInfo['MemberType']; 
		   
           $Job = "Osteopath";
           $Professionalbody = "1";
    	   $Professionalinsurance = "1";
           $HearaboutAPA = "socialmedia";
		   $Registrationboard = "1";
 		   $Dietary = $userInfo['Dietary'];
	   } 
	   /*Validate coupon code from Aptify and then reload the PD detail page*/
	   if(isset($_POST["Couponcode"])){ $Couponcode = $_POST["Couponcode"]; } else { $Couponcode = "";}
	  /* CURL GET to query data from Aptify using $_GET["ID"] & couponcode, and then return Json data as below example*/
       
	$pdArr["PDIDs"] = $_GET["id"];
	
	if(isset($_SESSION["UserId"])) {
		$pdArr["UserID"] = $_SESSION["UserId"];
	}
	/*
	array_push($pdArr, $Couponcode);
	*/
	
	// 2.2.29 - GET event detail
	// Send - 
	// PDID, UserID, Coupon
	// Response -
	// PriceTable(list), Max enrolment, Current enrolment, PD_id,
	// Title, PD type, Presenter bio, Leaning outcomes, Prerequisites
	// Presenters, Time, Start date, End date, Registration closing
	// Where:{Address1, Address2, Address3(if exist), Address4(if exist), City,
	//	state, Postcode}, CPD hours, Cost, Your registration stats
	$pd_detail = GetAptifyData("29", $pdArr);
	print_r($pd_detail);
    $pd_detail = $pd_detail['MeetingDetails'][0];
	$prices = $pd_detail['Pricelist'];
	$pricelistGet = Array();
	foreach($prices as $t) {
		$type = $t['MemberType'];
		$pricelistGet[$type] = $t['Price'];
	}
      /*Save data to local shopping cart database response here*/
    	 $saveShoppingCart = "0";
	   if(isset($_GET['saveShoppingCart'])){ 
	      $saveShoppingCart = "1";
		 
	  }   
	/*Update your detail response here*/
	$updateNonmemberTag = "0";
	if(isset($_GET['updateNonmember'])&&($_GET['updateNonmember']!=0)){ 
		
	}
	// add new user!
	if(isset($_GET['updateNonmember'])&&($_GET['updateNonmember']=="1")){
		
		//$updateNonmemberTag = $_GET['updateNonmember'];
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
	
	
	//---	
	if(isset($_POST['Memberid'])){ $postData['Memberid'] = $_POST['Memberid'];}
	if(isset($_POST['Password'])){ $postData['Password'] = $_POST['Password'];}
	if(isset($_POST['MemberType'])){ $postLocalData['MemberType'] = $_POST['MemberType']; }
	if(isset($_POST['Ahpranumber'])){ $postData['Ahpranumber'] = $_POST['Ahpranumber']; }
	if(isset($_POST['Branch'])){ $postData['Branch'] = $_POST['Branch']; }
	if(isset($_SESSION['Regional-group'])){ $postData['Regional-group'] = $_SESSION['Regional-group']; } else{ $postData['Regional-group'] ="";}
	if(isset($_POST['Nationalgp'])){ $ngData['Nationalgp'] = $_POST['Nationalgp']; }
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
		// 2.2.5 - Member detail - Update
		// Send - 
		// UserID & detail data
		// Response -Update Success message & UserID & detail data
		if(isset($_SESSION['UserId'])){ $testdata = GetAptifyData("5", $postData);  }
		else {
		// for new user join a member call user registeration web service	
			
		$resultdata = GetAptifyData("25", $postData); print_r($resultdata);
		//when create user successfully call login web service to login in APA website automatically.
		//after login successfully get UserID as well to store on APA shopping cart database
		if($resultdata['result'] =="Success") { 
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
		$CreateNewUserPD["Job"] = $_POST["Job"];
		$CreateNewUserPD["Registrationboard"] = $_POST["Registrationboard"];
		$CreateNewUserPD["Professionalinsurance"] = $_POST["Professionalinsurance"];
		$CreateNewUserPD["Professionalbody"] = $_POST["Professionalbody"];
		$CreateNewUserPD["Dietary"] = $_POST["Dietary"];
		$CreateNewUserPD["HearaboutAPA"] = $_POST["HearaboutAPA"];
		$CreateNewUserPD["Membership-product"] = $_POST["Membership-product"];
		$CreateNewUserPD["Pdemails-product"] = $_POST["Pdemails-product"];
		$CreateNewUserPD["Jobs-product"] = $_POST["Jobs-product"];
		$CreateNewUserPD["Shop-product"] = $_POST["Shop-product"];
		$CreateNewUserPD["Campaigns-product"] = $_POST["Campaigns-product"];
		$CreateNewUserPD["Partner-product"] = $_POST["Partner-product"];
		// 2.2.25 - User Registration
		// Send - 
		// PDID, UserID, Coupon
		// Response -
		// PriceTabl
		GetAptifyData("25", $CreateNewUserPD);
	}
	?>
	<div class="region region-right-sidebar col-xs-12 col-sm-12 col-md-9 col-lg-9">
	    <div id="popUp" style="display:none;"><?php echo $updateNonmemberTag; ?></div>
		<div id="saveShoppingCart" style="display:none;"><?php echo $saveShoppingCart; ?></div>
		<h1 class="SectionHeader"><?php echo $pd_detail['Title'];?></h1>
		<div class="brd-headling">&nbsp;</div>
		<h3><?php echo $pd_detail['Typeofpd'];?></h3>
		<p><?php echo $pd_detail['Description']; ?></p>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		 <ul class="nav nav-tabs" id="tabpd">
           <li class="active"><a data-toggle="tab" href="#presenter">PRESENTER BIO</a></li>
           <li><a data-toggle="tab" href="#learning">LEARNING OUTCOMES</a></li> 
           <li><a data-toggle="tab" href="#prerequisites">PREREQUISITES</a></li>   		   
         </ul>
         <div id="presenter" class="tab-pane fade active in"><?php if(strlen($pd_detail['Presenter_bio'])>400){ echo substr($pd_detail['Presenter_bio'],0,400).'....<a id="event1" class="close" style="cursor: pointer;">Read More</a>';} else{echo $pd_detail['Presenter_bio'];} ?><div id="down1" class="conts" style="display: none;"><?php echo $pd_detail['Presenter_bio'];?></div></div> 
         <div id="learning" class="tab-pane fade"><?php if(strlen($pd_detail['Learning_outcomes'])>400){ echo substr($pd_detail['Learning_outcomes'],0,400).'....<a id="event2" class="close" style="cursor: pointer;">Read More</a>';} else{echo $pd_detail['Learning_outcomes'];} ?><div id="down2" class="conts" style="display: none;"><?php echo $pd_detail['Learning_outcomes'];?></div></div> 
		 <div id="prerequisites" class="tab-pane fade"><?php if(strlen($pd_detail['Prerequisites'])>400){ echo substr($pd_detail['Prerequisites'],0,400).'....<a id="event3" class="close" style="cursor: pointer;">Read More</a>';} else{echo $pd_detail['Prerequisites'];} ?><div id="down3" class="conts" style="display: none;"><?php echo $pd_detail['Prerequisites'];?></div></div> 
	   </div>
		 <div class="detailContent">
		 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><h3>Presenters:</h3><p><?php echo $pd_detail['Presenters']; ?></p></div>
		 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><h3>Event status:</h3><p>
		 <?php 
			$Totalnumber = $pd_detail['Totalnumber'];
			$Enrollednumber = $pd_detail['Enrollednumber'];
			$Now = date('d-m-Y');
			if(strtotime($Now)> strtotime(str_replace("/","-",$pd_detail['Close_date']))){
				echo "Closed";  
			 }
			 elseif($Totalnumber-$Enrollednumber<=5){
				 echo "Almost Full"; 
			  
			 }
			elseif(($Totalnumber-$Enrollednumber)==0){
				 echo "Full"; 
			  
			 }
			 elseif(($Totalnumber-$Enrollednumber)>5){
				 echo "Open"; 
			  
			 }
		 
		 ?></p></div>
		<?php 
			$bdata = explode(" ",$pd_detail['Sdate']);
			$edata = explode(" ",$pd_detail['Edate']);
			//if Aptify give the StartDate&EndDate as timestamp, use below code to get the time and start date and end date;
			//echo date('d-m-Y h:i:s',$bdata);
			
			
		?>
		 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><h3>When:</h3><p><?php echo $bdata[1]."-".$edata[1]; ?></p><p><?php echo $bdata[0]." - ".$edata[0] ; ?></p></div>
		 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><h3>Registration closing date:</h3><p><?php echo $pd_detail['Close_date']; ?></p></div>
		 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<h3>Where:</h3>
			<p><?php echo $pd_detail['AddressLine1']." ".$pd_detail['AddressLine2']." ".$pd_detail['AddressLine3']; ?><br />
			<?php echo $pd_detail['City']." ".$pd_detail['State']." ".$pd_detail['PostalCode']; ?><br><a id="viewMap">View map</a></p></div>
		
		 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><h3>CPD hours:</h3><p><?php echo $pd_detail['CPD']; ?></p></div>
		 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><h3>Cost:</h3><p>
		 <?php 
		  $priceList = array();
		  $cost = 0;
		 // todo
		 // apply coupon one
		 // ["Product Cost With Coupon"]
		 
		 if($prices!="NULL"&& isset($_SESSION["UserId"])){
			if(in_array($pd_detail['Product Cost Without Coupon'],$pricelistGet)) {
				comparePrice($pricelistGet, $pd_detail['Product Cost Without Coupon']);
			}
			else {
				comparePrice($pricelistGet, $pd_detail['Product Cost Without Coupon']);
				echo "$".$pd_detail['Cost'];
			}
		 }
		else{
			foreach($pricelistGet as $key=>$value){echo $key.":&nbsp;$".$value."<br>";}
		}	
		 
		 
		 
		 
		 ?>
		 
		 
		 </p></div>
		 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><h3>Your registration status:</h3><p>
		 <?php 
		    if(isset($userId)&& ($userId!=0)){
				if($pd_detail['AttendeeStatus'] > 0) {
					echo "Registered";
				} else {
					echo "Not registered";
				}
				/*
				if(!in_array( $user->uid,$pd_detail['Users'])){
					echo "Not registered";
				}
				else{
					echo "Registered";
				}
				*/
			}
			else{
				echo '<a id="login">Login to see your status</a>';
			}
		 
		 ?>
		 </p></div>
		 <p>&nbsp;</p>
		 
		 <?php if(isset($userId)&& ($userId!=0)):?><p><form action="pd-product?id=<?php echo $pd_detail["MeetingID"]?>" method="POST"><input type="text" name="Couponcode" placeholder="Enter discount code"><button type="Submit" class="dashboard-button dashboard-bottom-button your-details-submit applyCouponButton">Apply</button></form></p><br><?php endif; ?>
		 <?php 
		     
		 
		 if(isset($userId)&& ($userId!=0)){
			 $userTag = checkPDUser($Job, $Professionalbody, $Professionalinsurance, $HearaboutAPA, $Registrationboard, $Dietary, $paymentCardList);
	         if ($userTag =="1"){
					echo '<form id="shoppingCartForm" action="../sites/all/themes/evolve/commonFile/updateShoppingCart.php" method="POST">
					<input type="hidden" name="userID" value="'.$_SESSION["userID"].'"> 
					<input type="hidden" name="productID" value="'.$pd_detail["MeetingID"].'"> 
					<input type="hidden" name="type" value="PD">
					<input type="hidden" name="Couponcode" value="'.$Couponcode.'"> 
					<input type="hidden" name="create">

					<button type="Submit" class="dashboard-button dashboard-bottom-button your-details-submit addCartButton" id="addToShoppingCart">Add to cart</button></form>
					<br>  
					<br>';
			 }
			 else
				 
				 {
					 echo '<button class="dashboard-button dashboard-bottom-button your-details-submit addCartButton" id="registerPDUserButton">Add to cart</button><br>  
						<br>';
				 }
       
	   }   ?>
	  
		 <p>By registering for this course, you agree to the <a target="_blank">APA Events Terms and Conditions.</a></p>
		 <p>You could save $55 on future courses by <a target="_blank">joining an APA national group</a>. Pay $54 today and keeping saving on PD throughout the year.</p>
		 </div>
	  <?php
        // We hide the comments and links now so that we can render them later.
        hide($content['comments']);
        hide($content['links']);
        print render($content['body']);
        ?>
		<div id="processWindow">
		   <h3>This item has been successfully added to your cart.</h3>
           <a target="_self" class="addCartlink" href="pd-search"><button class="dashboard-button dashboard-bottom-button your-details-submit shopCartButton">Continue shopping</button></a>
           <a target="_self" class="addCartlink" href="pd-shopping-cart"><button class="dashboard-button dashboard-bottom-button your-details-submit shopCartButton">Checkout now</button></a>
		</div>
		
	 <div id="myMap">
        
          
                    <h4 class="modal-title">View map</h4>

             
                   <?php
    if($pd_detail['Location']){
   echo ' <iframe
  width="600"
  height="450"
  frameborder="0" style="border:0"
  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAUNE61ebLP9O54uFskPBMMXJ54GM-rfUk
    &q='.$pd_detail['AddressLine1']." ".$pd_detail['AddressLine2']." ".$pd_detail['City']." ".$pd_detail['State']." ".$pd_detail['PostalCode'].'" allowfullscreen>
</iframe>';
   
}

?>
            
              
          
       
      </div>
	  
		<div  id="loginPopWindow" >
			<form name="signInForm" method="POST" action="pd-product?userID=1&id=<?php echo $pd_detail['Id'];?>">
				 <p style="color: #009FDA !important;">I’m a member. Please sign in below:</p>
				 <input type="email" class="form-control"  name="Emailaddress" id="Emailaddress" placeholder="Email address"><br>
				 <input type="password" class="form-control"  name="Password" id="Password" placeholder="Password"><br>
				 <p style="color: #009FDA !important;">I am not a member. <a id="createAccount">Create an account.</a></p>
				 <p>Forgotten your email address or password?<a href="" target="_blank">&nbsp;Click here</a> to reset your login details</p>
				  <input type="submit" value="Sign in">
			</form>
       
      </div>
	  <div id="registerMember">
            <form action="pd-product?updateNonmember=1&id=<?php echo $pd_detail['MeetingID'];?>" method="POST" id="registerMember" autocomplete="off">
				<div class="down20">
				   <div class="row"><h4 class="modal-title">Don’t have an account? Please register below:</h4></div>
                   <input type="hidden" name="Status" value="1"/>
				   <div class="row">
                     <div class="col-lg-6">
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
					   <div class="col-lg-6">
						
						   <select class="form-control" id="Gender" name="Gender">
							  <?php
									$Gendercode  = file_get_contents("sites/all/themes/evolve/json/Gender.json");
									$Gender=json_decode($Gendercode, true);						
									foreach($Gender  as $key => $value){
										echo '<option value="'.$Gender[$key]['ID'].'"';
									
										echo '> '.$Gender[$key]['Description'].' </option>';
									}
								?>
						   </select>
						</div>
                  </div>
				  <div class="row">
					<div class="col-lg-6">
					   <input type="text" class="form-control"  name="Firstname" placeholder="First/preferred name">
					</div>
				   <div class="col-lg-6">
					<input type="text" class="form-control" name="Lastname" placeholder="Last name">
				   </div>
				  </div>
				 <div class="row">
				     <div class="col-lg-12">
					   <input type="email" class="form-control"  name="Emailaddress" id="Email" placeholder="Email address" autocomplete="off">
					</div>
					
				 </div>
				 <div class="row">
				     <div class="col-lg-12">
					   <input type="password" class="form-control" id="Passwords" name="Passwords" placeholder="Password">
					</div>
					
				 </div>
				 <div class="row">
				     <div class="col-lg-12">
					   <input type="password" class="form-control"  name="Confirmpassword" placeholder="Confirm your password">
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
								echo '<option value="'.$State[$key]['Abbreviation'].'"';
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
								echo '<option value="'.$country[$key]['Country'].'"';
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
							<input type="text" class="form-control" name="Billing-Pobox" id="Billing-Pobox">
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
								echo '<option value="'.$State[$key]['Abbreviation'].'"';
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
								echo '<option value="'.$country[$key]['Country'].'"';
								echo '> '.$country[$key]['Country'].' </option>';
								
							}
							?>
					        </select>
                        </div>
                </div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">   <a class="join-details-button21"><span class="dashboard-button-name">Next</span></a></div>
				</div>
			</div>
			<div class="down22" style="display:none;">
				<div class="row">
					<div class="col-lg-6">
						<label for="">Country code</label>
						<select class="form-control" id="country-code" name="country-code">
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
						<input type="text" class="form-control" name="area-code" maxlength="5">
					</div>
					<div class="col-lg-4">
						<label for="">Phone number</label>
						<input type="text" class="form-control" name="phone-number" >
					</div>
					
				</div>
				<div class="row">
				    <div class="col-lg-6">
						<label for="">Birth Date<span class="tipstyle">*</span></label>
						<input type="date" class="form-control" onfocus="(this.type='date')" name="Birth" placeholder="Date of birth">
					</div>
				 </div>
				 <div class="row">
				    <div class="col-lg-3"><p>I am a:</p></div>
					<div class="col-lg-9">
					   <select class="form-control" id="Job" name="Job" >
							 <option value=""  disabled selected>Please select</option> 
                              <option value="Physiotherapist">Physiotherapist</option>
							  <option value="Osteopath">Osteopath</option>
							  <option value="Occupational therapist">Occupational therapist</option>
							  <option value="Chiropractor">Chiropractor</option>
							  <option value="Massage therapist">Massage therapist</option>
							  <option value="Exercise physiologist">Exercise physiologist</option>
							  <option value="GP/Doctor">GP/Doctor</option>
							  <option value="Podiatrist">Podiatrist</option>
							  <option value="other">Other, please specify</option>
				      </select>
					</div>
				 </div>
				<div class="row">
				   <div class="col-lg-12">
				  <input type="checkbox" name="Registrationboard" id="Registrationboard" required> <label for="Registrationboard">I am registered with my profession's registration board.</label>
				   </div>
				</div>
				<div class="row">
				   <div class="col-lg-12">
					<input type="checkbox" name="Professionalinsurance" id="Professionalinsurance" required> <label for="Professionalinsurance">I have current adequate professional indemnity insurance.</label>
				   </div>
				</div>
				<div class="row">
				   <div class="col-lg-12">
				  <input type="checkbox" name="Professionalbody" id="Professionalbody"> <label for="Professionalbody">I am a member of my professional body.</label>
				   </div>
				</div>
				<div class="row">
					<div class="col-lg-6">
					Your dietary requirements
					</div>
					<div class="col-lg-6">
						<select class="chosen-select" id="Dietary" name="Dietary[]" multiple>
						<option value=""  selected> None </option>
						<?php 
						$Dietarycode  = file_get_contents("sites/all/themes/evolve/json/Dietary.json");
						$Dietary=json_decode($Dietarycode, true);
						foreach($Dietary  as $key => $value){
						echo '<option value="'.$Dietary[$key]['ID'].'"';
						echo '> '.$Dietary[$key]['Name'].' </option>';
					
						}
						?>
						
						</select>
					</div>
				</div>
				<div class="row">
				   <div class="col-lg-6">How did you hear about APA PD?</div>
				   <div class="col-lg-6">
				       <select class="form-control" id="HearaboutAPA" name="HearaboutAPA">
					    <option value="" selected disabled>Please select</option>
							     <?php
						
                              $b = '<option value="wordofmouth">Word of mouth</option>';
							  $c = '<option value="inmotion">InMotion</option>';
							  $d = '<option value="socialmedia">Social media</option>';
							  $e = '<option value="apawebsite">APA website</option>';
							  $f = '<option value="other">Other</option>';
                                                 $optionarrays = array();
                                                  array_push($optionarrays,$b,$c,$d,$e,$f );
                                                  shuffle($optionarrays);
                                                  foreach ($optionarrays as $data) {
                                                                     echo  $data;
                                                        }
                                              ?>
					   </select>
				   </div>
				</div>
				<div class="row"> 
                    <div class="col-lg-9">
                        <p>Would you like to hear about other APA products?</p>
                    </div>
                </div>
				<div class="row">
                    <div class="col-lg-4">
                    <input type="checkbox" name="Membership-product" id="Membership-product" checked> <label for="Membership-product">Membership</label>
                    </div>
                    <div class="col-lg-4">
                    <input type="checkbox" name="Pdemails-product" id="Pdemails-product" checked> <label for="Pdemails-product">PD emails</label>
                    </div>
					 <div class="col-lg-4">
                    <input type="checkbox" name="Jobs-product" id="Jobs-product" checked> <label for="Jobs-product">Jobs4physios</label>
                    </div>
                </div>
				<div class="row">
                    <div class="col-lg-4">
                    <input type="checkbox" name="Shop-product" id="Shop-product" checked> <label for="Shop-product">Shop4physios</label>
                    </div>
                    <div class="col-lg-4">
                    <input type="checkbox" name="Campaigns-product" id="Campaigns-product" checked> <label for="Campaigns-product">Campaigns</label>
                    </div>
					 <div class="col-lg-4">
                    <input type="checkbox" name="Partner-product" id="Partner-product" checked> <label for="Partner-product">Partner offers</label>
                    </div>
                </div>
				<!--
				<div class="row payment-line">
				  <p><span class="registerDes">Payment information:</span></p> 
				</div>
				<div class="row">
					<div class="col-lg-4">
                        <select class="form-control" id="Cardtype" name="Cardtype">
						   <option value="" selected disabled>Card Type</option>
                           <option value="AE">American Express</option>
                           <option value="Visa">Visa</option>
                           <option value="Mastercard">Mastercard</option>
                        </select>
					</div>
				</div>
				<div class="row">
				    <div class="col-lg-12">
                        <input type="text" class="form-control" name="Name-on-card" placeholder="Name on card" required>
                    </div>
				</div>
				<div class="row">
					<div class="col-lg-12">
				       
                        <input type="number" class="form-control" name="Card-number" placeholder="Card number" required maxlength="16">
					</div>
			    </div>
				<div class="row">
					<div class="col-lg-6">
                        <input type="text" class="form-control" name="Expiry-date" placeholder="Expire date" required>
					</div>
					<div class="col-lg-6">
                        <input type="number" class="form-control" name="CCV" placeholder="CCV" maxlength="4">
					</div>
				</div>
				<div class="row payment-line">
				    <p><span class="registerDes">Billing address:</span></p>
				</div>
				<div class="row">
                    <div class="col-lg-6">
                       <input type="text" class="form-control" name="Billing-unitno" id="Billing-unitno" placeholder="Unit/house number" required>
                    </div>
                    <div class="col-lg-6">
					    <textarea class="form-control" name="Billing-streetname" id="Billing-streetname" placeholder="Street" required></textarea>
                        
                    </div>
				</div>
                <div class="row">   
					<div class="col-lg-6">
                        <input type="text" class="form-control" name="Billing-city" id="Billing-city" placeholder="Suburb/city" required>
					</div>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="Billing-postcode" id="Billing-postcode" placeholder="Postcode" required>
                    </div>
                </div>
                <div class="row">
                     <div class="col-lg-6">
					     <select class="form-control" id="Billing-state" name="Billing-state" required>
                              <option value="" disabled selected>State</option>
                              <option value="ACT">ACT</option>
                              <option value="NSW">NSW</option>
                              <option value="QLD">QLD</option>
                              <option value="SA">SA</option>
                              <option value="TAS">TAS</option>
                              <option value="VIC">VIC</option>
							  <option value="NT">NT</option>
                              <option value="WA">WA</option>
                        </select>
                        
                     </div>
                     <div class="col-lg-6">
                        <input type="text" class="form-control" name="Billing-country" id="Billing-country" placeholder="Country" required>
                     </div>
                </div>-->
				<div class="row"> 
					  <div class="col-lg-6">
					  <label for="Confirm-policy">Yes. I have read the APA Privacy policy</label><input type="checkbox" name="Confirm-policy" id="Confirm-policy" required>
					  </div>
					  <div class="col-lg-6">
					  <input type="submit" value="Submit">
					  </div>
				</div>
				   </form>
              
            </div>
        </div>   
        
          <div id="jobnoticement">
              <p><span class="registerDes">We’ve noticed you’re not a physiotherapist.</span></p>
              <p>Please note, if a course or event is for registered physiotherapists only. this will be indicated in the event description</p>
              <p><span class="registerDes">Make sure you are attending APA PD that is open to everyone.</span></p>
          </div>  
<!---Sign up Web User--->
<div id="signupWebUser">
<form id="your-detail-form" action="pd-product?id=<?php echo $pd_detail['MeetingID'];?>" method="POST">
		<input type="hidden" name="step1" value="1"/>
		    <div class="down33" style="display:block;">
			<div class="row"><h4 class="modal-title">Don’t have an account? Please register below:</h4></div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">
                    <div class="row">
                        <div class="col-lg-6">
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
						
                        <div class="col-lg-6">
                           <label for="">First name<span class="tipstyle">*</span></label>
                           <input type="text" class="form-control"  name="Firstname">
                        </div>
						
                    </div>
                    <div class="row">
                        
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
							  <?php
									$Gendercode  = file_get_contents("sites/all/themes/evolve/json/Gender.json");
									$Gender=json_decode($Gendercode, true);						
									foreach($Gender  as $key => $value){
										echo '<option value="'.$Gender[$key]['ID'].'"';
									
										echo '> '.$Gender[$key]['Description'].' </option>';
									}
								?>
						    </select>
                        </div>
                    </div>
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
						<input type="text" class="form-control" id="newPassword" name="newPassword" >
					</div>
					<div class="row">
					<div class="col-lg-6">
						<label for="">Confirm password<span class="tipstyle">*</span></label>
						<input type="password" class="form-control" id="Password" name="Password" value="" onchange="checkPasswordFunction(this.value)">
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
				</div>
			    </div>
						
					
					<div class="row">
						<div class="col-lg-4">
						<label for="">Address line 1<span class="tipstyle">*</span></label>
						<input type="text" class="form-control"  name="Address_Line_1" id="Address_Line_1">
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
								echo '<option value="'.$State[$key]['Abbreviation'].'"';
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
								echo '<option value="'.$country[$key]['Country'].'"';
								echo '> '.$country[$key]['Country'].' </option>';
								
							}
							?>
					        </select>
						</div>
					</div>
					            			
				</div>
                	
				
            </div>
	
			
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">  <a href="javascript:document.getElementById('your-detail-form').submit();" class="join-details-button4"><span class="dashboard-button-name">Submit</span></a></div>
		
    </form>

</div>

<!---End Sign up Web User--->
	  <!---Register PDUser--->
	    
	     <div id="registerPDUser">
		    <form action="pd-product?updateNonmember=<?php if((sizeof($paymentCardList)==0)) { echo "1"; } else { echo "0";}?>&id=<?php echo $pd_detail['Id'];?>" method="POST" id="registerMemberForm" autocomplete="off">
                   <div class="row">
				     <div class="col-lg-12" style="margin-bottom:17px; margin-top: -10px;">
					 <h4 class="modal-title">Please update your required details before purchase:</h4>
					
					 </div>
				   </div>
				<div class="down1" style="overflow: hidden; display: block;">  
				<div class="row">
				    <div class="col-lg-3"><p>I am a:</p></div>
					<div class="col-lg-9">
					<?php if(isset($userInfo)): ?>
					   <select class="form-control" id="Job1" name="Job" required>
							 <option value=""  <?php if (empty($Job)) echo "selected='selected'";?> disabled>Please select</option> 
                              <option value="Physiotherapist" <?php if ($Job == "Physiotherapist") echo "selected='selected'";?>>Physiotherapist</option>
							  <option value="Osteopath" <?php if ($Job == "Osteopath") echo "selected='selected'";?>>Osteopath</option>
							  <option value="Occupational therapist" <?php if ($Job == "Occupational therapist") echo "selected='selected'";?>>Occupational therapist</option>
							  <option value="Chiropractor" <?php if ($Job == "Chiropractor") echo "selected='selected'";?>>Chiropractor</option>
							  <option value="Massage therapist" <?php if ($Job == "Massage therapist") echo "selected='selected'";?>>Massage therapist</option>
							  <option value="Exercise physiologist" <?php if ($Job == "Exercise physiologist") echo "selected='selected'";?>>Exercise physiologist</option>
							  <option value="GP/Doctor" <?php if ($Job == "GP/Doctor") echo "selected='selected'";?>>GP/Doctor</option>
							  <option value="Podiatrist" <?php if ($Job == "Podiatrist") echo "selected='selected'";?>>Podiatrist</option>
							  <option value="other" <?php if ($Job == "other") echo "selected='selected'";?>>Other, please specify</option>
				      </select>
					  <?php endif;?>
					</div>
				 </div>
				 <div class="row">
				   <div class="col-lg-12">
				  <input type="checkbox" name="Registrationboard" id="Registrationboard1" required> <label for="Registrationboard1">I am registered with my profession's registration board.</label>
				   </div>
				</div>
				<div class="row">
				   <div class="col-lg-12">
				  <input type="checkbox" name="Professionalinsurance" id="Professionalinsurance1" required> <label for="Professionalinsurance1">I have current adequate professional indemnity insurance.</label>
				   </div>
				</div>
				<div class="row">
				   <div class="col-lg-12">
				  <input type="checkbox" name="Professionalbody" id="Professionalbody1"> <label for="Professionalbody1">I am a member of my professional body.</label>
				   </div>
				</div>
				<div class="row">
					<div class="col-lg-6">Dietary requirements:</div>
					<div class="col-lg-6">
						<?php if(isset($userInfo)): ?>
						<select class="chosen-select" id="Dietary" name="Dietary" multiple required>
							<option value="" <?php if (empty($userInfo['Dietary'])) echo "selected='selected'";?> disabled>None</option>
							<option value="Seafood" <?php if (in_array( "Seafood",$userInfo['Dietary'])) echo "selected='selected'";?>>Allergic to seafood</option>
							<option value="Shellfish" <?php if (in_array( "Shellfish",$userInfo['Dietary'])) echo "selected='selected'";?>>Allergic to shellfish</option>
							<option value="Nuts" <?php if (in_array( "Nuts",$userInfo['Dietary'])) echo "selected='selected'";?>>Allergic to nuts</option>
							<option value="Eggs" <?php if (in_array( "Eggs",$userInfo['Dietary'])) echo "selected='selected'";?>>Allergic to eggs</option>
							<option value="Coeliac" <?php if (in_array( "Coeliac",$userInfo['Dietary'])) echo "selected='selected'";?>>Coeliac</option>
							<option value="Fructose" <?php if (in_array( "Fructose",$userInfo['Dietary'])) echo "selected='selected'";?>>Fructose intolerant</option>
							<option value="Gluten" <?php if (in_array( "Gluten",$userInfo['Dietary'])) echo "selected='selected'";?>>Gluten intolerant</option>
							<option value="Lactose" <?php if (in_array( "Lactose",$userInfo['Dietary'])) echo "selected='selected'";?>>Lactose intolerant</option>
							<option value="Vegetarian" <?php if (in_array( "Vegetarian",$userInfo['Dietary'])) echo "selected='selected'";?>>Vegetarian</option>
							<option value="Vegan" <?php if (in_array( "Vegan",$userInfo['Dietary'])) echo "selected='selected'";?>>Vegan</option>
							<option value="Other" <?php if (in_array( "Other",$userInfo['Dietary'])) echo "selected='selected'";?>>Other</option>
						</select>
						<?php endif;?>
					</div>
				</div>
				  <div class="row">
				   <div class="col-lg-6">How did you hear about APA PD?</div>
				   <div class="col-lg-6">
				       <select class="form-control" id="HearaboutAPA" name="HearaboutAPA" required>
					    <option value="" selected disabled>Please select</option>
							     <?php
						
                              $b = '<option value="wordofmouth">Word of mouth</option>';
							  $c = '<option value="inmotion">InMotion</option>';
							  $d = '<option value="socialmedia">Social media</option>';
							  $e = '<option value="apawebsite">APA website</option>';
							  $f = '<option value="other">Other</option>';
                                                 $optionarrays = array();
                                                  array_push($optionarrays,$b,$c,$d,$e,$f );
                                                  shuffle($optionarrays);
                                                  foreach ($optionarrays as $data) {
                                                                     echo  $data;
                                                        }
                                              ?>
					   </select>
				   </div>
				 </div>
				 <div class="row"> 
                    <div class="col-lg-9">
                        <p>Would you like to hear about other APA products?</p>
                    </div>
                </div>
				 <div class="row">
                    <div class="col-lg-4">
                    <input type="checkbox" name="Membership-product" id="Membership-product1" value="1" checked> <label for="Membership-product1">Membership</label>
                    </div>
                    <div class="col-lg-4">
                    <input type="checkbox" name="Pdemails-product" id="Pdemails-product1" value="1" checked> <label for="Pdemails-product1">PD emails</label>
                    </div>
					 <div class="col-lg-4">
                    <input type="checkbox" name="Jobs-product" id="Jobs-product1" value="1" checked> <label for="Jobs-product1">Jobs4physios</label>
                    </div>
                 </div>
				  <div class="row">
                    <div class="col-lg-4">
                    <input type="checkbox" name="Shop-product" id="Shop-product1" value="1" checked> <label for="Shop-product1">Shop4physios</label>
                    </div>
                    <div class="col-lg-4">
                    <input type="checkbox" name="Campaigns-product" id="Campaigns-product1"value="1" checked> <label for="Campaigns-product1">Campaigns</label>
                    </div>
					 <div class="col-lg-4">
                    <input type="checkbox" name="Partner-product" id="Partner-product1" value="1" checked> <label for="Partner-product1">Partner offers</label>
                    </div>
                 </div>
				   <div class="row"> 
				      <div class="col-lg-6">
					 
					  </div>
					  <div class="col-lg-6">
					  <input type="submit" value="Next">
					  </div>
			      </div>
				  </form>
				 </div>
				
				 <?php if((sizeof($paymentCardList)==0)): ?>
			
				  <div class="down1" style="overflow: hidden; display: none;">
				   <div class="row payment-line"><p><span class="registerDes">Payment information</span></p></div>
				   <form action="pd-product?updateNonmember=3&id=<?php echo $pd_detail['Id'];?>" method="POST" id="updatePaymentForm" autocomplete="off">
				  <div class="row">
				   <div class="col-lg-4">
                        <select class="form-control" id="Cardtype" name="Cardtype">
						   <option value="" selected disabled>Card Type</option>
                           <option value="AE">American Express</option>
                           <option value="Visa">Visa</option>
                           <option value="Mastercard">Mastercard</option>
                        </select>
                   </div>
				 </div>
				 <div class="row">
				   <div class="col-lg-12">
                        <input type="text" class="form-control" name="Name-on-card" placeholder="Name on card" required>
                   </div>
				 </div>
				 <div class="row">
				   <div class="col-lg-12">
				       
                        <input type="number" class="form-control" name="Card-number" placeholder="Card number" required maxlength="16">
                   </div>
				 </div>
				 <div class="row">
				   <div class="col-lg-6">
                        <input type="text" class="form-control" name="Expiry-date" placeholder="Expire date" required>
                   </div>
				   <div class="col-lg-6">
                        <input type="number" class="form-control" name="CCV" placeholder="CCV" maxlength="4">
                   </div>
				   
				 </div>
				   <div class="row"> 
				      <div class="col-lg-6">
					 
					  </div>
					  <div class="col-lg-6">
					  <input type="submit" value="Next">
					  </div>
			      </div>
				  </form>
				</div>
				
			<?php endif; ?> 
	
	 </div>
	
	  <!---End Register PDUser-->
  </div>

        
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      
	  
	  <!--PD Register--->
	<div class="region region-right-sidebar col-xs-12 col-sm-12 col-md-3 col-lg-3">
		<img alt="" src="/sites/default/files/SKINS%20280x600.png" style="width: 260px;margin-top:25px;" />

	</div>
	</section>
  
</div> 
<script src="http://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<script type="text/javascript">
   jQuery(document).ready(function($) {
	    $(".chosen-select").chosen({width: "100%"});
		  
		 if($('#popUp').text()!='0' && $('#popUp').text()!='3'){
		   var x = $('#popUp').text();
		   $( "#registerPDUser" ).dialog();
		    $('[class^=down]:not(.down'+x+')').slideUp(400);
	      $('.down' + x).slideToggle(450);
	   }
	   
	     if($('#saveShoppingCart').text()=='1'){
		    
		   $( "#processWindow" ).dialog();
	   }
	   
	   
     $("#registerMember").validate({
            rules: {
              Prefix:{
                required: true,
           },
              Gender: {
                required: true,
           },
         
            Firstname: {
                required: true,
            },
            Lastname: {
                required: true,
            },
            Emailaddress: {
                required: true,
            },
            Passwords: {
                required: true,
                minlength: 5,
            },
            Confirmpassword: {
                required: true,
                minlength: 5,
                equalTo: "#Passwords"
            },
             Contactnumber: {
                required: true,
            },
             Birthdate: {
                required: true,
            },
              Job: {
                required: true,
            }         
        },
      
        messages: {
           Prefix:{
               required:"Please select prefix",
           },
           Gender: {
                required: "Please select gender",
           },
            Firstname: {
                required: "Please enter your first name",
            },
             Lastname: {
                required: "Please enter your last name",
            },
            Emailaddress: {
                required: "Please enter your email address",
            },
            Password: {
                required: "Please enter your password",
                minlength: "The password should be at least 5 characters",
            },
            Confirmpassword: {
                required: "Please confirm your password",
                minlength: "The password should be at least 5 characters",
                equalTo: "The confirm password should be same as password"
            },
             Contactnumber: {
                required: "Please enter your contact number",
            },
             Birthdate: {
                required: "Please select your date birth",
            },
             Job: {
                required: "Please select your occupation",
            }    
        },
     });
            $("#updatePaymentForm").validate({
            rules: {
             
             Cardtype: {
                required: true,
            }
            ,
             CCV: {
                required: true,
            }        
            
         
        },
      
        messages: {
           
             Cardtype: {
                required: "Please select your card type",
            }
            ,
             CCV: {
                required: "Please enter your CCV",
            }         
        },
     });
	   $("#registerMemberForm").validate({
            rules: {
              Prefix:{
                required: true,
           },
              Gender: {
                required: true,
           },
         
            Firstname: {
                required: true,
            },
            Lastname: {
                required: true,
            },
            Emailaddress: {
                required: true,
            },
            Password: {
                required: true,
                minlength: 5,
            },
            Confirmpassword: {
                required: true,
                minlength: 5,
                equalTo: "#password"
            },
             Contactnumber: {
                required: true,
            },
             Birthdate: {
                required: true,
            },
              Job: {
                required: true,
            },
             Cardtype: {
                required: true,
            }
            ,
             CCV: {
                required: true,
            }        
            
         
        },
      
        messages: {
           Prefix:{
               required:"Please select prefix",
           },
           Gender: {
                required: "Please select gender",
           },
            Firstname: {
                required: "Please enter your first name",
            },
             Lastname: {
                required: "Please enter your last name",
            },
            Emailaddress: {
                required: "Please enter your email address",
            },
            Password: {
                required: "Please enter your password",
                minlength: "The password should be at least 5 characters",
            },
            Confirmpassword: {
                required: "Please confirm your password",
                minlength: "The password should be at least 5 characters",
                equalTo: "The confirm password should be same as password"
            },
             Contactnumber: {
                required: "Please enter your contact number",
            },
             Birthdate: {
                required: "Please select your date birth",
            },
             Job: {
                required: "Please select your occupation",
            },
             Cardtype: {
                required: "Please select your card type",
            }
            ,
             CCV: {
                required: "Please enter your CCV",
            }         
        },
     });
   });
</script>
