<?php
	/*hanled session */
	$now = time();
	$_SESSION['logoutSession'] = 0;
	if (isset($_SESSION['expireSessionTag']) && $now > $_SESSION['expireSessionTag']) {
		// todo
		// put session expired message here.
		$_SESSION['logoutSession'] = 1;
		// todo

		//logoutManager();

	}

	 //elseif(isset($_SESSION['expireSessionTag'])) {
		// if it is within session hour, renew session hour again.
		//$_SESSION['expireSessionTag'] = time() + (60 * 59);
	//}
?>
<?php
//include('sites/all/themes/evolve/inc/Aptify/AptifyAPI.inc.php');
	/*
	 * Log-in and Log-out manager
	 * Manage the entire log in and out here
	 **/

	//$link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
	//$redirectUrl = $link."/jointheapa";
	//$currentUrl =  "{$_SERVER['REQUEST_URI']}";
if (isset($_POST['refreshTag'])) {
	if (isset($_POST['step1'])) {
		$postData = array();
		if (isset($_SESSION['UserId'])) {
			$postData['userID'] = $_SESSION['UserId'];
		}

		if (isset($_POST['Prefix'])) {
			$postData['Prefix'] = $_POST['Prefix'];
		}

		if (isset($_POST['Firstname'])) {
			$postData['Firstname'] = $_POST['Firstname'];
		}

		if (isset($_POST['Middle-name'])) {
			$postData['Middle-name'] = $_POST['Middle-name'];
		}

		if (isset($_POST['Preferred-name'])) {
			$postData['Preferred-name'] = $_POST['Preferred-name'];
		}

		if (isset($_POST['Maiden-name'])) {
			$postData['Maiden-name'] = $_POST['Maiden-name'];
		}
		else{ $postData['Maiden-name'] ="";}

		if (isset($_POST['Lastname'])) {
			$postData['Lastname'] = $_POST['Lastname'];
		}

		//if (isset($_POST['Birth'])) {
			//$postData['birth'] = str_replace("-", "/", $_POST['Birth']);
		//}
		if(isset($_POST['birthdate']) && isset($_POST['birthmonth']) && isset($_POST['birthyear'])) {
			$postData['birth'] = $_POST['birthyear']."/".$_POST['birthmonth']."/".$_POST['birthdate'];
        }

		if (isset($_POST['Gender'])) {
			$postData['Gender'] = $_POST['Gender'];
		}

		if (isset($_POST['country-code'])) {
			$postData['Home-country-code'] = $_POST['country-code'];
		}

		if (isset($_POST['area-code'])) {
			$postData['Home-area-code'] = $_POST['area-code'];
		}

		if (isset($_POST['phone-number'])) {
			$postData['Home-phone-number'] = $_POST['phone-number'];
		}

		if (isset($_POST['Mobile-country-code'])) {
			$postData['Mobile-country-code'] = $_POST['Mobile-country-code'];
		}

		if (isset($_POST['Mobile-area-code'])) {
			$postData['Mobile-area-code'] = $_POST['Mobile-area-code'];
		}else {$postData['Mobile-area-code'] = "";}

		if (isset($_POST['Mobile-number'])) {
			$postData['Mobile-number'] = $_POST['Mobile-number'];
		}

		if (isset($_POST['Aboriginal'])) {
			$postData['Aboriginal'] = $_POST['Aboriginal'];
		}
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

		if (isset($_POST['Suburb'])) {
			$postData['Suburb'] = $_POST['Suburb'];
		}

		if (isset($_POST['Postcode'])) {
			$postData['Postcode'] = $_POST['Postcode'];
		}

		if (isset($_POST['State'])) {
			$postData['State'] = $_POST['State'];
		}
		else {$postData['State'] = "";}
		if (isset($_POST['Country'])) {
			$postData['Country'] = $_POST['Country'];
		}

		if (isset($_POST['Status'])) {
			$postData['Status'] = $_POST['Status'];
		}

		if (isset($_POST['Specialty'])) {
			$postData['Specialty'] = $_POST['Specialty'];
		}

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
		if (isset($_POST['Memberid'])) {
			$postData['Memberid'] = $_POST['Memberid'];
		}

		if (isset($_POST['Password'])) {
			$postData['Password'] = $_POST['Password'];
		}

		if (isset($_POST['MemberType'])) {
			$postLocalData['MemberType'] = $_POST['MemberType'];
		}

		if (isset($_POST['Ahpranumber'])) {
			$postData['Ahpranumber'] = $_POST['Ahpranumber'];
		}

		if (isset($_POST['Branch'])) {
			$postData['Branch'] = $_POST['Branch'];
		}


		if (isset($_SESSION['Regional-group'])) {
			$postData['Regional-group'] = $_SESSION['Regional-group'];
		} else {
			$postData['Regional-group'] = "";
		}

		if (isset($_POST['Nationalgp'])) {
			$ngData['Nationalgp'] = $_POST['Nationalgp'];
		}
		else{$ngData = array();}

		if (isset($_POST['SpecialInterest'])) {
			$postData['PSpecialInterestAreaID'] = implode(",", $_POST['SpecialInterest']);
		}

		// if(isset($_POST['Treatmentarea'])){ $postData['Treatmentarea'] = $_POST['Treatmentarea']; }

		if (isset($_POST['MAdditionallanguage'])) {
			$postData['PAdditionalLanguageID'] = implode(",", $_POST['MAdditionallanguage']);
		}

		if (isset($_POST['Findpublicbuddy'])) {
			$postData['Findpublicbuddy'] = $_POST['Findpublicbuddy'];
		} else {
			$postData['Findpublicbuddy'] = "False";
		}
	  if(isset($Dietary)) {$postData['Dietary'] = $Dietary;}
		// Process workplace data

		if (isset($_POST['wpnumber']) && $_POST['wpnumber']!="0" ) {
			$num = $_POST['maxumnumber'];
			$tempWork = array();
			for ($i = 0; $i <=$num; $i++) {
				$workplaceArray = array();
			if(isset($_POST['WorkplaceID'.$i]) && !empty($_POST['Name-of-workplace' . $i])){
				$workplaceArray['WorkplaceID'] = $_POST['WorkplaceID' . $i];
				if (isset($_POST['Findabuddy' . $i])) {
					$workplaceArray['Find-a-buddy'] = $_POST['Findabuddy' . $i];
				} else {
					$workplaceArray['Findabuddy'] = "False";
				}

				if (isset($_POST['Findphysio' . $i])) {
					$workplaceArray['Findphysio'] = $_POST['Findphysio' . $i];
				} else {
					$workplaceArray['Findphysio'] = "False";
				}

				if (isset($_POST['Name-of-workplace' . $i])) {
					$workplaceArray['Name-of-workplace'] = $_POST['Name-of-workplace' . $i];
				}

				if (isset($_POST['Workplace-setting' . $i])) {
					$workplaceArray['Workplace-settingID'] = $_POST['Workplace-setting' . $i];
				}

				if (isset($_POST['WBuildingName' . $i])) {
					$workplaceArray['WBuildingName'] = $_POST['WBuildingName' . $i];
				}

				if (isset($_POST['WAddress_Line_1' . $i])) {
					$workplaceArray['Address_Line_1'] = $_POST['WAddress_Line_1' . $i];
				}

				if (isset($_POST['WAddress_Line_2' . $i])) {
					$workplaceArray['Address_Line_2'] = $_POST['WAddress_Line_2' . $i];
				}

				if (isset($_POST['Wcity' . $i])) {
					$workplaceArray['Wcity'] = $_POST['Wcity' . $i];
				}

				if (isset($_POST['Wpostcode' . $i])) {
					$workplaceArray['Wpostcode'] = $_POST['Wpostcode' . $i];
				}

				if (isset($_POST['Wstate' . $i])) {
					$workplaceArray['Wstate'] = $_POST['Wstate' . $i];
				}

				if (isset($_POST['Wcountry' . $i])) {
					$workplaceArray['Wcountry'] = $_POST['Wcountry' . $i];
				}

				if (isset($_POST['Wemail' . $i])) {
					$workplaceArray['Wemail'] = $_POST['Wemail' . $i];
				}

				if (isset($_POST['Wwebaddress' . $i])) {
					$workplaceArray['Wwebaddress'] = $_POST['Wwebaddress' . $i];
				}

				if (isset($_POST['WPhoneCountryCode' . $i])) {
					$workplaceArray['WPhoneCountryCode'] = $_POST['WPhoneCountryCode'. $i];
				}

				if (isset($_POST['WPhoneAreaCode' . $i])) {
					$workplaceArray['WPhoneAreaCode'] = $_POST['WPhoneAreaCode' . $i];
				}

				if (isset($_POST['Wphone' . $i])) {
					$workplaceArray['WPhone'] = $_POST['Wphone' . $i];
				}

				if (isset($_POST['WPhoneExtentions' . $i])) {
					$workplaceArray['WPhoneExtentions'] = $_POST['WPhoneExtentions' . $i];
				}

				if (isset($_POST['Electronic-claiming' . $i])) {
					$workplaceArray['Electronic-claiming'] = $_POST['Electronic-claiming' . $i];
				} else {
					$workplaceArray['Electronic-claiming'] = "False";
				}

				/*if (isset($_POST['Hicaps' . $i])) {
					$workplaceArray['Hicaps'] = $_POST['Hicaps' . $i];
				} else {
					$workplaceArray['Hicaps'] = "False";
				}*/

				/*if (isset($_POST['Healthpoint' . $i])) {
					$workplaceArray['Healthpoint'] = $_POST['Healthpoint' . $i];
				} else {
					$workplaceArray['Healthpoint'] = "False";
				}*/

				if (isset($_POST['Departmentva' . $i])) {
					$workplaceArray['Departmentva'] = $_POST['Departmentva' . $i];
				} else {
					$workplaceArray['Departmentva'] = "False";
				}

				if (isset($_POST['Workerscompensation' . $i])) {
					$workplaceArray['Workerscompensation'] = $_POST['Workerscompensation' . $i];
				} else {
					$workplaceArray['Workerscompensation'] = "False";
				}

				if (isset($_POST['Motora' . $i])) {
					$workplaceArray['Motora'] = $_POST['Motora' . $i];
				} else {
					$workplaceArray['Motora'] = "False";
				}

				if (isset($_POST['Medicare' . $i])) {
					$workplaceArray['Medicare'] = $_POST['Medicare' . $i];
				} else {
					$workplaceArray['Medicare'] = "False";
				}

				if (isset($_POST['Homehospital' . $i])) {
					$workplaceArray['Homehospital'] = $_POST['Homehospital' . $i];
				} else {
					$workplaceArray['Homehospital'] = "False";
				}

				if (isset($_POST['MobilePhysio' . $i])) {
					$workplaceArray['MobilePhysio'] = $_POST['MobilePhysio' . $i];
				} else {
					$workplaceArray['MobilePhysio'] = "False";
        }
        if(isset($_POST['NDIS'.$i])) { $workplaceArray['NDIS'] = $_POST['NDIS'.$i];}else {$workplaceArray['NDIS']="False";}
        if(isset($_POST['Telehealth'.$i])) { $workplaceArray['Telehealth'] = $_POST['Telehealth'.$i];}else {$workplaceArray['Telehealth']="False";}

				if (isset($_POST['Number-worked-hours' . $i])) {
					$workplaceArray['Number-workedhours'] = $_POST['Number-worked-hours' . $i];
				}

				if (isset($_POST['WTreatmentarea' . $i])) {
					$workplaceArray['SpecialInterestAreaID'] = implode(",", $_POST['WTreatmentarea' . $i]);
				}else{
					$workplaceArray['SpecialInterestAreaID'] = "";
				}

				if (isset($_POST['Additionallanguage' . $i])) {
					$workplaceArray['AdditionalLanguage'] = implode(",", $_POST['Additionallanguage' . $i]);
				}
				else{ $workplaceArray['AdditionalLanguage'] = ""; }

				array_push($tempWork, $workplaceArray);
			}
			}

			$postData['Workplaces'] = $tempWork;
		}

		if (isset($_POST['wpnumber']) == "0") {
			$postData['Workplaces'] = array();
		}

		if (isset($_POST['addtionalNumber'])) {
			$n    = $_POST['addtionalNumber'];
			$temp = array();
			for ($j = 0; $j < $n; $j++) {
				$additionalQualifications = array();
				if (isset($_POST['ID' . $j])) {
					$additionalQualifications['ID'] = $_POST['ID' . $j];
				}

				if (isset($_POST['University-degree' . $j]) && $_POST['University-degree' . $j] != "") {
					$additionalQualifications['Degree']   = $_POST['University-degree' . $j];
					$additionalQualifications['DegreeID'] = "";
				} else {
					$additionalQualifications['DegreeID'] = $_POST['Udegree' . $j];
					$additionalQualifications['Degree']   = "";
				}

				if (isset($_POST['Undergraduate-university-name-other' . $j]) && $_POST['Undergraduate-university-name-other' . $j] != "") {
					$additionalQualifications['Institute']   = $_POST['Undergraduate-university-name-other' . $j];
					$additionalQualifications['InstituteID'] = "";
				} else {
					$additionalQualifications['InstituteID'] = $_POST['Undergraduate-university-name' . $j];
					$additionalQualifications['Institute']   = "";
				}

				if (isset($_POST['Ugraduate-country' . $j])) {
					$additionalQualifications['Country'] = $_POST['Ugraduate-country' . $j];
				}

				if (isset($_POST['Ugraduate-yearattained' . $j])) {
					$additionalQualifications['Yearattained'] = $_POST['Ugraduate-yearattained' . $j];
				}

				array_push($temp, $additionalQualifications);
			}

			$postData['PersonEducation'] = $temp;
		}

		// 2.2.5 - Member detail - Update
		// Send -
		// UserID & detail data
		// Response -Update Success message & UserID & detail data

		if (isset($_SESSION['UserId'])) {
			$testdata = aptify_get_GetAptifyData("5", $postData);

		} else {

			// for new user join a member call user registeration web service

			$resultdata = aptify_get_GetAptifyData("25", $postData);

			// when create user successfully call login web service to login in APA website automatically.
			// after login successfully get UserID as well to store on APA shopping cart database

			if ($resultdata['result'] == "Success") {
				$_SESSION["LoginName"] = $postData['Memberid'];
				$_SESSION["LoginPassword"] = $postData['Password'];

				// call webservice login. Eddy will provide login -process functionality---put code here
				// login sucessful unset session

				loginManager($_SESSION["LoginName"], $_SESSION["LoginPassword"]);
				//header("Refresh:0");
				unset($_SESSION["LoginName"]);
				unset($_SESSION["LoginPassword"]);

			}
			else{

				header("Location: /failure");
			}
		}

		unset($_SESSION["Regional-group"]);
		if (isset($_SESSION['UserId'])) {
			$userID = $_SESSION['UserId'];
			$products = array();
			checkShoppingCart($userID, $type = "membership", $productID = "");
			checkShoppingCart($userID, $type = "NG", $productID = "");
			checkShoppingCart($userID, $type = "MG1", $productID = "");
			checkShoppingCart($userID, $type = "MG2", $productID = "");
			createShoppingCart($userID, $productID = $postLocalData['MemberType'], $type = "membership", $coupon = "");
			if(sizeof($ngData)!="0"){
				foreach ($ngData['Nationalgp'] as $key => $value) {
					array_push($products, $value);
				}

				$type = "NG";
				checkShoppingCart($userID, $type = "NG", $productID = "");
				foreach ($products as $key => $value) {
					$productID = $value;
					createShoppingCart($userID, $productID, $type, $coupon = "");
				}
			}
			// save magazine products on APA side

			/*  there is a question for those two kinds of subscription product, need to know how Aptify organise combination products for "sports and mus"*/
			if (isset($_POST['ngmusculo']) && $_POST['ngmusculo'] == "1") {
				checkShoppingCart($userID, $type = "MG1", $productID = "");
				createShoppingCart($userID, "9978", $type = "MG1", $coupon = "");
			}

			if (isset($_POST['ngsports']) && $_POST['ngsports'] == "1") {
				checkShoppingCart($userID, $type = "MG2", $productID = "");
				createShoppingCart($userID, "9977", $type = "MG2", $coupon = "");
			}
		}
		//update subscription for the web user
		//added by jinghu 09/10/2018
		if(isset($_SESSION['UserId'])) {
			// 2.2.23 - GET list of subscription preferences
			// Send -
			// UserID
			// Response -
			// List of subscriptions and its T/F values.
			$sendData["UserID"] = $_SESSION['UserId'];
			$subscriptions = aptify_get_GetAptifyData("23", $sendData);
			$Subscription = $subscriptions["results"];
			$ArrayReturn = Array();
			$ArrayReturn["UserID"] = $_SESSION['UserId'];
			$SubListAll = Array();
			$subArray = Array();
			$consArray = Array();
			foreach($Subscription as $Subs) {
				$ArrayRe["SubscriptionID"] = $Subs["ConsentID"];
				$arrayUpdate["ConsentID"] = $Subs["ConsentID"];
				if($Subs["ConsentID"] == '15') {
					$ArrayRe["Subscribed"] = '1';//$Subs["Subscribed"];
					$arrayUpdate["Subscribed"] = '1';//$Subs["Subscribed"];
				} else {
					$ArrayRe["Subscribed"] = '0';//$Subs["Subscribed"];
					$arrayUpdate["Subscribed"] = '0';//$Subs["Subscribed"];
				}
				array_push($consArray, $arrayUpdate);
				$ArrayRe["Subscription"] = $Subs["Consent"];
				array_push($SubListAll, $ArrayRe);
			}
			$ArrayReturn["Subscriptions"] = $subArray;
			$ArrayReturn["Consents"] = $consArray;
			// 2.2.24 - Update subscription preferences
			// Send -
			// UserID, List of subscriptions and its F/F values.
			// Response -
			// Response, List of subscriptions and it's T/F values.
			$subscriptions = aptify_get_GetAptifyData("24", $ArrayReturn);
		}


	}
}

