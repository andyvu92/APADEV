<?php
if(!function_exists('drupal_session_started'))
{
  die("Unauthorized Access");
}
?>
<?php if(isset($_SESSION["UserId"])) :
//include('sites/all/themes/evolve/commonFile/updateBackgroundImage.php');
apa_function_updateBackgroundImage_form();
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
//$nationalGroups = aptify_get_GetAptifyData("20", $sendData);

/* We may use this as "Session" data and won't need to load. */
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
/* We may use this as "Session" data and won't need to load. */
// 2.2.23 - GET list of subscription preferences
// Send -
// UserID
// Response -
// List of subscriptions and its T/F values.
$subscriptions = aptify_get_GetAptifyData("23", $sendData);
$Subscription = $subscriptions["results"];
// use one of above to get "current" data
// and combine with existing data ("$Subsctiption")
// Then send it to Aptify.
// May go through Session
$PostArray = Array();
foreach ($_POST as $key => $value) {
	//echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
	$PostArray[htmlspecialchars($key)] = htmlspecialchars($value);
}
/*
echo "@@@@";
var_dump($PostArray);
echo "@@@@";
*/
if(count($PostArray) == 0) { // GET data
	$SubListAll = Array();
	foreach($Subscription as $Subs) {
		$ArrayRe["SubscriptionID"] = $Subs["ConsentID"];
		$ArrayRe["Subscription"] = $Subs["Consent"];
		$ArrayRe["Subscribed"] = $Subs["Subscribed"];
		array_push($SubListAll, $ArrayRe);
	}
	/*
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
	*/
} else { // send & get updated data
	//print_r($PostArray);
	$ArrayReturn = Array();
	$ArrayReturn["UserID"] = $_SESSION['UserId'];
	$SubListAll = Array();
	$subArray = Array();
	$consArray = Array();
	foreach($Subscription as $Subs) {
		$ArrayRe["SubscriptionID"] = $Subs["ConsentID"];
		$arrayUpdate["ConsentID"] = $Subs["ConsentID"];
		$ArrayRe["Subscribed"] = '1';//$Subs["Subscribed"];
		$arrayUpdate["Subscribed"] = '1';//$Subs["Subscribed"];
		if(!isset($PostArray[$Subs["ConsentID"]])) {
			// When it's not set (unticked on check box)
			$ArrayRe["Subscribed"] = '0';
			$arrayUpdate["Subscribed"] = '0';
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
	//print_r($consArray);
	/*
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
	*/
	$ArrayReturn["Subscriptions"] = $subArray;
	$ArrayReturn["Consents"] = $consArray;
	echo "<br /><br />";
	// 2.2.24 - Update subscription preferences
	// Send -
	// UserID, List of subscriptions and its F/F values.
	// Response -
	// Response, List of subscriptions and it's T/F values.
  $subscriptions = aptify_get_GetAptifyData("24", $ArrayReturn);


}

?>
<div id="pre_background" style="display:none">background_<?php //echo $background; ?></div>
<?php apa_function_dashboardLeftNavigation_form(); ?>
<div class="dashboard_content col-xs-12 col-sm-12 col-md-10 col-lg-10 background_<?php //echo $background; ?>" id="dashboard-right-content">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dashboard_detail">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="col-xs-12"><span class="dashboard-name cairo">Communications</span></div>
			<div class="col-xs-12 col-sm-6" style="display: none"><button class="dashboard-backgroud" data-target="#myModal" data-toggle="modal"><span class="customise_background">Customise your background</span><span class="customise_icon">[icon class="fa fa-cogs fa-x"][/icon]</span></button></div>
		</div>
		<?php apa_function_customizeBackgroundImage_form(); ?>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
				<p><span>Choose below which APA communications you would like to be <strong>excluded</strong> from. Simply tick the
communications you <strong>do not</strong> want to receive.
</span><br><span>Note: Some communications we send are considered critically important and therefore mandatory; these cannot be opted out of.</span></p>
				<form action="/subscriptions" method="POST">
					<input name="validator" tyle="hidden" value="0" style="display: none;" />
					<div class="subscriptions-dashboard flex-container">
            <?php
				$countSubs = count($Subscription);
				$countSubType = $countSubs%2;
        $counter = 0;
        //rearrange SubListAll Array
        $arrangArray = Array();
        foreach ($SubListAll as $temArray){
          $arrayNew["SubscriptionID"] =  $temArray["SubscriptionID"];
          $arrayNew["Subscription"] =  $temArray["Subscription"];
          $arrayNew["Subscribed"] = $temArray["Subscribed"];
          if($arrayNew["Subscription"]!="SMS Opt Out" ){
            array_push($arrangArray, $arrayNew);
          }
          else{
            $arraySMS["SubscriptionID"] =  $arrayNew["SubscriptionID"];
            $arraySMS["Subscription"] =  $arrayNew["Subscription"];
            $arraySMS["Subscribed"] = $arrayNew["Subscribed"];
          }
        }
        array_push($arrangArray, $arraySMS);
          foreach($arrangArray as $Subs) {
					$counter++;
					if($Subs["SubscriptionID"] == "28" || $Subs["SubscriptionID"] == "30") {
						// 28 for Insurance
						// 30 for Titled???? (suddenly appeared)
					} else {
						if($counter < 0) {
							// for normal subscriptions
							// from 1st item
							echo '<div class="column"><input class="styled-checkbox" type="checkbox" name="'.$Subs["SubscriptionID"].
								'" id="'.$Subs["SubscriptionID"].'" value="'.$Subs["Subscribed"].'"';
							if($Subs['Subscribed']==1 || $Subs['Subscribed']=='1' || $Subs['Subscribed']=='True'){
								echo "checked='checked'";
							}
							echo '><label  class="light-font-weight" for="'.$Subs["SubscriptionID"].'"><span class="label-text">'.$Subs["Subscription"].'</span></label></div>';

            } elseif($counter < 0) {
							// for extra magazine copy
							foreach($MagSubs as $mags) {
								$tt = strpos($Subs["Subscription"], $mags);
								if($tt !== FALSE) {
									echo '
									<div class="column">
										<input class="styled-checkbox" type="checkbox" name="'.$Subs["SubscriptionID"].
										'" id="'.$Subs["SubscriptionID"].'" value="'.$Subs["Subscribed"].'" checked="checked" disabled />
										<label  class="light-font-weight" for="'.$Subs["SubscriptionID"].'"><span class="label-text">'.$Subs["Subscription"]
										.'</span></label>
									</div>';
								}
              }

						} else {
							  // Hide InMotion print copy, InTouch, SportsPhysio & 
							if(($_SESSION['MemberTypeID'] == "31" || $_SESSION['MemberTypeID'] == "32" || $_SESSION['MemberTypeID'] == "34" || $_SESSION['MemberTypeID'] == "35" || $_SESSION['MemberTypeID'] == "36") && $Subs["SubscriptionID"] == "18" || $Subs["SubscriptionID"] == "17" || $Subs["SubscriptionID"] == "16") {
								// No InMotion print copy for
								// student (M7, M7a), Physiotherapy assistant (M9) and Associated (M10)
							} else {

								$description = getDescription($Subs["Subscription"]);
								$NoSub = $counter>1?True:False;
               	if($counter==2){echo '<div class="subscriptions-dashboard flex-container">';}
								echo $parentBeginElement.'<div class="column"><div class="functional-title"><div class="subscription-title">
								<input class="styled-checkbox" type="checkbox" name="'.$Subs["SubscriptionID"].
								'" id="'.$Subs["SubscriptionID"].'" value="'.$Subs["Subscribed"].'"';
								if($Subs['Subscribed']==1 || $Subs['Subscribed']=='1' || $Subs['Subscribed']=='True'){
									echo "checked='checked'";
								}
								echo '>
								<label  class="light-font-weight" for="'.$Subs["SubscriptionID"].'"><span class="label-text">'.$Subs["Subscription"]
								.'</span></div><div class="description_info'.$counter.'"></div></label></div>';
								if($NoSub) {
									echo '<span class="extra-description'.$counter.'">'.$description;
									if($Subs["Subscription"]=="National Group Communications") { echo "<br>";
										echo 'For more information please visit the <a href="https://australian.physio">APA website.</a>';
									}
									echo '</span>';
								}
								echo '</div>';
								if($counter==$countSubs){echo "</div>";}
							}
						}
					}
				}
				?>
				</div>
				<button id="your-details-submit-button" class="dashboard-button dashboard-bottom-button subscriptions-submit"><span class="dashboard-button-name">Submit</span></button>
			</form>
		</div>
	</div>
</div>
<?php logRecorder(); ?>
</div>
 <?php else :
	// when user is not logged in
	?>
	<!-- NON-LOGIN USERS -->
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
<?php endif; ?>
