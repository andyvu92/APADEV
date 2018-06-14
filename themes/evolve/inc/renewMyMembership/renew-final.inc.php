<?php
//use session: $_SESSION['userID'],$_SESSION["postReviewData"]
//save PRF product into APA database function
//save PRF product into APA database function
/*function createShoppingCart($userID, $productID,$coupon){
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
}*/
//get productID list from local database;
function getProductList($userID){
	$arrayReturn = array();
	$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config');
	//$shoppingcartGet = $dbt->prepare('SELECT * FROM shopping_cart WHERE userID=:userID AND type=:type');
	$shoppingcartGet = $dbt->prepare('SELECT * FROM shopping_cart WHERE userID=:userID AND productID != "PRF" AND type != "PD"');
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
//delete PRF
if(isset($_POST['step2-2'])){
	checkShoppingCart($userID=$_SESSION['UserId'], $type="" ,$prodcutID="PRF");
}
//delete MG product
if(isset($_POST['step2-3'])){
	checkShoppingCart($userID=$_SESSION['UserId'], $type="" ,$prodcutID=$_POST['step2-3']);
	echo "this is productID";
	print_r($_SESSION["MGProductID"]);
	
	foreach($_SESSION["MGProductID"] as $deleteM){
		if (($key = array_search($_POST['step2-3'], $deleteM)) !== false) {
			echo "try to delete product";
			unset($deleteM[$key]);
		}    
	}
	print_r($deleteM);
	unset($_SESSION["MGProductID"]);
	
	$afterDelete = array();
	array_push($afterDelete,$deleteM);
	$_SESSION["MGProductID"] = $afterDelete;
	
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
		if(isset($_SESSION['UserId'])){ $postPaymentData['userID'] = $_SESSION['UserId']; }
		if(isset($_POST['Cardtype'])){ $postPaymentData['Payment-method'] = $_POST['Cardtype']; }
		//if(isset($_POST['Cardname'])){ $postPaymentData['Name-on-card'] = $_POST['Cardname']; }
		if(isset($_POST['Cardnumber'])){ $postPaymentData['Cardno'] = $_POST['Cardnumber']; }
		if(isset($_POST['Expirydate'])){ $postPaymentData['Expiry-date'] = $_POST['Expirydate']; }
		if(isset($_POST['CCV'])){ $postPaymentData['CCV'] = $_POST['CCV']; }
		GetAptifyData("15", $postPaymentData);
		if(isset($_SESSION['tempcard'])){ unset($_SESSION["tempcard"]);}
}
elseif(isset($_POST['addCard']) && $_POST['addCard'] == "1" && !isset($_POST['addcardtag'])){
	$tempcard = array();
	$tempcard['Payment-method'] = $_POST['Cardtype'];
	$tempcard['Cardno'] = $_POST['Cardnumber'];
	$tempcard['Expiry-date'] = $_POST['Expirydate']; 
	$tempcard['CCV'] = $_POST['CCV'];
	if(isset($_SESSION['tempcard'])){ unset($_SESSION["tempcard"]);}
	$_SESSION['tempcard'] = $tempcard;
		
}
// 2.2.27 Renew a new member order
// Send - 
// UserID&Paymentoption&PRFdonation&Rollover&productID&Insurancelist
// Response - Invoice_ID
if(isset($_SESSION['UserId'])){ $postReviewData['userID'] = $_SESSION['UserId']; } 
if(isset($_POST['Paymentoption'])){ $postReviewData['Paymentoption'] = $_POST['Paymentoption'] == '1' ? 1:0; }
//test data

$postReviewData['InstallmentFor'] = "Membership";
if(isset($_POST['PRF'])){ 
$postReviewData['PRFdonation'] = $_POST['PRF']; 
//check is there PRF product existed for this user
checkShoppingCart($userID, $type="" , $prodcutID="PRF");
//save PRF product into APA database function
createShoppingCart($userID=$_SESSION['UserId'], $productID="PRF", $type="", $coupon=$_POST['PRF']);  
}
//if(isset($_POST['Rollover'])){ $postReviewData['Rollover'] = $_POST['Rollover']; }
//if(isset($_POST['Installpayment-frequency'])){ $postReviewData['Installpayment-frequency'] = $_POST['Installpayment-frequency']; }
if(isset($_POST['Installpayment-frequency'])){ $postReviewData['InstallmentFrequency'] = $_POST['Installpayment-frequency']; }
$postReviewData['productID'] = getProductList($_SESSION['UserId']);

//store data in the session
$_SESSION["postReviewData"] =  array();
$_SESSION["postReviewData"] = $postReviewData;
}
// 2.2.31 Get Membership prodcut price
// Send - 
// userID & product list
// Response -Membership prodcut price
$prodcutArray = array();
array_push($prodcutArray,$_SESSION["MembershipProductID"]);
$memberProductsArray['ProductID']=$prodcutArray;
$memberProdcutID = $memberProductsArray;
$memberProducts = GetAptifyData("31", $memberProdcutID);
// 2.2.19 - GET list National Group
// Send - 
// userID
// Response -National Group product
$sendData["UserID"] = $_SESSION['UserId'];
$NGListArray = GetAptifyData("19", $sendData);
$NGProductsArray=$_SESSION["NationalProductID"];
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
$fpData['ProductID'] = $fpProdcutArray;
$FPListArray = GetAptifyData("21", $fpData);
//From review page to review page to add payment method again; 

