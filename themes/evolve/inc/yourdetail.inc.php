<?php
 include('sites/all/themes/evolve/commonFile/updateBackgroundImage.php');
   
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
	$details = GetAptifyData("4", "UserID"); // #_SESSION["UserID"];
	//print_r($details);
	
	// 2.2.10 - GET Picture
	// Send - 
	// UserID
	// Response -
	// Profile image

	$picture = GetAptifyData("10", "UserID"); // #_SESSION["UserID"];

	
	// 2.2.11 - UPDATE Picture
	// Send - 
	// UserID, Image
	// Response -
	// N/A.
	if(isset($_POST["PictureUpdate"])) {
		$sendpicture = GetAptifyData("11", "UserID"); // #_SESSION["UserID"];
	}
	
	if(isset($_GET["action"])&& ($_GET["action"]=="addcard")) {
		// 2.2.15 - Add payment method
		// Send - 
		// UserID, Cardtype,Cardname,Cardnumber,Expirydate,CCV
		// Response -
		// N/A.
		$AddNewCounter = 0;
		if(isset($_SESSION['userID'])){ $postPaymentData['userID'] = $_SESSION['userID']; $AddNewCounter++; }
		if(isset($_POST['Cardtype'])){ $postPaymentData['Payment-method'] = $_POST['Cardtype']; $AddNewCounter++; }
		if(isset($_POST['Cardname'])){ $postPaymentData['Name-on-card'] = $_POST['Cardname']; $AddNewCounter++; }
		if(isset($_POST['Cardnumber'])){ $postPaymentData['Cardno'] = $_POST['Cardnumber']; $AddNewCounter++; }
		if(isset($_POST['Expirydate'])){ $postPaymentData['Expiry-date'] = $_POST['Expirydate']; $AddNewCounter++; }
		if(isset($_POST['CCV'])){ $postPaymentData['CCV'] = $_POST['CCV']; $AddNewCounter++; }
		if($AddNewCounter == 6) { $addNewCards = 1; }
		if($addNewCards == 1) {
			GetAptifyData("15", $postPaymentData); 
		}
	} 
	
	if(isset($_POST["deleteID"]) && $_POST["deleteID"] != "") {
		$deleteCardSubmit["UserID"] = "UserID";
		$deleteCardSubmit["Creditcard-ID"] = $_POST["deleteID"];
		// 2.2.14 - DELETE credit card
		// Send - 
		// UserID, Credit Card ID
		// Response -
		// N/A.
		GetAptifyData("14", $deleteCardSubmit); 
	}
	
  if(isset($_Get["action"]) && $_Get["action"] = "updatecard") {
		$updateCardSubmit["UserID"] = "UserID";
		$updateCardSubmit["Creditcard-ID"] = $_POST["selectedCard"];
		$updateCardSubmit["Expiry-date"] = $_POST["Expiry-date"];
		$updateCardSubmit["CVV"] = $_POST["CVV"];
		// 2.2.13 - update payment method-2-update card
		// Send - 
		// UserID, Creditcard-ID,Expiry-date,CVV
		// Response -
		// N/A.
		GetAptifyData("13", $updateCardSubmit); 
	}
 if(isset($_Get["action"]) && $_Get["action"] = "setCardForm") {
		$updateCardSubmit["UserID"] = "UserID";
		$updateCardSubmit["Creditcard-ID"] = $_POST["selectedCard"];
		// 2.2.13 - update payment method-3-set main card
		// Send - 
		// UserID, Creditcard-ID
		// Response -
		// N/A.
		GetAptifyData("13", $updateCardSubmit); 
	}
 if(isset($_Get["action"]) && $_Get["action"] = "rollover") {
		$updateCardSubmit["UserID"] = "UserID";
		$updateCardSubmit["Rollover"] = $_POST["Rollover"];
		// 2.2.13 - update payment method-1-set user rollover
		// Send - 
		// UserID, Rollover
		// Response -
		// N/A.
		GetAptifyData("13", $updateCardSubmit); 
	}
	
	//use webservice 2.2.15 Add payment method
	/*
	if(isset($_SESSION['userID'])){ $postPaymentData['userID'] = $_SESSION['userID']; }
	if(isset($_POST['Cardtype'])){ $postPaymentData['Payment-method'] = $_POST['Cardtype']; }
	if(isset($_POST['Cardname'])){ $postPaymentData['Name-on-card'] = $_POST['Cardname']; }
	if(isset($_POST['Cardnumber'])){ $postPaymentData['Cardno'] = $_POST['Cardnumber']; }
	if(isset($_POST['Expirydate'])){ $postPaymentData['Expiry-date'] = $_POST['Expirydate']; }
	if(isset($_POST['CCV'])){ $postPaymentData['CCV'] = $_POST['CCV']; }
	GetAptifyData("15", $postPaymentData); */
?>
<div id="pre_background" style="display:none">background_<?php echo $user['background']; ?></div>
<div class="extra_information">
<?php
// please use those data!!!!
/*
echo "Nationalgp: ".$details['Nationalgp']."<br />";
echo "Branch: ".$details['Branch']."<br />";
echo "Specialty: ".$details['Specialty']."<br />";
echo "Billing-BuildingName: ".$details['Billing-BuildingName']."<br />";
echo "Shipping-BuildingName: ".$details['Shipping-BuildingName']."<br />";
echo "Mailing-unitno: ".$details['Mailing-unitno']."<br />";
echo "Mailing-streetname: ".$details['Mailing-streetname']."<br />";
echo "Mailing-city-town: ".$details['Mailing-city-town']."<br />";
echo "Mailing-postcode: ".$details['Mailing-postcode']."<br />";
echo "Mailing-state: ".$details['Mailing-state']."<br />";
echo "Mailing-country: ".$details['Mailing-country']."<br />";
echo "Additional-qualifications1: ".$details['Additional-qualifications'][0]."<br />";
echo "Additional-qualifications2: ".$details['Additional-qualifications'][1]."<br />";
echo "Workplace_ID0: ".$details["Workplaces"][0]['Workplace_ID']."<br />";
echo "BuildingName0: ".$details["Workplaces"][0]['BuildingName']."<br />";
echo "Homehospital0: ".$details["Workplaces"][0]['Homehospital']."<br />";
echo "MobilePhysio0: ".$details["Workplaces"][0]['MobilePhysio']."<br />";
echo "Workplace_ID1: ".$details["Workplaces"][1]['Workplace_ID']."<br />";
echo "BuildingName1: ".$details["Workplaces"][1]['BuildingName']."<br />";
echo "Homehospital1: ".$details["Workplaces"][1]['Homehospital']."<br />";
echo "MobilePhysio1: ".$details["Workplaces"][1]['MobilePhysio']."<br />";
echo "Workplace_ID2: ".$details["Workplaces"][2]['Workplace_ID']."<br />";
echo "BuildingName2: ".$details["Workplaces"][2]['BuildingName']."<br />";
echo "Homehospital2: ".$details["Workplaces"][2]['Homehospital']."<br />";
echo "MobilePhysio2: ".$details["Workplaces"][2]['MobilePhysio']."<br />";
*/
?>
</div>
<div style="display:table;">
<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 dashboard-left-nav">
   <a type="button" class="navbar-toggle" data-toggle="collapse" data-target="#dashboard-navbar-collapse-1"><i class="fa fa-align-justify"></i></a>
   <!----edit-->
   <div class="collapse" id="dashboard-navbar-collapse-1">
      <table class="table table-responsive">
         <tbody style="border-top: none;">
            <tr>
               <td>
                  <a href="dashboard">
                     <div class="dashboard-icon">[icon class="fa fa-tachometer fa-3x" link=""][/icon]</div>
                     <br/>
                     <div class="dashboard-button-name">Dashboard</div>
                  </a>
               </td>
               <td>
                  <a href="your-details">
                     <div class="dashboard-icon">[icon class="fa fa-users fa-3x" link=""][/icon]</div>
                     <br/>
                     <div class="dashboard-button-name">Your details</div>
                  </a>
               </td>
            </tr>
            <tr>
               <td>
                  <a href="your-purchases">
                     <div class="dashboard-icon">[icon class="fa fa-shopping-cart fa-3x" link=""][/icon]</div>
                     <br/>
                     <div class="dashboard-button-name">Purchases</div>
                  </a>
               </td>
               <td>
                  <a href="subscriptions">
                     <div class="dashboard-icon">[icon class="fa fa-trophy fa-3x" link=""][/icon]</div>
                     <br/>
                     <div class="dashboard-button-name">Subscriptions</div>
                  </a>
               </td>
               <td>
                  <a href="#about">
                     <div class="dashboard-icon">[icon class="fa fa-folder-open fa-3x" link=""][/icon]</div>
                     <br/>
                     <div class="dashboard-button-name">Renew</div>
                  </a>
               </td>
            </tr>
         </tbody>
      </table>
   </div>
   <!---end--->
   <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-left">
         <li class="dashboard-nav">
            <a href="dashboard">
               <div class="dashboard-icon">[icon class="fa fa-tachometer fa-3x" link=""][/icon]</div>
               <br/>
               <div class="dashboard-button-name">Dashboard</div>
            </a>
         </li>
         <li class="dashboard-nav">
            <a href="your-details">
               <div class="dashboard-icon">[icon class="fa fa-users fa-3x" link=""][/icon]</div>
               <br/>
               <div class="dashboard-button-name">Account</div>
            </a>
         </li>
         <li class="dashboard-nav">
            <a href="your-purchases">
               <div class="dashboard-icon">[icon class="fa fa-shopping-cart fa-3x" link=""][/icon]</div>
               <br/>
               <div class="dashboard-button-name">Purchases</div>
            </a>
         </li>
         <li class="dashboard-nav">
            <a href="subscriptions">
               <div class="dashboard-icon">[icon class="fa fa-trophy fa-3x" link=""][/icon]</div>
               <br/>
               <div class="dashboard-button-name">Subscriptions</div>
            </a>
         </li>
         <li class="dashboard-nav">
            <a href="#about">
               <div class="dashboard-icon">[icon class="fa fa-folder-open fa-3x" link=""][/icon]</div>
               <br/>
               <div class="dashboard-button-name">Renew</div>
            </a>
         </li>
      </ul>
   </div>
