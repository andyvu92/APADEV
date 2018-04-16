<?php  
if(isset($_POST['step2-1'])) {
	$postInsuranceData = array();
	if(isset($_SESSION['userID'])){ $postInsuranceData['userID'] = $_SESSION['userID']; } 
	if(isset($_POST['Claim'])){ $postInsuranceData['Claim'] = $_POST['Claim']; }
	if(isset($_POST['Facts'])){ $postInsuranceData['Facts'] = $_POST['Facts']; }
	if(isset($_POST['Disciplinary'])){ $postInsuranceData['Disciplinary'] = $_POST['Disciplinary']; }
	if(isset($_POST['Decline'])){ $postInsuranceData['Decline'] = $_POST['Decline']; }
	if(isset($_POST['Oneclaim'])){ $postInsuranceData['Oneclaim'] = $_POST['Oneclaim']; }
	if(isset($_POST['Addtionalquestion']) && $_POST['Addtionalquestion'] == "1"){ 
		$postInsuranceData['Addtionalquestion'] = $_POST['Addtionalquestion'];
		if(isset($_POST['Yearclaim'])){ $postInsuranceData['Yearclaim'] = $_POST['Yearclaim']; }
		if(isset($_POST['Nameclaim'])){ $postInsuranceData['Nameclaim'] = $_POST['Nameclaim']; }
		if(isset($_POST['Fulldescription'])){ $postInsuranceData['Fulldescription'] = $_POST['Fulldescription']; }
		if(isset($_POST['Amountpaid'])){ $postInsuranceData['Amountpaid'] = $_POST['Amountpaid']; }
		if(isset($_POST['Finalisedclaim'])){ $postInsuranceData['Finalisedclaim'] = $_POST['Finalisedclaim']; } 
	}
	else{ $postInsuranceData['Addtionalquestion'] = "0";}
	if(isset($_POST['Businiessname'])){ $postInsuranceData['Businiessname'] = $_POST['Businiessname']; }

	// 2.2.* Send insurance data to Aptify webservice
	// Send - 
	// userID & insurance data
	// Response -??????????????????????set in the future
    $testData = GetAptifyData("31", $postInsuranceData);
}
  ?>
