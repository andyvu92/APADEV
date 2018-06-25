<?php

/*Dashboard page render national icons fuction*/
/*Dashboard page*/
function AptifyAPI($APItype, $variables, $jsonVersion){
	switch($APItype){
		case "0":
			// JSON persar
			return "Test! 0 in";
			break;
		case "1":
			// Eddy - done check;
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/DataObjects/spGetDashboardMainDetailsForUserID__c?";
			$passInput = "Userid=".$variables;
			echo "<br />1. Dashboard Main: <br />";
			// Add JSON sample here
			$JSONreturn = curlRequest($API, "Get", $passInput);
			return $JSONreturn;
			break;
		case "2":
			// Eddy
			$AptifyAuth = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/Authentication/Login/DomainWithContainer?UserName=aptifyuser&Password=!@-auser-Apatest1-2468";
			$AuthToken = curlRequest($AptifyAuth, "Get", "");
			$AuthToken = json_decode($AuthToken, true);
			$AuthToken = $AuthToken["TokenId"];
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/forms/CrystalReportView.aspx?ViewMode=entityRecord&ViewEntityName=Persons&ReportId=151&";
			//$ttt = urlencode("DomainWithContainer ");
			$passInput = "EntityRecordID=".$variables."&AptifyAuthorization=DomainWithContainer%20".$AuthToken;
			$API = $API.$passInput;
			//$API = urlencode($API);
			//setcookie ("AptifySession","$AuthToken",time()+ (24 * 60 * 60));
			//$_SESSION[""] = $AuthToken;
			$APItt = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/forms/CrystalReportView.aspx?ViewMode=entityRecord&ViewEntityName=Persons&ReportId=150&";
			//$ttt = urlencode("DomainWithContainer ");
			$passInputt = "EntityRecordID=".$variables."&AptifyAuthorization=DomainWithContainer%20".$AuthToken;
			$APItt = $APItt.$passInput;
			$APIs["M"] = $API;
			$APIs["I"] = $APItt;
			echo "<br />2. Get membership Certificate PDF: <br />";
			// Add JSON sample here
			//$JSONreturn = curlRequest($API, "PDF", $AuthToken);
			//echo $JSONreturn;
			//return $JSONreturn;
			return $APIs;
		case "3":
			// Eddy
			$AptifyAuth = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/Authentication/Login/DomainWithContainer?UserName=aptifyuser&Password=!@-auser-Apatest1-2468";
			$AuthToken = curlRequest($AptifyAuth, "Get", "");
			$AuthToken = json_decode($AuthToken, true);
			$AuthToken = $AuthToken["TokenId"];
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/forms/CrystalReportView.aspx?ViewMode=entityRecord&ViewEntityName=Persons&ReportId=150&";
			//$ttt = urlencode("DomainWithContainer ");
			$passInput = "EntityRecordID=".$variables."&AptifyAuthorization=DomainWithContainer%20".$AuthToken;
			$API = $API.$passInput;
			//$API = urlencode($API);
			//setcookie ("AptifySession","$AuthToken",time()+ (24 * 60 * 60));
			//$_SESSION[""] = $AuthToken;
			echo "<br />3. Get membership insurance certificate PDF: <br />";
			// Add JSON sample here
			$JSONreturn = curlRequest($API, "PDF", $AuthToken);
			return $API;
		case "4":
			//API test by JingHu
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/GetDBMemberDetails?";		
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />4. Dashboard - Get member detail: <br />";
			$JSONreturn = curlRequest($API, "Get", $variables);
			echo $JSONreturn;
			return $JSONreturn;
			break;
		case "5":
			//API test by JingHu
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/DMemberDetailUpdate";		
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />5. Member detail - Update: <br />";
			// Add JSON sample here
			$JSONreturn = curlRequest($API, "JSON", $jsonVersion); 
			echo $JSONreturn;
			return $JSONreturn;
			break;
		case "6":
			// Eddy;
			echo "Data Sent: <br />";
			print_r($variables);
			if(isset($variables["Token"])) {
				echo "1";
				$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/Authentication/PasswordReset/Web";
				$JSONreturn = curlRequest($API, "SecureNoToken", $variables);
				echo $JSONreturn;
			} else {
				echo "2";
				$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/Authentication/PasswordResetRequest/Web?";
				$variable = "UserName=".$variables["email"]."&email=".$variables["email"];
				$JSONreturn = curlRequest($API, "GetPost", $variable);
			}
			echo "<br />6. Dashboard - Forgot password: <br />";
			// Add JSON sample here
			return $JSONreturn;
		case "7":
			// Eddy - done check;
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/Authentication/Login/Web?";
			echo "<br />7. Dashboard - log-in: <br />";
			// Add JSON sample here
			$variable = "UserName=".$variables['ID']."&Password=".$variables['Password'];
			$JSONreturn = curlRequest($API, "Get", $variable);
			return $JSONreturn;
		case "8":
			// Eddy - done check;
			// For the actual API use
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/Authentication/Logout";
			echo "<br />8. Dashboard - Log-out: <br />";
			// Add JSON sample here
			$JSONreturn = curlRequest($API, "", "");
			return $JSONreturn;
		case "9":
			// Eddy - done check;
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/UpdatePassword";
			echo "<br />9. Dashboard - change password: <br />";
			// Add JSON sample here
			$JSONreturn = curlRequest($API, "JSON", $jsonVersion);
			return $JSONreturn;
		case "10":
			//API test by JingHu
			$PersonID = $_SESSION['LinkId'];
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/ImageField/Persons/".$PersonID."/Photo";		
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />10. Dashboard - Get picture: <br />";
			$JSONreturn = curlRequest($API, "Get", "");
			return $JSONreturn;
			break;
		case "11":
			//API test by JingHu
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/GenericEntity/SaveData";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />11. Dashboard - Update picture: <br />";
			// Add JSON sample here
			$JSONreturn = curlRequest($API, "Image", $jsonVersion); 
			return $JSONreturn;
			break;
		case "12":
			//API test by JingHu
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/DataObjects/spGetPaymentListing__c?";
			echo "Data Sent: <br />";
			echo "<br />12. Dashboard - Get payment listing: <br />";
			$data = "UserID=".$variables["id"];
			$JSONreturn = curlRequest($API, "Get", $data);
			return $JSONreturn;
			break;
		case "13":
			//API test by JingHu
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/ProcessFlow/UpdatePaymentMethod__c";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />13. Dashboard - update payment method: <br />";
			$JSONreturn = curlRequest($API, "Secure", $variables); 
			echo $JSONreturn;
			return $JSONreturn;
			break;
		case "14":
			// Merged together with Case 13
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />14. Delete payment method: <br />";
			// Add JSON sample here
			$JSONreturn = "";
			return $JSONreturn;
		case "15":
			//API test by JingHu
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/AddPaymentMethod";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />15. Dashboard - Add payment method: <br />";
			// Add JSON sample here
			$JSONreturn = curlRequest($API, "JSON", $jsonVersion); 
			echo $JSONreturn;
			return $JSONreturn;
			break;
		case "16":
			//API test by JingHu
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/VerifyUserName/".$variables["ID"];
			//echo "Data Sent: <br />";
			//print_r($variables);
			//echo "<br />16. Dashboard - Check existing email: <br />";
			// Add JSON sample here
			$JSONreturn = curlRequest($API, "JSON",""); 
			return $JSONreturn;
		case "17":
			// Eddy - done check;
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/GetOrderDetails?";
			echo "<br />17. Dashboard - Get payment history list: <br />";
			// Add JSON sample here
			$sent = "UserID=".$variables["ID"];
			$JSONreturn = curlRequest($API, "Get", $sent);
			return $JSONreturn;
		case "18":
			// Eddy
			$AptifyAuth = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/Authentication/Login/DomainWithContainer?UserName=aptifyuser&Password=!@-auser-Apatest1-2468";
			$AuthToken = curlRequest($AptifyAuth, "Get", "");
			$AuthToken = json_decode($AuthToken, true);
			$AuthToken = $AuthToken["TokenId"];
			$returnArr = Array();
			foreach($variables as $var) {
				$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/forms/CrystalReportView.aspx?ViewMode=entityRecord&ViewEntityName=Persons&ReportId=154&";
				$passInput = "EntityRecordID=".$var."&AptifyAuthorization=DomainWithContainer%20".$AuthToken;
				$API = $API.$passInput;
				array_push($returnArr, $API);
			}
			//$API = urlencode($API);
			//setcookie ("AptifySession","$AuthToken",time()+ (24 * 60 * 60));
			//$_SESSION[""] = $AuthToken;
			echo "// 18. Get payment invoice PDF: <br />";
			// Add JSON sample here
			//$JSONreturn = curlRequest($API, "PDF", $AuthToken);
			return $returnArr;
		case "19":
			// Eddy - done check;
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/NationalGroupProducts/";
			echo "<br />19. Dashbaord - Get list of National Group: <br />";
			$API = $API.$variables["UserID"];
			$JSONreturn = curlRequest($API, "JSON", $jsonVersion);
			// Add JSON sample here
			return $JSONreturn;
		case "20":
			// Eddy - done check;
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/DataObjects/spGetListOfSubscribedNationalGroup__c?";
			$var = "UserID=".$variables["UserID"];
			echo "<br />20. Dashboard - Get list of subscribed National Group: <br />";
			// Add JSON sample here
			$JSONreturn = curlRequest($API, "Get", $var);
			return $JSONreturn;
		case "21":
			// Eddy - done check;
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/FellowshipProducts/-1";
			echo "<br />21. Dashboard - Get list of Fellowship Products: <br />";
			// Add JSON sample here
			$JSONreturn = curlRequest($API, "JSON", $jsonVersion);
			echo $JSONreturn;
			return $JSONreturn;
		case "22":
			// Eddy - done check;
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/DataObjects/spGetListOfSubscribedFellowshipProducts__c?";
			$var = "UserID=".$variables["UserID"];
			echo "<br />22. Dashboard - Get list of subscribed Fellowship Product: <br />";
			// Add JSON sample here
			$JSONreturn = curlRequest($API, "Get", $var);
			return $JSONreturn;
		case "23":
			// Eddy - done check;
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/DataObjects/spGetListOfSubscriptionPreferences__c?";
			$var = "UserID=".$variables["UserID"];
			echo "<br />23. Dashbard - Get list of Subscription preferences: <br />";
			// Add JSON sample here
			$JSONreturn = curlRequest($API, "Get", $var);
			return $JSONreturn;
		case "24":
			// Eddy - done check;
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/UpdateSubscriptionPref";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />24. Dashbaord - Update subscription preferences: <br />";
			// Add JSON sample here
			$JSONreturn = curlRequest($API, "JSON", $jsonVersion);
			echo $JSONreturn;
			return $JSONreturn;
		case "25":
			//API test by JingHu
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/UserRegistration";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />25. User Registration: <br />";
			$JSONreturn = curlRequest($API, "JSON", $jsonVersion); 
			echo $JSONreturn;
			return $JSONreturn;
			break;
		case "26":
			//API test by JingHu
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/PlaceOrder";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />26. REgister a new member order: <br />";
			// Add JSON sample here
			$JSONreturn = curlRequest($API, "Order", $jsonVersion);
            echo $JSONreturn;		
			return $JSONreturn;
			break;
		case "27":
			//API test by JingHu
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/RenewMembershipOrder";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />27. Renew membership order: <br />";
			// Add JSON sample here
			$JSONreturn = curlRequest($API, "JSON", $jsonVersion);
			echo $JSONreturn;		
			return $JSONreturn;
		case "28":
			// Eddy 
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/PDGetEventSearchResultsList";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />28. PD - Get event search result list: <br />";
			// Add JSON sample here
			$JSONreturn = curlRequest($API, "JSON", $jsonVersion);
			return $JSONreturn;
		case "29":
			// Eddy 
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/PDGetEventDetail";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />29. PD - Get event detail: <br />";
			// Add JSON sample here
			$JSONreturn = curlRequest($API, "JSON", $jsonVersion);
			return $JSONreturn;
		case "30":
			// Eddy 
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/PDGetEventDetailList";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />30. PD - Get event detail list: <br />";
			// Add JSON sample here
			$JSONreturn = curlRequest($API, "JSON", $jsonVersion); 
			return $JSONreturn;
		case "31":
			//API test by JingHu
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/MembershipProducts/".$_SESSION['UserId'];
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />31. Get MEmbership product price: <br />";
			// Add JSON sample here
			$JSONreturn = curlRequest($API, "JSON", $jsonVersion); 
			echo $JSONreturn;
			return $JSONreturn;
			break;	
		case "32":
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />32. Order confirmation: <br />";
			// Add JSON sample here
			$JSONreturn = '{
				"Orderstatus":"done!",
				"InvoiceID":"12"
			}';
			return $JSONreturn;
		case "33":
			// Eddy - done check;
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/GetEducationUnits__c/";
			echo "<br />33. Get CPD diary: <br />";
			// Add JSON sample here
			$var = $variables;
			$JSONreturn = curlRequest($API, "Get", $var);
			return $JSONreturn;
		case "34":
			// Eddy - done check;
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/CreateNonAPAEducationUnits";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />34. Insert CPD diary: <br />";
			// Add JSON sample here
			$JSONreturn = curlRequest($API, "JSON", $jsonVersion);
			$JSONreturn = "Successfully updated!! :)";
			return $JSONreturn;
		case "35":
			// Eddy
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />35. Find a Physio data: <br />";
			// Add JSON sample here
			$JSONreturn = "";
			return $JSONreturn;
		case "36":
			//API test by JingHu
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/DataObjects/spGetWorkPlaceSettings__c";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />36. Get workplace settings list <br />";
			// Add JSON sample here
			
			$JSONreturn = curlRequest($API, "Get", "");
			return $JSONreturn;
		case "37":
			// Merged to 39
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />37. Get special interest area list <br />";
			// Add JSON sample here
			if(count($variables) == 1) {
				// When this web service is triggered to get
				// National Group list only
			$JSONreturn = '{ 
				"InterestAreas": [
				    {
					   "ListName":"Acupuncture and dry needling",
					   "ListCode":"ACU"
					},
					{
						"ListName":"Adolescents",
						"ListCode":"ADO"
					},
					{
						"ListName":"Aging well",
						"ListCode":"AGE"
					},
					{
						"ListName":"Amputees",
						"ListCode":"AMP"
					},
					{
						"ListName":"Arthritis",
						"ListCode":"ART"
					},
					{
						"ListName":"Babies and children",
						"ListCode":"CHILD"
					},
					{
						"ListName":"Back and neck",
						"ListCode":"BAN"
					}
					
                ]					
				}';
			} else {
				$JSONreturn = "";
			}
			return $JSONreturn;
		case "38":
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />38. Get NON-APA CPD point's PDF<br />";
			// Add JSON sample here
			$JSONreturn = '{ 
				"Non-CPD_PDF":"NON-CPD PDF file"
			}';
			return $JSONreturn;
		case "39":
			// For the actual API use
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/GetOptionValues";		
			//echo "Data Sent: <br />";
			//print_r($variables);
			//echo "<br />39. Get dropdown option list: <br />";
			$JSONreturn = curlRequest($API, "", "Get");
			return $JSONreturn;
			break;
		case "40":
			// test by Jing Hu
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/DataObjects/spGetPersonInsuranceData__c?";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />40. Get Insurance Data: <br />";
			$insuranceData ="UserID=".$variables["ID"];
			$JSONreturn = curlRequest($API, "Get", $insuranceData);
			echo $JSONreturn;
			return $JSONreturn;
			
			break;
		case "41":
			// test by Jing Hu
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/GenericEntity/SaveData";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />41. Save Insurance Data: <br />";
			$JSONreturn = curlRequest($API, "JSON", $jsonVersion);
            echo $JSONreturn;		
			return $JSONreturn;
			break;
		case "42":
			// test by Jing Hu
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/CreateWebUser";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />42. Sign up: <br />";
			$JSONreturn = curlRequest($API, "JSON", $jsonVersion);
            echo $JSONreturn;		
			return $JSONreturn;
			break;
		case "43":
			// test by Jing Hu
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/DataObjects/spGetUserInstallmentDetails__c?";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />43. Get installment details for the user: <br />";
			$data = "UserID=".$variables["id"];
			$JSONreturn = curlRequest($API, "Get", $data);	
			echo $JSONreturn;
			return $JSONreturn;
			break;
		case "44":
			// test by Jing Hu
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/OrderDetails/";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />44. Get Order Details <br />";
			$JSONreturn = curlRequest($API, "Get", $variables);	
			echo $JSONreturn;
			return $JSONreturn;
			break;
		case "45":
			// test by Jing Hu
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/DataObjects/spGetQuatationOrderID__c?";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />45. Get Renewal Quatation OrderID <br />";
		    $data = "UserID=".$variables["id"];
			$JSONreturn = curlRequest($API, "Get", $data);	
			echo $JSONreturn;
			return $JSONreturn;
			break;
        case "46":
			// test by Jing Hu
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/DataObjects/spGetOrderPaymentScheduledDetails__c?";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />46. Get Order payment schedules <br />";
		    $data = "OrderID=".$variables["id"];
			$JSONreturn = curlRequest($API, "Get", $data);	
			echo $JSONreturn;
			return $JSONreturn['results'];
			break;	
		case "47":
			// test by Jing Hu
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/GetOrderPaymentDetail";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />47. Get calculating the Order Total and Schedule Payments <br />";
		   	$JSONreturn = curlRequest($API, "JSON", $jsonVersion);	
			echo $JSONreturn;
			return $JSONreturn;
			break;			
	}
}

