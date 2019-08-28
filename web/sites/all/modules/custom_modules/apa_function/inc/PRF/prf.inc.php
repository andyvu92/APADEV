<?php if(isset($_SESSION["UserId"])) : ?>


<?php
if(isset($_POST["POSTPRF"])) {
	$OrderSend['userID'] = $_SESSION["UserId"];
	$OrderSend['InsuranceApplied'] = 0;
	$OrderSend['Paymentoption'] = 0;
	$OrderSend['InstallmentFor'] = "Membership";
	$OrderSend['InstallmentFrequency'] = "";
	$OrderSend['CampaignCode'] = "";
	if(isset($_POST['anothercard'])){
		$OrderSend['PaymentTypeID'] = $_POST['Cardtype'];
		$OrderSend['CCNumber'] = $_POST['Cardnumber'];
		$OrderSend['CCExpireDate'] = $_POST['Expirydate'];
		$OrderSend['CCSecurityNumber'] = $_POST['CCV'];
		$OrderSend['Card_number'] = "";	
	}
	else{
		$OrderSend["Card_number"] = $_POST["Paymentcard"];
	}
	if($_POST["PRF"]=="Other") {$OrderSend['PRFdonation'] = $_POST["PRFOther"];} 
	else {$OrderSend['PRFdonation']=$_POST["PRF"];}
	$OrderSend['productID'] = array();
	$registerOuts = aptify_get_GetAptifyData("26", $OrderSend);
	$recordOrder = array();
	//new array to record specific fields
	$recordOrder['userID'] = $OrderSend['userID'];
	$recordOrder['PRFdonation'] = $OrderSend['PRFdonation'];
	$recordOrder['Card_number'] = $OrderSend['Card_number'];
	$recordOrder['productID'] = $OrderSend['productID'];
	$recordOrder['PaymentTypeID'] = $OrderSend['PaymentTypeID'];
	if($OrderSend['CCNumber'] !=""){  $recordOrder['CCNumber'] = substr($OrderSend['CCNumber'], -4); }
	else{ $recordOrder['CCNumber'] = $OrderSend['CCNumber'];}
	$recordOrder['InsuranceApplied'] = $OrderSend['InsuranceApplied'];
	$recordOrder['Paymentoption'] = $OrderSend['Paymentoption'];
	$recordOrder['InstallmentFor'] = $OrderSend['InstallmentFor'];
	$recordOrder['InstallmentFrequency'] = $OrderSend['InstallmentFrequency'];
	$recordOrder['CampaignCode'] = $OrderSend['CampaignCode'];
	$invoice_ID = $registerOuts['Invoice_ID'];
	if(isset($_POST['addcardtag'])){
		// 2.2.15 - Add payment method
		// Send - 
		// UserID, Cardtype,Cardname,Cardnumber,Expirydate,CCV
		// Response -
		// N/A.
		if(isset($_SESSION['UserId'])){ $postPaymentData['userID'] = $_SESSION['UserId']; }
		if(isset($_POST['Cardtype'])){ $postPaymentData['Payment-method'] = $_POST['Cardtype']; }
		if(isset($_POST['Cardnumber'])){ $postPaymentData['Cardno'] = $_POST['Cardnumber']; }
		if(isset($_POST['Expirydate'])){ $postPaymentData['Expiry-date'] = $_POST['Expirydate'];}
		if(isset($_POST['CCV'])){ $postPaymentData['CCV'] = $_POST['CCV'];}
		$out = aptify_get_GetAptifyData("15",$postPaymentData); 
		if($out["result"]=="Failed"){ 
			if($out["Message"]=="Expiry date lenght should be 4."){
				drupal_set_message('<div class="checkMessage">Please enter a valid expiry date.</div>',"error");
			}
			elseif($out["Message"]=="CCV accepts up to 4 digit."){
				drupal_set_message('<div class="checkMessage">Please enter a valid CCV number.</div>',"error");
			}
			elseif((strpos($out["Message"], 'Month must be between one and twelve') !== false)){
				drupal_set_message('<div class="checkMessage">Please enter a valid expiry date.</div>',"error");
			}
			elseif($out["Message"]=="Please enter a valid End Date occurring after the Start Date."){
				drupal_set_message('<div class="checkMessage">Please enter a valid expiry date.</div>',"error");
			}
			elseif((strpos($out["Message"], 'credit card number') !== false)){
				drupal_set_message('<div class="checkMessage">Please enter a valid credit card number.</div>',"error");
			}
			elseif((strpos($out["Message"], 'Invalid CCV number') !== false)){
				drupal_set_message('<div class="checkMessage">Please enter a valid CCV number.</div>',"error");
			}
			elseif($out["result"]=="Failed" && (strpos($out["Message"], 'Invalid Credit Card Number') !== false)){
				drupal_set_message('<div class="checkMessage">Please enter a valid credit card number.</div>',"error");
			}
			else{
				drupal_set_message('<div class="checkMessage">There was an unexpected error with your payment details, please go back and check they are correct, or contact the APA.</div>',"error");
			}
		}
	
	}
	
}
$test['id'] = $_SESSION["UserId"];
$cardsnum = aptify_get_GetAptifyData("12", $test);
  	
