<?php
$creditcard='';
$i=0;
$price=0;
$tag=0;
$products = array();
$localProducts = array();
$pdtype= array("event", "course", "workshop");
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
	
	foreach($NGPostArray as $NG){
		checkShoppingCart($userID=$_SESSION['UserId'], $type="PDNG", $productID=$NG,$coupon = "");
        createShoppingCart($userID, $productID=$NG, $type = "PDNG", $coupon = "");
		//PDShoppingCart($userID=$_SESSION['UserId'], $productID=$NG, $meetingID="",$type="PDNG",$Coupon="");
	}
/***************End Save National Group in PD shopping cart***********/
}

/**
 *  Get National Group products for PD shopping cart
 *  added by jing hu
 */
$NGProductsArray = array(); 
$NGProductsArray = getProduct($userID=$_SESSION['UserId'],$type="PDNG"); 

// 2.2.19 - GET list National Group
// Send - 
// userID
// Response -National Group product
$sendData["UserID"] = $_SESSION['UserId'];
$NGListArray = GetAptifyData("19", $sendData);
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


$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Rkd#!8cd,&ag6e95g9&5192(gb[5g'); 
/*********Delete shopping product from APAserver******/
if(isset($_GET["action"])&&$_GET["action"]=="del"){
	$productID = $_GET['productid'];
	$deltype =  $_GET['type'];
	$shoppingcartDel= $dbt->prepare('DELETE FROM shopping_cart WHERE productID=:productID AND userID=:userID AND type= :type');
	$shoppingcartDel->bindValue(':productID', $productID);
	$shoppingcartDel->bindValue(':userID', $userID);
	$shoppingcartDel->bindValue(':type', $deltype);
	$shoppingcartDel->execute();
	$shoppingcartDel= null;
}

