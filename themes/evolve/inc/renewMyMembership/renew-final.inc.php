<?php
//use session: $_SESSION['userID'],$_SESSION["postReviewData"]
//save PRF product into APA database function
//save PRF product into APA database function
function createShoppingCart($userID, $productID,$coupon){
	$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config'); 
	try {
		$shoppingcartUpdate= $dbt->prepare('INSERT INTO shopping_cart (userID, productID, coupon) VALUES (:userID, :productID, :coupon)');
		$shoppingcartUpdate->bindValue(':userID', $userID);
		$shoppingcartUpdate->bindValue(':productID', $productID);
		$shoppingcartUpdate->bindValue(':coupon', $coupon);
		$shoppingcartUpdate->execute();	
		$shoppingcartUpdate = null;
	}
	catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}
}
// check the user product in case of duplicated shopping cart data
function checkShoppingCart($userID, $productID){
		$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config'); 
		try {
			$shoppingcartGet = $dbt->prepare('SELECT * FROM shopping_cart WHERE userID=:userID and productID=:productID');
			$shoppingcartGet->bindValue(':userID', $userID);
			$shoppingcartGet->bindValue(':productID', $productID);
			$shoppingcartGet->execute();
			if($shoppingcartGet->rowCount()>0) { 
			   $shoppingcartDel = $dbt->prepare('DELETE FROM shopping_cart WHERE userID=:userID and productID=:productID');
			   $shoppingcartDel->bindValue(':userID', $userID);
			   $shoppingcartDel->bindValue(':productID', $productID);
			   $shoppingcartDel->execute();	
			   $shoppingcartDel = null;
			}
			$shoppingcartGet = null; 
	    }
		catch (PDOException $e) {
				print "Error!: " . $e->getMessage() . "<br/>";
				die();
	    }
}
//get productID list from local database;
function getProductList($userID){
	$arrayReturn = array();
	$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config');
	//$shoppingcartGet = $dbt->prepare('SELECT * FROM shopping_cart WHERE userID=:userID AND type=:type');
	$shoppingcartGet = $dbt->prepare('SELECT * FROM shopping_cart WHERE userID=:userID');
	$shoppingcartGet->bindValue(':userID', $userID);
	//$shoppingcartGet->bindValue(':type', $type);
	$shoppingcartGet->execute();
	if($shoppingcartGet->rowCount()>0) { 
		foreach ($shoppingcartGet as $row) {
		array_push($arrayReturn, $row['productID']);
		}
	}	
	$shoppingcartGet = null;
	return $arrayReturn;
}
//From insurance page to review page;	
if(isset($_POST['step2'])) {
	$postPaymentData = array();
	$postReviewData = array();
	// 2.2.15 Add payment method
	// Send - 
	// UserID&Payment-method&Name-on-card&Cardno&Expiry-date&CCV
	// Response - Add payment card successful
if(isset($_POST['addCard']) && $_POST['addCard'] == "1"  && isset($_POST['addcardtag'])){
		if(isset($_SESSION['userID'])){ $postPaymentData['userID'] = $_SESSION['userID']; }
		if(isset($_POST['Cardtype'])){ $postPaymentData['Payment-method'] = $_POST['Cardtype']; }
		//if(isset($_POST['Cardname'])){ $postPaymentData['Name-on-card'] = $_POST['Cardname']; }
		if(isset($_POST['Cardnumber'])){ $postPaymentData['Cardno'] = $_POST['Cardnumber']; }
		if(isset($_POST['Expirydate'])){ $postPaymentData['Expiry-date'] = $_POST['Expirydate']; }
		if(isset($_POST['CCV'])){ $postPaymentData['CCV'] = $_POST['CCV']; }
		GetAptifyData("15", $postPaymentData);
}
elseif(isset($_POST['addCard']) && $_POST['addCard'] == "1" && !isset($_POST['addcardtag'])){
	$tempcard = array();
	$tempcard['Payment-method'] = $_POST['Cardtype'];
	$tempcard['Cardno'] = $_POST['Cardnumber'];
	$tempcard['Expiry-date'] = $_POST['Expirydate']; 
	$tempcard['CCV'] = $_POST['CCV'];
	$_SESSION['tempcard'] = $tempcard;
		
}
// 2.2.26 Register a new member order
// Send - 
// UserID&Paymentoption&PRFdonation&Rollover&productID&Insurancelist
// Response - Invoice_ID
if(isset($_SESSION['userID'])){ $postReviewData['userID'] = $_SESSION['userID']; } 
if(isset($_POST['Paymentoption'])){ $postReviewData['Paymentoption'] = $_POST['Paymentoption']; }
if(isset($_POST['PRF'])){ 
$postReviewData['PRF'] = $_POST['PRF']; 
//check is there PRF product existed for this user
checkShoppingCart($userID, $prodcutID="PRF");
//save PRF product into APA database function
createShoppingCart($userID=$_SESSION['userID'], $productID="PRF", $coupon=$_POST['PRF']);  
}
if(isset($_POST['Rollover'])){ $postReviewData['Rollover'] = $_POST['Rollover']; }
if(isset($_POST['Installpayment-frequency'])){ $postReviewData['Installpayment-frequency'] = $_POST['Installpayment-frequency']; }
// 2.2.31 Get Membership prodcut price
// Send - 
// UserID&productID
// Response - Title&Price&Continue instalment
$prodcutID = getProductList($_SESSION['userID']);
$postReviewData['productID'] = $prodcutID;
$products = GetAptifyData("31", $prodcutID);

//store data in the session
$_SESSION["postReviewData"] =  array();
$_SESSION["postReviewData"] = $postReviewData;
}
//From review page to review page to add payment method again; 
if(isset($_POST['stepAdd'])) {
// 2.2.15 Add payment method
// Send - 
// UserID&Payment-method&Name-on-card&Cardno&Expiry-date&CCV
// Response - Add payment card successful
if(isset($_SESSION['userID'])){ $postPaymentData['userID'] = $_SESSION['userID']; }
if(isset($_POST['Cardtype'])){ $postPaymentData['Payment-method'] = $_POST['Cardtype']; }
//if(isset($_POST['Cardname'])){ $postPaymentData['Name-on-card'] = $_POST['Cardname']; }
if(isset($_POST['Cardnumber'])){ $postPaymentData['Cardno'] = $_POST['Cardnumber']; }
if(isset($_POST['Expirydate'])){ $postPaymentData['Expiry-date'] = $_POST['Expirydate']; }
if(isset($_POST['CCV'])){ $postPaymentData['CCV'] = $_POST['CCV']; }
if(isset($_POST['addNewCard'])&& $_POST['addNewCard'] == "1") { GetAptifyData("15", $postPaymentData); }  
//use webservice 2.2.31 Get Membership prodcut price
$prodcutID = getProductList($_SESSION['userID']);
$products = GetAptifyData("31", $prodcutID);

}
if(isset($_POST['Paymentcard']) && $_POST['addCard'] == "0") {
$usedCard = $_POST['Paymentcard']; 
//use webservice 2.2.13 update payment method
$postCard['userID'] = $_SESSION['userID'];
$postCard['Creditcard-ID'] = $usedCard;
GetAptifyData("13", $postCard);
}
// 2.2.12 Get payment listing
	// Send - 
	// UserID & detail data
	// Response -payment card list
	$cardsnum = GetAptifyData("12", $_SESSION['userID']);   