?>
<?php if(isset($registerOuts['Invoice_ID']) && $registerOuts['Invoice_ID']!=="0"): ?>
<?php
	// record member log for successful process
	if(isset($_SESSION['UserName'])){ $addMemberLog["userID"] = $_SESSION['UserName'];  } 
	$addMemberLog["orderID"] = "0";
	$addMemberLog["jsonMessage"] = json_encode($recordOrder)."<br/><br/>".json_encode($registerOuts);
	$addMemberLog["createDate"] = date('Y-m-d');
	$addMemberLog["type"] =  "PRF";
	$addMemberLog["logError"] = 0;
	add_Member_Log($addMemberLog);
	?>
<div class="flex-container">


<div id="prf-donation-container-after">
	<div class="header-banner">
		<img style="display: block" src="/sites/default/files/PRF_155x56.png" alt="Physiotherapy Research Foundation">
		<h1 class="lead-heading cairo">Thankyou for your support.</h1>
	</div>
	<span class="sub-heading">Your donation is now on its way to funding the latest physiotherapy research.</span>
	<span class="direction-link">Go to my <a href="/your-purchases">Dashboard</a></span>
	<div class="featured-image"><img src="sites/default/files/prf-images/prf-thankyou.png"></div>
</div>

</div>
<?php elseif(isset($_POST["POSTPRF"])):?>

<div id="prf-donation-container">
	<div class="header-banner">
		<img style="display: block" src="/sites/default/files/PRF_155x56.png" alt="Physiotherapy Research Foundation">
		<h2 class="lead-heading cairo">Donate to the PRF.</h2>
	</div>
