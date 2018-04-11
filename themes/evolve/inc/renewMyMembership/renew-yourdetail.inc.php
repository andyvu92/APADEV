<?php
if(isset($_POST['step1'])) {
	$postData = array();
	if(isset($_POST['Prefix'])){ $postData['Prefix'] = $_POST['Prefix']; } else { $postData['Prefix'] = '';}
	if(isset($_POST['Firstname'])){ $postData['Firstname'] = $_POST['Firstname']; }
	if(isset($_POST['Middle-name'])){ $postData['Middle-name'] = $_POST['Middle-name']; }
	if(isset($_POST['Preferred-name'])){ $postData['Preferred-name'] = $_POST['Preferred-name']; }
	if(isset($_POST['Maiden-name'])){ $postData['Maiden-name'] = $_POST['Maiden-name']; }
	if(isset($_POST['Lastname'])){ $postData['Lastname'] = $_POST['Lastname']; }
	if(isset($_POST['Birth'])){ $postData['Birth'] = $_POST['Birth']; }
	if(isset($_POST['Gender'])){ $postData['Gender'] = $_POST['Gender']; }
	if(isset($_POST['country-code'])){ $postData['Home-phone-number'][0] = $_POST['country-code']; }
	if(isset($_POST['area-code'])){ $postData['Home-phone-number'][1] = $_POST['area-code']; }
	if(isset($_POST['phone-number'])){ $postData['Home-phone-number'][2] = $_POST['phone-number']; }
	if(isset($_POST['Mobile-number'])){ $postData['Mobile-number'] = $_POST['Mobile-number']; }
	if(isset($_POST['Aboriginal'])){ $postData['Aboriginal'] = $_POST['Aboriginal']; }
	if(isset($_POST['BuildingName'])){ $postData['BuildingName'] = $_POST['BuildingName']; }
	if(isset($_POST['Unit'])){ $postData['Unit'] = $_POST['Unit']; }
	if(isset($_POST['Pobox'])){ $postData['Pobox'] = $_POST['Pobox']; }
	if(isset($_POST['Street'])){ $postData['Street'] = $_POST['Street']; }
	if(isset($_POST['Suburb'])){ $postData['Suburb'] = $_POST['Suburb']; }
	if(isset($_POST['Postcode'])){ $postData['Postcode'] = $_POST['Postcode']; }
	if(isset($_POST['State'])){ $postData['State'] = $_POST['State']; }
	if(isset($_POST['Country'])){ $postData['Country'] = $_POST['Country']; }
	//change from shipping address to billing address
	if(isset($_POST['Shipping-address-join']) && $_POST['Shipping-address-join']=='1'){ 
	$postData['Billing-BuildingName'] = $_POST['BuildingName']; 
	$postData['Billing-Address_Line_1'] = $_POST['Address_Line_1'];
	$postData['Billing-Address_Line_2'] = $_POST['Address_Line_2'];
	$postData['Billing-PObox'] = $_POST['Pobox'];
	$postData['Billing-Suburb'] = $_POST['Suburb'];
	$postData['Billing-Postcode'] = $_POST['Postcode'];
	$postData['Billing-State'] = $_POST['State'];
	$postData['Billing-Country'] = $_POST['Country'];
	}else{
	$postData['Billing-BuildingName'] = $_POST['Billing-BuildingName']; 
	$postData['Billing-Address_Line_1'] = $_POST['Billing-Address_Line_1'];
	$postData['Billing-Address_Line_2'] = $_POST['Billing-Address_Line_2'];
	$postData['Billing-PObox'] = $_POST['Billing-PObox'];
	$postData['Billing-Suburb'] = $_POST['Billing-Suburb'];
	$postData['Billing-Postcode'] = $_POST['Billing-Postcode'];
	$postData['Billing-State'] = $_POST['Billing-State'];
	$postData['Billing-Country'] = $_POST['Billing-Country'];  
	}
	//Add shipping address & mailing address post data
	if(isset($_POST['Shipping-BuildingName'])){ $postData['Shipping-BuildingName'] = $_POST['Shipping-BuildingName']; }
	if(isset($_POST['Shipping-Address_Line_1'])){ $postData['Shipping-Address_Line_1'] = $_POST['Shipping-Address_Line_1']; }
	if(isset($_POST['Shipping-Address_Line_2'])){ $postData['Shipping-Address_Line_2'] = $_POST['Shipping-Address_Line_2']; }
	if(isset($_POST['Shipping-PObox'])){ $postData['Shipping-PObox'] = $_POST['Shipping-PObox']; } 
	if(isset($_POST['Shipping-city-town'])){ $postData['Shipping-city-town'] = $_POST['Shipping-city-town']; } 
	if(isset($_POST['Shipping-postcode'])){ $postData['Shipping-postcode'] = $_POST['Shipping-postcode']; } 
	if(isset($_POST['Shipping-state'])){ $postData['Shipping-state'] = $_POST['Shipping-state']; }
	if(isset($_POST['Shipping-country'])){ $postData['Shipping-country'] = $_POST['Shipping-country']; }
	if(isset($_POST['Mailing-BuildingName'])){ $postData['Mailing-BuildingName'] = $_POST['Mailing-BuildingName']; } 
	if(isset($_POST['Mailing-Address_Line_1'])){ $postData['Mailing-Address_Line_1'] = $_POST['Mailing-Address_Line_1']; } 
	if(isset($_POST['Mailing-Address_Line_2'])){ $postData['Mailing-Address_Line_2'] = $_POST['Mailing-Address_Line_2']; } 
	if(isset($_POST['Mailing-PObox'])){ $postData['Mailing-PObox'] = $_POST['Mailing-PObox']; }
	if(isset($_POST['Mailing-city-town'])){ $postData['Mailing-city-town'] = $_POST['Mailing-city-town']; } 
	if(isset($_POST['Mailing-postcode'])){ $postData['Mailing-postcode'] = $_POST['Mailing-postcode']; }
	if(isset($_POST['Mailing-state'])){ $postData['Mailing-state'] = $_POST['Mailing-state']; } 
	if(isset($_POST['Mailing-country'])){ $postData['Mailing-country'] = $_POST['Mailing-country']; } 
	//---
	if(isset($_POST['Memberid'])){ $postData['Memberid'] = $_POST['Memberid']; }
	if(isset($_POST['Password'])){ $postData['Password'] = $_POST['Password']; }
	if(isset($_POST['MemberType'])){ $postData['MemberType'] = $_POST['MemberType']; }
	if(isset($_POST['Ahpranumber'])){ $postData['Ahpranumber'] = $_POST['Ahpranumber']; }
	if(isset($_POST['Nationalgp'])){ $postData['Nationalgp'] = $_POST['Nationalgp']; }
	if(isset($_POST['Branch'])){ $postData['Branch'] = $_POST['Branch']; }
	if(isset($_SESSION['Regional-group'])){ $postData['Regional-group'] = $_SESSION['Regional-group']; } else{ $postData['Regional-group'] ="";}
	if(isset($_POST['SpecialInterest'])){ $postData['SpecialInterest'] = $_POST['SpecialInterest']; }
	if(isset($_POST['Treatmentarea'])){ $postData['Treatmentarea'] = $_POST['Treatmentarea']; }
	if(isset($_POST['MAdditionallanguage'])){ $postData['Additionallanguage'] = $_POST['MAdditionallanguage']; }
	if(isset($_POST['Findpublicbuddy'])){ $postData['Findpublicbuddy'] = $_POST['Findpublicbuddy']; } else{ $postData['Findpublicbuddy'] = 0;}
	if(isset($_POST['wpnumber'])){ 
	$num = $_POST['wpnumber']; 
	for($i=0; $i<$num; $i++){
		$workplaceArray = array();
		if(isset($_POST['Findabuddy'.$i])) { $workplaceArray['Findabuddy'] = $_POST['Findabuddy'.$i];}else{ $workplaceArray['Findabuddy'] = "0";}
		if(isset($_POST['Findphysio'.$i])) { $workplaceArray['Findphysio'] = $_POST['Findphysio'.$i];}else{ $workplaceArray['Findphysio'] = "0";}
		if(isset($_POST['Name-of-workplace'.$i])) { $workplaceArray['Name-of-workplace'] = $_POST['Name-of-workplace'.$i];}
		if(isset($_POST['Workplace-setting'.$i])) { $workplaceArray['Workplace-setting'] = $_POST['Workplace-setting'.$i];}
		if(isset($_POST['WTreatmentarea'.$i])){ $workplaceArray['Treatmentarea'] = $_POST['WTreatmentarea'.$i]; }
		if(isset($_POST['WBuildingName'.$i])) { $workplaceArray['WBuildingName'] = $_POST['WBuildingName'.$i];}
		if(isset($_POST['WAddress_Line_1'.$i])) { $workplaceArray['Address_Line_1'] = $_POST['WAddress_Line_1'.$i];}
		if(isset($_POST['WAddress_Line_2'.$i])) { $workplaceArray['Address_Line_2'] = $_POST['WAddress_Line_2'.$i];}
		if(isset($_POST['Wcity'.$i])) { $workplaceArray['Wcity'] = $_POST['Wcity'.$i];}
		if(isset($_POST['Wpostcode'.$i])) { $workplaceArray['Wpostcode'] = $_POST['Wpostcode'.$i];}
		if(isset($_POST['Wstate'.$i])) { $workplaceArray['Wstate'] = $_POST['Wstate'.$i];}
		if(isset($_POST['Wcountry'.$i])) { $workplaceArray['Wcountry'] = $_POST['Wcountry'.$i];}
		if(isset($_POST['Wemail'.$i])) { $workplaceArray['Wemail'] = $_POST['Wemail'.$i];}
		if(isset($_POST['Wwebaddress'.$i])) { $workplaceArray['Wwebaddress'] = $_POST['Wwebaddress'.$i];}
		if(isset($_POST['Wphone'.$i])) { $workplaceArray['Wphone'] = $_POST['Wphone'.$i];}
		if(isset($_POST['Additionallanguage'.$i])) { $workplaceArray['Additionallanguage'] = $_POST['Additionallanguage'.$i];}
		if(isset($_POST['Electronic-claiming'.$i])) { $workplaceArray['Electronic-claiming'] = $_POST['Electronic-claiming'.$i];}
		if(isset($_POST['Hicaps'.$i])) { $workplaceArray['Hicaps'] = $_POST['Hicaps'.$i];}
		if(isset($_POST['Healthpoint'.$i])) { $workplaceArray['Healthpoint'] = $_POST['Healthpoint'.$i];}
		if(isset($_POST['Departmentva'.$i])) { $workplaceArray['Departmentva'] = $_POST['Departmentva'.$i];}
		if(isset($_POST['Workerscompensation'.$i])) { $workplaceArray['Workerscompensation'] = $_POST['Workerscompensation'.$i];}
		if(isset($_POST['Motora'.$i])) { $workplaceArray['Motora'] = $_POST['Motora'.$i];}
		if(isset($_POST['Medicare'.$i])) { $workplaceArray['Medicare'] = $_POST['Medicare'.$i];}
		if(isset($_POST['Homehospital'.$i])) { $workplaceArray['Homehospital'] = $_POST['Homehospital'.$i];}
		if(isset($_POST['MobilePhysio'.$i])) { $workplaceArray['MobilePhysio'] = $_POST['MobilePhysio'.$i];}
		if(isset($_POST['Number-worked-hours'.$i])) { $workplaceArray['Number-worked-hours'] = $_POST['Number-worked-hours'.$i];}
		if(isset($_POST['interest-area'.$i])) { $workplaceArray['Interest-area'] = $_POST['interest-area'.$i];}
		array_push($postData, $workplaceArray);
	}

	}
	if(isset($_POST['Udegree'])){ $postData['Udegree'] = $_POST['Udegree']; }
	if(isset($_POST['Undergraduate-university-name'])){ $postData['Undergraduate-university-name'] = $_POST['Undergraduate-university-name']; }
	if(isset($_POST['Undergraduate-university-name-other']) && $_POST['Undergraduate-university-name-other']!=""){$postData['Undergraduate-university-name'] = $_POST['Undergraduate-university-name-other'];}
	if(isset($_POST['Ugraduate-country'])){ $postData['Ugraduate-country'] = $_POST['Ugraduate-country']; }
	if(isset($_POST['Ugraduate-year-attained'])){ $postData['Ugraduate-year-attained'] = $_POST['Ugraduate-year-attained']; }
	if(isset($_POST['Pdegree'])){ $postData['Pdegree'] = $_POST['Pdegree']; }
	if(isset($_POST['Postgraduate-university-name'])){ $postData['Postgraduate-university-name'] = $_POST['Postgraduate-university-name']; }
	if(isset($_POST['Postgraduate-university-name-other']) && $_POST['Undergraduate-university-name-other']!=""){ $postData['Postgraduate-university-name'] = $_POST['Postgraduate-university-name-other']; }
	if(isset($_POST['Pgraduate-country'])){ $postData['Pgraduate-country'] = $_POST['Pgraduate-country']; }
	if(isset($_POST['Pgraduate-year-attained'])){ $postData['Pgraduate-year-attained'] = $_POST['Pgraduate-year-attained']; }
	if(isset($_POST['addtionalNumber'])){
	$n =  $_POST['addtionalNumber'];
	$qArray = array();
	for($j=0; $j<$n; $j++){
		if(isset($_POST['Additional-qualifications'.$j])) { 
		array_push($qArray, $_POST['Additional-qualifications'.$j]);
		}			
	}
	$postData['Additional-qualifications'] = $qArray;
	}
    // 2.2.4 - Dashboard - Get member detail
	// Send - 
	// UserID 
	// Response - UserID & detail data
	GetAptifyData("5", $postData);
	unset($_SESSION["Regional-group"]);
	/*General function: save data to APA shopping cart database;*/
	/*Parameters: $userID, $productID,$type;*/
	/*save product data including membership type product, national group product, fellowship & PRF product*/
	function createShoppingCart($userID, $productID,$type){
	$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config'); 
	try {
		$shoppingcartUpdate= $dbt->prepare('INSERT INTO shopping_cart (userID, productID, type) VALUES (:userID, :productID, :type)');
		$shoppingcartUpdate->bindValue(':userID', $userID);
		$shoppingcartUpdate->bindValue(':productID', $productID);
		$shoppingcartUpdate->bindValue(':type', $type);
		$shoppingcartUpdate->execute();	
		$shoppingcartUpdate = null;
	   
	}
	catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
	}
	}
	$userID = $postData['Memberid'];

	$products = array();

	$productID = $postData['MemberType'];
	createShoppingCart($userID, $productID,$type="membership");
	foreach($postData['Nationalgp'] as $key=>$value){
		array_push($products,$value);
	}
	 /*  there is a question for those two kinds of subscription product, need to know how Aptify organise combination products for "sports and mus"*/
	if(isset($_POST['ngmusculo']) && $_POST['ngmusculo'] =="1"){ array_push($products,"Intouch"); }
	if(isset($_POST['ngsports']) && $_POST['ngsports'] =="1" ) { array_push($products,"SPMagzine"); }
	if(isset($_POST['fap0']) && $_POST['fap0'] =="1" ) { array_push($products,"fap"); }
	$type = "NG";
	foreach($products as $key=>$value){
		$productID = $value;
		createShoppingCart($userID, $productID,$type);
	}
}   
?> 

