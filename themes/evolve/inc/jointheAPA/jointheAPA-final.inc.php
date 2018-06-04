<?php
//use session: $_SESSION['UserID'],$_SESSION["postReviewData"],
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
//delete PRF
if(isset($_POST['step2-2'])){
	checkShoppingCart($userID=$_SESSION['UserId'], $prodcutID="PRF");
}
if(isset($_POST['step2'])) {
	$postPaymentData = array();
	$postReviewData = array();
	// 2.2.15 Add payment method
	// Send - 
	// userID, Payment-method,Name-on-card,Cardno,Expiry-date,CCV
	// Response -Add Success message 
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
    // 2.2.26 Register a new member order
	// Send - 
	// userID & order data
	// Response -payment invoice ID
	if(isset($_SESSION['UserId'])){ $postReviewData['userID'] = $_SESSION['UserId'];  } 
	if(isset($_POST['Paymentoption'])){ $postReviewData['Paymentoption'] = $_POST['Paymentoption'] == '1' ? 1:0; }
	$postReviewData['InstallmentFor'] = "Membership";
	if(isset($_POST['PRF'])){ 
		$postReviewData['PRFdonation'] = $_POST['PRF']; 
		//check is there PRF product existed for this user
		checkShoppingCart($userID=$_SESSION['UserId'], $prodcutID="PRF");
		//save PRF product into APA database function
		createShoppingCart($userID=$_SESSION['UserId'], $productID="PRF", $coupon=$_POST['PRF']);  
	}
	//if(isset($_POST['Rollover'])){ $postReviewData['Rollover'] = $_POST['Rollover']; }
	echo "this is payment card".$_POST['Paymentcard'];
	if(isset($_POST['Paymentcard'])){ $postReviewData['Card_number'] = $_POST['Paymentcard']; }
	if(isset($_POST['Installpayment-frequency'])){ $postReviewData['InstallmentFrequency'] = $_POST['Installpayment-frequency']; }
	$postReviewData['productID'] = getProductList($_SESSION['UserId']);
  	//store data in the session
	$_SESSION["postReviewData"] =  array();
	$_SESSION["postReviewData"] = $postReviewData;  
	
}
	//get productID list from local database;
	function getProductList($userID){
		$arrayReturn = array();
		$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config');
		$shoppingcartGet = $dbt->prepare('SELECT * FROM shopping_cart WHERE userID=:userID AND productID != "PRF" AND type != "PD"');
		$shoppingcartGet->bindValue(':userID', $userID);
		$shoppingcartGet->execute();
		if($shoppingcartGet->rowCount()>0) { 
			foreach ($shoppingcartGet as $row) {
				array_push($arrayReturn, $row['productID']);
			}
		}	
		$shoppingcartGet = null;
		return $arrayReturn;
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

} 
	// 2.2.12 - Get payment list
	// Send - 
	// UserID 
	// Response -payment card list
	$cardData['id'] = $_SESSION["UserId"];
	$cardsnum = GetAptifyData("12", $cardData);
	print_r($cardsnum);
$PRFPrice = 0;
 ?> 
<form id ="join-review-form" action="joinconfirmation" method="POST">
	<input type="hidden" name="step3" value="3">
	<div class="down8" <?php if(isset($_POST['step2'])||isset($_POST['step2-2']))echo 'style="display:block;"'; else { echo 'style="display:none;"';}?> >
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
							echo '<td><a href="jointheapa" target="_self">delete</a></td>';
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
									echo '<td><a href="jointheapa" target="_self">delete</a></td>';
								}	echo "</tr>";  
							}
						}
						}
						if(isset($_POST['PRF'])&& $_POST['PRF']!=""){ echo '<tr><td>Physiotherapy Research Foundation donation</td><td>A$'.$_POST['PRF'].'</td><td><a class="deletePRFButton">delete</a></td></tr>'; $price +=$_POST['PRF']; }
					?>
				</tbody>
			</table>
		</div>
	<!--<a class="your-details-prevbutton8"><span class="dashboard-button-name">Last</span></a>-->
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
		<?php if(isset($_SESSION['tempcard']) && !isset($_POST['addcardtag'])) : ?>
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
		<div class="row ordersummary"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><span>YOUR ORDER</span></div></div>
			<table>
				<tr>
					<td>Sub total (Inc. GST)</td>
					<td>A$<?php echo $price;?></td>
				</tr>
				<?php 
				if(isset($_POST['PRF'])&& $_POST['PRF']!=""){ $PRFPrice =$_POST['PRF']; echo '<tr><td>PRF donation</td><td>A$'.$_POST['PRF'].'</td></tr>'; }
				?>
				<tr>
				<td>Total(Inc.GST)</td>
				<td>A$<?php echo $price+$PRFPrice;?></td>
				</tr>
			</table>
		<a target="_blank" class="addCartlink"><button class="placeorder" type="submit">PLACE YOUR ORDER</button></a>
		</div>
	</div>
</form>
<form id="pform" action="" method="POST"><input type="hidden" name="goP"></form>
<form id="deletePRFForm" action="" method="POST"><input type="hidden" name="step2-2"></form>	
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">  <a class="your-details-prevbutton8"><span class="dashboard-button-name">Last</span></a></div>