<form action="" method="POST" style="width:100%;">
	<input type="hidden" name="POSTPRF" id="POSTPRF">

		<?php if (sizeof($cardsnum["results"])!=0): ?>  
	<div class="flex-container">
		<div class="flex-cell">
			<div class="flex-col-12">					
				<fieldset>
					<label for="">Payment method:<span class="tipstyle"> *</span></label>
					<div class="chevron-select-box">
						<select id="Paymentcard" name="Paymentcard">
							<?php
							
								foreach( $cardsnum["results"] as $cardnum) {
									echo '<option value="'.$cardnum["Creditcards-ID"].'"';
									if($cardnum["IsDefault"]=="1") {
									echo "selected ";
								}
								echo 'data-class="'.$cardnum["Payment-Method"].'">____ ____ ____ ';
								echo $cardnum["Digitsnumber-Cardtype-Default"].'</option>';
								}
							
							?>
						</select>
					</div>
				</fieldset>
			</div>
		</div>

		<div class="flex-cell">
			<div class="flex-col-12">
				<input class="styled-checkbox" type="checkbox" id="anothercard" name="anothercard">
				<label for="anothercard">Use another card</label>
			</div>
		</div> 
	</div>

	<div class="flex-container" id="anothercardBlock" style="margin: 0; padding:0" class="display-none col-xs-12">
		<div class="flex-cell">
			<div class="flex-col-12">
				<div class="chevron-select-box">
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
		</div>

		<div class="flex-cell">
			<div class="flex-col-12">
				<label>Name on card:<span class="tipstyle"> *</span></label>
				<input type="text" class="form-control" id="Cardname" name="Cardname" placeholder="Name on card">
			</div>
		</div>

		<div class="flex-cell">
			<div class="flex-col-12">
				<label>Card number:<span class="tipstyle"> *</span></label>
				<input type="text" class="form-control" id="Cardnumber" name="Cardnumber" placeholder="Card number" maxlength="16">
			</div>
		</div>

		<div class="flex-cell card-uniq">
			<div class="flex-col-6">
				<label>Expiry date:<span class="tipstyle"> *</span></label>
				<input type="text" class="form-control" id="Expirydate" name="Expirydate" placeholder="mmyy(eg:0225)" maxlength="4">
			</div>

			<div class="flex-col-6">
				<label>CVV:<span class="tipstyle"> *</span></label>
				<input type="text" class="form-control" id="CCV" name="CCV" placeholder="CVV" maxlength="4">
			</div>
			<div class="flex-col-6 tooltip-container top" style="margin-top: 10px;">
					<span class="tooltip-activate">What is CVV?</span>
					<div class="tooltip-content">
						<h4>What is a Card Verification Number?</h4>
						<span class="tooltip-img"><img src="/sites/default/files/general-icon/cvn-image.png"></span>
						<span>For Visa and Mastercard enter the last three digits on the signature strip. For American Express, enter the four digits in small print on the front of the card.</span>
					</div>
			</div>
		</div>
        <div class="flex-cell">
			<div class="flex-col-12">
				<input class="styled-checkbox" type="checkbox" id="addcardtag" name="addcardtag"><label for="addcardtag">Save this card</label>
				<span class="save_card_msg">Paying for your APA membership via instalments? Are you using a different/new card to make this purchase?
	Please note: if you opt to save this credit card, it will automatically become your default card for your instalment payments. If you wish to continue using your previous default card to make instalment payments, don’t save this card.</span>
	            <span class="save_card_msg"> To confirm that we can receive payments from your nominated credit card a one off
                verification charge of $1 will be deducted from your account. This amount will be refunded immediately
                upon payment confirmation.</span>	
			</div>
		</div>
		<!--<div class="flex-cell">
			<div class="flex-col-12">
				<input class="styled-checkbox" type="checkbox" id="addcardtag" name="addcardtag" value="1" checked><label for="addcardtag">Do you want to save this card</label>
			</div>
				<input type="hidden" name="addCard" value="0">
		</div>-->
	</div>
	<?php endif; ?>  
	<?php if (sizeof($cardsnum["results"])==0): ?> 
	<div class="flex-container show" id="anothercardBlock">	
		<div class="flex-cell">
			<div class="flex-col-12">
				<input class="styled-checkbox" type="checkbox" name="anothercard">
				
			</div>
		</div> 
		<div class="flex-cell">
			<div class="flex-col-12">
				<label for="">Payment method:<span class="tipstyle"> *</span></label>
				<div class="chevron-select-box">
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
		</div>

		<div class="flex-cell">
			<div class="flex-col-12">
				<label>Name on card:<span class="tipstyle"> *</span></label>
				<input type="text" class="form-control" id="Cardname" name="Cardname" placeholder="Name on card">
			</div>
		</div>

		<div class="flex-cell">
			<div class="flex-col-12">
				<label>Card number:<span class="tipstyle"> *</span></label>
				<input type="text" class="form-control" id="Cardnumber" name="Cardnumber" placeholder="Card number" maxlength="16">
			</div>
		</div>

		<div class="flex-cell card-uniq">
			<div class="flex-col-6">
				<label>Expiry date:<span class="tipstyle"> *</span></label>
				<input type="text" class="form-control" id="Expirydate" name="Expirydate" placeholder="mmyy(eg:0225)" maxlength="4">
			</div>

			<div class="flex-col-6">
				<label>CVV:<span class="tipstyle"> *</span></label>
				<input type="text" class="form-control" id="CCV" name="CCV" placeholder="CVV" maxlength="4">
			</div>
			<div class="flex-col-6 tooltip-container top" style="margin-top: 10px;">
				<span class="tooltip-activate">What is CVV?</span>
				<div class="tooltip-content">
						<h4>What is a Card Verification Number?</h4>
						<span class="tooltip-img"><img src="/sites/default/files/general-icon/cvn-image.png"></span>
						<span>For Visa and Mastercard enter the last three digits on the signature strip. For American Express, enter the four digits in small print on the front of the card.</span>
				</div>
			</div>
		</div>
        <div class="flex-cell">
			<div class="flex-col-12">
				<input class="styled-checkbox" type="checkbox" id="addcardtag" name="addcardtag"><label for="addcardtag">Save this card</label>
				<span class="save_card_msg">Paying for your APA membership via instalments? Are you using a different/new card to make this purchase?
	Please note: if you opt to save this credit card, it will automatically become your default card for your instalment payments. If you wish to continue using your previous default card to make instalment payments, don’t save this card.</span>
	            <span class="save_card_msg"> To confirm that we can receive payments from your nominated credit card a one off
                verification charge of $1 will be deducted from your account. This amount will be refunded immediately
                upon payment confirmation.</span>	
			</div>
		</div>
		<!--<div class="flex-cell">
			<div class="flex-col-12">
				<input class="styled-checkbox" type="checkbox" id="addcardtag" name="addcardtag" value="1" checked><label for="addcardtag">Do you want to save this card</label>
				<input type="hidden" name="addCard" value="1">
			</div>
		</div>-->

	</div>
	<?php endif; ?>
	<!--this is handle record error log-->
	<?php 
		if(isset($_SESSION['UserName'])){ $addMemberLog["userID"] = $_SESSION['UserName'];  } 
		$addMemberLog["orderID"] = "0";
		$addMemberLog["jsonMessage"] = json_encode($recordOrder)."<br/><br/>".json_encode($registerOuts);
		$addMemberLog["createDate"] = date('Y-m-d');
		$addMemberLog["type"] =  "PRF";
		$addMemberLog["logError"] = 1;
		add_Member_Log($addMemberLog);
	?>
	<div class="flex-container">
		<div class="flex-cell">
			<span class="fail-payment-message">Payment has failed. Please check your card details and try again or <a href="/contact-us">contact us</a>.</span>
		</div>
	</div>  
	<div class="flex-container">
		<div class="flex-cell">
			<div class="flex-col-12">
				<label>Please select amount to donate:</label>
				<div class="chevron-select-box">
					<select class="form-control" id="PRF" name="PRF">
						<option value="10" selected>$10.00</option>
						<option value="20">$20.00</option>
						<option value="50">$50.00</option>
						<option value="100">$100.00</option>
						<option value="Other">Other</option>
					</select>
				</div>
				<input type="number" class="form-control display-none" id="PRFOther" name="PRFOther" value="">
			</div>
			<div class="flex-col-12">
				<span><strong>Please note: </strong>We will send a receipt to your inbox</span>
			</div>
		</div>
	</div>
	
	<button class="submit-donate" type="submit" value="Donate now" onClick="return checkCard();">Donate now</button>
		