//1. for create web user

if(isset($_POST['CreateUser'])) {
	$postData = array();
	if(isset($_POST['Firstname'])){ $postData['Firstname'] = $_POST['Firstname']; }
	if(isset($_POST['Lastname'])){ $postData['Lastname'] = $_POST['Lastname']; }
	if(isset($_POST['Prefix'])){ $postData['Prefix'] = $_POST['Prefix']; }
	//if(isset($_POST['Birth'])){ $postData['birth'] = str_replace("-","/",$_POST['Birth']); }
	if(isset($_POST['birthdate']) && isset($_POST['birthmonth']) && isset($_POST['birthyear'])) {
			$postData['birth'] = $_POST['birthyear']."/".$_POST['birthmonth']."/".$_POST['birthdate'];
    }
	if(isset($_POST['Gender'])){ $postData['Gender'] = $_POST['Gender']; }
	/**fixed address issue for create web user web service***/
	if($_POST['Pobox']!="") {
			$postData['BuildingName'] =$_POST['Pobox'];
			$postData['Address_Line_1'] ="";
			$postData['Address_Line_2'] ="";

	}else {
		$postData['BuildingName'] = $_POST['BuildingName'];
		$postData['Address_Line_1'] = $_POST['Address_Line_1'];
		$postData['Address_Line_2'] = $_POST['Address_Line_2'];

	}
	//if(isset($_POST['Address_Line_1'])){ $postData['Unit'] = $_POST['Address_Line_1']; }
	//if(isset($_POST['Address_Line_2'])){ $postData['Street'] = $_POST['Address_Line_2']; }
	if(isset($_POST['Suburb'])){ $postData['Suburb'] = $_POST['Suburb']; }
	if(isset($_POST['Postcode'])){ $postData['Postcode'] = $_POST['Postcode']; }
	if(isset($_POST['State'])){ $postData['State'] = $_POST['State']; }
	if(isset($_POST['Country'])){ $postData['Country'] = $_POST['Country']; }
	if(isset($_POST['Memberid'])){ $postData['Memberid'] = $_POST['Memberid'];}
	if(isset($_POST['Password'])){ $postData['Password'] = $_POST['Password'];}


// for new user join a member call user registeration web service
$resultdata = aptify_get_GetAptifyData("42", $postData);
//when create user successfully call login web service to login in APA website automatically.
//after login successfully get UserID as well to store on APA shopping cart database
if($resultdata['result']) {
	$_SESSION["LoginName"] = $postData['Memberid'];
	$_SESSION["LoginPassword"] = $postData['Password'];
	// call webservice login. Eddy will provide login -process functionality---put code here
	// login sucessful unset session
	loginManager($_SESSION["LoginName"], $_SESSION["LoginPassword"]);
	unset($_SESSION["LoginName"]);
	unset($_SESSION["LoginPassword"]);
}
		//update subscription for the web user
		//added by jinghu 09/10/2018
		if(isset($_SESSION['UserId'])) {
			// 2.2.23 - GET list of subscription preferences
			// Send -
			// UserID
			// Response -
			// List of subscriptions and its T/F values.
			$sendData["UserID"] = $_SESSION['UserId'];
			$subscriptions = aptify_get_GetAptifyData("23", $sendData);
			$Subscription = $subscriptions["results"];
			$ArrayReturn = Array();
			$ArrayReturn["UserID"] = $_SESSION['UserId'];
			$SubListAll = Array();
			$subArray = Array();
			$consArray = Array();
			foreach($Subscription as $Subs) {
				$ArrayRe["SubscriptionID"] = $Subs["ConsentID"];
				$arrayUpdate["ConsentID"] = $Subs["ConsentID"];
				if($Subs["ConsentID"] == '15') {
					$ArrayRe["Subscribed"] = '1';//$Subs["Subscribed"];
					$arrayUpdate["Subscribed"] = '1';//$Subs["Subscribed"];
				} else {
					$ArrayRe["Subscribed"] = '0';//$Subs["Subscribed"];
					$arrayUpdate["Subscribed"] = '0';//$Subs["Subscribed"];
				}
				array_push($consArray, $arrayUpdate);
				$ArrayRe["Subscription"] = $Subs["Consent"];
				array_push($SubListAll, $ArrayRe);
			}
			$ArrayReturn["Subscriptions"] = $subArray;
			$ArrayReturn["Consents"] = $consArray;
			// 2.2.24 - Update subscription preferences
			// Send -
			// UserID, List of subscriptions and its F/F values.
			// Response -
			// Response, List of subscriptions and it's T/F values.
			$subscriptions = aptify_get_GetAptifyData("24", $ArrayReturn);
		}


}
	// current page's url. log-in to the same page before log-in.
	$url =  "{$_SERVER['REQUEST_URI']}";

	// log-in
	/*if(isset($_POST["id"])) {
		if(!empty($_POST["remember"])) {
			setcookie ("member_login",$_POST["id"],time()+ (10 * 365 * 24 * 60 * 60));
			setcookie ("member_password",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));
		} else {
			if(isset($_COOKIE["member_login"])) {
				setcookie ("member_login","");
			}
			if(isset($_COOKIE["member_password"])) {
				setcookie ("member_password","");
			}
		}
		loginManager($_POST["id"], $_POST["password"]);
	} else {
		// no id has been entered
	}*/

	// log-out
	if(isset($_POST["logout"])) {
		// same with this commend.
		// isset($_SESSION["Log-in"])

		// todo
		// figure this out later
		logoutManager();
	}

	// test get data
	if(isset($_POST["Getdata"])) {
		$data = "UserID=".$_SESSION["UserId"];
		$output = aptify_get_GetAptifyData("1", $data);
		print_r($output);
	}

	function loginManager($id, $pass) {

		// 2.2.7 - log-in
		// Send -
		// UserID, User password
		// Response -
		// log-in
		$arrIn["ID"] = $id;
		$arrIn["Password"] = $pass;
		//$result = GetAptifyData("7", $arrIn);
		$result = aptify_api_login($email_address=$id, $password=$pass);
		if(!isset($_SESSION["loginFail"])) {
			// logged in
			//print_r($result);
			logRecorder();
			$_SESSION["LogInFirstTime"] = "T";

			$id= $result["UserId"];
			$UserName= $result["UserName"];
			$Email= $result["Email"];
			$FirstName= $result["FirstName"];
			$LastName= $result["LastName"];
			$Title= $result["Title"];
			$LinkId= $result["LinkId"];
			$CompanyId= $result["CompanyId"];
			$TokenId= $result["TokenId"];
			$Server= $result["Server"];
			$Database= $result["Database"];
			$AptifyUserID= $result["AptifyUserID"];
			newSessionLogIn($id, $UserName, $Email, $FirstName, $LastName, $Title, $LinkId, $CompanyId, $TokenId, $Server, $Database, $AptifyUserID);

			$_SESSION["Log-in"] = "in";
			//echo "<br>logged in!!";

			$data = "UserID=".$_SESSION["UserId"];
			$details = aptify_get_GetAptifyData("4", $data,"");
			newSessionStats($details["MemberTypeID"], $details["MemberType"], $details["Status"],$details["PersonSpecialisation"],$details["PaythroughtDate"],$details["Nationalgp"]);
			nameUpdate($details["Firstname"], $details["Preferred-name"]);
      pdGetInfo($details["State"], $details["Suburb"]);
      //implementation MBA SSO Start from here
      /******Check the member is there or not
       * one condition is member
       * two condition is existed user in MBA
      */
      if(apa_member_check_status()){
        $mba_login = mba_log_in($details["Memberid"]);
        if(isset($mba_login['sc']['access_token']) && ($mba_login['sc']['access_token']!="")){
          $_SESSION['MBASSO_Login_Path'] = $mba_login['sc']['path'];
          $_SESSION['MBASSO_Login_Token'] = $mba_login['sc']['access_token'];
          $redirectURL = mba_redirect($_SESSION['MBASSO_Login_Token'], $_SESSION['MBASSO_Login_Path']);
        }else{

          $personInfo['email'] = $details["Memberid"];
          $personInfo['first_name'] = $details["Firstname"];
          $personInfo['last_name'] = $details["Lastname"];
          if(empty($details["Mobile-number"])){
            $personInfo['phone'] = str_replace(" ","",str_replace("-","",$details["Home-phone-number"]));
          }
          else{
            $personInfo['phone'] = str_replace(" ","",str_replace("-","",$details["Mobile-number"]));
          }

          $personInfo['membership_number'] =  $details["Memberno"];
          $timeStr = strtotime(str_replace('/', '-', $details["PaythroughtDate"]));
          $personInfo['membership_expiry'] = date("Y", $timeStr)."-".date("m", $timeStr)."-".date("d", $timeStr);
          $personInfo['newsletter']=false;
           //check line1 characters
          $addressSSOLine1 = $details["Unit"];
          $str = strlen($addressSSOLine1);
          if($str<8) { $addressSSOLine1 .="        "; }
          if($str>40){ $addressSSOLine1 =  substr($addressSSOLine1,0, 39);}
          $perAddArray = array();
          $personInfo['address'] = array('line1'=>$addressSSOLine1, 'city'=>$details["Suburb"], 'post_code'=>$details["Postcode"], 'state'=>$details["State"], 'country'=>$details["Country"]);
          $personInfo['extra_fields'] = array();
          $result = mba_sso_create($personInfo);
          $mba_login = mba_log_in($details["Memberid"]);
          if(isset($mba_login['sc']['access_token']) && ($mba_login['sc']['access_token']!="")){
            $_SESSION['MBASSO_Login_Path'] = $mba_login['sc']['path'];
            $_SESSION['MBASSO_Login_Token'] = $mba_login['sc']['access_token'];
            $redirectURL = mba_redirect($_SESSION['MBASSO_Login_Token'], $_SESSION['MBASSO_Login_Path']);

          }

      }

    }
    //disable member status
    /****
     * condition: check member is there and then disable member status
     */
    if(!apa_member_check_status()){
      $mba_login = mba_log_in($details["Memberid"]);
      if(isset($mba_login['sc']['access_token']) && ($mba_login['sc']['access_token']!="")){
        //handle disable status
        $email = $details["Memberid"];
        $member_status = "Disabled";
        mba_sso_update_status($email, $member_status);
      }
    }
    //implementation MBA SSO End here
			/*
			$checkSSO = $_SESSION["UserId"];
			$detailstt = GetAptifyData("0", $checkSSO);
			$_SESSION["tasjdfksdkfsd"] = $detailstt;
			*/
      logRecorder();



		}
	}

	function logoutManager() {
		// 2.2.8 - log-out
		// Send -
		//
		// Response -
		//
		$result = aptify_get_GetAptifyData("8", "logout");
		if(isset($result["ErrorInfo"])) {

			echo $result["ErrorInfo"]["ErrorMessage"];
			echo "<br>log-out fail";
		} else {
			$_SESSION['logoutmessage'] =1;

		}
		//print_r($result);
		logRecorder();
		deleteSession();
		// re-direct users to the homepage
		header("Location: /");
		exit;
		//echo "logged out";
	}
