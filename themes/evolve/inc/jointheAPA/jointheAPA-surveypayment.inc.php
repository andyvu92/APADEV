<?php 
if(isset($_POST['step2-1'])) {
	$postInsuranceData = array();
	$postInsuranceData['ID'] = "-1";
	$postInsuranceData['EntityName'] = "PersonInsuranceData__c";
	if(isset($_SESSION['LinkId'])){ $postInsuranceData['PersonID'] = $_SESSION['LinkId']; } 
	if(isset($_POST['Claim'])){ $postInsuranceData['MalpracticeClaim'] = $_POST['Claim']; }
	if(isset($_POST['Facts'])){ $postInsuranceData['InsuredClaimRisk'] = $_POST['Facts']; }
	if(isset($_POST['Disciplinary'])){ $postInsuranceData['ExternalDisciplinaryProceedings'] = $_POST['Disciplinary']; }
	if(isset($_POST['Decline'])){ $postInsuranceData['InsurerDeclinedInsurance'] = $_POST['Decline']; }
	if(isset($_POST['Oneclaim'])){ $postInsuranceData['MoreThanOneClaim'] = $_POST['Oneclaim']; }
	if($_POST['Addtionalquestion']=="1"){
		if(isset($_POST['Yearclaim'])){ $postInsuranceData['Yearofclaim'] = $_POST['Yearclaim']; }
		if(isset($_POST['Nameclaim'])){ $postInsuranceData['ClaimantName'] = $_POST['Nameclaim']; }
		if(isset($_POST['Fulldescription'])){ $postInsuranceData['Description'] = $_POST['Fulldescription']; }
		if(isset($_POST['Amountpaid'])){ $postInsuranceData['AmountPaid'] = $_POST['Amountpaid']; }
		if(isset($_POST['Finalisedclaim'])){ $postInsuranceData['ClaimFinalised'] = $_POST['Finalisedclaim']; }
		if(isset($_POST['Businiessname'])){ $postInsuranceData['BusinessNameOwned'] = $_POST['Businiessname']; }	
	}
	else{
		$postInsuranceData['Yearofclaim'] ="";
		$postInsuranceData['ClaimantName'] ="";
		$postInsuranceData['Description']="";
		$postInsuranceData['AmountPaid'] ="";
		$postInsuranceData['ClaimFinalised'] ="";
		$postInsuranceData['BusinessNameOwned'] = "";
	}		
	
	//test data end here
    // 2.2.40 - Get user insurance data
	// Send - 
	// UserID 
	// Response -UserID & insurance data
	$data = array();
	$data['ID'] = $_SESSION["UserId"];
	$insuarnceData = GetAptifyData("40", $data,""); // #_SESSION["UserID"];
	if(sizeof($insuarnceData['results'])!=0){
		if($postInsuranceData['MalpracticeClaim']!=$insuarnceData['results'][0]['Claim'] || $postInsuranceData['InsuredClaimRisk']!=$insuarnceData['results'][0]['Facts'] || $postInsuranceData['ExternalDisciplinaryProceedings']!=$insuarnceData['results'][0]['Disciplinary'] || $postInsuranceData['InsurerDeclinedInsurance']!=$insuarnceData['results'][0]['Decline']|| $postInsuranceData['MoreThanOneClaim']!=$insuarnceData['results'][0]['Oneclaim']){
		$submitTag=true;
        		
	}
		else{$submitTag=false;}
		if($postInsuranceData['Yearofclaim'] != $insuarnceData['results'][0]['Yearclaim'] || $postInsuranceData['ClaimantName'] != $insuarnceData['results'][0]['Nameclaim'] || $postInsuranceData['Description'] != $insuarnceData['results'][0]['Fulldescription']|| $postInsuranceData['AmountPaid'] != $insuarnceData['results'][0]['Amountpaid']|| $postInsuranceData['ClaimFinalised'] != $insuarnceData['results'][0]['Finalisedclaim']|| $postInsuranceData['BusinessNameOwned'] != $insuarnceData['results'][0]['Businiessname']){
		$submitTag=true;
       		
	}
	else{$submitTag=false;}
		
    }
	else{
		$submitTag=true;
	}
	
	
	// 2.2.41 Send insurance data to Aptify webservice
	// Send - 
	// userID & insurance data
	// Response -??????????????????????set in the future
    
	if($submitTag){$testData = GetAptifyData("41", $postInsuranceData); }
	
}
  ?>
