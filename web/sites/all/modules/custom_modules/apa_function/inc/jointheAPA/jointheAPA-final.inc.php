<?php 
/***************Handle insurance part if it is neccessary */
if(isset($_POST['step2-1'])) {
	$postInsuranceData = array();
	$postInsuranceData['ID'] = "-1";
	$postInsuranceData['EntityName'] = "PersonInsuranceData__c";
	if(isset($_SESSION['LinkId'])){ $postInsuranceData['PersonID'] = $_SESSION['LinkId']; } 
	if(isset($_POST['Claim'])){ $postInsuranceData['MalpracticeClaim'] = $_POST['Claim']; }
	if(isset($_POST['Facts'])){ $postInsuranceData['InsuredClaimRisk'] = $_POST['Facts']; }
	if(isset($_POST['Disciplinary'])){ $postInsuranceData['ExternalDisciplinaryProceedings'] = $_POST['Disciplinary']; }
	if(isset($_POST['Decline'])){ $postInsuranceData['InsurerDeclinedInsurance'] = $_POST['Decline']; }
	if(isset($_POST['Oneclaim'])){ $postInsuranceData['MoreThanOneClaim'] = $_POST['Oneclaim']; }
	if(isset($_POST['Businiessname'])){ $postInsuranceData['BusinessNameOwned'] = $_POST['Businiessname']; }
	if($_POST['Addtionalquestion']=="1"){
		if(isset($_POST['Yearclaim'])){ $postInsuranceData['Yearofclaim'] = $_POST['Yearclaim']; }
		if(isset($_POST['Nameclaim'])){ $postInsuranceData['ClaimantName'] = $_POST['Nameclaim']; }
		if(isset($_POST['Fulldescription'])){ $postInsuranceData['Description'] = $_POST['Fulldescription']; }
		if(isset($_POST['Amountpaid'])){ $postInsuranceData['AmountPaid'] = $_POST['Amountpaid']; }
		if(isset($_POST['Finalisedclaim'])){ $postInsuranceData['ClaimFinalised'] = $_POST['Finalisedclaim']; }
			
	}
	else{
		$postInsuranceData['Yearofclaim'] ="";
		$postInsuranceData['ClaimantName'] ="";
		$postInsuranceData['Description']="";
		$postInsuranceData['AmountPaid'] ="";
		$postInsuranceData['ClaimFinalised'] ="";
		
	}		
	
	//test data end here
    // 2.2.40 - Get user insurance data
	// Send - 
	// UserID 
	// Response -UserID & insurance data
	$data = array();
	$data['ID'] = $_SESSION["UserId"];
	$insuarnceData = aptify_get_GetAptifyData("40", $data,""); // #_SESSION["UserID"];
	if(sizeof($insuarnceData['results'])!=0){
		if($postInsuranceData['MalpracticeClaim']!=$insuarnceData['results'][0]['Claim'] || $postInsuranceData['InsuredClaimRisk']!=$insuarnceData['results'][0]['Facts'] || $postInsuranceData['ExternalDisciplinaryProceedings']!=$insuarnceData['results'][0]['Disciplinary'] || $postInsuranceData['InsurerDeclinedInsurance']!=$insuarnceData['results'][0]['Decline']|| $postInsuranceData['MoreThanOneClaim']!=$insuarnceData['results'][0]['Oneclaim']){
		$submitTag=true;
        		
	}
		else{$submitTag=false;}
		if($postInsuranceData['Yearofclaim'] != $insuarnceData['results'][0]['Yearclaim'] || $postInsuranceData['ClaimantName'] != $insuarnceData['results'][0]['Nameclaim'] || $postInsuranceData['Description'] != $insuarnceData['results'][0]['Fulldescription']|| $postInsuranceData['AmountPaid'] != $insuarnceData['results'][0]['Amountpaid']|| $postInsuranceData['ClaimFinalised'] != $insuarnceData['results'][0]['Finalisedclaim']|| $postInsuranceData['BusinessNameOwned'] != $insuarnceData['results'][0]['Businiessname']){
		$submitTag=true;
       		
	}
	else{$submitTag=false;}
		
    }
	else{
		$submitTag=true;
	}
	
	
	// 2.2.41 Send insurance data to Aptify webservice
	// Send - 
	// userID & insurance data
	// Response -??????????????????????set in the future
    
	if($submitTag){$testData = aptify_get_GetAptifyData("41", $postInsuranceData); }
	//force the not eligible user
	//added on 13/08/2018
	if(isset($_POST['insuranceStatus'])&& $_POST['insuranceStatus']=="1") {
		if(isset($_SESSION['UserId'])){ $UserID = $_SESSION['UserId'];  } 
		if(isset($_SESSION['UserName'])){ $EmailAddress = $_SESSION['UserName'];  } 
		$CreateDate = date('Y-m-d');
		$Type = "J";
		createInsuranceStatus($UserID,$EmailAddress,$CreateDate,$Type);
		$link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
		header("Location:".$link."/insuranceprocess");
	}
	
	
}
?>
<?php
//delete PRF
/*if(isset($_POST['step2-2'])){
	checkShoppingCart($userID=$_SESSION['UserId'],$type="", $prodcutID="PRF");
	$_SESSION["postReviewData"]['PRFdonation']="";
	
}*/
//delete MG product

