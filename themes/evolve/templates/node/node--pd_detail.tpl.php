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
		/*fix address issue on 08/08/2018*/
		if($_POST['Pobox']!="") {
			$postData['BuildingName'] =$_POST['Pobox'];
			$postData['Address_Line_1'] ="";
			$postData['Address_Line_2'] ="";
			
		}else {
			$postData['BuildingName'] = $_POST['BuildingName']; 
			$postData['Address_Line_1'] = $_POST['Address_Line_1'];
			$postData['Address_Line_2'] = $_POST['Address_Line_2'];
			
		}
		//if(isset($_POST['BuildingName'])){ $postData['BuildingName'] = $_POST['BuildingName']; }else {$postData['BuildingName'] = $details['BuildingName'];}
		//if(isset($_POST['Address_Line_1'])){ $postData['Address_Line_1'] = $_POST['Address_Line_1']; }else {$postData['Address_Line_1'] = $details['Unit'];}
		//if(isset($_POST['Pobox'])){ $postData['Pobox'] = $_POST['Pobox']; }else {$postData['Pobox'] = $details['Pobox'];}
		//if(isset($_POST['Address_Line_2'])){ $postData['Address_Line_2'] = $_POST['Address_Line_2']; }else {$postData['Address_Line_2'] = $details['Street'];}
		if(isset($_POST['Suburb'])){ $postData['Suburb'] = $_POST['Suburb']; }else {$postData['Suburb'] = $details['Suburb'];}
		if(isset($_POST['Postcode'])){ $postData['Postcode'] = $_POST['Postcode']; }else {$postData['Postcode'] = $details['Postcode'];}
		if(isset($_POST['State'])){ $postData['State'] = $_POST['State']; }else {$postData['State'] = $details['State'];}
		if(isset($_POST['Country'])){ $postData['Country'] = $_POST['Country']; }else {$postData['Country'] = $details['Country'];}
		if(isset($_POST['Status'])){ $postData['Status'] = $_POST['Status']; } else {$postData['Status'] = $details['Status'];}
		if(isset($_POST['Specialty'])){ $postData['Specialty'] = $_POST['Specialty']; }else {$postData['Specialty'] = $details['Specialty'];}

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
		//$postData['Billing-BuildingName'] = $_POST['Billing-BuildingName']; 
		//$postData['BillingAddress_Line_1'] = $_POST['Billing-Address_Line_1'];
		//$postData['BillingAddress_Line_2'] = $_POST['Billing-Address_Line_2'];
		//$postData['Billing-Pobox'] = $_POST['Billing-Pobox'];
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
		$postData['Billing-Country'] = $details['Billing-Country'];	
			
		}
		/*fix address issue on 08/08/2018*/
		if($_POST['Shipping-PObox']!="") {
			$postData['Shipping-BuildingName'] =$_POST['Shipping-PObox'];
			$postData['Shipping-Address_line_1'] ="";
			$postData['Shipping-Address_line_2'] ="";
			
		}else {
			$postData['Shipping-BuildingName'] = $_POST['Shipping-BuildingName']; 
			$postData['Shipping-Address_line_1'] = $_POST['Shipping-Address_Line_1'];
			$postData['Shipping-Address_line_2'] = $_POST['Shipping-Address_Line_2'];
			
		}
		if(isset($_POST['Shipping-city-town'])){ $postData['Shipping-city-town'] = $_POST['Shipping-city-town']; } 
		if(isset($_POST['Shipping-postcode'])){ $postData['Shipping-postcode'] = $_POST['Shipping-postcode']; } 
		if(isset($_POST['Shipping-State'])){ $postData['Shipping-state'] = $_POST['Shipping-State']; }
		if(isset($_POST['Shipping-country'])){ $postData['Shipping-country'] = $_POST['Shipping-country']; }
		/***put the logic when post Mailing-PObox******/
		/***Updated on 02082018**/
		if($_POST['Mailing-PObox']!="") {
				$postData['Mailing-BuildingName'] =$_POST['Mailing-PObox'];
				$postData['Mailing-Address_line_1'] ="";
				$postData['Mailing-Address_line_2'] ="";
				
		}else {
			$postData['Mailing-BuildingName'] = $_POST['Mailing-BuildingName']; 
			$postData['Mailing-Address_line_1'] = $_POST['Mailing-Address_Line_1'];
			$postData['Mailing-Address_line_2'] = $_POST['Mailing-Address_Line_2'];
			
		}
		if(isset($_POST['Mailing-city-town'])){ $postData['Mailing-city-town'] = $_POST['Mailing-city-town']; } 
		if(isset($_POST['Mailing-postcode'])){ $postData['Mailing-postcode'] = $_POST['Mailing-postcode']; }
		if(isset($_POST['Mailing-State'])){ $postData['Mailing-state'] = $_POST['Mailing-State']; } 
		if(isset($_POST['Mailing-country'])){ $postData['Mailing-country'] = $_POST['Mailing-country']; } 
		
		//Add shipping address & mailing address post data
		/*if(isset($_POST['Shipping-BuildingName'])){ $postData['Shipping-BuildingName'] = $_POST['Shipping-BuildingName']; }else {$postData['Shipping-BuildingName'] = $details['Shipping-BuildingName'];}
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
		*/
		
		if(isset($_POST['Memberid'])){ $postData['Memberid'] = $_POST['Memberid']; } else {$postData['Memberid'] = $details['Memberid'];}
		if(isset($_POST['Ahpranumber'])){ $postData['Ahpranumber'] = $_POST['Ahpranumber']; }else {$postData['Ahpranumber'] = $details['Ahpranumber'];}
		if(isset($_POST['Branch'])){ $postData['Branch'] = $_POST['Branch']; }else {$postData['Branch'] = $details['PreferBranch'];}
		$postData['Regional-group'] =$details['Regionalgp'];
		
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
		//save survey data for non-member in APA side
		if(isset($_POST['updateNonMemberDetail']))
		{
			$CreateNewUserPD = array();
			$CreateNewUserPD["UserID"] = $_SESSION['UserId'];
			if(isset($_POST['Memberid'])){ $CreateNewUserPD["EmailAddress"] = $_POST['Memberid']; } else {$CreateNewUserPD["EmailAddress"] = $details['Memberid'];}
			if(isset($_POST['Job']) && $_POST['Job']!="other" ){ $CreateNewUserPD["Job"] = $_POST["Job"];  } else { $CreateNewUserPD["Job"] = $_POST["jobother"];}
			if(isset($_POST['Registrationboard'])){ $CreateNewUserPD["Registrationboard"] = $_POST["Registrationboard"];  } else { $CreateNewUserPD["Registrationboard"] = 0;  } 
			if(isset($_POST['Professionalinsurance'])){ $CreateNewUserPD["Professionalinsurance"] = $_POST["Professionalinsurance"];  }else { $CreateNewUserPD["Professionalinsurance"] = 0;  } 
			if(isset($_POST['Professionalbody'])){ $CreateNewUserPD["Professionalbody"] = $_POST["Professionalbody"];  }else { $CreateNewUserPD["Professionalbody"] = 0;  } 
			if(isset($_POST['HearaboutAPA'])){ $CreateNewUserPD["HearaboutAPA"] = $_POST["HearaboutAPA"];  } else { $CreateNewUserPD["HearaboutAPA"] = "";}
			if(isset($_POST['Membership-product'])){ $CreateNewUserPD["Membership-product"] = $_POST["Membership-product"];  }else { $CreateNewUserPD["Membership-product"] = 0;  } 
			if(isset($_POST['Pdemails-product'])){ $CreateNewUserPD["Pdemails-product"] = $_POST["Pdemails-product"];  }else { $CreateNewUserPD["Pdemails-product"] = 0;  } 
			if(isset($_POST['Jobs-product'])){ $CreateNewUserPD["Jobs-product"] = $_POST["Jobs-product"];  }else { $CreateNewUserPD["Jobs-product"] = 0;  } 
			if(isset($_POST['Shop-product'])){ $CreateNewUserPD["Shop-product"] = $_POST["Shop-product"];  }else { $CreateNewUserPD["Shop-product"] = 0;  } 
			if(isset($_POST['Campaigns-product'])){ $CreateNewUserPD["Campaigns-product"] = $_POST["Campaigns-product"];  }else { $CreateNewUserPD["Campaigns-product"] = 0;  } 
			if(isset($_POST['Partner-product'])){ $CreateNewUserPD["Partner-product"] = $_POST["Partner-product"];  }else { $CreateNewUserPD["Partner-product"] = 0;  } 
			$CreateNewUserPD["CreateDate"] = date('Y-m-d');
			SavePDSurvey($CreateNewUserPD=$CreateNewUserPD);
			//store the survey data in the session for half hour expiry date
			$_SESSION['SurveyData'] = $CreateNewUserPD;
			$_SESSION['start'] = time(); 
			$_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
		}	
		
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
					} else{
						echo "<h4>No record found!</h4>";
					}
					?>
				</div>
				<script>
					jQuery(document).ready(function($) {
						$('.readmore').readmore({
							speed: 800,
							collapsedHeight: 207,
							lessLink: '<a class="readless-link" href="#" onclick="topFunction()">Read less</a>',
						});
					});
				</script>
			</div>
		</div>

	<div class="mobile-hidden">
		<?php if (false): //!empty($pd_detail['Learning_outcomes'])): ?>
			<div class="section flex-cell" style="flex-wrap: unset">
				<div class="left-icon">
					<span class="learning-outcome-icon large-icon"></span>
				</div>
				<div class="right-content">
					<h2 class="blue-heading">Learning outcomes</h2>
					<ul>
					<?php foreach($pd_detail['LearningOutcomes'] as $outcomes) {
						echo "<li>".$outcomes['LearningOutcomes']."</li>";
					} ?>
					</ul>
				</div>
			</div>
		<?php endif; ?>

		<?php if (!empty($pd_detail['LearningOutcomes'])): ?>
			<div class="section flex-cell" style="flex-wrap: unset">
				<div class="left-icon">
					<span class="learning-outcome-icon large-icon"></span>
				</div>
				<div class="right-content">
					<h2 class="blue-heading">Learning outcomes</h2>
					<ul>
					<?php foreach($pd_detail['LearningOutcomes'] as $outcomes) {
						echo "<li>".$outcomes['LearningOutcomes']."</li>";
					} ?>
					</ul>
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
					<ul>
					<?php 
						$seperatedPre = explode(",",$pd_detail['Prerequisites']);
						if(sizeof($seperatedPre) == 1) {
							echo "<li>".$pd_detail['Prerequisites']."</li>";
						} else {
							foreach($seperatedPre as $prSep) {
								echo "<li>".$prSep."</li>";
							}
						}
					?>
					</ul>
				</div>
			</div>
		<?php endif; ?>

		<?php if(!empty($pd_detail['Presenter'])): ?>
			<div class="section flex-cell" style="flex-wrap: unset">
				<div class="left-icon">
					<span class="presenters-bio-icon large-icon"></span>
				</div>
				<div class="right-content presenters-bio">
					<h2 class="blue-heading">Presenters</h2>
					<p>
						<?php 
						foreach($pd_detail['Presenter'] as $bios) {
							echo '<h4>'.$bios['SpeakerID_Name'].'</h4><br>';
							//echo '<p>'.$bios['Comments'].'</p><br>';

							if (strlen($bios['Comments']) > 300){
								echo '<div class="readmore">';
								echo $bios['Comments'];
								echo '</div>';
							} else{
								echo $bios['Comments'];
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
			$dateStart = date("d",$t);
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
           <a target="_self" id="continue-shopping" class="addCartlink" href="pd-search"><button class="dashboard-button dashboard-bottom-button your-details-submit shopCartButton">Continue shopping</button></a>
           <a target="_self" id="checkout" class="addCartlink" href="pd-shopping-cart"><button class="dashboard-button dashboard-bottom-button your-details-submit shopCartButton">Checkout now</button></a>
		</div>
		
	 <div id="myMap">
                 
        <h4 class="modal-title">Event location</h4>

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
	  
	  <?php if(isset($details)): ?>
	  <?php
		/*hanled survey data session */
		$now = time();  
		if (isset($_SESSION['expire']) && $now > $_SESSION['expire']) {
            unset($_SESSION['SurveyData']);
        }
	  ?>
	  <div id="registerMember">
            <form action="pd-product?id=<?php echo $pd_detail['MeetingID'];?>" method="POST" id="registerMemberForm">
			    <input type="hidden" name="updateDetail">
				<input type="hidden" name="updateNonMemberDetail">
				<input type="hidden" name="meetingID" value="<?php echo $pd_detail['MeetingID'];?>"> 
				<input type="hidden" name="productID" value="<?php echo $pd_detail['ProductID'];?>"> 
			    <input type="hidden" name="type" value="PD">
				<input type="hidden" name="Couponcode" value="<?php echo $Couponcode;?>"> 
				<div class="down20">
				   <div class="row"><h4 class="modal-title">Please fill out your details below:</h4></div>
                  	<div class="row">
						<div class="col-lg-3">
							<label for="prefix">Prefix</label>
							<div class="chevron-select-box">
								<?php 
								$Prefixcode  = file_get_contents("sites/all/themes/evolve/json/Prefix.json");
								$Prefix=json_decode($Prefixcode, true);
								?>
								<select class="form-control"  name="Prefix">
								<option value="" <?php if (empty($details['Prefix'])) echo "selected='selected'";?> disabled>Please select</option>
								<?php 
								foreach($Prefix  as $key => $value){
									echo '<option value="'.$Prefix[$key]['ID'].'"';
									if ($details['Prefix'] == $Prefix[$key]['ID']){ echo "selected='selected'"; } 
									echo '> '.$Prefix[$key]['Prefix'].' </option>';
								}
								
								?>
								</select>
							</div>
						</div>
					 </div>
					 <div class="row">
					   <div class="col-lg-6">
							<label for="Gender">Gender</label>
							<div class="chevron-select-box">
								<select class="form-control"  name="Gender">
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
					<div class="col-lg-6">
						<label for="">First name<span class="tipstyle"> *</span></label>
					   	<input type="text" class="form-control"  name="Firstname" placeholder='First name'<?php if (empty($details['Firstname'])) {echo "placeholder='First name'";}   else{ echo 'value="'.$details['Firstname'].'"'; }?>>
					</div>
				   <div class="col-lg-6">
						<label for="">Last name<span class="tipstyle"> *</span></label>
						<input type="text" class="form-control" name="Lastname" placeholder='Last name'<?php if (empty($details['Lastname'])) {echo "placeholder='Last name'";}   else{ echo 'value="'.$details['Lastname'].'"'; }?>>
				   </div>
				  </div>

				 <div class="row">
				    <div class="col-lg-12">
					 	<label for="">Member ID (Your email address)<span class="tipstyle"> *</span></label>
					   	<input type="text" class="form-control" name="Memberid"  <?php if (empty($details['Memberid'])) {echo "placeholder='Member ID (Your email address)'";}   else{ echo 'value="'.$details['Memberid'].'"'; }?> readonly>
					</div>
				 </div>
				 
				<div class="row">
						<div class="col-lg-12">
							<span class="light-lead-heading cairo" style="font-weight: 200">Residential address:</span>
						</div>
				</div>

					<div class="row">
						<div class="col-lg-12">
							<label for="">Building name</label>
							<input type="text" class="form-control"  name="BuildingName" <?php if (empty($details['Unit'])) {echo "placeholder='Building name'";}   else{ echo 'value="'.$details['BuildingName'].'"'; }?>>
						</div>

						<div class="col-lg-6">
							<label for="">PO Box</label>
							<input type="text" class="form-control" name="Pobox" placeholder="PO Box" <?php if (!empty($details['Unit'])) {echo "placeholder='PO box'";}   else{ echo 'value="'.$details['BuildingName'].'"'; }?>>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12">
							<label for="">Address line 1<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Address_Line_1"  <?php if (empty($details['Unit'])) {echo "placeholder='Address line 1'";}   else{ echo 'value="'.$details['Unit'].'"'; }?> >
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12">
							<label for="">Address line 2</label>
							<input type="text" class="form-control" name="Address_Line_2"  <?php if (empty($details['Street'])) {echo "placeholder='Address line 2'";}   else{ echo 'value="'.$details['Street'].'"'; }?> >
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12">
							<label for="">City or town<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Suburb" placeholder='City or town'<?php if (empty($details['Suburb'])) {echo "placeholder='City or town'";}   else{ echo 'value="'.$details['Suburb'].'"'; }?>>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-3">
							<label for="">Postcode<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Postcode" placeholder='Postcode' <?php if (empty($details['Postcode'])) {echo "placeholder='Postcode'";}   else{ echo 'value="'.$details['Postcode'].'"'; }?>>
						</div>
						<div class="col-lg-3">
							<label for="">State<span class="tipstyle">*</span></label>
							<div class="chevron-select-box">
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
						</div>
						<div class="col-lg-6">
							<label for="">Country<span class="tipstyle">*</span></label>
							<div class="chevron-select-box">
								<select class="form-control"  name="Country">
								<?php 
								$countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
								$country=json_decode($countrycode, true);
								foreach($country  as $key => $value){
									echo '<option value="'.$country[$key]['Country'].'"';
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

				<div class="row flex-cell flex-flow-row">
							<div class="col-xs-12 col-sm-12">
								<span class="light-lead-heading cairo" style="font-weight: 200">Billing address</span>
							</div>

							<div class="col-xs-12 col-sm-12 align-item-end">
								<input class="styled-checkbox" type="checkbox" id="Shipping-address-join" name="Shipping-address-join" value="0">
								<label style="font-weight: 300;" for="Shipping-address-join">Use my residential address</label>
							</div>
				</div>

				<div id="shippingAddress">
						<div class="row">
							<div class="col-lg-12">
								<label for="">Building name</label>
								<input type="text" class="form-control"  name="Billing-BuildingName" <?php if (empty($details['Billing-Unit'])) {echo "placeholder='Billing Building Name'";}   else{ echo 'value="'.$details['BuildingName1'].'"'; }?>>
							</div>
							<div class="col-lg-6">
								<label for="">PO Box</label>
								<input type="text" class="form-control" name="Billing-Pobox" placeholder="PO Box" <?php if (!empty($details['Billing-Unit'])) {echo "placeholder='PO box'";}   else{ echo 'value="'.$details['BuildingName1'].'"'; }?>>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12">
								<label for="">Address line 1<span class="tipstyle">*</span></label>
								<input type="text" class="form-control"  name="Billing-Address_Line_1" id="Billing-Address_Line_1" <?php if (empty($details['Billing-Unit'])) {echo "placeholder='Address line 1'";}   else{ echo 'value="'.$details['Billing-Unit'].'"'; }?>>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12">
								<label for="">Address line 2</label>
								<input type="text" class="form-control" name="Billing-Address_Line_2" id="Billing-Address_Line_2" <?php if (empty($details['Billing-Street'])) {echo "placeholder='Address line 2'";}   else{ echo 'value="'.$details['Billing-Street'].'"'; }?>>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12">
								<label for="">City or town<span class="tipstyle">*</span></label>
								<input type="text" class="form-control" name="Billing-Suburb" id="Billing-Suburb" placeholder='Billing City or Town'<?php if (empty($details['Billing-Suburb'])) {echo "placeholder='Billing City/Town'";}   else{ echo 'value="'.$details['Billing-Suburb'].'"'; }?>>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-3">
								<label for="">Postcode<span class="tipstyle">*</span></label>
								<input type="text" class="form-control" name="Billing-Postcode" id="Billing-Postcode" placeholder='Billing Postcode'<?php if (empty($details['Billing-Postcode'])) {echo "placeholder='Billing Postcode'";}   else{ echo 'value="'.$details['Billing-Postcode'].'"'; }?>>
							</div>
							<div class="col-lg-3">
								<label for="">State<span class="tipstyle">*</span></label>
								<div class="chevron-select-box">
									<select class="form-control" name="Billing-State" id="Billing-State" >
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
							</div>
							<div class="col-lg-6">
								<label for="">Country<span class="tipstyle">*</span></label>
								<div class="chevron-select-box">
									<select class="form-control" id="Billing-Country" name="Billing-Country" >
									<?php 
									$countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
									$country=json_decode($countrycode, true);
									foreach($country  as $key => $value){
										
										echo '<option value="'.$country[$key]['Country'].'"';
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
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">   <a class="join-details-button21"><span class="dashboard-button-name">Next</span></a></div>
			</div>
			<div class="down22" style="display:none;">
				<div class="row">
					<div class="col-lg-5">
						<label for="">Country code</label>
						<div class="chevron-select-box">
							<select class="form-control" id="country-code" name="country-code">
							<?php
								$countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
								$country=json_decode($countrycode, true);
								$countser = 0;									
								foreach($country  as $key => $value){
									echo '<option value="'.$country[$key]['TelephoneCode'].'"';
									if ($details['Home-phone-countrycode'] == preg_replace('/\s+/', '', $country[$key]['TelephoneCode']) && $countser == 0){  echo "selected='selected'"; $countser++;} 
									elseif(empty($details['Home-phone-countrycode']) && $country[$key]['ID']=="14"){
											echo "selected='selected'";
									}
									echo '> '.$country[$key]['Country'].' </option>';
								}
							?>
							</select>
						</div>
					</div>
					<div class="col-lg-2">
						<label for="">Area code</label>
						<input type="text" class="form-control" name="area-code" <?php if (empty($details['Home-phone-areacode'])) {echo "placeholder='Area code'";}   else{ echo 'value="'.$details['Home-phone-areacode'].'"'; }?> maxlength="5">
					</div>
					<div class="col-lg-5">
						<label for="">Phone number</label>
						<input type="text" class="form-control" name="phone-number" <?php if (empty($details['Home-phone-number'])) {echo "placeholder='Phone number'";}   else{ echo 'value="'.$details['Home-phone-number'].'"'; }?>  >
					</div>
				</div>

				<div class="row">
				    <div class="col-lg-6">
						<label for="">Birth date<span class="tipstyle">*</span></label>
						<input type="date" class="form-control" name="Birth" <?php if (empty($details['birth'])) {echo "placeholder='DOB'";}   else{ echo 'value="'.str_replace("/","-",$details['birth']).'"';}?> required>
					</div>
				 </div>

				 <div class="row">
					<div class="col-lg-12">
						<label>I am a:</label>
						<div class="chevron-select-box">
							<select class="form-control" id="Job" name="Job" >
									<option value=""  disabled selected>Please select</option> 
									<option value="Physiotherapist" <?php if(isset($_SESSION['SurveyData']) && $_SESSION['SurveyData']['Job'] =="Physiotherapist") echo "selected='selected'";?>>Physiotherapist</option>
									<option value="Osteopath" <?php if(isset($_SESSION['SurveyData']) && $_SESSION['SurveyData']['Job'] =="Osteopath") echo "selected='selected'";?>>Osteopath</option>
									<option value="Occupational therapist" <?php if(isset($_SESSION['SurveyData']) && $_SESSION['SurveyData']['Job'] =="Occupational therapist") echo "selected='selected'";?>>Occupational therapist</option>
									<option value="Chiropractor" <?php if(isset($_SESSION['SurveyData']) && $_SESSION['SurveyData']['Job'] =="Chiropractor") echo "selected='selected'";?>>Chiropractor</option>
									<option value="Massage therapist" <?php if(isset($_SESSION['SurveyData']) && $_SESSION['SurveyData']['Job'] =="Massage therapist") echo "selected='selected'";?>>Massage therapist</option>
									<option value="Exercise physiologist" <?php if(isset($_SESSION['SurveyData']) && $_SESSION['SurveyData']['Job'] =="Exercise physiologist") echo "selected='selected'";?>>Exercise physiologist</option>
									<option value="GP/Doctor" <?php if(isset($_SESSION['SurveyData']) && $_SESSION['SurveyData']['Job'] =="GP/Doctor") echo "selected='selected'";?>>GP/Doctor</option>
									<option value="Podiatrist" <?php if(isset($_SESSION['SurveyData']) && $_SESSION['SurveyData']['Job'] =="Podiatrist") echo "selected='selected'";?>>Podiatrist</option>
									<option value="other" <?php if(isset($_SESSION['SurveyData']) && $_SESSION['SurveyData']['Job'] =="other") echo "selected='selected'";?>>Other, please specify</option>
							</select>
						</div>
						<input type="text" class="form-control display-none" name="jobother" id="jobother">
					</div>
				 </div>

				<div class="row question-boxes">
				   <div class="col-xs-12">
				  <input class="styled-checkbox" type="checkbox" name="Registrationboard" id="Registrationboard"  value="<?php if(isset($_SESSION['SurveyData'])) echo $_SESSION['SurveyData']['Registrationboard'];?>" <?php if(isset($_SESSION['SurveyData']) && $_SESSION['SurveyData']['Registrationboard']=="1") echo 'checked="checked"';?>>
				  <label for="Registrationboard">I am registered with my profession's registration board.</label>
				   </div>

				   <div class="col-xs-12">
					<input class="styled-checkbox" type="checkbox" name="Professionalinsurance" id="Professional-insurance" value="<?php if(isset($_SESSION['SurveyData'])) echo $_SESSION['SurveyData']['Professionalinsurance'];?>" <?php if(isset($_SESSION['SurveyData']) && $_SESSION['SurveyData']['Professionalinsurance']=="1") echo 'checked="checked"';?>>
					<label for="Professional-insurance">I have current and adequate professional indemnity insurance.</label>
				   </div>

				   <div class="col-xs-12">
				  <input class="styled-checkbox" type="checkbox" name="Professionalbody" id="Professionalbody" value="<?php if(isset($_SESSION['SurveyData'])) echo $_SESSION['SurveyData']['Professionalbody'];?>" <?php if(isset($_SESSION['SurveyData']) && $_SESSION['SurveyData']['Professionalbody']=="1") echo 'checked="checked"';?>>
				  <label for="Professionalbody">I am a member of my professional body.</label>
				   </div>
				</div>

				<div class="row" style="margin-top: 10px; margin-bottom: 10px">
					<div class="col-xs-12">
					<label>Your dietary requirements</label>
						<div class="plus-select-box">
							<select  name="Dietary[]" multiple>
							
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

				<div class="row">
				   <div class="col-lg-12">
					   <label>How did you hear about APA PD?</label>
					   <div class="chevron-select-box">
							<select class="form-control" id="HearaboutAPA" name="HearaboutAPA">
								<option value="" selected disabled>Please select</option>
								<option value="socialmedia">Social media</option>
								<option value="wordofmouth">Word of mouth</option>
								<option value="apawebsite">APA website</option>
								<option value="inmotion">InMotion</option>
								<option value="searchengine">Search engine</option>
								<option value="one">I have been before</option>
								<option value="email">APA email</option>
								<option value="other">Other</option>
										<?php
								/*
									$b = '<option value="wordofmouth">Word of mouth</option>';
									$c = '<option value="inmotion">InMotion</option>';
									$d = '<option value="socialmedia">Social media</option>';
									$e = '<option value="wordofmouth">Word of mouth</option>';
									$f = '<option value="searchengine">Search engine</option>';
									$g = '<option value="email">Email</option>';
									$h = '<option value="one">I have been to one before</option>';
									$i = '<option value="other">Other</option>';
														$optionarrays = array();
														array_push($optionarrays,$b,$c,$d,$e,$f,$g,$h,$i);
														shuffle($optionarrays);
														foreach ($optionarrays as $data) {
																			echo  $data;
																}*/
									
													?>
							</select>
					   </div>
				   </div>
				</div>

				<div class="row question-boxes"> 
                    <div class="col-lg-12">
                        <label>Would you like to hear about other APA products?</label>
                    </div>

                    <div class="col-xs-6 col-md-4 col-lg-4">
                    	<input class="styled-checkbox" type="checkbox" name="Membership-product" id="Membership-product" value="<?php if(isset($_SESSION['SurveyData'])) echo $_SESSION['SurveyData']['Membership-product'];?>" <?php if(isset($_SESSION['SurveyData']) && $_SESSION['SurveyData']['Membership-product']=="1") echo 'checked="checked"';?>> <label for="Membership-product">Membership</label>
					</div>
					
                    <div class="col-xs-6 col-md-4 col-lg-4">
                    	<input class="styled-checkbox" type="checkbox" name="Pdemails-product" id="Pdemails-product" value="<?php if(isset($_SESSION['SurveyData'])) echo $_SESSION['SurveyData']['Pdemails-product'];?>" <?php if(isset($_SESSION['SurveyData']) && $_SESSION['SurveyData']['Pdemails-product']=="1") echo 'checked="checked"';?>> <label for="Pdemails-product">PD emails</label>
					</div>
					
					 <div class="col-xs-6 col-md-4 col-lg-4">
                    	<input class="styled-checkbox" type="checkbox" name="Jobs-product" id="Jobs-product" value="<?php if(isset($_SESSION['SurveyData'])) echo $_SESSION['SurveyData']['Jobs-product'];?>" <?php if(isset($_SESSION['SurveyData']) && $_SESSION['SurveyData']['Jobs-product']=="1") echo 'checked="checked"';?>> <label for="Jobs-product">Jobs4physios</label>
                    </div>

                    <div class="col-xs-6 col-md-4 col-lg-4">
                    	<input class="styled-checkbox" type="checkbox" name="Shop-product" id="Shop-product" value="<?php if(isset($_SESSION['SurveyData'])) echo $_SESSION['SurveyData']['Shop-product'];?>" <?php if(isset($_SESSION['SurveyData']) && $_SESSION['SurveyData']['Shop-product']=="1") echo 'checked="checked"';?>> <label for="Shop-product">Shop4physios</label>
					</div>
					
                    <div class="col-xs-6 col-md-4 col-lg-4">
                    	<input class="styled-checkbox" type="checkbox" name="Campaigns-product" id="Campaigns-product" value="<?php if(isset($_SESSION['SurveyData'])) echo $_SESSION['SurveyData']['Campaigns-product'];?>" <?php if(isset($_SESSION['SurveyData']) && $_SESSION['SurveyData']['Campaigns-product']=="1") echo 'checked="checked"';?>> <label for="Campaigns-product">Campaigns</label>
					</div>
					
					<div class="col-xs-6 col-md-4 col-lg-4">
                    	<input class="styled-checkbox" type="checkbox" name="Partner-product" id="Partner-product" value="<?php if(isset($_SESSION['SurveyData'])) echo $_SESSION['SurveyData']['Partner-product'];?>" <?php if(isset($_SESSION['SurveyData']) && $_SESSION['SurveyData']['Partner-product']=="1") echo 'checked="checked"';?>> <label for="Partner-product">Partner offers</label>
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
				<div class="row question-boxes"> 
					  <div class="col-lg-12" style="margin: 20px 0;">
						<input class="styled-checkbox" type="checkbox" name="Confirm-policy" id="jprivacy-policy">
						<label for="jprivacy-policy" id="privacypolicyl">Yes. I have read the APA Privacy policy</label>
					  </div>

					  <div class="col-lg-12">
					  	<button class="accent-btn pd-register-submit" type="submit" value="Submit">Submit</button>
					  </div>
				</div>
				   </form>
            </div>
        </div>   
        <?php endif;?>
          	<div id="jobnoticement">
				<div class="flex-container">
					<div class="flex-cell">
						<h3 class="light-lead-heading cairo">We've noticed you're not a physiotherapist.</h3>
					</div>
					<div class="flex-cell">
						<span class="bold">Please note, if a course or event is for registered physiotherapists only, this will be indicated in the event description.</span>
					</div>
					<div class="flex-cell">
					<span class="bold">Please make sure you are attending an event that is open to everyone.</span>
					</div>
				</div>
          </div>  
<!--Sign up Web User-->
<div id="signupWebUser">
<form id="create-webuser-form" action="pd-product?id=<?php echo $pd_detail['MeetingID'];?>" method="POST">
		<input type="hidden" name="CreateUser" value=""/>
		    <div class="down33" style="display:block;">
			<div class="row"><h4 class="modal-title">Don’t have an account? Please register below:</h4></div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">
                    <div class="row">
                        <div class="col-lg-3">
				            <label for="prefix">Prefix</label>
							<?php 
							$Prefixcode  = file_get_contents("sites/all/themes/evolve/json/Prefix.json");
							$Prefix=json_decode($Prefixcode, true);
							?>
							<div class="chevron-select-box">
								<select class="form-control" id="Prefix" name="Prefix">
								<option value="" selected disabled>Please select</option>
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
                           <input type="text" class="form-control"  name="Firstname" required>
						</div>
						
                        <div class="col-lg-6">
                           <label for="">Last name<span class="tipstyle">*</span></label>
                           <input type="text" class="form-control" name="Lastname" required>
                        </div>
					 </div>
					 
                    <div class="row">
                        <div class="col-lg-6">
                           <label for="">Birth date<span class="tipstyle">*</span></label>
                           <input type="date" class="form-control" name="Birth" required max="<?php $nowDate = date('Y-m-d', strtotime('-1 year'));echo $nowDate;?>">
                        </div>
                        <div class="col-lg-3">
						   <label for="">Gender</label>
						   	<div class="chevron-select-box">
								<select class="form-control" id="Gender" name="Gender">
								<option value="" selected disabled>Please select</option>
								<?php
										$Gendercode  = file_get_contents("sites/all/themes/evolve/json/Gender.json");
										$Gender=json_decode($Gendercode, true);						
										foreach ($Gender as $key => $value) {
											echo '<option value="' . $Gender[$key]['ID'] . '"';
											echo '> ' . $Gender[$key]['Description'] . ' </option>';
										}
									?>
								</select>
							</div>
                        </div>
					</div>
					
					<div class="row">
					<div class="col-lg-6">
						<label for="">User ID (Your email address)<span class="tipstyle">*</span></label>
						<input type="email" class="form-control" name="Memberid" id="Memberid" value="" onchange="checkEmailFunction(this.value)" required>
					<div id="checkMessage" class="display-none">This email address matches one that’s already registered, please use a different one or <a class="info" data-target="#loginAT" data-toggle="modal" type="button">
				    <i class="Log-in">&nbsp;</i>login 
				    </a>to your existing account.</div>
					<script>
					function checkEmailFunction(email) {
						$.ajax({
						url:"../sites/all/themes/evolve/inc/jointheAPA/jointheAPA-checkEmail.php", 
						type: "POST", 
						data: {CheckEmailID: email},
						success:function(response) { 
						var result = response;
						if(result=="T"){
							//$('#checkMessage').html("this email address has already registered, please use another one");
							$('#checkMessage').removeClass("display-none");
							$( "#Memberid" ).focus();
							$("#Memberid").css("border", "1px solid red");
							//$(".join-details-button2").addClass("display-none");
							$(".accent-btn").addClass("stop");
							
						}
						else{
							$('#checkMessage').html("");
							$( "#Memberid" ).blur();
							$("#Memberid").css("border", "");
							//$(".join-details-button2").removeClass("display-none");
							$(".accent-btn").removeClass("stop");
						}					
						}
						});
						}
					</script>
					</div>
					<div class="col-lg-6">
						<label for="">Confirm your email address<span class="tipstyle">*</span></label>
						<input type="email" class="form-control" name="CMemberid" id="CMemberid" value="" onchange="confirmEmailFunction(this.value)" required>
					<div id="confirmMessage"></div>
					</div>
					<script>
						function confirmEmailFunction(Email) {
							if($('#Memberid').val()!= Email){
								$('#confirmMessage').html("These emails do not match");
								$( "#CMemberid" ).focus();
								$("#CMemberid").css("border", "1px solid red");
								$(".join-details-button2").addClass("display-none");
								
							}
							else{
								$('#confirmMessage').html("");
								$( "#CMemberid" ).blur();
								$("#CMemberid").css("border", "");
								$(".join-details-button2").removeClass("display-none");
							}					
						}
					</script>
				</div>

				<div class="row">
					<div class="col-lg-6">
						<label for="">Your password<span class="tipstyle">*</span></label> 
						<input type="password" class="form-control" id="newPassword" name="newPassword" pattern=".{8,}" required title="8 characters minimum" placeholder="8 characters minimum" onkeyup="PasswordFunction(this.value)">
						<div id="PasswordMessage"></div>
					</div>
					
					<div class="col-lg-6">
						<label for="">Confirm password<span class="tipstyle">*</span></label>
						<input type="password" class="form-control" id="Password" name="Password" value="" pattern=".{8,}" required title="8 characters minimum" placeholder="8 characters minimum" onkeyup="checkPasswordFunction(this.value)" required>
					<div id="checkPasswordMessage"></div>
					</div>
					
				<script>
				    function PasswordFunction(ps){
						if($('#newPassword').val().length <= 7){
							$('#PasswordMessage').html("8 characters minimum");
							$( "#newPassword" ).focus();
							$("#newPassword").css("border", "1px solid red");
							$(".join-details-button2").addClass("display-none");
							
						}
						else{
							$('#PasswordMessage').html("");
							$( "#newPassword" ).blur();
							$("#newPassword").css("border", "");
							$(".join-details-button2").removeClass("display-none");
						}					
					}
				   	function checkPasswordFunction(Password) {
						if($('#newPassword').val()!= Password){
							$('#checkPasswordMessage').html("Your passwords do not match");
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
					<div class="col-xs-12"><span class="light-lead-heading cairo">Residential address:</span></div>				
					<div class="row">
						<div class="col-xs-12">
						   <label for="">Building name</label>
						   <input type="text" class="form-control"  name="BuildingName">
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
						   <label for="">PO Box</label>
						    <input type="text" class="form-control" name="Pobox">
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<label for="">Address line 1<span class="tipstyle">*</span></label>
							<input type="text" class="form-control"  name="Address_Line_1" >
						</div>

						<div class="col-lg-12">
							<label for="">Address line 2</label>
							<input type="text" class="form-control" name="Address_Line_2">
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12">
							<label for="">City or town<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Suburb" required>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-3">
							<label for="">Postcode<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Postcode" required>
						</div>
						<div class="col-lg-3">
							<label for="">State</label>
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
									if($country[$key]['ID']=="14"){echo "selected='selected'";}
									echo '> '.$country[$key]['Country'].' </option>';
									
								}
								?>
								</select>
							</div>
						</div>
					</div>
					            			
				</div>
                	
				
            </div>
			<div class="col-lg-12">
				<button class="accent-btn" type="submit" value="Submit">Submit</button>
			</div>
				<!--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">  <a href="javascript:document.getElementById('your-detail-form').submit();" class="join-details-button4" style="width: 100%; margin-top: 10px;"><span class="dashboard-button-name">Submit</span></a></div>-->
		
    </form>

</div>

<!--End Sign up Web User-->
<!--Member update detail-->
 <?php if(isset($details)): ?>
<div id="registerPDUser">
	<h3>Please confirm a few details before adding this event to your cart</h2>
	<form action="pd-product?id=<?php echo $pd_detail['MeetingID'];?>" method="POST" autocomplete="off" >
		<input type="hidden" name="updateDetail">
		<input type="hidden" name="meetingID" value="<?php echo $pd_detail['MeetingID'];?>"> 
		<input type="hidden" name="productID" value="<?php echo $pd_detail['ProductID'];?>"> 
	    <input type="hidden" name="type" value="PD">
	    <input type="hidden" name="Couponcode" value="<?php echo $Couponcode;?>"> 
		<!---Hidden home address and billing address Start from here-->
		<input type="hidden" name="BuildingName" <?php if (empty($details['Unit'])) {echo "placeholder='Building Name'";}   else{ echo 'value="'.$details['BuildingName'].'"'; }?>>
		<input type="hidden" name="Pobox" <?php if (!empty($details['Unit'])) {echo "placeholder='PO box'";}   else{ echo 'value="'.$details['Pobox'].'"'; }?>>
		<input type="hidden" name="Address_Line_1" id="Address_Line_1" <?php if (empty($details['Unit'])) {echo "placeholder='Address line 1'";}   else{ echo 'value="'.$details['Unit'].'"'; }?>>
		<input type="hidden" name="Address_Line_2" id="Address_Line_2" <?php if (empty($details['Street'])) {echo "placeholder='Address line 2'";}   else{ echo 'value="'.$details['Street'].'"'; }?>>
		<input type="hidden" name="Suburb"  <?php if (empty($details['Suburb'])) {echo "placeholder='City or town'";}   else{ echo 'value="'.$details['Suburb'].'"'; }?>>
		<input type="hidden" name="Postcode" id="Postcode" <?php if (empty($details['Postcode'])) {echo "placeholder='Postcode'";}   else{ echo 'value="'.$details['Postcode'].'"'; }?>>
		<input type="hidden" name="State" value="<?php echo $details['State'];?>">
		<input type="hidden" name="Country" value="<?php echo $details['Country'];?>">
	    <input type="hidden" name="Billing-BuildingName" value="<?php if(!empty($details['Billing-Unit'])) {echo $details['BuildingName1'];}?>">
		<input type="hidden" name="Billing-Address_Line_1" value="<?php echo $details['Billing-Unit'];?>">
		<input type="hidden" name="Billing-Address_Line_2" value="<?php echo $details['Billing-Street'];?>">
		<input type="hidden" name="Billing-Pobox" value="<?php if(empty($details['Billing-Unit'])){echo $details['BuildingName1'];}?>">
		<input type="hidden" name="Billing-Suburb" value="<?php echo $details['Billing-Suburb'];?>">
		<input type="hidden" name="Billing-Postcode" value="<?php echo $details['Billing-Postcode'];?>">
		<input type="hidden" name="Billing-State" value="<?php echo $details['Billing-State'];?>">
		<input type="hidden" name="Billing-Country" value="<?php echo $details['Billing-Country'];?>">
		<!---Hidden home address and billing address End here-->
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
		<div class="row">
		   <div class="col-lg-12">
				<input class="styled-checkbox" type="checkbox" name="Professionalinsurance" id="Professional-insurance1"  required>
				<label for="Professional-insurance1">I have current and adequate professional indemnity insurance.</label>
		   </div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<label>Your dietary requirements</label>
				<select id="Dietary" name="Dietary[]" multiple>
				
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

	 <input id="go-to-cart" class="accent-btn" style="margin-top: 10px;" type="submit" value="Go to my cart">

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
			<span class="small-heading">Price:</span>
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
						$valuet = number_format($value,2);
						echo $key.":&nbsp;$".$valuet."<br>";
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
				$Div = $Totalnumber - $Enrollednumber;
				if(strtotime($Now) > strtotime(str_replace("/","-",$pd_detail['Close_date']))){
					echo "Closed";  
					$fullStatus = true;
				} elseif($Div <= 5){
					echo "Almost Full"; 
				} elseif($Div==0){
					echo "Full"; 
					$fullStatus = true;
				} elseif($Div >= 5){
					echo "Open"; 
				}
				/* for 10% or less logic 
				$Div = $Enrollednumber/$Totalnumber;
				if(strtotime($Now) > strtotime(str_replace("/","-",$pd_detail['Close_date']))){
					echo "Closed";  
					$fullStatus = true;
				} elseif($Div>=0.9 && $Div<1){
					echo "Almost Full"; 
				} elseif(($Totalnumber-$Enrollednumber)==0){
					echo "Full"; 
					$fullStatus = true;
				} elseif($Div<0.9){
					echo "Open"; 
				} */
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
					echo '<a id="login" data-target="#loginAT" data-toggle="modal">Login to see your status</a>';
					//echo '<a class="info" data-target="#loginAT" data-toggle="modal" type="button">Login to see your status</a>';
				}
				?>
			</span>
		</div>

		<div class="session-cta <?php echo $pd_detail['Typeofpd']; ?>">
			<!--<a class="add-to-wishlist"><span>Add to Wishlist</span></a>-->
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
							echo '<span class="add-to-cart student-disable '.$pd_detail['Typeofpd'].'" data-target="#student-limitation">Not available to students</span>';
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
			<span class="small-heading">Price:</span>
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
						/*
						$x = explode(" ", $key);
						if(count($x) == 1) {
							$y = $key;
						} else {
							$y = str_replace($x[0], "", $key);
						}
						*/
						$valuet = number_format($value,2);
						echo $key.":&nbsp;$".$valuet."<br>";
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
				$Div = $Totalnumber - $Enrollednumber;
				if(strtotime($Now) > strtotime(str_replace("/","-",$pd_detail['Close_date']))){
					echo "Closed";  
					$fullStatus = true;
				} elseif($Div <= 5){
					echo "Almost Full"; 
				} elseif($Div==0){
					echo "Full"; 
					$fullStatus = true;
				} elseif($Div >= 5){
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
				<!--h2 class="blue-heading">Presenters</h2-->
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

<?php if (false): //!empty($pd_detail['Learning_outcomes'])): ?>
	<div class="acordian-label">Learning outcomes</div>
	<div class="accordian-content">
			<div class="section flex-cell" style="flex-wrap: unset">
				<div class="left-icon">
					<span class="learning-outcome-icon large-icon"></span>
				</div>
				<div class="right-content">
					<h2 class="blue-heading">Learning outcomes</h2>
					<ul>
					<?php foreach($pd_detail['LearningOutcomes'] as $outcomes) {
						echo "<li>".$outcomes['LearningOutcomes']."</li>";
					} ?>
					</ul>
				</div>
			</div>
	</div>
<?php endif; ?>

<?php if (!empty($pd_detail['LearningOutcomes'])): ?>
	<div class="acordian-label">Learning outcomes</div>
	<div class="accordian-content">
			<div class="section flex-cell" style="flex-wrap: unset">
				<div class="left-icon">
					<span class="learning-outcome-icon large-icon"></span>
				</div>
				<div class="right-content">
					<h2 class="blue-heading">Learning outcomes</h2>
					<ul>
					<?php foreach($pd_detail['LearningOutcomes'] as $outcomes) {
						echo "<li>".$outcomes['LearningOutcomes']."</li>";
					} ?>
					</ul>
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
					<ul>
					<?php 
						$seperatedPre = explode(",",$pd_detail['Prerequisites']);
						if(sizeof($seperatedPre) == 1) {
							echo "<li>".$pd_detail['Prerequisites']."</li>";
						} else {
							foreach($seperatedPre as $prSep) {
								echo "<li>".$prSep."</li>";
							}
						}
					?>
					</ul>
				</div>
			</div>
	</div>
<?php endif; ?>

</div>

		<div class="extra-info">
			<span>By registering for this course, you agree to the <a href="">APA Events Terms and Conditions.</a></span>
			<span>You could save $55 on future courses by joining an <a href="/membership/national-groups">APA National Group.</a> Pay $54 today and keeping saving on PD throughout the year.</span>
		</div>
	</div>

	</section>
  
</div> 
<div id="privacypolicyWindow" style="display:none;">
	<div class="modal-header">
		<button type="button" class="apa_policy_button close" data-dismiss="modal">×</button>
		<h4 class="modal-title">Australian Physiotherapy Association Privacy Policy</h4>
	</div>
	
	<div class="modal-body">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  
	<span class="note-text" style="display: block">Please scroll down to accept the full terms and conditions of this guide</span>
	<h5 class="doc-header">Our Commitment to Your Privacy</h5>



<p>Your privacy is very important to the Australian Physiotherapy Association (APA). As part of the normal operation of this site, the APA may collect certain information from you. This privacy policy details what information the APA collects, how it uses that information and what your rights are regarding any information that you supply to it. The APA is subject to the requirements of applicable Australian law and strives to meet the requirements of the Australian Privacy Principles.</p>



<h5 class="doc-header">Your information and Your Right to Privacy</h5>



<p>You can elect to provide as much or as little information as you choose although the APA requires a minimum set of information to provide access to its site. What you provide is your choice.</p>

<p>
The APA will under no circumstances sell, trade or rent any personal information that you supply to it to any third party. The APA has partnerships with commercial organisations and those partners will, from time to time, request that the APA send information to people on the APA database as part of the partnership. Any APA or partner information is sent by the APA and data is not provided to any third party. In short, information you supply to the APA stays with the APA. The APA may disclose personal information to the following third parties to satisfy standard operating procedures of the APA:</p>



<ul>
	<li>IT service providers</li>
	<li>Marketing and communications agencies</li>
	<li>Agencies that conduct member surveys on our behalf</li>
	<li>Mailing houses</li>
	<li>Printers that print and distribute our publications and marketing material</li>
</ul>



<p>By using the site and the APA’s services, you acknowledge and accept that it will use your personal data as set out in this privacy policy. If you do not accept this privacy policy, please immediately stop using the site and/or the APA’s services or any part of them. In these circumstances, you will not be able to register or purchase anything further using the site.</p>



<p>APA is the controller responsible for your personal data. It has appointed a privacy officer who is responsible for overseeing issues of privacy. If you have any questions about this privacy policy, including requests to exercise your legal rights, please contact the privacy officer at privacy@physiotherapy.asn.au.</p>



<p>The site may include links to third-party websites, plug-ins and applications. Clicking on those links or enabling those connections may allow third parties to collect or share data about you. We do not control these third-party websites and are not responsible for their privacy statements. We strongly recommend you read the privacy policy of every website you visit.</p>



<p>APA adheres to the principles set out in data protection legislation when handling personal data. These principles require personal data to be:</p>



<ul>
	<li>Processed lawfully, fairly and in a transparent manner</li>
	<li>Collected only for specified, explicit and legitimate purposes</li>
	<li>Adequate, relevant and limited to what is necessary in relation to the purposes for which it is processed</li>
	<li>Accurate and where necessary kept up to date</li>
	<li>Not kept in a form which permits identification of data subjects for longer than is necessary for the purposes for which the data is processed</li>
	<li>Processed in a manner that ensures its security using appropriate technical and organisational measures to protect against unauthorised or unlawful processing and against accidental loss, destruction or damage</li>
	<li>Not transferred to another country without appropriate safeguards being in place</li>
	<li>Made available to data subjects and allow data subjects to exercise certain rights in relation to their personal data</li>
</ul>



<p>The APA is also responsible and accountable for ensuring that it can demonstrate compliance with the data protection principles listed above.</p>



<h5 class="doc-header">Collecting Information</h5>

<p>The APA may collect, use, store and transfer different kinds of personal data about you. It collects and process personal data about you when you:</p>



<ul>
	<li>Access and use the site and its services</li>
	<li>Register an account on the site</li>
	<li>Leave a comment on the site</li>
	<li>Place an advertisement on the site</li>
	<li>Buy a product through the site</li>
	<li>Make an enquiry about a particular product on the site</li>
	<li>submit a general enquiry to the APA</li>
	<li>Enter a competition</li>
	<li>Create a wish list on the site</li>
	<li>Subscribe to the APA’s newsletter</li>
	<li>Leave your feedback or review on the site</li>
	<li>Manage your marketing preferences with the APA</li>
	<li>Make a payment through the site</li>
</ul>



<p>The APA may hold the following information about you:</p>



<ul>
	<li>Name, address, telephone number(s)</li>
	<li>Date of birth</li>
	<li>Racial or ethnic origin</li>
	<li>Email address</li>
	<li>Occupation</li>
	<li>Transaction details associated with services we have provided to you</li>
	<li>Additional information provided by us to you</li>
	<li>Information you have provided to us via client surveys</li>
</ul>



<p>The APA may also collect, use and share aggregated data such as statistical or demographic data. Aggregated data derived from your personal data but is not considered personal data under data protection law as it does not directly or indirectly reveal your identity. For example, the APA may aggregate data about your use of the site to calculate the percentage of users accessing a specific feature. Likewise, the APA may aggregate data that it collects through your use of the site in order to produce certain benchmarking reports. However, if the APA combines or connects aggregated data with your personal data so that it can directly or indirectly identify you, the APA treats the combined data as personal data which will be used in accordance with this privacy policy.</p>



<h5 class="doc-header">Access to Personal Information</h5>



<p>You have the right to review and alter any personal membership information that the APA stores about you. After all, it is your information, so you should be the person that controls it.&nbsp;Should you wish to access this information please&nbsp;contact the APA’s privacy officer. Unless the access you request will require special steps or significant resources, there will be no charge for providing you with this access.</p>



<p>To change your personal information you must login to your account with your unique login and password via the APA website <a target="_blank" style="color: #000; text-decoration: underline" href="http://www.physiotherapy.asn.au">www.physiotherapy.asn.au</a>.</p>



<h5 class="doc-header">Opt-Out</h5>

<p>By choosing to register on the APA web site or as a member of the APA, you may receive information from the APA about membership, APA services, partner information and offers. The APA uses this method to communicate quickly with you. You have the right to refuse inclusion on a mailing list. You can make a request to remove your email address from a mailing list by contacting the privacy officer at <a target="_self" style="text-decoration: underline; color: #000" href="mailto:privacy@physiotherapy.asn.au">privacy@physiotherapy.asn.au</a>.</p>



<p>The APA uses your email address, your mailing address and phone number to contact you regarding administrative notices, publications, and communications relevant to your use of the site and your APA membership. If you do not wish to receive these communications, you have the ability to opt out by contacting the privacy officer at <a target="_self" style="text-decoration: underline; color: #000" href="mailto:privacy@physiotherapy.asn.au">privacy@physiotherapy.asn.au</a>.</p>


<p>From time to time, the APA arranges mailings using the contact information you have provided, from its business partners (including corporate partners and endorsed product manufacturers/suppliers). These mailings aim to provide you with information and benefits available to you.</p>



<p>If you do not wish to receive information from APA's business partners you should advise your local APA Branch or notify the APA’s privacy officer at <a target="_self" style="text-decoration: underline; color: #000" href="mailto:privacy@physiotherapy.asn.au">privacy@physiotherapy.asn.au</a>. For any information about privacy, please contact the APA’s privacy officer by phoning <a target="_self" style="text-decoration: underline; color: #000" href="tel:03 9092 0888">03 9092 0888</a> or by email <a target="_self" style="text-decoration: underline; color: #000" href="mailto:privacy@physiotherapy.asn.au">privacy@physiotherapy.asn.au</a>.</p>



<h5 class="doc-header">Cookies</h5>

<p>
As part of the normal operation of this site, your internet browser will be sent a "cookie" (a temporary internet file). This cookie enhances the site's functionality with features such as membership logon and electronic ordering. By itself, this cookie can only identify your computer to APA’s server; it is not used to identify you personally.</p>

<p>
Your personal password to access the APA website protects your privacy. We recommend that you do not disclose, share or reveal this password to any other individual.</p>



<h5 class="doc-header">Change of Purpose</h5>



<p>It is not anticipated that any information will be disclosed to overseas recipients.&nbsp;If this were to change this page will be updated.</p>



<p>From time to time, the APA may decide to collect different kinds of information. When this occurs, the APA will update this privacy page.</p>

<h5 class="doc-header">Privacy Enquires</h5>



<p>You have the right to complain regarding any aspect of your privacy rights.&nbsp;If you have a complaint please contact the privacy officer at <a target="_self" style="text-decoration: underline; color: #000" href="mailto:privacy@physiotherapy.asn.au">privacy@physiotherapy.asn.au</a> or on <a target="_self" style="text-decoration: underline; color: #000" href="tel:03 9092 0888">03 9092 0888</a>.</p>



<h5 class="doc-header">APA Membership</h5>

<p>If you decide to become a member of the APA, and we hope that you do, the APA will ask you for additional personal details. You may also opt to provide the APA with more information such as special interest areas you may have where you are employed and your date of birth. Relevant information is disclosed to the public on the internet via the APA's 'Find a Physio' online searchable database only. You must approve the use of your details on this database. Whether you decide to use this service is your choice.</p>

<h5 class="doc-header">Security</h5>

<p>Your information is stored on the APA's server located in a secure data housing facility. While, it is important to recognise that "perfect security" does not exist on the internet, the APA is committed to using industry standard mechanisms to safeguard the confidentiality of your personal information such as firewalls and Secure Socket Layers.&nbsp;&nbsp;</p>

<h5 class="doc-header">Credit Card Information</h5>

<p>The APA does not permanently store credit card information anywhere on this site.&nbsp;&nbsp;</p>

<h5 class="doc-header">APA Members Privacy</h5>

<p>The APA has a strong commitment to protecting your privacy and ensuring the confidentiality and security of personal information provided to the APA by you. As an organisation with an annual turnover of more than $3 million, the APA is required to comply with the Privacy Act 1988 as amended by the Privacy Amendment (Enhancing Privacy Protection) Act 2012 which came into effect in March 2014.<br />
&nbsp;<br />
You have the right to access the personal information about yourself held by the APA and to correct information which is inaccurate. To change your information you must log into your account with your unique login and password via the APA website <a href="http://www.physiotherapy.asn.au" target="_blank" style="text-decoration: underline; color: #000">www.physiotherapy.asn.au</a>.</p>

<p>Information you have provided to the APA is used to:&nbsp;</p>

<ul>
	<li>Process applications and renewals and to update your membership details and profile information</li>
	<li>Notify members and the public that you have met our requirements for credentialing (e.g. specialisation or titling)</li>
	<li>Provide information to consumers and others on the availability of physiotherapy services</li>
	<li>Conduct market research in order to identify and analyse the ongoing needs of APA members</li>
	<li>Ensure compliance with the APA's Constitution and Regulations</li>
	<li>Provide you with APA publications and information</li>
	<li>Provide you with access to and information about current and future member benefits</li>
</ul>



<h5 class="doc-header">Consent</h5>



<p>You acknowledge and agree that by providing your personal and/or sensitive information to the APA that the APA, its related bodies corporate and partners and each of their officers, employees, agents and contractors are permitted to collect, store, use and disclose your personal information in the manner set out in this privacy policy and in accordance with the Australian Privacy Principles.</p>



<h5 class="doc-header">Contact Us</h5>


<p>Please do not hesitate to contact us if you have a concern or issue in relation to how we collect, store, use or disclose your personal information.</p>



<p>If your concern relates to your APA membership or another APA function or service please contact us by email to <a href="mailto:privacy@physiotherapy.asn.au" style="text-decoration: underline; color: #000">privacy@physiotherapy.asn.au</a> or call or mail us at the following address:</p>


<p>Australian Physiotherapy Association<br />
Postal address: PO Box 437 Hawthorn BC VIC 3122<br />
Telephone: 1300 306 622<br />
Facsimile: (03) 9092 0899</p>

	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 

		<input class="styled-checkbox" type="checkbox" id="privacypolicyp" checked name="privacy-policy"> 
		<label class="apa_policy_button" for="privacypolicyp">Yes. I’ve read and understand the APA privacy policy</label>
		
	</div>	
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 display-none" id="disagreePolicyDescription"> 
        Please agree to the APA Privacy Policy to continue with your membership
	</div> 
</div>
<div id="installmentpolicyWindow" style="display:none;">
	<h3>APA installment policy</h3>
	
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<span class="note-text" style="display: block">Please scroll down to accept the full terms and conditions of this guide</span>	
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam pretium
	tellus non ex mattis feugiat a in est. Praesent est leo, viverra ac
	hendrerit ac, facilisis at ante. Phasellus elementum hendrerit risus,
	eu luctus dolor sollicitudin vitae. CrasJob ac tellus ut mauris scelerisque
	mollis. Sed nibh ipsum, fringilla sed pellentesque non, luctus ut diam.
	In viverra neque lacus, vel pulvinar nulla convallis id. Curabitur porttitor
	eleifend quam in tincidunt.</p>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  
		
		<input class="styled-checkbox" type="checkbox" id="installmentpolicyp" checked name="instalmentpolicy"> 
		<label class="apa_policy_button" for="installmentpolicyp">Yes. I’ve read and understand the APA installment policy</label>

	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 display-none" id="disagreeInstallmentDescription"> 
         Please agree to the APA Installment Policy to continue with your membership
	</div>
</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default apa_policy_button" id="installment_policy_button">Submit</button>	
	</div>	
</div>

<!-- OVERLAY / LOADING SCREEN -->
<div class="overlay">
	<section class="loaders">
		<span class="loader loader-quart">
		</span>   
	</section>
</div>
<script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<script type="text/javascript">
   jQuery(document).ready(function($) {
		  
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
	   $("#registerMemberForm, ").validate({
            rules: {
              Prefix:{
                required: true,
           },
              Gender: {
                required: true,
           },
         
            Emailaddress: {
                required: true,
            },
            
             Birth: {
                required: true,
			},
			State: {
                required: true,
			},
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