?>
<?php
/******* shopping cart number + icon change *****/
$type = "PD";
$counts = 0;
if(isset($_SESSION['UserId'])) {
	$userID = $_SESSION['UserId'];
	/*$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Rkd#!8cd,&ag6e95g9&5192(gb[5g');
	/********Get user shopping product form APA server******/
	/*try {
		$type="PD";
		$shoppingcartGetPD= $dbt->prepare('SELECT ID, productID, meetingID,coupon FROM shopping_cart WHERE userID= :userID AND type= :type');
		$shoppingcartGetPD->bindValue(':userID', $userID);
		$shoppingcartGetPD->bindValue(':type', $type);
		$shoppingcartGetPD->execute();
		foreach($shoppingcartGetPD as $ttt) {
			$counts++;
		}
		$shoppingcartGetPD= null;
		$type="PDNG";
		$shoppingcartGetPDNG= $dbt->prepare('SELECT ID, productID, meetingID,coupon FROM shopping_cart WHERE userID= :userID AND type= :type');
		$shoppingcartGetPDNG->bindValue(':userID', $userID);
		$shoppingcartGetPDNG->bindValue(':type', $type);
		$shoppingcartGetPDNG->execute();
		foreach($shoppingcartGetPDNG as $ttt) {
			$counts++;
		}
		$shoppingcartGetPDNG= null;
	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}
	$dbt = null;*/
	$type="PD";
	$shoppingcartGetPD = getPDProduct($userID,$type);
	foreach($shoppingcartGetPD as $ttt) {
			$counts++;
	}
	$type="PDNG";
	$shoppingcartGetPDNG = getProduct($userID=$_SESSION['UserId'],$type="PDNG");
	foreach($shoppingcartGetPDNG as $ttt) {
			$counts++;
	}
	$type="PDMG";
	$shoppingcartGetPDMG = getProduct($userID=$_SESSION['UserId'],$type="PDMG");
	foreach($shoppingcartGetPDMG as $ttt) {
			$counts++;
	}
	/********End get user shopping product form APA server******/
} else {
	$userID = '';
	$counts = 0;
}
?>
<?php if(isset($_SESSION["loginFail"])): ?>

	<script>
		jQuery(document).ready(function(){

			$('#main-signin-form .checkmessage').show();
			$('.LogInPadding .info').click();
		});
	</script>
	<?php unset($_SESSION["loginFail"]); ?>