if(isset($_POST['step2-3'])){
	checkShoppingCart($userID=$_SESSION['UserId'],$type="",$prodcutID=$_POST['step2-3']);
	//echo "this is productID";
	//print_r($_SESSION["MGProductID"]);
	
	foreach($_SESSION["MGProductID"] as $deleteM){
		if (($key = array_search($_POST['step2-3'], $deleteM)) !== false) {
			//echo "try to delete product";
			unset($deleteM[$key]);
		}    
	}
	//print_r($deleteM);
	unset($_SESSION["MGProductID"]);
	
	$afterDelete = array();
	array_push($afterDelete,$deleteM);
	$_SESSION["MGProductID"] = $afterDelete;
	
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
	//$postPaymentData = array();
	//$postReviewData = array();
	// 2.2.15 Add payment method
	// Send - 
	// userID, Payment-method,Name-on-card,Cardno,Expiry-date,CCV
	// Response -Add Success message 
	/*if(isset($_POST['addCard']) && $_POST['addCard'] == "1"){
		if(isset($_SESSION['UserId'])){ $postPaymentData['userID'] = $_SESSION['UserId']; }
		if(isset($_POST['Cardtype'])){ $postPaymentData['Payment-method'] = $_POST['Cardtype']; }
		if(isset($_POST['Cardnumber'])){ $postPaymentData['Cardno'] = $_POST['Cardnumber']; }
		if(isset($_POST['Expirydate'])){ $postPaymentData['Expiry-date'] = $_POST['Expirydate']; }
		if(isset($_POST['CCV'])){ $postPaymentData['CCV'] = $_POST['CCV']; }
		$out = aptify_get_GetAptifyData("15", $postPaymentData);
		if(isset($_SESSION['tempcard'])){ unset($_SESSION["tempcard"]);}
	}
	elseif(isset($_POST['addCard']) && $_POST['addCard'] == "1" && !isset($_POST['addcardtag'])){
		$tempcard = array();
		$tempcard['Payment-method'] = $_POST['Cardtype'];
		$tempcard['Name-on-card'] = $_POST['Cardname'];
	    $tempcard['Cardno'] = $_POST['Cardnumber'];
		$tempcard['Expiry-date'] = $_POST['Expirydate']; 
		$tempcard['CCV'] = $_POST['CCV'];
		if(isset($_SESSION['tempcard'])){ unset($_SESSION["tempcard"]);}
		$_SESSION['tempcard'] = $tempcard;
		
	}*/
   		
	//if(isset($_POST['Paymentcard'])){ $postReviewData['Card_number'] = $_POST['Paymentcard']; }
	
	$postReviewData['productID'] = getProductList($_SESSION['UserId']);
  	//store data in the session
	//$_SESSION["postReviewData"] =  array();
	//$_SESSION["postReviewData"] = $postReviewData; 
    
	
//}
    //For pay in full scenario
	$postFullData['userID'] = $_SESSION['UserId'];
	$postFullData['Paymentoption'] = 0;
	$postFullData['InstallmentFor'] = "Membership";
    $postFullData['InstallmentFrequency'] = "";
    $postFullData['PRFdonation'] = "0"; 
	$postFullData['productID'] = getProductList($_SESSION['UserId']);
	$postFullData['CampaignCode'] = "";
	$fullDetails = aptify_get_GetAptifyData("47", $postFullData);
	//Get calculating the Order Total and Schedule Payments for instalments scenario
	// 2.2.47 Get calculating the Order Total and Schedule Payments
	// Send - 
	// userID & Paymentoption & InstallmentFor & InstallmentFrequency & PRFdonation & productID & CampaignCode
	// Response -AdminFee & SubTotal & GST & OrderTotal & InitialPaymentAmount & OccuringPayment & LastPayment
	//$reviewData = $_SESSION["postReviewData"] ;
	$postScheduleData['userID'] = $_SESSION['UserId'];
	$postScheduleData['Paymentoption'] = 1;
	$postScheduleData['InstallmentFor'] = "Membership";
    $postScheduleData['InstallmentFrequency'] = "Monthly";
    $postScheduleData['PRFdonation'] = "0"; 
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
		$updateCards = aptify_get_GetAptifyData("13", $updateCard); 

} 
	// 2.2.12 - Get payment list
	// Send - 
	// UserID 
	// Response -payment card list
	$cardData['id'] = $_SESSION["UserId"];
	$cardsnum = aptify_get_GetAptifyData("12", $cardData);
	//print_r($cardsnum);