</form>

<script>
  function checkCard(){
		if($("#anothercardBlock").is(":visible")){
				if($("select[name=Cardtype]").val() =='') {$("select[name=Cardtype]").addClass("focuscss");}else{$("select[name=Cardtype]").removeClass("focuscss");}
				if($("input[name=Cardname]").val() =='') {$("input[name=Cardname").addClass("focuscss");}else{$("input[name=Cardname").removeClass("focuscss");}
				if($("input[name=Cardnumber]").val() =='') {$("input[name=Cardnumber").addClass("focuscss");}else{$("input[name=Cardnumber").removeClass("focuscss");}
				if($("input[name=Expirydate]").val() =='') {$("input[name=Expirydate").addClass("focuscss");}else{$("input[name=Expirydate").removeClass("focuscss");}
				if($("input[name=CCV]").val() =='') {$("input[name=CCV").addClass("focuscss");}else{$("input[name=CCV").removeClass("focuscss");}
			}
			if($("#anothercardBlock").is(":visible")){
				if($("select[name=Cardtype]").val() =='') { return false;}
				if($("input[name=Cardname]").val() =='') { return false;}
				if($("input[name=Cardnumber]").val() =='') { return false;}
				if($("input[name=Expirydate]").val() =='') { return false;}
				if($("input[name=CCV]").val() =='') { return false;}
			}
			$('.overlay').fadeIn();
		    $('.loaders').css('visibility','visible').hide().fadeIn();
}
</script>
</div>

