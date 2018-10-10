<?php
if(isset($_POST["POSTPRF"])) {
	
	// 2.2.32 - Order confirmation
	// Send - 
	// PRFdonation, Card number, Term+Condition, Product ID
	// Response -
	// Order status, Invoice ID
	$OrderSend["userID"] = $_SESSION["UserId"];
	$OrderSend["PRFdonation"] = $_POST["POSTPRF"];
	//$OrderSend["TandC"] = $_POST["TandC"];
	$OrderSend["Card_number"] = $_POST["CardUsed"];
	//$OrderSend["Card_number"] = "";
	$PIDs = array();
	if(isset($_POST["total"])){
		
		for($i = 1; $i <= intval($_POST["total"]); $i++) {
			//$PID["PID"] = $_POST["PID".$i];
			$PID = $_POST["PID".$i];
			array_push($PIDs, $PID);
			
		}
	}
	if(isset($_POST["totalNG"])){
		for($i = 1; $i <= intval($_POST["totalNG"]); $i++) {
			//$PID["PID"] = $_POST["PID".$i];
			$PID = $_POST["NG".$i];
			array_push($PIDs, $PID);
			
		}
	}
	if(isset($_POST["totalMG"])){
		for($i = 1; $i <= intval($_POST["totalMG"]); $i++) {
			//$PID["PID"] = $_POST["PID".$i];
			$PID = $_POST["MG".$i];
			array_push($PIDs, $PID);
			
		}
	}
	$OrderSend["productID"] = $PIDs;
	if(isset($_SESSION["tempcard"])){
		$cardDetails = $_SESSION["tempcard"];
		$OrderSend['PaymentTypeID'] = $cardDetails['Payment-method'];
		$OrderSend['CCNumber'] = $cardDetails['Cardno'];
		$OrderSend['CCExpireDate'] = $cardDetails['Expiry-date'];
		$OrderSend['CCSecurityNumber'] = $cardDetails['CCV'];
		$OrderSend['Card_number'] = "";	
	}
	else{
		$OrderSend['PaymentTypeID'] = "";
		$OrderSend['CCNumber'] = "";
		$OrderSend['CCExpireDate'] = "";
		$OrderSend['CCSecurityNumber'] = "";
	}
	$OrderSend['InsuranceApplied'] = 0;
	$OrderSend['Paymentoption'] = 0;
	$OrderSend['InstallmentFor'] = "Membership";
	$OrderSend['InstallmentFrequency'] = "";
	$OrderSend['CampaignCode'] = $_POST["CouponCode"];
	$registerOuts = GetAptifyData("26", $OrderSend);
	//delete session: really important!!!!!!!!
	unset($_SESSION["tempcard"]);
	if($registerOuts['Invoice_ID']!=="0") {
		$invoice_ID = $registerOuts['Invoice_ID'];
		
		//put extra code when using API to get the status of order, if it is successful, will save terms and conditions on APA side
		//save the terms and conditons on APA side
		$dataArray = array();
		$dataArray['MemberID'] = $_SESSION['UserId'];
		$dataArray['CreateDate']= date('Y-m-d');
		$dataArray['MembershipYear'] = "";
		$dataArray['ProductList'] = implode(",",$OrderSend["productID"]);
		$dataArray['Type'] = "P";
		forCreateRecordFunc($dataArray);
		
		// delete shopping cart data from APA database; put the response status validation here!!!!!!!
		$userID = $_SESSION["UserId"];
		$type = "PD";
		checkShoppingCart($userID, $type, $productID="");
		$type = "PDNG";
		checkShoppingCart($userID, $type, $productID="");
		$type = "PDMG";
		checkShoppingCart($userID, $type, $productID="");
		//add subscription 
		if(isset($_SESSION['UserId'])) {
    // 2.2.23 - GET list of subscription preferences
    // Send - 
    // UserID
    // Response -
    // List of subscriptions and its T/F values.
    $sendData["UserID"] = $_SESSION['UserId'];
    $subscriptions = aptify_get_GetAptifyData("23", $sendData);
    $Subscription = $subscriptions["results"];
    $ArrayReturn = Array();
    $ArrayReturn["UserID"] = $_SESSION['UserId'];
    // 2.2.22 - Get list of subscribed Fellowship Products
    // Send - 
    // UserID
    // Response -
    // List of Fellowship ID and its titles.
    $Fellows = aptify_get_GetAptifyData("22", $sendData);
    $MagSubs = Array();
    $Fellow = $Fellows["results"];
    foreach($Fellow as $Subs) {
        if(strpos($Subs["FPtitle"], "Magazine") !== false) {
            $divs = explode(" ", $Subs["FPtitle"]);
            if($divs[0] == "InTouch" || $divs[0] == "Sports") {
                array_push($MagSubs, $divs[0]);
            }
        }
    }
    $SubListAll = Array();
    $subArray = Array();
    $consArray = Array();
    foreach($Subscription as $Subs) {
        $ArrayRe["SubscriptionID"] = $Subs["ConsentID"];
        $arrayUpdate["ConsentID"] = $Subs["ConsentID"];
        if($Subs["ConsentID"] == '15') {
            // APA email
            $ArrayRe["Subscribed"] = $Subs["Subscribed"];
            $arrayUpdate["Subscribed"] = $Subs["Subscribed"];
        } elseif($Subs["ConsentID"] == '18') {
            // InMotion Copy
            if($_SESSION['MemberTypeID'] == "31" || $_SESSION['MemberTypeID'] == "32" || $_SESSION['MemberTypeID'] == "34" || $_SESSION['MemberTypeID'] == "35" || $_SESSION['MemberTypeID'] == "36") {
                // No InMotion print copy for 
                // student (M7, M7a), Physiotherapy assistant (M9) and Associated (M10)
                // and M11 Associated (Oversea)
                $ArrayRe["Subscribed"] = '0';
                $arrayUpdate["Subscribed"] = '0';
            } else {
                $ArrayRe["Subscribed"] = $Subs["Subscribed"];
                $arrayUpdate["Subscribed"] = $Subs["Subscribed"];
            }
        } else {
            // InTouch and Sports
            $ArrayRe["Subscribed"] = $Subs["Subscribed"];
            $arrayUpdate["Subscribed"] = $Subs["Subscribed"];
            if($Subs["ConsentID"] == '16' || $Subs["ConsentID"] == '17') {
				foreach($MagSubs as $mags) {
					$tts = strpos($Subs["Consent"], $mags);
					if($tts !== FALSE) {
						$ArrayRe["Subscribed"] = '1';//$Subs["Subscribed"];
						$arrayUpdate["Subscribed"] = '1';//$Subs["Subscribed"];
					}
				}
			}
        }
        array_push($consArray, $arrayUpdate);
        $ArrayRe["Subscription"] = $Subs["Consent"];
        array_push($SubListAll, $ArrayRe);
    }
    $ArrayReturn["Subscriptions"] = $subArray;
    $ArrayReturn["Consents"] = $consArray;
    // 2.2.24 - Update subscription preferences
    // Send - 
    // UserID, List of subscriptions and its F/F values.
    // Response -
    // Response, List of subscriptions and it's T/F values.
    $subscriptions = aptify_get_GetAptifyData("24", $ArrayReturn);
}
		
		//end add
	}
}