$PRFPrice = 0;
?>
<div id="tipsBlock"
    class="<?php if(isset($_POST['insuranceStatus'])&& $_POST['insuranceStatus']=="1" ) {echo "display";} else { echo "display-none";}?>">
    <span style="color:red;">Unfortunately, we cannot let you proceed with this membership purchase. Please contact the
        APA member hub (include email link) or on 1 300 306 622 for more information.</span></div>
<form id="join-review-form" action="joinconfirmation" method="POST">

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
    <div class="checkMessage">Please go back to enter a valid credit card number before proceeding with your order.
    </div>
    <?php elseif($out["result"]=="Failed" && (strpos($out["Message"], 'Invalid Credit Card Number') !== false)):?>
    <div class="checkMessage">Please go back to enter a valid credit card number before proceeding with your order.
    </div>
    <?php else:?>
    <div class="checkMessage">There was an unexpected error with your payment details, please go back and check they are
        correct, or contact the APA.</div>
    <?php endif;?>
    <?php endif;?>
    <?php endif;?>
    <div class="down6"
        <?php if(isset($_POST['step2-1']) || (isset($_POST['step1'])&& $_POST['insuranceTag']=="0") || isset($_POST['goP']) ||isset($_POST["step2-2"])||isset($_POST['step2-3']) ||isset($_POST['step2-4']))echo 'style="display:block;"'; else { echo 'style="display:none;"';}?>>
        
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 main_content">
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
								echo "<div class='flex-cell flex-flow-row table-cell'>";
								echo "<div class='flex-col-8 title-col'><span class='pd-header-mobile'>Product name:</span>".$memberProduct['Title']."</div>";
								echo "<div class='flex-col-2 price-col'><span class='pd-header-mobile'>Price:</span>A$".number_format($memberProduct['Price'],2)."</div>";
								$price += $memberProduct['Price'];
								echo "<div class='flex-col-2 action-col'><a href='jointheapa' target='_self'>delete</a></div>";
								echo "</div>";  
							}
						}	
						foreach( $NGListArray as $NGArray){
						if(sizeof($NGProductsArray)!=0){
						    foreach($NGProductsArray as $NGProduct){
								if($NGProduct == $NGArray['ProductID']){
									echo "<div class='flex-cell flex-flow-row table-cell'>";
									echo "<div class='flex-col-8 title-col'><span class='pd-header-mobile'>Product name:</span>".$NGArray['ProductName']."</div>";
									echo "<div class='flex-col-2 price-col'><span class='pd-header-mobile'>Price:</span>A$".number_format($NGArray['NGprice'],2)."</div>";
									$price += $NGArray['NGprice'];
									echo '<div class="flex-col-2 action-col"><a class="deleteNGButton'.$NGArray['ProductID'].'">delete</a></div>';
									echo "</div>";
								}	  
							}
						}
						}
						if(sizeof($FPListArray)!=0){
							foreach( $FPListArray as $FProduct){
									echo "<div class='flex-cell flex-flow-row table-cell'>";
									echo "<div class='flex-col-8 title-col'><span class='pd-header-mobile'>Product name:</span>".$FProduct['FPtitle']."</div>";
									echo "<div class='flex-col-2 price-col'><span class='pd-header-mobile'>Price:</span>A$".number_format($FProduct['FPprice'],2)."</div>";
									$price += $FProduct['FPprice'];
									echo '<div class="flex-col-2 action-col">';if($FProduct['ProductID']!="9973"){ echo '<a class="deleteMGButton'.$FProduct['ProductID'].'">delete</a>';} echo '</div>';
									echo "</div>";  
							}
						}
                        //if((!isset($_POST['prftag'])) && isset($_POST['PRF'])&& $_POST['PRF']!=""){ 
					//if($reviewData['PRFdonation']!=""){ 
                            //echo '<div class="flex-cell flex-flow-row table-cell">
                            /*<div class="flex-col-8 title-col"><span class="pd-header-mobile">Product name:</span>Physiotherapy Research Foundation donation</div>
                            <div class="flex-col-2 price-col"><span class="pd-header-mobile">Price:</span>A$'.number_format($reviewData['PRFdonation'],2).'</div>
                            <div class="flex-col-2 action-col"><a class="deletePRFButton">delete</a></div>
                            </div>'; */
                           // $price +=$reviewData['PRFdonation'];}
						//if(isset($reviewData['Paymentoption'])&& $reviewData['Paymentoption']=="1"){ 
							//echo '<div class="flex-cell flex-flow-row table-cell">
                            /*<div class="flex-col-8 title-col"><span class="pd-header-mobile">Product name:</span>Admin fee</div>
                            <div class="flex-col-2 price-col"><span class="pd-header-mobile">Price:</span>A$'.number_format($scheduleDetails['AdminFee'],2).'</div>
                            <div class="flex-col-2 action-col"></div>
                            </div>';*/ 
							
						//} 
				?>
            </div>
            <div class="flex-container flex-table total-price">

                <div class="flex-cell flex-flow-row">
                    <div class="flex-col-8">
                        Subtotal (ex. GST)
                    </div>
                    <div class="flex-col-4">
                        $<span class="full"><?php echo number_format($fullDetails['SubTotal'],2);?></span><span class="schedule"><?php echo number_format($scheduleDetails['SubTotal'],2);?></span>
                    </div>
                </div>
                <div class="flex-cell flex-flow-row">
                    <div class="flex-col-8">
                        GST
                    </div>
                    <div class="flex-col-4">
                        $<span class="full"><?php echo number_format($fullDetails['GST'],2);?></span><span class="schedule"><?php echo number_format($scheduleDetails['GST'],2);?></span>
                    </div>
                </div>
                <div class="flex-cell flex-flow-row">
                    <div class="flex-col-8">
                        <b>Total (inc. GST)</b>
                    </div>
                    <div class="flex-col-4">
                        <b>$<span id="fullPayment" class="full"><?php echo number_format($fullDetails['OrderTotal'],2);?></span><span id="schedulePayment" class="schedule"><?php echo number_format($scheduleDetails['OrderTotal'],2);?></span></b>
                    </div>
                </div>
            </div>
        </div>
        <!--<a class="your-details-prevbutton8"><span class="dashboard-button-name">Last</span></a>-->
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 Membpaymentsiderbar">
            <?php /***** <p><span class="sidebardis<?php if($price==0) echo " display-none";?>">Payment Information:</span></p>
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
                <?php if(isset($_SESSION['tempcard']) && !isset($_POST['addcardtag'])) : ?>
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
                        <input type="text" class="form-control" id="Cardname" name="Cardname"
                            value="<?php echo $tempcards['Name-on-card']; ?>" placeholder="Card Name" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <input type="text" class="form-control" id="Cardnumber" name="Cardnumber"
                            value="<?php echo $tempcards['Cardno']; ?>" placeholder="Card number" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <input type="text" class="form-control" id="Expirydate" name="Expirydate"
                            value="<?php echo $tempcards['Expiry-date']; ?>" placeholder="Expire date" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <input type="text" class="form-control" id="CCV" name="CCV"
                            value="<?php echo $tempcards['CCV']; ?>" placeholder="CCV" readonly>
                    </div>
                </div>

                <?php endif; ?>
            </div>****/?>

            <div class="flex-container flex-flow-column payment-details">
                
                <div class="flex-cell payment_heading">
                    <h3>Payment information:</h3>
                </div>

                <div class="flex-cell payment_sub_heading">
                    <span>YOUR ORDER</span>
                </div>

                <div class="flex-cell flex-flow-row">
                    <div class="flex-col-12">
                        Today's payment:
                    </div>
                </div>
                <div class="flex-cell flex-flow-row schedule">
                    <div class="flex-col-6">
                        Admin fee (ex. GST)
                    </div>
                    <div class="flex-col-6">
                        $<?php echo number_format($scheduleDetails['AdminFee'],2);?>
                    </div>
                </div>
              
                <?php  
					$InitialPaymentAmount = number_format($scheduleDetails['InitialPaymentAmount'],2);
					$OccuringPayment = number_format($scheduleDetails['OccuringPayment'],2);
					$LastPayment = number_format($scheduleDetails['LastPayment'],2);
					$firstInstallment = $InitialPaymentAmount-$scheduleDetails['AdminFee']-$scheduleDetails['GST'];
				?>
                <div class="flex-cell flex-flow-row schedule" id="installDetail">
                    <div class="flex-col-6">
                        First installment (ex. GST)
                    </div>
                    <div class="flex-col-6">
                        $<?php //echo $scheduleDetails['InitialPaymentAmount']; 
						echo number_format($firstInstallment,2);?>
                    </div>
                </div>
             
                <div class="flex-cell flex-flow-row">
                    <div class="flex-col-6">
                        GST
                    </div>
                    <div class="flex-col-6">
                        $<span class="full"><?php echo number_format($fullDetails['GST'],2);?></span><span class="schedule"><?php echo number_format($scheduleDetails['GST'],2);?></span>
                    </div>
                </div>
                <div class="flex-cell flex-flow-row" id="PRFdetail">
                    <div class="flex-col-6">
                        PRF donation
                    </div>
                    <div class="flex-col-6">
                        $<span id="PRFshow"><?php echo number_format(5,2);?></span>
                    </div>
                </div>

                <div class="flex-cell flex-flow-row">
                    <div class="flex-col-6">
                        Subtotal (ex. GST)
                    </div>
                    <div class="flex-col-6">
                    $<span class="full"><?php echo number_format($fullDetails['SubTotal'],2);?></span><span class="schedule"><?php echo number_format($scheduleDetails['SubTotal'],2);?></span>
                    </div>
                </div>

                <div class="flex-cell flex-flow-row last_row">
                    <div class="flex-col-6">
                        <strong>Today's total (inc. GST)</strong>
                    </div>
                    <div class="flex-col-6">
                        <input type="hidden" id="fullHiddenAmount" value="<?php echo number_format($fullDetails['InitialPaymentAmount'],2);?>">
                        <input type="hidden" id="scheduleHiddenAmount" value="<?php echo number_format($scheduleDetails['InitialPaymentAmount'],2);?>">
                        <strong>$<span class="full" id="todayFullAmount"></span><span class="schedule" id="todayScheduleAmount"></span></strong></div>
                    </div>
                </div>
               
                <div class="flex-col-12 schedule" style="text-align: center" id="installmentPop">
                    <button style="margin: 30px 0 0 0;" type="button" class="accent-btn" data-target="#schedulePOPUp"
                        data-toggle="modal">Full list of scheduled payments</button>
                </div>
               
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
                <div class="flex-cell flex-flow-row btn_wrapper">
                    <div class="flex-col-12">
                        <a class="addCartlink" href="javascript:document.getElementById('join-insurance-form').submit();">
                            <span class="placeorder">
                                Place your order
                            </span>
                        </a>
                    </div>
                </div>
                
                <div class="countdown_wrapper">
                    Time left to purchase: 
                    <input type="text" value="05:00" id="timer" disabled>
                </div>
            </div>

            

        </div>
    </div>
