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


$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config'); 
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
$RequestCart["userID"] = $_SESSION["UserId"];
$RequestCart["MeetingCoupons"] = $PDarray;
$product = GetAptifyData("30", $RequestCart); //$_SESSON["UserID"]
$products = $product["MeetingDetails"];
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
if(isset($_SESSION["UserId"])){
    
	$userid = $_SESSION["UserId"];
	
	//if(isset($_SESSION["cardsnum"])){
		//$cardsnum = $_SESSION["cardsnum"];
	//} else {
		// 2.2.12 - GET payment listing
		// Send - 
		// UserID
		// Response -
		// Credit cards details [Credit card ID, Payment-method,
		// Name on card, Digits, Exp date, Roll over],  Main card
		
		$test['id'] = $_SESSION["UserId"];
		//print_r($test['id']);
		$cardsnum = GetAptifyData("12", $test);
	    //$_SESSION["cardsnum"]= $cardsnum;
	//}
	//print_r($cardsnum);
	
	if(isset($_GET["action"])&& ($_GET["action"]=="addcard")&& isset($_POST['addcardtag'])) {
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
	} 
    if(isset($_GET["action"])&& ($_GET["action"]=="addcard")&& !isset($_POST['addcardtag'])) {
	    $tempcard = array();
		$tempcard['Payment-method'] = $_POST['Cardtype'];
		$tempcard['Cardno'] = $_POST['Cardnumber'];
		$tempcard['CardName'] = $_POST['Cardname'];
		$tempcard['Expiry-date'] = $_POST['Expirydate']; 
		$tempcard['CCV'] = $_POST['CCV'];
		$_SESSION['tempcard'] = $tempcard;
		
	}	
	/* $cardnum=substr( $creditcard,-4);  */
	/*  Get shopping cart data via $user from Aptify  */         
} //else {
	//$product_id = $_GET["id"];
	//header("Location:/sign-in?id=$product_id"); /* Redirect browser */
