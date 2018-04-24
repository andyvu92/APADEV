<?php
//Put two scenarios here;
//1. for new user who join a member
//2. web user who join a member use $_SESSION]['userID'] to get user info
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
	if(isset($_POST['Address_Line_1'])){ $postData['Address_Line_1'] = $_POST['Address_Line_1']; }
	if(isset($_POST['Pobox'])){ $postData['Pobox'] = $_POST['Pobox']; }
	if(isset($_POST['Address_Line_2'])){ $postData['Address_Line_2'] = $_POST['Address_Line_2']; }
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
	if(isset($_POST['Memberid'])){ $postData['Memberid'] = $_POST['Memberid']; $_SESSION["userID"] = $_POST['Memberid'];}
	if(isset($_POST['Password'])){ $postData['Password'] = $_POST['Password']; }
	if(isset($_POST['MemberType'])){ $postData['MemberType'] = $_POST['MemberType']; }
	if(isset($_POST['Ahpranumber'])){ $postData['Ahpranumber'] = $_POST['Ahpranumber']; }
	if(isset($_POST['Nationalgp'])){ $postData['Nationalgp'] = $_POST['Nationalgp']; }
	if(isset($_POST['Branch'])){ $postData['Branch'] = $_POST['Branch']; }
	if(isset($_SESSION['Regional-group'])){ $postData['Regional-group'] = $_SESSION['Regional-group']; } else{ $postData['Regional-group'] ="";}
	if(isset($_POST['SpecialInterest'])){ $postData['SpecialInterest'] = $_POST['SpecialInterest']; }
	if(isset($_POST['Treatmentarea'])){ $postData['Treatmentarea'] = $_POST['Treatmentarea']; }
	if(isset($_POST['MAdditionallanguage'])){ $postData['Additionallanguage'] = $_POST['MAdditionallanguage']; }
	if(isset($_POST['Findpublicbuddy'])){ $postData['Findpublicbuddy'] = $_POST['Findpublicbuddy']; }else{ $postData['Findpublicbuddy'] = 0;}
	//Process workplace data
	if(isset($_POST['wpnumber'])){ 
	$num = $_POST['wpnumber']; 
	$tempWork = array();
		for($i=0; $i<$num; $i++){
			$workplaceArray = array();
			if(isset($_POST['Findphysio'.$i])) { $workplaceArray['Findphysio'] = $_POST['Findphysio'.$i];}else{ $workplaceArray['Findphysio'] = "0";}
			if(isset($_POST['Findabuddy'.$i])) { $workplaceArray['Findabuddy'] = $_POST['Findabuddy'.$i];}else{ $workplaceArray['Findabuddy'] = "0";}
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
			array_push($tempWork, $workplaceArray);
		}
		$postData['Workplaces'] =  $tempWork ;
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
			$temp = array();
			for($j=0; $j<$n; $j++){
				$additionalQualifications = array();
				if(isset($_POST['degree'.$j])) { $additionalQualifications['degree'] = $_POST['degree'.$j];}
				if(isset($_POST['university-name'.$j])) { $additionalQualifications['university-name'] = $_POST['university-name'.$j];}
				if(isset($_POST['additional-country'.$j])) { $additionalQualifications['additional-country'] = $_POST['additional-country'.$j];}
				if(isset($_POST['additional-year-attained'.$j])) { $additionalQualifications['additional-year-attained'] = $_POST['additional-year-attained'.$j];}
				array_push($temp , $additionalQualifications);
			}
			$postData['Additional-qualifications'] =  $temp ;
		}
// 2.2.5 - Member detail - Update
// Send - 
// UserID & detail data
// Response -Update Success message & UserID & detail data
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
		//test code
		$_SESSION['userID'] = $userID;
		$products = array();
        $productID = $postData['MemberType'];
		createShoppingCart($userID, $productID,$type="membership");
		foreach($postData['Nationalgp'] as $key=>$value){
			array_push($products,$value);
		}
		 /*  there is a question for those two kinds of subscription product, need to know how Aptify organise combination products for "sports and mus"*/
	    if(isset($_POST['ngmusculo']) && $_POST['ngmusculo'] =="1"){ array_push($products,"Intouch"); }
	    if(isset($_POST['ngsports']) && $_POST['ngsports'] =="1" ) { array_push($products,"SPMagzine"); }
	    $type = "NG";
		foreach($products as $key=>$value){
			$productID = $value;
			createShoppingCart($userID, $productID,$type);	
		}	
  }
?> 
<?php  if(isset($_SESSION['userID'])):  ?>
<?php 
// 2.2.4 - Dashboard - Get member detail
// Send - 
// UserID 
// Response - UserID & detail data
$details = GetAptifyData("4", "UserID");// #_SESSION["UserID"];
if (!empty($details['Regional-group'])) { $_SESSION['Regional-group'] = $details['Regional-group'];}											
 ?>
