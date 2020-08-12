<?php
if(isset($_POST['step3'])) {
	//continue to get the review data
	$postReviewData = array();
	//$postReviewData = $_SESSION['postReviewData'];
	$postReviewData['InstallmentFor'] = "Membership";
	$postReviewData['productID'] = getProductList($_SESSION['UserId']);
	//this is merge start from here
	//handle new card
	if(isset($_POST['addCard']) && $_POST['addCard']=="1"){
		$postReviewData['Card_number'] = "";
		$postReviewData['PaymentTypeID'] = $_POST['Cardtype'];
		$postReviewData['CCNumber'] = $_POST['Cardnumber'];
		$postReviewData['CCExpireDate'] = $_POST['Expirydate'];
		$postReviewData['CCSecurityNumber'] = $_POST['CCV'];
		//handle full payment and install payment
		if((isset($_POST['addcardtag']) && $_POST['addcardtag']=="1") || $_POST['Paymentoption']=="1" ){
			if(isset($_SESSION['UserId'])){ $postPaymentData['userID'] = $_SESSION['UserId']; }
			if(isset($_POST['Cardtype'])){ $postPaymentData['Payment-method'] = $_POST['Cardtype']; }
			if(isset($_POST['Cardnumber'])){ $postPaymentData['Cardno'] = $_POST['Cardnumber']; }
			if(isset($_POST['Expirydate'])){ $postPaymentData['Expiry-date'] = $_POST['Expirydate']; }
			if(isset($_POST['CCV'])){ $postPaymentData['CCV'] = $_POST['CCV']; }
			if($_POST['Paymentoption']=="1"){ $postPaymentData['IsDefault'] = 1; } else{ $postPaymentData['IsDefault'] = 0;}
			$out = aptify_get_GetAptifyData("15", $postPaymentData);
		}
	}

	//handle using existed card scenario
	elseif(isset($_POST['Paymentcard']) && !isset($_POST['anothercard'])){
		$postReviewData['Card_number'] = $_POST['Paymentcard'];
		if($_POST['Paymentoption']=="1"){
			$updateCardSubmit["UserID"] = $_SESSION['UserId'];
			$updateCardSubmit["SpmID"] = $_POST['Paymentcard'];
			$updateCardSubmit["ExpireMonthYear"] = "";
			$updateCardSubmit["CCSNumber"] = "";
			$updateCardSubmit["IsDefault"] = "1";
			$updateCardSubmit["IsActive"] = "";
			// 2.2.13 - update payment method-3-set main card
			// Send -
			// UserID, Creditcard-ID
			// Response -
			// N/A.
			$updateCards = aptify_get_GetAptifyData("13", $updateCardSubmit);
		}
		$postReviewData['PaymentTypeID'] = "";
		$postReviewData['CCNumber'] = "";
		$postReviewData['CCExpireDate'] = "";
		$postReviewData['CCSecurityNumber'] = "";
	}
	//this is end merge part
	$postReviewData['InsuranceApplied'] = 0;
	if(isset($_POST['PRFFinal'])) {$postReviewData['PRFdonation'] = $_POST['PRFFinal'];}else{ $postReviewData['PRFdonation'] = "";}
	// 2.2.26 - Register a new order
	// Send -
	// userID&Paymentoption&PRFdonation&Rollover&Card_number&productID
	// Response -Register a new order successfully
	if(isset($_SESSION['UserId'])){ $postReviewData['userID'] = $_SESSION['UserId'];  }
  if(isset($_POST['Paymentoption'])){ $postReviewData['Paymentoption'] = $_POST['Paymentoption'] == '1' ? 1:0; }
  if(isset($_POST['appliedCoupon'])){$postReviewData['CampaignCode'] = $_POST['Paymentoption'] == '1' ? "":$_POST['appliedCoupon'];}
	//if(isset($_POST['Installpayment-frequency'])){ $postReviewData['InstallmentFrequency'] = $_POST['Installpayment-frequency']; }
	$postReviewData['InstallmentFrequency'] = $_POST['Paymentoption'] == '1' ? "Monthly":"";
	$registerOuts = aptify_get_GetAptifyData("26", $postReviewData);
	$recordOrder = array();
	//new array to record specific fields
	$recordOrder['userID'] = $postReviewData['userID'];
	$recordOrder['PRFdonation'] = $postReviewData['PRFdonation'];
	$recordOrder['Card_number'] = $postReviewData['Card_number'];
	$recordOrder['productID'] = $postReviewData['productID'];
	$recordOrder['PaymentTypeID'] = $postReviewData['PaymentTypeID'];
	if($postReviewData['CCNumber'] !=""){  $recordOrder['CCNumber'] = substr($postReviewData['CCNumber'], -4); }
	else{ $recordOrder['CCNumber'] = $postReviewData['CCNumber'];}
	$recordOrder['InsuranceApplied'] = $postReviewData['InsuranceApplied'];
	$recordOrder['Paymentoption'] = $postReviewData['Paymentoption'];
	$recordOrder['InstallmentFor'] = $postReviewData['InstallmentFor'];
	$recordOrder['InstallmentFrequency'] = $postReviewData['InstallmentFrequency'];
    if($registerOuts['Invoice_ID']!=="0") {
		//refresh session data
		$data = "UserID=".$_SESSION["UserId"];
		$details = aptify_get_GetAptifyData("4", $data,"");
		newSessionStats($details["MemberTypeID"], $details["MemberType"], $details["Status"],$details["PersonSpecialisation"],$details["PaythroughtDate"],$details["Nationalgp"]);
   //implementation MBA SSO Start from here
   $personInfo['email'] = $details["Memberid"];
   $personInfo['first_name'] = $details["Firstname"];
   $personInfo['last_name'] = $details["Lastname"];
   if(empty($details["Mobile-number"])){
     $personInfo['phone'] = str_replace("-","",$details["Home-phone-number"]);
   }
   else{
     $personInfo['phone'] = str_replace("-","",$details["Mobile-number"]);
   }

   $personInfo['membership_number'] =  $details["Memberno"];
   $timeStr = strtotime(str_replace('/', '-', $details["PaythroughtDate"]));
   $personInfo['membership_expiry'] = date("Y", $timeStr)."-".date("m", $timeStr)."-".date("d", $timeStr);
   $personInfo['newsletter']=false;
   //check line1 characters
   $addressSSOLine1 = $details["Unit"];
   $str = strlen($addressSSOLine1);
   if($str<8) { $addressSSOLine1 .="        "; }
   if($str>40){ $addressSSOLine1 =  substr($addressSSOLine1,0, 39);}
   $perAddArray = array();
   $personInfo['address'] = array('line1'=>$addressSSOLine1, 'city'=>$details["Suburb"], 'post_code'=>$details["Postcode"], 'state'=>$details["State"], 'country'=>$details["Country"]);
   $personInfo['extra_fields'] = array();
   $result = mba_sso_create($personInfo);
   $mba_login = mba_log_in($details["Memberid"]);
   if(isset($mba_login['sc']['access_token']) && ($mba_login['sc']['access_token']!="")){
     $_SESSION['MBASSO_Login_Path'] = $mba_login['sc']['path'];
     $_SESSION['MBASSO_Login_Token'] = $mba_login['sc']['access_token'];
     $redirectURL = mba_redirect($_SESSION['MBASSO_Login_Token'], $_SESSION['MBASSO_Login_Path']);

   }


  //implementation MBA SSO End here
    //end refresh session data
		$invoice_ID = $registerOuts['Invoice_ID'];
		//save the terms and conditons on APA side
		$dataArray = array();
		$dataArray['MemberID'] = $postReviewData['userID'];
		$dataArray['CreateDate']= date('Y-m-d');
		$dataArray['MembershipYear'] = date('Y',strtotime('+1 year'));
		$dataArray['ProductList'] = implode(",",$postReviewData['productID']);
		$dataArray['Type'] = "J";
		forCreateRecordFunc($dataArray);
		//delete session: really important!!!!!!!!
		completeOrderDeleteSession();
		// delete shopping cart data from APA database; put the response status validation here!!!!!!!
		$userID = $_SESSION["UserId"];

		// use drupal db_select by jinghu 20/09/2018
		$type = "membership";
		checkShoppingCart($userID, $type, $productID="");
		$type = "NG";
		checkShoppingCart($userID, $type, $productID="");
		$type = "MG1";
		checkShoppingCart($userID, $type, $productID="");
		$type = "MG2";
		checkShoppingCart($userID, $type, $productID="");
		$productID = "PRF";
		checkShoppingCart($userID, $type="", $productID);
		 // record member log for successful process
		 if(isset($_SESSION['UserName'])){ $addMemberLog["userID"] = $_SESSION['UserName'];  }
		 $addMemberLog["orderID"] = "0";
		 $addMemberLog["jsonMessage"] = json_encode($recordOrder)."<br/><br/>".json_encode($registerOuts);
		 $addMemberLog["createDate"] = date('Y-m-d');
		 $addMemberLog["type"] =  "Join";
		 $addMemberLog["logError"] = 0;
		 add_Member_Log($addMemberLog);
		//2.2.46 -get order payment schedules test part
	   //$paymentData['id'] = $registerOuts['Invoice_ID'];
	   //$paymentDataSchedules = GetAptifyData("46", $paymentData);
	  //2.2.44 -get order detail test part
	  // $orderData = $registerOuts['Invoice_ID'];
	  // $orderDetails = GetAptifyData("44", $orderData);
		//Put subscription logic here when the user become the member
if(isset($_SESSION['UserId'])) {
    // 2.2.23 - GET list of subscription preferences
    // Send -
    // UserID
    // Response -
    // List of subscriptions and its T/F values.
    $sendData["UserID"] = $_SESSION['UserId'];
    $subscriptions = aptify_get_GetAptifyData("23", $sendData);
    $Subscription = $subscriptions["results"];
    $ArrayReturn = Array();
    $ArrayReturn["UserID"] = $_SESSION['UserId'];
    // 2.2.22 - Get list of subscribed Fellowship Products
    // Send -
    // UserID
    // Response -
    // List of Fellowship ID and its titles.
    $Fellows = aptify_get_GetAptifyData("22", $sendData);
    $MagSubs = Array();
    $Fellow = $Fellows["results"];
    foreach($Fellow as $Subs) {
        if(strpos($Subs["FPtitle"], "Magazine") !== false) {
            $divs = explode(" ", $Subs["FPtitle"]);
            if($divs[0] == "InTouch" || $divs[0] == "Sports") {
                array_push($MagSubs, $divs[0]);
            }
        }
    }
    $SubListAll = Array();
    $subArray = Array();
    $consArray = Array();
    foreach($Subscription as $Subs) {
        $ArrayRe["SubscriptionID"] = $Subs["ConsentID"];
        $arrayUpdate["ConsentID"] = $Subs["ConsentID"];
        if($Subs["ConsentID"] == '15') {
            // APA email
            $ArrayRe["Subscribed"] = $Subs["Subscribed"];
            $arrayUpdate["Subscribed"] = $Subs["Subscribed"];
        } elseif($Subs["ConsentID"] == '18') {
            // InMotion Copy
            if($_SESSION['MemberTypeID'] == "31" || $_SESSION['MemberTypeID'] == "32" || $_SESSION['MemberTypeID'] == "34" || $_SESSION['MemberTypeID'] == "35" || $_SESSION['MemberTypeID'] == "36") {
                // No InMotion print copy for
                // student (M7, M7a), Physiotherapy assistant (M9) and Associated (M10)
                // and M11 Associated (Oversea)
                $ArrayRe["Subscribed"] = '0';
                $arrayUpdate["Subscribed"] = '0';
            } else {
                $ArrayRe["Subscribed"] = "1";
                $arrayUpdate["Subscribed"] = "1";
            }
        } else {
            // InTouch and Sports
            $ArrayRe["Subscribed"] = $Subs["Subscribed"];
            $arrayUpdate["Subscribed"] = $Subs["Subscribed"];
            if($Subs["ConsentID"] == '16' || $Subs["ConsentID"] == '17') {
				foreach($MagSubs as $mags) {
					$tts = strpos($Subs["Consent"], $mags);
					if($tts !== FALSE) {
						$ArrayRe["Subscribed"] = '1';//$Subs["Subscribed"];
						$arrayUpdate["Subscribed"] = '1';//$Subs["Subscribed"];
					}
				}
			}
        }
        array_push($consArray, $arrayUpdate);
        $ArrayRe["Subscription"] = $Subs["Consent"];
        array_push($SubListAll, $ArrayRe);
    }
    $ArrayReturn["Subscriptions"] = $subArray;
    $ArrayReturn["Consents"] = $consArray;
    // 2.2.24 - Update subscription preferences
    // Send -
    // UserID, List of subscriptions and its F/F values.
    // Response -
    // Response, List of subscriptions and it's T/F values.
    $subscriptions = aptify_get_GetAptifyData("24", $ArrayReturn);
}
//end subscription
}


}
else{
	header("Location: /");
}
?>
<?php
//include('sites/all/themes/evolve/commonFile/updateBackgroundImage.php');
 apa_function_updateBackgroundImage_form();