/*********End delete shopping product from APAserver******/
/********Get user shopping product form APA server******/
try {
	$type="PD";
	$shoppingcartGet= $dbt->prepare('SELECT ID, productID, meetingID,coupon FROM shopping_cart WHERE userID= :userID AND type= :type');
	$shoppingcartGet->bindValue(':userID', $userID);
	$shoppingcartGet->bindValue(':type', $type);
	$shoppingcartGet->execute();
	$productList = $shoppingcartGet;
	$shoppingcartGet= null;               
} catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
	die();
}
/********End get user shopping product form APA server******/
/********Get Product details  from Aptify******/
// Eddy's code next 3
$UserID = "";
$PDarray = array();
$PDProductarray = array();
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
	array_push($PDarray, $PDtotalArray);
}
if(sizeof($NGProductsArray)!=0) {
	foreach($NGProductsArray as $singleNG){
		array_push($PDProductarray, $singleNG);
	}
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
	$product = GetAptifyData("30", $RequestCart); //$_SESSON["UserID"]
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
$scheduleDetails = GetAptifyData("47", $postScheduleData);
$price =$scheduleDetails['OrderTotal']-$scheduleDetails['GST'];
//print_r($scheduleDetails);
/********End get Order Total and Schedule Payments  from Aptify******/
if(isset($_POST['addCard']) && $_POST['addCard'] == "1"){
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
	$out = GetAptifyData("15",$postPaymentData); 
	
	if($out["result"]=="Failed"){ echo "Submit unsuccessful, Please check your card details";}
	
} 
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
	$cardsnum = GetAptifyData("12", $test);
	
	   
	
} 
?>
<?php  if((sizeof($products)!=0) || (sizeof($NGProductsArray)!=0)):?>
<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 left-content">
	<?php   if(sizeof($products)!=0):?>
	<h1 class="SectionHeader">Summary of cart</h1>
	<div class="brd-headling">&nbsp;</div>
	
	<div class="flex-container" id="pd-shopping-cart">
	<div class="flex-cell flex-flow-row heading-row">
		<div class="flex-col-3"><span class="table-heading">Product name</span></div>
		<div class="flex-col-3"><span class="table-heading">Date</span></div>
		<div class="flex-col-2 pd-spcart-location"><span class="table-heading">Location</span></div>
		<div class="flex-col-1 pd-spcart-price"><span class="table-heading">Price</span></div>
		<!--<div class="flex-col-2 pd-spcart-wishlist"><span class="table-heading">Action</span></div>-->
		<div class="flex-col-1 pd-spcart-delete"><span class="table-heading">Delete</span></div>
	</div>
	<?php 
		////print_r($products);
		$ListProductID = Array();
		$discountPrice=0;
		foreach($products as $productt){
		$n = 0;
		$pass=$localProducts[$n]['UID'];
		//$arrPID["PID"] = $productt['MeetingID'];
		$arrPID["PID"] = $productt['ProductID'];
		array_push($ListProductID ,$arrPID);
			echo "<div class='flex-cell flex-flow-row'>";
			echo	"<div class='flex-col-3'><span class='mobile-visible'>Product name: </span>".$productt['Title']."</div>";
			$bdate = explode(" ",$productt['Sdate']);
			$edate = explode(" ",$productt['Edate']);
			$t = strtotime($bdate[0]);
			$j = strtotime($edate[0]);
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
			//echo        '<div class="flex-col-2 pd-spcart-wishlist"><a target="_blank" href="pd-wishlist?addWishList&UID='.$pass.'">ADD TO WISHLIST</a></div>';
			echo        '<div class="flex-col-1 pd-spcart-delete"><a target="_self" href="pd-shopping-cart?action=del&type=PD&productid='.$productt['ProductID'].'"><i class="fa fa-times-circle" aria-hidden="true"></i></a></div>';
			echo "</div>";    
			$n=$n+1;
			$i=$i+1;
			//$price=$price+(int)str_replace('$', '', $productt['Pricelist'][0]['Price']);
		if (in_array($productt['Typeofpd'],  $pdtype)){ $tag=1; }
		}
		
		
	?>
	</div>

    <div class="flex-container flex-flow-column">
		<div class="flex-cell">	
			<span class="small-lead-heading">Terms & conditions</span>
		</div>

		<div class="flex-cell">
			<input popup class="styled-checkbox" type="checkbox" id="accept1" <?php if($price!=0) echo " required";?>>
			<label popup-target="PDTermsWindow" id="pd_terms_open" for="accept1">I accept the APA events terms and conditions, including the APA cancellation clause</label>
		</div>

		<?php if($tag==1): ?>
		<div class="flex-cell">
			<input class="styled-checkbox" type="checkbox" id="accept2" <?php if($price!=0) echo " required";?>>
			<label for="accept2">I understand that I must have appropriate Professional Indemnity insurance current on the date/s of any APA course/workshop that I’m registered for.</label>
		</div>

		<?php endif; ?>
		<div class="flex-cell">
			<input class="styled-checkbox" type="checkbox" id="accept3" <?php if($price!=0) echo " required";?>>
			<label for="accept3">I accept that the APA will not reimburse costs associated with travel and/or accommodation if the event is cancelled. The APA recommends travelling participants purchase travel insurance to cover this.</label>
		</div>
	</div>
	<div class="flex-container flex-flow-column">
		<div class="flex-cell">
			<span class="small-lead-heading">Your dietary requirements</span>
		</div>

		<p>Based on your details, we’ve recognised you are:</p>

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
	<?php if(sizeof($NGProductsArray)!=0):?>
    	<div class="flex-container join-apa-final">
		    <h1 class="SectionHeader">National Group Product</h1>
			<div class="flex-cell flex-flow-row table-header">
				<div class="flex-col-8">
					<span class="table-heading">Product name</span>
				</div>
				<div class="flex-col-2">
					<span class="table-heading">Price</span>
				</div>
				
			</div>

    			<?php 
							
				foreach( $NGListArray as $NGArray){
				if(sizeof($NGProductsArray)!=0){
					foreach($NGProductsArray as $NGProduct){
						if($NGProduct == $NGArray['ProductID']){
							echo "<div class='flex-cell flex-flow-row table-cell'>";
							echo "<div class='flex-col-8 title-col'>".$NGArray['ProductName']."</div>";
							echo "<div class='flex-col-2 price-col'>A$".$NGArray['NGprice']."</div>";
							//$price += $NGArray['NGprice'];
							//echo "<div class='flex-col-2 action-col'><a href='jointheapa' target='_self'>delete</a></div>";
							echo "</div>";
						}	  
					}
				}
				}
						                       
				?>
		</div>
	<?php endif; ?>		
