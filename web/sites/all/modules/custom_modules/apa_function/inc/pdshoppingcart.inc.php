<?php
if(!function_exists('drupal_session_started'))
{
  die("Unauthorized Access");
}
?>
<?php

if (isset($_SESSION['UserId'])):
?>
<?php
$creditcard='';
$i=0;

$price=0;
$tag=0;
$products = array();
$localProducts = array();
//$pdtype= array("event", "course", "workshop");
//change the filter pd type
$pdtype= "Courses and Workshops";
$type = "PD";
$couponCode ="";
$userID = $_SESSION['UserId'];
//Post NG Product
if(isset($_POST["PostNG"])) {
	$NGPostArray = Array();
	foreach($_POST as $key => $value){
		if($key!="PostNG"){
		array_push($NGPostArray,$key);}
	}
	/**
	 *  Save National Group in PD shopping cart
	 *  added by jing hu
	 */
	if(sizeof($NGPostArray)!=0){
		foreach($NGPostArray as $NG){
			if($NG=="9977" || $NG=="9978"){
				checkShoppingCart($userID=$_SESSION['UserId'], $type="PDMG", $productID=$NG,$coupon = "");
				createShoppingCart($userID, $productID=$NG, $type = "PDMG", $coupon = "");
			}
			else{
				checkShoppingCart($userID=$_SESSION['UserId'], $type="PDNG", $productID=$NG,$coupon = "");
				createShoppingCart($userID, $productID=$NG, $type = "PDNG", $coupon = "");
			}
			
			//PDShoppingCart($userID=$_SESSION['UserId'], $productID=$NG, $meetingID="",$type="PDNG",$Coupon="");
		}
	}
/***************End Save National Group in PD shopping cart***********/
}



// 2.2.19 - GET list National Group
// Send - 
// userID
// Response -National Group product
$sendData["UserID"] = $_SESSION['UserId'];
$NGListArray = aptify_get_GetAptifyData("19", $sendData);
/***************get userinfo from Aptify******************/
if(isset($_SESSION['Dietary'])) {
	$Dietary = $_SESSION['Dietary'];	
}
else {$Dietary = array();}

/****************End get userinfo from Aptify************/
/***************Save coupon code on APA side******************/
if(isset($_POST['Couponcode'])) {
	PDSaveCoupon($userID=$_SESSION['UserId'], $type="PD", $Coupon=$_POST['Couponcode']);
}
/***************End Save coupon code on APA side************/

/*********Delete shopping product from APAserver******/
if(isset($_GET["action"])&&$_GET["action"]=="del"){
	$productID = $_GET['productid'];
	$deltype =  $_GET['type'];
	deletePDProduct($userID,$productID,$deltype);
}

/*********End delete shopping product from APAserver******/
/********Get user shopping product form APA server******/
$productList = getPDProduct($userID,"PD");
/********End get user shopping product form APA server******/
/********Get Product details  from Aptify******/
// Eddy's code next 3
$UserID = "";
$PDarray = array();
$PDProductarray = array();
if(sizeof($productList)!=0){
	foreach ($productList as $productDetail){
		$productID = $productDetail['productID'];
		$meetingID = $productDetail['meetingID'];
		$coupon =  $productDetail['coupon'];
		$UID = $productDetail['ID'];
		$Lproduct = array('UID'=>$UID,'ProductID' =>$productID,'MeetingID' =>$meetingID, 'coupon' =>$coupon);
		array_push($localProducts, $Lproduct);
			
		// Eddy's code next 3
		
		$PDtotalArray["PDid"] = $Lproduct['MeetingID'];
		$SingleProduct = $Lproduct['ProductID'];
		array_push($PDProductarray, $SingleProduct);
		$UserID = $productDetail['ID'];
		$PDtotalArray["Coupon"] = $Lproduct['coupon'];
		$couponCode = $Lproduct['coupon'];
		$vars = $couponCode;
		array_push($PDarray, $PDtotalArray);
	}
}
/**
 *  Get National Group products for PD shopping cart
 *  added by jing hu
 */
$NGProductsArray = array(); 
$NGProductsArray = getProduct($userID=$_SESSION['UserId'],$type="PDNG"); 

if(sizeof($NGProductsArray)!=0) {
	foreach($NGProductsArray as $singleNG){
		array_push($PDProductarray, $singleNG);
	}
}
/**
 *  Get Magazine products for PD shopping cart
 *  added by jing hu 06092018
 */
$MGProductsArray = array();

$MGProductsArray = getProduct($userID=$_SESSION['UserId'],$type="PDMG"); 
if(sizeof($MGProductsArray)!=0) {
	foreach($MGProductsArray as $singleMG){
		array_push($PDProductarray, $singleMG);
	}
}
$FPListArray = array();
if(sizeof($MGProductsArray)!=0){
		$fpData['ProductID'] = $MGProductsArray;
		$FPListArray = aptify_get_GetAptifyData("21", $fpData);
}

//$RequestCart = array('Id' => $PIDArray, "userID" => $UserID, "Coupon" => $CouponArray);
// 2.2.30 - GET event detail list
// Send - 
// ProductIDs, UserID, Coupons
// Response -
// Max Number of enrolment, Current people enrolled, PD ID,
// Title, PD type, Time, Start & End date, Registration closing date,
// Where[Building Name, Address1, Address2, State, Suburb, Country],
// Cost, Your registration.
if(sizeof($PDarray)!=0){
	$RequestCart["userID"] = $_SESSION["UserId"];
	$RequestCart["MeetingCoupons"] = $PDarray;
	$product = aptify_get_GetAptifyData("30", $RequestCart); //$_SESSON["UserID"]
	$products = $product["MeetingDetails"];
}
//print_r($products);

/********End get Product details  from Aptify******/

