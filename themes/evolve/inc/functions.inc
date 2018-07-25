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
		if($length > 6){
			for($i=0; $i<$length/4; $i++){
				echo '<div id="myCarousel" class="carousel slide" data-ride="carousel">';
				echo '<div class="carousel-inner">';
				if($i==0){
						echo "<div class='item active'>";
						}
						else{
						echo "<div class='item'>";
						}
					   
				echo "<div class='flex-container flex-flow-row'>";
				echo "<div class='flex-cell'>";
					for($j=$k; $j<$k+4; $j++){
					if($j<$length){
						echo "<div class='flex-col-3'>";
						echo '<a href="'.$NGs[$j]["NGtitle"].'" class="icons">';
						echo '<i class="fa '.$NGs[$j]["NGid"].'">';
						/*
						$num = intval($userIcons[$j]);
						echo '<a href="'.$nationalIcons[$num][0].'" class="icons">';
						echo '<i class="fa '.$nationalIcons[$num][1].'">';
						*/
						echo "</i>";
						echo "</a>";
						echo "</div>";}
				}
				echo "</div>";
				echo "</div>";	
				echo "</div>";
				echo "</div>";
				echo '<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
				<span class="sr-only">Next</span>
				</a>';
				echo "</div>";
				$k=$i+4;
			}
		}
	    else{
			echo "<div class='flex-container flex-flow-row'>";
			echo "<div class='flex-cell'>";
				for($j=$k; $j<$k+4; $j++){
				if($j<$length){
					echo "<div class='flex-col-6 item-container'>";
					echo '<a href="'.$NGs[$j]["NGtitle"].'" class="icons">';
					echo '<i class="fa '.$NGs[$j]["NGid"].'">';
					/*
					$num = intval($userIcons[$j]);
					echo '<a href="'.$nationalIcons[$num][0].'" class="icons">';
					echo '<i class="fa '.$nationalIcons[$num][1].'">';
					*/
					echo "</i>";
					echo "<span class='ng-title'>".$NGs[$j]["NGtitle"]."</span>";
					echo "</a>";
					echo "</div>";
					}
			}
			echo "</div>";
			echo "</div>";
		}
}
/*PD detail page display product price fuction*/
/*Parameters: $priceList, $cost*/
/*PD detail page */
function comparePrice($priceList, $cost){
	foreach($priceList as $key=>$value) { 
		$x = explode(" ", $key);
		if(count($x) == 1) {
			$y = $key;
		} else {
			$y = str_replace($x[0], "", $key);
		}
		if($cost>$value) {
			echo '<span class="redprice">'.$y.":&nbsp;$".$value."</span><br>";
		} elseif($cost<$value){
			echo '<span class="greenprice">'.$y.":&nbsp;$".$value."</span><br>";
		} elseif($cost==$value){
			echo $y.":&nbsp;$".$value."<br>";
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
	try {
		$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config'); 
		$dbt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		echo 'Connection failed: ' . $e->getMessage();
	}
	try {
		$shoppingcartUpdate= $dbt->prepare('INSERT INTO shopping_cart (userID, productID, type, coupon) VALUES (:userID, :productID, :type, :coupon)');
		$shoppingcartUpdate->bindValue(':userID', $userID);
		$shoppingcartUpdate->bindValue(':productID', $productID);
		$shoppingcartUpdate->bindValue(':type', $type);
		$shoppingcartUpdate->bindValue(':coupon', $coupon);
		$shoppingcartUpdate->execute();	
		$shoppingcartUpdate = null;
	} catch (PDOException $e) {
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
	//$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config'); 
	try {
		$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config'); 
		$dbt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		echo 'Connection failed: ' . $e->getMessage();
		return false;
	}
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
		return false;
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
function getBackgroundImage($userID){
	$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config'); 
	$background=0;
	try {
		$backgroundInfo= $dbt->prepare('SELECT * FROM background_images WHERE userID= :userID');
		$backgroundInfo->bindValue(':userID', $userID);
		$backgroundInfo->execute();
		if($backgroundInfo->rowCount()>0) { 
			foreach ($backgroundInfo as $row) {
				$background= $row['imageID'];
				break;
			}
			return $background;
		}
		else{
			$background=1; 
			return $background;
		}
		$backgroundInfo = null;
	}
	catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}	
	
}

/**
 *  Member only content display controller.
 *  
 *  $Only -> field_member_content_type
 *  $type -> field_member_type_list
 *
 *  output
 *  0 (no content limit)
 *  1 (no content, not logged in)
 *  2 (no content, non-member)
 *  3 (member, type not matched)
 *
 *  when return summary, return
 *  [number,summary]
 *  number = see as above
 */
function MtypeContent($Only, $type) {
	$MemberOnly = ((array)$Only['#items'][0]["taxonomy_term"])['name'];
	echo $MemberOnly;
	$content = ((array)$Only['#object'])["body"]['und'];
	if($MemberOnly == "Full") {
		//echo "F";
		return "0";
	} elseif($MemberOnly == "Members only") {
		/* 
		echo "M";
		echo "<br>MemberTypeID->".$_SESSION['MemberTypeID'];
		echo "<br>MemberType->".$_SESSION['MemberType'];
		echo "<br>Status->".$_SESSION['Status'];
		echo "<br>Type:";
		*/
		$Mtype = ((array)$type['#items']);
		//print_r($Mtype);
		$login = loggedInStatus();
		if($login == "3") { // member
			if (!empty($Mtype)) { // if type filter is there
				foreach($Mtype as $types) {
					$ty = ((array)$types['taxonomy_term'])['name'];
					if(strpos($_SESSION['MemberType'], $ty) !== false) {
						return "0";
					}
				}
				return "3";
			}
			// no filter. show full content.
			return "0";
		} else { // non-member or not logged in
			return $login;
		}
		echo "<br>";
	} else {
		/*
		echo "S";
		echo "<br>MemberTypeID->".$_SESSION['MemberTypeID'];
		echo "<br>MemberType->".$_SESSION['MemberType'];
		echo "<br>Status->".$_SESSION['Status'];
		echo "<br>Type:";
		*/
		$Mtype = ((array)$type['#items']);
		//print_r($Mtype);
		echo "<br>";
		$login = loggedInStatus();
		if($login == "3") { // member
			if (!empty($Mtype)) { // if type filter is there
				foreach($Mtype as $types) {
					$ty = ((array)$types['taxonomy_term'])['name'];
					if(strpos($_SESSION['MemberType'], $ty) !== false) {
						return "0";
					}
				}
				return ["3",$content[0]['summary']];
			}
			// no filter. show full content.
			return "0";
		} else { // non-member or not logged in
			return [$login, $content[0]['summary']];
		}
	}
}

/**
 *  loggedInStatus
 *   - help "MtypeContent" function to return user status
 *  output
 *  1 (not logged in)
 *  2 (non-member)
 *  3 (member)
 */
function loggedInStatus() {
	if(isset($_SESSION['Log-in'])) {
		if(isset($_SESSION['MemberTypeID']) && $_SESSION['MemberTypeID'] == "1") {
			return "2";
		} else {
			return "3";
		}
	} else {
		return "1";
	}
}
//savePD survey data
function SavePDSurvey($CreateNewUserPD){
	$UserID = $CreateNewUserPD["UserID"];
	$Job = $CreateNewUserPD["Job"];
	$EmailAddress = $CreateNewUserPD["EmailAddress"];
	$Registrationboard = $CreateNewUserPD["Registrationboard"];
	$Professionalinsurance = $CreateNewUserPD["Professionalinsurance"];
	$Professionalbody = $CreateNewUserPD["Professionalbody"];
	$HearaboutAPA = $CreateNewUserPD["HearaboutAPA"];
	$Membershipproduct = $CreateNewUserPD["Membership-product"];
	$Pdemailsproduct = $CreateNewUserPD["Pdemails-product"];
	$Jobsproduct = $CreateNewUserPD["Jobs-product"];
	$Shopproduct = $CreateNewUserPD["Shop-product"];
	$Campaignsproduct = $CreateNewUserPD["Campaigns-product"];
	$Partnerproduct = $CreateNewUserPD["Partner-product"];
	$CreateDate = $CreateNewUserPD["CreateDate"];
	$dbt = new PDO('mysql:host=localhost;dbname=apa_extrainformation', 'c0DefaultMain', 'Apa2017Config');
	try {
		$PDSurvey= $dbt->prepare('INSERT INTO pdsurvey (UserID, Job, EmailAddress, Registrationboard, Professionalinsurance,Professionalbody,HearaboutAPA,Membershipproduct,Pdemailsproduct,Jobsproduct,Shopproduct,Campaignsproduct,Partnerproduct,CreateDate) VALUES (:UserID, :Job, :EmailAddress, :Registrationboard, :Professionalinsurance, :Professionalbody, :HearaboutAPA, :Membershipproduct, :Pdemailsproduct, :Jobsproduct, :Shopproduct, :Campaignsproduct, :Partnerproduct, :CreateDate)');
		$PDSurvey->bindValue(':UserID', $UserID);
		$PDSurvey->bindValue(':Job', $Job);
		$PDSurvey->bindValue(':EmailAddress', $EmailAddress);
		$PDSurvey->bindValue(':Registrationboard', $Registrationboard);
		$PDSurvey->bindValue(':Professionalinsurance', $Professionalinsurance);
		$PDSurvey->bindValue(':Professionalbody', $Professionalbody);
		$PDSurvey->bindValue(':HearaboutAPA', $HearaboutAPA);
		$PDSurvey->bindValue(':Membershipproduct', $Membershipproduct);
		$PDSurvey->bindValue(':Pdemailsproduct', $Pdemailsproduct);
		$PDSurvey->bindValue(':Jobsproduct', $Jobsproduct);
		$PDSurvey->bindValue(':Shopproduct', $Shopproduct);
		$PDSurvey->bindValue(':Campaignsproduct', $Campaignsproduct);
		$PDSurvey->bindValue(':Partnerproduct', $Partnerproduct);
		$PDSurvey->bindValue(':CreateDate', $CreateDate);
		$PDSurvey->execute();	
		$PDSurvey = null;
	}
	catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}	
	
}

/**
 *  Unique multip-dimensionarray function.
 *  
 * 
 */
function unique_multidim_array($array, $key) { 
    $temp_array = array(); 
    $i = 0; 
    $key_array = array(); 
    
    foreach($array as $val) { 
        if (!in_array($val[$key], $key_array)) { 
            $key_array[$i] = $val[$key]; 
            $temp_array[$i] = $val; 
        } 
        $i++; 
    } 
    return $temp_array; 
}  
?>