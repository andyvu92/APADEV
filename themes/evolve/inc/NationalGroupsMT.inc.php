<?php
/*
This page is undone.
I need to add "List of fellowship product and National Groups"
I'm doing it now :)
*/
/* We may use this as "Session" data and won't need to load. */
// 2.2.20 - GET list of subscribed National Group
// Send - 
// Request, User ID
// Response -
// National Group ID, National Group title
$sendData["RequestNG"] = "RequestNG";
$sendData["UserID"] = "UserID";
$nationalGroups = GetAptifyData("20", $sendData);
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
	$nationalGroup = $nationalGroups["NationalGroup"];
	foreach($nationalGroup as $Subs) {
		$ArrayRe["SubscriptionID"] = $Subs["NGid"];
		$ArrayRe["Subscription"] = $Subs["NGtitle"];
		$ArrayRe["Subscribed"] = 1;
		array_push($SubListAll, $ArrayRe);
	}
} else {
	$SubListAll = Array();
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