<?php endif; ?>
<?php if(isset($_SESSION['logoutmessage'])):?>
<div class="GetCentreLayoutHome">
	<div class="ASection">
		<div class="Desktop">
			<p>You are successfully logged out!</p>
		</div>
		<div class="Mobile">
			<p>You are successfully logged out!</p>
		</div>
	</div>
</div>
<?php unset($_SESSION["logoutmessage"]); ?>
<?php endif;?>

<!-- other Sites -->
<div class="OtherSitesList">
	<span class="OthersiteButtonClose"></span>

	<div class="OtherListTop"><a class="apa" href="https://choose.physio/" target="_blank">APA consumer website</a></div>

	<div class="OtherListTop"><a class="jobs" href="https://www.jobs4physios.com.au/" target="_blank"><span class="uniq">jobs</span>4physios</a></div>

	<div class="OtherListTop"><a class="cpd" href='<?php  if(isset($_SESSION['UserId']))  { echo "https://australian.physio/sso/redirect-cpd4physio";} else { echo "https://cpd4physios.com.au/";}?>' target="_blank"><span class="uniq">cpd</span>4physios.com.au</a></div>

	<div class="OtherListTop"><a class="classifieds" href="https://www.classifieds4physios.com.au/" target="_blank"><span class="uniq">classifieds</span>4physios</a></div>

	<div class="OtherListTop"><a class="shop" href="https://www.shop4physios.com.au/" target="_blank"><span class="uniq">shop</span>4physios</a></div>

	<div class="OtherListTop"><a class="ifompt" href="https://ifomptconference.org/" target="_blank"><span class="uniq">IFOMPT2022</a></div>



