<?php
 $invoice_ID ="";
if(isset($_POST['step3'])) {
	//continue to get the review data
	$postReviewData = $_SESSION['postReviewData'];
	$postReviewData['productID'] = getProductList($_SESSION['UserId']);
	if(isset($_POST['Paymentcard'])){ $postReviewData['Card_number'] = $_POST['Paymentcard']; }
	//if(isset($_POST['rollover'])){ $postReviewData['Rollover'] = $_POST['rollover']; }
	//if(isset($_POST['Installpayment-frequency'])){ $postReviewData['Installpayment-frequency'] = $_POST['Installpayment-frequency']; }
	
	if(isset($_SESSION["tempcard"])){
		$cardDetails = $_SESSION["tempcard"];
		
		//$postReviewData['Payment-method'] = $cardDetails['Payment-method'];
		//$postReviewData['Cardno'] = $cardDetails['Cardno'];
		//$postReviewData['Expiry-date'] = $cardDetails['Expiry-date'];
		//$postReviewData['CCV'] = $cardDetails['CCV'];
		$postReviewData['PaymentTypeID'] = $cardDetails['Payment-method'];
		$postReviewData['CCNumber'] = $cardDetails['Cardno'];
		$postReviewData['CCExpireDate'] = $cardDetails['Expiry-date'];
		//test data
		
		$postReviewData['CCSecurityNumber'] = $cardDetails['CCV'];	
		$postReviewData['Card_number'] = "";	
	}
	else{
		$postReviewData['PaymentTypeID'] = "";
		$postReviewData['CCNumber'] = "";
		$postReviewData['CCExpireDate'] = "";
		$postReviewData['CCSecurityNumber'] = "";
	}
	
	//This is to get the renewal quatation order details from Aptify!!!!!!!!
	// 2.2.45 - Renewal Quatation OrderID
	// Send - 
	// userID
	// Response -Renewal Quatation OrderID
	$variableData['id'] = $_SESSION["UserId"];
	$Quatation = GetAptifyData("45", $variableData);
	foreach ($Quatation["results"] as $quatationOrderArray){
		$quatationOrderID =  $quatationOrderArray["ID"];
	}
	
	$postReviewData['OrderID'] = $quatationOrderID;
	
	$postReviewData['InsuranceApplied'] = 0;
	
	
	// 2.2.27 - Renew a membership order
	// Send - 
	// userID&Paymentoption&PRFdonation&Rollover&Card_number&productID
	// Response -Renew a membership order successfully
	//submit data to complete renew membership web service 2.2.27
	$renewOuts=GetAptifyData("27", $postReviewData);
	if($renewOuts['MResponse'] =="Order updated successfully") {
	//refresh session data
	$data = "UserID=".$_SESSION["UserId"];
	$details = GetAptifyData("4", $data,"");
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
<div id="pre_background" style="display:none">background_<?php echo $background; ?></div>
<div class="col-xs-12 background_<?php echo $background; ?>" id="dashboard-right-content">
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

				<?php else: ?>

					<div class="flex-container" id="fail-purchase">
						<div class="flex-cell">
							<h3 class="light-lead-heading">We had issues processing<br> your payment request.</h3>
						</div>
						<div class="flex-cell">
							<span class="sub-heading">Please <a href="/renewmymembership">try again</a> or <a href="/contact-us">contact us</a>.</span>
						</div>
						<!-- <div class="flex-cell pd-featured"><img src="/sites/default/files/pd-featured-images/next-18.5.png"></div> -->
					</div>
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