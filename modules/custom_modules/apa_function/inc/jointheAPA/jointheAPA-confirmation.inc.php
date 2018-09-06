<?php
if(isset($_POST['step3'])) {
	//continue to get the review data
	$postReviewData = $_SESSION['postReviewData'];
	$postReviewData['productID'] = getProductList($_SESSION['UserId']);
	if(isset($_POST['Paymentcard'])){ $postReviewData['Card_number'] = $_POST['Paymentcard']; }
	//if(isset($_POST['rollover'])){ $postReviewData['Rollover'] = $_POST['rollover']; }
	if(isset($_SESSION["tempcard"])){
		$cardDetails = $_SESSION["tempcard"];
		//$postReviewData['Payment-method'] = $cardDetails['Payment-method'];
		//$postReviewData['Cardno'] = $cardDetails['Cardno'];
		//$postReviewData['Expiry-date'] = $cardDetails['Expiry-date'];
		//$postReviewData['CCV'] = $cardDetails['CCV'];
		//test data
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
	$postReviewData['InsuranceApplied'] = 0;
		
	// 2.2.26 - Register a new order
	// Send - 
	// userID&Paymentoption&PRFdonation&Rollover&Card_number&productID
	// Response -Register a new order successfully
	$registerOuts = GetAptifyData("26", $postReviewData);
    if($registerOuts['Invoice_ID']!=="0") {
		//refresh session data
		$data = "UserID=".$_SESSION["UserId"];
		$details = GetAptifyData("4", $data,"");
		newSessionStats($details["MemberTypeID"], $details["MemberType"], $details["Status"],$details["PersonSpecialisation"],$details["PaythroughtDate"],$details["Nationalgp"]);
		//end refresh session data
		$invoice_ID = $registerOuts['Invoice_ID'];
		//save the terms and conditons on APA side
		$dataArray = array();
		$dataArray['MemberID'] = $postReviewData['userID'];
		$dataArray['CreateDate']= date('Y-m-d');
		$dataArray['MembershipYear'] = date('Y',strtotime('+1 year'));
		$dataArray['ProductList'] = implode(",",$postReviewData['productID']);
		$dataArray['Type'] = "J";
		forCreateRecordFunc($dataArray);
		//delete session: really important!!!!!!!!
		completeOrderDeleteSession();
		// delete shopping cart data from APA database; put the response status validation here!!!!!!!
		$userID = $_SESSION["UserId"];
		$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Rkd#!8cd,&ag6e95g9&5192(gb[5g');
		$type = "PD";
		try {
			$shoppingCartDel= $dbt->prepare('DELETE FROM shopping_cart WHERE userID=:userID and type!=:type');
			$shoppingCartDel->bindValue(':userID', $userID);
			$shoppingCartDel->bindValue(':type', $type);
			$shoppingCartDel->execute();
			$shoppingCartDel = null;
		}
		catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		} 
//2.2.46 -get order payment schedules test part
   //$paymentData['id'] = $registerOuts['Invoice_ID'];
   //$paymentDataSchedules = GetAptifyData("46", $paymentData);
  //2.2.44 -get order detail test part
  // $orderData = $registerOuts['Invoice_ID'];
  // $orderDetails = GetAptifyData("44", $orderData);   		
}
	
   
}
else{
	header("Location: /");
}
?>
<?php
include('sites/all/themes/evolve/commonFile/updateBackgroundImage.php');
include('sites/all/themes/evolve/commonFile/dashboardLeftNavigation.php');
/* get background image****/
if(isset($_SESSION['UserId'])) { $userID = $_SESSION['UserId'];} else { $userID =0; }
$background = getBackgroundImage($userID);
/* get background image****/
?>
<div id="pre_background" style="display:none">background_<?php echo $background; ?></div>
<div class="col-xs-12 background_<?php echo $background; ?>" id="dashboard-right-content">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dashboard_detail">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="col-xs-12"><span class="dashboard-name"><strong>Thank you for joining</strong></span></div>
		<!--<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><button class="dashboard-backgroud" data-target="#myModal" data-toggle="modal"><span class="customise_background <?php if(!isset($_SESSION["userID"])) echo "display-none";?>">Customise your background</span><span class="customise_icon">[icon class="fa fa-cogs fa-x"][/icon]</span></button></div>-->
		</div>
	<?php
	include('sites/all/themes/evolve/commonFile/customizeBackgroundImage.php');
	?>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
				<ul class="nav nav-tabs">
					<li><a class="tabtitle1 inactiveLink" style="cursor: pointer;"><span class="eventtitle1" id="yourdetails-tab"><strong>Your details</strong></span> </a></li>
					<li><a class="tabtitle2 inactiveLink" style="cursor: pointer;"><span class="eventtitle2" id="membership"><strong>Membership</strong></span></a></li>
					<li><a class="tabtitle3 inactiveLink" style="cursor: pointer;"><span class="eventtitle3" id="workplace"><strong>Workplace</strong></span></a></li>
					<li><a class="tabtitle4 inactiveLink" style="cursor: pointer;"><span class="eventtitle4" id="education"><strong>Education</strong></span></a></li>
					<li><a class="tabtitle5 inactiveLink" style="cursor: pointer;"><span class="eventtitle5" id="Insurance"><strong>Insurance</strong></span></a></li>
					<li><a class="tabtitle6 inactiveLink" style="cursor: pointer;"><span class="eventtitle6" id="Survey"><strong>Survey</strong></span></a></li>
					<li><a class="tabtitle7 inactiveLink" style="cursor: pointer;"><span class="eventtitle7" id="Payment"><strong>Payment</strong></span></a></li>
					<li><a class="tabtitle8 inactiveLink" style="cursor: pointer;"><span class="eventtitle8 text-underline" id="Review"><strong>Review</strong></span></a></li>
				</ul>
				<?php if($registerOuts['Invoice_ID']!=="0"):?>
				<div class="row">
					<h2 style="color:#000;">Welcome to the APA!</h2>
					<p style="color:#000;">We’re glad to have you on board, a copy of your purchase receipt will be sent to your inbox, along with your membership certification.</p>
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
					<br>
					<?php
					/*
					<a class="download-link" data-toggle="modal" data-target="#Iaksbnkvoice"><span class="invoice-icon"></span><span class="invoice-text">Download Invoice</span></a>
					*/
					?>
					<p style="color:#000;">In the meantime, go to your <a href="dashboard">dashboard </a> to review your membership information or check out the great <a href="/membership/membership-benefits">range of benefits</a> available to APA members. </p>
				</div>
				<?php else:?>
					<style>
						#dashboard-right-content .nav-tabs{
							display: none;
						}
						span.dashboard-name{
							display: none;
						}
					</style>
					<script>
						jQuery(document).ready(function(){
							$('#dashboard-right-content .nav-tabs').remove();
							$('span.dashboard-name').remove();						});
					</script>
					<div class="flex-container" id="fail-purchase">
						<div class="flex-cell">
							<h3 class="light-lead-heading">We had issues processing<br>your payment request.</h3>
						</div>
						<div class="flex-cell">
							<span class="sub-heading">Please <a href="/jointheapa">try again</a> or <a href="/contact-us">contact us</a>.</span>
						</div>
						<div class="flex-cell pd-featured"><img src="/sites/default/files/pd-featured-images/next-18.5.png"></div>
					</div>
				<?php endif; ?>
				<?php /*
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
				*/ ?>
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