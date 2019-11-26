<?php
// get national group from Aptify via webserice return Json data;
// 2.2.19 - get national group
// Send - 
// Response - national group
$sendData["UserID"] = "-1";
$nationalGroups = aptify_get_GetAptifyData("19", $sendData);
sort($nationalGroups);
// use one of above to get "current" data
// and combine with existing data ("$Subsctiption")
// Then send it to Aptify.
// May go through Session
//print_r($Subscription);
//echo "<br /><br />";
$nationalGroup = $nationalGroups;

$SubListAll = Array();
//$nationalGroup = $nationalGroups["NationalGroup"];
foreach($nationalGroup as $Subs) {
	$ArrayRe["SubscriptionID"] = $Subs["ProductID"];//$Subs["NGid"];
	$ArrayRe["Subscription"] = $Subs["NGtitle"];
	$ArrayRe["NGprice"] = $Subs["NGprice"];
	$ArrayRe["Subscribed"] = 0;
	array_push($SubListAll, $ArrayRe);
}
?>
<?php logRecorder(); ?>
<div class="MTtable flex-container" id="mt-national-group">
		<?php
			$countSubs = count($nationalGroups);
			$countSubType = $countSubs%2;
			$counter = 0;
			$arrColumn = array_column($SubListAll, 'Subscription');
			array_multisort($arrColumn, SORT_ASC, $SubListAll);
			foreach($SubListAll as $Subs) {
				$tr = $counter % 2;
				if($tr == 0) {
					echo "<div class='flex-cell'>";
				}
				echo '<div class="flex-col-6"><div class="flex-col-10">
						<input class="NGname'.$counter.' styled-checkbox" type="checkbox" name="'.$Subs["SubscriptionID"].
					'" id="'.$Subs["SubscriptionID"].'" value="'.$Subs["Subscribed"].'"';
				if($Subs['Subscribed']==1){ 
					echo "checked";
				}
				echo '>&nbsp;&nbsp;&nbsp;<label class="NGnameText'.$counter.'" for="'.$Subs["SubscriptionID"].'">'.$Subs["Subscription"]
					.'</label></div>';
				echo '<div class="flex-col-2"><div class="NGprice'.$counter.'">$'.$Subs["NGprice"].'</div></div></div>';
				if($tr == 1) {
					echo "</div>";
				}
				$counter++;
			}
			if(($counter % 2) == 1) {
				echo "</div>";
			}
		?>

</div>
<div class="NGpriceT" style="display: none;"></div>