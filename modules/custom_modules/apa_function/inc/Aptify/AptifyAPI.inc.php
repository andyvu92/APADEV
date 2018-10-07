<?php
if(!function_exists('drupal_session_started'))
{
  die("Unauthorized Access");
}

/*Dashboard page render national icons fuction*/
/*Dashboard page*/
function AptifyAPI($APItype, $variables, $jsonVersion){
	$outputReturn = Array();
	switch($APItype){
		case "0":
			// JSON persar
			// Eddy - done check;
			//echo "<br />1. Dashboard Main: <br />";
			//$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/DataObjects/spGetDashboardMainDetailsForUserID__c?";
			$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/DataObjects/spGetMemberDetailsForSSO__c?";
			$passInput = "Userid=".$variables;
			$JSONreturn = curlRequest($API, "Get", $passInput);
			array_push($outputReturn, $JSONreturn);
			array_push($outputReturn, "0. SSO details Endpoint");
			return $outputReturn;
			//return "Test! 0 in";
		case "1":
			// Eddy - done check;
			//echo "<br />1. Dashboard Main: <br />";
			//$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/DataObjects/spGetDashboardMainDetailsForUserID__c?";
			$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/DataObjects/spGetDashboardMainDetailsForUserID__c?";
			$passInput = "Userid=".$variables;
			$JSONreturn = curlRequest($API, "Get", $passInput);
			array_push($outputReturn, $JSONreturn);
			array_push($outputReturn, "1. Dashboard Main");
			return $outputReturn;
		case "2":
			// Eddy - done check;
			//echo "<br />2. Get membership Certificate PDF: <br />";
			$AptifyAuth = 'https://aptifyweb.australian.physio/AptifyServicesAPI/services/Authentication/Login/DomainWithContainer?UserName=appsvruser&Password=R#D8_Hn@4p';
			$AuthToken = curlRequest($AptifyAuth, "Get", "");
			$AuthToken = json_decode($AuthToken, true);
			$AuthToken = $AuthToken["TokenId"];

			$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/forms/CrystalReportView.aspx?ViewMode=entityRecord&ViewEntityName=Persons&ReportId=151&";
			$passInput = "EntityRecordID=".$variables."&AptifyAuthorization=DomainWithContainer%20".$AuthToken;
			$API = $API.$passInput;
			$APItt = "https://aptifyweb.australian.physio/AptifyServicesAPI/forms/CrystalReportView.aspx?ViewMode=entityRecord&ViewEntityName=Persons&ReportId=150&";
			$passInputt = "EntityRecordID=".$variables."&AptifyAuthorization=DomainWithContainer%20".$AuthToken;
			$APItt = $APItt.$passInput;
			$APIs["M"] = $API;
			$APIs["I"] = $APItt;
			return $APIs;
		case "3":
			// Eddy - done check;
			//echo "<br />3. Get membership insurance certificate PDF: <br />";
			$AptifyAuth = 'https://aptifyweb.australian.physio/AptifyServicesAPI/services/Authentication/Login/DomainWithContainer?UserName=appsvruser&Password=R#D8_Hn@4p';
			$AuthToken = curlRequest($AptifyAuth, "Get", "");
			$AuthToken = json_decode($AuthToken, true);
			$AuthToken = $AuthToken["TokenId"];
			$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/forms/CrystalReportView.aspx?ViewMode=entityRecord&ViewEntityName=Persons&ReportId=150&";
			$passInput = "EntityRecordID=".$variables."&AptifyAuthorization=DomainWithContainer%20".$AuthToken;
			$API = $API.$passInput;
			$JSONreturn = curlRequest($API, "PDF", $AuthToken);
			return $API;
		case "4":
			//API test by JingHu
			//echo "<br />4. Dashboard - Get member detail: <br />";
			$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/GetDBMemberDetails?";		
			$JSONreturn = curlRequest($API, "Get", $variables);
			array_push($outputReturn, $JSONreturn);
			array_push($outputReturn, "4. Dashboard - Get member detail");
			return $outputReturn;
			break;
		case "5":
			//API test by JingHu
			//echo "<br />5. Member detail - Update: <br />";
			$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/DMemberDetailUpdate";		
			$JSONreturn = curlRequest($API, "JSON", $jsonVersion); 
			array_push($outputReturn, $JSONreturn);
			array_push($outputReturn, "5. Member detail - Update");
			return $outputReturn;
			break;
		case "6":
			// Eddy;
			//echo "<br />6. Dashboard - Forgot password: <br />";
			if(isset($variables["Token"])) {
				$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/Authentication/PasswordReset/Web";
				$JSONreturn = curlRequest($API, "SecureNoToken", $variables);
			} else {
				$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/Authentication/PasswordResetRequest/Web?";
				$variable = "UserName=".$variables["email"]."&email=".$variables["email"];
				$JSONreturn = curlRequest($API, "GetPost", $variable);
			}
			array_push($outputReturn, $JSONreturn);
			array_push($outputReturn, "6. Dashboard - Forgot password");
			return $outputReturn;
		case "7":
			// Eddy - done check;
			//echo "<br />7. Dashboard - log-in: <br />";
			$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/Authentication/Login/Web?";
			$variable = "UserName=".$variables['ID']."&Password=".$variables['Password'];
			$JSONreturn = curlRequest($API, "Get", $variable);
			array_push($outputReturn, $JSONreturn);
			array_push($outputReturn, "7. Dashboard - log-in");
			return $outputReturn;
		case "8":
			// Eddy - done check;
			//echo "<br />8. Dashboard - Log-out: <br />";
			$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/Authentication/Logout";
			$JSONreturn = curlRequest($API, "", "");
			array_push($outputReturn, $JSONreturn);
			array_push($outputReturn, "8. Dashboard - Log-out");
			return $outputReturn;
		case "9":
			// Eddy - done check;
			//echo "<br />9. Dashboard - change password: <br />";
			$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/UpdatePassword";
			$JSONreturn = curlRequest($API, "JSON", $jsonVersion);
			array_push($outputReturn, $JSONreturn);
			array_push($outputReturn, "9. Dashboard - change password");
			return $outputReturn;
		case "10":
			//API test by JingHu
			//echo "<br />10. Dashboard - Get picture: <br />";
			$PersonID = $_SESSION['LinkId'];
			$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/ImageField/Persons/".$PersonID."/Photo";		
			$JSONreturn = curlRequest($API, "Get", "");
			array_push($outputReturn, $JSONreturn);
			array_push($outputReturn, "10. Dashboard - Get picture");
			return $outputReturn;
			break;
		case "11":
			//API test by JingHu
			//echo "<br />11. Dashboard - Update picture: <br />";
			$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/GenericEntity/SaveData";
			$JSONreturn = curlRequest($API, "Image", $jsonVersion); 
			array_push($outputReturn, $JSONreturn);
			array_push($outputReturn, "11. Dashboard - Update picture");
			return $outputReturn;
			break;
		case "12":
			//API test by JingHu
			$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/DataObjects/spGetPaymentListing__c?";
			//echo "<br />12. Dashboard - Get payment listing: <br />";
			$data = "UserID=".$variables["id"];
			$JSONreturn = curlRequest($API, "Get", $data);
			array_push($outputReturn, $JSONreturn);
			array_push($outputReturn, "12. Dashboard - Get payment listing");
			return $outputReturn;
			break;
		case "13":
			//API test by JingHu
			//echo "<br />13. Dashboard - update payment method: <br />";
			$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/ProcessFlow/UpdatePaymentMethod__c";
			$JSONreturn = curlRequest($API, "Secure", $variables); 
			array_push($outputReturn, $JSONreturn);
			array_push($outputReturn, "13. Dashboard - update payment method");
			return $outputReturn;
			break;
		case "14":
			// Merged together with Case 13
			//echo "<br />14. Delete payment method: <br />";
			$JSONreturn = "";
			array_push($outputReturn, $JSONreturn);
			array_push($outputReturn, "14. Delete payment method");
			return $outputReturn;
		case "15":
			//API test by JingHu
			//echo "<br />15. Dashboard - Add payment method: <br />";
			$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/AddPaymentMethod";
			$JSONreturn = curlRequest($API, "JSON", $jsonVersion); 
			array_push($outputReturn, $JSONreturn);
			array_push($outputReturn, "15. Dashboard - Add payment method");
			return $outputReturn;
			break;
		case "16":
			//API test by JingHu
			//echo "<br />16. Dashboard - Check existing email: <br />";
			$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/VerifyUserName/".$variables["ID"];
			$JSONreturn = curlRequest($API, "JSON",""); 
			array_push($outputReturn, $JSONreturn);
			array_push($outputReturn, "16. Dashboard - Check existing email");
			return $outputReturn;
		case "17":
			// Eddy - done check;
			//echo "<br />17. Dashboard - Get payment history list: <br />";
			$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/GetOrderDetails?";
			$sent = "UserID=".$variables["ID"];
			$JSONreturn = curlRequest($API, "Get", $sent);
			array_push($outputReturn, $JSONreturn);
			array_push($outputReturn, "17. Dashboard - Get payment history list");
			return $outputReturn;
		case "18":
			// Eddy
			//echo "// 18. Get payment invoice PDF: <br />";
			$AptifyAuth = 'https://aptifyweb.australian.physio/AptifyServicesAPI/services/Authentication/Login/DomainWithContainer?UserName=appsvruser&Password=R#D8_Hn@4p';
			$AuthToken = curlRequest($AptifyAuth, "Get", "");
			$AuthToken = json_decode($AuthToken, true);
			$AuthToken = $AuthToken["TokenId"];
			$returnArr = Array();
			foreach($variables as $var) {
				$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/forms/CrystalReportView.aspx?ViewMode=entityRecord&ViewEntityName=Orders&ReportId=154&";
				$passInput = "EntityRecordID=".$var."&AptifyAuthorization=DomainWithContainer%20".$AuthToken;
				$API = $API.$passInput;
				array_push($returnArr, $API);
			}
			return $returnArr;
		case "19":
			// Eddy - done check;
			//echo "<br />19. Dashbaord - Get list of National Group: <br />";
			$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/NationalGroupProducts/";
			$API = $API.$variables["UserID"];
			$JSONreturn = curlRequest($API, "JSON", $jsonVersion);
			array_push($outputReturn, $JSONreturn);
			array_push($outputReturn, "19. Dashbaord - Get list of National Group");
			return $outputReturn;
		case "20":
			// Eddy - done check;
			//echo "<br />20. Dashboard - Get list of subscribed National Group: <br />";
			$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/DataObjects/spGetListOfSubscribedNationalGroup__c?";
			$var = "UserID=".$variables["UserID"];
			$JSONreturn = curlRequest($API, "Get", $var);
			array_push($outputReturn, $JSONreturn);
			array_push($outputReturn, "20. Dashboard - Get list of subscribed National Group");
			return $outputReturn;
		case "21":
			// Eddy - done check;
			//echo "<br />21. Dashboard - Get list of Fellowship Products: <br />";
			$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/FellowshipProducts/-1";
			$JSONreturn = curlRequest($API, "JSON", $jsonVersion);
			array_push($outputReturn, $JSONreturn);
			array_push($outputReturn, "21. Dashboard - Get list of Fellowship Products");
			return $outputReturn;
		case "22":
			// Eddy - done check;
			//echo "<br />22. Dashboard - Get list of subscribed Fellowship Product: <br />";
			$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/DataObjects/spGetListOfSubscribedFellowshipProducts__c?";
			$var = "UserID=".$variables["UserID"];
			$JSONreturn = curlRequest($API, "Get", $var);
			array_push($outputReturn, $JSONreturn);
			array_push($outputReturn, "22. Dashboard - Get list of subscribed Fellowship Product");
			return $outputReturn;
		case "23":
			// Eddy - done check;
			//echo "<br />23. Dashbard - Get list of Subscription preferences: <br />";
			$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/DataObjects/spGetListOfSubscriptionPreferences__c?";
			$var = "UserID=".$variables["UserID"];
			$JSONreturn = curlRequest($API, "Get", $var);
			array_push($outputReturn, $JSONreturn);
			array_push($outputReturn, "23. Dashbard - Get list of Subscription preferences");
			return $outputReturn;
		case "24":
			// Eddy - done check;
			//echo "<br />24. Dashbaord - Update subscription preferences: <br />";
			$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/UpdateSubscriptionPref";
			$JSONreturn = curlRequest($API, "JSON", $jsonVersion);
			array_push($outputReturn, $JSONreturn);
			array_push($outputReturn, "24. Dashbaord - Update subscription preferences");
			return $outputReturn;
		case "25":
			//API test by JingHu
			//echo "<br />25. User Registration: <br />";
			$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/UserRegistration";
			$JSONreturn = curlRequest($API, "JSON", $jsonVersion); 
			array_push($outputReturn, $JSONreturn);
			array_push($outputReturn, "25. User Registration");
			return $outputReturn;
			break;
		case "26":
			//API test by JingHu
			//echo "<br />26. REgister a new member order: <br />";
			$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/PlaceOrder";
			$JSONreturn = curlRequest($API, "Order", $jsonVersion);
			array_push($outputReturn, $JSONreturn);
			array_push($outputReturn, "26. REgister a new member order");
			return $outputReturn;
			break;
		case "27":
			//API test by JingHu
			//echo "<br />27. Renew membership order: <br />";
			$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/RenewMembershipOrder";
			$JSONreturn = curlRequest($API, "JSON", $jsonVersion);
			array_push($outputReturn, $JSONreturn);
			array_push($outputReturn, "27. Renew membership order");
			return $outputReturn;
		case "28":
			// Eddy 
			//echo "<br />28. PD - Get event search result list: <br />";
			$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/PDGetEventSearchResultsList";
			$JSONreturn = curlRequest($API, "JSON", $jsonVersion);
			array_push($outputReturn, $JSONreturn);
			array_push($outputReturn, "28. PD - Get event search result list");
			return $outputReturn;
		case "29":
			// Eddy 
			//echo "<br />29. PD - Get event detail: <br />";
			$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/PDGetEventDetail";
			$JSONreturn = curlRequest($API, "JSON", $jsonVersion);
			array_push($outputReturn, $JSONreturn);
			array_push($outputReturn, "29. PD - Get event detail");
			return $outputReturn;
		case "30":
			// Eddy 
			//echo "<br />30. PD - Get event detail list: <br />";
			$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/PDGetEventDetailList";
			$JSONreturn = curlRequest($API, "JSON", $jsonVersion); 
			array_push($outputReturn, $JSONreturn);
			array_push($outputReturn, "30. PD - Get event detail list");
			return $outputReturn;
		case "31":
			//API test by JingHu
			//echo "<br />31. Get Membership product price: <br />";
			//$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/MembershipProducts/".$_SESSION['UserId'];
			if(isset($_SESSION['UserId'])){
				$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/MembershipProducts/".$_SESSION['UserId'];}
			else{
				$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/MembershipProducts/-1";	
			}
			$JSONreturn = curlRequest($API, "JSON", $jsonVersion); 
			array_push($outputReturn, $JSONreturn);
			array_push($outputReturn, "31. Get MEmbership product price");
			return $outputReturn;
		case "32":
			//echo "<br />32. Order confirmation: <br />";
			// For the actual API use - user User registration instead
			$JSONreturn = '{
				"Orderstatus":"done!",
				"InvoiceID":"12"
			}';
			array_push($outputReturn, $JSONreturn);
			array_push($outputReturn, "32. Order confirmation");
			return $outputReturn;
		case "33":
			// Eddy - done check;
			//echo "<br />33. Get CPD diary: <br />";
			$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/GetEducationUnits__c/";
			$var = $variables;
			$JSONreturn = curlRequest($API, "Get", $var);
			array_push($outputReturn, $JSONreturn);
			array_push($outputReturn, "33. Get CPD diary");
			return $outputReturn;
		case "34":
			// Eddy - done check;
			//echo "<br />34. Insert CPD diary: <br />";
			$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/CreateNonAPAEducationUnits";
			$JSONreturn = curlRequest($API, "JSON", $jsonVersion);
			//$JSONreturn = "Successfully updated!! :)";
			array_push($outputReturn, $JSONreturn);
			array_push($outputReturn, "34. Insert CPD diary");
			return $outputReturn;
		case "35":
			// Eddy
			// echo "<br />35. Find a Physio data: <br />";
			// cron.
			$JSONreturn = "";
			return $JSONreturn;
		case "36":
			//API test by JingHu
			//echo "<br />36. Get workplace settings list <br />";
			$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/DataObjects/spGetWorkPlaceSettings__c";
			$JSONreturn = curlRequest($API, "Get", "");
			array_push($outputReturn, $JSONreturn);
			array_push($outputReturn, "36. Get workplace settings list ");
			return $outputReturn;
		case "37":
			// Merged to 39
			//echo "<br />37. Get special interest area list <br />";
			$JSONreturn = "";
			return $JSONreturn;
		case "38":
			// Eddy
			//echo "<br />38. Get NON-APA CPD point's PDF<br />";
			$AptifyAuth = 'https://aptifyweb.australian.physio/AptifyServicesAPI/services/Authentication/Login/DomainWithContainer?UserName=appsvruser&Password=R#D8_Hn@4p';
			$AuthToken = curlRequest($AptifyAuth, "Get", "");
			$AuthToken = json_decode($AuthToken, true);
			$AuthToken = $AuthToken["TokenId"];
			$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/forms/CrystalReportView.aspx?ViewMode=entityRecord&ViewEntityName=Persons&ReportId=152&";
			$passInput = "EntityRecordID=".$variables."&AptifyAuthorization=DomainWithContainer%20".$AuthToken;
			$API = $API.$passInput;
			return $API;
		case "39":
			// For the actual API use
			//echo "<br />39. Get dropdown option list: <br />";
			$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/GetOptionValues";		
			$JSONreturn = curlRequest($API, "", "Get");
			array_push($outputReturn, $JSONreturn);
			array_push($outputReturn, "39. Get dropdown option list");
			return $outputReturn;
		case "40":
			// test by Jing Hu
			//echo "<br />40. Get Insurance Data: <br />";
			$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/DataObjects/spGetPersonInsuranceData__c?";
			$insuranceData ="UserID=".$variables["ID"];
			$JSONreturn = curlRequest($API, "Get", $insuranceData);
			array_push($outputReturn, $JSONreturn);
			array_push($outputReturn, "40. Get Insurance Data");
			return $outputReturn;
		case "41":
			// test by Jing Hu
			//echo "<br />41. Save Insurance Data: <br />";
			$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/GenericEntity/SaveData";
			$JSONreturn = curlRequest($API, "JSON", $jsonVersion);
			array_push($outputReturn, $JSONreturn);
			array_push($outputReturn, "41. Save Insurance Data");
			return $outputReturn;
		case "42":
			// test by Jing Hu
			//echo "<br />42. Sign up: <br />";
			$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/CreateWebUser";
			$JSONreturn = curlRequest($API, "JSON", $jsonVersion);
			array_push($outputReturn, $JSONreturn);
			array_push($outputReturn, "42. Sign up");
			return $outputReturn;
		case "43":
			// test by Jing Hu
			//echo "<br />43. Get installment details for the user: <br />";
			$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/DataObjects/spGetUserInstallmentDetails__c?";
			$data = "UserID=".$variables["id"];
			$JSONreturn = curlRequest($API, "Get", $data);	
			array_push($outputReturn, $JSONreturn);
			array_push($outputReturn, "43. Get installment details for the user");
			return $outputReturn;
		case "44":
			// test by Jing Hu
			//echo "<br />44. Get Order Details <br />";
			$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/OrderDetails/";
			$JSONreturn = curlRequest($API, "Get", $variables);	
			array_push($outputReturn, $JSONreturn);
			array_push($outputReturn, "44. Get Order Details ");
			return $outputReturn;
		case "45":
			// test by Jing Hu
			//echo "<br />45. Get Renewal Quatation OrderID <br />";
			$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/DataObjects/spGetQuatationOrderID__c?";
			$data = "UserID=".$variables["id"];
			$JSONreturn = curlRequest($API, "Get", $data);	
			array_push($outputReturn, $JSONreturn);
			array_push($outputReturn, "45. Get Renewal Quatation OrderID ");
			return $outputReturn;
        case "46":
			// test by Jing Hu
			//echo "<br />46. Get Order payment schedules <br />";
			$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/DataObjects/spGetOrderPaymentScheduledDetails__c?";
			$data = "OrderID=".$variables["id"];
			$JSONreturn = curlRequest($API, "Get", $data);	
			return $JSONreturn['results'];
			array_push($outputReturn, $JSONreturn['results']);
			array_push($outputReturn, "46. Get Order payment schedules ");
			return $outputReturn;
		case "47":
			// test by Jing Hu
			//echo "<br />47. Get calculating the Order Total and Schedule Payments <br />";
			$API = "https://aptifyweb.australian.physio/AptifyServicesAPI/services/GetOrderPaymentDetail";
			$JSONreturn = curlRequest($API, "JSON", $jsonVersion);	
			array_push($outputReturn, $JSONreturn);
			array_push($outputReturn, "47. Get calculating the Order Total and Schedule Payments ");
			return $outputReturn;
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
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array()));
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
	// todo! You must do this before go live!
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	
	$JSONreturn = curl_exec($ch);
	if(curl_error($ch))
	{
		//echo 'error:' . curl_error($ch);
		return curl_error($ch);
	}
	////echo $JSONreturn.'this is call from Aptify';
	// close curl resource to free up system resources 
	curl_close($ch);
	return $JSONreturn;
	return "";
}