</div>

<!-- Modal log-in -->
<div class="modal fade" id="loginAT" role="dialog">
<div class="modal-dialog"><!-- Modal content-->
	<div class="modal-content">

	<div class="modal-body">

			<button class="close" data-dismiss="modal" type="button"><span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span></button>

		<div class="form-container">
      <div class="tab-content">
        <div id="main-signin-form">
          <!--<form name="signInForm" method="POST" action="<?php //echo $url;?>">-->
				<div class="flex-container">
					<div class="flex-cell">
						<span class="light-lead-heading cairo">Sign in to your account</span>
						<p style="margin-bottom: 0"><span class="strong-subhead">Are you an existing member logging in for the first time?</a></span></p>
						<p style="margin-top: 0"><span class="strong-subhead"><a id="return-users" href="/return-user-welcome">Click here</a> and we'll help you get started.</span></p>
					</div>
					<!--<input type="email" class="form-control"  name="Emailaddress" id="Emailaddress" placeholder="Email address"><br>
					<input type="password" class="form-control"  name="Password"  placeholder="Password"><br>-->
					<!--<div class="flex-cell email-field">
						<input class="form-control" name="id" placeholder="Email address" type="text" value="<?php //if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>" required />
					</div>

					<div class="flex-cell password-field">
						<input class="form-control" placeholder="Password" name="password" type="password" value="<?php //if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; } ?>" required />
					</div>-->
					<?php $the_form = drupal_get_form('apa_create_log_in_form');
                    print drupal_render($the_form);	?>
					<!--<div class="flex-cell login-btn">
						<input type="submit" value="Login">
					</div>-->

					<!--<div class="flex-cell">
						<div class="flex-col-5 remember-opt">
							<input class="styled-checkbox" id="remember1" type="checkbox" name="remember"  <?php //if(isset($_COOKIE["member_login"])) { ?> checked <?php //} ?> /><label for="remember1">Remember me</label>
						</div>
						<div class="flex-col-7 forgot-password">
							<span>Forgot your <a href="/forget-password">username/password</a>
							</span>
						</div>
					</div>-->

					<div class="flex-cell create-account">
						<span>Not a member? <a href="/membership-question">Join today.</a></span>
					</div>
				</div>
			<!--</form>-->
        </div>

      </div><!-- tab-content -->
      <script>