<form id="your-detail-form" action="jointheapa" method="POST">
    <input type="hidden" name="step1" value="1"/>
        <div class="down1" <?php if(isset($_POST['step1']) || isset($_POST['step2'])|| isset($_POST['step2-1'])|| isset($_POST['goI']))echo 'style="display:none;"'; else { echo 'style="display:block;"';}?>>
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 none-padding">
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
					   <?php 
						// 2.2.39 - get option dropdown list
						// Send - 
						// Response - get dropdown list from Aptify via webserice return Json data;
						// stroe workplace settings into the session
						$dropdata= GetAptifyData("39","request");
						$countrycode = $dropdata['Country'];
						?>
						<select class="form-control" id="country-code" name="country-code">
						
						<?php 
						foreach($countrycode  as $lines){
							echo '<option value="'.$lines["TelephoneCode"].'"';
							if ($details['Home-phone-number'][0] == $lines["TelephoneCode"]){ echo "selected='selected'"; } 
							echo '> '.$lines["Country"].' </option>';
						}
						?>
						</select>
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
                    <div class="col-lg-9"> Aboriginal and Torres Strait Islander origin<span class="tipstyle">*</span></div>
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
						<div class="col-lg-6 col-lg-offset-2">
                           <label for="">PO box</label>
                           <input type="text" class="form-control" name="Pobox"  <?php if (empty($details['Billing-PObox'])) {echo "placeholder='PO box'";}   else{ echo 'value="'.$details['Billing-PObox'].'"'; }?>>
                        </div>
					</div>
					    <div class="col-lg-4">
                           <label for="">Address 1<span class="tipstyle">*</span></label>
                           <input type="text" class="form-control"  name="Billing-Address_Line_1" id="Billing-Address_Line_1" <?php if (empty($details['Billing-Address_Line_1'])) {echo "placeholder='Billing Address 1'";}   else{ echo 'value="'.$details['Billing-Address_Line_1'].'"'; }?>>
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
                           <select class="form-control" name="Billing-State" id="Billing-State">
                              <option value=""  <?php if (empty($details['Billing-State'])) echo "selected='selected'";?> disabled> State </option>
                              <option value="ACT" <?php if ($details['Billing-State'] == "ACT") echo "selected='selected'";?>> ACT </option>
                              <option value="NSW" <?php if ($details['Billing-State'] == "NSW") echo "selected='selected'";?>> NSW </option>
                              <option value="SA" <?php if ($details['Billing-State'] == "SA") echo "selected='selected'";?>> SA </option>
                              <option value="TAS" <?php if ($details['Billing-State'] == "TAS") echo "selected='selected'";?>> TAS </option>
                              <option value="VIC" <?php if ($details['Billing-State'] == "VIC") echo "selected='selected'";?>> VIC </option>
                              <option value="QLD" <?php if ($details['Billing-State'] == "QLD") echo "selected='selected'";?>> QLD </option>
                              <option value="NT" <?php if ($details['Billing-State'] == "NT") echo "selected='selected'";?>> NT </option>
                              <option value="WA" <?php if ($details['Billing-State'] == "WA") echo "selected='selected'";?>> WA </option>
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
				  <!--
                  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 form-right">
                     <div class="row form-image">
                        <div class="col-lg-12">
                           Upload/change image
                        </div>
                     </div>
                                               
                  </div>
				  -->
		    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">   <a class="join-details-button1"><span class="dashboard-button-name">Next</span></a></div>
        </div>
        <div class="down2" style="display:none;" >
            <div class="row">
                <div class="col-lg-6">
                    <label for="">Member ID(Your email address)<span class="tipstyle">*</span></label>
                    <input type="text" class="form-control" name="Memberid" <?php if (empty($details['Memberno'])) {echo "placeholder='Member no.'";}   else{ echo 'value="'.$details['Memberno'].'"'; }?> readonly>
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
                <div class="col-lg-2">
                    <label for="">AHPRA number</label>
                    <input type="text" class="form-control" name="Ahpranumber"  <?php if (empty($details['Ahpranumber'])) {echo "placeholder='AHPRA number'";}   else{ echo 'value="'.$details['Ahpranumber'].'"'; }?>>
                </div>
            </div>
            <div class="row">
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
				       <option value="ACT" <?php if ($details['Branch'] == "ACT") echo "selected='selected'";?>>ACT</option>
					   <option value="NSW" <?php if ($details['Branch'] == "NSW") echo "selected='selected'";?>>NSW</option>
					   <option value="QLD" <?php if ($details['Branch'] == "QLD") echo "selected='selected'";?>>QLD</option>
					   <option value="SA" <?php if ($details['Branch'] == "SA") echo "selected='selected'";?>>SA</option>
					   <option value="TAS" <?php if ($details['Branch'] == "TAS") echo "selected='selected'";?>>TAS</option>
					   <option value="VIC" <?php if ($details['Branch'] == "VIC") echo "selected='selected'";?>>VIC</option>
					   <option value="WA" <?php if ($details['Branch'] == "WA") echo "selected='selected'";?>>WA</option>
					   <option value="Overseas" <?php if ($details['Branch'] == "Overseas") echo "selected='selected'";?>>I live overseas</option>
					</select>
				</div>
		    </div>
			<div class="row"> 
                <div class="col-lg-3"> Your special interest area:</div>
                <div class="col-lg-6">
					<select class="chosen-select" id="SpecialInterest" name="SpecialInterest[]" multiple  tabindex="-1" data-placeholder="Choose interest area...">
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
				<div class="col-lg-3">What is your favourite languages?<br/></div>
				<div class="col-lg-3">
					<select class="chosen-select" id="MAdditionallanguage" name="MAdditionallanguage" multiple  tabindex="-1" data-placeholder="Choose your favourite language...">
					   <option value="NONE" disabled>no</option>
					   <option value="AF"> Afrikaans </option>
					   <option value="AR"> Arabic </option>
					   <option value="BO"> Bosnian </option>
					   <option value="CA"> Cantonese </option>
					   <option value="CHZ"> Chzech </option>
					   <option value="CR"> Croation </option>
					   <option value="DA"> Danish </option>
					   <option value="DU"> Dutch </option>
					   <option value="EG"> Egyptian </option>
					   <option value="ENG"> English </option>
					   <option value="FL"> Filipino </option>
					   <option value="FR"> French </option>
					   <option value="GE"> German </option>
					   <option value="GR"> Greek </option>
					   <option value="HE"> Hebrew </option>
					   <option value="HI"> Hindi </option>
					   <option value="HO"> Hokkien </option>
					   <option value="HU"> Hungarian </option>
					   <option value="IND"> Indonesian </option>
					   <option value="IT"> Italian </option>
					   <option value="JP"> Japanese </option>
					   <option value="KO"> Korean </option>
					   <option value="LAT"> Latvian </option>
					   <option value="LE"> Lebanese </option>
					   <option value="M"> Marathi </option>
					   <option value="MA"> Macedonian </option>
					   <option value="MALT"> Maltese </option>
					   <option value="MAN"> Mandarin </option>
					   <option value="MAV"> Mavathi </option>
					   <option value="ML"> Malay </option>
					   <option value="NOR"> Norwegian </option>
					   <option value="POL"> Polish </option>
					   <option value="POR"> Portuguese </option>
					   <option value="PU"> Punjabi </option>
					   <option value="RU"> Russian </option>
					   <option value="S"> Slovak </option>
					   <option value="SERB"> Serbian </option>
					   <option value="SL"> Sign Language </option>
					   <option value="SP"> Spanish </option>
					   <option value="SW"> Swedish </option>
					   <option value="SWI"> Swiss </option>
					   <option value="TA"> Tamil </option>
					   <option value="TAW"> Taiwanese </option>
					   <option value="TE"> Teo-Chew </option>
					   <option value="TEL"> Telugu </option>
					   <option value="TH"> Thai </option>
					   <option value="TURK"> Turkish </option>
					   <option value="UK"> Ukrainian </option>
					   <option value="UR"> Urdu </option>
					   <option value="VI"> Vietnamese </option>
					   <option value="YI"> Yiddish </option>
					   <option value="YU"> Yugoslav </option>
					</select>
				</div>
			</div>
		    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">   <a class="your-details-prevbutton2"><span class="dashboard-button-name">Last</span></a><a class="join-details-button2"><span class="dashboard-button-name">Next</span></a></div>
        </div>
        <div id="wpnumber"><?php  $wpnumber =  0; echo  $wpnumber; ?></div>
        <input type="hidden" name="wpnumber" value="<?php  $wpnumber =  1; echo  $wpnumber; ?>"/>
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
					<input type="checkbox" name="Findpublicbuddy" id="Findpublicbuddy" value="">
				</div>
			</div>
            <ul class="nav nav-tabs" id="tabmenu">
                 <li class ="active"><a data-toggle="tab" href="#workplace0"><?php echo "Workplace0";?></a></li>
            </ul>
            <div id="workplaceblocks">
                <div id="workplace0" class='tab-pane fade in active'> 
                    <div class="row">
					    <div class="col-lg-6"></div>
						<div class="col-lg-6">
						    <label for="Findphysio0"><strong>NOTE:</strong>This workplace is included in Find a Pyhsio.</label>
                            <input type="checkbox" name="Findphysio0" id="Findphysio0" value="" >
					    </div>
					</div>
					<div class="row">
							<div class="col-lg-12"> <label for="Findabuddy0"><strong>NOTE:</strong>Please list my details in the physio</label>
							<input type="checkbox" name="Findabuddy0" id="Findabuddy0" value="">
							</div>
				    </div>
                    <div class="row">
				        <div class="col-lg-12">
					        <label for="Name-of-workplace">Name of workplace<span class="tipstyle">*</span></label>
					        <input type="text" class="form-control" name="Name-of-workplace0" id="Name-of-workplace0">
					    </div>
					</div>
				    <div class="row">
                        <div class="col-lg-3">Workplace setting<span class="tipstyle">*</span></div>
                        <div class="col-lg-9">
					        <select class="form-control" id="Workplace-setting0" name="Workplace-setting0">
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
									echo '<option value="'.$lines['code'].'">'.$lines['name'].'</option>';
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
							<select class="chosen-select" id="WTreatmentarea0" name="WTreatmentarea0[]" multiple  tabindex="-1" data-placeholder="Choose treatment area...">
							<?php 
							// get interest area from Aptify via webserice return Json data;
							$interestAreas= GetAptifyData("37","request");
							$_SESSION["interestAreas"] = $interestAreas;
							?>
							<?php 
							foreach($interestAreas['InterestAreas']  as $lines){
								echo '<option value="'.$lines["ListCode"].'"';
								echo '> '.$lines["ListName"].' </option>'; 
							}
							?>
							</select>
						</div>
					</div>
				    <div class="row">
                        <div class="col-lg-6">
                           <label for="BuildingName">Building Name</label>
                           <input type="text" class="form-control" name="WBuildingName0" id="WBuildingName0">
                        </div>
						<div class="col-lg-2">
						    <label for="WAddress_Line_10">Address line 1<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="WAddress_Line_10" id="WAddress_Line_10">
						</div>
						<div class="col-lg-4">
							<label for="WAddress_Line_20">Address line 2</label>
							<input type="text" class="form-control" name="WAddress_Line_20" id="WAddress_Line_20">
						</div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
							<label for="Wcity">City/Town<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Wcity0" id="Wcity0">
                         </div>
						<div class="col-lg-3">
							<label for="Wpostcode">Postcode<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Wpostcode0" id="Wpostcode0">
						</div>
						<div class="col-lg-3">
							<label for="Wstate">State<span class="tipstyle">*</span></label>
							<select class="form-control" id="Wstate0" name="Wstate0">
                              <option value="" selected disabled> State </option>
                              <option value="ACT"> ACT </option>
                              <option value="NSW"> NSW </option>
                              <option value="SA"> SA </option>
                              <option value="TAS"> TAS </option>
                              <option value="VIC"> VIC </option>
                              <option value="QLD"> QLD </option>
                              <option value="NT"> NT </option>
                              <option value="WA"> WA </option>
							  <option value="N/A"> I live overseas </option>
                           </select>
						</div>
						<div class="col-lg-3">
							<label for="Wcountry">Country<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Wcountry0" id="Wcountry0">
						</div>
                    </div>
                    <div class="row">
						<div class="col-lg-6">
							<label for="Wemail">Workplace email<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Wemail0" id="Wemail0">
						</div>
						<div class="col-lg-3">
							<label for="Wwebaddress">Website<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Wwebaddress0" id="Wwebaddress0">
						</div>
						<div class="col-lg-3">
							<label for="Wphone">Phone number<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Wphone0" id="Wphone0">
						</div>
                    </div>
                    <div class="row">
						<div class="col-lg-3">Does this workplace offer additional languages?<br/></div>
					    <div class="col-lg-3">
                            <select class="chosen-select" id="Additionallanguage0" name="Additionallanguage0[]" multiple  tabindex="-1" data-placeholder="Choose an additional language...">
							   <option value="NONE" disabled>no</option>
							   <option value="AF"> Afrikaans </option>
							   <option value="AR"> Arabic </option>
							   <option value="BO"> Bosnian </option>
							   <option value="CA"> Cantonese </option>
							   <option value="CHZ"> Chzech </option>
							   <option value="CR"> Croation </option>
							   <option value="DA"> Danish </option>
							   <option value="DU"> Dutch </option>
							   <option value="EG"> Egyptian </option>
							   <option value="ENG"> English </option>
							   <option value="FL"> Filipino </option>
							   <option value="FR"> French </option>
							   <option value="GE"> German </option>
							   <option value="GR"> Greek </option>
							   <option value="HE"> Hebrew </option>
							   <option value="HI"> Hindi </option>
							   <option value="HO"> Hokkien </option>
							   <option value="HU"> Hungarian </option>
							   <option value="IND"> Indonesian </option>
							   <option value="IT"> Italian </option>
							   <option value="JP"> Japanese </option>
							   <option value="KO"> Korean </option>
							   <option value="LAT"> Latvian </option>
							   <option value="LE"> Lebanese </option>
							   <option value="M"> Marathi </option>
							   <option value="MA"> Macedonian </option>
							   <option value="MALT"> Maltese </option>
							   <option value="MAN"> Mandarin </option>
							   <option value="MAV"> Mavathi </option>
							   <option value="ML"> Malay </option>
							   <option value="NOR"> Norwegian </option>
							   <option value="POL"> Polish </option>
							   <option value="POR"> Portuguese </option>
							   <option value="PU"> Punjabi </option>
							   <option value="RU"> Russian </option>
							   <option value="S"> Slovak </option>
							   <option value="SERB"> Serbian </option>
							   <option value="SL"> Sign Language </option>
							   <option value="SP"> Spanish </option>
							   <option value="SW"> Swedish </option>
							   <option value="SWI"> Swiss </option>
							   <option value="TA"> Tamil </option>
							   <option value="TAW"> Taiwanese </option>
							   <option value="TE"> Teo-Chew </option>
							   <option value="TEL"> Telugu </option>
							   <option value="TH"> Thai </option>
							   <option value="TURK"> Turkish </option>
							   <option value="UK"> Ukrainian </option>
							   <option value="UR"> Urdu </option>
							   <option value="VI"> Vietnamese </option>
							   <option value="YI"> Yiddish </option>
							   <option value="YU"> Yugoslav </option>
                            </select>
                        </div>
                        <div class="col-lg-3">Quality In Practice number(QIP):</div>
                        <div class="col-lg-3">
                            <input type="text" class="form-control" name="QIP0" id="QIP0">
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-lg-3">Does this workplace provide: </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="checkbox" name="Electronic-claiming0" id="Electronic-claiming0" value=""> <label for="Electronic-claiming0">Electronic claiming</label>
                   
                        </div>
                        <div class="col-lg-6">
                            <input type="checkbox" name="Hicaps0" id="Hicaps0" value=""> <label for="Hicaps0">HICAPS</label>
                        </div>
                    </div>
					<div class="row">
						<div class="col-lg-6">
						    <input type="checkbox" name="Healthpoint0" id="Healthpoint0" value="" > <label for="Healthpoint0">Healthpoint</label>
						</div>
						<div class="col-lg-6">
						    <input type="checkbox" name="Departmentva0" id="Departmentva0" value=""> <label for="Departmentva0">Department of Vetarans' Affairs</label>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
						    <input type="checkbox" name="Workerscompensation0" id="Workerscompensation0" value=""> <label for="Workerscompensation0">Workers compensation</label>
						</div>
						<div class="col-lg-6">
						    <input type="checkbox" name="Motora0" id="Motora0" value=""> <label for="Motora0">Motor accident compensation</label>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
						    <input type="checkbox" name="Medicare0" id="Medicare0" value=""> <label for="Medicare0">Medicare Chronic Disease Management</label>
						</div>
						<div class="col-lg-6">
						    <input type="checkbox" name="Homehospital0" id="Homehospital0" value=""> <label for="Homehospital0">Home and hospital visits</label>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
						    <input type="checkbox" name="Mobilephysiotherapist0" id="Mobilephysiotherapist0" value=""> <label for="Mobilephysiotherapist0">Mobile physiotherapist</label>
						</div>
					</div>
                    <div class="row">
                        <div class="col-lg-3"> Numbers of hours worked<span class="tipstyle">*</span></div>
                        <div class="col-lg-6">
                        <select class="form-control" id="Number-worked-hours0" name="Number-worked-hours0">
                            <option value="0" disabled>no</option>
                            <option value="1"> 1-4 </option>
                            <option value="2"> 5-8</option>
							<option value="3"> 9-12</option>
							<option value="4"> 13-16</option>
							<option value="5"> 17-20</option>
							<option value="6"> 21-25</option>
							<option value="7"> 26-30</option>
							<option value="8"> 31-35</option>
							<option value="9"> 36-40</option>
							<option value="10"> 40+</option>
                        </select>
                        </div>
                    </div>
                           
                </div>
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
						<option selected="selected" value="">(None)</option>
						<option value="1">Bachelor of Physiotherapy</option>
						<option value="2">Bachelor of Physiotherapy (Hons)</option>
						<option value="3">Bachelor of Physiotherapy (Honours)</option>
						<option value="4">Bachelor of Science (Physiotherapy)</option>
						<option value="5">Bachelor of Science (Physiotherapy) (Honours)</option>
						<option value="6">Bachelor of Applied Science and Master of Physiotherapy Practice</option>
						<option value="7">Bachelor of Applied Science (Physiotherapy)</option>
						<option value="8">Bachelor of Applied Science (Physiotherapy) (Honours)</option>
						<option value="Other">Other</option>
					</select>
			    </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <label for="undergraduate-university-name">Undergraduate university name<span class="tipstyle">*</span></label>
                    <select name="Undergraduate-university-name" id="Undergraduate-university-name">
						<option selected="selected" value="">(None)</option>
						<option value="ACU">Australian Catholic University - NSW</option>
						<option value="ACUQ">Australian Catholic University - QLD</option>
						<option value="ACUB">Australlian Catholic University - Ballarat</option>
						<option value="BON">Bond University - QLD</option>
						<option value="CU">Canberra University</option>
						<option value="CQU">Central Qld University</option>
						<option value="CSU">Charles Sturt University - Albury NSW</option>
						<option value="CSUO">Charles Sturt University - Orange NSW</option>
						<option value="CSUP">Charles Sturt University Port Macquarie</option>
						<option value="CUMB">Cumberland University - NSW</option>
						<option value="CUR">Curtin University - WA</option>
						<option value="ECU">Edith Cowan University - WA</option>
						<option value="FLIN">Flinders University SA</option>
						<option value="GRIF">Griffith University - Gold coast QLD</option>
						<option value="JCU">James Cook University - QLD</option>
						<option value="LAT">Latrobe University - Bundoora VIC</option>
						<option value="LATB">Latrobe Universtiy - Bendigo VIC</option>
						<option value="LIN">Lincoln Institute - VIC</option>
						<option value="MACQ">Macquarie University - NSW</option>
						<option value="MON">Monash University - Vic</option>
						<option value="UA">University of Adelaide</option>
						<option value="UM">University of Melbourne - Vic</option>
						<option value="UNC">University of Newcastle - NSW</option>
						<option value="UND">University of Notre Dam - WA</option>
						<option value="UQ">University of Qld</option>
						<option value="USA">University of South Australia</option>
						<option value="US">University of Sydney - NSW</option>
						<option value="UTS">University of Technology Sydney</option>
						<option value="UWA">University of Western Australia</option>
						<option value="UWS">University of Western Sydney- NSW</option>
						<option value="WAIT">Western Australian Institute of Technology</option>
						<option value="Other">Other</option>
					</select>
					<input type="text" class="form-control display-none" name="Undergraduate-university-name-other" id="Undergraduate-university-name-other">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
					<label for="ugraduate-country">Country<span class="tipstyle">*</span></label>
					<input type="text" class="form-control" name="Ugraduate-country" id="Ugraduate-country">
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
						<option selected="selected" value="">(None)</option>
						<option value="1">Doctor of Physiotherapy</option>
						<option value="2">Master of Physiotherapy</option>
						<option value="3">Master of Physiotherapy Practice</option>
						<option value="4">Master of Physiotherapy (Graduate Entry)</option>
						<option value="5">Master of Physiotherapy Studies</option>
					</select>
				</div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <label for="postgraduate-university-name">Postgraduate university name</label>
				    <select name="Postgraduate-university-name" id="Postgraduate-university-name">
						<option selected="selected" value="">(None)</option>
						<option value="ACU">Australian Catholic University - NSW</option>
						<option value="ACUQ">Australian Catholic University - QLD</option>
						<option value="ACUB">Australlian Catholic University - Ballarat</option>
						<option value="BON">Bond University - QLD</option>
						<option value="CU">Canberra University</option>
						<option value="CQU">Central Qld University</option>
						<option value="CSU">Charles Sturt University - Albury NSW</option>
						<option value="CSUO">Charles Sturt University - Orange NSW</option>
						<option value="CSUP">Charles Sturt University Port Macquarie</option>
						<option value="CUMB">Cumberland University - NSW</option>
						<option value="CUR">Curtin University - WA</option>
						<option value="ECU">Edith Cowan University - WA</option>
						<option value="FLIN">Flinders University SA</option>
						<option value="GRIF">Griffith University - Gold coast QLD</option>
						<option value="JCU">James Cook University - QLD</option>
						<option value="LAT">Latrobe University - Bundoora VIC</option>
						<option value="LATB">Latrobe Universtiy - Bendigo VIC</option>
						<option value="LIN">Lincoln Institute - VIC</option>
						<option value="MACQ">Macquarie University - NSW</option>
						<option value="MON">Monash University - Vic</option>
						<option value="UA">University of Adelaide</option>
						<option value="UM">University of Melbourne - Vic</option>
						<option value="UNC">University of Newcastle - NSW</option>
						<option value="UND">University of Notre Dam - WA</option>
						<option value="UQ">University of Qld</option>
						<option value="USA">University of South Australia</option>
						<option value="US">University of Sydney - NSW</option>
						<option value="UTS">University of Technology Sydney</option>
						<option value="UWA">University of Western Australia</option>
						<option value="UWS">University of Western Sydney- NSW</option>
						<option value="WAIT">Western Australian Institute of Technology</option>
						<option value="Other">Other</option>
					</select>
					<input type="text" class="form-control display-none" name="Postgraduate-university-name-other" id="Postgraduate-university-name-other">
                </div>
            </div>
            <div class="row">
				<div class="col-lg-4">
					<label for="pgraduate-country">Country</label>
					<input type="text" class="form-control" name="Pgraduate-country" id="Pgraduate-country">
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
					<input type="hidden" id="addtionalNumber" name="addtionalNumber" value="<?php  $addtionalNumber =  1; echo  $addtionalNumber; ?>"/>
				</div>
			</div>
				<div id="additional-qualifications-block">
					<div class="row">
						<div class="col-lg-6">
							<label for="degree0">Degree<span class="tipstyle">*</span></label>
							<select name="degree0" id="degree0">
								<option selected="selected" value="">(None)</option>
								<option value="1">Bachelor of Physiotherapy</option>
								<option value="2">Bachelor of Physiotherapy (Hons)</option>
								<option value="3">Bachelor of Physiotherapy (Honours)</option>
								<option value="4">Bachelor of Science (Physiotherapy)</option>
								<option value="5">Bachelor of Science (Physiotherapy) (Honours)</option>
								<option value="6">Bachelor of Applied Science and Master of Physiotherapy Practice</option>
								<option value="7">Bachelor of Applied Science (Physiotherapy)</option>
								<option value="8">Bachelor of Applied Science (Physiotherapy) (Honours)</option>
								<option value="Other">Other</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<label for="university-name0">University name<span class="tipstyle">*</span></label>
							<select name="university-name0" id="university-name0">
								<option selected="selected" value="">(None)</option>
								<option value="ACU">Australian Catholic University - NSW</option>
								<option value="ACUQ">Australian Catholic University - QLD</option>
								<option value="ACUB">Australlian Catholic University - Ballarat</option>
								<option value="BON">Bond University - QLD</option>
								<option value="CU">Canberra University</option>
								<option value="CQU">Central Qld University</option>
								<option value="CSU">Charles Sturt University - Albury NSW</option>
								<option value="CSUO">Charles Sturt University - Orange NSW</option>
								<option value="CSUP">Charles Sturt University Port Macquarie</option>
								<option value="CUMB">Cumberland University - NSW</option>
								<option value="CUR">Curtin University - WA</option>
								<option value="ECU">Edith Cowan University - WA</option>
								<option value="FLIN">Flinders University SA</option>
								<option value="GRIF">Griffith University - Gold coast QLD</option>
								<option value="JCU">James Cook University - QLD</option>
								<option value="LAT">Latrobe University - Bundoora VIC</option>
								<option value="LATB">Latrobe Universtiy - Bendigo VIC</option>
								<option value="LIN">Lincoln Institute - VIC</option>
								<option value="MACQ">Macquarie University - NSW</option>
								<option value="MON">Monash University - Vic</option>
								<option value="UA">University of Adelaide</option>
								<option value="UM">University of Melbourne - Vic</option>
								<option value="UNC">University of Newcastle - NSW</option>
								<option value="UND">University of Notre Dam - WA</option>
								<option value="UQ">University of Qld</option>
								<option value="USA">University of South Australia</option>
								<option value="US">University of Sydney - NSW</option>
								<option value="UTS">University of Technology Sydney</option>
								<option value="UWA">University of Western Australia</option>
								<option value="UWS">University of Western Sydney- NSW</option>
								<option value="WAIT">Western Australian Institute of Technology</option>
								<option value="Other">Other</option>
							</select>
							<input type="text" class="form-control display-none" name="Undergraduate-university-name-other" id="Undergraduate-university-name-other">
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4">
							<label for="additional-country0">Country<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="additional-country0" id="additional-country0">
						</div>
						<div class="col-lg-2">
							<label for="additional-year-attained0">Year attained<span class="tipstyle">*</span></label>
							<select class="form-control" name="additional-year-attained0" id="additional-year-attained0">
							<?php 
							$y = date("Y"); 
							for ($i=1940; $i<= $y; $i++){
							echo '<option value="'.$i.'">'.$i.'</option>';  
							}
							?>
							</select>
						</div>
					</div>
				</div>
			
		    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">  <a href="javascript:document.getElementById('your-detail-form').submit();" class="join-details-button4"><span class="dashboard-button-name">Next</span></a><a class="your-details-prevbutton4"><span class="dashboard-button-name">Last</span></a></div>
        </div>
               