//Get calculating the Order Total and Schedule Payments
// 2.2.47 Get calculating the Order Total and Schedule Payments
// Send - 
// userID & Paymentoption & InstallmentFor & InstallmentFrequency & PRFdonation & productID & CampaignCode
// Response -AdminFee & SubTotal & GST & OrderTotal & InitialPaymentAmount & OccuringPayment & LastPayment
$postScheduleData['userID'] = $_SESSION["UserId"];
$postScheduleData['Paymentoption'] = 0;
$postScheduleData['InstallmentFor'] = "Membership";
$postScheduleData['InstallmentFrequency'] = "";
$postScheduleData['PRFdonation'] = "";
$postScheduleData['productID'] = $PDProductarray;
$postScheduleData['CampaignCode'] = $couponCode;
$scheduleDetails = aptify_get_GetAptifyData("47", $postScheduleData);
$price =$scheduleDetails['OrderTotal']-$scheduleDetails['GST'];
//print_r($scheduleDetails);
/********End get Order Total and Schedule Payments  from Aptify******/
/*if(isset($_POST['addCard'])){
	// 2.2.15 - Add payment method
	// Send - 
	// UserID, Cardtype,Cardname,Cardnumber,Expirydate,CCV
	// Response -
	// N/A.
	if(isset($_SESSION['UserId'])){ $postPaymentData['userID'] = $_SESSION['UserId']; }
	if(isset($_POST['Cardtype'])){ $postPaymentData['Payment-method'] = $_POST['Cardtype']; }
	if(isset($_POST['Cardnumber'])){ $postPaymentData['Cardno'] = $_POST['Cardnumber']; }
	if(isset($_POST['Expirydate'])){ $postPaymentData['Expiry-date'] = $_POST['Expirydate'];}
	if(isset($_POST['CCV'])){ $postPaymentData['CCV'] = $_POST['CCV'];}
	$out = aptify_get_GetAptifyData("15",$postPaymentData); 
	
	if($out["result"]=="Failed"){
	    if($out["Message"]=="Expiry date lenght should be 4."){ echo '<div class="checkMessage">Please enter a valid expiry date before proceeding with your order.</div>';}
		elseif($out["Message"]=="CCV accepts up to 4 digit."){ echo '<div class="checkMessage">Please enter a valid CVV number before proceeding with your order.</div>';}
		elseif($out["Message"]=="Error in Create Person Saved Payment Method:Month must be between one and twelve. Parameter name: month"){ echo '<div class="checkMessage">Please enter a valid expiry date before proceeding with your order.</div>';}
		elseif($out["Message"]=="Please enter a valid End Date occurring after the Start Date."){ echo '<div class="checkMessage">Please enter a valid expiry date before proceeding with your order.</div>';}
		elseif((strpos($out["Message"], 'credit card number') !== false)){ echo '<div class="checkMessage">Please enter a valid credit card number before proceeding with your order.</div>';}
	    elseif($out["result"]=="Failed" && (strpos($out["Message"], 'Invalid Credit Card Number') !== false)){ echo '<div class="checkMessage">Please enter a valid credit card number before proceeding with your order.</div>';}
	    else{ echo '<div class="checkMessage">there was an unexpected error with your payment details, Please go back and check they are correct, or contact the APA.</div> ';}
	}
} */
/*if(isset($_POST['addCard']) && $_POST['addCard'] == "1" && !isset($_POST['addcardtag'])) {
	$tempcard = array();
	$tempcard['Payment-method'] = $_POST['Cardtype'];
	$tempcard['Cardno'] = $_POST['Cardnumber'];
	$tempcard['CardName'] = $_POST['Cardname'];
	$tempcard['Expiry-date'] = $_POST['Expirydate']; 
	$tempcard['CCV'] = $_POST['CCV'];
	$_SESSION['tempcard'] = $tempcard;

	
}	*/
if(isset($_SESSION["UserId"])){
	$userid = $_SESSION["UserId"];
	$test['id'] = $_SESSION["UserId"];
	$cardsnum = aptify_get_GetAptifyData("12", $test);
} 
?>
<?php  if((sizeof($products)!=0) || (sizeof($NGProductsArray)!=0) || (sizeof($FPListArray)!=0)):?>
<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 left-content">
	<?php if((sizeof($products)!=0) || (sizeof($NGProductsArray)!=0) || (sizeof($FPListArray)!=0)):?>
	
	<div class="heading_wrapper">
		<span class="dashboard-name cairo" style="color: #333">Summary of cart</span>
		<div class="countdown_wrapper">Time left to purchase: <input type="text" value="05:00" id="timer" disabled></div>
	</div>
	
	<div class="flex-container" id="pd-shopping-cart">
	<div class="flex-cell flex-flow-row heading-row">
		<div class="flex-col-5 name_col"><span class="table-heading">Product name</span></div>
		<div class="flex-col-3"><span class="table-heading">Date</span></div>
		<div class="flex-col-2 pd-spcart-location"><span class="table-heading">Location</span></div>
		<div class="flex-col-1 pd-spcart-price"><span class="table-heading">Price</span></div>
		<!--<div class="flex-col-2 pd-spcart-wishlist"><span class="table-heading">Action</span></div>-->
		<div class="flex-col-1 pd-spcart-delete"><span class="table-heading">Delete</span></div>
	</div>

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
				} else if (count === 60) {
					var sec = count%60;
					if( sec < 10 ){
						sec = "0" + sec;
					}
					timer.value = "01:" + sec;
				}else {
					var sec = count%60;
					if( sec < 10 ){
						sec = "0" + sec;
					}
					timer.value = "00:" + sec;
				}
				setTimeout("countDown()", 1000);
			}else{
				location.reload(true);
				//window.history.back();
			}
		}
		countDown();
	</script>
	
	<?php 
	$Availability = true;
	if(sizeof($products)!=0){
		////print_r($products);
		$ListProductID = Array();
		$discountPrice=0;
		foreach($products as $productt){
		$n = 0;

		/* Event status checker start */
		$available = true;
		$outPutResult = "";

		$pdArr["PDIDs"] = $productt['MeetingID'];
		if(isset($_SESSION["UserId"])) {
			$pdArr["UserID"] = $_SESSION["UserId"];
		}
		// 2.2.29 - GET event detail
		// Send - 
		// PDID, UserID, Coupon
		// Response -
		// PriceTable(list), Max enrolment, Current enrolment, PD_id,
		// Title, PD type, Presenter bio, Leaning outcomes, Prerequisites
		// Presenters, Time, Start date, End date, Registration closing
		// Where:{Address1, Address2, Address3(if exist), Address4(if exist), City,
		//	state, Postcode}, CPD hours, Cost, Your registration stats
		$pd_detail_indiv = aptify_get_GetAptifyData("29", $pdArr);
		$pd_detail_indiv = $pd_detail_indiv['MeetingDetails'][0];

		$closingDate = explode(" ",$pd_detail_indiv['Close_date']);
		$cldate = str_replace('/', '-', $closingDate[0]);//$closingDate[0];//
		$Cls = strtotime($cldate);
		$Totalnumber = doubleval($pd_detail_indiv['Totalnumber']);
		$Enrollednumber = doubleval($pd_detail_indiv['Enrollednumber']);
		$Now = strtotime(date('m/d/Y'));
		$Div = $Totalnumber - $Enrollednumber;
		if($pd_detail_indiv['AttendeeStatus'] == "Registered") {
			$outPutResult = "registered";
			$available = false;
			$Availability = false;
		} else {
			if($Now > $Cls){
				$outPutResult = "closed";  
				$available = false;
				$Availability = false;
			} elseif($Div == 0){
				$outPutResult = "full"; 
				$available = false;
				$Availability = false;
			}
		}
		if(substr($pd_detail_indiv['Title'], 0, 8) == "External") {
			$outPutResult = "External";
			$available = false;
			$Availability = false;
		}
		if($available) {
			$eventMessage = "Your event ".$pd_detail_indiv['Title']." is up.";
		} else {
			$eventMessage = "<a href='/pd/pd-product?saveShoppingCart&id=".$pdArr["PDIDs"]."' target='_blank'>This event</a> is now ".$outPutResult.". Please remove from your cart.";
		}
		/* Event status checker end	 */
		$pass=$localProducts[$n]['UID'];
		//$arrPID["PID"] = $productt['MeetingID'];
		$arrPID["PID"] = $productt['ProductID'];
		array_push($ListProductID ,$arrPID);
			if( $available ){
				echo "<div class='flex-cell flex-flow-row event_available'>";
			} else{
				echo "<div class='flex-cell flex-flow-row event_unavailable'>";
			}
			echo	"<div class='flex-col-5 name_col'><span class='mobile-visible'>Product name: </span>".$productt['Title']."</div>";
			$bdate = explode(" ",$productt['Sdate']);
			$edate = explode(" ",$productt['Edate']);
			$newt = str_replace('/', '-', $bdate[0]);//$bdate[0];//
			$newj = str_replace('/', '-', $edate[0]);//$edate[0];//
			$t = strtotime($newt);
			$j = strtotime($newj);
		
			echo	"<div class='flex-col-3 pd-spcart-date'><span class='start-date'>".date("d M Y",$t)."</span><span class='end-date'>".date("d M Y",$j)."</span></div>";
			echo	"<div class='flex-col-2 pd-spcart-location'><span class='mobile-visible'>Location: </span>".$productt['City'].", ".$productt['State']."</div>";
			// add by jinghu
			if($couponCode!=""){
				echo	"<div class='flex-col-1 pd-spcart-price'><span class='mobile-visible'>Price: </span>$".number_format($productt['Product Cost With Coupon'],2)."</div>";
			}
			else{
				echo	"<div class='flex-col-1 pd-spcart-price'><span class='mobile-visible'>Price: </span>$".number_format($productt['Product Cost Without Coupon'],2)."</div>";
			}
			$discountPrice += $productt['Product Cost Without Coupon']-$productt['Product Cost With Coupon'];
			// end add by jinghu
			//if($_SESSION['MemberTypeID'] == "1" || $_SESSION['MemberTypeID'] == 1) {
				//echo	"<td>".$productt['Pricelist'][1]['Price']."</td>";
				//echo	"<td>M price</td>";
			//} else {
				//echo	"<td>".$productt['Pricelist'][0]['Price']."</td>";
				//echo	"<td>NM price</td>";
			//}
			echo        '<div class="flex-col-1 pd-spcart-delete"><a target="_self" href="pd-shopping-cart?action=del&type=PD&productid='.$productt['ProductID'].'"><i class="fa fa-times-circle" aria-hidden="true"></i></a></div>';
			if(!$available) echo	"<div class='removedEvent flex-col-12'>".$eventMessage."</div>";
			echo "</div>";    
			$n=$n+1;
			$i=$i+1;
			//$price=$price+(int)str_replace('$', '', $productt['Pricelist'][0]['Price']);
		//if (in_array($productt['Typeofpd'],  $pdtype)){ $tag=1; }
		if ($productt['Typeofpd'] == $pdtype){ $tag=1; }
		if ($productt['Typeofpd'] =="Networking Event" || $productt['Typeofpd'] =="Student Event") { $dietarT = 1;} else { $dietarT = 0;}
		}
	}
    if(sizeof($NGProductsArray)!=0){
		foreach( $NGListArray as $NGArray){
			if(sizeof($NGProductsArray)!=0){
				foreach($NGProductsArray as $NGProduct){
					if($NGProduct == $NGArray['ProductID']){
						echo "<div class='flex-cell flex-flow-row table-cell'>";
						
						echo "<div class='flex-col-3 title-col'>".$NGArray['ProductName']."</div>";
						echo	"<div class='flex-col-3 pd-spcart-date'>N/A</div>";
						echo	"<div class='flex-col-2 pd-spcart-location'><span class='mobile-visible'>Location: </span>N/A</div>";
						echo "<div class='flex-col-1 pd-spcart-price'>A$".$NGArray['NGprice']."</div>";
						//$price += $NGArray['NGprice'];
						//echo "<div class='flex-col-2 action-col'><a href='jointheapa' target='_self'>delete</a></div>";
						echo        '<div class="flex-col-1 pd-spcart-delete"><a target="_self" href="pd-shopping-cart?action=del&type=PDNG&productid='.$NGArray['ProductID'].'"><i class="fa fa-times-circle" aria-hidden="true"></i></a></div>';
						echo "</div>";
					}	  
				}
			}
			
		}
	}	
	if(sizeof($FPListArray)!=0){
		foreach( $FPListArray as $MGArray){
			
				
					
						echo "<div class='flex-cell flex-flow-row table-cell'>";
						
						echo "<div class='flex-col-3 title-col'>".$MGArray['FPtitle']."</div>";
						echo	"<div class='flex-col-3 pd-spcart-date'>N/A</div>";
						echo	"<div class='flex-col-2 pd-spcart-location'><span class='mobile-visible'>Location: </span>N/A</div>";
						echo "<div class='flex-col-1 pd-spcart-price'>A$".$MGArray['FPprice']."</div>";
						//$price += $NGArray['NGprice'];
						//echo "<div class='flex-col-2 action-col'><a href='jointheapa' target='_self'>delete</a></div>";
						echo        '<div class="flex-col-1 pd-spcart-delete"><a target="_self" href="pd-shopping-cart?action=del&type=PDMG&productid='.$MGArray['ProductID'].'"><i class="fa fa-times-circle" aria-hidden="true"></i></a></div>';
						echo "</div>";
						  
				
			
		}
	}
