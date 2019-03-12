<?php
if(isset($_POST['step3'])) {
	//continue to get the review data
	$postReviewData = $_SESSION['postReviewData'];
	$postReviewData['productID'] = getProductList($_SESSION['UserId']);
	if(isset($_POST['Paymentcard'])){ $postReviewData['Card_number'] = $_POST['Paymentcard']; }
	//if(isset($_POST['rollover'])){ $postReviewData['Rollover'] = $_POST['rollover']; }
	if(isset($_SESSION["tempcard"])){
		$cardDetails = $_SESSION["tempcard"];
		//$postReviewData['Payment-method'] = $cardDetails['Payment-method'];
		//$postReviewData['Cardno'] = $cardDetails['Cardno'];
		//$postReviewData['Expiry-date'] = $cardDetails['Expiry-date'];
		//$postReviewData['CCV'] = $cardDetails['CCV'];
		//test data
		$postReviewData['PaymentTypeID'] = $cardDetails['Payment-method'];
		$postReviewData['CCNumber'] = $cardDetails['Cardno'];
		$postReviewData['CCExpireDate'] = $cardDetails['Expiry-date'];
		
		//test data
		
		$postReviewData['CCSecurityNumber'] = $cardDetails['CCV'];	
		$postReviewData['Card_number'] = "";	
	}
	else{
		$postReviewData['PaymentTypeID'] = "";
		$postReviewData['CCNumber'] = "";
		$postReviewData['CCExpireDate'] = "";
		$postReviewData['CCSecurityNumber'] = "";
	}
	$postReviewData['InsuranceApplied'] = 0;
		
	// 2.2.26 - Register a new order
	// Send - 
	// userID&Paymentoption&PRFdonation&Rollover&Card_number&productID
	// Response -Register a new order successfully
	$registerOuts = aptify_get_GetAptifyData("26", $postReviewData);
    if($registerOuts['Invoice_ID']!=="0") {
		//refresh session data
		$data = "UserID=".$_SESSION["UserId"];
		$details = aptify_get_GetAptifyData("4", $data,"");
		newSessionStats($details["MemberTypeID"], $details["MemberType"], $details["Status"],$details["PersonSpecialisation"],$details["PaythroughtDate"],$details["Nationalgp"]);
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
		 $addMemberLog["jsonMessage"] = json_encode($postReviewData);
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
<div id="pre_background" style="display:none">background_<?php echo $background; ?></div>
<div class="col-xs-12 background_<?php echo $background; ?>" id="dashboard-right-content">
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
						$addMemberLog["jsonMessage"] = json_encode($postReviewData).json_encode($registerOuts);
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
							<span class="sub-heading">Please <a href="/jointheapa">try again</a> or <a href="/contact-us">contact us</a>.</span>
						</div>
					</div>
				<?php endif; ?>
				<?php /*
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
				*/ ?>
			</div>
		</div>
	</div>
</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">		
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<?php /*
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
		frames['stsIaksbnkvoice'].location.href="<?php echo $invoiceAPI[0]; ?>";
	}
});
</script>
*/ ?>
<?php logRecorder();  ?>