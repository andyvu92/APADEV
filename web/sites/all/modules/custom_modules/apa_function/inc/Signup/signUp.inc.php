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
							  <?php
									$Gendercode  = file_get_contents("sites/all/themes/evolve/json/Gender.json");
									$Gender=json_decode($Gendercode, true);						
									foreach($Gender  as $key => $value){
										echo '<option value="'.$Gender[$key]['ID'].'"';
									
										echo '> '.$Gender[$key]['Description'].' </option>';
									}
								?>
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
		