$i = $i+sizeof($FPListArray)+sizeof($NGProductsArray);
	?>
	</div>
	<?php endif; ?>
	<?php   if(sizeof($products)!=0):?>
    <div class="flex-container flex-flow-column" id="termc">
	<input type="hidden" id="checkTerm" value="1">
		<div class="flex-cell">	
			<span class="small-lead-heading">Terms & conditions</span>
		</div>

		<div class="flex-cell">
			<input popup class="styled-checkbox" type="checkbox" id="accept1">
			<label popup-target="PDTermsWindow" id="pd_terms_open" for="accept1">I accept the APA events terms and conditions, including the APA cancellation clause<span class="tipstyle">*</span></label>
		</div>

		<?php if($tag==1): ?>
		<div class="flex-cell">
			<input class="styled-checkbox" type="checkbox" id="accept2">
			<label for="accept2" id="accept2label">I understand that I must have appropriate Professional Indemnity insurance current on the date/s of any APA course/workshop that I’m registered for<span class="tipstyle">*</span></label>
		</div>

		<?php endif; ?>
		<div class="flex-cell">
			<input class="styled-checkbox" type="checkbox" id="accept3">
			<label for="accept3" id="accept3label">I accept that the APA will not reimburse costs associated with travel and/or accommodation if the event is cancelled. The APA recommends travelling participants purchase travel insurance to cover this<span class="tipstyle">*</span></label>
		</div>
	</div>
	<?php if($tag==1 || $dietarT==1): ?>
	<div class="flex-container flex-flow-column" id="diet_req">
		<div class="flex-cell">
			<span class="small-lead-heading">Your dietary requirements</span>
		</div>

		<p>Based on your details, we’ve recognised you have the following dietary requirements:</p>

		<div class="flex-cell flex-flow-column">
			<?php if(sizeof($Dietary)>0) {
				foreach($Dietary as $item) {
					echo '<span class="diet-name">'.$item['Name'].'</span>';} }  
				else { 
					echo "<span style='text-transform: uppercase; color: grey; font-size: 1.1em; font-weight: 500;'>None</span>";}
			?>
		</div>
		
		<span class="">Please note that not all APA PD events include catering.</span>
	</div>
	<?php endif; ?>
	<?php endif; ?>	
	
	
	<div class="col-xs-12 bottom-buttons">
		<a class="addCartlink" href="pd-search"><button class="dashboard-button dashboard-bottom-button your-details-submit shopCartButton">Continue shopping</button></a>
		<a class="addCartlink" href="../your-details?Goback=PD"><button class="dashboard-button dashboard-bottom-button your-details-submit shopCartButton">Update your details</button></a>
	</div>

