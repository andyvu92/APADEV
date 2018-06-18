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
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />2. Get membership Certificate PDF: <br />";
			// Add JSON sample here
			$JSONreturn = '{
				"MembershipCertification":"Membership certificate of currency"
			}';
			return $JSONreturn;
		case "3":
			// Eddy
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />3. Get membership insurance certificate PDF: <br />";
			// Add JSON sample here
			$JSONreturn = '{
				"InsuranceCertification":"Insurance certificate of currency"
			}';
			return $JSONreturn;
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
			// For the actual API use
			// $API = "";
			echo "Data Sent: ";
			print_r($variables);
			echo "// 18. Get payment invoice PDF: <br />";
			// Add JSON sample here
			$JSONreturn = '{
				"Invoice":"'.$variables["Invoice_ID"].'`s invoice "
			}';
			return $JSONreturn;
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
 

function logTransaction($APINum, $Sent, $Got) {
	$sizeByte = intval(filesize("sites/Log/APA_Aptify_Communication.log"));
	$size = FileSizeConvert($sizeByte);
	//echo "size: ".$size." // ".filesize("sites/Log/APA_Aptify_Communication.log")."<br />";
	if($sizeByte > 100000) {
		fileloop();
	}
	$fileContinue = "";
	if(file_exists("sites/Log/APA_Aptify_Communication.log")){ // Check If File Already Exists
		$myfile = fopen("sites/Log/APA_Aptify_Communication.log", "r") or die("Unable to open file!");
		$fileContinue = fread($myfile,filesize("sites/Log/APA_Aptify_Communication.log"));
		//echo "Yo: ".$fileContinue."!<br />";
		fclose($myfile);
	}
	$myfile = fopen("sites/Log/APA_Aptify_Communication.log", "w") or die("Unable to open file!");
	// log:
	// UserID, Date/Time, Data Sent,
	// Data Received, Web service Number
	fwrite($myfile, $fileContinue);
	$txt = "UserID: ";
	if(isset($_SESSION["UserId"])) {$txt .= $_SESSION["UserId"]."\n";} else {$txt .= "Null\n";}
	$txt .= "Date/time: ".date("Y-m-d h-i-s")."\n";
	$txt .= "Web Service No: ".$APINum."\n";
	$txt .= "Date Sent: \n";
	$txt .= $Sent."\n";
	$txt .= "Data Received: \n";
	$txt .= $Got."\n";
	$txt .= "---End of Log (".date("Y-m-d h-i-s").")---\n\n\n\n\n";
	//echo $txt;
	fwrite($myfile, $txt);
	fclose($myfile);
	// log file output.
}

// push file names' number increased by 1.
function fileloop() {
	$num = count(scandir('sites/Log/')) - 2;
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
					$newName = $newName = str_replace("APA_Aptify_Communication.log","APA_Aptify_Communication1.log",$fileName);
				} else {
					$newName = str_replace((string)($num - 1),(string)$num,$fileName);
				}
				$num--;
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
