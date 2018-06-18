<?php
if(isset($_POST["PRF"])) {
	// 2.2.32 - Order confirmation
	// Send - 
	// PRFdonation, Card number, Term+Condition, Product ID
	// Response -
	// Order status, Invoice ID
	$OrderSend["userID"] = $_SESSION["UserId"];
	$OrderSend["PRFdonation"] = $_POST["PRF"];
	//$OrderSend["TandC"] = $_POST["TandC"];
	$OrderSend["Card_number"] = $_POST["CardUsed"];
	$PIDs = array();
	for($i = 1; $i <= intval($_POST["total"]); $i++) {
		//$PID["PID"] = $_POST["PID".$i];
		$PID = $_POST["PID".$i];
		array_push($PIDs, $PID);
		
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
	$OrderSend['Paymentoption'] = 1;
	$OrderSend['InstallmentFor'] = "Membership";
	$OrderSend['InstallmentFrequency'] = "Monthly";
	$OrderSend['CampaignCode'] = "";
	$ReceiveOrder = GetAptifyData("26", $OrderSend);
	if($registerOuts['Invoice_ID']!=="0") {
		$invoice_ID = $registerOuts['Invoice_ID'];
		
		//put extra code when using API to get the status of order, if it is successful, will save terms and conditions on APA side
		//save the terms and conditons on APA side
		$dataArray = array();
		$dataArray['MemberID'] = $_SESSION['userID'];
		$dataArray['CreateDate']= date('Y-m-d');
		$dataArray['MembershipYear'] = "";
		$dataArray['ProductList'] = implode(",",$OrderSend["productID"]);
		$dataArray['Type'] = "P";
		forCreateRecordFunc($dataArray);
		//delete session: really important!!!!!!!!
		unset($_SESSION["tempcard"]);
		// delete shopping cart data from APA database; put the response status validation here!!!!!!!
		$userID = $_SESSION["UserId"];
		$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config');
		$type = "PD";
		try {
			$shoppingCartDel= $dbt->prepare('DELETE FROM shopping_cart WHERE userID=:userID and type=:type');
			$shoppingCartDel->bindValue(':userID', $userID);
			$shoppingCartDel->bindValue(':type', $type);
			$shoppingCartDel->execute();
			$shoppingCartDel = null;
		}
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