</div>


<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 paymentsiderbar">
	<?php if (sizeof($cardsnum["results"])!=0): ?>
	<div id="hiddenPayment">
	<p><span class="sidebardis">Payment Information:</span></p>

	<?php if(sizeof($products)!=0):?>
		<form id="discount" action="pd-shopping-cart" method="POST">
			<input type="text" name="Couponcode" placeholder="Enter discount code" value="">
			<button type="Submit" class="dashboard-button dashboard-bottom-button your-details-submit applyCouponButton">Apply</button>
		</form>
		<span>&nbsp;</span>
	<?php endif; ?>
	
	<div class="paymentsidecredit"> 
		<fieldset>
			<div class="chevron-select-box">
				<select  id="Paymentcard" name="Paymentcard" >
					<?php
					if (sizeof($cardsnum)!=0) {
						foreach( $cardsnum["results"] as $cardnum) {
							echo '<option value="'.$cardnum["Creditcards-ID"].'"';
							if($cardnum["IsDefault"]=="1") {
							echo "selected ";
						}
						echo 'data-class="'.$cardnum["Payment-Method"].'" class="'.'c'.str_replace("/","",$cardnum["Expiry-date"]).'">Credit card ending with ';
						echo $cardnum["Digitsnumber-Cardtype-Default"].'</option>';
						}
					}
					?>
				</select>
			</div>
		</fieldset>
	</div>


	<div class="paymentsideuse">
	
	<div class="col-xs-12 none-padding" style="margin: 5px 0;">
		<input class="styled-checkbox" type="checkbox" id="anothercard">
		<label for="anothercard"><a class="event10" style="cursor: pointer;">Use another card</a></label>
	</div>

	<div id="anothercardBlock" class="col-xs-12 none-padding down10 extra-card" style="display:none;"<?php //if(isset($_SESSION["tempcard"])){ echo 'style="display:block;"';} else { echo 'style="display:none;"';}?>>
		<!--<form action="/pd/pd-shopping-cart" method="POST" class="">
		<input type="hidden" name="addCard" value="1"/>
		<div class="row">
			<div class="col-lg-12">
				<div class="chevron-select-box">
					<select class="form-control" id="Cardtype" name="Cardtype" placeholder="Card type">
					<?php 
						/*$PaymentTypecode  = file_get_contents("sites/all/themes/evolve/json/PaymentType.json");
						$PaymentType=json_decode($PaymentTypecode, true);
						foreach($PaymentType  as $pair => $value){
							echo '<option value="'.$PaymentType[$pair]['ID'].'"';
							if(isset($_SESSION["tempcard"]) && $_SESSION["tempcard"]['Payment-method'] ==$PaymentType[$pair]['ID']) {echo "selected ";}
							echo '> '.$PaymentType[$pair]['Name'].' </option>';
							
						}*/
					?>
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
			<label for="">Name on card:<span class="tipstyle"> *</span></label>
			<input type="text" class="form-control"  name="Cardname" placeholder="Name on card" <?php //if(isset($_SESSION["tempcard"])) echo 'value='.$_SESSION["tempcard"]['CardName'].''; ?>>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
			<label for="">Card number:<span class="tipstyle"> *</span></label>
			<input type="number" class="form-control"  name="Cardnumber" placeholder="Card number" required maxlength="16" <?php //if(isset($_SESSION["tempcard"])) echo 'value='.$_SESSION["tempcard"]['Cardno'].''; ?>>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
			<label for="">Expiry date:<span class="tipstyle"> *</span></label>
			<input type="number" class="form-control"  name="Expirydate" placeholder="mmyy (eg: 0225)" required maxlength="4" <?php //if(isset($_SESSION["tempcard"])) echo 'value='.$_SESSION["tempcard"]['Expiry-date'].''; ?>>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<label for="">CVV:<span class="tipstyle"> *</span></label>
				<input type="number" class="form-control"  name="CCV" placeholder="CVV" <?php //if(isset($_SESSION["tempcard"])) echo 'value='.$_SESSION["tempcard"]['CCV'].''; ?>>
			</div>
				<div class="col-xs-12 tooltip-container top" style="margin-top: 10px;">
					<span class="tooltip-activate">What is CVV?</span>
					<div class="tooltip-content">
						<h4>What is a Card Verification Number?</h4>
						<span class="tooltip-img"><img src="/sites/default/files/general-icon/cvn-image.png"></span>
						<span>For Visa and Mastercard enter the last three digits on the signature strip. For American Express, enter the four digits in small print on the front of the card.</span>
					</div>
				</div>	
		</div>
		<!--<div class="col-xs-12 none-padding" style="padding-left: 1px; margin: 5px 0;">
			<input class="styled-checkbox" type="hidden" id="addcardtag" name="addcardtag" <?php //if(!isset($_SESSION["tempcard"])) {echo 'value="1" checked';} else {echo 'value="0"';} ?>>
			<label for="addcardtag">Do you want to save this card?</label>
		</div>-->
		<!--<div class="col-xs-12 none-padding">
			<a class="addCartlink"><button type="submit" class="dashboard-button dashboard-bottom-button your-details-submit addCartButton">Add</button></a>
		</div>
		</form>-->
		<?php $the_form = drupal_get_form('pd_shoppingcart_form',$vars);
			print drupal_render($the_form);	?>
	</div>
	
	</div>
	</div>
	<?php endif; ?>
    <?php if (sizeof($cardsnum["results"])==0): ?>
	<!--<form action="/pd/pd-shopping-cart" method="POST" id="addPaymentCardForm">
	    <input type="hidden" name="addCard" value="1">
		<div class="row">
			<div class="col-lg-12">
				<div class="chevron-select-box">
					<select class="form-control"  name="Cardtype" placeholder="Card type">
					<?php 
						/*$PaymentTypecode  = file_get_contents("sites/all/themes/evolve/json/PaymentType.json");
						$PaymentType=json_decode($PaymentTypecode, true);
						foreach($PaymentType  as $pair => $value){
							echo '<option value="'.$PaymentType[$pair]['ID'].'"';
							if(isset($_SESSION["tempcard"]) && $_SESSION["tempcard"]['Payment-method'] ==$PaymentType[$pair]['ID']) {echo "selected ";}
							echo '> '.$PaymentType[$pair]['Name'].' </option>';
							
						}*/
					?>
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
			<label for="">Name on card:<span class="tipstyle"> *</span></label>
			<input type="text" class="form-control"  name="Cardname" placeholder="Name on card" <?php //if(isset($_SESSION["tempcard"])) echo 'value='.$_SESSION["tempcard"]['CardName'].''; ?>>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
			<label for="">Card number:<span class="tipstyle"> *</span></label>
			<input type="number" class="form-control"  name="Cardnumber" placeholder="Card number" required maxlength="16" <?php //if(isset($_SESSION["tempcard"])) echo 'value='.$_SESSION["tempcard"]['Cardno'].''; ?>>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
			<label for="">Expiry date:<span class="tipstyle"> *</span></label>
			<input type="number" class="form-control"  name="Expirydate" placeholder="mmyy (eg: 0225)" required maxlength="4" <?php //if(isset($_SESSION["tempcard"])) echo 'value='.$_SESSION["tempcard"]['Expiry-date'].''; ?>>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<label for="">CVV:<span class="tipstyle"> *</span></label>
				<input type="number" class="form-control"  name="CCV" placeholder="CVV" <?php //if(isset($_SESSION["tempcard"])) echo 'value='.$_SESSION["tempcard"]['CCV'].''; ?>>
			</div>
			<div class="col-xs-12 tooltip-container top" style="margin-top: 10px;">
				<span class="tooltip-activate">What is this?</span>
				<div class="tooltip-content">
					<h4>What is a Card Verification Number?</h4>
					<span class="tooltip-img"><img src="sites/default/files/general-icon/cvn-image.png"></span>
					<span>For Visa and Mastercard enter the last three digits on the signature strip. For American Express, enter the four digits in small print on the front of the card.</span>
				</div>
			</div>
		</div>
		<!--<div class="col-xs-12 none-padding" style="padding-left: 1px; margin: 5px 0;">
			<input class="styled-checkbox" type="checkbox" id="addcardtag" name="addcardtag" <?php //if(!isset($_SESSION["tempcard"])) {echo 'value="1" checked';} else {echo 'value="0"';} ?>>
			<label for="addcardtag">Do you want to save this card?</label>
		</div>-->
		<!--<div class="col-xs-12 none-padding">
			<a class="addCartlink"><button type="submit" class="dashboard-button dashboard-bottom-button your-details-submit addCartButton">Add</button></a>
		</div>
	</form>	-->
	<div id="addPaymentCardForm">
	<p><span class="sidebardis">Payment Information:</span></p>

	<?php if(sizeof($products)!=0):?>
		<form id="discount" action="pd-shopping-cart" method="POST">
			<input type="text" name="Couponcode" placeholder="Enter discount code" value="">
			<button type="Submit" class="dashboard-button dashboard-bottom-button your-details-submit applyCouponButton">Apply</button>
		</form>
		<span>&nbsp;</span>
	<?php endif; ?>
	<?php $the_form = drupal_get_form('pd_shoppingcart_form',$vars);
	        print drupal_render($the_form);?>
    </div>
	<?php endif; ?>
	
	<?php  if((sizeof($products)!=0) || (sizeof($NGProductsArray)!=0) || (sizeof($FPListArray)!=0)):?>
		<div class="row">
			<div class="col-xs-12"><span class="sidebardis sidebar_heading">PRF donation</span></div>
				<div class="col-xs-12 tooltip-container top">
					<span class="tooltip-activate">What is this?</span>
					<div class="tooltip-content">
						The Physiotherapy Research Foundation (PRF) supports the physiotherapy profession by promoting, encouraging and supporting research that advances physiotherapy knowledge and practice. The PRF aims to boost the careers of new researchers through seeding grants, support research in key areas through tagged grants and encourage academic excellence through university prizes. Give a little, get a lot.
					<br>
						<a href="/reserach/purpose-prf">Tell me more</a>
					</div>
				</div>
			<div class="col-xs-12">
				<input class="styled-checkbox" type="checkbox" id="prftag" name="prftag">
				<label for="prftag" id="prftagAgree">No, I do not want to make a donation to the Physiotherapy Research Foundation</label>
			</div>
			<div class="col-xs-12 col-md-12" id="prfselect">
				<div class="chevron-select-box">
					<select class="form-control" id="PRF" name="PRF">
						<option value="5" selected>$5.00</option>
						<option value="10">$10.00</option>
						<option value="20">$20.00</option>
						<option value="50">$50.00</option>
						<option value="100">$100.00</option>
						<option value="Other">Other</option>
					</select>
				</div>
				<input type="number" class="form-control display-none" id="PRFOther" name="PRFOther" value="" oninput="this.value = Math.abs(this.value)" min="0">
			</div>
		</div>
	<?php endif; ?>
     
	<div class="row ordersummary">
		<div class="col-xs-12">
			<span class="sidebardis sidebar_heading">Your order</span>
		</div>
	</div>
		<div class="flex-container flex-flow-column pd-spcart-order">
			<div class="flex-cell">
                <div class="flex-col-6"><?php echo $i;?> items</div>
                <div class="flex-col-6">$<?php echo $price;?></div>
            </div>
            <?php   if(sizeof($products)!=0):?>
			<div class="flex-cell">
                <div class="flex-col-6">Discount</div>
                <div class="flex-col-6">$<?php echo $discountPrice;?></div>
            </div>
            <?php endif;?>
			<div class="flex-cell">
			    <div class="flex-col-6">GST</div>
				<div class="flex-col-6">$<?php echo $scheduleDetails['GST'];?></div>
			</div>
			<div class="flex-cell">
			    <div class="flex-col-6">PRF</div>
				<div class="flex-col-6">$<span id="prf-donation">0</span></div>
            </div>
            
			<div class="flex-cell">
                <div class="flex-col-6"><b>Total</b> (Inc.GST)</div>
				<input type="hidden" id="totalhidden" value="<?php echo $scheduleDetails['OrderTotal'];?>"/>
                <div class="flex-col-6"><b>$<span id="Amount"></span></b></div>
			</div>
		</div>
		         
		<form action="" method="POST" id="">
			<!--<input type="hidden" name="POSTPRF" id="POSTPRF" value="">-->
			<input type="hidden" name="TandC" id="TandC" value="0">
			<!--<input type="hidden" name="CardUsed" id="CardUsed" value="">-->
			<input type="hidden" name="CouponCode"  value="<?php echo $couponCode; ?>">
			<?php
			if(sizeof($products)!=0){	
				$counterTotal = count($ListProductID);
				$counters = 0;
				foreach($ListProductID as $PIDs) {
					$counters++;
					echo '<input type="hidden" name="PID'.$counters.'" id="PID'.$counters.'" value="'.$PIDs["PID"].'">';
				}
				echo '<input type="hidden" name="total" id="total" value="'.$counterTotal.'">';
			}
			?>
			<?php
			if(sizeof($NGProductsArray)!=0) {
				$ngTotal = count($NGProductsArray);
				$ct = 0;
				foreach($NGProductsArray as $NGP) {
					$ct++;
					echo '<input type="hidden" name="NG'.$ct.'" id="NG'.$ct.'" value="'.$NGP.'">';
				}
				echo '<input type="hidden" name="totalNG" id="totalNG" value="'.$ngTotal.'">';
			}
			?>
			<?php
			if(sizeof($MGProductsArray)!=0) {
				$mgTotal = count($MGProductsArray);
				$mt = 0;
				foreach($MGProductsArray as $MGP) {
					$mt++;
					echo '<input type="hidden" name="MG'.$mt.'" id="MG'.$mt.'" value="'.$MGP.'">';
				}
				echo '<input type="hidden" name="totalMG" id="totalMG" value="'.$mgTotal.'">';
			}
			?>
			<?php if(!$Availability): ?>
				<span class="expired_item_note">Please remove items that are not available to continue with your purchase</span>
			<?php else: ?>
				<a href="javascript:document.getElementById('pd-shoppingcart-form').submit();" class="placeorder" value="Place your order" id="PDPlaceOrder"><span class="dashboard-button dashboard-bottom-button your-details-submit shopCartButton">Place your order</span></a>
			<?php endif; ?>
		</form>
	</div>

