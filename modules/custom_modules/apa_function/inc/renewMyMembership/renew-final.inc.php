<?php
//use session: $_SESSION['userID'],$_SESSION["postReviewData"]

//delete PRF
if(isset($_POST['step2-2'])){
	checkShoppingCart($userID=$_SESSION['UserId'], $type="" ,$prodcutID="PRF");
	$_SESSION["postReviewData"]['PRFdonation']="";
}
//delete MG product
if(isset($_POST['step2-3'])){
	checkShoppingCart($userID=$_SESSION['UserId'], $type="" ,$prodcutID=$_POST['step2-3']);
	if($_POST['step2-3']=="9973"){
		unset($_SESSION["FPProductID"]);
	}
	
	else{
		foreach($_SESSION["MGProductID"] as $deleteM){
			if (($key = array_search($_POST['step2-3'], $deleteM)) !== false) {
			unset($deleteM[$key]);
			}    
		}
		//print_r($deleteM);
		unset($_SESSION["MGProductID"]);
		
		$afterDelete = array();
		array_push($afterDelete,$deleteM);
		$_SESSION["MGProductID"] = $afterDelete;
	}
	
}

//delete NG product-------change delete NG product process at 31/07/2018
if(isset($_POST['step2-4'])){
	checkShoppingCart($userID=$_SESSION['UserId'],$type="",$prodcutID=$_POST['step2-4']);
	unset($_SESSION["NationalProductID"]);
	$userNGProduct = getProduct($_SESSION['UserId'], "NG");
	if (sizeof($userNGProduct) != 0) {
		$_SESSION['NationalProductID'] = $userNGProduct;
	}
	if(isset($_SESSION["MGProductID"])){
		if(sizeof($_SESSION["MGProductID"]!= 0)){
			deleteMGR($totalMGProduct=$_SESSION["MGProductID"], $NGProduct=$_POST['step2-4'], $userID=$_SESSION['UserId']);
			unset($_SESSION["MGProductID"]);
			$userMGProduct  = array();
			$userMG1Product = getProduct($_SESSION['UserId'], "MG1");
			if (sizeof($userMG1Product) != 0) {
				array_push($userMGProduct, $userMG1Product);
			}
			
			$userMG2Product = getProduct($_SESSION['UserId'], "MG2");
			if (sizeof($userMG2Product) != 0) {
				array_push($userMGProduct, $userMG2Product);
			}
			
			if (sizeof($userMGProduct) != 0) {
				$_SESSION["MGProductID"] = $userMGProduct;
			}
		}
	}

}
//delete NG product-------change delete NG product process at 31/07/2018
/***********Delete MG Product when required********/
/***********This function is just for delete NG Product********/
function deleteMGR($totalMGProduct, $NGProduct, $userID){
	if($NGProduct == "10021") {
		checkShoppingCart($userID=$_SESSION['UserId'],$type="",$prodcutID="9977");
	}
	if($NGProduct == "10015") {
		checkShoppingCart($userID=$_SESSION['UserId'],$type="",$prodcutID="9978");
		
	}

}