if(isset($_POST['Paymentcard']) && $_POST['addCard'] == "0") {
	$updateCard["UserID"] = $_SESSION['UserId'];
	$updateCard["SpmID"] = $_POST['Paymentcard'];
	$updateCard["ExpireMonthYear"] = "";
	$updateCard["CCSNumber"] = "";
	$updateCard["IsDefault"] = "1";
	$updateCard["IsActive"] = "";
	// 2.2.13 - update payment method-3-set main card
	// Send - 
	// UserID, Creditcard-ID
	// Response -
	// N/A.
	$updateCards = GetAptifyData("13", $updateCard); 
	print_r($updateCards);
}
	// 2.2.12 - Get payment list
	// Send - 
	// UserID 
	// Response -payment card list
	$test['id'] = $_SESSION["UserId"];
	$cardsnum = GetAptifyData("12", $test);
	print_r($cardsnum);
	$PRFPrice = 0;
?> 
<form id ="join-review-form" action="renewconfirmation" method="POST">
<input type="hidden" name="step3" value="3">
<div class="down8" <?php if(isset($_POST['step2'])|| isset($_POST['stepAdd'])||isset($_POST['step2-2'])||isset($_POST['step2-3']))echo 'style="display:block;"'; else { echo 'style="display:none;"';}?> >
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
				foreach( $memberProducts as $memberProduct){
							echo "<tr>";
							echo "<td>".$memberProduct['Title']."</td>";
							echo "<td>A$".$memberProduct['Price']."</td>";
							$price += $memberProduct['Price'];
							echo '<td><a href="renewmymembership" target="_self">delete</a></td>';
							echo "</tr>";  
						}
				foreach( $NGListArray as $NGArray){
					if(sizeof($NGProductsArray)!=0){
						foreach($NGProductsArray as $NGProduct){
							if($NGProduct == $NGArray['ProductID']){
								echo "<tr>";
								echo "<td>".$NGArray['ProductName']."</td>";
								echo "<td>A$".$NGArray['NGprice']."</td>";
								$price += $NGArray['NGprice'];
								echo '<td><a href="renewmymembership" target="_self">delete</a></td>';
							}	echo "</tr>";  
						}
					}
				}
				if(sizeof($FPListArray)!=0){
					foreach( $FPListArray as $FProduct){
						    echo '<input type="hidden" name="MGProductID" value="'.$FProduct['ProductID'].'">';
							echo "<tr>";
							echo "<td>".$FProduct['FPtitle']."</td>";
							echo "<td>A$".$FProduct['FPprice']."</td>";
							$price += $FProduct['FPprice'];
							echo '<td>';if($FProduct['ProductID']!="9973"){ echo '<a class="deleteMGButton'.$FProduct['ProductID'].'">delete</a>';} echo '</td>';
							echo "</tr>";  
						}
				}
				if(isset($_POST['PRF'])&& $_POST['PRF']!=""){ echo '<tr><td>Physiotherapy Research Foundation donation</td><td>A$'.$_POST['PRF'].'</td><td><a class="deletePRFButton">delete</a></td></tr>'; }
				?>
			</tbody>
		</table>
		</div>
	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 Membpaymentsiderbar">
		<p><span class="sidebardis<?php if($price==0) echo " display-none";?>">Payment Information:</span></p>
				<div class="paymentsidecredit <?php if($price==0) echo " display-none";?>"> 
		<?php if ((sizeof($cardsnum["results"])!=0) && (!isset($_SESSION['tempcard']))): ?>   
			<fieldset>
				<select  id="Paymentcard" name="Paymentcard" readonly>
				<?php
					
						foreach( $cardsnum["results"] as $cardnum) {
							echo '<option value="'.$cardnum["Creditcards-ID"].'"';
							if($cardnum["IsDefault"]=="1") {
							echo "selected ";
						}
						echo 'data-class="'.$cardnum["Payment-Method"].'">Credit card ending with ';
						echo $cardnum["Digitsnumber-Cardtype-Default"].'</option>';
						}
					
				?>
				</select>
			</fieldset>
		<?php endif; ?>  
		<?php if(isset($_SESSION['tempcard'])) : ?>
		<?php $tempcards = $_SESSION['tempcard'];?>
		    <div class="row">
				<div class="col-lg-12">
					<select class="form-control" id="Cardtype" name="Cardtype" placeholder="Card type" disabled>
					<?php 
						$PaymentTypecode  = file_get_contents("sites/all/themes/evolve/json/PaymentType.json");
						$PaymentType=json_decode($PaymentTypecode, true);
						foreach($PaymentType  as $pair => $value){
							echo '<option value="'.$PaymentType[$pair]['ID'].'"';
							if($tempcards['Payment-method'] == $PaymentType[$pair]['ID']){ echo "selected ";}
							echo '> '.$PaymentType[$pair]['Name'].' </option>';
							
						}
				    ?>	
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
					<input type="text" class="form-control" id="Expirydate" name="Expirydate" value="<?php echo $tempcards['Expiry-date']; ?>" placeholder="Expire date" readonly>
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
				if(isset($_POST['PRF'])&& $_POST['PRF']!=""){  $PRFPrice =$_POST['PRF'];echo '<tr><td>PRF donation</td><td>A$'.$_POST['PRF'].'</td></tr>'; }
				?>
				<tr>
				<td>Total(Inc.GST)</td>
				<td>A$<?php echo $price+$PRFPrice;?></td>
				</tr>
			</table>
		
			
			<!--<input type="hidden" name="Paymentcard" id="Paymentcardvalue" value="">-->
			<a target="_blank" class="addCartlink"><button class="placeorder" type="submit">PLACE YOUR ORDER</button></a>
		
	</div>
</div>
</form>
<form id="pform" action="" method="POST"><input type="hidden" name="goP"></form>
<form id="deletePRFForm" action="" method="POST"><input type="hidden" name="step2-2"></form>
<form id="deleteMGForm" action="" method="POST"><input type="hidden" name="step2-3" value=""></form>		
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">  <a class="your-details-prevbutton8"><span class="dashboard-button-name">Last</span></a></div>