<?php endif; ?>
<?php if(sizeof($products)==0 && sizeof($NGProductsArray)==0 && sizeof($FPListArray)==0) : ?>   <div  class="col-xs-12 no-item-title" style="text-align: center"><h3 class="light-lead-heading align-center">There are currently no items in your cart.</h3></div>     
	<div class="col-xs-12  no-item-button">
		<a class="addCartlink" href="pd-search"><button class="dashboard-button dashboard-bottom-button your-details-submit shopCartButton">Continue shopping</button></a>
		<a class="addCartlink" href="../your-details?Goback=PD"><button class="dashboard-button dashboard-bottom-button your-details-submit shopCartButton">Update your details</button></a>
	</div>
<?php endif;?>
<?php 
		$block = block_load('block', '309');
		$get = _block_get_renderable_array(_block_render_blocks(array($block)));
		$output = drupal_render($get);        
		print $output;
?>

</div>
<?php logRecorder();  ?>

<div id="PDTermsWindow" style="display:none;">
	<span class="close-popup"></span>
	<div class="modal-header">
		<h4 class="modal-title">APA events terms and conditions</h4>
	</div>

	<div class="modal-body">
	<span class="note-text" style="display: block">Please scroll down to accept the full APA terms and conditions</span>	
	<h4>Registration:</h4>
