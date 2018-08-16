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
	$PIDs = array();
	for($i = 1; $i <= intval($_POST["total"]); $i++) {
		//$PID["PID"] = $_POST["PID".$i];
		$PID = $_POST["PID".$i];
		array_push($PIDs, $PID);
		
	}
	if(isset($_POST["totalNG"])){
		for($i = 1; $i <= intval($_POST["totalNG"]); $i++) {
			//$PID["PID"] = $_POST["PID".$i];
			$PID = $_POST["NG".$i];
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
		$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config');
		//$type = array("PD","PDNG");
		
		//$in  = str_repeat('?,', count($type) - 1) . '?';
		try {
			$type="PD";
			$shoppingCartDel= $dbt->prepare('DELETE FROM shopping_cart WHERE userID=:userID and type=:type');
			$shoppingCartDel->bindValue(':userID', $userID);
			$shoppingCartDel->bindValue(':type', $type);
			$shoppingCartDel->execute();
			$shoppingCartDel = null;
			$type="PDNG";
			$shoppingCartDel= $dbt->prepare('DELETE FROM shopping_cart WHERE userID=:userID and type=:type');
			$shoppingCartDel->bindValue(':userID', $userID);
			$shoppingCartDel->bindValue(':type', $type);
			$shoppingCartDel->execute();
			$shoppingCartDel = null;
		}
		/*
		try {
			$type="PDNG";
			$shoppingCartDel= $dbt->prepare('DELETE FROM shopping_cart WHERE userID=:userID and type=:type');
			$shoppingCartDel->bindValue(':userID', $userID);
			$shoppingCartDel->bindValue(':type', $type);
			$shoppingCartDel->execute();
			$shoppingCartDel = null;
		}*/
		catch (PDOException $e) {
				print "Error!: " . $e->getMessage() . "<br/>";
				die();
	    }
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
<h2>Thank you for your purchase</h2>
<p>We hope you enjoy your event.</p>

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
<p>Your invoice will be sent to your inbox shortly</p>
<?php else:?>
<p>Your purchase is not successfull.</p>
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
<a target="_blank" class="addCartlink" href="../your-purchases"><button class="dashboard-button dashboard-bottom-button your-details-submit addCartButton">Go to my dashboard</button></a>
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