?> 
<div class="down8" <?php if(isset($_POST['step2'])|| isset($_POST['stepAdd']))echo 'style="display:block;"'; else { echo 'style="display:none;"';}?> >
	<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
		<table class="memSCTable">
			<tbody>
				<tr>
				<th>Product name</th>
				<th>Price</th>
				<th>Delete</th>
				</tr>
				<?php 
				$price = "";
				foreach( $products['products'] as $product){
				echo "<tr>";
				echo "<td>".$product['ProdcutName']."</td>";
				echo "<td>A$".$product['Price']."</td>";
				$price += $product['Price'];
				echo '<td>delete</td>';
				echo "</tr>";  
				}
				if((isset($_SESSION["postReviewData"]['PRF'])) && ($_SESSION["postReviewData"]['PRF']!="")){ echo '<tr><td>Physiotherapy Research Foundation donation</td><td>A$'.$_SESSION["postReviewData"]['PRF'].'</td><td>delete</td></tr>'; }
				?>
			</tbody>
		</table>
		</div>
	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 Membpaymentsiderbar">
		<p><span class="sidebardis<?php if($price==0) echo " display-none";?>">Payment Information:</span></p>
				<div class="paymentsidecredit <?php if($price==0) echo " display-none";?>"> 
		<?php if ((sizeof($cardsnum)!=0) && (!isset($_SESSION['tempcard']))): ?>   
			<fieldset>
				<select  id="Paymentcard" name="Paymentcard" disabled>
				
					<?php foreach( $cardsnum["paymentcards"] as $cardnum):  ?>
					<option value="<?php echo  $cardnum["Digitsnumber"];?>" <?php if($cardnum["Description"]=="Y") echo "selected"; ?> data-class="<?php echo  $cardnum["Payment-method"];?>">Credit card ending with <?php echo  $cardnum["Digitsnumber"];?></option>
					<?php endforeach; ?>
				
				</select>
			</fieldset>
		<?php endif; ?>  
		<?php if(isset($_SESSION['tempcard'])) : ?>
		<?php $tempcards = $_SESSION['tempcard'];?>
		    <div class="row">
				<div class="col-lg-12">
					<select class="form-control" id="Cardtype" name="Cardtype" placeholder="Card type" disabled>
						<option value="AE" <?php if($tempcards['Payment-method'] == 'AE') echo "selected"; ?>>American Express</option>
						<option value="Visa" <?php if($tempcards['Payment-method'] == 'Visa') echo "selected"; ?>>Visa</option>
						<option value="Mastercard" <?php if($tempcards['Payment-method'] == 'Mastercard') echo "selected"; ?>>Mastercard</option>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<input type="text" class="form-control" id="Cardnumber" name="Cardnumber" value="<?php echo $tempcards['Cardno']; ?>"  placeholder="Card number" readonly>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<input type="date" class="form-control" id="Expirydate" name="Expirydate" value="<?php echo $tempcards['Expiry-date']; ?>" placeholder="Expire date" readonly>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<input type="text" class="form-control" id="CCV" name="CCV" value="<?php echo $tempcards['CCV']; ?>" placeholder="CCV" readonly>
				</div>
			</div>
		
		<?php endif; ?>
		</div>
	<!-- <div class="paymentsideuse"><input type="checkbox" id="anothercard"><label for="anothercard"><a class="cardevent" style="cursor: pointer;color:white;">Use another card</a></label>
	<div class="carddown" style="display:none;">
	<form action="renewmymembership" method="POST" id="formaddcard">
	<input type="hidden" name="stepAdd" value="2"/>
	<input type="hidden" name="addNewCard" value="1"/>
	<div class="row">
	<div class="col-lg-12">
	<select class="form-control" id="Cardtype" name="Cardtype" placeholder="Card type">
	<option value="AE">American Express</option>
	<option value="Visa">Visa</option>
	<option value="Mastercard">Mastercard</option>
	</select>
	</div>
	</div>
	<div class="row">
	<div class="col-lg-12">
	<input type="text" class="form-control" id="Cardname" name="Cardname" placeholder="Name on card">
	</div>
	</div>
	<div class="row">
	<div class="col-lg-12">
	<input type="text" class="form-control" id="Cardnumber" name="Cardnumber" placeholder="Card number">
	</div>
	</div>
	<div class="row">
	<div class="col-lg-12">
	<input type="date" class="form-control" id="Expirydate" name="Expirydate" placeholder="Expire date">
	</div>

	</div>
	<div class="row">
	<div class="col-lg-12">
	<input type="text" class="form-control" id="CCV" name="CCV" placeholder="CCV">
	</div>
	</div>
	<div class="row">
	<a href="javascript:document.getElementById('formaddcard').submit();" class="join-details-button7"><span class="dashboard-button-name">Add</span></a>
	</div>
	</form>
	</div>
	</div>
	-->
		<div class="row ordersummary"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><span>YOUR ORDER</span></div></div>
			<table>
				<tr>
				<td>Sub total (Inc. GST)</td>
				<td>A$<?php echo $price;?></td>
				</tr>
				<?php 
				if(isset($_SESSION["postReviewData"]['PRF']) && ($_SESSION["postReviewData"]['PRF']!="")){ echo '<tr><td>PRF donation</td><td>A$'.$_SESSION["postReviewData"]['PRF'].'</td></tr>'; }
				?>
				<tr>
				<td>Total(Inc.GST)</td>
				<td>A$<?php echo $price;?></td>
				</tr>
			</table>
		<form id ="join-review-form" action="renewconfirmation" method="POST">
			<input type="hidden" name="step3" value="3">
			<input type="hidden" name="Paymentcardvalue" id="Paymentcardvalue" value="">
			<a target="_blank" class="addCartlink"><button class="placeorder" type="submit">PLACE YOUR ORDER</button></a>
		</form>
	</div>
</div>
<form id="pform" action="" method="POST"><input type="hidden" name="goP"></form>	
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">  <a class="your-details-prevbutton8"><span class="dashboard-button-name">Last</span></a></div>