$('[data-target="#loginAT"]').on('click', function (e) {
	$('#main-forgot-pw-form').hide();
	$('#main-signin-form').show();
});
$('.tab span').on('click', function (e) {

  e.preventDefault();

  target = $(this).attr('data-form');

  $('.tab-content > div').not(target).hide();

  $(target).fadeIn(600);

});
</script>
</div> <!-- /form -->
	</div>
	</div>
</div>
</div>

<!-- Modal forgot password
<div class="modal fade" id="passwordReset" role="dialog">
<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
		<button class="close" data-dismiss="modal" type="button">×</button>
		<h4 class="modal-title">Reset password</h4>
	</div>

	<div class="modal-body">
		<form method="POST" action="<//?php echo $url; ?>" name="resetPass">
			<label for="id">ID</label>
			<input id="Fid" name="Fid" placeholder="ID" type="text" />
			<input type="submit" value="submit" />
		</form>
	</div>
	<div class="modal-footer">
	<button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
	</div>
	</div>
</div>
</div> -->
<?php if(isset($_SESSION['LogInFirstTime'])): ?>
<div class="GetCentreLayoutHome">
	<div class="ASection">
		<div class="Desktop">
			<p>Welcome <b><?php if(isset($_SESSION['FirstName'])) {echo $_SESSION['FirstName'];} ?>!</b></p>
		</div>
		<div class="Mobile">
			<p>Welcome <b><?php if(isset($_SESSION['FirstName'])) {echo $_SESSION['FirstName'];} ?>!</b></p>
		</div>
	</div>