</div>


<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 paymentsiderbar">
	<p><span class="sidebardis">Payment Information:</span></p>
	<?php if (sizeof($cardsnum["results"])!=0): ?>
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
						echo 'data-class="'.$cardnum["Payment-Method"].'">Credit card ending with ';
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
		<form action="/pd/pd-shopping-cart" method="POST" >
		<input type="hidden" name="addCard" value="1"/>
		<div class="row">
			<div class="col-lg-12">
				<div class="chevron-select-box">
					<select class="form-control" id="Cardtype" name="Cardtype" placeholder="Card type">
					<?php 
						$PaymentTypecode  = file_get_contents("sites/all/themes/evolve/json/PaymentType.json");
						$PaymentType=json_decode($PaymentTypecode, true);
						foreach($PaymentType  as $pair => $value){
							echo '<option value="'.$PaymentType[$pair]['ID'].'"';
							if(isset($_SESSION["tempcard"]) && $_SESSION["tempcard"]['Payment-method'] ==$PaymentType[$pair]['ID']) {echo "selected ";}
							echo '> '.$PaymentType[$pair]['Name'].' </option>';
							
						}
					?>
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
			<input type="text" class="form-control"  name="Cardname" placeholder="Name on card" <?php //if(isset($_SESSION["tempcard"])) echo 'value='.$_SESSION["tempcard"]['CardName'].''; ?>>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
			<input type="text" class="form-control"  name="Cardnumber" placeholder="Card number" required maxlength="16" <?php //if(isset($_SESSION["tempcard"])) echo 'value='.$_SESSION["tempcard"]['Cardno'].''; ?>>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
			<input type="text" class="form-control"  name="Expirydate" placeholder="Expire date" required maxlength="4" <?php //if(isset($_SESSION["tempcard"])) echo 'value='.$_SESSION["tempcard"]['Expiry-date'].''; ?>>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
			<input type="text" class="form-control"  name="CCV" placeholder="CCV" <?php //if(isset($_SESSION["tempcard"])) echo 'value='.$_SESSION["tempcard"]['CCV'].''; ?>>
			</div>
		</div>
		<!--<div class="col-xs-12 none-padding" style="padding-left: 1px; margin: 5px 0;">
			<input class="styled-checkbox" type="hidden" id="addcardtag" name="addcardtag" <?php //if(!isset($_SESSION["tempcard"])) {echo 'value="1" checked';} else {echo 'value="0"';} ?>>
			<label for="addcardtag">Do you want to save this card?</label>
		</div>-->
		<div class="col-xs-12 none-padding">
			<a target="_blank" class="addCartlink"><button type="submit" class="dashboard-button dashboard-bottom-button your-details-submit addCartButton">Add</button></a>
		</div>
		</form>
	</div>
	</div>
	<?php endif; ?>
    <?php if (sizeof($cardsnum["results"])==0): ?>
	<form action="/pd/pd-shopping-cart" method="POST" >
	    <input type="hidden" name="addCard" value="1">
		<div class="row">
			<div class="col-lg-12">
				<div class="chevron-select-box">
					<select class="form-control"  name="Cardtype" placeholder="Card type">
					<?php 
						$PaymentTypecode  = file_get_contents("sites/all/themes/evolve/json/PaymentType.json");
						$PaymentType=json_decode($PaymentTypecode, true);
						foreach($PaymentType  as $pair => $value){
							echo '<option value="'.$PaymentType[$pair]['ID'].'"';
							if(isset($_SESSION["tempcard"]) && $_SESSION["tempcard"]['Payment-method'] ==$PaymentType[$pair]['ID']) {echo "selected ";}
							echo '> '.$PaymentType[$pair]['Name'].' </option>';
							
						}
					?>
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
			<input type="text" class="form-control"  name="Cardname" placeholder="Name on card" <?php if(isset($_SESSION["tempcard"])) echo 'value='.$_SESSION["tempcard"]['CardName'].''; ?>>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
			<input type="text" class="form-control"  name="Cardnumber" placeholder="Card number" required maxlength="16" <?php if(isset($_SESSION["tempcard"])) echo 'value='.$_SESSION["tempcard"]['Cardno'].''; ?>>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
			<input type="text" class="form-control"  name="Expirydate" placeholder="Expire date" required maxlength="4" <?php if(isset($_SESSION["tempcard"])) echo 'value='.$_SESSION["tempcard"]['Expiry-date'].''; ?>>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
			<input type="text" class="form-control"  name="CCV" placeholder="CCV" <?php if(isset($_SESSION["tempcard"])) echo 'value='.$_SESSION["tempcard"]['CCV'].''; ?>>
			</div>
		</div>
		<!--<div class="col-xs-12 none-padding" style="padding-left: 1px; margin: 5px 0;">
			<input class="styled-checkbox" type="checkbox" id="addcardtag" name="addcardtag" <?php //if(!isset($_SESSION["tempcard"])) {echo 'value="1" checked';} else {echo 'value="0"';} ?>>
			<label for="addcardtag">Do you want to save this card?</label>
		</div>-->
		<div class="col-xs-12 none-padding">
			<a target="_blank" class="addCartlink"><button type="submit" class="dashboard-button dashboard-bottom-button your-details-submit addCartButton">Add</button></a>
		</div>
	</form>	
	<?php endif; ?>
	<?php  if(($productList->rowCount()>0) || (sizeof($NGProductsArray)!=0)):?>
		<div class="row">
			<div class="col-xs-12"><span class="sidebardis">PRF donation</span></div>
			<div class="col-xs-12 col-md-12">
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
				<a style="color: black;" id="PRFDescription">What is this?</a>
			</div>
		</div>
	<?php endif; ?>
	<?php if(sizeof($products)!=0):?><p>
		<form id="discount" action="pd-shopping-cart" method="POST">
			<input type="text" name="Couponcode" placeholder="Enter discount code" value="">
			<button type="Submit" class="dashboard-button dashboard-bottom-button your-details-submit applyCouponButton">Apply</button>
		</form></p><br>
	<?php endif; ?>
     
	<div class="row ordersummary"><div class="col-xs-12"><span class="blue-sidebardis">YOUR ORDER</span></div></div>
		<div class="flex-container flex-flow-column pd-spcart-order">
			<div class="flex-cell">
                <div class="flex-col-6"><?php echo $i;?> items</div>
                <div class="flex-col-6">$<?php echo $price;?></div>
            </div>
            
			<div class="flex-cell">
                <div class="flex-col-6">Discount</div>
                <div class="flex-col-6">$<?php echo $discountPrice;?></div>
            </div>
            
			<div class="flex-cell">
			    <div class="flex-col-6">GST</div>
				<div class="flex-col-6">$<?php echo $scheduleDetails['GST'];?></div>
            </div>
            
			<div class="flex-cell">
                <div class="flex-col-6">Total(Inc.GST)</div>
                <div class="flex-col-6">$<?php echo $scheduleDetails['OrderTotal'];?></div>
			</div>
		</div>
		         
		<form action="/pd/completed-purchase" method="POST">
			<input type="hidden" name="POSTPRF" id="POSTPRF" value="">
			<input type="hidden" name="TandC" id="TandC" value="0">
			<input type="hidden" name="CardUsed" id="CardUsed" value="">
			<input type="hidden" name="CouponCode"  value="<?php echo $couponCode; ?>">
			<?php
				$counterTotal = count($ListProductID);
				$counters = 0;
				foreach($ListProductID as $PIDs) {
					$counters++;
					echo '<input type="hidden" name="PID'.$counters.'" id="PID'.$counters.'" value="'.$PIDs["PID"].'">';
				}
				echo '<input type="hidden" name="total" id="total" value="'.$counterTotal.'">';
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
			<button class="placeorder" type="submit" value="PLACE YOUR ORDER">Place your order</button>
			<!--a target="_blank" class="addCartlink">
				<button class="placeorder" type="submit">PLACE YOUR ORDER</button>
			</a-->
		</form>
	</div>