if(isset($_POST["Invoice_ID"])) {
	// 2.2.18 - Get payment invoice PDF
	// Send - 
	// User ID, InvoiceID
	// Response -
	// Invoice
	//$User["UserID"] = "UserID";
	//$User["Invoice_ID"] = $_POST["Invoice_ID"];
	//$GetPDF = GetAptifyData("18", $User);
}
?>
<?php logRecorder();  ?>
<?php if($registerOuts['Invoice_ID']!=="0"):?>

<div class="flex-container" id="non-member">
	<div class="flex-cell">
		<h3 class="light-lead-heading">Purchase successful!</h3>
	</div>

	<div class="flex-cell">
		<h3 class="light-heading">A copy of your purchase receipt will be send to your inbox.<br />
		You can also find a record on your dashboard.</h3>
	</div>

	<div class="flex-cell cta"><a class="join" href="/dashboard">Go to dashboard &gt;</a></div>

	<?php 
		$block = block_load('block', '309');
		$get = _block_get_renderable_array(_block_render_blocks(array($block)));
		$output = drupal_render($get);        
		print $output;
	?>

</div>

<?php /*
<!--<form action="/pd/completed-purchase" method="POST">
	<input type="hidden" value="1" name="Invoice_ID" id="Invoice_ID">
	<input type="submit" value="Download your receipt">
</form>-->

<!--<p>Download <a><?php //if(isset($GetPDF)) //echo $GetPDF["Invoice"]; 
//$apis[0] = $invoice_ID;
//$invoiceAPI = GetAptifyData("18", $apis);
?></a></p>-->
<a class="download-link" data-toggle="modal" data-target="#Iaksbnkvoice"><span class="invoice-icon"></span><span class="invoice-text">Download Invoice</span></a>
*/ ?>

<!--<a class="addCartlink" href="../your-purchases"><button class="dashboard-button dashboard-bottom-button your-details-submit addCartButton">Go to my dashboard</button></a>-->

<?php else:?>
<!-- FAIL PURCHASE -->
<div class="flex-container fail-purchase">
<div  class="flex-cell fail-purchase-title" style="text-align: center"><h3 class="light-lead-heading align-center">We had issues processing your payment request.</h3></div>
<div class="flex-cell sub-text">
	<h3 class="light-lead-heading align-center">Please <a href="/pd/pd-shopping-cart">update your card details</a> or <a href="/contact-us">contact us</a></h3>
</div>

<?php 
		$block = block_load('block', '309');
		$get = _block_get_renderable_array(_block_render_blocks(array($block)));
		$output = drupal_render($get);        
		print $output;
?>

</div>
<?php endif;?>

<?php  /*
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