</div>
<?php unset($_SESSION['LogInFirstTime']); ?>
<?php endif; ?>
<!--handle the session expired popup-->
<div id="sessionExpiredWindow" style="display:none;">
	<div class="flex-cell">
		<div id="expire_msg">
			<span class="light-lead-heading cairo">Your session has expired.</span>
			<div class="btn-wrapper">
				<a class="accent-btn session_login">Login</a>
				<a class="accent-btn session_logout">Logout</a>
			</div>

		</div>
		<div id="login_form">
			<div class="form-container">
				<div class="tab-content">
					<div id="main-signin-form">
						<div class="flex-container">
							<div class="flex-cell">
								<span class="light-lead-heading cairo">Sign in to your account</span>
							</div>

							<?php $the_form = drupal_get_form('apa_create_log_in_form');
							print drupal_render($the_form);	?>

							<div class="flex-cell create-account">
								<span>Not a member? <a href="/membership-question">Join today.</a></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--handle the session expired popup-->
<script type="text/javascript">
	 // automatically pop up session expire window
	 var popUPTag ='<?php if(isset($_SESSION['TokenId']))  {echo $_SESSION['TokenId']; } else{ echo "";}?>';
	 var countSession = <?php if(isset($_SESSION['expireSessionTag'])) {echo $_SESSION['expireSessionTag'] - time();}?>;
	 if(popUPTag!=""){
		 	function countSessionDown(){
				if(countSession > 0){
					countSession--;
					setTimeout("countSessionDown()", 1000);
				}else{
					// prevent element inspect
				document.addEventListener('contextmenu', function(e) {
					e.preventDefault();
				});
				// remove duplicate login form
				$('#loginAT').remove();
				// append overlay
				if( $('body, html, .html').find('.overlay').length == 0 ){
					$('body').append('<div class="overlay"><section class="loaders"><span class="loader loader-quart"></span></section></div>');
				}
				$('.overlay').fadeIn();
				$("#sessionExpiredWindow").fadeIn();

				}

			}
			countSessionDown();
		}