/***********End delete MG Product when required********/
//From insurance page to review page;	
if(isset($_POST['step2'])) {
	$postPaymentData = array();
	$postReviewData = array();
	// 2.2.15 Add payment method
	// Send - 
	// UserID&Payment-method&Name-on-card&Cardno&Expiry-date&CCV
	// Response - Add payment card successful

if(isset($_POST['addCard']) && $_POST['addCard'] == "1"){
		if(isset($_SESSION['UserId'])){ $postPaymentData['userID'] = $_SESSION['UserId']; }
		if(isset($_POST['Cardtype'])){ $postPaymentData['Payment-method'] = $_POST['Cardtype']; }
		//if(isset($_POST['Cardname'])){ $postPaymentData['Name-on-card'] = $_POST['Cardname']; }
		if(isset($_POST['Cardnumber'])){ $postPaymentData['Cardno'] = $_POST['Cardnumber']; }
		if(isset($_POST['Expirydate'])){ $postPaymentData['Expiry-date'] = $_POST['Expirydate']; }
		if(isset($_POST['CCV'])){ $postPaymentData['CCV'] = $_POST['CCV']; }
		$out = aptify_get_GetAptifyData("15", $postPaymentData);
		//if(isset($_SESSION['tempcard'])){ unset($_SESSION["tempcard"]);}
}
/*elseif(isset($_POST['addCard']) && $_POST['addCard'] == "1" && !isset($_POST['addcardtag'])){
	$tempcard = array();
	$tempcard['Payment-method'] = $_POST['Cardtype'];
	$tempcard['Cardno'] = $_POST['Cardnumber'];
	$tempcard['Name-on-card'] = $_POST['Cardname'];
	$tempcard['Expiry-date'] = $_POST['Expirydate']; 
	$tempcard['CCV'] = $_POST['CCV'];
	if(isset($_SESSION['tempcard'])){ unset($_SESSION["tempcard"]);}
	$_SESSION['tempcard'] = $tempcard;
		
}*/
// 2.2.27 Renew a new member order
// Send - 
// UserID&Paymentoption&PRFdonation&Rollover&productID&Insurancelist
// Response - Invoice_ID
if(isset($_SESSION['UserId'])){ $postReviewData['userID'] = $_SESSION['UserId']; } 
if(isset($_POST['Paymentoption'])){ $postReviewData['Paymentoption'] = $_POST['Paymentoption'] == '1' ? 1:0; }
//test data

$postReviewData['InstallmentFor'] = "Membership";
if(!isset($_POST['prftag'])){
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
}
else{
		$postReviewData['PRFdonation'] = "";
		$_POST['PRF'] = "0";
	}
//if(isset($_POST['Rollover'])){ $postReviewData['Rollover'] = $_POST['Rollover']; }
//if(isset($_POST['Installpayment-frequency'])){ $postReviewData['Installpayment-frequency'] = $_POST['Installpayment-frequency']; }
if(isset($_POST['Installpayment-frequency'])){ $postReviewData['InstallmentFrequency'] = $_POST['Installpayment-frequency']; }
$postReviewData['productID'] = getProductList($_SESSION['UserId']);

//store data in the session
$_SESSION["postReviewData"] =  array();
$_SESSION["postReviewData"] = $postReviewData;

}
//Get calculating the Order Total and Schedule Payments
// 2.2.47 Get calculating the Order Total and Schedule Payments
// Send - 
// userID & Paymentoption & InstallmentFor & InstallmentFrequency & PRFdonation & productID & CampaignCode
// Response -AdminFee & SubTotal & GST & OrderTotal & InitialPaymentAmount & OccuringPayment & LastPayment
$reviewData = $_SESSION["postReviewData"] ;
$postScheduleData['userID'] = $reviewData['userID'];
$postScheduleData['Paymentoption'] = $reviewData['Paymentoption'];
$postScheduleData['InstallmentFor'] = "Membership";
$postScheduleData['InstallmentFrequency'] = $reviewData['InstallmentFrequency'];
if(isset($_POST['step2-2'])){  $reviewData['PRFdonation']="";}
$postScheduleData['PRFdonation'] = $reviewData['PRFdonation']; 
//$postScheduleData['PRFdonation'] = $reviewData['PRFdonation'];
//$postScheduleData['PRFdonation'] = getProduct($_SESSION['UserId'],$type="");
$postScheduleData['productID'] = getProductList($_SESSION['UserId']);
$postScheduleData['CampaignCode'] = "";
$scheduleDetails = aptify_get_GetAptifyData("47", $postScheduleData);
// 2.2.31 Get Membership prodcut price
// Send - 
// userID & product list
// Response -Membership prodcut price
$prodcutArray = array();
if(isset($_SESSION["MembershipProductID"])) { array_push($prodcutArray,$_SESSION["MembershipProductID"]);}
if(sizeof($prodcutArray)!=0){
	$memberProductsArray['ProductID']=$prodcutArray;
	$memberProdcutID = $memberProductsArray;
	$memberProducts = aptify_get_GetAptifyData("31", $memberProdcutID);
}
// 2.2.19 - GET list National Group
// Send - 
// userID
// Response -National Group product
$sendData["UserID"] = $_SESSION['UserId'];
$NGListArray = aptify_get_GetAptifyData("19", $sendData);
//print_r($NGListArray);
if(isset($_SESSION["NationalProductID"])) {$NGProductsArray=$_SESSION["NationalProductID"];} else{$NGProductsArray=array();}
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
if(sizeof($fpProdcutArray)!=0){
	$fpData['ProductID'] = $fpProdcutArray;
	$FPListArray = aptify_get_GetAptifyData("21", $fpData);
}
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
	$updateCards = aptify_get_GetAptifyData("13", $updateCard); 
	//print_r($updateCards);
}
	// 2.2.12 - Get payment list
	// Send - 
	// UserID 
	// Response -payment card list
	$test['id'] = $_SESSION["UserId"];
	$cardsnum = aptify_get_GetAptifyData("12", $test);
	//print_r($cardsnum);
	$PRFPrice = 0;
