<?php if(isset($_SESSION["UserId"])) : ?>
<?php
include('sites/all/themes/evolve/commonFile/updateBackgroundImage.php');
/* get background image****/
if(isset($_SESSION['UserId'])) { $userID = $_SESSION['UserId'];} else { $userID =0; }
$background = getBackgroundImage($userID);
/* get background image****/
/* We may use this as "Session" data and won't need to load. */
// 2.2.20 - GET list of subscribed National Group
// Send - 
// User ID
// Response -
// National Group ID, National Group title
$sendData["UserID"] = $_SESSION['UserId'];
$nationalGroups = GetAptifyData("20", $sendData);
//echo "national Groups:<br>";
//print_r($nationalGroups);

///
//$ttt = GetAptifyData("19", $sendData);
//echo "ttt:<br>";
//print_r($ttt);
///

///
//$tt["Userid"] = $userID;
//$ttt = GetAptifyData("21", $tt);
//echo ">21:<br>";
//print_r($ttt);
///


/* We may use this as "Session" data and won't need to load. */
// 2.2.22 - Get list of subscribed Fellowship Products
// Send - 
// UserID
// Response -
// List of Fellowship ID and its titles.
$Fellows = GetAptifyData("22", $sendData);
//echo "Fellow ships:<br>";
//print_r($Fellows);
/* We may use this as "Session" data and won't need to load. */
// 2.2.23 - GET list of subscription preferences
// Send - 
// UserID
// Response -
// List of subscriptions and its T/F values.
$subscriptions = GetAptifyData("23", $sendData);
//echo "Subs:<br>";
//print_r($subscriptions);
$Subscription = $subscriptions["results"];
// use one of above to get "current" data
// and combine with existing data ("$Subsctiption")
// Then send it to Aptify.
// May go through Session
//print_r($Subscription);
//echo "<br /><br />";
$PostArray = Array();
foreach ($_POST as $key => $value) {
	//echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
	$PostArray[htmlspecialchars($key)] = htmlspecialchars($value);
}
//echo "@@@@";
//print_r($PostArray);
//echo "@@@@";
if(count($PostArray) == 0) { // GET data
	$SubListAll = Array();
	foreach($Subscription as $Subs) {
		$ArrayRe["SubscriptionID"] = $Subs["ConsentID"];
		$ArrayRe["Subscription"] = $Subs["Consent"];
		$ArrayRe["Subscribed"] = $Subs["Subscribed"];
		array_push($SubListAll, $ArrayRe);
	}
	$nationalGroup = $nationalGroups["results"];
	foreach($nationalGroup as $Subs) {
		$ArrayRe["SubscriptionID"] = $Subs["SubscriptionID"];
		$ArrayRe["Subscription"] = $Subs["NGtitle"];
		$ArrayRe["Subscribed"] = 1;
		array_push($SubListAll, $ArrayRe);
	}
	$Fellow = $Fellows["results"];
	foreach($Fellow as $Subs) {
		$ArrayRe["SubscriptionID"] = $Subs["SubscriptionID"];
		$ArrayRe["Subscription"] = $Subs["FPtitle"];
		$ArrayRe["Subscribed"] = 1;
		array_push($SubListAll, $ArrayRe);
	}
} else { // send & get updated data
	$ArrayReturn = Array();
	$ArrayReturn["UserID"] = $_SESSION['UserId'];
	$SubListAll = Array();
	$subArray = Array();
	$consArray = Array();
	foreach($Subscription as $Subs) {
		$ArrayRe["SubscriptionID"] = $Subs["ConsentID"];
		$arrayUpdate["ConsentID"] = $Subs["ConsentID"];
		if(!isset($PostArray[$Subs["ConsentID"]])) {
			// When it's not set (unticked on check box)
			$ArrayRe["Subscribed"] = "False";
			$arrayUpdate["Subscribed"] = "False";
		} else {
			$ArrayRe["Subscribed"] = "True";//$Subs["Subscribed"];
			$arrayUpdate["Subscribed"] = "True";//$Subs["Subscribed"];
		}
		array_push($consArray, $arrayUpdate);
		$ArrayRe["Subscription"] = $Subs["Consent"];
		array_push($SubListAll, $ArrayRe);
	}
	$nationalGroup = $nationalGroups["results"];
	foreach($nationalGroup as $Subs) {
		$ArrayUpdate["SubscriptionID"] = $Subs["SubscriptionID"];
		if(!isset($PostArray[$Subs["SubscriptionID"]])) {
			// When it's not set (unticked on check box)
			$ArrayUpdate["Subscribed"] = 0;
		} else {
			if($PostArray[$Subs["SubscriptionID"]] == 0) {
				$ArrayUpdate["Subscribed"] = 0;
			} else {
				$ArrayRe["SubscriptionID"] = $Subs["SubscriptionID"];
				$ArrayRe["Subscribed"] = 1;
				$ArrayRe["Subscription"] = $Subs["NGtitle"];
				array_push($SubListAll, $ArrayRe);
				$ArrayUpdate["Subscribed"] = 1;
			}
		}
		array_push($subArray, $ArrayUpdate);
	}
	$Fellow = $Fellows["results"];
	foreach($Fellow as $Subs) {
		$ArrayUpdate["SubscriptionID"] = $Subs["SubscriptionID"];
		if(!isset($PostArray[$Subs["SubscriptionID"]])) {
			// When it's not set (unticked on check box)
			$ArrayUpdate["Subscribed"] = 0;
		} else {
			if($PostArray[$Subs["SubscriptionID"]] == 0) {
				$ArrayUpdate["Subscribed"] = 0;
			} else {
				$ArrayRe["SubscriptionID"] = $Subs["SubscriptionID"];
				$ArrayRe["Subscribed"] = 1;
				$ArrayRe["Subscription"] = $Subs["FPtitle"];
				array_push($SubListAll, $ArrayRe);
				$ArrayUpdate["Subscribed"] = 1;
			}
		}
		array_push($subArray, $ArrayUpdate);
	}
	$ArrayReturn["Subscriptions"] = $subArray;
	$ArrayReturn["Consents"] = $consArray;
	echo "<br /><br />";
	// 2.2.24 - Update subscription preferences
	// Send - 
	// UserID, List of subscriptions and its F/F values.
	// Response -
	// Response, List of subscriptions and it's T/F values.
	$subscriptions = GetAptifyData("24", $ArrayReturn);
	
}
?>
<div id="pre_background" style="display:none">background_<?php echo $background; ?></div>
<?php include('sites/all/themes/evolve/commonFile/dashboardLeftNavigation.php'); ?>
<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 background_<?php echo $background; ?>" id="dashboard-right-content">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dashboard_detail">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="col-xs-12 col-sm-6"><span class="dashboard-name cairo"><strong>Your subscriptions</strong></span></div>
			<div class="col-xs-12 col-sm-6"><button class="dashboard-backgroud" data-target="#myModal" data-toggle="modal"><span class="customise_background">Customise your background</span><span class="customise_icon">[icon class="fa fa-cogs fa-x"][/icon]</span></button></div>
		</div>
		<?php
			include('sites/all/themes/evolve/commonFile/customizeBackgroundImage.php');
	    ?>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
				<p><span style="color:#009fda; font-size: 1.2em;"><strong>What you're signed up for</strong></span></p>
				<form action="/subscriptions" method="POST">
					<ul>
							<?php
								$countSubs = count($Subscription);
								$countSubType = $countSubs%2;
								$counter = 0;
								foreach($SubListAll as $Subs) {

									echo '
									<li>
										<input class="styled-checkbox" type="checkbox" name="'.$Subs["SubscriptionID"].
										'" id="'.$Subs["SubscriptionID"].'" value="'.$Subs["Subscribed"].'"';
										if($Subs['Subscribed']==1 || $Subs['Subscribed']=="True"){ 
											echo "checked";
										}
										echo '>
										<label  class="light-font-weight" for="'.$Subs["SubscriptionID"].'">'.$Subs["Subscription"]
										.'</label>
									</li>';

								}
							?>
					</ul>
					<button id="your-details-submit-button" class="dashboard-button dashboard-bottom-button subscriptions-submit"><span class="dashboard-button-name">Submit</span></button>
				</form>
			</div>
		</div>
	</div>
	<?php logRecorder(); ?>
</div>
 <?php else : 
	// todo
	// add log-in button with message - you must be logged in
	?>
<p>please log-in to use this page</p>
<?php endif; ?>