function curlRequest($API, $type, $variables) {
	// create curl resource 
	$ch = curl_init(); 
	// set url 
	if($type == "Get") {
		$urlcurl = $API.$variables;
		curl_setopt($ch, CURLOPT_URL, $urlcurl); 
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
	} elseif($type == "PDF") {
		$urlcurl = $API;
		curl_setopt($ch, CURLOPT_URL, $urlcurl); 
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
	} elseif($type == "GetPost") {
		$urlcurl = $API.$variables;
		curl_setopt($ch, CURLOPT_URL, $urlcurl); 
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Length: 0'));
	} elseif($type == "JSON"||$type == "Image"|| $type == "Order") {
		curl_setopt($ch, CURLOPT_URL, $API); 
		if(!empty($variables) || $variables != null) {
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS,$variables);
		}
	} elseif($type == "Secure"||$type == "SecureNoToken") {
		curl_setopt($ch, CURLOPT_URL, $API); 
		if(!empty($variables) || $variables != null) {
			$secureData = http_build_query($variables);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS,$secureData);
		}
	} else {
		curl_setopt($ch, CURLOPT_URL, $API); 
	}
	if(isset($_SESSION["TokenId"])) {
		if($type == "Secure") {
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				"AptifyAuthorization: Web ".$_SESSION["TokenId"],
				"Content-Type:application/x-www-form-urlencoded" 
			));
		} elseif($type == "PDF") {
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				"AptifyAuthorization: DomainWithContainer ".$variables
			));
		} elseif($type == "SecureNoToken") {
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				"Content-Type:application/x-www-form-urlencoded"
			));
		} elseif($type == "Image"|| $type == "Order"|| $type == "JSON") {
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				"AptifyAuthorization: Web ".$_SESSION["TokenId"],
				"Content-Type:application/json"
			));
		} else {
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				"AptifyAuthorization: Web ".$_SESSION["TokenId"]
			));
		}
    }
	//return the transfer as a string 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
	curl_setopt($ch, CURLOPT_ENCODING, "");
	curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	
	$JSONreturn = curl_exec($ch);
	if(curl_error($ch))
	{
		echo 'error:' . curl_error($ch);
		return curl_error($ch);
	}
	//echo $JSONreturn.'this is call from Aptify';
	// close curl resource to free up system resources 
	curl_close($ch);
	return $JSONreturn;
}

?>