</form>
<!--merge part start from here-->
<!---done by jinghu--22/05/2019-->
<form id="join-insurance-form" class="col-xs-12" action="joinconfirmation" method="POST">
   	<input type="hidden" name="step3" value="3">
    <div class="down6"
        <?php if(isset($_POST['step2-1']) || (isset($_POST['step1'])&& $_POST['insuranceTag']=="0") || isset($_POST['goP']) ||isset($_POST["step2-2"])||isset($_POST['step2-3']) ||isset($_POST['step2-4']))echo 'style="display:block;"'; else { echo 'style="display:none;"';}?>>
        <div class="row">
            <div class="col-xs-12">
                <span class="section_title">Payment options:</span>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <input class="styled-radio-select" type="radio" name="Paymentoption" id="p1-1" value="0"
                        checked="checked"><label for="p1-1">Pay in full today</label>
                </div>
                <?php if($_SESSION["MembershipProductID"]!="9964" && $_SESSION["MembershipProductID"]!="9965" && $_SESSION["MembershipProductID"]!="9966" && $_SESSION["MembershipProductID"] !="9968" && $_SESSION["MembershipProductID"] !="10005" && $_SESSION["MembershipProductID"] !="9967"&& $_SESSION["MembershipProductID"] !="10006"): ?>
                <div class="col-xs-12">
                    <input class="styled-radio-select" type="radio" name="Paymentoption" id="p1-2" value="1"><label
                        for="p1-2">Pay by monthly instalments (This option incurs a $12.00 admin fee)</label>
                </div>
                <?php endif;?>
            </div>
            <input type="hidden" id="Installpayment-frequency" name="Installpayment-frequency" value="">
        </div>
        <?php //if(isset($_SESSION["postReviewData"])) { $PRFTemp = $_SESSION["postReviewData"]['PRFdonation'];}?>
        <div class="row">
            <div class="col-xs-12"><span class="section_title">PRF donation:</div>
            <div class="col-xs-12 tooltip-container top">
                <span class="tooltip-activate">What is this?</span>
                <div class="tooltip-content">
                    The Physiotherapy Research Foundation (PRF) supports the physiotherapy profession by promoting,
                    encouraging and supporting research that advances physiotherapy knowledge and practice. The PRF aims
                    to boost the careers of new researchers through seeding grants, support research in key areas
                    through tagged grants and encourage academic excellence through university prizes. Give a little,
                    get a lot.
                    <br>
                    <a href="/reserach/purpose-prf">Tell me more</a>
                </div>
            </div>
            <div class="col-xs-12">A small proportion of all membership fees directly support physiotherapy research. We
                also appreciate member donations to further the important work of the Physiotherapy Research Foundation.
            </div>
            <div class="col-xs-12">
                <input class="styled-checkbox" type="checkbox" id="prftag" name="prftag"
                    <?php //if(isset($_SESSION["postReviewData"])) {if(empty($PRFTemp)) {echo 'value="1" checked="checked"';}} ?>>
                <label for="prftag" id="prftagAgree">No, I do not want to make a donation to the PRF</label>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6" id="prfselect">
                    <label for="">Your donation:</label>
                    <div class="chevron-select-box">
                        <select class="form-control" id="PRF" name="PRF">
                            <option value="5.00"
                                <?php //if(!isset($_SESSION["postReviewData"])) {echo "selected";} if(isset($_SESSION["postReviewData"])) {if($PRFTemp =="5") {echo "selected";}}?>>
                                $5.00</option>
                            <option value="10.00"
                                <?php //if(isset($_SESSION["postReviewData"])) {if($PRFTemp =="10") {echo "selected";}}?>>
                                $10.00</option>
                            <option value="20.00"
                                <?php //if(isset($_SESSION["postReviewData"])) {if($PRFTemp =="20") {echo "selected";}}?>>
                                $20.00</option>
                            <option value="50.00"
                                <?php //if(isset($_SESSION["postReviewData"])) {if($PRFTemp =="50") {echo "selected";}}?>>
                                $50.00</option>
                            <option value="100.00"
                                <?php //if(isset($_SESSION["postReviewData"])) {if($PRFTemp =="100") {echo "selected";}}?>>
                                $100.00</option>
                            <option value="Other"
                                <?php //if(isset($_SESSION["postReviewData"])) {if(!empty($PRFTemp) && $PRFTemp !="5" && $PRFTemp !="10" && $PRFTemp !="20" && $PRFTemp !="50" && $PRFTemp !="100") {echo "selected";}}?>>
                                Other</option>
                        </select>
                    </div>
                    <input type="hidden" id="PRFFinal" name="PRFFinal" value=""/>
                    <input type="number" class="form-control display-none" id="PRFOther" name="PRFOther"
                        value="<?php //if(isset($_SESSION["postReviewData"])) {if(!empty($PRFTemp) && $PRFTemp !="5" && $PRFTemp !="10" && $PRFTemp !="20" && $PRFTemp !="50" && $PRFTemp !="100") {echo $PRFTemp;}}?>"
                        oninput="this.value = Math.abs(this.value)" min="0">
                </div>
        </div>
        <?php 