</div >
<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 background_<?php echo $user['background']; ?>" id="dashboard-right-content">
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dashboard_detail">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
         <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><span class="dashboard-name"><strong>Account</strong></span></div>
         <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><button class="dashboard-backgroud" data-target="#myModal" data-toggle="modal"><span class="customise_background">Customise your background</span><span class="customise_icon">[icon class="fa fa-cogs fa-x"][/icon]</span></button></div>
      </div>
      <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="overflow-y: scroll; max-height:85%;  margin-top: 50px; margin-bottom:50px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Please select background image</h4>
      </div>
      <div class="modal-body">
       <form name="formradio" action="your-details" method="POST"">
      <input type="hidden" name="userID" value="<?php echo $userID; ?>"> 
      <input type="hidden" name="update">  
     <label> <input type="radio" name="background" value="1" id="background1"><img src="../sites/default/files/PARALLAX_TRADIES.jpg"></label>
      <label> <input type="radio" name="background" value="2"  id="background2"><img src="../sites/default/files/ABOUT%20US/ABOUTUS1170X600.jpg"></label>
      <label> <input type="radio" name="background" value="3"  id="background3"><img src="../sites/default/files/NG_1200X600_RURAL.png"></label>
      <label> <input type="radio" name="background" value="4"  id="background4"><img src="../sites/default/files/MEDIA1170X600_5.jpg"></label>
       
      
      </div>
      <div class="modal-footer">
      
        <button type="Submit" class="btn btn-default" id="background_save">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
       </form>
    </div>

  </div>