<p>Online registration is the simplest way to secure a place at an APA course or event.  If unable to register online for any reason, a <a href="/sites/default/files/PROFESSIONAL DEVELOPMENT/LD039_Event_registration_form_fillable.pdf">manual registration form</a> may be completed and returned to the APA Branch office in the state that the event is being held (<a href="/contact-us">see state office details</a>).</p>
<br />
<p>Registration will not be accepted without payment.  Places are allocated according to the date that an application form and payment are received by the Australian Physiotherapy Association (&lsquo;APA&rsquo;), unless otherwise stated.  (Information concerning remaining places in any event activity does not guarantee a place, as that information is subject to continual change).</p>
<br />
<p>For events (all professional development activities) where the registration fee is greater than AUD$2,000, a payment plan can be adopted as follows:</p>
<ul>
    <li>50% deposit to secure booking</li>
    <li>25% not less than two months prior to the event commencement</li>
    <li>final 25% is required not less than one month prior to the event commencement.</li>
</ul>
<br />
<h4>Confirmation of event proceeding</h4>
<p>The APA will always make best endeavours to proceed with an event as advertised. <strong>Please note however that an event is not confirmed as proceeding</strong> until registrants have <strong>been sent confirmation notification in writing</strong> from the APA. In most cases, registrations close 2 (two) weeks prior to event commencement date and, with the exception of extenuating circumstances, events should be confirmed or cancelled not less than 2 (two) weeks prior to event commencement date. </p>
<br />
<p><span style="text-decoration: underline;">Lectures:</span> Please note that the 2 (two) week registration closing period does not apply to lectures and they are considered as proceeding at the time of registration.  Reminders for lectures are sent in the days prior to the lecture.  If, in the unfortunate event that a lecture needs to be cancelled, registrants will be notified as soon as practicable. </p>
<br />
<p><span style="text-decoration: underline;">Travelling:</span> If a registrant is travelling significant distances or interstate to attend an APA event, we strongly recommend that <strong>travel and accommodation is not booked until the event has been confirmed</strong> as per above. In the instance that an event is cancelled by the APA, registration fees are fully refundable or transferrable to another APA available event, however the APA is not responsible for a participant&rsquo;s other associated expenses with attending an APA event. </p>
<br />
<h4>Cancellation of events by the APA</h4>
<p>The APA reserves the right to cancel or change an event activity to an alternative date. As such:</p>
<ul>
    <li>the APA will notify those who have already registered for that particular event of the cancellation or change of date usually not less than 2 (two) weeks prior the event commencement date.</li>
    <li>in the situation of an event being cancelled or postponed/transferred to an alternative date, registrants will have the option to receive a full refund of their registration fee or transfer the registration fee to another available APA event.</li>