// 2.2.12 - Get payment list
// Send - 
// UserID 
// Response -payment card list
$test['id'] = $_SESSION["UserId"];
$cardsnum = aptify_get_GetAptifyData("12", $test);
//print_r($cardsnum);?>
        <?php if (sizeof($cardsnum["results"])!=0): ?>
        <div id="hiddenPayment">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <fieldset>
                        <div class="chevron-select-box">
                            <select class="form-control" id="Paymentcard" name="Paymentcard">
                                <?php
							
								foreach( $cardsnum["results"] as $cardnum) {
									echo '<option value="'.$cardnum["Creditcards-ID"].'"';
									if($cardnum["IsDefault"]=="1") {
									echo "selected ";
								}
								echo 'data-class="'.$cardnum["Payment-Method"].'" class="'.'c'.str_replace("/","",$cardnum["Expiry-date"]).'">____ ____ ____ ';
								echo $cardnum["Digitsnumber-Cardtype-Default"].'</option>';
								}
							
							?>
                            </select>
                        </div>
                    </fieldset>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <input class="styled-checkbox" type="checkbox" id="anothercard" name="anothercard">
                    <label for="anothercard">Use another card</label>
                </div>
            </div>

            <div id="anothercardBlock" style="margin: 0; padding:0" class="col-xs-12">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <label for="">Payment method:<span class="tipstyle"> *</span></label>
                        <div class="chevron-select-box">
                            <select class="form-control" id="Cardtype" name="Cardtype" placeholder="Card type">
                                <?php 
						$PaymentTypecode  = file_get_contents("sites/all/themes/evolve/json/PaymentType.json");
						$PaymentType=json_decode($PaymentTypecode, true);
						foreach($PaymentType  as $pair => $value){
							echo '<option value="'.$PaymentType[$pair]['ID'].'"';
							echo '> '.$PaymentType[$pair]['Name'].' </option>';
							
						}
					?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <label for="">Name on card:<span class="tipstyle"> *</span></label>
                        <input type="text" class="form-control" id="Cardname" name="Cardname"
                            placeholder="Name on card">
                    </div>
                    <div class="col-xs-12 col-md-12">
                        <label for="">Card number:<span class="tipstyle"> *</span></label>
                        <input type="text" class="form-control" id="Cardnumber" name="Cardnumber"
                            placeholder="Card number" maxlength="16">
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-6 col-md-6">
                        <label for="">Expiry date:<span class="tipstyle"> *</span></label>
                        <input type="text" class="form-control" id="Expirydate" name="Expirydate"
                            placeholder="mmyy (eg: 0225)" maxlength="4">
                    </div>

                    <div class="col-xs-6 col-md-6">
                        <label for="">CVV:<span class="tipstyle"> *</span></label>
                        <input type="text" class="form-control" id="CCV" name="CCV" placeholder="CVV" maxlength="4">
                    </div>
                </div>

                <div class="col-xs-12">
                    <input class="styled-checkbox" type="checkbox" id="addcardtag" name="addcardtag"><label for="addcardtag">Save this card</label>
                    
                </div>

                <input type="hidden" name="addCard" value="0">

            </div>
            <div class="col-xs-12">To confirm that we can receive payments from your nominated credit card a one off
                verification charge of $1 will be deducted from your account. This amount will be refunded immediately
                upon payment confirmation.</div>
        </div>
        <?php endif; ?>
        <?php if (sizeof($cardsnum["results"])==0): ?>
        <div id="anothercardBlock" class="row show">
            <div class="row">
                

                <div class="col-xs-12 col-sm-6 col-md-6">
                    <label for="">Payment method:<span class="tipstyle"> *</span></label>
                    <div class="chevron-select-box">
                        <select class="form-control" id="Cardtype" name="Cardtype" placeholder="Card type">
                            <?php 
		$PaymentTypecode  = file_get_contents("sites/all/themes/evolve/json/PaymentType.json");
		$PaymentType=json_decode($PaymentTypecode, true);
		foreach($PaymentType  as $pair => $value){
			echo '<option value="'.$PaymentType[$pair]['ID'].'"';
			echo '> '.$PaymentType[$pair]['Name'].' </option>';
			
		}
	?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <label for="">Name on card:<span class="tipstyle"> *</span></label>
                    <input type="text" class="form-control" id="Cardname" name="Cardname" placeholder="Name on card">
                </div>

                <div class="col-xs-12 col-md-12">
                    <label for="">Card number:<span class="tipstyle"> *</span></label>
                    <input type="text" class="form-control" id="Cardnumber" name="Cardnumber" placeholder="Card number"
                        maxlength="16">
                </div>
            </div>

            <div class="row">
                <div class="col-xs-6 col-md-6">
                    <label for="">Expiry date:<span class="tipstyle"> *</span></label>
                    <input type="text" class="form-control" id="Expirydate" name="Expirydate"
                        placeholder="mmyy (eg: 0225)" maxlength="4">
                </div>

                <div class="col-xs-6 col-md-6">
                    <label for="">CVV:<span class="tipstyle"> *</span></label>
                    <input type="text" class="form-control" id="CCV" name="CCV" placeholder="CVV" maxlength="4">
                </div>
            </div>

            <div class="col-xs-12">
                <input class="styled-checkbox" type="checkbox" id="addcardtag" name="addcardtag" value="0"><label for="addcardtag">Save this card</label>
                <input type="hidden" name="addCard" value="1">
                
            </div>

            <div class="col-xs-12">To confirm that we can receive payments from your nominated credit card a one off
                verification charge of $1 will be deducted from your account. This amount will be refunded immediately
                upon payment confirmation.</div>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-xs-12">
                <input popup class="styled-checkbox" type="checkbox" id="jprivacy-policy">
                <label for="jprivacy-policy" id="privacypolicyl" popup-target="privacypolicyWindow"><span
                        class="tipstyle">*&nbsp;</span>I agree to the APA Terms and Conditions</label>
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 btn_wrapper"> 
            <a variant="prev" class="your-details-prevbutton<?php if(isset($_POST['step1'])&& $_POST['insuranceTag']=="0"){echo "5";} else {echo "6";}?>">
                <span class="icon arrow_left"></span>
                Back to previous
            </a>
	    </div>
    </div>
	
    </div>