//include('sites/all/themes/evolve/commonFile/dashboardLeftNavigation.php');
apa_function_dashboardLeftNavigation_form();
/* get background image****/
if(isset($_SESSION['UserId'])) { $userID = $_SESSION['UserId'];} else { $userID =0; }
$background = getBackgroundImage($userID);
/* get background image****/
?>
<div id="pre_background" style="display:none">background_<?php //echo $background; ?></div>
<div class="col-xs-12 background_<?php //echo $background; ?>" id="dashboard-right-content">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dashboard_detail" style="width: 100%;">

	<?php
	//include('sites/all/themes/evolve/commonFile/customizeBackgroundImage.php');
	apa_function_customizeBackgroundImage_form();
	?>

		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
				<?php if($registerOuts['Invoice_ID']!=="0"):?>
				<style>
					#dashboard-right-content .dashboard_detail{
						width: 100%;
					}
				</style>
				<div class="flex-container" id="new-member-welcome">
					<div class="flex-cell heading">
						<h2 class="light-lead-heading">Welcome to the APA!</h2>
						<h3 class="lead-heading">We're glad to have you on board.</h3>
					</div>
					<div class="flex-cell body-text">
						<span>A copy of your purchase receipt and membership certification will be sent to your inbox.</span>
						<span class="note_box">Please <a href="https://apa.bmsgroup.com?utm_source=apa&utm_medium=website&utm_campaign=newmember" target="_blank">click here </a>to proceed to BMS’s microsite to take up entity cover. There will be additional information collected by BMS to ensure your business is appropriately covered.</span>
						<span>In the meantime, you might like to:</span>
					</div>
					<div class="flex-cell cta">
						<a href="/dashboard" class="cta-item">
							<span class="icon dashboard-icon"></span>
							<span class="description">Go to your dashboard to review your membership information</span>
						</a>
						<a href="/membership/memberbenefits" class="cta-item">
							<span class="icon benefit-icon"></span>
							<span class="description">Take advantage of the great range of APA member benefits</span>
						</a>
						<a href="/pd/pd-search" class="cta-item">
							<span class="icon location-icon"></span>
							<span class="description">Check out upcoming professional development events near you</span>
						</a>
					</div>
				</div>

				<?php else:?>
                    <!--this is handle record error log-->
					<?php if(isset($_SESSION['UserName'])){ $addMemberLog["userID"] = $_SESSION['UserName'];  }
						$addMemberLog["orderID"] = "0";
						$addMemberLog["jsonMessage"] = json_encode($recordOrder)."<br/><br/>".json_encode($registerOuts);
						$addMemberLog["createDate"] = date('Y-m-d');
						$addMemberLog["type"] =  "Join";
						$addMemberLog["logError"] = 1;
						add_Member_Log($addMemberLog);
					?>
					<style>
						#dashboard-right-content .nav-tabs{
							display: none;
						}
						span.dashboard-name{
							display: none;
						}
					</style>
					<script>
						jQuery(document).ready(function(){
							$('#dashboard-right-content .nav-tabs').remove();
							$('span.dashboard-name').remove();						});
					</script>
					<div class="flex-container" id="fail-purchase">
						<div class="flex-cell">
							<h3 class="light-lead-heading">We had issues processing<br> your payment request.</h3>
						</div>
						<div class="flex-cell">
							<span class="sub-heading">Please <a href="javascript:document.getElementById('renew-survey-form2').submit();">try again</a> or <a href="/contact-us">contact us</a>.</span>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<form id="renew-survey-form2" action="/jointheapa" method="POST"><input type="hidden" name="QOrder"></form>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<?php logRecorder();  ?>
<script>
$(document).ready(function() {
	window.history.pushState(null,"", "/jointheapa");
	window.onpopstate = function() {
		window.history.pushState(null, "", "/jointheapa");
	};
	$(function () {
        $(document).keydown(function (e) {
            return (e.which || e.keyCode) != 116;
		});
		$(document).keydown(function (e) {
            return (e.which || e.keyCode) != 78;
		});
		$(document).keydown(function (e) {
            return (e.which || e.keyCode) != 82;
		});

    });
 });
</script>