?> 
<form id ="join-review-form" action="renewconfirmation" method="POST">
<input type="hidden" name="step3" value="3">
<?php if (isset($_POST['addCard']) && $_POST['addCard'] == "1"): ?>  
	   <?php if($out["result"]=="Failed"):?>
			<?php if($out["Message"]=="Expiry date lenght should be 4."):?>
			<div class="checkMessage">Please go back to enter a valid expiry date before proceeding with your order. </div>
			<?php elseif($out["Message"]=="CCV accepts up to 4 digit."):?>
			<div class="checkMessage">Please go back to enter a valid CVV number before proceeding with your order.</div>
			<?php elseif($out["Message"]=="Error in Create Person Saved Payment Method:Month must be between one and twelve. Parameter name: month"):?>
			<div class="checkMessage">Please go back to enter a valid expiry date before proceeding with your order. </div>
			<?php elseif($out["Message"]=="Please enter a valid End Date occurring after the Start Date."):?>
			<div class="checkMessage">Please go back to enter a valid expiry date before proceeding with your order. </div>
			<?php elseif((strpos($out["Message"], 'credit card number') !== false)):?>
			<div class="checkMessage">Please go back to enter a valid credit card number before proceeding with your order. </div>
			<?php elseif($out["result"]=="Failed" && (strpos($out["Message"], 'Invalid Credit Card Number') !== false)):?>
			<div class="checkMessage">Please go back to enter a valid credit card number before proceeding with your order. </div>
			<?php else:?>
			<div class="checkMessage">There was an unexpected error with your payment details, please go back and check they are correct, or contact the APA.</div>
			<?php endif;?>	
		<?php endif;?>		