</form>
<!--merge part end from here-->
<form id="pform" action="" method="POST"><input type="hidden" name="goP"></form>
<form id="deletePRFForm" action="" method="POST"><input type="hidden" name="step2-2"></form>
<form id="deleteMGForm" action="" method="POST"><input type="hidden" name="step2-3" value=""></form>
<form id="deleteNGForm" action="" method="POST"><input type="hidden" name="step2-4" value=""></form>
<form id="tempform" action="" method="POST"><input type="hidden" name="goI"></form>	

<div id="schedulePOPUp" class="modal fade" role="dialog">
    <div class="modal-dialog" style="overflow-y: scroll; max-height:85%;  margin-top: 50px; margin-bottom:50px;">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title">Your next scheduled payment details</h4>
            </div>
            <div class="modal-body">
                <ul>
                    <?php 
                    $month = date("m");	
                   	if($month!="10") {$currentMonth = trim($month,"0"); }else{$currentMonth =$month;}
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
								<div class="flex-col-6">$'.number_format($OccuringPayment,2).'</div>
							</div>';
					}
				echo '<div class="flex-cell flex-flow-row"><div class="flex-col-6">01/12/'.$currentYear.'</div>
						<div class="flex-col-6">$'.number_format($LastPayment,2).'</div>
					</div>';
				?>
                </ul>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!--  this part will be merged with Andy's Dashboard less file-->
<style>
div#schedulePOPUp {
    color: black;
}
</style>
<!--<div id="deleteNGWindow" style="display:none;">
	<h3 style="color:#009fda">Are you want to delete this National Group?</h3>
	<form id="deleteNGForm" action="" method="POST">
		<input type="hidden" name="step2-4" value="">
		<input type="hidden" name="MG" value="">
		<button class="yes accent-btn" type="submit" value="Yes">Yes</button>
	    <a class="no accent-btn cancelDeleteButton" target="_self">No</a>
	</form>	
</div>-->
<!--  this part will be merged with Andy's Dashboard less file-->
<?php logRecorder();  ?>

<script>
    var count = 300;
    function countDown(){
        var timer = document.getElementById("timer");
        if(count > 0){
            count--;
            if(count > 60) {
                var min = parseInt(count/60);
                var sec = count%60;
                if( sec < 10 ){
                    sec = "0" + sec;
                }
                timer.value = "0" + min + ":" + sec;
            } else {
                var sec = count%60;
                if( sec < 10 ){
                    sec = "0" + sec;
                }
                timer.value = "00:" + sec;
            }
            setTimeout("countDown()", 1000);
        }else{
            location.reload(true);
        }
    }
    countDown();
</script>