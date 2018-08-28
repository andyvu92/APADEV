<?php if(isset($_SESSION["UserId"])) : ?>

<?php
if(isset($_POST["POSTPRF"])) {
	$OrderSend['userID'] = $_SESSION["UserId"];
	$OrderSend['InsuranceApplied'] = 0;
	$OrderSend['Paymentoption'] = 0;
	$OrderSend['InstallmentFor'] = "Membership";
	$OrderSend['InstallmentFrequency'] = "";
	$OrderSend['CampaignCode'] = "";
	if(isset($_POST['anothercard'])){
		$OrderSend['PaymentTypeID'] = $_POST['Cardtype'];
		$OrderSend['CCNumber'] = $_POST['Cardnumber'];
		$OrderSend['CCExpireDate'] = $_POST['Expirydate'];
		$OrderSend['CCSecurityNumber'] = $_POST['CCV'];
		$OrderSend['Card_number'] = "";	
	}
	else{
		$OrderSend["Card_number"] = $_POST["Paymentcard"];
	}
	if($_POST["PRF"]=="Other") {$OrderSend['PRFdonation'] = $_POST["PRFOther"];} 
	else {$OrderSend['PRFdonation']=$_POST["PRF"];}
	$OrderSend['productID'] = array();
	$registerOuts = GetAptifyData("26", $OrderSend);
	
	$invoice_ID = $registerOuts['Invoice_ID'];
	//if(isset($_POST['addcardtag'])){
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
		
	//}
	
}
$test['id'] = $_SESSION["UserId"];
$cardsnum = GetAptifyData("12", $test);
  	
?>
<?php 

if(isset($registerOuts['Invoice_ID']) && $registerOuts['Invoice_ID']!="0"):
$apis[0] = $invoice_ID;
$invoiceAPI = GetAptifyData("18", $apis);
?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<a class="download-link" data-toggle="modal" data-target="#Iaksbnkvoice"><span class="invoice-icon"></span><span class="invoice-text">Download Invoice</span></a>
<p>A copy will be sent to your inbox and stored in your new dashboard</p>
</div>
<?php endif;?>
<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 paymentsiderbar">
<form action="" method="POST" style="width:100%;">
	<input type="hidden" name="POSTPRF" id="POSTPRF">

	<p><span class="sidebardis">Payment Information:</span></p>
		<?php if (sizeof($cardsnum["results"])!=0): ?>  
		<div class="row">
			<div class="col-xs-12 col-sm-6">					
				<fieldset>
					<select id="Paymentcard" name="Paymentcard">
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
				</fieldset>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-sm-6">
				<input class="styled-checkbox" type="checkbox" id="anothercard">
				<label for="anothercard">Use another card</label>
			</div>
		</div> 

		<div id="anothercardBlock" style="margin: 0; padding:0" class="display-none col-xs-12">
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-3">
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
			<div class="col-xs-12 col-sm-6">
				<input type="text" class="form-control" id="Cardname" name="Cardname" placeholder="Name on card">
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-md-6">
				<input type="text" class="form-control" id="Cardnumber" name="Cardnumber" placeholder="Card number" maxlength="16">
			</div>

			<div class="col-xs-6 col-md-3">
				<input type="text" class="form-control" id="Expirydate" name="Expirydate" placeholder="mmyy(eg:0225)" maxlength="4">
			</div>

			<div class="col-xs-6 col-md-3">
				<input type="text" class="form-control" id="CCV" name="CCV" placeholder="CVV">
			</div>
		</div>
		<div class="col-xs-12">
			<input class="styled-checkbox" type="checkbox" id="addcardtag" name="addcardtag" value="1" checked><label for="addcardtag">Do you want to save this card</label></div>
			<input type="hidden" name="addCard" value="0">
		</div>
	<?php endif; ?>  
	<?php if (sizeof($cardsnum["results"])==0): ?> 
	<div id="anothercardBlock" class="row">				   
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-3">
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
			<div class="col-xs-12 col-sm-6">
				<input type="text" class="form-control" id="Cardname" name="Cardname" placeholder="Name on card">
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-md-6">
				<input type="text" class="form-control" id="Cardnumber" name="Cardnumber" placeholder="Card number" maxlength="16">
			</div>

			<div class="col-xs-6 col-md-3">
				<input type="text" class="form-control" id="Expirydate" name="Expirydate" placeholder="mmyy(eg:0225)" maxlength="4">
			</div>

			<div class="col-xs-6 col-md-3">
				<input type="text" class="form-control" id="CCV" name="CCV" placeholder="CVV">
			</div>
		</div>
		<div class="col-xs-12">
			<input class="styled-checkbox" type="checkbox" id="addcardtag" name="addcardtag" value="1" checked><label for="addcardtag">Do you want to save this card</label>
			<input type="hidden" name="addCard" value="1">
		</div>

	</div>
	<?php endif; ?>  
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
		
			
			<input class="placeorder" type="submit" value="Purchase PRF">
		

</form>
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
	
} );

</script>

<div id="Iaksbnkvoice" class="modal fade big-screen" role="dialog">
	<div class="modal-dialog">

	<!-- Modal content-->
	<div class="modal-content">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>
		<div class="modal-body">
		<iframe name="stsIaksbnkvoice" src="http://www.physiotherapy.asn.au"></iframe>
		</div>
		<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</div>

	</div>
</div>

<style type="text/css">
	.big-screen {
		width: 62%;
		margin: auto;
		min-width: 1190px;
	}
	.big-screen .modal-dialog, .big-screen .modal-dialog .modal-content, .big-screen .modal-dialog .modal-content .modal-body, .big-screen iframe {
		width: 100%;
		height: 100%;
	}
</style> 
<script>
$(document).ready(function() {
	if (window.frames["Iaksbnkvoice"] && !window.userSet) {
		window.userSet = true;
		frames['stsIaksbnkvoice'].location.href="<?php if(isset($invoiceAPI)) {echo $invoiceAPI[0]; }?>";
	}
});
</script>
 <?php else : 
	// todo
	// add log-in button with message - you must be logged in
	?>
<p>please log-in to use this page</p>
<?php endif; ?>