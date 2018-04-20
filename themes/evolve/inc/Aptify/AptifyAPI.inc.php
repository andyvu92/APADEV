<?php

/*Dashboard page render national icons fuction*/
/*Dashboard page*/
function AptifyAPI($APItype, $variables){
	switch($APItype){
		case "0":
			// JSON persar
			// 
			return "Test! 0 in";
			break;
		case "1":
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />1. Dashboard Main: <br />";
			// Add JSON sample here
			$JSONreturn = '{
				"Preferred-name":"Mel",
				"Firstname":"Melanie",
				"Lastname":"Tannin",
				"Memberid":"Melanie.tannin@physiotherapy.asn.au",
				"MemberType":"student",
				"Status":"Current",
				"Ahpranumber":"6934395685-1",
				"Specialty":"FACP",
				"Officebearer":"NAC Chair",
				"Yearmembership":"10",
				"CPD":"15",
				"PHN":"VIC",
				"HomeBranch":"home branch",
				"PreferBranch":"preferred branch"
			}';
			return $JSONreturn;
			break;
		case "2":
			// For the actual API use
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
			// For the actual API use
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
				   "Prefix":"Dr",
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
				   '"Treatmentarea":["BAN","CHILD","ACU"],'. // Added
				   '"Specialty":"FACP",
				   "Additionallanguage":["EG","AR","FL"],
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
				   "Additional-qualifications": {
					"0":{
						"degree":"3",
						"university-name": "CUR",
						"additional-country":"Australia",
						"additional-year-attained":"2015"
					    },
					"1":{
						"degree":"2",
						"university-name": "CUR",
						"additional-country":"Australia",
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
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />6. Dashboard - Gorgot password: <br />";
			// Add JSON sample here
			$JSONreturn = "";
			return $JSONreturn;
		case "7":
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />7. Dashboard - log-in: <br />";
			// Add JSON sample here
			// create curl resource 
			$ch = curl_init(); 
            // set url 
			
			curl_setopt($ch, CURLOPT_URL, "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/Authentication/Login/Web?UserName=".$variables['ID']."&Password=".$variables['Password']); 
            curl_setopt($ch, CURLOPT_HEADER, 0);
         	//return the transfer as a string 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
            //curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
           // curl_setopt($ch, CURLOPT_CAINFO,getcwd() ."\CA.crt");
			//$output contains the output string 
			$JSONreturn = curl_exec($ch);
            if(curl_error($ch))
			{
				echo 'error:' . curl_error($ch);
			}
				
            //echo $JSONreturn.'this is call from Aptify';
			// close curl resource to free up system resources 
			curl_close($ch);    
			 
			return $JSONreturn;
		case "8":
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />8. Dashboard - Log-out: <br />";
			// Add JSON sample here
			$JSONreturn = "";
			return $JSONreturn;
		case "9":
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />9. Dashboard - change password: <br />";
			// Add JSON sample here
			$JSONreturn = "";
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
			        "Main-Creditcard-ID":"1",
					"Rollover":"1",
					"paymentcards": [

					   { "Creditcards-ID": "1",
						"Payment-method": "Master",
						
						"Digitsnumber":"8888",
						"Expiry-date":"10-10-2020"
						},
						{ "Creditcards-ID": "2",
						"Payment-method": "Visa",
						
						"Digitsnumber":"6666",
						"Expiry-date":"10-10-2020"
						},

						{ "Creditcards-ID": "3",
						"Payment-method": "Master",
						
						"Digitsnumber":"9999",
						"Expiry-date":"10-10-2020"
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
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />17. Dashboard - Get payment history list: <br />";
			// Add JSON sample here
			$JSONreturn = '{ 
				"Product": [
					{ "Invoice_ID":"7",
					"Name":"ProductA",
					"Invoice":"http://10.2.1.190/apanew/sites/default/files/ABOUT%20US/Awards%20%26%20recognition/Felice%20Rosemary%20Lloyd%20Trust/Report_Culvenor_2012_recipient.pdf",
					"Price":"8.88",
					"Date":"12/12/2014"},
					{ "Invoice_ID":"9",
					"Name":"ProductB",
					"Invoice":"http://10.2.1.190/apanew/sites/default/files/ABOUT%20US/Awards%20%26%20recognition/Felice%20Rosemary%20Lloyd%20Trust/Report_Culvenor_2012_recipient.pdf",
					"Price":"9.99",
					"Date":"12/05/2017"},
					{ "Invoice_ID":"11",
					"Name":"ProductC",
					"Invoice":"http://10.2.1.190/apanew/sites/default/files/ABOUT%20US/Awards%20%26%20recognition/Felice%20Rosemary%20Lloyd%20Trust/Report_Culvenor_2012_recipient.pdf",
					"Price":"7.77",
					"Date":"12/12/2016"},
					{ "Invoice_ID":"15",
					"Name":"ProductD",
					"Invoice":"http://10.2.1.190/apanew/sites/default/files/ABOUT%20US/Awards%20%26%20recognition/Felice%20Rosemary%20Lloyd%20Trust/Report_Culvenor_2012_recipient.pdf",
					"Price":"7.77",
					"Date":"12/12/2016"},
					{ "Invoice_ID":"19",
					"Name":"ProductE",
					"Invoice":"http://10.2.1.190/apanew/sites/default/files/ABOUT%20US/Awards%20%26%20recognition/Felice%20Rosemary%20Lloyd%20Trust/Report_Culvenor_2012_recipient.pdf",
					"Price":"7.77",
					"Date":"12/12/2016"},
					{ "Invoice_ID":"22",
					"Name":"ProductF",
					"Invoice":"http://10.2.1.190/apanew/sites/default/files/ABOUT%20US/Awards%20%26%20recognition/Felice%20Rosemary%20Lloyd%20Trust/Report_Culvenor_2012_recipient.pdf",
					"Price":"7.77",
					"Date":"12/12/2016"},
					{ "Invoice_ID":"27",
					"Name":"ProductG",
					"Invoice":"http://10.2.1.190/apanew/sites/default/files/ABOUT%20US/Awards%20%26%20recognition/Felice%20Rosemary%20Lloyd%20Trust/Report_Culvenor_2012_recipient.pdf",
					"Price":"7.77",
					"Date":"12/12/2016"},
					{ "Invoice_ID":"29",
					"Name":"ProductH",
					"Invoice":"http://10.2.1.190/apanew/sites/default/files/ABOUT%20US/Awards%20%26%20recognition/Felice%20Rosemary%20Lloyd%20Trust/Report_Culvenor_2012_recipient.pdf",
					"Price":"7.77",
					"Date":"12/12/2016"}
				] }';
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
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />19. Dashbaord - Get list of National Group: <br />";
			// Add JSON sample here
			if(count($variables) == 1) {
				// When this web service is triggered to get
				// National Group list only
				$JSONreturn = '{ 
					"NationalGroup": [
						{ "NGid": "ACU",
						"NGtitle": "Acupuncture and dry needling",
						"NGprice": "50" },
						{ "NGid": "ANI",
						"NGtitle": "Animal",
						"NGprice": "49" },
						{ "NGid": "AQU",
						"NGtitle": "Aquatic",
						"NGprice": "48" },
						{ "NGid": "BUS",
						"NGtitle": "Business",
						"NGprice": "47" },
						{ "NGid": "CAN",
						"NGtitle": "Cancer, palliative care and lymphoedema",
						"NGprice": "46" },
						{ "NGid": "CAR",
						"NGtitle": "Cardiorespiratory",
						"NGprice": "45" },
						{ "NGid": "DIS",
						"NGtitle": "Disability",
						"NGprice": "44" },
						{ "NGid": "EDU",
						"NGtitle": "Educators",
						"NGprice": "43" },
						{ "NGid": "EME",
						"NGtitle": "Emergency department",
						"NGprice": "42" },
						{ "NGid": "GER",
						"NGtitle": "Gerontology",
						"NGprice": "41" },
						{ "NGid": "LEA",
						"NGtitle": "Leadership and management",
						"NGprice": "40" },
						{ "NGid": "MEN",
						"NGtitle": "Mental health",
						"NGprice": "39" },
						{ "NGid": "MUS",
						"NGtitle": "Musculoskeletal",
						"NGprice": "38" },
						{ "NGid": "NEU",
						"NGtitle": "Neurology",
						"NGprice": "37" },
						{ "NGid": "OCC",
						"NGtitle": "Occupational health",
						"NGprice": "36" },
						{ "NGid": "ORT",
						"NGtitle": "Orthopaedic",
						"NGprice": "35" },
						{ "NGid": "PAE",
						"NGtitle": "Paediatric",
						"NGprice": "34" },
						{ "NGid": "PAI",
						"NGtitle": "Pain",
						"NGprice": "33" },
						{ "NGid": "RUR",
						"NGtitle": "Rural",
						"NGprice": "32" },
						{ "NGid": "SPO",
						"NGtitle": "Sprots",
						"NGprice": "31" },
						{ "NGid": "STU",
						"NGtitle": "Student",
						"NGprice": "30" },
						{ "NGid": "WOM",
						"NGtitle": "Women\'s, men\'s and pelvic health",
						"NGprice": "29" },
						{ "NGid": "SPMagzine",
						"NGtitle": "SportsMagzine",
						"NGprice": "29" },
						{ "NGid": "Intouch",
						"NGtitle": "Intouch",
						"NGprice": "29" }
						
					]
				}';
			} else {
				$JSONreturn = "";
			}
			return $JSONreturn;
		case "20":
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />20. Dashboard - Get list of subscribed National Group: <br />";
			// Add JSON sample here
			$JSONreturn = '{ 
				"NationalGroup": [
					{ "NGid": "ACU",
					"NGtitle": "Acupuncture and dry needling" },
					{ "NGid": "AQU",
					"NGtitle": "Aquatic" },
					{ "NGid": "BUS",
					"NGtitle": "Business" },
					{ "NGid": "DIS",
					"NGtitle": "Disability" },
					{ "NGid": "LEA",
					"NGtitle": "Leadership and management" },
					{ "NGid": "MEN",
					"NGtitle": "Mental health" },
					{ "NGid": "PAE",
					"NGtitle": "Paediatric" },
					{ "NGid": "SPO",
					"NGtitle": "Sprots" }
				]
			}';
			return $JSONreturn;
		case "21":
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />21. Dashboard - Get list of Fellowship Products: <br />";
			// Add JSON sample here
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
			}
			return $JSONreturn;
		case "22":
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />22. Dashboard - Get list of subscribed Fellowship Product: <br />";
			// Add JSON sample here
			$JSONreturn = '{ 
				"Fellowship": [
					{"FPid": "1",
					"FPtitle": "I am part of the Australian College of Physiotherapists",
					"FPprice": "50" }
				]
			}';
			return $JSONreturn;
		case "23":
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />23. Dashbard - Get list of Subscription preferences: <br />";
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
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />28. PD - Get event search result list: <br />";
			// Add JSON sample here
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
			}
			return $JSONreturn;
		case "29":
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />29. PD - Get event detail: <br />";
			// Add JSON sample here
			//$JSONreturn = "";
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
			  "UserStatus":"1",
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
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />33. Get CPD diary: <br />";
			// Add JSON sample here
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
			return $JSONreturn;
		case "34":
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />34. Insert CPD diary: <br />";
			// Add JSON sample here
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
			// Add JSON sample here
			// create curl resource 
			//$ch = curl_init(); 
            // set url 
			
			//curl_setopt($ch, CURLOPT_URL, "https://apaaptifywebuat.aptify.com/AptifyServicesAPI/services/GetOptionValues"); 
            //curl_setopt($ch, CURLOPT_HEADER, 0);
         	//return the transfer as a string 
			//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
           // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
            //curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
           // curl_setopt($ch, CURLOPT_CAINFO,getcwd() ."\CA.crt");
			//$output contains the output string 
			//$JSONreturn = curl_exec($ch);
            //if(curl_error($ch))
			//{
				//echo 'error:' . curl_error($ch);
			//}
				
            //echo $JSONreturn.'this is call from Aptify';
			// close curl resource to free up system resources 
			//curl_close($ch); 
			$JSONreturn ='{ 
				"Country":[
				   {
					  "ID":"1",
					  "Country":"Andorra",
					  "TelephoneCode":"376  "
				   },
				   {
					  "ID":"2",
					  "Country":"United Arab Emirates",
					  "TelephoneCode":"971  "
				   },
				   {
					  "ID":"3",
					  "Country":"Afghanistan",
					  "TelephoneCode":"93   "
				   },
				   {
					  "ID":"4",
					  "Country":"Antigua And Barbuda",
					  "TelephoneCode":"1268 "
				   },
				   {
					  "ID":"5",
					  "Country":"Anguilla",
					  "TelephoneCode":"1264 "
				   },
				   {
					  "ID":"6",
					  "Country":"Albania",
					  "TelephoneCode":"355  "
				   },
				   {
					  "ID":"7",
					  "Country":"Armenia",
					  "TelephoneCode":"374  "
				   },
				   {
					  "ID":"8",
					  "Country":"Netherlands Antilles",
					  "TelephoneCode":"599  "
				   },
				   {
					  "ID":"9",
					  "Country":"Angola",
					  "TelephoneCode":"244  "
				   },
				   {
					  "ID":"10",
					  "Country":"Antarctica",
					  "TelephoneCode":"672  "
				   },
				   {
					  "ID":"11",
					  "Country":"Argentina",
					  "TelephoneCode":"54   "
				   },
				   {
					  "ID":"12",
					  "Country":"American Samoa",
					  "TelephoneCode":"684  "
				   },
				   {
					  "ID":"13",
					  "Country":"Austria",
					  "TelephoneCode":"43   "
				   },
				   {
					  "ID":"14",
					  "Country":"Australia",
					  "TelephoneCode":"61   "
				   },
				   {
					  "ID":"15",
					  "Country":"Aruba",
					  "TelephoneCode":"297  "
				   },
				   {
					  "ID":"16",
					  "Country":"Azerbaijan",
					  "TelephoneCode":"944  "
				   },
				   {
					  "ID":"17",
					  "Country":"Bosnia And Herzegovina",
					  "TelephoneCode":"387  "
				   },
				   {
					  "ID":"18",
					  "Country":"Barbados",
					  "TelephoneCode":"1246 "
				   },
				   {
					  "ID":"19",
					  "Country":"Bangladesh",
					  "TelephoneCode":"880  "
				   },
				   {
					  "ID":"20",
					  "Country":"Belgium",
					  "TelephoneCode":"32   "
				   },
				   {
					  "ID":"21",
					  "Country":"Burkina Faso",
					  "TelephoneCode":"226  "
				   },
				   {
					  "ID":"22",
					  "Country":"Bulgaria",
					  "TelephoneCode":"359  "
				   },
				   {
					  "ID":"23",
					  "Country":"Bahrain",
					  "TelephoneCode":"973  "
				   },
				   {
					  "ID":"24",
					  "Country":"Burundi",
					  "TelephoneCode":"257  "
				   },
				   {
					  "ID":"25",
					  "Country":"Benin",
					  "TelephoneCode":"229  "
				   },
				   {
					  "ID":"26",
					  "Country":"Bermuda",
					  "TelephoneCode":"1441 "
				   },
				   {
					  "ID":"27",
					  "Country":"Brunei Darussalam",
					  "TelephoneCode":"673  "
				   },
				   {
					  "ID":"28",
					  "Country":"Bolivia",
					  "TelephoneCode":"591  "
				   },
				   {
					  "ID":"29",
					  "Country":"Brazil",
					  "TelephoneCode":"55   "
				   },
				   {
					  "ID":"30",
					  "Country":"Bahamas",
					  "TelephoneCode":"1242 "
				   },
				   {
					  "ID":"31",
					  "Country":"Bhutan",
					  "TelephoneCode":"975  "
				   },
				   {
					  "ID":"32",
					  "Country":"Bouvet Island",
					  "TelephoneCode":"47   "
				   },
				   {
					  "ID":"33",
					  "Country":"Botswana",
					  "TelephoneCode":"267  "
				   },
				   {
					  "ID":"34",
					  "Country":"Belarus",
					  "TelephoneCode":"375  "
				   },
				   {
					  "ID":"35",
					  "Country":"Belize",
					  "TelephoneCode":"501  "
				   },
				   {
					  "ID":"36",
					  "Country":"Canada",
					  "TelephoneCode":"1    "
				   },
				   {
					  "ID":"37",
					  "Country":"Cocos (Keeling) Islands",
					  "TelephoneCode":"61   "
				   },
				   {
					  "ID":"38",
					  "Country":"Congo, The Democratic Republic Of The",
					  "TelephoneCode":"243  "
				   },
				   {
					  "ID":"39",
					  "Country":"Central African Republic",
					  "TelephoneCode":"236  "
				   },
				   {
					  "ID":"40",
					  "Country":"Congo",
					  "TelephoneCode":"242  "
				   },
				   {
					  "ID":"41",
					  "Country":"Switzerland",
					  "TelephoneCode":"41   "
				   },
				   {
					  "ID":"42",
					  "Country":"Cote DIvoire",
					  "TelephoneCode":"225  "
				   },
				   {
					  "ID":"43",
					  "Country":"Cook Islands",
					  "TelephoneCode":"682  "
				   },
				   {
					  "ID":"44",
					  "Country":"Chile",
					  "TelephoneCode":"56   "
				   },
				   {
					  "ID":"45",
					  "Country":"Cameroon",
					  "TelephoneCode":"237  "
				   },
				   {
					  "ID":"46",
					  "Country":"China",
					  "TelephoneCode":"86   "
				   },
				   {
					  "ID":"47",
					  "Country":"Colombia",
					  "TelephoneCode":"57   "
				   },
				   {
					  "ID":"48",
					  "Country":"Costa Rica",
					  "TelephoneCode":"506  "
				   },
				   {
					  "ID":"49",
					  "Country":"Cuba",
					  "TelephoneCode":"53   "
				   },
				   {
					  "ID":"50",
					  "Country":"Cape Verde",
					  "TelephoneCode":"238  "
				   },
				   {
					  "ID":"51",
					  "Country":"Christmas Island",
					  "TelephoneCode":"61   "
				   },
				   {
					  "ID":"52",
					  "Country":"Cyprus",
					  "TelephoneCode":"357  "
				   },
				   {
					  "ID":"53",
					  "Country":"Czech Republic",
					  "TelephoneCode":"420  "
				   },
				   {
					  "ID":"54",
					  "Country":"Germany",
					  "TelephoneCode":"49   "
				   },
				   {
					  "ID":"55",
					  "Country":"Djibouti",
					  "TelephoneCode":"253  "
				   },
				   {
					  "ID":"56",
					  "Country":"Denmark",
					  "TelephoneCode":"45   "
				   },
				   {
					  "ID":"57",
					  "Country":"Dominica",
					  "TelephoneCode":"1767 "
				   },
				   {
					  "ID":"58",
					  "Country":"Dominican Republic",
					  "TelephoneCode":"1809 "
				   },
				   {
					  "ID":"59",
					  "Country":"Algeria",
					  "TelephoneCode":"213  "
				   },
				   {
					  "ID":"60",
					  "Country":"Ecuador",
					  "TelephoneCode":"593  "
				   },
				   {
					  "ID":"61",
					  "Country":"Estonia",
					  "TelephoneCode":"372  "
				   },
				   {
					  "ID":"62",
					  "Country":"Egypt",
					  "TelephoneCode":"20   "
				   },
				   {
					  "ID":"63",
					  "Country":"Western Sahara",
					  "TelephoneCode":"212  "
				   },
				   {
					  "ID":"64",
					  "Country":"Eritrea",
					  "TelephoneCode":"291  "
				   },
				   {
					  "ID":"65",
					  "Country":"Spain",
					  "TelephoneCode":"34   "
				   },
				   {
					  "ID":"66",
					  "Country":"Ethiopia",
					  "TelephoneCode":"251  "
				   },
				   {
					  "ID":"67",
					  "Country":"Finland",
					  "TelephoneCode":"358  "
				   },
				   {
					  "ID":"68",
					  "Country":"Fiji",
					  "TelephoneCode":"679  "
				   },
				   {
					  "ID":"69",
					  "Country":"Falkland Islands (Malvinas)",
					  "TelephoneCode":"500  "
				   },
				   {
					  "ID":"70",
					  "Country":"Micronesia, Federated States Of",
					  "TelephoneCode":"691  "
				   },
				   {
					  "ID":"71",
					  "Country":"Faroe Islands",
					  "TelephoneCode":"298  "
				   },
				   {
					  "ID":"72",
					  "Country":"France",
					  "TelephoneCode":"33   "
				   },
				   {
					  "ID":"73",
					  "Country":"Gabon",
					  "TelephoneCode":"241  "
				   },
				   {
					  "ID":"74",
					  "Country":"United Kingdom",
					  "TelephoneCode":"44   "
				   },
				   {
					  "ID":"75",
					  "Country":"Grenada",
					  "TelephoneCode":"1473 "
				   },
				   {
					  "ID":"76",
					  "Country":"Georgia",
					  "TelephoneCode":"995  "
				   },
				   {
					  "ID":"77",
					  "Country":"French Guiana",
					  "TelephoneCode":"594  "
				   },
				   {
					  "ID":"78",
					  "Country":"Ghana",
					  "TelephoneCode":"233  "
				   },
				   {
					  "ID":"79",
					  "Country":"Gibraltar",
					  "TelephoneCode":"350  "
				   },
				   {
					  "ID":"80",
					  "Country":"Greenland",
					  "TelephoneCode":"299  "
				   },
				   {
					  "ID":"81",
					  "Country":"Gambia",
					  "TelephoneCode":"220  "
				   },
				   {
					  "ID":"82",
					  "Country":"Guinea",
					  "TelephoneCode":"224  "
				   },
				   {
					  "ID":"83",
					  "Country":"Guadeloupe",
					  "TelephoneCode":"590  "
				   },
				   {
					  "ID":"84",
					  "Country":"Equatorial Guinea",
					  "TelephoneCode":"240  "
				   },
				   {
					  "ID":"85",
					  "Country":"Greece",
					  "TelephoneCode":"30   "
				   },
				   {
					  "ID":"86",
					  "Country":"South Georgia And The South Sandwich Islands",
					  "TelephoneCode":"500  "
				   },
				   {
					  "ID":"87",
					  "Country":"Guatemala",
					  "TelephoneCode":"502  "
				   },
				   {
					  "ID":"88",
					  "Country":"Guam",
					  "TelephoneCode":"1671 "
				   },
				   {
					  "ID":"89",
					  "Country":"Guinea-Bissau",
					  "TelephoneCode":"245  "
				   },
				   {
					  "ID":"90",
					  "Country":"Guyana",
					  "TelephoneCode":"592  "
				   },
				   {
					  "ID":"91",
					  "Country":"Hong Kong",
					  "TelephoneCode":"852  "
				   },
				   {
					  "ID":"92",
					  "Country":"Heard Island And Mcdonald Islands",
					  "TelephoneCode":"692  "
				   },
				   {
					  "ID":"93",
					  "Country":"Honduras",
					  "TelephoneCode":"504  "
				   },
				   {
					  "ID":"94",
					  "Country":"Croatia",
					  "TelephoneCode":"385  "
				   },
				   {
					  "ID":"95",
					  "Country":"Haiti",
					  "TelephoneCode":"509  "
				   },
				   {
					  "ID":"96",
					  "Country":"Hungary",
					  "TelephoneCode":"36   "
				   },
				   {
					  "ID":"97",
					  "Country":"Indonesia",
					  "TelephoneCode":"62   "
				   },
				   {
					  "ID":"98",
					  "Country":"Ireland",
					  "TelephoneCode":"353  "
				   },
				   {
					  "ID":"99",
					  "Country":"Israel",
					  "TelephoneCode":"972  "
				   },
				   {
					  "ID":"100",
					  "Country":"India",
					  "TelephoneCode":"91   "
				   },
				   {
					  "ID":"101",
					  "Country":"British Indian Ocean Territory",
					  "TelephoneCode":"246  "
				   },
				   {
					  "ID":"102",
					  "Country":"Iraq",
					  "TelephoneCode":"964  "
				   },
				   {
					  "ID":"103",
					  "Country":"Iran, Islamic Republic Of",
					  "TelephoneCode":"98   "
				   },
				   {
					  "ID":"104",
					  "Country":"Iceland",
					  "TelephoneCode":"354  "
				   },
				   {
					  "ID":"105",
					  "Country":"Italy",
					  "TelephoneCode":"39   "
				   },
				   {
					  "ID":"106",
					  "Country":"Jamaica",
					  "TelephoneCode":"1876 "
				   },
				   {
					  "ID":"107",
					  "Country":"Jordan",
					  "TelephoneCode":"962  "
				   },
				   {
					  "ID":"108",
					  "Country":"Japan",
					  "TelephoneCode":"81   "
				   },
				   {
					  "ID":"109",
					  "Country":"Kenya",
					  "TelephoneCode":"254  "
				   },
				   {
					  "ID":"110",
					  "Country":"Kyrgyzstan",
					  "TelephoneCode":"996  "
				   },
				   {
					  "ID":"111",
					  "Country":"Cambodia",
					  "TelephoneCode":"855  "
				   },
				   {
					  "ID":"112",
					  "Country":"Kiribati",
					  "TelephoneCode":"686  "
				   },
				   {
					  "ID":"113",
					  "Country":"Comoros",
					  "TelephoneCode":"269  "
				   },
				   {
					  "ID":"114",
					  "Country":"Saint Kitts And Nevis",
					  "TelephoneCode":"1869 "
				   },
				   {
					  "ID":"115",
					  "Country":"Korea, Democratic Peoples Republic Of",
					  "TelephoneCode":"850  "
				   },
				   {
					  "ID":"116",
					  "Country":"Korea, Republic Of",
					  "TelephoneCode":"82   "
				   },
				   {
					  "ID":"117",
					  "Country":"Kuwait",
					  "TelephoneCode":"965  "
				   },
				   {
					  "ID":"118",
					  "Country":"Cayman Islands",
					  "TelephoneCode":"1345 "
				   },
				   {
					  "ID":"119",
					  "Country":"Kazakhstan",
					  "TelephoneCode":"7    "
				   },
				   {
					  "ID":"120",
					  "Country":"Lao Peoples Democratic Republic",
					  "TelephoneCode":"856  "
				   },
				   {
					  "ID":"121",
					  "Country":"Lebanon",
					  "TelephoneCode":"961  "
				   },
				   {
					  "ID":"122",
					  "Country":"Saint Lucia",
					  "TelephoneCode":"1758 "
				   },
				   {
					  "ID":"123",
					  "Country":"Liechtenstein",
					  "TelephoneCode":"423  "
				   },
				   {
					  "ID":"124",
					  "Country":"Sri Lanka",
					  "TelephoneCode":"94   "
				   },
				   {
					  "ID":"125",
					  "Country":"Liberia",
					  "TelephoneCode":"231  "
				   },
				   {
					  "ID":"126",
					  "Country":"Lesotho",
					  "TelephoneCode":"266  "
				   },
				   {
					  "ID":"127",
					  "Country":"Lithuania",
					  "TelephoneCode":"370  "
				   },
				   {
					  "ID":"128",
					  "Country":"Luxembourg",
					  "TelephoneCode":"352  "
				   },
				   {
					  "ID":"129",
					  "Country":"Latvia",
					  "TelephoneCode":"371  "
				   },
				   {
					  "ID":"130",
					  "Country":"Libyan Arab Jamahiriya",
					  "TelephoneCode":"218  "
				   },
				   {
					  "ID":"131",
					  "Country":"Morocco",
					  "TelephoneCode":"212  "
				   },
				   {
					  "ID":"132",
					  "Country":"Monaco",
					  "TelephoneCode":"377  "
				   },
				   {
					  "ID":"133",
					  "Country":"Moldova, Republic Of",
					  "TelephoneCode":"373  "
				   },
				   {
					  "ID":"134",
					  "Country":"Madagascar",
					  "TelephoneCode":"261  "
				   },
				   {
					  "ID":"135",
					  "Country":"Marshall Islands",
					  "TelephoneCode":"692  "
				   },
				   {
					  "ID":"136",
					  "Country":"Macedonia, The Former Yugoslav Republic Of",
					  "TelephoneCode":"389  "
				   },
				   {
					  "ID":"137",
					  "Country":"Mali",
					  "TelephoneCode":"223  "
				   },
				   {
					  "ID":"138",
					  "Country":"Myanmar",
					  "TelephoneCode":"95   "
				   },
				   {
					  "ID":"139",
					  "Country":"Mongolia",
					  "TelephoneCode":"976  "
				   },
				   {
					  "ID":"140",
					  "Country":"Macao",
					  "TelephoneCode":"853  "
				   },
				   {
					  "ID":"141",
					  "Country":"Northern Mariana Islands",
					  "TelephoneCode":"1670 "
				   },
				   {
					  "ID":"142",
					  "Country":"Martinique",
					  "TelephoneCode":"596  "
				   },
				   {
					  "ID":"143",
					  "Country":"Mauritania",
					  "TelephoneCode":"222  "
				   },
				   {
					  "ID":"144",
					  "Country":"Montserrat",
					  "TelephoneCode":"1664 "
				   },
				   {
					  "ID":"145",
					  "Country":"Malta",
					  "TelephoneCode":"356  "
				   },
				   {
					  "ID":"146",
					  "Country":"Mauritius",
					  "TelephoneCode":"230  "
				   },
				   {
					  "ID":"147",
					  "Country":"Maldives",
					  "TelephoneCode":"960  "
				   },
				   {
					  "ID":"148",
					  "Country":"Malawi",
					  "TelephoneCode":"265  "
				   },
				   {
					  "ID":"149",
					  "Country":"Mexico",
					  "TelephoneCode":"52   "
				   },
				   {
					  "ID":"150",
					  "Country":"Malaysia",
					  "TelephoneCode":"60   "
				   },
				   {
					  "ID":"151",
					  "Country":"Mozambique",
					  "TelephoneCode":"258  "
				   },
				   {
					  "ID":"152",
					  "Country":"Namibia",
					  "TelephoneCode":"264  "
				   },
				   {
					  "ID":"153",
					  "Country":"New Caledonia",
					  "TelephoneCode":"687  "
				   },
				   {
					  "ID":"154",
					  "Country":"Niger",
					  "TelephoneCode":"227  "
				   },
				   {
					  "ID":"155",
					  "Country":"Norfolk Island",
					  "TelephoneCode":"672  "
				   },
				   {
					  "ID":"156",
					  "Country":"Nigeria",
					  "TelephoneCode":"234  "
				   },
				   {
					  "ID":"157",
					  "Country":"Nicaragua",
					  "TelephoneCode":"505  "
				   },
				   {
					  "ID":"158",
					  "Country":"Netherlands",
					  "TelephoneCode":"31   "
				   },
				   {
					  "ID":"159",
					  "Country":"Norway",
					  "TelephoneCode":"47   "
				   },
				   {
					  "ID":"160",
					  "Country":"Nepal",
					  "TelephoneCode":"977  "
				   },
				   {
					  "ID":"161",
					  "Country":"Nauru",
					  "TelephoneCode":"674  "
				   },
				   {
					  "ID":"162",
					  "Country":"Niue",
					  "TelephoneCode":"683  "
				   },
				   {
					  "ID":"163",
					  "Country":"New Zealand",
					  "TelephoneCode":"64   "
				   },
				   {
					  "ID":"164",
					  "Country":"Oman",
					  "TelephoneCode":"968  "
				   },
				   {
					  "ID":"165",
					  "Country":"Panama",
					  "TelephoneCode":"507  "
				   },
				   {
					  "ID":"166",
					  "Country":"Peru",
					  "TelephoneCode":"51   "
				   },
				   {
					  "ID":"167",
					  "Country":"French Polynesia",
					  "TelephoneCode":"689  "
				   },
				   {
					  "ID":"168",
					  "Country":"Papua New Guinea",
					  "TelephoneCode":"675  "
				   },
				   {
					  "ID":"169",
					  "Country":"Philippines",
					  "TelephoneCode":"63   "
				   },
				   {
					  "ID":"170",
					  "Country":"Pakistan",
					  "TelephoneCode":"92   "
				   },
				   {
					  "ID":"171",
					  "Country":"Poland",
					  "TelephoneCode":"48   "
				   },
				   {
					  "ID":"172",
					  "Country":"Saint Pierre And Miquelon",
					  "TelephoneCode":"508  "
				   },
				   {
					  "ID":"173",
					  "Country":"Pitcairn",
					  "TelephoneCode":"870  "
				   },
				   {
					  "ID":"174",
					  "Country":"Puerto Rico",
					  "TelephoneCode":"1787 "
				   },
				   {
					  "ID":"175",
					  "Country":"Palestinian Territory, Occupied",
					  "TelephoneCode":"970  "
				   },
				   {
					  "ID":"176",
					  "Country":"Portugal",
					  "TelephoneCode":"351  "
				   },
				   {
					  "ID":"177",
					  "Country":"Palau",
					  "TelephoneCode":"680  "
				   },
				   {
					  "ID":"178",
					  "Country":"Paraguay",
					  "TelephoneCode":"595  "
				   },
				   {
					  "ID":"179",
					  "Country":"Qatar",
					  "TelephoneCode":"974  "
				   },
				   {
					  "ID":"180",
					  "Country":"Reunion",
					  "TelephoneCode":"262  "
				   },
				   {
					  "ID":"181",
					  "Country":"Romania",
					  "TelephoneCode":"40   "
				   },
				   {
					  "ID":"182",
					  "Country":"Russian Federation",
					  "TelephoneCode":"7    "
				   },
				   {
					  "ID":"183",
					  "Country":"Rwanda",
					  "TelephoneCode":"250  "
				   },
				   {
					  "ID":"184",
					  "Country":"Saudi Arabia",
					  "TelephoneCode":"966  "
				   },
				   {
					  "ID":"185",
					  "Country":"Solomon Islands",
					  "TelephoneCode":"677  "
				   },
				   {
					  "ID":"186",
					  "Country":"Seychelles",
					  "TelephoneCode":"248  "
				   },
				   {
					  "ID":"187",
					  "Country":"Sudan",
					  "TelephoneCode":"249  "
				   },
				   {
					  "ID":"188",
					  "Country":"Sweden",
					  "TelephoneCode":"46   "
				   },
				   {
					  "ID":"189",
					  "Country":"Singapore",
					  "TelephoneCode":"65   "
				   },
				   {
					  "ID":"190",
					  "Country":"Saint Helena",
					  "TelephoneCode":"290  "
				   },
				   {
					  "ID":"191",
					  "Country":"Slovenia",
					  "TelephoneCode":"386  "
				   },
				   {
					  "ID":"192",
					  "Country":"Svalbard And Jan Mayen",
					  "TelephoneCode":"378  "
				   },
				   {
					  "ID":"193",
					  "Country":"Slovakia",
					  "TelephoneCode":"421  "
				   },
				   {
					  "ID":"194",
					  "Country":"Sierra Leone",
					  "TelephoneCode":"232  "
				   },
				   {
					  "ID":"195",
					  "Country":"San Marino",
					  "TelephoneCode":"378  "
				   },
				   {
					  "ID":"196",
					  "Country":"Senegal",
					  "TelephoneCode":"221  "
				   },
				   {
					  "ID":"197",
					  "Country":"Somalia",
					  "TelephoneCode":"252  "
				   },
				   {
					  "ID":"198",
					  "Country":"Suriname",
					  "TelephoneCode":"597  "
				   },
				   {
					  "ID":"199",
					  "Country":"Sao Tome And Principe",
					  "TelephoneCode":"239  "
				   },
				   {
					  "ID":"200",
					  "Country":"El Salvador",
					  "TelephoneCode":"503  "
				   },
				   {
					  "ID":"201",
					  "Country":"Syrian Arab Republic",
					  "TelephoneCode":"963  "
				   },
				   {
					  "ID":"202",
					  "Country":"Swaziland",
					  "TelephoneCode":"268  "
				   },
				   {
					  "ID":"203",
					  "Country":"Turks And Caicos Islands",
					  "TelephoneCode":"1649 "
				   },
				   {
					  "ID":"204",
					  "Country":"Chad",
					  "TelephoneCode":"235  "
				   },
				   {
					  "ID":"205",
					  "Country":"French Southern Territories",
					  "TelephoneCode":"596  "
				   },
				   {
					  "ID":"206",
					  "Country":"Togo",
					  "TelephoneCode":"228  "
				   },
				   {
					  "ID":"207",
					  "Country":"Thailand",
					  "TelephoneCode":"66   "
				   },
				   {
					  "ID":"208",
					  "Country":"Tajikistan",
					  "TelephoneCode":"992  "
				   },
				   {
					  "ID":"209",
					  "Country":"Tokelau",
					  "TelephoneCode":"690  "
				   },
				   {
					  "ID":"210",
					  "Country":"East Timor",
					  "TelephoneCode":"670  "
				   },
				   {
					  "ID":"211",
					  "Country":"Turkmenistan",
					  "TelephoneCode":"993  "
				   },
				   {
					  "ID":"212",
					  "Country":"Tunisia",
					  "TelephoneCode":"216  "
				   },
				   {
					  "ID":"213",
					  "Country":"Tonga",
					  "TelephoneCode":"676  "
				   },
				   {
					  "ID":"214",
					  "Country":"Turkey",
					  "TelephoneCode":"90   "
				   },
				   {
					  "ID":"215",
					  "Country":"Trinidad And Tobago",
					  "TelephoneCode":"1868 "
				   },
				   {
					  "ID":"216",
					  "Country":"Tuvalu",
					  "TelephoneCode":"688  "
				   },
				   {
					  "ID":"217",
					  "Country":"Taiwan",
					  "TelephoneCode":"886  "
				   },
				   {
					  "ID":"218",
					  "Country":"Tanzania, United Republic Of",
					  "TelephoneCode":"225  "
				   },
				   {
					  "ID":"219",
					  "Country":"Ukraine",
					  "TelephoneCode":"380  "
				   },
				   {
					  "ID":"220",
					  "Country":"Uganda",
					  "TelephoneCode":"256  "
				   },
				   {
					  "ID":"221",
					  "Country":"United States Minor Outlying Islands",
					  "TelephoneCode":"1    "
				   },
				   {
					  "ID":"222",
					  "Country":"United States",
					  "TelephoneCode":"1    "
				   },
				   {
					  "ID":"223",
					  "Country":"Uruguay",
					  "TelephoneCode":"598  "
				   },
				   {
					  "ID":"224",
					  "Country":"Uzbekistan",
					  "TelephoneCode":"998  "
				   },
				   {
					  "ID":"225",
					  "Country":"Holy See (Vatican City State)",
					  "TelephoneCode":"379  "
				   },
				   {
					  "ID":"226",
					  "Country":"Saint Vincent And The Grenadines",
					  "TelephoneCode":"1784 "
				   },
				   {
					  "ID":"227",
					  "Country":"Venezuela",
					  "TelephoneCode":"58   "
				   },
				   {
					  "ID":"228",
					  "Country":"Virgin Islands, British",
					  "TelephoneCode":"1284 "
				   },
				   {
					  "ID":"229",
					  "Country":"Virgin Islands, U.S.",
					  "TelephoneCode":"1340 "
				   },
				   {
					  "ID":"230",
					  "Country":"Viet Nam",
					  "TelephoneCode":"84   "
				   },
				   {
					  "ID":"231",
					  "Country":"Vanuatu",
					  "TelephoneCode":"678  "
				   },
				   {
					  "ID":"232",
					  "Country":"Wallis And Futuna",
					  "TelephoneCode":"681  "
				   },
				   {
					  "ID":"233",
					  "Country":"Samoa",
					  "TelephoneCode":"685  "
				   },
				   {
					  "ID":"234",
					  "Country":"Yemen",
					  "TelephoneCode":"967  "
				   },
				   {
					  "ID":"235",
					  "Country":"Mayotte",
					  "TelephoneCode":"269  "
				   },
				   {
					  "ID":"236",
					  "Country":"Yugoslavia",
					  "TelephoneCode":"0    "
				   },
				   {
					  "ID":"237",
					  "Country":"South Africa",
					  "TelephoneCode":"27   "
				   },
				   {
					  "ID":"238",
					  "Country":"Zambia",
					  "TelephoneCode":"260  "
				   },
				   {
					  "ID":"239",
					  "Country":"Zimbabwe",
					  "TelephoneCode":"263  "
				   },
				   {
					  "ID":"240",
					  "Country":"Clipperton Island",
					  "TelephoneCode":"0    "
				   },
				   {
					  "ID":"241",
					  "Country":"Gaza Strip",
					  "TelephoneCode":"970  "
				   },
				   {
					  "ID":"242",
					  "Country":"Guernsey",
					  "TelephoneCode":"44   "
				   },
				   {
					  "ID":"243",
					  "Country":"Jersey",
					  "TelephoneCode":"44   "
				   },
				   {
					  "ID":"244",
					  "Country":"Man, Isle of",
					  "TelephoneCode":"44"
				   },
				   {
					  "ID":"245",
					  "Country":"Montenegro",
					  "TelephoneCode":"382"
				   },
				   {
					  "ID":"246",
					  "Country":"Saint Barthelemy",
					  "TelephoneCode":"590"
				   },
				   {
					  "ID":"247",
					  "Country":"Serbia",
					  "TelephoneCode":"381"
				   },
				   {
					  "ID":"248",
					  "Country":"West Bank",
					  "TelephoneCode":"970"
				   }
                ]
			}'; 
			return $JSONreturn;
	}
}
?>