<?php 
// 2.2.4 - Dashboard - Get member detail
// Send - 
// UserID 
// Response - UserID & detail data
$details = GetAptifyData("4", "UserID");// #_SESSION["UserID"];
if (!empty($details['Regional-group'])) { $_SESSION['Regional-group'] = $details['Regional-group'];}
?>
<form id="your-detail-form" action="renewmymembership" method="POST">
	<input type="hidden" name="step1" value="1"/>
		<div class="down1" <?php if(isset($_POST['step1']) || isset($_POST['step2']) || isset($_POST['stepAdd']))echo 'style="display:none;"'; else { echo 'style="display:block;"';}?>>
		    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding ">
				<div class="row">
					<div class="col-lg-3">
						<label for="prefix">Prefix<span class="tipstyle">*</span></label>
						<select class="form-control" id="Prefix" name="Prefix">
						    <option value="" <?php if (empty($details['Prefix'])) echo "selected='selected'";?> selected disabled>Prefix</option>
						    <option value="Prof" <?php if ($details['Prefix'] == "Prof") echo "selected='selected'";?>>Prof</option>
						    <option value="Dr" <?php if ($details['Prefix'] == "Dr") echo "selected='selected'";?>>Dr</option>
						    <option value="Mr" <?php if ($details['Prefix'] == "Mr") echo "selected='selected'";?>>Mr</option>
						    <option value="Mrs" <?php if ($details['Prefix'] == "Mrs") echo "selected='selected'";?>>Mrs</option>
						    <option value="Miss" <?php if ($details['Prefix'] == "Miss") echo "selected='selected'";?>>Miss</option>
						    <option value="Ms" <?php if ($details['Prefix'] == "Ms") echo "selected='selected'";?>>Ms</option>
						</select>
					</div>
					<div class="col-lg-3">
					   <label for="">First name<span class="tipstyle">*</span></label>
					   <input type="text" class="form-control"  name="Firstname" <?php if (empty($details['Firstname'])) {echo "placeholder='First name'";}   else{ echo 'value="'.$details['Firstname'].'"'; }?>>
					</div>
					<div class="col-lg-3">
					   <label for="">preferred name</label>
					   <input type="text" class="form-control"  name="Preferred-name" <?php if (empty($details['Preferred-name'])) {echo "placeholder='Preferred name'";}   else{ echo 'value="'.$details['Preferred-name'].'"'; }?>>
					</div>
					<div class="col-lg-3">
					   <label for="">Middle name</label>
					   <input type="text" class="form-control" name="Middle-name" <?php if (empty($details['Middle-name'])) {echo "placeholder='Middle name'";}   else{ echo 'value="'.$details['Middle-name'].'"'; }?>>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<label for="">Maiden name</label>
					   <input type="text" class="form-control" name="Maiden-name" <?php if (empty($details['Maiden-name'])) {echo "placeholder='Maiden name'";}   else{ echo 'value="'.$details['Maiden-name'].'"'; }?>>
					</div>
					<div class="col-lg-6">
					   <label for="">Last name<span class="tipstyle">*</span></label>
					   <input type="text" class="form-control" name="Lastname" <?php if (empty($details['Lastname'])) {echo "placeholder='Last name'";}   else{ echo 'value="'.$details['Lastname'].'"'; }?>>
					</div>
				</div>
			    <div class="row">
					<div class="col-lg-4">
					    <label for="">Birth Date<span class="tipstyle">*</span></label>
					    <input type="date" class="form-control" name="Birth" <?php if (empty($details['Birth'])) {echo "placeholder='DOB'";}   else{ echo 'value="'.$details['Birth'].'"'; }?>>
					</div>
					<div class="col-lg-3 col-lg-offset-1">
					    <label for="">Gender<span class="tipstyle">*</span></label>
					    <select class="form-control" id="Gender" name="Gender">
							<option value="" <?php if (empty($details['Gender'])) echo "selected='selected'";?> disabled> Gender </option>
							<option value="Male" <?php if ($details['Gender'] == "Male") echo "selected='selected'";?>>Male</option>
							<option value="Female" <?php if ($details['Gender'] == "Female") echo "selected='selected'";?>>Female</option>
							<option value="other" <?php if ($details['Gender'] == "Other") echo "selected='selected'";?>>I’d prefer not to say</option>
					   </select>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-2">
					   <label for="">Country code</label>
					   <input type="text" class="form-control" name="country-code" <?php if (empty($details['Home-phone-number'])) {echo "placeholder='Country Code'";}   else{ echo 'value="'.$details['Home-phone-number'][0].'"'; }?>  pattern="[0-9]{10}">
					</div>
					<div class="col-lg-2">
					   <label for="">Area code</label>
					   <input type="text" class="form-control" name="area-code" <?php if (empty($details['Home-phone-number'])) {echo "placeholder='Area code'";}   else{ echo 'value="'.$details['Home-phone-number'][1].'"'; }?>  pattern="[0-9]{10}">
					</div>
					<div class="col-lg-4">
					   <label for="">Phone number</label>
					   <input type="text" class="form-control" name="phone-number" <?php if (empty($details['Home-phone-number'])) {echo "placeholder='Phone number'";}   else{ echo 'value="'.$details['Home-phone-number'][2].'"'; }?>  pattern="[0-9]{10}">
					</div>
					<div class="col-lg-4">
					   <label for="">Mobile number</label>
					   <input type="text" class="form-control" name="Mobile-number" <?php if (empty($details['Mobile-number'])) {echo "placeholder='Mobile:0456089756'";}   else{ echo 'value="'.$details['Mobile-number'].'"'; }?> pattern="[0-9]{9}">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-9">
					   Aboriginal and Torres Strait Islander origin<span class="tipstyle">*</span>
					</div>
					<div class="col-lg-3">
					   <select class="form-control" id="Aboriginal" name="Aboriginal">
						  <option value="No" <?php if ($details['Aboriginal'] == "No") echo "selected='selected'";?>>No</option>
						  <option value="AB" <?php if ($details['Aboriginal'] == "AB") echo "selected='selected'";?>>Yes, Aboriginal </option>
						  <option value="TSI" <?php if ($details['Aboriginal'] == "TSI") echo "selected='selected'";?>>Yes, Torres Strait Islander </option>
						  <option value="BOTH" <?php if ($details['Aboriginal'] == "BOTH") echo "selected='selected'";?>>Yes, both Aboriginal and Torres Strait Islander</option>
					   </select>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">Residential address:</div>
				</div>
				<div class="row">
					<div class="col-lg-4">
					   <label for="">Building name</label>
					   <input type="text" class="form-control"  name="BuildingName" <?php if (empty($details['BuildingName'])) {echo "placeholder='Building Name'";}   else{ echo 'value="'.$details['BuildingName'].'"'; }?>>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4">
						<label for="">Address 1<span class="tipstyle">*</span></label>
						<input type="text" class="form-control"  name="Address_Line_1" id="Address_Line_1" <?php if (empty($details['Address_Line_1'])) {echo "placeholder='Address 1'";}   else{ echo 'value="'.$details['Address_Line_1'].'"'; }?>>
					</div>
					<div class="col-lg-6 col-lg-offset-2">
					   <label for="">PO box</label>
					   <input type="text" class="form-control" name="Pobox" <?php if (empty($details['Pobox'])) {echo "placeholder='PO box'";}   else{ echo 'value="'.$details['Pobox'].'"'; }?>>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<label for="">Address 2<span class="tipstyle">*</span></label>
						<input type="text" class="form-control" name="Address_Line_2" id="Address_Line_2" <?php if (empty($details['Address_Line_2'])) {echo "placeholder='Address 2'";}   else{ echo 'value="'.$details['Address_Line_2'].'"'; }?>>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
					   <label for="">City or town<span class="tipstyle">*</span></label>
					   <input type="text" class="form-control" name="Suburb" id="Suburb" <?php if (empty($details['Suburb'])) {echo "placeholder='City or town'";}   else{ echo 'value="'.$details['Suburb'].'"'; }?>>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3">
					   <label for="">Postcode<span class="tipstyle">*</span></label>
					   <input type="text" class="form-control" name="Postcode" id="Postcode" <?php if (empty($details['Postcode'])) {echo "placeholder='Postcode'";}   else{ echo 'value="'.$details['Postcode'].'"'; }?>>
					</div>
					<div class="col-lg-3">
					   <label for="">State<span class="tipstyle">*</span></label>
					   <select class="form-control" id="State" name="State">
							<option value="" <?php if (empty($details['State'])) echo "selected='selected'";?> disabled> State </option>
							<option value="ACT" <?php if ($details['State'] == "ACT") echo "selected='selected'";?>> ACT </option>
							<option value="NSW" <?php if ($details['State'] == "NSW") echo "selected='selected'";?>> NSW </option>
							<option value="SA" <?php if ($details['State'] == "SA") echo "selected='selected'";?>> SA </option>
							<option value="TAS" <?php if ($details['State'] == "TAS") echo "selected='selected'";?>> TAS </option>
							<option value="VIC" <?php if ($details['State'] == "VIC") echo "selected='selected'";?>> VIC </option>
							<option value="QLD" <?php if ($details['State'] == "QLD") echo "selected='selected'";?>> QLD </option>
							<option value="NT" <?php if ($details['State'] == "NT") echo "selected='selected'";?>> NT </option>
							<option value="WA" <?php if ($details['State'] == "WA") echo "selected='selected'";?>> WA </option>
							<option value="N/A" <?php if ($details['State'] == "N/A") echo "selected='selected'";?>> I live overseas </option>
					   </select>
					</div>
					<div class="col-lg-6">
					   <label for="">Country<span class="tipstyle">*</span></label>
					   <input type="text" class="form-control" name="Country" id="Country" <?php if (empty($details['Country'])) {echo "placeholder='Country'";}   else{ echo 'value="'.$details['Country'].'"'; }?>>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12"><label for="Shipping-address-join"><strong>Billing address:(Sames as Above address)</strong></label><input type="checkbox" id="Shipping-address-join" name="Shipping-address-join" value="1" checked></div>
				</div>
			<div class="row shipping" id="shippingAddress">
				<div class="row">
					<div class="col-lg-4">
					   <label for="">Building name</label>
					   <input type="text" class="form-control"  name="Billing-BuildingName" <?php if (empty($details['Billing-BuildingName'])) {echo "placeholder='Billing Building Name'";}   else{ echo 'value="'.$details['Billing-BuildingName'].'"'; }?>>
					</div>
				</div>
					<div class="col-lg-4">
					   <label for="">Address 1<span class="tipstyle">*</span></label>
					   <input type="text" class="form-control"  name="Billing-Address_Line_1" id="Billing-Address_Line_1" <?php if (empty($details['Billing-Address_Line_1'])) {echo "placeholder='Billing Address 1'";}   else{ echo 'value="'.$details['Billing-Address_Line_1'].'"'; }?>>
					</div>
					<div class="col-lg-6 col-lg-offset-2">
					   <label for="">PO box</label>
					   <input type="text" class="form-control" name="Billing-PObox" <?php if (empty($details['Billing-PObox'])) {echo "placeholder='PO box'";}   else{ echo 'value="'.$details['Billing-PObox'].'"'; }?>>
					</div>
					<div class="col-lg-12">
					   <label for="">Address 2<span class="tipstyle">*</span></label>
					   <input type="text" class="form-control" name="Billing-Address_Line_2" id="Billing-Address_Line_2" <?php if (empty($details['Billing-Address_Line_2'])) {echo "placeholder='Billing Address 2'";}   else{ echo 'value="'.$details['Billing-Address_Line_2'].'"'; }?>>
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
					   <select class="form-control" name="Shipping-state" id="Shipping-state">
						  <option value=""  <?php if (empty($details['Billing-State'])) echo "selected='selected'";?> disabled> State </option>
						  <option value="ACT" <?php if ($details['Billing-State'] == "ACT") echo "selected='selected'";?>> ACT </option>
						  <option value="NSW" <?php if ($details['Billing-State'] == "NSW") echo "selected='selected'";?>> NSW </option>
						  <option value="SA" <?php if ($details['Billing-State'] == "SA") echo "selected='selected'";?>> SA </option>
						  <option value="TAS" <?php if ($details['Billing-State'] == "TAS") echo "selected='selected'";?>> TAS </option>
						  <option value="VIC" <?php if ($details['Billing-State'] == "VIC") echo "selected='selected'";?>> VIC </option>
						  <option value="QLD" <?php if ($details['Billing-State'] == "QLD") echo "selected='selected'";?>> QLD </option>
						  <option value="NT" <?php if ($details['Billing-State'] == "NT") echo "selected='selected'";?>> NT </option>
						  <option value="WA" <?php if ($details['Billing-State'] == "WA") echo "selected='selected'";?>> WA </option>
						  <option value="N/A" <?php if ($details['Billing-State'] == "N/A") echo "selected='selected'";?>> I live overseas </option>
					   </select>
					</div>
					<div class="col-lg-6">
					   <label for="">Country<span class="tipstyle">*</span></label>
					   <input type="text" class="form-control" name="Billing-Country" id="Billing-Country" <?php if (empty($details['Billing-Country'])) {echo "placeholder='Billing Country'";}   else{ echo 'value="'.$details['Billing-Country'].'"'; }?>>
					</div>
			</div>
			<!---Hidden mailing address and shipping address Start from here-->
				<input type="hidden" name="Shipping-BuildingName" value="<?php echo $details['Shipping-BuildingName'];?>">
				<input type="hidden" name="Shipping-Address_Line_1" value="<?php echo $details['Shipping-Address_Line_1'];?>">
				<input type="hidden" name="Shipping-Address_Line_2" value="<?php echo $details['Shipping-Address_Line_2'];?>">
				<input type="hidden" name="Shipping-PObox" value="<?php echo $details['Shipping-PObox'];?>">
				<input type="hidden" name="Shipping-city-town" value="<?php echo $details['Shipping-city-town'];?>">
				<input type="hidden" name="Shipping-postcode" value="<?php echo $details['Shipping-postcode'];?>">
				<input type="hidden" name="Shipping-state" value="<?php echo $details['Shipping-state'];?>">
				<input type="hidden" name="Shipping-country" value="<?php echo $details['Shipping-country'];?>">
				<input type="hidden" name="Mailing-BuildingName" value="<?php echo $details['Mailing-BuildingName'];?>">
				<input type="hidden" name="Mailing-Address_Line_1" value="<?php echo $details['Mailing-Address_Line_1'];?>">
				<input type="hidden" name="Mailing-Address_Line_2" value="<?php echo $details['Mailing-Address_Line_2'];?>">
				<input type="hidden" name="Mailing-PObox" value="<?php echo $details['Mailing-PObox'];?>">
				<input type="hidden" name="Mailing-city-town" value="<?php echo $details['Mailing-city-town'];?>">
				<input type="hidden" name="Mailing-postcode" value="<?php echo $details['Mailing-postcode'];?>">
				<input type="hidden" name="Mailing-state" value="<?php echo $details['Mailing-state'];?>">
				<input type="hidden" name="Mailing-country" value="<?php echo $details['Mailing-country'];?>">
			<!---Hidden mailing address and shipping address End here-->
		    </div>
		  <!--<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 form-right">
			 <div class="row form-image">
				<div class="col-lg-12">
				   Upload/change image
				</div>
			 </div>
									   
		  </div>-->
		    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">   <a class="join-details-button1"><span class="dashboard-button-name">Next</span></a></div>
		</div>
		<div class="down2" style="display:none;" >
			<div class="row">
				<div class="col-lg-6">
					<label for="">Member ID(Your email address)<span class="tipstyle">*</span></label>
					<input type="text" class="form-control" name="Memberid" <?php if (empty($details['Memberno'])) {echo "placeholder='Member no.'";}   else{ echo 'value="'.$details['Memberno'].'"';$_SESSION['userID'] = $details['Memberno'];}?> readonly>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<a href="changepassword" target="_self" style="color:white;">Change your password</a>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<label for="">Member Type<span class="tipstyle">*</span></label>
					<select class="form-control" id="MemberType" name="MemberType">
						<option value="" <?php if (empty($details['MemberType'])) echo "selected='selected'";?> disabled>memberType</option>
						<option value="FPI" <?php if ($details['MemberType'] == "FPI") echo "selected='selected'";?>>Full-time physiotherapist with insurance (more than 18 hours per week) </option>
						<option value="FPN" <?php if ($details['MemberType'] == "FPN") echo "selected='selected'";?>>Full-time physiotherapist no insurance (more than 18 hours per week) </option>
						<option value="FEPI" <?php if ($details['MemberType'] == "FEPI") echo "selected='selected'";?>>Full-time Employed Public Sector Physiotherapist (more than 18 hours per week) with insurance</option>
						<option value="FEPN" <?php if ($details['MemberType'] == "FEPN") echo "selected='selected'";?>>Full-time Employed Public Sector Physiotherapist (more than 18 hours per week) no insurance</option>
						<option value="PPI" <?php if ($details['MemberType'] == "PPI") echo "selected='selected'";?>>Part-time Physiotherapist (less than 18 hours per week) with insurance</option>
						<option value="PPN" <?php if ($details['MemberType'] == "PPN") echo "selected='selected'";?>>Part-time Physiotherapist (less than 18 hours per week) no insurance</option>
						<option value="PEP" <?php if ($details['MemberType'] == "PEP") echo "selected='selected'";?>>Part-time Employed Public Sector Physiotherapist (less than 18 hours per week) </option>
						<option value="MPU" <?php if ($details['MemberType'] == "MPU") echo "selected='selected'";?>>Maternity/Paternity/Unemployed (working for less than 6 months) </option>
						<option value="OV" <?php if ($details['MemberType'] == "OV") echo "selected='selected'";?>>Overseas for more than 6 months (must hold current registration with AHPRA) </option>
						<option value="PGS" <?php if ($details['MemberType'] == "PGS") echo "selected='selected'";?>>Post Graduate study and working less than 18 hours per week </option>
						<option value="NPP" <?php if ($details['MemberType'] == "NPP") echo "selected='selected'";?>>Non-Practising Physiotherapist registered as NPP with PhysioBA</option>
						<option value="AM" <?php if ($details['MemberType'] == "AM") echo "selected='selected'";?>>￼Associate Member (Australia) </option>
						<option value="GFY" <?php if ($details['MemberType'] == "GFY") echo "selected='selected'";?>>￼Graduate First Year </option>
						<option value="GSY" <?php if ($details['MemberType'] == "GSY") echo "selected='selected'";?>>￼Graduate Second Year</option>
						<option value="GTY" <?php if ($details['MemberType'] == "GTY") echo "selected='selected'";?>>￼Graduate Third Year</option>
						<option value="GFOY" <?php if ($details['MemberType'] == "GFOY") echo "selected='selected'";?>>￼Graduate Fourth Year</option>
						<option value="GFYE" <?php if ($details['MemberType'] == "GFYE") echo "selected='selected'";?>>Graduate First Year Employed Public Sector </option>
						<option value="GSYE" <?php if ($details['MemberType'] == "GSYE") echo "selected='selected'";?>>Graduate Second Year Employed Public Sector</option>
						<option value="GTYE" <?php if ($details['MemberType'] == "GTYE") echo "selected='selected'";?>>￼Graduate Third Year Employed Public Sector</option>
						<option value="GFOYE" <?php if ($details['MemberType'] == "GFOYE") echo "selected='selected'";?>>￼Graduate Fourth Year Employed Public Sector </option>
						<option value="SY" <?php if ($details['MemberType'] == "SY") echo "selected='selected'";?>>￼Student Year 1 - 4</option>
						<option value="PA" <?php if ($details['MemberType'] == "PA") echo "selected='selected'";?>>Physiotherapy Assistant</option>
						<option value="AMO" <?php if ($details['MemberType'] == "AMO") echo "selected='selected'";?>>Associate Member (Overseas)</option>
						<option value="AS" <?php if ($details['MemberType'] == "AS") echo "selected='selected'";?>>￼Affiliate subscription</option>
						<option value="RAN" <?php if ($details['MemberType'] == "RAN") echo "selected='selected'";?>>Retired and not working in any paid capacity</option>
						<option value="RW" <?php if ($details['MemberType'] == "RW") echo "selected='selected'";?>>Retired with 36 years membership and is over the age of 55 years (subject to office validation)</option>
					</select>
				</div>
			</div>
			<div class="row" id="ahpblock">
				<div class="col-lg-3">
					<label for="">AHPRA number</label>
					<input type="text" class="form-control" name="Ahpranumber"  <?php if (empty($details['Ahpranumber'])) {echo "placeholder='AHPRA number'";}   else{ echo 'value="'.$details['Ahpranumber'].'"'; }?>>
				</div>
				<div class="col-lg-6">
					<label for="">Your National group</label>
					<select class="chosen-select" id="Nationalgp" name="Nationalgp[]" multiple>
				<?php 
				// get national group from Aptify via webserice return Json data;
				// 2.2.19 - get national group
				// Send - 
				// Response - national group
				 $nationalGroups= GetAptifyData("19","request");
				?>

				<?php 
				 foreach($nationalGroups["NationalGroup"] as $lines) {
				   echo '<option value="'.$lines["NGid"].'"';
				   if (in_array( $lines["NGid"],$details['Nationalgp'])){ echo "selected='selected'"; } 
				   echo '> '.$lines["NGtitle"].' </option>';
				}

				?>
					</select>
				</div>
				<div class="col-lg-3 display-none" id="ngsports"><label for="ngsportsbox">Would you like to subscribe to the APA SportsPhysio magazine?</label><input type="checkbox" id="ngsportsbox" name="ngsports" value="0"></div>
				<div class="col-lg-3 display-none" id="ngmusculo"><label for="ngmusculobox">Would you like to subscribe to the APA InTouch magazine?</label><input type="checkbox" id="ngmusculobox" name="ngmusculo" value="0"></div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<label for="">What branch would you like to join?<span class="tipstyle">*</span></label>
					<select class="form-control" id="Branch" name="Branch">
						<option value="" <?php if (empty($details['Branch'])) echo "selected='selected'";?> disabled>What branch would you like to join?</option>
						<option value="ACT" <?php if ($details['Branch'] == "ACT") echo "selected='selected'";?>>ACT</option>
						<option value="NSW" <?php if ($details['Branch'] == "NSW") echo "selected='selected'";?>>NSW</option>
						<option value="QLD" <?php if ($details['Branch'] == "QLD") echo "selected='selected'";?>>QLD</option>
						<option value="SA" <?php if ($details['Branch'] == "SA") echo "selected='selected'";?>>SA</option>
						<option value="TAS" <?php if ($details['Branch'] == "TAS") echo "selected='selected'";?>>TAS</option>
						<option value="VIC" <?php if ($details['Branch'] == "VIC") echo "selected='selected'";?>>VIC</option>
						<option value="WA" <?php if ($details['Branch'] == "WA") echo "selected='selected'";?>>WA</option>
						<option value="N/A" <?php if ($details['Branch'] == "N/A") echo "selected='selected'";?>>I live overseas</option>
					</select>
				</div>
			</div>
			<div class="row"> 
				<div class="col-lg-3">
				Your special interest area:
				</div>
				<div class="col-lg-9">
					<select class="chosen-select" id="interest-area" name="SpecialInterest[]" multiple  tabindex="-1" data-placeholder="Choose interest area...">
					  <?php 
					    // 2.2.37 - get interest area list
						// Send - 
						// Response - interest area list
						 $interestAreas= GetAptifyData("37","request");
						 $_SESSION["interestAreas"] = $interestAreas;
					  ?>
								   
					   <?php 
						 foreach($interestAreas['InterestAreas']  as $lines){
						
							echo '<option value="'.$lines["ListCode"].'"';
						   if (in_array( $lines["ListCode"],$details['SpecialInterest'])){ echo "selected='selected'"; } 
						   echo '> '.$lines["ListName"].' </option>'; 
						 }
					   
					   ?>
					  
					</select>
				</div>
			</div>
				<div class="row"> 
				<div class="col-lg-3">
				Your treatment area:
				</div>
			</div>
			<div class="row"> 
				<div class="col-lg-6">
					<select class="chosen-select" id="treatment-area" name="Treatmentarea[]" multiple  tabindex="-1" data-placeholder="Choose treatment area...">
					<?php 
					// get interest area from Aptify via webserice return Json data;
					$interestAreas= GetAptifyData("37","request");
					$_SESSION["interestAreas"] = $interestAreas;
					?>
					<?php 
					foreach($interestAreas['InterestAreas']  as $lines){
						echo '<option value="'.$lines["ListCode"].'"';
						if (in_array( $lines["ListCode"],$details['Treatmentarea'])){ echo "selected='selected'"; } 
						echo '> '.$lines["ListName"].' </option>'; 
					}
					?>
					</select>
				</div>
			</div>
			<div class="row">
				<input type="hidden" name="fapnum" value="<?php echo sizeof($details['Specialty']);?>">
				<?php if(!empty($details['Specialty'])){
					// 2.2.37 - get fellowship product list
					// Send - 
					// Response - fellowship product list
					$fp = GetAptifyData("21","request"); 
					foreach($fp["Fellowship"] as $key=>$value) {
					   echo '<label for="fap'.$key.'">'.$fp["Fellowship"][$key]["FPtitle"].'</label>';
					   echo '<input type="checkbox" id="fap'.$key.'" name="fap'.$key.'" value="0">';
					}
					}
				?>
			<!-- 
			<label for="fap"></label>
			<input type="checkbox" id="fap" name="fap" checked>
			-->
			</div>
			<div class="row">
				<div class="col-lg-3">
					What is your favourite languages?<br/>
				</div>
				<div class="col-lg-3">
					<select class="chosen-select" id="MAdditionallanguage" name="MAdditionallanguage" multiple  tabindex="-1" data-placeholder="Choose your favourite language...">
						<option value="NONE" <?php if (empty($details['Additionallanguage'])) echo "selected='selected'";?> disabled>no</option>
						<option value="AF"  <?php if (in_array( "AF",$details['Additionallanguage'])) echo "selected='selected'";?>> Afrikaans </option>
						<option value="AR" <?php if (in_array("AR",$details['Additionallanguage'])) echo "selected='selected'";?>> Arabic </option>
						<option value="BO" <?php if (in_array( "BO",$details['Additionallanguage'])) echo "selected='selected'";?>> Bosnian </option>
						<option value="CA" <?php if (in_array( "CA",$details['Additionallanguage'])) echo "selected='selected'";?>> Cantonese </option>
						<option value="CHZ" <?php if (in_array( "CHZ",$details['Additionallanguage'])) echo "selected='selected'";?>> Chzech </option>
						<option value="CR" <?php if (in_array( "CR",$details['Additionallanguage'])) echo "selected='selected'";?>> Croation </option>
						<option value="DA" <?php if (in_array( "DA",$details['Additionallanguage'])) echo "selected='selected'";?>> Danish </option>
						<option value="DU" <?php if (in_array( "DU",$details['Additionallanguage'])) echo "selected='selected'";?>> Dutch </option>
						<option value="EG" <?php if (in_array( "EG",$details['Additionallanguage'])) echo "selected='selected'";?>> Egyptian </option>
						<option value="ENG" <?php if (in_array( "ENG",$details['Additionallanguage'])) echo "selected='selected'";?>> English </option>
						<option value="FL" <?php if (in_array( "FL",$details['Additionallanguage'])) echo "selected='selected'";?>> Filipino </option>
						<option value="FR" <?php if (in_array( "FR",$details['Additionallanguage'])) echo "selected='selected'";?>> French </option>
						<option value="GE" <?php if (in_array( "GE",$details['Additionallanguage'])) echo "selected='selected'";?>> German </option>
						<option value="GR" <?php if (in_array( "GR",$details['Additionallanguage'])) echo "selected='selected'";?>> Greek </option>
						<option value="HE" <?php if (in_array( "HE",$details['Additionallanguage'])) echo "selected='selected'";?>> Hebrew </option>
						<option value="HI" <?php if (in_array( "HI",$details['Additionallanguage'])) echo "selected='selected'";?>> Hindi </option>
						<option value="HO" <?php if (in_array( "HO",$details['Additionallanguage'])) echo "selected='selected'";?>> Hokkien </option>
						<option value="HU" <?php if (in_array( "HU",$details['Additionallanguage'])) echo "selected='selected'";?>> Hungarian </option>
						<option value="IND" <?php if (in_array( "IND",$details['Additionallanguage'])) echo "selected='selected'";?>> Indonesian </option>
						<option value="IT" <?php if (in_array( "IT",$details['Additionallanguage'])) echo "selected='selected'";?>> Italian </option>
						<option value="JP" <?php if (in_array( "JP",$details['Additionallanguage'])) echo "selected='selected'";?>> Japanese </option>
						<option value="KO" <?php if (in_array( "KO",$details['Additionallanguage'])) echo "selected='selected'";?>> Korean </option>
						<option value="LAT" <?php if (in_array( "LAT",$details['Additionallanguage'])) echo "selected='selected'";?>> Latvian </option>
						<option value="LE" <?php if (in_array( "LE",$details['Additionallanguage'])) echo "selected='selected'";?>> Lebanese </option>
						<option value="M" <?php if (in_array( "M",$details['Additionallanguage'])) echo "selected='selected'";?>> Marathi </option>
						<option value="MA" <?php if (in_array( "MA",$details['Additionallanguage'])) echo "selected='selected'";?>> Macedonian </option>
						<option value="MALT" <?php if (in_array( "MALT",$details['Additionallanguage'])) echo "selected='selected'";?>> Maltese </option>
						<option value="MAN" <?php if (in_array( "MAN",$details['Additionallanguage'])) echo "selected='selected'";?>> Mandarin </option>
						<option value="MAV" <?php if (in_array( "MAV",$details['Additionallanguage'])) echo "selected='selected'";?>> Mavathi </option>
						<option value="ML" <?php if (in_array( "ML",$details['Additionallanguage'])) echo "selected='selected'";?>> Malay </option>
						<option value="NOR" <?php if (in_array( "NOR",$details['Additionallanguage'])) echo "selected='selected'";?>> Norwegian </option>
						<option value="POL" <?php if (in_array( "POL",$details['Additionallanguage'])) echo "selected='selected'";?>> Polish </option>
						<option value="POR" <?php if (in_array( "POR",$details['Additionallanguage'])) echo "selected='selected'";?>> Portuguese </option>
						<option value="PU" <?php if (in_array( "PU",$details['Additionallanguage'])) echo "selected='selected'";?>> Punjabi </option>
						<option value="RU" <?php if (in_array( "RU",$details['Additionallanguage'])) echo "selected='selected'";?>> Russian </option>
						<option value="S" <?php if (in_array( "S",$details['Additionallanguage'])) echo "selected='selected'";?>> Slovak </option>
						<option value="SERB" <?php if (in_array( "SERB",$details['Additionallanguage'])) echo "selected='selected'";?>> Serbian </option>
						<option value="SL" <?php if (in_array( "SL",$details['Additionallanguage'])) echo "selected='selected'";?>> Sign Language </option>
						<option value="SP" <?php if (in_array( "SP",$details['Additionallanguage'])) echo "selected='selected'";?>> Spanish </option>
						<option value="SW" <?php if (in_array( "SW",$details['Additionallanguage'])) echo "selected='selected'";?>> Swedish </option>
						<option value="SWI" <?php if (in_array( "SWI",$details['Additionallanguage'])) echo "selected='selected'";?>> Swiss </option>
						<option value="TA" <?php if (in_array( "TA",$details['Additionallanguage'])) echo "selected='selected'";?>> Tamil </option>
						<option value="TAW" <?php if (in_array( "TAW",$details['Additionallanguage'])) echo "selected='selected'";?>> Taiwanese </option>
						<option value="TE" <?php if (in_array( "TE",$details['Additionallanguage'])) echo "selected='selected'";?>> Teo-Chew </option>
						<option value="TEL" <?php if (in_array( "TEL",$details['Additionallanguage'])) echo "selected='selected'";?>> Telugu </option>
						<option value="TH" <?php if (in_array( "TH",$details['Additionallanguage'])) echo "selected='selected'";?>> Thai </option>
						<option value="TURK" <?php if (in_array( "TURK",$details['Additionallanguage'])) echo "selected='selected'";?>> Turkish </option>
						<option value="UK" <?php if (in_array( "UK",$details['Additionallanguage'])) echo "selected='selected'";?>> Ukrainian </option>
						<option value="UR" <?php if (in_array( "UR",$details['Additionallanguage'])) echo "selected='selected'";?>> Urdu </option>
						<option value="VI" <?php if (in_array( "VI",$details['Additionallanguage'])) echo "selected='selected'";?>> Vietnamese </option>
						<option value="YI" <?php if (in_array( "YI",$details['Additionallanguage'])) echo "selected='selected'";?>> Yiddish </option>
						<option value="YU" <?php if (in_array( "YU",$details['Additionallanguage'])) echo "selected='selected'";?>> Yugoslav </option>
					</select>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">   <a class="join-details-button2"><span class="dashboard-button-name">Next</span></a><a class="your-details-prevbutton2"><span class="dashboard-button-name">Last</span></a></div>
		</div>
        <div id="wpnumber"><?php  $wpnumber =  sizeof($details['Workplaces'])-1; echo  $wpnumber; ?></div>
        <input type="hidden" name="wpnumber" value="<?php  $wpnumber =  sizeof($details['Workplaces'])-1; echo  $wpnumber; ?>"/>
