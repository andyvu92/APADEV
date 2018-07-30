
<?php
$choseProduct = array();
if(isset($_GET["ProductID"])){
	$choseProduct = explode(",", $_GET["ProductID"]);
}
// get national group from Aptify via webserice return Json data;
// 2.2.19 - get national group
// Send - 
// Response - national group
$sendData["UserID"] = "-1";
$nationalGroups = GetAptifyData("19", $sendData);
// 2.2.20 - GET list of subscribed National Group
// Send - 
// User ID
// Response -
// National Group ID, National Group title
if(isset($_SESSION['UserId'])){
$sendData["UserID"] = $_SESSION['UserId'];
$myGroups = GetAptifyData("20", $sendData);
$myNG = array();
foreach($myGroups["results"] as $group){
	array_push($myNG, $group["NGid"]);
}
}
// use one of above to get "current" data
// and combine with existing data ("$Subsctiption")
// Then send it to Aptify.
// May go through Session
//print_r($Subscription);
//echo "<br /><br />";
//$PostArray = Array();
//foreach ($_POST as $key => $value) {
	//echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
	//$PostArray[htmlspecialchars($key)] = htmlspecialchars($value);
//}
$nationalGroup = $nationalGroups;

// Just GET data
	$SubListAll = Array();
	//$nationalGroup = $nationalGroups["NationalGroup"];
	foreach($nationalGroup as $Subs) {
		$ArrayRe["SubscriptionID"] = $Subs["ProductID"];//$Subs["NGid"];
		$ArrayRe["Subscription"] = $Subs["NGtitle"];
		$ArrayRe["NGprice"] = $Subs["NGprice"];
		$ArrayRe["Subscribed"] = 0;
		$ArrayRe["NGid"] = $Subs["NGid"];
		array_push($SubListAll, $ArrayRe);
	}
 /*else {
	$SubListAll = Array();
	//$nationalGroup = $nationalGroups["NationalGroup"];
	foreach($nationalGroup as $Subs) {
		$ArrayRe["SubscriptionID"] = $Subs["ProductID"];//$Subs["NGid"];
		$ArrayRe["Subscription"] = $Subs["NGtitle"];
		$ArrayRe["NGprice"] = $Subs["NGprice"];
		if(!isset($PostArray[$Subs["NGid"]])) {
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
}*/
?>
<?php logRecorder(); ?>
<form action="/pd/pd-shopping-cart" method="POST" style="width:100%;">
<input type="hidden" name="PostNG" />
<table class="table MTtable">
	<tbody>
		<?php
			$countSubs = count($nationalGroups);
			$countSubType = $countSubs%2;
			$counter = 0;
			foreach($SubListAll as $Subs) {
				$tr = $counter % 2;
				if($tr == 0) {
					echo "<tr>";
				}
				echo '<td><input type="checkbox" name="'.$Subs["SubscriptionID"].
					'" id="'.$Subs["SubscriptionID"].'" class="NGname'.$counter.'" ';
				
				if(isset($_GET["ProductID"]) && in_array($Subs['SubscriptionID'],$choseProduct)){ 
					echo 'value="1"';
				}
				else {echo 'value="'.$Subs["Subscribed"].'"';}
				if($Subs['Subscribed']==1){ 
					echo "checked";
				}
				if(isset($_GET["ProductID"]) && in_array($Subs['SubscriptionID'],$choseProduct)){ 
					echo "checked";
				}
				if(isset($_SESSION['UserId']) && in_array($Subs["NGid"], $myNG)){
					echo "checked disabled";
				}
				echo '>&nbsp;&nbsp;&nbsp;<label class="NGnameText'.$counter.'" for="'.$Subs["SubscriptionID"].'">'.$Subs["Subscription"]
					.'</label></td>';
				echo '<td><div class="NGprice'.$counter.'">$'.$Subs["NGprice"].'</div></td>';
				if($tr == 1) {
					echo "</tr>";
				}
				$counter++;
			}
		?>
	</tbody>
</table>
<input class="placeorder" type="submit" value="Join now"/>
</form>
<div class="NGpriceT" style="display: none;"></div>