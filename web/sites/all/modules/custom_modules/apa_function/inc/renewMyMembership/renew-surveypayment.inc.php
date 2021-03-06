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
	if(isset($_POST['Businiessname'])){ $postInsuranceData['BusinessNameOwned'] = $_POST['Businiessname']; }	
	if($_POST['Addtionalquestion']=="1"){
		if(isset($_POST['Yearclaim'])){ $postInsuranceData['Yearofclaim'] = $_POST['Yearclaim']; }
		if(isset($_POST['Nameclaim'])){ $postInsuranceData['ClaimantName'] = $_POST['Nameclaim']; }
		if(isset($_POST['Fulldescription'])){ $postInsuranceData['Description'] = $_POST['Fulldescription']; }
		if(isset($_POST['Amountpaid'])){ $postInsuranceData['AmountPaid'] = $_POST['Amountpaid']; }
		if(isset($_POST['Finalisedclaim'])){ $postInsuranceData['ClaimFinalised'] = $_POST['Finalisedclaim']; }
		
	}
	else{
		$postInsuranceData['Yearofclaim'] ="";
		$postInsuranceData['ClaimantName'] ="";
		$postInsuranceData['Description']="";
		$postInsuranceData['AmountPaid'] ="";
		$postInsuranceData['ClaimFinalised'] ="";
		
	}		
	
    // 2.2.40 - Get user insurance data
	// Send - 
	// UserID 
	// Response -UserID & insurance data
	$data = array();
	$data['ID'] = $_SESSION["UserId"];
	$insuarnceData = aptify_get_GetAptifyData("40", $data,""); // #_SESSION["UserID"];
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
   
	if($submitTag){$testData = aptify_get_GetAptifyData("41", $postInsuranceData); }
	//force the not eligible user
	//added on 13/08/2018
	if(isset($_POST['insuranceStatus'])&& $_POST['insuranceStatus']=="1") {
		if(isset($_SESSION['UserId'])){ $UserID = $_SESSION['UserId'];  } 
		if(isset($_SESSION['UserName'])){ $EmailAddress = $_SESSION['UserName'];  } 
		$CreateDate = date('Y-m-d');
		$Type = "R";
		createInsuranceStatus($UserID,$EmailAddress,$CreateDate,$Type);
		$link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
		header("Location:".$link."/insuranceprocess");
	}
}
// Added product table on 13/08/2018
	/************************/
	// 2.2.31 Get Membership prodcut price
	// Send - 
	// userID & product list
	// Response -Membership prodcut price
	$prodcutArray = array();
	if(isset($_SESSION["MembershipProductID"])) { array_push($prodcutArray,$_SESSION["MembershipProductID"]);}
	if(sizeof($prodcutArray)!=0){
		$memberProductsArray['ProductID']=$prodcutArray;
		$memberProdcutID = $memberProductsArray;
		$memberProducts = aptify_get_GetAptifyData("31", $memberProdcutID);
	}
	
	// 2.2.19 - GET list National Group
	// Send - 
	// userID
	// Response -National Group product
	$sendData["UserID"] = $_SESSION['UserId'];
	$NGListArray = aptify_get_GetAptifyData("19", $sendData);
	//print_r($NGListArray);
	if(isset($_SESSION["NationalProductID"])) {$NGProductsArray=$_SESSION["NationalProductID"];} else{$NGProductsArray=array();}
	// 2.2.21 - GET Fellowship product price
	// Send - 
	// userID
	// Response -Fellowship product list
	$FPListArray = array();
	$fpProdcutArray = array();
	if(isset($_SESSION["FPProductID"])){
	array_push($fpProdcutArray,$_SESSION["FPProductID"]);
}
	if(isset($_SESSION["MGProductID"])){
		foreach($_SESSION["MGProductID"] as $singleM){
			foreach($singleM as $key => $value){
				array_push($fpProdcutArray,$value);
			}
		}
	}
	if(sizeof($fpProdcutArray)!=0){
		
		$fpData['ProductID'] = $fpProdcutArray;
		$FPListArray = aptify_get_GetAptifyData("21", $fpData);
		
	}
	//Get calculating the Order Total and Schedule Payments
	// 2.2.47 Get calculating the Order Total and Schedule Payments
	// Send - 
	// userID & Paymentoption & InstallmentFor & InstallmentFrequency & PRFdonation & productID & CampaignCode
	// Response -AdminFee & SubTotal & GST & OrderTotal & InitialPaymentAmount & OccuringPayment & LastPayment
	if(isset($_SESSION['UserId'])){ $postScheduleData['userID'] = $_SESSION['UserId'];  } 
	$postScheduleData['Paymentoption'] = 0;
	$postScheduleData['InstallmentFor'] = "Membership";
	$postScheduleData['InstallmentFrequency'] = "";
	$postScheduleData['PRFdonation'] = "0"; 
	$postScheduleData['productID'] = getProductList($_SESSION['UserId']);
	$postScheduleData['CampaignCode'] = "";
	$scheduleDetails = aptify_get_GetAptifyData("47", $postScheduleData);
	/************************/
  ?>
