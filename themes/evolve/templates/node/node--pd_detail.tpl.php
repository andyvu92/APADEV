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
<?php 
	    if(isset($_SESSION["UserId"])&&($_SESSION["UserId"]!="0")){ $userId=$_SESSION["UserId"];
		} else {$userId="0";}
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
			$_SESSION["UserId"] = $LogIn["UserId"];
			echo $LogIn["TokenId"];
			$data = "UserID=".$_SESSION["UserId"];
			$details = GetAptifyData("4", $data,"");
			$_SESSION['Dietary'] = $details["Dietary"];
			newSessionStats($details["MemberTypeID"], $details["MemberType"], $details["Status"]);
		}
	if(isset($_SESSION["UserId"])){
		if(!isset($details)) {
			$data = "UserID=".$_SESSION["UserId"];
			$details = GetAptifyData("4", $data,"");
			$_SESSION['Dietary'] = $details["Dietary"];
		}
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
	   if(isset($_SESSION["UserId"])&&($_SESSION["UserId"]!="0")){ 
			// ToDo
			// Find "Web user" and place it here!!!
			if(isset($_SESSION['MemberTypeID'])&&$_SESSION['MemberTypeID'] != "1") { // if they are member
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
			
		   
	       //$user_membertype = $userInfo['MemberType']; 
		   
           //$Job = "Osteopath";
          //$Professionalbody = "1";
    	   //$Professionalinsurance = "1";
           //$HearaboutAPA = "socialmedia";
		   //$Registrationboard = "1";
 		  // $Dietary = $userInfo['Dietary'];
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
	// user update detail!
	if(isset($_POST['updateDetail'])){
		$postData = array();
		if(isset($_SESSION['UserId'])) {$postData['userID'] = $_SESSION['UserId'];}
		if(isset($_POST['Prefix'])){ $postData['Prefix'] = $_POST['Prefix']; }else {$postData['Prefix'] = $details['Prefix'];}
		if(isset($_POST['Firstname'])){ $postData['Firstname'] = $_POST['Firstname']; }else {$postData['Firstname'] = $details['Firstname'];}
		if(isset($_POST['Middle-name'])){ $postData['Middle-name'] = $_POST['Middle-name']; } else {$postData['Middle-name'] = $details['Middle-name'];}
		if(isset($_POST['Preferred-name'])){ $postData['Preferred-name'] = $_POST['Preferred-name']; }else {$postData['Preferred-name'] = $details['Preferred-name'];}
		if(isset($_POST['Maiden-name'])){ $postData['Maiden-name'] = $_POST['Maiden-name']; } else {$postData['Maiden-name'] = $details['Preferred-name'];}
		if(isset($_POST['Lastname'])){ $postData['Lastname'] = $_POST['Lastname']; }else {$postData['Lastname'] = $details['Lastname'];}
		if(isset($_POST['Birth'])){ $postData['birth'] = str_replace("-","/",$_POST['Birth']); }else {$postData['birth'] = $details['birth'];}
		if(isset($_POST['Gender'])){ $postData['Gender'] = $_POST['Gender']; }else {$postData['Gender'] = $details['Gender'];}
		if(isset($_POST['country-code'])){ $postData['Home-country-code'] = $_POST['country-code']; }else {$postData['Home-country-code'] = $details['Home-phone-countrycode'];}
		if(isset($_POST['area-code'])){ $postData['Home-area-code'] = $_POST['area-code']; }else {$postData['Home-area-code'] = $details['Home-phone-areacode'];}
		if(isset($_POST['phone-number'])){ $postData['Home-phone-number'] = $_POST['phone-number']; }else {$postData['Home-phone-number'] = $details['Home-phone-number'];}
		if(isset($_POST['Mobile-country-code'])){ $postData['Mobile-country-code'] = $_POST['Mobile-country-code']; } else {$postData['Mobile-country-code'] = $details['Mobile-country-code'];}
		if(isset($_POST['Mobile-area-code'])){ $postData['Mobile-area-code'] = $_POST['Mobile-area-code']; }else {$postData['Mobile-area-code'] = $details['Mobile-area-code'];}
		if(isset($_POST['Mobile-number'])){ $postData['Mobile-number'] = $_POST['Mobile-number']; } else {$postData['Mobile-number'] = $details['Mobile-number'];}
		if(isset($_POST['Aboriginal'])){ $postData['Aboriginal'] = $_POST['Aboriginal']; }else {$postData['Aboriginal'] = $details['Aboriginal'];}
		if(isset($_POST['BuildingName'])){ $postData['BuildingName'] = $_POST['BuildingName']; }else {$postData['BuildingName'] = $details['BuildingName'];}
		if(isset($_POST['Address_Line_1'])){ $postData['Address_Line_1'] = $_POST['Address_Line_1']; }else {$postData['Address_Line_1'] = $details['Unit'];}
		if(isset($_POST['Pobox'])){ $postData['Pobox'] = $_POST['Pobox']; }else {$postData['Pobox'] = $details['Pobox'];}
		if(isset($_POST['Address_Line_2'])){ $postData['Address_Line_2'] = $_POST['Address_Line_2']; }else {$postData['Address_Line_2'] = $details['Street'];}
		if(isset($_POST['Suburb'])){ $postData['Suburb'] = $_POST['Suburb']; }else {$postData['Suburb'] = $details['Suburb'];}
		if(isset($_POST['Postcode'])){ $postData['Postcode'] = $_POST['Postcode']; }else {$postData['Postcode'] = $details['Postcode'];}
		if(isset($_POST['State'])){ $postData['State'] = $_POST['State']; }else {$postData['State'] = $details['State'];}
		if(isset($_POST['Country'])){ $postData['Country'] = $_POST['Country']; }else {$postData['Country'] = $details['Country'];}
		if(isset($_POST['Status'])){ $postData['Status'] = $_POST['Status']; } else {$postData['Status'] = $details['Status'];}
		if(isset($_POST['Specialty'])){ $postData['Specialty'] = $_POST['Specialty']; }else {$postData['Specialty'] = $details['Specialty'];}

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
		if(!isset($_POST['Shipping-address-join'])){
		$postData['Billing-BuildingName'] = $details['BuildingName1']; 
		$postData['BillingAddress_Line_1'] = $details['Billing-Unit'];
		$postData['BillingAddress_Line_2'] = $details['Billing-Street'];
		$postData['Billing-Pobox'] = $details['BuildingName1'];
		$postData['Billing-Suburb'] = $details['Billing-Suburb'];
		$postData['Billing-Postcode'] = $details['Billing-Postcode'];
		$postData['Billing-State'] = $details['Billing-State'];
		$postData['Billing-Country'] = $details['illing-Country'];	
			
		}
		//Add shipping address & mailing address post data
		if(isset($_POST['Shipping-BuildingName'])){ $postData['Shipping-BuildingName'] = $_POST['Shipping-BuildingName']; }else {$postData['Shipping-BuildingName'] = $details['Shipping-BuildingName'];}
		if(isset($_POST['Shipping-Address_Line_1'])){ $postData['Shipping-Address_line_1'] = $_POST['Shipping-Address_Line_1']; }else {$postData['Shipping-Address_line_1'] = $details['Shipping-unitno'];}
		if(isset($_POST['Shipping-Address_Line_2'])){ $postData['Shipping-Address_line_2'] = $_POST['Shipping-Address_Line_2']; }else {$postData['Shipping-Address_line_2'] = $details['Shipping-streetname'];}
		if(isset($_POST['Shipping-PObox'])){ $postData['Shipping-PObox'] = $_POST['Shipping-PObox']; } else {$postData['Shipping-PObox'] = $details['Shipping-streetname'];}
		if(isset($_POST['Shipping-city-town'])){ $postData['Shipping-city-town'] = $_POST['Shipping-city-town']; } else {$postData['Shipping-city-town'] = $details['Shipping-city-town'];}
		if(isset($_POST['Shipping-postcode'])){ $postData['Shipping-postcode'] = $_POST['Shipping-postcode']; } else {$postData['Shipping-postcode'] = $details['Shipping-postcode'];}
		if(isset($_POST['Shipping-State'])){ $postData['Shipping-state'] = $_POST['Shipping-State']; }else {$postData['Shipping-state'] = $details['Shipping-state'];}
		if(isset($_POST['Shipping-country'])){ $postData['Shipping-country'] = $_POST['Shipping-country']; }else {$postData['Shipping-country'] = $details['Shipping-country'];}
		if(isset($_POST['Mailing-BuildingName'])){ $postData['Mailing-BuildingName'] = $_POST['Mailing-BuildingName']; } else {$postData['Mailing-BuildingName'] = $details['Mailing-BuildingName'];}
		if(isset($_POST['Mailing-Address_Line_1'])){ $postData['Mailing-Address_line_1'] = $_POST['Mailing-Address_Line_1']; } else {$postData['Mailing-Address_line_1'] = $details['Mailing-unitno'];}
		if(isset($_POST['Mailing-Address_Line_2'])){ $postData['Mailing-Address_line_2'] = $_POST['Mailing-Address_Line_2']; } else {$postData['Mailing-Address_line_2'] = $details['Mailing-streetname'];}
		if(isset($_POST['Mailing-PObox'])){ $postData['Mailing-PObox'] = $_POST['Mailing-PObox']; } else {$postData['Mailing-PObox'] = $details['Mailing-unitno'];}
		if(isset($_POST['Mailing-city-town'])){ $postData['Mailing-city-town'] = $_POST['Mailing-city-town']; } else {$postData['Mailing-city-town'] = $details['Mailing-city-town'];}
		if(isset($_POST['Mailing-postcode'])){ $postData['Mailing-postcode'] = $_POST['Mailing-postcode']; }else {$postData['Mailing-postcode'] = $details['Mailing-postcode'];}
		if(isset($_POST['Mailing-State'])){ $postData['Mailing-state'] = $_POST['Mailing-State']; } else {$postData['Mailing-state'] = $details['Mailing-state'];}
		if(isset($_POST['Mailing-country'])){ $postData['Mailing-country'] = $_POST['Mailing-country']; } else {$postData['Mailing-country'] = $details['Mailing-country'];}
		if(isset($_POST['Memberid'])){ $postData['Memberid'] = $_POST['Memberid']; } else {$postData['Memberid'] = $details['Memberid'];}
		if(isset($_POST['Ahpranumber'])){ $postData['Ahpranumber'] = $_POST['Ahpranumber']; }else {$postData['Ahpranumber'] = $details['Ahpranumber'];}
		if(isset($_POST['Branch'])){ $postData['Branch'] = $_POST['Branch']; }else {$postData['Branch'] = $details['PreferBranch'];}
		$postData['Regional-group'] =$details['Regional-group'];
		
		if(isset($_POST['SpecialInterest'])){ $postData['PSpecialInterestAreaID'] = implode(",",$_POST['SpecialInterest']); }else {$postData['PSpecialInterestAreaID'] = $details['PSpecialInterestAreaID'];}
		
		//if(isset($_POST['Treatmentarea'])){ $postData['Treatmentarea'] = $_POST['Treatmentarea']; }
		if(isset($_POST['MAdditionallanguage'])){ $postData['PAdditionalLanguageID'] = implode(",",$_POST['MAdditionallanguage']); }else {$postData['PAdditionalLanguageID'] = $details['PAdditionalLanguageID'];}
		
		if(isset($_POST['Findpublicbuddy'])){ $postData['Findpublicbuddy'] = $_POST['Findpublicbuddy']; } else {$postData['Findpublicbuddy'] = $details['Findpublicbuddy'];}
		if(isset($_POST['Dietary'])){ 
		   $testDietaryArray = array();
			foreach($_POST['Dietary'] as $dietaryData){
			$testD['ID']=$dietaryData;
			array_push($testDietaryArray, $testD);
			}
			$postData['Dietary'] = $testDietaryArray;
		}
		/*
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
		}*/
		$postData['Workplaces'] =  $details['Workplaces'] ;
		$postData['PersonEducation'] = $details['PersonEducation'] ;
		// 2.2.5 - Dashboard - update member detail
		// Send - 
		// UserID 
		// Response - UserID & detail data
		GetAptifyData("5", $postData);
		//update PD shopping care 
		PDShoppingCart($userID=$_SESSION['UserId'], $productID=$_POST['productID'], $meetingID=$_POST['meetingID'],$type=$_POST['type'],$Coupon=$_POST['Couponcode']);
		//save survey data in APA side
		$CreateNewUserPD = array();
		$CreateNewUserPD["UserID"] = $_SESSION['UserId'];
		if(isset($_POST['Memberid'])){ $CreateNewUserPD["EmailAddress"] = $_POST['Memberid']; } else {$CreateNewUserPD["EmailAddress"] = $details['Memberid'];}
		if(isset($_POST['Job'])){ $CreateNewUserPD["Job"] = $_POST["Job"];  }
		if(isset($_POST['Registrationboard'])){ $CreateNewUserPD["Registrationboard"] = $_POST["Registrationboard"];  } else { $CreateNewUserPD["Registrationboard"] = 0;  } 
		if(isset($_POST['Professionalinsurance'])){ $CreateNewUserPD["Professionalinsurance"] = $_POST["Professionalinsurance"];  }else { $CreateNewUserPD["Professionalinsurance"] = 0;  } 
		if(isset($_POST['Professionalbody'])){ $CreateNewUserPD["Professionalbody"] = $_POST["Professionalbody"];  }else { $CreateNewUserPD["Professionalbody"] = 0;  } 
		if(isset($_POST['HearaboutAPA'])){ $CreateNewUserPD["HearaboutAPA"] = $_POST["HearaboutAPA"];  }
		if(isset($_POST['Membership-product'])){ $CreateNewUserPD["Membership-product"] = $_POST["Membership-product"];  }else { $CreateNewUserPD["Membership-product"] = 0;  } 
		if(isset($_POST['Pdemails-product'])){ $CreateNewUserPD["Pdemails-product"] = $_POST["Pdemails-product"];  }else { $CreateNewUserPD["Pdemails-product"] = 0;  } 
		if(isset($_POST['Jobs-product'])){ $CreateNewUserPD["Jobs-product"] = $_POST["Jobs-product"];  }else { $CreateNewUserPD["Jobs-product"] = 0;  } 
		if(isset($_POST['Shop-product'])){ $CreateNewUserPD["Shop-product"] = $_POST["Shop-product"];  }else { $CreateNewUserPD["Shop-product"] = 0;  } 
		if(isset($_POST['Campaigns-product'])){ $CreateNewUserPD["Campaigns-product"] = $_POST["Campaigns-product"];  }else { $CreateNewUserPD["Campaigns-product"] = 0;  } 
		if(isset($_POST['Partner-product'])){ $CreateNewUserPD["Partner-product"] = $_POST["Partner-product"];  }else { $CreateNewUserPD["Partner-product"] = 0;  } 
		$CreateNewUserPD["CreateDate"] = date('Y-m-d');
		SavePDSurvey($CreateNewUserPD=$CreateNewUserPD);	
		
	}
	// in case of user update the details get the new data.
	
	?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix post large" <?php print $attributes; ?>>
	<div class="post-content">
	
	<div class="mobile-banner">
		<div class="mobile-top-banner <?php echo $pd_detail['Typeofpd']; ?>">
			<span class="pd-type"><?php echo $pd_detail['Typeofpd']; ?></span>
		</div>
	</div>
	<div class="region col-xs-12 col-sm-12 col-md-9 left-side-content">
	    <div id="popUp" style="display:none;"><?php echo $updateNonmemberTag; ?></div>
		<div id="saveShoppingCart" style="display:none;"><?php echo $saveShoppingCart; ?></div>

		<div class="section mobile-no-padding">
			<h1 class="light-lead-heading"><?php echo $pd_detail['Title'];?></h1>
		</div>

		<div class="section description">
			<div class="pd-description-mobile">
				<div class="readmore">
					<div class="pd-description">
						<?php 
						if (!empty($pd_detail['Description'])){
							echo $pd_detail['Description'];
						}
						else{
							echo "<h4>No record found!</h4>";
						}
						?>
					</div>
				</div>
			</div>

			<div class="pd-description-nonmobile">
				<div class="pd-description">
					<?php 
					if (!empty($pd_detail['Description'])){
						if (strlen($pd_detail['Description']) > 600){
							echo '<div class="readmore">';
							echo $pd_detail['Description'];
							echo '</div>';
						}
						else{
							echo $pd_detail['Description'];
						}	
					}
					else{
						echo "<h4>No record found!</h4>";
					}
					?>
				</div>
				<script>
					jQuery(document).ready(function($) {
						$('.pd-description-nonmobile .readmore').readmore({
							collapsedHeight: 233,
							lessLink: '<a class="readless-link" href="#" onclick="topFunction215()">Read less</a>',
							speed: 500,
						});
					});
				</script>
			</div>
		</div>

	<div class="mobile-hidden">
		<?php if (!empty($pd_detail['Learning_outcomes'])): ?>
			<div class="section flex-cell" style="flex-wrap: unset">
				<div class="left-icon">
					<span class="learning-outcome-icon large-icon"></span>
				</div>
				<div class="right-content">
					<h2 class="blue-heading">Learning outcomes</h2>
					<p>
						<?php echo $pd_detail['Learning_outcomes']; ?>
					</p>
				</div>
			</div>
		<?php endif; ?>

		<?php if (!empty($pd_detail['Prerequisites'])): ?>
			<div class="section flex-cell" style="flex-wrap: unset">
				<div class="left-icon">
					<span class="prerequiresite-icon large-icon"></span>
				</div>
				<div class="right-content">
					<h2 class="blue-heading">Prerequiresites</h2>
					<p>
						<?php echo $pd_detail['Prerequisites']; ?>
					</p>
				</div>
			</div>
		<?php endif; ?>

		<?php if(!empty($pd_detail['Presenter'])): ?>
			<div class="section flex-cell" style="flex-wrap: unset">
				<div class="left-icon">
					<span class="presenters-bio-icon large-icon"></span>
				</div>
				<div class="right-content presenters-bio">
					<h2 class="blue-heading">Presenter's bio</h2>
					<p>
						<?php 
						foreach($pd_detail['Presenter'] as $bios) {
							echo '<h4>'.$bios['SpeakerID_Name'].'</h4><br>';
							echo '<p>'.$bios['Comments'].'</p><br>';

							if (strlen($pd_detail['Presenter']) > 300){
								echo '<div class="readmore">';
								echo $pd_detail['Presenter'];
								echo '</div>';
							}
							else{
								echo $pd_detail['Presenter'];
							}
						}
						?>
					</p>
					<script>
					jQuery(document).ready(function($) {
						$('.presenters-bio .readmore').readmore({
							collapsedHeight: 133,
							speed: 500,
						});
					});
				</script>
				</div>
			</div>
		<?php endif; ?>

	</div>
        <!--
		 <div class="detailContent">
		 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><h3>Presenters:</h3><p><?php //echo $pd_detail['Presenters']; ?></p></div>
		 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><h3>Event status:</h3><p>
		 <?php 
			//$Totalnumber = $pd_detail['Totalnumber'];
			//$Enrollednumber = $pd_detail['Enrollednumber'];
			//$Now = date('d-m-Y');
			//if(strtotime($Now)> strtotime(str_replace("/","-",$pd_detail['Close_date']))){
				//echo "Closed";  
			// }
			// elseif($Totalnumber-$Enrollednumber<=5){
				// echo "Almost Full"; 
			  
			// }
			//elseif(($Totalnumber-$Enrollednumber)==0){
				// echo "Full"; 
			  
			 //}
			// elseif(($Totalnumber-$Enrollednumber)>5){
				 //echo "Open"; 
			  
			 //}
		 
		 ?></p></div>
		<?php 
			$bdate = explode(" ",$pd_detail['Sdate']);
			$edate = explode(" ",$pd_detail['Edate']);
			echo $bdate[0]."//".$edate[0];
			$dateOutput = "";
			$timeOutput = "";
			$t = strtotime($bdate[0]);
			$j = strtotime($edate[0]);
			$q = strtotime($bdate[1]);
			$r = strtotime($edate[1]);
			$dateStart = date("d",strtotime($t));
			$timeOutput = date("h:i",$q)." - ".date("h:i",$r);
			if($bdate[0] == $edate[0]) {
				if(date("F",$t) != date("F",$j)) {
					$dateOutput = date("D d M",$t)."<br>- ".date("D d M",$j);
				} else {
					$dateOutput = date("l",$t)."<br>".date("d F",$t);
				}
			} elseif(date("F",$t) != date("F",$j)) {
				$dateOutput = date("D d M",$t)."<br>- ".date("D d M",$j);
			} else {
				$dateOutput = date("D d",$t)." - ".date("D d",$j)."<br>".date("F",$t);
			}
			//if Aptify give the StartDate&EndDate as timestamp, use below code to get the time and start date and end date;
			//echo date('d-m-Y h:i:s',$bdata);
			
			
		?>
		 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><h3>When:</h3><p><?php //echo $bdata[1]."-".$edata[1]; ?></p><p><?php //echo $bdata[0]." - ".$edata[0] ; ?></p></div>
		 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><h3>Registration closing date:</h3><p><?php //echo $pd_detail['Close_date']; ?></p></div>
		 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<h3>Where:</h3>
			<p><?php //echo $pd_detail['AddressLine1']." ".$pd_detail['AddressLine2']." ".$pd_detail['AddressLine3']; ?><br />
			<?php //echo $pd_detail['City']." ".$pd_detail['State']." ".$pd_detail['PostalCode']; ?><br><a >View map</a></p></div>
		
		 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><h3>CPD hours:</h3><p><?php //echo $pd_detail['CPD']; ?></p></div>
		 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><h3>Cost:</h3><p>
		 <?php 
		  //$priceList = array();
		  //$cost = 0;
		 // todo
		 // apply coupon one
		 // ["Product Cost With Coupon"]
		 
		 //if($prices!="NULL"&& isset($_SESSION["UserId"])){
			//if(in_array($pd_detail['Product Cost Without Coupon'],$pricelistGet)) {
				//comparePrice($pricelistGet, $pd_detail['Product Cost Without Coupon']);
			//}
			//else {
				//comparePrice($pricelistGet, $pd_detail['Product Cost Without Coupon']);
				//echo "$".$pd_detail['Cost'];
			//}
		 //}
		//else{
			//foreach($pricelistGet as $key=>$value){echo //$key.":&nbsp;$".$value."<br>";}
		//}	
		 ?>
		 
		 
		 </p></div>
		 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><h3>Your registration status:</h3><p>
		 <?php 
		    if(isset($userId)&& ($userId!="0")){
				if($pd_detail['AttendeeStatus'] > 0) {
					//echo "Registered";
				} else {
					//echo "Not registered";
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
				//echo '<a >Login to see your status</a>';
				//echo '<a class="info" data-target="#loginAT" data-toggle="modal" type="button">Login to see your status</a>';
			}
		 
		 ?>
		 </p></div>
		 <p>&nbsp;</p>
		 
		
		 <?php 
		     
		
		// if(isset($_SESSION["UserId"])){
			 //$userTag = checkPDUser($Job, $Professionalbody, $Professionalinsurance, $HearaboutAPA, $Registrationboard, $Dietary, $paymentCardList);
	        // $userTag = checkPDUser($_SESSION['MemberTypeID']);
			// if ($userTag =="0"){
				   // echo '<a class="dashboard-button dashboard-bottom-button your-details-submit addCartButton" id="registerPDUserButton" style="float:right;">Add to cart</a><br>  
						//<br>';
					
			// }
			// else
				 
				// {
					// echo '<a class="dashboard-button dashboard-bottom-button your-details-submit addCartButton" id="registerNonMember" style="float:right;">Add to cart</a><br>  
						//<br>';
				 //}
       
	   //}   ?>
	  
		 <p>By registering for this course, you agree to the <a target="_blank">APA Events Terms and Conditions.</a></p>
		 <p>You could save $55 on future courses by <a target="_blank">joining an APA national group</a>. Pay $54 today and keeping saving on PD throughout the year.</p>
		 </div>-->
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
    if(strlen($pd_detail['AddressLine1']) > 5){
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
			<form name="signInForm" method="POST" action="pd-product?id=<?php echo $pd_detail['MeetingID'];?>">
				 <h3 style="color: #009FDA; text-align: center; margin-top: 0; margin-bottom: 20px">Have a member account?</br>Please sign in below:</h3>
				<!--<input type="email" class="form-control"  name="Emailaddress" id="Emailaddress" placeholder="Email address"><br>
				 <input type="password" class="form-control"  name="Password"  placeholder="Password"><br>-->
				<input class="form-control" name="id" placeholder="Email address" type="text" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>" />
				<input class="form-control" placeholder="Password" name="password" type="password" value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; } ?>" />
				<div class="col-xs-12 none-padding" style="margin: 10px 0 8px 0">
				<input class="styled-checkbox" id="remember1" type="checkbox" name="remember"  <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> />
				<label for="remember1">Remember me</label>
				</div>
				<p><a class="forgotPS" data-dismiss="modal" data-toggle="modal" data-target="#passwordReset" >Forgot password?</a></p>

				 <p>Not a member? <a id="createAccount">Create an account.</a></p>
				
				  <input type="submit" value="Sign in">
			</form>
       
      </div>
	  <?php if(isset($details)): ?>
	  <div id="registerMember">
            <form action="pd-product?id=<?php echo $pd_detail['MeetingID'];?>" method="POST" id="registerMemberForm" autocomplete="off">
			    <input type="hidden" name="updateDetail">
				<input type="hidden" name="meetingID" value="<?php echo $pd_detail['MeetingID'];?>"> 
				<input type="hidden" name="productID" value="<?php echo $pd_detail['ProductID'];?>"> 
			    <input type="hidden" name="type" value="PD">
				<input type="hidden" name="Couponcode" value="<?php echo $Couponcode;?>"> 
				<div class="down20">
				   <div class="row"><h4 class="modal-title">Please fill in below details :</h4></div>
                  	<div class="row">
                     <div class="col-lg-6">
                        <?php 
							$Prefixcode  = file_get_contents("sites/all/themes/evolve/json/Prefix.json");
							$Prefix=json_decode($Prefixcode, true);
							?>
                            <select class="form-control"  name="Prefix">
							<?php 
							foreach($Prefix  as $key => $value){
								echo '<option value="'.$Prefix[$key]['ID'].'"';
								if ($details['Prefix'] == $Prefix[$key]['ID']){ echo "selected='selected'"; } 
								echo '> '.$Prefix[$key]['Prefix'].' </option>';
							}
							
						?>
						</select>
                     </div>
					   <div class="col-lg-6">
						
						   <select class="form-control"  name="Gender">
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
					<div class="col-lg-6">
					   <input type="text" class="form-control"  name="Firstname" <?php if (empty($details['Firstname'])) {echo "placeholder='First name'";}   else{ echo 'value="'.$details['Firstname'].'"'; }?>>
					</div>
				   <div class="col-lg-6">
					<input type="text" class="form-control" name="Lastname" <?php if (empty($details['Lastname'])) {echo "placeholder='Last name'";}   else{ echo 'value="'.$details['Lastname'].'"'; }?>>
				   </div>
				  </div>
				 <div class="row">
				     <div class="col-lg-12">
					   <input type="text" class="form-control" name="Memberid"  <?php if (empty($details['Memberid'])) {echo "placeholder='Member ID (Your email address)'";}   else{ echo 'value="'.$details['Memberid'].'"'; }?> readonly>
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
						<div class="col-lg-4">
						<label for="">Address line 1<span class="tipstyle">*</span></label>
						<input type="text" class="form-control" name="Address_Line_1"  <?php if (empty($details['Unit'])) {echo "placeholder='Address 1'";}   else{ echo 'value="'.$details['Unit'].'"'; }?> >
						</div>
						<div class="col-lg-6 col-lg-offset-2">
						<label for="">PO box</label>
						<input type="text" class="form-control" name="Pobox"  <?php if (!empty($details['Unit'])) {echo "placeholder='PO box'";}   else{ echo 'value="'.$details['BuildingName'].'"'; }?>>
						</div>
				</div>
				<div class="row">
						<div class="col-lg-12">
							<label for="">Address Line 2<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Address_Line_2"  <?php if (empty($details['Street'])) {echo "placeholder='Address 2'";}   else{ echo 'value="'.$details['Street'].'"'; }?> >
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<label for="">City or town<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Suburb" <?php if (empty($details['Suburb'])) {echo "placeholder='City or town'";}   else{ echo 'value="'.$details['Suburb'].'"'; }?>>
						</div>
				</div>
				<div class="row">
						<div class="col-lg-3">
							<label for="">Postcode<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Postcode"  <?php if (empty($details['Postcode'])) {echo "placeholder='Postcode'";}   else{ echo 'value="'.$details['Postcode'].'"'; }?>>
						</div>
						<div class="col-lg-3">
							<label for="">State<span class="tipstyle">*</span></label>
							<select class="form-control" name="State">
								<option value="" selected disabled> State </option>
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
							<select class="form-control"  name="Country">
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
				<div class="row">
						<div class="col-lg-12"><label for="Shipping-address-join"><strong>Billing address:(Sames as Above address)</strong></label><input type="checkbox" id="Shipping-address-join" name="Shipping-address-join" value="1" checked></div>
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
							<input type="text" class="form-control" name="Billing-Suburb" id="Billing-Suburb" <?php if (empty($details['Billing-Suburb'])) {echo "placeholder='Billing City/Town'";}   else{ echo 'value="'.$details['Billing-Suburb'].'"'; }?>>
						</div>
						<div class="col-lg-3">
							<label for="">Postcode<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Billing-Postcode" id="Billing-Postcode" <?php if (empty($details['Billing-Postcode'])) {echo "placeholder='Billing Postcode'";}   else{ echo 'value="'.$details['Billing-Postcode'].'"'; }?>>
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
								if ($details['Home-phone-countrycode'] == $country[$key]['TelephoneCode']){ echo "selected='selected'"; } 
								echo '> '.$country[$key]['Country'].' </option>';
							}
						?>
						</select>
					</div>
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
				    <div class="col-lg-6">
						<label for="">Birth Date<span class="tipstyle">*</span></label>
						<input type="date" class="form-control" name="Birth" <?php if (empty($details['birth'])) {echo "placeholder='DOB'";}   else{ echo 'value="'.str_replace("/","-",$details['birth']).'"';}?> required>
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
				   <div class="col-xs-12">
				  <input class="styled-checkbox" type="checkbox" name="Registrationboard" id="Registrationboard" required>
				  <label for="Registrationboard">I am registered with my profession's registration board.</label>
				   </div>
				</div>
				<div class="row">
				   <div class="col-xs-12">
					<input class="styled-checkbox" type="checkbox" name="Professionalinsurance" id="Professional-insurance" required>
					<label for="Professional-insurance">I have current adequate professional indemnity insurance.</label>
				   </div>
				</div>
				<div class="row">
				   <div class="col-xs-12">
				  <input class="styled-checkbox" type="checkbox" name="Professionalbody" id="Professionalbody">
				  <label for="Professionalbody">I am a member of my professional body.</label>
				   </div>
				</div>
				<div class="row">
					<div class="col-xs-12">
					<label>Your dietary requirements</label>
						<select class="chosen-select"  name="Dietary[]" multiple>
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
                    <input type="checkbox" name="Membership-product" id="Membership-product" value="1" checked> <label for="Membership-product">Membership</label>
                    </div>
                    <div class="col-lg-4">
                    <input type="checkbox" name="Pdemails-product" id="Pdemails-product" value="1" checked> <label for="Pdemails-product">PD emails</label>
                    </div>
					 <div class="col-lg-4">
                    <input type="checkbox" name="Jobs-product" id="Jobs-product" value="1" checked> <label for="Jobs-product">Jobs4physios</label>
                    </div>
                </div>
				<div class="row">
                    <div class="col-lg-4">
                    <input type="checkbox" name="Shop-product" id="Shop-product" value="1" checked> <label for="Shop-product">Shop4physios</label>
                    </div>
                    <div class="col-lg-4">
                    <input type="checkbox" name="Campaigns-product" id="Campaigns-product" value="1" checked> <label for="Campaigns-product">Campaigns</label>
                    </div>
					 <div class="col-lg-4">
                    <input type="checkbox" name="Partner-product" id="Partner-product" value="1" checked> <label for="Partner-product">Partner offers</label>
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
        <?php endif;?>
          <div id="jobnoticement">
              <p><span class="registerDes">We’ve noticed you’re not a physiotherapist.</span></p>
              <p>Please note, if a course or event is for registered physiotherapists only. this will be indicated in the event description</p>
              <p><span class="registerDes">Make sure you are attending APA PD that is open to everyone.</span></p>
          </div>  
<!--Sign up Web User-->
<div id="signupWebUser">
<form id="your-detail-form" action="pd-product?id=<?php echo $pd_detail['MeetingID'];?>" method="POST">
		<input type="hidden" name="step1" value="1"/>
		    <div class="down33" style="display:block;">
			<div class="row"><h4 class="modal-title">Don’t have an account? Please register below:</h4></div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">
                    <div class="row">
                        <div class="col-lg-3">
				            <label for="prefix">Prefix<span class="tipstyle">*</span></label>
							<?php 
							$Prefixcode  = file_get_contents("sites/all/themes/evolve/json/Prefix.json");
							$Prefix=json_decode($Prefixcode, true);
							?>
							<div class="chevron-select-box">
								<select class="form-control" id="Prefix" name="Prefix">
								<?php 
								foreach($Prefix  as $key => $value){
									echo '<option value="'.$Prefix[$key]['ID'].'"';
									echo '> '.$Prefix[$key]['Prefix'].' </option>';
								}
								?>
								</select>
							</div>
                        </div>
					</div>
					
                    <div class="row">
						<div class="col-lg-6">
                           <label for="">First name<span class="tipstyle">*</span></label>
                           <input type="text" class="form-control"  name="Firstname">
						</div>
						
                        <div class="col-lg-6">
                           <label for="">Last name<span class="tipstyle">*</span></label>
                           <input type="text" class="form-control" name="Lastname">
                        </div>
					 </div>
					 
                    <div class="row">
                        <div class="col-lg-6">
                           <label for="">Birth Date<span class="tipstyle">*</span></label>
                           <input type="date" class="form-control" name="Birth">
                        </div>
                        <div class="col-lg-3">
						   <label for="">Gender<span class="tipstyle">*</span></label>
						   	<div class="chevron-select-box">
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
					</div>
					
					<div class="row">
					<div class="col-lg-6">
						<label for="">Member ID (Your email address)<span class="tipstyle">*</span></label>
						<input type="text" class="form-control" name="Memberid" id="Memberid" value="" onchange="checkEmailFunction(this.value)">
					<div id="checkMessage"></div>
					<script>
					function checkEmailFunction(email) {
						$.ajax({
						url:"../sites/all/themes/evolve/inc/jointheAPA/jointheAPA-checkEmail.php", 
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
									
					<div class="row">
						<div class="col-lg-12">
							<label for="">Address line 1<span class="tipstyle">*</span></label>
							<input type="text" class="form-control"  name="Address_Line_1" id="Address_Line_1">
						</div>

						<div class="col-lg-12">
							<label for="">Address line 2<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Address_Line_2" id="Address_Line_2">
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12">
							<label for="">City or town<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Suburb" >
						</div>
					</div>
					<div class="row">
						<div class="col-lg-3">
							<label for="">Postcode<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Postcode" >
						</div>
						<div class="col-lg-3">
							<label for="">State<span class="tipstyle">*</span></label>
							<div class="chevron-select-box">
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
						</div>
						<div class="col-lg-6">
							<label for="">Country<span class="tipstyle">*</span></label>
							<div class="chevron-select-box">
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
                	
				
            </div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">  <a href="javascript:document.getElementById('your-detail-form').submit();" class="join-details-button4" style="width: 100%; margin-top: 10px;"><span class="dashboard-button-name">Submit</span></a></div>
		
    </form>

</div>

<!---End Sign up Web User--->
<!---Member update detail-->
 <?php if(isset($details)): ?>
<div id="registerPDUser">
	<form action="pd-product?id=<?php echo $pd_detail['MeetingID'];?>" method="POST" autocomplete="off" >
		<input type="hidden" name="updateDetail">
		<input type="hidden" name="meetingID" value="<?php echo $pd_detail['MeetingID'];?>"> 
		<input type="hidden" name="productID" value="<?php echo $pd_detail['ProductID'];?>"> 
	    <input type="hidden" name="type" value="PD">
	    <input type="hidden" name="Couponcode" value="<?php echo $Couponcode;?>"> 		
		<div class="row">
		   <div class="col-lg-12">
				<input class="styled-checkbox" type="checkbox" name="Professionalinsurance" id="Professional-insurance1"  required>
				<label for="Professional-insurance1">I have current adequate professional indemnity insurance.</label>
		   </div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<label>Your dietary requirements</label>
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

	 <input class="accent-btn" style="margin-top: 10px;" type="submit" value="Go to my cart">

	</form>
	</div>
	<?php endif;?>
<!--End Member update detail-->
  </div>

        
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      
	  
	  <!--PD RIGHT SIDEBAR-->
	<div class="region region-right-sidebar col-xs-12 col-sm-12 col-md-3 col-lg-3">
		<div class="top-banner <?php echo $pd_detail['Typeofpd']; ?>">
			<span class="pd-type"><?php echo $pd_detail['Typeofpd']; ?></span>
		</div>

		<div class="session-info">
			<div class="session-calendar">
				<div class="flex-cell" style="flex-wrap: unset;">
					<div class="">
						<span class="calendar-icon">
							<span class="calendar-date"><?php echo $dateStart ?></span>
						</span>
					</div>
					<div class="">
						<span class="session-date"> 
							<!--<span class="weekdate">Wednesday,</span><span class="month-date">12 December</span>-->
							<?php echo $dateOutput; ?>
						</span>
					</div>
				</div>
				<span class="session-time">
					<?php echo $timeOutput;//$edate[1]."-".$edate[1]; ?> AEST
				</span>
			</div>

			<div class="session-address">
				<div class="flex-cell">
					<div class="">
						<span class="address-icon"></span>
					</div>
					<div class="">
						<span class="address">
							<?php echo $pd_detail['AddressLine1']." ".$pd_detail['AddressLine2']." ".$pd_detail['AddressLine3']; ?><br />
			<?php echo $pd_detail['City']." ".$pd_detail['State']." ".$pd_detail['PostalCode']; ?>
							<a id="viewMap" class="direction" target="_blank">View map</a>
						</span>
					</div>
				</div>
			</div>
		</div>

		<div class="session-register-info">
			<span class="small-heading">Tickets:</span>
			<span>
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
						echo "$".number_format($pd_detail['Product Cost Without Coupon'],2);
					}
				}
				else{
					foreach($pricelistGet as $key=>$value){
						$x = explode(" ", $key);
						if(count($x) == 1) {
							$y = $key;
						} else {
							$y = str_replace($x[0], "", $key);
						}
						$valuet = number_format($value,2);
						echo $y.":&nbsp;$".$valuet."<br>";
					}
				}	
				?>
			</span>

			<span class="small-heading">Registration closing date:</span>
			<span>
			<?php 
				$closingDate = explode(" ",$pd_detail['Close_date']);
				$Cls = strtotime($closingDate[0]);
				$ClsDateFinal = date("d M Y",$Cls);
				echo $ClsDateFinal; ?>
			</span>

			<span class="small-heading">Event status:</span>
			<span>
			<?php 
				$Totalnumber = doubleval($pd_detail['Totalnumber']);
				$Enrollednumber = doubleval($pd_detail['Enrollednumber']);
				$Now = strtotime(date('d-m-Y'));
				$fullStatus = false;
				if(strtotime($Now) > strtotime(str_replace("/","-",$pd_detail['Close_date']))){
					echo "Closed";  
					$fullStatus = true;
				} elseif($Enrollednumber/$Totalnumber>=0.9 && $Enrollednumber/$Totalnumber<1){
					echo "Almost Full"; 
				} elseif(($Totalnumber-$Enrollednumber)==0){
					echo "Full"; 
					$fullStatus = true;
				} elseif(($Enrollednumber/$Totalnumber)<0.9){
					echo "Open"; 
				}
		 		?>
			</span>

			<span class="small-heading">CPD hours:</span>
			<span>
				<?php 
				if (!empty($pd_detail['CPDhours'])){
					echo $pd_detail['CPDhours'][0]['EducationUnits'];
				}
				 else{
					 echo 'Not available';
				 }
				?>
			</span>

			<span class="small-heading">Your registration status:</span>
			<span>
				<?php 
				if(isset($userId)&& ($userId!="0")){
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
					echo '<a class="member-login" id="login">Login to see your status</a>';
					//echo '<a class="info" data-target="#loginAT" data-toggle="modal" type="button">Login to see your status</a>';
				}
				?>
			</span>
		</div>

		<div class="session-cta <?php echo $pd_detail['Typeofpd']; ?>">
			<a class="add-to-wishlist"><span>Add to Wishlist</span></a>
			<!--<a class="add-to-cart"><span>Add to Card</span></a>-->
			<?php 
			if(isset($_SESSION["UserId"])){
				//$userTag = checkPDUser($Job, $Professionalbody, $Professionalinsurance, $HearaboutAPA, $Registrationboard, $Dietary, $paymentCardList);
				$userTag = checkPDUser($_SESSION['MemberTypeID']);
				if($fullStatus) {
					echo '<span class="add-to-cart disable '.$pd_detail['Typeofpd'].'">Registration closed</span>';
				} elseif ($userTag =="0"){ // any logged in users
					if(isset($pd_detail['Typeofpd']) && $pd_detail['Typeofpd'] == "Course") {
						if($_SESSION['MemberTypeID'] =='31' || $_SESSION['MemberTypeID'] =='32') {
							echo '<span class="add-to-cart disable '.$pd_detail['Typeofpd'].'"></span>';
							// student message
						} else {
							echo '<a class="add-to-cart '.$pd_detail['Typeofpd'].'" id="registerPDUserButton"><span>Add to cart</span></a>';	
						}
					} else {
						echo '<a class="add-to-cart '.$pd_detail['Typeofpd'].'" id="registerPDUserButton"><span>Add to cart</span></a>';	
					}
				} else { // Not-logged in
					echo '<a class="add-to-cart '.$pd_detail['Typeofpd'].'" id="registerNonMember"><span>Add to cart</span></a>';
				} 
			}	
		   ?>
		</div>

<div class="accordian-container mobile-pd-details">

<div class="acordian-label">At a glance</div>
<div class="accordian-content">
	<div class="session-register-info">
			<span class="small-heading">Tickets:</span>
			<span>
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
						echo "$".number_format($pd_detail['Product Cost Without Coupon'],2);
					}
				}
				else{
					foreach($pricelistGet as $key=>$value){
						$x = explode(" ", $key);
						$y = str_replace($x[0], "", $key);
						$valuet = number_format($value,2);
						//echo "key: $key, x: $x, y: $y <br>";
						echo $y.":&nbsp;$".$valuet."<br>";
					}
				}	
				?>
			</span>

			<span class="small-heading">Registration closing date:</span>
			<span>
				<?php 
				$closingDate = explode(" ",$pd_detail['Close_date']);
				$Cls = strtotime($closingDate[0]);
				$ClsDateFinal = date("d M Y",$Cls);
				echo $ClsDateFinal; ?>
			</span>

			<span class="small-heading">Event status:</span>
			<span>
			<?php 
				$Totalnumber = doubleval($pd_detail['Totalnumber']);
				$Enrollednumber = doubleval($pd_detail['Enrollednumber']);
				$Now = strtotime(date('d-m-Y'));
				if(strtotime($Now) > strtotime(str_replace("/","-",$pd_detail['Close_date']))){
					echo "Closed";  
				} elseif($Enrollednumber/$Totalnumber>=0.9 && $Enrollednumber/$Totalnumber<1){
					echo "Almost Full"; 
				} elseif(($Totalnumber-$Enrollednumber)==0){
					echo "Full";
				} elseif(($Enrollednumber/$Totalnumber)<0.9){
					echo "Open"; 
				}
		 		?>
			</span>

			<span class="small-heading">CPD hours:</span>
			<span>
				<?php 
				if (!empty($pd_detail['CPDhours'])){
					echo $pd_detail['CPDhours'][0]['EducationUnits'];
				}
				 else{
					 echo 'Not available';
				 }
				?>
			</span>

			<span class="small-heading">Your registration status:</span>
			<span>
				<?php 
				if(isset($userId)&& ($userId!="0")){
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
					echo '<a class="member-login" id="login">Login to see your status</a>';
					//echo '<a class="info" data-target="#loginAT" data-toggle="modal" type="button">Login to see your status</a>';
				}
				?>
			</span>
		</div>
</div>


<?php if(!empty($pd_detail['Presenter'])): ?>
	<div class="acordian-label">Presenters</div>
	<div class="accordian-content">
		<div class="section flex-cell" style="flex-wrap: unset">
			<div class="left-icon">
				<span class="presenters-bio-icon large-icon"></span>
			</div>
			<div class="right-content">
				<h2 class="blue-heading">Presenter's bio</h2>
				<p>
					<?php 
					foreach($pd_detail['Presenter'] as $bios) {
						echo '<h4>'.$bios['SpeakerID_Name'].'</h4><br>';
						echo '<p>'.$bios['Comments'].'</p><br>';
					}
					?>
				</p>
			</div>
		</div>
	</div>
<?php endif; ?>



<?php if (!empty($pd_detail['Learning_outcomes'])): ?>
	<div class="acordian-label">Learning outcomes</div>
	<div class="accordian-content">
			<div class="section flex-cell" style="flex-wrap: unset">
				<div class="left-icon">
					<span class="learning-outcome-icon large-icon"></span>
				</div>
				<div class="right-content">
					<h2 class="blue-heading">Learning outcomes</h2>
					<p><?php echo $pd_detail['Learning_outcomes']; ?></p>
				</div>
			</div>
	</div>
<?php endif; ?>

<?php if (!empty($pd_detail['Prerequisites'])): ?>
	<div class="acordian-label">Prerequisites</div>
	<div class="accordian-content">
			<div class="section flex-cell" style="flex-wrap: unset">
				<div class="left-icon">
					<span class="prerequiresite-icon large-icon"></span>
				</div>
				<div class="right-content">
					<h2 class="blue-heading">Prerequiresites</h2>
					<p>
						<?php echo $pd_detail['Prerequisites']; ?>
					</p>
				</div>
			</div>
	</div>
<?php endif; ?>

</div>

		<div class="extra-info">
			<span>By registering for this course, you agree to the <a href="">APA Events Terms and Conditions.</a></span>
			<span>You could save $55 on future courses by joining an <a href="http://uat.australian.physio/membership/national-groups">APA National Group.</a> Pay $54 today and keeping saving on PD throughout the year.</span>
		</div>
	</div>

	</section>
  
</div> 

<script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<script type="text/javascript">
   jQuery(document).ready(function($) {
	    $(".chosen-select").chosen({width: "100%"});
		  
		 if($('#popUp').text()!='0' && $('#popUp').text()!='3'){
		   var x = $('#popUp').text();
		   //$( "#registerPDUser" ).dialog();
		    $('[class^=down]:not(.down'+x+')').slideUp(400);
	      $('.down' + x).slideToggle(450);
	   }
	   
	     if($('#saveShoppingCart').text()=='1'){
		    
		   $( "#processWindow" ).dialog();
	   }
	   
	   
    
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
            
             Birth: {
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
            
            
             Birth: {
                required: "Please select your date birth",
            }
              
        },
     });
   });
</script>