<?php endif; ?>
<?php if(sizeof($products)==0 && sizeof($NGProductsArray)==0) : ?>   <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align: center"><h3 style="color:black;">You do not have any products in your shopping cart.</h3></div>      <?php endif;?>
<div class="col-xs-12 bottom-buttons">
 <a target="_blank" class="addCartlink" href="pd-search"><button class="dashboard-button dashboard-bottom-button your-details-submit shopCartButton">Continue shopping</button></a>
 <a target="_blank" class="addCartlink" href="../your-details"><button class="dashboard-button dashboard-bottom-button your-details-submit shopCartButton">Update your details</button></a>
</div>
<?php logRecorder();  ?>
<div id="PRFDesPopUp" style="display:none;" class="container">
<p>The Physiotherapy Research Foundation (PRF) supports the physiotherapy profession by promoting, encouraging and supporting research that advances physiotherapy knowledge and practice. The PRF aims to boost the careers of new researchers through seeding grants, support research in key areas through tagged grants and encourage academic excellence through university prizes. Give a little, get a lot. </p>
<p><a href="/reserach/purpose-prf" target="_blank">Tell me more</a></p>
</div>
<div id="PDTermsWindow" style="display:none;">
	<span class="close-popup"></span>
	<div class="modal-header">
		<h4 class="modal-title">APA events terms and conditions</h4>
	</div>

	<div class="modal-body">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<span class="note-text" style="display: block">Please scroll down to accept the full terms and conditions of this guide</span>	
	<h3>Registration</h3>