</div>
   
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
            <ul class="nav nav-tabs">
               <li><a class="event6" style="cursor: pointer;"><span class="text-underline eventtitle6" id="yourdetails-tab"><strong>Your details</strong></span> </a></li>
           
               <li><a class="event8" style="cursor: pointer;"><span class="eventtitle8" id="membership"><strong>Membership</strong></span></a></li>
               <li><a class="event9" style="cursor: pointer;"><span class="eventtitle9" id="payment"><strong>Payment information</strong></span></a></li>
               <li><a class="event10" style="cursor: pointer;"><span class="eventtitle10" id="workplace"><strong>Workplace</strong></span></a></li>
               <li><a class="event11" style="cursor: pointer;"><span class="eventtitle11" id="education"><strong>Education</strong></span></a></li>
            </ul>
            <form action="" name="your-details" method="POST">
               <div class="down6">
                  <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 none-padding">
                     <div class="row">
                        <div class="col-lg-3">
                           <label for="prefix">Prefix</label>
                           <select class="form-control" id="Prefix" name="Prefix">
                              <option value="" <?php if (empty($details['Prefix'])) echo "selected='selected'";?> disabled>Prefix</option>
                              <option value="Prof"  <?php if ($details['Prefix'] == "Prof") echo "selected='selected'";?>>Prof</option>
                              <option value="Dr" <?php if ($details['Prefix'] == "Dr") echo "selected='selected'";?>>Dr</option>
                              <option value="Mr" <?php if ($details['Prefix'] == "Mr") echo "selected='selected'";?>>Mr</option>
                              <option value="Mrs" <?php if ($details['Prefix'] == "Mrs") echo "selected='selected'";?>>Mrs</option>
                              <option value="Miss" <?php if ($details['Prefix'] == "Miss") echo "selected='selected'";?>>Miss</option>
                              <option value="Ms" <?php if ($details['Prefix'] == "Ms") echo "selected='selected'";?>>Ms</option>
                           </select>
                        </div>
                        <div class="col-lg-6">
                           <label for="">First/preferred name</label>
                           <input type="text" class="form-control"  name="Firstname" <?php if (empty($details['Firstname'])) {echo "placeholder='First/preferred name'";}   else{ echo 'value="'.$details['Firstname'].'"'; }?>>
                        </div>
                        <div class="col-lg-3">
                           <label for="">Middle name</label>
                           <input type="text" class="form-control" name="Middle-name" <?php if (empty($details['Middle-name'])) {echo "placeholder='Middle name'";}   else{ echo 'value="'.$details['Middle-name'].'"'; }?>>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-6">
                           <label for="">Maiden name</label>
                           <input type="text" class="form-control" name="Maiden-name"  <?php if (empty($details['Maiden-name'])) {echo "placeholder='Maiden name'";}   else{ echo 'value="'.$details['Maiden-name'].'"'; }?>>
                        </div>
                        <div class="col-lg-6">
                           <label for="">Last name</label>
                           <input type="text" class="form-control" name="Lastname" <?php if (empty($details['Lastname'])) {echo "placeholder='Last name'";}   else{ echo 'value="'.$details['Lastname'].'"'; }?>>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-4">
                           <label for="">Birth Date</label>
                           <input type="date" class="form-control" name="Birth" <?php if (empty($details['Birth'])) {echo "placeholder='DOB'";}   else{ echo 'value="'.$details['Birth'].'"'; }?>>
                        </div>
                        <div class="col-lg-3 col-lg-offset-1">
                           <label for="">Gender</label>
                           <select class="form-control" id="Gender" name="Gender">
                              <option value="" <?php if (empty($details['Gender'])) echo "selected='selected'";?> disabled> Gender </option>
                              <option value="Male" <?php if ($details['Gender'] == "Male") echo "selected='selected'";?>>Male</option>
                              <option value="Female" <?php if ($details['Gender'] == "Female") echo "selected='selected'";?>>Female</option>
                              <option value="other" <?php if ($details['Gender'] == "Other") echo "selected='selected'";?>>I’d prefer not to say</option>
                           </select>
                        </div>
                     </div>
					   <div class="row">
                        <div class="col-lg-6">
                           <label for="">Phone number</label>
                           <input type="text" class="form-control" name="Home-phone-number"  <?php if (empty($details['Home-phone-number'])) {echo "placeholder='Phone number:039092 0840 '";}   else{ echo 'value="'.$details['Home-phone-number'].'"'; }?>  pattern="[0-9]{10}">
                        </div>
                        <div class="col-lg-6">
                           <label for="">Mobile number</label>
                           <input type="text" class="form-control" name="Mobile-number"  <?php if (empty($details['Mobile-number'])) {echo "placeholder='Mobile:0456089756'";}   else{ echo 'value="'.$details['Mobile-number'].'"'; }?> pattern="[0-9]{9}">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-9">
                           Aboriginal and Torres Strait Islander origin
                        </div>
                        <div class="col-lg-3">
                           <select class="form-control" id="Aboriginal" name="Aboriginal">
                              <option value="" <?php if (empty($details['Aboriginal'])) echo "selected='selected'";?>>No</option>
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
                           <input type="text" class="form-control"  name="BuildingName" <?php if (empty($details['BuildingName'])) {echo "placeholder='Building name'";}   else{ echo 'value="'.$details['BuildingName'].'"'; }?>>
                        </div>
                        <div class="col-lg-6 col-lg-offset-2">
                           <label for="">PO box</label>
                           <input type="text" class="form-control" name="Pobox"  <?php if (empty($details['Pobox'])) {echo "placeholder='PO box'";}   else{ echo 'value="'.$details['Pobox'].'"'; }?>>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-12">
                           <label for="">Address 1</label>
                           <input type="text" class="form-control" name="Address_Line_1"  <?php if (empty($details['Address_Line_1'])) {echo "placeholder='Address 1'";}   else{ echo 'value="'.$details['Address_Line_1'].'"'; }?>>
                        </div>
                     </div>
					 <div class="row">
                        <div class="col-lg-12">
                           <label for="">Address 2</label>
                           <input type="text" class="form-control" name="Address_Line_2"  <?php if (empty($details['Address_Line_2'])) {echo "placeholder='Address 2'";}   else{ echo 'value="'.$details['Address_Line_2'].'"'; }?>>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-12">
                           <label for="">City or town</label>
                           <input type="text" class="form-control" name="Suburb" <?php if (empty($details['Suburb'])) {echo "placeholder='City or town'";}   else{ echo 'value="'.$details['Suburb'].'"'; }?>>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-3">
                           <label for="">Postcode</label>
                           <input type="text" class="form-control" name="Postcode"  <?php if (empty($details['Postcode'])) {echo "placeholder='Postcode'";}   else{ echo 'value="'.$details['Postcode'].'"'; }?>>
                        </div>
                        <div class="col-lg-3">
                           <label for="">State</label>
                           <select class="form-control" id="State" name="State">
                              <option value="" <?php if (empty($details['State'])) echo "selected='selected'";?> disabled> State </option>
                              <option value="ACT" <?php if ($details['State'] == "ACT") echo "selected='selected'";?>> ACT </option>
                              <option value="NSW" <?php if ($details['State'] == "NSW") echo "selected='selected'";?>> NSW </option>
                              <option value="SA" <?php if ($details['State'] == "SA") echo "selected='selected'";?>> SA </option>
                              <option value="TAS"  <?php if ($details['State'] == "TAS") echo "selected='selected'";?>> TAS </option>
                              <option value="VIC"  <?php if ($details['State'] == "VIC") echo "selected='selected'";?>> VIC </option>
                              <option value="QLD"  <?php if ($details['State'] == "QLD") echo "selected='selected'";?>> QLD </option>
                              <option value="NT"  <?php if ($details['State'] == "NT") echo "selected='selected'";?>> NT </option>
                              <option value="WA"  <?php if ($details['State'] == "WA") echo "selected='selected'";?>> WA </option>
                           </select>
                        </div>
                     <div class="col-lg-6">
                           <label for="">Country</label>
                           <input type="text" class="form-control" name="Country"  <?php if (empty($details['Country'])) {echo "placeholder='Country'";}   else{ echo 'value="'.$details['Country'].'"'; }?>>
                        </div>
                     </div>
                     <div class="row">
				          <div class="col-lg-12"><label for="Shipping-address-join"><strong>Billing address:(Use my residential address)</strong></label><input type="checkbox" id="Shipping-address-join" name="Shipping-address-join" value="1" checked></div>
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
                           <label for="">Address 1</label>
                           <input type="text" class="form-control"  name="Billing-Address_Line_1" id="Billing-Address_Line_1" <?php if (empty($details['Billing-Address_Line_1'])) {echo "placeholder='Billing Address 1'";}   else{ echo 'value="'.$details['Billing-Address_Line_1'].'"'; }?>>
                        </div>
                       
					     <div class="col-lg-12">
                           <label for="">Address 2</label>
                           <input type="text" class="form-control" name="Billing-Address_Line_2" id="Billing-Address_Line_2" <?php if (empty($details['Billing-Address_Line_2'])) {echo "placeholder='Billing Address 2'";}   else{ echo 'value="'.$details['Billing-Address_Line_2'].'"'; }?>>
                        </div>
						<div class="col-lg-12">
                           <label for="">City or town</label>
                           <input type="text" class="form-control" name="Billing-Suburb" id="Billing-Suburb" <?php if (empty($details['Billing-Suburb'])) {echo "placeholder='Billing City/Town'";}   else{ echo 'value="'.$details['Billing-Suburb'].'"'; }?>>
                        </div>
                        <div class="col-lg-3">
                           <label for="">Postcode</label>
                           <input type="text" class="form-control" name="Billing-Postcode" id="Billing-Postcode" <?php if (empty($details['Billing-Postcode'])) {echo "placeholder='Billing Postcode'";}   else{ echo 'value="'.$details['Billing-Postcode'].'"'; }?>>
                        </div>
                        <div class="col-lg-3">
                           <label for="">State</label>
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
                           <label for="">Country</label>
                           <input type="text" class="form-control" name="Billing-Country" id="Billing-Country" <?php if (empty($details['Billing-Country'])) {echo "placeholder='Billing Country'";}   else{ echo 'value="'.$details['Billing-Country'].'"'; }?>>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-6">
                           Your dietary requirements
                        </div>
                        <div class="col-lg-6">
                           <select class="form-control" id="Dietary" name="Dietary">
                              <option value="None" <?php if (empty($details['Dietary'])) echo "selected='selected'";?>>None</option>
                              <option value="Seafood" <?php if ($details['Dietary'] == "Seafood") echo "selected='selected'";?>>Allergic to seafood</option>
                              <option value="Shellfish" <?php if ($details['Dietary'] == "Shellfish") echo "selected='selected'";?>>Allergic to shellfish</option>
                              <option value="Nuts" <?php if ($details['Dietary'] == "Nuts") echo "selected='selected'";?>>Allergic to nuts</option>
                              <option value="Eggs" <?php if ($details['Dietary'] == "Eggs") echo "selected='selected'";?>>Allergic to eggs</option>
                              <option value="Coeliac" <?php if ($details['Dietary'] == "Coeliac") echo "selected='selected'";?>>Coeliac</option>
                              <option value="Fructose " <?php if ($details['Dietary'] == "Fructose ") echo "selected='selected'";?>>Fructose intolerant</option>
                              <option value="Gluten " <?php if ($details['Dietary'] == "Gluten ") echo "selected='selected'";?>>Gluten intolerant</option>
                              <option value="Lactose " <?php if ($details['Dietary'] == "Lactose ") echo "selected='selected'";?>>Lactose intolerant</option>
                              <option value="Vegetarian" <?php if ($details['Dietary'] == "Vegetarian") echo "selected='selected'";?>>Vegetarian</option>
                              <option value="Vegan" <?php if ($details['Dietary'] == "Vegan") echo "selected='selected'";?>>Vegan</option>
                              <option value="Other" <?php if ($details['Dietary'] == "Other") echo "selected='selected'";?>>Other</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 form-right">
                     <div class="row form-image">
                        <div class="col-lg-12">
							Upload/change image
							<form action="/your-details" type="POST">
								<input type="hidden" name="PictureUpdate" value="pictureUpload">
								<input type="submit">
							</form>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-12">
                           <label for="">Member no.</label>
                           <input type="text" class="form-control" <?php if (empty($details['Memberno'])) {echo "placeholder='Member no.'";}   else{ echo 'value="'.$details['Memberno'].'"'; }?> readonly>
                        </div>
                     </div>
                      <div class="row">
                        <div class="col-lg-12">
                         <a href="changepassword" target="_self" style="color:white;">Change your password</a>
                        
                        </div>
                     </div>
                       
                  </div>
               </div>
               <div class="down8" style="display:none;" >
                  <div class="row">
                     <div class="col-lg-6">
                        <label for="">Member ID(Your email address)</label>
                        <input type="text" class="form-control" name="Memberid"  <?php if (empty($details['Memberid'])) {echo "placeholder='Member ID(Your email address)'";}   else{ echo 'value="'.$details['Memberid'].'"'; }?>>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-6">
                        <label for="">Member Type</label>
                        <select class="form-control" id="MemberType" name="MemberType" disabled>
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
                  <div class="row">
                     <div class="col-lg-2">
                        <label for="">AHPRA number</label>
                        <input type="text" class="form-control" name="Ahpranumber"  <?php if (empty($details['Ahpranumber'])) {echo "placeholder='AHPRA number'";}   else{ echo 'value="'.$details['Ahpranumber'].'"'; }?>>
                     </div>
                  </div>
				  <div class="row">
				       <div class="col-lg-6">
                        <label for="">Your National group</label>
                         <select class="chosen-select" id="Nationalgp" name="Nationalgp[]" multiple disabled>
						   <?php 
						  // get national group from Aptify via webserice return Json data;
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
				  </div>
				  
                  <div class="row">
                     <div class="col-lg-6">
                        <label for="">Your Regional group</label>
                        <input type="text" class="form-control" name="Regional-group"  <?php if (empty($details['Regional-group'])) {echo "placeholder='Your Regional group'";}   else{ echo 'value="'.$details['Regional-group'].'"'; }?>>
                     </div>
                  </div>
				   <div class="row">
                     <div class="col-lg-6">
                        <label for="">Your Branch</label>
                        <input type="text" class="form-control" name="Branch"  <?php if (empty($details['Branch'])) {echo "placeholder='Your Branch'";}   else{ echo 'value="'.$details['Branch'].'"'; }?>>
                     </div>
                  </div>
				  <div class="row"> 
                    <div class="col-lg-3">
                        Your special interest area:
                    </div>
				  </div>
				   <div class="row"> 
                    				
					  <div class="col-lg-6">
					   
                        <select class="chosen-select" id="interest-area" name="SpecialInterest[]" multiple  tabindex="-1" data-placeholder="Choose interest area...">
						  <?php 
						  // get interest area from Aptify via webserice return Json data;
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
                     <div class="col-lg-6">
                        <label for="">Status</label>
                        <input type="text" class="form-control" name="Status"  <?php if (empty($details['Status'])) {echo "placeholder='Status'";}   else{ echo 'value="'.$details['Status'].'"'; }?> readonly>
                     </div>
                  </div>
               </div>
               <div class="down9"  style="display:none;" >
			<?php
			
		   
			// 2.2.12 - GET payment listing
			// Send - 
			// UserID
			// Response -
			// Credit cards details [Credit card ID, Payment-method,
			// Name on card, Digits, Exp date, Roll over],  Main card
			$cardsnum = GetAptifyData("12", "UserID");
			//$cardsnum = $cardsnums["paymentcards"];
			//$_SESSION["cardsnum"]= $cardsnum;
			?>
                    
         <div class="row" >
            <div class="row" >
              <div class="col-lg-12"><strong>Your payment details:</strong></div>
             </div>
             <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
			 

                <div class="paymentsidecredit"> <fieldset><select  id="Paymentcard" name="Paymentcard" style="width:100%;">
				  <?php
					if (sizeof($cardsnum)!=0) {
						foreach( $cardsnum["paymentcards"] as $cardnum) {
							echo '<option value="'.$cardnum["Creditcards-ID"].'"';
							if($cardsnum["Main-Creditcard-ID"]==$cardnum["Creditcards-ID"]) {
								echo "selected";
							}
							
							echo 'data-class="'.$cardnum["Payment-method"].'">Credit card ending with ';
							echo $cardnum["Digitsnumber"].'</option>';
						}
					}
					?>
					  <?php /*if (sizeof($cardsnum)!=0): ?>   
                                   
                             <?php foreach( $cardsnum as $cardnum):  ?>
                                 <option value="<?php echo  $cardnum["Digitsnumber"];?>" data-class="<?php echo  $cardnum["Cardtype"];?>"><?php echo  $cardnum["Name"];?>&nbsp;<br>Credit card ending with <?php echo  $cardnum["Digitsnumber"];?></option>
                              <?php endforeach; ?>
                         <?php endif; */?>  
                           </select></fieldset></div>
                  
            
         </div>
		 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"> <a class="deletecardbutton">delete selected card</a>
		      <div id="deleteCardWindow" style="display:none;">

				<form action="your-details?action=delete" method="POST" id="deleteCardForm">
		        <h3>Are you sure you want to delete this card?</h3>
				<input type="hidden" name="deleteID" id="deleteID" value="">
				<input type="submit" value="Yes">
                <a target="_self" class="cancelDeleteButton">No</a>
				</form>
		</div>
		</div>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".deletecardbutton").click(function() {
					var CardID = $("#Paymentcard").val();
					$("#deleteID").val(CardID);
				});
				$(".updatecard").click(function() {
					var CardID = $("#Paymentcard").val();
					$("#selectedCard").val(CardID);
				});
				$(".setcard").click(function() {
					var CardID = $("#Paymentcard").val();
					$("#selectedCard").val(CardID);
				});
				
				
			});
		</script>
		 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">  <div class="paymentsideuse><input type="checkbox" id="anothercard"><label for="anothercard"><a  style="cursor: pointer; color:white;" id="addPaymentCard">Add a new card</a></label>
				  <div id="addPaymentCardForm" style="display:none;">
                  <form action="/your-details?action=addcard" method="POST" id="formaddcard">

				     <div class="row"><div class="col-lg-12">Add a new card:</div></div>
                     <div class="row">
					  <input type="hidden" name="addCard">
				   <div class="col-lg-12">
				        
                        <select class="form-control" id="Cardtype" name="Cardtype" placeholder="Card type">
                           <option value="AE">American Express</option>
                           <option value="Visa">Visa</option>
                           <option value="Mastercard">Mastercard</option>
                        </select>
                   </div>
				 </div>
				 <div class="row">
				   <div class="col-lg-12">
                        <input type="text" class="form-control" id="Cardname" name="Cardname" placeholder="Name on card">
                   </div>
				 </div>
				 <div class="row">
				   <div class="col-lg-12">
                        <input type="text" class="form-control" id="Cardnumber" name="Cardnumber" placeholder="Card number">
                   </div>
				 </div>
				 <div class="row">
				   <div class="col-lg-6">
                        <input type="date" class="form-control" id="Expirydate" name="Expirydate" placeholder="Expire date">
                   </div>
				 </div>
                 <div class="row"> 
				    <div class="col-lg-6">
                        <input type="text" class="form-control" id="CCV" name="CCV" placeholder="CVV">
                   </div>
				    <div class="col-lg-6">
					     <div class="tooltip">What is this?
                   <span class="tooltiptext"><img src="http://localhost/sites/default/files/MEDIA/CVV number.png" ></span>
           </div>

                        
                   </div>
				
                 </div>				 
				<div class="row">
					 <a target="_blank" class="addCartlink"><button type="submit" class="dashboard-button dashboard-bottom-button your-details-submit addCartButton">Save</button></a>
				 </div>
             </form>
    </div>
				</div>
				</div>
				<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 <?php //need to get installment data from payment ?>">
				
				</div>
        
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">  <div class="paymentsideuse><input type="checkbox" name="updatecard"><label for="updatecard"><a  style="cursor: pointer; color:white;" id="updatecard">update your card</a></label>
				  <div id="updateCardForm" style="display:none;">
                  <form action="/your-details?action=updatecard" method="POST" id="updatecard">
				     <div class="row"><div class="col-lg-12">Update your card:</div></div>
                     
					 <input type="hidden" name="selectedCard">
				
				 <div class="row">
				   <div class="col-lg-6">
                        <input type="date" class="form-control"  name="Expirydate" placeholder="Expire date">
                   </div>
				 </div>
                 <div class="row"> 
				    <div class="col-lg-6">
                        <input type="text" class="form-control"  name="CVV" placeholder="CVV">
                   </div>
				    <div class="col-lg-6">
					     <div class="tooltip">What is this?
  <span class="tooltiptext"><img src="http://localhost/sites/default/files/MEDIA/CVV number.png" ></span>
