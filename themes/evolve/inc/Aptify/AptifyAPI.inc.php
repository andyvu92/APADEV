<?php

/*Dashboard page render national icons fuction*/
/*Dashboard page*/
function AptifyAPI($APItype, $variables, $jsonVersion){
	switch($APItype){
		case "0":
			// JSON persar
			// 
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
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />4. Dashboard - Get member detail: <br />";
			// Add JSON sample here
			$JSONreturn = '{  
				   "Prefix":"Mrs.",
				   "Firstname":"Allen",
				   "Preferred-name":"",
				   "Middle-name":"",
				   "Maiden-name":"Allen",
				   "Lastname":"Wang",
				   "Birth":"2017-05-05",
				   "Gender":"Female",
				   "Home-phone-number":["61","04","26897456"],
				   "Mobile-number":"",
				   "Aboriginal":"",
				   "Dietary":["Shellfish","Eggs","Lactose"],
				   "BuildingName":"",
				   "Address_Line_1":"1175 ",'.// changed
				   '"Pobox":"437",
				   "Address_Line_2":"Toorak Road",'.// changed
				   '"Suburb":"Camberwell",
				   "Postcode":"3124",
				   "State":"79",
				   "Country":"14",
				   "Memberno":"1234567",
				   "Memberid":"test@gmail.com",
				   "MemberType":"4",
				   "Ahpranumber":"6934395685-1",
				   "Nationalgp":[
						"1",
						"2"
					],
				   "Branch":"79",
				   "SpecialInterest":["BAN","CHILD","ACU"],'.// Added
				   '"Treatmentarea":["BAN","CHILD","ACU"],'. // Added
				   '"Specialty":"FACP",
				   "Additionallanguage":["1","2","3"],
				   "Status":"Current",
				   "Findpublicbuddy":"1",
				   "Regional-group":{"NSW":"NSW","NSW-CC":"NSW - CENTRAL COAST","NSW-CH":"NSW - COFFS HARBOUR"},
				   "PaythroughDate":"2018-05-05",
				   "Billing-BuildingName":"",
				   "Billing-Address_Line_1":"1175",'.// changed
				   '"Billing-PObox":"",'.// Added
				   '"Billing-Address_Line_2":"Toorak Road",'.// changed
				   '"Billing-Suburb":"Melbourne",
				   "Billing-Postcode":"3177",
				   "Billing-State":"79",
				   "Billing-Country":"14",
				   "Duplicate":"1",
				   "Shipping-BuildingName":"",
				   "Shipping-Address_Line_1":"1175",'.// changed
				   '"Shipping-PObox":"",'.// Added
				   '"Shipping-Address_Line_2":"Toorak Road",'.// changed
				   '"Shipping-city-town":"Melbourne",
				   "Shipping-postcode":"3177",
				   "Shipping-state":"VIC",
				   "Shipping-country":"Australia",
				   "Mailing-BuildingName":"",'.// Added
				   '"Mailing-Address_Line_1":"1175",'.// changed
				   '"Mailing-PObox":"",'.// Added
				   '"Mailing-Address_Line_2":"Toorak Road",'.// changed
				   '"Mailing-city-town":"Melbourne",
				   "Mailing-postcode":"3177",
				   "Mailing-state":"79",
				   "Mailing-country":"14",
				   "Udegree":"3",
				   "Undergraduate-university-name":"CUR",
				   "Ugraduate-country":"14",
				   "Ugraduate-year-attained":"2001",
				   "Pdegree":"4",
				   "Postgraduate-university-name":"CUR",
				   "Pgraduate-country":"14",
				   "Pgraduate-year-attained":"2001",
				   "Additional-qualifications": {
					"0":{
						"degree":"3",
						"university-name": "CUR",
						"additional-country":"14",
						"additional-year-attained":"2015"
					    },
					"1":{
						"degree":"2",
						"university-name": "CUR",
						"additional-country":"14",
						"additional-year-attained":"2018"
					    }
 				    },
					
				   "Workplaces":{  
					"0": {  
						 "Workplace_ID":"72516",
						 "Name-of-workplace":"APA",
						 "WBuildingName":"BuildingName",
						 "Address_Line_1":"2",'. // changed
						 '"Address_Line_2":"toorak road",'. // changed
						 '"Wcity":"Melbourne",
						 "Wpostcode":"3177",
						 "Wstate":"79",
						 "Wcountry":"14",
						 "Wemail":"test@apa.com",
						 "Wwebaddress":"www.apa.com",
						 "Wphone":"0390920888",
						 "Additionallanguage":["1","2","3"],
						 "QIP":"123456",
						 "Electronic-claiming":"1",
						 "Hicaps":"1",
						 "Healthpoint":"1",
						 "Departmentva":"1",
						 "Workerscompensation":"1",
						 "Motora":"1",
						 "Medicare":"1",
						 "Workplace-setting":"Defence-forces",
						 "Number-worked-hours":"7",
						 "Treatmentarea": ["BAN","CHILD","ACU"], './/changed
						 '"Findabuddy":"1",'. // Added
						 '"Findphysio":"1",
						 
						 "Homehospital":"1",
						 "MobilePhysio":"1"
					  },
				   "1": {  
						 "Workplace_ID":"72571",
						 "Name-of-workplace":"testA",
						 "BuildingName":"BuildingName",
						 "Address_Line_1":"2",'. // changed
						 '"Address_Line_2":"toorak road",'. // changed
						 '"Wcity":"Melbourne",
						 "Wpostcode":"3177",
						 "Wstate":"79",
						 "Wcity":"Melbourne",
						 "Wcountry":"14",
						 "Wemail":"test@apa.com",
						 "Wwebaddress":"www.apa.com",
						 "Wphone":"0390920888",
						 "Additionallanguage":["EG"],
						 "QIP":"123456",
						 "Electronic-claiming":"1",
						 "Hicaps":"1",
						 "Healthpoint":"1",
						 "Departmentva":"1",
						 "Workerscompensation":"1",
						 "Motora":"1",
						 "Medicare":"1",
						 "Workplace-setting":"Defence-forces",
						 "Number-worked-hours":"7",
						 "Treatmentarea": ["BAN","CHILD","ACU"], './/changed
						 '"Findabuddy":"1",'. // Added
						 '"Findphysio":"1",
						
						 "Homehospital":"1",
						 "MobilePhysio":"1"
					  },
				   "2": {
						 "Workplace_ID":"72171",
						 "Name-of-workplace":"testB",
						 "BuildingName":"BuildingName",
						 "Address_Line_1":"2",'. // changed
						 '"Address_Line_2":"toorak road",'. // changed
						 '"Wcity":"Melbourne",
						 "Wpostcode":"3177",
						 "Wstate":"79",
						 "Wcity":"Melbourne",
						 "Wcountry":"14",
						 "Wemail":"test@apa.com",
						 "Wwebaddress":"www.apa.com",
						 "Wphone":"0390920888",
						 "Additionallanguage":["EG","AR","FL"],
						 "QIP":"123456",
						 "Electronic-claiming":"1",
						 "Hicaps":"1",
						 "Healthpoint":"1",
						 "Departmentva":"1",
						 "Workerscompensation":"1",
						 "Motora":"1",
						 "Medicare":"1",
						 "Workplace-setting":"Defence-forces",
						 "Number-worked-hours":"7",
						 "Treatmentarea": ["BAN","CHILD","ACU"], './/changed
						 '"Findabuddy":"1",'. // Added
						 '"Findphysio":"1",
						
						 "Homehospital":"1",
						 "MobilePhysio":"1"
					  }
				   }
				}';
			return $JSONreturn;
		case "5":
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />5. Member detail - Update: <br />";
			// Add JSON sample here
			$JSONreturn = '{  
				   "Prefix":"Dr",
				   "Firstname":"Allen",
				   "Preferred-name":"",
				   "Middle-name":"",
				   "Maiden-name":"Allen",
				   "Lastname":"Wang",
				   "Birth":"2017-05-05",
				   "Gender":"Female",
				   "Home-phone-number":"0390920807",
				   "Mobile-number":"",
				   "Aboriginal":"",
				   "Dietary":["Shellfish","Eggs","Lactose"],
				   "BuildingName":"",
				   "Address_Line_1":"1175 ",'.// changed
				   '"Pobox":"437",
				   "Address_Line_2":"Toorak Road",'.// changed
				   '"Suburb":"Camberwell",
				   "Postcode":"3124",
				   "State":"VIC",
				   "Country":"Australia",
				   "Memberno":"1234567",
				   "Memberid":"test@gmail.com",
				   "MemberType":"RW",
				   "Ahpranumber":"6934395685-1",
				   "Nationalgp":[
						"ANI",
						"GER"
					],
				   "Branch":"Branch",
				   "SpecialInterest":["BAN","CHILD","ACU"],'.// Added
				   '"Specialty":"FACP",
				   "Additionallanguage":["EG","AR","FL"],
				   "Status":"Current",
				   "Findpublicbuddy":"1",
				   "Regional-group":{"NSW":"NSW","NSW-CC":"NSW - CENTRAL COAST","NSW-CH":"NSW - COFFS HARBOUR"},
				   "Billing-BuildingName":"",
				   "Billing-Address_Line_1":"1175",'.// changed
				   '"Billing-PObox":"",'.// Added
				   '"Billing-Address_Line_2":"Toorak Road",'.// changed
				   '"Billing-Suburb":"Melbourne",
				   "Billing-Postcode":"3177",
				   "Billing-State":"VIC",
				   "Billing-Country":"Australia",
				   "Duplicate":"1",
				   "Shipping-BuildingName":"",
				   "Shipping-Address_Line_1":"1175",'.// changed
				   '"Shipping-PObox":"",'.// Added
				   '"Shipping-Address_Line_2":"Toorak Road",'.// changed
				   '"Shipping-city-town":"Melbourne",
				   "Shipping-postcode":"3177",
				   "Shipping-state":"VIC",
				   "Shipping-country":"Australia",
				   "Mailing-BuildingName":"",'.// Added
				   '"Mailing-Address_Line_1":"1175",'.// changed
				   '"Mailing-PObox":"",'.// Added
				   '"Mailing-Address_Line_2":"Toorak Road",'.// changed
				   '"Mailing-city-town":"Melbourne",
				   "Mailing-postcode":"3177",
				   "Mailing-state":"VIC",
				   "Mailing-country":"Australia",
				   "Udegree":"3",
				   "Undergraduate-university-name":"CUR",
				   "Ugraduate-country":"Australia",
				   "Ugraduate-year-attained":"2001",
				   "Pdegree":"4",
				   "Postgraduate-university-name":"CUR",
				   "Pgraduate-country":"Australia",
				   "Pgraduate-year-attained":"2001",
				   "Additional-qualifications": [
						"qualification 1",
						"qualification 2"
					],
				   "Workplaces":{  
					"0": {  
						 "Workplace_ID":"72516",
						 "Name-of-workplace":"APA",
						 "WBuildingName":"BuildingName",
						 "Address_Line_1":"2",'. // changed
						 '"Address_Line_2":"toorak road",'. // changed
						 '"Wcity":"Melbourne",
						 "Wpostcode":"3177",
						 "Wstate":"VIC",
						 "Wcountry":"Australia",
						 "Wemail":"test@apa.com",
						 "Wwebaddress":"www.apa.com",
						 "Wphone":"0390920888",
						 "Additionallanguage":["EG","AR","FL"],
						 "QIP":"123456",
						 "Electronic-claiming":"1",
						 "Hicaps":"1",
						 "Healthpoint":"1",
						 "Departmentva":"1",
						 "Workerscompensation":"1",
						 "Motora":"1",
						 "Medicare":"1",
						 "Workplace-setting":"Defence-forces",
						 "Number-worked-hours":"7",
						 "Treatmentarea": ["BAN","CHILD","ACU"], '.// changed
						 '"Findphysio":"1",
						 "Findabuddy":"1",'. // Added
						 '"Homehospital":"1",
						 "MobilePhysio":"1"
					  },
				   "1": {  
						 "Workplace_ID":"72571",
						 "Name-of-workplace":"testA",
						 "BuildingName":"BuildingName",
						 "Address_Line_1":"2",'. // changed
						 '"Address_Line_2":"toorak road",'. // changed
						 '"Wcity":"Melbourne",
						 "Wpostcode":"3177",
						 "Wstate":"VIC",
						 "Wcity":"Melbourne",
						 "Wcountry":"Australia",
						 "Wemail":"test@apa.com",
						 "Wwebaddress":"www.apa.com",
						 "Wphone":"0390920888",
						 "Additionallanguage":["EG"],
						 "QIP":"123456",
						 "Electronic-claiming":"1",
						 "Hicaps":"1",
						 "Healthpoint":"1",
						 "Departmentva":"1",
						 "Workerscompensation":"1",
						 "Motora":"1",
						 "Medicare":"1",
						 "Workplace-setting":"Defence-forces",
						 "Number-worked-hours":"7",
						 "Treatmentarea": ["BAN","CHILD","ACU"], './/- removed
						 '"Findphysio":"1",
						 "Findabuddy":"1",'. // Added
						 '"Homehospital":"1",
						 "MobilePhysio":"1"
					  },
				   "2": {
						 "Workplace_ID":"72171",
						 "Name-of-workplace":"testB",
						 "BuildingName":"BuildingName",
						 "Address_Line_1":"2",'. // changed
						 '"Address_Line_2":"toorak road",'. // changed
						 '"Wcity":"Melbourne",
						 "Wpostcode":"3177",
						 "Wstate":"VIC",
						 "Wcity":"Melbourne",
						 "Wcountry":"Australia",
						 "Wemail":"test@apa.com",
						 "Wwebaddress":"www.apa.com",
						 "Wphone":"0390920888",
						 "Additionallanguage":["EG","AR","FL"],
						 "QIP":"123456",
						 "Electronic-claiming":"1",
						 "Hicaps":"1",
						 "Healthpoint":"1",
						 "Departmentva":"1",
						 "Workerscompensation":"1",
						 "Motora":"1",
						 "Medicare":"1",
						 "Workplace-setting":"Defence-forces",
						 "Number-worked-hours":"7",
						 "Treatmentarea": ["BAN","CHILD","ACU"],'.// changed
						 '"Findphysio":"1",
						 "Findabuddy":"1",'. // Added
						 '"Homehospital":"1",
						 "MobilePhysio":"1"
					  }
				   }
				}';
			return $JSONreturn;
		case "6":
			// Eddy;
			/* if(isset($_SESSION["TokenId"])) {
				$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/Authentication/PasswordReset/Web";
				$JSONreturn = curlRequest($API, "Secure", $variable);
			} else { */
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/Authentication/PasswordResetRequest/Web?";
			$variable = "UserName=".$variables["email"]."&email=".$variables["email"];
			$JSONreturn = curlRequest($API, "GetPost", $variable);
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
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />10. Dashboard - Get picture: <br />";
			// Add JSON sample here
			$JSONreturn = "Image response";
			return $JSONreturn;
		case "11":
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />11. Dashboard - Update picture: <br />";
			// Add JSON sample here
			$JSONreturn = "return Value!";
			return $JSONreturn;
		case "12":
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />12. Dashboard - Get payment listing: <br />";
			// Add JSON sample here
			$JSONreturn =  '{ 
			        
					
					"paymentcards": [

					   { "Creditcards-ID": "1",
						"Payment-method": "Master",
						"Digitsnumber":"8888",
						"Expiry-date":"10-10-2020",
						"Description":"N"
						},
						{ "Creditcards-ID": "2",
						"Payment-method": "Visa",
						"Digitsnumber":"6666",
						"Expiry-date":"10-10-2020",
						"Description":"Y"
						},

						{ "Creditcards-ID": "3",
						"Payment-method": "Master",
						"Digitsnumber":"9999",
						"Expiry-date":"10-10-2020",
						"Description":"N"
						}
					]
				}';
			return $JSONreturn;
		case "13":
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />13. Dashboard - update payment method: <br />";
			// Add JSON sample here
			if(isset($variables["Rollover"])){
				$JSONreturn =  '{ 
			        "userID":"1",
				    "Rollover": "1"
				}';
			}
			//if(isset($variables["Creditcard-ID"]) && isset($variables["Expiry-date"]) && isset($variables["CVV"])){
				//$JSONreturn =  '{ 
			        //"userID":"1",
					//"Creditcard-ID":"1",
					//"Expiry-date":"12-12-2020",
					//"CVV":"333",
				   // "Rollover": "1"
				//}';
			//}
			if(isset($variables["Creditcard-ID"])){
				$JSONreturn =  '{ 
			        "userID":"1",
					"Creditcard-ID":"1",
			    }';
			}
			return $JSONreturn;
		case "14":
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />14. Delete payment method: <br />";
			// Add JSON sample here
			$JSONreturn = "";
			return $JSONreturn;
		case "15":
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />15. Dashboard - Add payment method: <br />";
			// Add JSON sample here
			$JSONreturn =  '{ 
			        "userID":"1",
				    "Payment-method": "Visa",
					
					"Cardno":"343424238888",
					"Expiry-date":"10-10-2020",
					"CCV":"1"
				}';
			return $JSONreturn;
		case "16":
			// For the actual API use
			// $API = "";
			//echo "Data Sent: <br />";
			//print_r($variables);
			//echo "<br />16. Dashboard - Check existing email: <br />";
			// Add JSON sample here
			$JSONreturn = '{
				"Status":"true"
			}';
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
			// Eddy
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/DataObjects/spGetListOfSubscribedNationalGroup__c?";
			$var = "UserID=".$variables["UserID"];
			echo "<br />20. Dashboard - Get list of subscribed National Group: <br />";
			// Add JSON sample here
			$JSONreturn = curlRequest($API, "Get", $var);
			return $JSONreturn;
		case "21":
			// Eddy
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/FellowshipProducts/-1";
			echo "<br />21. Dashboard - Get list of Fellowship Products: <br />";
			// Add JSON sample here
			$JSONreturn = curlRequest($API, "JSON", $jsonVersion);
			/*
			if(count($variables) == 1) {
				// When this web service is triggered to get
				// Fellowship list only
				$JSONreturn = '{ 
					"Fellowship": [
						{"FPid": "1",
						"FPtitle": "I am part of the Australian College of Physiotherapists",
						"FPprice": "50" }
					]
				}';
			} else {
				$JSONreturn = "";
			}*/
			return $JSONreturn;
		case "22":
			// Eddy
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/DataObjects/spGetListOfSubscribedFellowshipProducts__c?";
			$var = "UserID=".$variables["UserID"];
			echo "<br />22. Dashboard - Get list of subscribed Fellowship Product: <br />";
			// Add JSON sample here
			$JSONreturn = curlRequest($API, "Get", $var);
			/*
			$JSONreturn = '{ 
				"Fellowship": [
					{"FPid": "1",
					"FPtitle": "I am part of the Australian College of Physiotherapists",
					"FPprice": "50" }
				]
			}';
			*/
			return $JSONreturn;
		case "23":
			// Eddy
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/DataObjects/spGetListOfSubscriptionPreferences__c?";
			$var = "UserID=".$variables["UserID"];
			echo "<br />23. Dashbard - Get list of Subscription preferences: <br />";
			// Add JSON sample here
			$JSONreturn = curlRequest($API, "Get", $var);
			/*
			$JSONreturn = '{ 
				"Subscription":[
				{
					"SubscriptionID":"472",
					"Subscription":"Online-learning",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"43",
					"Subscription":"Continence",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"478",
					"Subscription":"Conference",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"424",
					"Subscription":"Educators",
					"Subscribed":"0"
				}, {
					"SubscriptionID":"439",
					"Subscription":"Market-campaign",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"446",
					"Subscription":"Emergency",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"371",
					"Subscription":"Jobs-4-physio",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"365",
					"Subscription":"Gerontology",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"374",
					"Subscription":"Advocacy",
					"Subscribed":"0"
				}, {
					"SubscriptionID":"319",
					"Subscription":"Leadership",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"327",
					"Subscription":"National-office",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"385",
					"Subscription":"Musculoskeletal",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"283",
					"Subscription":"Journal-of-physiotherapy",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"295",
					"Subscription":"Neurology",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"243",
					"Subscription":"Inmotion-online",
					"Subscribed":"0"
				}, {
					"SubscriptionID":"292",
					"Subscription":"Occupational",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"256",
					"Subscription":"Flagship",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"172",
					"Subscription":"Orthopaedic",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"157",
					"Subscription":"Professinal-development",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"138",
					"Subscription":"Paediatric",
					"Subscribed":"0"
				}, {
					"SubscriptionID":"128",
					"Subscription":"Students",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"71",
					"Subscription":"Pain",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"68",
					"Subscription":"Acupuncture",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"57",
					"Subscription":"Sports",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"45",
					"Subscription":"Animal",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"32",
					"Subscription":"Rural",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"37",
					"Subscription":"Aquatic",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"26",
					"Subscription":"Print",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"24",
					"Subscription":"Business",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"17",
					"Subscription":"Disability",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"16",
					"Subscription":"Cancer",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"12",
					"Subscription":"Mental",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"7",
					"Subscription":"Cardiorespiratory",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"3",
					"Subscription":"Mental",
					"Subscribed":"1"
				} ]
			}';
			*/
			return $JSONreturn;
		case "24":
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />24. Dashbaord - Update subscription preferences: <br />";
			// Add JSON sample here
			$JSONreturn = '{ 
				"Subscription":[
				{
					"SubscriptionID":"472",
					"Subscription":"Online-learning",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"43",
					"Subscription":"Continence",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"478",
					"Subscription":"Conference",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"424",
					"Subscription":"Educators",
					"Subscribed":"0"
				}, {
					"SubscriptionID":"439",
					"Subscription":"Market-campaign",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"446",
					"Subscription":"Emergency",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"371",
					"Subscription":"Jobs-4-physio",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"365",
					"Subscription":"Gerontology",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"374",
					"Subscription":"Advocacy",
					"Subscribed":"0"
				}, {
					"SubscriptionID":"319",
					"Subscription":"Leadership",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"327",
					"Subscription":"National-office",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"385",
					"Subscription":"Musculoskeletal",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"283",
					"Subscription":"Journal-of-physiotherapy",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"295",
					"Subscription":"Neurology",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"243",
					"Subscription":"Inmotion-online",
					"Subscribed":"0"
				}, {
					"SubscriptionID":"292",
					"Subscription":"Occupational",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"256",
					"Subscription":"Flagship",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"172",
					"Subscription":"Orthopaedic",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"157",
					"Subscription":"Professinal-development",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"138",
					"Subscription":"Paediatric",
					"Subscribed":"0"
				}, {
					"SubscriptionID":"128",
					"Subscription":"Students",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"71",
					"Subscription":"Pain",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"68",
					"Subscription":"Acupuncture",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"57",
					"Subscription":"Sports",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"45",
					"Subscription":"Animal",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"32",
					"Subscription":"Rural",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"37",
					"Subscription":"Aquatic",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"26",
					"Subscription":"Print",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"24",
					"Subscription":"Business",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"17",
					"Subscription":"Disability",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"16",
					"Subscription":"Cancer",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"12",
					"Subscription":"Mental",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"7",
					"Subscription":"Cardiorespiratory",
					"Subscribed":"1"
				}, {
					"SubscriptionID":"3",
					"Subscription":"Mental",
					"Subscribed":"1"
				} ]
			}';
			return $JSONreturn;
		case "25":
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />25. User Registration: <br />";
			// Add JSON sample here
			$JSONreturn = "";
			return $JSONreturn;
		case "26":
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />26. REgister a new member order: <br />";
			// Add JSON sample here
			$JSONreturn = "";
			return $JSONreturn;
		case "27":
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />27. Renew membership order: <br />";
			// Add JSON sample here
			$JSONreturn = "";
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
			// For the actual API use
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/PDGetEventDetail";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />29. PD - Get event detail: <br />";
			// Add JSON sample here
			$JSONreturn = curlRequest($API, "JSON", $jsonVersion);
			//echo "got@@@!!<br>";
			//echo $JSONreturn;
			//$JSONreturn = "";
			return $JSONreturn;
		case "30":
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />30. PD - Get event detail list: <br />";
			// Add JSON sample here
			$JSONreturn = ' {
				"PDEvents": [
					{
						"Totalnumber":"200",
						"Enrollednumber":"100",
						"Id":"1",
						"Title":"Sports Physiotherapy Level 2",
						"Typeofpd":"event",
						"Time":"9:00 AM - 5.00 PM",
						"Begindate":"3/06/2017",
						"Enddate":"4/06/2017",
						"Close_date":"12/12/2018",
						"Location":{
							"Address1":"1175 Toorak Road",
							"Address2":"",
							"City":"Camberwell",
							"State":"VIC",
							"Postcode":"3124"
						},
						"Price":"$750.00",
						"UserStatus":"3"
					}, {
						"Totalnumber":"200",
						"Enrollednumber":"100",
						"Id":"3",
						"Title":"Sports Physiotherapy Level 2",
						"Typeofpd":"event",
						"Time":"9:00 AM - 5.00 PM",
						"Begindate":"3/06/2017",
						"Enddate":"4/06/2017",
						"Close_date":"12/12/2018",
						"Location":{
							"Address1":"1175 Toorak Road",
							"Address2":"",
							"City":"Camberwell",
							"State":"VIC",
							"Postcode":"3124"
						},
						"Price":"$750.00",
						"UserStatus":"3"
					}, {
						"Totalnumber":"200",
						"Enrollednumber":"100",
						"Id":"5",
						"Title":"Sports Physiotherapy Level 2",
						"Typeofpd":"event",
						"Time":"9:00 AM - 5.00 PM",
						"Begindate":"3/06/2017",
						"Enddate":"4/06/2017",
						"Close_date":"25/02/2018",
						"Location":{
							"Address1":"1175 Toorak Road",
							"Address2":"",
							"City":"Camberwell",
							"State":"VIC",
							"Postcode":"3124"
						},
						"Price":"$750.00",
						"UserStatus":"3"
					}, {
						"Totalnumber":"200",
						"Enrollednumber":"200",
						"Id":"7",
						"Title":"Sports Physiotherapy Level 2",
						"Typeofpd":"event",
						"Time":"9:00 AM - 5.00 PM",
						"Begindate":"3/06/2017",
						"Enddate":"4/06/2017",
						"Close_date":"12/12/2018",
						"Location":{
							"Address1":"1175 Toorak Road",
							"Address2":"",
							"City":"Camberwell",
							"State":"VIC",
							"Postcode":"3124"
						},
						"Price":"$750.00",
						"UserStatus":"3"
					}
				]
			}';;
			return $JSONreturn;
		case "31":
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />31. Get MEmbership product price: <br />";
			// Add JSON sample here
		  
			$JSONreturn = '{ 
			    "Continue":"1",
			    "products":[
				    {
					   "ProdcutName":"Full-time physiotherapist with insurance (more than 18 hours per week) ",
					   "Price":"200"
					  
					},
					{
						"ProdcutName":"Gerontology",
					    "Price":"41"
					   
					},
					{
						"ProdcutName":"Musculoskeletal",
					    "Price":"38"
					},
					{
						"ProdcutName":"Intouch",
					    "Price":"10"
					}
					]		   
				}';
			
			return $JSONreturn;	
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
			/*
			$JSONreturn = '{  
				"CurrentCPDHour": "12",
				"Diary": [
				 {
				 "PD_id": "421",
				 "PD_title":"PD title A",
				 "PD_date":"13/12/2017",
				 "PD_hours":"3",
				 "CPD": "APA"},
				 {
				 "PD_id": "231",
				 "PD_title":"PD title B",
				 "PD_date":"15/12/2017",
				 "PD_hours":"2",
				 "CPD": "APA" },
				 {
				 "PD_id": "763",
				 "PD_title":"PD title C",
				 "PD_date":"17/12/2017",
				 "PD_hours":"3",
				 "CPD": "APA" },
				 {
				 "PD_id": "236",
				 "PD_title":"PD title D",
				 "PD_date":"19/12/2017",
				 "PD_hours":"1",
				 "CPD": "APA"},  
				 {
				 "PD_id": "821",
				 "PD_title":"NPD title A",
				 "PD_date":"13/12/2017",
				 "PD_hours":"1",
				 "CPD": "NAPA",
				 "PD_Provider": "A Company",
				 "PD_Reflection": "I have learned dis!1" },
				 {
				 "PD_id": "518",
				 "PD_title":"NPD title A",
				 "PD_date":"13/12/2017",
				 "PD_hours":"1",
				 "CPD": "NAPA",
				 "PD_Provider": "B Company",
				 "PD_Reflection": "I have learned dis!2" },
				 {
				 "PD_id": "324",
				 "PD_title":"NPD title A",
				 "PD_date":"13/12/2017",
				 "PD_hours":"1",
				 "CPD": "NAPA",
				 "PD_Provider": "C Company",
				 "PD_Reflection": "I have learned dis!3" }
				 ]
			}';
			*/
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
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />35. Find a Physio data: <br />";
			// Add JSON sample here
			$JSONreturn = "";
			return $JSONreturn;
		case "36":
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />36. Get workplace settings list <br />";
			// Add JSON sample here
			if(count($variables) == 1) {
				// When this web service is triggered to get
				// workplace settings list only
			$JSONreturn = '{ 
			    "WorkplaceSettings":[
				    {
					   "name":"Aboriginal health services",
					   "code":"Aboriginal-health-services"
					},
					{
						"name":"Defence forces",
						"code":"Defence-forces"
					},
					{
						"name":"Domiciliary services",
						"code":"Domiciliary-services"
					},
					{
						"name":"Education facility",
						"code":"Education-facility"
					},
					{
						"name":"Group private practice",
						"code":"Group-private-practice"
					},
					{
						"name":"Hospital(exclude outpatient)",
						"code":"Hospital"
					},
					{
						"name":"Locum private practice",
						"code":"Locum-private-practice"
					}
					]		   
				}';
			} else{
				$JSONreturn = "";
			}
			return $JSONreturn;	
			
		case "37":
			// For the actual API use
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
			// $API = "";
			//echo "Data Sent: <br />";
			//print_r($variables);
			//echo "<br />39. Get dropdown option list: <br />";
			$API = "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/GetOptionValues";			
			$JSONreturn = curlRequest($API, null, "Get", null);
			return $JSONreturn;
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
	} elseif($type == "JSON"||$type == "Image") {
		curl_setopt($ch, CURLOPT_URL, $API); 
		if(!empty($variables) || $variables != null) {
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS,$variables);
		}
	} elseif($type == "Secure") {
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
		} elseif($type == "Image") {
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

/*
echo "<br />28. PD - Get event search result list: <br />";
if($variables["PageSize"] == 5 && $variables["PageNumber"] == 1) {
	$JSONreturn = '{  
		"PDcount":"12",
		"Results": [
		{ 
			"Id":"1",
			"Summary":"Best practice requires advanced skills in diagnoses",
			"Title":"Sports Physiotherapy Level2",
			"Type":"Lecutre",
			"CPD":"2",
			"City":"Melbourne",
			"State":"VIC",
			"Begindate":"10/12/2017",
			"Enddate":"12/12/2018",
			"Eventstatus":"2"
		}, {  
			"Id":"2",
			"Summary":"Best practice requires advanced skills in diagnoses",
			"Title":"Pregancy and Postpartum:Clinical Highlights",
			"Type":"Online",
			"CPD":"2",
			"City":"Camberwell",
			"State":"VIC",
			"Begindate":"10/12/2017",
			"Enddate":"12/12/2018",
			"Eventstatus":"2"
		}, {  
			"Id":"3",
			"Summary":"Best practice requires advanced skills in diagnoses",
			"Title":"Sports Physiotherapy Level 2",
			"Type":"Lecture",
			"CPD":"2",
			"City":"Ringwood",
			"State":"VIC",
			"Begindate":"1/12/2017",
			"Enddate":"12/12/2018",
			
			
			"Eventstatus":"2"
		}, {  
			"Id":"4",
			"Summary":"Best practice requires advanced skills in diagnoses",
			"Title":"Pregancy and Postpartum:Clinical Highlights",
			"Type":"Lecture",
			"CPD":"2",
			"City":"Ringwood",
			"State":"VIC",
			"Begindate":"9/12/2017",
			"Enddate":"12/12/2018",
			"Eventstatus":"4"
		}, {  
			"Id":"5",
			"Summary":"Best practice requires advanced skills in diagnoses",
			"Title":"Aports Physiotherapy Level 2",
			"Type":"Lecture",
			"CPD":"2",
			"City":"Ringwood",
			"State":"VIC",
			"Begindate":"9/12/2017",
			"Enddate":"12/12/2018",
			"Eventstatus":"2"
		} ]
	}';
} elseif($variables["PageSize"] == 5 && $variables["PageNumber"] == 2) {
	$JSONreturn = '{  
		"PDcount":"12",
		"Results": [
		{  
			"Id":"6",
			"Summary":"Best practice requires advanced skills in diagnoses",
			"Title":"Aports Physiotherapy Level 2",
			"Type":"Lecture",
			"CPD":"2",
			"City":"Ringwood",
			"State":"VIC",
			"Begindate":"9/12/2017",
			"Enddate":"12/12/2018",
			"Eventstatus":"3"
		}, {  
			"Id":"7",
			"Summary":"Best practice requires advanced skills in diagnoses",
			"Title":"Aports Physiotherapy Level 2",
			"Type":"Lecture",
			"CPD":"2",
			"City":"Ringwood",
			"State":"VIC",
			"Begindate":"9/12/2017",
			"Enddate":"12/12/2018",
			"Eventstatus":"2"
		}, {  
			"Id":"8",
			"Summary":"Best practice requires advanced skills in diagnoses",
			"Title":"Aports Physiotherapy Level 2",
			"Type":"Lecture",
			"CPD":"2",
			"City":"Ringwood",
			"State":"VIC",
			"Begindate":"2/12/2017",
			"Enddate":"12/12/2018",
			"Eventstatus":"3"
		}, {  
			"Id":"9",
			"Summary":"Best practice requires advanced skills in diagnoses",
			"Title":"Aports Physiotherapy Level 2",
			"Type":"Lecture",
			"CPD":"2",
			"City":"Ringwood",
			"State":"VIC",
			"Begindate":"2/12/2017",
			"Enddate":"12/12/2018",
			"Eventstatus":"3"
		}, {  
			"Id":"10",
			"Summary":"Best practice requires advanced skills in diagnoses",
			"Title":"Aports Physiotherapy Level 2",
			"Type":"Lecture",
			"CPD":"2",
			"City":"Ringwood",
			"State":"VIC",
			"Begindate":"3/12/2017",
			"Enddate":"12/12/2018",
			"Eventstatus":"2"
		} ]
	}';
} elseif($variables["PageSize"] == 5 && $variables["PageNumber"] == 3) {
	$JSONreturn = '{  
		"PDcount":"12",
		"Results": [
		{  
			"Id":"11",
			"Summary":"Best practice requires advanced skills in diagnoses",
			"Title":"Aports Physiotherapy Level 2",
			"Type":"Lecture",
			"CPD":"2",
			"City":"Ringwood",
			"State":"VIC",
			"Begindate":"5/12/2017",
			"Enddate":"12/12/2018",
			"Eventstatus":"3"
		}, {
			"Id":"12",
			"Summary":"Best practice requires advanced skills in diagnoses",
			"Title":"Aports Physiotherapy Level 2",
			"Type":"Lecture",
			"CPD":"2",
			"City":"Ringwood",
			"State":"VIC",
			"Begindate":"4/12/2017",
			"Enddate":"12/12/2018",
			"Eventstatus":"3"
		} ]
	}';
} elseif($variables["PageSize"] == 10 && $variables["PageNumber"] == 1) {
	$JSONreturn = '{  
		"PDcount":"12",
		"Results": [
		{ 
			"Id":"1",
			"Summary":"Best practice requires advanced skills in diagnoses",
			"Title":"Sports Physiotherapy Level2",
			"Type":"Lecutre",
			"CPD":"2",
			"City":"Melbourne",
			"State":"VIC",
			"Begindate":"13/12/2017",
			"Enddate":"12/12/2018",
			"Eventstatus":"2"
		}, {  
			"Id":"2",
			"Summary":"Best practice requires advanced skills in diagnoses",
			"Title":"Pregancy and Postpartum:Clinical Highlights",
			"Type":"Online",
			"CPD":"2",
			"City":"Camberwell",
			"State":"VIC",
			"Begindate":"10/12/2017",
			"Enddate":"12/12/2018",
			"Eventstatus":"2"
		}, {  
			"Id":"3",
			"Summary":"Best practice requires advanced skills in diagnoses",
			"Title":"Sports Physiotherapy Level 2",
			"Type":"Lecture",
			"CPD":"2",
			"City":"Ringwood",
			"State":"VIC",
			"Begindate":"1/12/2017",
			"Enddate":"12/12/2018",
			"Eventstatus":"2"
		}, {
			"Id":"4",
			"Summary":"Best practice requires advanced skills in diagnoses",
			"Title":"Pregancy and Postpartum:Clinical Highlights",
			"Type":"Lecture",
			"CPD":"2",
			"City":"Ringwood",
			"State":"VIC",
			"Begindate":"9/12/2017",
			"Enddate":"12/12/2018",
			"Eventstatus":"4"
		}, {  
			"Id":"5",
			"Summary":"Best practice requires advanced skills in diagnoses",
			"Title":"Aports Physiotherapy Level 2",
			"Type":"Lecture",
			"CPD":"2",
			"City":"Ringwood",
			"State":"VIC",
			"Begindate":"9/12/2017",
			"Enddate":"12/12/2018",
			"Eventstatus":"2"
		}, {  
			"Id":"6",
			"Summary":"Best practice requires advanced skills in diagnoses",
			"Title":"Aports Physiotherapy Level 2",
			"Type":"Lecture",
			"CPD":"2",
			"City":"Ringwood",
			"State":"VIC",
			"Begindate":"9/12/2017",
			"Enddate":"12/12/2018",
			"Eventstatus":"3"
		}, {
			"Id":"7",
			"Summary":"Best practice requires advanced skills in diagnoses",
			"Title":"Aports Physiotherapy Level 2",
			"Type":"Lecture",
			"CPD":"2",
			"City":"Ringwood",
			"State":"VIC",
			"Begindate":"9/12/2017",
			"Enddate":"12/12/2018",
			"Eventstatus":"2"
		}, {
			"Id":"8",
			"Summary":"Best practice requires advanced skills in diagnoses",
			"Title":"Aports Physiotherapy Level 2",
			"Type":"Lecture",
			"CPD":"2",
			"City":"Ringwood",
			"State":"VIC",
			"Begindate":"2/12/2017",
			"Enddate":"12/12/2018",
			"Eventstatus":"3"
		}, {
			"Id":"9",
			"Summary":"Best practice requires advanced skills in diagnoses",
			"Title":"Aports Physiotherapy Level 2",
			"Type":"Lecture",
			"CPD":"2",
			"City":"Ringwood",
			"State":"VIC",
			"Begindate":"2/12/2017",
			"Enddate":"12/12/2018",
			"Eventstatus":"3"
		}, {
			"Id":"10",
			"Summary":"Best practice requires advanced skills in diagnoses",
			"Title":"Aports Physiotherapy Level 2",
			"Type":"Lecture",
			"CPD":"2",
			"City":"Ringwood",
			"State":"VIC",
			"Begindate":"3/12/2017",
			"Enddate":"12/12/2018",
			"Eventstatus":"2"
		} ]
	}';
} elseif($variables["PageSize"] == 10 && $variables["PageNumber"] == 2) {
	$JSONreturn = '{  
		"PDcount":"12",
		"Results": [
		{  
			"Id":"11",
			"Summary":"Best practice requires advanced skills in diagnoses",
			"Title":"Aports Physiotherapy Level 2",
			"Type":"Lecture",
			"CPD":"2",
			"City":"Ringwood",
			"State":"VIC",
			"Begindate":"5/12/2017",
			"Enddate":"12/12/2018",
			"Eventstatus":"3"
		}, {
			"Id":"12",
			"Summary":"Best practice requires advanced skills in diagnoses",
			"Title":"Aports Physiotherapy Level 2",
			"Type":"Lecture",
			"CPD":"2",
			"City":"Ringwood",
			"State":"VIC",
			"Begindate":"4/12/2017",
			"Enddate":"12/12/2018",
			"Eventstatus":"3"
		} ]
	}';
} else {
	$JSONreturn = '{  
		"PDcount":"12",
		"Results": [
		{ 
			"Id":"1",
			"Summary":"Best practice requires advanced skills in diagnoses",
			"Title":"Sports Physiotherapy Level2",
			"Type":"Lecutre",
			"CPD":"2",
			"City":"Melbourne",
			"State":"VIC",
			"Begindate":"13/12/2017",
			"Enddate":"12/12/2018",
			"Eventstatus":"2"
		}, {
			"Id":"2",
			"Summary":"Best practice requires advanced skills in diagnoses",
			"Title":"Pregancy and Postpartum:Clinical Highlights",
			"Type":"Online",
			"CPD":"2",
			"City":"Camberwell",
			"State":"VIC",
			"Begindate":"10/12/2017",
			"Enddate":"12/12/2018",
			"Eventstatus":"2"
		}, {  
			"Id":"3",
			"Summary":"Best practice requires advanced skills in diagnoses",
			"Title":"Sports Physiotherapy Level 2",
			"Type":"Lecture",
			"CPD":"2",
			"City":"Ringwood",
			"State":"VIC",
			"Begindate":"1/12/2017",
			"Enddate":"12/12/2018",
			"Eventstatus":"2"
		}, {  
			"Id":"4",
			"Summary":"Best practice requires advanced skills in diagnoses",
			"Title":"Pregancy and Postpartum:Clinical Highlights",
			"Type":"Lecture",
			"CPD":"2",
			"City":"Ringwood",
			"State":"VIC",
			"Begindate":"9/12/2017",
			"Enddate":"12/12/2018",
			"Eventstatus":"4"
		}, {  
			"Id":"5",
			"Summary":"Best practice requires advanced skills in diagnoses",
			"Title":"Aports Physiotherapy Level 2",
			"Type":"Lecture",
			"CPD":"2",
			"City":"Ringwood",
			"State":"VIC",
			"Begindate":"9/12/2017",
			"Enddate":"12/12/2018",
			"Eventstatus":"2"
		}, {  
			"Id":"6",
			"Summary":"Best practice requires advanced skills in diagnoses",
			"Title":"Aports Physiotherapy Level 2",
			"Type":"Lecture",
			"CPD":"2",
			"City":"Ringwood",
			"State":"VIC",
			"Begindate":"9/12/2017",
			"Enddate":"12/12/2018",
			"Eventstatus":"3"
		}, {  
			"Id":"7",
			"Summary":"Best practice requires advanced skills in diagnoses",
			"Title":"Aports Physiotherapy Level 2",
			"Type":"Lecture",
			"CPD":"2",
			"City":"Ringwood",
			"State":"VIC",
			"Begindate":"9/12/2017",
			"Enddate":"12/12/2018",
			"Eventstatus":"2"
		}, {  
			"Id":"8",
			"Summary":"Best practice requires advanced skills in diagnoses",
			"Title":"Aports Physiotherapy Level 2",
			"Type":"Lecture",
			"CPD":"2",
			"City":"Ringwood",
			"State":"VIC",
			"Begindate":"2/12/2017",
			"Enddate":"12/12/2018",
			"Eventstatus":"3"
		}, {  
			"Id":"9",
			"Summary":"Best practice requires advanced skills in diagnoses",
			"Title":"Aports Physiotherapy Level 2",
			"Type":"Lecture",
			"CPD":"2",
			"City":"Ringwood",
			"State":"VIC",
			"Begindate":"2/12/2017",
			"Enddate":"12/12/2018",
			"Eventstatus":"3"
		}, {  
			"Id":"10",
			"Summary":"Best practice requires advanced skills in diagnoses",
			"Title":"Aports Physiotherapy Level 2",
			"Type":"Lecture",
			"CPD":"2",
			"City":"Ringwood",
			"State":"VIC",
			"Begindate":"3/12/2017",
			"Enddate":"12/12/2018",
			"Eventstatus":"2"
		}, {  
			"Id":"11",
			"Summary":"Best practice requires advanced skills in diagnoses",
			"Title":"Aports Physiotherapy Level 2",
			"Type":"Lecture",
			"CPD":"2",
			"City":"Ringwood",
			"State":"VIC",
			"Begindate":"5/12/2017",
			"Enddate":"12/12/2018",
			"Eventstatus":"3"
		}, {  
			"Id":"12",
			"Summary":"Best practice requires advanced skills in diagnoses",
			"Title":"Aports Physiotherapy Level 2",
			"Type":"Lecture",
			"CPD":"2",
			"City":"Ringwood",
			"State":"VIC",
			"Begindate":"4/12/2017",
			"Enddate":"12/12/2018",
			"Eventstatus":"3"
		} ]
	}';
}*/

/*
$inID = $variables[0];
$outputArray = Array();
$pd_json1='{ 
  "Id":"1",
  "Typeofpd":"Lecture",		  
  "Title":"Sports Physiotherapy Level2",
  "Summary":"<p>Best practice requires advanced skills in diagnoses,treatment and rehabilitation when treating patients with acute and complex knee conditions.</p>",
  "Presenter_bio":"<p>This is a famuso person,Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris et feugiat risus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris et feugiat risus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris et feugiat risus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris et feugiat risus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris et feugiat risus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris et feugiat risus.</p><p>This is a famuso person,Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris et feugiat risus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris et feugiat risus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris et feugiat risus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris et feugiat risus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris et feugiat risus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris et feugiat risus.</p>",
  "Learning_outcomes":"<ul>this is presenter content<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris et feugiat risus.</li><li>Vestibulum quis lobortis massa. Praesent mattis sem orci, non congue justo congue quis curabitur vestibulum.</li><li>Nisl aliquam, porta turpis pellentesque, auctor erat. Aliquam in ipsum mauris. Phasellus feugiat nibh interdum.</li><li>Elit faucibus egestas. Nam eu metus convallis, tempus nisl at, ullamcorper</li><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris et feugiat risus.</li><li>Vestibulum quis lobortis massa. Praesent mattis sem orci, non congue justo congue quis curabitur vestibulum.</li><li>Nisl aliquam, porta turpis pellentesque, auctor erat. Aliquam in ipsum mauris. Phasellus feugiat nibh interdum.</li><li>Elit faucibus egestas. Nam eu metus convallis, tempus nisl at, ullamcorper</li></ul>",
  "Prerequisites":"<ul>this is prerequisites content<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris et feugiat risus.</li><li>Vestibulum quis lobortis massa. Praesent mattis sem orci, non congue justo congue quis curabitur vestibulum.</li><li>Nisl aliquam, porta turpis pellentesque, auctor erat. Aliquam in ipsum mauris. Phasellus feugiat nibh interdum.</li><li>Elit faucibus egestas. Nam eu metus convallis, tempus nisl at, ullamcorper arcu</li></ul>",
  "Presenters":"Tim McGrath (PhD), Head Physiotherapist Port Adelaide FC;Dr Rob Creer, Orthopedic Surgeon;Kylie Shaw, Sports Physician and;Ben Serpell, Head of Athletic Development, Brumbies",
  "UserStatus":"0",
  "Totalnumber":"104",
  "Enrollednumber":"100",
  "Time":"1524030029",
  "StartDate":"2018-10-31 9:00:00",
  "EndDate":"2018-12-31 17:00:00",
  "Close_date":"2018-07-25",
  "Location":{
		"Address1":"University of Canberra",
		"Address2":"Building 29",
		"City":"Bruce",
		"State":"ACT",
		"Postcode":"2617"
  },
  "CPD":"10",
  "Cost":"750.00",
  "Pricelist":
  {
	"SPA/Rural":"695.00",
	"APA Member":"750.00",
	"Non-member":"1125.00"			
  }
 

}';
$pd_json2='{ 
   "Id":"2",
  "Typeofpd":"Online",			   
  "Title":"Pregnancy and Postpartum:Clinical Hights",
  "Summary":"Best practice requires advanced skills in diagnoses, treatment and rehabilitation when treating patients with acute and complex knee conditions",
 "Presenter_bio":"This is a famuso person",
 "Learning_outcomes":"By completing this course/event you will:this is learning outcomes content",
 "Prerequisites":"this is prerequisites content",
 "Presenters":"test",
 "UserStatus":"2",
 "Totalnumber":"80",
 "Enrollednumber":"75",
 "Time":"9:00 AM - 5.00 PM",
  "StartDate":"13/12/2018",
  "EndDate":"17/12/2018",
 "Close_date":"12/12/2018",
 "Location":{
		"Address1":"1175 Toorak Road",
		"Address2":"",
		"City":"Camberwell",
		"State":"VIC",
		"Postcode":"3124"
  },
 "CPD":"10",
 "Users":["113","10","12"],
 "Cost":"NULL",
"Pricelist":
  {
	"SPA/Rural":"695.00",
	"APA Member":"750.00",
	"Non-member":"1125.00"		
  }

}';
$pd_json3='{ 
  "Id":"3",	
  "Typeofpd":"Lecture",			  
  "Title":"Sports Physiotherapy Level2",
  "Summary":"Best practice requires advanced skills in diagnoses, treatment and rehabilitation when treating patients with acute and complex knee conditions",
 "Presenter_bio":"This is a famuso person",
 "Learning_outcomes":"By completing this course/event you will:this is learning outcomes content",
 "Prerequisites":"this is prerequisites content",
 "Presenters":"test",
 "UserStatus":"3",
 "Totalnumber":"80",
 "Enrollednumber":"76,
 "Time":"9:00 AM - 5.00 PM",
  "StartDate":"13/12/2018",
  "EndDate":"17/12/2018",
 "Close_date":"12/12/2018",
 "Location":{
		"Address1":"1175 Toorak Road",
		"Address2":"",
		"City":"Camberwell",
		"State":"VIC",
		"Postcode":"3124"
  },
 "CPD":"10",
 "Users":["10","12"],
 "Cost":"700.00",
 "Pricelist":
  {
	"SPA/Rural":"695.00",
	"APA Member":"750.00",
	"Non-member":"1125.00"			
  }

}';
$pd_json4='{ 
  "Id":"4",	
 "Typeofpd":"Lecture",		  
  "Title":"Pregnancy and Postpartum:Clinical Hights",
  "Summary":"Best practice requires advanced skills in diagnoses, treatment and rehabilitation when treating patients with acute and complex knee conditions",
 "Presenter_bio":"This is a famuso person",
 "Learning_outcomes":"By completing this course/event you will:this is learning outcomes content",
 "Prerequisites":"this is prerequisites content",
 "Presenters":"test",
 "UserStatus":"4",
 "Totalnumber":"200",
 "Enrollednumber":"100",
 "Time":"9:00 AM - 5.00 PM",
  "StartDate":"13/12/2018",
  "EndDate":"17/12/2018",
 "Close_date":"12/12/2018",
 "Location":{
		"Address1":"1175 Toorak Road",
		"Address2":"",
		"City":"Camberwell",
		"State":"VIC",
		"Postcode":"3124"
  },
 "CPD":"10",
 "Users":["10","12"],
 "Cost":"700.00",
 "Pricelist":
  {
	"SPA/Rural":"695.00",
	"APA Member":"750.00",
	"Non-member":"1125.00"			
  }

}';
$pd_json5='{ 
  "Id":"5",	
  "Typeofpd":"Lecture",		  
  "Title":"Sports Physiotherapy Level2",
  "Summary":"Best practice requires advanced skills in diagnoses, treatment and rehabilitation when treating patients with acute and complex knee conditions",
 "Presenter_bio":"This is a famuso person",
 "Learning_outcomes":"By completing this course/event you will:this is learning outcomes content",
 "Prerequisites":"this is prerequisites content",
 "Presenters":"test",
 "UserStatus":"3",
 "Totalnumber":"200",
 "Enrollednumber":"100",
 "Time":"9:00 AM - 5.00 PM",
  "StartDate":"13/12/2018",
  "EndDate":"17/12/2018",
 "Close_date":"12/12/2018",
 "Location":{
		"Address1":"1175 Toorak Road",
		"Address2":"",
		"City":"Camberwell",
		"State":"VIC",
		"Postcode":"3124"
  },
 "CPD":"10",
 "Users":["10","12"],
 "Cost":"695.00",
 "Pricelist":
  {
	"SPA/Rural":"695.00",
	"APA Member":"750.00",
	"Non-member":"1125.00"		
  }
}';
array_push($outputArray, $pd_json1);
array_push($outputArray, $pd_json2);
array_push($outputArray, $pd_json3);
array_push($outputArray, $pd_json4);
array_push($outputArray, $pd_json5);
//echo "-><br />".$outputArray[$inID]."<br />";
return $outputArray[$inID];
*/

?>