<?php endif;?>
<div class="down8" <?php if(isset($_POST['step2'])|| isset($_POST['stepAdd'])||isset($_POST['step2-2'])||isset($_POST['step2-3']) ||isset($_POST['step2-4']))echo 'style="display:block;"'; else { echo 'style="display:none;"';}?> >

	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 review-main-container">
	<div class="flex-container join-apa-final flex-table">
				<div class="flex-cell flex-flow-row table-header">
					<div class="flex-col-8">
						<span class="table-heading">Product name</span>
					</div>
					<div class="flex-col-2">
						<span class="table-heading">Price</span>
					</div>
					<div class="flex-col-2">
						<span class="table-heading">Delete</span>
					</div>
				</div>

    			<?php 
				$price = "";
				if(sizeof($prodcutArray)!=0){
					foreach( $memberProducts as $memberProduct){
						echo "<div class='flex-cell flex-flow-row table-cell memberproduct'>";
						echo "<div class='flex-col-8 title-col'><span class='pd-header-mobile'>Product name:</span>".$memberProduct['Title']."</div>";
						echo "<div class='flex-col-2 price-col'><span class='pd-header-mobile'>Price:</span>A$".$memberProduct['Price']."</div>";
						$price += $memberProduct['Price'];
						echo '<div class="flex-col-2 action-col"><a href="renewmymembership" target="_self">delete</a></div>';
						echo "</div>";  
					}
				}
				foreach( $NGListArray as $NGArray){
					if(sizeof($NGProductsArray)!=0){
						foreach($NGProductsArray as $NGProduct){
							if($NGProduct == $NGArray['ProductID']){
								echo "<div class='flex-cell flex-flow-row table-cell NG'>";
								echo "<div class='flex-col-8 title-col'><span class='pd-header-mobile'>Product name:</span>".$NGArray['ProductName']."</div>";
								echo "<div class='flex-col-2 price-col'><span class='pd-header-mobile'>Price:</span>A$".$NGArray['NGprice']."</div>";
								$price += $NGArray['NGprice'];
								echo '<div class="flex-col-2 action-col"><a class="deleteNGButton'.$NGArray['ProductID'].'">delete</a></div>';
								echo "</div>";
							}	  
						}
					}
				}
				if(sizeof($FPListArray)!=0){
					foreach( $FPListArray as $FProduct){
						    echo '<input type="hidden" name="MGProductID" value="'.$FProduct['ProductID'].'">';
							echo "<div class='flex-cell flex-flow-row table-cell FP'>";
							echo "<div class='flex-col-8 title-col'><span class='pd-header-mobile'>Product name:</span>".$FProduct['FPtitle']."</div>";
							echo "<div class='flex-col-2 price-col'><span class='pd-header-mobile'>Price:</span>A$".$FProduct['FPprice']."</div>";
							$price += $FProduct['FPprice'];
							echo '<div class="flex-col-2 action-col">'; echo '<a class="deleteMGButton'.$FProduct['ProductID'].'">delete</a>'; echo '</div>';
							echo "</div>";  
						}
				}
				//if((!isset($_POST['prftag'])) && isset($_POST['PRF'])&& $_POST['PRF']!=""){ 
				if($reviewData['PRFdonation']!=""){ 
                    echo '<div class="flex-cell flex-flow-row table-cell PRF">
                    <div class="flex-col-8 title-col"><span class="pd-header-mobile">Product name:</span>Physiotherapy Research Foundation donation</div>
                    <div class="flex-col-2 price-col"><span class="pd-header-mobile">Price:</span>A$'.$reviewData['PRFdonation'].'</div>
                    <div class="flex-col-2 action-col"><a class="deletePRFButton">delete</a></div>
                    </div>'; 
					$price +=$reviewData['PRFdonation']; 
					}
				if(isset($reviewData['Paymentoption'])&& $reviewData['Paymentoption']=="1"){ 
					echo '<div class="flex-cell flex-flow-row table-cell">
					<div class="flex-col-8 title-col"><span class="pd-header-mobile">Product name:</span>Admin fee</div>
					<div class="flex-col-2 price-col"><span class="pd-header-mobile">Price:</span>A$'.$scheduleDetails['AdminFee'].'</div>
					<div class="flex-col-2 action-col"></div>
					</div>'; 
							
				}
				?>
            </div>
			<div class="flex-container flex-table total-price">
				
				<div class="flex-cell flex-flow-row">
					<div class="flex-col-8">
					Subtotal (ex. GST)	
					</div>
					<div class="flex-col-4">
			        $<?php echo $scheduleDetails['SubTotal'];?>
					</div>
				</div>
				<div class="flex-cell flex-flow-row">
					<div class="flex-col-8">
					GST	
					</div>
					<div class="flex-col-4">
			        $<?php echo $scheduleDetails['GST'];?>
					</div>
				</div>
				<div class="flex-cell flex-flow-row">
					<div class="flex-col-8">
					Total (inc. GST)	
					</div>
					<div class="flex-col-4">
			        $<span id="totalPayment"><?php echo $scheduleDetails['OrderTotal'];?></span>
					</div>
				</div>
			</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 Membpaymentsiderbar">
		<p><span class="smaller-lead-heading sidebardis<?php if($price==0) echo " display-none";?>">Payment Information:</span></p>
				<div class="paymentsidecredit <?php if($price==0) echo " display-none";?>"> 
		<?php if ((sizeof($cardsnum["results"])!=0) && (!isset($_SESSION['tempcard']))): ?>   
			<fieldset>
				<div class="chevron-select-box">
					<select class="form-control" id="Paymentcard" name="Paymentcard" readonly>
					<?php
						
							foreach( $cardsnum["results"] as $cardnum) {
								echo '<option value="'.$cardnum["Creditcards-ID"].'"';
								if($cardnum["IsDefault"]=="1") {
								echo "selected ";
							}
							echo 'data-class="'.$cardnum["Payment-Method"].'">____ ____ ____ ';
							echo $cardnum["Digitsnumber-Cardtype-Default"].'</option>';
							}
						
					?>
					</select>
				</div>
			</fieldset>
		<?php endif; ?>  
		<?php if(isset($_SESSION['tempcard'])) : ?>
		<?php $tempcards = $_SESSION['tempcard'];?>
		    <div class="row">
				<div class="col-xs-12 col-md-12">
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
				<div class="col-xs-12 col-md-12">
					<input type="text" class="form-control" id="Cardname" name="Cardname" value="<?php echo $tempcards['Name-on-card']; ?>"  placeholder="Card Name" readonly>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-md-12">
					<input type="text" class="form-control" id="Cardnumber" name="Cardnumber" value="<?php echo $tempcards['Cardno']; ?>"  placeholder="Card number" readonly>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-md-12">
					<input type="text" class="form-control" id="Expirydate" name="Expirydate" value="<?php echo $tempcards['Expiry-date']; ?>" placeholder="Expire date" readonly>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-md-12">
					<input type="text" class="form-control" id="CCV" name="CCV" value="<?php echo $tempcards['CCV']; ?>" placeholder="CCV" readonly>
				</div>
			</div>
		
		<?php endif; ?>
		</div>

			<div class="flex-container flex-flow-column payment-details">

				<div class="flex-cell ordersummary">
					<span>YOUR ORDER</span>
				</div>

				<div class="flex-cell flex-flow-row">
					<div class="flex-col-12">
					Today's payment:	
					</div>
				</div>
				<?php if(isset($reviewData['Paymentoption'])&& $reviewData['Paymentoption']=="1"):?>
					<div class="flex-cell flex-flow-row">
					<div class="flex-col-6">
					Admin fee (ex. GST)
					</div>
					<div class="flex-col-6">
			        $<?php echo $scheduleDetails['AdminFee'];?>
					</div>
				</div>
				<?php endif;?>
				<?php if(isset($reviewData['Paymentoption'])&& $reviewData['Paymentoption']=="1"):?>
				<?php  
					$InitialPaymentAmount = $scheduleDetails['InitialPaymentAmount'];
					$OccuringPayment = $scheduleDetails['OccuringPayment'];
					$LastPayment = $scheduleDetails['LastPayment'];
					$firstInstallment = $InitialPaymentAmount-$scheduleDetails['AdminFee']-$scheduleDetails['GST']-$reviewData['PRFdonation'];
				?>
					<div class="flex-cell flex-flow-row">
						<div class="flex-col-6">
						First installment (ex. GST)
						</div>
						<div class="flex-col-6">
						$<?php //echo $scheduleDetails['InitialPaymentAmount'];
						echo $firstInstallment;
						?>
						</div>
					</div>
				<?php endif;?>
				<div class="flex-cell flex-flow-row">
					<div class="flex-col-6">
					GST	
					</div>
					<div class="flex-col-6">
			        $<?php echo $scheduleDetails['GST'];?>
					</div>
				</div>
				<?php if($reviewData['PRFdonation']!=""):?>
					<div class="flex-cell flex-flow-row">
						<div class="flex-col-6">
						<strong>PRF donation</strong>
						</div>
						<div class="flex-col-6">
						$<?php echo $reviewData['PRFdonation'];?>
						</div>
					</div>		
				<?php endif;?>
				<div class="flex-cell flex-flow-row">
					<div class="flex-col-6">
					<strong>Today's total (inc. GST)</strong>
					</div>
					<div class="flex-col-6">
			        $<?php echo $scheduleDetails['InitialPaymentAmount'];?>
					</div>
				</div>
				<?php if(isset($reviewData['Paymentoption'])&& $reviewData['Paymentoption']=="1"):?>
					<div class="flex-col-12" style="text-align: center">
						<button style="margin: 30px 0 0 0;" type="button" class="accent-btn" data-target="#schedulePOPUp" data-toggle="modal">Full list of scheduled payments</button>	
					</div>
				<?php endif;?>
				<?php 
					/*if(isset($_POST['Paymentoption'])&& $_POST['Paymentoption']=="1"){ 
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
						if($reviewData['PRFdonation']!=""){
							$PRFPrice =$reviewData['PRFdonation']; 
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
								<div class="flex-col-12" style="text-align: center">
									<button style="margin-top: 30px;" type="button" class="placeorder" data-target="#schedulePOPUp" data-toggle="modal">Full list of scheduled payment</button>	
								</div>
							</div>'; 								
					}*/
				?>				
			</div>
			
			<!--<input type="hidden" name="Paymentcard" id="Paymentcardvalue" value="">-->
			<div class="flex-col-12" style="text-align: center">
				<!--<a target="_blank" class="addCartlink"><button style="margin-top: 30px;" class="placeorder <?php //if(sizeof($cardsnum["results"])==0){ echo " stop";} ?>" type="submit">Place your order</button></a>-->
				<a class="addCartlink"><button style="margin-top: 30px;" class="placeorder <?php if(sizeof($cardsnum["results"])==0 && $scheduleDetails['OrderTotal']!="0"){ echo " stop";} ?>" type="submit">Place your order</button></a>
			</div>
	</div>
