<?php
 $invoice_ID ="";
if(isset($_POST['step3'])) {
	$postReviewData = array();
	$postReviewData['InstallmentFor'] = "Membership";
	$postReviewData['productID'] = getProductList($_SESSION['UserId']);
	$postReviewData['InsuranceApplied'] = 0;
	if(isset($_POST['PRFFinal'])) {$postReviewData['PRFdonation'] = $_POST['PRFFinal'];}else{ $postReviewData['PRFdonation'] = "";}
	//added by merged steps
	if(isset($_SESSION['UserId'])){ $postReviewData['userID'] = $_SESSION['UserId']; } 
	if(isset($_POST['Paymentoption'])){ $postReviewData['Paymentoption'] = $_POST['Paymentoption'] == '1' ? 1:0; }
	//if(isset($_POST['Installpayment-frequency'])){ $postReviewData['InstallmentFrequency'] = $_POST['Installpayment-frequency']; }
	$postReviewData['InstallmentFrequency'] = $_POST['Paymentoption'] == '1' ? "Monthly":"";
	//this is handle save payment card
	if(isset($_POST['addcardtag']) && $_POST['addcardtag']=="1"){
		if(isset($_SESSION['UserId'])){ $postPaymentData['userID'] = $_SESSION['UserId']; }
		if(isset($_POST['Cardtype'])){ $postPaymentData['Payment-method'] = $_POST['Cardtype']; }
		if(isset($_POST['Cardnumber'])){ $postPaymentData['Cardno'] = $_POST['Cardnumber']; }
		if(isset($_POST['Expirydate'])){ $postPaymentData['Expiry-date'] = $_POST['Expirydate']; }
		if(isset($_POST['CCV'])){ $postPaymentData['CCV'] = $_POST['CCV']; }
		if($_POST['Paymentoption']=="1"){ $postPaymentData['IsDefault'] = 1; } else{ $postPaymentData['IsDefault'] = 0;}
		$out = aptify_get_GetAptifyData("15", $postPaymentData);
		$postReviewData['Card_number'] = "";	
		$postReviewData['PaymentTypeID'] = $_POST['Cardtype'];
		$postReviewData['CCNumber'] = $_POST['Cardnumber'];
		$postReviewData['CCExpireDate'] = $_POST['Expirydate'];
		$postReviewData['CCSecurityNumber'] = $_POST['CCV'];

	}
	elseif(isset($_POST['addCard'])){
		$postReviewData['Card_number'] = "";	
		$postReviewData['PaymentTypeID'] = $_POST['Cardtype'];
		$postReviewData['CCNumber'] = $_POST['Cardnumber'];
		$postReviewData['CCExpireDate'] = $_POST['Expirydate'];
		$postReviewData['CCSecurityNumber'] = $_POST['CCV'];
		
	}
    if(isset($_POST['anothercard']) && $_POST['anothercard']=="1"){
		$postReviewData['Card_number'] = "";	
		$postReviewData['PaymentTypeID'] = $_POST['Cardtype'];
		$postReviewData['CCNumber'] = $_POST['Cardnumber'];
		$postReviewData['CCExpireDate'] = $_POST['Expirydate'];
		$postReviewData['CCSecurityNumber'] = $_POST['CCV'];
	}elseif(isset($_POST['Paymentcard'])){
		$postReviewData['Card_number'] = $_POST['Paymentcard']; 
		if($_POST['Paymentoption']=="1"){ 
			$updateCardSubmit["UserID"] = $_SESSION['UserId'];
			$updateCardSubmit["SpmID"] = $_POST['Paymentcard'];
			$updateCardSubmit["ExpireMonthYear"] = "";
			$updateCardSubmit["CCSNumber"] = "";
			$updateCardSubmit["IsDefault"] = "1";
			$updateCardSubmit["IsActive"] = "";
			// 2.2.13 - update payment method-3-set main card
			// Send - 
			// UserID, Creditcard-ID
			// Response -
			// N/A.
			$updateCards = aptify_get_GetAptifyData("13", $updateCardSubmit);  
		} 
		$postReviewData['PaymentTypeID'] = "";
		$postReviewData['CCNumber'] = "";
		$postReviewData['CCExpireDate'] = "";
		$postReviewData['CCSecurityNumber'] = "";
	}
	//end merged steps


	

	
	
	//This is to get the renewal quatation order details from Aptify!!!!!!!!
	// 2.2.45 - Renewal Quatation OrderID
	// Send - 
	// userID
	// Response -Renewal Quatation OrderID
	$variableData['id'] = $_SESSION["UserId"];
	$Quatation = aptify_get_GetAptifyData("45", $variableData);
	foreach ($Quatation["results"] as $quatationOrderArray){
		$quatationOrderID =  $quatationOrderArray["ID"];
	}
	
	$postReviewData['OrderID'] = $quatationOrderID;
		
	// 2.2.27 - Renew a membership order
	// Send - 
	// userID&Paymentoption&PRFdonation&Rollover&Card_number&productID
	// Response -Renew a membership order successfully
	//submit data to complete renew membership web service 2.2.27
	$renewOuts=aptify_get_GetAptifyData("27", $postReviewData);
	$recordOrder = array();
	//new array to record specific fields
	$recordOrder['userID'] = $postReviewData['userID'];
	$recordOrder['Card_number'] = $postReviewData['Card_number'];
	$recordOrder['PRFdonation'] = $postReviewData['PRFdonation'];
	$recordOrder['productID'] = $postReviewData['productID'];
	$recordOrder['PaymentTypeID'] = $postReviewData['PaymentTypeID'];
	if($postReviewData['CCNumber'] !=""){  $recordOrder['CCNumber'] = substr($postReviewData['CCNumber'], -4); }
	else{ $recordOrder['CCNumber'] = $postReviewData['CCNumber'];}
	$recordOrder['InsuranceApplied'] = $postReviewData['InsuranceApplied'];
	$recordOrder['Paymentoption'] = $postReviewData['Paymentoption'];
	$recordOrder['InstallmentFor'] = $postReviewData['InstallmentFor'];
	$recordOrder['InstallmentFrequency'] = $postReviewData['InstallmentFrequency'];
	if($renewOuts['MResponse'] =="Order updated successfully") {
	//refresh session data
	$data = "UserID=".$_SESSION["UserId"];
	$details = aptify_get_GetAptifyData("4", $data,"");
	newSessionStats($details["MemberTypeID"], $details["MemberType"], $details["Status"],$details["PersonSpecialisation"],$details["PaythroughtDate"],$details["Nationalgp"]);
	//end refresh session data
	  $invoice_ID = $renewOuts['Invoice_ID'];
	//save the terms and conditons on APA side
	$dataArray = array();
	$dataArray['MemberID'] = $postReviewData['userID'];
	$dataArray['CreateDate']= date('Y-m-d');
	$dataArray['MembershipYear'] = date('Y',strtotime('+1 year'));
	$dataArray['ProductList'] = implode(",",$postReviewData['productID']);
	$dataArray['Type'] = "R";
	forCreateRecordFunc($dataArray);
	//delete session:
	completeOrderDeleteSession();
	// delete shopping cart data from APA database; put the response status validation here!!!!!!!
					$userID = $_SESSION["UserId"];
					
		// use drupal db_select by jinghu 20/09/2018
		$type = "membership";
		checkShoppingCart($userID, $type, $productID="");
		$type = "NG";
		checkShoppingCart($userID, $type, $productID="");
		$type = "MG1";
		checkShoppingCart($userID, $type, $productID="");
		$type = "MG2";
		checkShoppingCart($userID, $type, $productID="");
		$productID = "PRF";
		checkShoppingCart($userID, $type="", $productID);			
	}
	/*
	if(isset($renewOuts['MResponse'])) {
		if($renewOuts['MResponse'] =="Order updated successfully") {
			//refresh session data
			$data = "UserID=".$_SESSION["UserId"];
			$details = aptify_get_GetAptifyData("4", $data,"");
			newSessionStats($details["MemberTypeID"], $details["MemberType"], $details["Status"],$details["PersonSpecialisation"],$details["PaythroughtDate"],$details["Nationalgp"]);
			//end refresh session data
			  $invoice_ID = $renewOuts['Invoice_ID'];
			//save the terms and conditons on APA side
			$dataArray = array();
			$dataArray['MemberID'] = $postReviewData['userID'];
			$dataArray['CreateDate']= date('Y-m-d');
			$dataArray['MembershipYear'] = date('Y',strtotime('+1 year'));
			$dataArray['ProductList'] = implode(",",$postReviewData['productID']);
			$dataArray['Type'] = "R";
			forCreateRecordFunc($dataArray);
			//delete session:
			completeOrderDeleteSession();
			// delete shopping cart data from APA database; put the response status validation here!!!!!!!
			$userID = $_SESSION["UserId"];
							
			// use drupal db_select by jinghu 20/09/2018
			$type = "membership";
			checkShoppingCart($userID, $type, $productID="");
			$type = "NG";
			checkShoppingCart($userID, $type, $productID="");
			$type = "MG1";
			checkShoppingCart($userID, $type, $productID="");
			$type = "MG2";
			checkShoppingCart($userID, $type, $productID="");
			$productID = "PRF";
			checkShoppingCart($userID, $type="", $productID);			
		} else {
			// ???
			$messageOut = "";
			foreach($renewOuts as $turnText) {
				// turn array into a String
				$messageOut = $messageOut.$turnText."<br/><br/>";
			}
			watchdog("Aptify", $messageOut, $postReviewData, WATCHDOG_CRITICAL,"renew failed");
		}
	} elseif($renewOuts['ErrorInfo'])) {
		// 
		$messageOut = "";
		foreach($renewOuts as $turnText) {
			// turn array into a String
			$messageOut = $messageOut.$turnText."<br/><br/>";
		}
		watchdog("Aptify", $messageOut, $postReviewData, WATCHDOG_CRITICAL,"renew failed");
	} else {
		// ???
		$messageOut = "";
		foreach($renewOuts as $turnText) {
			// turn array into a String
			$messageOut = $messageOut.$turnText."<br/><br/>";
		}
		watchdog("Aptify", $messageOut, $postReviewData, WATCHDOG_CRITICAL,"renew failed");
	}
	*/
}
else{
	header("Location: /");
}
?>
<?php
//include('sites/all/themes/evolve/commonFile/updateBackgroundImage.php');
 apa_function_updateBackgroundImage_form();