<?php endif;?>
<?php if(!isset($_POST["POSTPRF"])): ?>
<div id="prf-donation-container">
	<div class="header-banner">
		<img style="display: block" src="/sites/default/files/PRF_155x56.png" alt="Physiotherapy Research Foundation">
		<h2 class="lead-heading cairo">Donate to the PRF.</h2>
	</div>
<form action="" method="POST" style="width:100%;">
	<input type="hidden" name="POSTPRF" id="POSTPRF">

		<?php if (sizeof($cardsnum["results"])!=0): ?>  
	<div class="flex-container">
		<div class="flex-cell">
			<div class="flex-col-12">					
				<fieldset>
					<label for="">Payment method:<span class="tipstyle"> *</span></label>
					<div class="chevron-select-box">
						<select id="Paymentcard" name="Paymentcard">
							<?php
							
								foreach( $cardsnum["results"] as $cardnum) {
									echo '<option value="'.$cardnum["Creditcards-ID"].'"';
									if($cardnum["IsDefault"]=="1") {
									echo "selected ";
								}
								echo 'data-class="'.$cardnum["Payment-Method"].'">____ ____ ____ ';
								echo $cardnum["Digitsnumber-Cardtype-Default"].'</option>';
								}
							
							?>
						</select>
					</div>
				</fieldset>
			</div>
		</div>

		<div class="flex-cell">
			<div class="flex-col-12">
				<input class="styled-checkbox" type="checkbox" id="anothercard" name="anothercard">
				<label for="anothercard">Use another card</label>
			</div>
		</div> 
	</div>

	<div class="flex-container" id="anothercardBlock" style="margin: 0; padding:0" class="display-none col-xs-12">
		<div class="flex-cell">
			<div class="flex-col-12">
				<div class="chevron-select-box">
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
		</div>

		<div class="flex-cell">
			<div class="flex-col-12">
				<label>Name on card:<span class="tipstyle"> *</span></label>
				<input type="text" class="form-control" id="Cardname" name="Cardname" placeholder="Name on card">
			</div>
		</div>

		<div class="flex-cell">
			<div class="flex-col-12">
				<label>Card number:<span class="tipstyle"> *</span></label>
				<input type="text" class="form-control" id="Cardnumber" name="Cardnumber" placeholder="Card number" maxlength="16">
			</div>
		</div>

		<div class="flex-cell card-uniq">
			<div class="flex-col-6">
				<label>Expiry date:<span class="tipstyle"> *</span></label>
				<input type="text" class="form-control" id="Expirydate" name="Expirydate" placeholder="mmyy(eg:0225)" maxlength="4">
			</div>

			<div class="flex-col-6">
				<label>CVV:<span class="tipstyle"> *</span></label>
				<input type="text" class="form-control" id="CCV" name="CCV" placeholder="CVV" maxlength="4">
			</div>
			<div class="flex-col-6 tooltip-container top" style="margin-top: 10px;">
					<span class="tooltip-activate">What is CVV?</span>
					<div class="tooltip-content">
						<h4>What is a Card Verification Number?</h4>
						<span class="tooltip-img"><img src="/sites/default/files/general-icon/cvn-image.png"></span>
						<span>For Visa and Mastercard enter the last three digits on the signature strip. For American Express, enter the four digits in small print on the front of the card.</span>
					</div>
			</div>
		</div>
        <div class="flex-cell">
			<div class="flex-col-12">
				<input class="styled-checkbox" type="checkbox" id="addcardtag" name="addcardtag"><label for="addcardtag">Save this card</label>
				<span class="save_card_msg">Paying for your APA membership via instalments? Are you using a different/new card to make this purchase?
	Please note: if you opt to save this credit card, it will automatically become your default card for your instalment payments. If you wish to continue using your previous default card to make instalment payments, don’t save this card.</span>
	            <span class="save_card_msg"> To confirm that we can receive payments from your nominated credit card a one off
                verification charge of $1 will be deducted from your account. This amount will be refunded immediately
                upon payment confirmation.</span>	
			</div>
		</div>
		<!--<div class="flex-cell">
			<div class="flex-col-12">
				<input class="styled-checkbox" type="checkbox" id="addcardtag" name="addcardtag" value="1" checked><label for="addcardtag">Do you want to save this card</label>
			</div>
				<input type="hidden" name="addCard" value="0">
		</div>-->
	</div>
	<?php endif; ?>  
	<?php if (sizeof($cardsnum["results"])==0): ?> 
	<div class="flex-container show" id="anothercardBlock">	
		<div class="flex-cell">
			<div class="flex-col-12">
				<input class="styled-checkbox" type="checkbox" name="anothercard">
				
			</div>
		</div> 
		<div class="flex-cell">
			<div class="flex-col-12">
				<label for="">Payment method:<span class="tipstyle"> *</span></label>
				<div class="chevron-select-box">
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
		</div>

		<div class="flex-cell">
			<div class="flex-col-12">
				<label>Name on card:<span class="tipstyle"> *</span></label>
				<input type="text" class="form-control" id="Cardname" name="Cardname" placeholder="Name on card">
			</div>
		</div>

		<div class="flex-cell">
			<div class="flex-col-12">
				<label>Card number:<span class="tipstyle"> *</span></label>
				<input type="text" class="form-control" id="Cardnumber" name="Cardnumber" placeholder="Card number" maxlength="16">
			</div>
		</div>

		<div class="flex-cell card-uniq">
			<div class="flex-col-6">
				<label>Expiry date:<span class="tipstyle"> *</span></label>
				<input type="text" class="form-control" id="Expirydate" name="Expirydate" placeholder="mmyy(eg:0225)" maxlength="4">
			</div>

			<div class="flex-col-6">
				<label>CVV:<span class="tipstyle"> *</span></label>
				<input type="text" class="form-control" id="CCV" name="CCV" placeholder="CVV" maxlength="4">
			</div>
			<div class="flex-col-6 tooltip-container top" style="margin-top: 10px;">
					<span class="tooltip-activate">What is CVV?</span>
					<div class="tooltip-content">
						<h4>What is a Card Verification Number?</h4>
						<span class="tooltip-img"><img src="/sites/default/files/general-icon/cvn-image.png"></span>
						<span>For Visa and Mastercard enter the last three digits on the signature strip. For American Express, enter the four digits in small print on the front of the card.</span>
					</div>
			</div>
		</div>
		<div class="flex-cell">
			<div class="flex-col-12">
				<input class="styled-checkbox" type="checkbox" id="addcardtag" name="addcardtag"><label for="addcardtag">Save this card</label>
				<span class="save_card_msg">Paying for your APA membership via instalments? Are you using a different/new card to make this purchase?
	Please note: if you opt to save this credit card, it will automatically become your default card for your instalment payments. If you wish to continue using your previous default card to make instalment payments, don’t save this card.</span>
	            <span class="save_card_msg"> To confirm that we can receive payments from your nominated credit card a one off
                verification charge of $1 will be deducted from your account. This amount will be refunded immediately
                upon payment confirmation.</span>	
			</div>
		</div>

		<!--<div class="flex-cell">
			<div class="flex-col-12">
				<input class="styled-checkbox" type="checkbox" id="addcardtag" name="addcardtag" value="1" checked><label for="addcardtag">Do you want to save this card</label>
				<input type="hidden" name="addCard" value="1">
			</div>
		</div>-->

	</div>
	<?php endif; ?>  
	<div class="flex-container">
		<div class="flex-cell">
			<div class="flex-col-12">
				<label>Please select amount to donate:</label>
				<div class="chevron-select-box">
					<select class="form-control" id="PRF" name="PRF">
						<option value="10" selected>$10.00</option>
						<option value="20">$20.00</option>
						<option value="50">$50.00</option>
						<option value="100">$100.00</option>
						<option value="Other">Other</option>
					</select>
				</div>
				<input type="number" class="form-control display-none" id="PRFOther" name="PRFOther" value="">
			</div>
			<div class="flex-col-12">
				<span><strong>Please note: </strong>We will send a receipt to your inbox</span>
			</div>
		</div>
	</div>
	
	<button class="submit-donate" type="submit" value="Donate now" onclick="return checkCard();">Donate now</button>
		