<form id="join-insurance-form" action="jointheapa" method="POST">
	<input type="hidden" name="step2" value="2"/>
	<div class="down6" <?php if(isset($_POST['step2-1']))echo 'style="display:block;"'; else { echo 'style="display:none;"';}?>>
		<div class="row">
			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			Do you currently or plan to provide services to professional sport people in the AFL, A League, ARU, NRL, Cricket Australia or Olympic Representatives?
			</div>
			<div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="s1">Yes</label><input type="radio" id="s1" name="s1" value="Yes"></div>
			<div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="s1-1">No</label><input type="radio" id="s1-1" name="s1" value="No"></div>
		</div>
		<div class="row">
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			Number of professional sports people treated within the last 12 months
			</div>
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><input type="text" class="form-control" name="s2" id="s2" placeholder="Amount"></div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			Percentage of your income obtained from professional sports people
			</div>
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><input type="text" class="form-control" name="s3" id="s3" placeholder="%"></div>
		</div>
		<div class="row">
			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			Do you currently or plan to provide services to thoroughbred horses?
			</div>
			<div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="s4">Yes</label><input type="radio" id="s4" name="s4" value="Yes"></div>
			<div class="col-xs-10 col-sm-10 col-md-1 col-lg-1"><label for="s4-1">No</label><input type="radio" id="s4-1" name="s4" value="No"></div>
		</div>
		<div class="row">
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			Number of thoroughbred horses treated within the last 12 months
			</div>
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><input type="text" class="form-control" name="s5" id="s5" placeholder="Amount"></div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			Percentage of your income obtained from thoroughbred horses
			</div>
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><input type="text" class="form-control" name="s6" id="s6" placeholder="%"></div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">  <a class="join-details-button6"><span class="dashboard-button-name">Next</span></a><a href="jointheapa?goI" class="your-details-prevbutton6"><span class="dashboard-button-name">Last</span></a></div>
	</div>
	<div class="down7" style="display:none;" >
		<div class="row">
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
			Payment options:
			</div>
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9"><label for="p1-1">Full payment</label><input type="radio" name ="Paymentoption" id="p1-1" value="full" checked="checked"><label for="p1-2">Monthly instalments</label><input type="radio" name ="Paymentoption" id="p1-2" value="monthly">This option incurs a $12.00 admin fee.</div>
		    <input type="hidden" id="Installpayment-frequency" name="Installpayment-frequency" value="">
		</div>
		<div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">PRF donation</div></div>
		<div class="row">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<select class="form-control" id="PRF" name="PRF">
					<option value="">$0.00</option>
					<option value="5">$5.00</option>
					<option value="10">$10.00</option>
					<option value="20">$20.00</option>
					<option value="30">$30.00</option>
					<option value="50">$50.00</option>
					<option value="100">$100.00</option>
					<option value="other">Other</option>
				</select>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">What is this?</div>
		</div>
	<?php 
	// 2.2.12 - Get payment list
	// Send - 
	// UserID 
	// Response -payment card list
	$cardsnum = GetAptifyData("12", "userID");?>
	<?php if (sizeof($cardsnum)!=0): ?>  
		<div class="row">					
			<fieldset>
				<select id="Paymentcard" name="Paymentcard">
					<?php foreach( $cardsnum["paymentcards"] as $cardnum):  ?>
					<option value="<?php echo  $cardnum["Digitsnumber"];?>" <?php if($cardsnum["Main-Creditcard-ID"]==$cardnum["Creditcards-ID"]) echo "selected"; ?> data-class="<?php echo  $cardnum["Payment-method"];?>">Credit card ending with <?php echo  $cardnum["Digitsnumber"];?></option>
					<?php endforeach; ?>
				</select>
			</fieldset>
		</div> 
		<div class="row">
			<input type="checkbox" id="anothercard"><label for="anothercard">Use another card</label>
		</div>
		<div id="anothercardBlock" class="display-none col-lg-12">
		<div class="row">
			<div class="col-lg-3">
				<select class="form-control" id="Cardtype" name="Cardtype" placeholder="Card type">
					<option value="AE">American Express</option>
					<option value="Visa">Visa</option>
					<option value="Mastercard">Mastercard</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<input type="text" class="form-control" id="Cardname" name="Cardname" placeholder="Name on card">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<input type="text" class="form-control" id="Cardnumber" name="Cardnumber" placeholder="Card number">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<input type="date" class="form-control" id="Expirydate" name="Expirydate" placeholder="Expire date">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3">
				<input type="text" class="form-control" id="CCV" name="CCV" placeholder="CCV">
			</div>
		</div>
		<input type="hidden" name="addCard" value="0">
		</div>
	<?php endif; ?>  
	<?php if (sizeof($cardsnum)==0): ?> 
	<div id="anothercardBlock" class="col-lg-12">				   
		<div class="row">
			<div class="col-lg-3">
				<select class="form-control" id="Cardtype" name="Cardtype" placeholder="Card type">
					<option value="" disabled>Card type</option>
					<option value="AE">American Express</option>
					<option value="Visa">Visa</option>
					<option value="Mastercard">Mastercard</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<input type="text" class="form-control" id="Cardname" name="Cardname" placeholder="Name on card">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<input type="text" class="form-control" id="Cardnumber" name="Cardnumber" placeholder="Card number">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<input type="date" class="form-control" id="Expirydate" name="Expirydate" placeholder="Expire date">
			</div>
			<div class="col-lg-3">
				<input type="text" class="form-control" id="CCV" name="CCV" placeholder="CVV">
			</div>
		</div>
		<input type="hidden" name="addCard" value="1">
	</div>
	<?php endif; ?>  
		<div class="row">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><label id="privacypolicyl">Privacy policy</label><input type="checkbox" id="privacypolicy" checked></div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><label id="instalmentpolicyl">Instalment/payment policy</label><input type="checkbox" id="instalmentpolicy" checked></div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 display-none" id="rolloverblock"><label for="Rollover">Roll over</label><input type="checkbox" name="Rollover" id="Rollover"></div>
		</div>   
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">  <a href="javascript:document.getElementById('join-insurance-form').submit();" class="join-details-button7"><span class="dashboard-button-name">Next</span></a><a class="your-details-prevbutton7"><span class="dashboard-button-name">Last</span></a></div>
	</div>
</form>
	