function logTransaction($APINum, $Sent, $Got) {
	//$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Rkd#!8cd,&ag6e95g9&5192(gb[5g'); 
	//$profile = $dbt->prepare('INSERT INTO logprofile (userID, text) VALUES (:userID, :text)');	
	$profile	=  db_insert('logprofile'); 
				
	$txt = "UserID: ";
	if(isset($_SESSION["UserId"])) {
		$txt .= $_SESSION["UserId"]."\n";
		//$profile->bindValue(':userID', $_SESSION["UserId"]);
		$userlogID =$_SESSION["UserId"];
		
	} else {
		//$profile->bindValue(':userID', 'noValue');
		$userlogID ="noValue";
		$txt .= "noValue\n";
	}
	$txt .= "Date/time: ".date("Y-m-d h-i-s")."\n";
	$txt .= "Web Service No: ".$APINum."\n";
	$txt .= "Date Sent: \n";
	$txt .= $Sent."\n";
	$txt .= "Data Received: \n";
	$txt .= $Got."\n";
	$txt .= "---End of Log (".date("Y-m-d h-i-s").")---\n\n\n\n\n";
	
	//$profile->bindValue(':text', $txt);		  
	$profile->fields(array(
				  'userID' => $userlogID,
				  'text' => $txt,
	));
	// log file output.
	$profile->execute();	
	//$profile->closeCursor();
	//$profile = null;
	//$dbt = null;
}

