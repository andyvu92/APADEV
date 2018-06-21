<?php
/* Entire website's PHP functions will be here  */


/*Dashboard page render national icons fuction*/
/*Dashboard page*/

function nationalIcons(){
/*
   $nationalIcons = array(
             array("AcuPunctureNeedling","APN"),
             array("Animal","ANI"),
             array("Aquatic","AQA"),
             array("Cardio","CAR"),
             array("CancerPalliaLymp","CAN"),
             array("Disability","DIS"),
             array("Education","EDU"),
             array("Gerontology","GEN"),
             array("Musculoskeletal","MUS"),
             array("Neurology","NEU"),
             array("OccupationalHealth","OCC"),
             array("Paediatric","PAE"),
             array("Sport","SPT"),
             array("WomenMenPelvic","PEL"),
             array("Student","STU"),
             array("LeadershipManagement","LED"),
             array("Rural","RUL"),
             array("Business","BUS"),
             array("EmergencyDepartment","EMG"),
             array("MentalHealth","MEN"),
             array("Pain","PAN"),
             array("Orthopaedic","ORT"),
         ); 
		*/
		// 2.2.20 - GET list of subscribed National Group
		// Send - 
		// Request, User ID
		// Response -
		// National Group ID, National Group title
		//$sendData["RequestNG"] = "RequestNG";
		$sendData["UserID"] = $_SESSION['UserId'];
		$nationalGroups = GetAptifyData("20", $sendData);
		
		//$userIcons = array(0,1,2 ,3,3,5,6,7);
		$NGs = $nationalGroups["results"];
		
        $length = sizeof($NGs);		
	    $k =0;
	    for($i=0; $i<$length/4; $i++){
			if($i==0){
					echo "<div class='item active'>";
				
					}
					else{
					echo "<div class='item'>";
					}
				   
			echo "<nav class='navbar'>";
			echo "<div class='container-fluid'>";
			echo "<ul class='nav navbar-nav'>";
	  	  	for($j=$k; $j<$k+4; $j++){
				if($j<$length){
					echo "<li>";
					echo '<a href="'.$NGs[$j]["NGtitle"].'" class="icons">';
                    echo '<i class="fa '.$NGs[$j]["NGid"].'">';
					/*
					$num = intval($userIcons[$j]);
                    echo '<a href="'.$nationalIcons[$num][0].'" class="icons">';
                    echo '<i class="fa '.$nationalIcons[$num][1].'">';
					*/
                    echo "</i>";
                    echo "</a>";
					echo "</li>";}
			}
			echo "</ul>";
			echo "</div>";
			echo "</nav>";	
			echo "</div>";
			$k=$i+4;
		}
}
/*PD detail page display product price fuction*/
/*Parameters: $priceList, $cost*/
/*PD detail page */
function comparePrice($priceList, $cost){
			     foreach($priceList as $key=>$value)
				 { 
				  if($cost>$value) {
					  echo '<span class="redprice">'.$key.":&nbsp;$".$value."</span><br>";
				   } 
				  elseif($cost<$value){
					  echo '<span class="greenprice">'.$key.":&nbsp;$".$value."</span><br>";
				  }
                  elseif($cost==$value){
					  echo $key.":&nbsp;$".$value."<br>";
				  }				  
			   
	     	 }
		 }
/*PD detail page check eligible user to purchase the product fuction*/
/*Parameters: $Job, $Professionalbody, $Professionalinsurance, $HearaboutAPA, $Registrationboard, $Dietary, $paymentCardList*/
/*PD detail page */
//function checkPDUser($Job, $Professionalbody, $Professionalinsurance, $HearaboutAPA, $Registrationboard, $Dietary, $paymentCardList){
				 //if(($Job!=NULL) && ($Professionalbody=="1") && ($Professionalinsurance=="1") && ($HearaboutAPA!=NULL) && ($Registrationboard=="1") && ($Registrationboard=="1") && (sizeof($Dietary)>0) && (sizeof($paymentCardList)>0))
				 //{
					//return "1"; 
				 //}
				// else{
					// return "0";
				 //}
			     
			 //}