<p>Online registration is the simplest way to secure your place. Advice concerning remaining places in any event activity does not guarantee a place, as that information is subject to continual change. Registration will not be accepted without payment. Places are allocated according to the date that an application form and payment are received by the Australian Physiotherapy Association (APA), unless otherwise stated.</p>
<br />
<p>The APA reserves the right to cancel or change an event activity to an alternative date. The APA will notify those who have already registered for that particular cancelled event of the cancellation or change of date. In this case, all registered participants will receive a full refund of the event registration fee, should it be required. The APA is not responsible for other associated expenses. Registration is transferable.</p>
<br />
<p>If transferring your registration or if you wish to cancel your registration, please contact the PD Officer in the state that the course is held. Transfer and cancellation requests must be received in writing. Transfers and cancellations may be subject to a fee.</p>
<br />
<p>By registering for this course, you provide consent to the APA to use your comments/responses, or any photographs taken of you, for their publications and associated media and marketing channels. If you do not provide consent, it is your duty to inform the APA in writing.</p>
<br />
<h2>Courses:</h2>
<p>In most cases, course registration closes two weeks prior to the course commencement date. It is the participant&rsquo;s responsibility to ensure that they meet any pre-requisites as stated in the course outline found on the APA website. </p>
<br />
<p>The APA requires that all participants hold current personal professional indemnity insurance for all courses and workshops. We recommend that participants who are travelling interstate to attend an APA event purchase travel insurance. </p>
<br />
<p>Membership must be current at the time of the APA event to receive the APA Member or group member rates. Letters of attendance are provided at the completion of every course. Replacement copies are available at $25 (includes postage and handling). </p>
<br />
<p>APA accredited courses are not available to students unless advertised otherwise. Students are able to register and attend APA lectures and PD events other than courses.</p>
<br />
<h2>Cancellation:</h2>
<p>For APA courses:</p>
<ul>
    <li>a participant may substitute their registration to another person or apply for a refund of monies paid prior to the course registration closing date</li>
    <li>a participant may substitute their registration to another person or apply for a refund of monies paid (less a 20% cancellation fee) between the course registration close date and seven calendar days prior to the course commencement date</li>
    <li>from seven calendar days prior to and up to the course commencement date, a participant may substitute their registration to another person. NO refund will be supplied</li>
    <li>a participant may apply for a refund with a supporting Medical Certificate. Each case will be assessed on its own merits and a refund is not guaranteed. Where a refund is granted, the APA will withhold 20% of the registration fee paid, as cancellation fee.</li>
