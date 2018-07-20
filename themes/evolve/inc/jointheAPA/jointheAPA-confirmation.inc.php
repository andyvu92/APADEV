<?php
if(isset($_POST['step3'])) {
	//continue to get the review data
	$postReviewData = $_SESSION['postReviewData'];
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
		$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config');
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
   $paymentData['id'] = $registerOuts['Invoice_ID'];
   $paymentDataSchedules = GetAptifyData("46", $paymentData);
  //2.2.44 -get order detail test part
   $orderData = $registerOuts['Invoice_ID'];
   $orderDetails = GetAptifyData("44", $orderData);   		
}
	
   
}
?>
<?php
include('sites/all/themes/evolve/commonFile/updateBackgroundImage.php');
include('sites/all/themes/evolve/commonFile/dashboardLeftNavigation.php');
?>
<div id="pre_background" style="display:none">background_<?php echo $user['background']; ?></div>
<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 background_<?php echo $user['background']; ?>" id="dashboard-right-content">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dashboard_detail">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><span class="dashboard-name"><strong>Become a member</strong></span></div>
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
				<div class="row">
					<h2 style="color:white;">Thank you for your joining</h2>
					<p style="color:white;">We’re glad to have you on board.</p>
					<?php 
					// after web service 2.2.26 Aptify response the invoice_id;
					// 2.2.18 Get payment invoice PDF
					// Send - 
					// UserID & Invoice_ID
					// Response -Invoice PDF
					$send["UserID"] = $_SESSION["UserId"];
					$send["Invoice_ID"] = $invoice_ID;  
					//$invoiceAPI = GetAptifyData("18", $send); 
					$apis[0] = $invoice_ID;
					$invoiceAPI = GetAptifyData("18", $apis);
					?> 
					<br>
					<a class="download-link" data-toggle="modal" data-target="#Iaksbnkvoice"><span class="invoice-icon"></span><span class="invoice-text">Download Invoice</span></a>
					<p style="color:white;">A copy will be sent to your inbox and stored in your new ‘Member dashboard’under the ‘Purchases’ tab.</p>
				</div>
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
			</div>
		</div>
	</div>
</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">		
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
<?php logRecorder();  ?>