</ul>
<p>Registration cancellation by participant</p>
<ul>
    <li>A participant may substitute their registration to another eligible person at any time.</li>
    <li>A participant may apply for a refund of registration monies paid in line with the following timelines:
    <ul>
        <li><strong>until event registration closing date:</strong> A full refund of registration monies may be honoured</li>
        <li><strong>between the event registration close date and 7 (seven) calendar days prior to the event commencement date:</strong>  A refund of monies paid (less a 20% cancellation fee) may be honoured</li>
        <li><strong>from 7 (seven) calendar days prior to and up to the event commencement date: </strong> No refund of registration monies paid will be provided.  A participant may apply for a refund of registration monies with a supporting Medical Certificate.  Each case will be assessed on its own merits and a refund is not guaranteed.  Where a refund is granted, the APA will withhold 20% of the registration fee paid, as a cancellation fee.  </li>
    </ul>
    </li>
    <li>Participants requesting a transfer or cancellation of their registration, must contact the Professional Development Officer in the state that the event is held.  Transfer and cancellation requests must be received in writing.</li>
</ul>
<br />
<h4>Participant Requirements</h4>

<ul>
    <li>It is the participant&rsquo;s responsibility to ensure they meet any pre-requisites as stated in the PD event outline found on the APA website.</li>
    <li>APA accredited courses are not available to students unless otherwise advertised.  Students are able to register and attend APA lectures and PD events other than courses.  </li>
    <li> The APA requires that all participants hold current professional indemnity insurance that covers their participation in all professional development courses and workshops and other events, particularly those that include practical sessions.</li>
    <li>For participants who are travelling interstate to attend an APA event, the APA suggests considering purchasing appropriate travel insurance (The APA recommend checking the policy terms and conditions to confirm what situations are covered).</li>
    <li>APA membership must be current at the time of an APA event to receive the APA member or group member rates.  </li>