</div>
                      
                   </div>
				
                 </div>				 
				<div class="row">
					 <a target="_blank" class="addCartlink"><button type="submit" class="dashboard-button dashboard-bottom-button your-details-submit addCartButton">Save</button></a>
				 </div>
             </form>
    </div>
				</div>
				</div>
				</div>
		 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"> <a  style="cursor: pointer; color:white;" id="rolloverButton">Change your roll over status</a>
		      <div id="rollOverWindow" style="display:none;">

				<form action="your-details?action=rollover" method="POST" id="rollOverForm">
		        <h3>Are you sure you do want to change roll over status next year?</h3>
				 <input type="hidden" name="selectedCard">
				 <label for="rollover">Roll over</label><input type="checkbox" id="rollover" checked> 
				 <input type="submit" value="Yes">
                <a target="_self" class="cancelDeleteButton">No</a>
				</form>
		    </div>
		 </div>
		  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"> <a  style="cursor: pointer; color:white;" id="setCardButton">Set your main credit card</a>
		      <div id="setCardWindow" style="display:none;">

				<form action="your-details?action=setCard" method="POST" id="setCardForm">
		         <h3>Are you sure you do want to set selected car as main creadit card</h3>
				 <input type="hidden" name="selectedCard">
				
				 <input type="submit" value="Yes">
                <a target="_self" class="cancelDeleteButton">No</a>
				</form>
		    </div>
		 </div>
      </div>
  
                  <div class="row payment-line">
                      <div class="col-lg-12"><label for="Shipping-address-dup"><strong>Shipping address:Check box to use your saved residential address</strong></label><input type="checkbox" id="Shipping-address-dup"></div>
                  </div>
                  <div class="row">
                     <div class="col-lg-6">
                        <label for="">POBox</label>
                        <input type="text" class="form-control" name="Shipping-PObox" id="Shipping-PObox"  <?php if (empty($details['Shipping-PObox'])) {echo "placeholder='PObox'";}   else{ echo 'value="'.$details['Shipping-PObox'].'"'; }?>>
                     </div>
					 <div class="col-lg-6">
                        <label for="">Building Name</label>
                        <input type="text" class="form-control" name="Shipping-BuildingName" id="Shipping-BuildingName"  <?php if (empty($details['Shipping-BuildingName'])) {echo "placeholder='Building Name'";}   else{ echo 'value="'.$details['Shipping-BuildingName'].'"'; }?>>
                     </div>
                                      
                  </div>
                  <div class="row">
				      <div class="col-lg-6">
                        <label for="">Address 1</label>
                        <input type="text" class="form-control" name="Shipping-Address_Line_1" id="Shipping-Address_Line_1"  <?php if (empty($details['Shipping-Address_Line_1'])) {echo "placeholder='Address 1'";}   else{ echo 'value="'.$details['Shipping-Address_Line_1'].'"'; }?>>
                     </div> 
					  <div class="col-lg-6">
                        <label for="">Address 2</label>
                        <input type="text" class="form-control" name="Shipping-Address_Line_2" id="Shipping-Address_Line_2"  <?php if (empty($details['Shipping-Address_Line_1'])) {echo "placeholder='Address 1'";}   else{ echo 'value="'.$details['Shipping-Address_Line_2'].'"'; }?>>
                     </div> 
                  </div>
				 <div class="row">
				     <div class="col-lg-4">
                        <label for="">City or town</label>
                        <input type="text" class="form-control" name="Shipping-city-town" id="Shipping-city-town" <?php if (empty($details['Shipping-city-town'])) {echo "placeholder='City or town'";}   else{ echo 'value="'.$details['Shipping-city-town'].'"'; }?>>
                     </div>
                     <div class="col-lg-2">
                        <label for="">Postcode</label>
                        <input type="text" class="form-control" name="Shipping-postcode" id="Shipping-postcode"  <?php if (empty($details['Shipping-postcode'])) {echo "placeholder='Postcode'";}   else{ echo 'value="'.$details['Shipping-postcode'].'"'; }?>>
                     </div>
					 <div class="col-lg-2">
                        <label for="">State</label>
                        <input type="text" class="form-control" name="Shipping-state" id="Shipping-state"  <?php if (empty($details['Shipping-state'])) {echo "placeholder='State'";}   else{ echo 'value="'.$details['Shipping-state'].'"'; }?>>
                     </div>
                     <div class="col-lg-4">
                        <label for="">Country</label>
                        <input type="text" class="form-control" name="Shipping-country" id="Shipping-country"  <?php if (empty($details['Shipping-country'])) {echo "placeholder='Country'";}   else{ echo 'value="'.$details['Shipping-country'].'"'; }?>>
                     </div>
                  </div>
                
                  <div class="row payment-line">
                     <div class="col-lg-12"><label for="Mailing-address"><strong>Mailing address: Check box to duplicate residential address details</strong></label><input type="checkbox" id="Mailing-address"></div>
                  </div>
                  <div class="row">
                     <div class="col-lg-6">
                        <label for="">POBox</label>
                        <input type="text" class="form-control" name="Mailing-PObox" id="Mailing-PObox"  <?php if (empty($details['Mailing-PObox'])) {echo "placeholder='PObox'";}   else{ echo 'value="'.$details['Mailing-PObox'].'"'; }?>>
                     </div>
					 <div class="col-lg-6">
                        <label for="">Building Name</label>
                        <input type="text" class="form-control" name="Mailing-BuildingName" id="Mailing-BuildingName"  <?php if (empty($details['Mailing-BuildingName'])) {echo "placeholder='Building Name'";}   else{ echo 'value="'.$details['Mailing-BuildingName'].'"'; }?>>
                     </div>
                                      
                  </div>
                  <div class="row">
				      <div class="col-lg-6">
                        <label for="">Address 1</label>
                        <input type="text" class="form-control" name="Mailing-Address_Line_1" id="Mailing-Address_Line_1"  <?php if (empty($details['Mailing-Address_Line_1'])) {echo "placeholder='Address 1'";}   else{ echo 'value="'.$details['Mailing-Address_Line_1'].'"'; }?>>
                     </div> 
					  <div class="col-lg-6">
                        <label for="">Address 2</label>
                        <input type="text" class="form-control" name="Mailing-Address_Line_2" id="Mailing-Address_Line_2"  <?php if (empty($details['Mailing-Address_Line_2'])) {echo "placeholder='Address 1'";}   else{ echo 'value="'.$details['Mailing-Address_Line_2'].'"'; }?>>
                     </div> 
                  </div>
				 <div class="row">
				     <div class="col-lg-4">
                        <label for="">City or town</label>
                        <input type="text" class="form-control" name="Mailing-city-town" id="Mailing-city-town" <?php if (empty($details['Mailing-city-town'])) {echo "placeholder='City or town'";}   else{ echo 'value="'.$details['Mailing-city-town'].'"'; }?>>
                     </div>
                     <div class="col-lg-2">
                        <label for="">Postcode</label>
                        <input type="text" class="form-control" name="Mailing-postcode" id="Mailing-postcode"  <?php if (empty($details['Shipping-postcode'])) {echo "placeholder='Postcode'";}   else{ echo 'value="'.$details['Mailing-postcode'].'"'; }?>>
                     </div>
					 <div class="col-lg-2">
                        <label for="">State</label>
                        <input type="text" class="form-control" name="Mailing-state" id="Mailing-state"  <?php if (empty($details['Mailing-state'])) {echo "placeholder='State'";}   else{ echo 'value="'.$details['Mailing-state'].'"'; }?>>
                     </div>
                     <div class="col-lg-4">
                        <label for="">Country</label>
                        <input type="text" class="form-control" name="Mailing-country" id="Mailing-country"  <?php if (empty($details['Mailing-country'])) {echo "placeholder='Country'";}   else{ echo 'value="'.$details['Mailing-country'].'"'; }?>>
                     </div>
                  </div>
               </div>
              
               <div id="wpnumber"><?php  $wpnumber =  sizeof($details['Workplaces'])-1; echo  $wpnumber; ?></div>

                 <script type="text/javascript">
                  jQuery(document).ready(function($) {
                    
                      $('#workplace').click(function(){
                            $('#dashboard-right-content').addClass("autoscroll");
                 });
                
                      $('.add-workplace').click(function(){
                    
                        
                       var number = Number($('#wpnumber').text());
                      
                         var i = Number(number +1);
                       
                       
			 $('div[class="down10"] #tabmenu').append( '<li id="workplaceli'+ i + '"><a data-toggle="tab" href="#workplace'+ i + '">Workplace'+ i+'</a><span class="deletewp'+ i + '" style=" float: right; color: red; margin-right: 55%;">x</span></li>' );
                         $('div[class="down10"]').append('<div id="workplace'+ i +'" class="tab-pane fade"></div>');
                         $('#wpnumber').text(i);
                         $("#workplace"+ i ).load("sites/all/themes/evolve/commonFile/workplace.php", {"count":i});
                    
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
               <div class="down10" style="display:none;">
			     <div class="row">
				   <div class="col-lg-12"> <label for="Findabuddy"><strong>NOTE:</strong>Please list my details in Find a Physio (visbile to other health professionals)</label>
                        <input type="checkbox" name="Findabuddy" id="Findabuddy" value="<?php  echo $details['Findabuddy'];?>" <?php if($details['Findabuddy']==1){echo "checked";} ?>>
					</div>
				 </div> 
                   <ul class="nav nav-tabs" id="tabmenu">
                  
                        <?php foreach( $details['Workplaces'] as $key => $value ):  ?>
                   
                        <li <?php if($key=='Workplace0') echo 'class ="active" ';?>><a data-toggle="tab" href="#workplace<?php echo $key;?>"><?php echo "Workplace".$key;?></a></li>
               
                  <?php endforeach ?>   
                    </ul>
             
           
                <?php foreach( $details['Workplaces'] as $key => $value ):  ?>
                <div id="workplace<?php echo $key;?>" class='tab-pane fade  <?php if($key=='Workplace0') echo "in active ";?> '>
                 
                 <div class="row"><div class="col-lg-6"></div><div class="col-lg-6"> <label for="Findphysio<?php echo $key;?>"><strong>NOTE:</strong>This workplace is included in Find a Pyhsio.</label>
                        <input type="checkbox" name="Findphysio<?php echo $key;?>" id="Findphysio<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['Findphysio'];?>" <?php if($details['Workplaces'][$key]['Findphysio']==1){echo "checked";} ?>></div>
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
						  // get workplace settings from Aptify via webserice return Json data;
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
                     <div class="col-lg-6">
                        <label for="BuildingName">Building Name</label>
                        <input type="text" class="form-control" name="WBuildingName<?php echo $key;?>" id="WBuildingName<?php echo $key;?>" <?php if (empty($details['Workplaces'][$key]['WBuildingName'])) {echo "placeholder='Building Name'";}   else{ echo 'value="'.$details['Workplaces'][$key]['WBuildingName'].'"'; }?>>
                     </div>
                     <div class="col-lg-2">
                        <label for="WAddress_Line_1<?php echo $key;?>">Address line 1</label>
                        <input type="text" class="form-control" name="Wunit<?php echo $key;?>" id="WAddress_Line_1<?php echo $key;?>"  <?php if (empty($details['Workplaces'][$key]['Address_Line_1'])) {echo "placeholder='Address line 1'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Address_Line_1'].'"'; }?>>
                     </div>
                     <div class="col-lg-4">
                        <label for="WAddress_Line_2<?php echo $key;?>">Address line 2</label>
                        <input type="text" class="form-control" name="WAddress_Line_2<?php echo $key;?>" id="WAddress_Line_2<?php echo $key;?>"  <?php if (empty($details['Workplaces'][$key]['Address_Line_2'])) {echo "placeholder='Address line 2'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Address_Line_2'].'"'; }?>>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-3">
                        <label for="Wcity<?php echo $key;?>">City/Town</label>
                        <input type="text" class="form-control" name="Wcity<?php echo $key;?>" id="Wcity<?php echo $key;?>"  <?php if (empty($details['Workplaces'][$key]['Wcity'])) {echo "placeholder='City or town'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Wcity'].'"'; }?>>
                     </div>
                     <div class="col-lg-3">
                        <label for="Wpostcode<?php echo $key;?>">Postcode</label>
                        <input type="text" class="form-control" name="Wpostcode<?php echo $key;?>" id="Wpostcode<?php echo $key;?>"  <?php if (empty($details['Workplaces'][$key]['Wpostcode'])) {echo "placeholder='Postcode'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Wpostcode'].'"'; }?>>
                     </div>
                     <div class="col-lg-3">
                        <label for="Wstate<?php echo $key;?>">State</label>
                        <input type="text" class="form-control" name="Wstate<?php echo $key;?>" id="Wstate<?php echo $key;?>"  <?php if (empty($details['Workplaces'][$key]['Wstate'])) {echo "placeholder='State'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Wstate'].'"'; }?>>
                     </div>
                     <div class="col-lg-3">
                        <label for="Wcountry<?php echo $key;?>">Country</label>
                        <input type="text" class="form-control" name="Wcountry<?php echo $key;?>" id="Wcountry<?php echo $key;?>"  <?php if (empty($details['Workplaces'][$key]['Wcountry'])) {echo "placeholder='Country'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Wcountry'].'"'; }?>>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-6">
                        <label for="Wemail<?php echo $key;?>">Workplace email</label>
                        <input type="text" class="form-control" name="Wemail<?php echo $key;?>" id="Wemail<?php echo $key;?>"  <?php if (empty($details['Workplaces'][$key]['Wemail'])) {echo "placeholder='Workplace email'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Wemail'].'"'; }?>>
                     </div>
                     <div class="col-lg-3">
                        <label for="Wwebaddress<?php echo $key;?>">Website</label>
                        <input type="text" class="form-control" name="Wwebaddress<?php echo $key;?>" id="Wwebaddress<?php echo $key;?>"  <?php if (empty($details['Workplaces'][$key]['Wwebaddress'])) {echo "placeholder='Website'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Wwebaddress'].'"'; }?>>
                     </div>
                     <div class="col-lg-3">
                        <label for="Wphone<?php echo $key;?>">Phone number</label>
                        <input type="text" class="form-control" name="Wphone<?php echo $key;?>" id="Wphone<?php echo $key;?>"  <?php if (empty($details['Workplaces'][$key]['Wphone'])) {echo "placeholder='Phone number'";}   else{ echo 'value="'.$details['Workplaces'][$key]['Wphone'].'"'; }?>>
                     </div>
                  </div>
               
                         <div class="row">
                     <div class="col-lg-3">
                        Does this workplace offer additional languages?<br/>
                      
                     </div>
                     <div class="col-lg-3">
                        <select class="chosen-select" id="Additionallanguage<?php echo $key;?>" name="Additionallanguage<?php echo $key;?>" multiple  tabindex="-1" data-placeholder="Choose an additional language...">
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
                         <input type="text" class="form-control" name="QIP<?php echo $key;?>" id="QIP<?php echo $key;?>"  <?php if (empty($details['Workplaces'][$key]['QIP'])) {echo "placeholder='QIP Number'";}   else{ echo 'value="'.$details['Workplaces'][$key]['QIP'].'"'; }?>>
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
                  </div>
                    
                   <div class="row">
                     <div class="col-lg-3">
                        Numbers of hours worked
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
                   <?php /*
				   <p>[animate type="fadeInUp"]</p>
                  <p>[accordions class="question"]</p>
                 <p>[accordion title="Your interest area"]</p>
                    
                       <div class="row"> 
                    <div class="col-lg-3">
                        Your special interest area:
                    </div>
                  </div>
				  
                  <div class="row">
                    <div class="col-lg-4">
                    <input type="checkbox" name="Acupuncture-dry-needing<?php echo $key;?>" id="Acupuncture-dry-needing<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Acupuncture-dry-needing'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Acupuncture-dry-needing']==1){echo "checked";} ?>> <label for="Acupuncture-dry-needing<?php echo $key;?>">Acupuncture and dry needling</label>
                   
                    </div>
                     <div class="col-lg-4">
                      <input type="checkbox" name="Adolescents<?php echo $key;?>" id="Adolescents<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Adolescents'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Adolescents']==1){echo "checked";} ?>> <label for="Adolescents<?php echo $key;?>">Adolescents</label>
                    </div>
                       <div class="col-lg-4">
                    <input type="checkbox" name="Ageing-well<?php echo $key;?>" id="Ageing-well<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Ageing-well'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Ageing-well']==1){echo "checked";} ?>> <label for="Ageing-well<?php echo $key;?>">Ageing well</label>
                    </div>
                  
                 </div>
                  <div class="row">
                       <div class="col-lg-4">
                    <input type="checkbox" name="Amputees<?php echo $key;?>" id="Amputees<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Amputees'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Amputees']==1){echo "checked";} ?>> <label for="Amputees<?php echo $key;?>">Amputees</label>
                    </div>
                        <div class="col-lg-4">
                      <input type="checkbox" name="Arthritis<?php echo $key;?>" id="Arthritis<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Arthritis'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Arthritis']==1){echo "checked";} ?>> <label for="Arthritis<?php echo $key;?>">Arthritis</label>
                    </div>
                    <div class="col-lg-4">
                    <input type="checkbox" name="Babies-children<?php echo $key;?>" id="Babies-children<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Babies-children'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Babies-children']==1){echo "checked";} ?>> <label for="Babies-children<?php echo $key;?>">Babies and children</label>
                    </div>
                   </div>
                  <div class="row">
                      <div class="col-lg-4">
                    <input type="checkbox" name="Back-neck<?php echo $key;?>" id="Back-neck<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Back-neck'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Back-neck']==1){echo "checked";} ?>> <label for="Back-neck<?php echo $key;?>">Back and neck</label>
                    </div>
                     <div class="col-lg-4">
                    <input type="checkbox" name="Bowel<?php echo $key;?>" id="Bowel<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Bowel'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Bowel']==1){echo "checked";} ?>> <label for="Bowel<?php echo $key;?>">Bowel and bladder health</label>
                    </div>
                      <div class="col-lg-4">
                    <input type="checkbox" name="Brain<?php echo $key;?>" id="Brain<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Brain'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Brain']==1){echo "checked";} ?>> <label for="Brain<?php echo $key;?>">Brain and spinal cord</label>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-4">
                    <input type="checkbox" name="Cancer<?php echo $key;?>" id="Cancer<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Cancer'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Cancer']==1){echo "checked";} ?>> <label for="Cancer<?php echo $key;?>">Cancer and lympheodema</label>
                    </div>
                     <div class="col-lg-4">
                    <input type="checkbox" name="Chronic-pain<?php echo $key;?>" id="Chronic-pain<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Chronic-pain'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Chronic-pain']==1){echo "checked";} ?>> <label for="Chronic-pain<?php echo $key;?>">Chronic pain</label>
                    </div>
                     <div class="col-lg-4">
                    <input type="checkbox" name="Wdisability<?php echo $key;?>" id="Wdisability<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Wdisability'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Wdisability']==1){echo "checked";} ?>> <label for="Wdisability<?php echo $key;?>">Disability</label>
                    </div>
                  </div>
                    <div class="row">
                      <div class="col-lg-4">
                    <input type="checkbox" name="Wdiabetes<?php echo $key;?>" id="Wdiabetes<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Wdiabetes'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Wdiabetes']==1){echo "checked";} ?>> <label for="Wdiabetes<?php echo $key;?>">Diabetes</label>
                    </div>
                     <div class="col-lg-4">
                    <input type="checkbox" name="Feldenkrais<?php echo $key;?>" id="Feldenkrais<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Feldenkrais'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Feldenkrais']==1){echo "checked";} ?>> <label for="Feldenkrais<?php echo $key;?>">Feldenkrais</label>
                    </div>
                      <div class="col-lg-4">
                    <input type="checkbox" name="Hand-therapy<?php echo $key;?>" id="Hand-therapy<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Hand-therapy'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Hand-therapy']==1){echo "checked";} ?>> <label for="Hand-therapy<?php echo $key;?>">Hand therapy</label>
                    </div>
                  </div>
                  <div class="row">
                        <div class="col-lg-4">
                    <input type="checkbox" name="Head-face<?php echo $key;?>" id="Head-face<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Head-face'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Head-face']==1){echo "checked";} ?>> <label for="Head-face<?php echo $key;?>">Head and face</label>
                    </div>
                         <div class="col-lg-4">
                    <input type="checkbox" name="Healthwork<?php echo $key;?>" id="Healthwork<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Healthwork'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Healthwork']==1){echo "checked";} ?>> <label for="Healthwork<?php echo $key;?>">Health at work</label>
                    </div>
                     <div class="col-lg-4">
                    <input type="checkbox" name="Heart-lung<?php echo $key;?>" id="Heart-lung<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Heart-lung'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Heart-lung']==1){echo "checked";} ?>> <label for="Heart-lung<?php echo $key;?>">Heart and lung health</label>
                    </div>
                  </div>
                    <div class="row">
                        <div class="col-lg-4">
                    <input type="checkbox" name="Hydrotherapy<?php echo $key;?>" id="Hydrotherapy<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Hydrotherapy'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Hydrotherapy']==1){echo "checked";} ?>> <label for="Hydrotherapy<?php echo $key;?>">Hydrotherapy</label>
                    </div>
                         <div class="col-lg-4">
                    <input type="checkbox" name="Lower-limbs<?php echo $key;?>" id="Lower-limbs<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Lower-limbs'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Lower-limbs']==1){echo "checked";} ?>> <label for="Lower-limbs<?php echo $key;?>">Lower limbs</label>
                    </div>
                     <div class="col-lg-4">
                    <input type="checkbox" name="Wmen-health<?php echo $key;?>" id="Wmen-health<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Wmen-health'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Wmen-health']==1){echo "checked";} ?>> <label for="Wmen-health<?php echo $key;?>">Men’s health</label>
                    </div>
                  </div>
                        <div class="row">
                        <div class="col-lg-4">
                    <input type="checkbox" name="Neurological-conditions<?php echo $key;?>" id="Neurological-conditions<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Neurological-conditions'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Neurological-conditions']==1){echo "checked";} ?>> <label for="neurological-conditions<?php echo $key;?>">Neurological conditions</label>
                    </div>
                         <div class="col-lg-4">
                    <input type="checkbox" name="Worthopaedics<?php echo $key;?>" id="Worthopaedics<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Worthopaedics'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Worthopaedics']==1){echo "checked";} ?>> <label for="Worthopaedics<?php echo $key;?>">Orthopaedics</label>
                    </div>
                     <div class="col-lg-4">
                    <input type="checkbox" name="Palliative-care<?php echo $key;?>" id="Palliative-care<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Palliative-care'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Palliative-care']==1){echo "checked";} ?>> <label for="Palliative-care<?php echo $key;?>">Palliative care</label>
                    </div>
                  </div>
                     <div class="row">
                        <div class="col-lg-4">
                    <input type="checkbox" name="Pilates<?php echo $key;?>" id="Pilates<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Pilates'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Pilates']==1){echo "checked";} ?>> <label for="Pilates<?php echo $key;?>">Pilates</label>
                    </div>
                         <div class="col-lg-4">
                    <input type="checkbox" name="Pre-post<?php echo $key;?>" id="Pre-post<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Pre-post'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Pre-post']==1){echo "checked";} ?>> <label for="Pre-post<?php echo $key;?>">Pre and post-natal</label>
                    </div>
                     <div class="col-lg-4">
                    <input type="checkbox" name="Pre-surgey<?php echo $key;?>" id="Pre-surgey<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Pre-surgey'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Pre-surgey']==1){echo "checked";} ?>> <label for="Pre-surgey<?php echo $key;?>">Pre and post-surgery</label>
                    </div>
                  </div>
                   <div class="row">
                        <div class="col-lg-4">
                    <input type="checkbox" name="Stroke-recovery<?php echo $key;?>" id="Stroke-recovery<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Stroke-recovery'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Stroke-recovery']==1){echo "checked";} ?>> <label for="Stroke-recovery<?php echo $key;?>">Stroke recovery</label>
                    </div>
                         <div class="col-lg-4">
                    <input type="checkbox" name="Sexual-health<?php echo $key;?>" id="Sexual-health<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Sexual-health'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Sexual-health']==1){echo "checked";} ?>> <label for="Sexual-health<?php echo $key;?>">Sexual health</label>
                    </div>
                     <div class="col-lg-4">
                    <input type="checkbox" name="Sport-injuries<?php echo $key;?>" id="Sport-injuries<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Sport-injuries'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Sport-injuries']==1){echo "checked";} ?>> <label for="Sport-injuries<?php echo $key;?>">Sport injuries</label>
                    </div>
                  </div>
                 <div class="row">
                        <div class="col-lg-4">
                    <input type="checkbox" name="Upper-limbs<?php echo $key;?>" id="Upper-limbs<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Upper-limbs'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Upper-limbs']==1){echo "checked";} ?>> <label for="Upper-limbs<?php echo $key;?>">Upper limbs</label>
                    </div>
                         <div class="col-lg-4">
                    <input type="checkbox" name="Women-health<?php echo $key;?>" id="Women-health<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Women-health'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Women-health']==1){echo "checked";} ?>> <label for="Women-health<?php echo $key;?>">Women’s health</label>
                    </div>
                     <div class="col-lg-4">
                    <input type="checkbox" name="Yoga<?php echo $key;?>" id="Yoga<?php echo $key;?>" value="<?php  echo $details['Workplaces'][$key]['SpecialInterest']['Yoga'];?>" <?php if($details['Workplaces'][$key]['SpecialInterest']['Yoga']==1){echo "checked";} ?>> <label for="Yoga<?php echo $key;?>">Yoga</label>
                    </div>
                  </div>
                 */ ?>
                  <p>[/accordion]</p>
                  <p>[/accordions]</p>
                  <p>[/animate]</p>
                  <a class="add-workplace"><span class="dashboard-button-name">Add workplace</span></a>
                </div>
            
              <?php endforeach ?>
               </div>
               <div class="down11" style="display:none;" >
                  <div class="row">
                     <div class="col-lg-6">
                        <label for="Udegree">Undergraduate degree</label>
                        <input type="text" class="form-control" name="Udegree" id="Udegree"  <?php if (empty($details['Udegree'])) {echo "placeholder='Undergraduate degree'";}   else{ echo 'value="'.$details['Udegree'].'"'; }?>>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-6">
                        <label for="undergraduate-university-name">Undergraduate university name</label>
                        <input type="text" class="form-control" name="Undergraduate-university-name" id="Undergraduate-university-name"  <?php if (empty($details['Undergraduate-university-name'])) {echo "placeholder='Undergraduate university name'";}   else{ echo 'value="'.$details['Undergraduate-university-name'].'"'; }?>>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-4">
                        <label for="ugraduate-country">Country</label>
                        <input type="text" class="form-control" name="Ugraduate-country" id="Ugraduate-country"  <?php if (empty($details['Ugraduate-country'])) {echo "placeholder='Country'";}   else{ echo 'value="'.$details['Ugraduate-country'].'"'; }?>>
                     </div>
                     <div class="col-lg-2">
                        <label for="ugraduate-year-attained">Year attained</label>
                        <input type="text" class="form-control" name="Ugraduate-year-attained" id="Ugraduate-year-attained"  <?php if (empty($details['Ugraduate-year-attained'])) {echo "placeholder='Year attained'";}   else{ echo 'value="'.$details['Ugraduate-year-attained'].'"'; }?>>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-6">
                        <label for="pdegree">Postgraduate degree</label>
                        <input type="text" class="form-control" name="Pdegree" id="Pdegree"  <?php if (empty($details['Pdegree'])) {echo "placeholder='Postgraduate degree'";}   else{ echo 'value="'.$details['Pdegree'].'"'; }?>>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-6">
                        <label for="postgraduate-university-name">Postgraduate university name</label>
                        <input type="text" class="form-control" name="Postgraduate-university-name" id="Postgraduate-university-name"  <?php if (empty($details['Postgraduate-university-name'])) {echo "placeholder='Postgraduate university name'";}   else{ echo 'value="'.$details['Postgraduate-university-name'].'"'; }?>>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-4">
                        <label for="pgraduate-country">Country</label>
                        <input type="text" class="form-control" name="Pgraduate-country" id="Pgraduate-country"  <?php if (empty($details['Pgraduate-country'])) {echo "placeholder='Country'";}   else{ echo 'value="'.$details['Pgraduate-country'].'"'; }?>>
                     </div>
                     <div class="col-lg-2">
                        <label for="pgraduate-year-attained">Year attained</label>
                        <input type="text" class="form-control" name="Pgraduate-year-attained" id="Pgraduate-year-attained"  <?php if (empty($details['Pgraduate-year-attained'])) {echo "placeholder='Year attained'";}   else{ echo 'value="'.$details['Pgraduate-year-attained'].'"'; }?>>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-6">
                        <label for="Additional-qualifications">Additional qualifications</label>
                        <input type="text" class="form-control" name="Additional-qualifications" id="Additional-qualifications"  <?php if (empty($details['Additional-qualifications'])) {echo "placeholder='Additional qualifications'";}   else{ echo 'value="'.$details['Additional-qualifications'][0].'"'; }?>>
                     </div>
                  </div>
               </div>
               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding" id="your-details-button">   <button  class="dashboard-button dashboard-bottom-button your-details-submit"><span class="dashboard-button-name">Submit</span></button></div>
            </form>
            <form id="changePasswordForm">
               <div class="down7" style="display:none;" >
                  <div class="row">
                     <div class="col-lg-6">
                        <input type="password" class="form-control" placeholder="Current password" value="" name="Password">
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-6">
                        <input type="password" class="form-control" placeholder="New password" id="New_password" name="New_password">
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-6">
                        <input type="password" class="form-control" placeholder="Confirm password" id="Confirm_password" name="Confirm_password">
                     </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding:0;">   <button  class="dashboard-button dashboard-bottom-button change-password-button"><span class="dashboard-button-name">Save</span></button></div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="http://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
  
  

<script>

jQuery(document).ready(function($){
$.widget( "custom.iconselectmenu", $.ui.selectmenu, {
      _renderItem: function( ul, item ) {
        var li = $( "<li>" ),
          wrapper = $( "<div>", { text: item.label } );
 
        if ( item.disabled ) {
          li.addClass( "ui-state-disabled" );
        }
 
        $( "<span>", {
          style: item.element.attr( "data-style" ),
          "class": "ui-icon " + item.element.attr( "data-class" )
        })
          .appendTo( wrapper );
 
        return li.append( wrapper ).appendTo( ul );
      }
    });
 
  
 
    $( "#Paymentcard" )
      .iconselectmenu()
      .iconselectmenu( "menuWidget" )
        .addClass( "ui-menu-icons customicons" );

} );
</script>
<style>
fieldset {
      border: 0;
    }
  
 
    /* select with custom icons */
    .ui-selectmenu-menu .ui-menu.customicons .ui-menu-item-wrapper {
      padding: 0.5em 0 0.5em 3em;
    }
    .ui-selectmenu-menu .ui-menu.customicons .ui-menu-item .ui-icon {
      height: 24px;
      width: 24px;
      top: 0.1em;
    }
    .ui-icon.Master{
      background: url("http://localhost/sites/default/files/logo_apa_0.png") 0 0 no-repeat;
    }
    .ui-icon.Visa{
      background: url("http://localhost/sites/default/files/logo_apa_0.png") 0 0 no-repeat;
    }
    .ui-icon.AE{
      background: url("http://localhost/sites/default/files/logo_apa_0.png") 0 0 no-repeat;
    }
</style>
