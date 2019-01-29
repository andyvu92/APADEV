<?php
if(!function_exists('drupal_session_started'))
{
  die("Unauthorized Access");
}
?>
<?php if(isset($_SESSION['UserId'])):?>
<?php  if($_SESSION['MemberTypeID']!="1" && strtotime(date("d-m-Y",strtotime($_SESSION['payThroughDate'])))>= strtotime(date("d-m-Y",strtotime('-1 month')))): ?>
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
$nationalGroups = aptify_get_GetAptifyData("19", $sendData);
sort($nationalGroups);
// 2.2.20 - GET list of subscribed National Group
// Send - 
// User ID
// Response -
// National Group ID, National Group title
if(isset($_SESSION['UserId'])){
$sendData["UserID"] = $_SESSION['UserId'];
$myGroups = aptify_get_GetAptifyData("20", $sendData);
$myNG = array();
if(sizeof($myGroups["results"])!=0){
	foreach($myGroups["results"] as $group){
		array_push($myNG, $group["NGid"]);
	}
}
}
//Added code by JingHu04092018
//Get user's subscribed magezine products
$sendData["UserID"] = $_SESSION['UserId'];
$Fellows = aptify_get_GetAptifyData("22", $sendData);
$MagSubs = Array();
$Fellow = $Fellows["results"];
$TMag = false;
$SMag = false;
foreach($Fellow as $Subs) {
	if($Subs["ProductID"] == "9978") {
		$TMag = true;
	}
	
	if($Subs["ProductID"] == "9977") {
		$SMag = true;
	}
}

//Get magazine products
$fpData['ProductID'] = ["9977","9978"];
$FPListArray = aptify_get_GetAptifyData("21", $fpData);
//End added code by JingHu04092018inghu
// use one of above to get "current" data
// and combine with existing data ("$Subsctiption")
// Then send it to Aptify.
// May go through Session
//print_r($Subscription);
//echo "<br /><br />";
//$PostArray = Array();
//foreach ($_POST as $key => $value) {
	//echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<h2>";
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
	$subscriptions = aptify_get_GetAptifyData("24", $ArrayReturn);
}*/
?>
<?php logRecorder(); ?>
<form id="single-ng-join" action="/pd/pd-shopping-cart" method="POST" style="width:100%;">
<input type="hidden" name="PostNG" />
<div class="container">
<div class="flex-container join-NGtable">

	<div class="flex-cell heading">
		<h2>Join an APA <br>National Group</h2>
	</div>
	<div class="flex-cell info-text">
		<span>Join an APA National Group to connect with physiotherapists working in similar areas to keep up to date with the latest research and developments.</span>
		<div class="MTcontentTitle">Here's the full list of National Groups, select which groups suit you:</div>
	</div>
	<?php
	// ToDoAfterGoLive - 09.Nov.2018
	/**
	* This message will only display until the 31st of December 2018.
	* May need to update this again for 2019 or
	* Fixed the join issue with Aptify later
	*/
	if(date("Y") == date("2018")) {
	echo '<div class="messages"><div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><span>National Group memberships are based on a calendar year and fees listed are relevant to the end of the current year.</span></div></div>';
	}
	?>

		<?php
			$countSubs = count($nationalGroups);
			$countSubType = $countSubs%2;
			$counter = 0;
			$mgCounter = 0;
			foreach($SubListAll as $Subs) {
				$tr = $counter % 2;
				if($tr == 0) {
					echo "<div class='flex-cell'>";
				}
				echo '<div class="flex-col-6"><div class="flex-col-10"><input type="checkbox" name="'.$Subs["SubscriptionID"].
					'" id="'.$Subs["SubscriptionID"].'" class="styled-checkbox NGname'.$counter.'" ';
				
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
					.' <span class="not-avalable"> (You are already a member)</span></label></div>';
				echo '<div class="flex-col-2"><div class="NGprice'.$counter.'">$'.$Subs["NGprice"].'</div></div></div>';
				if($tr == 1) {
					echo "</div>";
				}
				$counter++;
			}
			echo "<div class='flex-cell'>";
			foreach($FPListArray as $MG){
								
				echo '<div class="flex-col-6"><div class="flex-col-10"><input type="checkbox" name="'.$MG["ProductID"].
					'" id="'.$MG["ProductID"].'" class="styled-checkbox MGname'.$mgCounter.'" ';
				if($MG["ProductID"]=="9977"){
		
					echo "disabled";
					if($SMag){
						echo " checked";
					}
				}
				if($MG["ProductID"]=="9978"){
					echo "disabled";
					if($TMag){
						echo " checked";
					}
				}
				echo '>&nbsp;&nbsp;&nbsp;<label class="NGnameText'.$mgCounter.'" for="'.$MG["ProductID"].'">'.$MG["FPtitle"]
					.'</label></div>';	
				echo '<div class="flex-col-2"><div class="NGprice'.$mgCounter.'">$'.$MG["FPprice"].'</div></div></div>';
				$mgCounter++;
			}
			echo "</div>";
		?>
</div>

<div class='flex-cell btn-container'><button class='placeorder accent-btn' type='submit' value='Join now'>Join now</button></div>

</div>

</form>
<div class="NGpriceT" style="display: none;"></div>
<?php  else: ?>
	<!-- USER LOGGED IN BUT NOT A MEMBER  -->
	<div class="flex-container" id="non-member">
		<div class="flex-cell">
			<h3 class="light-lead-heading">If you’re not already a member,<br> join us today.</h3>
		</div>
		<div class="flex-cell cta">
			<a href="/membership-question" class="join">Join now</a>
		</div>

		<?php 
				$block = block_load('block', '309');
				$get = _block_get_renderable_array(_block_render_blocks(array($block)));
				$output = drupal_render($get);        
				print $output;
		?>

	</div>
<?php endif;?>
<?php else:?>
	<!-- USER NOT LOGIN BUT NOT A MEMBER  -->
	<div class="flex-container" id="non-member">
		<div class="flex-cell">
			<h3 class="light-lead-heading">Please login to see this page.</h3>
		</div>
		<div class="flex-cell cta">
			<a data-target="#loginAT" data-toggle="modal" href="#" class="login">Login</a>
			<a href="/membership-question" class="join">Join now</a>
		</div>

		<?php 
				$block = block_load('block', '309');
				$get = _block_get_renderable_array(_block_render_blocks(array($block)));
				$output = drupal_render($get);        
				print $output;
		?>

	</div>
<?php endif;?>