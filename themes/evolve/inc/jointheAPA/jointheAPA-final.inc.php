<?php
//use session: $_SESSION['UserID'],$_SESSION["postReviewData"],
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
//delete PRF
if(isset($_POST['step2-2'])){
	checkShoppingCart($userID=$_SESSION['UserId'],$type="", $prodcutID="PRF");
}
//delete MG product
if(isset($_POST['step2-3'])){
	checkShoppingCart($userID=$_SESSION['UserId'],$type="",$prodcutID=$_POST['step2-3']);
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
	if(isset($_POST['PRF'])&& $_POST['PRF']!="Other"){ 
		$postReviewData['PRFdonation'] = $_POST['PRF']; 
	}
	elseif(isset($_POST['PRF'])&& $_POST['PRF']=="Other"){
		$_POST['PRF'] = $_POST['PRFOther'];
		$postReviewData['PRFdonation'] = $_POST['PRF'];		
	}
	//check is there PRF product existed for this user
	checkShoppingCart($userID=$_SESSION['UserId'], $type="", $prodcutID="PRF");
	//save PRF product into APA database function
	createShoppingCart($userID=$_SESSION['UserId'], $productID="PRF", $type="",$coupon=$_POST['PRF']); 
	//if(isset($_POST['Rollover'])){ $postReviewData['Rollover'] = $_POST['Rollover']; }
	echo "this is payment card".$_POST['Paymentcard'];
	if(isset($_POST['Paymentcard'])){ $postReviewData['Card_number'] = $_POST['Paymentcard']; }
	if(isset($_POST['Installpayment-frequency'])){ $postReviewData['InstallmentFrequency'] = $_POST['Installpayment-frequency']; }
	$postReviewData['productID'] = getProductList($_SESSION['UserId']);
  	//store data in the session
	$_SESSION["postReviewData"] =  array();
	$_SESSION["postReviewData"] = $postReviewData; 
    //Get calculating the Order Total and Schedule Payments
	// 2.2.47 Get calculating the Order Total and Schedule Payments
	// Send - 
	// userID & Paymentoption & InstallmentFor & InstallmentFrequency & PRFdonation & productID & CampaignCode
	// Response -AdminFee & SubTotal & GST & OrderTotal & InitialPaymentAmount & OccuringPayment & LastPayment
	$postScheduleData['userID'] = $postReviewData['userID'];
	$postScheduleData['Paymentoption'] = $postReviewData['Paymentoption'];
	$postScheduleData['InstallmentFor'] = "Membership";
	$postScheduleData['InstallmentFrequency'] = $postReviewData['InstallmentFrequency'];
	$postScheduleData['PRFdonation'] = $postReviewData['PRFdonation'];
	$postScheduleData['productID'] = $postReviewData['productID'];
	$postScheduleData['CampaignCode'] = "";
	$scheduleDetails = GetAptifyData("47", $postScheduleData);
	
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
	print_r($NGListArray);
	$NGProductsArray=$_SESSION["NationalProductID"];
	// 2.2.21 - GET Fellowship product price
	// Send - 
	// userID
	// Response -Fellowship product list
	$FPListArray = array();
	$fpProdcutArray = array();
	if(isset($_SESSION["MGProductID"])){
		foreach($_SESSION["MGProductID"] as $singleM){
			foreach($singleM as $key => $value){
				array_push($fpProdcutArray,$value);
			}
		}
	}
	if(sizeof($fpProdcutArray)!=0){
		$fpData['ProductID'] = $fpProdcutArray;
		$FPListArray = GetAptifyData("21", $fpData);
		
	}
// 2.2.13 - update payment method-3-set main card
// Send - 
// UserID, Creditcard-ID
// Response -
// N/A. 
if(isset($_POST['Paymentcard']) && $_POST['addCard'] == "0") {
		$updateCard["UserID"] = $_SESSION['UserId'];
		$updateCard["SpmID"] = $_POST['Paymentcard'];
		$updateCard["ExpireMonthYear"] = "";
		$updateCard["CCSNumber"] = "";
		$updateCard["IsDefault"] = "1";
		$updateCard["IsActive"] = "";
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
	<div class="down8" <?php if(isset($_POST['step2'])||isset($_POST['step2-2'])||isset($_POST['step2-3']))echo 'style="display:block;"'; else { echo 'style="display:none;"';}?> >
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
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
						if(sizeof($FPListArray)!=0){
							foreach( $FPListArray as $FProduct){
									echo "<tr>";
									echo "<td>".$FProduct['FPtitle']."</td>";
									echo "<td>A$".$FProduct['FPprice']."</td>";
									$price += $FProduct['FPprice'];
									echo '<td>';if($FProduct['ProductID']!="9973"){ echo '<a class="deleteMGButton'.$FProduct['ProductID'].'">delete</a>';} echo '</td>';
									echo "</tr>";  
							}
						}
						if(isset($_POST['PRF'])&& $_POST['PRF']!=""){ echo '<tr><td>Physiotherapy Research Foundation donation</td><td>A$'.$_POST['PRF'].'</td><td><a class="deletePRFButton">delete</a></td></tr>'; $price +=$_POST['PRF']; }
					?>
				</tbody>
			</table>
		</div>
	<!--<a class="your-details-prevbutton8"><span class="dashboard-button-name">Last</span></a>-->
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 Membpaymentsiderbar">
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
			<div class="flex-container flex-flow-column member-info">
				<div class="flex-cell flex-flow-row">
					<div class="flex-col-12">
					Membership payment total:	
					</div>
				</div>
				<div class="flex-cell flex-flow-row">
					<div class="flex-col-6">
					Subtotal (exc. GST)	
					</div>
					<div class="flex-col-6">
			        $<?php echo $scheduleDetails['SubTotal'];?>
					</div>
				</div>
				<div class="flex-cell flex-flow-row">
					<div class="flex-col-6">
					GST	
					</div>
					<div class="flex-col-6">
			        $<?php echo $scheduleDetails['GST'];?>
					</div>
				</div>
				<div class="flex-cell flex-flow-row">
					<div class="flex-col-6">
					Total(inc.GST)	
					</div>
					<div class="flex-col-6">
			        $<?php echo $scheduleDetails['OrderTotal'];?>
					</div>
				</div>
				<?php 
					if(isset($_POST['Paymentoption'])&& $_POST['Paymentoption']=="1"){ 
						$AdminFee =$scheduleDetails['AdminFee']; 
						$InitialPaymentAmount = $scheduleDetails['InitialPaymentAmount'];
						$OccuringPayment = $scheduleDetails['OccuringPayment'];
						$firstInstallment = $InitialPaymentAmount-$AdminFee-$scheduleDetails['GST']-$_POST['PRF'];
						$LastPayment = $scheduleDetails['LastPayment'];
						echo '<div class="flex-cell flex-flow-row">
								<div class="flex-col-12">
								</div>
							</div>';
						echo '<div class="flex-cell flex-flow-row">
								<div class="flex-col-12">Today’s payment includes:
								</div>
							</div>';
						echo'<div class="flex-cell flex-flow-row">
								<div class="flex-col-6">
									Admin fee	
								</div>
								<div class="flex-col-6">$'.$AdminFee.'</div></div>';
						echo'<div class="flex-cell flex-flow-row">
								<div class="flex-col-6">
									First instalment	
								</div>
								<div class="flex-col-6">$'.$firstInstallment.'</div></div>';	
						if(isset($_POST['PRF'])&& $_POST['PRF']!=""){
							$PRFPrice =$_POST['PRF']; 
							echo'<div class="flex-cell flex-flow-row">
									<div class="flex-col-6">
										PRF donation	
									</div>
									<div class="flex-col-6">$'.$PRFPrice.'</div></div>';		
						}
						echo'<div class="flex-cell flex-flow-row">
								<div class="flex-col-6">
									GST	
								</div>
								<div class="flex-col-6">$'.$scheduleDetails['GST'].'</div></div>';
						echo'<div class="flex-cell flex-flow-row">
								<div class="flex-col-6">
									Today’s total	
								</div>
								<div class="flex-col-6">$'.$InitialPaymentAmount.'</div></div>';
                        echo'<div class="flex-cell flex-flow-row">
								<div class="flex-col-12">
									<button type="button" class="placeorder" data-target="#schedulePOPUp" data-toggle="modal">Full list of scheduled payment</button>	
								</div>
							</div>'; 								
					}
				?>
				<div class="flex-cell flex-flow-row">
					<div class="flex-col-12">
					</div>
				</div>					
			</div>
			
		<a target="_blank" class="addCartlink"><button class="placeorder" type="submit">PLACE YOUR ORDER</button></a>
		</div>
	</div>
</form>
<form id="pform" action="" method="POST"><input type="hidden" name="goP"></form>
<form id="deletePRFForm" action="" method="POST"><input type="hidden" name="step2-2"></form>
<form id="deleteMGForm" action="" method="POST"><input type="hidden" name="step2-3" value=""></form>	
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 none-padding">  <a class="your-details-prevbutton8"><span class="dashboard-button-name">Back</span></a></div>
<?php if(isset($_POST['Paymentoption'])&& $_POST['Paymentoption']=="1"): ?>
<div id="schedulePOPUp" class="modal fade" role="dialog">
	<div class="modal-dialog" style="overflow-y: scroll; max-height:85%;  margin-top: 50px; margin-bottom:50px;">
	<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Your next schedule payment details</h4>
			</div>
			<div class="modal-body">
			<ul>
			    <?php 
                    $month = date("m");		
					$currentMonth = trim($month,"0"); 
					$currentYear = date("Y"); 
					echo '<div class="flex-cell flex-flow-row">
								<div class="flex-col-6">
								Date	
								</div>
								<div class="flex-col-6">
								Payment amount	
								</div>
							</div>';
					for($i=$currentMonth+1; $i<12; $i++){
						echo '<div class="flex-cell flex-flow-row"><div class="flex-col-6">01/'.$i.'/'.$currentYear.'</div>
								<div class="flex-col-6">$'.$OccuringPayment.'</div>
							</div>';
					}
				echo '<div class="flex-cell flex-flow-row"><div class="flex-col-6">01/12/'.$currentYear.'</div>
						<div class="flex-col-6">$'.$LastPayment.'</div>
					</div>';
				?>
			</ul>			
			
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default"  data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<?php endif;?>
<!--  this part will be merged with Andy's Dashboard less file-->
<style>
div#schedulePOPUp {
    color: black;
}
</style>
<!--  this part will be merged with Andy's Dashboard less file-->	
<?php logRecorder();  ?>