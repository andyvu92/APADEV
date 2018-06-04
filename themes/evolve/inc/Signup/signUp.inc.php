<?php
//1. for create web user

if(isset($_POST['step1'])) {
	$postData = array();
	if(isset($_POST['Firstname'])){ $postData['Firstname'] = $_POST['Firstname']; }
	if(isset($_POST['Lastname'])){ $postData['Lastname'] = $_POST['Lastname']; }
	if(isset($_POST['Prefix'])){ $postData['Prefix'] = $_POST['Prefix']; }
	if(isset($_POST['Birth'])){ $postData['birth'] = str_replace("-","/",$_POST['Birth']); }
	if(isset($_POST['Gender'])){ $postData['Gender'] = $_POST['Gender']; }
	if(isset($_POST['Address_Line_1'])){ $postData['Unit'] = $_POST['Address_Line_1']; }
	if(isset($_POST['Address_Line_2'])){ $postData['Street'] = $_POST['Address_Line_2']; }
	if(isset($_POST['Suburb'])){ $postData['Suburb'] = $_POST['Suburb']; }
	if(isset($_POST['Postcode'])){ $postData['Postcode'] = $_POST['Postcode']; }
	if(isset($_POST['State'])){ $postData['State'] = $_POST['State']; }
	if(isset($_POST['Country'])){ $postData['Country'] = $_POST['Country']; }
	if(isset($_POST['Memberid'])){ $postData['Memberid'] = $_POST['Memberid'];}
	if(isset($_POST['Password'])){ $postData['Password'] = $_POST['Password'];}
	//test data start from here
	/*$postData['Firstname']="testjh20180517";
	
	$postData['Lastname']="testjh";
	$postData['Prefix'] ="Mr.";
	$postData['Birth']="1978-10-05";
	$postData['Gender']="Male";

	$postData['Unit']="Line 1 Business Add1";
	$postData['Street']="Line 2 Business Add1";

	$postData['AddressLine3']="Line 3 Business Add";
	$postData['State']="KY";
	$postData['Suburb']="Chaplin";
	$postData['Postcode']="40012";
	$postData['Country']="Australia";
	$postData['Memberid']="testjh20180517@hotmail.com";
	$postData['Password']="!!Aptify@1234";*/
	
	
	
	
	//test data end here
	/*if(isset($_POST['Prefix'])){ $postData['Prefix'] = $_POST['Prefix']; } else { $postData['Prefix'] = '';}
	if(isset($_POST['Firstname'])){ $postData['Firstname'] = $_POST['Firstname']; }
	if(isset($_POST['Lastname'])){ $postData['Lastname'] = $_POST['Lastname']; }
	if(isset($_POST['Birth'])){ $postData['Birth'] = $_POST['Birth']; }
	if(isset($_POST['Gender'])){ $postData['Gender'] = $_POST['Gender']; }
	if(isset($_POST['Memberid'])){ $postData['Memberid'] = $_POST['Memberid']; }
	if(isset($_POST['Password'])){ $postData['Password'] = $_POST['Password'];}
	//if(isset($_POST['country-code'])){ $postData['Home-phone-countrycode'] = $_POST['country-code']; }
	//if(isset($_POST['area-code'])){ $postData['Home-phone-areacode'] = $_POST['area-code']; }
	//if(isset($_POST['phone-number'])){ $postData['Home-phone-number'] = $_POST['phone-number']; }
	//if(isset($_POST['Mobile-countrycode'])){ $postData['Mobile-countrycode'] = $_POST['Mobile-countrycode']; }
	//if(isset($_POST['Mobile-areacode'])){ $postData['Mobile-areacode'] = $_POST['Mobile-areacode']; }
	//if(isset($_POST['Mobile-number'])){ $postData['Mobile-number'] = $_POST['Mobile-number']; }
	//if(isset($_POST['Aboriginal'])){ $postData['Aboriginal'] = $_POST['Aboriginal']; }
	//if(isset($_POST['BuildingName'])){ $postData['BuildingName'] = $_POST['BuildingName']; }
	if(isset($_POST['Address_Line_1'])){ $postData['Unit'] = $_POST['Address_Line_1']; }
	//if(isset($_POST['Pobox'])){ $postData['Pobox'] = $_POST['Pobox']; }
	if(isset($_POST['Address_Line_2'])){ $postData['Street'] = $_POST['Address_Line_2']; }
	if(isset($_POST['Suburb'])){ $postData['Suburb'] = $_POST['Suburb']; }
	if(isset($_POST['Postcode'])){ $postData['Postcode'] = $_POST['Postcode']; }
	if(isset($_POST['State'])){ $postData['State'] = $_POST['State']; }
	if(isset($_POST['Country'])){ $postData['Country'] = $_POST['Country']; }
	*/
	
		//test update data,please remove later 
	/*$postData['Prefix']="Mr.";
	$postData['Firstname']="testjh20180517";
	$postData['Preferred-name']="testjh";
	$postData['Middle-name']="testjh";
	$postData['Lastname']="testjh";
	$postData['birth']="10/5/1975";
	$postData['Gender']="Male";
	$postData['Aboriginal']="Abo";
	$postData['Home-country-code']="91";
	$postData['Home-area-code']="023";
	$postData['Home-phone-number']="1235";
	$postData['Mobile-area-code']="90";
	$postData['Mobile-number']="99892798081";
	$postData['BuildingName']="Line 1 Business Add1";
	$postData['Address_Line_1']="Line 2 Business Add1";
	$postData['Pobox']="40012";
	$postData['AddressLine3']="Line 3 Business Add";
	$postData['State']="KY";
	$postData['Suburb']="Chaplin";
	$postData['Postcode']="40012";
	$postData['Country']="Australia";
	$postData['Memberid']="testjh20180517@hotmail.com";
	$postData['Password']="!!Aptify@1234";
	$postData['MemberType']="Full Time Private Insured";
	$postData['Ahpranumber']="123";
	$postData['Branch']="MyBranch";
	$postData['Billing-BuildingName']="Line 1 Billing Add";
	$postData['BillingAddress_Line_1']="Line 2 Billing Add";
	$postData['BillingAddress_Line_2']="Line 3 Billing Add";
	$postData['Billing-Suburb']="NEW FARM";
	$postData['Billing-State']="QLD";
	$postData['Billing-Postcode']="4007";
	$postData['Billing-Country']="Australia";
	$postData['D20Tick']="4007";
	$postData['ShippingBuildingName']="Line 1 Home Add";
	$postData['Shipping-Address_line_1']="Line 2 Home Add Line 3 POBox Add";
	$postData['Shipping-Address_line_2']="Line 2 Home Add Line 4 Home Add";
	$postData['Shipping-city-town']="BARDON";
	$postData['Shipping-state']="QLD";
	$postData['Shipping-country']="Australia";
	$postData['Shipping-postcode']="40057";
	$postData['Mailing-BuildingName']="Line 1 Home Add";
	$postData['MailingAddress_line_1']="Line 2 Home Add Line 3 POBox Add";
	$postData['Mailing-Address_line_2']="Line 2 Home Add Line 4 Home Add";
	$postData['Mailing-city-town']="BARDON";
	$postData['Mailing-state']="QLD";
	$postData['Mailing-country']="BARDON";
	$postData['PSpecialInterestAreaID']="38,16";
	$temppostWorkplacesData= array();
	$postWorkplacesData['Name-of-workplace']="Practice Ravi-test";
	$postWorkplacesData['Name']="Practice Ravi-test";
	$postWorkplacesData['Findphysio']="True";
	$postWorkplacesData['Find-a-buddy']="False";
	$postWorkplacesData['Workplace-settingName']="12";
	$postWorkplacesData['WBuildingName']="Practice Line1";
	$postWorkplacesData['Address_Line_1']="Practice Line 2";
	$postWorkplacesData['Address_Line_2']="Practice Line 3";
	$postWorkplacesData['Wcity']="DOUGLAS";
	$postWorkplacesData['Wpostcode']="4354";
	$postWorkplacesData['Wstate']="QLD";
	$postWorkplacesData['Wcountry']="Australia";
	$postWorkplacesData['Wemail']="test.shivdas@aptify.com";
	$postWorkplacesData['Wwebaddress']="www.aptify.com";
	$postWorkplacesData['WPhoneCountryCode']="61";
	$postWorkplacesData['WPhoneAreaCode']="03";
	$postWorkplacesData['WPhone']="487810";
	$postWorkplacesData['WPhoneExtentions']="93";
	$postWorkplacesData['Additionallanguage']="Additionallanguage";
	$postWorkplacesData['Wwebaddress']="www.aptify.com";
	$postWorkplacesData['Electronic-claiming']="True";
	$postWorkplacesData['Hicaps']="True";
	$postWorkplacesData['Healthpoint']="True";
	$postWorkplacesData['Departmentva']="True";
	$postWorkplacesData['Workerscompensation']="True";
	$postWorkplacesData['Motora']="True";
	$postWorkplacesData['Medicare']="True";
	$postWorkplacesData['Homehospital']="Homehospital";
	$postWorkplacesData['MobilePhysio']="True";
	$postWorkplacesData['SpecialInterestAreaID']="2,35";
	$postWorkplacesData['SpecialInterestArea']="Development";
	$postWorkplacesData['AdditionalLanguage']="5,52";
	$postWorkplacesData['Number-workedhours']="05-08";
	array_push($temppostWorkplacesData, $postWorkplacesData);
	$postData['Workplaces']=$temppostWorkplacesData;
	$tempPersonEducationData = array();
	$postPersonEducationData['Udegree']="1";
	$postPersonEducationData['Ugraduate-country']="1";
	$postPersonEducationData['Undergraduateuniversity-name']="My Company Name";
	$postPersonEducationData['Ugraduate-yearattained']="4/28/2019";
	array_push($tempPersonEducationData, $postPersonEducationData);
	$postData['PersonEducation']=$tempPersonEducationData;
	$postData['Status']="17";
	$postData['Specialty']="mySpec";//FACP member will show this field
	*/
	//test data end here
// 2.2.5 - Member detail - Update
// Send - 
// UserID & detail data
// Response -Update Success message & UserID & detail data

// for new user join a member call user registeration web service	
$resultdata = GetAptifyData("42", $postData); print_r($resultdata);
//when create user successfully call login web service to login in APA website automatically.
//after login successfully get UserID as well to store on APA shopping cart database
if($resultdata['result']) { 
	$_SESSION["UserName"] = $postData['Memberid'];
	$_SESSION["Password"] = $postData['Password'];
	// call webservice login. Eddy will provide login -process functionality---put code here
	// login sucessful unset session
	loginManager($_SESSION["UserName"], $_SESSION["Password"]);
	unset($_SESSION["UserName"]);
	unset($_SESSION["Password"]);
}
}
?>
    <form id="your-detail-form" action="signup" method="POST">
		<input type="hidden" name="step1" value="1"/>
		    <div class="down1" style="display:block;">
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 none-padding">
                    <div class="row">
                        <div class="col-lg-3">
				            <label for="prefix">Prefix<span class="tipstyle">*</span></label>
							<?php 
							$Prefixcode  = file_get_contents("sites/all/themes/evolve/json/Prefix.json");
							$Prefix=json_decode($Prefixcode, true);
							?>
                            <select class="form-control" id="Prefix" name="Prefix">
							<?php 
							foreach($Prefix  as $key => $value){
								echo '<option value="'.$Prefix[$key]['ID'].'"';
								echo '> '.$Prefix[$key]['Prefix'].' </option>';
							}
							?>
							</select>
                        </div>
						
                        <div class="col-lg-3">
                           <label for="">First name<span class="tipstyle">*</span></label>
                           <input type="text" class="form-control"  name="Firstname">
                        </div>
						
                    </div>
                    <div class="row">
                        
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
					<div class="col-lg-6">
						<label for="">Member ID(Your email address)<span class="tipstyle">*</span></label>
						<input type="text" class="form-control" name="Memberid" id="Memberid" value="" onchange="checkEmailFunction(this.value)">
					<div id="checkMessage"></div>
					<script>
					function checkEmailFunction(email) {
						$.ajax({
						url:"sites/all/themes/evolve/inc/jointheAPA/jointheAPA-checkEmail.php", 
						type: "POST", 
						data: {CheckEmailID: email},
						success:function(response) { 
						var result = response;
						if(result=="T"){
							$('#checkMessage').html("this email address has already registered, please use another one");
							$( "#Memberid" ).focus();
							$("#Memberid").css("border", "1px solid red");
							$(".join-details-button2").addClass("display-none");
							
						}
						else{
							$('#checkMessage').html("");
							$( "#Memberid" ).blur();
							$("#Memberid").css("border", "");
							$(".join-details-button2").removeClass("display-none");
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
						<div class="col-lg-4">
						<label for="">Address line 1<span class="tipstyle">*</span></label>
						<input type="text" class="form-control"  name="Address_Line_1" id="Address_Line_1">
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
								<?php 
								$statecode  = file_get_contents("sites/all/themes/evolve/json/State.json");
								$State=json_decode($statecode, true);
								foreach($State  as $key => $value){
								echo '<option value="'.$State[$key]['Abbreviation'].'"';
							    echo '> '.$State[$key]['Abbreviation'].' </option>';
							
								}
								?>
							</select>
						</div>
						<div class="col-lg-6">
							<label for="">Country<span class="tipstyle">*</span></label>
							<select class="form-control" id="Country" name="Country">
							<?php 
							$countrycode  = file_get_contents("sites/all/themes/evolve/json/Country.json");
							$country=json_decode($countrycode, true);
							foreach($country  as $key => $value){
								echo '<option value="'.$country[$key]['Country'].'"';
								echo '> '.$country[$key]['Country'].' </option>';
								
							}
							?>
					        </select>
						</div>
					</div>
					            			
				</div>
                	
				
            </div>
	
			
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">  <a href="javascript:document.getElementById('your-detail-form').submit();" class="join-details-button4"><span class="dashboard-button-name">Submit</span></a></div>
		
    </form>
		