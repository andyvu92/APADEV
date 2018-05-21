<?php
include('sites/all/themes/evolve/commonFile/updateBackgroundImage.php');
/*
This page is undone.
I need to add "List of fellowship product and National Groups"
I'm doing it now :)
*/
/* We may use this as "Session" data and won't need to load. */
// 2.2.20 - GET list of subscribed National Group
// Send - 
// User ID
// Response -
// National Group ID, National Group title
$sendData["UserID"] = $_SESSION['UserId'];
$nationalGroups = GetAptifyData("20", $sendData);
echo "national Groups:<br>";
print_r($nationalGroups);

///
$ttt = GetAptifyData("19", $sendData);
echo "ttt:<br>";
print_r($ttt);
///

///
$tt["ProductID"] = "";
$ttt = GetAptifyData("21", $tt);
echo ">21:<br>";
print_r($ttt);
///


/* We may use this as "Session" data and won't need to load. */
// 2.2.22 - Get list of subscribed Fellowship Products
// Send - 
// UserID
// Response -
// List of Fellowship ID and its titles.
$Fellows = GetAptifyData("22", $sendData);
echo "Fellow ships:<br>";
print_r($Fellows);
/* We may use this as "Session" data and won't need to load. */
// 2.2.23 - GET list of subscription preferences
// Send - 
// UserID
// Response -
// List of subscriptions and its T/F values.
$subscriptions = GetAptifyData("23", $sendData);
echo "Subs:<br>";
print_r($subscriptions);
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
if(count($PostArray) == 0) { // Just GET data
	$SubListAll = Array();
	foreach($Subscription as $Subs) {
		$ArrayRe["SubscriptionID"] = $Subs["SubscriptionID"];
		$ArrayRe["Subscription"] = $Subs["Subscription"];
		$ArrayRe["Subscribed"] = $Subs["Subscribed"];
		array_push($SubListAll, $ArrayRe);
	}
	$nationalGroup = $nationalGroups["NationalGroup"];
	foreach($nationalGroup as $Subs) {
		$ArrayRe["SubscriptionID"] = $Subs["NGid"];
		$ArrayRe["Subscription"] = $Subs["NGtitle"];
		$ArrayRe["Subscribed"] = 1;
		array_push($SubListAll, $ArrayRe);
	}
	$Fellow = $Fellows["Fellowship"];
	foreach($Fellow as $Subs) {
		$ArrayRe["SubscriptionID"] = $Subs["FPid"];
		$ArrayRe["Subscription"] = $Subs["FPtitle"];
		$ArrayRe["Subscribed"] = 1;
		array_push($SubListAll, $ArrayRe);
	}
} else {
	$ArrayReturn = Array();
	array_push($ArrayReturn, "UserID");
	$SubListAll = Array();
	foreach($Subscription as $Subs) {
		$ArrayRe["SubscriptionID"] = $Subs["SubscriptionID"];
		$ArrayRe["Subscription"] = $Subs["Subscription"];
		if(!isset($PostArray[$Subs["SubscriptionID"]])) {
			// When it's not set (unticked on check box)
			$ArrayRe["Subscribed"] = 0;
		} else {
			$ArrayRe["Subscribed"] = $Subs["Subscribed"];
		}
		array_push($SubListAll, $ArrayRe);
	}
	$nationalGroup = $nationalGroups["NationalGroup"];
	foreach($nationalGroup as $Subs) {
		$ArrayRe["SubscriptionID"] = $Subs["NGid"];
		$ArrayRe["Subscription"] = $Subs["NGtitle"];
		if(!isset($PostArray[$Subs["NGid"]])) {
			// When it's not set (unticked on check box)
			$ArrayRe["Subscribed"] = 0;
		} else {
			$ArrayRe["Subscribed"] = 1;
		}
		array_push($SubListAll, $ArrayRe);
	}
	$Fellow = $Fellows["Fellowship"];
	foreach($Fellow as $Subs) {
		$ArrayRe["SubscriptionID"] = $Subs["FPid"];
		$ArrayRe["Subscription"] = $Subs["FPtitle"];
		if(!isset($PostArray[$Subs["FPid"]])) {
			// When it's not set (unticked on check box)
			$ArrayRe["Subscribed"] = 0;
		} else {
			$ArrayRe["Subscribed"] = 1;
		}
		array_push($SubListAll, $ArrayRe);
	}
	array_push($ArrayReturn, $SubListAll);
	echo "<br /><br />";
	// 2.2.24 - Update subscription preferences
	// Send - 
	// UserID, List of subscriptions and its F/F values.
	// Response -
	// Response, List of subscriptions and it's T/F values.
	$subscriptions = GetAptifyData("24", $ArrayReturn);
}
?>
<div id="pre_background" style="display:none">background_<?php echo $user['background']; ?></div>
<?php include('sites/all/themes/evolve/commonFile/dashboardLeftNavigation.php'); ?>
<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 background_<?php echo $user['background']; ?>" id="dashboard-right-content">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dashboard_detail">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><span class="dashboard-name"><strong>Your subscriptions</strong></span></div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><button class="dashboard-backgroud" data-target="#myModal" data-toggle="modal"><span class="customise_background">Customise your background</span><span class="customise_icon">[icon class="fa fa-cogs fa-x"][/icon]</span></button></div>
		</div>
		<?php
			include('sites/all/themes/evolve/commonFile/customizeBackgroundImage.php');
	    ?>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
				<p><span style="text-decoration: underline; color:#009fda; margin-left:1%;"><strong>What I'm signed up for</strong></span></p>
				<form action="/subscriptions" method="POST">
					<table class="table table-responsive table-bordered">
						<tbody>
							<?php
								$countSubs = count($Subscription);
								$countSubType = $countSubs%2;
								$counter = 0;
								foreach($SubListAll as $Subs) {
									$tr = $counter % 2;
									if($tr == 0) {
										echo "<tr>";
									}
									echo '<td><label for="'.$Subs["Subscription"].'">'.$Subs["Subscription"]
										.'</label><input type="checkbox" name="'.$Subs["SubscriptionID"].
										'" id="'.$Subs["Subscription"].'" value="'.$Subs["Subscribed"].'"';
									if($Subs['Subscribed']==1){ 
										echo "checked";
									}
									echo '></td>';
									if($tr == 1) {
										echo "</tr>";
									}
									$counter++;
								}
							?>
						</tbody>
					</table>
					<button  class="dashboard-button dashboard-bottom-button subscriptions-submit"><span class="dashboard-button-name">Submit</span></button>
				</form>
			</div>
		</div>
	</div>
</div>
 