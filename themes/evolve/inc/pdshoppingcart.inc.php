<?php
$creditcard='';
$i=0;
$price=0;
$tag=0;
$products = array();
$localProducts = array();
$pdtype= array("event", "course", "workshop");
$type = "PD";
$userID = $_SESSION['UserId'];

/***************get userinfo from Aptify******************/
$userInfo_json = '{ 
	"Dietary":["Shellfish","Eggs","Lactose"]
}';
$userInfo= json_decode($userInfo_json, true);	
$Dietary = $userInfo['Dietary'];
/****************End get userinfo from Aptify************/

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
	$shoppingcartGet= $dbt->prepare('SELECT ID, productID, coupon FROM shopping_cart WHERE userID= :userID AND type= :type');
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
foreach ($productList as $productDetail){
	$productID = $productDetail['productID'];
	$coupon =  $productDetail['coupon'];
	$UID = $productDetail['ID'];
	$Lproduct = array('UID'=>$UID,'ProductID' =>$productID, 'coupon' =>$coupon);
	array_push($localProducts, $Lproduct);
	
	// Eddy's code next 3
	
	$PDtotalArray["PDid"] = $Lproduct['ProductID'];
	$UserID = $productDetail['ID'];
	$PDtotalArray["Coupon"] = $Lproduct['coupon'];
	array_push($PDarray, $PDtotalArray);
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

/********End get Product details  from Aptify******/

if(isset($_SESSION["UserId"])){
    
	$userid = $_SESSION["UserId"];
	
	if(isset($_SESSION["cardsnum"])){
		$cardsnum = $_SESSION["cardsnum"];
	} else {
		// 2.2.12 - GET payment listing
		// Send - 
		// UserID
		// Response -
		// Credit cards details [Credit card ID, Payment-method,
		// Name on card, Digits, Exp date, Roll over],  Main card
		
		$test['id'] = $_SESSION["UserId"];
		$cardsnum = GetAptifyData("12", $test);
	    $_SESSION["cardsnum"]= $cardsnum;
	}
	print_r($cardsnum);
	
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

<?php   if($productList->rowCount()>0):?>
<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
	<h1 class="SectionHeader">Summary of cart</h1>
	<div class="brd-headling">&nbsp;</div>
	<table>
	<tbody>
	<tr>
		<th>Product name</th>
		<th>Date</th>
		<th>Location</th>
		<th>Price</th>
		<th>Action</th>
		<th>Delete</th>
	</tr>
	<?php 
		//print_r($products);
		$ListProductID = Array();
		foreach($products as $productt){
		$n = 0;
		$pass=$localProducts[$n]['UID'];
		$arrPID["PID"] = $productt['ProductID'];
		array_push($ListProductID ,$arrPID);
			echo "<tr>";
			echo	"<td>".$productt['Title']."</td>";
			echo	"<td>".$productt['Sdate']."-".$productt['Edate']."</td>";
			echo	"<td>".$productt['Location']["City"].", ".$productt['Location']["State"]."</td>";
			if($_SESSION['MemberTypeID'] == "1" || $_SESSION['MemberTypeID'] == 1) {
				echo	"<td>".$productt['Pricelist'][1]['Price']."</td>";
			} else {
				echo	"<td>".$productt['Pricelist'][0]['Price']."</td>";
			}
			echo        '<td><a target="_blank" href="pd-wishlist?addWishList&UID='.$pass.'">ADD TO WISHLIST</a></td>';
			echo        '<td><a target="_self" href="pd-shopping-cart?action=del&type=PD&productid='.$productt['ProductID'].'"><i class="fa fa-times-circle fa-2x" aria-hidden="true"></i></a></td>';
			echo "</tr>";    
			$n=$n+1;
			$i=$i+1;
			$price=$price+(int)str_replace('$', '', $productt['Pricelist'][0]['Price']);
		if (in_array($productt['Typeofpd'],  $pdtype)){ $tag=1; }
		}
	?>
	</tbody>
	</table>
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 scleft <?php if($price==0) echo " display-none";?>">
		<p>Terms & conditions</p>
		<p><label for="accept1">I accept the APA events terms and conditions including the APA cancellation clause</label><input type="checkbox" id="accept1" <?php if($price!=0) echo " required";?>></p>
		<?php if($tag==1): ?>
		<p><label for="accept2">I understand that I must have appropriate Professional Indemnity insurance current on the date/s of any APA course/workshop that I’m registered for.</label><input type="checkbox" id="accept2" <?php if($price!=0) echo " required";?>></p>
		<?php endif; ?>
		<p><label for="accept3">I accept that the APA will not reimburse costs associated with travel and/or accommodation if the event is cancelled. The APA recommends travelling participants purchase travel insurance to cover this.</label><input type="checkbox" id="accept3" <?php if($price!=0) echo " required";?>></p>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 scright<?php if(($price==0)) echo " display-none";?>">
		<p>Your dietary requirements</p>
		<p>Based on your details, we’ve recognised you are:</p>
		<p style=" border: 1px solid #004250; padding: 5px 0;"><?php if(sizeof($Dietary)>0) {foreach($Dietary as $item) {echo $item.'&nbsp;';} }  else { echo "None";}?></p>
		<p>Please note that not all APA PD events include catering.</p>
	</div>

</div>
<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 paymentsiderbar">
	<p><span class="sidebardis<?php if($price==0) echo " display-none";?>">Payment Information:</span></p>
		<div class="paymentsidecredit <?php if($price==0) echo " display-none";?>"> 
		<fieldset><select  id="Paymentcard" name="Paymentcard">
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
		</select></fieldset></div>
<?php endif; ?>
	<div class="paymentsideuse <?php if($price==0) echo " display-none";?>"><input type="checkbox" id="anothercard"><label for="anothercard"><a class="event10" style="cursor: pointer;">Use another card</a></label>
	<div class="down10" style="display:none;">
		<form action="pd-shopping-cart?action=addcard" method="POST" id="formaddcard">
		<div class="row">
			<div class="col-lg-12">
			<select class="form-control" id="Cardtype" name="Cardtype" placeholder="Card type">
			<?php 
				$PaymentTypecode  = file_get_contents("sites/all/themes/evolve/json/PaymentType.json");
				$PaymentType=json_decode($PaymentTypecode, true);
				foreach($PaymentType  as $pair => $value){
					echo '<option value="'.$PaymentType[$pair]['Name'].'"';
					echo '> '.$PaymentType[$pair]['Name'].' </option>';
					
				}
			?>
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
			<input type="text" class="form-control" id="Cardnumber" name="Cardnumber" placeholder="Card number" required maxlength="16">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
			<input type="text" class="form-control" id="Expirydate" name="Expirydate" placeholder="Expire date" required maxlength="4">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
			<input type="text" class="form-control" id="CCV" name="CCV" placeholder="CCV">
			</div>
		</div>
		<div class="row"><label for="addcardtag">Do you want to save this card</label><input type="checkbox" id="addcardtag" name="addcardtag" value="1" checked></div>
		<div class="row">
			<a target="_blank" class="addCartlink"><button type="submit" class="dashboard-button dashboard-bottom-button your-details-submit addCartButton">Add</button></a>
		</div>
		</form>
	</div>
	</div>
		<?php if($productList->rowCount()>0): ?>      
		<div class="row ordersummary"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><span>YOUR ORDER</span></div></div>
		<table>
			<tr>
			<td><?php echo $i;?> items</td>
			<td>A$<?php echo $price;?></td>
			</tr>
			<tr>
			<td>Discount</td>
			<td>A$0.00</td>
			</tr>
			<tr>
			<td>Total(Inc.GST)</td>
			<td>A$<?php echo $price;?></td>
			</tr>
		</table>
		         
		<form action="/pd/completed-purchase" method="POST">
			<input type="hidden" name="PRF" id="PRF" value="test">
			<input type="hidden" name="TandC" id="TandC" value="0">
			<input type="hidden" name="CardUsed" id="CardUsed" value="0">
			<?php
				$counterTotal = count($ListProductID);
				$counters = 0;
				foreach($ListProductID as $PIDs) {
					$counters++;
					echo '<input type="hidden" name="PID'.$counters.'" id="PID'.$counters.'" value="'.$PIDs["PID"].'">';
				}
				echo '<input type="hidden" name="total" id="total" value="'.$counterTotal.'">';
			?>
			
			<input class="placeorder" type="submit" value="PLACE YOUR ORDER">
			<!--a target="_blank" class="addCartlink">
				<button class="placeorder" type="submit">PLACE YOUR ORDER</button>
			</a-->
		</form>
</div>
<?php endif; ?>
<?php if($productList->rowCount()==0): ?>   <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><h3 style="color:black;">You don not have any products in your shopping cart.</h3></div>      <?php endif;?>
<div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
 <a target="_blank" class="addCartlink" href="pd-search"><button class="dashboard-button dashboard-bottom-button your-details-submit shopCartButton">Continue shopping</button></a>
 <a target="_blank" class="addCartlink" href="../your-details"><button class="dashboard-button dashboard-bottom-button your-details-submit shopCartButton">Update my details</button></a>
</div>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
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
		$("#CardUsed").val($("#Paymentcard").val());
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
  