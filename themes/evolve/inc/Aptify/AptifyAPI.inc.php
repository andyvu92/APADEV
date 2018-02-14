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
			$JSONreturn = "";
			return $JSONreturn;
			break;
		case "2":
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />2. Get membership Certificate PDF: <br />";
			// Add JSON sample here
			$JSONreturn = "";
			return $JSONreturn;
		case "3":
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />3. Get membership insurance certificate PDF: <br />";
			// Add JSON sample here
			$JSONreturn = "";
			return $JSONreturn;
		case "4":
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />4. Dashboard - Get member detail: <br />";
			// Add JSON sample here
			$JSONreturn = '{  
				   "Prefix":"",
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
				   "Unit":"1175 ",
				   "Pobox":"437",
				   "Street":"Toorak Road",
				   "Suburb":"Camberwell",
				   "Postcode":"3124",
				   "State":"",
				   "Country":"Australia",
				   "Memberno":"1234567",
				   "Memberid":"test@gmail.com",
				   "MemberType":"RW",
				   "Ahpranumber":"6934395685-1",
				   "Nationalgp":"Nationalgp",
				   "Branch":"Branch",
				   "Specialty":"FACP",
				   "Status":"Current",
				   "Regional-group":"A,B,C",
				   "Billing-BuildingName":"",
				   "Billing-unitno":"1175",
				   "Billing-streetname":"Toorak Road",
				   "Billing-city-town":"Melbourne",
				   "Billing-postcode":"3177",
				   "Billing-state":"VIC",
				   "Billing-country":"Australia",
				   "Duplicate":"1",
				   "Shipping-BuildingName":"",
				   "Shipping-unitno":"1175",
				   "Shipping-streetname":"Toorak Road",
				   "Shipping-city-town":"Melbourne",
				   "Shipping-postcode":"3177",
				   "Shipping-state":"VIC",
				   "Shipping-country":"Australia",
				   "Mailing-unitno":"1175",
				   "Mailing-streetname":"Toorak Road",
				   "Mailing-city-town":"Melbourne",
				   "Mailing-postcode":"3177",
				   "Mailing-state":"VIC",
				   "Mailing-country":"Australia",
				   "Udegree":"Bachelor",
				   "Undergraduate-university-name":"Sydney University",
				   "Ugraduate-country":"Australia",
				   "Ugraduate-year-attained":"2000",
				   "Pdegree":"Postgraduate",
				   "Postgraduate-university-name":"Sydney University",
				   "Pgraduate-country":"Postgraduate",
				   "Pgraduate-year-attained":"Sydney University",
				   "Additional-qualifications": [
						"qualification 1",
						"qualification 2"
					],
				   "Workplaces":{  
					"0": {  
						 "Workplace_ID":"72516",
						 "Name-of-workplace":"APA",
						 "BuildingName":"BuildingName",
						 "Wunit":"2",
						 "Wstreet":"toorak road",
						 "Wcity":"Melbourne",
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
						 "Workplace-setting":"1",
						 "Number-worked-hours":"7",
						 "SpecialInterest": {
							"Acupuncture-dry-needing":"1",
							 "Adolescents":"1",
							 "Ageing-well":"1",
							 "Amputees":"1",
							 "Arthritis":"1",
							 "Babies-children":"1",
							 "Back-neck":"1",
							 "Bowel":"1",
							 "Brain":"1",
							 "Cancer":"1",
							 "Chronic-pain":"1",
							 "Wdisability":"1",
							 "Wdiabetes":"1",
							 "Feldenkrais":"1",
							 "Hand-therapy":"1",
							 "Head-face":"1",
							 "Healthwork":"1",
							 "Heart-lung":"1",
							 "Hydrotherapy":"1",
							 "Lower-limbs":"1",
							 "Wmen-health":"1",
							 "Neurological-conditions":"1",
							 "Worthopaedics":"1",
							 "Palliative-care":"1",
							 "Pilates":"1",
							 "Pre-post":"1",
							 "Pre-surgey":"1",
							 "Stroke-recovery":"1",
							 "Sexual-health":"1",
							 "Sport-injuries":"1",
							 "Upper-limbs":"1",
							 "Women-health":"1",
							 "Yoga":"1"
						 },
						 "Findphysio":"1",
						 "Homehospital":"1",
						 "MobilePhysio":"1"
					  },
				   "1": {  
						 "Workplace_ID":"72571",
						 "Name-of-workplace":"testA",
						 "BuildingName":"BuildingName",
						 "Wunit":"2",
						 "Wstreet":"toorak road",
						 "Wcity":"Melbourne",
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
						 "Workplace-setting":"1",
						 "Number-worked-hours":"7",
						 "SpecialInterest": {
							 "Acupuncture-dry-needing":"1",
							 "Adolescents":"1",
							 "Ageing-well":"1",
							 "Amputees":"1",
							 "Arthritis":"1",
							 "Babies-children":"1",
							 "Back-neck":"1",
							 "Bowel":"1",
							 "Brain":"1",
							 "Cancer":"1",
							 "Chronic-pain":"1",
							 "Wdisability":"1",
							 "Wdiabetes":"1",
							 "Feldenkrais":"1",
							 "Hand-therapy":"1",
							 "Head-face":"1",
							 "Healthwork":"1",
							 "Heart-lung":"1",
							 "Hydrotherapy":"1",
							 "Lower-limbs":"1",
							 "Wmen-health":"1",
							 "Neurological-conditions":"1",
							 "Worthopaedics":"1",
							 "Palliative-care":"1",
							 "Pilates":"1",
							 "Pre-post":"1",
							 "Pre-surgey":"1",
							 "Stroke-recovery":"1",
							 "Sexual-health":"1",
							 "Sport-injuries":"1",
							 "Upper-limbs":"1",
							 "Women-health":"1",
							 "Yoga":"1"
						 },
						 "Findphysio":"1",
						 "Homehospital":"1",
						 "MobilePhysio":"1"
					  },
				   "2": {
						 "Workplace_ID":"72171",
						 "Name-of-workplace":"testB",
						 "BuildingName":"BuildingName",
						 "Wunit":"2",
						 "Wstreet":"toorak road",
						 "Wcity":"Melbourne",
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
						 "Workplace-setting":"1",
						 "Number-worked-hours":"7",
						 "SpecialInterest": {
							 "Acupuncture-dry-needing":"1",
							 "Adolescents":"1",
							 "Ageing-well":"1",
							 "Amputees":"1",
							 "Arthritis":"1",
							 "Babies-children":"1",
							 "Back-neck":"1",
							 "Bowel":"1",
							 "Brain":"1",
							 "Cancer":"1",
							 "Chronic-pain":"1",
							 "Wdisability":"1",
							 "Wdiabetes":"1",
							 "Feldenkrais":"1",
							 "Hand-therapy":"1",
							 "Head-face":"1",
							 "Healthwork":"1",
							 "Heart-lung":"1",
							 "Hydrotherapy":"1",
							 "Lower-limbs":"1",
							 "Wmen-health":"1",
							 "Neurological-conditions":"1",
							 "Worthopaedics":"1",
							 "Palliative-care":"1",
							 "Pilates":"1",
							 "Pre-post":"1",
							 "Pre-surgey":"1",
							 "Stroke-recovery":"1",
							 "Sexual-health":"1",
							 "Sport-injuries":"1",
							 "Upper-limbs":"1",
							 "Women-health":"1",
							 "Yoga":"1"
						 },
						 "Findphysio":"1",
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
			$JSONreturn = "";
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
			$JSONreturn = "";
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
			$JSONreturn = "";
			return $JSONreturn;
		case "11":
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />11. Dashboard - Update picture: <br />";
			// Add JSON sample here
			$JSONreturn = "";
			return $JSONreturn;
		case "12":
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />12. Dashboard - Get payment listing: <br />";
			// Add JSON sample here
			$JSONreturn = "";
			return $JSONreturn;
		case "13":
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />13. Dashboard - update payment method: <br />";
			// Add JSON sample here
			$JSONreturn = "";
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
			$JSONreturn = "";
			return $JSONreturn;
		case "16":
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />16. Dashboard - Check existing email: <br />";
			// Add JSON sample here
			$JSONreturn = "";
			return $JSONreturn;
		case "17":
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />17. Dashboard - Get payment history list: <br />";
			// Add JSON sample here
			$JSONreturn = "";
			return $JSONreturn;
		case "18":
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />18. Get payment invoice PDF: <br />";
			// Add JSON sample here
			$JSONreturn = "";
			return $JSONreturn;
		case "19":
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />19. Dashbaord - Get list of National Group: <br />";
			// Add JSON sample here
			$JSONreturn = "";
			return $JSONreturn;
		case "20":
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />20. Dashboard - Get list of subscribed National Group: <br />";
			// Add JSON sample here
			$JSONreturn = "";
			return $JSONreturn;
		case "21":
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />21. Dashboard - Get list of Fellowship Products: <br />";
			// Add JSON sample here
			$JSONreturn = "";
			return $JSONreturn;
		case "22":
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />22. Dashboard - Get list of subscribed Fellowship Product: <br />";
			// Add JSON sample here
			$JSONreturn = "";
			return $JSONreturn;
		case "23":
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />23. Dashbard - Get list of Subscription preferences: <br />";
			// Add JSON sample here
			$JSONreturn = "";
			return $JSONreturn;
		case "24":
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />24. Dashbaord - Update subscription preferences: <br />";
			// Add JSON sample here
			$JSONreturn = "";
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
			$JSONreturn = "";
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
			  "Time":"9:00 AM - 5.00 PM",
			  "StartDate":"13/12/2018",
			  "EndDate":"17/12/2018",
			  "Close_date":"12/12/2018",
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
			$JSONreturn = "";
			return $JSONreturn;
		case "31":
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />31. Get MEmbership product price: <br />";
			// Add JSON sample here
			$JSONreturn = "";
			return $JSONreturn;
		case "32":
			// For the actual API use
			// $API = "";
			echo "Data Sent: <br />";
			print_r($variables);
			echo "<br />32. Order confirmation: <br />";
			// Add JSON sample here
			$JSONreturn = "";
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
				"APA": [
				 {
				 "PD_id": "421",
				 "PD_title":"PD title A",
				 "PD_date":"13/12/2017",
				 "PD_hours":"3" },
				 {
				 "PD_id": "231",
				 "PD_title":"PD title B",
				 "PD_date":"15/12/2017",
				 "PD_hours":"2" },
				 {
				 "PD_id": "763",
				 "PD_title":"PD title C",
				 "PD_date":"17/12/2017",
				 "PD_hours":"3" },
				 {
				 "PD_id": "236",
				 "PD_title":"PD title D",
				 "PD_date":"19/12/2017",
				 "PD_hours":"1" }  ], 
				 "NONAPA": [
				 {
				 "NPD_id": "821",
				 "NPD_Description":"NPD title A",
				 "NPD_date":"13/12/2017",
				 "NPD_Time":"1",
				 "NPD_Provider": "A Company",
				 "NPD_Reflection": "I have learned dis!" },
				 {
				 "NPD_id": "518",
				 "NPD_Description":"NPD title A",
				 "NPD_date":"13/12/2017",
				 "NPD_Time":"1",
				 "NPD_Provider": "B Company",
				 "NPD_Reflection": "I have learned dis!" },
				 {
				 "NPD_id": "324",
				 "NPD_Description":"NPD title A",
				 "NPD_date":"13/12/2017",
				 "NPD_Time":"1",
				 "NPD_Provider": "C Company",
				 "NPD_Reflection": "I have learned dis!" }
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
	}
}
?>