/** Log record start / end
  * Records log when sent TRUE.
  * When start - Use
  *
  *
  *
  */
function logRecorder() {
	/* load log file and prepare for new data */
	$sizeByte = intval(filesize("sites/Log/APA_Aptify_Communication.log"));
	//$size = FileSizeConvert($sizeByte);
	////echo "size: ".$size." // ".filesize("sites/Log/APA_Aptify_Communication.log")."<br />";
	if($sizeByte > 1000000) {
		fileloop();
	}
	$fileContinue = "";
	if(file_exists("sites/Log/APA_Aptify_Communication.log")){ // Check If File Already Exists
		$myfilet = fopen("sites/Log/APA_Aptify_Communication.log", "r");
		$fileContinue = fread($myfilet,filesize("sites/Log/APA_Aptify_Communication.log"));
		////echo "Yo: ".$fileContinue."!<br />";
		fclose($myfilet);
	}
	/* load logged records to a single text */
	//$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Rkd#!8cd,&ag6e95g9&5192(gb[5g'); 
	//$profileFinal= $dbt->prepare('SELECT * FROM logprofile WHERE userID= :userID');	
	if(isset($_SESSION["UserId"])) {
		//$profileFinal->bindValue(':userID', $_SESSION["UserId"]);
	    $userlog = $_SESSION["UserId"];
		//$Mdelete = $dbt->prepare('DELETE FROM logprofile WHERE userID = '.$_SESSION["UserId"].'');
		//$Mdelete ->condition('userID', $_SESSION["UserId"], '=');
	} else {
		//$profileFinal->bindValue(':userID', 'noValue');
		//$profileFinal->condition('userID', 'noValue', '=');
		//$Mdelete = $dbt->prepare('DELETE FROM logprofile WHERE userID = "noValue"');
		//$Mdelete ->condition('userID', 'noValue', '='); 
		$userlog = "noValue";
	}
	$profileFinal=db_select('logprofile','logfile')
	->fields('logfile')
	->condition('userID', $userlog, '=')
    ->execute()
	->fetchAll();
	$profileFinal = json_decode(json_encode($profileFinal), True);
	$finalLog = "";
	foreach($profileFinal as $profiles) {
		$finalLog .= $profiles["text"];
		
	}
	/* add final version of log record to existing log file */
	$myfile = fopen("sites/Log/APA_Aptify_Communication.log", "w");
	// log:
	// UserID, Date/Time, Data Sent,
	// Data Received, Web service Number
	fwrite($myfile, $fileContinue);
	fwrite($myfile, $finalLog);
	fclose($myfile);
	$Mdelete = db_delete('logprofile');
	$Mdelete ->condition('userID', $userlog, '=');
	$Mdelete->execute();
	/* close connection */
	//$Mdelete->closeCursor();
	//$Mdelete = null;
	//$profileFinal->closeCursor();
	//$profileFinal = null;
	//$dbt = null;
	
}