</div>
</form>
<form id="pform" action="" method="POST"><input type="hidden" name="goP"></form>
<form id="deletePRFForm" action="" method="POST"><input type="hidden" name="step2-2"></form>
<form id="deleteMGForm" action="" method="POST"><input type="hidden" name="step2-3" value=""></form>
<form id="deleteNGForm" action="" method="POST"><input type="hidden" name="step2-4" value=""></form>		
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  <a class="your-details-prevbutton8"><span class="dashboard-button-name">Back</span></a></div>
<?php if(isset($reviewData['Paymentoption'])&& $reviewData['Paymentoption']=="1"): ?>
<div id="schedulePOPUp" class="modal fade" role="dialog">
	<div class="modal-dialog" style="overflow-y: scroll; max-height:85%;  margin-top: 50px; margin-bottom:50px;">
	<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Your next scheduled payment details</h4>
			</div>
			<div class="modal-body">
			<ul>
			    <?php 
                    $month = date("m");		
					//if($month!="10") {$currentMonth = trim($month,"0"); }else{$currentMonth =$month;}
					if($month =="01"){$currentYear = date("Y");} else{$currentYear = date("Y")+1; }
					echo '<div class="flex-cell flex-flow-row">
								<div class="flex-col-6">
								Date	
								</div>
								<div class="flex-col-6">
								Payment amount	
								</div>
							</div>';
					for($i=2; $i<12; $i++){
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
<?php logRecorder();  ?>
<!--  this part will be merged with Andy's Dashboard less file-->
<style>
div#schedulePOPUp {
    color: black;
}
</style>
<!--  this part will be merged with Andy's Dashboard less file-->	