<script type="text/javascript">
jQuery(document).ready(function($) {
	$(".chosen-select").chosen({width: "100%"});
	$('#workplace').click(function(){
		$('#dashboard-right-content').addClass("autoscroll");
	});
	$('.add-workplace-join').click(function(){
		var number = Number($('#wpnumber').text());
		var i = Number(number +1);
		var j = Number(number +2);
		$('div[class="down3"] #tabmenu').append( '<li id="workplaceli'+ i + '"><a data-toggle="tab" href="#workplace'+ i + '">Workplace'+ i+'</a><span class="deletewp'+ i + '" style=" float: right; color: red; margin-right: 55%;">x</span></li>' );
		$('div[id="workplaceblocks"]').append('<div id="workplace'+ i +'" class="tab-pane fade"></div>');
		$('#wpnumber').text(i);
		$('input[name=wpnumber]').val(j);
		var sessionvariable = '<?php echo json_encode($_SESSION["workplaceSettings"]);?>';
		var sessionInterest = '<?php echo json_encode($_SESSION["interestAreas"]);?>';
		$("#workplace"+ i ).load("sites/all/themes/evolve/commonFile/workplace.php", {"count":i,"sessionWorkplaceSetting":sessionvariable, "sessioninterestAreas":sessionInterest});
		$(".chosen-select").chosen({width: "100%"});
	});
	$("a[href^=#workplace]").live( "click", function(){ $(".chosen-select").chosen({width: "100%"});});
	$("[class^=deletewp]").live( "click", function(){
		  var x = $(this).attr("class").replace('deletewp', '');
		  $("#workplaceli"+ x).remove();
		  $("#workplace"+ x).remove();
		   $(".deletewp"+ x).remove();
	});
});
</script>
		<div class="down3" style="display:none;">
			<div class="row">
				<div class="col-lg-12"> <label for="Findpublicbuddy"><strong>NOTE:</strong>Please list my details in the public (visbile to other health professionals)</label>
					<input type="checkbox" name="Findpublicbuddy" id="Findpublicbuddy" value="<?php  echo $details['Findpublicbuddy'];?>" <?php if($details['Findpublicbuddy']==1){echo "checked";} ?>>
				</div>
			</div>
		<ul class="nav nav-tabs" id="tabmenu">
		<?php foreach( $details['Workplaces'] as $key => $value ):  ?>
		<li <?php if($key=='Workplace0') echo 'class ="active" ';?>><a data-toggle="tab" href="#workplace<?php echo $key;?>"><?php echo "Workplace".$key;?></a></li>
		<?php endforeach ?> 
		</ul>
			<div id="workplaceblocks">
			<?php foreach( $details['Workplaces'] as $key => $value ):  ?>
				<div id="workplace<?php echo $key;?>" class='tab-pane fade <?php if($key=='Workplace0') echo "in active ";?>'> 
				<div class="row">
					<div class="col-lg-6"> <label for="Findphysio<?php echo $key;?>"><strong>NOTE:</strong>This workplace is included in Find a Pyhsio.</label>
						<input type="checkbox" name="Findphysio<?php echo $key;?>" id="Findphysio<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Findphysio'];?>" >
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12"> <label for="Findabuddy<?php echo $key;?>"><strong>NOTE:</strong>Please list my details in the physio</label>
						<input type="checkbox" name="Findabuddy<?php echo $key;?>" id="Findabuddy<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Findabuddy'];?>" <?php if($details['Workplaces'][$key]['Findabuddy']==1){echo "checked";} ?>>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
					<label for="Name-of-workplace">Name of workplace</label>
					<input type="text" class="form-control" name="Name-of-workplace<?php echo $key;?>" id="Name-of-workplace<?php echo $key;?>" <?php if (empty($details['Workplaces'][$key]['Name-of-workplace'])) {echo "placeholder='Name of workplace'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Name-of-workplace'].'"'; }?>>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3">
					Workplace setting
					</div>
					<div class="col-lg-9">
						<select class="form-control" id="Workplace-setting<?php echo $key;?>" name="Workplace-setting0">
						<?php 
						// 2.2.36 - get workplace settings list
						// Send - 
						// Response - get workplace settings from Aptify via webserice return Json data;
						// stroe workplace settings into the session
						$workplaceSettings= GetAptifyData("36","request");
						$_SESSION["workplaceSettings"] = $workplaceSettings;
						?>
						<?php 
						foreach($workplaceSettings['WorkplaceSettings']  as $lines){
						   echo '<option value="'.$lines["code"].'"';
						   if ($details['Workplaces'][$key]['Workplace-setting'] == $lines["code"]){ echo "selected='selected'"; } 
						   echo '> '.$lines["name"].' </option>';
						}
						?>
						</select>
					</div>
				</div>
				<div class="row"> 
						<div class="col-lg-3">
						Workplace treatment area:
						</div>
				</div>
				<div class="row"> 
					<div class="col-lg-6">
						<select class="chosen-select" id="WTreatmentarea<?php echo $key;?>" name="WTreatmentarea<?php echo $key;?>[]" multiple  tabindex="-1" data-placeholder="Choose treatment area...">
						<?php 
						// get interest area from Aptify via webserice return Json data;
						$interestAreas= GetAptifyData("37","request");
						$_SESSION["interestAreas"] = $interestAreas;
						?>
						<?php 
						foreach($interestAreas['InterestAreas']  as $lines){
							echo '<option value="'.$lines["ListCode"].'"';
							if (in_array( $lines["ListCode"],$details['Workplaces'][$key]['Treatmentarea'])){ echo "selected='selected'"; } 
							echo '> '.$lines["ListName"].' </option>'; 
						}
						?>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<label for="BuildingName">Building Name</label>
						<input type="text" class="form-control" name="WBuildingName<?php echo $key;?>" id="WBuildingName<?php echo $key;?>" <?php if (empty($details['Workplaces'][$key]['WBuildingName'])) {echo "placeholder='Building Name'";}   else{ echo 'value="'.$details['Workplaces'][$key]['WBuildingName'].'"'; }?>>
					</div>
					<div class="col-lg-2">
						<label for="WAddress_Line_1">Address line 1<span class="tipstyle">*</span></label>
						<input type="text" class="form-control" name="WAddress_Line_1<?php echo $key;?>" id="WAddress_Line_1<?php echo $key;?>" <?php if (empty($details['Workplaces'][$key]['Address_Line_1'])) {echo "placeholder='Address line 1'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Address_Line_1'].'"'; }?>>
					</div>
					<div class="col-lg-4">
						<label for="WAddress_Line_2">Address line 2</label>
						<input type="text" class="form-control" name="WAddress_Line_2<?php echo $key;?>" id="Wstreet<?php echo $key;?>" <?php if (empty($details['Workplaces'][$key]['Address_Line_2'])) {echo "placeholder='Address line 2'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Address_Line_2'].'"'; }?>>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3">
						<label for="Wcity">City/Town<span class="tipstyle">*</span></label>
						<input type="text" class="form-control" name="Wcity<?php echo $key;?>" id="Wcity<?php echo $key;?>"  <?php if (empty($details['Workplaces'][$key]['Wcity'])) {echo "placeholder='City or town'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Wcity'].'"'; }?>>
					</div>
					<div class="col-lg-3">
						<label for="Wpostcode">Postcode<span class="tipstyle">*</span></label>
						<input type="text" class="form-control" name="Wpostcode<?php echo $key;?>" id="Wpostcode<?php echo $key;?>"  <?php if (empty($details['Workplaces'][$key]['Wpostcode'])) {echo "placeholder='Postcode'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Wpostcode'].'"'; }?>>
					</div>
					<div class="col-lg-3">
						<label for="Wstate">State<span class="tipstyle">*</span></label>
						<select class="form-control" id="Wstate<?php echo $key;?>" name="Wstate<?php echo $key;?>">
							<option value="" <?php if (empty($details['Workplaces'][$key]['Wstate'])) echo "selected='selected'";?> disabled>State</option>
							<option value="ACT" <?php if ($details['Workplaces'][$key]['Wstate'] == "ACT") echo "selected='selected'";?>>ACT</option>
							<option value="NSW" <?php if ($details['Workplaces'][$key]['Wstate'] == "NSW") echo "selected='selected'";?>>NSW</option>
							<option value="QLD" <?php if ($details['Workplaces'][$key]['Wstate'] == "QLD") echo "selected='selected'";?>>QLD</option>
							<option value="SA" <?php if ($details['Workplaces'][$key]['Wstate'] == "SA") echo "selected='selected'";?>>SA</option>
							<option value="TAS" <?php if ($details['Workplaces'][$key]['Wstate'] == "TAS") echo "selected='selected'";?>>TAS</option>
							<option value="VIC" <?php if ($details['Workplaces'][$key]['Wstate'] == "VIC") echo "selected='selected'";?>>VIC</option>
							<option value="WA" <?php if ($details['Workplaces'][$key]['Wstate'] == "WA") echo "selected='selected'";?>>WA</option>
							<option value="N/A" <?php if ($details['Workplaces'][$key]['Wstate'] == "N/A") echo "selected='selected'";?>>I live overseas</option>
						</select>
					</div>
					<div class="col-lg-3">
						<label for="Wcountry">Country<span class="tipstyle">*</span></label>
						<input type="text" class="form-control" name="Wcountry<?php echo $key;?>" id="Wcountry<?php echo $key;?>" <?php if (empty($details['Workplaces'][$key]['Wcountry'])) {echo "placeholder='Country'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Wcountry'].'"'; }?>>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<label for="Wemail">Workplace email<span class="tipstyle">*</span></label>
						<input type="text" class="form-control" name="Wemail<?php echo $key;?>" id="Wemail<?php echo $key;?>"  <?php if (empty($details['Workplaces'][$key]['Wemail'])) {echo "placeholder='Workplace email'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Wemail'].'"'; }?>>
					</div>
					<div class="col-lg-3">
						<label for="Wwebaddress">Website<span class="tipstyle">*</span></label>
						<input type="text" class="form-control" name="Wwebaddress<?php echo $key;?>" id="Wwebaddress<?php echo $key;?>" <?php if (empty($details['Workplaces'][$key]['Wwebaddress'])) {echo "placeholder='Website'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Wwebaddress'].'"'; }?>>
					</div>
					<div class="col-lg-3">
						<label for="Wphone">Phone number<span class="tipstyle">*</span></label>
						<input type="text" class="form-control" name="Wphone<?php echo $key;?>" id="Wphone<?php echo $key;?>" <?php if (empty($details['Workplaces'][$key]['Wphone'])) {echo "placeholder='Phone number'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Wphone'].'"'; }?>>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3">
					Does this workplace offer additional languages?<br/>
					</div>
					<div class="col-lg-3">
						<select class="chosen-select" id="Additionallanguage<?php echo $key;?>" name="Additionallanguage<?php echo $key;?>[]" multiple  tabindex="-1" data-placeholder="Choose an additional language...">
							<option value="NONE" <?php if (empty($details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?> disabled>no</option>
							<option value="AF"  <?php if (in_array( "AF",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Afrikaans </option>
							<option value="AR" <?php if (in_array("AR",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Arabic </option>
							<option value="BO" <?php if (in_array( "BO",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Bosnian </option>
							<option value="CA" <?php if (in_array( "CA",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Cantonese </option>
							<option value="CHZ" <?php if (in_array( "CHZ",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Chzech </option>
							<option value="CR" <?php if (in_array( "CR",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Croation </option>
							<option value="DA" <?php if (in_array( "DA",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Danish </option>
							<option value="DU" <?php if (in_array( "DU",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Dutch </option>
							<option value="EG" <?php if (in_array( "EG",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Egyptian </option>
							<option value="ENG" <?php if (in_array( "ENG",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> English </option>
							<option value="FL" <?php if (in_array( "FL",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Filipino </option>
							<option value="FR" <?php if (in_array( "FR",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> French </option>
							<option value="GE" <?php if (in_array( "GE",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> German </option>
							<option value="GR" <?php if (in_array( "GR",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Greek </option>
							<option value="HE" <?php if (in_array( "HE",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Hebrew </option>
							<option value="HI" <?php if (in_array( "HI",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Hindi </option>
							<option value="HO" <?php if (in_array( "HO",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Hokkien </option>
							<option value="HU" <?php if (in_array( "HU",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Hungarian </option>
							<option value="IND" <?php if (in_array( "IND",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Indonesian </option>
							<option value="IT" <?php if (in_array( "IT",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Italian </option>
							<option value="JP" <?php if (in_array( "JP",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Japanese </option>
							<option value="KO" <?php if (in_array( "KO",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Korean </option>
							<option value="LAT" <?php if (in_array( "LAT",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Latvian </option>
							<option value="LE" <?php if (in_array( "LE",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Lebanese </option>
							<option value="M" <?php if (in_array( "M",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Marathi </option>
							<option value="MA" <?php if (in_array( "MA",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Macedonian </option>
							<option value="MALT" <?php if (in_array( "MALT",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Maltese </option>
							<option value="MAN" <?php if (in_array( "MAN",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Mandarin </option>
							<option value="MAV" <?php if (in_array( "MAV",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Mavathi </option>
							<option value="ML" <?php if (in_array( "ML",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Malay </option>
							<option value="NOR" <?php if (in_array( "NOR",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Norwegian </option>
							<option value="POL" <?php if (in_array( "POL",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Polish </option>
							<option value="POR" <?php if (in_array( "POR",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Portuguese </option>
							<option value="PU" <?php if (in_array( "PU",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Punjabi </option>
							<option value="RU" <?php if (in_array( "RU",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Russian </option>
							<option value="S" <?php if (in_array( "S",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Slovak </option>
							<option value="SERB" <?php if (in_array( "SERB",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Serbian </option>
							<option value="SL" <?php if (in_array( "SL",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Sign Language </option>
							<option value="SP" <?php if (in_array( "SP",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Spanish </option>
							<option value="SW" <?php if (in_array( "SW",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Swedish </option>
							<option value="SWI" <?php if (in_array( "SWI",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Swiss </option>
							<option value="TA" <?php if (in_array( "TA",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Tamil </option>
							<option value="TAW" <?php if (in_array( "TAW",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Taiwanese </option>
							<option value="TE" <?php if (in_array( "TE",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Teo-Chew </option>
							<option value="TEL" <?php if (in_array( "TEL",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Telugu </option>
							<option value="TH" <?php if (in_array( "TH",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Thai </option>
							<option value="TURK" <?php if (in_array( "TURK",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Turkish </option>
							<option value="UK" <?php if (in_array( "UK",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Ukrainian </option>
							<option value="UR" <?php if (in_array( "UR",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Urdu </option>
							<option value="VI" <?php if (in_array( "VI",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Vietnamese </option>
							<option value="YI" <?php if (in_array( "YI",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Yiddish </option>
							<option value="YU" <?php if (in_array( "YU",$details['Workplaces'][$key]['Additionallanguage'])) echo "selected='selected'";?>> Yugoslav </option>
						</select>
					</div>
					<div class="col-lg-3">
					Quality In Practice number(QIP):
					</div>
					<div class="col-lg-3">
						<input type="text" class="form-control" name="QIP<?php echo $key;?>" id="QIP<?php echo $key;?>" <?php if (empty($details['Workplaces'][$key]['QIP'])) {echo "placeholder='QIP Number'";}   else{ echo 'value="'.$details['Workplaces'][$key]['QIP'].'"'; }?>>
					</div>
				</div>
				<div class="row"> 
					<div class="col-lg-3">
					Does this workplace provide:
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<input type="checkbox" name="Electronic-claiming<?php echo $key;?>" id="Electronic-claiming<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Electronic-claiming'];?>" <?php if($details['Workplaces'][$key]['Electronic-claiming']==1){echo "checked";} ?>> <label for="Electronic-claiming<?php echo $key;?>">Electronic claiming</label>
					</div>
					<div class="col-lg-6">
						<input type="checkbox" name="Hicaps<?php echo $key;?>" id="Hicaps<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Hicaps'];?>" <?php if($details['Workplaces'][$key]['Hicaps']==1){echo "checked";} ?>> <label for="Hicaps<?php echo $key;?>">HICAPS</label>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<input type="checkbox" name="Healthpoint<?php echo $key;?>" id="Healthpoint<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Healthpoint'];?>" <?php if($details['Workplaces'][$key]['Healthpoint']==1){echo "checked";} ?>> <label for="Healthpoint<?php echo $key;?>">Healthpoint</label>
					</div>
					<div class="col-lg-6">
						<input type="checkbox" name="Departmentva<?php echo $key;?>" id="Departmentva<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Departmentva'];?>" <?php if($details['Workplaces'][$key]['Departmentva']==1){echo "checked";} ?>> <label for="Departmentva<?php echo $key;?>">Department of Vetarans' Affairs</label>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<input type="checkbox" name="Workerscompensation<?php echo $key;?>" id="Workerscompensation<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Workerscompensation'];?>" <?php if($details['Workplaces'][$key]['Workerscompensation']==1){echo "checked";} ?>> <label for="Workerscompensation<?php echo $key;?>">Workers compensation</label>
					</div>
					<div class="col-lg-6">
						<input type="checkbox" name="Motora<?php echo $key;?>" id="Motora<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Motora'];?>" <?php if($details['Workplaces'][$key]['Motora']==1){echo "checked";} ?>> <label for="Motora<?php echo $key;?>">Motor accident compensation</label>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<input type="checkbox" name="Medicare<?php echo $key;?>" id="Medicare<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Medicare'];?>" <?php if($details['Workplaces'][$key]['Medicare']==1){echo "checked";} ?>> <label for="Medicare<?php echo $key;?>">Medicare Chronic Disease Management</label>
					</div>
					<div class="col-lg-6">
						<input type="checkbox" name="Homehospital<?php echo $key;?>" id="Homehospital<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Homehospital'];?>" <?php if($details['Workplaces'][$key]['Homehospital']==1){echo "checked";} ?> > <label for="Homehospital<?php echo $key;?>">Home and hospital visits</label>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<input type="checkbox" name="Mobilephysiotherapist<?php echo $key;?>" id="Mobilephysiotherapist<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['MobilePhysio'];?>" <?php if($details['Workplaces'][$key]['MobilePhysio']==1){echo "checked";} ?>> <label for="Mobilephysiotherapist<?php echo $key;?>">Mobile physiotherapist</label>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3">
					Numbers of hours worked<span class="tipstyle">*</span>
					</div>
					<div class="col-lg-6">
						<select class="form-control" id="Number-worked-hours<?php echo $key;?>" name="Number-worked-hours<?php echo $key;?>">
							<option value="0" <?php if (empty($details['Number-worked-hours'])) echo "selected='selected'";?> disabled>no</option>
							<option value="1"  <?php if ($details['Workplaces'][$key]['Number-worked-hours'] == "1") echo "selected='selected'";?>> 1-4 </option>
							<option value="2" <?php if ($details['Workplaces'][$key]['Number-worked-hours'] == "2") echo "selected='selected'";?>> 5-8</option>
							<option value="3" <?php if ($details['Workplaces'][$key]['Number-worked-hours'] == "3") echo "selected='selected'";?>> 9-12</option>
							<option value="4" <?php if ($details['Workplaces'][$key]['Number-worked-hours'] == "4") echo "selected='selected'";?>> 13-16</option>
							<option value="5" <?php if ($details['Workplaces'][$key]['Number-worked-hours'] == "5") echo "selected='selected'";?>> 17-20</option>
							<option value="6" <?php if ($details['Workplaces'][$key]['Number-worked-hours'] == "6") echo "selected='selected'";?>> 21-25</option>
							<option value="7" <?php if ($details['Workplaces'][$key]['Number-worked-hours'] == "7") echo "selected='selected'";?>> 26-30</option>
							<option value="8" <?php if ($details['Workplaces'][$key]['Number-worked-hours'] == "8") echo "selected='selected'";?>> 31-35</option>
							<option value="9" <?php if ($details['Workplaces'][$key]['Number-worked-hours'] == "9") echo "selected='selected'";?>> 36-40</option>
							<option value="10" <?php if ($details['Workplaces'][$key]['Number-worked-hours'] == "10") echo "selected='selected'";?>> 40+</option>
						</select>
					</div>
				</div>
				</div>
			<?php endforeach; ?>
			</div>
		<div class="row"><div class="col-xs-9 col-sm-9 col-md-9 col-lg-9"><a class="add-workplace-join"><span class="dashboard-button-name">Add workplace</span></a></div></div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">   
		<a class="join-details-button3"><span class="dashboard-button-name">Next</span></a><a class="your-details-prevbutton3"><span class="dashboard-button-name">Last</span></a>
		</div>
		</div>
		<div class="down4" style="display:none;" >
			<div class="row">
				<div class="col-lg-6">
					<label for="Udegree">Undergraduate degree<span class="tipstyle">*</span></label>
					<select name="Udegree" id="Udegree">
						<option value="" <?php if (empty($details['Udegree'])) echo "selected='selected'";?> disabled>(None)</option>
						<option value="1" <?php if ($details['Udegree'] == "1") echo "selected='selected'";?>>Bachelor of Physiotherapy</option>
						<option value="2" <?php if ($details['Udegree'] == "2") echo "selected='selected'";?>>Bachelor of Physiotherapy (Hons)</option>
						<option value="3" <?php if ($details['Udegree'] == "3") echo "selected='selected'";?>>Bachelor of Physiotherapy (Honours)</option>
						<option value="4" <?php if ($details['Udegree'] == "4") echo "selected='selected'";?>>Bachelor of Science (Physiotherapy)</option>
						<option value="5" <?php if ($details['Udegree'] == "5") echo "selected='selected'";?>>Bachelor of Science (Physiotherapy) (Honours)</option>
						<option value="6" <?php if ($details['Udegree'] == "6") echo "selected='selected'";?>>Bachelor of Applied Science and Master of Physiotherapy Practice</option>
						<option value="7" <?php if ($details['Udegree'] == "7") echo "selected='selected'";?>>Bachelor of Applied Science (Physiotherapy)</option>
						<option value="8" <?php if ($details['Udegree'] == "8") echo "selected='selected'";?>>Bachelor of Applied Science (Physiotherapy) (Honours)</option>
						<option value="Other">Other</option>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<label for="undergraduate-university-name">Undergraduate university name<span class="tipstyle">*</span></label>
					<select name="Undergraduate-university-name" id="Undergraduate-university-name">
						<option value="" <?php if (empty($details['Undergraduate-university-name'])) echo "selected='selected'";?>>(None)</option>
						<option value="ACU" <?php if ($details['Undergraduate-university-name'] == "ACU") echo "selected='selected'";?>>Australian Catholic University - NSW</option>
						<option value="ACUQ" <?php if ($details['Undergraduate-university-name'] == "ACUQ") echo "selected='selected'";?>>Australian Catholic University - QLD</option>
						<option value="ACUB" <?php if ($details['Undergraduate-university-name'] == "ACUB") echo "selected='selected'";?>>Australlian Catholic University - Ballarat</option>
						<option value="BON" <?php if ($details['Undergraduate-university-name'] == "BON") echo "selected='selected'";?>>Bond University - QLD</option>
						<option value="CU" <?php if ($details['Undergraduate-university-name'] == "CU") echo "selected='selected'";?>>Canberra University</option>
						<option value="CQU" <?php if ($details['Undergraduate-university-name'] == "CQU") echo "selected='selected'";?>>Central Qld University</option>
						<option value="CSU" <?php if ($details['Undergraduate-university-name'] == "CSU") echo "selected='selected'";?>>Charles Sturt University - Albury NSW</option>
						<option value="CSUO" <?php if ($details['Undergraduate-university-name'] == "CSUO") echo "selected='selected'";?>>Charles Sturt University - Orange NSW</option>
						<option value="CSUP" <?php if ($details['Undergraduate-university-name'] == "CSUP") echo "selected='selected'";?>>Charles Sturt University Port Macquarie</option>
						<option value="CUMB" <?php if ($details['Undergraduate-university-name'] == "CUMB") echo "selected='selected'";?>>Cumberland University - NSW</option>
						<option value="CUR" <?php if ($details['Undergraduate-university-name'] == "CUR") echo "selected='selected'";?>>Curtin University - WA</option>
						<option value="ECU" <?php if ($details['Undergraduate-university-name'] == "ECU") echo "selected='selected'";?>>Edith Cowan University - WA</option>
						<option value="FLIN" <?php if ($details['Undergraduate-university-name'] == "FLIN") echo "selected='selected'";?>>Flinders University SA</option>
						<option value="GRIF" <?php if ($details['Undergraduate-university-name'] == "GRIF") echo "selected='selected'";?>>Griffith University - Gold coast QLD</option>
						<option value="JCU" <?php if ($details['Undergraduate-university-name'] == "JCU") echo "selected='selected'";?>>James Cook University - QLD</option>
						<option value="LAT" <?php if ($details['Undergraduate-university-name'] == "LAT") echo "selected='selected'";?>>Latrobe University - Bundoora VIC</option>
						<option value="LATB" <?php if ($details['Undergraduate-university-name'] == "LATB") echo "selected='selected'";?>>Latrobe Universtiy - Bendigo VIC</option>
						<option value="LIN" <?php if ($details['Undergraduate-university-name'] == "LIN") echo "selected='selected'";?>>Lincoln Institute - VIC</option>
						<option value="MACQ" <?php if ($details['Undergraduate-university-name'] == "MACQ") echo "selected='selected'";?>>Macquarie University - NSW</option>
						<option value="MON" <?php if ($details['Undergraduate-university-name'] == "MON") echo "selected='selected'";?>>Monash University - Vic</option>
						<option value="UA" <?php if ($details['Undergraduate-university-name'] == "UA") echo "selected='selected'";?>>University of Adelaide</option>
						<option value="UM" <?php if ($details['Undergraduate-university-name'] == "UM") echo "selected='selected'";?>>University of Melbourne - Vic</option>
						<option value="UNC" <?php if ($details['Undergraduate-university-name'] == "UNC") echo "selected='selected'";?>>University of Newcastle - NSW</option>
						<option value="UND" <?php if ($details['Undergraduate-university-name'] == "UND") echo "selected='selected'";?>>University of Notre Dam - WA</option>
						<option value="UQ" <?php if ($details['Undergraduate-university-name'] == "UQ") echo "selected='selected'";?>>University of Qld</option>
						<option value="USA" <?php if ($details['Undergraduate-university-name'] == "USA") echo "selected='selected'";?>>University of South Australia</option>
						<option value="US" <?php if ($details['Undergraduate-university-name'] == "UTS") echo "selected='selected'";?>>University of Sydney - NSW</option>
						<option value="UTS" <?php if ($details['Undergraduate-university-name'] == "UTS") echo "selected='selected'";?>>University of Technology Sydney</option>
						<option value="UWA" <?php if ($details['Undergraduate-university-name'] == "UWA") echo "selected='selected'";?>>University of Western Australia</option>
						<option value="UWS" <?php if ($details['Undergraduate-university-name'] == "UWS") echo "selected='selected'";?>>University of Western Sydney- NSW</option>
						<option value="WAIT" <?php if ($details['Undergraduate-university-name'] == "WAIT") echo "selected='selected'";?>>Western Australian Institute of Technology</option>
						<option value="Other">Other</option>
					</select>
					<input type="text" class="form-control display-none" name="Undergraduate-university-name-other" id="Undergraduate-university-name-other">
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4">
					<label for="ugraduate-country">Country<span class="tipstyle">*</span></label>
					<input type="text" class="form-control" name="Ugraduate-country" id="Ugraduate-country" <?php if (empty($details['Ugraduate-country'])) {echo "placeholder='Country'";}   else{ echo 'value="'.$details['Ugraduate-country'].'"'; }?>>
				</div>
				<div class="col-lg-2">
					<label for="ugraduate-year-attained">Year attained<span class="tipstyle">*</span></label>
					<select class="form-control" name="Ugraduate-year-attained" id="Ugraduate-year-attained">
					<?php 
					$y = date("Y") + 15; 
					for ($i=1940; $i<= $y; $i++){
					echo '<option value="'.$i.'"';
					if ($details['Ugraduate-year-attained'] == $i){
							echo 'selected="selected"';
					}
					echo '>'.$i.'</option>';
					}
					 
					?>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<label for="pdegree">Postgraduate degree</label>
					<select name="Pdegree" id="Pdegree">
						<option <?php if (empty($details['Pdegree'])) echo "selected='selected'";?> value="">(None)</option>
						<option value="1" <?php if ($details['Pdegree'] == "1") echo "selected='selected'";?>>Doctor of Physiotherapy</option>
						<option value="2" <?php if ($details['Pdegree'] == "2") echo "selected='selected'";?>>Master of Physiotherapy</option>
						<option value="3" <?php if ($details['Pdegree'] == "3") echo "selected='selected'";?>>Master of Physiotherapy Practice</option>
						<option value="4" <?php if ($details['Pdegree'] == "4") echo "selected='selected'";?>>Master of Physiotherapy (Graduate Entry)</option>
						<option value="5" <?php if ($details['Pdegree'] == "5") echo "selected='selected'";?>>Master of Physiotherapy Studies</option>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<label for="postgraduate-university-name">Postgraduate university name</label>
					<select name="Postgraduate-university-name" id="Postgraduate-university-name">
						<option value="" <?php if (empty($details['Undergraduate-university-name'])) echo "selected='selected'";?>>(None)</option>
						<option value="ACU" <?php if ($details['Undergraduate-university-name'] == "ACU") echo "selected='selected'";?>>Australian Catholic University - NSW</option>
						<option value="ACUQ" <?php if ($details['Undergraduate-university-name'] == "ACUQ") echo "selected='selected'";?>>Australian Catholic University - QLD</option>
						<option value="ACUB" <?php if ($details['Undergraduate-university-name'] == "ACUB") echo "selected='selected'";?>>Australlian Catholic University - Ballarat</option>
						<option value="BON" <?php if ($details['Undergraduate-university-name'] == "BON") echo "selected='selected'";?>>Bond University - QLD</option>
						<option value="CU" <?php if ($details['Undergraduate-university-name'] == "CU") echo "selected='selected'";?>>Canberra University</option>
						<option value="CQU" <?php if ($details['Undergraduate-university-name'] == "CQU") echo "selected='selected'";?>>Central Qld University</option>
						<option value="CSU" <?php if ($details['Undergraduate-university-name'] == "CSU") echo "selected='selected'";?>>Charles Sturt University - Albury NSW</option>
						<option value="CSUO" <?php if ($details['Undergraduate-university-name'] == "CSUO") echo "selected='selected'";?>>Charles Sturt University - Orange NSW</option>
						<option value="CSUP" <?php if ($details['Undergraduate-university-name'] == "CSUP") echo "selected='selected'";?>>Charles Sturt University Port Macquarie</option>
						<option value="CUMB" <?php if ($details['Undergraduate-university-name'] == "CUMB") echo "selected='selected'";?>>Cumberland University - NSW</option>
						<option value="CUR" <?php if ($details['Undergraduate-university-name'] == "CUR") echo "selected='selected'";?>>Curtin University - WA</option>
						<option value="ECU" <?php if ($details['Undergraduate-university-name'] == "ECU") echo "selected='selected'";?>>Edith Cowan University - WA</option>
						<option value="FLIN" <?php if ($details['Undergraduate-university-name'] == "FLIN") echo "selected='selected'";?>>Flinders University SA</option>
						<option value="GRIF" <?php if ($details['Undergraduate-university-name'] == "GRIF") echo "selected='selected'";?>>Griffith University - Gold coast QLD</option>
						<option value="JCU" <?php if ($details['Undergraduate-university-name'] == "JCU") echo "selected='selected'";?>>James Cook University - QLD</option>
						<option value="LAT" <?php if ($details['Undergraduate-university-name'] == "LAT") echo "selected='selected'";?>>Latrobe University - Bundoora VIC</option>
						<option value="LATB" <?php if ($details['Undergraduate-university-name'] == "LATB") echo "selected='selected'";?>>Latrobe Universtiy - Bendigo VIC</option>
						<option value="LIN" <?php if ($details['Undergraduate-university-name'] == "LIN") echo "selected='selected'";?>>Lincoln Institute - VIC</option>
						<option value="MACQ" <?php if ($details['Undergraduate-university-name'] == "MACQ") echo "selected='selected'";?>>Macquarie University - NSW</option>
						<option value="MON" <?php if ($details['Undergraduate-university-name'] == "MON") echo "selected='selected'";?>>Monash University - Vic</option>
						<option value="UA" <?php if ($details['Undergraduate-university-name'] == "UA") echo "selected='selected'";?>>University of Adelaide</option>
						<option value="UM" <?php if ($details['Undergraduate-university-name'] == "UM") echo "selected='selected'";?>>University of Melbourne - Vic</option>
						<option value="UNC" <?php if ($details['Undergraduate-university-name'] == "UNC") echo "selected='selected'";?>>University of Newcastle - NSW</option>
						<option value="UND" <?php if ($details['Undergraduate-university-name'] == "UND") echo "selected='selected'";?>>University of Notre Dam - WA</option>
						<option value="UQ" <?php if ($details['Undergraduate-university-name'] == "UQ") echo "selected='selected'";?>>University of Qld</option>
						<option value="USA" <?php if ($details['Undergraduate-university-name'] == "USA") echo "selected='selected'";?>>University of South Australia</option>
						<option value="US" <?php if ($details['Undergraduate-university-name'] == "UTS") echo "selected='selected'";?>>University of Sydney - NSW</option>
						<option value="UTS" <?php if ($details['Undergraduate-university-name'] == "UTS") echo "selected='selected'";?>>University of Technology Sydney</option>
						<option value="UWA" <?php if ($details['Undergraduate-university-name'] == "UWA") echo "selected='selected'";?>>University of Western Australia</option>
						<option value="UWS" <?php if ($details['Undergraduate-university-name'] == "UWS") echo "selected='selected'";?>>University of Western Sydney- NSW</option>
						<option value="WAIT" <?php if ($details['Undergraduate-university-name'] == "WAIT") echo "selected='selected'";?>>Western Australian Institute of Technology</option>
						<option value="Other">Other</option>
					</select>
					<input type="text" class="form-control display-none" name="Postgraduate-university-name-other" id="Postgraduate-university-name-other">
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4">
					<label for="pgraduate-country">Country</label>
					<input type="text" class="form-control" name="Pgraduate-country" id="Pgraduate-country" <?php if (empty($details['Pgraduate-country'])) {echo "placeholder='Country'";}   else{ echo 'value="'.$details['Pgraduate-country'].'"'; }?>>
				</div>
				<div class="col-lg-2">
					<label for="pgraduate-year-attained">Year attained</label>
					<select class="form-control" name="Pgraduate-year-attained" id="Pgraduate-year-attained">
					<?php 
					$y = date("Y") + 15; 
					for ($i=1940; $i<= $y; $i++){
					echo '<option value="'.$i.'"';
					if ($details['Pgraduate-year-attained'] == $i){
							echo 'selected="selected"';
					}
					echo '>'.$i.'</option>';
					}
					 
					?>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<label for="Additional-qualifications">Additional qualifications<a class="add-additional-qualification"><span class="dashboard-button-name">Add qualification</span></a></label>
					<input type="hidden" id="addtionalNumber" name="addtionalNumber" value="<?php  $addtionalNumber =  sizeof($details['Additional-qualifications']); echo  $addtionalNumber; ?>"/>
					<div id="additional-qualifications-block">
					<?php foreach( $details['Additional-qualifications'] as $key => $value ): ?>
					<input type="text" class="form-control" name="Additional-qualifications<?php echo $key;?>" id="Additional-qualifications<?php echo $key;?>" value="<?php echo $value;?>">
					<?php endforeach;?>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">  <a href="javascript:document.getElementById('your-detail-form').submit();" class="join-details-button4"><span class="dashboard-button-name">Next</span></a><a class="your-details-prevbutton4"><span class="dashboard-button-name">Last</span></a></div>
		</div>
</form>   