<div id="tipsBlock" class="<?php if($_POST['insuranceStatus']=="1") {echo "display";} else { echo "display-none";}?>"><span style="color:red;">Unfortunately, we cannot let you proceed with this membership purchase. Please contact the APA member hub (include email link) or on 1 300 306 622 for more information.</span></div>
<form id="join-insurance-form" action="jointheapa" method="POST">
	<input type="hidden" name="step2" value="2"/>
	<div class="down6" <?php if(isset($_POST['step2-1']) || (isset($_POST['step1'])&& $_POST['insuranceTag']=="0"))echo 'style="display:block;"'; else { echo 'style="display:none;"';}?>>
		<div class="row">
			<div class="col-xs-12">
			<label>Do you currently or plan to provide services to professional sport people in the AFL, A League, ARU, NRL, Cricket Australia or Olympic Representatives?</label>
			</div>
			<div class="col-xs-12"><input type="radio" id="s1" name="s1" value="Yes"><label for="s1">Yes</label></div>
			<div class="col-xs-12"><input type="radio" id="s1-1" name="s1" value="No"><label for="s1-1">No</label></div>
		</div>

		<div class="row">
			<div class="col-xs-12">
				<label>Number of professional sports people treated within the last 12 months</label>
			</div>
			<div class="col-xs-6 col-md-3">
				<input type="text" class="form-control" name="s2" id="s2" placeholder="Amount">
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12">
			<label>Percentage of your income obtained from professional sports people</label>
			</div>
			<div class="col-xs-6 col-md-3">
				<input type="text" class="form-control" name="s3" id="s3" placeholder="%">
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12">
			<label>Do you currently or plan to provide services to thoroughbred horses?</label>
			</div>
			<div class="col-xs-12"><input type="radio" id="s4" name="s4" value="Yes"><label for="s4">Yes</label></div>
			<div class="col-xs-12"><input type="radio" id="s4-1" name="s4" value="No"><label for="s4-1">No</label></div>
		</div>

		<div class="row">
			<div class="col-xs-12">
			<label>Number of thoroughbred horses treated within the last 12 months</label>
			</div>
			<div class="col-xs-6 col-md-3">
				<input type="text" class="form-control" name="s5" id="s5" placeholder="Amount">
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12">
			<label>Percentage of your income obtained from thoroughbred horses</label>
			</div>
			<div class="col-xs-6 col-md-3">
				<input type="text" class="form-control" name="s6" id="s6" placeholder="%">
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">  <a class="join-details-button6 <?php if(isset($_POST['insuranceStatus'])&&$_POST['insuranceStatus']=="1") {echo "disabled";}  ?>"><span class="dashboard-button-name">Next</span></a><a class="your-details-prevbutton<?php if(isset($_POST['step1'])&& $_POST['insuranceTag']=="0"){echo "5";} else {echo "6";}?>"><span class="dashboard-button-name">Last</span></a></div>
	</div>
	<div class="down7" <?php if(isset($_POST['goP']))echo 'style="display:block;"'; else { echo 'style="display:none;"';}?>>
		<div class="row">
			<div class="col-xs-12">
			<label>Payment options:</label>
			</div>

			<div class="row">
				<div class="col-xs-12">
				<input type="radio" name ="Paymentoption" id="p1-1" value="0" checked="checked"><label for="p1-1">Full payment</label>
				</div>

				<div class="col-xs-12">
				<input type="radio" name ="Paymentoption" id="p1-2" value="1"><label for="p1-2">Monthly instalments (This option incurs a $12.00 admin fee)</label>
				</div>
				</div>

				<input type="hidden" id="Installpayment-frequency" name="Installpayment-frequency" value="">
			</div>

		<div class="row">
			<div class="col-xs-12"><label>PRF donation</label></div>
			<div class="col-xs-6 col-md-3">
				<select class="form-control" id="PRF" name="PRF">
					<option value="">$0.00</option>
					<option value="5">$5.00</option>
					<option value="10">$10.00</option>
					<option value="20">$20.00</option>
					<option value="30">$30.00</option>
					<option value="50">$50.00</option>
					<option value="100">$100.00</option>
					<option value="200">$200.00</option>
					<option value="500">$500.00</option>
					<option value="other">Other</option>
				</select>
				<a style="color: black;" href="#">What is this?</a>
			</div>
		</div>
	<?php 
	// 2.2.12 - Get payment list
	// Send - 
	// UserID 
	// Response -payment card list
	$test['id'] = $_SESSION["UserId"];
	$cardsnum = GetAptifyData("12", $test);
	print_r($cardsnum);?>
	<?php if (sizeof($cardsnum["results"])!=0): ?>  
		<div class="row">					
			<fieldset>
				<select id="Paymentcard" name="Paymentcard">
					<?php
					
						foreach( $cardsnum["results"] as $cardnum) {
							echo '<option value="'.$cardnum["Creditcards-ID"].'"';
							if($cardnum["IsDefault"]=="1") {
							echo "selected ";
						}
						echo 'data-class="'.$cardnum["Payment-Method"].'">Credit card ending with ';
						echo $cardnum["Digitsnumber-Cardtype-Default"].'</option>';
						}
					
					?>
				</select>
			</fieldset>
			<input type="checkbox" id="anothercard"><label for="anothercard">Use another card</label>
		</div> 

		<div id="anothercardBlock" style="margin: 0; padding:0" class="display-none col-xs-12">
		<div class="row">
			<div class="col-xs-6 col-md-3">
				<select class="form-control" id="Cardtype" name="Cardtype" placeholder="Card type">
				<?php 
					$PaymentTypecode  = file_get_contents("sites/all/themes/evolve/json/PaymentType.json");
					$PaymentType=json_decode($PaymentTypecode, true);
					foreach($PaymentType  as $pair => $value){
						echo '<option value="'.$PaymentType[$pair]['ID'].'"';
						echo '> '.$PaymentType[$pair]['Name'].' </option>';
						
					}
				?>	
				</select>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-md-3">
				<input type="text" class="form-control" id="Cardname" name="Cardname" placeholder="Name on card">
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-md-6">
				<input type="text" class="form-control" id="Cardnumber" name="Cardnumber" placeholder="Card number">
			</div>

			<div class="col-xs-6 col-md-3">
				<input type="text" class="form-control" id="Expirydate" name="Expirydate" placeholder="Expire date" maxlength="4">
			</div>

			<div class="col-xs-6 col-md-3">
				<input type="text" class="form-control" id="CCV" name="CCV" placeholder="CCV">
			</div>
		</div>
		<div class="col-xs-12">
			<input type="checkbox" id="addcardtag" name="addcardtag" value="1" checked><label for="addcardtag">Do you want to save this card</label></div>
			<input type="hidden" name="addCard" value="0">
		</div>
	<?php endif; ?>  
	<?php if (sizeof($cardsnum["results"])==0): ?> 
	<div id="anothercardBlock" class="row">				   
		<div class="row">
			<div class="col-xs-12">
				<select class="form-control" id="Cardtype" name="Cardtype" placeholder="Card type">
				<?php 
					$PaymentTypecode  = file_get_contents("sites/all/themes/evolve/json/PaymentType.json");
					$PaymentType=json_decode($PaymentTypecode, true);
					foreach($PaymentType  as $pair => $value){
						echo '<option value="'.$PaymentType[$pair]['ID'].'"';
						echo '> '.$PaymentType[$pair]['Name'].' </option>';
						
					}
				?>
				</select>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-md-3">
				<input type="text" class="form-control" id="Cardname" name="Cardname" placeholder="Name on card">
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-md-6">
				<input type="text" class="form-control" id="Cardnumber" name="Cardnumber" placeholder="Card number">
			</div>

			<div class="col-xs-6 col-md-3">
				<input type="text" class="form-control" id="Expirydate" name="Expirydate" placeholder="Expire date" maxlength="4">
			</div>

			<div class="col-xs-6 col-md-3">
				<input type="text" class="form-control" id="CCV" name="CCV" placeholder="CVV">
			</div>
		</div>
		<div class="col-xs-12">
			<input type="checkbox" id="addcardtag" name="addcardtag" value="1" checked><label for="addcardtag">Do you want to save this card</label>
			<input type="hidden" name="addCard" value="1">
		</div>

	</div>
	<?php endif; ?>  
		<div class="row">
			<div class="col-xs-12">
				<input type="checkbox" id="privacypolicy" checked><label id="privacypolicyl">Privacy policy</label>
			</div>

			<div class="col-xs-12">
				<input type="checkbox" id="instalmentpolicy" checked><label id="instalmentpolicyl">Instalment/payment policy</label>
			</div>

			<div class="col-xs-12 display-none" id="rolloverblock">
				<input type="checkbox" name="Rollover" id="Rollover"><label for="Rollover">Roll over</label>
			</div>
		</div>   
		<div class="col-xs-12">  <a href="javascript:document.getElementById('join-insurance-form').submit();" class="join-details-button7"><span class="dashboard-button-name">Next</span></a><a class="your-details-prevbutton7"><span class="dashboard-button-name">Last</span></a></div>
	</div>
</form>
<form id="tempform" action="" method="POST"><input type="hidden" name="goI"></form>	
<?php logRecorder();  ?>