<?php
//use session: $_SESSION['userID'],$_SESSION["postReviewData"]
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
if(isset($_POST['step2'])) {
	$postPaymentData = array();
	$postReviewData = array();
	//grab payment data
	//use webservice 2.2.15 Add payment method
	//variable includes: userID, Payment-method,Name-on-card,Cardno,Expiry-date,CCV
	if(isset($_POST['addCard']) && $_POST['addCard'] == "1" ){
		if(isset($_SESSION['userID'])){ $postPaymentData['userID'] = $_SESSION['userID']; }
		if(isset($_POST['Cardtype'])){ $postPaymentData['Payment-method'] = $_POST['Cardtype']; }
		if(isset($_POST['Cardname'])){ $postPaymentData['Name-on-card'] = $_POST['Cardname']; }
		if(isset($_POST['Cardnumber'])){ $postPaymentData['Cardno'] = $_POST['Cardnumber']; }
		if(isset($_POST['Expirydate'])){ $postPaymentData['Expiry-date'] = $_POST['Expirydate']; }
		if(isset($_POST['CCV'])){ $postPaymentData['CCV'] = $_POST['CCV']; }
		GetAptifyData("15", $postPaymentData);
	}
	//grab review order data
	//use webservice 2.2.26 Register a new member order
     if(isset($_SESSION['userID'])){ $postReviewData['userID'] = $_SESSION['userID']; } 
	 if(isset($_POST['Paymentoption'])){ $postReviewData['Paymentoption'] = $_POST['Paymentoption']; }
	 if(isset($_POST['PRF'])){ 
	 $postReviewData['PRF'] = $_POST['PRF']; 
	 //save PRF product into APA database function
	 createShoppingCart($userID=$_SESSION['userID'], $productID="PRF", $coupon=$_POST['PRF']);  
	}
	if(isset($_POST['Rollover'])){ $postReviewData['Rollover'] = $_POST['Rollover']; }
	if(isset($_POST['Claim'])){ $postReviewData['Claim'] = $_POST['Claim']; }
	if(isset($_POST['Facts'])){ $postReviewData['Facts'] = $_POST['Facts']; }
	if(isset($_POST['Disciplinary'])){ $postReviewData['Disciplinary'] = $_POST['Disciplinary']; }
	if(isset($_POST['Decline'])){ $postReviewData['Decline'] = $_POST['Decline']; }
	if(isset($_POST['Oneclaim'])){ $postReviewData['Oneclaim'] = $_POST['Oneclaim']; }
	if(isset($_POST['Addtionalquestion']) && $_POST['Addtionalquestion'] == "1"){ 
		$postReviewData['Addtionalquestion'] = $_POST['Addtionalquestion'];
		if(isset($_POST['Yearclaim'])){ $postReviewData['Yearclaim'] = $_POST['Yearclaim']; }
		if(isset($_POST['Nameclaim'])){ $postReviewData['Nameclaim'] = $_POST['Nameclaim']; }
		if(isset($_POST['Fulldescription'])){ $postReviewData['Fulldescription'] = $_POST['Fulldescription']; }
		if(isset($_POST['Amountpaid'])){ $postReviewData['Amountpaid'] = $_POST['Amountpaid']; }
		if(isset($_POST['Finalisedclaim'])){ $postReviewData['Finalisedclaim'] = $_POST['Finalisedclaim']; } 
	}
	else{ $postReviewData['Addtionalquestion'] = "0";}
	if(isset($_POST['Businiessname'])){ $postReviewData['Businiessname'] = $_POST['Businiessname']; }
	 
     
	 //get productID list from local database;
	 function getProductList($userID){
		 $arrayReturn = array();
		 $dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config');
		 //$shoppingcartGet = $dbt->prepare('SELECT * FROM shopping_cart WHERE userID=:userID AND type=:type');
		 $shoppingcartGet = $dbt->prepare('SELECT * FROM shopping_cart WHERE userID=:userID');
		 $shoppingcartGet->bindValue(':userID', $userID);
		 //$shoppingcartGet->bindValue(':type', $type);
		 $shoppingcartGet->execute();
		 if($shoppingcartGet->rowCount()>0) { 
           foreach ($shoppingcartGet as $row) {
		   	array_push($arrayReturn, $row['productID']);
			}
	    }	
	    $shoppingcartGet = null;
        return $arrayReturn;
	}
	
	//use webservice 2.2.31 Get Membership prodcut price
	$prodcutID = getProductList($_SESSION['userID']);
	$postReviewData['productID'] = $prodcutID;
	$products = GetAptifyData("31", $prodcutID);
  
	//store data in the session
	$_SESSION["postReviewData"] =  array();
	$_SESSION["postReviewData"] = $postReviewData;
  }
  if(isset($_POST['Paymentcard']) && $_POST['addCard'] == "0") {
	$usedCard = $_POST['Paymentcard']; 
	//use webservice 2.2.13 update payment method
	$postCard['userID'] = $_SESSION['userID'];
	$postCard['Creditcard-ID'] = $usedCard;
	GetAptifyData("13", $postCard);
  } 
 ?> 
				<form id ="join-review-form" action="joinconfirmation" method="POST">
				 <input type="hidden" name="step3" value="3">
		         <div class="down8" <?php if(isset($_POST['step2']))echo 'style="display:block;"'; else { echo 'style="display:none;"';}?> >
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
								   	 foreach( $products['products'] as $product){
										 echo "<tr>";
										 echo "<td>".$product['ProdcutName']."</td>";
									   	 echo "<td>A$".$product['Price']."</td>";
										 $price += $product['Price'];
										 echo '<td>delete</td>';
									     echo "</tr>";  
                                     }
									if(isset($_POST['PRF'])&& $_POST['PRF']!=""){ echo '<tr><td>Physiotherapy Research Foundation donation</td><td>A$'.$_POST['PRF'].'</td><td>delete</td></tr>'; }
								 ?>
							   </tbody>
						  </table>
		
                  </div>
				  <!--<a class="your-details-prevbutton8"><span class="dashboard-button-name">Last</span></a>-->
					 <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 Membpaymentsiderbar">
					 <p><span class="sidebardis<?php if($price==0) echo " display-none";?>">Payment Information:</span></p>
                <div class="paymentsidecredit <?php if($price==0) echo " display-none";?>"> <fieldset><select  id="Paymentcard" name="Paymentcard" disabled>
                      <?php 
					  //web service 2.2.12 Get payment listing;
					  $cardsnum = GetAptifyData("12", $postPaymentData['userID']);
					  if (sizeof($cardsnum)!=0): ?>   
                            <?php foreach( $cardsnum["paymentcards"] as $cardnum):  ?>
                                 <option value="<?php echo  $cardnum["Digitsnumber"];?>" <?php if($cardnum["Digitsnumber"]==$usedCard) echo "selected"; ?> data-class="<?php echo  $cardnum["Payment-method"];?>">Credit card ending with <?php echo  $cardnum["Digitsnumber"];?></option>
                            <?php endforeach; ?>
                         <?php endif; ?>  
                           </select></fieldset></div>
               				<div class="row ordersummary"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><span>YOUR ORDER</span></div></div>
							   <table>
									<tr>
									  <td>Sub total (Inc. GST)</td>
									  <td>A$<?php echo $price;?></td>
								   </tr>
								   <?php 
								   if(isset($_POST['PRF'])&& $_POST['PRF']!=""){ echo '<tr><td>PRF donation</td><td>A$'.$_POST['PRF'].'</td></tr>'; }
								   ?>
									 <tr>
									  <td>Total(Inc.GST)</td>
									  <td>A$<?php echo $price;?></td>
								   </tr>
						   </table>
					<a target="_blank" class="addCartlink"><button class="placeorder" type="submit">PLACE YOUR ORDER</button></a>
				</div>
         
				  </div>
		  </form>