//}
?>
<?php  if(($productList->rowCount()>0) || (sizeof($NGProductsArray)!=0)):?>
<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 left-content">
	<?php   if($productList->rowCount()>0):?>
	<h1 class="SectionHeader">Summary of cart</h1>
	<div class="brd-headling">&nbsp;</div>
	
	<div class="flex-container" id="pd-shopping-cart">
	<div class="flex-cell flex-flow-row heading-row">
		<div class="flex-col-3"><span class="table-heading">Product name</span></div>
		<div class="flex-col-3"><span class="table-heading">Date</span></div>
		<div class="flex-col-2 pd-spcart-location"><span class="table-heading">Location</span></div>
		<div class="flex-col-1 pd-spcart-price"><span class="table-heading">Price</span></div>
		<div class="flex-col-2 pd-spcart-wishlist"><span class="table-heading">Action</span></div>
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
				echo	"<div class='flex-col-1 pd-spcart-price'><span class='mobile-visible'>Price: </span>".number_format($pd_detail['Product Cost With Coupon'],2)."</div>";
			}
			else{
				echo	"<div class='flex-col-1 pd-spcart-price'><span class='mobile-visible'>Price: </span>".number_format($pd_detail['Product Cost Without Coupon'],2)."</div>";
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
			echo        '<div class="flex-col-2 pd-spcart-wishlist"><a target="_blank" href="pd-wishlist?addWishList&UID='.$pass.'">ADD TO WISHLIST</a></div>';
			echo        '<div class="flex-col-1 pd-spcart-delete"><a target="_self" href="pd-shopping-cart?action=del&type=PD&productid='.$productt['ProductID'].'"><i class="fa fa-times-circle" aria-hidden="true"></i></a></div>';
			echo "</div>";    
			$n=$n+1;
			$i=$i+1;
			//$price=$price+(int)str_replace('$', '', $productt['Pricelist'][0]['Price']);
		if (in_array($productt['Typeofpd'],  $pdtype)){ $tag=1; }
		}
		
		
	?>
	</div>

    <div class="flex-container flex-flow-column <?php if($price==0) echo " display-none";?>">
		<div class="flex-cell">	
			<span class="small-lead-heading">Terms & conditions</span>
		</div>

		<div class="flex-cell">
			<input class="styled-checkbox" type="checkbox" id="accept1" <?php if($price!=0) echo " required";?>>
			<label for="accept1">I accept the APA events terms and conditions including the APA cancellation clause</label>
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
	<div class="flex-container flex-flow-column <?php if(($price==0)) echo " display-none";?>">
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
		
		<span class="note-text">Please note that not all APA PD events include catering.</span>
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
<?php endif; ?>	
<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 paymentsiderbar">
	<p><span class="sidebardis<?php if($price==0) echo " display-none";?>">Payment Information:</span></p>
		<div class="paymentsidecredit <?php if($price==0) echo " display-none";?>"> 
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


	<div class="paymentsideuse <?php if($price==0) echo " display-none";?>">
	
	<div class="col-xs-12 none-padding" style="margin: 5px 0;">
		<input class="styled-checkbox" type="checkbox" id="anothercard">
		<label for="anothercard"><a class="event10" style="cursor: pointer;">Use another card</a></label>
	</div>

	<div class="down10" <?php if(isset($_SESSION["tempcard"])){ echo 'style="display:block;"';} else { echo 'style="display:none;"';}?>>
		<form action="pd-shopping-cart?action=addcard" method="POST" id="formaddcard">
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
			<input type="text" class="form-control" id="Cardname" name="Cardname" placeholder="Name on card" <?php if(isset($_SESSION["tempcard"])) echo 'value='.$_SESSION["tempcard"]['CardName'].''; ?>>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
			<input type="text" class="form-control" id="Cardnumber" name="Cardnumber" placeholder="Card number" required maxlength="16" <?php if(isset($_SESSION["tempcard"])) echo 'value='.$_SESSION["tempcard"]['Cardno'].''; ?>>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
			<input type="text" class="form-control" id="Expirydate" name="Expirydate" placeholder="Expire date" required maxlength="4" <?php if(isset($_SESSION["tempcard"])) echo 'value='.$_SESSION["tempcard"]['Expiry-date'].''; ?>>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
			<input type="text" class="form-control" id="CCV" name="CCV" placeholder="CCV" <?php if(isset($_SESSION["tempcard"])) echo 'value='.$_SESSION["tempcard"]['CCV'].''; ?>>
			</div>
		</div>
		<div class="col-xs-12 none-padding" style="pading-left: 1px; margin: 5px 0;">
			<input class="styled-checkbox" type="checkbox" id="addcardtag" name="addcardtag" <?php if(!isset($_SESSION["tempcard"])) {echo 'value="1" checked';} else {echo 'value="0"';} ?>>
			<label for="addcardtag">Do you want to save this card?</label>
		</div>
		<div class="col-xs-12 none-padding">
			<a target="_blank" class="addCartlink"><button type="submit" class="dashboard-button dashboard-bottom-button your-details-submit addCartButton">Add</button></a>
		</div>
		</form>
	</div>
	</div>
	<?php  if(($productList->rowCount()>0) && (sizeof($NGProductsArray)!=0)):?>
		<div class="row">
			<div class="col-xs-12"><span class="sidebardis">PRF donation</span></div>
			<div class="col-xs-12 col-md-12">
				<div class="chevron-select-box">
					<select class="form-control" id="PRF" name="PRF">
						<option value="10" selected>$10.00</option>
						<option value="20">$20.00</option>
						<option value="50">$50.00</option>
						<option value="100">$100.00</option>
						<option value="Other">Other</option>
					</select>
				</div>
				<input type="number" class="form-control display-none" id="PRFOther" name="PRFOther" value="">
				<a style="color: black;" id="PRFDescription">What is this?</a>
			</div>
		</div>
	<?php endif; ?>
	<?php if(isset($_SESSION["UserId"]) && $productList->rowCount()>0):?><p>
		<form id="discount" action="pd-shopping-cart" method="POST">
			<input type="text" name="Couponcode" placeholder="Enter discount code" value="">
			<button type="Submit" class="dashboard-button dashboard-bottom-button your-details-submit applyCouponButton">Apply</button>
		</form></p><br>
	<?php endif; ?>
		<?php if($productList->rowCount()>0 || sizeof($NGProductsArray)!=0 ): ?>      
		<div class="row ordersummary"><div class="col-xs-12"><span class="blue-sidebardis">YOUR ORDER</span></div></div>
		<div class="flex-container flex-flow-column pd-spcart-order">
			<div class="flex-cell">
                <div class="flex-col-6"><?php echo $i;?> items</div>
                <div class="flex-col-6">A$<?php echo $price;?></div>
            </div>
            
			<div class="flex-cell">
                <div class="flex-col-6">Discount</div>
                <div class="flex-col-6">A$<?php echo $discountPrice;?></div>
            </div>
            
			<div class="flex-cell">
			    <div class="flex-col-6">GST</div>
				<div class="flex-col-6">A$<?php echo $scheduleDetails['GST'];?></div>
            </div>
            
			<div class="flex-cell">
                <div class="flex-col-6">Total(Inc.GST)</div>
                <div class="flex-col-6">A$<?php echo $scheduleDetails['OrderTotal'];?></div>
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
			<input class="placeorder" type="submit" value="PLACE YOUR ORDER">
			<!--a target="_blank" class="addCartlink">
				<button class="placeorder" type="submit">PLACE YOUR ORDER</button>
			</a-->
		</form>
</div>
<?php endif; ?>
<?php if($productList->rowCount()==0 && sizeof($NGProductsArray)==0) : ?>   <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align: center"><h3 style="color:black;">You do not have any products in your shopping cart.</h3></div>      <?php endif;?>
<div class="col-xs-12 bottom-buttons">
 <a target="_blank" class="addCartlink" href="pd-search"><button class="dashboard-button dashboard-bottom-button your-details-submit shopCartButton">Continue shopping</button></a>
 <a target="_blank" class="addCartlink" href="../your-details"><button class="dashboard-button dashboard-bottom-button your-details-submit shopCartButton">Update my details</button></a>
</div>
<?php logRecorder();  ?>
<div id="PRFDesPopUp" style="display:none;" class="container">
<p>The Physiotherapy Research Foundation (PRF) supports the physiotherapy profession by promoting, encouraging and supporting research that advances physiotherapy knowledge and practice. The PRF aims to boost the careers of new researchers through seeding grants, support research in key areas through tagged grants and encourage academic excellence through university prizes. Give a little, get a lot. </p>
<p><a href="/reserach/purpose-prf" target="_blank">Tell me more</a></p>
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

	$("#accept1").change(function() {
		if(changeV() == "1") {
			$("TandC").val("1");
		}
	});
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
	
	function changeV() {
		
		if($("#accept1").is(":checked")) {
			if($("#accept2").is(":checked")) {
				if($("#accept3").is(":checked")) {
					return "1";
				}
			}
		}
	}
} );

</script>
  