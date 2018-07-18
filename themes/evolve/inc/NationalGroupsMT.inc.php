<?php
// get national group from Aptify via webserice return Json data;
// 2.2.19 - get national group
// Send - 
// Response - national group
$sendData["UserID"] = "-1";
$nationalGroups = GetAptifyData("19", $sendData);
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
$nationalGroup = $nationalGroups;
if(count($PostArray) == 0) { // Just GET data
	$SubListAll = Array();
	//$nationalGroup = $nationalGroups["NationalGroup"];
	foreach($nationalGroup as $Subs) {
		$ArrayRe["SubscriptionID"] = $Subs["NGid"];
		$ArrayRe["Subscription"] = $Subs["NGtitle"];
		$ArrayRe["NGprice"] = $Subs["NGprice"];
		$ArrayRe["Subscribed"] = 0;
		array_push($SubListAll, $ArrayRe);
	}
} else {
	$SubListAll = Array();
	//$nationalGroup = $nationalGroups["NationalGroup"];
	foreach($nationalGroup as $Subs) {
		$ArrayRe["SubscriptionID"] = $Subs["NGid"];
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
}
?>
<?php logRecorder(); ?>
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
					'" id="'.$Subs["SubscriptionID"].'" class="NGname'.$counter.'" value="'.$Subs["Subscribed"].'"';
				if($Subs['Subscribed']==1){ 
					echo "checked";
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
<div class="NGpriceT" style="display: none;"></div>