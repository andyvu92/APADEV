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
if($_GET) {
	if(!is_numeric($_GET["id"])) {
		die("Unauthorized Access");
	}
	foreach(array_keys($_GET) as $keyList) {
		if($keyList == "fbclid") {
			header("Location: /pd/pd-product?id=".$_GET["id"]);
		}
	}
	foreach($_GET as $list) {
		$list = preg_replace('/\//', '', $list);
		if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $list)) {
			die("Unauthorized Access: ");
		}
	}
}

$tag=0;
$pdtype= "Courses and Workshops";
$userRetisterStatus = false;
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
		$LogIn = aptify_get_GetAptifyData("7", $User);
		// once they successfully login, create userID Session
		// and get User's detail data.
		$userId = $LogIn["UserId"];
		$_SESSION["UserId"] = $LogIn["UserId"];
		echo $LogIn["TokenId"];
		$data = "UserID=".$_SESSION["UserId"];
		$details = aptify_get_GetAptifyData("4", $data,"");
		$_SESSION['Dietary'] = $details["Dietary"];
		newSessionStats($details["MemberTypeID"], $details["MemberType"], $details["Status"],$details["PersonSpecialisation"],$details["PaythroughtDate"],$details["Nationalgp"]);
	}
	if(isset($_SESSION["UserId"])){
		if(!isset($details)) {
			$data = "UserID=".$_SESSION["UserId"];
			$details = aptify_get_GetAptifyData("4", $data,"");
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
	$pd_detail = aptify_get_GetAptifyData("29", $pdArr);

	$pd_detail = $pd_detail['MeetingDetails'][0];
	if ($pd_detail['Typeofpd'] == $pdtype){ $tag=1; }
	$prices = $pd_detail['Pricelist'];
	$pricelistGet = Array();
	foreach($prices as $t) {
		$type = $t['MemberType'];
		$pricelistGet[$type] = $t['Price'];
	}
	/**
	 * remove three lines below after 1st Jan 2020.
	 * Remove the condition below for 01.01.2020 one.
	 */
	$StartDate = explode(" ",$pd_detail['Sdate']);
	$SortStart = str_replace('/', '-', $StartDate[0]);
	$ttt = strtotime($SortStart);
	if($pd_detail['IsDistanceDiscountApplied']=="Yes") {
		if($ttt <= strtotime("01.01.2020",date('d/m/Y'))) {
			$type = "Distance Discount";
        	$pricelistGet[$type] = $pd_detail["DistanceDiscount"];
		}
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
	//skip dietary pop up post data
	if(isset($_POST['skipDietaryPOP'])){
		//update PD shopping care
		PDShoppingCart($userID=$_SESSION['UserId'], $productID=$_POST['productID'], $meetingID=$_POST['meetingID'],$type=$_POST['type'],$Coupon=$_POST['Couponcode']);
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
		//if(isset($_POST['Birth'])){ $postData['birth'] = str_replace("-","/",$_POST['Birth']); }else {$postData['birth'] = $details['birth'];}
		if(isset($_POST['birthdate']) && isset($_POST['birthmonth']) && isset($_POST['birthyear'])) {
			$postData['birth'] = $_POST['birthyear']."/".$_POST['birthmonth']."/".$_POST['birthdate'];
		}else {$postData['birth'] = $details['birth'];}
		if(isset($_POST['Gender'])){ $postData['Gender'] = $_POST['Gender']; }else {$postData['Gender'] = $details['Gender'];}
		if(isset($_POST['country-code'])){ $postData['Home-country-code'] = $_POST['country-code']; }else {$postData['Home-country-code'] = $details['Home-phone-countrycode'];}
		if(isset($_POST['area-code'])){ $postData['Home-area-code'] = $_POST['area-code']; }else {$postData['Home-area-code'] = $details['Home-phone-areacode'];}
		if(isset($_POST['phone-number'])){ $postData['Home-phone-number'] = str_replace("-","",$_POST['phone-number']); }else {$postData['Home-phone-number'] = str_replace("-","",$details['Home-phone-number']);}
		if(isset($_POST['Mobile-country-code'])){ $postData['Mobile-country-code'] = $_POST['Mobile-country-code']; } else {$postData['Mobile-country-code'] = $details['Mobile-country-code'];}
		if(isset($_POST['Mobile-area-code'])){ $postData['Mobile-area-code'] = $_POST['Mobile-area-code']; }else {$postData['Mobile-area-code'] = $details['Mobile-area-code'];}
		if(isset($_POST['Mobile-number'])){ $postData['Mobile-number'] = str_replace("-","",$_POST['Mobile-number']); } else {$postData['Mobile-number'] = str_replace("-","",$details['Mobile-number']);}
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

		$postData['Workplaces'] =  $details['Workplaces'] ;

		$postData['PersonEducation'] = $details['PersonEducation'] ;
		// 2.2.5 - Dashboard - update member detail
		// Send -
		// UserID
		// Response - UserID & detail data
		aptify_get_GetAptifyData("5", $postData);
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
			//this field is not used anymore, keep that for database store purpose
			if(isset($_POST['Professionalbody'])){ $CreateNewUserPD["Professionalbody"] = $_POST["Professionalbody"];  }else { $CreateNewUserPD["Professionalbody"] = 0;  }
			//end
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

	if($pd_detail['AttendeeStatus'] == "Registered") {
		$userRetisterStatus = true;
	}

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
			<?php
			$title = "";
			$IsExternal = false;
			if(substr($pd_detail['Title'], 0, 8) == "External") {
				$title = substr($pd_detail['Title'], 8, 999);
				$IsExternal = true;
			} else {
				$title = $pd_detail['Title'];
			}
			?>
			<h1 class="light-lead-heading"><?php echo $title;?></h1>
		</div>

		<div class="section description">
			<div class="content-loading">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
			<div class="pd-description-container">
				<div class="pd-description pd-readmore-content">
					<?php
					if (!empty($pd_detail['Description'])){
						if($pd_detail['Typeofpd'] == "Lecture") {
							echo $pd_detail['Description'];
						}
						else{
							echo $pd_detail['Description'];
						}
					} else{
						echo "<h4>No record found!</h4>";
					}
					?>
				</div>
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
					<h2 class="blue-heading">Prerequisites</h2>
					<ul>
					<?php
						$seperatedPre = explode("_",$pd_detail['Prerequisites']);
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
			<div class="section flex-cell" id="presenters-bio" style="flex-wrap: unset">
				<div class="left-icon">
					<span class="presenters-bio-icon large-icon"></span>
				</div>
				<div class="right-content presenters-bio">
					<h2 class="blue-heading">Presenters</h2>
						<?php
						foreach($pd_detail['Presenter'] as $bios) {
							echo '<h4>'.$bios['SpeakerID_Name'].'</h4><br>';
							echo '<div class="content-loading">
									<div class="line"></div>
									<div class="line"></div>
									<div class="line"></div>
								</div>'	;
							echo '<div class="presenters-readmore-content">'.$bios['Comments'].'</div>';
						}
						?>

				</div>
			</div>
		<?php endif; ?>

		<?php
			$bdate = explode(" ",$pd_detail['Sdate']);
			$edate = explode(" ",$pd_detail['Edate']);
			$dateOutput = "";
			$timeOutput = "";
			$bUdate = str_replace('/', '-', $bdate[0]);//$bdate[0];//
			$eUdate = str_replace('/', '-', $edate[0]);//$edate[0];//
			$t = strtotime($bUdate);
			$j = strtotime($eUdate);
			$q = strtotime($bdate[1]);
			$r = strtotime($edate[1]);
			$dateStart = date("d",$t);
			$timeOutput = date("h:i",$q).$bdate[2]." - ".date("h:i",$r).$edate[2];
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

			function replaceAll($stringInput) {
				$Outputstring = $stringInput;
				$Outputstring = preg_replace("#(<[a-z ]*)(style=('|\")(.*?)('|\"))([a-z ]*>)#", '', $Outputstring);
				$Outputstring = preg_replace('#(</[a-z ]*>)#', '', $Outputstring);
				$Outputstring = preg_replace('#(<[a-z ]*>)#', '', $Outputstring);
				$Outputstring = str_replace(">","",$Outputstring);
				$Outputstring = preg_replace("/style=\\'[^\\']*\\'/", '', $Outputstring);
				return $Outputstring;
			}

		 ?></p></div>
		 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><h3>When:</h3><p><?php //echo $bdata[1]."-".$edata[1]; ?></p><p><?php //echo $bdata[0]." - ".$edata[0] ; ?></p></div>
		 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><h3>Registration closing date:</h3><p><?php //echo $pd_detail['Close_date']; ?></p></div>
		 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<h3>Where:</h3>
			<p><?php //echo $pd_detail['AddressLine1']." ".$pd_detail['AddressLine2']." ".$pd_detail['AddressLine3']; ?><br />
			<?php //echo $pd_detail['City']." ".$pd_detail['State']." ".$pd_detail['PostalCode']; ?><br><a >View map</a></p></div>

		 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><h3>CPD hours:</h3><p><?php //echo $pd_detail['CPD']; ?></p></div>
		 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><h3>Cost:</h3><p>

		 </p></div>
		 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><h3>Your registration status:</h3><p>
		 </p></div>
		 <p>&nbsp;</p>

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

	<!-- MAP POPUP -->
	<div id="myMap">
		<span class="close-popup"></span>
		<div class="map-container">
			<h4 class="modal-title">Event location</h4>

			<?php
			if(strlen($pd_detail['AddressLine1']) > 5){
				echo ' <iframe
				width="600"
				height="450"
				frameborder="0" style="border:0"
				src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBUXY9mb7uoQp8PtmLH8tNkLvr7Vdm6xAQ
					&q='.$pd_detail['AddressLine1']." ".$pd_detail['AddressLine2']." ".$pd_detail['City']." ".$pd_detail['State']." ".$pd_detail['PostalCode'].'" allowfullscreen>
				</iframe>';
			}
			?>
		</div>

    </div>

	  <?php if(isset($details)): ?>
	  <?php
		/*hanled survey data session */
		$now = time();
		if (isset($_SESSION['expire']) && $now > $_SESSION['expire']) {
            unset($_SESSION['SurveyData']);
        }
	  ?>

	<!-- NON-MEMBER ADD TO CARD PD FORM -->
	<div id="registerMember-container">
		<span class="close-popup"></span>
	  <div id="registerMember">
            <form action="pd-product?id=<?php echo $pd_detail['MeetingID'];?>" method="POST" id="registerMemberForm">
			    <input type="hidden" name="updateDetail">
				<input type="hidden" name="updateNonMemberDetail">
				<input type="hidden" name="meetingID" value="<?php echo $pd_detail['MeetingID'];?>">
				<input type="hidden" name="productID" value="<?php echo $pd_detail['ProductID'];?>">
			    <input type="hidden" name="type" value="PD">
				<input type="hidden" name="Couponcode" value="<?php echo $Couponcode;?>">
				<div class="down20">
				   <div class="row"><h4 class="modal-title">Don't have an account? Please sign up below:</h4></div>
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
							<input type="text" class="form-control"  name="BuildingName" <?php if (empty($details['Unit'])) {echo "placeholder='Building name'";}   else{ echo 'value="'.$details['BuildingName'].'"'; }?> autocomplete="Building-Name">
						</div>

						<div class="col-lg-6">
							<label for="">PO Box</label>
							<input type="text" class="form-control" name="Pobox" placeholder="PO Box" <?php if (!empty($details['Unit'])) {echo "placeholder='PO box'";}   else{ echo 'value="'.$details['BuildingName'].'"'; }?> autocomplete="Pobox">
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12">
							<label for="">Address line 1<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Address_Line_1"  <?php if (empty($details['Unit'])) {echo "placeholder='Address line 1'";}   else{ echo 'value="'.$details['Unit'].'"'; }?> autocomplete="address-line1">
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12">
							<label for="">Address line 2</label>
							<input type="text" class="form-control" name="Address_Line_2"  <?php if (empty($details['Street'])) {echo "placeholder='Address line 2'";}   else{ echo 'value="'.$details['Street'].'"'; }?> autocomplete="address-line2">
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12">
							<label for="">City or town<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Suburb" placeholder='City or town'<?php if (empty($details['Suburb'])) {echo "placeholder='City or town'";}   else{ echo 'value="'.$details['Suburb'].'"'; }?> autocomplete="address-level2">
						</div>
					</div>

					<div class="row">
						<div class="col-lg-3">
							<label for="">Postcode<span class="tipstyle">*</span></label>
							<input type="number" class="form-control" name="Postcode" placeholder='Postcode' <?php if (empty($details['Postcode'])) {echo "placeholder='Postcode'";}   else{ echo 'value="'.$details['Postcode'].'"'; }?> autocomplete="postal-code">
						</div>
						<div class="col-lg-3">
							<label for="">State<span class="tipstyle">*</span></label>
							<div class="chevron-select-box">
								<select class="form-control" name="State" autocomplete="address-level1">
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
								<select class="form-control"  name="Country" autocomplete="country">
								<?php
								$countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
								$country=json_decode($countrycode, true);
								usort($country, "cmp");
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
							<div class="flex-col-12">
								<span class="light-lead-heading cairo" style="font-weight: 200">Mailing address</span>
							</div>

							<div class="flex-col-12 align-item-end">
								<input class="styled-checkbox" type="checkbox" id="Shipping-address-join" name="Shipping-address-join" value="0">
								<label style="font-weight: 300;" for="Shipping-address-join">Use my residential address</label>
							</div>
				</div>

				<div id="shippingAddress" class="row">
						<div class="row">
							<div class="col-lg-12">
								<label for="">Building name</label>
								<input type="text" class="form-control"  name="Mailing-BuildingName" <?php if (empty($details['Mailing-unitno'])) {echo "placeholder='Mailing Building Name'";}   else{ echo 'value="'.$details['Mailing-BuildingName'].'"'; }?> autocomplete="Building-Name">
							</div>
							<div class="col-lg-6">
								<label for="">PO Box</label>
								<input type="text" class="form-control" name="Mailing-PObox" placeholder="PO Box" <?php if (!empty($details['Mailing-unitno'])) {echo "placeholder='PO box'";}   else{ echo 'value="'.$details['Mailing-BuildingName'].'"'; }?> autocomplete="Pobox">
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12">
								<label for="">Address line 1<span class="tipstyle">*</span></label>
								<input type="text" class="form-control"  name="Mailing-Address_Line_1" id="Mailing-Address_Line_1" <?php if (empty($details['Mailing-unitno'])) {echo "placeholder='Address line 1'";}   else{ echo 'value="'.$details['Mailing-unitno'].'"'; }?> autocomplete="address-line1">
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12">
								<label for="">Address line 2</label>
								<input type="text" class="form-control" name="Mailing-Address_Line_2" id="Mailing-Address_Line_2" <?php if (empty($details['Mailing-streetname'])) {echo "placeholder='Address line 2'";}   else{ echo 'value="'.$details['Mailing-streetname'].'"'; }?> autocomplete="address-line2">
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12">
								<label for="">City or town<span class="tipstyle">*</span></label>
								<input type="text" class="form-control" name="Mailing-city-town" id="Mailing-city-town" placeholder='Mailing City or Town'<?php if (empty($details['Mailing-city-town'])) {echo "placeholder='Mailing City/Town'";}   else{ echo 'value="'.$details['Mailing-city-town'].'"'; }?> autocomplete="address-level2">
							</div>
						</div>

						<div class="row">
							<div class="col-lg-3">
								<label for="">Postcode<span class="tipstyle">*</span></label>
								<input type="number" class="form-control" name="Mailing-postcode" id="Mailing-postcode" placeholder='Mailing Postcode'<?php if (empty($details['Mailing-postcode'])) {echo "placeholder='Mailing Postcode'";}   else{ echo 'value="'.$details['Mailing-postcode'].'"'; }?> autocomplete="postal-code">
							</div>
							<div class="col-lg-3">
								<label for="">State<span class="tipstyle">*</span></label>
								<div class="chevron-select-box">
									<select class="form-control" name="Mailing-State" id="Mailing-State" autocomplete="address-level1">
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
							</div>
							<div class="col-lg-6">
								<label for="">Country<span class="tipstyle">*</span></label>
								<div class="chevron-select-box">
									<select class="form-control" id="Mailing-Country" name="Mailing-Country" autocomplete="country">
									<?php
									$countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
									$country=json_decode($countrycode, true);
									usort($country, "cmp");
									foreach($country  as $key => $value){

										echo '<option value="'.$country[$key]['Country'].'"';
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

					<div class="row"> <a class="join-details-button21"><span class="dashboard-button-name">Next</span></a></div>
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
								usort($country, "cmp");
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
						<label for="">Phone number<span class="tipstyle"> *</span></label>
						<input type="text" class="form-control" name="phone-number" <?php if (empty($details['Home-phone-number'])) {echo "placeholder='Phone number'";}   else{ echo 'value="'.$details['Home-phone-number'].'"'; }?>  >
					</div>
				</div>

				<div class="row">
				    <div class="col-lg-6">
					<?php $birthdata = explode("/",$details['birth']);?>
						<label for="">Birth date<span class="tipstyle">*</span></label>
						   <div class="dateselect">

                                <div class="chevron-select-box date">
                                    <select class="form-control" name="birthdate">
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
                                    <select class="form-control"  name="birthmonth">
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
                                    <select class="form-control" name="birthyear">
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
				  <label for="Registrationboard">I am registered with my profession's registration board.<span class="tipstyle"> *</span></label>
				   </div>

				   <?php if($tag==1): ?>
						<div class="col-xs-12">
							<input class="styled-checkbox" type="checkbox" name="Professionalinsurance" id="Professional-insurance" value="<?php if(isset($_SESSION['SurveyData'])) echo $_SESSION['SurveyData']['Professionalinsurance'];?>" <?php if(isset($_SESSION['SurveyData']) && $_SESSION['SurveyData']['Professionalinsurance']=="1") echo 'checked="checked"';?>>
							<label for="Professional-insurance">I have current and adequate professional indemnity insurance.<span class="tipstyle"> *</span></label>
						</div>
					<?php endif; ?>
					<?php /*
				   <div class="col-xs-12">
				  <input class="styled-checkbox" type="checkbox" name="Professionalbody" id="Professionalbody" value="<?php if(isset($_SESSION['SurveyData'])) echo $_SESSION['SurveyData']['Professionalbody'];?>" <?php if(isset($_SESSION['SurveyData']) && $_SESSION['SurveyData']['Professionalbody']=="1") echo 'checked="checked"';?>>
				  <label for="Professionalbody">I am a member of my professional body.</label>
				   </div>*/?>
				</div>
                <?php if($tag==1 || $pd_detail['Typeofpd'] =="Networking Event" || $pd_detail['Typeofpd'] =="Student Event"): ?>
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
                <?php endif; ?>
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

				<div class="row question-boxes display-none">
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
						<input class="styled-checkbox" popup type="checkbox" name="Confirm-policy" id="jprivacy-policy">
						<label for="jprivacy-policy" id="privacypolicyl" popup-target="privacypolicyWindow">Yes. I have read the APA Privacy policy<span class="tipstyle"> *</span></label>
					  </div>

					  <div class="col-lg-12">
					  	<button class="accent-btn pd-register-submit" type="submit" value="Submit">Submit</button>
					  </div>
				</div>
				   </form>
			</div>
			<!-- END NON-MEMBER ADD TO CARD PD FORM -->
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

<span class="close-popup"></span>

<form id="create-webuser-form" action="pd-product?id=<?php echo $pd_detail['MeetingID'];?>" method="POST">
		<input type="hidden" name="CreateUser" value=""/>
		    <div class="down33" style="display:block;">
			<div class="row"><h4 class="modal-title">Don’t have an account? Please register below:</h4></div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">
                    <div class="row">
                        <div class="col-lg-6">
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
                           <label for="">Date of birth<span class="tipstyle"> *</span></label>
                            <div class="dateselect">
                                <div class="chevron-select-box date">
                                    <select class="form-control" id="birthdate" name="birthdate" required>
                                        <option value="" selected="" disabled="">Date</option>
                                        <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>                                    </select>
                                </div>
                                <div class="chevron-select-box month">
                                    <select class="form-control" id="birthmonth" name="birthmonth" required>
                                        <option value="" selected="" disabled="">Month</option>
                                        <option value="01">Jan</option>
                                        <option value="02">Feb</option>
                                        <option value="03">Mar</option>
                                        <option value="04">Apr</option>
                                        <option value="05">May</option>
                                        <option value="06">Jun</option>
                                        <option value="07">Jul</option>
                                        <option value="08">Aug</option>
                                        <option value="09">Sep</option>
                                        <option value="10">Oct</option>
                                        <option value="11">Nov</option>
                                        <option value="12">Dec</option>
                                    </select>
                                </div>
                                <div class="chevron-select-box year">
                                    <select class="form-control" id="birthyear" name="birthyear" required>
                                        <option value="" selected="" disabled="">Year</option>
                                        <option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option><option value="1910">1910</option><option value="1909">1909</option><option value="1908">1908</option><option value="1907">1907</option><option value="1906">1906</option><option value="1905">1905</option><option value="1904">1904</option><option value="1903">1903</option><option value="1902">1902</option><option value="1901">1901</option><option value="1900">1900</option>                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
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
					<div id="error-format" class="checkMessage"></div>
					<script>
					function checkEmailFunction(email) {
						if(!isValidEmailAddress(email)) {

							$('#error-format').html("This email address is not valid format");
							$( "#Memberid" ).focus();
							$('#Memberid').css('border', '1px solid #ffa02e');

							$("#create-webuser-form .accent-btn").addClass("stop");
							return;
						}
						else{
							$('#error-format').html("");
							$( "#Memberid" ).blur();
							$("#Memberid").css('border', '');
							$("#create-webuser-form .accent-btn").removeClass("stop");
						}
						$.ajax({
						url:"/apa/checkemail",
						type: "POST",
						data: {CheckEmailID: email},
						success:function(response) {
						var result = response;
						if(result=="T"){

							$('#checkMessage').removeClass("display-none");
							$( "#Memberid" ).focus();
							$("#Memberid").css('border', '1px solid #ffa02e');

							$("#create-webuser-form .accent-btn").addClass("stop");

						}
						else{
							$('#checkMessage').addClass("display-none");
							$( "#Memberid" ).blur();
							$("#Memberid").css('border', '');
							//$(".join-details-button2").removeClass("display-none");
							$("#create-webuser-form .accent-btn").removeClass("stop");
						}
						}
						});
					}
					function isValidEmailAddress(emailAddress) {
						var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
						return pattern.test(emailAddress);
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
								$("#CMemberid").css('border', '1px solid #ffa02e');
								$(".join-details-button2").addClass("display-none");
								$("#create-webuser-form .accent-btn").addClass("stop");
							}
							else{
								$('#confirmMessage').html("");
								$( "#CMemberid" ).blur();
								$("#CMemberid").css('border', '');
								$(".join-details-button2").removeClass("display-none");
								$("#create-webuser-form .accent-btn").removeClass("stop");
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
							$("#newPassword").css("border", "1px solid #ffa02e");
							$("#create-webuser-form .accent-btn").addClass("stop");
						}else if($( "#Password" ).val()!="" && $( "#Password" ).val().length <= 7){
							$('#checkPasswordMessage').html("8 characters minimum");
							$( "#Password" ).focus();
							$("#Password").addClass('focuscss');
							$("#create-webuser-form .accent-btn").addClass("stop");
						}
						else{
							$('#PasswordMessage').html("");

							$("#newPassword").css("border", "");
							$("#create-webuser-form .accent-btn").removeClass("stop");
						}
					}
				   	function checkPasswordFunction(Password) {
						if($('#newPassword').val()!= Password){
							$('#checkPasswordMessage').html("Your passwords do not match");
							$( "#Password" ).focus();
							$("#Password").css("border", "1px solid #ffa02e");
							$("#create-webuser-form .accent-btn").addClass("stop");

						}else if($( "#Password" ).val().length <= 7){
							$('#checkPasswordMessage').html("8 characters minimum");
							$( "#Password" ).focus();
							$("#Password").addClass('focuscss');
							$("#create-webuser-form .accent-btn").addClass("stop");
						}
						else{
							$('#checkPasswordMessage').html("");

							$("#Password").css("border", "");
							$("#create-webuser-form .accent-btn").removeClass("stop");
						}
					}
				</script>
			    </div>
					<div class="row"><span class="light-lead-heading cairo">Residential address:</span></div>
					<div class="row">
						<div class="col-lg-12">
						   <label for="">Building name</label>
						   <input type="text" class="form-control"  name="BuildingName" autocomplete="Building-Name">
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
						   <label for="">PO Box</label>
						    <input type="text" class="form-control" name="Pobox" autocomplete="Pobox">
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<label for="">Address line 1<span class="tipstyle">*</span></label>
							<input type="text" class="form-control"  name="Address_Line_1" autocomplete="address-line1">
						</div>

						<div class="col-lg-12">
							<label for="">Address line 2</label>
							<input type="text" class="form-control" name="Address_Line_2" autocomplete="address-line2">
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12">
							<label for="">City or town<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Suburb" required autocomplete="address-level2">
						</div>
					</div>
					<div class="row">
						<div class="col-lg-3">
							<label for="">Postcode<span class="tipstyle">*</span></label>
							<input type="number" class="form-control" name="Postcode" required autocomplete="postal-code">
						</div>
						<div class="col-lg-3">
							<label for="">State</label>
							<div class="chevron-select-box">
								<select class="form-control" id="State" name="State" autocomplete="address-level1">
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
								<select class="form-control" id="Country" name="Country" autocomplete="country">
								<?php
								$countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
								$country=json_decode($countrycode, true);
								usort($country, "cmp");
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
			<div class="row">
				<button class="accent-btn" type="submit" value="Submit">Submit</button>
			</div>

    </form>

</div>
<!--End Sign up Web User-->
<!--Skip dietary requirement-->
<form id="skipDietaryForm" action="pd-product?id=<?php echo $pd_detail['MeetingID'];?>" method="POST" >
	<input type="hidden" name="skipDietaryPOP">
	<input type="hidden" name="meetingID" value="<?php echo $pd_detail['MeetingID'];?>">
	<input type="hidden" name="productID" value="<?php echo $pd_detail['ProductID'];?>">
	<input type="hidden" name="type" value="PD">
	<input type="hidden" name="Couponcode" value="<?php echo $Couponcode;?>">

</form>
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
		<input class="styled-checkbox" type="checkbox" name="invalidElement" id="invalidElement">
		<?php if($tag==1): ?>
			<div class="row">
				<div class="col-lg-12">
					<input class="styled-checkbox" type="checkbox" name="Professionalinsurance" id="Professional-insurance1"  required>
					<label for="Professional-insurance1">I have current and adequate professional indemnity insurance.</label>
				</div>
			</div>
		<?php endif; ?>
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
	<div class="region region-right-sidebar pd-sidebar col-xs-12 col-sm-12 col-md-3 col-lg-3">
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
					<?php
					$timeZone = "AEST";
					if($pd_detail['State'] == "NT" || $pd_detail['State'] == "SA") {
						$timeZone = "ACST";
					} elseif($pd_detail['State'] == "WA") {
						$timeZone = "AWST";
					} ?>
					<?php echo $timeOutput." ".$timeZone;//$edate[1]."-".$edate[1]; ?>
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
							<a id="viewMap" class="direction" popup-target="myMap">View map</a>
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

				if($prices!="NULL"&& isset($_SESSION["UserId"])){
					if(in_array($pd_detail['Product Cost Without Coupon'],$pricelistGet)) {
						comparePrice($pricelistGet, $pd_detail['Product Cost Without Coupon']);
					}
					else {
						comparePrice($pricelistGet, $pd_detail['Product Cost Without Coupon']);

					}
				} else{
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
				$cldate = str_replace('/', '-', $closingDate[0]);//$closingDate[0];//
				$Cls = strtotime($cldate);
				$ClsDateFinal = date("d M Y",$Cls);
				echo $ClsDateFinal; ?>
			</span>
			<?php if(!$IsExternal): ?>
				<span class="small-heading">Event status:</span>
				<span>
				<?php
					$Totalnumber = doubleval($pd_detail['Totalnumber']);
					$Enrollednumber = doubleval($pd_detail['Enrollednumber']);
					$Now = strtotime(date('m/d/Y'));
					$fullStatus = false;
					$Div = $Totalnumber - $Enrollednumber;
					if($userRetisterStatus) {
						echo "Registered";
						$fullStatus = true;
					} else {
						if($Now > $Cls){
							echo "Closed";
							$fullStatus = true;
						} elseif($Div == 0){
							echo "Full";
							$fullStatus = true;
						} elseif($Div <= 5){
							echo "Almost Full";
						} elseif($Div > 5){
							echo "Open";
						}
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
			<?php endif; ?>

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

			<?php
			if($ttt >= strtotime("01.01.2020",date('d/m/Y'))) {
				if($pd_detail['Typeofpd'] != "Lecture") {
					echo '<span class="small-heading">* Early bird prices close 4 weeks prior to the course start date</span><br>';
				}
			}
			?>

			<span>
				<?php
				if(!$IsExternal) {
					if(isset($userId)&& ($userId!="0")){
						if($userRetisterStatus) {
							echo '<span class="small-heading">Your registration status:</span>';
							echo "Registered";
						} else {
							echo '<span class="small-heading">Your registration status:</span>';
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
					} else{

					}
				}
				?>
			</span>
		</div>

		<div class="session-cta <?php echo $pd_detail['Typeofpd']; ?>">
			<!--<a class="add-to-wishlist"><span>Add to Wishlist</span></a>-->
			<!--<a class="add-to-cart"><span>Add to Card</span></a>-->
			<?php
				if(isset($userId)&& ($userId!="0")){
				}
				else{
					if($IsExternal) {
						echo '<span style="padding: 0;">Registration details for this event can be found in the description</span>';
					} else {
						echo '<div id="login-section">';
						echo '<a id="login" href="#" data-target="#loginAT" data-toggle="modal">Login to register</a>';
						echo "<span>Don't have an account?</span><span class='small-heading'><a id='signup' popup-target='signupWebUser' href='#'>Sign up now</a></span>";
						echo '</div>';
					}
				}
				?>
			<?php
			if(isset($_SESSION["UserId"])){
				//$userTag = checkPDUser($Job, $Professionalbody, $Professionalinsurance, $HearaboutAPA, $Registrationboard, $Dietary, $paymentCardList);
				$userTag = checkPDUser($_SESSION['MemberTypeID']);
				if($IsExternal) {
					echo '<span style="padding: 0;">Registration details for this event can be found in the description</span>';
				} else {
					if($fullStatus) {
						if($userRetisterStatus) {
							echo '<span class="add-to-cart disable '.$pd_detail['Typeofpd'].'">Already registered</span>';
						} else {
							echo '<span class="add-to-cart disable '.$pd_detail['Typeofpd'].'">Registration closed</span>';
						}
					} elseif ($userTag =="0"){ // any logged in users
						if($tag==1) {
							if($_SESSION['MemberTypeID'] =='31' || $_SESSION['MemberTypeID'] =='32') {
								echo '<span class="add-to-cart student-disable '.$pd_detail['Typeofpd'].'" data-target="#student-limitation">Not available to students</span>';
								// student message
							} else {
								echo '<a class="add-to-cart '.$pd_detail['Typeofpd'].'" id="registerPDUserButton"><span>Add to cart</span></a>';
							}
						}
						elseif($pd_detail['Typeofpd'] =="Networking Event" || $pd_detail['Typeofpd'] =="Student Event"){ echo '<a class="add-to-cart '.$pd_detail['Typeofpd'].'" id="registerPDUserButton"><span>Add to cart</span></a>';	}
						else {
							//echo '<a class="add-to-cart '.$pd_detail['Typeofpd'].'" id="registerPDUserButton"><span>Add to cart</span></a>';
							echo '<a class="add-to-cart '.$pd_detail['Typeofpd'].'" id="skipDietary"><span>Add to cart</span></a>';
						}
					} else { // Not-logged in
						echo '<a class="add-to-cart '.$pd_detail['Typeofpd'].'" id="registerNonMember" popup-target="registerMember-container"><span>Add to cart</span></a>';
					}
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

				if($prices!="NULL"&& isset($_SESSION["UserId"])){
					if(in_array($pd_detail['Product Cost Without Coupon'],$pricelistGet)) {
						comparePrice($pricelistGet, $pd_detail['Product Cost Without Coupon']);
					}
					else {
						comparePrice($pricelistGet, $pd_detail['Product Cost Without Coupon']);
						echo "$".number_format($pd_detail['Product Cost Without Coupon'],2);
					}
				} else{
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
				//$closingDate = explode(" ",$pd_detail['Close_date']);
				//$Cls = strtotime($closingDate[0]);
				//$ClsDateFinal = date("d M Y",$Cls);
				echo $ClsDateFinal; ?>

			</span>

			<span class="small-heading">Event status:</span>
			<span>
			<?php
				$Totalnumber = doubleval($pd_detail['Totalnumber']);
				$Enrollednumber = doubleval($pd_detail['Enrollednumber']);
				$Now = strtotime(date('m/d/Y'));
				$Div = $Totalnumber - $Enrollednumber;
				if($userRetisterStatus) {
					echo "Registered";
				} else {
					if($Now > $Cls){
						echo "Closed";
					} elseif($Div == 0){
						echo "Full";
					} elseif($Div <= 5){
						echo "Almost Full";
					} elseif($Div > 5){
						echo "Open";
					}
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

			<?php
			if($ttt >= strtotime("01.01.2020",date('d/m/Y'))) {
				if($pd_detail['Typeofpd'] != "Lecture") {
					echo '<span class="small-heading">* Early bird prices close 4 weeks prior to the course start date</span><br>';
				}
			}
			?>

			<span class="small-heading">Your registration status:</span>
			<span>
				<?php
				if(isset($userId)&& ($userId!="0")){
					if($userRetisterStatus) {
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
				} else{
					echo '<a class="member-login" id="login">Login to register</a>';
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
					<?php
					foreach($pd_detail['Presenter'] as $bios) {
						echo '<h4>'.$bios['SpeakerID_Name'].'</h4><br>';
						echo '<p>'.$bios['Comments'].'</p><br>';
					}
					?>
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
					<h2 class="blue-heading">Prerequisites</h2>
					<ul>
					<?php
						$seperatedPre = explode("_",$pd_detail['Prerequisites']);
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

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Event",
  "name": "<?php echo $title; ?>",
  "startDate": "<?php echo $pd_detail['Sdate']; ?>",
  "endDate": "<?php echo $pd_detail['Edate']; ?>",
  "location": {
    "@type": "Place",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "<?php echo $pd_detail['AddressLine1']." ".$pd_detail['AddressLine2']; ?>",
      "addressLocality": "<?php echo $pd_detail['City']; ?>",
      "postalCode": "<?php echo $pd_detail['PostalCode']; ?>",
      "addressRegion": "<?php echo $pd_detail['State']; ?>",
      "addressCountry": "AU"
    }
  },
  "offers": {
	"@type": "Offer",
	"url": "https://australian.physio/pd/pd-product?id=<?php echo $pdArr["PDIDs"]; ?>"
	},
  <?php
	if (!empty($pd_detail['Description'])){
		$EventDescription = explode("<p",$pd_detail['Description']);
		if(sizeof($EventDescription)>1) {
			$firstLine =  replaceAll($EventDescription[0]);
			$secondLine = replaceAll($EventDescription[1]);
			echo '"description": "'.$firstLine." ".$secondLine.'"';
		} elseif(sizeof($EventDescription) == 1) {
			$firstLine =  replaceAll($EventDescription[0]);
			echo '"description": "'.$firstLine.'"';
		} else {
			echo '"description": "Please visit page for a description"';
		}
	} else{
		echo '"description": "Please visit page for a description"';
	}
	?>
  <?php if(!empty($pd_detail['Presenter'])): ?>
  ,
  "performer":
	<?php
	$PresentSize = sizeof($pd_detail['Presenter']);
	$PresentCounter = 0;
	if($PresentSize > 1): ?>
	[
		<?php
		foreach($pd_detail['Presenter'] as $bios) {
			$PresentCounter++;
			echo '{"@type": "PerformingGroup",';
			echo '"name": "'.$bios['SpeakerID_Name'].'"}';
			if($PresentSize != $PresentCounter) {
				echo ",";
			}
		} ?>
	]
	<?php else: ?>
	{
		"@type": "PerformingGroup",
		"name": "<?php echo $bios['SpeakerID_Name']; ?>"
	}
	<?php endif; ?>
  <?php endif; ?>
}
</script>

</div>
	<div class="extra-info">
		<span>By registering for this course, you agree to the <a href="/pd/terms-and-conditions">APA Events Terms and Conditions.</a></span>
		<span>You could save on future events by joining an <a href="/membership/national-groups">APA National Group</a>. Pay $56 today and keep saving throughout the year.</span>
	</div>
</div>

	</section>

</div>
<div id="privacypolicyWindow" style="display:none;">
	<span class="close-popup"></span>
	<div class="modal-header">
		<h4 class="modal-title">Australian Physiotherapy Association Privacy Policy</h4>
	</div>

	<div class="modal-body">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<span class="note-text" style="display: block">Please scroll down to accept the full terms and conditions of this guide</span>
	<h4 class="doc-header">Our Commitment to Your Privacy</h4>



<p>Your privacy is very important to the Australian Physiotherapy Association (APA). As part of the normal operation of this site, the APA may collect certain information from you. This privacy policy details what information the APA collects, how it uses that information and what your rights are regarding any information that you supply to it. The APA is subject to the requirements of applicable Australian law and strives to meet the requirements of the Australian Privacy Principles.</p>



<h4 class="doc-header">Your information and Your Right to Privacy</h4>



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



<h4 class="doc-header">Collecting Information</h4>

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



<h4 class="doc-header">Access to Personal Information</h4>



<p>You have the right to review and alter any personal membership information that the APA stores about you. After all, it is your information, so you should be the person that controls it.&nbsp;Should you wish to access this information please&nbsp;contact the APA’s privacy officer. Unless the access you request will require special steps or significant resources, there will be no charge for providing you with this access.</p>



<p>To change your personal information you must login to your account with your unique login and password via the APA website <a target="_blank" style="color: #000; text-decoration: underline" href="http://www.physiotherapy.asn.au">www.physiotherapy.asn.au</a>.</p>



<h4 class="doc-header">Opt-Out</h4>

<p>By choosing to register on the APA web site or as a member of the APA, you may receive information from the APA about membership, APA services, partner information and offers. The APA uses this method to communicate quickly with you. You have the right to refuse inclusion on a mailing list. You can make a request to remove your email address from a mailing list by contacting the privacy officer at <a target="_self" style="text-decoration: underline; color: #000" href="mailto:privacy@physiotherapy.asn.au">privacy@physiotherapy.asn.au</a>.</p>



<p>The APA uses your email address, your mailing address and phone number to contact you regarding administrative notices, publications, and communications relevant to your use of the site and your APA membership. If you do not wish to receive these communications, you have the ability to opt out by contacting the privacy officer at <a target="_self" style="text-decoration: underline; color: #000" href="mailto:privacy@physiotherapy.asn.au">privacy@physiotherapy.asn.au</a>.</p>


<p>From time to time, the APA arranges mailings using the contact information you have provided, from its business partners (including corporate partners and endorsed product manufacturers/suppliers). These mailings aim to provide you with information and benefits available to you.</p>



<p>If you do not wish to receive information from APA's business partners you should advise your local APA Branch or notify the APA’s privacy officer at <a target="_self" style="text-decoration: underline; color: #000" href="mailto:privacy@physiotherapy.asn.au">privacy@physiotherapy.asn.au</a>. For any information about privacy, please contact the APA’s privacy officer by phoning <a target="_self" style="text-decoration: underline; color: #000" href="tel:03 9092 0888">03 9092 0888</a> or by email <a target="_self" style="text-decoration: underline; color: #000" href="mailto:privacy@physiotherapy.asn.au">privacy@physiotherapy.asn.au</a>.</p>



<h4 class="doc-header">Cookies</h4>

<p>
As part of the normal operation of this site, your internet browser will be sent a "cookie" (a temporary internet file). This cookie enhances the site's functionality with features such as membership logon and electronic ordering. By itself, this cookie can only identify your computer to APA’s server; it is not used to identify you personally.</p>

<p>
Your personal password to access the APA website protects your privacy. We recommend that you do not disclose, share or reveal this password to any other individual.</p>



<h4 class="doc-header">Change of Purpose</h4>



<p>It is not anticipated that any information will be disclosed to overseas recipients.&nbsp;If this were to change this page will be updated.</p>



<p>From time to time, the APA may decide to collect different kinds of information. When this occurs, the APA will update this privacy page.</p>

<h4 class="doc-header">Privacy Enquires</h4>



<p>You have the right to complain regarding any aspect of your privacy rights.&nbsp;If you have a complaint please contact the privacy officer at <a target="_self" style="text-decoration: underline; color: #000" href="mailto:privacy@physiotherapy.asn.au">privacy@physiotherapy.asn.au</a> or on <a target="_self" style="text-decoration: underline; color: #000" href="tel:03 9092 0888">03 9092 0888</a>.</p>



<h4 class="doc-header">APA Membership</h4>

<p>If you decide to become a member of the APA, and we hope that you do, the APA will ask you for additional personal details. You may also opt to provide the APA with more information such as special interest areas you may have where you are employed and your date of birth. Relevant information is disclosed to the public on the internet via the APA's 'Find a Physio' online searchable database only. You must approve the use of your details on this database. Whether you decide to use this service is your choice.</p>

<h4 class="doc-header">Security</h4>

<p>Your information is stored on the APA's server located in a secure data housing facility. While, it is important to recognise that "perfect security" does not exist on the internet, the APA is committed to using industry standard mechanisms to safeguard the confidentiality of your personal information such as firewalls and Secure Socket Layers.&nbsp;&nbsp;</p>

<h4 class="doc-header">Credit Card Information</h4>

<p>The APA does not permanently store credit card information anywhere on this site.&nbsp;&nbsp;</p>

<h4 class="doc-header">APA Members Privacy</h4>

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



<h4 class="doc-header">Consent</h4>



<p>You acknowledge and agree that by providing your personal and/or sensitive information to the APA that the APA, its related bodies corporate and partners and each of their officers, employees, agents and contractors are permitted to collect, store, use and disclose your personal information in the manner set out in this privacy policy and in accordance with the Australian Privacy Principles.</p>



<h4 class="doc-header">Contact Us</h4>


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

</div>

	<div class="modal-footer">
		<a id="non-member-disagreepd" class="disagree-btn" href="#" >Disagree</a>
		<a id="non-member-privacypolicy" class="agree-btn" href="#" >Agree</a>
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
<?php logRecorder(); ?>