</form>   
<?php endif; ?>
<?php  if(!isset($_SESSION['userID'])):  ?>
    <form id="your-detail-form" action="jointheapa" method="POST">
		<input type="hidden" name="step1" value="1"/>
            <div class="down1" <?php if(isset($_POST['step1']) || isset($_POST['step2']))echo 'style="display:none;"'; else { echo 'style="display:block;"';}?>>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 none-padding">
                    <div class="row">
                        <div class="col-lg-3">
				            <label for="prefix">Prefix<span class="tipstyle">*</span></label>
                            <select class="form-control" id="Prefix" name="Prefix">
								<option value="" selected disabled>Prefix</option>
								<option value="Prof">Prof</option>
								<option value="Dr">Dr</option>
								<option value="Mr">Mr</option>
								<option value="Mrs">Mrs</option>
								<option value="Miss">Miss</option>
								 <option value="Ms">Ms</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                           <label for="">First name<span class="tipstyle">*</span></label>
                           <input type="text" class="form-control"  name="Firstname">
                        </div>
						<div class="col-lg-3">
                           <label for="">preferred name</label>
                           <input type="text" class="form-control"  name="Preferred-name">
                        </div>
                        <div class="col-lg-3">
                           <label for="">Middle name</label>
                           <input type="text" class="form-control" name="Middle-name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                           <label for="">Maiden name</label>
                           <input type="text" class="form-control" name="Maiden-name">
                        </div>
                        <div class="col-lg-6">
                           <label for="">Last name<span class="tipstyle">*</span></label>
                           <input type="text" class="form-control" name="Lastname">
                        </div>
                     </div>
                    <div class="row">
                        <div class="col-lg-4">
                           <label for="">Birth Date<span class="tipstyle">*</span></label>
                           <input type="date" class="form-control" name="Birth">
                        </div>
                        <div class="col-lg-3 col-lg-offset-1">
                           <label for="">Gender<span class="tipstyle">*</span></label>
                           <select class="form-control" id="Gender" name="Gender">
                              <option value="" disabled> Gender </option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                              <option value="other">I’d prefer not to say</option>
                           </select>
                        </div>
                    </div>
					<div class="row">
						<div class="col-lg-2">
							<label for="">Country code</label>
							<?php 
							// 2.2.39 - get option dropdown list
							// Send - 
							// Response - get dropdown list from Aptify via webserice return Json data;
							// stroe workplace settings into the session
							$dropdata= GetAptifyData("39","request");
							$countrycode = $dropdata['Country'];
							?>
							<select class="form-control" id="country-code" name="country-code">
							
							<?php 
							foreach($countrycode  as $lines){
								echo '<option value="'.$lines["TelephoneCode"].'"';
								
								echo '> '.$lines["Country"].' </option>';
							}
							?>
							</select>
						</div>
						<div class="col-lg-2">
							<label for="">Area code</label>
							<input type="text" class="form-control" name="area-code"   pattern="[0-9]{10}">
						</div>
						<div class="col-lg-4">
							<label for="">Phone number</label>
							<input type="text" class="form-control" name="phone-number" pattern="[0-9]{10}">
						</div>
						<div class="col-lg-4">
							<label for="">Mobile number</label>
							<input type="text" class="form-control" name="Mobile-number"  pattern="[0-9]{9}">
						</div>
					</div>
					<div class="row">
						<div class="col-lg-9">
						Aboriginal and Torres Strait Islander origin<span class="tipstyle">*</span>
						</div>
						<div class="col-lg-3">
							<select class="form-control" id="Aboriginal" name="Aboriginal">
								<option value="">No</option>
								<option value="AB">Yes, Aboriginal </option>
								<option value="TSI">Yes, Torres Strait Islander </option>
								<option value="BOTH">Yes, both Aboriginal and Torres Strait Islander</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">Residential address:</div>
					</div>
					<div class="row">
						<div class="col-lg-4">
							<label for="">Building name</label>
							<input type="text" class="form-control"  name="BuildingName">
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4">
						<label for="">Address line 1<span class="tipstyle">*</span></label>
						<input type="text" class="form-control"  name="Address_Line_1" id="Address_Line_1">
						</div>
						<div class="col-lg-6 col-lg-offset-2">
						<label for="">PO box</label>
						<input type="text" class="form-control" name="Pobox">
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<label for="">Address Line 2<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Address_Line_2" id="Address_Line_2">
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<label for="">City or town<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Suburb" id="Suburb">
						</div>
					</div>
					<div class="row">
						<div class="col-lg-3">
							<label for="">Postcode<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Postcode" id="Postcode">
						</div>
						<div class="col-lg-3">
							<label for="">State<span class="tipstyle">*</span></label>
							<select class="form-control" id="State" name="State">
								<option value="" selected disabled> State </option>
								<option value="ACT"> ACT </option>
								<option value="NSW"> NSW </option>
								<option value="SA"> SA </option>
								<option value="TAS"> TAS </option>
								<option value="VIC"> VIC </option>
								<option value="QLD"> QLD </option>
								<option value="NT"> NT </option>
								<option value="WA"> WA </option>
								<option value="N/A"> I live overseas </option>
							</select>
						</div>
						<div class="col-lg-6">
							<label for="">Country<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="Country" id="Country">
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12"><label for="Shipping-address-join"><strong>Billing address:(Sames as Above address)</strong></label><input type="checkbox" id="Shipping-address-join" name="Shipping-address-join" value="1" checked></div>
					</div>
                <div class="row shipping" id="shippingAddress">
					<div class="row">
						<div class="col-lg-4">
							<label for="">Building name</label>
							<input type="text" class="form-control"  name="Billing-BuildingName">
						</div>
						<div class="col-lg-6 col-lg-offset-2">
							<label for="">PO box</label>
							<input type="text" class="form-control" name="Billing-PObox" id="Billing-PObox">
						</div>
					</div>
					    <div class="col-lg-4">
                           <label for="">Address Line 1<span class="tipstyle">*</span></label>
                           <input type="text" class="form-control"  name="Billing-Address_Line_1" id="Billing-Address_Line_1">
                        </div>
                        <div class="col-lg-12">
                           <label for="">Address Line 2</label>
                           <input type="text" class="form-control" name="Billing-Address_Line_2" id="Billing-Address_Line_2">
                        </div>
						<div class="col-lg-12">
                           <label for="">City or town</label>
                           <input type="text" class="form-control" name="Billing-Suburb" id="Billing-Suburb">
                        </div>
                        <div class="col-lg-3">
                           <label for="">Postcode</label>
                           <input type="text" class="form-control" name="Billing-Postcode" id="Billing-Postcode">
                        </div>
                        <div class="col-lg-3">
                           <label for="">State</label>
                           <select class="form-control" name="Billing-State" id="Billing-State">
								<option value=""  disabled> State </option>
								<option value="ACT"> ACT </option>
								<option value="NSW"> NSW </option>
								<option value="SA"> SA </option>
								<option value="TAS"> TAS </option>
								<option value="VIC"> VIC </option>
								<option value="QLD"> QLD </option>
								<option value="NT"> NT </option>
								<option value="WA"> WA </option>
								<option value="N/A"> I live overseas </option>
                           </select>
                        </div>
                        <div class="col-lg-6">
                           <label for="">Country</label>
                           <input type="text" class="form-control" name="Billing-Country" id="Billing-Country">
                        </div>
                    </div>
					 <!---Hidden mailing address and shipping address Start from here-->
					   <input type="hidden" name="Shipping-BuildingName" value="">
					   <input type="hidden" name="Shipping-Address_Line_1" value="">
					   <input type="hidden" name="Shipping-Address_Line_2" value="">
					   <input type="hidden" name="Shipping-PObox" value="">
					   <input type="hidden" name="Shipping-city-town" value="">
					   <input type="hidden" name="Shipping-postcode" value="">
					   <input type="hidden" name="Shipping-state" value="">
					   <input type="hidden" name="Shipping-country" value="">
					   <input type="hidden" name="Mailing-BuildingName" value="">
					   <input type="hidden" name="Mailing-Address_Line_1" value="">
					   <input type="hidden" name="Mailing-Address_Line_2" value="">
					   <input type="hidden" name="Mailing-PObox" value="">
					   <input type="hidden" name="Mailing-city-town" value="">
					   <input type="hidden" name="Mailing-postcode" value="">
					   <input type="hidden" name="Mailing-state" value="">
					   <input type="hidden" name="Mailing-country" value="">
			        <!---Hidden mailing address and shipping address End here-->
				</div>
                 <!-- <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 form-right">
                     <div class="row form-image">
                        <div class="col-lg-12">
						Upload/change image
                           <form id ="upload-Image-Form" action="jointheapa" method="post" enctype="multipart/form-data">
                           Upload/change image
                           <input type="file" name="fileToUpload" id="fileToUpload">
						   <input type="hidden" name="uploadeIamge">
                         
						   <a href="javascript:document.getElementById('upload-Image-Form').submit();" class="uploadImageButton">Upload Image</a>
                           </form>
						   
						   
                        </div>
                     </div>
                                               
                  </div>-->
				  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">   <a class="join-details-button1"><span class="dashboard-button-name">Next</span></a></div>
            </div>
			<div class="down2" style="display:none;" >
				<div class="row">
					<div class="col-lg-6">
						<label for="">Member ID(Your email address)<span class="tipstyle">*</span></label>
						<input type="text" class="form-control" name="Memberid" id="Memberid" value="" onchange="checkEmailFunction(this.value)">
					<div id="checkMessage"></div>
					<script>
					function checkEmailFunction(email) {
					$.ajax({
					url:"sites/all/themes/evolve/inc/jointheAPA/jointheAPA-checkEmail.php", 
					type: "POST", //request type,
					data: {CheckEmailID: email},
					success:function(response) { 
					var result = response;
					if(result=="true"){
						$('#checkMessage').html("this email address has already registered, please use another one");
						$( "#Memberid" ).focus();
						$("#Memberid").css("border", "1px solid red");
					} 
													
					}
					});
					}
					</script>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<label for="">Your password<span class="tipstyle">*</span></label>
						<input type="text" class="form-control" name="Password" >
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<label for="">Member Type<span class="tipstyle">*</span></label>
						<select class="form-control" id="MemberType" name="MemberType">
							<option value="none" selected disabled>memberType</option>
							<option value="FPI">Full-time physiotherapist with insurance (more than 18 hours per week) </option>
							<option value="FPN">Full-time physiotherapist no insurance (more than 18 hours per week) </option>
							<option value="FEPI">Full-time Employed Public Sector Physiotherapist (more than 18 hours per week) with insurance</option>
							<option value="FEPN">Full-time Employed Public Sector Physiotherapist (more than 18 hours per week) no insurance</option>
							<option value="PPI">Part-time Physiotherapist (less than 18 hours per week) with insurance</option>
							<option value="PPN">Part-time Physiotherapist (less than 18 hours per week) no insurance</option>
							<option value="PEP">Part-time Employed Public Sector Physiotherapist (less than 18 hours per week) </option>
							<option value="MPU">Maternity/Paternity/Unemployed (working for less than 6 months) </option>
							<option value="OV">Overseas for more than 6 months (must hold current registration with AHPRA) </option>
							<option value="PGS">Post Graduate study and working less than 18 hours per week </option>
							<option value="NPP">Non-Practising Physiotherapist registered as NPP with PhysioBA</option>
							<option value="AM">￼Associate Member (Australia) </option>
							<option value="GFY">￼Graduate First Year </option>
							<option value="GSY">￼Graduate Second Year</option>
							<option value="GTY">￼Graduate Third Year</option>
							<option value="GFOY">￼Graduate Fourth Year</option>
							<option value="GFYE">Graduate First Year Employed Public Sector </option>
							<option value="GSYE">Graduate Second Year Employed Public Sector</option>
							<option value="GTYE">￼Graduate Third Year Employed Public Sector</option>
							<option value="GFOYE">￼Graduate Fourth Year Employed Public Sector </option>
							<option value="SY">￼Student Year 1 - 4</option>
							<option value="PA">Physiotherapy Assistant</option>
							<option value="AMO">Associate Member (Overseas)</option>
							<option value="AS">￼Affiliate subscription</option>
							<option value="RAN">Retired and not working in any paid capacity</option>
							<option value="RW">Retired with 36 years membership and is over the age of 55 years (subject to office validation)</option>
						</select>
					</div>
				</div>
				<div class="row" id="ahpblock">
					<div class="col-lg-2">
						<label for="">AHPRA number</label>
						<input type="text" class="form-control" name="Ahpranumber"  <?php if (empty($details['Ahpranumber'])) {echo "placeholder='AHPRA number'";}   else{ echo 'value="'.$details['Ahpranumber'].'"'; }?>>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<label for="">Your National group</label>
						<select class="chosen-select" id="Nationalgp" name="Nationalgp[]" multiple>
						<?php
						// 2.2.19 - get national group list
						// Send - 
						// Response - get national group from Aptify via webserice return Json data;
						$nationalGroups= GetAptifyData("19","request");
						?>
						<?php 
						foreach($nationalGroups["NationalGroup"] as $lines) {
						echo '<option value="'.$lines["NGid"].'"> '.$lines["NGtitle"].' </option>';
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
							<option value="" selected disabled>What branch would you like to join?</option>
							<option value="ACT">ACT</option>
							<option value="NSW">NSW</option>
							<option value="QLD">QLD</option>
							<option value="SA">SA</option>
							<option value="TAS">TAS</option>
							<option value="VIC">VIC</option>
							<option value="WA">WA</option>
							<option value="Overseas">I live overseas</option>
						</select>
					</div>
				</div>
				<div class="row"> 
					<div class="col-lg-3">
					Your special interest area:
					</div>
					<div class="col-lg-6">
						<select class="chosen-select" id="SpecialInterest" name="SpecialInterest[]" multiple  tabindex="-1" data-placeholder="Choose interest area...">
						<?php 
						// 2.2.37 - get interest area list
						// Send - 
						// Response - get workplace settings from Aptify via webserice return Json data;
						// stroe interest area list into the session
						$interestAreas= GetAptifyData("37","request");
						$_SESSION["interestAreas"] = $interestAreas;
						?>
								
						<?php 
						foreach($interestAreas['InterestAreas']  as $lines){
						echo '<option value="'.$lines['ListCode'].'">'.$lines['ListName'].'</option>';

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
							echo '> '.$lines["ListName"].' </option>'; 
						}
						?>
						</select>
					</div>
				</div>
				    <div class="row">
				<div class="col-lg-3">What is your favourite languages?<br/></div>
				<div class="col-lg-3">
					<select class="chosen-select" id="MAdditionallanguage" name="MAdditionallanguage" multiple  tabindex="-1" data-placeholder="Choose your favourite language...">
					   <option value="NONE" disabled>no</option>
					   <option value="AF"> Afrikaans </option>
					   <option value="AR"> Arabic </option>
					   <option value="BO"> Bosnian </option>
					   <option value="CA"> Cantonese </option>
					   <option value="CHZ"> Chzech </option>
					   <option value="CR"> Croation </option>
					   <option value="DA"> Danish </option>
					   <option value="DU"> Dutch </option>
					   <option value="EG"> Egyptian </option>
					   <option value="ENG"> English </option>
					   <option value="FL"> Filipino </option>
					   <option value="FR"> French </option>
					   <option value="GE"> German </option>
					   <option value="GR"> Greek </option>
					   <option value="HE"> Hebrew </option>
					   <option value="HI"> Hindi </option>
					   <option value="HO"> Hokkien </option>
					   <option value="HU"> Hungarian </option>
					   <option value="IND"> Indonesian </option>
					   <option value="IT"> Italian </option>
					   <option value="JP"> Japanese </option>
					   <option value="KO"> Korean </option>
					   <option value="LAT"> Latvian </option>
					   <option value="LE"> Lebanese </option>
					   <option value="M"> Marathi </option>
					   <option value="MA"> Macedonian </option>
					   <option value="MALT"> Maltese </option>
					   <option value="MAN"> Mandarin </option>
					   <option value="MAV"> Mavathi </option>
					   <option value="ML"> Malay </option>
					   <option value="NOR"> Norwegian </option>
					   <option value="POL"> Polish </option>
					   <option value="POR"> Portuguese </option>
					   <option value="PU"> Punjabi </option>
					   <option value="RU"> Russian </option>
					   <option value="S"> Slovak </option>
					   <option value="SERB"> Serbian </option>
					   <option value="SL"> Sign Language </option>
					   <option value="SP"> Spanish </option>
					   <option value="SW"> Swedish </option>
					   <option value="SWI"> Swiss </option>
					   <option value="TA"> Tamil </option>
					   <option value="TAW"> Taiwanese </option>
					   <option value="TE"> Teo-Chew </option>
					   <option value="TEL"> Telugu </option>
					   <option value="TH"> Thai </option>
					   <option value="TURK"> Turkish </option>
					   <option value="UK"> Ukrainian </option>
					   <option value="UR"> Urdu </option>
					   <option value="VI"> Vietnamese </option>
					   <option value="YI"> Yiddish </option>
					   <option value="YU"> Yugoslav </option>
					</select>
				</div>
			</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">   <a class="join-details-button2"><span class="dashboard-button-name">Next</span></a><a class="your-details-prevbutton2"><span class="dashboard-button-name">Last</span></a></div>
			</div>
			<div id="wpnumber"><?php  $wpnumber =  0; echo  $wpnumber; ?></div>
			<input type="hidden" name="wpnumber" value="<?php  $wpnumber =  1; echo  $wpnumber; ?>"/>
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
						<input type="checkbox" name="Findpublicbuddy" id="Findpublicbuddy" value="">
					</div>
				</div>
			<ul class="nav nav-tabs" id="tabmenu">
			<li class ="active"><a data-toggle="tab" href="#workplace0"><?php echo "Workplace0";?></a></li>
			</ul>
			<div id="workplaceblocks">
				<div id="workplace0" class='tab-pane fade in active'> 
					<div class="row"><div class="col-lg-6"></div><div class="col-lg-6"> <label for="Findphysio"><strong>NOTE:</strong>This workplace is included in Find a Pyhsio.</label>
					<input type="checkbox" name="Findphysio0" id="Findphysio" value="" ></div></div>
					<div class="row">
						<div class="col-lg-12"> <label for="Findabuddy0"><strong>NOTE:</strong>Please list my details in the physio</label>
							<input type="checkbox" name="Findabuddy0" id="Findabuddy0" value="">
						</div>
				    </div>
				<div class="row">
					<div class="col-lg-12">
						<label for="Name-of-workplace">Name of workplace<span class="tipstyle">*</span></label>
						<input type="text" class="form-control" name="Name-of-workplace0" id="Name-of-workplace0">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3">
					Workplace setting<span class="tipstyle">*</span>
					</div>
					<div class="col-lg-9">
						<select class="form-control" id="Workplace-setting0" name="Workplace-setting0">
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
							echo '<option value="'.$lines['code'].'">'.$lines['name'].'</option>';
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
						<select class="chosen-select" id="WTreatmentarea0" name="WTreatmentarea0" multiple  tabindex="-1" data-placeholder="Choose treatment area...">
						<?php 
						// get interest area from Aptify via webserice return Json data;
						$interestAreas= GetAptifyData("37","request");
						$_SESSION["interestAreas"] = $interestAreas;
						?>
						<?php 
						foreach($interestAreas['InterestAreas']  as $lines){
							echo '<option value="'.$lines["ListCode"].'"';
							echo '> '.$lines["ListName"].' </option>'; 
						}
						?>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<label for="BuildingName">Building Name</label>
						<input type="text" class="form-control" name="WBuildingName0" id="WBuildingName0">
					</div>
					<div class="col-lg-2">
					<label for="WAddress_Line_10">Address line 1<span class="tipstyle">*</span></label>
					<input type="text" class="form-control" name="WAddress_Line_10" id="WAddress_Line_10">
					</div>
					<div class="col-lg-4">
					<label for="WAddress_Line_20">Address line 2</label>
					<input type="text" class="form-control" name="WAddress_Line_20" id="WAddress_Line_20">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3">
						<label for="Wcity">City/Town<span class="tipstyle">*</span></label>
						<input type="text" class="form-control" name="Wcity0" id="Wcity0">
					</div>
					<div class="col-lg-3">
						<label for="Wpostcode">Postcode<span class="tipstyle">*</span></label>
						<input type="text" class="form-control" name="Wpostcode0" id="Wpostcode0">
					</div>
					<div class="col-lg-3">
						<label for="Wstate">State<span class="tipstyle">*</span></label>
						<select class="form-control" id="Wstate0" name="Wstate0">
							<option value="" selected disabled> State </option>
							<option value="ACT"> ACT </option>
							<option value="NSW"> NSW </option>
							<option value="SA"> SA </option>
							<option value="TAS"> TAS </option>
							<option value="VIC"> VIC </option>
							<option value="QLD"> QLD </option>
							<option value="NT"> NT </option>
							<option value="WA"> WA </option>
							<option value="N/A"> I live overseas </option>
						</select>
					</div>
					<div class="col-lg-3">
						<label for="Wcountry">Country<span class="tipstyle">*</span></label>
						<input type="text" class="form-control" name="Wcountry0" id="Wcountry0">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<label for="Wemail">Workplace email<span class="tipstyle">*</span></label>
						<input type="text" class="form-control" name="Wemail0" id="Wemail0">
					</div>
					<div class="col-lg-3">
						<label for="Wwebaddress">Website<span class="tipstyle">*</span></label>
						<input type="text" class="form-control" name="Wwebaddress0" id="Wwebaddress0">
					</div>
					<div class="col-lg-3">
						<label for="Wphone">Phone number<span class="tipstyle">*</span></label>
						<input type="text" class="form-control" name="Wphone0" id="Wphone0">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3">
					Does this workplace offer additional languages?<br/>
					</div>
					<div class="col-lg-3">
						<select class="chosen-select" id="Additionallanguage0" name="Additionallanguage0[]" multiple  tabindex="-1" data-placeholder="Choose an additional language...">
							<option value="NONE" disabled>no</option>
							<option value="AF"> Afrikaans </option>
							<option value="AR"> Arabic </option>
							<option value="BO"> Bosnian </option>
							<option value="CA"> Cantonese </option>
							<option value="CHZ"> Chzech </option>
							<option value="CR"> Croation </option>
							<option value="DA"> Danish </option>
							<option value="DU"> Dutch </option>
							<option value="EG"> Egyptian </option>
							<option value="ENG"> English </option>
							<option value="FL"> Filipino </option>
							<option value="FR"> French </option>
							<option value="GE"> German </option>
							<option value="GR"> Greek </option>
							<option value="HE"> Hebrew </option>
							<option value="HI"> Hindi </option>
							<option value="HO"> Hokkien </option>
							<option value="HU"> Hungarian </option>
							<option value="IND"> Indonesian </option>
							<option value="IT"> Italian </option>
							<option value="JP"> Japanese </option>
							<option value="KO"> Korean </option>
							<option value="LAT"> Latvian </option>
							<option value="LE"> Lebanese </option>
							<option value="M"> Marathi </option>
							<option value="MA"> Macedonian </option>
							<option value="MALT"> Maltese </option>
							<option value="MAN"> Mandarin </option>
							<option value="MAV"> Mavathi </option>
							<option value="ML"> Malay </option>
							<option value="NOR"> Norwegian </option>
							<option value="POL"> Polish </option>
							<option value="POR"> Portuguese </option>
							<option value="PU"> Punjabi </option>
							<option value="RU"> Russian </option>
							<option value="S"> Slovak </option>
							<option value="SERB"> Serbian </option>
							<option value="SL"> Sign Language </option>
							<option value="SP"> Spanish </option>
							<option value="SW"> Swedish </option>
							<option value="SWI"> Swiss </option>
							<option value="TA"> Tamil </option>
							<option value="TAW"> Taiwanese </option>
							<option value="TE"> Teo-Chew </option>
							<option value="TEL"> Telugu </option>
							<option value="TH"> Thai </option>
							<option value="TURK"> Turkish </option>
							<option value="UK"> Ukrainian </option>
							<option value="UR"> Urdu </option>
							<option value="VI"> Vietnamese </option>
							<option value="YI"> Yiddish </option>
							<option value="YU"> Yugoslav </option>
						</select>
					</div>
					<div class="col-lg-3">
					Quality In Practice number(QIP):
						</div>
					<div class="col-lg-3">
					<input type="text" class="form-control" name="QIP0" id="QIP0">
					</div>
				</div>
				<div class="row"> 
					<div class="col-lg-3">
					Does this workplace provide:
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
					<input type="checkbox" name="Electronic-claiming0" id="Electronic-claiming0" value=""> <label for="Electronic-claiming0">Electronic claiming</label>
					</div>
					<div class="col-lg-6">
					<input type="checkbox" name="Hicaps0" id="Hicaps0" value=""> <label for="Hicaps0">HICAPS</label>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<input type="checkbox" name="Healthpoint0" id="Healthpoint0" value="" > <label for="Healthpoint0">Healthpoint</label>
					</div>
					<div class="col-lg-6">
						<input type="checkbox" name="Departmentva0" id="Departmentva0" value=""> <label for="Departmentva0">Department of Vetarans' Affairs</label>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<input type="checkbox" name="Workerscompensation0" id="Workerscompensation0" value=""> <label for="Workerscompensation0">Workers compensation</label>
					</div>
					<div class="col-lg-6">
					<input type="checkbox" name="Motora0" id="Motora0" value=""> <label for="Motora0">Motor accident compensation</label>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<input type="checkbox" name="Medicare0" id="Medicare0" value=""> <label for="Medicare0">Medicare Chronic Disease Management</label>
					</div>
					<div class="col-lg-6">
						<input type="checkbox" name="Homehospital0" id="Homehospital0" value=""> <label for="Homehospital0">Home and hospital visits</label>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<input type="checkbox" name="Mobilephysiotherapist0" id="Mobilephysiotherapist0" value=""> <label for="Mobilephysiotherapist0">Mobile physiotherapist</label>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3">
					Numbers of hours worked<span class="tipstyle">*</span>
					</div>
					<div class="col-lg-6">
						<select class="form-control" id="Number-worked-hours0" name="Number-worked-hours0">
							<option value="0" disabled>no</option>
							<option value="1"> 1-4 </option>
							<option value="2"> 5-8</option>
							<option value="3"> 9-12</option>
							<option value="4"> 13-16</option>
							<option value="5"> 17-20</option>
							<option value="6"> 21-25</option>
							<option value="7"> 26-30</option>
							<option value="8"> 31-35</option>
							<option value="9"> 36-40</option>
							<option value="10"> 40+</option>
						</select>
					</div>
				</div>
				</div>
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
						<select  class="form-control" name="Udegree" id="Udegree">
							<option selected="selected" value="">(None)</option>
							<option value="1">Bachelor of Physiotherapy</option>
							<option value="2">Bachelor of Physiotherapy (Hons)</option>
							<option value="3">Bachelor of Physiotherapy (Honours)</option>
							<option value="4">Bachelor of Science (Physiotherapy)</option>
							<option value="5">Bachelor of Science (Physiotherapy) (Honours)</option>
							<option value="6">Bachelor of Applied Science and Master of Physiotherapy Practice</option>
							<option value="7">Bachelor of Applied Science (Physiotherapy)</option>
							<option value="8">Bachelor of Applied Science (Physiotherapy) (Honours)</option>
							<option value="Other">Other</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<label for="undergraduate-university-name">Undergraduate university name<span class="tipstyle">*</span></label>
						<select class="form-control" name="Undergraduate-university-name" id="Undergraduate-university-name">
							<option selected="selected" value="">(None)</option>
							<option value="ACU">Australian Catholic University - NSW</option>
							<option value="ACUQ">Australian Catholic University - QLD</option>
							<option value="ACUB">Australlian Catholic University - Ballarat</option>
							<option value="BON">Bond University - QLD</option>
							<option value="CU">Canberra University</option>
							<option value="CQU">Central Qld University</option>
							<option value="CSU">Charles Sturt University - Albury NSW</option>
							<option value="CSUO">Charles Sturt University - Orange NSW</option>
							<option value="CSUP">Charles Sturt University Port Macquarie</option>
							<option value="CUMB">Cumberland University - NSW</option>
							<option value="CUR">Curtin University - WA</option>
							<option value="ECU">Edith Cowan University - WA</option>
							<option value="FLIN">Flinders University SA</option>
							<option value="GRIF">Griffith University - Gold coast QLD</option>
							<option value="JCU">James Cook University - QLD</option>
							<option value="LAT">Latrobe University - Bundoora VIC</option>
							<option value="LATB">Latrobe Universtiy - Bendigo VIC</option>
							<option value="LIN">Lincoln Institute - VIC</option>
							<option value="MACQ">Macquarie University - NSW</option>
							<option value="MON">Monash University - Vic</option>
							<option value="UA">University of Adelaide</option>
							<option value="UM">University of Melbourne - Vic</option>
							<option value="UNC">University of Newcastle - NSW</option>
							<option value="UND">University of Notre Dam - WA</option>
							<option value="UQ">University of Qld</option>
							<option value="USA">University of South Australia</option>
							<option value="US">University of Sydney - NSW</option>
							<option value="UTS">University of Technology Sydney</option>
							<option value="UWA">University of Western Australia</option>
							<option value="UWS">University of Western Sydney- NSW</option>
							<option value="WAIT">Western Australian Institute of Technology</option>
							<option value="Other">Other</option>
						</select>
						<input type="text" class="form-control display-none" name="Undergraduate-university-name-other" id="Undergraduate-university-name-other">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4">
						<label for="ugraduate-country">Country<span class="tipstyle">*</span></label>
						<input type="text" class="form-control" name="Ugraduate-country" id="Ugraduate-country">
					</div>
					<div class="col-lg-2">
						<label for="ugraduate-year-attained">Year attained<span class="tipstyle">*</span></label>
						<select class="form-control" name="Ugraduate-year-attained" id="Ugraduate-year-attained">
						<?php 
						$y = date("Y") + 15; 
						for ($i=1940; $i<= $y; $i++){
						echo '<option value="'.$i.'">'.$i.'</option>';  
						}
						?>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<label for="pdegree">Postgraduate degree</label>
						<select class="form-control" name="Pdegree" id="Pdegree">
							<option selected="selected" value="">(None)</option>
							<option value="1">Doctor of Physiotherapy</option>
							<option value="2">Master of Physiotherapy</option>
							<option value="3">Master of Physiotherapy Practice</option>
							<option value="4">Master of Physiotherapy (Graduate Entry)</option>
							<option value="5">Master of Physiotherapy Studies</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<label for="postgraduate-university-name">Postgraduate university name</label>
						<select class="form-control" name="Postgraduate-university-name" id="Postgraduate-university-name">
							<option selected="selected" value="">(None)</option>
							<option value="ACU">Australian Catholic University - NSW</option>
							<option value="ACUQ">Australian Catholic University - QLD</option>
							<option value="ACUB">Australlian Catholic University - Ballarat</option>
							<option value="BON">Bond University - QLD</option>
							<option value="CU">Canberra University</option>
							<option value="CQU">Central Qld University</option>
							<option value="CSU">Charles Sturt University - Albury NSW</option>
							<option value="CSUO">Charles Sturt University - Orange NSW</option>
							<option value="CSUP">Charles Sturt University Port Macquarie</option>
							<option value="CUMB">Cumberland University - NSW</option>
							<option value="CUR">Curtin University - WA</option>
							<option value="ECU">Edith Cowan University - WA</option>
							<option value="FLIN">Flinders University SA</option>
							<option value="GRIF">Griffith University - Gold coast QLD</option>
							<option value="JCU">James Cook University - QLD</option>
							<option value="LAT">Latrobe University - Bundoora VIC</option>
							<option value="LATB">Latrobe Universtiy - Bendigo VIC</option>
							<option value="LIN">Lincoln Institute - VIC</option>
							<option value="MACQ">Macquarie University - NSW</option>
							<option value="MON">Monash University - Vic</option>
							<option value="UA">University of Adelaide</option>
							<option value="UM">University of Melbourne - Vic</option>
							<option value="UNC">University of Newcastle - NSW</option>
							<option value="UND">University of Notre Dam - WA</option>
							<option value="UQ">University of Qld</option>
							<option value="USA">University of South Australia</option>
							<option value="US">University of Sydney - NSW</option>
							<option value="UTS">University of Technology Sydney</option>
							<option value="UWA">University of Western Australia</option>
							<option value="UWS">University of Western Sydney- NSW</option>
							<option value="WAIT">Western Australian Institute of Technology</option>
							<option value="Other">Other</option>
						</select>
					<input type="text" class="form-control display-none" name="Postgraduate-university-name-other" id="Postgraduate-university-name-other">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4">
					<label for="pgraduate-country">Country</label>
					<input type="text" class="form-control" name="Pgraduate-country" id="Pgraduate-country">
					</div>
					<div class="col-lg-2">
						<label for="pgraduate-year-attained">Year attained</label>
						<select class="form-control" name="Pgraduate-year-attained" id="Pgraduate-year-attained">
							<?php 
							$y = date("Y"); 
							for ($i=1940; $i<= $y; $i++){
							echo '<option value="'.$i.'">'.$i.'</option>';  
							}
							?>
						</select>
					</div>
				</div>
			   <div class="row">
					<div class="col-lg-6">
						<label for="Additional-qualifications">Additional qualifications<a class="add-additional-qualification"><span class="dashboard-button-name">Add qualification</span></a></label>
						<input type="hidden" id="addtionalNumber" name="addtionalNumber" value="<?php  $addtionalNumber =  1; echo  $addtionalNumber; ?>"/>
					</div>
				</div>
				<div id="additional-qualifications-block0">
					<div class="row">
						<div class="col-lg-6">
							<label for="degree0">Degree<span class="tipstyle">*</span></label>
							<select name="degree0" id="degree0">
								<option selected="selected" value="">(None)</option>
								<option value="1">Bachelor of Physiotherapy</option>
								<option value="2">Bachelor of Physiotherapy (Hons)</option>
								<option value="3">Bachelor of Physiotherapy (Honours)</option>
								<option value="4">Bachelor of Science (Physiotherapy)</option>
								<option value="5">Bachelor of Science (Physiotherapy) (Honours)</option>
								<option value="6">Bachelor of Applied Science and Master of Physiotherapy Practice</option>
								<option value="7">Bachelor of Applied Science (Physiotherapy)</option>
								<option value="8">Bachelor of Applied Science (Physiotherapy) (Honours)</option>
								<option value="Other">Other</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<label for="university-name0">University name<span class="tipstyle">*</span></label>
							<select name="university-name0" id="university-name0">
								<option selected="selected" value="">(None)</option>
								<option value="ACU">Australian Catholic University - NSW</option>
								<option value="ACUQ">Australian Catholic University - QLD</option>
								<option value="ACUB">Australlian Catholic University - Ballarat</option>
								<option value="BON">Bond University - QLD</option>
								<option value="CU">Canberra University</option>
								<option value="CQU">Central Qld University</option>
								<option value="CSU">Charles Sturt University - Albury NSW</option>
								<option value="CSUO">Charles Sturt University - Orange NSW</option>
								<option value="CSUP">Charles Sturt University Port Macquarie</option>
								<option value="CUMB">Cumberland University - NSW</option>
								<option value="CUR">Curtin University - WA</option>
								<option value="ECU">Edith Cowan University - WA</option>
								<option value="FLIN">Flinders University SA</option>
								<option value="GRIF">Griffith University - Gold coast QLD</option>
								<option value="JCU">James Cook University - QLD</option>
								<option value="LAT">Latrobe University - Bundoora VIC</option>
								<option value="LATB">Latrobe Universtiy - Bendigo VIC</option>
								<option value="LIN">Lincoln Institute - VIC</option>
								<option value="MACQ">Macquarie University - NSW</option>
								<option value="MON">Monash University - Vic</option>
								<option value="UA">University of Adelaide</option>
								<option value="UM">University of Melbourne - Vic</option>
								<option value="UNC">University of Newcastle - NSW</option>
								<option value="UND">University of Notre Dam - WA</option>
								<option value="UQ">University of Qld</option>
								<option value="USA">University of South Australia</option>
								<option value="US">University of Sydney - NSW</option>
								<option value="UTS">University of Technology Sydney</option>
								<option value="UWA">University of Western Australia</option>
								<option value="UWS">University of Western Sydney- NSW</option>
								<option value="WAIT">Western Australian Institute of Technology</option>
								<option value="Other">Other</option>
							</select>
							<input type="text" class="form-control display-none" name="Undergraduate-university-name-other" id="Undergraduate-university-name-other">
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4">
							<label for="additional-country0">Country<span class="tipstyle">*</span></label>
							<input type="text" class="form-control" name="additional-country0" id="additional-country0">
						</div>
						<div class="col-lg-2">
							<label for="additional-year-attained0">Year attained<span class="tipstyle">*</span></label>
							<select class="form-control" name="additional-year-attained0" id="additional-year-attained0">
							<?php 
							$y = date("Y"); 
							for ($i=1940; $i<= $y; $i++){
							echo '<option value="'.$i.'">'.$i.'</option>';  
							}
							?>
							</select>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">  <a href="javascript:document.getElementById('your-detail-form').submit();" class="join-details-button4"><span class="dashboard-button-name">Next</span></a><a class="your-details-prevbutton4"><span class="dashboard-button-name">Last</span></a></div>
			</div>
    </form>
<?php endif; ?>			