function checkPDUser($memberType){
	if($memberType=="1"){
		return "1"; 
	}
	else{
		return "0"; 
	}
	
	
}			 
/*General function: save data to APA shopping cart database;*/
/*Parameters: $userID, $productID,$type;*/
/*save product data including membership type product, national group product, fellowship & PRF product*/
	function createShoppingCart($userID, $productID,$type,$coupon){
	$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config'); 
	try {
		$shoppingcartUpdate= $dbt->prepare('INSERT INTO shopping_cart (userID, productID, type, coupon) VALUES (:userID, :productID, :type, :coupon)');
		$shoppingcartUpdate->bindValue(':userID', $userID);
		$shoppingcartUpdate->bindValue(':productID', $productID);
		$shoppingcartUpdate->bindValue(':type', $type);
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
function checkShoppingCart($userID, $type, $productID){
		$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config'); 
		try {
			if($type!=""){
				$shoppingcartGet = $dbt->prepare('SELECT * FROM shopping_cart WHERE userID=:userID and type=:type');
				$shoppingcartGet->bindValue(':type', $type);}
			if($productID!=""){
				$shoppingcartGet = $dbt->prepare('SELECT * FROM shopping_cart WHERE userID=:userID and productID=:productID');	
				$shoppingcartGet->bindValue(':productID', $productID);	
			}
			$shoppingcartGet->bindValue(':userID', $userID);	
			$shoppingcartGet->execute();
			if($shoppingcartGet->rowCount()>0) { 
				if($type!=""){
					$shoppingcartDel = $dbt->prepare('DELETE FROM shopping_cart WHERE userID=:userID and type=:type');
					$shoppingcartDel->bindValue(':type', $type);
			   }
				if($productID!=""){
					$shoppingcartDel = $dbt->prepare('DELETE FROM shopping_cart WHERE userID=:userID and productID=:productID');
					$shoppingcartDel->bindValue(':productID', $productID);
			   }
			   
			   $shoppingcartDel->bindValue(':userID', $userID);	   
			   $shoppingcartDel->execute();	
			   $shoppingcartDel = null;
			}
			$shoppingcartGet = null; 
	    }
		catch (PDOException $e) {
				print "Error!: " . $e->getMessage() . "<br/>";
				die();
	    }
}
//get productID list from local database;
function getProduct($userID,$type){
		$arrayReturn = array();
		$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config');
		$shoppingcartGet = $dbt->prepare('SELECT * FROM shopping_cart WHERE userID=:userID AND type=:type');
		$shoppingcartGet->bindValue(':userID', $userID);
		$shoppingcartGet->bindValue(':type', $type);
		$shoppingcartGet->execute();
		if($shoppingcartGet->rowCount()>0) { 
			foreach ($shoppingcartGet as $row) {
				array_push($arrayReturn, $row['productID']);
			}
		}	
		$shoppingcartGet = null;
		return $arrayReturn;
}

function PDShoppingCart($userID, $productID, $meetingID,$type,$Coupon){
	$link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
	$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config'); 
	try {
		$shoppingcartGet= $dbt->prepare('SELECT * FROM shopping_cart WHERE productID= :productID AND userID=:userID AND type=:type');
		$shoppingcartGet->bindValue(':productID', $productID);
		$shoppingcartGet->bindValue(':userID', $userID);
		$shoppingcartGet->bindValue(':type', $type);
		$shoppingcartGet->execute();
		if($shoppingcartGet->rowCount()>0) {
		header("Location:".$link."/pd/pd-product?saveShoppingCart&id=".$productID);
	} else{
		$shoppingcartUpdate= $dbt->prepare('INSERT INTO shopping_cart (userID, productID, meetingID, type, Coupon) VALUES (:userID, :productID, :meetingID, :type, :Coupon)');
		$shoppingcartGet = null;
		$shoppingcartUpdate->bindValue(':userID', $userID);
		$shoppingcartUpdate->bindValue(':productID', $productID);
			$shoppingcartUpdate->bindValue(':meetingID', $meetingID);
		$shoppingcartUpdate->bindValue(':type', $type);
		$shoppingcartUpdate->bindValue(':Coupon', $Coupon);
		$shoppingcartUpdate->execute();	
		$shoppingcartUpdate = null;
	}
	
	$wishlistDel= $dbt->prepare('DELETE FROM wishlist WHERE productID=:productID AND userID=:userID AND source=:source');
	$wishlistDel->bindValue(':productID', $productID);
	$wishlistDel->bindValue(':userID', $userID);
	$wishlistDel->bindValue(':source', $type);
	$wishlistDel->execute();
	$wishlistDel = null;		
	}
	catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}
	header("Location:".$link."/pd/pd-product?saveShoppingCart&id=".$productID);
	
}
function PDSaveCoupon($userID, $type, $Coupon){
	$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config'); 
	try {
	$shoppingcartSave= $dbt->prepare('UPDATE shopping_cart SET Coupon = :Coupon WHERE userID= :userID AND type= :type');
	$shoppingcartSave->bindValue(':userID', $userID);
	$shoppingcartSave->bindValue(':type', $type);
	$shoppingcartSave->bindValue(':Coupon', $Coupon);
	$shoppingcartSave->execute();
	$shoppingcartSave= null;               
	} catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
	die();
}
	
}
?>