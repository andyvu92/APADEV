<?php
if(!function_exists('drupal_session_started'))
{
  die("Unauthorized Access");
}
?>
<?php
$NGProductsArray = Array();
foreach($_POST as $key => $value){
	array_push($NGProductsArray,$key);
}

// 2.2.19 - GET list National Group
// Send - 
// userID
// Response -National Group product
$sendData["UserID"] = $_SESSION['UserId'];
$NGListArray = aptify_get_GetAptifyData("19", $sendData);
// 2.2.12 - Get payment list
// Send - 
// UserID 
// Response -payment card list
$cardData['id'] = $_SESSION["UserId"];
$cardsnum = aptify_get_GetAptifyData("12", $cardData);
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
$postScheduleData['productID'] = $NGProductsArray;
$postScheduleData['CampaignCode'] = "";
$scheduleDetails = aptify_get_GetAptifyData("47", $postScheduleData);

 ?> 
<form action="" method="POST">
	<input type="hidden" name="step3" value="3">
	<div>
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
			<div class="flex-container join-apa-final">
				<div class="flex-cell flex-flow-row table-header">
					<div class="flex-col-8">
						<span class="table-heading">Product name</span>
					</div>
					<div class="flex-col-2">
						<span class="table-heading">Price</span>
					</div>
					
				</div>

    			<?php 
						$price = "";
						
						foreach( $NGListArray as $NGArray){
						if(sizeof($NGProductsArray)!=0){
						    foreach($NGProductsArray as $NGProduct){
								if($NGProduct == $NGArray['ProductID']){
									echo "<div class='flex-cell flex-flow-row table-cell'>";
									echo "<div class='flex-col-8 title-col'>".$NGArray['ProductName']."</div>";
									echo "<div class='flex-col-2 price-col'>A$".$NGArray['NGprice']."</div>";
									$price += $NGArray['NGprice'];
									//echo "<div class='flex-col-2 action-col'><a href='jointheapa' target='_self'>delete</a></div>";
									echo "</div>";
								}	  
							}
						}
						}
						                       
				?>
			</div>
		</div>
	<!--<a class="your-details-prevbutton8"><span class="dashboard-button-name">Last</span></a>-->
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 Membpaymentsiderbar">
		<p><span class="sidebardis<?php if($price==0) echo " display-none";?>">Payment Information:</span></p>
		<div class="paymentsidecredit <?php if($price==0) echo " display-none";?>"> 
		<?php if ((sizeof($cardsnum["results"])!=0)): ?>   
			<fieldset>
				<select  id="Paymentcard" name="Paymentcard" readonly>
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
		<?php endif; ?>  
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
				<input type="text" class="form-control" id="CCV" name="CCV" placeholder="CCV">
			</div>
		</div>
		<div class="col-xs-12">
			<input class="styled-checkbox" type="checkbox" id="addcardtag" name="addcardtag" value="1" checked><label for="addcardtag">Do you want to save this card</label></div>
			<input type="hidden" name="addCard" value="0">
		</div>
		</div>
			<div class="flex-container flex-flow-column">

				<div class="flex-cell ordersummary">
					<span>YOUR ORDER</span>
				</div>

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
		
				<div class="flex-cell flex-flow-row">
					<div class="flex-col-12">
					</div>
				</div>					
			</div>
			
			<div class="flex-col-12" style="text-align: center">
				<a class="addCartlink"><button style="margin-top: 30px;" class="placeorder" type="submit">PLACE YOUR ORDER</button></a>
			</div>	
	</div>
	</div>
</form>
	

<!--  this part will be merged with Andy's Dashboard less file-->

<!--  this part will be merged with Andy's Dashboard less file-->	
<?php logRecorder();  ?>