$(document).ready(function(){
	var logoutTag ='<?php if(isset($_SESSION['logoutSession']))  {echo $_SESSION['logoutSession']; } else{ echo "";}?>';
	if(logoutTag == "1"){
		// prevent element inspect
		document.addEventListener('contextmenu', function(e) {
			e.preventDefault();
		});
		// remove duplicate login form
		$('#loginAT').remove();
		// append overlay
		if( $('body, html, .html').find('.overlay').length == 0 ){
			$('body').append('<div class="overlay"><section class="loaders"><span class="loader loader-quart"></span></section></div>');
		}
		$('.overlay').fadeIn();
		// fade in session expired window
		$("#sessionExpiredWindow").fadeIn();
	}
	else{
		$("#sessionExpiredWindow").hide();
	}
	$(document).on('click', '#sessionExpiredWindow a', function(){
		if ( $(this).is('.session_logout') ){
			$('input[value="Log out"]').click();
		} else {
			$('#expire_msg').fadeOut( function(){
				$('#login_form').fadeIn();
			});
		}
  	});
	$('.GetCentreLayoutHome .ASection .Desktop')
		.animate({ "padding-left": "1px" }, 500 )
		.animate({ "margin-top": "0px" }, 300 )
		.animate({ "padding-left": "1px" }, 3000 )
		.animate({ "margin-top": "-84px" }, 300 );

	$('.GetCentreLayoutHome .ASection .Mobile')
		.animate({ "padding-left": "1px" }, 500 )
		.animate({ "margin-top": "0px" }, 300 )
		.animate({ "padding-left": "1px" }, 3000 )
		.animate({ "margin-top": "-70px" }, 300 );

	$('.submit').click( function() {
		var text = $("#bloodhound input[type=text].tt-input").val();
		if(text != "" || text != " " || text != null) {
			var rss = text.split(" ");
			var num = rss.length;
			var suburb = "";
			for(var i = 0; i < num-2; i++) {
				suburb += rss[i];
				if(i < num-3){
					suburb += " ";
				}
			}
			$('.stateComp').val(rss[num-2]+"");
			$('.suburbComp').val(suburb+"");
			$('.postcodeComp').val(rss[num-1]+"");
		}
	});
});
</script>

<div class="top_nav_socials">
	<ul>
		<li>
			<a class="facebook_icon" href="https://www.facebook.com/AustralianPhysiotherapyAssociation" target="_blank" rel="nofollow"></a>
		</li>
		<li>
			<a class="twitter_icon" href="https://twitter.com/apaphysio" target="_blank" rel="nofollow"></a>
		</li>
		<li>
			<a class="linkedin_icon" href="https://www.linkedin.com/company/747310" target="_blank" rel="nofollow">
				<span class=""></a>
			</a>
		</li>
		<li>
			<a class="instagram_icon" href="https://instagram.com/physioaustralia" target="_blank" rel="nofollow"></a>
		</li>
		<li>
			<a class="youtube_icon" href="https://www.youtube.com/user/apatube1" target="_blank" rel="nofollow"></a>
		</li>
	</ul>
</div>

<!-- LOGIN/LOGOUT -->
<?php if(isset($_SESSION["Log-in"])): ?>
	<!-- DISPLAY NAME -->
	<div class="user_logged_in">
		<div class="user_name LogOutPadding">
			<?php
				$name = $_SESSION["FirstName"];
				if(isset($_SESSION['Preferred-name']) && $_SESSION['Preferred-name'] != "") {
					if(isset($_POST['Preferred-name']) && $_POST['Preferred-name'] != "") {
						$name = $_POST['Preferred-name'];
					} elseif(isset($_POST['Firstname']) && $_POST['Firstname'] != "") {
						$name = $_POST['Firstname'];
					} else {
						$name = $_SESSION['Preferred-name'];
					}
				} elseif(isset($_POST['Preferred-name']) && $_POST['Preferred-name'] != "") {
					$name = $_POST['Preferred-name'];
				} elseif(isset($_POST['Firstname']) && $_POST['Firstname'] != "") {
					$name = $_POST['Firstname'];
				}
			?>

			<div class="nameHello"><span class="icon user_icon"></span>Hi <?php echo $name; ?></div>
		</div>

		<div class="cart_wrapper" title="Shopping cart">
			<span class="cart_icon"></span>
			<span class="cart_number"><?php echo $counts; ?></span>
		</div>

		<div class="user_menu">
			<ul>
				<li><a href="/dashboard">Dashboard</a></li>
				<li><a href="/your-details">Account</a></li>
				<li><a href="/your-purchases">Purchases</a></li>
				<li><a href="/subscriptions">Subscriptions</a></li>
				<li><a href="/renewmymembership">Join/Renew</a></li>
			</ul>

			<form method="POST" action="/" name="forlogout">
				<input id="logoutAcButton"type="hidden" name="logout" value="out" style="display: none;" />
				<div id="logoutButton" title="Log out">
					<span class="icon logout_icon"></span><input type="submit" value="Log out" />
				</div>
			</form>

		</div>
	</div>

<?php else: ?>
	<div class="LogInPadding">
		<button class="info" data-target="#loginAT" data-toggle="modal" type="button">
			<span class="icon user_icon"></span>Login
		</button>
	</div>
<?php endif; ?>
<!-- END LOGIN/LOGOUT -->

<div class="other_sites OthersiteButton" title="Other websites">
	<span class="laptop_icon"></span>
	APA websites
</div>