<div id="tipsBlock" class="<?php if(isset($_POST['insuranceStatus'])&& $_POST['insuranceStatus']=="1") {echo "display";} else { echo "display-none";}?>"><span style="color:red;">Unfortunately, we cannot let you proceed with this membership purchase. Please contact the APA member hub (include email link) or on 1 300 306 622 for more information.</span></div>
<form id="renew-insurance-form" action="renewmymembership" method="POST">
	<input type="hidden" name="step2" value="2"/>
	<div class="down6" <?php if(isset($_POST['step2-1'])|| (isset($_POST['step1'])&& $_POST['insuranceTag']=="0")|| isset($_POST['QOrder']) || isset($_POST['goP']))echo 'style="display:block;"'; else { echo 'style="display:none;"';}?>>
		<!--<div class="row">
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
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">  <a class="join-details-button6"><span class="dashboard-button-name">Next</span></a><a  class="your-details-prevbutton<?php //if(isset($_POST['step1'])&& $_POST['insuranceTag']=="0"){echo "5";} else {echo "6";}?>"><span class="dashboard-button-name">Back</span></a></div>
	</div>-->
	<!--<div class="down7" <?php //if(isset($_POST['goP']))echo 'style="display:block;"'; else { echo 'style="display:none;"';}?>>-->
			<div class="row">

			<div class="flex-container flex-table">
				<div class="flex-cell flex-flow-row table-header">
					<div class="flex-col-7">
						<span class="table-heading">Product name</span>
					</div>
					<div class="flex-col-5">
						<span class="table-heading">Price</span>
					</div>
				</div>

    			<?php 
						$price = "";
						if(sizeof($prodcutArray)!=0){
							foreach( $memberProducts as $memberProduct){
								echo "<div class='flex-cell flex-flow-row table-cell'>";
								echo "<div class='flex-col-7 title-col'>".$memberProduct['Title']."</div>";
								echo "<div class='flex-col-5 price-col'>$".number_format($memberProduct['Price'],2)."</div>";
								$price += $memberProduct['Price'];
								echo "</div>";  
							}
						}	
						foreach( $NGListArray as $NGArray){
						if(sizeof($NGProductsArray)!=0){
						    foreach($NGProductsArray as $NGProduct){
								if($NGProduct == $NGArray['ProductID']){
									echo "<div class='flex-cell flex-flow-row table-cell'>";
									echo "<div class='flex-col-7 title-col'>".$NGArray['ProductName']."</div>";
									echo "<div class='flex-col-5 price-col'>$".number_format($NGArray['NGprice'],2)."</div>";
									$price += $NGArray['NGprice'];
									echo "</div>";
								}	  
							}
						}
						}
						if(sizeof($FPListArray)!=0){
							
							foreach( $FPListArray as $FProduct){
									echo "<div class='flex-cell flex-flow-row table-cell'>";
									echo "<div class='flex-col-7 title-col'>".$FProduct['FPtitle']."</div>";
									echo "<div class='flex-col-5 price-col'>$".number_format($FProduct['FPprice'],2)."</div>";
									$price += $FProduct['FPprice'];
									echo "</div>";  
							}
						}
                        
				?>
			</div>

			<div class="flex-container flex-table">
				
				<div class="flex-cell flex-flow-row">
					<div class="flex-col-12">
						<span class="table-heading">Membership payment total</span>	
					</div>
				</div>
				<div class="flex-cell flex-flow-row">
					<div class="flex-col-7">
						Subtotal (exc. GST)	
					</div>
					<div class="flex-col-5">
			        	$<?php echo number_format($scheduleDetails['SubTotal'],2);?>
					</div>
				</div>
				<div class="flex-cell flex-flow-row" id="installmentafter">
					<div class="flex-col-7">
						GST	
					</div>
					<div class="flex-col-5">
			        	$<?php echo number_format($scheduleDetails['GST'],2);?>
					</div>
				</div>
				<div class="flex-cell flex-flow-row">
					<div class="flex-col-7">
						<strong>Total</strong> (inc. GST)	
					</div>
					<div class="flex-col-5">
			        	$<span id="totalPayment"><?php echo number_format($scheduleDetails['OrderTotal'],2);?></span>
					</div>
				</div>
			</div>
		</div>	

			<div class="col-xs-12">
			<label>Payment options:</label>
			</div>

			<div class="col-xs-12">
				<input class="styled-radio-select" type="radio" name ="Paymentoption" id="p1-1" value="0" checked="checked">
				<label for="p1-1">Pay in full today</label>
			</div>
			<?php if($_SESSION["MembershipProductID"]!="9964" && $_SESSION["MembershipProductID"]!="9965" && $_SESSION["MembershipProductID"]!="9966" && $_SESSION["MembershipProductID"] !="9968" ||$_SESSION["MembershipProductID"] !="10005"|| $_SESSION["MembershipProductID"] !="9967"|| $_SESSION["MembershipProductID"] !="10006"): ?>
			<div class="col-xs-12">
				<input class="styled-radio-select" type="radio" name ="Paymentoption" id="p1-2" value="1">
				<label for="p1-2">Pay by monthly instalments</label><span for="instalment_payment_note" class="note_trigger info_icon"></span>
				<div id="instalment_payment_note" class="full_width_note">
					<p>The most convenient way to pay for your membership is to spread the costs out across the year with monthly instalments. This option also eliminates the stress of renewing your membership every year. Before your membership rolls over each year, we will give you plenty of notice as well as the opportunity to make any changes to your package.</p>
					<p>You can also opt to pay your membership in full at the time of your renewal.</p>
					<p>If you wish to take up the instalment option please note the following conditions:</p>
					<ul>
						<li>by selecting this payment option, you authorise the Australian Physiotherapy Association to charge all scheduled instalment payments to the credit card provided</li>
						<li>the first monthly instalment will be deducted upon receipt of renewal and it will include the full amount of GST payable for the year</li>
						<li>there is no administration fee associated with monthly instalments</li>
						<li>subsequent instalments for the year will equal the remaining amount due divided by the respective number of months of the year remaining</li>
						<li>monthly instalments will be deducted from your nominated credit or debit card on the first working day of the month</li>
						<li>by electing to pay by instalments you are also opting to have your membership automatically rolled over into the forthcoming year authorising the APA to continue deducting membership fees until you notify the APA in writing to cease deductions or your membership is cancelled or withdrawn and outstanding fees are collected</li>
						<li>instalments can only be cancelled in December at the end of our membership year</li>
						<li>you will be notified in writing of any change to your deductions at least 30 days prior to that change</li>
						<li>if there are insufficient funds available to make the deduction or the payment is rejected for other reasons, the APA may pass associated bank fees on to you</li>
					</ul>
				</div>
			</div>
			<?php endif;?>
			<input type="hidden" id="Installpayment-frequency" name="Installpayment-frequency" value="">
		<?php if(isset($_SESSION["postReviewData"])) { $PRFTemp = $_SESSION["postReviewData"]['PRFdonation'];}?>
		<div class="row">
			<div class="col-xs-12"><label>PRF donation</label></div>
				<div class="col-xs-12 tooltip-container top">
					<span class="tooltip-activate">What is this?</span>
					<div class="tooltip-content">
						The Physiotherapy Research Foundation (PRF) supports the physiotherapy profession by promoting, encouraging and supporting research that advances physiotherapy knowledge and practice. The PRF aims to boost the careers of new researchers through seeding grants, support research in key areas through tagged grants and encourage academic excellence through university prizes. Give a little, get a lot.
					<br>
						<a href="/reserach/purpose-prf">Tell me more</a>
					</div>
				</div>
			<div class="col-xs-12">A small proportion of all membership fees directly support physiotherapy research. We also appreciate member donations to further the important work of the Physiotherapy Research Foundation.</div>
			<div class="col-xs-12">
				<input class="styled-checkbox" type="checkbox" id="prftag" name="prftag" <?php if(isset($_SESSION["postReviewData"])) {if(empty($PRFTemp)) {echo 'value="1" checked="checked"';}} ?>>
				<label for="prftag" id="prftagAgree">No, I do not want to make a donation to the PRF</label>
			</div>
			<div class="col-xs-6 col-md-3" id="prfselect">
				<div class="chevron-select-box">
					<select class="form-control" id="PRF" name="PRF">
						<option value="5" <?php if(!isset($_SESSION["postReviewData"])) {echo "selected";} if(isset($_SESSION["postReviewData"])) {if($PRFTemp =="5") {echo "selected";}}?>>$5.00</option>
						<option value="10" <?php if(isset($_SESSION["postReviewData"])) {if($PRFTemp =="10") {echo "selected";}}?>>$10.00</option>
						<option value="20" <?php if(isset($_SESSION["postReviewData"])) {if($PRFTemp =="20") {echo "selected";}}?>>$20.00</option>
						<option value="50" <?php if(isset($_SESSION["postReviewData"])) {if($PRFTemp =="50") {echo "selected";}}?>>$50.00</option>
						<option value="100" <?php if(isset($_SESSION["postReviewData"])) {if($PRFTemp =="100") {echo "selected";}}?>>$100.00</option>
						<option value="Other" <?php if(isset($_SESSION["postReviewData"])) {if(!empty($PRFTemp) && $PRFTemp !="5" && $PRFTemp !="10" && $PRFTemp !="20" && $PRFTemp !="50" && $PRFTemp !="100") {echo "selected";}}?>>Other</option>
					</select>
				</div>
				<input type="number" class="form-control display-none" id="PRFOther" name="PRFOther" value="<?php if(isset($_SESSION["postReviewData"])) {if(!empty($PRFTemp) && $PRFTemp !="5" && $PRFTemp !="10" && $PRFTemp !="20" && $PRFTemp !="50" && $PRFTemp !="100") {echo $PRFTemp;}}?>" oninput="this.value = Math.abs(this.value)" min="0">
				
				
			</div>
		</div>
	<?php 
	// 2.2.12 - Get payment list
	// Send - 
	// UserID 
	// Response -payment card list
	$test['id'] = $_SESSION["UserId"];
	$cardsnum = aptify_get_GetAptifyData("12", $test);
	//print_r($cardsnum);?>
	<?php if (sizeof($cardsnum["results"])!=0): ?>  
	<div id="hiddenPayment">
		<div class="row">	
		<div class="col-xs-12 col-sm-6">				
			<fieldset>
				<div class="chevron-select-box">
					<select class="form-control" id="Paymentcard" name="Paymentcard">
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
		<div class="col-xs-12">
			<input type="checkbox" class="styled-checkbox" id="anothercard">
			<label for="anothercard">Use another card</label>
		</div>
	<div id="anothercardBlock" class="row">
		<div class="row">
			<div class="col-xs-12 col-sm-6">
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
		<div class="row">
			<div class="col-xs-12 col-sm-6">
				<label for="">Name on card:<span class="tipstyle"> *</span></label>
				<input type="text" class="form-control" id="Cardname" name="Cardname" placeholder="Name on card">
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6 col-sm-6">
				<label for="">Card number:<span class="tipstyle"> *</span></label>
				<input type="text" class="form-control" id="Cardnumber" name="Cardnumber" placeholder="Card number" maxlength="16">
			</div>

			<div class="col-xs-6 col-sm-3">
				<label for="">Expiry date:<span class="tipstyle"> *</span></label>
				<input type="text" class="form-control" id="Expirydate" name="Expirydate" placeholder="mmyy (eg: 0225)" maxlength="4">
			</div>

			<div class="col-xs-6 col-sm-3">
				<label for="">CVV:<span class="tipstyle"> *</span></label>
				<input type="text" class="form-control" id="CCV" name="CCV" placeholder="CVV" maxlength="4">
			</div>
		</div>
		<!--<div class="col-xs-12">
			<input class="styled-checkbox" type="checkbox" id="addcardtag" name="addcardtag" value="1" checked>
			<label for="addcardtag">Save this card</label>
		</div>-->
		<input type="hidden" name="addCard" value="0">
	</div>
	<div class="col-xs-12">To confirm that we can receive payments from your nominated credit card a one off verification charge of $1 will be deducted from your account. This amount will be refunded immediately upon payment confirmation.</div>
	</div>
	<?php endif; ?>  
	<?php if (sizeof($cardsnum["results"])==0): ?> 
	<div id="anothercardBlock" class="row show">					   
		<div class="row">
			<div class="col-xs-6 col-sm-6">
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
		<div class="row">
			<div class="col-xs-12 col-sm-6">
				<label for="">Name on card:<span class="tipstyle"> *</span></label>
				<input type="text" class="form-control" id="Cardname" name="Cardname" placeholder="Name on card">
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-6">
				<label for="">Card number:<span class="tipstyle"> *</span></label>
				<input type="text" class="form-control" id="Cardnumber" name="Cardnumber" placeholder="Card number" maxlength="16">
			</div>

			<div class="col-xs-6 col-sm-3">
				<label for="">Expiry date:<span class="tipstyle"> *</span></label>
				<input type="text" class="form-control" id="Expirydate" name="Expirydate" placeholder="mmyy (eg: 0225)" maxlength="4">
			</div>

			<div class="col-xs-6 col-sm-3">
				<label for="">CVV:<span class="tipstyle"> *</span></label>
				<input type="text" class="form-control" id="CCV" name="CCV" placeholder="CVV" maxlength="4">
			</div>
		</div>
		<!--<div class="col-xs-12">
			<input class="styled-checkbox" type="checkbox" id="addcardtag" name="addcardtag" value="1" checked>
			<label for="addcardtag">Save this card</label>
		</div>-->
		
		<input type="hidden" name="addCard" value="1">
		<div class="col-xs-12">To confirm that we can receive payments from your nominated credit card a one off verification charge of your account. This amount will be refunded immediately upon payment confirmation.</div>
	</div>				 
	<?php endif; ?>  
		<div class="row">
			<div class="col-xs-12">
				<input popup class="styled-checkbox" type="checkbox" id="jprivacy-policy">
				<label for="jprivacy-policy" id="privacypolicyl" popup-target="privacypolicyWindow"><span class="tipstyle">*&nbsp;</span>I agree to the APA Terms and Conditions</label>
			</div>
			<!--<div class="col-xs-12 display-none" id="rolloverblock">
				<input class="styled-checkbox" type="checkbox" id="instalmentpolicy">
				<label for="instalmentpolicy" id="instalmentpolicyl"><span class="tipstyle">*&nbsp;</span>I agree to the APA Instalment Payment Policy</label>
			</div>-->
			<!--<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 display-none" id="rolloverblock"><label for="Rollover">Roll over</label><input type="checkbox" name="Rollover" id="Rollover"></div>-->
		</div>   
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 btn_wrapper">  
			<a variant="next" href="javascript:document.getElementById('renew-insurance-form').submit();" class="join-details-button7 <?php if(isset($_POST["insuranceStatus"])&& $_POST["insuranceStatus"]=="1") { echo "stop"; }?>">
				<span class="dashboard-button-name">Next</span>
			</a>
			<a variant="prev" class="your-details-prevbutton<?php if(isset($_POST['step1'])&& $_POST['insuranceTag']=="0"){echo "5";} else {echo "6";}?>">
				<span class="icon arrow_left"></span>
				Back to previous
			</a>
		</div>
	</div>
</form>
<form id="tempform" action="" method="POST"><input type="hidden" name="goI"></form>	
<?php logRecorder();  ?>	
<div id="PRFDesPopUp" style="display:none;" class="container">
<p>The Physiotherapy Research Foundation (PRF) supports the physiotherapy profession by promoting, encouraging and supporting research that advances physiotherapy knowledge and practice. The PRF aims to boost the careers of new researchers through seeding grants, support research in key areas through tagged grants and encourage academic excellence through university prizes. Give a little, get a lot. </p>
<p><a href="/reserach/purpose-prf">Tell me more</a></p>
</div>