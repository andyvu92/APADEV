<?php
	if(isset($_POST["PRF"])) {
		// 2.2.32 - Order confirmation
		// Send - 
		// PRFdonation, Card number, Term+Condition, Product ID
		// Response -
		// Order status, Invoice ID
		$OrderSend["PRF"] = $_POST["PRF"];
		$OrderSend["TandC"] = $_POST["TandC"];
		$OrderSend["CardUsed"] = $_POST["CardUsed"];
		$PIDs = array();
		for($i = 1; $i <= intval($_POST["total"]); $i++) {
			$PID["PID"] = $_POST["PID".$i];
			array_push($PIDs, $PID);
		}
		$OrderSend["PID"] = $PIDs;
		$ReceiveOrder = GetAptifyData("32", $OrderSend);
	}
	
	if(isset($_POST["Invoice_ID"])) {
		// 2.2.18 - Get payment invoice PDF
		// Send - 
		// User ID, InvoiceID
		// Response -
		// Invoice
		$User["UserID"] = "UserID";
		$User["Invoice_ID"] = $_POST["Invoice_ID"];
		$GetPDF = GetAptifyData("18", $User);
	}
?>
<h2>Thank you for your purchase</h2>

<p>We hope you enjoy your event.</p>

<form action="/pd/completed-purchase" method="POST">
	<input type="hidden" value="1" name="Invoice_ID" id="Invoice_ID">
	<input type="submit" value="Download your receipt">
</form>

<p>Download <a><?php if(isset($GetPDF)) echo $GetPDF["Invoice"]; ?></a></p>

<p>A copy will be sent to your inbox and stored in your new dashboard</p>

<a target="_blank" class="addCartlink" href="../your-details"><button class="dashboard-button dashboard-bottom-button your-details-submit addCartButton">Go to my dashboard</button></a>