// push file names' number increased by 1.
function fileloop() {
	//echo "in!!!";
	$num = count(scandir('sites/Log/')) - 2;
	$num = str_pad($num, 5, "0", STR_PAD_LEFT);
	//echo "<br>Num:$num<br><br>";
	$arrayT = array();
	if($handle = opendir('sites/Log/')) {
		while (false !== ($fileName = readdir($handle))) {
			array_push($arrayT, $fileName);			
		}
		closedir($handle);
	}
	arsort($arrayT);
	foreach($arrayT as $fileName) {
		
		if(strlen($fileName) > 2 ) {
			//echo $fileName." - iiiinnnnn!!!<br />";
			if($fileName == "APA_Aptify_Communication.log") {
				$newName = str_replace("APA_Aptify_Communication.log","APA_Aptify_Communication00001.log",$fileName);
			} else {
				$Nnum = $num - 1;
				$Nnum = str_pad($Nnum, 5, "0", STR_PAD_LEFT);
				$newName = str_replace((string)$Nnum,(string)$num,$fileName);
			}
			//echo "before:$num";
			$num--;
			$num = str_pad($num, 5, "0", STR_PAD_LEFT);
			//echo "after:$num";
			//echo "new Name: ".$newName."<br />";
			if(!file_exists("sites/Log/".$newName)){ // Check If File Already Exists
				if(rename("sites/Log/".$fileName, "sites/Log/".$newName)){ // Check If rename Function Completed Successfully
					//echo "Successfully Renamed $fileName to $newName<br />" ;
				}else{
					//echo "There Was Some Error While Renaming $fileName<br />" ;
				}
			}else{
				//echo "A File With The New File Name Already Exists<br />" ;
			}
		}
	}
}


/** 
* Converts bytes into human readable file size. 
* 
* @param string $bytes 
* @return string human readable file size (2,87 Мб)
* @author Mogilev Arseny 
*/
function FileSizeConvert($bytes)
{
    $bytes = floatval($bytes);
        $arBytes = array(
            0 => array(
                "UNIT" => "TB",
                "VALUE" => pow(1024, 4)
            ),
            1 => array(
                "UNIT" => "GB",
                "VALUE" => pow(1024, 3)
            ),
            2 => array(
                "UNIT" => "MB",
                "VALUE" => pow(1024, 2)
            ),
            3 => array(
                "UNIT" => "KB",
                "VALUE" => 1024
            ),
            4 => array(
                "UNIT" => "B",
                "VALUE" => 1
            ),
        );

    foreach($arBytes as $arItem)
    {
        if($bytes >= $arItem["VALUE"])
        {
            $result = $bytes / $arItem["VALUE"];
            $result = str_replace(".", "," , strval(round($result, 2)))." ".$arItem["UNIT"];
            break;
        }
    }
    return $result;
}
?>