</ul>
<br />
<h4>Photographs/Images/Comments</h4>
<ul>
    <li>By registering for any APA PD event, participants provide consent to the APA to use their comments/responses or any photographs/images taken of them for their publications and associated media and marketing channels; that is, appropriate use only for the everyday business of the APA.  If a participant does not consent, it is their duty to inform the APA in writing.  </li>
    <li>Participants are not permitted to take photos/video recordings of other participants at an APA event (nor share them via social media or other channels) without their direct consent. </li>
</ul>
<br />
<h4>CPD Hours &amp; Confirmation of Attendance</h4>
<p><span style="text-decoration: underline;">Courses, workshops and masterclasses</span></p>
<ul>
    <li>Letters of attendance are provided at the completion of every course, workshop and masterclass.  Replacement copies are available at $25 (includes postage and handling).  </li>
    <li>CPD hours will not be allocated to a member participant until all components of a course have been completed including any pre-course content (online or otherwise) and any post-course content or requirements.</li>
</ul>
<p><span style="text-decoration: underline;">Lectures</span> </p>
<ul>
    <li>Upon attendance at an APA lecture, CPD hours will be allocated to a member participant.  Please note that letters of attendance are not provided for lectures.</li>
</ul>


<h4>Privacy</h4>
<p>The APA acknowledges and respects the privacy of its members and customers.  The information provided by registering for an APA event is &lsquo;personal information&rsquo; as defined by the Privacy Act 1988.  The information is being collected by the APA and will be held by the APA.  It may be given to service providers engaged by the APA.  This information is being collected for the purpose of processing registrations for this event and keeping registrants/participants informed about other upcoming events.  The provision of information is voluntary but if it is not provided the APA may not be able to process registrations.  Registrants/participants have the right to access and alter personal information in accordance with the Australian Privacy Principles and the APA privacy policy, which is available to read at australian.physio. Please direct any enquiries in relation to this matter to our Privacy Officer who can be contacted on 03 9092 0888 or by email at <a href="mailto:privacy@australian.physio">privacy@australian.physio. </a></p>
	</div>

	<div class="modal-footer">
		<a class="disagree-btn" href="" popup-dismiss="PDTermsWindow">Disagree</a>
		<a id="installmentpolicyp" class="agree-btn" href="" popup-dismiss="PDTermsWindow">Agree</a>
	</div>
</div>

<!-- OVERLAY / LOADING SCREEN -->
<div class="overlay">
	<section class="loaders">
		<span class="loader loader-quart">
		</span>   
	</section>
</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
 <!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>

jQuery(document).ready(function(){
	$( function() {
  //$.widget( "custom.iconselectmenu", $.ui.selectmenu, {
    //  _renderItem: function( ul, item ) {
    //    var li = $( "<li>" ),
    //      wrapper = $( "<div>", { text: item.label } );
 
    //    if ( item.disabled ) {
    //      li.addClass( "ui-state-disabled" );
    //    }
 
    //    $( "<span>", {
    //      style: item.element.attr( "data-style" ),
    //      "class": "ui-icon " + item.element.attr( "data-class" )
    //    })
    //      .appendTo( wrapper );
 
     //   return li.append( wrapper ).appendTo( ul );
    //  }
    //});
    //$( "#Paymentcard" )
    //  .iconselectmenu()
    //  .iconselectmenu( "menuWidget" )
    //    .addClass( "ui-menu-icons customicons" );

} );
});
</script>
 <?php else : 
	// when user is not logged in
	?>
		<div class="flex-container" id="non-member">
			<div class="flex-cell">
				<h3 class="light-lead-heading">Please login to see this page.</h3>
			</div>
			<div class="flex-cell cta">
				<a data-target="#loginAT" data-toggle="modal" href="#" class="login">Login</a>
				<a href="/membership-question" class="join">Join now</a>
			</div>

			<?php 
					$block = block_load('block', '309');
					$get = _block_get_renderable_array(_block_render_blocks(array($block)));
					$output = drupal_render($get);        
					print $output;
			?>

		</div>
<?php endif; ?> 