</ul>
<br />
<h2>Part payments</h2>
<p>Part payments may be offered to APA members for courses over $2000. The payment plan is as follows:</p>
<ul>
    <li>50 per cent is required to secure booking. </li>
    <li>25 per cent is required 2 months prior to the course date, and </li>
    <li>The final 25 per cent is required 1 month prior to course date. </li>
</ul>
<br />
<h2>Australian Physiotherapy Association Privacy Statement for Professional Development Website and Manual Registration Forms:</h2>
<p>The APA acknowledges and respects the privacy of its members and customers. The information that you provide on this form
is &ldquo;personal information&rdquo; as defined by the Privacy Act 1988. The information is being collected by the APA and will be held by the APA. It may be given to service providers engaged by the APA. This information is being collected for the purpose of processing your registration for this event and keeping you informed about other upcoming events. The provision of information is voluntary but if it is not provided the APA may not be able to process your registration. You have the right to access and alter personal information about yourself in accordance with the Australian Privacy Principles and the APA privacy policy which is available for you to read on <a href="http://www.privacy@physiotherapy.asn.au" target="_self">physiotherapy.asn.au</a>. Direct any enquiries you may have in relation to this matter to our Privacy Officer who can be contacted on <strong>03 9092 0888</strong> or by email at <a href="mailto:privacy@physiotherapy.asn.au">privacy@physiotherapy.asn.au</a>.</p>

	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  
		
		<input class="styled-checkbox" type="checkbox" id="installmentpolicyp" checked name="instalmentpolicy"> 
		<label class="apa_policy_button" for="installmentpolicyp">Yes. I’ve read and understand the APA events terms and conditions</label>

	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 display-none warning" id="disagreeInstallmentDescription"> 
         Please agree to the APA events terms and conditions to continue with your purchase
	</div>
	</div>

	<div class="modal-footer">
		<a class="popup-submit" href="" popup-dismiss="PDTermsWindow">Submit</a>
	</div>
</div>

<!-- OVERLAY / LOADING SCREEN -->
<div class="overlay">
	<section class="loaders">
		<span class="loader loader-quart">
			<div class="loading">
				<div class="loading__element">L</div>
				<div class="loading__element">O</div>
				<div class="loading__element">A</div>
				<div class="loading__element">D</div>
				<div class="loading__element">I</div>
				<div class="loading__element">N</div>
				<div class="loading__element">G</div>
			</div>
		</span>   
	</section>
</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
 <!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$( function() {
$.widget( "custom.iconselectmenu", $.ui.selectmenu, {
      _renderItem: function( ul, item ) {
        var li = $( "<li>" ),
          wrapper = $( "<div>", { text: item.label } );
 
        if ( item.disabled ) {
          li.addClass( "ui-state-disabled" );
        }
 
        $( "<span>", {
          style: item.element.attr( "data-style" ),
          "class": "ui-icon " + item.element.attr( "data-class" )
        })
          .appendTo( wrapper );
 
        return li.append( wrapper ).appendTo( ul );
      }
    });
 
 
 
    $( "#Paymentcard" )
      .iconselectmenu()
      .iconselectmenu( "menuWidget" )
        .addClass( "ui-menu-icons customicons" );

	//$("#accept1").change(function() {
	//	if(changeV() == "1") {
	//		$("TandC").val("1");
	//	}
	//});
	$("#accept2").change(function() {
		if(changeV() == "1") {
			$("TandC").val("1");
		}
	});
	$("#accept3").change(function() {
		if(changeV() == "1") {
			$("TandC").val("1");
		}
	});
	
	//function changeV() {
	//	
	//	if($("#accept1").is(":checked")) {
	//		if($("#accept2").is(":checked")) {
	//			if($("#accept3").is(":checked")) {
	//				return "1";
	//			}
	//		}
	//	}
	//}
} );

</script>
  