</form>
<script>
  function checkCard(){
		if($("#anothercardBlock").is(":visible")){
				if($("select[name=Cardtype]").val() =='') {$("select[name=Cardtype]").addClass("focuscss");}else{$("select[name=Cardtype]").removeClass("focuscss");}
				if($("input[name=Cardname]").val() =='') {$("input[name=Cardname").addClass("focuscss");}else{$("input[name=Cardname").removeClass("focuscss");}
				if($("input[name=Cardnumber]").val() =='') {$("input[name=Cardnumber").addClass("focuscss");}else{$("input[name=Cardnumber").removeClass("focuscss");}
				if($("input[name=Expirydate]").val() =='') {$("input[name=Expirydate").addClass("focuscss");}else{$("input[name=Expirydate").removeClass("focuscss");}
				if($("input[name=CCV]").val() =='') {$("input[name=CCV").addClass("focuscss");}else{$("input[name=CCV").removeClass("focuscss");}
			}
			if($("#anothercardBlock").is(":visible")){
				if($("select[name=Cardtype]").val() =='') { return false;}
				if($("input[name=Cardname]").val() =='') { return false;}
				if($("input[name=Cardnumber]").val() =='') { return false;}
				if($("input[name=Expirydate]").val() =='') { return false;}
				if($("input[name=CCV]").val() =='') { return false;}
			}
}
</script>
</div>
<?php endif; ?>
<?php logRecorder();  ?>
<div id="PRFDesPopUp" style="display:none;" class="container">
<p>The Physiotherapy Research Foundation (PRF) supports the physiotherapy profession by promoting, encouraging and supporting research that advances physiotherapy knowledge and practice. The PRF aims to boost the careers of new researchers through seeding grants, support research in key areas through tagged grants and encourage academic excellence through university prizes. Give a little, get a lot. </p>
<p><a href="/reserach/purpose-prf">Tell me more</a></p>
</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
 <!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$( function() {
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

<div id="Iaksbnkvoice" class="modal fade big-screen" role="dialog">
	<div class="modal-dialog">

	<!-- Modal content-->
	<div class="modal-content">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>
		<div class="modal-body">
		<iframe name="stsIaksbnkvoice" src="http://www.physiotherapy.asn.au"></iframe>
		</div>
		<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</div>

	</div>
</div>

<style type="text/css">
	.big-screen {
		width: 62%;
		margin: auto;
		min-width: 1190px;
	}
	.big-screen .modal-dialog, .big-screen .modal-dialog .modal-content, .big-screen .modal-dialog .modal-content .modal-body, .big-screen iframe {
		width: 100%;
		height: 100%;
	}
</style> 
<script>
$(document).ready(function() {
	if (window.frames["Iaksbnkvoice"] && !window.userSet) {
		window.userSet = true;
		frames['stsIaksbnkvoice'].location.href="<?php if(isset($invoiceAPI)) {echo $invoiceAPI[0]; }?>";
	}
});
</script>
 <?php else : 
	// when user is not logged in
	?>
	<!-- USER NOT LOGIN BUT NOT A MEMBER  -->
	<div class="flex-container" id="non-member">
		<div class="flex-cell">
			<h3 class="light-lead-heading">Please login to see this page.</h3>
		</div>
		<div class="flex-cell cta">
			<a data-target="#loginAT" data-toggle="modal" href="#" class="login">Login</a>
			<a href="/membership-question" class="join">Join now</a>
		</div>

		<?php 
				$block = block_load('block', '309');
				$get = _block_get_renderable_array(_block_render_blocks(array($block)));
				$output = drupal_render($get);        
				print $output;
		?>

	</div>
<?php endif; ?>
<div class="overlay">
	<section class="loaders">
		<span class="loader loader-quart">
		</span>   
	</section>
</div>