//include('sites/all/themes/evolve/commonFile/dashboardLeftNavigation.php'); 
apa_function_dashboardLeftNavigation_form();
/* get background image****/
if(isset($_SESSION['UserId'])) { $userID = $_SESSION['UserId'];} else { $userID =0; }
$background = getBackgroundImage($userID);
/* get background image****/      
?>
<div id="pre_background" style="display:none">background_<?php //echo $background; ?></div>
<div class="col-xs-12 background_<?php //echo $background; ?>" id="dashboard-right-content">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dashboard_detail">
	<?php
	//include('sites/all/themes/evolve/commonFile/customizeBackgroundImage.php');
	?>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >

				<?php if($renewOuts['MResponse'] =="Order updated successfully"): ?>
					<?php 
					// after web service 2.2.26 Aptify response the invoice_id;
					// 2.2.18 Get payment invoice PDF
					// Send - 
					// UserID & Invoice_ID
					// Response -Invoice PDF
					$send["UserID"] = $_SESSION["UserId"];
					$send["Invoice_ID"] = $invoice_ID;  
					//$invoiceAPI = GetAptifyData("18", $send); 
					//$apis[0] = $invoice_ID;
					//$invoiceAPI = GetAptifyData("18", $apis);
					?> 
					<?php /*
					<a class="download-link" data-toggle="modal" data-target="#Iaksbnkvoice"><span class="invoice-icon"></span><span class="invoice-text">Download Invoice</span></a>
					*/
					?>
                    <?php
				    // record member log for successful process
					if(isset($_SESSION['UserName'])){ $addMemberLog["userID"] = $_SESSION['UserName'];  } 
					$addMemberLog["orderID"] = $postReviewData['OrderID'];
					$addMemberLog["jsonMessage"] = json_encode($recordOrder)."<br/><br/>".json_encode($renewOuts);
					$addMemberLog["createDate"] = date('Y-m-d');
					$addMemberLog["type"] =  "Renew";
					$addMemberLog["logError"] = 0;
					add_Member_Log($addMemberLog);
					?>
					<style>
						#dashboard-right-content .dashboard_detail{
							width: 100%;
						}
					</style>
				<div class="flex-container" id="renew-membership-success">
					<div class="flex-cell heading">
						<h2 class="light-lead-heading">Thanks for renewing your APA membership!</h2>
						<h3 class="lead-heading">We're glad to welcome you back.</h3>
					</div>
					<div class="flex-cell body-text">
						<span>A copy of your purchase receipt and membership certification will be sent to your inbox.</span>
						<span>In the meantime, you might like to:</span>
					</div>
					<div class="flex-cell cta">
						<a href="/dashboard" class="cta-item">
							<span class="icon dashboard-icon"></span>
							<span class="description">Go to your dashboard to review your membership information</span>
						</a>
						<a href="/membership/membership-benefits" class="cta-item">
							<span class="icon benefit-icon"></span>
							<span class="description">Take advantage of the great range of APA member benefits</span>
						</a>
						<a href="/pd/pd-search" class="cta-item">
							<span class="icon location-icon"></span>
							<span class="description">Check out upcoming professional development events near you</span>
						</a>
					</div>
				</div>
				<?php elseif(strpos($renewOuts['MResponse'], 'Order failed') !== false): ?>
					<?php if(strpos($renewOuts['MResponse'], '50') !== false): ?>
						<!--this is handle record error log-->
						<?php if(isset($_SESSION['UserName'])){ $addMemberLog["userID"] = $_SESSION['UserName'];  } 
								$addMemberLog["orderID"] = $postReviewData['OrderID'];
								$addMemberLog["jsonMessage"] = json_encode($recordOrder)."<br/><br/>".json_encode($renewOuts);
								$addMemberLog["createDate"] = date('Y-m-d');
								$addMemberLog["type"] =  "Renew";
								$addMemberLog["logError"] = 1;
								add_Member_Log($addMemberLog);
						?>
						<div class="flex-container" id="fail-purchase">
							<div class="flex-cell">
								<h3 class="light-lead-heading">There are insufficient funds in this account.</h3>
							</div>
							<div class="flex-cell">
								<span class="sub-heading">Please use another card, or try again.</span>
							</div>
						</div>
					<?php elseif(strpos($renewOuts['MResponse'], '12') !== false): ?>
						<!--this is handle record error log-->
						<?php if(isset($_SESSION['UserName'])){ $addMemberLog["userID"] = $_SESSION['UserName'];  } 
								$addMemberLog["orderID"] = $postReviewData['OrderID'];
								$addMemberLog["jsonMessage"] = json_encode($recordOrder)."<br/><br/>".json_encode($renewOuts);
								$addMemberLog["createDate"] = date('Y-m-d');
								$addMemberLog["type"] =  "Renew";
								$addMemberLog["logError"] = 1;
								add_Member_Log($addMemberLog);
						?>
						<div class="flex-container" id="fail-purchase">
							<div class="flex-cell">
								<h3 class="light-lead-heading">This card has been declined.</h3>
							</div>
							<div class="flex-cell">
							<span class="sub-heading">Please contact your financial institution or try again.</span>
							</div>
						</div>
					<?php elseif(strpos($renewOuts['MResponse'], '13') !== false): ?>
						<!--this is handle record error log-->
						<?php if(isset($_SESSION['UserName'])){ $addMemberLog["userID"] = $_SESSION['UserName'];  } 
								$addMemberLog["orderID"] = $postReviewData['OrderID'];
								$addMemberLog["jsonMessage"] = json_encode($recordOrder)."<br/><br/>".json_encode($renewOuts);
								$addMemberLog["createDate"] = date('Y-m-d');
								$addMemberLog["type"] =  "Renew";
								$addMemberLog["logError"] = 1;
								add_Member_Log($addMemberLog);
						?>
						<div class="flex-container" id="fail-purchase">
							<div class="flex-cell">
								<h3 class="light-lead-heading">Your financial institution requires verbal authoristion of this payment before it can be processed.</h3>
							</div>
							<div class="flex-cell">
							<span class="sub-heading">Please contact your financial institution.</span>
							</div>
						</div>
					<?php else: ?>
					<!--this is handle record error log-->
					<?php if(isset($_SESSION['UserName'])){ $addMemberLog["userID"] = $_SESSION['UserName'];  } 
							$addMemberLog["orderID"] = $postReviewData['OrderID'];
							$addMemberLog["jsonMessage"] = json_encode($recordOrder)."<br/><br/>".json_encode($renewOuts);
							$addMemberLog["createDate"] = date('Y-m-d');
							$addMemberLog["type"] =  "Renew";
							$addMemberLog["logError"] = 1;
							add_Member_Log($addMemberLog);
					?>
						<div class="flex-container" id="fail-purchase">
							<div class="flex-cell">
								<h3 class="light-lead-heading">There were unexpected issues processing<br> your payment request.</h3>
							</div>
							<div class="flex-cell">
								<span class="sub-heading">Please <a href="/renewmymembership">try again</a> or <a href="/contact-us">contact us</a>.</span>
							</div>
						</div>
					<?php endif; ?>
				<?php else: ?>
					<?php /*if(strpos($renewOuts['MResponse'], '50') !== false): ?>
						<div class="flex-container" id="fail-purchase">
							<div class="flex-cell">
								<h3 class="light-lead-heading">There are insufficient funds in this account.</h3>
							</div>
							<div class="flex-cell">
								<span class="sub-heading">Please use another card, or try again.</span>
							</div>
						</div>
						*/ ?>
					<?php if(strpos($renewOuts['MResponse'], '12') !== false): ?>
					    <!--this is handle record error log-->
						<?php if(isset($_SESSION['UserName'])){ $addMemberLog["userID"] = $_SESSION['UserName'];  } 
								$addMemberLog["orderID"] = $postReviewData['OrderID'];
								$addMemberLog["jsonMessage"] = json_encode($recordOrder)."<br/><br/>".json_encode($renewOuts);
								$addMemberLog["createDate"] = date('Y-m-d');
								$addMemberLog["type"] =  "Renew";
								$addMemberLog["logError"] = 1;
								add_Member_Log($addMemberLog);
						?>
						<div class="flex-container" id="fail-purchase">
							<div class="flex-cell">
								<h3 class="light-lead-heading">This card has been declined.</h3>
							</div>
							<div class="flex-cell">
							<span class="sub-heading">Please contact your financial institution or try again.</span>
							</div>
						</div>
					<?php /*elseif(strpos($renewOuts['MResponse'], '13') !== false): ?>
						<div class="flex-container" id="fail-purchase">
							<div class="flex-cell">
								<h3 class="light-lead-heading">Your financial institution requires verbal authoristion of this payment before it can be processed.</h3>
							</div>
							<div class="flex-cell">
							<span class="sub-heading">Please contact your financial institution.</span>
							</div>
						</div> */ ?>
					<?php else: ?>
					    <!--this is handle record error log-->
						<?php if(isset($_SESSION['UserName'])){ $addMemberLog["userID"] = $_SESSION['UserName'];  } 
								$addMemberLog["orderID"] = $postReviewData['OrderID'];
								$addMemberLog["jsonMessage"] = json_encode($recordOrder)."<br/><br/>".json_encode($renewOuts);
								$addMemberLog["createDate"] = date('Y-m-d');
								$addMemberLog["type"] =  "Renew";
								$addMemberLog["logError"] = 1;
								add_Member_Log($addMemberLog);
						?>
						<div class="flex-container" id="fail-purchase">
							<div class="flex-cell">
								<h3 class="light-lead-heading">There were unexpected issues processing<br> your payment request.</h3>
							</div>
							<div class="flex-cell">
								<span class="sub-heading">Please <a href="/renewmymembership">try again</a> or <a href="/contact-us">contact us</a>.</span>
							</div>
						</div>
					<?php endif; ?>
				<?php endif; ?>
				<?php ?>
			</div>
		</div>
	</div>
</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">		
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<?php /*
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
		frames['stsIaksbnkvoice'].location.href="<?php echo $invoiceAPI[0]; ?>";
	}
});
</script>
*/ ?>
<?php logRecorder();  ?>	
<script>
$(document).ready(function() {
	window.history.pushState(null,"", "/renewmymembership");        
	window.onpopstate = function() {
		window.history.pushState(null, "", "/renewmymembership");
	};
	$(function () {  
        $(document).keydown(function (e) {  
            return (e.which || e.keyCode) != 116;  
		}); 
		$(document).keydown(function (e) {  
            return (e.which || e.keyCode) != 78;  
		}); 
		$(document).keydown(function (e) {  
            return (e.which || e.keyCode) != 82;  
		}); 
		  
    });  
 });
</script>